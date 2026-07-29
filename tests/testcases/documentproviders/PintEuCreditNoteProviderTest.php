<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuCreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuCreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\pinteu\InvoiceSuitePintEuCreditNoteSerializerHandler;
use horstoeko\invoicesuite\tests\TestCase;

final class PintEuCreditNoteProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertSame('pinteucreditnote', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());
        $this->assertArrayHasKey('AllowBillingReferenceDocumentType', $provider->getParameters());
        $this->assertArrayHasKey('AllowedDocumentTypes', $provider->getParameters());
        $this->assertSame('urn:peppol:pint:billing-1@eu-1', $provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:peppol:bis:billing', $provider->getParameters()['ProfileId']);
        $this->assertFalse($provider->getParameters()['AllowBillingReferenceDocumentType']);
        $this->assertSame(['81', '83', '381', '396', '532'], $provider->getParameters()['AllowedDocumentTypes']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertFalse($provider->getIsPdfSupportAvailable());
        $this->assertCount(0, $provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuitePintEuCreditNoteSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $xml = <<<'XML'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
            <cbc:CustomizationID>urn:peppol:pint:billing-1@eu-1</cbc:CustomizationID>
            <cbc:ProfileID>urn:peppol:bis:billing</cbc:ProfileID>
            <cbc:CreditNoteTypeCode>381</cbc:CreditNoteTypeCode>
        </CreditNote>
        XML;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));
        $this->assertTrue($provider->getIsSatisfiableBySerializedContent(str_replace('>381<', '>532<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('>381<', '>261<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('<cbc:CreditNoteTypeCode>381</cbc:CreditNoteTypeCode>', '', $xml)));

        $xml = <<<'XML'
        Dummy
        XML;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertSame(CreditNote::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertSame(InvoiceSuitePintEuCreditNoteProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuitePintEuCreditNoteProvider();

        $this->assertSame(InvoiceSuitePintEuCreditNoteProviderBuilder::class, $provider->getBuilderClassName());
    }
}
