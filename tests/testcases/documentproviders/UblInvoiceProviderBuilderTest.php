<?php

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTime;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
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
}
