#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlockFactory;

/**
 * CLI usage:
 *   php extract-bt.php path/to/Class.php [output.md] [output.pdf]
 *
 * Notes:
 * - If output.pdf is omitted but output.md is given, output.pdf will be derived from output.md.
 * - PDF rendering uses a lightweight Markdown->HTML conversion (headings, lists, tables).
 */
$inputFile = $argv[1] ?? null;
$outputFile = $argv[2] ?? null;
$outputPdf = $argv[3] ?? null;

if (null === $inputFile || !is_file($inputFile)) {
    fwrite(STDERR, "Usage: php extract-bt.php path/to/Class.php [output.md] [output.pdf]\n");
    exit(1);
}

$code = file_get_contents($inputFile);

if (false === $code) {
    fwrite(STDERR, sprintf('Cannot read file: %s%s', $inputFile, PHP_EOL));
    exit(1);
}

$factory = DocBlockFactory::createInstance();

/**
 * Extract information from a @param description like:
 * "__BT-122, BT-17, BT-18, From EN 16931__ Additional document number"
 *
 * Returns:
 *   ['rules' => ['BT-122','BT-17',...], 'profile' => 'EN 16931', 'rest' => 'Additional document number']
 */
function extractBtInfo(string $description): array
{
    $description = trim($description);

    // Find first "__ ... __" block
    if (!preg_match('/__([^_]+?)__/', $description, $m, PREG_OFFSET_CAPTURE)) {
        return ['rules' => [], 'profile' => null, 'rest' => $description];
    }

    $inside = trim($m[1][0]);
    $after = trim(substr($description, $m[0][1] + strlen($m[0][0]))); // text after "__...__"

    // Split at "From"
    $profile = null;
    $rulesPart = $inside;

    if (preg_match('/\bFrom\b\s+(.+)$/', $inside, $fm)) {
        $profile = trim($fm[1]);
        $rulesPart = trim(preg_replace('/\bFrom\b\s+.+$/', '', $inside) ?? $inside);
    }

    // Rules are comma-separated in the rulesPart
    $rules = [];
    foreach (preg_split('/\s*,\s*/', $rulesPart, -1, PREG_SPLIT_NO_EMPTY) as $r) {
        $r = trim($r);

        // Accept tokens containing "BT" or "BG" patterns like BT-122, BT-X-149, BT-18-1, BG-1, etc.
        if (preg_match('/^(BT|BG)-[A-Z0-9]+(?:-[A-Z0-9]+)*$/', $r)) {
            $rules[] = $r;
            continue;
        }

        // Sometimes there may be stray text; try to extract BT-*/BG-* occurrences
        if (preg_match_all('/\b(?:BT|BG)-[A-Z0-9]+(?:-[A-Z0-9]+)*\b/', $r, $rm)) {
            foreach ($rm[0] as $rr) {
                $rules[] = $rr;
            }
        }
    }

    // De-dup while preserving order
    $rules = array_values(array_unique($rules));

    return [
        'rules' => $rules,
        'profile' => $profile,
        'rest' => $after,
    ];
}

/**
 * Parse methods and their preceding doc comments via tokens.
 * Returns rows with:
 *   method, param, rules (array), rulesStr, profile, text, paramPos
 *
 * Note: This parses docblocks from source code without loading the class.
 */
