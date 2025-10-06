<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuitePaymentTermPenaltyDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'baseAmount'     => 1000.0,
            'penaltyAmount'  => 15.0,
            'penaltyPercent' => 1.5,
            'baseDate'       => new DateTimeImmutable('2025-02-10 00:00:00'),
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setBaseAmount',     'getBaseAmount',     1250.0],
            ['setPenaltyAmount',  'getPenaltyAmount',  20.0],
            ['setPenaltyPercent', 'getPenaltyPercent', 2.25],
        ];
    }

    public static function dpDateSetter(): array
    {
        return [
            [new DateTimeImmutable('2025-03-15 12:00:00')],
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
        $dto = new InvoiceSuitePaymentTermPenaltyDTO();

        $this->assertNull($dto->getBaseAmount());
        $this->assertNull($dto->getPenaltyAmount());
        $this->assertNull($dto->getPenaltyPercent());
        $this->assertNull($dto->getBaseDate());
        $this->assertNull($dto->getPeriod());
        $this->assertInstanceOf(InvoiceSuitePaymentTermPenaltyDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $period = $this->newPeriod();

        $dto = new InvoiceSuitePaymentTermPenaltyDTO(
            $v['baseAmount'],
            $v['penaltyAmount'],
            $v['penaltyPercent'],
            $v['baseDate'],
            $period
        );

        $this->assertSame($v['baseAmount'], $dto->getBaseAmount());
        $this->assertSame($v['penaltyAmount'], $dto->getPenaltyAmount());
        $this->assertSame($v['penaltyPercent'], $dto->getPenaltyPercent());
        $this->assertSame($v['baseDate'], $dto->getBaseDate());
        $this->assertSame($period, $dto->getPeriod());
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getBaseDate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, float $value): void
    {
        $dto = new InvoiceSuitePaymentTermPenaltyDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpDateSetter
     */
    public function testDateSetter(DateTimeInterface $value): void
    {
        $dto = new InvoiceSuitePaymentTermPenaltyDTO();
        $ret = $dto->setBaseDate($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->getBaseDate());
    }

    /**
     * @dataProvider dpObjectSetter
     */
    public function testObjectSetter(string $setter, string $getter): void
    {
        $dto = new InvoiceSuitePaymentTermPenaltyDTO();
        $period = $this->newPeriod();

        $ret = $dto->{$setter}($period);

        $this->assertSame($dto, $ret);
        $this->assertSame($period, $dto->{$getter}());
    }

    #endregion
}
