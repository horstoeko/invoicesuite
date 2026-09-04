<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLCreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

final class CtcFrUBLCreditNoteProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    private const CUSTOMIZATION_ID = 'urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr';

    public static function setUpBeforeClass(): void
    {
        static::$document = new InvoiceSuiteCtcFrUBLCreditNoteProviderBuilder(new InvoiceSuiteCtcFrUBLCreditNoteProvider());
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(static::$document->hasCurrentDocumentFormatProvider());
        $this->assertFalse(static::$document->hasNotCurrentDocumentFormatProvider());
        $this->assertInstanceOf(InvoiceSuiteCtcFrUBLCreditNoteProvider::class, static::$document->getCurrentDocumentFormatProvider());
    }

    public function testInitDocumentRootObject(): void
    {
        static::$document->initDocumentRootObject();

        $this->assertInstanceOf(CreditNote::class, static::$document->getDocumentRootObject());
    }

    /**
     * The provider supplies no business process, so BT-23 must be absent from the document
     * instead of being emitted as an empty cbc:ProfileID element
     */
    public function testDocumentProfileOmitsBusinessProcess(): void
    {
        // Establish the state this test is about, so it does not depend on the order in
        // which PHPUnit runs the methods sharing static::$document
        static::$document->initDocumentRootObject();

        $this->assertXPathValue('/ns:CreditNote/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:CustomizationID)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:ProfileID');
    }

    /**
     * Building a document without a business process is a legitimate state here, so it must not
     * raise a warning in the message bag
     */
    public function testInitDocumentRootObjectRaisesNoWarning(): void
    {
        $this->assertTrue(static::$document->hasInfoMessagesInMessageBag());
        $this->assertFalse(static::$document->hasWarningMessagesInMessageBag());
        $this->assertFalse(static::$document->hasErrorMessagesInMessageBag());
    }

    public function testSetContextParameterWritesBusinessProcess(): void
    {
        static::$document->setContextParameter(self::CUSTOMIZATION_ID, 'B1');

        $this->assertXPathValue('/ns:CreditNote/cbc:ProfileID', 'B1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:ProfileID)[2]');
        $this->assertXPathValue('/ns:CreditNote/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:CustomizationID)[2]');
    }

    public function testSetContextParameterClearsBusinessProcess(): void
    {
        static::$document->setContextParameter(self::CUSTOMIZATION_ID, 'S1');

        $this->assertXPathValue('/ns:CreditNote/cbc:ProfileID', 'S1');

        static::$document->setContextParameter(self::CUSTOMIZATION_ID, '');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:ProfileID');
        $this->assertXPathValue('/ns:CreditNote/cbc:CustomizationID', self::CUSTOMIZATION_ID);
    }

    /**
     * UBL-CR-026: a CTC-FR document must not carry the BillingReference DocumentTypeCode,
     * which is what 'AllowInvoiceDocumentReferenceDocumentType' => false suppresses
     */
    public function testDocumentInvoiceReferenceCarriesNoDocumentTypeCode(): void
    {
        static::$document->addDocumentInvoiceReference('REF-1', new DateTime('2026-01-10'), '380');

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'REF-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
    }

    public function testBuildAndDetectRoundTrip(): void
    {
        $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::CTC_FR_UBL_CREDIT_NOTE);
        $documentBuilder->setDocumentNo('A-2026-000001');
        $documentBuilder->setDocumentDate(new DateTime('2026-01-15'));
        $documentBuilder->setDocumentCurrency('EUR');

        $documentReader = $documentBuilder->copyToReader();

        $this->assertSame('ctcfrublcreditnote', $documentReader->getCurrentDocumentFormatProvider()->getUniqueId());

        // Read the document back through the CTC-FR reader
        $documentReader->getDocumentNo($documentNo);
        $documentReader->getDocumentCurrency($documentCurrency);

        $this->assertSame('A-2026-000001', $documentNo);
        $this->assertSame('EUR', $documentCurrency);

        $documentBuilder->setContextParameter(self::CUSTOMIZATION_ID, 'B1');

        $documentReader = $documentBuilder->copyToReader();

        $this->assertSame('ctcfrublcreditnote', $documentReader->getCurrentDocumentFormatProvider()->getUniqueId());
    }
}
