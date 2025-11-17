<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePaymentTermDiscountDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();

        $this->assertNull($invoiceSuitePaymentTermDiscountDTO->getBaseAmount());
        $this->assertNull($invoiceSuitePaymentTermDiscountDTO->getDiscountAmount());
        $this->assertNull($invoiceSuitePaymentTermDiscountDTO->getDiscountPercent());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuitePaymentTermDiscountDTO->getBaseDate());
        $this->assertNotInstanceOf(InvoiceSuitePeriodDTO::class, $invoiceSuitePaymentTermDiscountDTO->getPeriod());
    }

    public function testBaseAmountGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();
        $baseAmountValue = 123.45;
        $invoiceSuitePaymentTermDiscountDTO->setBaseAmount($baseAmountValue);

        $this->assertSame($baseAmountValue, $invoiceSuitePaymentTermDiscountDTO->getBaseAmount());
    }

    public function testDiscountAmountGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();
        $discountAmountValue = 123.45;
        $invoiceSuitePaymentTermDiscountDTO->setDiscountAmount($discountAmountValue);

        $this->assertSame($discountAmountValue, $invoiceSuitePaymentTermDiscountDTO->getDiscountAmount());
    }

    public function testDiscountPercentGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();
        $discountPercentValue = 123.45;
        $invoiceSuitePaymentTermDiscountDTO->setDiscountPercent($discountPercentValue);

        $this->assertSame($discountPercentValue, $invoiceSuitePaymentTermDiscountDTO->getDiscountPercent());
    }

    public function testBaseDateGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();
        $baseDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuitePaymentTermDiscountDTO->setBaseDate($baseDateValue);

        $this->assertSame($baseDateValue, $invoiceSuitePaymentTermDiscountDTO->getBaseDate());
    }

    public function testPeriodGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDiscountDTO = new InvoiceSuitePaymentTermDiscountDTO();
        $periodValue = new InvoiceSuitePeriodDTO();
        $invoiceSuitePaymentTermDiscountDTO->setPeriod($periodValue);

        $this->assertSame($periodValue, $invoiceSuitePaymentTermDiscountDTO->getPeriod());
    }
}
