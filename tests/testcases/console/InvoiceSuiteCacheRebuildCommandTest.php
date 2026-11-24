<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\utils\InvoiceSuiteCacheUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteCacheRebuildCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command rebuilds InvoiceSuite cache files.
     *
     * @return void
     */
    public function testCommandRebuildsCacheFiles(): void
    {
        $cacheDirectory = InvoiceSuiteCacheUtils::getClassFinderCacheDirectory();
        $cacheFilename = InvoiceSuitePathUtils::combinePathWithFile($cacheDirectory, '0660b1d1e91ef69c1c64a343f40429ba.cache');
        $obsoleteCacheFilename = InvoiceSuitePathUtils::combinePathWithFile($cacheDirectory, 'console-command-test.cache');

        $this->registerFileForTestMethodTeardown($cacheFilename);
        $this->registerFileForTestMethodTeardown($obsoleteCacheFilename);

        if (!is_dir($cacheDirectory)) {
            mkdir($cacheDirectory, recursive: true);
        }

        InvoiceSuiteClassFinder::clearCache();
        file_put_contents($obsoleteCacheFilename, 'test');

        $this->assertFileDoesNotExist($cacheFilename);
        $this->assertFileExists($obsoleteCacheFilename);

        $commandTester = $this->createCommandTester('invoicesuite:cache:rebuild');

        $exitCode = $commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileExists($cacheFilename);
        $this->assertFileDoesNotExist($obsoleteCacheFilename);
        $this->assertStringContainsString('Cache rebuilt.', $commandTester->getDisplay());
        $this->assertStringContainsString('document format providers found.', $commandTester->getDisplay());
    }

    /**
     * Test that the command restricts discovery to the given namespace.
     *
     * @return void
     */
    public function testCommandRebuildsCacheFilesWithNamespaceFilter(): void
    {
        $namespace = 'horstoeko\invoicesuite\documents\providers\peppol';
        $cacheFilename = InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuiteCacheUtils::getClassFinderCacheDirectory(), 'd6de4b6b8bd85fc2e85c9e63db10674b.cache');

        $this->registerFileForTestMethodTeardown($cacheFilename);

        InvoiceSuiteClassFinder::clearCache();

        $commandTester = $this->createCommandTester('invoicesuite:cache:rebuild');

        $exitCode = $commandTester->execute([
            '--discovery-namespace' => [$namespace],
        ]);

        InvoiceSuiteSettings::setDefaultDiscoveryNamespaces();

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileExists($cacheFilename);
        $this->assertStringContainsString('Cache rebuilt. 2 document format providers found.', $commandTester->getDisplay());
    }
}
