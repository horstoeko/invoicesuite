<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteSerializerHandler;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\tests\TestCase;

final class CtcFrUBLCreditNoteProviderTest extends TestCase
{
    public function testGetUniqueId(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();
        $this->assertSame('ctcfrublcreditnote', $provider->getUniqueId());
    }

    /**
     * The constant list is public API and is not what runtime discovery uses, so nothing
     * else would notice if the provider were dropped from it
     */
    public function testIsRegisteredAsBuiltInProvider(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertSame(InvoiceSuiteBuiltInProviders::CTC_FR_UBL_CREDIT_NOTE, $provider->getUniqueId());
        $this->assertContains($provider->getUniqueId(), InvoiceSuiteBuiltInProviders::all());
    }

    public function testGetDescription(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();
        $this->assertNotEmpty($provider->getDescription());
    }

    public function testGetParameters(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertArrayNotHasKey('ContextParameter', $provider->getParameters());
        $this->assertArrayNotHasKey('AlternativeContextParameters', $provider->getParameters());
        $this->assertArrayNotHasKey('BusinessProcess', $provider->getParameters());
        $this->assertArrayHasKey('CustomizationId', $provider->getParameters());
        $this->assertArrayHasKey('ProfileId', $provider->getParameters());
        $this->assertArrayNotHasKey('AlternativeCustomizationIds', $provider->getParameters());

        $this->assertIsString($provider->getParameters()['CustomizationId']);
        $this->assertSame('urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr', $provider->getParameters()['CustomizationId']);
        $this->assertIsString($provider->getParameters()['ProfileId']);

        // BT-23 is an AFNOR "cadre de facturation" code chosen per document, so the provider
        // supplies no default. The empty value makes the builder omit cbc:ProfileID entirely
        $this->assertSame('', $provider->getParameters()['ProfileId']);

        // UBL-CR-026: a CTC-FR document must not carry the BillingReference DocumentTypeCode
        $this->assertFalse($provider->getParameters()['AllowInvoiceDocumentReferenceDocumentType']);

        $this->assertArrayNotHasKey('AllowedDocumentTypes', $provider->getParameters());

        $this->assertArrayNotHasKey('PdfXmpName', $provider->getParameters());
        $this->assertArrayNotHasKey('PdfXmpVersion', $provider->getParameters());
    }

    public function testPdfParameters(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertFalse($provider->getIsPdfSupportAvailable());
        $this->assertEmpty($provider->getPdfAllowedAttachmentFilenames());
        $this->assertSame('', $provider->getPdfDefaultAttachmentFilename());
        $this->assertSame('', $provider->getPdfConstructorClassName());
    }

    public function testGetSerializerMetadataDirectories(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerMetadataDirectories());
    }

    public function testGetSerializerHandlers(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerHandlers());
        $this->assertContains(InvoiceSuiteCtcFrUBLCreditNoteSerializerHandler::class, $provider->getSerializerHandlers());
    }

    public function testGetSerializerListeners(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerListeners());
    }

    public function testGetSerializerSubscribers(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertEmpty($provider->getSerializerSubscribers());
    }

    public function testGetSerializerGroups(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertCount(1, $provider->getSerializerGroups());
        $this->assertContains('ubl', $provider->getSerializerGroups());
    }

    public function testIsSatisfiableBy(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</cbc:CustomizationID>
            <cbc:ProfileID>B1</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:CreditNoteTypeCode>381</cbc:CreditNoteTypeCode>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</cbc:CustomizationID>
            <cbc:ProfileID>S1</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</cbc:CustomizationID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent($xml));

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0</cbc:CustomizationID>
            <cbc:ProfileID>urn:fdc:peppol.eu:2017:poacc:billing:01:1.0</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));

        // A bare EN 16931 specification identifier must not be claimed: the provider would
        // become too broad, and detection is first-match-wins
        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017</cbc:CustomizationID>
            <cbc:ProfileID>B1</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:CreditNoteTypeCode>381</cbc:CreditNoteTypeCode>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:qdt="urn:un:unece:uncefact:data:standard:QualifiedDataType:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
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

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));

        $xml = <<<'XML'
    Dummy
    XML;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testIsSatisfiableByWithAllowedDocumentTypes(): void
    {
        $provider = new class extends InvoiceSuiteCtcFrUBLCreditNoteProvider {
            /**
             * {@inheritDoc}
             */
            public function getParameters(): array
            {
                return array_merge(parent::getParameters(), ['AllowedDocumentTypes' => ['381']]);
            }
        };

        $xmlTemplate = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</cbc:CustomizationID>
            <cbc:ProfileID>B1</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:CreditNoteTypeCode>%s</cbc:CreditNoteTypeCode>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertTrue($provider->getIsSatisfiableBySerializedContent(sprintf($xmlTemplate, '381')));
        $this->assertFalse($provider->getIsSatisfiableBySerializedContent(sprintf($xmlTemplate, '380')));

        $xml = <<<'XML_WRAP'
        <?xml version="1.0" encoding="UTF-8"?>
        <CreditNote xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2">
            <cbc:CustomizationID>urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr</cbc:CustomizationID>
            <cbc:ProfileID>B1</cbc:ProfileID>
            <cbc:ID>Snippet1</cbc:ID>
            <cbc:IssueDate>2026-11-13</cbc:IssueDate>
            <cbc:DocumentCurrencyCode>EUR</cbc:DocumentCurrencyCode>
        </CreditNote>
        XML_WRAP;

        $this->assertFalse($provider->getIsSatisfiableBySerializedContent($xml));
    }

    public function testGetRootClassName(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertsame(CreditNote::class, $provider->getRootClassName());
    }

    public function testGetReaderClassName(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertsame(InvoiceSuiteCtcFrUBLCreditNoteProviderReader::class, $provider->getReaderClassName());
    }

    public function testGetBuilderClassName(): void
    {
        $provider = new InvoiceSuiteCtcFrUBLCreditNoteProvider();

        $this->assertsame(InvoiceSuiteCtcFrUBLCreditNoteProviderBuilder::class, $provider->getBuilderClassName());
    }
}
