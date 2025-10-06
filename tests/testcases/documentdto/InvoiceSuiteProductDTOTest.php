<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\tests\TestCase;

class InvoiceSuiteProductDTOTest extends TestCase
{
    #region DataProviders

    public static function dpConstructorDefaults(): array
    {
        return [['default']];
    }

    public static function dpConstructorWithValues(): array
    {
        $gid = new InvoiceSuiteIdDTO('GLN-123456', 'GLN');

        $char1 = new InvoiceSuiteProductCharacteristicDTO(
            'Colour',
            'Red',
            'CLR',
            new InvoiceSuiteMeasureDTO(12.5, 'CM')
        );

        $char2 = new InvoiceSuiteProductCharacteristicDTO(
            'Length',
            '12.50',
            'LEN',
            new InvoiceSuiteMeasureDTO(12.5, 'CM')
        );

        $cls1 = new InvoiceSuiteProductClassificationDTO('1234', 'CPV', 'CPV', '2024');
        $cls2 = new InvoiceSuiteProductClassificationDTO('998877', 'UNSPSC', 'UNSPSC', 'v20');

        $ref1 = new InvoiceSuiteReferenceProductDTO(
            'RP-1',
            'Ref A',
            'Referenced product A',
            'S-111',
            'B-222',
            new InvoiceSuiteIdDTO('REFGLN1', 'GLN'),
            'IND-99',
            new InvoiceSuiteQuantityDTO(1.0, 'PCE')
        );

        $ref2 = new InvoiceSuiteReferenceProductDTO(
            'RP-2',
            'Ref B',
            'Referenced product B',
            'S-333',
            'B-444',
            new InvoiceSuiteIdDTO('REFGLN2', 'GLN'),
            'IND-88',
            new InvoiceSuiteQuantityDTO(2.0, 'PCE')
        );

        return [[[
            'id'                  => 'P-1000',
            'name'                => 'Widget',
            'description'         => 'Sample widget',
            'sellerId'            => 'SELL-42',
            'buyerId'             => 'BUY-77',
            'globalId'            => $gid,
            'industryId'          => 'IND-123',
            'modelId'             => 'M-9000',
            'batchId'             => 'LOT-2024-01',
            'brandName'           => 'Acme',
            'modelName'           => 'X1',
            'originTradeCountry'  => 'DE',
            'characteristics'     => [$char1, $char2],
            'classifications'     => [$cls1, $cls2],
            'referenceProducts'   => [$ref1, $ref2],
        ]]];
    }

    public static function dpScalarSetters(): array
    {
        return [
            ['setId',                 'getId',                 'P-2000'],
            ['setName',               'getName',               'Gadget'],
            ['setDescription',        'getDescription',        'A better gadget'],
            ['setSellerId',           'getSellerId',           'SELL-55'],
            ['setBuyerId',            'getBuyerId',            'BUY-88'],
            ['setIndustryId',         'getIndustryId',         'IND-456'],
            ['setModelId',            'getModelId',            'M-9100'],
            ['setBatchId',            'getBatchId',            'LOT-2024-02'],
            ['setBrandName',          'getBrandName',          'BrandCo'],
            ['setModelName',          'getModelName',          'Z9'],
            ['setOriginTradeCountry', 'getOriginTradeCountry', 'US'],
        ];
    }

    public static function dpObjectSetters(): array
    {
        return [
            ['setGlobalId', 'getGlobalId', new InvoiceSuiteIdDTO('GLN-999', 'GLN')],
        ];
    }

    public static function dpCollections(): array
    {
        return [
            ['setCharacteristics', 'addCharacteristic', 'getCharacteristics', 'newCharacteristic'],
            ['setClassifications', 'addClassification', 'getClassifications', 'newClassification'],
            ['setReferenceProducts', 'addReferenceProduct', 'getReferenceProducts', 'newReferenceProduct'],
        ];
    }

