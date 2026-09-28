<?php

declare(strict_types=1);

/** Probe Composer dependencies on PHP 8.6, then check InvoiceSuite. */

function readJson(string $path): array
{
    $data = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($data)) {
        throw new RuntimeException("Expected a JSON object in {$path}");
    }

    return $data;
}

function writeJson(string $path, array $data): void
{
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    if (file_put_contents($path, $json . "\n") === false) {
        throw new RuntimeException("Could not write {$path}");
    }
}

function makeDirectory(string $path): void
{
    if (!is_dir($path) && !mkdir($path, 0777, true) && !is_dir($path)) {
        throw new RuntimeException("Could not create {$path}");
    }
}

function safeName(string $name): string
{
    return (string) preg_replace('/[^a-zA-Z0-9_.-]+/', '_', $name);
}

/** @return array{0: int, 1: string} */
function runCommand(array $command, string $directory, string $logPath, int $timeout = 300): array
{
    $log = fopen($logPath, 'wb');
    if ($log === false) {
        throw new RuntimeException("Could not open {$logPath}");
    }
    fwrite($log, '$ ' . implode(' ', $command) . "\n");
    fflush($log);

    // An array command avoids shell interpretation. Both output streams go to a file,
    // so a chatty Composer process cannot block on a full pipe buffer.
    $descriptors = [0 => ['pipe', 'r'], 1 => $log, 2 => $log];
    $process = proc_open($command, $descriptors, $pipes, $directory);
    if (!is_resource($process)) {
        fclose($log);
        throw new RuntimeException('Could not start ' . $command[0]);
    }
    fclose($pipes[0]);
    $started = microtime(true);
    $code = -1;
    $timedOut = false;
    while (true) {
        $state = proc_get_status($process);
        if (!$state['running']) {
            $code = (int) $state['exitcode'];
            break;
        }
        if (microtime(true) - $started >= $timeout) {
            $timedOut = true;
            proc_terminate($process);
            usleep(100000);
            $state = proc_get_status($process);
            if ($state['running']) {
                proc_terminate($process, 9);
            }
            break;
        }
        usleep(100000);
    }
    proc_close($process);
    if ($timedOut) {
        fwrite($log, "\nTimed out after {$timeout} seconds.\n");
        $code = 124;
    }
    fclose($log);

    return [$code, (string) file_get_contents($logPath)];
}

function isPackage(string $name): bool
{
    // Composer package names contain a vendor slash; platform requirements do not.
    return str_contains($name, '/');
}

function composerData(array $source, ?array $single = null): array
{
    $data = $source;
    unset($data['scripts']); // Project callbacks must not run during probes.
    $data['config']['platform']['php'] = '8.6.0';
    $data['require']['php'] = '8.6.*';
    foreach (['require', 'require-dev'] as $section) {
        foreach ($data[$section] ?? [] as $name => $_constraint) {
            if (!isPackage($name)) {
                continue;
            }
            if ($single !== null && $single !== [$section, $name]) {
                unset($data[$section][$name]);
            } else {
                $data[$section][$name] = '*';
            }
        }
    }

    return $data;
}

/** @return array{0: int, 1: string} */
function resolve(string $directory, string $logPath): array
{
    return runCommand(
        ['composer', 'update', '--no-install', '--no-scripts', '--no-plugins',
            '--no-interaction', '--prefer-dist', '--no-progress'],
        $directory,
        $logPath
    );
}

function lockedVersion(string $directory, string $name): ?string
{
    $lock = readJson($directory . '/composer.lock');
    foreach (array_merge($lock['packages'] ?? [], $lock['packages-dev'] ?? []) as $package) {
        if ($package['name'] === $name) {
            return $package['version'];
        }
    }

    return null;
}

function versionConstraint(string $version): string
{
    $clean = ltrim($version, 'v');
    if (preg_match('/^\d+\.\d+\.\d+(?:\.0)?$/D', $clean) === 1) {
        return '^' . (str_ends_with($clean, '.0') && substr_count($clean, '.') === 3
            ? substr($clean, 0, -2) : $clean);
    }

    // Do not invent a range for a dev branch or prerelease.
    return $version;
}

function infrastructureError(string $output): bool
{
    return preg_match(
        '/curl error (?:5|6|7|28|35|52|56|60)\b|Could not resolve host|'
        . 'Could not authenticate|Authentication failed|Failed to download|'
        . 'Connection timed out|Service Unavailable|HTTP\/[12](?:\.\d)?\s+5\d\d/i',
        $output
    ) === 1;
}

function markdownCell(string $value): string
{
    return str_replace(["|", "\r", "\n"], ['&#124;', ' ', ' '], $value);
}

