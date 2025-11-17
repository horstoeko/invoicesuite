<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

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

        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertNotNull($documentReader);
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

    private function getSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            'pdf_with_multiple_attachments.pdf'
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
