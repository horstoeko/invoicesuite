<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitesummationLineDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'netAmount'           => 123.45,
            'chargeTotalAmount'   => 5.50,
            'discountTotalAmount' => 2.25,
            'taxTotalAmount'      => 23.45,
            'grossAmount'         => 150.15,
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setNetAmount',          'getNetAmount',          200.00],
            ['setChargeTotalAmount',  'getChargeTotalAmount',  7.70],
            ['setDiscountTotalAmount', 'getDiscountTotalAmount', 3.30],
            ['setTaxTotalAmount',     'getTaxTotalAmount',     38.00],
            ['setGrossAmount',        'getGrossAmount',        242.40],
        ];
    }

    #endregion

    #region Tests

    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitesummationLineDTO();

        $this->assertNull($dto->getNetAmount());
        $this->assertNull($dto->getChargeTotalAmount());
        $this->assertNull($dto->getDiscountTotalAmount());
        $this->assertNull($dto->getTaxTotalAmount());
        $this->assertNull($dto->getGrossAmount());

        $this->assertInstanceOf(InvoiceSuitesummationLineDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValues(array $v): void
    {
        $dto = new InvoiceSuitesummationLineDTO(
            $v['netAmount'],
            $v['chargeTotalAmount'],
            $v['discountTotalAmount'],
            $v['taxTotalAmount'],
            $v['grossAmount'],
        );

        $this->assertSame($v['netAmount'], $dto->getNetAmount());
        $this->assertSame($v['chargeTotalAmount'], $dto->getChargeTotalAmount());
        $this->assertSame($v['discountTotalAmount'], $dto->getDiscountTotalAmount());
        $this->assertSame($v['taxTotalAmount'], $dto->getTaxTotalAmount());
        $this->assertSame($v['grossAmount'], $dto->getGrossAmount());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, float $value): void
    {
        $dto = new InvoiceSuitesummationLineDTO();

        $returned = $dto->{$setter}($value);
        $this->assertSame($dto, $returned, sprintf('%s should be chainable', $setter));
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
