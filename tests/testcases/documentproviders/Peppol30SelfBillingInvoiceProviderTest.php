<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\peppol\models\main\Invoice;
use horstoeko\invoicesuite\documents\providers\peppolselfbilling\InvoiceSuitePeppol30SelfBillingInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\peppolselfbilling\InvoiceSuitePeppol30SelfBillingInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppolselfbilling\InvoiceSuitePeppol30SelfBillingInvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\peppolselfbilling\InvoiceSuitePeppol30SelfBillingInvoiceSerializerHandler;
use horstoeko\invoicesuite\tests\TestCase;

final class Peppol30SelfBillingInvoiceProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertSame('peppol30selfbillinginvoice', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());
        $this->assertArrayHasKey('AllowBillingReferenceDocumentType', $provider->getParameters());
        $this->assertArrayHasKey('AllowedDocumentTypes', $provider->getParameters());
        $this->assertSame('urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:selfbilling:3.0', $provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:selfbilling:01:1.0', $provider->getParameters()['ProfileId']);
        $this->assertFalse($provider->getParameters()['AllowBillingReferenceDocumentType']);
        $this->assertSame(['389', '527'], $provider->getParameters()['AllowedDocumentTypes']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertFalse($provider->getIsPdfSupportAvailable());
        $this->assertCount(0, $provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuitePeppol30SelfBillingInvoiceSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $xml = <<<'XML'
        <?xml version="1.0" encoding="UTF-8"?>
        <Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:selfbilling:3.0</cbc:CustomizationID>
            <cbc:ProfileID>urn:fdc:peppol.eu:2017:poacc:selfbilling:01:1.0</cbc:ProfileID>
            <cbc:InvoiceTypeCode>389</cbc:InvoiceTypeCode>
        </Invoice>
        XML;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));
        $this->assertTrue($provider->getIsSatisfiableBySerializedContent(str_replace('>389<', '>527<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('>389<', '>380<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('<cbc:InvoiceTypeCode>389</cbc:InvoiceTypeCode>', '', $xml)));

        $xml = <<<'XML'
        Dummy
        XML;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertSame(Invoice::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertSame(InvoiceSuitePeppol30SelfBillingInvoiceProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingInvoiceProvider();

        $this->assertSame(InvoiceSuitePeppol30SelfBillingInvoiceProviderBuilder::class, $provider->getBuilderClassName());
    }
}
