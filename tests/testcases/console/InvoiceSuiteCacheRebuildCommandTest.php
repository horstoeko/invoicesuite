<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

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
        $cacheFilename = InvoiceSuitePathUtils::combineAllPaths(dirname(__DIR__, 3), 'src', 'cache', 'fb2c9c3d46a7d2650a8813477106ebca.cache');
        $obsoleteCacheFilename = InvoiceSuitePathUtils::combineAllPaths(dirname(__DIR__, 3), 'src', 'cache', 'console-command-test.cache');

        $this->registerFileForTestMethodTeardown($cacheFilename);
        $this->registerFileForTestMethodTeardown($obsoleteCacheFilename);

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
}
