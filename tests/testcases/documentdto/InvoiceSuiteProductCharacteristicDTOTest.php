<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteProductCharacteristicDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'description' => 'Colour',
            'value'       => 'Red',
            'type'        => 'COLOR',
            'measure'     => ['value' => 12.5, 'unit' => 'CM'],
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setDescription', 'getDescription', 'Material'],
            ['setValue',       'getValue',       'Cotton'],
            ['setType',        'getType',        'MATERIAL'],
        ];
    }

    #endregion

    #region Helpers

    private function newMeasure(): InvoiceSuiteMeasureDTO
    {
        return new InvoiceSuiteMeasureDTO(5.75, 'KG');
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteProductCharacteristicDTO();

        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getValue());
        $this->assertNull($dto->getType());
        $this->assertNull($dto->getValueMeasure());
        $this->assertInstanceOf(InvoiceSuiteProductCharacteristicDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $measure = new InvoiceSuiteMeasureDTO($v['measure']['value'], $v['measure']['unit']);

        $dto = new InvoiceSuiteProductCharacteristicDTO(
            $v['description'],
            $v['value'],
            $v['type'],
            $measure
        );

        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($v['value'], $dto->getValue());
        $this->assertSame($v['type'], $dto->getType());
        $this->assertSame($measure, $dto->getValueMeasure());
        $this->assertSame($v['measure']['value'], $dto->getValueMeasure()->getValue());
        $this->assertSame($v['measure']['unit'], $dto->getValueMeasure()->getUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteProductCharacteristicDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testObjectSetterForValueMeasure(): void
    {
        $dto = new InvoiceSuiteProductCharacteristicDTO();
        $m = $this->newMeasure();

        $ret = $dto->setValueMeasure($m);

        $this->assertSame($dto, $ret);
        $this->assertSame($m, $dto->getValueMeasure());
        $this->assertSame(5.75, $dto->getValueMeasure()->getValue());
        $this->assertSame('KG', $dto->getValueMeasure()->getUnit());
    }

    #endregion
}
