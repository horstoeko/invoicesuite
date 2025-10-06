<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePriceGrossDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'amount'           => 249.5,
            'priceQuantity'    => ['quantity' => 2.0, 'unit' => 'C62'],
            'allowanceCharges' => 2,
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setAmount', 'getAmount', 123.45],
        ];
    }

    public static function dpCollections(): array
    {
        return [
            ['setAllowanceCharges', 'addAllowanceCharge', 'getAllowanceCharges', 'newAllowanceChargeA'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        return [
            ['AllowanceCharges', 'AllowanceCharge', [self::buildAllowanceChargeA(), self::buildAllowanceChargeB()]],
        ];
    }

    #endregion

    #region Helpers

    private function newQty(float $q = 2.0, string $u = 'C62'): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO($q, $u);
    }

    private static function buildAllowanceChargeA(): InvoiceSuiteAllowanceChargeDTO
    {
        return new InvoiceSuiteAllowanceChargeDTO(
            true,
            5.50,
            100.00,
            5.5,
            'S',
            'VAT',
            19.0,
            'Fuel surcharge',
            'FC'
        );
    }

    private static function buildAllowanceChargeB(): InvoiceSuiteAllowanceChargeDTO
    {
        return new InvoiceSuiteAllowanceChargeDTO(
            false,
            2.00,
            50.00,
            4.0,
            'Z',
            'VAT',
            0.0,
            'Customer discount',
            'CD'
        );
    }

    private function newAllowanceChargeA(): InvoiceSuiteAllowanceChargeDTO
    {
        return self::buildAllowanceChargeA();
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePriceGrossDTO();

        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getPriceQuantity());
        $this->assertSame([], $dto->getAllowanceCharges());
        $this->assertInstanceOf(InvoiceSuitePriceGrossDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $qty = $this->newQty($v['priceQuantity']['quantity'], $v['priceQuantity']['unit']);
        $ac1 = self::buildAllowanceChargeA();
        $ac2 = self::buildAllowanceChargeB();

        $dto = new InvoiceSuitePriceGrossDTO(
            $v['amount'],
            $qty,
            [$ac1, $ac2],
        );

        $this->assertSame($v['amount'], $dto->getAmount());
        $this->assertSame($qty, $dto->getPriceQuantity());
        $this->assertSame($v['priceQuantity']['quantity'], $dto->getPriceQuantity()->getQuantity());
        $this->assertSame($v['priceQuantity']['unit'], $dto->getPriceQuantity()->getQuantityUnit());
        $this->assertCount($v['allowanceCharges'], $dto->getAllowanceCharges());
        $this->assertSame([$ac1, $ac2], $dto->getAllowanceCharges());

        $this->assertTrue($dto->getAllowanceCharges()[0]->getChargeIndicator());
        $this->assertSame(5.50, $dto->getAllowanceCharges()[0]->getAmount());
        $this->assertSame(100.00, $dto->getAllowanceCharges()[0]->getBaseAmount());
        $this->assertSame(5.5, $dto->getAllowanceCharges()[0]->getPercent());
        $this->assertSame('S', $dto->getAllowanceCharges()[0]->getTaxCategory());
        $this->assertSame('VAT', $dto->getAllowanceCharges()[0]->getTaxType());
        $this->assertSame(19.0, $dto->getAllowanceCharges()[0]->getTaxPercent());
        $this->assertSame('Fuel surcharge', $dto->getAllowanceCharges()[0]->getReason());
        $this->assertSame('FC', $dto->getAllowanceCharges()[0]->getReasonCode());

        $this->assertFalse($dto->getAllowanceCharges()[1]->getChargeIndicator());
        $this->assertSame(2.00, $dto->getAllowanceCharges()[1]->getAmount());
        $this->assertSame(50.00, $dto->getAllowanceCharges()[1]->getBaseAmount());
        $this->assertSame(4.0, $dto->getAllowanceCharges()[1]->getPercent());
        $this->assertSame('Z', $dto->getAllowanceCharges()[1]->getTaxCategory());
        $this->assertSame('VAT', $dto->getAllowanceCharges()[1]->getTaxType());
        $this->assertSame(0.0, $dto->getAllowanceCharges()[1]->getTaxPercent());
        $this->assertSame('Customer discount', $dto->getAllowanceCharges()[1]->getReason());
        $this->assertSame('CD', $dto->getAllowanceCharges()[1]->getReasonCode());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, $value): void
    {
        $dto = new InvoiceSuitePriceGrossDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testObjectSetterPriceQuantity(): void
    {
        $dto = new InvoiceSuitePriceGrossDTO();
        $qty = $this->newQty(7.5, 'KGM');

        $ret = $dto->setPriceQuantity($qty);

        $this->assertSame($dto, $ret);
        $this->assertSame($qty, $dto->getPriceQuantity());
        $this->assertSame(7.5, $dto->getPriceQuantity()->getQuantity());
        $this->assertSame('KGM', $dto->getPriceQuantity()->getQuantityUnit());
    }

    /**
     * @dataProvider dpCollections
     */
    public function testCollectionSettersAndAdders(string $arraySetter, string $adder, string $arrayGetter, string $factoryName): void
    {
        $dto = new InvoiceSuitePriceGrossDTO();
        $a = $this->{$factoryName}();
        $b = self::buildAllowanceChargeB();

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
        $dto = new InvoiceSuitePriceGrossDTO();
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

    public function testCollectionIteratorsCallbackElseOnEmpty(): void
    {
        $dto = new InvoiceSuitePriceGrossDTO();

        $singular = 'AllowanceCharge';

        $first = 'first' . $singular;
        $next  = 'next' . $singular;
        $prev  = 'previous' . $singular;
        $last  = 'last' . $singular;
        $each  = 'forEach' . $singular;

        $calledFirst = false;
        $calledNext  = false;
        $calledPrev  = false;
        $calledLast  = false;
        $calledEach  = false;

        $dto->$first(
            function () {
                $this->fail('first* primary callback should not be called for empty list');
            },
            function () use (&$calledFirst) {
                $calledFirst = true;
            }
        );

        $dto->$next(
            function () {
                $this->fail('next* primary callback should not be called for empty list');
            },
            function () use (&$calledNext) {
                $calledNext = true;
            }
        );

        $dto->$prev(
            function () {
                $this->fail('previous* primary callback should not be called for empty list');
            },
            function () use (&$calledPrev) {
                $calledPrev = true;
            }
        );

        $dto->$last(
            function () {
                $this->fail('last* primary callback should not be called for empty list');
            },
            function () use (&$calledLast) {
                $calledLast = true;
            }
        );

        $dto->$each(
            function () {
                $this->fail('forEach* item callback should not be called for empty list');
            },
            function () use (&$calledEach) {
                $calledEach = true;
            },
            null
        );

        $this->assertTrue($calledFirst, 'callbackElse for first* was not called');
        $this->assertTrue($calledNext,  'callbackElse for next* was not called');
        $this->assertTrue($calledPrev,  'callbackElse for previous* was not called');
        $this->assertTrue($calledLast,  'callbackElse for last* was not called');
        $this->assertTrue($calledEach,  'callbackElse for forEach* was not called');
    }

    #endregion
}
