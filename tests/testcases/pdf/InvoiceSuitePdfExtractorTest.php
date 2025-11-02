<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LogicException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class InvoiceSuitePdfExtractorTest extends TestCase
{
    private function getSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets"), "pdf_with_multiple_attachments.pdf");
    }

    private function getNotExistingSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets"), "notexisting.pdf");
    }

    public function testAttachmentConstructorAndAccessors(): void
    {
        $initialContent = '<xml/>';
        $initialFilename = 'invoice.xml';
        $initialMimeType = 'application/xml';

        $attachment = new InvoiceSuitePdfExtractorAttachment($initialContent, $initialFilename, $initialMimeType);

        $this->assertSame($initialContent, $attachment->getAttachmentContent());
        $this->assertSame($initialFilename, $attachment->getAttachmentFilename());
        $this->assertSame($initialMimeType, $attachment->getAttachmentMimeType());

        $newContent  = '<rsm:CrossIndustryInvoice/>';
        $newFilename = 'invoice_4711.xml';
        $newMime     = 'text/xml';

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
            /**
             * @phpstan-ignore method.alreadyNarrowedType
             */
            $this->assertIsInt($index);
            $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $iterAttachment);
            $iterated++;
        }

        $this->assertSame(3, $iterated, 'Iterator should traverse all attachments.');

        $this->assertArrayHasKey(0, $extractor);
        $this->assertArrayHasKey(1, $extractor);
        $this->assertArrayHasKey(2, $extractor);

        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[0]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[1]);
        $this->assertInstanceOf(InvoiceSuitePdfExtractorAttachment::class, $extractor[2]);

        $this->assertNull($extractor["abc"]);
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

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($attachmentsArrayA);
        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
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
}
