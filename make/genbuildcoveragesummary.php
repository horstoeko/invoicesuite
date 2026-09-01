<?php

declare(strict_types=1);

$options = getopt('', [
    'summary-file:',
    'clover-file:',
    'crap4j-file:',
    'top-n:',
    'package-depth:',
    'min-statements:',
    'show-best-files:',
    'warn-project-below:',
    'warn-file-below:',
    'warn-zero-files:',
    'warn-crap-above:',
]);

$readStringOption = static function (array $options, string $name, string $default): string {
    $value = $options[$name] ?? null;

    if (!is_string($value) || '' === trim($value)) {
        return $default;
    }

    return trim($value);
};

$readIntOption = static function (array $options, string $name, int $default, int $minimum = 0): int {
    $value = $options[$name] ?? null;

    if (null === $value || '' === $value) {
        return $default;
    }

    if (false === filter_var($value, FILTER_VALIDATE_INT)) {
        return $default;
    }

    return max($minimum, (int) $value);
};

$readFloatOption = static function (array $options, string $name, float $default, float $minimum = 0.0): float {
    $value = $options[$name] ?? null;

    if (null === $value || '' === $value) {
        return $default;
    }

    if (!is_numeric($value)) {
        return $default;
    }

    return max($minimum, (float) $value);
};

$readBoolOption = static function (array $options, string $name, bool $default): bool {
    $value = $options[$name] ?? null;

    if (null === $value || '' === $value) {
        return $default;
    }

    $normalizedValue = strtolower(trim((string) $value));

    if (in_array($normalizedValue, ['1', 'true', 'yes', 'on'], true)) {
        return true;
    }

    if (in_array($normalizedValue, ['0', 'false', 'no', 'off'], true)) {
        return false;
    }

    return $default;
};

$summaryFile = $readStringOption($options, 'summary-file', getenv('GITHUB_STEP_SUMMARY') ?: '');
$cloverFile = $readStringOption($options, 'clover-file', 'build/logs/clover.xml');
$crap4jFile = $readStringOption($options, 'crap4j-file', 'build/logs/crap4j.xml');
$topN = $readIntOption($options, 'top-n', 10, 1);
$packageDepth = $readIntOption($options, 'package-depth', 2, 1);
$minStatements = $readIntOption($options, 'min-statements', 20, 0);
$showBestFiles = $readBoolOption($options, 'show-best-files', true);
$warnProjectBelow = $readFloatOption($options, 'warn-project-below', 80.0, 0.0);
$warnFileBelow = $readFloatOption($options, 'warn-file-below', 50.0, 0.0);
$warnZeroFiles = $readIntOption($options, 'warn-zero-files', 1, 0);
$warnCrapAbove = $readFloatOption($options, 'warn-crap-above', 30.0, 0.0);

if ('' === $summaryFile) {
    fwrite(STDERR, "Missing summary file. Pass --summary-file or set GITHUB_STEP_SUMMARY.\n");
    exit(1);
}

$loadXml = static function (string $file): ?DOMDocument {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);

    if (!is_file($file) || !$dom->load($file)) {
        return null;
    }

    return $dom;
};

$formatPercent = static function (int $covered, int $total): string {
    if (0 === $total) {
        return 'n/a';
    }

    return number_format(($covered / $total) * 100, 2, '.', '') . '%';
};

$formatPercentValue = (static fn (float $value): string => number_format($value, 2, '.', '') . '%');

$normalizePath = (static fn (string $path): string => str_replace('\\', '/', $path));

$toRelativePath = static function (string $path) use ($normalizePath): string {
    $path = $normalizePath($path);

    $marker = '/src/';
    $position = strpos($path, $marker);

    if (false !== $position) {
        return substr($path, $position + 1);
    }

    if (str_starts_with($path, 'src/')) {
        return $path;
    }

    return ltrim($path, '/');
};

$resolvePackage = static function (string $path) use ($toRelativePath, $packageDepth): string {
    $path = $toRelativePath($path);
    $parts = array_values(array_filter(explode('/', $path), static fn (string $part): bool => '' !== $part));

    if ([] === $parts) {
        return '(root)';
    }

    return implode('/', array_slice($parts, 0, $packageDepth));
};

$renderDetailsSection = static function (string $summary, string $content): string {
    if ('' === trim($content)) {
        return '';
    }

    return "<details>\n<summary>{$summary}</summary>\n\n{$content}</details>\n\n";
};

$append = static function (string $content) use ($summaryFile): void {
    file_put_contents($summaryFile, $content, FILE_APPEND);
};

$append("## Coverage Summary\n\n");

$cloverDom = $loadXml($cloverFile);

