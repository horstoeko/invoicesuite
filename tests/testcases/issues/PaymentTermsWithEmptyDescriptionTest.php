<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\issues;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;

final class PaymentTermsWithEmptyDescriptionTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(4);
        InvoiceSuiteSettings::setUnitAmountDecimals(4);
    }

    public static function tearDownAfterClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);
    }

    public function testXmlOutputComfort(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');

        static::$document->setDocumentPaymentTerm();

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->addDocumentPaymentTerm();

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->setDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'z3237167126');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]', 'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700101');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', 'z3237167126');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->setDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'z3237167126');

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700101');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', 'z3237167126');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->addDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '999999999999');

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700102');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', '999999999999');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');
    }

    public function testXmlOutputExtended(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');

        static::$document->setDocumentPaymentTerm();

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->addDocumentPaymentTerm();

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->setDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024', (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'z3237167126');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]', 'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700101');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', 'z3237167126');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->setDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '01.01.1970'), 'z3237167126');

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700101');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', 'z3237167126');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]');

        static::$document->addDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '02.01.1970'), '999999999999');

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[1]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[1]', '19700101');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[1]', 'z3237167126');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[2]', '19700102');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID)[2]', '999999999999');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[3]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DueDateDateTime/udt:DateTimeString[@format="102"])[3]');
        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:DirectDebitMandateID[3]');
    }

    public function testXmlOutputXRechnungUblInvoice(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');

        static::$document->setDocumentPaymentTerm();

        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:Invoice/cbc:DueDate');

        static::$document->setDocumentPaymentTerm('');

        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:Invoice/cbc:DueDate');

        static::$document->setDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'));

        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentTerms');
        $this->assertXPathValue('/ns:Invoice/cbc:DueDate', '1970-01-31');

        // BT-89 stays tied to a non-empty BT-20: updateMandates() does not look at
        // cbc:PaymentMeansCode, and BR-DE-23-b forbids BG-19 outside a direct debit.
        static::$document->setDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm(null, null, 'z3237167126');

        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID');

        static::$document->setDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto', (new DateTime())->createFromFormat('d.m.Y', '01.02.1970'));

        $this->assertXPathValue('/ns:Invoice/cac:PaymentTerms/cbc:Note', 'Zahlbar innerhalb 30 Tagen netto');
        $this->assertXPathValue('/ns:Invoice/cbc:DueDate', '1970-02-01');
        $this->assertXPathNotExists('(/ns:Invoice/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:Invoice/cbc:DueDate)[2]');
    }

    public function testXmlOutputXRechnungUblCreditNote(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');

        static::$document->setDocumentPaymentTerm();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate');

        static::$document->setDocumentPaymentTerm('');

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate');

        static::$document->setDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');

        static::$document->setDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'));

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');

        static::$document->setDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto', (new DateTime())->createFromFormat('d.m.Y', '01.02.1970'));

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Zahlbar innerhalb 30 Tagen netto');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-02-01');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate)[2]');
    }

    public function testUblInvoiceDueDateIsReadableWithoutADescription(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');
        static::$document->setDocumentPaymentTerm(null, (new DateTime())->createFromFormat('d.m.Y', '31.01.1970'));

        $documentReader = InvoiceSuiteDocumentReader::createFromContent(static::$document->getContent());

        $this->assertTrue($documentReader->firstDocumentPaymentTerm());

        $documentReader->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('', $newDescription);
        $this->assertInstanceOf(DateTimeInterface::class, $newDueDate);
        $this->assertSame('19700131', $newDueDate->format('Ymd'));
    }

    /**
     * Ensure a replaced payment term does not retain the previous mandate
     *
     * @return void
     */
    public function testMandateIsForgottenWhenThePaymentTermIsReplacedWithoutAMandate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');
        static::$document->setDocumentPaymentTerm('Term', null, 'OLD-MANDATE');
        static::$document->setDocumentPaymentTerm('Term without mandate');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051');

        $this->assertXPathNotExists('/ns:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID');

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->setDocumentPaymentTerm('Term', null, 'OLD-MANDATE');
        static::$document->setDocumentPaymentTerm('Term without mandate');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051');

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cac:PaymentMandate/cbc:ID');
    }
}
