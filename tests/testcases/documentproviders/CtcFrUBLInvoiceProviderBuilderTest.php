<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\ctcfr\InvoiceSuiteCtcFrUBLInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\Invoice;
use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

final class CtcFrUBLInvoiceProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    private const CUSTOMIZATION_ID = 'urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr';

    public static function setUpBeforeClass(): void
    {
        static::$document = new InvoiceSuiteCtcFrUBLInvoiceProviderBuilder(new InvoiceSuiteCtcFrUBLInvoiceProvider());
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(static::$document->hasCurrentDocumentFormatProvider());
        $this->assertFalse(static::$document->hasNotCurrentDocumentFormatProvider());
        $this->assertInstanceOf(InvoiceSuiteCtcFrUBLInvoiceProvider::class, static::$document->getCurrentDocumentFormatProvider());
    }

    public function testInitDocumentRootObject(): void
    {
        static::$document->initDocumentRootObject();

        $this->assertInstanceOf(Invoice::class, static::$document->getDocumentRootObject());
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

        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathNotExists('(/ns:Invoice/cbc:CustomizationID)[2]');
        $this->assertXPathNotExists('/ns:Invoice/cbc:ProfileID');
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

        $this->assertXPathValue('/ns:Invoice/cbc:ProfileID', 'B1');
        $this->assertXPathNotExists('(/ns:Invoice/cbc:ProfileID)[2]');
        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathNotExists('(/ns:Invoice/cbc:CustomizationID)[2]');
    }

    public function testSetContextParameterClearsBusinessProcess(): void
    {
        static::$document->setContextParameter(self::CUSTOMIZATION_ID, 'S1');

        $this->assertXPathValue('/ns:Invoice/cbc:ProfileID', 'S1');

        static::$document->setContextParameter(self::CUSTOMIZATION_ID, '');

        $this->assertXPathNotExists('/ns:Invoice/cbc:ProfileID');
        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
    }

    /**
     * UBL-CR-026: a CTC-FR document must not carry the BillingReference DocumentTypeCode,
     * which is what 'AllowInvoiceDocumentReferenceDocumentType' => false suppresses
     */
    public function testDocumentInvoiceReferenceCarriesNoDocumentTypeCode(): void
    {
        static::$document->addDocumentInvoiceReference('REF-1', new DateTime('2026-01-10'), '380');

        $this->assertXPathValue('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'REF-1');
        $this->assertXPathNotExists('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
    }

    /**
     * EXT-FR-FE-197, the date of the purchase order reference BT-13, which AFNOR XP Z12-012
     * defines for EXTENDED FR only and maps to cac:OrderReference/cbc:IssueDate. It is not to be
     * confused with BT-2, the invoice issue date, which is the cbc:IssueDate on the document root.
     * 'AllowBuyerOrderReferenceIssueDate' => true is what enables it.
     */
    public function testDocumentBuyerOrderReferenceCarriesTheIssueDate(): void
    {
        static::$document->setDocumentDate(new DateTime('2026-01-15'));
        static::$document->setDocumentBuyerOrderReference('BO-1', new DateTime('2026-01-05'));

        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:ID', 'BO-1');
        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:IssueDate', '2026-01-05');

        // BT-2 is a different element carrying a different date: the cbc:IssueDate sitting on
        // the document root, not the one inside cac:OrderReference
        $this->assertXPathValue('/ns:Invoice/cbc:IssueDate', '2026-01-15');
    }

    public function testDocumentBuyerOrderReferenceIssueDateRoundTrip(): void
    {
        $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::CTC_FR_UBL_INVOICE);
        $documentBuilder->setDocumentNo('F-2026-000001');
        $documentBuilder->setDocumentDate(new DateTime('2026-01-15'));
        $documentBuilder->setDocumentBuyerOrderReference('BO-1', new DateTime('2026-01-05'));

        $documentReader = $documentBuilder->copyToReader();

        $this->assertTrue($documentReader->firstDocumentBuyerOrderReference());

        $documentReader->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('20260105', $newReferenceDate->format('Ymd'));
    }

    public function testBuildAndDetectRoundTrip(): void
    {
        $documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::CTC_FR_UBL_INVOICE);
        $documentBuilder->setDocumentNo('F-2026-000001');
        $documentBuilder->setDocumentDate(new DateTime('2026-01-15'));
        $documentBuilder->setDocumentCurrency('EUR');

        $documentReader = $documentBuilder->copyToReader();

        $this->assertSame('ctcfrublinvoice', $documentReader->getCurrentDocumentFormatProvider()->getUniqueId());

        // Read the document back through the CTC-FR reader
        $documentReader->getDocumentNo($documentNo);
        $documentReader->getDocumentCurrency($documentCurrency);

        $this->assertSame('F-2026-000001', $documentNo);
        $this->assertSame('EUR', $documentCurrency);

        $documentBuilder->setContextParameter(self::CUSTOMIZATION_ID, 'B1');

        $documentReader = $documentBuilder->copyToReader();

        $this->assertSame('ctcfrublinvoice', $documentReader->getCurrentDocumentFormatProvider()->getUniqueId());
    }

    public function testSetProfileIdDirect(): void
    {
        static::$document->setContextParameter(self::CUSTOMIZATION_ID, 'S1');

        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathValue('/ns:Invoice/cbc:ProfileID', 'S1');

        static::$document->setContextParameterProfileID('B1');

        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathValue('/ns:Invoice/cbc:ProfileID', 'B1');

        static::$document->setContextParameterProfileID('');

        $this->assertXPathValue('/ns:Invoice/cbc:CustomizationID', self::CUSTOMIZATION_ID);
        $this->assertXPathNotExists('/ns:Invoice/cbc:ProfileID');
    }
}
