<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use RuntimeException;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteVisualizeCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the visualizes a given XML or JSON file and outputs a PDF
     *
     * @return void
     */
    public function testCommandVisualizeAsPdf(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.pdf'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.pdf'));
        $this->assertFileIsReadable($this->getTempFilePath('output.pdf'));
        $this->assertStringContainsString($this->getTempFilePath('output.pdf'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.pdf'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringStartsWith('%PDF-', $outputFileContents);
    }

    /**
     * Test that the visualizes a given XML or JSON file and outputs a HTML
     *
     * @return void
     */
    public function testCommandVisualizeAsHtml(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.html'));
        $this->assertFileIsReadable($this->getTempFilePath('output.html'));
        $this->assertStringContainsString($this->getTempFilePath('output.html'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.html'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringContainsString('<body>', $outputFileContents);
        $this->assertStringNotContainsString('<!-- Test Template -->', $outputFileContents);
    }

    /**
     * Test that the visualizes raises an exception because of unknown output format
     *
     * @return void
     */
    public function testCommandVisualizeWithUnknownOutputFormat(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/.*Invalid option value for format "unknown".*/');

        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'unknown',
        ]);
    }

    /**
     * Test that the visualizes raises an exception because the input file does not exist
     *
     * @return void
     */
    public function testCommandVisualizeWithUnknownDocumentFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.xml was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('unknown.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'unknown',
        ]);
    }

    /**
     * Test that the visualizes raises an exception because the output file already exists
     *
     * @return void
     */
    public function testCommandVisualizeWithNoForce(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*already exists. Use --force to overwrite.*/');

        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.html'));
        $this->assertFileIsReadable($this->getTempFilePath('output.html'));
        $this->assertStringContainsString($this->getTempFilePath('output.html'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.html'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringContainsString('<body>', $outputFileContents);

        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
        ]);
    }

    /**
     * Test that the visualizes raises no exception because the force option is givem
     *
     * @return void
     */
    public function testCommandVisualizeWithForce(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.html'));
        $this->assertFileIsReadable($this->getTempFilePath('output.html'));
        $this->assertStringContainsString($this->getTempFilePath('output.html'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.html'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringContainsString('<body>', $outputFileContents);

        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
            '--force' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.html'));
        $this->assertFileIsReadable($this->getTempFilePath('output.html'));
        $this->assertStringContainsString($this->getTempFilePath('output.html'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.html'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringContainsString('<body>', $outputFileContents);
    }

    /**
     * Test that the visualizes a given XML or JSON file and outputs a HTML
     *
     * @return void
     */
    public function testCommandVisualizeAsHtmlWithDifferentTemplate(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:visualize');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            'output-file' => $this->getTempFilePath('output.html'),
            '--format' => 'html',
            '--template' => $this->getTestAssetFilePath('99_visualizer_template.tmpl'),
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertFileExists($this->getTempFilePath('output.html'));
        $this->assertFileIsReadable($this->getTempFilePath('output.html'));
        $this->assertStringContainsString($this->getTempFilePath('output.html'), $commandOutput);

        $outputFileContents = file_get_contents($this->getTempFilePath('output.html'));

        $this->assertNotFalse($outputFileContents);
        $this->assertStringContainsString('<body>', $outputFileContents);
        $this->assertStringContainsString('<!-- Test Template -->', $outputFileContents);
    }
}
