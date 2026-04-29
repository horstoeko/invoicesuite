<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use Symfony\Component\Console\Command\Command;

class InvoiceSuiteListProvidersCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command lists available providers and returns the providers metadata as JSON.
     *
     * @return void
     */
    public function testCommandListsProvidersAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:providers:list');

        $exitCode = $commandTester->execute([
            '--output-json' => true,
        ]);

        self::assertSame(Command::SUCCESS, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertIsArray($decodedOutput);
        $this->assertArrayHasKey(0, $decodedOutput);
        $this->assertIsArray($decodedOutput[0]);
        $this->assertArrayHasKey('id', $decodedOutput[0]);
        $this->assertArrayHasKey('description', $decodedOutput[0]);
        $this->assertArrayHasKey('contentType', $decodedOutput[0]);
        $this->assertArrayHasKey('pdfSupportAvailable', $decodedOutput[0]);
        $this->assertArrayHasKey('xsdValidationAvailable', $decodedOutput[0]);
    }

    /**
     * Test that the command lists available providers and renders table output
     *
     * @return void
     */
    public function testCommandListsProvidersAndOutputsTabke(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:providers:list');

        $exitCode = $commandTester->execute([]);

        self::assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        self::assertStringContainsString('│ Provider', $commandOutput);
        self::assertStringContainsString('│ Description', $commandOutput);
        self::assertStringContainsString('│ Content-Type', $commandOutput);
        self::assertStringContainsString('│ PDF', $commandOutput);
        self::assertStringContainsString('│ XSD', $commandOutput);
    }
}
