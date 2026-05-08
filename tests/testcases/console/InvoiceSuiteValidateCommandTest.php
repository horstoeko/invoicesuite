<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\console;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use RuntimeException;
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
        $this->assertArrayHasKey('status', $decodedOutput);
        $this->assertArrayHasKey('errors', $decodedOutput);
        $this->assertArrayHasKey('warnings', $decodedOutput);
        $this->assertArrayHasKey('infos', $decodedOutput);
        $this->assertArrayHasKey('errormessages', $decodedOutput);
        $this->assertArrayHasKey('warningmessages', $decodedOutput);
        $this->assertArrayHasKey('infomessages', $decodedOutput);
        $this->assertSame('valid', $decodedOutput['status']);
        $this->assertSame(0, $decodedOutput['errors']);
        $this->assertSame(0, $decodedOutput['warnings']);
        $this->assertSame(0, $decodedOutput['infos']);
        $this->assertIsArray($decodedOutput['errormessages']);
        $this->assertIsArray($decodedOutput['warningmessages']);
        $this->assertIsArray($decodedOutput['infomessages']);
        $this->assertCount(0, $decodedOutput['errormessages']);
        $this->assertCount(0, $decodedOutput['warningmessages']);
        $this->assertCount(0, $decodedOutput['infomessages']);
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
        $this->assertArrayHasKey('status', $decodedOutput);
        $this->assertArrayHasKey('errors', $decodedOutput);
        $this->assertArrayHasKey('warnings', $decodedOutput);
        $this->assertArrayHasKey('infos', $decodedOutput);
        $this->assertArrayHasKey('errormessages', $decodedOutput);
        $this->assertArrayHasKey('warningmessages', $decodedOutput);
        $this->assertArrayHasKey('infomessages', $decodedOutput);
        $this->assertSame('invalid', $decodedOutput['status']);
        $this->assertSame(4, $decodedOutput['errors']);
        $this->assertSame(0, $decodedOutput['warnings']);
        $this->assertSame(0, $decodedOutput['infos']);
        $this->assertIsArray($decodedOutput['errormessages']);
        $this->assertIsArray($decodedOutput['warningmessages']);
        $this->assertIsArray($decodedOutput['infomessages']);
        $this->assertCount(4, $decodedOutput['errormessages']);
        $this->assertCount(0, $decodedOutput['warningmessages']);
        $this->assertCount(0, $decodedOutput['infomessages']);
        $this->assertArrayHasKey(0, $decodedOutput['errormessages']);
        $this->assertArrayHasKey(1, $decodedOutput['errormessages']);
        $this->assertArrayHasKey(2, $decodedOutput['errormessages']);
        $this->assertArrayHasKey(3, $decodedOutput['errormessages']);
        $this->assertArrayNotHasKey(4, $decodedOutput['errormessages']);
        $this->assertIsArray($decodedOutput['errormessages'][0]);
        $this->assertArrayHasKey('messageContent', $decodedOutput['errormessages'][0]);
        $this->assertArrayHasKey('messageSeverity', $decodedOutput['errormessages'][0]);
        $this->assertArrayHasKey('messageTimestap', $decodedOutput['errormessages'][0]);
        $this->assertArrayHasKey('messageAdditionalData', $decodedOutput['errormessages'][0]);
        $this->assertStringContainsString("Element '{urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}TypeCode': This element is not expected. Expected is ( {urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100}Description )", (string) $decodedOutput['errormessages'][0]['messageContent']);
        $this->assertStringContainsString('error', (string) $decodedOutput['errormessages'][0]['messageSeverity']);
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

        $this->assertStringContainsString('│ XSD', $commandOutput);
        $this->assertStringContainsString('│ Status', $commandOutput);
        $this->assertStringContainsString('│ Errors', $commandOutput);
        $this->assertStringContainsString('│ Errors   │ 4', $commandOutput);
        $this->assertStringContainsString('│ Warnings', $commandOutput);
        $this->assertStringContainsString('│ Infos', $commandOutput);
        $this->assertStringContainsString('│ invalid', $commandOutput);
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
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/.*is not a XML or JSON file.*/');

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
