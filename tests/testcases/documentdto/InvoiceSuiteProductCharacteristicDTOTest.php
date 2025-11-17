<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteProductCharacteristicDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteProductCharacteristicDTO = new InvoiceSuiteProductCharacteristicDTO();

        $this->assertNull($invoiceSuiteProductCharacteristicDTO->getDescription());
        $this->assertNull($invoiceSuiteProductCharacteristicDTO->getValue());
        $this->assertNull($invoiceSuiteProductCharacteristicDTO->getType());
        $this->assertNotInstanceOf(InvoiceSuiteMeasureDTO::class, $invoiceSuiteProductCharacteristicDTO->getValueMeasure());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteProductCharacteristicDTO = new InvoiceSuiteProductCharacteristicDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteProductCharacteristicDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteProductCharacteristicDTO->getDescription());
    }

    public function testValueGetterAndSetter(): void
    {
        $invoiceSuiteProductCharacteristicDTO = new InvoiceSuiteProductCharacteristicDTO();
        $valueValue = 'Example Value';
        $invoiceSuiteProductCharacteristicDTO->setValue($valueValue);

        $this->assertSame($valueValue, $invoiceSuiteProductCharacteristicDTO->getValue());
    }

    public function testTypeGetterAndSetter(): void
    {
        $invoiceSuiteProductCharacteristicDTO = new InvoiceSuiteProductCharacteristicDTO();
        $typeValue = 'Example Value';
        $invoiceSuiteProductCharacteristicDTO->setType($typeValue);

        $this->assertSame($typeValue, $invoiceSuiteProductCharacteristicDTO->getType());
    }

    public function testValueMeasureGetterAndSetter(): void
    {
        $invoiceSuiteProductCharacteristicDTO = new InvoiceSuiteProductCharacteristicDTO();
        $valueMeasureValue = new InvoiceSuiteMeasureDTO();
        $invoiceSuiteProductCharacteristicDTO->setValueMeasure($valueMeasureValue);

        $this->assertSame($valueMeasureValue, $invoiceSuiteProductCharacteristicDTO->getValueMeasure());
    }
}
