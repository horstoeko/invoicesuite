<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteDetectCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command detects an XML invoice and returns the provider metadata as JSON.
     *
     * @return void
     */
    public function testCommandDetectsXmlInvoiceAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            '--output-json' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertArrayHasKey('id', $decodedOutput);
        $this->assertIsString($decodedOutput['id']);
        $this->assertSame('zffxcomfort', $decodedOutput['id']);

        $this->assertArrayHasKey('description', $decodedOutput);
        $this->assertIsString($decodedOutput['description']);
        $this->assertStringContainsString('EN 16931', $decodedOutput['description']);

        $this->assertArrayHasKey('error', $decodedOutput);
        $this->assertIsBool($decodedOutput['error']);
        $this->assertFalse($decodedOutput['error']);
    }

    /**
     * Test that the command renders table output for an XML invoice by default.
     *
     * @return void
     */
    public function testCommandDetectsXmlInvoiceAndOutputsTable(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('Info', $commandOutput);
        $this->assertStringContainsString('Value', $commandOutput);
        $this->assertStringContainsString('zffxcomfort', $commandOutput);
        $this->assertStringContainsString('Error', $commandOutput);
    }

    /**
     * Test that the command detects an XML invoice and returns the provider metadata as JSON.
     *
     * @return void
     */
    public function testCommandDetectsPdfInvoiceAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            '--output-json' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertArrayHasKey('id', $decodedOutput);
        $this->assertIsString($decodedOutput['id']);
        $this->assertSame('zffxcomfort', $decodedOutput['id']);

        $this->assertArrayHasKey('description', $decodedOutput);
        $this->assertIsString($decodedOutput['description']);
        $this->assertStringContainsString('EN 16931', $decodedOutput['description']);

        $this->assertArrayHasKey('error', $decodedOutput);
        $this->assertIsBool($decodedOutput['error']);
        $this->assertFalse($decodedOutput['error']);

        $this->assertArrayHasKey('documentAttachmentName', $decodedOutput);
        $this->assertIsString($decodedOutput['documentAttachmentName']);
        $this->assertSame('factur-x.xml', $decodedOutput['documentAttachmentName']);

        $this->assertArrayHasKey('documentAttachmentMimeType', $decodedOutput);
        $this->assertIsString($decodedOutput['documentAttachmentMimeType']);
        $this->assertSame('text/xml', $decodedOutput['documentAttachmentMimeType']);

        $this->assertArrayHasKey('noOfAdditionalAttachments', $decodedOutput);
        $this->assertIsInt($decodedOutput['noOfAdditionalAttachments']);
        $this->assertSame(2, $decodedOutput['noOfAdditionalAttachments']);

        $this->assertArrayHasKey('additionalAttachments', $decodedOutput);
        $this->assertIsArray($decodedOutput['additionalAttachments']);
        $this->assertCount(2, $decodedOutput['additionalAttachments']);

        $this->assertArrayHasKey(0, $decodedOutput['additionalAttachments']);
        $this->assertIsArray($decodedOutput['additionalAttachments']);
        $this->assertArrayHasKey('name', $decodedOutput['additionalAttachments'][0]);
        $this->assertArrayHasKey('mimeType', $decodedOutput['additionalAttachments'][0]);
        $this->assertSame('EN16931_Elektron_Aufmass.png', $decodedOutput['additionalAttachments'][0]['name']);
        $this->assertSame('image/png', $decodedOutput['additionalAttachments'][0]['mimeType']);

        $this->assertArrayHasKey(1, $decodedOutput['additionalAttachments']);
        $this->assertIsArray($decodedOutput['additionalAttachments']);
        $this->assertArrayHasKey('name', $decodedOutput['additionalAttachments'][1]);
        $this->assertArrayHasKey('mimeType', $decodedOutput['additionalAttachments'][1]);
        $this->assertSame('EN16931_Elektron_ElektronRapport.pdf', $decodedOutput['additionalAttachments'][1]['name']);
        $this->assertSame('application/pdf', $decodedOutput['additionalAttachments'][1]['mimeType']);
    }

    /**
     * Test that the command detects an XML invoice and returns the provider metadata as JSON.
     *
     * @return void
     */
    public function testCommandDetectsPdfInvoiceAndOutputsTable(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('Info', $commandOutput);
        $this->assertStringContainsString('Value', $commandOutput);
        $this->assertStringContainsString('zffxcomfort', $commandOutput);
        $this->assertStringContainsString('Error', $commandOutput);
        $this->assertStringContainsString('EN16931_Elektron_Aufmass.png', $commandOutput);
        $this->assertStringContainsString('EN16931_Elektron_ElektronRapport.pdf', $commandOutput);
    }

    /**
     * Test that the command renders table output for an XML invoice by default.
     *
     * @return void
     */
    public function testCommandUnknownFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.xml was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('unknown.xml'),
            '--output-json' => true,
        ]);
    }

    /**
     * Test that the command renders table output for an XML invoice by default.
     *
     * @return void
     */
    public function testCommandUnknownTypeAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
            '--output-json' => true,
        ]);

        $this->assertSame(Command::FAILURE, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertArrayHasKey('id', $decodedOutput);
        $this->assertIsString($decodedOutput['id']);
        $this->assertSame('unknown', $decodedOutput['id']);

        $this->assertArrayHasKey('description', $decodedOutput);
        $this->assertIsString($decodedOutput['description']);
        $this->assertStringContainsString('unknown', $decodedOutput['description']);

        $this->assertArrayHasKey('error', $decodedOutput);
        $this->assertIsBool($decodedOutput['error']);
        $this->assertTrue($decodedOutput['error']);
    }

    /**
     * Test that the command renders table output for an XML invoice by default.
     *
     * @return void
     */
    public function testCommandUnknownTypeAndOutputsTable(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
        ]);

        $this->assertSame(Command::FAILURE, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('Info', $commandOutput);
        $this->assertStringContainsString('Value', $commandOutput);
        $this->assertStringContainsString('unknown', $commandOutput);
        $this->assertStringContainsString('Error', $commandOutput);
        $this->assertStringContainsString('Yes', $commandOutput);
    }
}
