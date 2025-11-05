<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\pdf;

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\pdfs\abstracts\InvoiceSuiteAbstractPdfConstructor;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfWriter;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class InvoiceSuitePdfDocumentBuilderTest extends TestCase
{
    private function getSampleXmlPath(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets");
    }

    private function getSamplePdfPath(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets");
    }

    private function getSamplePlainPdfFile(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile($this->getSamplePdfPath(), "pdf_plain.pdf");
    }

    public static function profileProvider(): iterable
    {
        return [
            'zffxminimum' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false],
            'zffxbasicwl' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false],
            'zffxbasic' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false],
            'zffxcomfort' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false],
            'zffxextended' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false],
            'zffxminimum2' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', "02_technical_xml_zffx_minimum.xml"],
            'zffxbasicwl2' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', "02_technical_xml_zffx_basicwl.xml"],
            'zffxbasic2' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', "02_technical_xml_zffx_basic.xml"],
            'zffxcomfort2' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', "02_technical_xml_zffx_comfort.xml"],
            'zffxextended2' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', "02_technical_xml_zffx_extended.xml"],
        ];
    }

    /**
     * @dataProvider profileProvider
     */
    public function testZfFxBasicCreateFromDocumentBuilderAndPdfFile(string $expectedProfile, string $expectedXmlContains, $expectedUseOfXmlFile): void
    {
        if ($expectedUseOfXmlFile !== false) {
            $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile($this->getSampleXmlPath(), $expectedUseOfXmlFile);
            $xmlContent = file_get_contents($xmlFilename);
            $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfFile(
                $xmlContent,
                $this->getSamplePlainPdfFile()
            );
        } else {
            $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($expectedProfile);
            $documentBuilder->setDocumentNo('2025-00000001');

            $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentBuilderAndPdfFile(
                $documentBuilder,
                $this->getSamplePlainPdfFile()
            );
        }

        // Provider

        $this->assertSame($expectedProfile, $pdfDOcumentBuilder->getCurrentDocumentFormatProvider()->getUniqueId());

        // PdfConstructor properties

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'currentPdfConstructor');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $propValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $propValue);

        // PdfConstructor methods

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getCurrentPdfConstructor');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $methodValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $methodValue);

        // PdfWriter

        $prop = $this->getPrivatePropertyFromObject($propValue, 'pdfWriter');
        $propValue = $prop->getValue($propValue);

        $this->assertInstanceOf(InvoiceSuiteZffxPdfWriter::class, $propValue);

        // Initial values

        $this->assertSame("", $pdfDOcumentBuilder->getAdditionalCreatorTool());
        $this->assertSame("Data", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $this->assertEmpty($pdfDOcumentBuilder->getaddAdditionalDocument());
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());
        $this->assertSame("", $pdfDOcumentBuilder->getMetaInformationAuthorTemplate());
        $this->assertSame("", $pdfDOcumentBuilder->getMetaInformationKeywordTemplate());
        $this->assertSame("", $pdfDOcumentBuilder->getMetaInformationTitleTemplate());
        $this->assertSame("", $pdfDOcumentBuilder->getMetaInformationSubjectTemplate());
        $this->assertNull($pdfDOcumentBuilder->getMetaInformationCallback());
        $this->assertTrue($pdfDOcumentBuilder->getAttachmentPaneVisibility());

        // Raw Content properties

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'rawDocumentContent');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertStringContainsString($expectedXmlContains, $propValue);

        $prop = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'rawPdfContent');
        $propValue = $prop->getValue($pdfDOcumentBuilder);

        $this->assertStringContainsString("%PDF-1.5", $propValue);

        // Raw content getter-methods

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getRawDocumentContent');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertStringContainsString($expectedXmlContains, $methodValue);

        $method = $this->getPrivateMethodFromObject($pdfDOcumentBuilder, 'getRawPdfContent');
        $methodValue = $method->invoke($pdfDOcumentBuilder);

        $this->assertStringContainsString("%PDF-1.5", $methodValue);

        // Setters

        $pdfDOcumentBuilder->setAdditionalCreatorTool('Some Creator Tool');
        $this->assertSame("Some Creator Tool", $pdfDOcumentBuilder->getAdditionalCreatorTool());

        $pdfDOcumentBuilder->setDocumentRelationshipType('Alternative');
        $this->assertSame("Alternative", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Data');
        $this->assertSame("Data", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Source');
        $this->assertSame("Source", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('unknown');
        $this->assertSame("Data", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToSource();
        $this->assertSame("Source", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToAlternative();
        $this->assertSame("Alternative", $pdfDOcumentBuilder->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipTypeToData();
        $this->assertSame("Data", $pdfDOcumentBuilder->getDocumentRelationshipType());
    }
}
