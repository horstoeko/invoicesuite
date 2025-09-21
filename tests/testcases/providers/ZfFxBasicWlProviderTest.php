<?php

namespace horstoeko\invoicesuite\tests\testcases\providers;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\models\zffxbasicwl\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProvider;
use horstoeko\invoicesuite\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProviderReader;
use horstoeko\invoicesuite\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlSerializerHandler;
use horstoeko\invoicesuite\providers\zffxbasicwl\InvoiceSuiteZfFxBasicWlProviderBuilder;

class ZfFxBasicWlWlProviderTest extends TestCase
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

        $this->assertArrayHasKey('CONTEXTPARAMETER', $provider->getParameters());
        $this->assertArrayHasKey('ALTERNATIVECONTEXTPARAMETERS', $provider->getParameters());
        $this->assertArrayNotHasKey('BUSINESSPROCESS', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['CONTEXTPARAMETER']);
        $this->assertSame('urn:factur-x.eu:1p0:basicwl', $provider->getParameters()['CONTEXTPARAMETER']);

        $this->assertIsArray($provider->getParameters()['ALTERNATIVECONTEXTPARAMETERS']);
        $this->assertCount(1, $provider->getParameters()['ALTERNATIVECONTEXTPARAMETERS']);
        $this->assertContains('urn:zugferd.de:2p0:basicwl', $provider->getParameters()['ALTERNATIVECONTEXTPARAMETERS']);
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

        $xml = <<<XML
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

        $this->assertTrue($provider->isSatisfiableBy($xml));

        $xml = <<<XML
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

        $this->assertTrue($provider->isSatisfiableBy($xml));

        $xml = <<<XML
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

        $this->assertFalse($provider->isSatisfiableBy($xml));

        $xml = <<<XML
    Dummy
    XML;

        $this->assertFalse($provider->isSatisfiableBy($xml));
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
