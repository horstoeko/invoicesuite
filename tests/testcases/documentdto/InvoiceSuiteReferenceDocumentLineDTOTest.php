<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteReferenceDocumentLineDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'referenceNumber'     => 'ORD-2024-1001',
            'referenceLineNumber' => '15',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setReferenceNumber',     'getReferenceNumber',     'PO-7788'],
            ['setReferenceLineNumber', 'getReferenceLineNumber', '7'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineDTO();

        $this->assertNull($dto->getReferenceNumber());
        $this->assertNull($dto->getReferenceLineNumber());
        $this->assertNull($dto->getReferenceDate());
        $this->assertInstanceOf(InvoiceSuiteReferenceDocumentLineDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $date = new DateTimeImmutable('2024-06-30 12:34:56');

        $dto = new InvoiceSuiteReferenceDocumentLineDTO(
            $v['referenceNumber'],
            $v['referenceLineNumber'],
            $date
        );

        $this->assertSame($v['referenceNumber'], $dto->getReferenceNumber());
        $this->assertSame($v['referenceLineNumber'], $dto->getReferenceLineNumber());
        $this->assertSame($date, $dto->getReferenceDate());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testReferenceDateSetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineDTO();
        $d = new DateTimeImmutable('2025-01-01 00:00:00');

        $ret = $dto->setReferenceDate($d);

        $this->assertSame($dto, $ret);
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getReferenceDate());
        $this->assertSame($d, $dto->getReferenceDate());
    }

    #endregion
}
