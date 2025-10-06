<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteReferenceProductDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        return [[[
            'id'               => 'REF-1000',
            'name'             => 'Referenced Widget',
            'description'      => 'Referenced product description',
            'sellerId'         => 'SELL-42',
            'buyerId'          => 'BUY-77',
            'industryId'       => 'IND-ABC',
            'globalId'         => ['1234567890123', 'GTIN'],
            'unitQuantity'     => [2.5, 'C62'],
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setId',          'getId',          'PROD-9'],
            ['setName',        'getName',        'Name X'],
            ['setDescription', 'getDescription', 'Desc Y'],
            ['setSellerId',    'getSellerId',    'SELL-9'],
            ['setBuyerId',     'getBuyerId',     'BUY-9'],
            ['setIndustryId',  'getIndustryId',  'IND-9'],
        ];
    }

    #endregion

    #region Helpers

    private function newGlobalId(string $id = '4012345000006', string $type = 'GTIN'): InvoiceSuiteIdDTO
    {
        return new InvoiceSuiteIdDTO($id, $type);
    }

    private function newUnitQuantity(float $qty = 1.0, string $unit = 'C62'): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO($qty, $unit);
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteReferenceProductDTO();

        $this->assertNull($dto->getId());
        $this->assertNull($dto->getName());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getSellerId());
        $this->assertNull($dto->getBuyerId());
        $this->assertNull($dto->getGlobalId());
        $this->assertNull($dto->getIndustryId());
        $this->assertNull($dto->getUnitQuantity());
        $this->assertInstanceOf(InvoiceSuiteReferenceProductDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $gid = $this->newGlobalId($v['globalId'][0], $v['globalId'][1]);
        $qty = $this->newUnitQuantity($v['unitQuantity'][0], $v['unitQuantity'][1]);

        $dto = new InvoiceSuiteReferenceProductDTO(
            $v['id'],
            $v['name'],
            $v['description'],
            $v['sellerId'],
            $v['buyerId'],
            $gid,
            $v['industryId'],
            $qty
        );

        $this->assertSame($v['id'], $dto->getId());
        $this->assertSame($v['name'], $dto->getName());
        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($v['sellerId'], $dto->getSellerId());
        $this->assertSame($v['buyerId'], $dto->getBuyerId());
        $this->assertSame($gid, $dto->getGlobalId());
        $this->assertSame($v['industryId'], $dto->getIndustryId());
        $this->assertSame($qty, $dto->getUnitQuantity());

        $this->assertSame($v['globalId'][0], $dto->getGlobalId()?->getId());
        $this->assertSame($v['globalId'][1], $dto->getGlobalId()?->getIdType());
        $this->assertTrue($dto->getGlobalId()?->hasId());
        $this->assertTrue($dto->getGlobalId()?->hasIdType());

        $this->assertSame($v['unitQuantity'][0], $dto->getUnitQuantity()?->getQuantity());
        $this->assertSame($v['unitQuantity'][1], $dto->getUnitQuantity()?->getQuantityUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteReferenceProductDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    public function testObjectSetters(): void
    {
        $dto = new InvoiceSuiteReferenceProductDTO();
        $gid = $this->newGlobalId('9783897225833', 'ISBN');
        $qty = $this->newUnitQuantity(3.0, 'H87');

        $r1 = $dto->setGlobalId($gid);
        $r2 = $dto->setUnitQuantity($qty);

        $this->assertSame($dto, $r1);
        $this->assertSame($dto, $r2);
        $this->assertSame($gid, $dto->getGlobalId());
        $this->assertSame($qty, $dto->getUnitQuantity());

        $this->assertSame('9783897225833', $dto->getGlobalId()?->getId());
        $this->assertSame('ISBN', $dto->getGlobalId()?->getIdType());
        $this->assertTrue($dto->getGlobalId()?->hasId());
        $this->assertTrue($dto->getGlobalId()?->hasIdType());

        $this->assertSame(3.0, $dto->getUnitQuantity()?->getQuantity());
        $this->assertSame('H87', $dto->getUnitQuantity()?->getQuantityUnit());
    }

    #endregion
}
