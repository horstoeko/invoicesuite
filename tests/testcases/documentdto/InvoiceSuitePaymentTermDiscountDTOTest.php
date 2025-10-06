<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePaymentTermDiscountDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'baseAmount'      => 2000.0,
            'discountAmount'  => 40.0,
            'discountPercent' => 2.0,
            'baseDate'        => new DateTimeImmutable('2025-01-20 00:00:00'),
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setBaseAmount',      'getBaseAmount',      1500.0],
            ['setDiscountAmount',  'getDiscountAmount',  30.0],
            ['setDiscountPercent', 'getDiscountPercent', 2.5],
        ];
    }

    public static function dpDateSetter(): array
    {
        return [
            [new DateTimeImmutable('2025-01-25 00:00:00')],
        ];
    }

    public static function dpObjectSetter(): array
    {
        return [
            ['setPeriod', 'getPeriod'],
        ];
    }

    #endregion

    #region Helpers

    private function newPeriod(): InvoiceSuitePeriodDTO
    {
        return new InvoiceSuitePeriodDTO();
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuitePaymentTermDiscountDTO();

        $this->assertNull($dto->getBaseAmount());
        $this->assertNull($dto->getDiscountAmount());
        $this->assertNull($dto->getDiscountPercent());
        $this->assertNull($dto->getBaseDate());
        $this->assertNull($dto->getPeriod());
        $this->assertInstanceOf(InvoiceSuitePaymentTermDiscountDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $period = $this->newPeriod();

        $dto = new InvoiceSuitePaymentTermDiscountDTO(
            $v['baseAmount'],
            $v['discountAmount'],
            $v['discountPercent'],
            $v['baseDate'],
            $period
        );

        $this->assertSame($v['baseAmount'], $dto->getBaseAmount());
        $this->assertSame($v['discountAmount'], $dto->getDiscountAmount());
        $this->assertSame($v['discountPercent'], $dto->getDiscountPercent());
        $this->assertSame($v['baseDate'], $dto->getBaseDate());
        $this->assertSame($period, $dto->getPeriod());
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getBaseDate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, float $value): void
    {
        $dto = new InvoiceSuitePaymentTermDiscountDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpDateSetter
     */
    public function testDateSetter(DateTimeInterface $value): void
    {
        $dto = new InvoiceSuitePaymentTermDiscountDTO();
        $ret = $dto->setBaseDate($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->getBaseDate());
    }

    /**
     * @dataProvider dpObjectSetter
     */
    public function testObjectSetter(string $setter, string $getter): void
    {
        $dto = new InvoiceSuitePaymentTermDiscountDTO();
        $period = $this->newPeriod();

        $ret = $dto->{$setter}($period);

        $this->assertSame($dto, $ret);
        $this->assertSame($period, $dto->{$getter}());
    }

    #endregion
}
