<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePriceNetDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        $qty = new InvoiceSuiteQuantityDTO(2.5, 'C62');
        $t1 = new InvoiceSuiteTaxDTO(
            'S',
            'VAT',
            100.0,
            19.0,
            19.0,
            'Taxable',
            'S',
            new DateTimeImmutable('2024-01-15'),
            '5'
        );
        $t2 = new InvoiceSuiteTaxDTO(
            'AA',
            'VAT',
            50.0,
            0.0,
            0.0,
            'Exempt',
            'E',
            new DateTimeImmutable('2024-02-01'),
            '3'
        );

        return [[[
            'amount'        => 123.45,
            'priceQuantity' => $qty,
            'taxes'         => [$t1, $t2],
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setAmount', 'getAmount', 456.78],
        ];
    }

    public static function dpObjectSetters(): array
    {
        return [
            ['setPriceQuantity', 'getPriceQuantity', 'newQty'],
        ];
    }

    public static function dpCollections(): array
    {
        return [
            ['setTaxes', 'addTax', 'getTaxes', 'newTax'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        $a = new InvoiceSuiteTaxDTO(
            'S',
            'VAT',
            200.0,
            38.0,
            19.0,
            'Taxable',
            'S',
            new DateTimeImmutable('2024-03-10'),
            '5'
        );
        $b = new InvoiceSuiteTaxDTO(
            'Z',
            'VAT',
            80.0,
            0.0,
            0.0,
            'Zero rated',
            'Z',
            new DateTimeImmutable('2024-04-05'),
            '7'
        );

        return [
            ['Taxes', 'Tax', [$a, $b]],
        ];
    }

    #endregion

    #region Helpers

    private function newQty(): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO(1.0, 'C62');
    }

    private function newTax(): InvoiceSuiteTaxDTO
    {
        return new InvoiceSuiteTaxDTO(
            'S',
            'VAT',
            100.0,
            19.0,
            19.0,
            'Standard rate',
            'S',
            new DateTimeImmutable('2024-01-01'),
            '5'
        );
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePriceNetDTO();

        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getPriceQuantity());
        $this->assertSame([], $dto->getTaxes());
        $this->assertInstanceOf(InvoiceSuitePriceNetDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuitePriceNetDTO(
            $v['amount'],
            $v['priceQuantity'],
            $v['taxes']
        );

        $this->assertSame($v['amount'], $dto->getAmount());
        $this->assertSame($v['priceQuantity'], $dto->getPriceQuantity());
        $this->assertSame($v['taxes'], $dto->getTaxes());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, float $value): void
    {
        $dto = new InvoiceSuitePriceNetDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpObjectSetters
     */
    public function testObjectSetters(string $setter, string $getter, string $factoryName): void
    {
        $dto = new InvoiceSuitePriceNetDTO();
        $obj = $this->{$factoryName}();

        $ret = $dto->{$setter}($obj);

        $this->assertSame($dto, $ret);
        $this->assertSame($obj, $dto->{$getter}());
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
        $dto = new InvoiceSuitePriceNetDTO();
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
        $dto = new InvoiceSuitePriceNetDTO();
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

    #endregion
}
