<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;

class InvoiceSuiteDocumentPositionDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $this->assertNull($invoiceSuiteDocumentPositionDTO->getLineId());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getParentLineId());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getLineStatus());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getLineStatusReason());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getNote());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getProduct());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getSellerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getBuyerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getQuotationReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getContractReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getAdditionalReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getUltimateCustomerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getDespatchAdviceReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getReceivingAdviceReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getDeliveryNoteReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getInvoiceReferences());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getGrossPrice());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getNetPrice());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getQuantityBilled());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getQuantityChargeFree());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getQuantityPackage());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getShipToParty());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getUltimateShipToParty());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getSupplyChainEvents());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getBillingPeriods());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getPostingReferences());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getTaxes());
        $this->assertSame([], $invoiceSuiteDocumentPositionDTO->getAllowanceCharges());
        $this->assertNull($invoiceSuiteDocumentPositionDTO->getSummation());
    }

    public function testLineIdGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $lineIdValue = "Example Value";
        $invoiceSuiteDocumentPositionDTO->setLineId($lineIdValue);

        $this->assertSame($lineIdValue, $invoiceSuiteDocumentPositionDTO->getLineId());
    }

    public function testParentLineIdGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $parentLineIdValue = "Example Value";
        $invoiceSuiteDocumentPositionDTO->setParentLineId($parentLineIdValue);

        $this->assertSame($parentLineIdValue, $invoiceSuiteDocumentPositionDTO->getParentLineId());
    }

    public function testLineStatusGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $lineStatusValue = "Example Value";
        $invoiceSuiteDocumentPositionDTO->setLineStatus($lineStatusValue);

        $this->assertSame($lineStatusValue, $invoiceSuiteDocumentPositionDTO->getLineStatus());
    }

    public function testLineStatusReasonGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $lineStatusReasonValue = "Example Value";
        $invoiceSuiteDocumentPositionDTO->setLineStatusReason($lineStatusReasonValue);

        $this->assertSame($lineStatusReasonValue, $invoiceSuiteDocumentPositionDTO->getLineStatusReason());
    }

    public function testNoteGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $noteValue = [];
        $invoiceSuiteDocumentPositionDTO->setNote($noteValue);

        $this->assertSame($noteValue, $invoiceSuiteDocumentPositionDTO->getNote());
    }

    public function testProductGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $productValue = new InvoiceSuiteProductDTO();
        $invoiceSuiteDocumentPositionDTO->setProduct($productValue);

        $this->assertSame($productValue, $invoiceSuiteDocumentPositionDTO->getProduct());
    }

    public function testSellerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $sellerOrderReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setSellerOrderReferences($sellerOrderReferencesValue);

        $this->assertSame($sellerOrderReferencesValue, $invoiceSuiteDocumentPositionDTO->getSellerOrderReferences());
    }

    public function testBuyerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $buyerOrderReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setBuyerOrderReferences($buyerOrderReferencesValue);

        $this->assertSame($buyerOrderReferencesValue, $invoiceSuiteDocumentPositionDTO->getBuyerOrderReferences());
    }

    public function testQuotationReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $quotationReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setQuotationReferences($quotationReferencesValue);

        $this->assertSame($quotationReferencesValue, $invoiceSuiteDocumentPositionDTO->getQuotationReferences());
    }

    public function testContractReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $contractReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setContractReferences($contractReferencesValue);

        $this->assertSame($contractReferencesValue, $invoiceSuiteDocumentPositionDTO->getContractReferences());
    }

    public function testAdditionalReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $additionalReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setAdditionalReferences($additionalReferencesValue);

        $this->assertSame($additionalReferencesValue, $invoiceSuiteDocumentPositionDTO->getAdditionalReferences());
    }

    public function testUltimateCustomerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $ultimateCustomerOrderReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setUltimateCustomerOrderReferences($ultimateCustomerOrderReferencesValue);

        $this->assertSame($ultimateCustomerOrderReferencesValue, $invoiceSuiteDocumentPositionDTO->getUltimateCustomerOrderReferences());
    }

    public function testDespatchAdviceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $despatchAdviceReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setDespatchAdviceReferences($despatchAdviceReferencesValue);

        $this->assertSame($despatchAdviceReferencesValue, $invoiceSuiteDocumentPositionDTO->getDespatchAdviceReferences());
    }

    public function testReceivingAdviceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $receivingAdviceReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setReceivingAdviceReferences($receivingAdviceReferencesValue);

        $this->assertSame($receivingAdviceReferencesValue, $invoiceSuiteDocumentPositionDTO->getReceivingAdviceReferences());
    }

    public function testDeliveryNoteReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $deliveryNoteReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setDeliveryNoteReferences($deliveryNoteReferencesValue);

        $this->assertSame($deliveryNoteReferencesValue, $invoiceSuiteDocumentPositionDTO->getDeliveryNoteReferences());
    }

    public function testInvoiceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setInvoiceReferences($invoiceReferencesValue);

        $this->assertSame($invoiceReferencesValue, $invoiceSuiteDocumentPositionDTO->getInvoiceReferences());
    }

    public function testGrossPriceGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $grossPriceValue = new InvoiceSuitePriceGrossDTO();
        $invoiceSuiteDocumentPositionDTO->setGrossPrice($grossPriceValue);

        $this->assertSame($grossPriceValue, $invoiceSuiteDocumentPositionDTO->getGrossPrice());
    }

    public function testNetPriceGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $netPriceValue = new InvoiceSuitePriceNetDTO();
        $invoiceSuiteDocumentPositionDTO->setNetPrice($netPriceValue);

        $this->assertSame($netPriceValue, $invoiceSuiteDocumentPositionDTO->getNetPrice());
    }

    public function testQuantityBilledGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $quantityBilledValue = new InvoiceSuiteQuantityDTO();
        $invoiceSuiteDocumentPositionDTO->setQuantityBilled($quantityBilledValue);

        $this->assertSame($quantityBilledValue, $invoiceSuiteDocumentPositionDTO->getQuantityBilled());
    }

    public function testQuantityChargeFreeGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $quantityChargeFreeValue = new InvoiceSuiteQuantityDTO();
        $invoiceSuiteDocumentPositionDTO->setQuantityChargeFree($quantityChargeFreeValue);

        $this->assertSame($quantityChargeFreeValue, $invoiceSuiteDocumentPositionDTO->getQuantityChargeFree());
    }

    public function testQuantityPackageGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $quantityPackageValue = new InvoiceSuiteQuantityDTO();
        $invoiceSuiteDocumentPositionDTO->setQuantityPackage($quantityPackageValue);

        $this->assertSame($quantityPackageValue, $invoiceSuiteDocumentPositionDTO->getQuantityPackage());
    }

    public function testShipToPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $shipToPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentPositionDTO->setShipToParty($shipToPartyValue);

        $this->assertSame($shipToPartyValue, $invoiceSuiteDocumentPositionDTO->getShipToParty());
    }

    public function testUltimateShipToPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $ultimateShipToPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentPositionDTO->setUltimateShipToParty($ultimateShipToPartyValue);

        $this->assertSame($ultimateShipToPartyValue, $invoiceSuiteDocumentPositionDTO->getUltimateShipToParty());
    }

    public function testSupplyChainEventsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $supplyChainEventsValue = [];
        $invoiceSuiteDocumentPositionDTO->setSupplyChainEvents($supplyChainEventsValue);

        $this->assertSame($supplyChainEventsValue, $invoiceSuiteDocumentPositionDTO->getSupplyChainEvents());
    }

    public function testBillingPeriodsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $billingPeriodsValue = [];
        $invoiceSuiteDocumentPositionDTO->setBillingPeriods($billingPeriodsValue);

        $this->assertSame($billingPeriodsValue, $invoiceSuiteDocumentPositionDTO->getBillingPeriods());
    }

    public function testPostingReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $postingReferencesValue = [];
        $invoiceSuiteDocumentPositionDTO->setPostingReferences($postingReferencesValue);

        $this->assertSame($postingReferencesValue, $invoiceSuiteDocumentPositionDTO->getPostingReferences());
    }

    public function testTaxesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $taxesValue = [];
        $invoiceSuiteDocumentPositionDTO->setTaxes($taxesValue);

        $this->assertSame($taxesValue, $invoiceSuiteDocumentPositionDTO->getTaxes());
    }

    public function testAllowanceChargesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $allowanceChargesValue = [];
        $invoiceSuiteDocumentPositionDTO->setAllowanceCharges($allowanceChargesValue);

        $this->assertSame($allowanceChargesValue, $invoiceSuiteDocumentPositionDTO->getAllowanceCharges());
    }

    public function testSummationGetterAndSetter(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $summationValue = new InvoiceSuitesummationLineDTO();
        $invoiceSuiteDocumentPositionDTO->setSummation($summationValue);

        $this->assertSame($summationValue, $invoiceSuiteDocumentPositionDTO->getSummation());
    }

    public function testCollectionNoteIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addNote(new InvoiceSuiteNoteDTO());
        $invoiceSuiteDocumentPositionDTO->addNote(new InvoiceSuiteNoteDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextNote($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousNote($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastNote($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachNote($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastNote($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachNote($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionSellerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addSellerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addSellerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachSellerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachSellerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionBuyerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachBuyerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachBuyerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionQuotationReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addQuotationReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addQuotationReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachQuotationReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachQuotationReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionContractReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addContractReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addContractReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextContractReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousContractReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastContractReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachContractReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastContractReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachContractReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionAdditionalReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addAdditionalReference(new InvoiceSuiteReferenceDocumentLineExtDTO());
        $invoiceSuiteDocumentPositionDTO->addAdditionalReference(new InvoiceSuiteReferenceDocumentLineExtDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachAdditionalReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachAdditionalReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionUltimateCustomerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addUltimateCustomerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addUltimateCustomerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachUltimateCustomerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachUltimateCustomerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionDespatchAdviceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addDespatchAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addDespatchAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachDespatchAdviceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachDespatchAdviceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionReceivingAdviceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addReceivingAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addReceivingAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachReceivingAdviceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachReceivingAdviceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionDeliveryNoteReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addDeliveryNoteReference(new InvoiceSuiteReferenceDocumentLineDTO());
        $invoiceSuiteDocumentPositionDTO->addDeliveryNoteReference(new InvoiceSuiteReferenceDocumentLineDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachDeliveryNoteReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachDeliveryNoteReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionInvoiceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addInvoiceReference(new InvoiceSuiteReferenceDocumentLineExtDTO());
        $invoiceSuiteDocumentPositionDTO->addInvoiceReference(new InvoiceSuiteReferenceDocumentLineExtDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachInvoiceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachInvoiceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionSupplyChainEventIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addSupplyChainEvent(null);
        $invoiceSuiteDocumentPositionDTO->addSupplyChainEvent(new DateTimeImmutable("2025-01-02"));
        $invoiceSuiteDocumentPositionDTO->addSupplyChainEvent(new DateTimeImmutable("2025-01-02"));

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachSupplyChainEvent($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachSupplyChainEvent($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionBillingPeriodIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addBillingPeriod(new InvoiceSuiteDateRangeDTO());
        $invoiceSuiteDocumentPositionDTO->addBillingPeriod(new InvoiceSuiteDateRangeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachBillingPeriod($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachBillingPeriod($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPostingReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addPostingReference(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentPositionDTO->addPostingReference(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachPostingReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachPostingReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionAllowanceChargeIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());
        $invoiceSuiteDocumentPositionDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachAllowanceCharge($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachAllowanceCharge($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionTaxIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();
        $invoiceSuiteDocumentPositionDTO->addTax(new InvoiceSuiteTaxDTO());
        $invoiceSuiteDocumentPositionDTO->addTax(new InvoiceSuiteTaxDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextTax($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousTax($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->lastTax($cb, $cbElse);

        $invoiceSuiteDocumentPositionDTO->forEachTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachTax($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = function ($item) use (&$hitCount) {
            $hitCount++;
        };

        $cbElse = function () use (&$elseCount) {
            $elseCount++;
        };

        $invoiceSuiteDocumentPositionDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->lastTax($cb, $cbElse);
        $invoiceSuiteDocumentPositionDTO->forEachTax($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
