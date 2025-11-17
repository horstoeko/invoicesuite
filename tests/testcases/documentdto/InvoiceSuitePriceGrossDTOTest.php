<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePriceGrossDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePriceGrossDTO = new InvoiceSuitePriceGrossDTO();

        $this->assertSame([], $invoiceSuitePriceGrossDTO->getAllowanceCharges());
    }

    public function testAllowanceChargesGetterAndSetter(): void
    {
        $invoiceSuitePriceGrossDTO = new InvoiceSuitePriceGrossDTO();
        $allowanceChargesValue = [];
        $invoiceSuitePriceGrossDTO->setAllowanceCharges($allowanceChargesValue);

        $this->assertSame($allowanceChargesValue, $invoiceSuitePriceGrossDTO->getAllowanceCharges());
    }

    public function testCollectionAllowanceChargeIteratorsWithCallbacks(): void
    {
        $invoiceSuitePriceGrossDTO = new InvoiceSuitePriceGrossDTO();
        $invoiceSuitePriceGrossDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());
        $invoiceSuitePriceGrossDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePriceGrossDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->nextAllowanceCharge($cb, $cbElse);

        $invoiceSuitePriceGrossDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->previousAllowanceCharge($cb, $cbElse);

        $invoiceSuitePriceGrossDTO->lastAllowanceCharge($cb, $cbElse);

        $invoiceSuitePriceGrossDTO->forEachAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->forEachAllowanceCharge($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePriceGrossDTO = new InvoiceSuitePriceGrossDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePriceGrossDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->lastAllowanceCharge($cb, $cbElse);
        $invoiceSuitePriceGrossDTO->forEachAllowanceCharge($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
