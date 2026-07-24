<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\console\InvoiceSuiteConsoleApplication;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use JsonException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\Console\Tester\CommandTester;

class InvoiceSuiteConsoleCommandTestCase extends TestCase
{
    /**
     * Create a command tester for the given InvoiceSuite command name.
     *
     * @param  string        $commandName
     * @return CommandTester
     *
     * @throws CommandNotFoundException
     * @throws LogicException
     */
    protected function createCommandTester(
        string $commandName
    ): CommandTester {
        $application = new InvoiceSuiteConsoleApplication();
        $application->setAutoExit(false);

        return new CommandTester($application->find($commandName));
    }

    /**
     * Get the absolute path of a test asset.
     *
     * @param  string $assetFilename
     * @return string
     */
    protected function getTestAssetFilePath(
        string $assetFilename
    ): string {
        return InvoiceSuitePathUtils::combineAllPaths(dirname(__DIR__, 2), 'assets', $assetFilename);
    }

    /**
     * Get the absolute path to a temporary file
     *
     * @param  string $filename
     * @return string
     */
    protected function getTempFilePath(
        string $filename
    ): string {
        $absoluteFilename = InvoiceSuitePathUtils::combinePathWithFile(sys_get_temp_dir(), $filename);

        $this->registerFileForTestMethodTeardown($absoluteFilename);

        return $absoluteFilename;
    }

    /**
     * Decode a JSON command output.
     *
     * @param  string              $jsonOutput
     * @return array<string,mixed>
     *
     * @throws JsonException
     */
    protected function decodeJsonOutput(
        string $jsonOutput
    ): array {
        return json_decode(trim($jsonOutput), true, 512, JSON_THROW_ON_ERROR);
    }
}