if (!$cloverDom instanceof DOMDocument) {
    $append('No Clover coverage report found at ' . $cloverFile . ".\n");

    exit(0);
}

$xpath = new DOMXPath($cloverDom);
$metrics = $xpath->query('//project/metrics')->item(0);

if (!$metrics instanceof DOMElement) {
    $append('Coverage report found, but does not contain project metrics: ' . $cloverFile . ".\n");

    exit(0);
}

$getInt = static function (DOMElement $element, string $name): int {
    $value = $element->getAttribute($name);

    return '' === $value ? 0 : (int) $value;
};

$statements = $getInt($metrics, 'statements');
$coveredStatements = $getInt($metrics, 'coveredstatements');
$methods = $getInt($metrics, 'methods');
$coveredMethods = $getInt($metrics, 'coveredmethods');
$conditionals = $getInt($metrics, 'conditionals');
$coveredConditionals = $getInt($metrics, 'coveredconditionals');
$elements = $getInt($metrics, 'elements');
$coveredElements = $getInt($metrics, 'coveredelements');
$classes = $getInt($metrics, 'classes');
$files = $getInt($metrics, 'files');
$ncloc = $getInt($metrics, 'ncloc');

$fileRows = [];
$packageRows = [];
$zeroCoverageFiles = 0;
$below50Files = 0;
$below70Files = 0;
$below80Files = 0;
$atLeast90Files = 0;
$belowWarningFiles = 0;

foreach ($xpath->query('//file') as $fileNode) {
    if (!$fileNode instanceof DOMElement) {
        continue;
    }

    $fileMetricsNode = null;

    foreach ($fileNode->childNodes as $childNode) {
        if ($childNode instanceof DOMElement && 'metrics' === $childNode->tagName) {
            $fileMetricsNode = $childNode;
            break;
        }
    }

    if (!$fileMetricsNode instanceof DOMElement) {
        continue;
    }

    $filePath = $toRelativePath($fileNode->getAttribute('name'));
    $fileStatements = $getInt($fileMetricsNode, 'statements');
    $fileCoveredStatements = $getInt($fileMetricsNode, 'coveredstatements');
    $fileMethods = $getInt($fileMetricsNode, 'methods');
    $fileCoveredMethods = $getInt($fileMetricsNode, 'coveredmethods');
    $fileConditionals = $getInt($fileMetricsNode, 'conditionals');
    $fileCoveredConditionals = $getInt($fileMetricsNode, 'coveredconditionals');

    if (0 === $fileStatements && 0 === $fileMethods && 0 === $fileConditionals) {
        continue;
    }

    $uncoveredStatements = max(0, $fileStatements - $fileCoveredStatements);
    $coverageRatio = $fileStatements > 0
        ? ($fileCoveredStatements / $fileStatements) * 100
        : ($fileMethods > 0 ? ($fileCoveredMethods / $fileMethods) * 100 : 0.0);

    if ($fileStatements > 0 && 0 === $fileCoveredStatements) {
        ++$zeroCoverageFiles;
    }

    if ($coverageRatio < 50.0) {
        ++$below50Files;
    }

    if ($coverageRatio < 70.0) {
        ++$below70Files;
    }

    if ($coverageRatio < 80.0) {
        ++$below80Files;
    }

    if ($coverageRatio >= 90.0) {
        ++$atLeast90Files;
    }

    if ($coverageRatio < $warnFileBelow) {
        ++$belowWarningFiles;
    }

    $fileRows[] = [
        'file' => $filePath,
        'statements' => $fileStatements,
        'coveredStatements' => $fileCoveredStatements,
        'uncoveredStatements' => $uncoveredStatements,
        'coverageRatio' => $coverageRatio,
    ];

    $package = $resolvePackage($filePath);

    $packageRows[$package] ??= [
        'package' => $package,
        'files' => 0,
        'statements' => 0,
        'coveredStatements' => 0,
        'uncoveredStatements' => 0,
    ];

    ++$packageRows[$package]['files'];
    $packageRows[$package]['statements'] += $fileStatements;
    $packageRows[$package]['coveredStatements'] += $fileCoveredStatements;
    $packageRows[$package]['uncoveredStatements'] += $uncoveredStatements;
}

$crapDom = $loadXml($crap4jFile);
$crapRows = [];
$crapWarningCount = 0;

