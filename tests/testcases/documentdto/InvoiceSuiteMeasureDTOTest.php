<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteMeasureDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteMeasureDTO = new InvoiceSuiteMeasureDTO();

        $this->assertNull($invoiceSuiteMeasureDTO->getValue());
        $this->assertNull($invoiceSuiteMeasureDTO->getUnit());
    }

    public function testValueGetterAndSetter(): void
    {
        $invoiceSuiteMeasureDTO = new InvoiceSuiteMeasureDTO();
        $valueValue = 123.45;
        $invoiceSuiteMeasureDTO->setValue($valueValue);

        $this->assertSame($valueValue, $invoiceSuiteMeasureDTO->getValue());
    }

    public function testUnitGetterAndSetter(): void
    {
        $invoiceSuiteMeasureDTO = new InvoiceSuiteMeasureDTO();
        $unitValue = 'Example Value';
        $invoiceSuiteMeasureDTO->setUnit($unitValue);

        $this->assertSame($unitValue, $invoiceSuiteMeasureDTO->getUnit());
    }
}