function collectRows(string $code, DocBlockFactory $factory): array
{
    $tokens = token_get_all($code);
    $rows = [];

    $lastDocComment = null;
    $count = count($tokens);

    for ($i = 0; $i < $count; ++$i) {
        $t = $tokens[$i];

        if (is_array($t) && T_DOC_COMMENT === $t[0]) {
            $lastDocComment = $t[1];
            continue;
        }

        if (is_array($t) && T_FUNCTION === $t[0]) {
            // Skip anonymous functions: next significant token is '(' instead of T_STRING
            $j = $i + 1;
            while ($j < $count) {
                $tj = $tokens[$j];

                if (is_array($tj) && T_WHITESPACE === $tj[0]) {
                    ++$j;
                    continue;
                }

                if (is_string($tj) && '' === trim($tj)) {
                    ++$j;
                    continue;
                }

                // Allow & (by-ref) between function and name
                if (is_string($tj) && '&' === $tj) {
                    ++$j;
                    continue;
                }

                break;
            }

            $methodName = null;

            if ($j < $count && is_array($tokens[$j]) && T_STRING === $tokens[$j][0]) {
                $methodName = $tokens[$j][1];
            } else {
                // anonymous function; ignore
                $lastDocComment = null;
                continue;
            }

            if (null === $lastDocComment) {
                continue;
            }

            // Determine parameter order by parsing the method signature tokens
            $paramOrder = [];

            // Find '(' after method name
            $k = $j + 1;
            while ($k < $count) {
                $tk = $tokens[$k];

                if (is_array($tk) && T_WHITESPACE === $tk[0]) {
                    ++$k;
                    continue;
                }

                if (is_string($tk) && '(' === $tk) {
                    break;
                }

                ++$k;
            }

            if ($k < $count && is_string($tokens[$k]) && '(' === $tokens[$k]) {
                $depth = 0;
                for ($p = $k; $p < $count; ++$p) {
                    $tp = $tokens[$p];

                    if (is_string($tp)) {
                        if ('(' === $tp) {
                            ++$depth;
                            continue;
                        }

                        if (')' === $tp) {
                            --$depth;

                            if (0 === $depth) {
                                break;
                            }
                            continue;
                        }
                        continue;
                    }

                    // collect $variables at top-level of signature
                    if ($depth > 0 && T_VARIABLE === $tp[0] && 1 === $depth) {
                        $name = ltrim($tp[1], '$');

                        if (!in_array($name, $paramOrder, true)) {
                            $paramOrder[] = $name;
                        }
                    }
                }
            }

            try {
                $docblock = $factory->create($lastDocComment);
            } catch (Throwable) {
                $lastDocComment = null;
                continue;
            }

            $paramTags = $docblock->getTagsByName('param');
            $pos = 0;

            foreach ($paramTags as $tag) {
                if (!$tag instanceof Param) {
                    continue;
                }

                $varName = $tag->getVariableName() ?? '';
                $paramName = ltrim($varName, '$');

                $descObj = $tag->getDescription(); // Description|null
                $desc = $descObj instanceof Description ? (string) $descObj : '';

                $bt = extractBtInfo($desc);

                // Include parameters even if rules/profile are empty
                $paramPos = array_search($paramName, $paramOrder, true);

                if (false === $paramPos) {
                    $paramPos = 100000 + $pos; // fallback: docblock order
                }

                $rows[] = [
                    'method' => $methodName,
                    'param' => $paramName,
                    'rules' => $bt['rules'],
                    'rulesStr' => implode(', ', $bt['rules']),
                    'profile' => $bt['profile'] ?? '',
                    'text' => $bt['rest'] ?? '',
                    'paramPos' => (int) $paramPos,
                ];

                ++$pos;
            }

            $lastDocComment = null;
        }
    }

    return $rows;
}

function mdEscape(string $s): string
{
    $s = str_replace(["\r\n", "\n", "\r"], ' ', $s);
    $s = str_replace('|', '\|', $s);

    return trim($s);
}

function sortKeyFromRules(string $rulesStr): string
{
    $rulesStr = trim($rulesStr);

    if ('' === $rulesStr) {
        return 'ZZZ-NO-RULE';
    }

    $first = trim(strtok($rulesStr, ','));
    $first = strtoupper($first);

    if (preg_match('/^(BT|BG)-(.+)$/', $first, $m)) {
        return $m[1] . '-' . $m[2];
    }

    return $first;
}

/**
 * Lightweight Markdown -> HTML (headings, lists, tables).
 * Good enough for readable PDFs with mPDF.
 */
