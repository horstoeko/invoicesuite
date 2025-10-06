<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePeriodDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'period'     => 14.0,
            'periodUnit' => 'DAY',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setPeriod',     'getPeriod',     30.5],
            ['setPeriodUnit', 'getPeriodUnit', 'MONTH'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePeriodDTO();

        $this->assertNull($dto->getPeriod());
        $this->assertNull($dto->getPeriodUnit());
        $this->assertInstanceOf(InvoiceSuitePeriodDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuitePeriodDTO(
            $v['period'],
            $v['periodUnit'],
        );

        $this->assertSame($v['period'], $dto->getPeriod());
        $this->assertSame($v['periodUnit'], $dto->getPeriodUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, $value): void
    {
        $dto = new InvoiceSuitePeriodDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
