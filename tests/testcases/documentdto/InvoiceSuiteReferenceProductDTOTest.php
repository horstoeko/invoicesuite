<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteReferenceProductDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();

        $this->assertNull($invoiceSuiteReferenceProductDTO->getId());
        $this->assertNull($invoiceSuiteReferenceProductDTO->getName());
        $this->assertNull($invoiceSuiteReferenceProductDTO->getDescription());
        $this->assertNull($invoiceSuiteReferenceProductDTO->getSellerId());
        $this->assertNull($invoiceSuiteReferenceProductDTO->getBuyerId());
        $this->assertNotInstanceOf(InvoiceSuiteIdDTO::class, $invoiceSuiteReferenceProductDTO->getGlobalId());
        $this->assertNull($invoiceSuiteReferenceProductDTO->getIndustryId());
        $this->assertNotInstanceOf(InvoiceSuiteQuantityDTO::class, $invoiceSuiteReferenceProductDTO->getUnitQuantity());
    }

    public function testIdGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $idValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setId($idValue);

        $this->assertSame($idValue, $invoiceSuiteReferenceProductDTO->getId());
    }

    public function testNameGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $nameValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setName($nameValue);

        $this->assertSame($nameValue, $invoiceSuiteReferenceProductDTO->getName());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteReferenceProductDTO->getDescription());
    }

    public function testSellerIdGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $sellerIdValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setSellerId($sellerIdValue);

        $this->assertSame($sellerIdValue, $invoiceSuiteReferenceProductDTO->getSellerId());
    }

    public function testBuyerIdGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $buyerIdValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setBuyerId($buyerIdValue);

        $this->assertSame($buyerIdValue, $invoiceSuiteReferenceProductDTO->getBuyerId());
    }

    public function testGlobalIdGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $globalIdValue = new InvoiceSuiteIdDTO();
        $invoiceSuiteReferenceProductDTO->setGlobalId($globalIdValue);

        $this->assertSame($globalIdValue, $invoiceSuiteReferenceProductDTO->getGlobalId());
    }

    public function testIndustryIdGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $industryIdValue = 'Example Value';
        $invoiceSuiteReferenceProductDTO->setIndustryId($industryIdValue);

        $this->assertSame($industryIdValue, $invoiceSuiteReferenceProductDTO->getIndustryId());
    }

    public function testUnitQuantityGetterAndSetter(): void
    {
        $invoiceSuiteReferenceProductDTO = new InvoiceSuiteReferenceProductDTO();
        $unitQuantityValue = new InvoiceSuiteQuantityDTO();
        $invoiceSuiteReferenceProductDTO->setUnitQuantity($unitQuantityValue);

        $this->assertSame($unitQuantityValue, $invoiceSuiteReferenceProductDTO->getUnitQuantity());
    }
}
