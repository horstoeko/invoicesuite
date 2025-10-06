<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteReferenceDocumentLineExtDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'referenceNumber'     => 'ORD-2024-2002',
            'referenceLineNumber' => '25',
            'typeCode'            => '916',
            'referenceTypeCode'   => 'AAA',
            'description'         => 'Attachment description',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setTypeCode',          'getTypeCode',          'DOC'],
            ['setReferenceTypeCode', 'getReferenceTypeCode', 'REF'],
            ['setDescription',       'getDescription',       'Some description'],
        ];
    }

    #endregion

    #region Helpers

    private function newAttachment(): InvoiceSuiteAttachment
    {
        return InvoiceSuiteAttachment::fromBinaryString("binary-content", "sample.bin");
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineExtDTO();

        $this->assertNull($dto->getReferenceNumber());
        $this->assertNull($dto->getReferenceLineNumber());
        $this->assertNull($dto->getReferenceDate());
        $this->assertNull($dto->getTypeCode());
        $this->assertNull($dto->getReferenceTypeCode());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getAttachment());
        $this->assertInstanceOf(InvoiceSuiteReferenceDocumentLineExtDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $date = new DateTimeImmutable('2024-07-15 09:45:00');
        $att = $this->newAttachment();

        $dto = new InvoiceSuiteReferenceDocumentLineExtDTO(
            $v['referenceNumber'],
            $v['referenceLineNumber'],
            $date,
            $v['typeCode'],
            $v['referenceTypeCode'],
            $v['description'],
            $att
        );

        $this->assertSame($v['referenceNumber'], $dto->getReferenceNumber());
        $this->assertSame($v['referenceLineNumber'], $dto->getReferenceLineNumber());
        $this->assertSame($date, $dto->getReferenceDate());
        $this->assertSame($v['typeCode'], $dto->getTypeCode());
        $this->assertSame($v['referenceTypeCode'], $dto->getReferenceTypeCode());
        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($att, $dto->getAttachment());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testAttachmentSetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $att = $this->newAttachment();

        $ret = $dto->setAttachment($att);

        $this->assertSame($dto, $ret);
        $this->assertSame($att, $dto->getAttachment());
    }

    public function testInheritedReferenceDateSetter(): void
    {
        $dto = new InvoiceSuiteReferenceDocumentLineExtDTO();
        $d = new DateTimeImmutable('2025-02-10 10:10:10');

        $ret = $dto->setReferenceDate($d);

        $this->assertSame($dto, $ret);
        $this->assertInstanceOf(DateTimeInterface::class, $dto->getReferenceDate());
        $this->assertSame($d, $dto->getReferenceDate());
    }

    #endregion
}
