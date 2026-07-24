<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use RuntimeException;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteExportPdfAttachmentsCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command exports all PDF attachments to a target directory.
     *
     * @return void
     */
    public function testCommandExportsAttachmentsToDirectory(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_directory_%s', str_replace('.', '', uniqid('', true))));
        $invoiceAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_invoice_factur-x.xml');
        $firstAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_additional_EN16931_Elektron_Aufmass.png');
        $secondAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '02_additional_EN16931_Elektron_ElektronRapport.pdf');

        $this->registerFileForTestMethodTeardown($invoiceAttachmentFilename);
        $this->registerFileForTestMethodTeardown($firstAdditionalAttachmentFilename);
        $this->registerFileForTestMethodTeardown($secondAdditionalAttachmentFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $this->assertFileExists($invoiceAttachmentFilename);
        $this->assertFileIsReadable($invoiceAttachmentFilename);
        $this->assertStringContainsString($invoiceAttachmentFilename, $commandTester->getDisplay());

        $this->assertFileExists($firstAdditionalAttachmentFilename);
        $this->assertFileIsReadable($firstAdditionalAttachmentFilename);
        $this->assertStringContainsString($firstAdditionalAttachmentFilename, $commandTester->getDisplay());

        $this->assertFileExists($secondAdditionalAttachmentFilename);
        $this->assertFileIsReadable($secondAdditionalAttachmentFilename);
        $this->assertStringContainsString($secondAdditionalAttachmentFilename, $commandTester->getDisplay());
    }

    /**
     * Test that the command exports all PDF attachments to a JSON file.
     *
     * @return void
     */
    public function testCommandExportsAttachmentsToJsonFile(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_json_file_%s', str_replace('.', '', uniqid('', true))));
        $targetJsonFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, 'pdf_with_multiple_attachments.json');

        $this->registerFileForTestMethodTeardown($targetJsonFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
            '--output-json' => '1',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileExists($targetJsonFilename);
        $this->assertFileIsReadable($targetJsonFilename);
        $this->assertStringContainsString($targetJsonFilename, $commandTester->getDisplay());

        $jsonFileContent = file_get_contents($targetJsonFilename);

        $this->assertNotFalse($jsonFileContent);
        $this->assertJsonExportContainsExpectedAttachments($this->decodeJsonOutput($jsonFileContent));
    }

    /**
     * Test that the command outputs all PDF attachments as JSON on screen.
     *
     * @return void
     */
    public function testCommandOutputsAttachmentsAsJson(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_json_screen_%s', str_replace('.', '', uniqid('', true))));
        $targetJsonFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, 'pdf_with_multiple_attachments.json');

        $this->registerFileForTestMethodTeardown($targetJsonFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
            '--output-json' => '2',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileDoesNotExist($targetJsonFilename);
        $this->assertJsonExportContainsExpectedAttachments($this->decodeJsonOutput($commandTester->getDisplay()));
    }

    /**
     * Test that the command exports all PDF attachments to a JSON file and outputs them on screen.
     *
     * @return void
     */
    public function testCommandExportsAttachmentsToJsonFileAndOutputsJson(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_json_file_screen_%s', str_replace('.', '', uniqid('', true))));
        $targetJsonFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, 'pdf_with_multiple_attachments.json');

        $this->registerFileForTestMethodTeardown($targetJsonFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
            '--output-json' => '3',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertFileExists($targetJsonFilename);
        $this->assertFileIsReadable($targetJsonFilename);

        $jsonFileContent = file_get_contents($targetJsonFilename);

        $this->assertNotFalse($jsonFileContent);
        $this->assertSame($this->decodeJsonOutput($jsonFileContent), $this->decodeJsonOutput($commandTester->getDisplay()));
        $this->assertJsonExportContainsExpectedAttachments($this->decodeJsonOutput($commandTester->getDisplay()));
    }

    /**
     * Test that the command raises an exception if the input PDF file does not exist.
     *
     * @return void
     */
    public function testCommandWithUnknownInputFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.pdf was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('unknown.pdf'),
            'target-directory' => InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_unknown_file_%s', str_replace('.', '', uniqid('', true)))),
        ]);
    }

    /**
     * Test that the command raises an exception if the input file has an invalid MIME type.
     *
     * @return void
     */
    public function testCommandWithInvalidInputFileMimeType(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*is not a PDF file.*/');

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
            'target-directory' => InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_invalid_mime_type_%s', str_replace('.', '', uniqid('', true)))),
        ]);
    }

    /**
     * Test that the command raises an exception if the JSON output mode is invalid.
     *
     * @return void
     */
    public function testCommandWithInvalidJsonOutputMode(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*Invalid value for option "output-json".*/');

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_invalid_json_mode_%s', str_replace('.', '', uniqid('', true)))),
            '--output-json' => '9',
        ]);
    }

    /**
     * Test that the command raises an exception if target attachment files already exist.
     *
     * @return void
     */
    public function testCommandExportToDirectoryWithNoForce(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_no_force_%s', str_replace('.', '', uniqid('', true))));
        $invoiceAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_invoice_factur-x.xml');
        $firstAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_additional_EN16931_Elektron_Aufmass.png');
        $secondAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '02_additional_EN16931_Elektron_ElektronRapport.pdf');

        $this->registerFileForTestMethodTeardown($invoiceAttachmentFilename);
        $this->registerFileForTestMethodTeardown($firstAdditionalAttachmentFilename);
        $this->registerFileForTestMethodTeardown($secondAdditionalAttachmentFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*already exists. Use --force to overwrite.*/');

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
        ]);
    }

    /**
     * Test that the command overwrites existing target attachment files if force is given.
     *
     * @return void
     */
    public function testCommandExportToDirectoryWithForce(): void
    {
        $targetDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), sprintf('pdfattachmentsexport_force_%s', str_replace('.', '', uniqid('', true))));
        $invoiceAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_invoice_factur-x.xml');
        $firstAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '01_additional_EN16931_Elektron_Aufmass.png');
        $secondAdditionalAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile($targetDirectory, '02_additional_EN16931_Elektron_ElektronRapport.pdf');

        $this->registerFileForTestMethodTeardown($invoiceAttachmentFilename);
        $this->registerFileForTestMethodTeardown($firstAdditionalAttachmentFilename);
        $this->registerFileForTestMethodTeardown($secondAdditionalAttachmentFilename);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandTester = $this->createCommandTester('invoicesuite:pdfattachmentsexport');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_with_multiple_attachments.pdf'),
            'target-directory' => $targetDirectory,
            '--force' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);
    }

    /**
     * Assert that the given JSON export contains all expected PDF attachments.
     *
     * @param  array<mixed> $decodedJsonOutput
     * @return void
     */
    private function assertJsonExportContainsExpectedAttachments(
        array $decodedJsonOutput
    ): void {
        $this->assertCount(3, $decodedJsonOutput);

        $this->assertArrayHasKey(0, $decodedJsonOutput);
        $this->assertIsArray($decodedJsonOutput[0]);
        $this->assertSame('invoice', $decodedJsonOutput[0]['type']);
        $this->assertSame(1, $decodedJsonOutput[0]['index']);
        $this->assertSame('factur-x.xml', $decodedJsonOutput[0]['filename']);
        $this->assertSame('text/xml', $decodedJsonOutput[0]['mimeType']);
        $this->assertIsString($decodedJsonOutput[0]['content']);

        $invoiceAttachmentContent = base64_decode($decodedJsonOutput[0]['content'], true);

        $this->assertNotFalse($invoiceAttachmentContent);
        $this->assertStringContainsString('<rsm:CrossIndustryInvoice', $invoiceAttachmentContent);

        $this->assertArrayHasKey(1, $decodedJsonOutput);
        $this->assertIsArray($decodedJsonOutput[1]);
        $this->assertSame('additional', $decodedJsonOutput[1]['type']);
        $this->assertSame(1, $decodedJsonOutput[1]['index']);
        $this->assertSame('EN16931_Elektron_Aufmass.png', $decodedJsonOutput[1]['filename']);
        $this->assertSame('image/png', $decodedJsonOutput[1]['mimeType']);
        $this->assertIsString($decodedJsonOutput[1]['content']);

        $firstAdditionalAttachmentContent = base64_decode($decodedJsonOutput[1]['content'], true);

        $this->assertNotFalse($firstAdditionalAttachmentContent);
        $this->assertStringStartsWith("\x89PNG", $firstAdditionalAttachmentContent);

        $this->assertArrayHasKey(2, $decodedJsonOutput);
        $this->assertIsArray($decodedJsonOutput[2]);
        $this->assertSame('additional', $decodedJsonOutput[2]['type']);
        $this->assertSame(2, $decodedJsonOutput[2]['index']);
        $this->assertSame('EN16931_Elektron_ElektronRapport.pdf', $decodedJsonOutput[2]['filename']);
        $this->assertSame('application/pdf', $decodedJsonOutput[2]['mimeType']);
        $this->assertIsString($decodedJsonOutput[2]['content']);

        $secondAdditionalAttachmentContent = base64_decode($decodedJsonOutput[2]['content'], true);

        $this->assertNotFalse($secondAdditionalAttachmentContent);
        $this->assertStringStartsWith('%PDF-', $secondAdditionalAttachmentContent);
    }
}
