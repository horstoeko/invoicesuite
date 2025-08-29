<?php

namespace horstoeko\invoicesuite\tests\testcases\providers;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProviderBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

class ZfFxExtendedProviderBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        self::$document = new InvoiceSuiteZfFxExtendedProviderBuilder(new InvoiceSuiteZfFxExtendedProvider);
    }

    public function testInitRootObject(): void
    {
        self::$document->initRootObject();

        $this->assertInstanceOf(CrossIndustryInvoice::class, self::$document->getRootObject());
    }

    public function testSetDocumentNo(): void
    {
        self::$document->setDocumentNo(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID');

        self::$document->setDocumentNo('');

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID');

        self::$document->setDocumentNo("2025/08-000001");

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', "2025/08-000001");
    }

    public function testSetDocumentType(): void
    {
        self::$document->setDocumentType(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode');

        self::$document->setDocumentType('');

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode');

        self::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        self::$document->setDocumentType(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);

        self::$document->setDocumentType('');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
    }

    public function testSetDocumentDescription(): void
    {
        self::$document->setDocumentDescription(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name');

        self::$document->setDocumentDescription('');

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name');

        self::$document->setDocumentDescription('documentdescription');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 'documentdescription');

        self::$document->setDocumentDescription(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 'documentdescription');

        self::$document->setDocumentDescription('');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 'documentdescription');
    }

    public function testSetDocumentLanguage(): void
    {
        self::$document->setDocumentLanguage(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:LanguageID');

        self::$document->setDocumentLanguage("");

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:LanguageID');

        self::$document->setDocumentLanguage('de-DE');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:LanguageID', 'de-DE');

        self::$document->setDocumentLanguage(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:LanguageID', 'de-DE');

        self::$document->setDocumentLanguage('');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:LanguageID', 'de-DE');
    }

    public function testSetDocumentDate(): void
    {
        self::$document->setDocumentDate(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString');

        self::$document->setDocumentDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', '19700101', 'format', '102');

        self::$document->setDocumentDate(null);

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', '19700101', 'format', '102');
    }

    public function testSetDocumentCompleteDate(): void
    {
        self::$document->setDocumentCompleteDate(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:EffectiveSpecifiedPeriod/ram:CompleteDateTime/udt:DateTimeString');

        self::$document->setDocumentCompleteDate((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:EffectiveSpecifiedPeriod/ram:CompleteDateTime/udt:DateTimeString', '19700101', 'format', '102');

        self::$document->setDocumentCompleteDate(null);

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:EffectiveSpecifiedPeriod/ram:CompleteDateTime/udt:DateTimeString', '19700101', 'format', '102');
    }

    public function testSetDocumentCurrency(): void
    {
        self::$document->setDocumentCurrency(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode');

        self::$document->setDocumentCurrency("");

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode');

        self::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        self::$document->setDocumentCurrency(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        self::$document->setDocumentCurrency('');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::EURO->value);
    }

    public function testSetDocumentTaxCurrency(): void
    {
        self::$document->setDocumentTaxCurrency(null);

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode');

        self::$document->setDocumentTaxCurrency("");

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode');

        self::$document->setDocumentTaxCurrency(InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        self::$document->setDocumentTaxCurrency(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

        self::$document->setDocumentTaxCurrency('');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);
    }

    public function testSetDocumentIsCopy(): void
    {
        self::$document->setDocumentIsCopy(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:CopyIndicator/udt:Indicator', 'false');

        self::$document->setDocumentIsCopy(true);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:CopyIndicator/udt:Indicator', 'true');

        self::$document->setDocumentIsCopy(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:CopyIndicator/udt:Indicator', 'false');
    }

    public function testSetDocumentIsTest(): void
    {
        self::$document->setDocumentIsTest(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:TestIndicator/udt:Indicator', 'false');

        self::$document->setDocumentIsTest(true);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:TestIndicator/udt:Indicator', 'true');

        self::$document->setDocumentIsTest(null);

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:TestIndicator/udt:Indicator', 'false');
    }

    public function testSetAddDocumentNote(): void
    {
        self::$document->setDocumentNote(null, 'contentcode1', 'subjectcode1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0);

        self::$document->setDocumentNote('', 'contentcode1', 'subjectcode1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0);

        self::$document->setDocumentNote('content1', 'contentcode1', 'subjectcode1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0, 'contentcode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'content1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'subjectcode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1);

        self::$document->addDocumentNote('', 'contentcode2', 'subjectcode2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0, 'contentcode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'content1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'subjectcode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 2);

        self::$document->addDocumentNote('content2', 'contentcode2', 'subjectcode2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0, 'contentcode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'content1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'subjectcode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 1, 'contentcode2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1, 'content2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1, 'subjectcode2');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 2);

        self::$document->setDocumentNote('content3', 'contentcode3', 'subjectcode3');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0, 'contentcode3');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'content3');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'subjectcode3');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1);
    }

    public function testSetAddDocumentBillingPeriod(): void
    {
        self::$document->setDocumentBillingPeriod(null, null, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0);

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->setDocumentBillingPeriod((new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), null, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0);

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->setDocumentBillingPeriod(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'), 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0);

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->setDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0, '19700131', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->addDocumentBillingPeriod(
            null,
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0, '19700131', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            null,
            'description'
        );

        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0, '19700131', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);

        self::$document->addDocumentBillingPeriod(
            (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'),
            (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'),
            'description'
        );

        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 0, '19700131', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 0, 'description');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:StartDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:EndDateTime/udt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:BillingSpecifiedPeriod/ram:Description', 1);
    }

    public function testSetAddDocumentPostingReference(): void
    {
        self::$document->setDocumentPostingReference(null, null);

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference('type1', null);

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference('type1', '');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference(null, 'accountid1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference(null, null);

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference('', 'accountid1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0, 'type1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->addDocumentPostingReference('type2', '');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0, 'type1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);

        self::$document->addDocumentPostingReference('type2', 'accountid2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0, 'type1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1, 'accountid2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1, 'type2');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 2);

        self::$document->setDocumentPostingReference('type1', 'accountid1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 0, 'accountid1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 0, 'type1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ReceivableSpecifiedTradeAccountingAccount/ram:TypeCode', 1);
    }

    public function testSetAddDocumentSellerOrderReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentSellerOrderReference('SO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentSellerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentSellerOrderReference('SO-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentSellerOrderReference('SO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentSellerOrderReference('SO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'SO-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentBuyerOrderReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentBuyerOrderReference('BO-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentBuyerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentBuyerOrderReference('BO-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentBuyerOrderReference('BO-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentBuyerOrderReference('BO-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'BO-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentQuotationReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentQuotationReference('QU-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0, 'QU-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentQuotationReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0, 'QU-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentQuotationReference('QU-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0, 'QU-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentQuotationReference('QU-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0, 'QU-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentQuotationReference('QU-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 0, 'QU-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:QuotationReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentContractReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentContractReference('CON-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0, 'CON-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentContractReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0, 'CON-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentContractReference('CON-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0, 'CON-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentContractReference('CON-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0, 'CON-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentContractReference('CON-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 0, 'CON-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ContractReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentAdditionalReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0);

        self::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0);

        self::$document->setDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0);

        self::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '', 'reftypecode1', 'description1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0);

        self::$document->setDocumentAdditionalReference('ADD-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1', 'reftypecode1', 'description1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1);

        self::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1);

        self::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '', 'reftypecode2', 'description2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1);

        self::$document->addDocumentAdditionalReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1);

        self::$document->addDocumentAdditionalReference('ADD-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2', 'reftypecode2', 'description2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1, 'ADD-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1, '19700102', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1, 'typecode2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1, 'reftypecode2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1, 'description2');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 2);

        self::$document->setDocumentAdditionalReference('ADD-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3', 'reftypecode3', 'description3');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'ADD-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, 'typecode3');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 0, 'reftypecode3');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 0, 'description3');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:ReferenceTypeCode', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:Name', 1);
    }

    public function testSetAddDocumentInvoiceReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0);

        self::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0);

        self::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), '');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0);

        self::$document->setDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0);

        self::$document->setDocumentInvoiceReference('INVREF-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'typecode1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1);

        self::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1);

        self::$document->addDocumentInvoiceReference('INVREF-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1);

        self::$document->addDocumentInvoiceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1);

        self::$document->addDocumentInvoiceReference('INVREF-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), 'typecode2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1, 'INVREF-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1, '19700102', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1, 'typecode2');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 2);

        self::$document->setDocumentInvoiceReference('INVREF-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'), 'typecode3');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 0, 'INVREF-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 0, 'typecode3');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceReferencedDocument/ram:TypeCode', 1);
    }

    public function testSetAddDocumentProjectReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0);

        self::$document->setDocumentProjectReference('', '');

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0);

        self::$document->setDocumentProjectReference('PROJECT-1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0);

        self::$document->setDocumentProjectReference('');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0, 'PROJECT-1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0);

        self::$document->setDocumentProjectReference('PROJECT-1', 'Project 1');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0, 'PROJECT-1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0, 'Project 1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 1);

        self::$document->addDocumentProjectReference('', '');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0, 'PROJECT-1');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0, 'Project 1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 1);

        self::$document->addDocumentProjectReference('PROJECT-2', '');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 0, 'PROJECT-2');
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 0, 'Project 1');
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SpecifiedProcuringProject/ram:Name', 1);
    }

    public function testSetAddDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentUltimateCustomerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentUltimateCustomerOrderReference('UCOR-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'UCOR-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentUltimateCustomerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'UCOR-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentUltimateCustomerOrderReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'UCOR-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 2);

        self::$document->addDocumentUltimateCustomerOrderReference('UCOR-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'UCOR-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 1, 'UCOR-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 2);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 2);

        self::$document->setDocumentUltimateCustomerOrderReference('UCOR-3', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'UCOR-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:UltimateCustomerOrderReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentDespatchAdviceReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDespatchAdviceReference();

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDespatchAdviceReference('DESPADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDespatchAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'DESPADV-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDespatchAdviceReference('DESPADV-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'DESPADV-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDespatchAdviceReference('DESPADV-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'DESPADV-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentDespatchAdviceReference('DESPADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'DESPADV-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DespatchAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentReceivingAdviceReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentReceivingAdviceReference();

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentReceivingAdviceReference('RECADV-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentReceivingAdviceReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'RECADV-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentReceivingAdviceReference('RECADV-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'RECADV-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentReceivingAdviceReference('RECADV-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'RECADV-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentReceivingAdviceReference('RECADV-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 0, 'RECADV-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ReceivingAdviceReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }

    public function testSetAddDocumentDeliveryNoteReference(): void
    {
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDeliveryNoteReference();

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDeliveryNoteReference('', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0);

        self::$document->setDocumentDeliveryNoteReference('DEVNOTE-1', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'DEVNOTE-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDeliveryNoteReference('', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'DEVNOTE-1');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDeliveryNoteReference('DEVNOTE-2');

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'DEVNOTE-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700101', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->addDocumentDeliveryNoteReference('DEVNOTE-2', (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'DEVNOTE-2');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700102', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);

        self::$document->setDocumentDeliveryNoteReference('DEVNOTE-3', (new DateTime())->createFromFormat('d.m.Y', '03.01.1970'));

        $this->assertXPathValueWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'DEVNOTE-3');
        $this->assertXPathValueWithIndexAndAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 0, '19700103', "format", "102");
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:FormattedIssueDateTime/qdt:DateTimeString', 1);
    }
}