function writeReport(string $out, array $rows, string $phase, string $detail,
                     string $status, string $phpVersion, string $composerVersion): void
{
    $lines = [
        '# PHP 8.6 readiness', '',
        'PHP: ' . $phpVersion . ' · Composer: ' . $composerVersion, '',
        'Original `composer.json` and `composer.lock` were not modified. '
            . 'Direct package constraints were set to `*` in temporary copies; '
            . 'PHP was modeled as 8.6.0. The checked-in lockfile and vendor directory were ignored.', '',
        '| Section | Direct dependency | Current constraint | Individually resolved version | Candidate constraint | Combined version | Verified combined constraint |',
        '| --- | --- | --- | --- | --- | --- | --- |',
    ];
    foreach ($rows as $row) {
        $cells = [];
        foreach (['section', 'package', 'original', 'individual', 'suggested',
                  'combined', 'combined_constraint'] as $key) {
            $cells[] = markdownCell((string) ($row[$key] ?? '—'));
        }
        $lines[] = '| ' . implode(' | ', $cells) . ' |';
    }
    array_push($lines, '', '## Result', '', '**' . $phase . ':** ' . $detail, '',
        'A `^` constraint starts at the resolved stable version. The combined constraints '
            . 'were verified together; an individual candidate is informational. Future '
            . 'versions in a range are not automatically PHP 8.6 compatible. Dev versions '
            . 'are pinned as reported.', '',
        'The individual probes can succeed even when the complete dependency '
            . 'graph conflicts. The InvoiceSuite checks run only after the complete '
            . 'graph resolves and installs on PHP 8.6.', '',
        'See the logs in this artifact for solver errors and test output.');

    writeJson($out . '/report.json', [
        'status' => $status, 'phase' => $phase, 'detail' => $detail,
        'php' => $phpVersion, 'composer' => $composerVersion, 'dependencies' => $rows,
    ]);
    $summary = implode("\n", $lines) . "\n";
    file_put_contents($out . '/report.md', $summary);
    $githubSummary = getenv('GITHUB_STEP_SUMMARY');
    if ($githubSummary !== false && $githubSummary !== '') {
        file_put_contents($githubSummary, $summary, FILE_APPEND);
    }
    echo $summary;
}

function copyProject(string $from, string $to): void
{
    makeDirectory($to);
    foreach (new DirectoryIterator($from) as $entry) {
        if ($entry->isDot() || in_array($entry->getFilename(),
            ['.git', 'vendor', '.php86-readiness'], true)) {
            continue;
        }
        $target = $to . '/' . $entry->getFilename();
        if ($entry->isDir() && !$entry->isLink()) {
            copyProject($entry->getPathname(), $target);
        } elseif ($entry->isFile()) {
            if (!copy($entry->getPathname(), $target)) {
                throw new RuntimeException('Could not copy ' . $entry->getPathname());
            }
        }
    }
}

function removeTree(string $path): void
{
    if (!is_dir($path)) {
        return;
    }
    foreach (new DirectoryIterator($path) as $entry) {
        if ($entry->isDot()) {
            continue;
        }
        if ($entry->isDir() && !$entry->isLink()) {
            removeTree($entry->getPathname());
        } else {
            unlink($entry->getPathname());
        }
    }
    rmdir($path);
}

