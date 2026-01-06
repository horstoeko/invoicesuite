<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\models\peppol\main\CreditNote;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteSerializerHandler;
use horstoeko\invoicesuite\tests\TestCase;

final class Peppol30CreditNoteProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();
        $this->assertSame('peppol30creditnote', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0', $provider->getParameters()['CustomizationId']);
        $this->assertIsString($provider->getParameters()['ProfileId']);
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $provider->getParameters()['ProfileId']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertFalse($provider->isPdfSupportAvailable());
        $this->assertCount(0, $provider->getAllowedPdfAttachmentFilenames());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuitePeppol30CreditNoteSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:cec="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0</cbc:CustomizationID>
            <cbc:ProfileID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</cbc:ProfileID>
            <cbc:ID>471102</cbc:ID>
            <cbc:IssueDate>2024-11-15</cbc:IssueDate>
        </CreditNote>
        XML_WRAP;

        $this->assertTrue($provider->isSatisfiableBySerializedContent($xml));

        $xml = <<<'XML_WRAP'
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
        XML_WRAP;

        $this->assertFalse($provider->isSatisfiableBySerializedContent($xml));

        $xml = <<<'XML'
    Dummy
    XML;

        $this->assertFalse($provider->isSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertsame(CreditNote::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertsame(InvoiceSuitePeppol30CreditNoteProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30CreditNoteProvider();

        $this->assertsame(InvoiceSuitePeppol30CreditNoteProviderBuilder::class, $provider->getBuilderClassName());
    }
}
