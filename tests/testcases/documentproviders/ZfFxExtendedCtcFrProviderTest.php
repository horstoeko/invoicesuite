<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxExtendedCtcFrProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProfiles;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProviderBuilder;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxSerializerHandler;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

final class ZfFxExtendedCtcFrProviderTest extends TestCase
{
    use HandlesXmlTests;

    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();
        $this->assertSame('zffxextendedctcfr', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertArrayHasKey('ContextParameter', $provider->getParameters());
        $this->assertArrayHasKey('AlternativeContextParameters', $provider->getParameters());
        $this->assertArrayHasKey('BusinessProcess', $provider->getParameters());
        $this->assertArrayHasKey('WantsMaximumProfile', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['ContextParameter']);
        $this->assertSame('urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr', $provider->getParameters()['ContextParameter']);

        $this->assertIsArray($provider->getParameters()['AlternativeContextParameters']);
        $this->assertCount(0, $provider->getParameters()['AlternativeContextParameters']);

        $this->assertIsString($provider->getParameters()['BusinessProcess']);
        $this->assertEmpty($provider->getParameters()['BusinessProcess']);

        $this->assertArrayHasKey('PdfXmpName', $provider->getParameters());
        $this->assertSame('EXTENDED', $provider->getParameters()['PdfXmpName']);
        $this->assertArrayHasKey('PdfXmpVersion', $provider->getParameters());
        $this->assertSame('1.0', $provider->getParameters()['PdfXmpVersion']);

        $this->assertIsInt($provider->getParameters()['WantsMaximumProfile']);
        $this->assertSame(InvoiceSuiteZfFxProfiles::EXTENDED->value, $provider->getParameters()['WantsMaximumProfile']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertTrue($provider->getIsPdfSupportAvailable());
        $this->assertCount(4, $provider->getPdfAllowedAttachmentFilenames());
        $this->assertContains('ZUGFeRD-invoice.xml', $provider->getPdfAllowedAttachmentFilenames());
        $this->assertContains('zugferd-invoice.xml', $provider->getPdfAllowedAttachmentFilenames());
        $this->assertContains('factur-x.xml', $provider->getPdfAllowedAttachmentFilenames());
        $this->assertContains('xrechnung.xml', $provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('factur-x.xml', $provider->getPdfDefaultAttachmentFilename());
        $this->assertSame(InvoiceSuiteZffxPdfConstructor::class, $provider->getPdfConstructorClassName());
    }

    public function testXsdParameters(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertTrue($provider->getValidationXsdAvailable());
        $this->assertSame(
            realpath(__DIR__ . '/../../../src/documents/providers/zffx/xsd/FACTUR-X_EXTENDED.xsd'),
            realpath($provider->getValidationXsdFilename())
        );
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuiteZfFxSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('zffx', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableByExtendedCtcFrOnly(): void
    {
        $provider = new InvoiceSuiteZfFxExtendedCtcFrProvider();

        $extendedCtcFrXml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100">
            <rsm:ExchangedDocumentContext>
                <ram:BusinessProcessSpecifiedDocumentContextParameter>
                    <ram:ID>B1</ram:ID>
                </ram:BusinessProcessSpecifiedDocumentContextParameter>
                <ram:GuidelineSpecifiedDocumentContextParameter>
                    <ram:ID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</ram:ID>
                </ram:GuidelineSpecifiedDocumentContextParameter>
            </rsm:ExchangedDocumentContext>
        </rsm:CrossIndustryInvoice>
        XML_WRAP;

        $extendedXml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100">
            <rsm:ExchangedDocumentContext>
                <ram:GuidelineSpecifiedDocumentContextParameter>
                    <ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>
                </ram:GuidelineSpecifiedDocumentContextParameter>
            </rsm:ExchangedDocumentContext>
        </rsm:CrossIndustryInvoice>
        XML_WRAP;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($extendedCtcFrXml));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($extendedXml));
    }

    public function testBuilderInitializesExtendedCtcFrContextWithoutInventingBusinessProcess(): void
    {
        static::$document = new InvoiceSuiteZfFxProviderBuilder(new InvoiceSuiteZfFxExtendedCtcFrProvider());
        static::$document->initDocumentRootObject();

        $this->assertXPathValue(
            '/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID',
            'urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr'
        );
        $this->assertXPathNotExists(
            '/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:BusinessProcessSpecifiedDocumentContextParameter'
        );
    }
}