function main(): int
{
    $root = (string) getcwd();
    $out = $root . '/.php86-readiness';
    $logs = $out . '/logs';
    makeDirectory($logs);
    $rows = [];
    $phase = 'Dependency probe';
    $detail = '';
    $status = 'blocked';
    $phpVersion = PHP_VERSION;
    $composerVersion = 'unknown';
    $temp = sys_get_temp_dir() . '/php86-readiness-' . bin2hex(random_bytes(8));

    try {
        $source = readJson($root . '/composer.json');
        [$versionCode, $versionOutput] = runCommand(
            ['composer', '--version', '--no-ansi'], $root, $logs . '/composer-version.txt'
        );
        if ($versionCode !== 0) {
            throw new RuntimeException('Could not determine Composer version.');
        }
        $composerVersion = trim(strtok($versionOutput, "\n") ?: 'unknown');
        makeDirectory($temp);

        foreach (['require', 'require-dev'] as $section) {
            foreach ($source[$section] ?? [] as $package => $original) {
                if (!isPackage($package)) {
                    continue;
                }
                $row = [
                    'section' => $section, 'package' => $package, 'original' => $original,
                    'individual' => 'unresolved', 'suggested' => '—',
                    'combined' => '—', 'combined_constraint' => '—',
                ];
                $directory = $temp . '/probes/' . safeName($package);
                makeDirectory($directory);
                writeJson($directory . '/composer.json', composerData($source, [$section, $package]));
                [$code, $output] = resolve($directory, $logs . '/probe-' . safeName($package) . '.txt');
                if ($code === 124 || ($code !== 0 && infrastructureError($output))) {
                    throw new RuntimeException('Composer probe failed to reach repositories or timed out: ' . $package);
                }
                if ($code === 0) {
                    $version = lockedVersion($directory, $package);
                    if ($version === null) {
                        throw new RuntimeException('Composer resolved without locking ' . $package);
                    }
                    $row['individual'] = $version;
                    $row['suggested'] = versionConstraint($version);
                } else {
                    $row['individual'] = 'unresolved (see log)';
                }
                $rows[] = $row;
            }
        }

        $together = $temp . '/combined';
        makeDirectory($together);
        $data = composerData($source);
        writeJson($together . '/composer.json', $data);
        [$code, $output] = resolve($together, $logs . '/combined-star.txt');
        if ($code === 124 || ($code !== 0 && infrastructureError($output))) {
            throw new RuntimeException('Combined resolution failed to reach repositories or timed out.');
        }
        if ($code !== 0) {
            writeReport($out, $rows, 'Combined resolution blocked',
                'Dependencies cannot yet be resolved together on PHP 8.6. See combined-star.txt.',
                'blocked', $phpVersion, $composerVersion);
            return 0;
        }

        foreach ($rows as &$row) {
            $version = lockedVersion($together, $row['package']);
            if ($version === null) {
                throw new RuntimeException('Package missing from combined lockfile: ' . $row['package']);
            }
            $row['combined'] = $version;
            $row['combined_constraint'] = versionConstraint($version);
            $data[$row['section']][$row['package']] = $row['combined_constraint'];
        }
        unset($row);
        writeJson($together . '/composer.json', $data);
        [$code, $output] = resolve($together, $logs . '/combined-constraints.txt');
        if ($code !== 0) {
            if ($code === 124 || infrastructureError($output)) {
                throw new RuntimeException('Could not verify suggested constraints; see log.');
            }
            // Exact versions are a reproducible fallback if the ranges conflict.
            foreach ($rows as &$row) {
                $data[$row['section']][$row['package']] = $row['combined'];
                $row['combined_constraint'] = $row['combined'];
            }
            unset($row);
            writeJson($together . '/composer.json', $data);
            [$code, $output] = resolve($together, $logs . '/combined-exact.txt');
            if ($code !== 0) {
                throw new RuntimeException('Combined graph resolved with * but not with exact versions; see logs.');
            }
        }
        foreach ($rows as &$row) {
            $version = lockedVersion($together, $row['package']);
            if ($version === null) {
                throw new RuntimeException('Package missing from verified combined lockfile: ' . $row['package']);
            }
            $row['combined'] = $version;
        }
        unset($row);

        $project = $temp . '/project';
        copyProject($root, $project);
        copy($together . '/composer.json', $project . '/composer.json');
        copy($together . '/composer.lock', $project . '/composer.lock');
        $installed = readJson($project . '/composer.json');
        $installed['scripts'] = $source['scripts'] ?? [];
        writeJson($project . '/composer.json', $installed);
        foreach (['build/builddoc', 'build/coverage', 'build/coverage-html',
                  'build/dist', 'build/logs', 'build/phpdoc', 'build/phpcsfixer-cache',
                  'build/phpstan-cache', 'build/phpunit-cache', 'build/rector-cache'] as $path) {
            makeDirectory($project . '/' . $path);
        }

        $checks = [
            'install' => ['composer', 'install', '--no-interaction', '--prefer-dist', '--no-progress'],
            'platform' => ['composer', 'check-platform-reqs'],
            'lint' => ['vendor/bin/parallel-lint', 'src', 'tests'],
            'phpstan' => ['php', 'vendor/bin/phpstan', 'analyze', '-c', 'build/phpstan.neon',
                '--autoload-file=vendor/autoload.php', '--no-interaction', '--memory-limit=4G',
                '--error-format=github'],
            'phpunit' => ['vendor/bin/phpunit', '--configuration', 'build/phpunit.xml', '--no-coverage'],
        ];
        foreach ($checks as $name => $command) {
            [$code] = runCommand($command, $project, $logs . '/check-' . $name . '.txt', 1200);
            if ($code !== 0) {
                writeReport($out, $rows, 'InvoiceSuite: ' . $name,
                    $name . ' failed (exit ' . $code . '). See check-' . $name . '.txt.',
                    'failed', $phpVersion, $composerVersion);
                return 1;
            }
        }

        writeReport($out, $rows, 'Ready',
            'All direct dependencies resolve together; install, platform check, lint, PHPStan and PHPUnit pass.',
            'ready', $phpVersion, $composerVersion);
        return 0;
    } catch (Throwable $error) {
        writeReport($out, $rows, 'Infrastructure / setup', $error->getMessage(),
            'error', $phpVersion, $composerVersion);
        return 2;
    } finally {
        removeTree($temp);
    }
}

exit(main());
