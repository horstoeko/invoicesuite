<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

final class InvoiceSuiteReferenceDocumentLineExtDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteReferenceDocumentLineExtDTO = new InvoiceSuiteReferenceDocumentLineExtDTO();

        $this->assertNull($invoiceSuiteReferenceDocumentLineExtDTO->getTypeCode());
        $this->assertNull($invoiceSuiteReferenceDocumentLineExtDTO->getReferenceTypeCode());
        $this->assertNull($invoiceSuiteReferenceDocumentLineExtDTO->getDescription());
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $invoiceSuiteReferenceDocumentLineExtDTO->getAttachment());
    }

    public function testTypeCodeGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineExtDTO = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $typeCodeValue = 'Example Value';
        $invoiceSuiteReferenceDocumentLineExtDTO->setTypeCode($typeCodeValue);

        $this->assertSame($typeCodeValue, $invoiceSuiteReferenceDocumentLineExtDTO->getTypeCode());
    }

    public function testReferenceTypeCodeGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineExtDTO = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $referenceTypeCodeValue = 'Example Value';
        $invoiceSuiteReferenceDocumentLineExtDTO->setReferenceTypeCode($referenceTypeCodeValue);

        $this->assertSame($referenceTypeCodeValue, $invoiceSuiteReferenceDocumentLineExtDTO->getReferenceTypeCode());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteReferenceDocumentLineExtDTO = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteReferenceDocumentLineExtDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteReferenceDocumentLineExtDTO->getDescription());
    }
}
