<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

final class XRechnungUBLCreditNoteProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        static::$document = new InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder(new InvoiceSuiteXRechnungUBLCreditNoteProvider());
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(static::$document->hasCurrentDocumentFormatProvider());
        $this->assertFalse(static::$document->hasNotCurrentDocumentFormatProvider());
        $this->assertInstanceOf(InvoiceSuiteXRechnungUBLCreditNoteProvider::class, static::$document->getCurrentDocumentFormatProvider());
    }

    public function testInitDocumentRootObject(): void
    {
        static::$document->initDocumentRootObject();

        $this->assertInstanceOf(CreditNote::class, static::$document->getDocumentRootObject());
    }

    public function testDocumentProfile(): void
    {
        $this->assertXPathValue('/ns:CreditNote/cbc:ProfileID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:ProfileID)[2]');
        $this->assertXPathValue('/ns:CreditNote/cbc:CustomizationID', 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:CustomizationID)[2]');
    }

    public function testSetDocumentNo(): void
    {
        static::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:ID');

        static::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:ID');

        static::$document->setDocumentNo('2025/08-000001');

        $this->assertXPathValue('/ns:CreditNote/cbc:ID', '2025/08-000001');

        static::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:ID');

        static::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:ID');
    }

    public function testSetDocumentType(): void
    {
        static::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');

        static::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');

        static::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::CORRECTED_INVOICE->value);

        $this->assertXPathValue('/ns:CreditNote/cbc:CreditNoteTypeCode', InvoiceSuiteCodelistDocumentTypes::CORRECTED_INVOICE->value);

        static::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');

        static::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');
    }

    public function testSetDocumentDescription(): void
    {
        static::$document->setDocumentType(null);
        static::$document->setDocumentDescription(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');

        static::$document->setDocumentDescription('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');

        static::$document->setDocumentDescription('documentdescription');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:CreditNoteTypeCode');
    }

    public function testSetDocumentLanguage(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentLanguage('de-DE');
        });
    }

    public function testSetDocumentDate(): void
    {
        static::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:IssueDate');

        static::$document->setDocumentDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValue('/ns:CreditNote/cbc:IssueDate', '1970-01-01');

        static::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:IssueDate');
    }

    public function testSetDocumentCompleteDate(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentCompleteDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
        });
    }

    public function testSetDocumentCurrency(): void
    {
        static::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        $this->assertXPathValue('/ns:CreditNote/cbc:DocumentCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        static::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:DocumentCurrencyCode');
    }

    public function testSetDocumentTaxCurrency(): void
    {
        static::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency(InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        $this->assertXPathValue('/ns:CreditNote/cbc:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        static::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:CreditNote/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency('');

        $this->assertXPathNotExists('/ns:CreditNote/cbc:TaxCurrencyCode');
    }

    public function testSetDocumentIsCopy(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentIsCopy(true);
        });
    }

    public function testSetDocumentIsTest(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentIsTest(true);
        });
    }

    public function testSetAddDocumentNote(): void
    {
        static::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:Note');

        static::$document->setDocumentNote('', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:Note');

        static::$document->setDocumentNote('content1', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:Note', 'content1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:Note)[2]');

        static::$document->addDocumentNote('', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:Note', 'content1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:Note)[2]');

        static::$document->addDocumentNote('content2', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:Note', 'content2');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:Note)[2]');

        static::$document->setDocumentNote('content3', 'contentcode3', 'subjectcode3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:Note', 'content3');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:Note)[2]');

        static::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:Note');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:Note)[2]');
    }

    public function testSetAddDocumentBillingPeriod(): void
    {
        static::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');

        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentBillingPeriod((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');

        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');

        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');

        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');

        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:InvoicePeriod/cbc:Description)[2]');
    }

    public function testSetAddDocumentPostingReference(): void
    {
        static::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference('type1', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference('type1', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference(null, 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference('', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->addDocumentPostingReference('type2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->addDocumentPostingReference('type2', 'accountid2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid2');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');

        static::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:AccountingCost', 'accountid1');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:AccountingCost)[2]');
    }

    public function testSetAddDocumentSellerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID');

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID');

        static::$document->setDocumentSellerOrderReference('SO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID', 'SO-1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID)[2]');

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID');

        static::$document->addDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID)[2]');

        static::$document->addDocumentSellerOrderReference('SO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID', 'SO-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID)[2]');

        static::$document->addDocumentSellerOrderReference('SO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID', 'SO-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID)[2]');

        static::$document->setDocumentSellerOrderReference('SO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID', 'SO-3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID)[2]');

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:SalesOrderID');
    }

    public function testSetAddDocumentBuyerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');

        static::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');

        static::$document->setDocumentBuyerOrderReference('BO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:ID', 'BO-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');

        static::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');

        static::$document->addDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');

        static::$document->addDocumentBuyerOrderReference('BO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:ID', 'BO-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');

        static::$document->addDocumentBuyerOrderReference('BO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:ID', 'BO-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');

        static::$document->setDocumentBuyerOrderReference('BO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:ID', 'BO-3');
        $this->assertXPathNotExists('/ns:CreditNote/cac:OrderReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:OrderReference/cbc:IssueDate)[2]');
    }

    public function testSetAddDocumentQuotationReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');

        static::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');

        static::$document->setDocumentQuotationReference('QU-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->addDocumentQuotationReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->addDocumentQuotationReference('QU-2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->addDocumentQuotationReference('QU-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->setDocumentQuotationReference('QU-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->setDocumentQuotationReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');
    }

    public function testSetAddDocumentContractReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');

        static::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');

        static::$document->setDocumentContractReference('CON-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID', 'CON-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');

        static::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentContractReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentContractReference('CON-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID', 'CON-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentContractReference('CON-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID', 'CON-2-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');

        static::$document->setDocumentContractReference('CON-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ContractDocumentReference/cbc:ID', 'CON-3');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ContractDocumentReference/cbc:IssueDate)[2]');
    }

    public function testSetAddDocumentAdditionalReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');

        static::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');

        static::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription');

        static::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');

        static::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]', 'ADD-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]', 'description2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[3]');

        static::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]', 'ADD-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]', 'description2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[3]');

        static::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description1');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]', 'ADD-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]', 'description2');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[3]', 'ADD-2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[3]');
        $this->assertXPathValue('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[3]', 'description2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[4]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[4]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[4]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[4]');

        static::$document->setDocumentAdditionalReference('ADD-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3', 'reftypecode3', 'description3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-3');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');

        static::$document->setDocumentAdditionalReference('ADD-4', (new DateTime())->createFromFormat('d.m.Y', '04.01.1970'), 'typecode4', 'reftypecode4', 'description4', InvoiceSuiteAttachment::fromBinaryString('This is a test', 'test.txt'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-4');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description4');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 'VGhpcyBpcyBhIHRlc3Q=', 'mimeCode', 'text/plain');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 'VGhpcyBpcyBhIHRlc3Q=', 'filename', 'test.txt');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject)[2]');

        static::$document->setDocumentAdditionalReference('ADD-5', (new DateTime())->createFromFormat('d.m.Y', '05.01.1970'), 'typecode5', 'reftypecode5', 'description5', InvoiceSuiteAttachment::fromUrl('http://www.nowhere.all'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-5');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description5');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 'http://www.nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI)[2]');

        static::$document->setDocumentAdditionalReference('ADD-6', (new DateTime())->createFromFormat('d.m.Y', '06.01.1970'), '130', 'reftypecode6', 'description6', InvoiceSuiteAttachment::fromUrl('http://www.nowhere.all'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID', 'ADD-6');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', '130');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription', 'description6');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject');
        $this->assertXPathValue('/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 'http://www.nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cbc:DocumentDescription)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI)[2]');
    }

    public function testSetAddDocumentInvoiceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');

        static::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');

        static::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');

        static::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');

        static::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');

        static::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');

        static::$document->addDocumentInvoiceReference('INVREF-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]', 'INVREF-2');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]', '1970-01-02');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[3]');

        static::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]', 'INVREF-2');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]', '1970-01-02');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[3]');

        static::$document->addDocumentInvoiceReference('INVREF-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-1');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-01');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]', 'INVREF-2');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]', '1970-01-02');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[3]', 'INVREF-2-2');
        $this->assertXPathValue('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[3]', '1970-01-02');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[4]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[4]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[4]');

        static::$document->setDocumentInvoiceReference('INVREF-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 'INVREF-3');
        $this->assertXPathValue('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', '1970-01-03');
        $this->assertXPathNotExists('/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:BillingReference/cac:InvoiceDocumentReference/cbc:DocumentTypeCode)[2]');
    }

    public function testSetAddDocumentProjectReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');

        static::$document->setDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');

        static::$document->setDocumentProjectReference('PROJECT-1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');

        static::$document->setDocumentProjectReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');

        static::$document->setDocumentProjectReference('PROJECT-1', 'Project 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ProjectReference/cbc:ID)[2]');

        static::$document->addDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ProjectReference/cbc:ID)[2]');

        static::$document->addDocumentProjectReference('PROJECT-2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ProjectReference/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ProjectReference/cbc:ID)[2]');
    }

    public function testSetAddDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateCustomerOrderReference('UCOR-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentUltimateCustomerOrderReference('UCOR-2', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
        });
    }

    public function testSetAddDocumentDespatchAdviceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');

        static::$document->setDocumentDespatchAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');

        static::$document->setDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');

        static::$document->setDocumentDespatchAdviceReference('DESPADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID', 'DESPADV-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID', 'DESPADV-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentDespatchAdviceReference('DESPADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID', 'DESPADV-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentDespatchAdviceReference('DESPADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID', 'DESPADV-2-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate)[2]');

        static::$document->setDocumentDespatchAdviceReference('DESPADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID', 'DESPADV-3');
        $this->assertXPathNotExists('/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:DespatchDocumentReference/cbc:IssueDate)[2]');
    }

    public function testSetAddDocumentReceivingAdviceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');

        static::$document->setDocumentReceivingAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');

        static::$document->setDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');

        static::$document->setDocumentReceivingAdviceReference('RECADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID', 'RECADV-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID', 'RECADV-1');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentReceivingAdviceReference('RECADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID', 'RECADV-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate)[2]');

        static::$document->addDocumentReceivingAdviceReference('RECADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID', 'RECADV-2-2');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate)[2]');

        static::$document->setDocumentReceivingAdviceReference('RECADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID', 'RECADV-3');
        $this->assertXPathNotExists('/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:ReceiptDocumentReference/cbc:IssueDate)[2]');
    }

    public function testSetAddDocumentDeliveryNoteReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentDeliveryNoteReference('DEVNOTE-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentDeliveryNoteReference('DEVNOTE-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
        });
    }

    public function testSetDocumentSupplyChainEvent(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        static::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        static::$document->setDocumentSupplyChainEvent((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate', '1970-01-01');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        static::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');
    }

    public function testSetDocumentBuyerReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:BuyerReference');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');

        static::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:BuyerReference');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');

        static::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:BuyerReference');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');

        static::$document->setDocumentBuyerReference('BUYERREF');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cbc:BuyerReference', 'BUYERREF');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');

        static::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:BuyerReference');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');

        static::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cbc:BuyerReference');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:BuyerReference)[2]');
    }

    public function testSetAddDocumentSellerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName('Seller Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Seller Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Seller Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Seller Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerName('Seller Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Seller Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerName('Seller Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Seller Name 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
    }

    public function testSetAddDocumentSellerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerId('Seller Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerId('Seller Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 1');
        $this->assertXPathValue('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Id 2');

        static::$document->setDocumentSellerId('Seller Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentSellerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerGlobalId('Seller Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerGlobalId('Seller Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->addDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->addDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->addDocumentSellerGlobalId('Seller Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->addDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->addDocumentSellerGlobalId('Seller Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]', 'Seller Global Id 2', 'schemeID', '0088');

        static::$document->setDocumentSellerGlobalId('Seller Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');
    }

    public function testSetAddDocumentSellerTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValue('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]', '123456789');
        $this->assertXPathValue('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]', 'VAT');

        static::$document->setDocumentSellerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '999999999');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'FC');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
    }

    public function testSetAddDocumentSellerAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '99999');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 'City');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 'Bavaria');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentSellerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentSellerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '88888');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Adress-Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Adress-Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 'Cityname');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'IR');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 'Waterford');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');
    }

    public function testSetAddDocumentSellerLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');
    }

    public function testSetAddDocumentSellerContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-222-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user2@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Name 3');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '+49-333-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user3@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');
    }

    public function testSetAddDocumentSellerCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');
    }

    public function testSetAddDocumentBuyerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName('Buyer Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentBuyerName('Buyer Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentBuyerName('Buyer Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Name 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
    }

    public function testSetAddDocumentBuyerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerId('Buyer Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerId('Buyer Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerId('Buyer Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentBuyerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerGlobalId('Buyer Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentBuyerGlobalId('Buyer Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Buyer Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentBuyerTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentBuyerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentBuyerTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '999999999');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'FC');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
    }

    public function testSetAddDocumentBuyerAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentBuyerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentBuyerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '99999');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 'City');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 'Bavaria');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentBuyerAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentBuyerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentBuyerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '88888');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Adress-Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Adress-Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 'Cityname');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'IR');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 'Waterford');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');
    }

    public function testSetAddDocumentBuyerLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentBuyerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentBuyerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentBuyerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentBuyerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentBuyerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentBuyerLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 'Company Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');
    }

    public function testSetAddDocumentBuyerContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-111-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentBuyerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name 2');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-222-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user2@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentBuyerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 'Name 3');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', '+49-333-123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user3@nowhere.all');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');
    }

    public function testSetAddDocumentBuyerCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentBuyerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->setDocumentBuyerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentBuyerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        static::$document->addDocumentBuyerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName('TaxRepresentative Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 'TaxRepresentative Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 'TaxRepresentative Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 'TaxRepresentative Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentSellerTaxRepresentativeName('TaxRepresentative Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 'TaxRepresentative Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentSellerTaxRepresentativeName('TaxRepresentative Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 'TaxRepresentative Name 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeId('TaxRepresentative Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeId('TaxRepresentative Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeId('TaxRepresentative Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId('TaxRepresentative Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId('TaxRepresentative Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeGlobalId('TaxRepresentative Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeGlobalId('TaxRepresentative Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeGlobalId('TaxRepresentative Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '123456789');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[3]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', '999999999');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'FC');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerTaxRepresentativeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerTaxRepresentativeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', '99999');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 'Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 'Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 'City');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 'Bavaria');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentSellerTaxRepresentativeAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentSellerTaxRepresentativeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentSellerTaxRepresentativeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', '88888');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 'Adress-Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 'Adress-Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 'Cityname');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'IR');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 'Waterford');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerTaxRepresentativeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerTaxRepresentativeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentSellerTaxRepresentativeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerTaxRepresentativeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerTaxRepresentativeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentSellerTaxRepresentativeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentSellerTaxRepresentativeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentSellerTaxRepresentativeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail)[2]');
    }

    public function testSetAddDocumentSellerTaxRepresentativeCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentSellerTaxRepresentativeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentSellerTaxRepresentativeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxRepresentativeParty/cbc:EndpointID)[2]');
    }

    public function testSetAddDocumentBuyerTaxRepresentativeName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeName('Buyer Tax Representative Name');
            static::$document->addDocumentBuyerTaxRepresentativeName('Buyer Tax Representative Name 2');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeId('Buyer Tax Representative Id 1');
            static::$document->addDocumentBuyerTaxRepresentativeId('Buyer Tax Representative Id 2');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeGlobalId('Buyer Tax Representative Global Id 1', '0088');
            static::$document->addDocumentBuyerTaxRepresentativeGlobalId('Buyer Tax Representative Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeTaxRegistration('VAT', '123456789');
            static::$document->addDocumentBuyerTaxRepresentativeTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentBuyerTaxRepresentativeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentBuyerTaxRepresentativeLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentBuyerTaxRepresentativeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentBuyerTaxRepresentativeCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentBuyerTaxRepresentativeCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentSalesAgentName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentName('SalesAgent Name');
            static::$document->addDocumentSalesAgentName('SalesAgent Name 2');
        });
    }

    public function testSetAddDocumentSalesAgentId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentId('SalesAgent Id 1');
            static::$document->addDocumentSalesAgentId('SalesAgent Id 2');
        });
    }

    public function testSetAddDocumentSalesAgentGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentGlobalId('SalesAgent Global Id 1', '0088');
            static::$document->addDocumentSalesAgentGlobalId('SalesAgent Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentSalesAgentTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentTaxRegistration('VAT', '123456789');
            static::$document->addDocumentSalesAgentTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentSalesAgentAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentSalesAgentAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentSalesAgentLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentSalesAgentLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentSalesAgentContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentSalesAgentContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentSalesAgentCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentSalesAgentCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentBuyerAgentName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentName('BuyerAgent Name');
            static::$document->addDocumentBuyerAgentName('BuyerAgent Name 2');
        });
    }

    public function testSetAddDocumentBuyerAgentId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentId('BuyerAgent Id 1');
            static::$document->addDocumentBuyerAgentId('BuyerAgent Id 2');
        });
    }

    public function testSetAddDocumentBuyerAgentGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentGlobalId('BuyerAgent Global Id 1', '0088');
            static::$document->addDocumentBuyerAgentGlobalId('BuyerAgent Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentBuyerAgentTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentTaxRegistration('VAT', '123456789');
            static::$document->addDocumentBuyerAgentTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentBuyerAgentAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentBuyerAgentAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentBuyerAgentLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentBuyerAgentLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentBuyerAgentContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentBuyerAgentContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentBuyerAgentCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentBuyerAgentCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentProductEndUserName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserName('Product End User Name');
            static::$document->addDocumentProductEndUserName('Product End User Name 2');
        });
    }

    public function testSetAddDocumentProductEndUserId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserId('Product End User Id 1');
            static::$document->addDocumentProductEndUserId('Product End User Id 2');
        });
    }

    public function testSetAddDocumentProductEndUserGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserGlobalId('Product End User Global Id 1', '0088');
            static::$document->addDocumentProductEndUserGlobalId('Product End User Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentProductEndUserTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserTaxRegistration('VAT', '123456789');
            static::$document->addDocumentProductEndUserTaxRegistration('VAT', '999999999');
        });
    }

    public function testSetAddDocumentProductEndUserAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
            static::$document->addDocumentProductEndUserAddress('Adress-Line 1-1', 'Adress-Line 2-2', 'Adress-Line 3-3', '88888', 'Cityname', 'IR', 'Saxony');
        });
    }

    public function testSetAddDocumentProductEndUserLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentProductEndUserLegalOrganisation('8884', '123456789', 'Company Name 2');
        });
    }

    public function testSetAddDocumentProductEndUserContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentProductEndUserContact('Name 2', 'Departement Name 2', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentProductEndUserCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentProductEndUserCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentShipToName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName('Ship To Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Ship To Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Ship To Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Ship To Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentShipToName('Ship To Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Ship To Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentShipToName('Ship To Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Ship To Name 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');
    }

    public function testSetAddDocumentShipToId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToId('Ship To Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToId('Ship To Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToId('Ship To Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');
    }

    public function testSetAddDocumentShipToGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToGlobalId('Ship To Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->addDocumentShipToGlobalId('Ship To Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 'Ship To Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');
    }

    public function testSetAddDocumentShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToTaxRegistration('VAT', '123456789');
            static::$document->addDocumentShipToTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentShipToAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');

        static::$document->setDocumentShipToAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');

        static::$document->setDocumentShipToAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', '99999');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 'Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 'Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 'City');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 'Bavaria');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');

        static::$document->setDocumentShipToAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');

        static::$document->addDocumentShipToAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');

        static::$document->addDocumentShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', '88888');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 'Adress-Line 1');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 'Adress-Line 2');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 'Cityname');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 'IR');
        $this->assertXPathValue('/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 'Waterford');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity)[2]');
    }

    public function testSetAddDocumentShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToLegalOrganisation('8884', '123456789');
            static::$document->addDocumentShipToLegalOrganisation('8884', '123456789');
        });
    }

    public function testSetAddDocumentShipToContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentShipToCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentUltimateShipToName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToName('Ultimate Ship To Name');
            static::$document->addDocumentUltimateShipToName('Ultimate Ship To Name');
        });
    }

    public function testSetAddDocumentUltimateShipToId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToId('Ultimate Ship To Id 1');
            static::$document->addDocumentUltimateShipToId('Ultimate Ship To Id 1');
        });
    }

    public function testSetAddDocumentUltimateShipToGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToGlobalId('Ultimate Ship To Global Id 1', '0088');
            static::$document->addDocumentUltimateShipToGlobalId('Ultimate Ship To Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentUltimateShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToTaxRegistration('VAT', '123456789');
            static::$document->addDocumentUltimateShipToTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentUltimateShipToAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
            static::$document->addDocumentUltimateShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentUltimateShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentUltimateShipToLegalOrganisation('8884', '123456789', 'Company Name');
        });
    }

    public function testSetAddDocumentUltimateShipToContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentUltimateShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentUltimateShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentUltimateShipToCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentShipFromName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromName('Ship From Name');
            static::$document->addDocumentShipFromName('Ship From Name');
        });
    }

    public function testSetAddDocumentShipFromId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromId('Ship From Id 1');
            static::$document->addDocumentShipFromId('Ship From Id 1');
        });
    }

    public function testSetAddDocumentShipFromGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromGlobalId('Ship From Global Id 1', '0088');
            static::$document->addDocumentShipFromGlobalId('Ship From Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentShipFromTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromTaxRegistration('VAT', '123456789');
            static::$document->addDocumentShipFromTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentShipFromAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentShipFromAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
        });
    }

    public function testSetAddDocumentShipFromLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentShipFromLegalOrganisation('8884', '123456789', 'Company Name');
        });
    }

    public function testSetAddDocumentShipFromContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentShipFromContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentShipFromCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentShipFromCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentInvoicerName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerName('Invoicer Name');
            static::$document->addDocumentInvoicerName('Invoicer Name 2');
        });
    }

    public function testSetAddDocumentInvoicerId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerId('Invoicer Id 1');
            static::$document->addDocumentInvoicerId('Invoicer Id 2');
        });
    }

    public function testSetAddDocumentInvoicerGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerGlobalId('Invoicer Global Id 1', '0088');
            static::$document->addDocumentInvoicerGlobalId('Invoicer Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentInvoicerTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerTaxRegistration('VAT', '123456789');
            static::$document->addDocumentInvoicerTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentInvoicerAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentInvoicerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentInvoicerLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentInvoicerLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentInvoicerContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentInvoicerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentInvoicerCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentInvoicerCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentInvoiceeName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeName('Invoicee Name');
            static::$document->addDocumentInvoiceeName('Invoicee Name 2');
        });
    }

    public function testSetAddDocumentInvoiceeId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeId('Invoicee Id 1');
            static::$document->addDocumentInvoiceeId('Invoicee Id 2');
        });
    }

    public function testSetAddDocumentInvoiceeGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeGlobalId('Invoicee Global Id 1', '0088');
            static::$document->addDocumentInvoiceeGlobalId('Invoicee Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentInvoiceeTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeTaxRegistration('VAT', '123456789');
            static::$document->addDocumentInvoiceeTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentInvoiceeAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentInvoiceeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentInvoiceeLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentInvoiceeLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentInvoiceeContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentInvoiceeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentInvoiceeCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentInvoiceeCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentPayeeName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName('Payee Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name', 'Payee Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name', 'Payee Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name', 'Payee Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->addDocumentPayeeName('Payee Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name', 'Payee Name 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');

        static::$document->setDocumentPayeeName('Payee Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name', 'Payee Name 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyName/cbc:Name)[2]');
    }

    public function testSetAddDocumentPayeeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeId('Payee Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeId('Payee Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeId('Payee Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentPayeeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Id 3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeGlobalId('Payee Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->addDocumentPayeeGlobalId('Payee Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 'Payee Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyIdentification/cbc:ID)[2]');
    }

    public function testSetAddDocumentPayeeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPayeeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[3]');

        static::$document->setDocumentPayeeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPayeeTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
    }

    public function testSetAddDocumentPayeeAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentPayeeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentPayeeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->setDocumentPayeeAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentPayeeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');

        static::$document->addDocumentPayeeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity)[2]');
    }

    public function testSetAddDocumentPayeeLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentPayeeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentPayeeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->setDocumentPayeeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', '123456789');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentPayeeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentPayeeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        static::$document->addDocumentPayeeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', '987654321');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
    }

    public function testSetAddDocumentPayeeContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->addDocumentPayeeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');

        static::$document->setDocumentPayeeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cac:Contact/cbc:ElectronicMail)[2]');
    }

    public function testSetAddDocumentPayeeCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentPayeeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->setDocumentPayeeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentPayeeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');

        static::$document->addDocumentPayeeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PayeeParty/cbc:EndpointID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PayeeParty/cbc:EndpointID)[2]');
    }

    public function testSetAddDocumentPayerName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerName('Payer Name');
            static::$document->addDocumentPayerName('Payer Name 2');
        });
    }

    public function testSetAddDocumentPayerId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerId('Payer Id 1');
            static::$document->addDocumentPayerId('Payer Id 2');
        });
    }

    public function testSetAddDocumentPayerGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerGlobalId('Payer Global Id 1', '0088');
            static::$document->addDocumentPayerGlobalId('Payer Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentPayerTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerTaxRegistration('VAT', '123456789');
            static::$document->addDocumentPayerTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentPayerAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentPayerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentPayerLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentPayerLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentPayerContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentPayerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentPayerCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentPayerCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentPaymentMean(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean(
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            'information'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, 'name', 'information');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: '',
            newPayeeAccountName: '',
            newPayeeProprietaryId: '',
            newPayeeBic: '',
            newPaymentReference: ''
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: 'iban',
            newPayeeAccountName: 'accountname',
            newPayeeProprietaryId: 'propid',
            newPayeeBic: 'bic',
            newPaymentReference: 'paymentref'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID', 'paymentref');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 'accountname');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 'bic');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: 'iban',
            newMandate: 'mandate',
            newBuyerAccountName: 'buyeraccountname'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 'mandate');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:Name', 'buyeraccountname');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: 'cardid',
            newFinancialCardHolder: 'cardholder'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 'cardid');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 'mapped-from-cii');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 'cardholder');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->addDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 'cardid');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 'mapped-from-cii');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 'cardholder');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: 'cardid2',
            newFinancialCardHolder: 'cardholder2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 'cardid');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 'mapped-from-cii');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 'cardholder');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID)[2]', 'cardid2');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID)[2]', 'mapped-from-cii');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cac:CardAccount/cbc:HolderName)[2]', 'cardholder2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[3]');

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');
    }

    public function testSetAddDocumentPaymentMeanAsCreditTransferSepa(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban', 'accountname', 'propid', 'bic', 'paymentref');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID', 'paymentref');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 'accountname');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 'bic');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');

        static::$document->addDocumentPaymentMeanAsCreditTransferSepa();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID', 'paymentref');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 'accountname');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 'bic');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[3]');

        static::$document->addDocumentPaymentMeanAsCreditTransferSepa('iban2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID', 'paymentref');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'iban');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 'accountname');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 'bic');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentID)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID)[2]', 'iban2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[3]', InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[4]');
    }

    public function testSetAddDocumentPaymentCreditorReferenceID(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']");
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->setDocumentPaymentCreditorReferenceID();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']");
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->setDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']");
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->setDocumentPaymentCreditorReferenceID('crefref1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 'crefref1');
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->addDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 'crefref1');
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->addDocumentPaymentCreditorReferenceID('crefref2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 'crefref2');
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->setDocumentPaymentCreditorReferenceID();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']");
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        static::$document->setDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']");
        $this->assertXPathNotExists("(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA'])[2]");

        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'Seller Id 3');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', 'Seller Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');

        static::$document->setDocumentPaymentCreditorReferenceID('crefref1');
        static::$document->setDocumentSellerId();
        static::$document->setDocumentSellerGlobalId();

        $this->disableRenderXmlContent();

        $this->assertXPathValue("/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 'crefref1');
        $this->assertXPathValue('/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 'crefref1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[4]');
    }

    public function testSetAddDocumentPaymentTerm(): void
    {
        static::$document->setDocumentPaymentTerm();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms/cbc:Note');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->setDocumentPaymentTerm('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms/cbc:Note');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->setDocumentPaymentTerm('Term');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->addDocumentPaymentTerm();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->addDocumentPaymentTerm('');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->addDocumentPaymentTerm('Term2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term2');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');

        static::$document->addDocumentPaymentTerm('Term3', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'MANDATE-4');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term3');
        $this->assertXPathNotExists('/ns:CreditNote/cbc:DueDate');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cbc:DueDate)[3]');
    }

    public function testSetAddDocumentPaymentDiscountTermsInLastPaymentTerm(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPaymentDiscountTermsInLastPaymentTerm(100.0, 10, 10, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 2.0, 'DAY');
            static::$document->addDocumentPaymentDiscountTermsInLastPaymentTerm(100.0, 10, 10, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 2.0, 'DAY');
        });
    }

    public function testSetAddDocumentPaymentPenaltyTermsInLastPaymentTerm(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPaymentPenaltyTermsInLastPaymentTerm(100.0, 10, 10, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 2.0, 'DAY');
            static::$document->addDocumentPaymentPenaltyTermsInLastPaymentTerm(100.0, 10, 10, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 2.0, 'DAY');
        });
    }

    public function testSetAddDocumentTax(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentTax();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentTax(
            'S',
            'VAT',
            100.00,
            19.00,
            19.00,
            'Reason',
            'ReasonCode',
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            'DUECODE'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentTax();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentTax(
            'S',
            'VAT',
            100.00,
            19.00,
            19.00,
            'Reason2',
            'ReasonCode2',
            (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'),
            'DUECODE2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]', '100.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]', '19.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]', '19.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[2]', 'ReasonCode2');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason)[2]', 'Reason2');
        $this->assertXPathValue('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[3]');
    }

    public function testSetAddDocumentAllowanceCharge(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentAllowanceCharge(
            true,
            10.0,
            100.0,
            'S',
            'VAT',
            19.0,
            'Reason',
            'ReasonCode',
            20.0
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentAllowanceCharge(
            true,
            10.0,
            100.0,
            'S',
            'VAT',
            19.0,
            'Reason2',
            'ReasonCode2',
            20.0
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'ReasonCode');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'Reason');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]', 'true');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]', 'ReasonCode2');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]', 'Reason2');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]', '20.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]', '10.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]', '100.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]', '19.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[3]');

        static::$document->setDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentAllowanceCharge(
            true,
            10.0,
            100.0,
            'S',
            'VAT',
            19.0,
            'Reason3',
            'ReasonCode3',
            20.0
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'ReasonCode3');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'Reason3');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:Amount', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount', '100.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cbc:BaseAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');
    }

    public function testSetAddDocumentLogisticServiceCharge(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentLogisticServiceCharge(10.0, 'description', 'S', 'VAT', 19.0);
            static::$document->addDocumentLogisticServiceCharge(10.0, 'description', 'S', 'VAT', 19.0);
        });
    }

    public function testPrepareDocumentSummation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->prepareDocumentSummation();
        });
    }

    public function testSetDocumentSummation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');

        static::$document->setDocumentSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');

        static::$document->setDocumentSummation(1.0, 2.0, 3.0, 4.0, 5.0, 6.0, 7.0, 8.0, 9.0, 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount', '5.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', '1.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', '4.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', '7.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', '3.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', '2.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount', '9.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', '8.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]'); // No Tax Currency present
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');

        static::$document->setDocumentSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');

        static::$document->setDocumentCurrency('EUR');
        static::$document->setDocumentTaxCurrency('GBP');
        static::$document->setDocumentSummation(1.0, 2.0, 3.0, 4.0, 5.0, 6.0, 7.0, 8.0, 9.0, 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount', '5.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', '1.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', '4.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', '7.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', '3.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', '2.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount', '9.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', '10.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', '8.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]', '6.00', 'currencyID', 'GBP');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');

        static::$document->setDocumentCurrency();
        static::$document->setDocumentTaxCurrency();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount', '5.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', '1.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', '4.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', '7.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', '3.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', '2.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount', '9.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', '10.00', 'currencyID');
        $this->assertXPathValueWithoutAttribute('/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', '8.00', 'currencyID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]'); // No Tax Currency present
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:TaxTotal/cbc:TaxAmount)[3]');
    }

    public function testAddDocumentPosition(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:ID)[2]');

        static::$document->addDocumentPosition();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:ID)[2]');

        static::$document->addDocumentPosition('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:ID)[2]');

        static::$document->addDocumentPosition('1.1', '1', 'linestatuscode', 'linestatusreasoncode');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:ID', '1.1');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:ID)[2]');
    }

    public function testSetAddDocumentPositionNote(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:Note');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');

        static::$document->setDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:Note');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');

        static::$document->setDocumentPositionNote('content', 'contentcode', 'subjectcode');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:Note', 'content');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');

        static::$document->addDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:Note', 'content');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');

        static::$document->addDocumentPositionNote('content2', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:Note', 'content2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');

        static::$document->setDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:Note');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:Note)[3]');
    }

    public function testSetDocumentPositionProductDetails(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');

        static::$document->setDocumentPositionProductDetails(
            'productid',
            'productname',
            'productdescription',
            'productsellerid',
            'productbuyerid',
            'productglobalid',
            'productglobalidtype',
            'productindustryid',
            'productmodelid',
            'productbatchid',
            'productbrandname',
            'productmodelname',
            'productcountry',
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid', 'schemeID', 'productglobalidtype');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
    }

    public function testSetAddDocumentPositionProductCharacteristic(): void
    {
        // Empty product

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set empty characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set valid characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic(
            'characteristicdescription',
            'characteristicvalue',
            'characteristictype',
            100.0,
            'LTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Add empty characteristics to a empty product

        static::$document->addDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Add valid characteristics to a empty product

        static::$document->addDocumentPositionProductCharacteristic(
            'characteristicdescription2',
            'characteristicvalue2',
            'characteristictype2',
            200.0,
            'MTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Remove product details of empty product. The characteristics should not be there...

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set invalid characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set product details. There should be no characteristics

        static::$document->setDocumentPositionProductDetails(
            'productid2',
            'productname2',
            'productdescription2',
            'productsellerid2',
            'productbuyerid2',
            'productglobalid2',
            'productglobalidtype2',
            'productindustryid2',
            'productmodelid2',
            'productbatchid2',
            'productbrandname2',
            'productmodelname2',
            'productcountry2',
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set invalidvalid characteristics of a given product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Set valid characteristics of a given product

        static::$document->setDocumentPositionProductCharacteristic(
            'characteristicdescription',
            'characteristicvalue',
            'characteristictype',
            100.0,
            'LTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 'characteristicdescription');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 'characteristicvalue');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Add empty characteristics to a given product

        static::$document->addDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 'characteristicdescription');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 'characteristicvalue');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');

        // Add valid characteristics to a given product

        static::$document->addDocumentPositionProductCharacteristic(
            'characteristicdescription2',
            'characteristicvalue2',
            'characteristictype2',
            200.0,
            'MTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 'characteristicdescription');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 'characteristicvalue');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');
        $this->assertXPathExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]', 'characteristicdescription2');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]', 'characteristicvalue2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[3]');

        // Change product details. Latest characteristics should not be there

        static::$document->setDocumentPositionProductDetails(
            'productid3',
            'productname3',
            'productdescription3',
            'productsellerid3',
            'productbuyerid3',
            'productglobalid3',
            'productglobalidtype3',
            'productindustryid3',
            'productmodelid3',
            'productbatchid3',
            'productbrandname3',
            'productmodelname3',
            'productcountry3',
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid3');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid3', 'schemeID', 'productglobalidtype3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:Value)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity)[2]');
    }

    public function testSetDocumentPositionProductClassification(): void
    {
        // Empty product

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set empty classification of an empty product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set valid classification of an empty product

        static::$document->setDocumentPositionProductClassification(
            'classcode',
            'listid',
            'listversionid',
            'classname'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Add empty classification to a empty product

        static::$document->addDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Add valid classification to a empty product

        static::$document->addDocumentPositionProductClassification(
            'classcode2',
            'listid2',
            'listversionid2',
            'classname2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Remove product details of empty product. The classification should not be there...

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set invalid classification of an empty product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set product details. There should be no classification

        static::$document->setDocumentPositionProductDetails(
            'productid2',
            'productname2',
            'productdescription2',
            'productsellerid2',
            'productbuyerid2',
            'productglobalid2',
            'productglobalidtype2',
            'productindustryid2',
            'productmodelid2',
            'productbatchid2',
            'productbrandname2',
            'productmodelname2',
            'productcountry2',
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set epty classification of a given product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Set valid classification of a given product

        static::$document->setDocumentPositionProductClassification(
            'classcode',
            'listid',
            'listversionid',
            'classname'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Add empty classification to a given product

        static::$document->addDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');

        // Add valid classification to a given product

        static::$document->addDocumentPositionProductClassification(
            'classcode2',
            'listid2',
            'listversionid2',
            'classname2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid2');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]', 'classcode2', 'listID', 'listid2');
        $this->assertXPathValueWithAttribute('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]', 'classcode2', 'listVersionID', 'listversionid2');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[3]');

        // Change product details. Latest classification should not be there

        static::$document->setDocumentPositionProductDetails(
            'productid3',
            'productname3',
            'productdescription3',
            'productsellerid3',
            'productbuyerid3',
            'productglobalid3',
            'productglobalidtype3',
            'productindustryid3',
            'productmodelid3',
            'productbatchid3',
            'productbrandname3',
            'productmodelname3',
            'productcountry3',
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'productdescription3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'productname3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 'productbuyerid3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'productsellerid3');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 'productglobalid3', 'schemeID', 'productglobalidtype3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'productcountry3');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:BuyersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]');
    }

    public function testSetAddDocumentPositionReferencedProduct(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionReferencedProduct(
                'refproductid',
                'refproductname',
                'refproductdescription',
                'refproductsellerid',
                'refproductbuyerid',
                'refproductglobalid',
                'refproductglobalidtype',
                'refproductindustryid',
                100.0,
                'MTR',
            );
            static::$document->addDocumentPositionReferencedProduct(
                'refproductid2',
                'refproductname2',
                'refproductdescription2',
                'refproductsellerid2',
                'refproductbuyerid2',
                'refproductglobalid2',
                'refproductglobalidtype2',
                'refproductindustryid2',
                200.0,
                'MTR',
            );
        });
    }

    public function testSetAddDocumentPositionSellerOrderReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionSellerOrderReference('SO-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionSellerOrderReference('SO-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionBuyerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->setDocumentPositionBuyerOrderReference('BO-1', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->setDocumentPositionBuyerOrderReference('BO-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '100');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->addDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->addDocumentPositionBuyerOrderReference('BO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->addDocumentPositionBuyerOrderReference('BO-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '200');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->addDocumentPositionBuyerOrderReference('BO-3', '300', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '300');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[3]');

        static::$document->setDocumentPositionBuyerOrderReference('BO-4', '400', (new DateTime())->createFromFormat('d.m.Y', '04.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '400');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]');
    }

    public function testSetAddDocumentPositionQuotationReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionQuotationReference('QU-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionQuotationReference('QU-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionContractReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionContractReference('QU-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionContractReference('QU-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionAdditionalReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionAdditionalReference('ADD-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode', 'reftypecode', 'description');
            static::$document->addDocumentPositionAdditionalReference('ADD-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode', 'reftypecode', 'description');
        });
    }

    public function testSetAddDocumentPositionUltimateCustomerOrderReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateCustomerOrderReference('UCOR-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionUltimateCustomerOrderReference('UCOR-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionDespatchAdviceReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionDespatchAdviceReference('DESOADV-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionDespatchAdviceReference('DESOADV-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionReceivingAdviceReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionReceivingAdviceReference('RECADV-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionReceivingAdviceReference('RECADV-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionDeliveryNoteReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionDeliveryNoteReference('DEVNOTE-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            static::$document->addDocumentPositionDeliveryNoteReference('DEVNOTE-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));
        });
    }

    public function testSetAddDocumentPositionInvoiceReference(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionInvoiceReference('INVREF-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode');
            static::$document->addDocumentPositionInvoiceReference('INVREF-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode');
        });
    }

    public function testSetAddDocumentPositionGrossPrice(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionGrossPrice(1.00, 2.00, 'C62');
            static::$document->setDocumentPositionGrossPriceAllowanceCharge(1.0, false, 2.0, 3.0, 'reason', 'reasoncode');
            static::$document->addDocumentPositionGrossPriceAllowanceCharge(10.0, true, 20.0, 30.0, 'reason2', 'reasoncode2');
        });
    }

    public function testSetDocumentPositionNetPrice(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity)[2]');

        static::$document->setDocumentPositionNetPrice();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity)[2]');

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice(1.0, 2.0, 'C62');

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount', '1.00');
        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity', '2.00', 'unitCode', 'C62');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity)[2]');

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice(3.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount', '3.00');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity)[2]');

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Price/cbc:BaseQuantity)[2]');
    }

    public function testSetDocumentPositionQuantities(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities(1.0);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities(1.0, 'C62');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', '1.00', 'unitCode', 'C62');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities(1.0, 'C62', 2.0, 'MTR', 3.0, 'KTR', 4.0, 'XPP');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', '1.00', 'unitCode', 'C62');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities(4.0, 'XPP');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithAttribute('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', '4.00', 'unitCode', 'XPP');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');

        static::$document->setDocumentPositionQuantities();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]');
    }

    public function testSetAddDocumentPositionShipToName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToName('Ship To Name');
            static::$document->addDocumentPositionShipToName('Ship To Name 2');
        });
    }

    public function testSetAddDocumentPositionShipToId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToId('Ship To Id 1');
            static::$document->addDocumentPositionShipToId('Ship To Id 2');
        });
    }

    public function testSetAddDocumentPositionShipToGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToGlobalId('Ship To Global Id 1', '0088');
            static::$document->addDocumentPositionShipToGlobalId('Ship To Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentPositionShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToTaxRegistration('VAT', '123456789');
            static::$document->addDocumentPositionShipToTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentPositionShipToAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentPositionShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentPositionShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentPositionShipToLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentPositionShipToContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentPositionShipToContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentPositionShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentPositionShipToCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToName(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToName('Ship To Name');
            static::$document->addDocumentPositionUltimateShipToName('Ship To Name 2');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToId('Ship To Id 1');
            static::$document->addDocumentPositionUltimateShipToId('Ship To Id 2');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToGlobalId(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToGlobalId('Ship To Global Id 1', '0088');
            static::$document->addDocumentPositionUltimateShipToGlobalId('Ship To Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToTaxRegistration('VAT', '123456789');
            static::$document->addDocumentPositionUltimateShipToTaxRegistration('VAT', '123456789');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToAddress(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            static::$document->addDocumentPositionUltimateShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToLegalOrganisation('8884', '123456789', 'Company Name');
            static::$document->addDocumentPositionUltimateShipToLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToContact(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            static::$document->addDocumentPositionUltimateShipToContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentPositionUltimateShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToCommunication('EM', 'user@somewhere.all');
            static::$document->addDocumentPositionUltimateShipToCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetDocumentPositionSupplyChainEvent(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionSupplyChainEvent((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
        });
    }

    public function testSetAddDocumentPositionBillingPeriod(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentPositionBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentPositionBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->setDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentPositionBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate', '1970-01-01');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');

        static::$document->addDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.03.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.03.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate', '1970-03-01');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate', '1970-03-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[3]');

        static::$document->setDocumentPositionBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:StartDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:EndDate)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:InvoicePeriod/cbc:Description)[2]');
    }

    public function testSetAddDocumentPositionTax(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPositionTax();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->setDocumentPositionTax('S', 'VAT', 1.90, 19.0, 'reason', 'reasoncode');

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '19.00');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPositionTax();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '19.00');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');

        static::$document->addDocumentPositionTax('O', 'VAT', 0.0, 0.0, 'reason2', 'reasoncode2');

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'O');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '0.00');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[3]');

        static::$document->setDocumentPositionTax('O', 'VAT', 0.0, 0.0, 'reason2', 'reasoncode2');

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'O');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '0.00');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]');
    }

    public function testSetAddDocumentPositionAllowanceCharge(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]');

        static::$document->setDocumentPositionAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount');
        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]');

        static::$document->setDocumentPositionAllowanceCharge(true, 20.0, 200.0, 'reason', 'reasoncode', 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'reasoncode');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'reason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount', '200.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]');

        static::$document->addDocumentPositionAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'reasoncode');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'reason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount', '200.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]');

        static::$document->addDocumentPositionAllowanceCharge(false, 150.0, 300.0, 'reason2', 'reasoncode2', 50.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'reasoncode');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'reason');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '10.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount', '20.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount', '200.00');
        $this->assertXPathExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]', 'false');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]', 'reasoncode2');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]', 'reason2');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]', '50.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]', '150.00');
        $this->assertXPathValue('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]', '300.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[3]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[3]');

        static::$document->setDocumentPositionAllowanceCharge(true, 200.0, 400.0, 'reason3', 'reasoncode3', 50.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExists('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 'reasoncode3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'reason3');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', '50.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount', '200.00');
        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount', '400.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cac:AllowanceCharge/cbc:BaseAmount)[2]');
    }

    public function testSetAddDocumentPositionSummation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount)[2]');

        static::$document->setDocumentPositionSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount)[2]');

        static::$document->setDocumentPositionSummation(100.0, 10.0, 20.0, 19.0, 1000.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount', '100.00');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount)[2]');
    }

    public function testSetAddDocumentPositionPostingReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');

        static::$document->setDocumentPositionPostingReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');

        static::$document->setDocumentPositionPostingReference('type', '0815');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', '0815');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');

        static::$document->addDocumentPositionPostingReference();

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', '0815');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');

        static::$document->addDocumentPositionPostingReference('type2', '4711');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', '4711');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');

        static::$document->setDocumentPositionPostingReference('type3', '4712');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', '4712');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');
    }
}
