<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\issues;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use Iterator;

final class CreditNotePaymentDueDateTest extends TestCase
{
    use HandlesXmlTests;

    /**
     * @param  string $providerUniqueId
     * @return void
     *
     * @dataProvider ublCreditNoteProviderProvider
     */
    public function testDueDateIsWrittenForEveryUblCreditNoteProvider(
        string $providerUniqueId
    ): void {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');
    }

    /**
     * All UBL credit note format providers, which all inherit the Peppol 3.0 builder
     *
     * @return Iterator<string, array<string>>
     */
    public static function ublCreditNoteProviderProvider(): Iterator
    {
        yield 'xrechnung' => ['xrechnungublcreditnote'];
        yield 'peppol30' => ['peppol30creditnote'];
        yield 'peppol30selfbilling' => ['peppol30selfbillingcreditnote'];
        yield 'pinteu' => ['pinteucreditnote'];
        yield 'ctcfr' => ['ctcfrublcreditnote'];
    }

    public function testDueDateIsAppliedWhenThePaymentMeanIsAddedAfterwards(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans');

        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');
    }

    public function testDueDateIsWrittenToTheFirstPaymentMeanOnly(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202052');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202053');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans[1]/cbc:PaymentDueDate', '1970-01-31');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans[position() > 1]/cbc:PaymentDueDate');
    }

    public function testTheLastDueDateWins(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());
        static::$document->setDocumentPaymentTerm('Term', (new DateTime())->createFromFormat('d.m.Y', '01.02.1970'));

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-02-01');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate)[2]');
    }

    public function testDueDateIsReappliedWhenThePaymentMeansAreReset(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');

        static::$document->setDocumentPaymentMean(newTypeCode: '58', newPayeeIban: 'DE02120300000000202052');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', '58');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');
    }

    public function testNoPaymentDueDateIsWrittenWithoutADate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate');
    }

    public function testAddDocumentPaymentTermDoesNotApplyTheDueDateTwice(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->addDocumentPaymentTerm('Term', $this->paymentDueDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:PaymentTerms/cbc:Note', 'Term');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentTerms/cbc:Note)[2]');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');
        $this->assertXPathNotExists('(/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate)[2]');
    }

    public function testDueDateSurvivesABuildReadRoundTrip(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());

        $documentReader = InvoiceSuiteDocumentReader::createFromContent(static::$document->getContent());

        $this->assertTrue($documentReader->firstDocumentPaymentTerm());

        $documentReader->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('Term', $newDescription);
        $this->assertInstanceOf(DateTimeInterface::class, $newDueDate);
        $this->assertSame('19700131', $newDueDate->format('Ymd'));
    }

    public function testDueDateIsForgottenWhenThePaymentTermIsReset(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->setDocumentPaymentTerm('Term', $this->paymentDueDate());
        static::$document->setDocumentPaymentTerm();
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms');
        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate');
    }

    public function testAddDocumentPaymentTermWithoutDescriptionReplacesTheTerm(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term');
        static::$document->addDocumentPaymentTerm(null, $this->paymentDueDate());

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:CreditNote/cac:PaymentTerms');
        $this->assertXPathValue('/ns:CreditNote/cac:PaymentMeans/cbc:PaymentDueDate', '1970-01-31');
    }

    public function testDueDateSurvivesARoundTripWithoutADescription(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');
        static::$document->setDocumentPaymentTerm(null, $this->paymentDueDate());

        $documentReader = InvoiceSuiteDocumentReader::createFromContent(static::$document->getContent());

        $this->assertTrue($documentReader->firstDocumentPaymentTerm());

        $documentReader->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('', $newDescription);
        $this->assertInstanceOf(DateTimeInterface::class, $newDueDate);
        $this->assertSame('19700131', $newDueDate->format('Ymd'));
    }

    public function testNoPaymentTermIsReportedWithoutADueDate(): void
    {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->addDocumentPaymentMean(newTypeCode: '30', newPayeeIban: 'DE02120300000000202051');

        $documentReader = InvoiceSuiteDocumentReader::createFromContent(static::$document->getContent());

        $this->assertFalse($documentReader->firstDocumentPaymentTerm());
    }

    /**
     * The payment due date used by all test cases
     *
     * @return DateTime
     */
    private function paymentDueDate(): DateTime
    {
        return (new DateTime())->createFromFormat('d.m.Y', '31.01.1970');
    }
}
