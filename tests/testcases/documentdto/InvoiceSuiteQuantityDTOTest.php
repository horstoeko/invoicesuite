<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteQuantityDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteQuantityDTO = new InvoiceSuiteQuantityDTO();

        $this->assertNull($invoiceSuiteQuantityDTO->getQuantity());
        $this->assertNull($invoiceSuiteQuantityDTO->getQuantityUnit());
    }

    public function testQuantityGetterAndSetter(): void
    {
        $invoiceSuiteQuantityDTO = new InvoiceSuiteQuantityDTO();
        $quantityValue = 123.45;
        $invoiceSuiteQuantityDTO->setQuantity($quantityValue);

        $this->assertSame($quantityValue, $invoiceSuiteQuantityDTO->getQuantity());
    }

    public function testQuantityUnitGetterAndSetter(): void
    {
        $invoiceSuiteQuantityDTO = new InvoiceSuiteQuantityDTO();
        $quantityUnitValue = 'Example Value';
        $invoiceSuiteQuantityDTO->setQuantityUnit($quantityUnitValue);

        $this->assertSame($quantityUnitValue, $invoiceSuiteQuantityDTO->getQuantityUnit());
    }
}
