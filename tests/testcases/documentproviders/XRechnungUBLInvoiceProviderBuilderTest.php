<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\documents\models\peppol\main\Invoice;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProviderBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

final class XRechnungUBLInvoiceProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        static::$document = new InvoiceSuiteXRechnungUBLInvoiceProviderBuilder(new InvoiceSuiteXRechnungUBLInvoiceProvider());
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(static::$document->hasCurrentDocumentFormatProvider());
        $this->assertFalse(static::$document->hasNotCurrentDocumentFormatProvider());
        $this->assertInstanceOf(InvoiceSuiteXRechnungUBLInvoiceProvider::class, static::$document->getCurrentDocumentFormatProvider());
    }

    public function testInitDocumentRootObject(): void
    {
        static::$document->initDocumentRootObject();

        $this->assertInstanceOf(Invoice::class, static::$document->getDocumentRootObject());
    }

    public function testDocumentProfile(): void
    {
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:ProfileID', 0, 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:ProfileID', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:CustomizationID', 0, 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:CustomizationID', 1);
    }

    public function testSetDocumentNo(): void
    {
        static::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        static::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        static::$document->setDocumentNo('2025/08-000001');

        $this->assertXPathValue('/ns:Invoice/cbc:ID', '2025/08-000001');

        static::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');

        static::$document->setDocumentNo('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:ID');
    }

    public function testSetDocumentType(): void
    {
        static::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        static::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        static::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        $this->assertXPathValue('/ns:Invoice/cbc:InvoiceTypeCode', InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        static::$document->setDocumentType(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        static::$document->setDocumentType('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');
    }

    public function testSetDocumentDescription(): void
    {
        static::$document->setDocumentType(null);
        static::$document->setDocumentDescription(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        static::$document->setDocumentDescription('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');

        static::$document->setDocumentDescription('documentdescription');

        $this->assertXPathNotExists('/ns:Invoice/cbc:InvoiceTypeCode');
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

        $this->assertXPathNotExists('/ns:Invoice/cbc:IssueDate');

        static::$document->setDocumentDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValue('/ns:Invoice/cbc:IssueDate', '1970-01-01');

        static::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:IssueDate');
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

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        $this->assertXPathValue('/ns:Invoice/cbc:DocumentCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        static::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');

        static::$document->setDocumentCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:DocumentCurrencyCode');
    }

    public function testSetDocumentTaxCurrency(): void
    {
        static::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency(InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        $this->assertXPathValue('/ns:Invoice/cbc:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        static::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');

        static::$document->setDocumentTaxCurrency('');

        $this->assertXPathNotExists('/ns:Invoice/cbc:TaxCurrencyCode');
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);

        static::$document->setDocumentNote('', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);

        static::$document->setDocumentNote('content1', 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        static::$document->addDocumentNote('', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        static::$document->addDocumentNote('content2', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        static::$document->setDocumentNote('content3', 'contentcode3', 'subjectcode3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:Note', 0, 'content3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);

        static::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:Note', 1);
    }

    public function testSetAddDocumentBillingPeriod(): void
    {
        static::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentBillingPeriod((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentBillingPeriod(null, null, 'description');

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
        static::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference('type1', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference('type1', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference(null, 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference('', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->addDocumentPostingReference('type2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->addDocumentPostingReference('type2', 'accountid2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);

        static::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:AccountingCost', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:AccountingCost', 1);
    }

    public function testSetAddDocumentSellerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        static::$document->setDocumentSellerOrderReference('SO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);

        static::$document->addDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        static::$document->addDocumentSellerOrderReference('SO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        static::$document->addDocumentSellerOrderReference('SO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        static::$document->setDocumentSellerOrderReference('SO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0, 'SO-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 1);

        static::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:SalesOrderID', 0);
    }

    public function testSetAddDocumentBuyerOrderReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);

        static::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);

        static::$document->setDocumentBuyerOrderReference('BO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        static::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        static::$document->addDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        static::$document->addDocumentBuyerOrderReference('BO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        static::$document->addDocumentBuyerOrderReference('BO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 1);

        static::$document->setDocumentBuyerOrderReference('BO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:OrderReference/cbc:ID', 0, 'BO-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:OrderReference/cbc:IssueDate', 0);
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

        static::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        static::$document->setDocumentQuotationReference('QU-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->addDocumentQuotationReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->addDocumentQuotationReference('QU-2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->addDocumentQuotationReference('QU-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->setDocumentQuotationReference('QU-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->setDocumentQuotationReference();

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

        static::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentContractReference('CON-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        static::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentContractReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentContractReference('CON-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentContractReference('CON-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 1);

        static::$document->setDocumentContractReference('CON-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:ID', 0, 'CON-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ContractDocumentReference/cbc:IssueDate', 0);
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

        static::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        static::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0);

        static::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');

        static::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1, 'ADD-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1, 'description2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 2);

        static::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1, 'ADD-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1, 'description2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 2);

        static::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1, 'ADD-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1, 'description2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 2, 'ADD-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 2);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 2, 'description2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 3);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 3);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 3);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 3);

        static::$document->setDocumentAdditionalReference('ADD-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3', 'reftypecode3', 'description3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);

        static::$document->setDocumentAdditionalReference('ADD-4', (new DateTime())->createFromFormat('d.m.Y', '04.01.1970'), 'typecode4', 'reftypecode4', 'description4', InvoiceSuiteAttachment::fromBinaryString('This is a test', 'test.txt'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-4');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description4');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0, 'VGhpcyBpcyBhIHRlc3Q=', 'mimeCode', 'text/plain');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0, 'VGhpcyBpcyBhIHRlc3Q=', 'filename', 'test.txt');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 1);

        static::$document->setDocumentAdditionalReference('ADD-5', (new DateTime())->createFromFormat('d.m.Y', '05.01.1970'), 'typecode5', 'reftypecode5', 'description5', InvoiceSuiteAttachment::fromUrl('http://www.nowhere.all'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-5');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description5');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 0, 'http://www.nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cbc:EmbeddedDocumentBinaryObject', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cac:Attachment/cac:ExternalReference/cbc:URI', 1);

        static::$document->setDocumentAdditionalReference('ADD-6', (new DateTime())->createFromFormat('d.m.Y', '06.01.1970'), '130', 'reftypecode6', 'description6', InvoiceSuiteAttachment::fromUrl('http://www.nowhere.all'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:ID', 0, 'ADD-6');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentTypeCode', 0, '130');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AdditionalDocumentReference/cbc:DocumentDescription', 0, 'description6');
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

        static::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');

        static::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentInvoiceReference('INVREF-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 2);

        static::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 2);

        static::$document->addDocumentInvoiceReference('INVREF-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 0, 'INVREF-2-2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 0, '1970-01-02');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:BillingReference/cac:InvoiceDocumentReference/cbc:IssueDate', 1);

        static::$document->setDocumentInvoiceReference('INVREF-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3');

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

        static::$document->setDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0);

        static::$document->setDocumentProjectReference('PROJECT-1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');

        static::$document->setDocumentProjectReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0);

        static::$document->setDocumentProjectReference('PROJECT-1', 'Project 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1);

        static::$document->addDocumentProjectReference('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1);

        static::$document->addDocumentProjectReference('PROJECT-2', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 0, 'PROJECT-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ProjectReference/cbc:ID', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentDespatchAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentDespatchAdviceReference('DESPADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentDespatchAdviceReference('DESPADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentDespatchAdviceReference('DESPADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);

        static::$document->setDocumentDespatchAdviceReference('DESPADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 0, 'DESPADV-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:DespatchDocumentReference/cbc:IssueDate', 1);
    }

    public function testSetAddDocumentReceivingAdviceReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentReceivingAdviceReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);

        static::$document->setDocumentReceivingAdviceReference('RECADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentReceivingAdviceReference('RECADV-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        static::$document->addDocumentReceivingAdviceReference('RECADV-2-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-2-2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);

        static::$document->setDocumentReceivingAdviceReference('RECADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 0, 'RECADV-3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:ReceiptDocumentReference/cbc:IssueDate', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        static::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        static::$document->setDocumentSupplyChainEvent((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        static::$document->setDocumentSupplyChainEvent(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);
    }

    public function testSetDocumentBuyerReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        static::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        static::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        static::$document->setDocumentBuyerReference('BUYERREF');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:BuyerReference', 0, 'BUYERREF');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        static::$document->setDocumentBuyerReference(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);

        static::$document->setDocumentBuyerReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:BuyerReference', 1);
    }

    public function testSetAddDocumentSellerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName('Seller Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentSellerName('Seller Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentSellerName('Seller Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Seller Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentSellerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerId('Seller Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentSellerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentSellerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentSellerId('Seller Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Id 2');

        static::$document->setDocumentSellerId('Seller Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentSellerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerGlobalId('Seller Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentSellerGlobalId('Seller Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->addDocumentSellerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->addDocumentSellerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->addDocumentSellerGlobalId('Seller Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->addDocumentSellerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->addDocumentSellerGlobalId('Seller Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 1', 'schemeID', '0088');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2, 'Seller Global Id 2', 'schemeID', '0088');

        static::$document->setDocumentSellerGlobalId('Seller Global Id 3', '0088');

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

        static::$document->setDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentSellerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VAT');

        static::$document->setDocumentSellerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentSellerTaxRegistration('FC', '999999999');

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

        static::$document->setDocumentSellerAddress();

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

        static::$document->setDocumentSellerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

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

        static::$document->setDocumentSellerAddress('Line A', 'Line B', 'Line C');

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

        static::$document->addDocumentSellerAddress();

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

        static::$document->addDocumentSellerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

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

        static::$document->setDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentSellerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentSellerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentSellerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentSellerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentSellerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentSellerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentSellerLegalOrganisation('8885', '987654321', 'Company Name 2');

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

        static::$document->setDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentSellerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentSellerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentSellerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentSellerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
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

        static::$document->setDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentSellerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentSellerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentSellerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentSellerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentSellerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentSellerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentSellerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentBuyerName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName('Buyer Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentBuyerName('Buyer Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentBuyerName('Buyer Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
    }

    public function testSetAddDocumentBuyerId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerId('Buyer Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerId('Buyer Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerId('Buyer Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentBuyerGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerGlobalId('Buyer Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentBuyerGlobalId('Buyer Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentBuyerGlobalId('Buyer Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Buyer Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentBuyerTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentBuyerTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentBuyerTaxRegistration('FC', '999999999');

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

        static::$document->setDocumentBuyerAddress();

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

        static::$document->setDocumentBuyerAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

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

        static::$document->setDocumentBuyerAddress('Line A', 'Line B', 'Line C');

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

        static::$document->addDocumentBuyerAddress();

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

        static::$document->addDocumentBuyerAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

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

        static::$document->setDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentBuyerLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentBuyerLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentBuyerLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentBuyerLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'Company Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentBuyerLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentBuyerLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentBuyerLegalOrganisation('8885', '987654321', 'Company Name 2');

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

        static::$document->setDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentBuyerContact();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentBuyerContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-111-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentBuyerContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-222-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user2@nowhere.all');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentBuyerContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0, 'Name 3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0, '+49-333-123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
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

        static::$document->setDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentBuyerCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->setDocumentBuyerCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentBuyerCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentBuyerCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentBuyerCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentBuyerCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        static::$document->addDocumentBuyerCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'user2@somewhere.all', 'schemeID', 'EM');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeName(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName('TaxRepresentative Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentTaxRepresentativeName('TaxRepresentative Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentTaxRepresentativeName('TaxRepresentative Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 0, 'TaxRepresentative Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentTaxRepresentativeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeId('TaxRepresentative Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeId('TaxRepresentative Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeId('TaxRepresentative Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeGlobalId('TaxRepresentative Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentTaxRepresentativeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);

        static::$document->addDocumentTaxRepresentativeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0, '123456789');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 2);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTaxRepresentativeTaxRegistration('FC', '999999999');

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

        static::$document->setDocumentTaxRepresentativeAddress();

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

        static::$document->setDocumentTaxRepresentativeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

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

        static::$document->setDocumentTaxRepresentativeAddress('Line A', 'Line B', 'Line C');

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

        static::$document->addDocumentTaxRepresentativeAddress();

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

        static::$document->addDocumentTaxRepresentativeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

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

        static::$document->setDocumentTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentTaxRepresentativeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentTaxRepresentativeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentTaxRepresentativeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentTaxRepresentativeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentTaxRepresentativeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentTaxRepresentativeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentTaxRepresentativeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
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

        static::$document->setDocumentTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentTaxRepresentativeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentTaxRepresentativeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentTaxRepresentativeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentTaxRepresentativeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cac:Contact/cbc:ElectronicMail', 0);
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

        static::$document->setDocumentTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->setDocumentTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->setDocumentTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->setDocumentTaxRepresentativeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->setDocumentTaxRepresentativeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->addDocumentTaxRepresentativeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->addDocumentTaxRepresentativeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->addDocumentTaxRepresentativeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->addDocumentTaxRepresentativeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);

        static::$document->addDocumentTaxRepresentativeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxRepresentativeParty/cbc:EndpointID', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName('Ship To Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentShipToName('Ship To Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentShipToName('Ship To Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Ship To Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentShipToId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToId('Ship To Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToId('Ship To Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToId('Ship To Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);
    }

    public function testSetAddDocumentShipToGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToGlobalId('Ship To Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->addDocumentShipToGlobalId('Ship To Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);

        static::$document->setDocumentShipToGlobalId('Ship To Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, 'Ship To Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);
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

        static::$document->setDocumentShipToAddress();

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

        static::$document->setDocumentShipToAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

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

        static::$document->setDocumentShipToAddress('Line A', 'Line B', 'Line C');

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

        static::$document->addDocumentShipToAddress();

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

        static::$document->addDocumentShipToAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName('Payee Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->addDocumentPayeeName('Payee Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);

        static::$document->setDocumentPayeeName('Payee Name 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 0, 'Payee Name 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyName/cbc:Name', 1);
    }

    public function testSetAddDocumentPayeeId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeId('Payee Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeId('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeId('Payee Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeId('Payee Id 3');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentPayeeGlobalId(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Id 3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 1');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 1', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeGlobalId(null);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeGlobalId('');

        $this->disableRenderXmlContent();
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeGlobalId('Payee Global Id 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeGlobalId(null, '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 1', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->addDocumentPayeeGlobalId('Payee Global Id 2', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 2', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);

        static::$document->setDocumentPayeeGlobalId('Payee Global Id 3', '0088');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 0, 'Payee Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyIdentification/cbc:ID', 1);
    }

    public function testSetAddDocumentPayeeTaxRegistration(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration(null, null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration('VAT', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration('VAT', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration(null, '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration('', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPayeeTaxRegistration('VAT', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);

        static::$document->setDocumentPayeeTaxRegistration('FC', null);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPayeeTaxRegistration('FC', '999999999');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
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

        static::$document->setDocumentPayeeAddress();

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

        static::$document->setDocumentPayeeAddress('Line 1', 'Line 2', 'Line 3', '99999', 'City', 'DE', 'Bavaria');

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

        static::$document->setDocumentPayeeAddress('Line A', 'Line B', 'Line C');

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

        static::$document->addDocumentPayeeAddress();

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

        static::$document->addDocumentPayeeAddress('Adress-Line 1', 'Adress-Line 2', 'Adress-Line 3', '88888', 'Cityname', 'IR', 'Waterford');

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
    }

    public function testSetAddDocumentPayeeLegalOrganisation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentPayeeLegalOrganisation('8884');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentPayeeLegalOrganisation('8884', '123456789');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->setDocumentPayeeLegalOrganisation('8884', '123456789', 'Company Name');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentPayeeLegalOrganisation();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '123456789');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentPayeeLegalOrganisation('8885');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentPayeeLegalOrganisation('8885', '987654321');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        static::$document->addDocumentPayeeLegalOrganisation('8885', '987654321', 'Company Name 2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:CompanyID', 0, '987654321');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:PartyLegalEntity/cbc:RegistrationName', 0);
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

        static::$document->setDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name', 'Departement Name', '+49-111-123456789', '+49-111-987654321', 'user@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentPayeeContact();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentPayeeContact('', '', '', '', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->addDocumentPayeeContact('Name 2', 'Departement Name 2', '+49-222-123456789', '+49-222-987654321', 'user2@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 1);

        static::$document->setDocumentPayeeContact('Name 3', 'Departement Name 3', '+49-333-123456789', '+49-333-987654321', 'user3@nowhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cac:Contact/cbc:ElectronicMail', 0);
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

        static::$document->setDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->setDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->setDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->setDocumentPayeeCommunication('', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->setDocumentPayeeCommunication('EM', 'user@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->addDocumentPayeeCommunication();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->addDocumentPayeeCommunication('', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->addDocumentPayeeCommunication('EM', '');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->addDocumentPayeeCommunication('', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);

        static::$document->addDocumentPayeeCommunication('EM', 'user2@somewhere.all');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PayeeParty/cbc:EndpointID', 1);
    }

    public function testSetAddDocumentPaymentMean(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMean(
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            'information'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value, 'name', 'information');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMean(
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

        static::$document->setDocumentPaymentMean(
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

        static::$document->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: 'iban',
            newMandate: 'mandate'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 0, 'mandate');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMean(
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

        static::$document->addDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:PrimaryAccountNumberID', 0, 'cardid');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:NetworkID', 0, 'mapped-from-cii');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:CardAccount/cbc:HolderName', 0, 'cardholder');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->addDocumentPaymentMean(
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

        static::$document->setDocumentPaymentMean();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);
    }

    public function testSetAddDocumentPaymentMeanAsCreditTransferSepa(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->setDocumentPaymentMeanAsCreditTransferSepa('iban', 'accountname', 'propid', 'bic', 'paymentref');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 0, InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentID', 0, 'paymentref');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'iban');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'accountname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'bic');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', 1);

        static::$document->addDocumentPaymentMeanAsCreditTransferSepa();

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

        static::$document->addDocumentPaymentMeanAsCreditTransferSepa('iban2');

        $this->disableRenderXmlContent();

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

    public function testSetAddDocumentPaymentCreditorReferenceID(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0);
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->setDocumentPaymentCreditorReferenceID();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0);
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->setDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0);
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->setDocumentPaymentCreditorReferenceID('crefref1');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0, 'crefref1');
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->addDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0, 'crefref1');
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->addDocumentPaymentCreditorReferenceID('crefref2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0, 'crefref2');
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->setDocumentPaymentCreditorReferenceID();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0);
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        static::$document->setDocumentPaymentCreditorReferenceID('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0);
        $this->assertXPathNotExistsWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 1);

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'Seller Id 3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, 'Seller Global Id 3', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        static::$document->setDocumentPaymentCreditorReferenceID('crefref1');
        static::$document->setDocumentSellerId();
        static::$document->setDocumentSellerGlobalId();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex("/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID='SEPA']", 0, 'crefref1');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'crefref1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 3);
    }

    public function testSetAddDocumentPaymentTerm(): void
    {
        static::$document->setDocumentPaymentTerm();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->setDocumentPaymentTerm('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->setDocumentPaymentTerm('Term');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Term');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->addDocumentPaymentTerm();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Term');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->addDocumentPaymentTerm('');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Term');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->addDocumentPaymentTerm('Term2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Term2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);

        static::$document->addDocumentPaymentTerm('Term3', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'MANDATE-4');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Term3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cbc:DueDate', 0, '1970-01-01');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:PaymentTerms/cbc:Note', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cbc:DueDate', 2);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentTax();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

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

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentTax();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

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

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 1, 'ReasonCode2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReason', 1, 'Reason2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 2);
    }

    public function testSetAddDocumentAllowanceCharge(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

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

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

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

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'ReasonCode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'Reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1, 'ReasonCode2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1, 'Reason2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 2);

        static::$document->setDocumentAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

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

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'ReasonCode3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'Reason3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 0, '100.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cbc:BaseAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);

        static::$document->setDocumentSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);

        static::$document->setDocumentSummation(1.0, 2.0, 3.0, 4.0, 5.0, 6.0, 7.0, 8.0, 9.0, 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0, '5.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0, '1.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0, '4.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0, '7.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0, '3.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0, '2.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0, '9.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0, '8.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1); // No Tax Currency present
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);

        static::$document->setDocumentSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);

        static::$document->setDocumentCurrency('EUR');
        static::$document->setDocumentTaxCurrency('GBP');
        static::$document->setDocumentSummation(1.0, 2.0, 3.0, 4.0, 5.0, 6.0, 7.0, 8.0, 9.0, 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0, '5.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0, '1.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0, '4.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0, '7.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0, '3.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0, '2.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0, '9.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0, '10.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0, '8.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1, '6.00', 'currencyID', 'GBP');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);

        static::$document->setDocumentCurrency();
        static::$document->setDocumentTaxCurrency();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 0, '5.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0, '1.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0, '4.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0, '7.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0, '3.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0, '2.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0, '9.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 0, '10.00', 'currencyID');
        $this->assertXPathValueWithIndexAndNotWithAttribute('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0, '8.00', 'currencyID');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 1); // No Tax Currency present
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableRoundingAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:TaxTotal/cbc:TaxAmount', 2);
    }

    public function testAddDocumentPosition(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 1);

        static::$document->addDocumentPosition();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 1);

        static::$document->addDocumentPosition('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 1);

        static::$document->addDocumentPosition('1.1', '1', 'linestatuscode', 'linestatusreasoncode');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 0, '1.1');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:ID', 1);
    }

    public function testSetAddDocumentPositionNote(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);

        static::$document->setDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);

        static::$document->setDocumentPositionNote('content', 'contentcode', 'subjectcode');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0, 'content');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);

        static::$document->addDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0, 'content');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);

        static::$document->addDocumentPositionNote('content2', 'contentcode2', 'subjectcode2');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0, 'content2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);

        static::$document->setDocumentPositionNote();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:Note', 2);
    }

    public function testSetDocumentPositionProductDetails(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);

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

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid', 'schemeID', 'productglobalidtype');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
    }

    public function testSetAddDocumentPositionProductCharacteristic(): void
    {
        // Empty product

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Set empty characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Set valid characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic(
            'characteristicdescription',
            'characteristicvalue',
            'characteristictype',
            100.0,
            'LTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Add empty characteristics to a empty product

        static::$document->addDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Add valid characteristics to a empty product

        static::$document->addDocumentPositionProductCharacteristic(
            'characteristicdescription2',
            'characteristicvalue2',
            'characteristictype2',
            200.0,
            'MTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Remove product details of empty product. The characteristics should not be there...

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Set invalid characteristics of an empty product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

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

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Set invalidvalid characteristics of a given product

        static::$document->setDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Set valid characteristics of a given product

        static::$document->setDocumentPositionProductCharacteristic(
            'characteristicdescription',
            'characteristicvalue',
            'characteristictype',
            100.0,
            'LTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0, 'characteristicdescription');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0, 'characteristicvalue');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Add empty characteristics to a given product

        static::$document->addDocumentPositionProductCharacteristic();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0, 'characteristicdescription');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0, 'characteristicvalue');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);

        // Add valid characteristics to a given product

        static::$document->addDocumentPositionProductCharacteristic(
            'characteristicdescription2',
            'characteristicvalue2',
            'characteristictype2',
            200.0,
            'MTR'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0, 'characteristicdescription');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0, 'characteristicvalue');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1, 'characteristicdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1, 'characteristicvalue2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 2);

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

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid3', 'schemeID', 'productglobalidtype3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:Value', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:AdditionalItemProperty/cbc:ValueQuantity', 1);
    }

    public function testSetDocumentPositionProductClassification(): void
    {
        // Empty product

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Set empty classification of an empty product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Set valid classification of an empty product

        static::$document->setDocumentPositionProductClassification(
            'classcode',
            'listid',
            'listversionid',
            'classname'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Add empty classification to a empty product

        static::$document->addDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Add valid classification to a empty product

        static::$document->addDocumentPositionProductClassification(
            'classcode2',
            'listid2',
            'listversionid2',
            'classname2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Remove product details of empty product. The classification should not be there...

        static::$document->setDocumentPositionProductDetails();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Set invalid classification of an empty product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

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

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Set epty classification of a given product

        static::$document->setDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Set valid classification of a given product

        static::$document->setDocumentPositionProductClassification(
            'classcode',
            'listid',
            'listversionid',
            'classname'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Add empty classification to a given product

        static::$document->addDocumentPositionProductClassification();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);

        // Add valid classification to a given product

        static::$document->addDocumentPositionProductClassification(
            'classcode2',
            'listid2',
            'listversionid2',
            'classname2'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid2', 'schemeID', 'productglobalidtype2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listID', 'listid');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, 'classcode', 'listVersionID', 'listversionid');
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1, 'classcode2', 'listID', 'listid2');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1, 'classcode2', 'listVersionID', 'listversionid2');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 2);

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

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 0, 'productdescription3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'productname3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 0, 'productbuyerid3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'productsellerid3');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, 'productglobalid3', 'schemeID', 'productglobalidtype3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'productcountry3');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:BuyersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->setDocumentPositionBuyerOrderReference('BO-1', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->setDocumentPositionBuyerOrderReference('BO-1', '100', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0, '100');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->addDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->addDocumentPositionBuyerOrderReference('BO-2');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->addDocumentPositionBuyerOrderReference('BO-2', '200', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0, '200');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->addDocumentPositionBuyerOrderReference('BO-3', '300', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0, '300');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 2);

        static::$document->setDocumentPositionBuyerOrderReference('BO-4', '400', (new DateTime())->createFromFormat('d.m.Y', '04.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0, '400');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);

        static::$document->setDocumentPositionBuyerOrderReference('', '', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:OrderLineReference/cbc:LineID', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 1);

        static::$document->setDocumentPositionNetPrice();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 1);

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice(1.0, 2.0, 'C62');

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0, '1.00');
        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 0, '2.00', 'unitCode', 'C62');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 1);

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice(3.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0, '3.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 1);

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 1.0, 19.0, 'reason', 'reasoncode');
        });

        static::$document->setDocumentPositionNetPrice();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Price/cbc:BaseQuantity', 1);
    }

    public function testSetDocumentPositionQuantities(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities(1.0);

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities(1.0, 'C62');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0, '1.00', 'unitCode', 'C62');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities(1.0, 'C62', 2.0, 'MTR', 3.0, 'KTR', 4.0, 'XPP');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0, '1.00', 'unitCode', 'C62');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities(4.0, 'XPP');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndexAndAttribute('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0, '4.00', 'unitCode', 'XPP');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);

        static::$document->setDocumentPositionQuantities();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1);
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

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentPositionBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentPositionBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->setDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentPositionBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0, '1970-01-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0, '1970-01-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);

        static::$document->addDocumentPositionBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.03.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.03.1970'),
            'description'
        );

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0, '1970-03-01');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0, '1970-03-31');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 2);

        static::$document->setDocumentPositionBillingPeriod(null, null, 'description');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:StartDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:EndDate', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:InvoicePeriod/cbc:Description', 1);
    }

    public function testSetAddDocumentPositionTax(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPositionTax();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->setDocumentPositionTax('S', 'VAT', 1.90, 19.0, 'reason', 'reasoncode');

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPositionTax();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);

        static::$document->addDocumentPositionTax('O', 'VAT', 0.0, 0.0, 'reason2', 'reasoncode2');

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'O');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '0.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 2);

        static::$document->setDocumentPositionTax('O', 'VAT', 0.0, 0.0, 'reason2', 'reasoncode2');

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'O');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '0.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:TaxExemptionReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1);
    }

    public function testSetAddDocumentPositionAllowanceCharge(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1);

        static::$document->setDocumentPositionAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1);

        static::$document->setDocumentPositionAllowanceCharge(true, 20.0, 200.0, 'reason', 'reasoncode', 10.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'reasoncode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0, '200.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1);

        static::$document->addDocumentPositionAllowanceCharge();

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'reasoncode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0, '200.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1);

        static::$document->addDocumentPositionAllowanceCharge(false, 150.0, 300.0, 'reason2', 'reasoncode2', 50.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'reasoncode');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'reason');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '10.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0, '20.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0, '200.00');
        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1, 'false');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1, 'reasoncode2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1, 'reason2');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1, '50.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1, '150.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1, '300.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 2);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 2);

        static::$document->setDocumentPositionAllowanceCharge(true, 200.0, 400.0, 'reason3', 'reasoncode3', 50.0);

        $this->disableRenderXmlContent();

        $this->assertXPathExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 0);
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 0, 'reasoncode3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'reason3');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 0, '50.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 0, '200.00');
        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 0, '400.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReasonCode', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:MultiplierFactorNumeric', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cac:AllowanceCharge/cbc:BaseAmount', 1);
    }

    public function testSetAddDocumentPositionSummation(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 1);

        static::$document->setDocumentPositionSummation();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 1);

        static::$document->setDocumentPositionSummation(100.0, 10.0, 20.0, 19.0, 1000.0);

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 0, '100.00');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 1);
    }

    public function testSetAddDocumentPositionPostingReference(): void
    {
        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);

        static::$document->setDocumentPositionPostingReference();

        $this->disableRenderXmlContent();

        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0);
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);

        static::$document->setDocumentPositionPostingReference('type', '0815');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0, '0815');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);

        static::$document->addDocumentPositionPostingReference();

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0, '0815');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);

        static::$document->addDocumentPositionPostingReference('type2', '4711');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0, '4711');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);

        static::$document->setDocumentPositionPostingReference('type3', '4712');

        $this->disableRenderXmlContent();

        $this->assertXPathValueWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 0, '4712');
        $this->assertXPathNotExistsWithIndex('/ns:Invoice/cac:InvoiceLine/cbc:AccountingCost', 1);
    }
}
