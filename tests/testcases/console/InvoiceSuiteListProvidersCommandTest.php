<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteListProvidersCommandTest extends InvoiceSuiteConsoleCommandTestCase
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

        $this->assertSame(Command::SUCCESS, $exitCode);

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

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('│ Provider', $commandOutput);
        $this->assertStringContainsString('│ Description', $commandOutput);
        $this->assertStringContainsString('│ Content-Type', $commandOutput);
        $this->assertStringContainsString('│ PDF', $commandOutput);
        $this->assertStringContainsString('│ XSD', $commandOutput);
    }
}
