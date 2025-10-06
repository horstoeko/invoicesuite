<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteQuantityDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'quantity'     => 12.5,
            'quantityUnit' => 'C62',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setQuantity',     'getQuantity',     99.75],
            ['setQuantityUnit', 'getQuantityUnit', 'KGM'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteQuantityDTO();

        $this->assertNull($dto->getQuantity());
        $this->assertNull($dto->getQuantityUnit());
        $this->assertInstanceOf(InvoiceSuiteQuantityDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteQuantityDTO(
            $v['quantity'],
            $v['quantityUnit'],
        );

        $this->assertSame($v['quantity'], $dto->getQuantity());
        $this->assertSame($v['quantityUnit'], $dto->getQuantityUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, $value): void
    {
        $dto = new InvoiceSuiteQuantityDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
