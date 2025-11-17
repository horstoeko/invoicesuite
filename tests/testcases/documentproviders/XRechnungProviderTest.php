<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\models\zffxcomfort\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\providers\xrechnung\InvoiceSuiteXRechnungProvider;
use horstoeko\invoicesuite\documents\providers\xrechnung\InvoiceSuiteXRechnungProviderBuilder;
use horstoeko\invoicesuite\documents\providers\xrechnung\InvoiceSuiteXRechnungProviderReader;
use horstoeko\invoicesuite\documents\providers\xrechnung\InvoiceSuiteXRechnungSerializerHandler;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\tests\TestCase;

final class XRechnungProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();
        $this->assertSame('xrechnung', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertArrayHasKey('ContextParameter', $provider->getParameters());
        $this->assertArrayHasKey('AlternativeContextParameters', $provider->getParameters());
        $this->assertArrayHasKey('BusinessProcess', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['ContextParameter']);
        $this->assertSame('urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0', $provider->getParameters()['ContextParameter']);

        $this->assertIsArray($provider->getParameters()['AlternativeContextParameters']);
        $this->assertCount(5, $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_1.2', $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.0', $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.1', $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.2', $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:cen.eu:en16931:2017#compliant#urn:xoev-de:kosit:standard:xrechnung_2.3', $provider->getParameters()['AlternativeContextParameters']);

        $this->assertIsString($provider->getParameters()['BusinessProcess']);
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $provider->getParameters()['BusinessProcess']);

        $this->assertArrayHasKey('PdfXmpName', $provider->getParameters());
        $this->assertSame('XRECHNUNG', $provider->getParameters()['PdfXmpName']);
        $this->assertArrayHasKey('PdfXmpVersion', $provider->getParameters());
        $this->assertSame('3.0', $provider->getParameters()['PdfXmpVersion']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertTrue($provider->isPdfSupportAvailable());
        $this->assertCount(1, $provider->getAllowedPdfAttachmentFilenames());
        $this->assertContains('xrechnung.xml', $provider->getAllowedPdfAttachmentFilenames());
        $this->assertSame('xrechnung.xml', $provider->getDefaultPdfAttachmentFilename());
        $this->assertSame(InvoiceSuiteZffxPdfConstructor::class, $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuiteXRechnungSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('zffx', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $xml = <<<'XML'
    <?xml version="1.0" encoding="UTF-8"?>
    <rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:qdt="urn:un:unece:uncefact:data:standard:QualifiedDataType:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <rsm:ExchangedDocumentContext>
            <ram:TestIndicator>
                <udt:Indicator>true</udt:Indicator>
            </ram:TestIndicator>
            <ram:BusinessProcessSpecifiedDocumentContextParameter>
                <ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>
            </ram:BusinessProcessSpecifiedDocumentContextParameter>
            <ram:GuidelineSpecifiedDocumentContextParameter>
                <ram:ID>urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0</ram:ID>
            </ram:GuidelineSpecifiedDocumentContextParameter>
        </rsm:ExchangedDocumentContext>
    </rsm:CrossIndustryInvoice>
    XML;

        $this->assertTrue($provider->isSatisfiableBySerializedContent($xml));

        $xml = <<<'XML'
    <?xml version="1.0" encoding="UTF-8"?>
    <rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:qdt="urn:un:unece:uncefact:data:standard:QualifiedDataType:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <rsm:ExchangedDocumentContext>
            <ram:TestIndicator>
                <udt:Indicator>true</udt:Indicator>
            </ram:TestIndicator>
            <ram:BusinessProcessSpecifiedDocumentContextParameter>
                <ram:ID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</ram:ID>
            </ram:BusinessProcessSpecifiedDocumentContextParameter>
            <ram:GuidelineSpecifiedDocumentContextParameter>
                <ram:ID>urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended</ram:ID>
            </ram:GuidelineSpecifiedDocumentContextParameter>
        </rsm:ExchangedDocumentContext>
    </rsm:CrossIndustryInvoice>
    XML;

        $this->assertFalse($provider->isSatisfiableBySerializedContent($xml));

        $xml = <<<'XML'
    Dummy
    XML;

        $this->assertFalse($provider->isSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertsame(CrossIndustryInvoice::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertsame(InvoiceSuiteXRechnungProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuiteXRechnungProvider();

        $this->assertsame(InvoiceSuiteXRechnungProviderBuilder::class, $provider->getBuilderClassName());
    }
}
