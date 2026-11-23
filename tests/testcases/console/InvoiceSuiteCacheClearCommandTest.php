<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\utils\InvoiceSuiteCacheUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteCacheClearCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command clears InvoiceSuite cache files.
     *
     * @return void
     */
    public function testCommandClearsCacheFiles(): void
    {
        $cacheDirectory = InvoiceSuiteCacheUtils::getClassFinderCacheDirectory();
        $cacheFilename = InvoiceSuitePathUtils::combinePathWithFile($cacheDirectory, 'console-command-test.cache');

        $this->registerFileForTestMethodTeardown($cacheFilename);

        if (!is_dir($cacheDirectory)) {
            mkdir($cacheDirectory, recursive: true);
        }

        file_put_contents($cacheFilename, 'test');

        $this->assertFileExists($cacheFilename);

        $commandTester = $this->createCommandTester('invoicesuite:cache:clear');

        $exitCode = $commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileDoesNotExist($cacheFilename);
        $this->assertStringContainsString('Cache cleared.', $commandTester->getDisplay());
    }
}
