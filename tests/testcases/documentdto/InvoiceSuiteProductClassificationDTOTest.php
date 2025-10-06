<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteProductClassificationDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'code'          => '12345678',
            'name'          => 'Electronics',
            'listId'        => 'UNSPSC',
            'listVersionId' => '23.0701',
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setCode',          'getCode',          '99887766'],
            ['setName',          'getName',          'Batteries'],
            ['setListId',        'getListId',        'eCl@ss'],
            ['setListVersionId', 'getListVersionId', '10.1'],
        ];
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteProductClassificationDTO();

        $this->assertNull($dto->getCode());
        $this->assertNull($dto->getName());
        $this->assertNull($dto->getListId());
        $this->assertNull($dto->getListVersionId());
        $this->assertInstanceOf(InvoiceSuiteProductClassificationDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteProductClassificationDTO(
            $v['code'],
            $v['name'],
            $v['listId'],
            $v['listVersionId']
        );

        $this->assertSame($v['code'], $dto->getCode());
        $this->assertSame($v['name'], $dto->getName());
        $this->assertSame($v['listId'], $dto->getListId());
        $this->assertSame($v['listVersionId'], $dto->getListVersionId());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteProductClassificationDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    #endregion
}
