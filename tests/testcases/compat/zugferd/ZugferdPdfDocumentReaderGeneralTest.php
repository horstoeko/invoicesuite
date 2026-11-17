<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\compat\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\zugferd\ZugferdDocumentPdfReader;
use horstoeko\zugferd\ZugferdDocumentReader;

final class ZugferdPdfDocumentReaderGeneralTest extends TestCase
{
    // ZugferdPdfReader::readAndGuessFromFile

    public function testReadFromFileWhichDoesNotExist(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        ZugferdDocumentPdfReader::readAndGuessFromFile(__DIR__ . '/../../../assets/unknown.pdf');
    }

    public function testReadFromFileWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        ZugferdDocumentPdfReader::readAndGuessFromFile(__DIR__ . '/../../../assets/pdf_plain.pdf');
    }

    public function testReadFromFileWhichExistsAndHasValidAttachment(): void
    {
        $document = ZugferdDocumentPdfReader::readAndGuessFromFile(__DIR__ . '/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $this->assertInstanceOf(ZugferdDocumentReader::class, $document);
    }

    // ZugferdPdfReader::readAndGuessFromContent

    public function testReadFromContentWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        $pdfContent = file_get_contents(__DIR__ . '/../../../assets/pdf_plain.pdf');

        ZugferdDocumentPdfReader::readAndGuessFromContent($pdfContent);
    }

    public function testReadFromContentWhichHasValidAttachment(): void
    {
        $pdfContent = file_get_contents(__DIR__ . '/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $document = ZugferdDocumentPdfReader::readAndGuessFromContent($pdfContent);

        $this->assertInstanceOf(ZugferdDocumentReader::class, $document);
    }

    // ZugferdPdfReader::getXmlFromFile

    public function testGetXmlFromFileWhichDoesNotExist(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        ZugferdDocumentPdfReader::getXmlFromFile(__DIR__ . '/../../../assets/unknown.pdf');
    }

    public function testGetXmlFromFileWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        ZugferdDocumentPdfReader::getXmlFromFile(__DIR__ . '/../../../assets/pdf_plain.pdf');
    }

    public function testGetXmlFromFileWhichExistsAndHasValidAttachment(): void
    {
        $xmlString = ZugferdDocumentPdfReader::getXmlFromFile(__DIR__ . '/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $this->assertStringContainsString("<?xml version='1.0'", $xmlString);
        $this->assertStringContainsString('<rsm:CrossIndustryInvoice', $xmlString);
        $this->assertStringContainsString('</rsm:CrossIndustryInvoice>', $xmlString);
    }

    // ZugferdPdfReader::getXmlFromContent

    public function testGetXmlFromContentWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        $pdfContent = file_get_contents(__DIR__ . '/../../../assets/pdf_plain.pdf');

        ZugferdDocumentPdfReader::getXmlFromContent($pdfContent);
    }

    public function testGetXmlFromContentWhichHasValidAttachment(): void
    {
        $pdfContent = file_get_contents(__DIR__ . '/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $xmlString = ZugferdDocumentPdfReader::getXmlFromContent($pdfContent);

        $this->assertStringContainsString("<?xml version='1.0'", $xmlString);
        $this->assertStringContainsString('<rsm:CrossIndustryInvoice', $xmlString);
        $this->assertStringContainsString('</rsm:CrossIndustryInvoice>', $xmlString);
    }
}