if ($crapDom instanceof DOMDocument) {
    $crapXpath = new DOMXPath($crapDom);

    foreach ($crapXpath->query('//method') as $methodNode) {
        if (!$methodNode instanceof DOMElement) {
            continue;
        }

        $crap = $methodNode->getAttribute('crap');

        if ('' === $crap) {
            continue;
        }

        $className = $methodNode->getAttribute('className');

        if ('' === $className) {
            $className = $methodNode->getAttribute('class');
        }

        $methodName = $methodNode->getAttribute('method');

        if ('' === $methodName) {
            $methodName = $methodNode->getAttribute('name');
        }

        $file = $toRelativePath($methodNode->getAttribute('file'));
        $complexity = $methodNode->getAttribute('complexity');
        $coverage = $methodNode->getAttribute('coverage');
        $crapValue = (float) $crap;

        if ($crapValue > $warnCrapAbove) {
            ++$crapWarningCount;
        }

        $crapRows[] = [
            'crap' => $crapValue,
            'className' => '' !== $className ? $className : '(unknown class)',
            'methodName' => '' !== $methodName ? $methodName : '(unknown method)',
            'file' => '' !== $file ? $file : '(unknown file)',
            'complexity' => '' !== $complexity ? (int) $complexity : 0,
            'coverage' => '' !== $coverage ? (float) $coverage : 0.0,
        ];
    }
}

$projectCoverageRatio = $elements > 0 ? ($coveredElements / $elements) * 100 : 0.0;
$warnings = [];

if ($projectCoverageRatio < $warnProjectBelow) {
    $warnings[] = 'Project coverage is below ' . $formatPercentValue($warnProjectBelow) . ' (' . $formatPercentValue($projectCoverageRatio) . ').';
}

if ($warnZeroFiles > 0 && $zeroCoverageFiles >= $warnZeroFiles) {
    $warnings[] = $zeroCoverageFiles . ' file(s) have 0% statement coverage.';
}

if ($belowWarningFiles > 0) {
    $warnings[] = $belowWarningFiles . ' file(s) are below ' . $formatPercentValue($warnFileBelow) . ' statement coverage.';
}

if ($crapWarningCount > 0) {
    $warnings[] = $crapWarningCount . ' method(s) exceed CRAP ' . number_format($warnCrapAbove, 2, '.', '') . '.';
}

$output = '';

if ([] !== $warnings) {
    $output .= "### Warnings\n\n";

    foreach ($warnings as $warning) {
        $output .= '- ⚠️ ' . $warning . "\n";
    }

    $output .= "\n";
}

$output .= "| Metric | Covered | Total | Coverage |\n";
$output .= "| --- | ---: | ---: | ---: |\n";
$output .= '| Statements | ' . $coveredStatements . ' | ' . $statements . ' | ' . $formatPercent($coveredStatements, $statements) . " |\n";
$output .= '| Methods | ' . $coveredMethods . ' | ' . $methods . ' | ' . $formatPercent($coveredMethods, $methods) . " |\n";
$output .= '| Conditionals | ' . $coveredConditionals . ' | ' . $conditionals . ' | ' . $formatPercent($coveredConditionals, $conditionals) . " |\n";
$output .= '| Elements | ' . $coveredElements . ' | ' . $elements . ' | ' . $formatPercent($coveredElements, $elements) . " |\n\n";
$output .= "### Coverage Distribution\n\n";
$output .= "| Files | Classes | NCLOC | 0% Files | < 50% | < 70% | < 80% | ≥ 90% |\n";
$output .= "| ---: | ---: | ---: | ---: | ---: | ---: | ---: | ---: |\n";
$output .= '| ' . $files . ' | ' . $classes . ' | ' . $ncloc . ' | ' . $zeroCoverageFiles . ' | ' . $below50Files . ' | ' . $below70Files . ' | ' . $below80Files . ' | ' . $atLeast90Files . " |\n\n";

