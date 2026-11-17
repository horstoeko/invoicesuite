<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use ArrayAccess;
use Countable;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use IteratorAggregate;
use JsonSerializable;
use LogicException;

final class InvoiceSuitePdfExtractorTest extends TestCase
{
    public function testAttachmentConstructorAndAccessors(): void
    {
        $initialContent = '<xml/>';
        $initialFilename = 'invoice.xml';
        $initialMimeType = 'application/xml';

        $attachment = new InvoiceSuitePdfExtractorAttachment($initialContent, $initialFilename, $initialMimeType);

        $this->assertSame($initialContent, $attachment->getAttachmentContent());
        $this->assertSame($initialFilename, $attachment->getAttachmentFilename());
        $this->assertSame($initialMimeType, $attachment->getAttachmentMimeType());

        $newContent = '<rsm:CrossIndustryInvoice/>';
        $newFilename = 'invoice_4711.xml';
        $newMime = 'text/xml';

        $attachment->setAttachmentContent($newContent);
        $attachment->setAttachmentFilename($newFilename);
        $attachment->setAttachmentMimeType($newMime);

        $this->assertSame($newContent, $attachment->getAttachmentContent());
        $this->assertSame($newFilename, $attachment->getAttachmentFilename());
        $this->assertSame($newMime, $attachment->getAttachmentMimeType());
    }

    public function testExtractorFromFileAndTraversals(): void
    {
        $extractor = InvoiceSuitePdfExtractor::fromFile($this->getSamplePdfPath());

        $this->assertInstanceOf(ArrayAccess::class, $extractor);
        $this->assertInstanceOf(Countable::class, $extractor);
        $this->assertInstanceOf(InvoiceSuitePdfExtractor::class, $extractor);
        $this->assertInstanceOf(IteratorAggregate::class, $extractor);

        $this->assertCount(3, $extractor, 'Expected exactly three attachments in the sample PDF.');

        $iterated = 0;

        foreach ($extractor as $index => $iterAttachment) {
            // @phpstan-ignore method.alreadyNarrowedType
            $this->assertIsInt($index);
            $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $iterAttachment);
            ++$iterated;
        }

        $this->assertSame(3, $iterated, 'Iterator should traverse all attachments.');

        $this->assertArrayHasKey(0, $extractor);
        $this->assertArrayHasKey(1, $extractor);
        $this->assertArrayHasKey(2, $extractor);

        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[0]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[1]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[2]);

        $this->assertNotInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor['abc']);
    }

    public function testExtractorArrayAccessSetThrows(): void
    {
        $extractor = InvoiceSuitePdfExtractor::fromFile($this->getSamplePdfPath());

        $this->expectException(LogicException::class);
        $extractor[0] = new InvoiceSuitePdfExtractorAttachment('', '', 'text/plain');
    }

    public function testExtractorArrayAccessUnsetThrows(): void
    {
        $extractor = InvoiceSuitePdfExtractor::fromFile($this->getSamplePdfPath());

        $this->expectException(LogicException::class);
        unset($extractor[0]);
    }

    public function testExtractorToArrayNotReturnsCopy(): void
    {
        $extractor = InvoiceSuitePdfExtractor::fromFile($this->getSamplePdfPath());

        $attachmentsArrayA = $extractor->toArray();
        $attachmentsArrayB = $extractor->toArray();

        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsArray($attachmentsArrayA);
        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsArray($attachmentsArrayB);
        $this->assertSame($attachmentsArrayA, $attachmentsArrayB, 'toArray should not return a copy.');
        $this->assertCount(3, $attachmentsArrayA);
        $this->assertCount(3, $attachmentsArrayB);
        $this->assertArrayHasKey(0, $attachmentsArrayA);
        $this->assertArrayHasKey(1, $attachmentsArrayA);
        $this->assertArrayHasKey(2, $attachmentsArrayA);
        $this->assertArrayHasKey(0, $attachmentsArrayB);
        $this->assertArrayHasKey(1, $attachmentsArrayB);
        $this->assertArrayHasKey(2, $attachmentsArrayB);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayA[0]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayB[0]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayA[1]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayB[1]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayA[2]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $attachmentsArrayB[2]);
    }

    public function testFileNotFound(): void
    {
        $this->expectException(InvoiceSuiteFileNotFoundException::class);
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::FILENOTFOUND);
        $this->expectExceptionMessage('notexisting.pdf was not found');

        InvoiceSuitePdfExtractor::fromFile($this->getNotExistingSamplePdfPath());
    }

    public function testJsonSerializable(): void
    {
        $extractor = InvoiceSuitePdfExtractor::fromFile($this->getSamplePdfPath());

        $this->assertInstanceOf(JsonSerializable::class, $extractor);

        $jsonEncoded = json_encode($extractor);

        $this->assertIsString($jsonEncoded);
        $this->assertStringContainsString('"content":', $jsonEncoded);
        $this->assertStringContainsString('"mimetype":', $jsonEncoded);
        $this->assertStringContainsString('"filename":', $jsonEncoded);

        $jsonDecoded = json_decode($jsonEncoded);

        $this->assertIsArray($jsonDecoded);
        $this->assertArrayHasKey(0, $jsonDecoded);
        $this->assertArrayHasKey(1, $jsonDecoded);
        $this->assertArrayHasKey(2, $jsonDecoded);
        $this->assertArrayNotHasKey(3, $jsonDecoded);

        $this->assertIsObject($jsonDecoded[0]);
        $this->assertObjectHasProperty('content', $jsonDecoded[0]);
        $this->assertObjectHasProperty('filename', $jsonDecoded[0]);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded[0]);
        $this->assertSame('EN16931_Elektron_Aufmass.png', $jsonDecoded[0]->filename);
        $this->assertSame('image/png', $jsonDecoded[0]->mimetype);

        $this->assertIsObject($jsonDecoded[1]);
        $this->assertObjectHasProperty('content', $jsonDecoded[1]);
        $this->assertObjectHasProperty('filename', $jsonDecoded[1]);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded[1]);
        $this->assertSame('EN16931_Elektron_ElektronRapport.pdf', $jsonDecoded[1]->filename);
        $this->assertSame('application/pdf', $jsonDecoded[1]->mimetype);

        $this->assertIsObject($jsonDecoded[2]);
        $this->assertObjectHasProperty('content', $jsonDecoded[2]);
        $this->assertObjectHasProperty('filename', $jsonDecoded[2]);
        $this->assertObjectHasProperty('mimetype', $jsonDecoded[2]);
        $this->assertSame('factur-x.xml', $jsonDecoded[2]->filename);
        $this->assertSame('text/xml', $jsonDecoded[2]->mimetype);
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
}
