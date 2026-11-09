<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\issues;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProvider;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class BuyerOrderReferenceIssueDateTest extends TestCase
{
    use HandlesXmlTests;

    /**
     * @param  string $providerUniqueId
     * @param  string $rootElementName
     * @return void
     */
    #[DataProvider('ublProviderProvider')]
    public function testIssueDateIsOmittedByDefault(
        string $providerUniqueId,
        string $rootElementName
    ): void {
        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($providerUniqueId);
        static::$document->setDocumentBuyerOrderReference('BO-1', $this->buyerOrderDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue(sprintf('/ns:%s/cac:OrderReference/cbc:ID', $rootElementName), 'BO-1');
        $this->assertXPathNotExists(sprintf('/ns:%s/cac:OrderReference/cbc:IssueDate', $rootElementName));
    }

    /**
     * The format providers which use the UBL builders and leave
     * AllowBuyerOrderReferenceIssueDate at false, with the name of their root element. The CTC-FR
     * providers are absent on purpose: they enable the parameter, and are covered by
     * CtcFrUBLInvoiceProviderBuilderTest and CtcFrUBLCreditNoteProviderBuilderTest.
     *
     * @return Iterator<string, array<string>>
     */
    public static function ublProviderProvider(): Iterator
    {
        yield 'peppol30invoice' => ['peppol30invoice', 'Invoice'];
        yield 'peppol30creditnote' => ['peppol30creditnote', 'CreditNote'];
        yield 'peppol30selfbillinginvoice' => ['peppol30selfbillinginvoice', 'Invoice'];
        yield 'peppol30selfbillingcreditnote' => ['peppol30selfbillingcreditnote', 'CreditNote'];
        yield 'pinteuinvoice' => ['pinteuinvoice', 'Invoice'];
        yield 'pinteucreditnote' => ['pinteucreditnote', 'CreditNote'];
        yield 'xrechnungublinvoice' => ['xrechnungublinvoice', 'Invoice'];
        yield 'xrechnungublcreditnote' => ['xrechnungublcreditnote', 'CreditNote'];
    }

    public function testInvoiceWritesIssueDateWhenTheProviderAllowsIt(): void
    {
        static::$document = $this->invoiceProviderAllowingIssueDate()->getBuilder();
        static::$document->setDocumentBuyerOrderReference('BO-1', $this->buyerOrderDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:ID', 'BO-1');
        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:IssueDate', '1970-01-01');
    }

    public function testCreditNoteWritesIssueDateWhenTheProviderAllowsIt(): void
    {
        static::$document = $this->creditNoteProviderAllowingIssueDate()->getBuilder();
        static::$document->setDocumentBuyerOrderReference('BO-1', $this->buyerOrderDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:ID', 'BO-1');
        $this->assertXPathValue('/ns:CreditNote/cac:OrderReference/cbc:IssueDate', '1970-01-01');
    }

    public function testIssueDateIsOmittedWhenNoDateIsGiven(): void
    {
        static::$document = $this->invoiceProviderAllowingIssueDate()->getBuilder();
        static::$document->setDocumentBuyerOrderReference('BO-1');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:ID', 'BO-1');
        $this->assertXPathNotExists('/ns:Invoice/cac:OrderReference/cbc:IssueDate');
    }

    public function testIssueDateIsRemovedWhenTheReferenceIsReset(): void
    {
        static::$document = $this->invoiceProviderAllowingIssueDate()->getBuilder();
        static::$document->setDocumentBuyerOrderReference('BO-1', $this->buyerOrderDate());

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ns:Invoice/cac:OrderReference/cbc:IssueDate', '1970-01-01');

        static::$document->setDocumentBuyerOrderReference('');

        $this->disableRenderXmlContent();

        $this->assertXPathNotExists('/ns:Invoice/cac:OrderReference/cbc:ID');
        $this->assertXPathNotExists('/ns:Invoice/cac:OrderReference/cbc:IssueDate');
    }

    public function testIssueDateSurvivesABuildReadRoundTrip(): void
    {
        static::$document = $this->invoiceProviderAllowingIssueDate()->getBuilder();
        static::$document->setDocumentBuyerOrderReference('BO-1', $this->buyerOrderDate());

        $documentReader = InvoiceSuiteDocumentReader::createFromContent(static::$document->getContent());

        $this->assertTrue($documentReader->firstDocumentBuyerOrderReference());

        $documentReader->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
    }

    /**
     * The buyer's order date used by all test cases
     *
     * @return DateTime
     */
    private function buyerOrderDate(): DateTime
    {
        return (new DateTime())->createFromFormat('d.m.Y', '01.01.1970');
    }

    /**
     * An invoice format provider which allows the buyer's order date to be written
     *
     * @return InvoiceSuiteAbstractDocumentFormatProvider
     */
    private function invoiceProviderAllowingIssueDate(): InvoiceSuiteAbstractDocumentFormatProvider
    {
        return new class extends InvoiceSuiteXRechnungUBLInvoiceProvider {
            /**
             * {@inheritDoc}
             */
            public function getParameters(): array
            {
                $parameters = parent::getParameters();

                $parameters['AllowBuyerOrderReferenceIssueDate'] = true;

                return $parameters;
            }
        };
    }

    /**
     * A credit note format provider which allows the buyer's order date to be written
     *
     * @return InvoiceSuiteAbstractDocumentFormatProvider
     */
    private function creditNoteProviderAllowingIssueDate(): InvoiceSuiteAbstractDocumentFormatProvider
    {
        return new class extends InvoiceSuiteXRechnungUBLCreditNoteProvider {
            /**
             * {@inheritDoc}
             */
            public function getParameters(): array
            {
                $parameters = parent::getParameters();

                $parameters['AllowBuyerOrderReferenceIssueDate'] = true;

                return $parameters;
            }
        };
    }
}
