<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\issues;

use DateTime;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use Iterator;

final class PaymentTermPaymentMeanOrderTest extends TestCase
{
    use HandlesXmlTests;

    /**
     * Ensure a payment-term mandate is only propagated to direct debit payment means
     *
     * @param  string $providerUniqueId
     * @param  string $rootElementName
     * @return void
     *
     * @dataProvider ublProviderProvider
     */
    public function testMandateIsOnlyPropagatedToDirectDebitPaymentMeans(
        string $providerUniqueId,
        string $rootElementName
    ): void {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->setDocumentPaymentTerm('Term', null, 'TERM-MANDATE');
        static::$document->addDocumentPaymentMean(newTypeCode: '30');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:' . $rootElementName . '/cac:PaymentMeans[1]/cac:PaymentMandate/cbc:ID');
        $this->assertXPathValue('/ns:' . $rootElementName . '/cac:PaymentMeans[2]/cac:PaymentMandate/cbc:ID', 'TERM-MANDATE');

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->addDocumentPaymentMean(newTypeCode: '30');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term', null, 'TERM-MANDATE');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:' . $rootElementName . '/cac:PaymentMeans[1]/cac:PaymentMandate/cbc:ID');
        $this->assertXPathValue('/ns:' . $rootElementName . '/cac:PaymentMeans[2]/cac:PaymentMandate/cbc:ID', 'TERM-MANDATE');
    }

    /**
     * Ensure an explicit payment-mean mandate wins independently of the call order
     *
     * @param  string $providerUniqueId
     * @param  string $rootElementName
     * @return void
     *
     * @dataProvider ublProviderProvider
     */
    public function testExplicitPaymentMeanMandateWinsIndependentlyOfCallOrder(
        string $providerUniqueId,
        string $rootElementName
    ): void {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->setDocumentPaymentTerm('Term', null, 'TERM-MANDATE');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051', 'MEAN-MANDATE');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:' . $rootElementName . '/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 'MEAN-MANDATE');

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051', 'MEAN-MANDATE');
        static::$document->setDocumentPaymentTerm('Term', null, 'TERM-MANDATE');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:' . $rootElementName . '/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 'MEAN-MANDATE');
    }

    /**
     * All UBL invoice and credit-note builders affected by the propagation logic
     *
     * @return Iterator<string, array{string, string}>
     */
    public static function ublProviderProvider(): Iterator
    {
        yield 'invoice' => ['xrechnungublinvoice', 'Invoice'];
        yield 'credit note' => ['xrechnungublcreditnote', 'CreditNote'];
    }

    /**
     * Ensure replacing a payment term synchronizes previously propagated values
     *
     * @param  string $providerUniqueId
     * @param  string $rootElementName
     * @param  string $dueDateXPath
     * @return void
     *
     * @dataProvider ublProviderWithDueDateProvider
     */
    public function testReplacingPaymentTermSynchronizesPropagatedValues(
        string $providerUniqueId,
        string $rootElementName,
        string $dueDateXPath
    ): void {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('DE02120300000000202051');
        static::$document->setDocumentPaymentTerm('Term', DateTime::createFromFormat('Y-m-d', '1970-01-31'), 'OLD-MANDATE');
        static::$document->setDocumentPaymentTerm('Replacement', DateTime::createFromFormat('Y-m-d', '1970-02-01'), 'NEW-MANDATE');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:' . $rootElementName . '/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 'NEW-MANDATE');
        $this->assertXPathValue('/ns:' . $rootElementName . $dueDateXPath, '1970-02-01');

        static::$document->setDocumentPaymentTerm('Replacement without due date or mandate');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:' . $rootElementName . '/cac:PaymentMeans/cac:PaymentMandate/cbc:ID');
        $this->assertXPathNotExists('/ns:' . $rootElementName . $dueDateXPath);
    }

    /**
     * All UBL invoice and credit-note builders with their respective due-date paths
     *
     * @return Iterator<string, array{string, string, string}>
     */
    public static function ublProviderWithDueDateProvider(): Iterator
    {
        yield 'invoice' => ['xrechnungublinvoice', 'Invoice', '/cbc:DueDate'];
        yield 'credit note' => ['xrechnungublcreditnote', 'CreditNote', '/cac:PaymentMeans/cbc:PaymentDueDate'];
    }
}
