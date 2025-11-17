<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteServiceChargeDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();

        $this->assertNull($invoiceSuiteServiceChargeDTO->getAmount());
        $this->assertNull($invoiceSuiteServiceChargeDTO->getDescription());
        $this->assertNull($invoiceSuiteServiceChargeDTO->getTaxCategory());
        $this->assertNull($invoiceSuiteServiceChargeDTO->getTaxType());
        $this->assertNull($invoiceSuiteServiceChargeDTO->getTaxPercent());
    }

    public function testAmountGetterAndSetter(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();
        $amountValue = 123.45;
        $invoiceSuiteServiceChargeDTO->setAmount($amountValue);

        $this->assertSame($amountValue, $invoiceSuiteServiceChargeDTO->getAmount());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteServiceChargeDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteServiceChargeDTO->getDescription());
    }

    public function testTaxCategoryGetterAndSetter(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();
        $taxCategoryValue = 'Example Value';
        $invoiceSuiteServiceChargeDTO->setTaxCategory($taxCategoryValue);

        $this->assertSame($taxCategoryValue, $invoiceSuiteServiceChargeDTO->getTaxCategory());
    }

    public function testTaxTypeGetterAndSetter(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();
        $taxTypeValue = 'Example Value';
        $invoiceSuiteServiceChargeDTO->setTaxType($taxTypeValue);

        $this->assertSame($taxTypeValue, $invoiceSuiteServiceChargeDTO->getTaxType());
    }

    public function testTaxPercentGetterAndSetter(): void
    {
        $invoiceSuiteServiceChargeDTO = new InvoiceSuiteServiceChargeDTO();
        $taxPercentValue = 123.45;
        $invoiceSuiteServiceChargeDTO->setTaxPercent($taxPercentValue);

        $this->assertSame($taxPercentValue, $invoiceSuiteServiceChargeDTO->getTaxPercent());
    }
}
