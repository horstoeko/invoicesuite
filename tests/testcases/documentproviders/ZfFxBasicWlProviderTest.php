<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProvider;
use horstoeko\invoicesuite\documents\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProviderBuilder;
use horstoeko\invoicesuite\documents\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProviderReader;
use horstoeko\invoicesuite\documents\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlSerializerHandler;
use horstoeko\invoicesuite\pdfs\zffx\InvoiceSuiteZffxPdfConstructor;
use horstoeko\invoicesuite\tests\TestCase;

final class ZfFxBasicWlProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();
        $this->assertSame('zffxbasicwl', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertArrayHasKey('ContextParameter', $provider->getParameters());
        $this->assertArrayHasKey('AlternativeContextParameters', $provider->getParameters());
        $this->assertArrayNotHasKey('BusinessProcess', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['ContextParameter']);
        $this->assertSame('urn:factur-x.eu:1p0:basicwl', $provider->getParameters()['ContextParameter']);

        $this->assertIsArray($provider->getParameters()['AlternativeContextParameters']);
        $this->assertCount(1, $provider->getParameters()['AlternativeContextParameters']);
        $this->assertContains('urn:zugferd.de:2p0:basicwl', $provider->getParameters()['AlternativeContextParameters']);

        $this->assertArrayHasKey('PdfXmpName', $provider->getParameters());
        $this->assertSame('BASIC WL', $provider->getParameters()['PdfXmpName']);
        $this->assertArrayHasKey('PdfXmpVersion', $provider->getParameters());
        $this->assertSame('1.0', $provider->getParameters()['PdfXmpVersion']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertTrue($provider->isPdfSupportAvailable());
        $this->assertCount(4, $provider->getAllowedPdfAttachmentFilenames());
        $this->assertContains('ZUGFeRD-invoice.xml', $provider->getAllowedPdfAttachmentFilenames());
        $this->assertContains('zugferd-invoice.xml', $provider->getAllowedPdfAttachmentFilenames());
        $this->assertContains('factur-x.xml', $provider->getAllowedPdfAttachmentFilenames());
        $this->assertContains('xrechnung.xml', $provider->getAllowedPdfAttachmentFilenames());
        $this->assertSame('factur-x.xml', $provider->getDefaultPdfAttachmentFilename());
        $this->assertSame(InvoiceSuiteZffxPdfConstructor::class, $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuiteZfFxBasicWlSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('zffx', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

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
                <ram:ID>urn:factur-x.eu:1p0:basicwl</ram:ID>
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
                <ram:ID>urn:zugferd.de:2p0:basicwl</ram:ID>
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
                <ram:ID>urn:cen.eu:en16931:2017#conformant#urn:zugferd.de:2p0:extended</ram:ID>
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
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertsame(CrossIndustryInvoice::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertsame(InvoiceSuiteZfFxBasicWlProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuiteZfFxBasicWlProvider();

        $this->assertsame(InvoiceSuiteZfFxBasicWlProviderBuilder::class, $provider->getBuilderClassName());
    }
}
