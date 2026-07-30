<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\peppol\models\main\Invoice;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuInvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuInvoiceSerializerHandler;
use horstoeko\invoicesuite\tests\TestCase;

final class PintEuInvoiceProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertSame('pinteuinvoice', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());
        $this->assertArrayHasKey('AllowInvoiceDocumentReferenceDocumentType', $provider->getParameters());
        $this->assertArrayHasKey('AllowedDocumentTypes', $provider->getParameters());
        $this->assertSame('urn:peppol:pint:billing-1@eu-1', $provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:peppol:bis:billing', $provider->getParameters()['ProfileId']);
        $this->assertFalse($provider->getParameters()['AllowInvoiceDocumentReferenceDocumentType']);
        $this->assertSame([
            '71',
            '80',
            '82',
            '84',
            '102',
            '218',
            '219',
            '331',
            '380',
            '382',
            '383',
            '386',
            '388',
            '393',
            '395',
            '480',
            '553',
            '575',
            '623',
            '780',
            '817',
            '870',
            '875',
            '876',
            '877',
        ], $provider->getParameters()['AllowedDocumentTypes']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertFalse($provider->getIsPdfSupportAvailable());
        $this->assertCount(0, $provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuitePintEuInvoiceSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $xml = <<<'XML'
        <?xml version="1.0" encoding="UTF-8"?>
        <Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
            <cbc:CustomizationID>urn:peppol:pint:billing-1@eu-1</cbc:CustomizationID>
            <cbc:ProfileID>urn:peppol:bis:billing</cbc:ProfileID>
            <cbc:InvoiceTypeCode>380</cbc:InvoiceTypeCode>
        </Invoice>
        XML;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));
        $this->assertTrue($provider->getIsSatisfiableBySerializedContent(str_replace('>380<', '>480<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('>380<', '>389<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('<cbc:InvoiceTypeCode>380</cbc:InvoiceTypeCode>', '', $xml)));

        $xml = <<<'XML'
        Dummy
        XML;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertSame(Invoice::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertSame(InvoiceSuitePintEuInvoiceProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuitePintEuInvoiceProvider();

        $this->assertSame(InvoiceSuitePintEuInvoiceProviderBuilder::class, $provider->getBuilderClassName());
    }
}
