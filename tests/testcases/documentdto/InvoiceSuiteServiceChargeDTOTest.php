<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteServiceChargeDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'amount'      => 19.99,
            'description' => 'Service fee',
            'taxCategory' => 'S',
            'taxType'     => 'VAT',
            'taxPercent'  => 19.0,
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setAmount',      'getAmount',      12.34],
            ['setDescription', 'getDescription', 'Handling surcharge'],
            ['setTaxCategory', 'getTaxCategory', 'Z'],
            ['setTaxType',     'getTaxType',     'GST'],
            ['setTaxPercent',  'getTaxPercent',  7.0],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteServiceChargeDTO();

        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getTaxCategory());
        $this->assertNull($dto->getTaxType());
        $this->assertNull($dto->getTaxPercent());
        $this->assertInstanceOf(InvoiceSuiteServiceChargeDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteServiceChargeDTO(
            $v['amount'],
            $v['description'],
            $v['taxCategory'],
            $v['taxType'],
            $v['taxPercent']
        );

        $this->assertSame($v['amount'], $dto->getAmount());
        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($v['taxCategory'], $dto->getTaxCategory());
        $this->assertSame($v['taxType'], $dto->getTaxType());
        $this->assertSame($v['taxPercent'], $dto->getTaxPercent());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, $value): void
    {
        $dto = new InvoiceSuiteServiceChargeDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret, sprintf('%s should be chainable', $setter));
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
