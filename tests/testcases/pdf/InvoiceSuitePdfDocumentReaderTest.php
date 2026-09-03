<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxComfortProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use JsonSerializable;

final class InvoiceSuitePdfDocumentReaderTest extends TestCase
{
    public function testCreateFromFile(): void
    {
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($this->getSamplePdfPath());
        $additionalAttachments = $pdfDocumentReader->getAdditionalDocumentAttachments();

        $this->assertSame('zffxcomfort', $pdfDocumentReader->getCurrentDocumentFormatProvider()->getUniqueId());

        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $pdfDocumentReader->getInvoiceDocumentAttachment());
        $this->assertSame('factur-x.xml', $pdfDocumentReader->getInvoiceDocumentAttachment()->getAttachmentFilename());
        $this->assertSame('text/xml', $pdfDocumentReader->getInvoiceDocumentAttachment()->getAttachmentMimeType());
        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsString($pdfDocumentReader->getInvoiceDocumentAttachment()->getAttachmentContent());
        $this->assertStringContainsString('rsm:CrossIndustryInvoice xmlns:rsm', $pdfDocumentReader->getInvoiceDocumentAttachment()->getAttachmentContent());

        $this->assertCount(2, $additionalAttachments);
        $this->arrayHasKey(0);
        $this->arrayHasKey(1);
        $this->assertArrayNotHasKey(2, $additionalAttachments);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $additionalAttachments[0]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $additionalAttachments[1]);
        $this->assertSame('EN16931_Elektron_Aufmass.png', $additionalAttachments[0]->getAttachmentFilename());
        $this->assertSame('EN16931_Elektron_ElektronRapport.pdf', $additionalAttachments[1]->getAttachmentFilename());
        $this->assertSame('image/png', $additionalAttachments[0]->getAttachmentMimeType());
        $this->assertSame('application/pdf', $additionalAttachments[1]->getAttachmentMimeType());
        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsString($additionalAttachments[0]->getAttachmentContent());
        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsString($additionalAttachments[1]->getAttachmentContent());

        $documentReader = $pdfDocumentReader->getDocumentReader();

        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, $documentReader);
    }

    public function testCreateFromFileUsesDetectedProviderForDocumentReader(): void
    {
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($this->getSamplePdfPath());
        $documentReader = $pdfDocumentReader->getDocumentReader();

        $this->assertSame(
            $pdfDocumentReader->getCurrentDocumentFormatProvider()->getUniqueId(),
            $documentReader->getCurrentDocumentFormatProvider()->getUniqueId()
        );
    }

    public function testCreateFromContentWithDocumentFormatProviderRejectsExternalCall(): void
    {
        $this->expectException(InvoiceSuiteInternalMethodCallException::class);
        $this->expectExceptionMessage(InvoiceSuiteDocumentReader::class . '::createFromContentWithDocumentFormatProvider is marked as @internal and may only be called by internal classes.');

        InvoiceSuiteDocumentReader::createFromContentWithDocumentFormatProvider(
            InvoiceSuiteFileUtils::getContentFromFile($this->getSampleXmlPath()),
            new InvoiceSuiteZfFxComfortProvider()
        );
    }

    public function testCreateFromFileWithDocumentFormatProviderRejectsExternalCall(): void
    {
        $this->expectException(InvoiceSuiteInternalMethodCallException::class);
        $this->expectExceptionMessage(InvoiceSuiteDocumentReader::class . '::createFromFileWithDocumentFormatProvider is marked as @internal and may only be called by internal classes.');

        InvoiceSuiteDocumentReader::createFromFileWithDocumentFormatProvider(
            $this->getSampleXmlPath(),
            new InvoiceSuiteZfFxComfortProvider()
        );
    }

    public function testCreateFromNotExistingFile(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTFOUND);
        $this->expectExceptionMessage('notexisting.pdf was not found');

        InvoiceSuitePdfDocumentReader::createFromFile($this->getNotExistingSamplePdfPath());
    }

    public function testCreateFromInvalidFile(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FORMATPROVIDER_NOTFOUND);
        $this->expectExceptionMessage('The format provider with unique id unknown was not found');

        InvoiceSuitePdfDocumentReader::createFromFile($this->getInvalidSamplePdfPath());
    }

    public function testJsonSerializable(): void
    {
        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($this->getSamplePdfPath());

        $this->assertInstanceOf(JsonSerializable::class, $pdfDocumentReader);

        $jsonEncoded = json_encode($pdfDocumentReader);

        $this->assertIsString($jsonEncoded);
        $this->assertStringContainsString('"invoice":', $jsonEncoded);
        $this->assertStringContainsString('"additional":', $jsonEncoded);
        $this->assertStringContainsString('"content":', $jsonEncoded);
        $this->assertStringContainsString('"mimetype":', $jsonEncoded);
        $this->assertStringContainsString('"filename":', $jsonEncoded);

        $jsonDecoded = json_decode($jsonEncoded);

        $this->assertIsObject($jsonDecoded);
        $this->assertObjectHasProperty('invoice', $jsonDecoded);
        $this->assertObjectHasProperty('additional', $jsonDecoded);

        $this->assertIsObject($jsonDecoded->invoice);
        $this->assertObjectHasProperty('content', $jsonDecoded->invoice);
        $this->assertObjectHasProperty('filename', $jsonDecoded->invoice);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded->invoice);

        $this->assertIsArray($jsonDecoded->additional);
        $this->assertArrayHasKey(0, $jsonDecoded->additional);
        $this->assertArrayHasKey(1, $jsonDecoded->additional);
        $this->assertArrayNotHasKey(2, $jsonDecoded->additional);

        $this->assertIsObject($jsonDecoded->additional[0]);
        $this->assertObjectHasProperty('content', $jsonDecoded->additional[0]);
        $this->assertObjectHasProperty('filename', $jsonDecoded->additional[0]);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded->additional[0]);
        $this->assertSame('EN16931_Elektron_Aufmass.png', $jsonDecoded->additional[0]->filename);
        $this->assertSame('image/png', $jsonDecoded->additional[0]->mimetype);

        $this->assertIsObject($jsonDecoded->additional[1]);
        $this->assertObjectHasProperty('content', $jsonDecoded->additional[1]);
        $this->assertObjectHasProperty('filename', $jsonDecoded->additional[1]);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded->additional[1]);
        $this->assertSame('EN16931_Elektron_ElektronRapport.pdf', $jsonDecoded->additional[1]->filename);
        $this->assertSame('application/pdf', $jsonDecoded->additional[1]->mimetype);
    }

    private function getSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'pdf_with_multiple_attachments.pdf'
        );
    }

    private function getSampleXmlPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '02_technical_xml_zffx_comfort.xml'
        );
    }

    private function getNotExistingSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'notexisting.pdf'
        );
    }

    private function getInvalidSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'pdf_plain.pdf'
        );
    }
}
