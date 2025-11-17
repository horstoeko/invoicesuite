<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePaymentTermPenaltyDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();

        $this->assertNull($invoiceSuitePaymentTermPenaltyDTO->getBaseAmount());
        $this->assertNull($invoiceSuitePaymentTermPenaltyDTO->getPenaltyAmount());
        $this->assertNull($invoiceSuitePaymentTermPenaltyDTO->getPenaltyPercent());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuitePaymentTermPenaltyDTO->getBaseDate());
        $this->assertNotInstanceOf(InvoiceSuitePeriodDTO::class, $invoiceSuitePaymentTermPenaltyDTO->getPeriod());
    }

    public function testBaseAmountGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();
        $baseAmountValue = 123.45;
        $invoiceSuitePaymentTermPenaltyDTO->setBaseAmount($baseAmountValue);

        $this->assertSame($baseAmountValue, $invoiceSuitePaymentTermPenaltyDTO->getBaseAmount());
    }

    public function testPenaltyAmountGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();
        $penaltyAmountValue = 123.45;
        $invoiceSuitePaymentTermPenaltyDTO->setPenaltyAmount($penaltyAmountValue);

        $this->assertSame($penaltyAmountValue, $invoiceSuitePaymentTermPenaltyDTO->getPenaltyAmount());
    }

    public function testPenaltyPercentGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();
        $penaltyPercentValue = 123.45;
        $invoiceSuitePaymentTermPenaltyDTO->setPenaltyPercent($penaltyPercentValue);

        $this->assertSame($penaltyPercentValue, $invoiceSuitePaymentTermPenaltyDTO->getPenaltyPercent());
    }

    public function testBaseDateGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();
        $baseDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuitePaymentTermPenaltyDTO->setBaseDate($baseDateValue);

        $this->assertSame($baseDateValue, $invoiceSuitePaymentTermPenaltyDTO->getBaseDate());
    }

    public function testPeriodGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermPenaltyDTO = new InvoiceSuitePaymentTermPenaltyDTO();
        $periodValue = new InvoiceSuitePeriodDTO();
        $invoiceSuitePaymentTermPenaltyDTO->setPeriod($periodValue);

        $this->assertSame($periodValue, $invoiceSuitePaymentTermPenaltyDTO->getPeriod());
    }
}
