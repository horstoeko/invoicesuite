<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteTaxDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();

        $this->assertNull($invoiceSuiteTaxDTO->getCategory());
        $this->assertNull($invoiceSuiteTaxDTO->getType());
        $this->assertNull($invoiceSuiteTaxDTO->getBasisAmount());
        $this->assertNull($invoiceSuiteTaxDTO->getAmount());
        $this->assertNull($invoiceSuiteTaxDTO->getPercent());
        $this->assertNull($invoiceSuiteTaxDTO->getExemptionReason());
        $this->assertNull($invoiceSuiteTaxDTO->getExemptionReasonCode());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteTaxDTO->getDueDate());
        $this->assertNull($invoiceSuiteTaxDTO->getDueCode());
    }

    public function testCategoryGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $categoryValue = 'Example Value';
        $invoiceSuiteTaxDTO->setCategory($categoryValue);

        $this->assertSame($categoryValue, $invoiceSuiteTaxDTO->getCategory());
    }

    public function testTypeGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $typeValue = 'Example Value';
        $invoiceSuiteTaxDTO->setType($typeValue);

        $this->assertSame($typeValue, $invoiceSuiteTaxDTO->getType());
    }

    public function testBasisAmountGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $basisAmountValue = 123.45;
        $invoiceSuiteTaxDTO->setBasisAmount($basisAmountValue);

        $this->assertSame($basisAmountValue, $invoiceSuiteTaxDTO->getBasisAmount());
    }

    public function testAmountGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $amountValue = 123.45;
        $invoiceSuiteTaxDTO->setAmount($amountValue);

        $this->assertSame($amountValue, $invoiceSuiteTaxDTO->getAmount());
    }

    public function testPercentGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $percentValue = 123.45;
        $invoiceSuiteTaxDTO->setPercent($percentValue);

        $this->assertSame($percentValue, $invoiceSuiteTaxDTO->getPercent());
    }

    public function testExemptionReasonGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $exemptionReasonValue = 'Example Value';
        $invoiceSuiteTaxDTO->setExemptionReason($exemptionReasonValue);

        $this->assertSame($exemptionReasonValue, $invoiceSuiteTaxDTO->getExemptionReason());
    }

    public function testExemptionReasonCodeGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $exemptionReasonCodeValue = 'Example Value';
        $invoiceSuiteTaxDTO->setExemptionReasonCode($exemptionReasonCodeValue);

        $this->assertSame($exemptionReasonCodeValue, $invoiceSuiteTaxDTO->getExemptionReasonCode());
    }

    public function testDueDateGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $dueDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteTaxDTO->setDueDate($dueDateValue);

        $this->assertSame($dueDateValue, $invoiceSuiteTaxDTO->getDueDate());
    }

    public function testDueCodeGetterAndSetter(): void
    {
        $invoiceSuiteTaxDTO = new InvoiceSuiteTaxDTO();
        $dueCodeValue = 'Example Value';
        $invoiceSuiteTaxDTO->setDueCode($dueCodeValue);

        $this->assertSame($dueCodeValue, $invoiceSuiteTaxDTO->getDueCode());
    }
}
