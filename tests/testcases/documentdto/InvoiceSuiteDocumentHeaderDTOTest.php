<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTimeImmutable;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;

final class InvoiceSuiteDocumentHeaderDTOTest extends TestCase
{
    public function testConstructorAndDefaults(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getNumber());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getType());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getDescription());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getLanguage());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteDocumentHeaderDTO->getDate());
        $this->assertNotInstanceOf(DateTimeInterface::class, $invoiceSuiteDocumentHeaderDTO->getCompleteDate());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getSupplyChainEvents());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getCurrency());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getTaxCurrency());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getIsCopy());
        $this->assertNull($invoiceSuiteDocumentHeaderDTO->getIsTest());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getNotes());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getBillingPeriods());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getPostingReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getSellerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getBuyerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getQuotationReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getContractReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getAdditionalReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getInvoiceReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getProjectReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getUltimateCustomerOrderReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getDespatchAdviceReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getReceivingAdviceReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getDeliveryNoteReferences());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getSellerParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getBuyerParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getTaxRepresentativeParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getProductEndUserParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getShipToParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getUltimateShipToParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getShipFromParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getInvoicerParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getInvoiceeParty());
        $this->assertNotInstanceOf(InvoiceSuitePartyDTO::class, $invoiceSuiteDocumentHeaderDTO->getPayeeParty());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getPaymentMeans());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getPaymentTerms());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getCreditorReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getPaymentReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getBuyerReferences());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getDeliveryTerms());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getTaxes());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getAllowanceCharges());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getServiceCharges());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getSummations());
        $this->assertSame([], $invoiceSuiteDocumentHeaderDTO->getPositions());
    }

    public function testNumberGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $numberValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setNumber($numberValue);

        $this->assertSame($numberValue, $invoiceSuiteDocumentHeaderDTO->getNumber());
    }

    public function testTypeGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $typeValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setType($typeValue);

        $this->assertSame($typeValue, $invoiceSuiteDocumentHeaderDTO->getType());
    }

    public function testDescriptionGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $descriptionValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setDescription($descriptionValue);

        $this->assertSame($descriptionValue, $invoiceSuiteDocumentHeaderDTO->getDescription());
    }

    public function testLanguageGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $languageValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setLanguage($languageValue);

        $this->assertSame($languageValue, $invoiceSuiteDocumentHeaderDTO->getLanguage());
    }

    public function testDateGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $dateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteDocumentHeaderDTO->setDate($dateValue);

        $this->assertSame($dateValue, $invoiceSuiteDocumentHeaderDTO->getDate());
    }

    public function testCompleteDateGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $completeDateValue = new DateTimeImmutable('2025-01-02');
        $invoiceSuiteDocumentHeaderDTO->setCompleteDate($completeDateValue);

        $this->assertSame($completeDateValue, $invoiceSuiteDocumentHeaderDTO->getCompleteDate());
    }

    public function testSupplyChainEventsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $supplyChainEventsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setSupplyChainEvents($supplyChainEventsValue);

        $this->assertSame($supplyChainEventsValue, $invoiceSuiteDocumentHeaderDTO->getSupplyChainEvents());
    }

    public function testCurrencyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $currencyValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setCurrency($currencyValue);

        $this->assertSame($currencyValue, $invoiceSuiteDocumentHeaderDTO->getCurrency());
    }

    public function testTaxCurrencyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $taxCurrencyValue = 'Example Value';
        $invoiceSuiteDocumentHeaderDTO->setTaxCurrency($taxCurrencyValue);

        $this->assertSame($taxCurrencyValue, $invoiceSuiteDocumentHeaderDTO->getTaxCurrency());
    }

    public function testIsCopyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $isCopyValue = true;
        $invoiceSuiteDocumentHeaderDTO->setIsCopy($isCopyValue);

        $this->assertSame($isCopyValue, $invoiceSuiteDocumentHeaderDTO->getIsCopy());
    }

    public function testIsTestGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $isTestValue = true;
        $invoiceSuiteDocumentHeaderDTO->setIsTest($isTestValue);

        $this->assertSame($isTestValue, $invoiceSuiteDocumentHeaderDTO->getIsTest());
    }

    public function testNotesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $notesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setNotes($notesValue);

        $this->assertSame($notesValue, $invoiceSuiteDocumentHeaderDTO->getNotes());
    }

    public function testBillingPeriodsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $billingPeriodsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setBillingPeriods($billingPeriodsValue);

        $this->assertSame($billingPeriodsValue, $invoiceSuiteDocumentHeaderDTO->getBillingPeriods());
    }

    public function testPostingReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $postingReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setPostingReferences($postingReferencesValue);

        $this->assertSame($postingReferencesValue, $invoiceSuiteDocumentHeaderDTO->getPostingReferences());
    }

    public function testSellerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $sellerOrderReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setSellerOrderReferences($sellerOrderReferencesValue);

        $this->assertSame($sellerOrderReferencesValue, $invoiceSuiteDocumentHeaderDTO->getSellerOrderReferences());
    }

    public function testBuyerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $buyerOrderReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setBuyerOrderReferences($buyerOrderReferencesValue);

        $this->assertSame($buyerOrderReferencesValue, $invoiceSuiteDocumentHeaderDTO->getBuyerOrderReferences());
    }

    public function testQuotationReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $quotationReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setQuotationReferences($quotationReferencesValue);

        $this->assertSame($quotationReferencesValue, $invoiceSuiteDocumentHeaderDTO->getQuotationReferences());
    }

    public function testContractReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $contractReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setContractReferences($contractReferencesValue);

        $this->assertSame($contractReferencesValue, $invoiceSuiteDocumentHeaderDTO->getContractReferences());
    }

    public function testAdditionalReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $additionalReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setAdditionalReferences($additionalReferencesValue);

        $this->assertSame($additionalReferencesValue, $invoiceSuiteDocumentHeaderDTO->getAdditionalReferences());
    }

    public function testInvoiceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setInvoiceReferences($invoiceReferencesValue);

        $this->assertSame($invoiceReferencesValue, $invoiceSuiteDocumentHeaderDTO->getInvoiceReferences());
    }

    public function testProjectReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $projectReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setProjectReferences($projectReferencesValue);

        $this->assertSame($projectReferencesValue, $invoiceSuiteDocumentHeaderDTO->getProjectReferences());
    }

    public function testUltimateCustomerOrderReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $ultimateCustomerOrderReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setUltimateCustomerOrderReferences($ultimateCustomerOrderReferencesValue);

        $this->assertSame($ultimateCustomerOrderReferencesValue, $invoiceSuiteDocumentHeaderDTO->getUltimateCustomerOrderReferences());
    }

    public function testDespatchAdviceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $despatchAdviceReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setDespatchAdviceReferences($despatchAdviceReferencesValue);

        $this->assertSame($despatchAdviceReferencesValue, $invoiceSuiteDocumentHeaderDTO->getDespatchAdviceReferences());
    }

    public function testReceivingAdviceReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $receivingAdviceReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setReceivingAdviceReferences($receivingAdviceReferencesValue);

        $this->assertSame($receivingAdviceReferencesValue, $invoiceSuiteDocumentHeaderDTO->getReceivingAdviceReferences());
    }

    public function testDeliveryNoteReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $deliveryNoteReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setDeliveryNoteReferences($deliveryNoteReferencesValue);

        $this->assertSame($deliveryNoteReferencesValue, $invoiceSuiteDocumentHeaderDTO->getDeliveryNoteReferences());
    }

    public function testSellerPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $sellerPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setSellerParty($sellerPartyValue);

        $this->assertSame($sellerPartyValue, $invoiceSuiteDocumentHeaderDTO->getSellerParty());
    }

    public function testBuyerPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $buyerPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setBuyerParty($buyerPartyValue);

        $this->assertSame($buyerPartyValue, $invoiceSuiteDocumentHeaderDTO->getBuyerParty());
    }

    public function testTaxRepresentativePartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $taxRepresentativePartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setTaxRepresentativeParty($taxRepresentativePartyValue);

        $this->assertSame($taxRepresentativePartyValue, $invoiceSuiteDocumentHeaderDTO->getTaxRepresentativeParty());
    }

    public function testProductEndUserPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $productEndUserPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setProductEndUserParty($productEndUserPartyValue);

        $this->assertSame($productEndUserPartyValue, $invoiceSuiteDocumentHeaderDTO->getProductEndUserParty());
    }

    public function testShipToPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $shipToPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setShipToParty($shipToPartyValue);

        $this->assertSame($shipToPartyValue, $invoiceSuiteDocumentHeaderDTO->getShipToParty());
    }

    public function testUltimateShipToPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $ultimateShipToPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setUltimateShipToParty($ultimateShipToPartyValue);

        $this->assertSame($ultimateShipToPartyValue, $invoiceSuiteDocumentHeaderDTO->getUltimateShipToParty());
    }

    public function testShipFromPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $shipFromPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setShipFromParty($shipFromPartyValue);

        $this->assertSame($shipFromPartyValue, $invoiceSuiteDocumentHeaderDTO->getShipFromParty());
    }

    public function testInvoicerPartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoicerPartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setInvoicerParty($invoicerPartyValue);

        $this->assertSame($invoicerPartyValue, $invoiceSuiteDocumentHeaderDTO->getInvoicerParty());
    }

    public function testInvoiceePartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceePartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setInvoiceeParty($invoiceePartyValue);

        $this->assertSame($invoiceePartyValue, $invoiceSuiteDocumentHeaderDTO->getInvoiceeParty());
    }

    public function testPayeePartyGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $payeePartyValue = new InvoiceSuitePartyDTO();
        $invoiceSuiteDocumentHeaderDTO->setPayeeParty($payeePartyValue);

        $this->assertSame($payeePartyValue, $invoiceSuiteDocumentHeaderDTO->getPayeeParty());
    }

    public function testPaymentMeansGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $paymentMeansValue = [];
        $invoiceSuiteDocumentHeaderDTO->setPaymentMeans($paymentMeansValue);

        $this->assertSame($paymentMeansValue, $invoiceSuiteDocumentHeaderDTO->getPaymentMeans());
    }

    public function testPaymentTermsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $paymentTermsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setPaymentTerms($paymentTermsValue);

        $this->assertSame($paymentTermsValue, $invoiceSuiteDocumentHeaderDTO->getPaymentTerms());
    }

    public function testCreditorReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $creditorReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setCreditorReferences($creditorReferencesValue);

        $this->assertSame($creditorReferencesValue, $invoiceSuiteDocumentHeaderDTO->getCreditorReferences());
    }

    public function testPaymentReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $paymentReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setPaymentReferences($paymentReferencesValue);

        $this->assertSame($paymentReferencesValue, $invoiceSuiteDocumentHeaderDTO->getPaymentReferences());
    }

    public function testBuyerReferencesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $buyerReferencesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setBuyerReferences($buyerReferencesValue);

        $this->assertSame($buyerReferencesValue, $invoiceSuiteDocumentHeaderDTO->getBuyerReferences());
    }

    public function testDeliveryTermsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $deliveryTermsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setDeliveryTerms($deliveryTermsValue);

        $this->assertSame($deliveryTermsValue, $invoiceSuiteDocumentHeaderDTO->getDeliveryTerms());
    }

    public function testTaxesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $taxesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setTaxes($taxesValue);

        $this->assertSame($taxesValue, $invoiceSuiteDocumentHeaderDTO->getTaxes());
    }

    public function testAllowanceChargesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $allowanceChargesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setAllowanceCharges($allowanceChargesValue);

        $this->assertSame($allowanceChargesValue, $invoiceSuiteDocumentHeaderDTO->getAllowanceCharges());
    }

    public function testServiceChargesGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $serviceChargesValue = [];
        $invoiceSuiteDocumentHeaderDTO->setServiceCharges($serviceChargesValue);

        $this->assertSame($serviceChargesValue, $invoiceSuiteDocumentHeaderDTO->getServiceCharges());
    }

    public function testSummationsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $summationsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setSummations($summationsValue);

        $this->assertSame($summationsValue, $invoiceSuiteDocumentHeaderDTO->getSummations());
    }

    public function testPositionsGetterAndSetter(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $positionsValue = [];
        $invoiceSuiteDocumentHeaderDTO->setPositions($positionsValue);

        $this->assertSame($positionsValue, $invoiceSuiteDocumentHeaderDTO->getPositions());
    }

    public function testCollectionSupplyChainEventIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addSupplyChainEvent(null);
        $invoiceSuiteDocumentHeaderDTO->addSupplyChainEvent(new DateTimeImmutable('2025-01-02'));
        $invoiceSuiteDocumentHeaderDTO->addSupplyChainEvent(new DateTimeImmutable('2025-01-02'));

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastSupplyChainEvent($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSupplyChainEvent($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastSupplyChainEvent($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSupplyChainEvent($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionNoteIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addNote(new InvoiceSuiteNoteDTO());
        $invoiceSuiteDocumentHeaderDTO->addNote(new InvoiceSuiteNoteDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextNote($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousNote($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastNote($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachNote($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastNote($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachNote($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionBillingPeriodIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addBillingPeriod(new InvoiceSuiteDateRangeDTO());
        $invoiceSuiteDocumentHeaderDTO->addBillingPeriod(new InvoiceSuiteDateRangeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastBillingPeriod($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBillingPeriod($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastBillingPeriod($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBillingPeriod($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPostingReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addPostingReference(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentHeaderDTO->addPostingReference(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastPostingReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPostingReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastPostingReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPostingReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionSellerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addSellerOrderReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addSellerOrderReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastSellerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSellerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastSellerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSellerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionBuyerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastBuyerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBuyerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastBuyerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBuyerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionQuotationReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addQuotationReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addQuotationReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastQuotationReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachQuotationReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastQuotationReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachQuotationReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionContractReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addContractReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addContractReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextContractReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousContractReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastContractReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachContractReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastContractReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachContractReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionAdditionalReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addAdditionalReference(new InvoiceSuiteReferenceDocumentExtDTO());
        $invoiceSuiteDocumentHeaderDTO->addAdditionalReference(new InvoiceSuiteReferenceDocumentExtDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastAdditionalReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachAdditionalReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastAdditionalReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachAdditionalReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionInvoiceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addInvoiceReference(new InvoiceSuiteReferenceDocumentExtDTO());
        $invoiceSuiteDocumentHeaderDTO->addInvoiceReference(new InvoiceSuiteReferenceDocumentExtDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastInvoiceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachInvoiceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastInvoiceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachInvoiceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionProjectReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addProjectReference(new InvoiceSuiteProjectDTO());
        $invoiceSuiteDocumentHeaderDTO->addProjectReference(new InvoiceSuiteProjectDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextProjectReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousProjectReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastProjectReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachProjectReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastProjectReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachProjectReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionUltimateCustomerOrderReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addUltimateCustomerOrderReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addUltimateCustomerOrderReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastUltimateCustomerOrderReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachUltimateCustomerOrderReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastUltimateCustomerOrderReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachUltimateCustomerOrderReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionDespatchAdviceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addDespatchAdviceReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addDespatchAdviceReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastDespatchAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDespatchAdviceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastDespatchAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDespatchAdviceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionReceivingAdviceReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addReceivingAdviceReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addReceivingAdviceReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastReceivingAdviceReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachReceivingAdviceReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastReceivingAdviceReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachReceivingAdviceReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionDeliveryNoteReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addDeliveryNoteReference(new InvoiceSuiteReferenceDocumentDTO());
        $invoiceSuiteDocumentHeaderDTO->addDeliveryNoteReference(new InvoiceSuiteReferenceDocumentDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastDeliveryNoteReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryNoteReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastDeliveryNoteReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryNoteReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPaymentMeanIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addPaymentMean(new InvoiceSuitePaymentMeanDTO());
        $invoiceSuiteDocumentHeaderDTO->addPaymentMean(new InvoiceSuitePaymentMeanDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentMean($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentMean($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastPaymentMean($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentMean($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastPaymentMean($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentMean($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPaymentTermIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addPaymentTerm(new InvoiceSuitePaymentTermDTO());
        $invoiceSuiteDocumentHeaderDTO->addPaymentTerm(new InvoiceSuitePaymentTermDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastPaymentTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentTerm($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastPaymentTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentTerm($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionCreditorReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addCreditorReference(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentHeaderDTO->addCreditorReference(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextCreditorReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousCreditorReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastCreditorReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachCreditorReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastCreditorReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachCreditorReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPaymentReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addPaymentReference(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentHeaderDTO->addPaymentReference(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastPaymentReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastPaymentReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPaymentReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionBuyerReferenceIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addBuyerReference(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentHeaderDTO->addBuyerReference(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastBuyerReference($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBuyerReference($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastBuyerReference($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachBuyerReference($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionDeliveryTermIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addDeliveryTerm(new InvoiceSuiteIdDTO());
        $invoiceSuiteDocumentHeaderDTO->addDeliveryTerm(new InvoiceSuiteIdDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastDeliveryTerm($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryTerm($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastDeliveryTerm($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachDeliveryTerm($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionTaxIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addTax(new InvoiceSuiteTaxDTO());
        $invoiceSuiteDocumentHeaderDTO->addTax(new InvoiceSuiteTaxDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextTax($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousTax($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastTax($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachTax($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastTax($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachTax($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionAllowanceChargeIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());
        $invoiceSuiteDocumentHeaderDTO->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastAllowanceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachAllowanceCharge($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastAllowanceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachAllowanceCharge($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionServiceChargeIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addServiceCharge(new InvoiceSuiteServiceChargeDTO());
        $invoiceSuiteDocumentHeaderDTO->addServiceCharge(new InvoiceSuiteServiceChargeDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextServiceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousServiceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastServiceCharge($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachServiceCharge($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastServiceCharge($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachServiceCharge($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionSummationIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addSummation(new InvoiceSuiteSummationDTO());
        $invoiceSuiteDocumentHeaderDTO->addSummation(new InvoiceSuiteSummationDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSummation($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSummation($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastSummation($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSummation($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastSummation($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachSummation($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }

    public function testCollectionPositionIteratorsWithCallbacks(): void
    {
        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();
        $invoiceSuiteDocumentHeaderDTO->addPosition(new InvoiceSuiteDocumentPositionDTO());
        $invoiceSuiteDocumentHeaderDTO->addPosition(new InvoiceSuiteDocumentPositionDTO());

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPosition($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->firstPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPosition($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->lastPosition($cb, $cbElse);

        $invoiceSuiteDocumentHeaderDTO->forEachPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPosition($cb, $cbElse, 1);

        $this->assertSame(9, $hitCount);
        $this->assertSame(2, $elseCount);

        $invoiceSuiteDocumentHeaderDTO = new InvoiceSuiteDocumentHeaderDTO();

        $hitCount = 0;
        $elseCount = 0;

        $cb = static function ($item) use (&$hitCount): void {
            ++$hitCount;
        };

        $cbElse = static function () use (&$elseCount): void {
            ++$elseCount;
        };

        $invoiceSuiteDocumentHeaderDTO->firstPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->nextPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->previousPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->lastPosition($cb, $cbElse);
        $invoiceSuiteDocumentHeaderDTO->forEachPosition($cb, $cbElse);

        $this->assertSame(0, $hitCount);
        $this->assertSame(7, $elseCount);
    }
}
