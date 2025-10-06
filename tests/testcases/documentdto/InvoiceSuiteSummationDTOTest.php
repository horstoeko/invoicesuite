<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteSummationDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'netAmount'           => 1000.00,
            'chargeTotalAmount'   => 25.50,
            'discountTotalAmount' => 10.00,
            'taxBasisAmount'      => 1015.50,
            'taxTotalAmount'      => 193.00,
            'taxTotalAmount2'     => 193.00,
            'grossAmount'         => 1208.50,
            'dueAmount'           => 1150.00,
            'prepaidAmount'       => 58.50,
            'roungingAmount'      => 0.50,
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setNetAmount',          'getNetAmount',          222.22],
            ['setChargeTotalAmount',  'getChargeTotalAmount',  3.14],
            ['setDiscountTotalAmount', 'getDiscountTotalAmount', 9.99],
            ['setTaxBasisAmount',     'getTaxBasisAmount',     210.37],
            ['setTaxTotalAmount',     'getTaxTotalAmount',     39.97],
            ['setTaxTotalAmount2',    'getTaxTotalAmount2',    39.97],
            ['setGrossAmount',        'getGrossAmount',        250.34],
            ['setDueAmount',          'getDueAmount',          200.00],
            ['setPrepaidAmount',      'getPrepaidAmount',      50.34],
            ['setRoungingAmount',     'getRoungingAmount',     0.01],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteSummationDTO();

        $this->assertNull($dto->getNetAmount());
        $this->assertNull($dto->getChargeTotalAmount());
        $this->assertNull($dto->getDiscountTotalAmount());
        $this->assertNull($dto->getTaxBasisAmount());
        $this->assertNull($dto->getTaxTotalAmount());
        $this->assertNull($dto->getTaxTotalAmount2());
        $this->assertNull($dto->getGrossAmount());
        $this->assertNull($dto->getDueAmount());
        $this->assertNull($dto->getPrepaidAmount());
        $this->assertNull($dto->getRoungingAmount());

        $this->assertInstanceOf(InvoiceSuiteSummationDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValues(array $v): void
    {
        $dto = new InvoiceSuiteSummationDTO(
            $v['netAmount'],
            $v['chargeTotalAmount'],
            $v['discountTotalAmount'],
            $v['taxBasisAmount'],
            $v['taxTotalAmount'],
            $v['taxTotalAmount2'],
            $v['grossAmount'],
            $v['dueAmount'],
            $v['prepaidAmount'],
            $v['roungingAmount'],
        );

        $this->assertSame($v['netAmount'], $dto->getNetAmount());
        $this->assertSame($v['chargeTotalAmount'], $dto->getChargeTotalAmount());
        $this->assertSame($v['discountTotalAmount'], $dto->getDiscountTotalAmount());
        $this->assertSame($v['taxBasisAmount'], $dto->getTaxBasisAmount());
        $this->assertSame($v['taxTotalAmount'], $dto->getTaxTotalAmount());
        $this->assertSame($v['taxTotalAmount2'], $dto->getTaxTotalAmount2());
        $this->assertSame($v['grossAmount'], $dto->getGrossAmount());
        $this->assertSame($v['dueAmount'], $dto->getDueAmount());
        $this->assertSame($v['prepaidAmount'], $dto->getPrepaidAmount());
        $this->assertSame($v['roungingAmount'], $dto->getRoungingAmount());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, float $value): void
    {
        $dto = new InvoiceSuiteSummationDTO();

        $ret = $dto->{$setter}($value);
        $this->assertSame($dto, $ret, sprintf('%s should be chainable', $setter));
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
