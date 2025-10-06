<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteCommunicationDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'id'     => 'info@example.com',
            'idType' => 'EMAIL',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setId',     'getId',     'support@example.com'],
            ['setIdType', 'getIdType', 'PHONE'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteCommunicationDTO();

        $this->assertNull($dto->getId());
        $this->assertNull($dto->getIdType());
        $this->assertFalse($dto->hasId());
        $this->assertFalse($dto->hasIdType());
        $this->assertInstanceOf(InvoiceSuiteCommunicationDTO::class, $dto);
        $this->assertInstanceOf(InvoiceSuiteIdDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteCommunicationDTO(
            $v['id'],
            $v['idType'],
        );

        $this->assertSame($v['id'], $dto->getId());
        $this->assertSame($v['idType'], $dto->getIdType());
        $this->assertTrue($dto->hasId());
        $this->assertTrue($dto->hasIdType());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteCommunicationDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
