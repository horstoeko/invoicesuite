<?php

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\documents\models\ubl\main\Invoice;
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
        $this->assertTrue(1 == 1);
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
        $this->assertTrue(1 == 1);
    }

    public function testSetDocumentIsTest(): void
    {
        $this->assertTrue(1 == 1);
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
}
