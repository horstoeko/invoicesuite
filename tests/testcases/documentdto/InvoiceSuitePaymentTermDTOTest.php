<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuitePaymentTermDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();

        $this->assertNull($invoiceSuitePaymentTermDTO->getDescription());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuitePaymentTermDTO->getDueDate());
        $this->assertSame([], $invoiceSuitePaymentTermDTO->getDiscountTerms());
        $this->assertSame([], $invoiceSuitePaymentTermDTO->getPenaltyTerms());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuitePaymentTermDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuitePaymentTermDTO->getDescription());
    }

    public function testDueDateGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $dueDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuitePaymentTermDTO->setDueDate($dueDateValue);

        $this->assertSame($dueDateValue, $invoiceSuitePaymentTermDTO->getDueDate());
    }

    public function testDiscountTermsGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $discountTermsValue = [];
        $invoiceSuitePaymentTermDTO->setDiscountTerms($discountTermsValue);

        $this->assertSame($discountTermsValue, $invoiceSuitePaymentTermDTO->getDiscountTerms());
    }

    public function testPenaltyTermsGetterAndSetter(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $penaltyTermsValue = [];
        $invoiceSuitePaymentTermDTO->setPenaltyTerms($penaltyTermsValue);

        $this->assertSame($penaltyTermsValue, $invoiceSuitePaymentTermDTO->getPenaltyTerms());
    }

    public function testCollectionPaymentTermDiscountIteratorsWithCallbacks(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $invoiceSuitePaymentTermDTO->addDiscountTerm(new InvoiceSuitePaymentTermDiscountDTO());
        $invoiceSuitePaymentTermDTO->addDiscountTerm(new InvoiceSuitePaymentTermDiscountDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePaymentTermDTO->firstDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextDiscountTerm($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->firstDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousDiscountTerm($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->lastDiscountTerms($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->forEachDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->forEachDiscountTerm($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePaymentTermDTO->firstDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousDiscountTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->lastDiscountTerms($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->forEachDiscountTerm($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPaymentTermPenaltyIteratorsWithCallbacks(): void
    {
        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();
        $invoiceSuitePaymentTermDTO->addPenaltyTerm(new InvoiceSuitePaymentTermPenaltyDTO());
        $invoiceSuitePaymentTermDTO->addPenaltyTerm(new InvoiceSuitePaymentTermPenaltyDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePaymentTermDTO->firstPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextPenaltyTerm($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->firstPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousPenaltyTerm($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->lastPenaltyTerm($cb, $cbElse);

        $invoiceSuitePaymentTermDTO->forEachPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->forEachPenaltyTerm($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuitePaymentTermDTO = new InvoiceSuitePaymentTermDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuitePaymentTermDTO->firstPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->nextPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->previousPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->lastPenaltyTerm($cb, $cbElse);
        $invoiceSuitePaymentTermDTO->forEachPenaltyTerm($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
