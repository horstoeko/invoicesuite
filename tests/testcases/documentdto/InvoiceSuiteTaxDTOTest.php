<?php
declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;

/**
 * @covers \horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO
 */
class InvoiceSuiteTaxDTOTest extends TestCase
{
    #region DataProvider

    /**
     * Data provider that passes scalar parameters directly to the constructor.
     * This fixes the PHPUnit type error you saw.
     */
    public static function dpConstructorValues(): array
    {
        return [[
            'S',
            'VAT',
            1000.00,
            190.00,
            19.0,
            'Small business regulation',
            'E1',
            new DateTimeImmutable('2024-01-31'),
            '72',
        ]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setCategory',            'getCategory',            'Z'],
            ['setType',                'getType',                'GST'],
            ['setBasisAmount',         'getBasisAmount',         2500.55],
            ['setAmount',              'getAmount',              375.08],
            ['setPercent',             'getPercent',             15.0],
            ['setExemptionReason',     'getExemptionReason',     'Export exempt'],
            ['setExemptionReasonCode', 'getExemptionReasonCode', 'E2'],
            ['setDueCode',             'getDueCode',             '5'],
        ];
    }

    #endregion

    #region Tests

    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteTaxDTO();

        $this->assertNull($dto->getCategory());
        $this->assertNull($dto->getType());
        $this->assertNull($dto->getBasisAmount());
        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getPercent());
        $this->assertNull($dto->getExemptionReason());
        $this->assertNull($dto->getExemptionReasonCode());
        $this->assertNull($dto->getDueDate());
        $this->assertNull($dto->getDueCode());

        $this->assertInstanceOf(InvoiceSuiteTaxDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorValues
     */
    public function testConstructorWithValues(
        ?string $category,
        ?string $type,
        ?float $basisAmount,
        ?float $amount,
        ?float $percent,
        ?string $exemptionReason,
        ?string $exemptionReasonCode,
        ?\DateTimeInterface $dueDate,
        ?string $dueCode
    ): void {
        $dto = new InvoiceSuiteTaxDTO(
            $category,
            $type,
            $basisAmount,
            $amount,
            $percent,
            $exemptionReason,
            $exemptionReasonCode,
            $dueDate,
            $dueCode,
        );

        $this->assertSame($category, $dto->getCategory());
        $this->assertSame($type, $dto->getType());
        $this->assertSame($basisAmount, $dto->getBasisAmount());
        $this->assertSame($amount, $dto->getAmount());
        $this->assertSame($percent, $dto->getPercent());
        $this->assertSame($exemptionReason, $dto->getExemptionReason());
        $this->assertSame($exemptionReasonCode, $dto->getExemptionReasonCode());
        $this->assertSame($dueDate, $dto->getDueDate());
        $this->assertSame($dueCode, $dto->getDueCode());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSettersAreChainableAndReadable(string $setter, string $getter, mixed $value): void
    {
        $dto = new InvoiceSuiteTaxDTO();

        $this->assertSame($dto, $dto->{$setter}($value), 'Setter should be chainable');
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testDueDateSetterGetter(): void
    {
        $dto  = new InvoiceSuiteTaxDTO();
        $date = new DateTimeImmutable('2025-05-15 10:30:00');

        $this->assertSame($dto, $dto->setDueDate($date), 'setDueDate should be chainable');
        $this->assertSame($date, $dto->getDueDate());
    }

    public function testFluentInterfaceSetsAllFields(): void
    {
        $date = new DateTimeImmutable('2026-12-24');

        $dto = (new InvoiceSuiteTaxDTO())
            ->setCategory('R')
            ->setType('VAT')
            ->setBasisAmount(123.45)
            ->setAmount(12.34)
            ->setPercent(10.0)
            ->setExemptionReason('Reverse charge')
            ->setExemptionReasonCode('AE')
            ->setDueDate($date)
            ->setDueCode('5');

        $this->assertSame('R', $dto->getCategory());
        $this->assertSame('VAT', $dto->getType());
        $this->assertSame(123.45, $dto->getBasisAmount());
        $this->assertSame(12.34, $dto->getAmount());
        $this->assertSame(10.0, $dto->getPercent());
        $this->assertSame('Reverse charge', $dto->getExemptionReason());
        $this->assertSame('AE', $dto->getExemptionReasonCode());
        $this->assertSame($date, $dto->getDueDate());
        $this->assertSame('5', $dto->getDueCode());
    }

    public function testNullAssignments(): void
    {
        $dto = (new InvoiceSuiteTaxDTO())
            ->setCategory(null)
            ->setType(null)
            ->setBasisAmount(null)
            ->setAmount(null)
            ->setPercent(null)
            ->setExemptionReason(null)
            ->setExemptionReasonCode(null)
            ->setDueDate(null)
            ->setDueCode(null);

        $this->assertNull($dto->getCategory());
        $this->assertNull($dto->getType());
        $this->assertNull($dto->getBasisAmount());
        $this->assertNull($dto->getAmount());
        $this->assertNull($dto->getPercent());
        $this->assertNull($dto->getExemptionReason());
        $this->assertNull($dto->getExemptionReasonCode());
        $this->assertNull($dto->getDueDate());
        $this->assertNull($dto->getDueCode());
    }

    #endregion
}
