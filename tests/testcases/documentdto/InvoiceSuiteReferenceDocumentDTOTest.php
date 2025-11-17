<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteReferenceDocumentDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteReferenceDocumentDTO = new InvoiceSuiteReferenceDocumentDTO();

        $this->assertNull($invoiceSuiteReferenceDocumentDTO->getReferenceNumber());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteReferenceDocumentDTO->getReferenceDate());
    }

    public function testReferenceNumberGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentDTO = new InvoiceSuiteReferenceDocumentDTO();
        $referenceNumberValue = 'Example Value';
        $invoiceSuiteReferenceDocumentDTO->setReferenceNumber($referenceNumberValue);

        $this->assertSame($referenceNumberValue, $invoiceSuiteReferenceDocumentDTO->getReferenceNumber());
    }

    public function testReferenceDateGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentDTO = new InvoiceSuiteReferenceDocumentDTO();
        $referenceDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteReferenceDocumentDTO->setReferenceDate($referenceDateValue);

        $this->assertSame($referenceDateValue, $invoiceSuiteReferenceDocumentDTO->getReferenceDate());
    }
}