function markdownToHtml(string $md): string
{
    $lines = preg_split("/\r\n|\n|\r/", $md);

    if (false === $lines) {
        $lines = [$md];
    }

    $html = [];
    $html[] = '<!doctype html><html><head><meta charset="utf-8">';
    $html[] = '<style>
        body { font-family: sans-serif; font-size: 10pt; }
        h1 { font-size: 16pt; margin: 14pt 0 8pt 0; }
        h2 { font-size: 13pt; margin: 12pt 0 6pt 0; }
        table { border-collapse: collapse; width: 100%; margin: 6pt 0 10pt 0; }
        th, td { border: 1px solid #999; padding: 4px 6px; vertical-align: top; }
        th { font-weight: bold; }
        ul { margin: 4pt 0 8pt 18pt; padding: 0; }
        li { margin: 2pt 0; }
        p { margin: 4pt 0; }
        code, pre { font-family: monospace; }
    </style></head><body>';

    $inList = false;

    $i = 0;
    $n = count($lines);
    while ($i < $n) {
        $line = $lines[$i];

        // Table detection: header line + separator line
        if (preg_match('/^\|.*\|$/', $line) && ($i + 1) < $n && preg_match('/^\|\s*:?-{3,}:?\s*(\|\s*:?-{3,}:?\s*)+\|$/', $lines[$i + 1])) {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }

            $header = $line;
            $i += 2; // skip separator
            $rows = [];

            while ($i < $n && preg_match('/^\|.*\|$/', $lines[$i]) && '' !== trim($lines[$i])) {
                $rows[] = $lines[$i];
                ++$i;
            }

            $parseRow = static function (string $row): array {
                $row = trim($row);
                $row = trim($row, '|');
                $parts = array_map('trim', explode('|', $row));

                return array_map(static fn ($c) => str_replace('\|', '|', $c), $parts);
            };

            $hCells = $parseRow($header);

            $html[] = '<table><thead><tr>';
            foreach ($hCells as $c) {
                $html[] = '<th>' . htmlspecialchars($c, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</th>';
            }
            $html[] = '</tr></thead><tbody>';

            foreach ($rows as $r) {
                $cells = $parseRow($r);
                $html[] = '<tr>';
                foreach ($cells as $c) {
                    $html[] = '<td>' . htmlspecialchars($c, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</td>';
                }
                $html[] = '</tr>';
            }

            $html[] = '</tbody></table>';
            continue;
        }

        $trim = trim($line);

        if ('' === $trim) {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }
            ++$i;
            continue;
        }

        if (str_starts_with($trim, '# ')) {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }
            $html[] = '<h1>' . htmlspecialchars(substr($trim, 2), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</h1>';
            ++$i;
            continue;
        }

        if (str_starts_with($trim, '## ')) {
            if ($inList) {
                $html[] = '</ul>';
                $inList = false;
            }
            $html[] = '<h2>' . htmlspecialchars(substr($trim, 3), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</h2>';
            ++$i;
            continue;
        }

        if (str_starts_with($trim, '- ')) {
            if (!$inList) {
                $html[] = '<ul>';
                $inList = true;
            }
            $html[] = '<li>' . htmlspecialchars(substr($trim, 2), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</li>';
            ++$i;
            continue;
        }

        if ($inList) {
            $html[] = '</ul>';
            $inList = false;
        }

        $html[] = '<p>' . htmlspecialchars($trim, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        ++$i;
    }

    if ($inList) {
        $html[] = '</ul>';
    }

    $html[] = '</body></html>';

    return implode("\n", $html);
}

$rows = collectRows($code, $factory);

/**
 * For Output 1+2 we sort by rule; Output 3 keeps parameter order (signature order).
 */
$rowsSortedByRule = $rows;
usort($rowsSortedByRule, static function (array $a, array $b): int {
    $ka = sortKeyFromRules($a['rulesStr']);
    $kb = sortKeyFromRules($b['rulesStr']);

    $cmp = strnatcmp($ka, $kb);

    if (0 !== $cmp) {
        return $cmp;
    }

    $cmp = strcmp((string) $a['method'], (string) $b['method']);

    if (0 !== $cmp) {
        return $cmp;
    }

    return strcmp((string) $a['param'], (string) $b['param']);
});

$md = "# BT-Rules Export\n\n";
$md .= '- Source: `' . mdEscape($inputFile) . "`\n";
$md .= '- Generated: `' . date('c') . "`\n\n";

/**
 * Output 1: Overview (sorted by rule)
 */
$md .= "## Overview\n\n";
$md .= "| BT/BG Rules | Minimum Profile | Method | Parameter Documentation |\n";
$md .= "|---|---|---|---|\n";

foreach ($rowsSortedByRule as $r) {
    $paramDoc = $r['param'] . ': ' . $r['text'];

    $md .= '| '
        . mdEscape($r['rulesStr']) . ' | '
        . mdEscape($r['profile']) . ' | '
        . mdEscape($r['method']) . ' | '
        . mdEscape($paramDoc) . " |\n";
}

/**
 * Output 2: Group by each individual rule (+ extra group for "no rule")
 */
$groups = [];
foreach ($rowsSortedByRule as $r) {
    if (empty($r['rules'])) {
        $groups['__NO_RULE__'][] = $r;
        continue;
    }

    foreach ($r['rules'] as $rule) {
        $groups[$rule][] = $r;
    }
}

uksort($groups, static function (string $a, string $b): int {
    if ('__NO_RULE__' === $a) {
        return 1;
    }

    if ('__NO_RULE__' === $b) {
        return -1;
    }

    return strnatcmp($a, $b);
});

$md .= "\n## By Rule\n\n";

foreach ($groups as $rule => $items) {
    $headline = '__NO_RULE__' === $rule ? '(no BT/BG rule)' : $rule;

    $md .= '# ' . mdEscape($headline) . "\n\n";
    $md .= "| Minimum Profile | Method | Parameter |\n";
    $md .= "|---|---|---|\n";

    usort($items, static function (array $a, array $b): int {
        $cmp = strcmp((string) $a['profile'], (string) $b['profile']);

        if (0 !== $cmp) {
            return $cmp;
        }

        $cmp = strcmp((string) $a['method'], (string) $b['method']);

        if (0 !== $cmp) {
            return $cmp;
        }

        return strcmp((string) $a['param'], (string) $b['param']);
    });

    foreach ($items as $r) {
        $paramDoc = $r['param'] . ': ' . $r['text'];

        $md .= '| '
            . mdEscape($r['profile']) . ' | '
            . mdEscape($r['method']) . ' | '
            . mdEscape($paramDoc) . " |\n";
    }

    $md .= "\n";
}

/**
 * Output 3: Group by method (keep signature parameter order)
 */
$methodGroups = [];
foreach ($rows as $r) {
    $methodGroups[$r['method']][] = $r;
}

uksort($methodGroups, strcmp(...));

$md .= "\n## By Method\n\n";

foreach ($methodGroups as $method => $items) {
    // keep signature order
    usort($items, static function (array $a, array $b): int {
        $cmp = $a['paramPos'] <=> $b['paramPos'];

        if (0 !== $cmp) {
            return $cmp;
        }

        return strcmp((string) $a['param'], (string) $b['param']);
    });

    $md .= '# ' . mdEscape($method) . "\n\n";
    $md .= "| Parameter | BT/BG Rules | Minimum Profile | Description |\n";
    $md .= "|---|---|---|---|\n";

    foreach ($items as $r) {
        $md .= '| '
            . mdEscape($r['param']) . ' | '
            . mdEscape($r['rulesStr']) . ' | '
            . mdEscape($r['profile']) . ' | '
            . mdEscape($r['text']) . " |\n";
    }

    $md .= "\n";
}

if (null !== $outputFile) {
    $ok = file_put_contents($outputFile, $md);

    if (false === $ok) {
        fwrite(STDERR, sprintf('Cannot write output file: %s%s', $outputFile, PHP_EOL));
        exit(2);
    }
    fwrite(STDOUT, sprintf('Wrote: %s%s', $outputFile, PHP_EOL));
} else {
    echo $md;
}

// PDF output (mPDF)
if (null === $outputPdf && null !== $outputFile) {
    $outputPdf = preg_replace('/\.md$/i', '', $outputFile) . '.pdf';
}

if (null !== $outputPdf) {
    try {
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
        ]);

        $html = markdownToHtml($md);
        $mpdf->WriteHTML($html);
        $mpdf->Output($outputPdf, Destination::FILE);

        fwrite(STDOUT, sprintf('Wrote: %s%s', $outputPdf, PHP_EOL));
    } catch (Throwable $e) {
        fwrite(STDERR, 'PDF generation failed: ' . $e->getMessage() . "\n");
        exit(3);
    }
}
