<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteIdDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteIdDTO = new InvoiceSuiteIdDTO();

        $this->assertNull($invoiceSuiteIdDTO->getId());
        $this->assertNull($invoiceSuiteIdDTO->getIdType());
        $this->assertFalse($invoiceSuiteIdDTO->hasId());
        $this->assertFalse($invoiceSuiteIdDTO->hasIdType());
    }

    public function testIdGetterAndSetter(): void
    {
        $invoiceSuiteIdDTO = new InvoiceSuiteIdDTO();
        $idValue = 'Example Value';
        $invoiceSuiteIdDTO->setId($idValue);

        $this->assertSame($idValue, $invoiceSuiteIdDTO->getId());
    }

    public function testHasId(): void
    {
        $invoiceSuiteIdDTO = new InvoiceSuiteIdDTO();
        $this->assertFalse($invoiceSuiteIdDTO->hasId());

        $invoiceSuiteIdDTO->setId('');
        $this->assertFalse($invoiceSuiteIdDTO->hasId());

        $invoiceSuiteIdDTO->setId('Non-empty');
        $this->assertTrue($invoiceSuiteIdDTO->hasId());
    }

    public function testIdTypeGetterAndSetter(): void
    {
        $invoiceSuiteIdDTO = new InvoiceSuiteIdDTO();
        $idTypeValue = 'Example Value';
        $invoiceSuiteIdDTO->setIdType($idTypeValue);

        $this->assertSame($idTypeValue, $invoiceSuiteIdDTO->getIdType());
    }

    public function testHasIdType(): void
    {
        $invoiceSuiteIdDTO = new InvoiceSuiteIdDTO();
        $this->assertFalse($invoiceSuiteIdDTO->hasIdType());

        $invoiceSuiteIdDTO->setIdType('');
        $this->assertFalse($invoiceSuiteIdDTO->hasIdType());

        $invoiceSuiteIdDTO->setIdType('Non-empty');
        $this->assertTrue($invoiceSuiteIdDTO->hasIdType());
    }
}
