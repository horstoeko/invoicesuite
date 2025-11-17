<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteDateRangeDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteDateRangeDTO = new InvoiceSuiteDateRangeDTO();

        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteDateRangeDTO->getStartDate());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteDateRangeDTO->getEndDate());
        $this->assertNull($invoiceSuiteDateRangeDTO->getDescription());
    }

    public function testStartDateGetterAndSetter(): void
    {
        $invoiceSuiteDateRangeDTO = new InvoiceSuiteDateRangeDTO();
        $startDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteDateRangeDTO->setStartDate($startDateValue);

        $this->assertSame($startDateValue, $invoiceSuiteDateRangeDTO->getStartDate());
    }

    public function testEndDateGetterAndSetter(): void
    {
        $invoiceSuiteDateRangeDTO = new InvoiceSuiteDateRangeDTO();
        $endDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteDateRangeDTO->setEndDate($endDateValue);

        $this->assertSame($endDateValue, $invoiceSuiteDateRangeDTO->getEndDate());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteDateRangeDTO = new InvoiceSuiteDateRangeDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteDateRangeDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteDateRangeDTO->getDescription());
    }
}
