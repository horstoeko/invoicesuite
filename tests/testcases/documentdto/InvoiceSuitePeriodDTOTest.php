<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePeriodDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePeriodDTO = new InvoiceSuitePeriodDTO();

        $this->assertNull($invoiceSuitePeriodDTO->getPeriod());
        $this->assertNull($invoiceSuitePeriodDTO->getPeriodUnit());
    }

    public function testPeriodGetterAndSetter(): void
    {
        $invoiceSuitePeriodDTO = new InvoiceSuitePeriodDTO();
        $periodValue = 123.45;
        $invoiceSuitePeriodDTO->setPeriod($periodValue);

        $this->assertSame($periodValue, $invoiceSuitePeriodDTO->getPeriod());
    }

    public function testPeriodUnitGetterAndSetter(): void
    {
        $invoiceSuitePeriodDTO = new InvoiceSuitePeriodDTO();
        $periodUnitValue = 'Example Value';
        $invoiceSuitePeriodDTO->setPeriodUnit($periodUnitValue);

        $this->assertSame($periodUnitValue, $invoiceSuitePeriodDTO->getPeriodUnit());
    }
}
