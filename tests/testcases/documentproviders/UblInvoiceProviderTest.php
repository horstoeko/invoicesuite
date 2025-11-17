<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\models\ubl\main\Invoice;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceSerializerHandler;
use horstoeko\invoicesuite\tests\TestCase;

final class UblInvoiceProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();
        $this->assertSame('ublinvoice', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertArrayNotHasKey('ContextParameter', $provider->getParameters());
        $this->assertArrayNotHasKey('AlternativeContextParameters', $provider->getParameters());
        $this->assertArrayNotHasKey('BusinessProcess', $provider->getParameters());
        $this->assertArrayHasKey('QuotationDocTypeCode', $provider->getParameters());
        $this->assertArrayHasKey('QuotationDocDescription', $provider->getParameters());
        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['QuotationDocTypeCode']);
        $this->assertSame('325', $provider->getParameters()['QuotationDocTypeCode']);
        $this->assertIsString($provider->getParameters()['QuotationDocDescription']);
        $this->assertSame('Quotation', $provider->getParameters()['QuotationDocDescription']);
        $this->assertIsString($provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:cen.eu:en16931:2017', $provider->getParameters()['CustomizationId']);
        $this->assertIsString($provider->getParameters()['ProfileId']);
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $provider->getParameters()['ProfileId']);

        $this->assertArrayNotHasKey('PdfXmpName', $provider->getParameters());
        $this->assertArrayNotHasKey('PdfXmpVersion', $provider->getParameters());
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertFalse($provider->isPdfSupportAvailable());
        $this->assertEmpty($provider->getAllowedPdfAttachmentFilenames());
        $this->assertSame('', $provider->getDefaultPdfAttachmentFilename());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuiteUblInvoiceSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $xml = <<<'XML'
    <?xml version="1.0" encoding="UTF-8"?>
    <Invoice xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2">
        <cbc:CustomizationID>urn:cen.eu:en16931:2017</cbc:CustomizationID>
        <cbc:ProfileID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</cbc:ProfileID>
        <cbc:ID>Snippet1</cbc:ID>
        <cbc:IssueDate>2017-11-13</cbc:IssueDate>
        <cbc:DueDate>2017-12-01</cbc:DueDate>
        <cbc:InvoiceTypeCode>380</cbc:InvoiceTypeCode>
        <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        <cbc:AccountingCost>4025:123:4343</cbc:AccountingCost>
        <cbc:BuyerReference>0150abc</cbc:BuyerReference>
    </Invoice>
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
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertsame(Invoice::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertsame(InvoiceSuiteUblInvoiceProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuiteUblInvoiceProvider();

        $this->assertsame(InvoiceSuiteUblInvoiceProviderBuilder::class, $provider->getBuilderClassName());
    }
}
