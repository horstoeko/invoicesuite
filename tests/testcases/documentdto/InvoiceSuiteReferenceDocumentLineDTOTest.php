<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteReferenceDocumentLineDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteReferenceDocumentLineDTO = new InvoiceSuiteReferenceDocumentLineDTO();

        $this->assertNull($invoiceSuiteReferenceDocumentLineDTO->getReferenceNumber());
        $this->assertNull($invoiceSuiteReferenceDocumentLineDTO->getReferenceLineNumber());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteReferenceDocumentLineDTO->getReferenceDate());
    }

    public function testReferenceNumberGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineDTO = new InvoiceSuiteReferenceDocumentLineDTO();
        $referenceNumberValue = 'Example Value';
        $invoiceSuiteReferenceDocumentLineDTO->setReferenceNumber($referenceNumberValue);

        $this->assertSame($referenceNumberValue, $invoiceSuiteReferenceDocumentLineDTO->getReferenceNumber());
    }

    public function testReferenceLineNumberGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineDTO = new InvoiceSuiteReferenceDocumentLineDTO();
        $referenceLineNumberValue = 'Example Value';
        $invoiceSuiteReferenceDocumentLineDTO->setReferenceLineNumber($referenceLineNumberValue);

        $this->assertSame($referenceLineNumberValue, $invoiceSuiteReferenceDocumentLineDTO->getReferenceLineNumber());
    }

    public function testReferenceDateGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineDTO = new InvoiceSuiteReferenceDocumentLineDTO();
        $referenceDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteReferenceDocumentLineDTO->setReferenceDate($referenceDateValue);

        $this->assertSame($referenceDateValue, $invoiceSuiteReferenceDocumentLineDTO->getReferenceDate());
    }
}
