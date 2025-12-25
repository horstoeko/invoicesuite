<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\compat\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\zugferd\ZugferdDocumentPdfReaderExt;
use horstoeko\zugferd\ZugferdDocumentReader;
use Smalot\PdfParser\Parser;

final class ZugferdPdfDocumentReaderGeneral2Test extends TestCase
{
    public function testReadFromFileWhichDoesNotExist(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        ZugferdDocumentPdfReaderExt::readAndGuessFromFile(__DIR__.'/../../../assets/unknown.pdf');
    }

    public function testReadFromFileWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        ZugferdDocumentPdfReaderExt::readAndGuessFromFile(__DIR__.'/../../../assets/pdf_plain.pdf');
    }

    public function testReadFromFileWhichExistsAndHasValidAttachment(): void
    {
        $document = ZugferdDocumentPdfReaderExt::readAndGuessFromFile(__DIR__.'/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $this->checkDocumentReader($document);
    }

    public function testReadFromContentWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        $pdfContent = file_get_contents(__DIR__.'/../../../assets/pdf_plain.pdf');

        ZugferdDocumentPdfReaderExt::readAndGuessFromContent($pdfContent);
    }

    public function testReadFromContentWhichHasValidAttachment(): void
    {
        $pdfContent = file_get_contents(__DIR__.'/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $document = ZugferdDocumentPdfReaderExt::readAndGuessFromContent($pdfContent);

        $this->checkDocumentReader($document);
    }

    public function testGetXmlFromFileWhichDoesNotExist(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromFile(__DIR__.'/../../../assets/unknown.pdf');
    }

    public function testGetXmlFromFileWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromFile(__DIR__.'/../../../assets/pdf_plain.pdf');
    }

    public function testGetXmlFromFileWhichExistsAndHasValidAttachment(): void
    {
        $xmlString = ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromFile(__DIR__.'/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $this->checkInvoiceDocumentXml($xmlString);
    }

    public function testGetXmlFromContentWhichHasNoValidAttachment(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);

        $pdfContent = file_get_contents(__DIR__.'/../../../assets/pdf_plain.pdf');

        ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromContent($pdfContent);
    }

    public function testGetXmlFromContentWhichHasValidAttachment(): void
    {
        $pdfContent = file_get_contents(__DIR__.'/../../../assets/03_zugferdpdfdocumentreader_3.pdf');

        $xmlString = ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromContent($pdfContent);

        $this->checkInvoiceDocumentXml($xmlString);
    }

    public function testAdditionalAttachments(): void
    {
        // TODO: Remove this if PrinsFrank/pdfparser bug 295 is solved (https://github.com/PrinsFrank/pdfparser/issues/295#issuecomment-3689609315))
        if (!class_exists(Parser::class)) {
            $this->markTestSkipped('Error from another library');

            return;
        }

        $filename = __DIR__.'/../../../assets/03_zugferdpdfdocumentreader_4.pdf';

        $xmlString = ZugferdDocumentPdfReaderExt::getInvoiceDocumentContentFromFile($filename);

        $this->checkInvoiceDocumentXml($xmlString);

        $additionalDocuments = ZugferdDocumentPdfReaderExt::getAdditionalDocumentContentsFromFile($filename);

        $this->checkAdditionalAttachments($additionalDocuments);

        $pdfContent = file_get_contents($filename);
        $additionalDocuments = ZugferdDocumentPdfReaderExt::getAdditionalDocumentContentsFromContent($pdfContent);

        $this->checkAdditionalAttachments($additionalDocuments);
    }

    public function testInvoiceDocumentAndAttachmentsNoStatic(): void
    {
        // TODO: Remove this if PrinsFrank/pdfparser bug 295 is solved (https://github.com/PrinsFrank/pdfparser/issues/295#issuecomment-3689609315))
        if (!class_exists(Parser::class)) {
            $this->markTestSkipped('Error from another library');

            return;
        }

        $pdfReaderExt = ZugferdDocumentPdfReaderExt::fromFile(__DIR__.'/../../../assets/03_zugferdpdfdocumentreader_4.pdf');

        $documentReader = $pdfReaderExt->resolveInvoiceDocumentReader();

        $this->checkDocumentReader($documentReader);

        $xmlString = $pdfReaderExt->resolveInvoiceDocumentContent();

        $this->checkInvoiceDocumentXml($xmlString);

        $additionalDocuments = $pdfReaderExt->resolveAdditionalDocumentContents();

        $this->checkAdditionalAttachments($additionalDocuments);
    }

    private function checkDocumentReader($documentReader): void
    {
        $this->assertNotNull($documentReader);
        $this->assertInstanceOf(ZugferdDocumentReader::class, $documentReader);
    }

    private function checkInvoiceDocumentXml($xmlString): void
    {
        $this->assertNotNull($xmlString);
        $this->assertIsString($xmlString);
        $this->assertStringContainsString("<?xml version='1.0'", $xmlString);
        $this->assertStringContainsString('<rsm:CrossIndustryInvoice', $xmlString);
        $this->assertStringContainsString('</rsm:CrossIndustryInvoice>', $xmlString);
    }

    private function checkAdditionalAttachments($additionalDocuments): void
    {
        $this->assertNotEmpty($additionalDocuments);
        $this->assertCount(2, $additionalDocuments);
        $this->assertArrayHasKey(0, $additionalDocuments);
        $this->assertArrayHasKey(1, $additionalDocuments);
        $this->assertArrayNotHasKey(2, $additionalDocuments);
        $this->assertArrayNotHasKey(3, $additionalDocuments);

        $this->assertIsArray($additionalDocuments[0]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_TYPE, $additionalDocuments[0]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_CONTENT, $additionalDocuments[0]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_FILENAME, $additionalDocuments[0]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_MIMETYPE, $additionalDocuments[0]);
        $this->assertEquals(1, $additionalDocuments[0][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_TYPE]);
        $this->assertEquals('Aufmass.png', $additionalDocuments[0][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_FILENAME]);
        $this->assertEquals('image/png', $additionalDocuments[0][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_MIMETYPE]);

        $this->assertIsArray($additionalDocuments[1]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_TYPE, $additionalDocuments[1]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_CONTENT, $additionalDocuments[1]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_FILENAME, $additionalDocuments[1]);
        $this->assertArrayHasKey(ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_MIMETYPE, $additionalDocuments[1]);
        $this->assertEquals(1, $additionalDocuments[1][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_TYPE]);
        $this->assertEquals('ElektronRapport.pdf', $additionalDocuments[1][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_FILENAME]);
        $this->assertEquals('application/pdf', $additionalDocuments[1][ZugferdDocumentPdfReaderExt::ATTACHMENT_KEY_MIMETYPE]);
    }
}