if ([] !== $fileRows) {
    usort(
        $fileRows,
        static fn (array $left, array $right): int => [$left['coverageRatio'], -$left['uncoveredStatements'], $left['file']]
            <=> [$right['coverageRatio'], -$right['uncoveredStatements'], $right['file']]
    );

    $weakestFilesContent = '';
    $weakestFilesContent .= "| File | Uncovered | Statements | Coverage |\n";
    $weakestFilesContent .= "| --- | ---: | ---: | ---: |\n";

    foreach (array_slice($fileRows, 0, $topN) as $row) {
        $weakestFilesContent .= '| `' . $row['file'] . '` | ' . $row['uncoveredStatements'] . ' | ' . $row['statements'] . ' | ' . $formatPercentValue($row['coverageRatio']) . " |\n";
    }

    $output .= $renderDetailsSection('Weakest Files by Statement Coverage', $weakestFilesContent);

    if ($showBestFiles) {
        $bestFiles = array_values(
            array_filter(
                $fileRows,
                static fn (array $row): bool => $row['statements'] >= $minStatements
            )
        );

        usort(
            $bestFiles,
            static fn (array $left, array $right): int => [$right['coverageRatio'], $left['uncoveredStatements'], $left['file']]
                <=> [$left['coverageRatio'], $right['uncoveredStatements'], $right['file']]
        );

        $bestFilesContent = '';

        if ([] === $bestFiles) {
            $bestFilesContent .= 'No files found with at least ' . $minStatements . " statements.\n";
        } else {
            $bestFilesContent .= "| File | Uncovered | Statements | Coverage |\n";
            $bestFilesContent .= "| --- | ---: | ---: | ---: |\n";

            foreach (array_slice($bestFiles, 0, $topN) as $row) {
                $bestFilesContent .= '| `' . $row['file'] . '` | ' . $row['uncoveredStatements'] . ' | ' . $row['statements'] . ' | ' . $formatPercentValue($row['coverageRatio']) . " |\n";
            }
        }

        $output .= $renderDetailsSection('Best Covered Files', $bestFilesContent);
    }

    $largestGaps = $fileRows;
    usort(
        $largestGaps,
        static fn (array $left, array $right): int => [$right['uncoveredStatements'], $left['coverageRatio'], $left['file']]
            <=> [$left['uncoveredStatements'], $right['coverageRatio'], $right['file']]
    );

    $largestGapsContent = '';
    $largestGapsContent .= "| File | Uncovered | Covered | Statements | Coverage |\n";
    $largestGapsContent .= "| --- | ---: | ---: | ---: | ---: |\n";

    foreach (array_slice($largestGaps, 0, $topN) as $row) {
        $largestGapsContent .= '| `' . $row['file'] . '` | ' . $row['uncoveredStatements'] . ' | ' . $row['coveredStatements'] . ' | ' . $row['statements'] . ' | ' . $formatPercentValue($row['coverageRatio']) . " |\n";
    }

    $output .= $renderDetailsSection('Largest Uncovered Statement Gaps', $largestGapsContent);
}

if ([] !== $packageRows) {
    $packageRows = array_values($packageRows);

    foreach ($packageRows as &$packageRow) {
        $packageRow['coverageRatio'] = $packageRow['statements'] > 0
            ? ($packageRow['coveredStatements'] / $packageRow['statements']) * 100
            : 0.0;
    }

    unset($packageRow);

    usort(
        $packageRows,
        static fn (array $left, array $right): int => [$left['coverageRatio'], -$left['uncoveredStatements'], $left['package']]
            <=> [$right['coverageRatio'], -$right['uncoveredStatements'], $right['package']]
    );

    $packageOverviewContent = '';
    $packageOverviewContent .= "| Package | Files | Uncovered | Statements | Coverage |\n";
    $packageOverviewContent .= "| --- | ---: | ---: | ---: | ---: |\n";

    foreach ($packageRows as $row) {
        $packageOverviewContent .= '| `' . $row['package'] . '` | ' . $row['files'] . ' | ' . $row['uncoveredStatements'] . ' | ' . $row['statements'] . ' | ' . $formatPercentValue($row['coverageRatio']) . " |\n";
    }

    $output .= $renderDetailsSection('Package Overview', $packageOverviewContent);
}

$crapContent = '';

if (!$crapDom instanceof DOMDocument) {
    $crapContent .= 'No Crap4J report found at ' . $crap4jFile . ".\n";
} elseif ([] === $crapRows) {
    $crapContent .= 'No CRAP hotspots found in ' . $crap4jFile . ".\n";
} else {
    usort(
        $crapRows,
        static fn (array $left, array $right): int => [$right['crap'], $right['complexity'], $left['className'], $left['methodName']]
            <=> [$left['crap'], $left['complexity'], $right['className'], $right['methodName']]
    );

    $crapContent .= "| Class::Method | File | CRAP | Complexity | Coverage |\n";
    $crapContent .= "| --- | --- | ---: | ---: | ---: |\n";

    foreach (array_slice($crapRows, 0, $topN) as $row) {
        $crapContent .= '| `' . $row['className'] . '::' . $row['methodName'] . '` | `' . $row['file'] . '` | ' . number_format($row['crap'], 2, '.', '') . ' | ' . $row['complexity'] . ' | ' . $formatPercentValue($row['coverage']) . " |\n";
    }
}

$output .= $renderDetailsSection('CRAP Hotspots', $crapContent);
$output .= "Coverage reports:\n";
$output .= '- `' . $cloverFile . "`\n";
$output .= '- `' . $crap4jFile . "`\n";
$output .= "- `build/coverage`\n";
$output .= "- `build/coverage-html`\n";

$append($output);
