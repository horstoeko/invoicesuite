<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteSerializerHandler;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\documents\providers\peppolselfbilling\InvoiceSuitePeppol30SelfBillingCreditNoteProvider;
use horstoeko\invoicesuite\tests\TestCase;

final class Peppol30SelfBillingCreditNoteProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertSame('peppol30selfbillingcreditnote', $provider->getUniqueId());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());
        $this->assertArrayHasKey('AllowBillingReferenceDocumentType', $provider->getParameters());
        $this->assertArrayHasKey('AllowedDocumentTypes', $provider->getParameters());
        $this->assertSame('urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:selfbilling:3.0', $provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:selfbilling:01:1.0', $provider->getParameters()['ProfileId']);
        $this->assertFalse($provider->getParameters()['AllowBillingReferenceDocumentType']);
        $this->assertSame(['261'], $provider->getParameters()['AllowedDocumentTypes']);
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertFalse($provider->getIsPdfSupportAvailable());
        $this->assertCount(0, $provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuitePeppol30CreditNoteSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $xml = <<<'XML'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:selfbilling:3.0</cbc:CustomizationID>
            <cbc:ProfileID>urn:fdc:peppol.eu:2017:poacc:selfbilling:01:1.0</cbc:ProfileID>
            <cbc:CreditNoteTypeCode>261</cbc:CreditNoteTypeCode>
        </CreditNote>
        XML;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('>261<', '>381<', $xml)));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(str_replace('<cbc:CreditNoteTypeCode>261</cbc:CreditNoteTypeCode>', '', $xml)));

        $xml = <<<'XML'
        Dummy
        XML;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertSame(CreditNote::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertSame(InvoiceSuitePeppol30CreditNoteProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuitePeppol30SelfBillingCreditNoteProvider();

        $this->assertSame(InvoiceSuitePeppol30CreditNoteProviderBuilder::class, $provider->getBuilderClassName());
    }
}
