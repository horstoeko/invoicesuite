<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

class InvoiceSuiteReferenceDocumentExtDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'referenceNumber'   => 'REF-2024-0001',
            'typeCode'          => '916',
            'referenceTypeCode' => 'AAB',
            'description'       => 'Technical specification',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setReferenceNumber',   'getReferenceNumber',   'REF-0007'],
            ['setTypeCode',          'getTypeCode',          '130'],
            ['setReferenceTypeCode', 'getReferenceTypeCode', 'ZZZ'],
            ['setDescription',       'getDescription',       'Some description'],
        ];
    }

    #endregion

    #region Helpers

    private function newAttachment(): InvoiceSuiteAttachment
    {
        return InvoiceSuiteAttachment::fromBinaryString('Hello World', 'note.txt');
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentExtDTO();

        $this->assertNull($dto->getReferenceNumber());
        $this->assertNull($dto->getReferenceDate());
        $this->assertNull($dto->getTypeCode());
        $this->assertNull($dto->getReferenceTypeCode());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getAttachment());
        $this->assertInstanceOf(InvoiceSuiteReferenceDocumentExtDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $date = new DateTimeImmutable('2024-06-15 10:30:00');
        $att = $this->newAttachment();

        $dto = new InvoiceSuiteReferenceDocumentExtDTO(
            $v['referenceNumber'],
            $date,
            $v['typeCode'],
            $v['referenceTypeCode'],
            $v['description'],
            $att
        );

        $this->assertSame($v['referenceNumber'], $dto->getReferenceNumber());
        $this->assertSame($date, $dto->getReferenceDate());
        $this->assertSame($v['typeCode'], $dto->getTypeCode());
        $this->assertSame($v['referenceTypeCode'], $dto->getReferenceTypeCode());
        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($att, $dto->getAttachment());

        $this->assertTrue($att->isBinaryAttachment());
        $this->assertTrue($att->isBinaryStringAttachment());
        $this->assertSame('Hello World', $att->getRawContent());
        $this->assertSame(base64_encode('Hello World'), $att->getContent());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteReferenceDocumentExtDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testReferenceDateSetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentExtDTO();
        $d = new DateTimeImmutable('2025-01-01 00:00:00');

        $ret = $dto->setReferenceDate($d);

        $this->assertSame($dto, $ret);
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getReferenceDate());
        $this->assertSame($d, $dto->getReferenceDate());
    }

    public function testAttachmentSetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentExtDTO();
        $att = $this->newAttachment();

        $ret = $dto->setAttachment($att);

        $this->assertSame($dto, $ret);
        $this->assertSame($att, $dto->getAttachment());
    }

    #endregion
}
