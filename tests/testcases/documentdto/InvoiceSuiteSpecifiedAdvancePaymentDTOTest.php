<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSpecifiedAdvancePaymentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteSpecifiedAdvancePaymentDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $specifiedAdvancePaymentDTO = new InvoiceSuiteSpecifiedAdvancePaymentDTO();

        $this->assertNull($specifiedAdvancePaymentDTO->getPaidAmount());
        $this->assertNull($specifiedAdvancePaymentDTO->getFormattedReceivedDateTime());
        $this->assertSame([], $specifiedAdvancePaymentDTO->getIncludedTradeTaxes());
        $this->assertNull($specifiedAdvancePaymentDTO->getInvoiceSpecifiedReferencedDocument());
    }

    public function testValuesAndNestedInformation(): void
    {
        $receivedDate = new DateTimeImmutable('1970-04-01');
        $includedTradeTax = new InvoiceSuiteTaxDTO('S', 'VAT', null, 19.0, 19.0);
        $invoiceReference = new InvoiceSuiteReferenceDocumentExtDTO(
            'ADV-INV-1',
            new DateTimeImmutable('1970-03-15'),
            '380'
        );
        $specifiedAdvancePaymentDTO = new InvoiceSuiteSpecifiedAdvancePaymentDTO(
            100.0,
            $receivedDate,
            [$includedTradeTax],
            $invoiceReference
        );

        $this->assertEqualsWithDelta(100.0, $specifiedAdvancePaymentDTO->getPaidAmount(), PHP_FLOAT_EPSILON);
        $this->assertSame($receivedDate, $specifiedAdvancePaymentDTO->getFormattedReceivedDateTime());
        $this->assertSame([$includedTradeTax], $specifiedAdvancePaymentDTO->getIncludedTradeTaxes());
        $this->assertSame($invoiceReference, $specifiedAdvancePaymentDTO->getInvoiceSpecifiedReferencedDocument());
    }
}
