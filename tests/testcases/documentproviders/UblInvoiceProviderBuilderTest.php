<?php

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\documents\models\ubl\main\Invoice;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\ubl\InvoiceSuiteUblInvoiceProviderBuilder;

class UblInvoiceProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        self::$document = new InvoiceSuiteUblInvoiceProviderBuilder(new InvoiceSuiteUblInvoiceProvider());
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(self::$document->hasCurrentDocumentFormatProvider());
        $this->assertFalse(self::$document->hasNotCurrentDocumentFormatProvider());
        $this->assertInstanceOf(InvoiceSuiteUblInvoiceProvider::class, self::$document->getCurrentDocumentFormatProvider());
    }

    public function testInitDocumentRootObject(): void
    {
        self::$document->initDocumentRootObject();

        $this->assertInstanceOf(Invoice::class, self::$document->getDocumentRootObject());
    }

    public function testDocumentProfile(): void
    {
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:ProfileID', 0, 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:ProfileID', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:CustomizationID', 0, 'urn:cen.eu:en16931:2017');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:CustomizationID', 1);
    }

    public function testSetDocumentNo(): void
    {
        self::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        self::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        self::$document->setDocumentNo("2025/08-000001");

        $this->assertXPathValue('/ns:Invoice/cbc:ID', "2025/08-000001");

        self::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        self::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');
    }

    public function testSetDocumentType(): void
    {
        self::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        self::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        self::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        $this->assertXPathValue('/ns:Invoice/cbc:InvoiceTypeCode', InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        self::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        self::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');
    }

    public function testSetDocumentDescription(): void
    {
        self::$document->setDocumentType(null);
        self::$document->setDocumentDescription(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        self::$document->setDocumentDescription('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        self::$document->setDocumentDescription('documentdescription');

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cbc:InvoiceTypeCode', 0, '', 'name', 'documentdescription');
    }

    public function testSetDocumentLanguage(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentLanguage('de-DE');
        });
    }

    public function testSetDocumentDate(): void
    {
        self::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:IssueDate');

        self::$document->setDocumentDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValue('/ns:Invoice/cbc:IssueDate', '1970-01-01');

        self::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:IssueDate');
    }

    public function testSetDocumentCurrency(): void
    {
        self::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        self::$document->setDocumentCurrency("");

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        self::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        $this->assertXPathValue('/ns:Invoice/cbc:DocumentCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        self::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        self::$document->setDocumentCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');
    }

    public function testSetDocumentTaxCurrency(): void
    {
        self::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        self::$document->setDocumentTaxCurrency("");

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        self::$document->setDocumentTaxCurrency(InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        $this->assertXPathValue('/ns:Invoice/cbc:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        self::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        self::$document->setDocumentTaxCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');
    }

    public function testSetDocumentIsCopy(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentIsCopy(true);
        });
    }

    public function testSetDocumentIsTest(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentIsTest(true);
        });
    }

    public function testSetAddDocumentNote(): void
    {
        self::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);

        self::$document->setDocumentNote('', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);

        self::$document->setDocumentNote('content1', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        self::$document->addDocumentNote('', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        self::$document->addDocumentNote('content2', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 1, 'content2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 2);

        self::$document->setDocumentNote('content3', 'contentcode3', 'subjectcode3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        self::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);
    }

    public function testSetAddDocumentBillingPeriod(): void
    {
        self::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->setDocumentBillingPeriod((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->setDocumentBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->setDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->addDocumentBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        self::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0, 'description');

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1, '1970-01-31');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1, 'description');

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 2);

        self::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);
    }

    public function testSetAddDocumentPostingReference(): void
    {
        self::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference('type1', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference('type1', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference(null, 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference('', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->addDocumentPostingReference('type2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->addDocumentPostingReference('type2', 'accountid2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        self::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);
    }

    public function testSetAddDocumentSellerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        self::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        self::$document->setDocumentSellerOrderReference('SO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        self::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        self::$document->addDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        self::$document->addDocumentSellerOrderReference('SO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        self::$document->addDocumentSellerOrderReference('SO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        self::$document->setDocumentSellerOrderReference('SO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        self::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);
    }

    public function testSetAddDocumentBuyerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);

        self::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);

        self::$document->setDocumentBuyerOrderReference('BO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        self::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        self::$document->addDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        self::$document->addDocumentBuyerOrderReference('BO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        self::$document->addDocumentBuyerOrderReference('BO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        self::$document->setDocumentBuyerOrderReference('BO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentQuotationReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentQuotationReference('QU-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'QU-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, '325');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'Quotation');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentQuotationReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentQuotationReference('QU-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'QU-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, '325');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'Quotation');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentQuotationReference('QU-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'QU-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, '325');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'Quotation');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->setDocumentQuotationReference('QU-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'QU-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, '325');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'Quotation');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->setDocumentQuotationReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
    }

    public function testSetAddDocumentContractReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentContractReference('CON-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        self::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentContractReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentContractReference('CON-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentContractReference('CON-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1, 'CON-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 2);

        self::$document->setDocumentContractReference('CON-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentAdditionalReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        self::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1, 'ADD-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1, 'typecode2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1, 'description2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 2);

        self::$document->setDocumentAdditionalReference('ADD-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3', 'reftypecode3', 'description3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        self::$document->setDocumentAdditionalReference('ADD-4', (new DateTime())->createFromFormat('d.m.Y', '04.01.1970'), 'typecode4', 'reftypecode4', 'description4', InvoiceSuiteAttachment::fromBinaryString('This is a test', 'test.txt'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-4');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-04');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode4');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description4');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0, 'VGhpcyBpcyBhIHRlc3Q=', 'mimeCode', 'text/plain');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0, 'VGhpcyBpcyBhIHRlc3Q=', 'filename', 'test.txt');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 1);

        self::$document->setDocumentAdditionalReference('ADD-5', (new DateTime())->createFromFormat('d.m.Y', '05.01.1970'), 'typecode5', 'reftypecode5', 'description5', InvoiceSuiteAttachment::fromUrl('http://www.nowhere.all'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-5');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0, '1970-01-05');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, 'typecode5');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description5');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 0, 'http://www.nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 1);
    }

    public function testSetAddDocumentInvoiceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');

        self::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentInvoiceReference('INVREF-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1, 'INVREF-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 2);

        self::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1, 'INVREF-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 2);

        self::$document->addDocumentInvoiceReference('INVREF-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1, 'INVREF-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 2, 'INVREF-2-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 2, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 3);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 3);

        self::$document->setDocumentInvoiceReference('INVREF-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentProjectReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0);

        self::$document->setDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0);

        self::$document->setDocumentProjectReference('PROJECT-1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');

        self::$document->setDocumentProjectReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0);

        self::$document->setDocumentProjectReference('PROJECT-1', 'Project 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1);

        self::$document->addDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1);

        self::$document->addDocumentProjectReference('PROJECT-2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1, 'PROJECT-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 2);
    }

    public function testSetAddDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertXmlWasNotChanged(function () {});
    }

    public function testSetAddDocumentDespatchAdviceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentDespatchAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentDespatchAdviceReference('DESPADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentDespatchAdviceReference('DESPADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1, 'DESPADV-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 2);

        self::$document->addDocumentDespatchAdviceReference('DESPADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1, 'DESPADV-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 2, 'DESPADV-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 2);

        self::$document->setDocumentDespatchAdviceReference('DESPADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentReceivingAdviceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentReceivingAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        self::$document->setDocumentReceivingAdviceReference('RECADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentReceivingAdviceReference('RECADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1, 'RECADV-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        self::$document->addDocumentReceivingAdviceReference('RECADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1, 'RECADV-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1, '1970-01-02');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 2, 'RECADV-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 2);

        self::$document->setDocumentReceivingAdviceReference('RECADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0, '1970-01-03');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentDeliveryNoteReference(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentDeliveryNoteReference('DEVNOTE-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
            self::$document->addDocumentDeliveryNoteReference('DEVNOTE-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));
        });
    }

    public function testSetDocumentSupplyChainEvent(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        self::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        self::$document->setDocumentSupplyChainEvent((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        self::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);
    }

    public function testSetDocumentBuyerReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        self::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        self::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        self::$document->setDocumentBuyerReference('BUYERREF');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:BuyerReference', 0, 'BUYERREF');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        self::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        self::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);
    }

    public function testSetAddDocumentSellerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName('Seller Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentSellerName('Seller Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentSellerName('Seller Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentSellerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerId('Seller Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentSellerId('Seller Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Id 2');

        self::$document->setDocumentSellerId('Seller Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentSellerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerGlobalId('Seller Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentSellerGlobalId('Seller Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentSellerGlobalId('Seller Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentSellerGlobalId('Seller Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2, 'Seller Global Id 2', 'schemeID', '0088');

        self::$document->setDocumentSellerGlobalId('Seller Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);
    }

    public function testSetAddDocumentSellerTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentSellerTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VA');

        self::$document->setDocumentSellerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentSellerTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '999999999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'FC');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
    }

    public function testSetAddDocumentSellerAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentSellerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentSellerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '99999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'City');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0, 'Bavaria');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentSellerAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentSellerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentSellerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '88888');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Adress-Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Adress-Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'Cityname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'IR');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0, 'Waterford');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);
    }

    public function testSetAddDocumentSellerLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentSellerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentSellerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentSellerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentSellerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentSellerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentSellerLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentSellerContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentSellerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-222-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentSellerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-333-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user3@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);
    }

    public function testSetAddDocumentSellerCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentSellerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentSellerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentSellerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentSellerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentBuyerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName('Buyer Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentBuyerName('Buyer Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentBuyerName('Buyer Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentBuyerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerId('Buyer Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentBuyerId('Buyer Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Id 2');

        self::$document->setDocumentBuyerId('Buyer Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentBuyerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerGlobalId('Buyer Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentBuyerGlobalId('Buyer Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentBuyerGlobalId('Buyer Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentBuyerGlobalId('Buyer Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2, 'Buyer Global Id 2', 'schemeID', '0088');

        self::$document->setDocumentBuyerGlobalId('Buyer Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Buyer Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);
    }

    public function testSetAddDocumentBuyerTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentBuyerTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VA');

        self::$document->setDocumentBuyerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentBuyerTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '999999999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'FC');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
    }

    public function testSetAddDocumentBuyerAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentBuyerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentBuyerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '99999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'City');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0, 'Bavaria');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentBuyerAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentBuyerAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentBuyerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '88888');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Adress-Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Adress-Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'Cityname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'IR');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0, 'Waterford');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);
    }

    public function testSetAddDocumentBuyerLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentBuyerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentBuyerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentBuyerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentBuyerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentBuyerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentBuyerLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentBuyerContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentBuyerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-222-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentBuyerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0, '+49-333-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user3@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);
    }

    public function testSetAddDocumentBuyerCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentBuyerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->setDocumentBuyerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentBuyerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        self::$document->addDocumentBuyerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName('TaxRepresentative Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentTaxRepresentativeName('TaxRepresentative Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentTaxRepresentativeName('TaxRepresentative Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentTaxRepresentativeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeId('TaxRepresentative Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentTaxRepresentativeId('TaxRepresentative Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Id 2');

        self::$document->setDocumentTaxRepresentativeId('TaxRepresentative Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2, 'TaxRepresentative Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 3);

        self::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0, 'TaxRepresentative Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1, 'TaxRepresentative Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 2);
    }

    public function testSetAddDocumentTaxRepresentativeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        self::$document->addDocumentTaxRepresentativeTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 2);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentTaxRepresentativeTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '999999999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'FC');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentTaxRepresentativeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentTaxRepresentativeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0, '99999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0, 'City');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0, 'Bavaria');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentTaxRepresentativeAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentTaxRepresentativeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentTaxRepresentativeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 0, '88888');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 0, 'Adress-Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Adress-Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 0, 'Cityname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'IR');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 0, 'Waterford');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PostalAddress/cbc:CountrySubentity', 1);
    }

    public function testSetAddDocumentTaxRepresentativeLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentTaxRepresentativeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentTaxRepresentativeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentTaxRepresentativeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentTaxRepresentativeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentTaxRepresentativeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentTaxRepresentativeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentTaxRepresentativeContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentTaxRepresentativeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-222-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentTaxRepresentativeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0, '+49-333-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0, 'user3@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);
    }

    public function testSetAddDocumentTaxRepresentativeCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->setDocumentTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->setDocumentTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->setDocumentTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->setDocumentTaxRepresentativeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->setDocumentTaxRepresentativeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->addDocumentTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->addDocumentTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->addDocumentTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->addDocumentTaxRepresentativeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        self::$document->addDocumentTaxRepresentativeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentProductEndUserName(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserName('Product End User Name');
            self::$document->addDocumentProductEndUserName('Product End User Name 2');
        });
    }

    public function testSetAddDocumentProductEndUserId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserId('Product End User Id 1');
            self::$document->addDocumentProductEndUserId('Product End User Id 2');
        });
    }

    public function testSetAddDocumentProductEndUserGlobalId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserGlobalId('Product End User Global Id 1', '0088');
            self::$document->addDocumentProductEndUserGlobalId('Product End User Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentProductEndUserTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserTaxRegistration('VA', '123456789');
            self::$document->addDocumentProductEndUserTaxRegistration('VA', '999999999');
        });
    }

    public function testSetAddDocumentProductEndUserAddress(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
            self::$document->addDocumentProductEndUserAddress('Adress-Line 1-1', 'Adress-Line 2-2', 'Adress-Line 3-3', '88888', 'Cityname', 'IR', 'Saxony');
        });
    }

    public function testSetAddDocumentProductEndUserLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserLegalOrganisation('8884', '123456789', 'Company Name');
            self::$document->addDocumentProductEndUserLegalOrganisation('8884', '123456789', 'Company Name 2');
        });
    }

    public function testSetAddDocumentProductEndUserContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentProductEndUserContact('Name 2', 'Departement Name 2', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentProductEndUserCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentProductEndUserCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentProductEndUserCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentShipToName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName('Ship To Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentShipToName('Ship To Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentShipToName('Ship To Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentShipToId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToId('Ship To Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToId('Ship To Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToId('Ship To Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);
    }

    public function testSetAddDocumentShipToGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId('Ship To Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId('Ship To Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToGlobalId('Ship To Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->addDocumentShipToGlobalId('Ship To Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        self::$document->setDocumentShipToGlobalId('Ship To Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);
    }

    public function testSetAddDocumentShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipToTaxRegistration('VA', '123456789');
            self::$document->addDocumentShipToTaxRegistration('VA', '123456789');
        });
    }

    public function testSetAddDocumentShipToAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);

        self::$document->setDocumentShipToAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);

        self::$document->setDocumentShipToAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0, '99999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0, 'Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0, 'Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0, 'City');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0, 'Bavaria');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);

        self::$document->setDocumentShipToAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);

        self::$document->addDocumentShipToAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);

        self::$document->addDocumentShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0, '88888');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0, 'Adress-Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0, 'Adress-Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0, 'Cityname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0, 'IR');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 0, 'Waterford');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CountrySubentity', 1);
    }

    public function testSetAddDocumentShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipToLegalOrganisation('8884', '123456789');
            self::$document->addDocumentShipToLegalOrganisation('8884', '123456789');
        });
    }

    public function testSetAddDocumentShipToContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipToCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentShipToCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentUltimateShipToName(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToName('Ultimate Ship To Name');
            self::$document->addDocumentUltimateShipToName('Ultimate Ship To Name');
        });
    }

    public function testSetAddDocumentUltimateShipToId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToId('Ultimate Ship To Id 1');
            self::$document->addDocumentUltimateShipToId('Ultimate Ship To Id 1');
        });
    }

    public function testSetAddDocumentUltimateShipToGlobalId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToGlobalId('Ultimate Ship To Global Id 1', '0088');
            self::$document->addDocumentUltimateShipToGlobalId('Ultimate Ship To Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentUltimateShipToTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToTaxRegistration('VA', '123456789');
            self::$document->addDocumentUltimateShipToTaxRegistration('VA', '123456789');
        });
    }

    public function testSetAddDocumentUltimateShipToAddress(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
            self::$document->addDocumentUltimateShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentUltimateShipToLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToLegalOrganisation('8884', '123456789', 'Company Name');
            self::$document->addDocumentUltimateShipToLegalOrganisation('8884', '123456789', 'Company Name');
        });
    }

    public function testSetAddDocumentUltimateShipToContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentUltimateShipToContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentUltimateShipToCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentUltimateShipToCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentUltimateShipToCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentShipFromName(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromName('Ship From Name');
            self::$document->addDocumentShipFromName('Ship From Name');
        });
    }

    public function testSetAddDocumentShipFromId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromId('Ship From Id 1');
            self::$document->addDocumentShipFromId('Ship From Id 1');
        });
    }

    public function testSetAddDocumentShipFromGlobalId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromGlobalId('Ship From Global Id 1', '0088');
            self::$document->addDocumentShipFromGlobalId('Ship From Global Id 1', '0088');
        });
    }

    public function testSetAddDocumentShipFromTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromTaxRegistration('VA', '123456789');
            self::$document->addDocumentShipFromTaxRegistration('VA', '123456789');
        });
    }

    public function testSetAddDocumentShipFromAddress(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            self::$document->addDocumentShipFromAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
        });
    }

    public function testSetAddDocumentShipFromLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromLegalOrganisation('8884', '123456789', 'Company Name');
            self::$document->addDocumentShipFromLegalOrganisation('8884', '123456789', 'Company Name');
        });
    }

    public function testSetAddDocumentShipFromContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentShipFromContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
        });
    }

    public function testSetAddDocumentShipFromCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentShipFromCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentShipFromCommunication('EM', 'user@somewhere.all');
        });
    }

    public function testSetAddDocumentInvoicerName(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerName('Invoicer Name');
            self::$document->addDocumentInvoicerName('Invoicer Name 2');
        });
    }

    public function testSetAddDocumentInvoicerId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerId('Invoicer Id 1');
            self::$document->addDocumentInvoicerId('Invoicer Id 2');
        });
    }

    public function testSetAddDocumentInvoicerGlobalId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerGlobalId('Invoicer Global Id 1', '0088');
            self::$document->addDocumentInvoicerGlobalId('Invoicer Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentInvoicerTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerTaxRegistration('VA', '123456789');
            self::$document->addDocumentInvoicerTaxRegistration('VA', '123456789');
        });
    }

    public function testSetAddDocumentInvoicerAddress(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            self::$document->addDocumentInvoicerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentInvoicerLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerLegalOrganisation('8884', '123456789', 'Company Name');
            self::$document->addDocumentInvoicerLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentInvoicerContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentInvoicerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentInvoicerCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoicerCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentInvoicerCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentInvoiceeName(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeName('Invoicee Name');
            self::$document->addDocumentInvoiceeName('Invoicee Name 2');
        });
    }

    public function testSetAddDocumentInvoiceeId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeId('Invoicee Id 1');
            self::$document->addDocumentInvoiceeId('Invoicee Id 2');
        });
    }

    public function testSetAddDocumentInvoiceeGlobalId(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeGlobalId('Invoicee Global Id 1', '0088');
            self::$document->addDocumentInvoiceeGlobalId('Invoicee Global Id 2', '0088');
        });
    }

    public function testSetAddDocumentInvoiceeTaxRegistration(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeTaxRegistration('VA', '123456789');
            self::$document->addDocumentInvoiceeTaxRegistration('VA', '123456789');
        });
    }

    public function testSetAddDocumentInvoiceeAddress(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');
            self::$document->addDocumentInvoiceeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');
        });
    }

    public function testSetAddDocumentInvoiceeLegalOrganisation(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeLegalOrganisation('8884', '123456789', 'Company Name');
            self::$document->addDocumentInvoiceeLegalOrganisation('8885', '987654321', 'Company Name 2');
        });
    }

    public function testSetAddDocumentInvoiceeContact(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');
            self::$document->addDocumentInvoiceeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');
        });
    }

    public function testSetAddDocumentInvoiceeCommunication(): void
    {
        $this->assertXmlWasNotChanged(function () {
            self::$document->setDocumentInvoiceeCommunication('EM', 'user@somewhere.all');
            self::$document->addDocumentInvoiceeCommunication('EM', 'user2@somewhere.all');
        });
    }

    public function testSetAddDocumentPayeeName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName('Payee Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->addDocumentPayeeName('Payee Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        self::$document->setDocumentPayeeName('Payee Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentPayeeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeId('Payee Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->addDocumentPayeeId('Payee Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Id 2');

        self::$document->setDocumentPayeeId('Payee Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentPayeeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeGlobalId('Payee Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        self::$document->setDocumentPayeeGlobalId('Payee Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentPayeeGlobalId('Payee Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);

        self::$document->addDocumentPayeeGlobalId('Payee Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2, 'Payee Global Id 2', 'schemeID', '0088');

        self::$document->setDocumentPayeeGlobalId('Payee Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1, 'Payee Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 2);
    }

    public function testSetAddDocumentPayeeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration('VA', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration('VA', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->addDocumentPayeeTaxRegistration('VA', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VA');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VA');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);

        self::$document->setDocumentPayeeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        self::$document->setDocumentPayeeTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '999999999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'FC');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
    }

    public function testSetAddDocumentPayeeAddress(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentPayeeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentPayeeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0, '99999');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0, 'City');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0, 'Bavaria');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->setDocumentPayeeAddress('Line A', 'Line B', 'Line C');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentPayeeAddress();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0, 'Line A');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Line B');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);

        self::$document->addDocumentPayeeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 0, '88888');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 0, 'Adress-Line 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Adress-Line 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 0, 'Cityname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'IR');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 0, 'Waterford');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PostalAddress/cbc:CountrySubentity', 1);
    }

    public function testSetAddDocumentPayeeLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentPayeeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentPayeeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->setDocumentPayeeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentPayeeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentPayeeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        self::$document->addDocumentPayeeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Company Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentPayeeContact(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-111-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->addDocumentPayeeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-222-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        self::$document->setDocumentPayeeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0, '+49-333-987654321');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0, 'user3@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);
    }

    public function testSetAddDocumentPayeeCommunication(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->setDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->setDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->setDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->setDocumentPayeeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->setDocumentPayeeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->addDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->addDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->addDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->addDocumentPayeeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        self::$document->addDocumentPayeeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentPaymentMean(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean(
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            'information'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, 'name', 'information');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: '',
            newPayeeAccountName: '',
            newPayeeProprietaryId: '',
            newPayeeBic: '',
            newPaymentReference: ''
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: 'iban',
            newPayeeAccountName: 'accountname',
            newPayeeProprietaryId: 'propid',
            newPayeeBic: 'bic',
            newPaymentReference: 'paymentref'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0, 'paymentref');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'accountname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'bic');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: 'iban',
            newMandate: 'mandate'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 0, 'mandate');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: 'cardid',
            newFinancialCardHolder: 'cardholder'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 0, 'cardid');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 0, 'mapped-from-cii');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 0, 'cardholder');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->addDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 0, 'cardid');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 0, 'mapped-from-cii');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 0, 'cardholder');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: 'cardid2',
            newFinancialCardHolder: 'cardholder2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 0, 'cardid');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 0, 'mapped-from-cii');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 0, 'cardholder');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 1, 'cardid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 1, 'mapped-from-cii');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 1, 'cardholder2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 2);

        self::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);
    }

    public function testSetAddDocumentPaymentMeanAsCreditTransferSepa(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMeanAsCreditTransferSepa();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban', 'accountname', 'propid', 'bic', 'paymentref');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0, 'paymentref');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'accountname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'bic');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        self::$document->addDocumentPaymentMeanAsCreditTransferSepa();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0, 'paymentref');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'accountname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'bic');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 2);

        self::$document->addDocumentPaymentMeanAsCreditTransferSepa('iban2');

        $this->disableRenderXmlContent();
        $this->debugWriteFile();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0, 'paymentref');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'accountname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'bic');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 1, 'iban2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 2, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 3);
    }
}