    public static function dpCollectionIterators(): array
    {
        return [
            [
                'Characteristics',
                'Characteristic',
                [
                    new InvoiceSuiteProductCharacteristicDTO('Colour', 'Blue', 'CLR', new InvoiceSuiteMeasureDTO(10.0, 'CM')),
                    new InvoiceSuiteProductCharacteristicDTO('Weight', '1.2', 'WGT', new InvoiceSuiteMeasureDTO(1.2, 'KG')),
                ],
            ],
            [
                'Classifications',
                'Classification',
                [
                    new InvoiceSuiteProductClassificationDTO('1111', 'CPV', 'CPV', '2023'),
                    new InvoiceSuiteProductClassificationDTO('2222', 'UNSPSC', 'UNSPSC', 'v19'),
                ],
            ],
            [
                'ReferenceProducts',
                'ReferenceProduct',
                [
                    new InvoiceSuiteReferenceProductDTO(
                        'RP-A',
                        'Ref A',
                        'A',
                        'S-1',
                        'B-1',
                        new InvoiceSuiteIdDTO('GLN-A', 'GLN'),
                        'IND-A',
                        new InvoiceSuiteQuantityDTO(3.0, 'PCE')
                    ),
                    new InvoiceSuiteReferenceProductDTO(
                        'RP-B',
                        'Ref B',
                        'B',
                        'S-2',
                        'B-2',
                        new InvoiceSuiteIdDTO('GLN-B', 'GLN'),
                        'IND-B',
                        new InvoiceSuiteQuantityDTO(4.0, 'PCE')
                    ),
                ],
            ],
        ];
    }

    #endregion

    #region Helpers

    private function newId(): InvoiceSuiteIdDTO
    {
        return new InvoiceSuiteIdDTO('GLN-123', 'GLN');
    }

    private function newMeasure(): InvoiceSuiteMeasureDTO
    {
        return new InvoiceSuiteMeasureDTO(5.5, 'CM');
    }

    private function newCharacteristic(): InvoiceSuiteProductCharacteristicDTO
    {
        return new InvoiceSuiteProductCharacteristicDTO('Material', 'Steel', 'MAT', $this->newMeasure());
    }

    private function newClassification(): InvoiceSuiteProductClassificationDTO
    {
        return new InvoiceSuiteProductClassificationDTO('334455', 'UNSPSC', 'UNSPSC', 'v21');
    }

    private function newQuantity(): InvoiceSuiteQuantityDTO
    {
        return new InvoiceSuiteQuantityDTO(2.0, 'PCE');
    }

    private function newReferenceProduct(): InvoiceSuiteReferenceProductDTO
    {
        return new InvoiceSuiteReferenceProductDTO(
            'RP-10',
            'Ref Prod',
            'Ref product',
            'S-10',
            'B-10',
            $this->newId(),
            'IND-10',
            $this->newQuantity()
        );
    }

    #endregion

    #region Tests

    /**
     * @dataProvider dpConstructorDefaults
     */
    public function testConstructorDefaults(): void
    {
        $dto = new InvoiceSuiteProductDTO();

        $this->assertNull($dto->getId());
        $this->assertNull($dto->getName());
        $this->assertNull($dto->getDescription());
        $this->assertNull($dto->getSellerId());
        $this->assertNull($dto->getBuyerId());
        $this->assertNull($dto->getGlobalId());
        $this->assertNull($dto->getIndustryId());
        $this->assertNull($dto->getModelId());
        $this->assertNull($dto->getBatchId());
        $this->assertNull($dto->getBrandName());
        $this->assertNull($dto->getModelName());
        $this->assertNull($dto->getOriginTradeCountry());
        $this->assertSame([], $dto->getCharacteristics());
        $this->assertSame([], $dto->getClassifications());
        $this->assertSame([], $dto->getReferenceProducts());
        $this->assertInstanceOf(InvoiceSuiteProductDTO::class, $dto);
    }

