<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePriceDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'amount'        => 199.95,
            'priceQuantity' => ['quantity' => 5.0, 'unit' => 'C62'],
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setAmount', 'getAmount', 49.99],
        ];
    }

    #endregion

    #region Helpers

    private function newQty(float $q = 5.0, string $u = 'C62'): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO($q, $u);
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePriceDTO();

        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getPriceQuantity());
        $this->assertInstanceOf(InvoiceSuitePriceDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $qty = $this->newQty($v['priceQuantity']['quantity'], $v['priceQuantity']['unit']);

        $dto = new InvoiceSuitePriceDTO(
            $v['amount'],
            $qty,
        );

        $this->assertSame($v['amount'], $dto->getAmount());
        $this->assertSame($qty, $dto->getPriceQuantity());
        $this->assertSame($v['priceQuantity']['quantity'], $dto->getPriceQuantity()->getQuantity());
        $this->assertSame($v['priceQuantity']['unit'], $dto->getPriceQuantity()->getQuantityUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, $value): void
    {
        $dto = new InvoiceSuitePriceDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testObjectSetterPriceQuantity(): void
    {
        $dto = new InvoiceSuitePriceDTO();
        $qty = $this->newQty(12.34, 'KGM');

        $ret = $dto->setPriceQuantity($qty);

        $this->assertSame($dto, $ret);
        $this->assertSame($qty, $dto->getPriceQuantity());
        $this->assertSame(12.34, $dto->getPriceQuantity()->getQuantity());
        $this->assertSame('KGM', $dto->getPriceQuantity()->getQuantityUnit());
    }

    #endregion
}
