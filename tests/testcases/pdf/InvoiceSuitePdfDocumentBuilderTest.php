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

    public static function zffxProfileProvider(): iterable
    {
        return [
            // First case
            'zffxminimum' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, false],
            'zffxbasicwl' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, false],
            'zffxbasic' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, false],
            'zffxcomfort' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, false],
            'zffxextended' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, false],
            // Second case
            'zffxminimum2' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', "02_technical_xml_zffx_minimum.xml", false],
            'zffxbasicwl2' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', "02_technical_xml_zffx_basicwl.xml", false],
            'zffxbasic2' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', "02_technical_xml_zffx_basic.xml", false],
            'zffxcomfort2' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', "02_technical_xml_zffx_comfort.xml", false],
            'zffxextended2' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', "02_technical_xml_zffx_extended.xml", false],
            // Third case
            'zffxminimum3' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', false, true],
            'zffxbasicwl3' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', false, true],
            'zffxbasic3' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', false, true],
            'zffxcomfort3' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', false, true],
            'zffxextended3' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', false, true],
            // Fourth case
            'zffxminimum4' => ['zffxminimum', '<ram:ID>urn:factur-x.eu:1p0:minimum</ram:ID>', "02_technical_xml_zffx_minimum.xml", true],
            'zffxbasicwl4' => ['zffxbasicwl', '<ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>', "02_technical_xml_zffx_basicwl.xml", true],
            'zffxbasic4' => ['zffxbasic', '<ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>', "02_technical_xml_zffx_basic.xml", true],
            'zffxcomfort4' => ['zffxcomfort', '<ram:ID>urn:cen.eu:en16931:2017</ram:ID>', "02_technical_xml_zffx_comfort.xml", true],
            'zffxextended4' => ['zffxextended', '<ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>', "02_technical_xml_zffx_extended.xml", true],
        ];
    }

    /**
     * @dataProvider zffxProfileProvider
     */
    public function testZfFxPdfBuilder(string $expectedProfile, string $expectedXmlContains, $expectedUseOfXmlFile, bool $expectusePdfContent): void
    {
        if ($expectusePdfContent !== true) {
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
        } else {
            $pdfContent = file_get_contents($this->getSamplePlainPdfFile());
            if ($expectedUseOfXmlFile !== false) {
                $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile($this->getSampleXmlPath(), $expectedUseOfXmlFile);
                $xmlContent = file_get_contents($xmlFilename);
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfContent(
                    $xmlContent,
                    $pdfContent
                );
            } else {
                $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($expectedProfile);
                $documentBuilder->setDocumentNo('2025-00000001');
                $pdfDOcumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentBuilderAndPdfContent(
                    $documentBuilder,
                    $pdfContent
                );
            }
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

        $pdfDOcumentBuilder->setDeterministicMode(true);
        $this->assertTrue($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(false);
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToEnabled();
        $this->assertTrue($pdfDOcumentBuilder->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToDisabled();
        $this->assertFalse($pdfDOcumentBuilder->getDeterministicMode());

        $pdfDOcumentBuilder->setMetaInformationAuthorTemplate('Some author template');
        $this->assertSame("Some author template", $pdfDOcumentBuilder->getMetaInformationAuthorTemplate());

        // PdfConstrucor Getter/Setter

        $propPdfConstructor = $this->getPrivatePropertyFromObject($pdfDOcumentBuilder, 'currentPdfConstructor');
        $propPdfConstructorValue = $propPdfConstructor->getValue($pdfDOcumentBuilder);

        $this->assertInstanceOf(InvoiceSuiteAbstractPdfConstructor::class, $propPdfConstructorValue);
        $this->assertInstanceOf(InvoiceSuiteZffxPdfConstructor::class, $propPdfConstructorValue);

        $this->assertSame("Some Creator Tool", $propPdfConstructorValue->getAdditionalCreatorTool());
        $pdfDOcumentBuilder->setAdditionalCreatorTool('My Creator Tool');
        $this->assertSame("My Creator Tool", $propPdfConstructorValue->getAdditionalCreatorTool());

        $this->assertSame("Data", $propPdfConstructorValue->getDocumentRelationshipType());
        $pdfDOcumentBuilder->setDocumentRelationshipType('Source');
        $this->assertSame("Source", $propPdfConstructorValue->getDocumentRelationshipType());

        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(true);
        $this->assertTrue($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicMode(false);
        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToEnabled();
        $this->assertTrue($propPdfConstructorValue->getDeterministicMode());
        $pdfDOcumentBuilder->setDeterministicModeToDisabled();
        $this->assertFalse($propPdfConstructorValue->getDeterministicMode());

        $this->assertSame("Some author template", $propPdfConstructorValue->getMetaInformationAuthorTemplate());
        $pdfDOcumentBuilder->setMetaInformationAuthorTemplate('My author template');
        $this->assertSame("My author template", $propPdfConstructorValue->getMetaInformationAuthorTemplate());
    }
}