    /**
     * @dataProvider dpConstructorWithValues
     */
    public function testConstructorWithValuesUsesSetterChain(array $v): void
    {
        $dto = new InvoiceSuiteProductDTO(
            $v['id'],
            $v['name'],
            $v['description'],
            $v['sellerId'],
            $v['buyerId'],
            $v['globalId'],
            $v['industryId'],
            $v['modelId'],
            $v['batchId'],
            $v['brandName'],
            $v['modelName'],
            $v['originTradeCountry'],
            $v['characteristics'],
            $v['classifications'],
            $v['referenceProducts'],
        );

        $this->assertSame($v['id'], $dto->getId());
        $this->assertSame($v['name'], $dto->getName());
        $this->assertSame($v['description'], $dto->getDescription());
        $this->assertSame($v['sellerId'], $dto->getSellerId());
        $this->assertSame($v['buyerId'], $dto->getBuyerId());
        $this->assertSame($v['globalId'], $dto->getGlobalId());
        $this->assertSame($v['industryId'], $dto->getIndustryId());
        $this->assertSame($v['modelId'], $dto->getModelId());
        $this->assertSame($v['batchId'], $dto->getBatchId());
        $this->assertSame($v['brandName'], $dto->getBrandName());
        $this->assertSame($v['modelName'], $dto->getModelName());
        $this->assertSame($v['originTradeCountry'], $dto->getOriginTradeCountry());
        $this->assertSame($v['characteristics'], $dto->getCharacteristics());
        $this->assertSame($v['classifications'], $dto->getClassifications());
        $this->assertSame($v['referenceProducts'], $dto->getReferenceProducts());

        $gid = $dto->getGlobalId();
        $this->assertNotNull($gid);
        $this->assertSame('GLN-123456', $gid->getId());
        $this->assertSame('GLN', $gid->getIdType());
        $this->assertTrue($gid->hasId());
        $this->assertTrue($gid->hasIdType());

        $char = $dto->getCharacteristics()[0];
        $this->assertSame('Colour', $char->getDescription());
        $this->assertSame('Red', $char->getValue());
        $this->assertSame('CLR', $char->getType());
        $this->assertNotNull($char->getValueMeasure());
        $this->assertSame(12.5, $char->getValueMeasure()->getValue());
        $this->assertSame('CM', $char->getValueMeasure()->getUnit());

        $cls = $dto->getClassifications()[1];
        $this->assertSame('998877', $cls->getCode());
        $this->assertSame('UNSPSC', $cls->getName());
        $this->assertSame('UNSPSC', $cls->getListId());
        $this->assertSame('v20', $cls->getListVersionId());

        $ref = $dto->getReferenceProducts()[0];
        $this->assertSame('RP-1', $ref->getId());
        $this->assertSame('Ref A', $ref->getName());
        $this->assertSame('Referenced product A', $ref->getDescription());
        $this->assertSame('S-111', $ref->getSellerId());
        $this->assertSame('B-222', $ref->getBuyerId());
        $this->assertNotNull($ref->getGlobalId());
        $this->assertSame('REFGLN1', $ref->getGlobalId()->getId());
        $this->assertSame('GLN', $ref->getGlobalId()->getIdType());
        $this->assertNotNull($ref->getUnitQuantity());
        $this->assertSame(1.0, $ref->getUnitQuantity()->getQuantity());
        $this->assertSame('PCE', $ref->getUnitQuantity()->getQuantityUnit());
    }

    /**
     * @dataProvider dpScalarSetters
     */
    public function testScalarSetters(string $setter, string $getter, string $value): void
    {
        $dto = new InvoiceSuiteProductDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpObjectSetters
     */
    public function testObjectSetters(string $setter, string $getter, object $value): void
    {
        $dto = new InvoiceSuiteProductDTO();
        $ret = $dto->{$setter}($value);

        $this->assertSame($dto, $ret);
        $this->assertSame($value, $dto->{$getter}());
    }

    /**
     * @dataProvider dpCollections
     */
    public function testCollectionSettersAndAdders(
        string $arraySetter,
        string $adder,
        string $arrayGetter,
        string $factoryName
    ): void {
        $dto = new InvoiceSuiteProductDTO();
        $a = $this->{$factoryName}();
        $b = $this->{$factoryName}();

        $dto->{$arraySetter}([$a]);
        $this->assertSame([$a], $dto->{$arrayGetter}());

        $dto->{$adder}($b);
        $this->assertSame([$a, $b], $dto->{$arrayGetter}());
    }

    /**
     * @dataProvider dpCollectionIterators
     */
    public function testCollectionIterators(string $base, string $singular, array $items): void
    {
        $dto = new InvoiceSuiteProductDTO();
        $set = 'set' . $base;
        $first = 'first' . $singular;
        $next = 'next' . $singular;
        $prev = 'previous' . $singular;
        $last = 'last' . $singular;
        $each = 'forEach' . $singular;

        $dto->$set($items);

        $seen = [];

        $dto->$first(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$next(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$prev(function ($v) use (&$seen) {
            $seen[] = $v;
        });
        $dto->$last(function ($v) use (&$seen) {
            $seen[] = $v;
        });

        $count = 0;

        $dto->$each(function ($v) use (&$count) {
            $count++;
        }, null, null);

        $this->assertSame($items[0], $seen[0]);
        $this->assertSame($items[1], $seen[1]);
        $this->assertSame($items[0], $seen[2]);
        $this->assertSame($items[1], $seen[3]);
        $this->assertSame(2, $count);
    }

    #endregion
}
