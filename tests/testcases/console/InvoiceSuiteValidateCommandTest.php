<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use Symfony\Component\Console\Command\Command;

final class InvoiceSuiteValidateCommandTest extends InvoiceSuiteConsoleCommandTestCase
{
    /**
     * Test that the command validates the given XML successfully and outputs a JSON
     *
     * @return void
     */
    public function testCommandValidatesXmlAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            '--validator' => 'xsd',
            '--output-json' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertIsArray($decodedOutput);
        $this->assertArrayHasKey('xsd', $decodedOutput);
        $this->assertArrayHasKey('status', $decodedOutput['xsd']);
        $this->assertArrayHasKey('errors', $decodedOutput['xsd']);
        $this->assertArrayHasKey('internalerrors', $decodedOutput['xsd']);
        $this->assertArrayHasKey('warnings', $decodedOutput['xsd']);
        $this->assertArrayHasKey('infos', $decodedOutput['xsd']);
        $this->assertArrayHasKey('errormessages', $decodedOutput['xsd']);
        $this->assertArrayHasKey('warningmessages', $decodedOutput['xsd']);
        $this->assertArrayHasKey('infomessages', $decodedOutput['xsd']);
        $this->assertSame('valid', $decodedOutput['xsd']['status']);
        $this->assertSame(0, $decodedOutput['xsd']['errors']);
        $this->assertSame(0, $decodedOutput['xsd']['internalerrors']);
        $this->assertSame(0, $decodedOutput['xsd']['warnings']);
        $this->assertSame(0, $decodedOutput['xsd']['infos']);
        $this->assertIsArray($decodedOutput['xsd']['errormessages']);
        $this->assertIsArray($decodedOutput['xsd']['internalerrormessages']);
        $this->assertIsArray($decodedOutput['xsd']['warningmessages']);
        $this->assertIsArray($decodedOutput['xsd']['infomessages']);
        $this->assertCount(0, $decodedOutput['xsd']['errormessages']);
        $this->assertCount(0, $decodedOutput['xsd']['internalerrormessages']);
        $this->assertCount(0, $decodedOutput['xsd']['warningmessages']);
        $this->assertCount(0, $decodedOutput['xsd']['infomessages']);
    }

    /**
     * Test that a hybrid PDF validates the embedded invoice XML with the same result as the XML file.
     *
     * @return void
     */
    public function testCommandValidatesEmbeddedXmlFromPdf(): void
    {
        $xmlCommandTester = $this->createCommandTester('invoicesuite:validate');
        $pdfCommandTester = $this->createCommandTester('invoicesuite:validate');

        $xmlExitCode = $xmlCommandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            '--validator' => 'xsd',
            '--output-json' => true,
        ]);
        $pdfExitCode = $pdfCommandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.pdf'),
            '--validator' => 'xsd',
            '--output-json' => true,
        ]);

        $this->assertSame(Command::SUCCESS, $xmlExitCode);
        $this->assertSame(Command::SUCCESS, $pdfExitCode);
        $this->assertSame($this->decodeJsonOutput($xmlCommandTester->getDisplay()), $this->decodeJsonOutput($pdfCommandTester->getDisplay()));
    }

    /**
     * Test that a PDF without an embedded invoice cannot be validated as an invoice.
     *
     * @return void
     */
    public function testCommandRejectsPdfWithoutInvoiceAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');

        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('pdf_plain.pdf'),
            '--validator' => 'xsd',
        ]);
    }

    /**
     * Test that the command validates the given XML successfully and outputs a table
     *
     * @return void
     */
    public function testCommandValidatesXmlAndOutputsTable(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            '--validator' => 'xsd',
        ]);

        $this->assertSame(Command::SUCCESS, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('│ XSD', $commandOutput);
        $this->assertStringContainsString('│ Status', $commandOutput);
        $this->assertStringContainsString('│ Errors', $commandOutput);
        $this->assertStringContainsString('│ Warnings', $commandOutput);
        $this->assertStringContainsString('│ Infos', $commandOutput);
        $this->assertStringContainsString('│ valid', $commandOutput);
    }

    /**
     * Test that the command validates the given XML successfully and outputs a JSON
     *
     * @return void
     */
    public function testCommandValidatesInvalidXmlAndOutputsJson(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('02_technical_xml_zffx_comfort.xml'),
            '--validator' => 'xsd',
            '--output-json' => true,
        ]);

        $this->assertSame(Command::FAILURE, $exitCode);

        $decodedOutput = $this->decodeJsonOutput($commandTester->getDisplay());

        $this->assertIsArray($decodedOutput);
        $this->assertArrayHasKey('xsd', $decodedOutput);
        $this->assertArrayHasKey('status', $decodedOutput['xsd']);
        $this->assertArrayHasKey('errors', $decodedOutput['xsd']);
        $this->assertArrayHasKey('warnings', $decodedOutput['xsd']);
        $this->assertArrayHasKey('infos', $decodedOutput['xsd']);
        $this->assertArrayHasKey('errormessages', $decodedOutput['xsd']);
        $this->assertArrayHasKey('warningmessages', $decodedOutput['xsd']);
        $this->assertArrayHasKey('infomessages', $decodedOutput['xsd']);
        $this->assertSame('invalid', $decodedOutput['xsd']['status']);
        $this->assertSame(4, $decodedOutput['xsd']['errors']);
        $this->assertSame(0, $decodedOutput['xsd']['warnings']);
        $this->assertSame(0, $decodedOutput['xsd']['infos']);
        $this->assertIsArray($decodedOutput['xsd']['errormessages']);
        $this->assertIsArray($decodedOutput['xsd']['warningmessages']);
        $this->assertIsArray($decodedOutput['xsd']['infomessages']);
        $this->assertCount(4, $decodedOutput['xsd']['errormessages']);
        $this->assertCount(0, $decodedOutput['xsd']['warningmessages']);
        $this->assertCount(0, $decodedOutput['xsd']['infomessages']);
        $this->assertArrayHasKey(0, $decodedOutput['xsd']['errormessages']);
        $this->assertArrayHasKey(1, $decodedOutput['xsd']['errormessages']);
        $this->assertArrayHasKey(2, $decodedOutput['xsd']['errormessages']);
        $this->assertArrayHasKey(3, $decodedOutput['xsd']['errormessages']);
        $this->assertArrayNotHasKey(4, $decodedOutput['xsd']['errormessages']);
        $this->assertIsArray($decodedOutput['xsd']['errormessages'][0]);
        $this->assertArrayHasKey('messageContent', $decodedOutput['xsd']['errormessages'][0]);
        $this->assertArrayHasKey('messageSeverity', $decodedOutput['xsd']['errormessages'][0]);
        $this->assertArrayHasKey('messageTimestap', $decodedOutput['xsd']['errormessages'][0]);
        $this->assertArrayHasKey('messageAdditionalData', $decodedOutput['xsd']['errormessages'][0]);
        $this->assertStringContainsString("Element '{urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}TypeCode': This element is not expected. Expected is ( {urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}Description )", (string) $decodedOutput['xsd']['errormessages'][0]['messageContent']);
        $this->assertStringContainsString('error', (string) $decodedOutput['xsd']['errormessages'][0]['messageSeverity']);
    }

    /**
     * Test that the command validates the given XML successfully and outputs a table
     *
     * @return void
     */
    public function testCommandValidatesInvalidXmlAndOutputsTable(): void
    {
        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $exitCode = $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('02_technical_xml_zffx_comfort.xml'),
            '--validator' => 'xsd',
        ]);

        $this->assertSame(Command::FAILURE, $exitCode);

        $commandOutput = $commandTester->getDisplay();

        $this->assertStringContainsString('│ Status          │ invalid', $commandOutput);
        $this->assertStringContainsString('│ Errors          │ 4', $commandOutput);
        $this->assertStringContainsString('│ Internal Errors │ 0', $commandOutput);
        $this->assertStringContainsString('│ Warnings        │ 0', $commandOutput);
        $this->assertStringContainsString('│ Infos           │ 0', $commandOutput);
    }

    /**
     * Test that the command with unknown file
     *
     * @return void
     */
    public function testCommandWithUnknownFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionMessageMatches('/.*unknown\.xml was not found.*/');

        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('unknown.xml'),
            '--validator' => 'xsd',
        ]);
    }

    /**
     * Test that the command with unknown mime type
     *
     * @return void
     */
    public function testCommandWithUnknownMimeType(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/.*XML-, JSON oder PDF-File.*/');

        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('99_dummy_attachment_1.dummy'),
            '--validator' => 'xsd',
        ]);
    }

    /**
     * Test that the command with unknown validator
     *
     * @return void
     */
    public function testCommandWithUnknownValidator(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/.*Invalid option value for validator.*/');

        $commandTester = $this->createCommandTester('invoicesuite:validate');

        $commandTester->execute([
            'input-file' => $this->getTestAssetFilePath('00_case_comfort_simple.xml'),
            '--validator' => 'unknown',
        ]);
    }
}
