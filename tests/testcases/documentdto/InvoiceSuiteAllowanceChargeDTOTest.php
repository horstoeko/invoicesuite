<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteAllowanceChargeDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();

        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getChargeIndicator());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getAmount());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getBaseAmount());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getPercent());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getTaxCategory());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getTaxType());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getTaxPercent());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getReason());
        $this->assertNull($invoiceSuiteAllowanceChargeDTO->getReasonCode());
    }

    public function testChargeIndicatorGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $chargeIndicatorValue = true;
        $invoiceSuiteAllowanceChargeDTO->setChargeIndicator($chargeIndicatorValue);

        $this->assertSame($chargeIndicatorValue, $invoiceSuiteAllowanceChargeDTO->getChargeIndicator());
    }

    public function testAmountGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $amountValue = 123.45;
        $invoiceSuiteAllowanceChargeDTO->setAmount($amountValue);

        $this->assertSame($amountValue, $invoiceSuiteAllowanceChargeDTO->getAmount());
    }

    public function testBaseAmountGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $baseAmountValue = 123.45;
        $invoiceSuiteAllowanceChargeDTO->setBaseAmount($baseAmountValue);

        $this->assertSame($baseAmountValue, $invoiceSuiteAllowanceChargeDTO->getBaseAmount());
    }

    public function testPercentGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $percentValue = 123.45;
        $invoiceSuiteAllowanceChargeDTO->setPercent($percentValue);

        $this->assertSame($percentValue, $invoiceSuiteAllowanceChargeDTO->getPercent());
    }

    public function testTaxCategoryGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $taxCategoryValue = 'Example Value';
        $invoiceSuiteAllowanceChargeDTO->setTaxCategory($taxCategoryValue);

        $this->assertSame($taxCategoryValue, $invoiceSuiteAllowanceChargeDTO->getTaxCategory());
    }

    public function testTaxTypeGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $taxTypeValue = 'Example Value';
        $invoiceSuiteAllowanceChargeDTO->setTaxType($taxTypeValue);

        $this->assertSame($taxTypeValue, $invoiceSuiteAllowanceChargeDTO->getTaxType());
    }

    public function testTaxPercentGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $taxPercentValue = 123.45;
        $invoiceSuiteAllowanceChargeDTO->setTaxPercent($taxPercentValue);

        $this->assertSame($taxPercentValue, $invoiceSuiteAllowanceChargeDTO->getTaxPercent());
    }

    public function testReasonGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $reasonValue = 'Example Value';
        $invoiceSuiteAllowanceChargeDTO->setReason($reasonValue);

        $this->assertSame($reasonValue, $invoiceSuiteAllowanceChargeDTO->getReason());
    }

    public function testReasonCodeGetterAndSetter(): void
    {
        $invoiceSuiteAllowanceChargeDTO = new InvoiceSuiteAllowanceChargeDTO();
        $reasonCodeValue = 'Example Value';
        $invoiceSuiteAllowanceChargeDTO->setReasonCode($reasonCodeValue);

        $this->assertSame($reasonCodeValue, $invoiceSuiteAllowanceChargeDTO->getReasonCode());
    }
}
