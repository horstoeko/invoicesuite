<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use RuntimeException;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteMergePdfCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command merges PDF and XML successfully
     *
     * @return void
     */
    public function testCommandMerge(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $exitCode = $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.pdf'));
        $this->assertFileIsReadable($this->getTempFilePath('output.pdf'));
        $this->assertStringContainsString($this->getTempFilePath('output.pdf'), $commandOutput);

        $commandTester = $this->createCommandTester('invoicesuite:detect');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTempFilePath('output.pdf'),
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
     * Test that an exception is raised if input document file does not exist
     *
     * @return void
     */
    public function testCommandMergeWithUnknownDocumentFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.xml was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('unknown.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);
    }

    /**
     * Test that an exception is raised if input PDF file does not exist
     *
     * @return void
     */
    public function testCommandMergeWithUnknownPdfFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.pdf was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('unknown.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);
    }

    /**
     * Test that an exception is raised if input document file has invalid mime type
     *
     * @return void
     */
    public function testCommandMergeWithInvalidDocuemntFileMimeType(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*is not a XML or JSON file.*/');

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);
    }

    /**
     * Test that an exception is raised if input PDF file has invalid mime type
     *
     * @return void
     */
    public function testCommandMergeWithInvalidPdfFileMimeType(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*is not a PDF file.*/');

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);
    }

    /**
     * Test that the command merges PDF and XML successfully and raises an exception because output file already exists
     *
     * @return void
     */
    public function testCommandMergeWithNoForce(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*already exists. Use --force to overwrite.*/');

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $exitCode = $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.pdf'));
        $this->assertFileIsReadable($this->getTempFilePath('output.pdf'));
        $this->assertStringContainsString($this->getTempFilePath('output.pdf'), $commandOutput);

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);
    }

    /**
     * Test that the command merges PDF and XML successfully and raises no exception because output file already exists and
     * force option is given
     *
     * @return void
     */
    public function testCommandMergeWithForce(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $exitCode = $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.pdf'));
        $this->assertFileIsReadable($this->getTempFilePath('output.pdf'));
        $this->assertStringContainsString($this->getTempFilePath('output.pdf'), $commandOutput);

        $commandTester = $this->createCommandTester('invoicesuite:merge');

        $exitCode = $commandTester->execute([
            'document-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'pdf-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            'output-file' => $this->getTempFilePath('output.pdf'),
            '--force' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.pdf'));
        $this->assertFileIsReadable($this->getTempFilePath('output.pdf'));
        $this->assertStringContainsString($this->getTempFilePath('output.pdf'), $commandOutput);
    }
}
