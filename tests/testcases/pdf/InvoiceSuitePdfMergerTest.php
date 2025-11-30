<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use Iterator;

final class InvoiceSuitePdfMergerTest extends TestCase
{
    /**
     * Test PDF constellations
     *
     * @param  string $fromXmlFilename
     * @param  string $fromPdfFilename
     * @param  string $toPdfFilename
     * @return void
     *
     * @dataProvider caseProvider
     */
    public function testMergePdfWithXmlTest(string $fromXmlFilename, string $fromPdfFilename, string $toPdfFilename): void
    {
        $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            $fromXmlFilename
        );

        $pdfFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            $fromPdfFilename
        );

        $pdfOutputFilename = InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            $toPdfFilename
        );

        $this->assertFileExists($xmlFilename);
        $this->assertFileExists($pdfFilename);

        $xmlContent = file_get_contents($xmlFilename);
        $pdfContent = file_get_contents($pdfFilename);

        $this->assertNotFalse($xmlContent);
        $this->assertNotFalse($pdfContent);

        $pdfBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfContent($xmlContent, $pdfContent);
        $pdfBuilder->generatePdfDocumentAndSaveToFile($pdfOutputFilename);

        $this->assertFileExists($pdfOutputFilename);

        $pdfExtractor = InvoiceSuitePdfExtractor::fromFile($pdfOutputFilename);

        $this->assertCount(1, $pdfExtractor);
        $this->assertArrayHasKey(0, $pdfExtractor);
        $this->assertArrayNotHasKey(1, $pdfExtractor);
        $this->assertSame('factur-x.xml', $pdfExtractor[0]->getAttachmentFilename());
        $this->assertSame('text/xml', $pdfExtractor[0]->getAttachmentMimeType());
        $this->assertSame($xmlContent, $pdfExtractor[0]->getAttachmentContent());
    }

    /**
     * Provide test cases
     *
     * @return Iterator
     */
    public function caseProvider(): Iterator
    {
        yield 'case1' => ['00_case_comfort_simple.xml', 'pdf_plain.pdf', '00_case_comfort_simple.pdf'];
        yield 'case2' => ['00_case_extended_simple.xml', 'pdf_plain.pdf', '00_case_extended_simple.pdf'];
    }
}
