<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePaymentTermDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'description' => 'Payment due in 30 days',
            'dueDate'     => new DateTimeImmutable('2025-01-15 12:00:00'),
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setDescription', 'getDescription', 'Net 14 days'],
        ];
    }

    public static function dpScalarDateSetter(): array
    {
        return [
            [new DateTimeImmutable('2025-03-10 08:30:00')],
        ];
    }

    public static function dpCollections(): array
    {
        return [
            ['setDiscountTerms', 'addDiscountTerms', 'getDiscountTerms', 'newDiscount'],
            ['setPenaltyTerms',  'addPenaltyTerms',  'getPenaltyTerms',  'newPenalty'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        return [
            ['DiscountTerms', 'DiscountTerms', [
                new InvoiceSuitePaymentTermDiscountDTO(1000.0, 20.0, 2.0, new DateTimeImmutable('2025-01-01 00:00:00')),
                new InvoiceSuitePaymentTermDiscountDTO(500.0,  10.0, 2.0, new DateTimeImmutable('2025-01-05 00:00:00')),
            ]],
            ['PenaltyTerms',  'PenaltyTerms', [
                new InvoiceSuitePaymentTermPenaltyDTO(1000.0, 15.0, 1.5, new DateTimeImmutable('2025-02-01 00:00:00')),
                new InvoiceSuitePaymentTermPenaltyDTO(500.0,  7.5,  1.5, new DateTimeImmutable('2025-02-10 00:00:00')),
            ]],
        ];
    }

    #endregion

    #region Helpers

    private function newDiscount(): InvoiceSuitePaymentTermDiscountDTO
    {
        return new InvoiceSuitePaymentTermDiscountDTO(
            1000.0,
            20.0,
            2.0,
            new DateTimeImmutable('2025-01-01 00:00:00'),
            null
        );
    }

    private function newPenalty(): InvoiceSuitePaymentTermPenaltyDTO
    {
        return new InvoiceSuitePaymentTermPenaltyDTO(
            1000.0,
            15.0,
            1.5,
            new DateTimeImmutable('2025-02-01 00:00:00'),
            null
        );
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePaymentTermDTO();

        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getDueDate());
        $this->assertSame([], $dto->getDiscountTerms());
        $this->assertSame([], $dto->getPenaltyTerms());
        $this->assertInstanceOf(InvoiceSuitePaymentTermDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $d1 = new InvoiceSuitePaymentTermDiscountDTO(1000.0, 20.0, 2.0, new DateTimeImmutable('2025-01-01 00:00:00'));
        $d2 = new InvoiceSuitePaymentTermDiscountDTO(500.0,  10.0, 2.0, new DateTimeImmutable('2025-01-05 00:00:00'));
        $p1 = new InvoiceSuitePaymentTermPenaltyDTO(1000.0, 15.0, 1.5, new DateTimeImmutable('2025-02-01 00:00:00'));
        $p2 = new InvoiceSuitePaymentTermPenaltyDTO(500.0,  7.5,  1.5, new DateTimeImmutable('2025-02-10 00:00:00'));

        $dto = new InvoiceSuitePaymentTermDTO(
            $v['description'],
            $v['dueDate'],
            [$d1, $d2],
            [$p1, $p2]
        );

        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($v['dueDate'], $dto->getDueDate());
        $this->assertSame([$d1, $d2], $dto->getDiscountTerms());
        $this->assertSame([$p1, $p2], $dto->getPenaltyTerms());

        $this->assertSame(1000.0, $d1->getBaseAmount());
        $this->assertSame(20.0, $d1->getDiscountAmount());
        $this->assertSame(2.0, $d1->getDiscountPercent());
        $this->assertInstanceOf(DateTimeInterface::class, $d1->getBaseDate());

        $this->assertSame(1000.0, $p1->getBaseAmount());
        $this->assertSame(15.0, $p1->getPenaltyAmount());
        $this->assertSame(1.5, $p1->getPenaltyPercent());
        $this->assertInstanceOf(DateTimeInterface::class, $p1->getBaseDate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuitePaymentTermDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpScalarDateSetter
     */
    public function testScalarDateSetter(DateTimeInterface $value): void
    {
        $dto = new InvoiceSuitePaymentTermDTO();
        $ret = $dto->setDueDate($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->getDueDate());
    }

    /**
     * @dataProvider dpCollections
     */
    public function testCollectionSettersAndAdders(
        string $arraySetter,
        string $adder,
        string $arrayGetter,
        string $factoryName
    ): void {
        $dto = new InvoiceSuitePaymentTermDTO();
        $a = $this->{$factoryName}();
        $b = $this->{$factoryName}();

        $dto->{$arraySetter}([$a]);
        $this->assertSame([$a], $dto->{$arrayGetter}());

        $dto->{$adder}($b);
        $this->assertSame([$a, $b], $dto->{$arrayGetter}());
    }

    /**
     * @dataProvider dpCollectionIterators
     */
    public function testCollectionIterators(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuitePaymentTermDTO();
        $set = 'set' . $base;
        $first = 'first' . $singular;
        $next = 'next' . $singular;
        $prev = 'previous' . $singular;
        $last = 'last' . $singular;
        $each = 'forEach' . $singular;

        $dto->$set($items);

        $seen = [];

        $dto->$first(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$next(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$prev(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$last(function ($v) use (&$seen) {
            $seen[] = $v;
        });

        $count = 0;

        $dto->$each(function ($v) use (&$count) {
            $count++;
        }, null, null);

        $this->assertSame($items[0], $seen[0]);
        $this->assertSame($items[1], $seen[1]);
        $this->assertSame($items[0], $seen[2]);
        $this->assertSame($items[1], $seen[3]);
        $this->assertSame(2, $count);
    }

    public function testDiscountDtoConstructorAndSetters(): void
    {
        $dt = new DateTimeImmutable('2025-01-20 00:00:00');
        $dto = new InvoiceSuitePaymentTermDiscountDTO(2000.0, 40.0, 2.0, $dt, null);

        $this->assertSame(2000.0, $dto->getBaseAmount());
        $this->assertSame(40.0, $dto->getDiscountAmount());
        $this->assertSame(2.0, $dto->getDiscountPercent());
        $this->assertSame($dt, $dto->getBaseDate());

        $dto->setBaseAmount(1500.0)
            ->setDiscountAmount(30.0)
            ->setDiscountPercent(2.5)
            ->setBaseDate(new DateTimeImmutable('2025-01-25 00:00:00'));

        $this->assertSame(1500.0, $dto->getBaseAmount());
        $this->assertSame(30.0, $dto->getDiscountAmount());
        $this->assertSame(2.5, $dto->getDiscountPercent());
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getBaseDate());
    }

    public function testPenaltyDtoConstructorAndSetters(): void
    {
        $dt = new DateTimeImmutable('2025-02-15 00:00:00');
        $dto = new InvoiceSuitePaymentTermPenaltyDTO(1200.0, 18.0, 1.5, $dt, null);

        $this->assertSame(1200.0, $dto->getBaseAmount());
        $this->assertSame(18.0, $dto->getPenaltyAmount());
        $this->assertSame(1.5, $dto->getPenaltyPercent());
        $this->assertSame($dt, $dto->getBaseDate());

        $dto->setBaseAmount(800.0)
            ->setPenaltyAmount(8.0)
            ->setPenaltyPercent(1.0)
            ->setBaseDate(new DateTimeImmutable('2025-02-20 00:00:00'));

        $this->assertSame(800.0, $dto->getBaseAmount());
        $this->assertSame(8.0, $dto->getPenaltyAmount());
        $this->assertSame(1.0, $dto->getPenaltyPercent());
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getBaseDate());
    }

    #endregion
}
