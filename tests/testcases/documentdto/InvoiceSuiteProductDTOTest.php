<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteProductDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();

        $this->assertNull($invoiceSuiteProductDTO->getId());
        $this->assertNull($invoiceSuiteProductDTO->getName());
        $this->assertNull($invoiceSuiteProductDTO->getDescription());
        $this->assertNull($invoiceSuiteProductDTO->getSellerId());
        $this->assertNull($invoiceSuiteProductDTO->getBuyerId());
        $this->assertNotInstanceOf(InvoiceSuiteIdDTO::class, $invoiceSuiteProductDTO->getGlobalId());
        $this->assertNull($invoiceSuiteProductDTO->getIndustryId());
        $this->assertNull($invoiceSuiteProductDTO->getModelId());
        $this->assertNull($invoiceSuiteProductDTO->getBatchId());
        $this->assertNull($invoiceSuiteProductDTO->getBrandName());
        $this->assertNull($invoiceSuiteProductDTO->getModelName());
        $this->assertNull($invoiceSuiteProductDTO->getOriginTradeCountry());
        $this->assertSame([], $invoiceSuiteProductDTO->getCharacteristics());
        $this->assertSame([], $invoiceSuiteProductDTO->getClassifications());
        $this->assertSame([], $invoiceSuiteProductDTO->getReferenceProducts());
    }

    public function testIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $idValue = 'Example Value';
        $invoiceSuiteProductDTO->setId($idValue);

        $this->assertSame($idValue, $invoiceSuiteProductDTO->getId());
    }

    public function testNameGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $nameValue = 'Example Value';
        $invoiceSuiteProductDTO->setName($nameValue);

        $this->assertSame($nameValue, $invoiceSuiteProductDTO->getName());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteProductDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteProductDTO->getDescription());
    }

    public function testSellerIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $sellerIdValue = 'Example Value';
        $invoiceSuiteProductDTO->setSellerId($sellerIdValue);

        $this->assertSame($sellerIdValue, $invoiceSuiteProductDTO->getSellerId());
    }

    public function testBuyerIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $buyerIdValue = 'Example Value';
        $invoiceSuiteProductDTO->setBuyerId($buyerIdValue);

        $this->assertSame($buyerIdValue, $invoiceSuiteProductDTO->getBuyerId());
    }

    public function testGlobalIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $globalIdValue = new InvoiceSuiteIdDTO();
        $invoiceSuiteProductDTO->setGlobalId($globalIdValue);

        $this->assertSame($globalIdValue, $invoiceSuiteProductDTO->getGlobalId());
    }

    public function testIndustryIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $industryIdValue = 'Example Value';
        $invoiceSuiteProductDTO->setIndustryId($industryIdValue);

        $this->assertSame($industryIdValue, $invoiceSuiteProductDTO->getIndustryId());
    }

    public function testModelIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $modelIdValue = 'Example Value';
        $invoiceSuiteProductDTO->setModelId($modelIdValue);

        $this->assertSame($modelIdValue, $invoiceSuiteProductDTO->getModelId());
    }

    public function testBatchIdGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $batchIdValue = 'Example Value';
        $invoiceSuiteProductDTO->setBatchId($batchIdValue);

        $this->assertSame($batchIdValue, $invoiceSuiteProductDTO->getBatchId());
    }

    public function testBrandNameGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $brandNameValue = 'Example Value';
        $invoiceSuiteProductDTO->setBrandName($brandNameValue);

        $this->assertSame($brandNameValue, $invoiceSuiteProductDTO->getBrandName());
    }

    public function testModelNameGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $modelNameValue = 'Example Value';
        $invoiceSuiteProductDTO->setModelName($modelNameValue);

        $this->assertSame($modelNameValue, $invoiceSuiteProductDTO->getModelName());
    }

    public function testOriginTradeCountryGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $originTradeCountryValue = 'Example Value';
        $invoiceSuiteProductDTO->setOriginTradeCountry($originTradeCountryValue);

        $this->assertSame($originTradeCountryValue, $invoiceSuiteProductDTO->getOriginTradeCountry());
    }

    public function testCharacteristicsGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $characteristicsValue = [];
        $invoiceSuiteProductDTO->setCharacteristics($characteristicsValue);

        $this->assertSame($characteristicsValue, $invoiceSuiteProductDTO->getCharacteristics());
    }

    public function testClassificationsGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $classificationsValue = [];
        $invoiceSuiteProductDTO->setClassifications($classificationsValue);

        $this->assertSame($classificationsValue, $invoiceSuiteProductDTO->getClassifications());
    }

    public function testReferenceProductsGetterAndSetter(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $referenceProductsValue = [];
        $invoiceSuiteProductDTO->setReferenceProducts($referenceProductsValue);

        $this->assertSame($referenceProductsValue, $invoiceSuiteProductDTO->getReferenceProducts());
    }

    public function testCollectionCharacteristicIteratorsWithCallbacks(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $invoiceSuiteProductDTO->addCharacteristic(new InvoiceSuiteProductCharacteristicDTO());
        $invoiceSuiteProductDTO->addCharacteristic(new InvoiceSuiteProductCharacteristicDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->nextCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->nextCharacteristic($cb, $cbElse);

        $invoiceSuiteProductDTO->firstCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->nextCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->previousCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->previousCharacteristic($cb, $cbElse);

        $invoiceSuiteProductDTO->lastCharacteristic($cb, $cbElse);

        $invoiceSuiteProductDTO->forEachCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachCharacteristic($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->nextCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->nextCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->previousCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->previousCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->lastCharacteristic($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachCharacteristic($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionClassificationIteratorsWithCallbacks(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $invoiceSuiteProductDTO->addClassification(new InvoiceSuiteProductClassificationDTO());
        $invoiceSuiteProductDTO->addClassification(new InvoiceSuiteProductClassificationDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->nextClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->nextClassification($cb, $cbElse);

        $invoiceSuiteProductDTO->firstClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->nextClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->previousClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->previousClassification($cb, $cbElse);

        $invoiceSuiteProductDTO->lastClassification($cb, $cbElse);

        $invoiceSuiteProductDTO->forEachClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachClassification($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->nextClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->nextClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->previousClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->previousClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->lastClassification($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachClassification($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionReferenceProductIteratorsWithCallbacks(): void
    {
        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();
        $invoiceSuiteProductDTO->addReferenceProduct(new InvoiceSuiteReferenceProductDTO());
        $invoiceSuiteProductDTO->addReferenceProduct(new InvoiceSuiteReferenceProductDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->nextReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->nextReferenceProduct($cb, $cbElse);

        $invoiceSuiteProductDTO->firstReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->nextReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->previousReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->previousReferenceProduct($cb, $cbElse);

        $invoiceSuiteProductDTO->lastReferenceProduct($cb, $cbElse);

        $invoiceSuiteProductDTO->forEachReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachReferenceProduct($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteProductDTO = new InvoiceSuiteProductDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteProductDTO->firstReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->nextReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->nextReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->previousReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->previousReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->lastReferenceProduct($cb, $cbElse);
        $invoiceSuiteProductDTO->forEachReferenceProduct($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
