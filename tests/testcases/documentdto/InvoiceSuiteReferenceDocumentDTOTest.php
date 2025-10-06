<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteReferenceDocumentDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'referenceNumber' => 'REF-2024-0001',
            'referenceDate'   => new DateTimeImmutable('2024-03-15 10:30:00'),
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setReferenceNumber', 'getReferenceNumber', 'ORD-4711'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentDTO();

        $this->assertNull($dto->getReferenceNumber());
        $this->assertNull($dto->getReferenceDate());
        $this->assertInstanceOf(InvoiceSuiteReferenceDocumentDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteReferenceDocumentDTO(
            $v['referenceNumber'],
            $v['referenceDate'],
        );

        $this->assertSame($v['referenceNumber'], $dto->getReferenceNumber());
        $this->assertSame($v['referenceDate'], $dto->getReferenceDate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteReferenceDocumentDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testDateSetterGetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentDTO();
        $date = new DateTimeImmutable('2025-01-05 08:15:00');
        $ret = $dto->setReferenceDate($date);

        $this->assertSame($dto, $ret);
        $this->assertSame($date, $dto->getReferenceDate());
    }

    #endregion
}
