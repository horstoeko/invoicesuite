<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProvider;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProviderReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class FatturaPaProviderReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    private static $document;

    protected function setUp(): void
    {
        parent::setUp();

        static::$document = new InvoiceSuiteFatturaPaProviderReader(new InvoiceSuiteFatturaPaProvider());

        $documentContent = file_get_contents(
            InvoiceSuitePathUtils::combinePathWithFile(
                InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                '02_technical_xml_fatturapa.xml'
            )
        );

        $this->assertIsString($documentContent);
        static::$document->deserializeFromContent($documentContent);
    }

    public function testGetDocumentNo(): void
    {
        static::$document->getDocumentNo($newDocumentNo);

        $this->assertSame('2026-07-000001', $newDocumentNo);
    }

    public function testGetDocumentType(): void
    {
        static::$document->getDocumentType($newDocumentType);

        $this->assertSame('380', $newDocumentType);
    }

    public function testGetDocumentDate(): void
    {
        static::$document->getDocumentDate($newDocumentDate);

        $this->assertInstanceOf(DateTimeInterface::class, $newDocumentDate);
        $this->assertSame('20260718', $newDocumentDate->format('Ymd'));
    }

    public function testGetDocumentCurrency(): void
    {
        static::$document->getDocumentCurrency($newDocumentCurrency);

        $this->assertSame('EUR', $newDocumentCurrency);
    }

    public function testFirstNextGetDocumentNote(): void
    {
        $this->assertTrue(static::$document->firstDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('First invoice note', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertTrue(static::$document->nextDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('Second invoice note', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);
        $this->assertFalse(static::$document->nextDocumentNote());
    }

    public function testFirstNextGetDocumentBuyerOrderReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentBuyerOrderReference());

        static::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('ORDER-1', $newReferenceNumber);
        $this->assertSame('20260701', $newReferenceDate?->format('Ymd'));
        $this->assertFalse(static::$document->nextDocumentBuyerOrderReference());
    }

    public function testFirstNextGetDocumentContractReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentContractReference());

        static::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('CONTRACT-1', $newReferenceNumber);
        $this->assertSame('20260601', $newReferenceDate?->format('Ymd'));

        $this->assertTrue(static::$document->nextDocumentContractReference());

        static::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('CONTRACT-2', $newReferenceNumber);
        $this->assertSame('20260602', $newReferenceDate?->format('Ymd'));
        $this->assertFalse(static::$document->nextDocumentContractReference());
    }

    public function testFirstNextGetDocumentInvoiceReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentInvoiceReference());

        static::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVOICE-REF-1', $newReferenceNumber);
        $this->assertSame('20260501', $newReferenceDate?->format('Ymd'));
        $this->assertSame('', $newTypeCode);

        $this->assertTrue(static::$document->nextDocumentInvoiceReference());

        static::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVOICE-REF-2', $newReferenceNumber);
        $this->assertSame('20260502', $newReferenceDate?->format('Ymd'));
        $this->assertSame('', $newTypeCode);
        $this->assertFalse(static::$document->nextDocumentInvoiceReference());
    }

    public function testDocumentSeller(): void
    {
        static::$document->getDocumentSellerName($newName);

        $this->assertSame('Example Seller S.r.l.', $newName);

        $this->assertTrue(static::$document->firstDocumentSellerTaxRegistration());
        static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('VA', $newTaxRegistrationType);
        $this->assertSame('12345678901', $newTaxRegistrationId);

        $this->assertTrue(static::$document->nextDocumentSellerTaxRegistration());
        static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('FC', $newTaxRegistrationType);
        $this->assertSame('SELLERFISCAL01', $newTaxRegistrationId);
        $this->assertFalse(static::$document->nextDocumentSellerTaxRegistration());

        $this->assertTrue(static::$document->firstDocumentSellerAddress());
        static::$document->getDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        $this->assertSame('Via Roma 1', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('00100', $newPostcode);
        $this->assertSame('Roma', $newCity);
        $this->assertSame('IT', $newCountryId);
        $this->assertSame('RM', $newSubDivision);
        $this->assertFalse(static::$document->nextDocumentSellerAddress());

        $this->assertTrue(static::$document->firstDocumentSellerContact());
        static::$document->getDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('06123456', $newPhoneNumber);
        $this->assertSame('06654321', $newFaxNumber);
        $this->assertSame('seller@example.it', $newEmailAddress);
        $this->assertFalse(static::$document->nextDocumentSellerContact());
    }

    public function testDocumentBuyer(): void
    {
        static::$document->getDocumentBuyerName($newName);

        $this->assertSame('Example Buyer S.p.A.', $newName);

        $this->assertTrue(static::$document->firstDocumentBuyerTaxRegistration());
        static::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('VA', $newTaxRegistrationType);
        $this->assertSame('98765432109', $newTaxRegistrationId);

        $this->assertTrue(static::$document->nextDocumentBuyerTaxRegistration());
        static::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('FC', $newTaxRegistrationType);
        $this->assertSame('BUYERFISCAL001', $newTaxRegistrationId);
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRegistration());

        $this->assertTrue(static::$document->firstDocumentBuyerAddress());
        static::$document->getDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        $this->assertSame('Via Milano 2', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('20100', $newPostcode);
        $this->assertSame('Milano', $newCity);
        $this->assertSame('IT', $newCountryId);
        $this->assertSame('MI', $newSubDivision);
        $this->assertFalse(static::$document->nextDocumentBuyerAddress());

        $this->assertTrue(static::$document->firstDocumentBuyerCommunication());
        static::$document->getDocumentBuyerCommunication($newType, $newUri);

        $this->assertSame('CODICE_DESTINATARIO', $newType);
        $this->assertSame('ABC1234', $newUri);
        $this->assertFalse(static::$document->nextDocumentBuyerCommunication());
    }

    public function testDocumentSellerTaxRepresentative(): void
    {
        static::$document->getDocumentSellerTaxRepresentativeName($newName);

        $this->assertSame('Tax Representative S.r.l.', $newName);
        $this->assertTrue(static::$document->firstDocumentSellerTaxRepresentativeTaxRegistration());

        static::$document->getDocumentSellerTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('VA', $newTaxRegistrationType);
        $this->assertSame('11111111111', $newTaxRegistrationId);
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeTaxRegistration());
    }

    public function testFirstNextGetDocumentPaymentMean(): void
    {
        $this->assertTrue(static::$document->firstDocumentPaymentMean());

        static::$document->getDocumentPaymentMean(
            $newTypeCode,
            $newName,
            $newFinancialCardId,
            $newFinancialCardHolder,
            $newBuyerIban,
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference,
            $newMandate
        );

        $this->assertSame('MP05', $newTypeCode);
        $this->assertSame('Example Bank', $newName);
        $this->assertSame('', $newFinancialCardId);
        $this->assertSame('Example Seller S.r.l.', $newFinancialCardHolder);
        $this->assertSame('', $newBuyerIban);
        $this->assertSame('IT60X0542811101000000123456', $newPayeeIban);
        $this->assertSame('Example Seller S.r.l.', $newPayeeAccountName);
        $this->assertSame('', $newPayeeProprietaryId);
        $this->assertSame('BCITITMM', $newPayeeBic);
        $this->assertSame('PAYMENT-REF-1', $newPaymentReference);
        $this->assertSame('', $newMandate);
        $this->assertFalse(static::$document->nextDocumentPaymentMean());
    }

    public function testFirstNextGetDocumentPaymentReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentPaymentReference());

        static::$document->getDocumentPaymentReference($newId);

        $this->assertSame('PAYMENT-REF-1', $newId);
        $this->assertFalse(static::$document->nextDocumentPaymentReference());
    }

    public function testFirstNextGetDocumentPaymentTerm(): void
    {
        $this->assertTrue(static::$document->firstDocumentPaymentTerm());

        static::$document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('TP01', $newDescription);
        $this->assertSame('20260817', $newDueDate?->format('Ymd'));
        $this->assertSame('', $newMandate);

        $this->assertTrue(static::$document->firstDocumentPaymentDiscountTermsInLastPaymentTerm());
        static::$document->getDocumentPaymentDiscountTermsInLastPaymentTerm($newBaseAmount, $newDiscountAmount, $newDiscountPercent, $newBaseDate, $newBasePeriod, $newBasePeriodUnit);

        $this->assertEqualsWithDelta(0.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.5, $newDiscountAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('20260801', $newBaseDate?->format('Ymd'));
        $this->assertEqualsWithDelta(0.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newBasePeriodUnit);
        $this->assertFalse(static::$document->nextDocumentPaymentDiscountTermsInLastPaymentTerm());

        $this->assertTrue(static::$document->firstDocumentPaymentPenaltyTermsInLastPaymentTerm());
        static::$document->getDocumentPaymentPenaltyTermsInLastPaymentTerm($newBaseAmount, $newPenaltyAmount, $newPenaltyPercent, $newBaseDate, $newBasePeriod, $newBasePeriodUnit);

        $this->assertEqualsWithDelta(0.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(5.0, $newPenaltyAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newPenaltyPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('20260818', $newBaseDate?->format('Ymd'));
        $this->assertEqualsWithDelta(0.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newBasePeriodUnit);
        $this->assertFalse(static::$document->nextDocumentPaymentPenaltyTermsInLastPaymentTerm());
        $this->assertFalse(static::$document->nextDocumentPaymentTerm());
    }

    public function testFirstNextGetDocumentTax(): void
    {
        $this->assertTrue(static::$document->firstDocumentTax());

        static::$document->getDocumentTax(
            $newTaxCategory,
            $newTaxType,
            $newBasisAmount,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
            $newTaxDueDate,
            $newTaxDueCode
        );

        $this->assertSame('VAT', $newTaxCategory);
        $this->assertSame('I', $newTaxType);
        $this->assertEqualsWithDelta(200.12, $newBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(44.03, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);
        $this->assertNull($newTaxDueDate);
        $this->assertSame('', $newTaxDueCode);
        $this->assertFalse(static::$document->nextDocumentTax());
    }

    public function testGetDocumentSummation(): void
    {
        static::$document->getDocumentSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxBasisAmount,
            $newTaxTotalAmount,
            $newTaxTotalAmount2,
            $newGrossAmount,
            $newDueAmount,
            $newPrepaidAmount,
            $newRoungingAmount
        );

        $this->assertEqualsWithDelta(200.12, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(200.12, $newTaxBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(44.03, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newTaxTotalAmount2, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(244.15, $newGrossAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(244.15, $newDueAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newPrepaidAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newRoungingAmount, PHP_FLOAT_EPSILON);
    }

    public function testFirstNextGetDocumentPosition(): void
    {
        $this->assertTrue(static::$document->firstDocumentPosition());

        static::$document->getDocumentPosition($newPositionId, $newParentPositionId, $newLineStatusCode, $newLineStatusReasonCode);

        $this->assertSame('1', $newPositionId);
        $this->assertSame('', $newParentPositionId);
        $this->assertSame('', $newLineStatusCode);
        $this->assertSame('', $newLineStatusReasonCode);

        static::$document->getDocumentPositionProductDetails(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductModelId,
            $newProductBatchId,
            $newProductBrandName,
            $newProductModelName,
            $newProductOriginTradeCountry
        );

        $this->assertSame('PRODUCT-1', $newProductId);
        $this->assertSame('Consulting service', $newProductName);
        $this->assertSame('Consulting service', $newProductDescription);
        $this->assertSame('', $newProductSellerId);
        $this->assertSame('', $newProductBuyerId);
        $this->assertSame('', $newProductGlobalId);
        $this->assertSame('', $newProductGlobalIdType);
        $this->assertSame('INTERNAL', $newProductIndustryId);
        $this->assertSame('', $newProductModelId);
        $this->assertSame('', $newProductBatchId);
        $this->assertSame('', $newProductBrandName);
        $this->assertSame('', $newProductModelName);
        $this->assertSame('', $newProductOriginTradeCountry);

        $this->assertTrue(static::$document->firstDocumentPositionNetPrice());
        static::$document->getDocumentPositionNetPrice($newNetPrice, $newNetPriceBasisQuantity, $newNetPriceBasisQuantityUnit);

        $this->assertEqualsWithDelta(100.123456, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newNetPriceBasisQuantityUnit);

        static::$document->getDocumentPositionNetPriceTax($newTaxCategory, $newTaxType, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode);

        $this->assertSame('VAT', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(22.03, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);

        static::$document->getDocumentPositionQuantities($newQuantity, $newQuantityUnit, $newChargeFreeQuantity, $newChargeFreeQuantityUnit, $newPackageQuantity, $newPackageQuantityUnit, $newPerPackageUnitQuantity, $newPerPackageUnitQuantityUnit);

        $this->assertEqualsWithDelta(1.0, $newQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newChargeFreeQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newChargeFreeQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newPackageQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newPackageQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newPerPackageUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newPerPackageUnitQuantityUnit);

        $this->assertTrue(static::$document->firstDocumentPositionBillingPeriod());
        static::$document->getDocumentPositionBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->assertSame('20260701', $newStartDate?->format('Ymd'));
        $this->assertSame('20260715', $newEndDate?->format('Ymd'));
        $this->assertSame('', $newDescription);
        $this->assertFalse(static::$document->nextDocumentPositionBillingPeriod());

        $this->assertTrue(static::$document->firstDocumentPositionTax());
        static::$document->getDocumentPositionTax($newTaxCategory, $newTaxType, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode);

        $this->assertSame('VAT', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(22.03, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);
        $this->assertFalse(static::$document->nextDocumentPositionTax());

        $this->assertTrue(static::$document->firstDocumentPositionAllowanceCharge());
        static::$document->getDocumentPositionAllowanceCharge($newChargeIndicator, $newAllowanceChargeAmount, $newAllowanceChargeBaseAmount, $newAllowanceChargeReason, $newAllowanceChargeReasonCode, $newAllowanceChargePercent);

        $this->assertFalse($newChargeIndicator);
        $this->assertEqualsWithDelta(1.123456, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newAllowanceChargeReason);
        $this->assertSame('', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(1.5, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);
        $this->assertFalse(static::$document->nextDocumentPositionAllowanceCharge());

        $this->assertTrue(static::$document->firstDocumentPositionSummation());
        static::$document->getDocumentPositionSummation($newNetAmount, $newChargeTotalAmount, $newDiscountTotalAmount, $newTaxTotalAmount, $newGrossAmount);

        $this->assertEqualsWithDelta(100.123456, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.123456, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.03, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(122.153456, $newGrossAmount, PHP_FLOAT_EPSILON);

        $this->assertTrue(static::$document->nextDocumentPosition());

        static::$document->getDocumentPosition($newPositionId, $newParentPositionId, $newLineStatusCode, $newLineStatusReasonCode);

        $this->assertSame('2', $newPositionId);
        $this->assertSame('', $newParentPositionId);
        $this->assertSame('', $newLineStatusCode);
        $this->assertSame('', $newLineStatusReasonCode);

        static::$document->getDocumentPositionProductDetails(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductModelId,
            $newProductBatchId,
            $newProductBrandName,
            $newProductModelName,
            $newProductOriginTradeCountry
        );

        $this->assertSame('PRODUCT-2', $newProductId);
        $this->assertSame('PRODUCT-2', $newProductName);
        $this->assertSame('PRODUCT-2', $newProductDescription);
        $this->assertSame('', $newProductSellerId);
        $this->assertSame('', $newProductBuyerId);
        $this->assertSame('', $newProductGlobalId);
        $this->assertSame('', $newProductGlobalIdType);
        $this->assertSame('INTERNO', $newProductIndustryId);
        $this->assertSame('', $newProductModelId);
        $this->assertSame('', $newProductBatchId);
        $this->assertSame('', $newProductBrandName);
        $this->assertSame('', $newProductModelName);
        $this->assertSame('', $newProductOriginTradeCountry);

        $this->assertTrue(static::$document->firstDocumentPositionNetPrice());
        static::$document->getDocumentPositionNetPrice($newNetPrice, $newNetPriceBasisQuantity, $newNetPriceBasisQuantityUnit);

        $this->assertEqualsWithDelta(100.0, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newNetPriceBasisQuantityUnit);

        static::$document->getDocumentPositionNetPriceTax($newTaxCategory, $newTaxType, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode);

        $this->assertSame('VAT', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(22.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);

        static::$document->getDocumentPositionQuantities($newQuantity, $newQuantityUnit, $newChargeFreeQuantity, $newChargeFreeQuantityUnit, $newPackageQuantity, $newPackageQuantityUnit, $newPerPackageUnitQuantity, $newPerPackageUnitQuantityUnit);

        $this->assertEqualsWithDelta(1.0, $newQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newChargeFreeQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newChargeFreeQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newPackageQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newPackageQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newPerPackageUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newPerPackageUnitQuantityUnit);

        $this->assertFalse(static::$document->firstDocumentPositionBillingPeriod());

        $this->assertTrue(static::$document->firstDocumentPositionTax());
        static::$document->getDocumentPositionTax($newTaxCategory, $newTaxType, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode);

        $this->assertSame('VAT', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(22.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);
        $this->assertFalse(static::$document->nextDocumentPositionTax());

        $this->assertFalse(static::$document->firstDocumentPositionAllowanceCharge());

        $this->assertTrue(static::$document->firstDocumentPositionSummation());
        static::$document->getDocumentPositionSummation($newNetAmount, $newChargeTotalAmount, $newDiscountTotalAmount, $newTaxTotalAmount, $newGrossAmount);

        $this->assertEqualsWithDelta(100.0, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(122.0, $newGrossAmount, PHP_FLOAT_EPSILON);

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testConvertToDTO(): void
    {
        static::$document->convertToDTO($newDocumentDTO);

        $this->assertInstanceOf(InvoiceSuiteDocumentHeaderDTO::class, $newDocumentDTO);
        $documentDTO = $newDocumentDTO;

        $this->assertSame('2026-07-000001', $documentDTO->getNumber());
        $this->assertSame('380', $documentDTO->getType());
        $this->assertSame('20260718', $documentDTO->getDate()?->format('Ymd'));
        $this->assertSame('EUR', $documentDTO->getCurrency());
        $this->assertCount(2, $documentDTO->getNotes());
        $this->assertSame('First invoice note', $documentDTO->getNotes()[0]->getContent());
        $this->assertSame('Second invoice note', $documentDTO->getNotes()[1]->getContent());

        $this->assertCount(1, $documentDTO->getBuyerOrderReferences());
        $this->assertSame('ORDER-1', $documentDTO->getBuyerOrderReferences()[0]->getReferenceNumber());
        $this->assertSame('20260701', $documentDTO->getBuyerOrderReferences()[0]->getReferenceDate()?->format('Ymd'));
        $this->assertCount(2, $documentDTO->getContractReferences());
        $this->assertSame('CONTRACT-1', $documentDTO->getContractReferences()[0]->getReferenceNumber());
        $this->assertSame('CONTRACT-2', $documentDTO->getContractReferences()[1]->getReferenceNumber());
        $this->assertCount(2, $documentDTO->getInvoiceReferences());
        $this->assertSame('INVOICE-REF-1', $documentDTO->getInvoiceReferences()[0]->getReferenceNumber());
        $this->assertSame('INVOICE-REF-2', $documentDTO->getInvoiceReferences()[1]->getReferenceNumber());

        $sellerParty = $documentDTO->getSellerParty();

        $this->assertNotNull($sellerParty);
        $this->assertSame('Example Seller S.r.l.', $sellerParty->getNames()[0]);
        $this->assertSame('VA', $sellerParty->getTaxRegistrations()[0]->getIdType());
        $this->assertSame('12345678901', $sellerParty->getTaxRegistrations()[0]->getId());
        $this->assertSame('FC', $sellerParty->getTaxRegistrations()[1]->getIdType());
        $this->assertSame('SELLERFISCAL01', $sellerParty->getTaxRegistrations()[1]->getId());
        $sellerAddress = $sellerParty->getAddresses()[0];

        $this->assertSame('Via Roma 1', $sellerAddress->getAddressLine1());
        $this->assertNull($sellerAddress->getAddressLine2());
        $this->assertNull($sellerAddress->getAddressLine3());
        $this->assertSame('00100', $sellerAddress->getPostcode());
        $this->assertSame('Roma', $sellerAddress->getCity());
        $this->assertSame('IT', $sellerAddress->getCountry());
        $this->assertSame('RM', $sellerAddress->getSubDivision());
        $sellerContact = $sellerParty->getContacts()[0];

        $this->assertNull($sellerContact->getPersonName());
        $this->assertNull($sellerContact->getDepartmentName());
        $this->assertSame('06123456', $sellerContact->getPhoneNumber());
        $this->assertSame('06654321', $sellerContact->getFaxNumber());
        $this->assertSame('seller@example.it', $sellerContact->getEmailAddress());

        $buyerParty = $documentDTO->getBuyerParty();

        $this->assertNotNull($buyerParty);
        $this->assertSame('Example Buyer S.p.A.', $buyerParty->getNames()[0]);
        $this->assertSame('VA', $buyerParty->getTaxRegistrations()[0]->getIdType());
        $this->assertSame('98765432109', $buyerParty->getTaxRegistrations()[0]->getId());
        $this->assertSame('FC', $buyerParty->getTaxRegistrations()[1]->getIdType());
        $this->assertSame('BUYERFISCAL001', $buyerParty->getTaxRegistrations()[1]->getId());
        $buyerAddress = $buyerParty->getAddresses()[0];

        $this->assertSame('Via Milano 2', $buyerAddress->getAddressLine1());
        $this->assertNull($buyerAddress->getAddressLine2());
        $this->assertNull($buyerAddress->getAddressLine3());
        $this->assertSame('20100', $buyerAddress->getPostcode());
        $this->assertSame('Milano', $buyerAddress->getCity());
        $this->assertSame('IT', $buyerAddress->getCountry());
        $this->assertSame('MI', $buyerAddress->getSubDivision());
        $this->assertSame('CODICE_DESTINATARIO', $buyerParty->getCommunications()[0]->getIdType());
        $this->assertSame('ABC1234', $buyerParty->getCommunications()[0]->getId());

        $sellerTaxRepresentativeParty = $documentDTO->getSellerTaxRepresentativeParty();

        $this->assertNotNull($sellerTaxRepresentativeParty);
        $this->assertSame('Tax Representative S.r.l.', $sellerTaxRepresentativeParty->getNames()[0]);
        $this->assertSame('VA', $sellerTaxRepresentativeParty->getTaxRegistrations()[0]->getIdType());
        $this->assertSame('11111111111', $sellerTaxRepresentativeParty->getTaxRegistrations()[0]->getId());

        $this->assertCount(1, $documentDTO->getPaymentMeans());
        $paymentMean = $documentDTO->getPaymentMeans()[0];

        $this->assertSame('MP05', $paymentMean->getTypeCode());
        $this->assertSame('Example Bank', $paymentMean->getName());
        $this->assertNull($paymentMean->getFinancialCardId());
        $this->assertSame('Example Seller S.r.l.', $paymentMean->getFinancialCardHolder());
        $this->assertNull($paymentMean->getBuyerIban());
        $this->assertSame('IT60X0542811101000000123456', $paymentMean->getPayeeIban());
        $this->assertSame('Example Seller S.r.l.', $paymentMean->getPayeeAccountName());
        $this->assertNull($paymentMean->getPayeeProprietaryId());
        $this->assertSame('BCITITMM', $paymentMean->getPayeeBic());
        $this->assertSame('PAYMENT-REF-1', $paymentMean->getPaymentReference());
        $this->assertNull($paymentMean->getMandate());

        $this->assertCount(1, $documentDTO->getPaymentTerms());
        $paymentTerm = $documentDTO->getPaymentTerms()[0];

        $this->assertSame('TP01', $paymentTerm->getDescription());
        $this->assertSame('20260817', $paymentTerm->getDueDate()?->format('Ymd'));
        $this->assertNull($paymentTerm->getMandate());
        $this->assertCount(1, $paymentTerm->getDiscountTerms());
        $this->assertEqualsWithDelta(0.0, $paymentTerm->getDiscountTerms()[0]->getBaseAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.5, $paymentTerm->getDiscountTerms()[0]->getDiscountAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $paymentTerm->getDiscountTerms()[0]->getDiscountPercent(), PHP_FLOAT_EPSILON);
        $this->assertSame('20260801', $paymentTerm->getDiscountTerms()[0]->getBaseDate()?->format('Ymd'));
        $this->assertCount(1, $paymentTerm->getPenaltyTerms());
        $this->assertEqualsWithDelta(0.0, $paymentTerm->getPenaltyTerms()[0]->getBaseAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(5.0, $paymentTerm->getPenaltyTerms()[0]->getPenaltyAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $paymentTerm->getPenaltyTerms()[0]->getPenaltyPercent(), PHP_FLOAT_EPSILON);
        $this->assertSame('20260818', $paymentTerm->getPenaltyTerms()[0]->getBaseDate()?->format('Ymd'));

        $this->assertCount(1, $documentDTO->getTaxes());
        $documentTax = $documentDTO->getTaxes()[0];

        $this->assertSame('VAT', $documentTax->getCategory());
        $this->assertSame('I', $documentTax->getType());
        $this->assertEqualsWithDelta(200.12, $documentTax->getBasisAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(44.03, $documentTax->getAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $documentTax->getPercent(), PHP_FLOAT_EPSILON);
        $this->assertNull($documentTax->getExemptionReason());
        $this->assertNull($documentTax->getExemptionReasonCode());

        $this->assertCount(1, $documentDTO->getSummations());
        $documentSummation = $documentDTO->getSummations()[0];

        $this->assertEqualsWithDelta(200.12, $documentSummation->getNetAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $documentSummation->getChargeTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $documentSummation->getDiscountTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(200.12, $documentSummation->getTaxBasisAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(44.03, $documentSummation->getTaxTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $documentSummation->getTaxTotalAmount2(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(244.15, $documentSummation->getGrossAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(244.15, $documentSummation->getDueAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $documentSummation->getPrepaidAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $documentSummation->getRoungingAmount(), PHP_FLOAT_EPSILON);

        $this->assertCount(2, $documentDTO->getPositions());
        $firstPosition = $documentDTO->getPositions()[0];

        $this->assertSame('1', $firstPosition->getLineId());
        $firstProduct = $firstPosition->getProduct();

        $this->assertNotNull($firstProduct);
        $this->assertSame('PRODUCT-1', $firstProduct->getId());
        $this->assertSame('Consulting service', $firstProduct->getName());
        $this->assertSame('Consulting service', $firstProduct->getDescription());
        $this->assertSame('INTERNAL', $firstProduct->getIndustryId());
        $firstNetPrice = $firstPosition->getNetPrice();

        $this->assertNotNull($firstNetPrice);
        $this->assertEqualsWithDelta(100.123456, $firstNetPrice->getAmount(), PHP_FLOAT_EPSILON);
        $firstPriceQuantity = $firstNetPrice->getPriceQuantity();

        $this->assertNotNull($firstPriceQuantity);
        $this->assertEqualsWithDelta(1.0, $firstPriceQuantity->getQuantity(), PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $firstPriceQuantity->getQuantityUnit());
        $firstBilledQuantity = $firstPosition->getQuantityBilled();

        $this->assertNotNull($firstBilledQuantity);
        $this->assertEqualsWithDelta(1.0, $firstBilledQuantity->getQuantity(), PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $firstBilledQuantity->getQuantityUnit());
        $this->assertCount(1, $firstPosition->getBillingPeriods());
        $this->assertSame('20260701', $firstPosition->getBillingPeriods()[0]->getStartDate()?->format('Ymd'));
        $this->assertSame('20260715', $firstPosition->getBillingPeriods()[0]->getEndDate()?->format('Ymd'));
        $this->assertCount(1, $firstPosition->getTaxes());
        $this->assertSame('VAT', $firstPosition->getTaxes()[0]->getCategory());
        $this->assertEqualsWithDelta(22.03, $firstPosition->getTaxes()[0]->getAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $firstPosition->getTaxes()[0]->getPercent(), PHP_FLOAT_EPSILON);
        $this->assertCount(1, $firstPosition->getAllowanceCharges());
        $this->assertFalse($firstPosition->getAllowanceCharges()[0]->getChargeIndicator());
        $this->assertEqualsWithDelta(1.123456, $firstPosition->getAllowanceCharges()[0]->getAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.5, $firstPosition->getAllowanceCharges()[0]->getPercent(), PHP_FLOAT_EPSILON);
        $firstPositionSummation = $firstPosition->getSummation();

        $this->assertNotNull($firstPositionSummation);
        $this->assertEqualsWithDelta(100.123456, $firstPositionSummation->getNetAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $firstPositionSummation->getChargeTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.123456, $firstPositionSummation->getDiscountTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.03, $firstPositionSummation->getTaxTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(122.153456, $firstPositionSummation->getGrossAmount(), PHP_FLOAT_EPSILON);

        $secondPosition = $documentDTO->getPositions()[1];

        $this->assertSame('2', $secondPosition->getLineId());
        $secondProduct = $secondPosition->getProduct();

        $this->assertNotNull($secondProduct);
        $this->assertSame('PRODUCT-2', $secondProduct->getId());
        $this->assertSame('PRODUCT-2', $secondProduct->getName());
        $this->assertSame('INTERNO', $secondProduct->getIndustryId());
        $secondNetPrice = $secondPosition->getNetPrice();

        $this->assertNotNull($secondNetPrice);
        $this->assertEqualsWithDelta(100.0, $secondNetPrice->getAmount(), PHP_FLOAT_EPSILON);
        $secondPriceQuantity = $secondNetPrice->getPriceQuantity();

        $this->assertNotNull($secondPriceQuantity);
        $this->assertEqualsWithDelta(1.0, $secondPriceQuantity->getQuantity(), PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $secondPriceQuantity->getQuantityUnit());
        $secondBilledQuantity = $secondPosition->getQuantityBilled();

        $this->assertNotNull($secondBilledQuantity);
        $this->assertEqualsWithDelta(1.0, $secondBilledQuantity->getQuantity(), PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $secondBilledQuantity->getQuantityUnit());
        $this->assertCount(0, $secondPosition->getBillingPeriods());
        $this->assertCount(1, $secondPosition->getTaxes());
        $this->assertEqualsWithDelta(22.0, $secondPosition->getTaxes()[0]->getAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $secondPosition->getTaxes()[0]->getPercent(), PHP_FLOAT_EPSILON);
        $this->assertCount(0, $secondPosition->getAllowanceCharges());
        $secondPositionSummation = $secondPosition->getSummation();

        $this->assertNotNull($secondPositionSummation);
        $this->assertEqualsWithDelta(100.0, $secondPositionSummation->getNetAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $secondPositionSummation->getChargeTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $secondPositionSummation->getDiscountTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $secondPositionSummation->getTaxTotalAmount(), PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(122.0, $secondPositionSummation->getGrossAmount(), PHP_FLOAT_EPSILON);
    }

    public function testUnsupportedIteratorsReturnFalse(): void
    {
        $this->assertFalse(static::$document->firstDocumentBillingPeriod());
        $this->assertFalse(static::$document->nextDocumentBillingPeriod());
        $this->assertFalse(static::$document->firstDocumentPostingReference());
        $this->assertFalse(static::$document->nextDocumentPostingReference());
        $this->assertFalse(static::$document->firstDocumentSellerOrderReference());
        $this->assertFalse(static::$document->nextDocumentSellerOrderReference());
        $this->assertFalse(static::$document->firstDocumentQuotationReference());
        $this->assertFalse(static::$document->nextDocumentQuotationReference());
        $this->assertFalse(static::$document->firstDocumentAdditionalReference());
        $this->assertFalse(static::$document->nextDocumentAdditionalReference());
        $this->assertFalse(static::$document->firstDocumentProjectReference());
        $this->assertFalse(static::$document->nextDocumentProjectReference());
        $this->assertFalse(static::$document->firstDocumentUltimateCustomerOrderReference());
        $this->assertFalse(static::$document->nextDocumentUltimateCustomerOrderReference());
        $this->assertFalse(static::$document->firstDocumentDespatchAdviceReference());
        $this->assertFalse(static::$document->nextDocumentDespatchAdviceReference());
        $this->assertFalse(static::$document->firstDocumentReceivingAdviceReference());
        $this->assertFalse(static::$document->nextDocumentReceivingAdviceReference());
        $this->assertFalse(static::$document->firstDocumentDeliveryNoteReference());
        $this->assertFalse(static::$document->nextDocumentDeliveryNoteReference());
        $this->assertFalse(static::$document->firstDocumentSellerId());
        $this->assertFalse(static::$document->nextDocumentSellerId());
        $this->assertFalse(static::$document->firstDocumentSellerGlobalId());
        $this->assertFalse(static::$document->nextDocumentSellerGlobalId());
        $this->assertFalse(static::$document->firstDocumentSellerLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentSellerLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentSellerCommunication());
        $this->assertFalse(static::$document->nextDocumentSellerCommunication());
        $this->assertFalse(static::$document->firstDocumentBuyerId());
        $this->assertFalse(static::$document->nextDocumentBuyerId());
        $this->assertFalse(static::$document->firstDocumentBuyerGlobalId());
        $this->assertFalse(static::$document->nextDocumentBuyerGlobalId());
        $this->assertFalse(static::$document->firstDocumentBuyerLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentBuyerLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentBuyerContact());
        $this->assertFalse(static::$document->nextDocumentBuyerContact());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeId());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeId());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeGlobalId());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeGlobalId());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeAddress());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeAddress());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeContact());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeContact());
        $this->assertFalse(static::$document->firstDocumentSellerTaxRepresentativeCommunication());
        $this->assertFalse(static::$document->nextDocumentSellerTaxRepresentativeCommunication());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeId());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeId());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeGlobalId());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeGlobalId());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeAddress());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeAddress());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeContact());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeContact());
        $this->assertFalse(static::$document->firstDocumentBuyerTaxRepresentativeCommunication());
        $this->assertFalse(static::$document->nextDocumentBuyerTaxRepresentativeCommunication());
        $this->assertFalse(static::$document->firstDocumentSalesAgentId());
        $this->assertFalse(static::$document->nextDocumentSalesAgentId());
        $this->assertFalse(static::$document->firstDocumentSalesAgentGlobalId());
        $this->assertFalse(static::$document->nextDocumentSalesAgentGlobalId());
        $this->assertFalse(static::$document->firstDocumentSalesAgentTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentSalesAgentTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentSalesAgentAddress());
        $this->assertFalse(static::$document->nextDocumentSalesAgentAddress());
        $this->assertFalse(static::$document->firstDocumentSalesAgentLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentSalesAgentLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentSalesAgentContact());
        $this->assertFalse(static::$document->nextDocumentSalesAgentContact());
        $this->assertFalse(static::$document->firstDocumentSalesAgentCommunication());
        $this->assertFalse(static::$document->nextDocumentSalesAgentCommunication());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentId());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentId());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentGlobalId());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentGlobalId());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentAddress());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentAddress());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentContact());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentContact());
        $this->assertFalse(static::$document->firstDocumentBuyerAgentCommunication());
        $this->assertFalse(static::$document->nextDocumentBuyerAgentCommunication());
        $this->assertFalse(static::$document->firstDocumentProductEndUserId());
        $this->assertFalse(static::$document->nextDocumentProductEndUserId());
        $this->assertFalse(static::$document->firstDocumentProductEndUserGlobalId());
        $this->assertFalse(static::$document->nextDocumentProductEndUserGlobalId());
        $this->assertFalse(static::$document->firstDocumentProductEndUserTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentProductEndUserTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentProductEndUserAddress());
        $this->assertFalse(static::$document->nextDocumentProductEndUserAddress());
        $this->assertFalse(static::$document->firstDocumentProductEndUserLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentProductEndUserLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentProductEndUserContact());
        $this->assertFalse(static::$document->nextDocumentProductEndUserContact());
        $this->assertFalse(static::$document->firstDocumentProductEndUserCommunication());
        $this->assertFalse(static::$document->nextDocumentProductEndUserCommunication());
        $this->assertFalse(static::$document->firstDocumentShipToId());
        $this->assertFalse(static::$document->nextDocumentShipToId());
        $this->assertFalse(static::$document->firstDocumentShipToGlobalId());
        $this->assertFalse(static::$document->nextDocumentShipToGlobalId());
        $this->assertFalse(static::$document->firstDocumentShipToTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentShipToTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentShipToAddress());
        $this->assertFalse(static::$document->nextDocumentShipToAddress());
        $this->assertFalse(static::$document->firstDocumentShipToLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentShipToLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentShipToContact());
        $this->assertFalse(static::$document->nextDocumentShipToContact());
        $this->assertFalse(static::$document->firstDocumentShipToCommunication());
        $this->assertFalse(static::$document->nextDocumentShipToCommunication());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToId());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToId());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToGlobalId());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToGlobalId());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToAddress());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToAddress());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToContact());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToContact());
        $this->assertFalse(static::$document->firstDocumentUltimateShipToCommunication());
        $this->assertFalse(static::$document->nextDocumentUltimateShipToCommunication());
        $this->assertFalse(static::$document->firstDocumentShipFromId());
        $this->assertFalse(static::$document->nextDocumentShipFromId());
        $this->assertFalse(static::$document->firstDocumentShipFromGlobalId());
        $this->assertFalse(static::$document->nextDocumentShipFromGlobalId());
        $this->assertFalse(static::$document->firstDocumentShipFromTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentShipFromTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentShipFromAddress());
        $this->assertFalse(static::$document->nextDocumentShipFromAddress());
        $this->assertFalse(static::$document->firstDocumentShipFromLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentShipFromLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentShipFromContact());
        $this->assertFalse(static::$document->nextDocumentShipFromContact());
        $this->assertFalse(static::$document->firstDocumentShipFromCommunication());
        $this->assertFalse(static::$document->nextDocumentShipFromCommunication());
        $this->assertFalse(static::$document->firstDocumentInvoicerId());
        $this->assertFalse(static::$document->nextDocumentInvoicerId());
        $this->assertFalse(static::$document->firstDocumentInvoicerGlobalId());
        $this->assertFalse(static::$document->nextDocumentInvoicerGlobalId());
        $this->assertFalse(static::$document->firstDocumentInvoicerTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentInvoicerTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentInvoicerAddress());
        $this->assertFalse(static::$document->nextDocumentInvoicerAddress());
        $this->assertFalse(static::$document->firstDocumentInvoicerLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentInvoicerLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentInvoicerContact());
        $this->assertFalse(static::$document->nextDocumentInvoicerContact());
        $this->assertFalse(static::$document->firstDocumentInvoicerCommunication());
        $this->assertFalse(static::$document->nextDocumentInvoicerCommunication());
        $this->assertFalse(static::$document->firstDocumentInvoiceeId());
        $this->assertFalse(static::$document->nextDocumentInvoiceeId());
        $this->assertFalse(static::$document->firstDocumentInvoiceeGlobalId());
        $this->assertFalse(static::$document->nextDocumentInvoiceeGlobalId());
        $this->assertFalse(static::$document->firstDocumentInvoiceeTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentInvoiceeTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentInvoiceeAddress());
        $this->assertFalse(static::$document->nextDocumentInvoiceeAddress());
        $this->assertFalse(static::$document->firstDocumentInvoiceeLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentInvoiceeLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentInvoiceeContact());
        $this->assertFalse(static::$document->nextDocumentInvoiceeContact());
        $this->assertFalse(static::$document->firstDocumentInvoiceeCommunication());
        $this->assertFalse(static::$document->nextDocumentInvoiceeCommunication());
        $this->assertFalse(static::$document->firstDocumentPayeeId());
        $this->assertFalse(static::$document->nextDocumentPayeeId());
        $this->assertFalse(static::$document->firstDocumentPayeeGlobalId());
        $this->assertFalse(static::$document->nextDocumentPayeeGlobalId());
        $this->assertFalse(static::$document->firstDocumentPayeeTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentPayeeTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentPayeeAddress());
        $this->assertFalse(static::$document->nextDocumentPayeeAddress());
        $this->assertFalse(static::$document->firstDocumentPayeeLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentPayeeLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentPayeeContact());
        $this->assertFalse(static::$document->nextDocumentPayeeContact());
        $this->assertFalse(static::$document->firstDocumentPayeeCommunication());
        $this->assertFalse(static::$document->nextDocumentPayeeCommunication());
        $this->assertFalse(static::$document->firstDocumentPayerId());
        $this->assertFalse(static::$document->nextDocumentPayerId());
        $this->assertFalse(static::$document->firstDocumentPayerGlobalId());
        $this->assertFalse(static::$document->nextDocumentPayerGlobalId());
        $this->assertFalse(static::$document->firstDocumentPayerTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentPayerTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentPayerAddress());
        $this->assertFalse(static::$document->nextDocumentPayerAddress());
        $this->assertFalse(static::$document->firstDocumentPayerLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentPayerLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentPayerContact());
        $this->assertFalse(static::$document->nextDocumentPayerContact());
        $this->assertFalse(static::$document->firstDocumentPayerCommunication());
        $this->assertFalse(static::$document->nextDocumentPayerCommunication());
        $this->assertFalse(static::$document->firstDocumentPaymentCreditorReferenceID());
        $this->assertFalse(static::$document->nextDocumentPaymentCreditorReferenceID());
        $this->assertFalse(static::$document->firstDocumentAllowanceCharge());
        $this->assertFalse(static::$document->nextDocumentAllowanceCharge());
        $this->assertFalse(static::$document->firstDocumentLogisticServiceCharge());
        $this->assertFalse(static::$document->nextDocumentLogisticServiceCharge());
        $this->assertFalse(static::$document->firstDocumentPositionNote());
        $this->assertFalse(static::$document->nextDocumentPositionNote());
        $this->assertFalse(static::$document->firstDocumentPositionProductCharacteristic());
        $this->assertFalse(static::$document->nextDocumentPositionProductCharacteristic());
        $this->assertFalse(static::$document->firstDocumentPositionProductClassification());
        $this->assertFalse(static::$document->nextDocumentPositionProductClassification());
        $this->assertFalse(static::$document->firstDocumentPositionReferencedProduct());
        $this->assertFalse(static::$document->nextDocumentPositionReferencedProduct());
        $this->assertFalse(static::$document->firstDocumentPositionSellerOrderReference());
        $this->assertFalse(static::$document->nextDocumentPositionSellerOrderReference());
        $this->assertFalse(static::$document->firstDocumentPositionBuyerOrderReference());
        $this->assertFalse(static::$document->nextDocumentPositionBuyerOrderReference());
        $this->assertFalse(static::$document->firstDocumentPositionQuotationReference());
        $this->assertFalse(static::$document->nextDocumentPositionQuotationReference());
        $this->assertFalse(static::$document->firstDocumentPositionContractReference());
        $this->assertFalse(static::$document->nextDocumentPositionContractReference());
        $this->assertFalse(static::$document->firstDocumentPositionAdditionalReference());
        $this->assertFalse(static::$document->nextDocumentPositionAdditionalReference());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateCustomerOrderReference());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateCustomerOrderReference());
        $this->assertFalse(static::$document->firstDocumentPositionDespatchAdviceReference());
        $this->assertFalse(static::$document->nextDocumentPositionDespatchAdviceReference());
        $this->assertFalse(static::$document->firstDocumentPositionReceivingAdviceReference());
        $this->assertFalse(static::$document->nextDocumentPositionReceivingAdviceReference());
        $this->assertFalse(static::$document->firstDocumentPositionDeliveryNoteReference());
        $this->assertFalse(static::$document->nextDocumentPositionDeliveryNoteReference());
        $this->assertFalse(static::$document->firstDocumentPositionInvoiceReference());
        $this->assertFalse(static::$document->nextDocumentPositionInvoiceReference());
        $this->assertFalse(static::$document->firstDocumentPositionAdditionalObjectReference());
        $this->assertFalse(static::$document->nextDocumentPositionAdditionalObjectReference());
        $this->assertFalse(static::$document->firstDcumentPositionGrossPrice());
        $this->assertFalse(static::$document->firstDocumentPositionGrossPriceAllowanceCharge());
        $this->assertFalse(static::$document->nextDocumentPositionGrossPriceAllowanceCharge());
        $this->assertFalse(static::$document->firstDocumentPositionShipToId());
        $this->assertFalse(static::$document->nextDocumentPositionShipToId());
        $this->assertFalse(static::$document->firstDocumentPositionShipToGlobalId());
        $this->assertFalse(static::$document->nextDocumentPositionShipToGlobalId());
        $this->assertFalse(static::$document->firstDocumentPositionShipToTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentPositionShipToTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentPositionShipToAddress());
        $this->assertFalse(static::$document->nextDocumentPositionShipToAddress());
        $this->assertFalse(static::$document->firstDocumentPositionShipToLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentPositionShipToLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentPositionShipToContact());
        $this->assertFalse(static::$document->nextDocumentPositionShipToContact());
        $this->assertFalse(static::$document->firstDocumentPositionShipToCommunication());
        $this->assertFalse(static::$document->nextDocumentPositionShipToCommunication());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToId());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToId());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToGlobalId());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToGlobalId());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToTaxRegistration());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToTaxRegistration());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToAddress());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToAddress());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToLegalOrganisation());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToLegalOrganisation());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToContact());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToContact());
        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToCommunication());
        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToCommunication());
        $this->assertFalse(static::$document->firstDocumentPositionPostingReference());
        $this->assertFalse(static::$document->nextDocumentPositionPostingReference());
    }

    public function testUnsupportedGettersReturnDefaultValues(): void
    {
        $this->assertSame(
            static::$document,
            static::$document->getDocumentDescription(
                $documentDescription
            )
        );
        $this->assertSame('', $documentDescription);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentLanguage(
                $documentLanguage
            )
        );
        $this->assertSame('', $documentLanguage);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentCompleteDate(
                $documentCompleteDate
            )
        );
        $this->assertNull($documentCompleteDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentTaxCurrency(
                $documentTaxCurrency
            )
        );
        $this->assertSame('', $documentTaxCurrency);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentIsCopy(
                $documentIsCopy
            )
        );
        $this->assertFalse($documentIsCopy);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentIsTest(
                $documentIsTest
            )
        );
        $this->assertFalse($documentIsTest);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBillingPeriod(
                $documentBillingPeriodStartDate,
                $documentBillingPeriodEndDate,
                $documentBillingPeriodDescription
            )
        );
        $this->assertNull($documentBillingPeriodStartDate);
        $this->assertNull($documentBillingPeriodEndDate);
        $this->assertSame('', $documentBillingPeriodDescription);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPostingReference(
                $documentPostingReferenceType,
                $documentPostingReferenceAccountId
            )
        );
        $this->assertSame('', $documentPostingReferenceType);
        $this->assertSame('', $documentPostingReferenceAccountId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerOrderReference(
                $documentSellerOrderReferenceReferenceNumber,
                $documentSellerOrderReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentSellerOrderReferenceReferenceNumber);
        $this->assertNull($documentSellerOrderReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentQuotationReference(
                $documentQuotationReferenceReferenceNumber,
                $documentQuotationReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentQuotationReferenceReferenceNumber);
        $this->assertNull($documentQuotationReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentAdditionalReference(
                $documentAdditionalReferenceReferenceNumber,
                $documentAdditionalReferenceReferenceDate,
                $documentAdditionalReferenceTypeCode,
                $documentAdditionalReferenceReferenceTypeCode,
                $documentAdditionalReferenceDescription,
                $documentAdditionalReferenceInvoiceSuiteAttachment
            )
        );
        $this->assertSame('', $documentAdditionalReferenceReferenceNumber);
        $this->assertNull($documentAdditionalReferenceReferenceDate);
        $this->assertSame('', $documentAdditionalReferenceTypeCode);
        $this->assertSame('', $documentAdditionalReferenceReferenceTypeCode);
        $this->assertSame('', $documentAdditionalReferenceDescription);
        $this->assertNull($documentAdditionalReferenceInvoiceSuiteAttachment);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProjectReference(
                $documentProjectReferenceReferenceNumber,
                $documentProjectReferenceName
            )
        );
        $this->assertSame('', $documentProjectReferenceReferenceNumber);
        $this->assertSame('', $documentProjectReferenceName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateCustomerOrderReference(
                $documentUltimateCustomerOrderReferenceReferenceNumber,
                $documentUltimateCustomerOrderReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentUltimateCustomerOrderReferenceReferenceNumber);
        $this->assertNull($documentUltimateCustomerOrderReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentDespatchAdviceReference(
                $documentDespatchAdviceReferenceReferenceNumber,
                $documentDespatchAdviceReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentDespatchAdviceReferenceReferenceNumber);
        $this->assertNull($documentDespatchAdviceReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentReceivingAdviceReference(
                $documentReceivingAdviceReferenceReferenceNumber,
                $documentReceivingAdviceReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentReceivingAdviceReferenceReferenceNumber);
        $this->assertNull($documentReceivingAdviceReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentDeliveryNoteReference(
                $documentDeliveryNoteReferenceReferenceNumber,
                $documentDeliveryNoteReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentDeliveryNoteReferenceReferenceNumber);
        $this->assertNull($documentDeliveryNoteReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSupplyChainEvent(
                $documentSupplyChainEventDate
            )
        );
        $this->assertNull($documentSupplyChainEventDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerReference(
                $documentBuyerReference
            )
        );
        $this->assertSame('', $documentBuyerReference);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentDeliveryTerms(
                $documentDeliveryTermsCode
            )
        );
        $this->assertSame('', $documentDeliveryTermsCode);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerId(
                $documentSellerId
            )
        );
        $this->assertSame('', $documentSellerId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerGlobalId(
                $documentSellerGlobalId,
                $documentSellerGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentSellerGlobalId);
        $this->assertSame('', $documentSellerGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerLegalOrganisation(
                $documentSellerLegalOrganisationType,
                $documentSellerLegalOrganisationId,
                $documentSellerLegalOrganisationName
            )
        );
        $this->assertSame('', $documentSellerLegalOrganisationType);
        $this->assertSame('', $documentSellerLegalOrganisationId);
        $this->assertSame('', $documentSellerLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerCommunication(
                $documentSellerCommunicationType,
                $documentSellerCommunicationUri
            )
        );
        $this->assertSame('', $documentSellerCommunicationType);
        $this->assertSame('', $documentSellerCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerId(
                $documentBuyerId
            )
        );
        $this->assertSame('', $documentBuyerId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerGlobalId(
                $documentBuyerGlobalId,
                $documentBuyerGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentBuyerGlobalId);
        $this->assertSame('', $documentBuyerGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerLegalOrganisation(
                $documentBuyerLegalOrganisationType,
                $documentBuyerLegalOrganisationId,
                $documentBuyerLegalOrganisationName
            )
        );
        $this->assertSame('', $documentBuyerLegalOrganisationType);
        $this->assertSame('', $documentBuyerLegalOrganisationId);
        $this->assertSame('', $documentBuyerLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerContact(
                $documentBuyerContactPersonName,
                $documentBuyerContactDepartmentName,
                $documentBuyerContactPhoneNumber,
                $documentBuyerContactFaxNumber,
                $documentBuyerContactEmailAddress
            )
        );
        $this->assertSame('', $documentBuyerContactPersonName);
        $this->assertSame('', $documentBuyerContactDepartmentName);
        $this->assertSame('', $documentBuyerContactPhoneNumber);
        $this->assertSame('', $documentBuyerContactFaxNumber);
        $this->assertSame('', $documentBuyerContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeId(
                $documentSellerTaxRepresentativeId
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeGlobalId(
                $documentSellerTaxRepresentativeGlobalId,
                $documentSellerTaxRepresentativeGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeGlobalId);
        $this->assertSame('', $documentSellerTaxRepresentativeGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeAddress(
                $documentSellerTaxRepresentativeAddressAddressLine1,
                $documentSellerTaxRepresentativeAddressAddressLine2,
                $documentSellerTaxRepresentativeAddressAddressLine3,
                $documentSellerTaxRepresentativeAddressPostcode,
                $documentSellerTaxRepresentativeAddressCity,
                $documentSellerTaxRepresentativeAddressCountryId,
                $documentSellerTaxRepresentativeAddressSubDivision
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeAddressAddressLine1);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressAddressLine2);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressAddressLine3);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressPostcode);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressCity);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressCountryId);
        $this->assertSame('', $documentSellerTaxRepresentativeAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeLegalOrganisation(
                $documentSellerTaxRepresentativeLegalOrganisationType,
                $documentSellerTaxRepresentativeLegalOrganisationId,
                $documentSellerTaxRepresentativeLegalOrganisationName
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeLegalOrganisationType);
        $this->assertSame('', $documentSellerTaxRepresentativeLegalOrganisationId);
        $this->assertSame('', $documentSellerTaxRepresentativeLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeContact(
                $documentSellerTaxRepresentativeContactPersonName,
                $documentSellerTaxRepresentativeContactDepartmentName,
                $documentSellerTaxRepresentativeContactPhoneNumber,
                $documentSellerTaxRepresentativeContactFaxNumber,
                $documentSellerTaxRepresentativeContactEmailAddress
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeContactPersonName);
        $this->assertSame('', $documentSellerTaxRepresentativeContactDepartmentName);
        $this->assertSame('', $documentSellerTaxRepresentativeContactPhoneNumber);
        $this->assertSame('', $documentSellerTaxRepresentativeContactFaxNumber);
        $this->assertSame('', $documentSellerTaxRepresentativeContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSellerTaxRepresentativeCommunication(
                $documentSellerTaxRepresentativeCommunicationType,
                $documentSellerTaxRepresentativeCommunicationUri
            )
        );
        $this->assertSame('', $documentSellerTaxRepresentativeCommunicationType);
        $this->assertSame('', $documentSellerTaxRepresentativeCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeName(
                $documentBuyerTaxRepresentativeName
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeId(
                $documentBuyerTaxRepresentativeId
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeGlobalId(
                $documentBuyerTaxRepresentativeGlobalId,
                $documentBuyerTaxRepresentativeGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeGlobalId);
        $this->assertSame('', $documentBuyerTaxRepresentativeGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeTaxRegistration(
                $documentBuyerTaxRepresentativeTaxRegistrationTaxRegistrationType,
                $documentBuyerTaxRepresentativeTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentBuyerTaxRepresentativeTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeAddress(
                $documentBuyerTaxRepresentativeAddressAddressLine1,
                $documentBuyerTaxRepresentativeAddressAddressLine2,
                $documentBuyerTaxRepresentativeAddressAddressLine3,
                $documentBuyerTaxRepresentativeAddressPostcode,
                $documentBuyerTaxRepresentativeAddressCity,
                $documentBuyerTaxRepresentativeAddressCountryId,
                $documentBuyerTaxRepresentativeAddressSubDivision
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressAddressLine1);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressAddressLine2);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressAddressLine3);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressPostcode);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressCity);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressCountryId);
        $this->assertSame('', $documentBuyerTaxRepresentativeAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeLegalOrganisation(
                $documentBuyerTaxRepresentativeLegalOrganisationType,
                $documentBuyerTaxRepresentativeLegalOrganisationId,
                $documentBuyerTaxRepresentativeLegalOrganisationName
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeLegalOrganisationType);
        $this->assertSame('', $documentBuyerTaxRepresentativeLegalOrganisationId);
        $this->assertSame('', $documentBuyerTaxRepresentativeLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeContact(
                $documentBuyerTaxRepresentativeContactPersonName,
                $documentBuyerTaxRepresentativeContactDepartmentName,
                $documentBuyerTaxRepresentativeContactPhoneNumber,
                $documentBuyerTaxRepresentativeContactFaxNumber,
                $documentBuyerTaxRepresentativeContactEmailAddress
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeContactPersonName);
        $this->assertSame('', $documentBuyerTaxRepresentativeContactDepartmentName);
        $this->assertSame('', $documentBuyerTaxRepresentativeContactPhoneNumber);
        $this->assertSame('', $documentBuyerTaxRepresentativeContactFaxNumber);
        $this->assertSame('', $documentBuyerTaxRepresentativeContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerTaxRepresentativeCommunication(
                $documentBuyerTaxRepresentativeCommunicationType,
                $documentBuyerTaxRepresentativeCommunicationUri
            )
        );
        $this->assertSame('', $documentBuyerTaxRepresentativeCommunicationType);
        $this->assertSame('', $documentBuyerTaxRepresentativeCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentName(
                $documentSalesAgentName
            )
        );
        $this->assertSame('', $documentSalesAgentName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentId(
                $documentSalesAgentId
            )
        );
        $this->assertSame('', $documentSalesAgentId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentGlobalId(
                $documentSalesAgentGlobalId,
                $documentSalesAgentGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentSalesAgentGlobalId);
        $this->assertSame('', $documentSalesAgentGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentTaxRegistration(
                $documentSalesAgentTaxRegistrationTaxRegistrationType,
                $documentSalesAgentTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentSalesAgentTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentSalesAgentTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentAddress(
                $documentSalesAgentAddressAddressLine1,
                $documentSalesAgentAddressAddressLine2,
                $documentSalesAgentAddressAddressLine3,
                $documentSalesAgentAddressPostcode,
                $documentSalesAgentAddressCity,
                $documentSalesAgentAddressCountryId,
                $documentSalesAgentAddressSubDivision
            )
        );
        $this->assertSame('', $documentSalesAgentAddressAddressLine1);
        $this->assertSame('', $documentSalesAgentAddressAddressLine2);
        $this->assertSame('', $documentSalesAgentAddressAddressLine3);
        $this->assertSame('', $documentSalesAgentAddressPostcode);
        $this->assertSame('', $documentSalesAgentAddressCity);
        $this->assertSame('', $documentSalesAgentAddressCountryId);
        $this->assertSame('', $documentSalesAgentAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentLegalOrganisation(
                $documentSalesAgentLegalOrganisationType,
                $documentSalesAgentLegalOrganisationId,
                $documentSalesAgentLegalOrganisationName
            )
        );
        $this->assertSame('', $documentSalesAgentLegalOrganisationType);
        $this->assertSame('', $documentSalesAgentLegalOrganisationId);
        $this->assertSame('', $documentSalesAgentLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentContact(
                $documentSalesAgentContactPersonName,
                $documentSalesAgentContactDepartmentName,
                $documentSalesAgentContactPhoneNumber,
                $documentSalesAgentContactFaxNumber,
                $documentSalesAgentContactEmailAddress
            )
        );
        $this->assertSame('', $documentSalesAgentContactPersonName);
        $this->assertSame('', $documentSalesAgentContactDepartmentName);
        $this->assertSame('', $documentSalesAgentContactPhoneNumber);
        $this->assertSame('', $documentSalesAgentContactFaxNumber);
        $this->assertSame('', $documentSalesAgentContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentSalesAgentCommunication(
                $documentSalesAgentCommunicationType,
                $documentSalesAgentCommunicationUri
            )
        );
        $this->assertSame('', $documentSalesAgentCommunicationType);
        $this->assertSame('', $documentSalesAgentCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentName(
                $documentBuyerAgentName
            )
        );
        $this->assertSame('', $documentBuyerAgentName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentId(
                $documentBuyerAgentId
            )
        );
        $this->assertSame('', $documentBuyerAgentId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentGlobalId(
                $documentBuyerAgentGlobalId,
                $documentBuyerAgentGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentBuyerAgentGlobalId);
        $this->assertSame('', $documentBuyerAgentGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentTaxRegistration(
                $documentBuyerAgentTaxRegistrationTaxRegistrationType,
                $documentBuyerAgentTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentBuyerAgentTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentBuyerAgentTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentAddress(
                $documentBuyerAgentAddressAddressLine1,
                $documentBuyerAgentAddressAddressLine2,
                $documentBuyerAgentAddressAddressLine3,
                $documentBuyerAgentAddressPostcode,
                $documentBuyerAgentAddressCity,
                $documentBuyerAgentAddressCountryId,
                $documentBuyerAgentAddressSubDivision
            )
        );
        $this->assertSame('', $documentBuyerAgentAddressAddressLine1);
        $this->assertSame('', $documentBuyerAgentAddressAddressLine2);
        $this->assertSame('', $documentBuyerAgentAddressAddressLine3);
        $this->assertSame('', $documentBuyerAgentAddressPostcode);
        $this->assertSame('', $documentBuyerAgentAddressCity);
        $this->assertSame('', $documentBuyerAgentAddressCountryId);
        $this->assertSame('', $documentBuyerAgentAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentLegalOrganisation(
                $documentBuyerAgentLegalOrganisationType,
                $documentBuyerAgentLegalOrganisationId,
                $documentBuyerAgentLegalOrganisationName
            )
        );
        $this->assertSame('', $documentBuyerAgentLegalOrganisationType);
        $this->assertSame('', $documentBuyerAgentLegalOrganisationId);
        $this->assertSame('', $documentBuyerAgentLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentContact(
                $documentBuyerAgentContactPersonName,
                $documentBuyerAgentContactDepartmentName,
                $documentBuyerAgentContactPhoneNumber,
                $documentBuyerAgentContactFaxNumber,
                $documentBuyerAgentContactEmailAddress
            )
        );
        $this->assertSame('', $documentBuyerAgentContactPersonName);
        $this->assertSame('', $documentBuyerAgentContactDepartmentName);
        $this->assertSame('', $documentBuyerAgentContactPhoneNumber);
        $this->assertSame('', $documentBuyerAgentContactFaxNumber);
        $this->assertSame('', $documentBuyerAgentContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentBuyerAgentCommunication(
                $documentBuyerAgentCommunicationType,
                $documentBuyerAgentCommunicationUri
            )
        );
        $this->assertSame('', $documentBuyerAgentCommunicationType);
        $this->assertSame('', $documentBuyerAgentCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserName(
                $documentProductEndUserName
            )
        );
        $this->assertSame('', $documentProductEndUserName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserId(
                $documentProductEndUserId
            )
        );
        $this->assertSame('', $documentProductEndUserId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserGlobalId(
                $documentProductEndUserGlobalId,
                $documentProductEndUserGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentProductEndUserGlobalId);
        $this->assertSame('', $documentProductEndUserGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserTaxRegistration(
                $documentProductEndUserTaxRegistrationTaxRegistrationType,
                $documentProductEndUserTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentProductEndUserTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentProductEndUserTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserAddress(
                $documentProductEndUserAddressAddressLine1,
                $documentProductEndUserAddressAddressLine2,
                $documentProductEndUserAddressAddressLine3,
                $documentProductEndUserAddressPostcode,
                $documentProductEndUserAddressCity,
                $documentProductEndUserAddressCountryId,
                $documentProductEndUserAddressSubDivision
            )
        );
        $this->assertSame('', $documentProductEndUserAddressAddressLine1);
        $this->assertSame('', $documentProductEndUserAddressAddressLine2);
        $this->assertSame('', $documentProductEndUserAddressAddressLine3);
        $this->assertSame('', $documentProductEndUserAddressPostcode);
        $this->assertSame('', $documentProductEndUserAddressCity);
        $this->assertSame('', $documentProductEndUserAddressCountryId);
        $this->assertSame('', $documentProductEndUserAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserLegalOrganisation(
                $documentProductEndUserLegalOrganisationType,
                $documentProductEndUserLegalOrganisationId,
                $documentProductEndUserLegalOrganisationName
            )
        );
        $this->assertSame('', $documentProductEndUserLegalOrganisationType);
        $this->assertSame('', $documentProductEndUserLegalOrganisationId);
        $this->assertSame('', $documentProductEndUserLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserContact(
                $documentProductEndUserContactPersonName,
                $documentProductEndUserContactDepartmentName,
                $documentProductEndUserContactPhoneNumber,
                $documentProductEndUserContactFaxNumber,
                $documentProductEndUserContactEmailAddress
            )
        );
        $this->assertSame('', $documentProductEndUserContactPersonName);
        $this->assertSame('', $documentProductEndUserContactDepartmentName);
        $this->assertSame('', $documentProductEndUserContactPhoneNumber);
        $this->assertSame('', $documentProductEndUserContactFaxNumber);
        $this->assertSame('', $documentProductEndUserContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentProductEndUserCommunication(
                $documentProductEndUserCommunicationType,
                $documentProductEndUserCommunicationUri
            )
        );
        $this->assertSame('', $documentProductEndUserCommunicationType);
        $this->assertSame('', $documentProductEndUserCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToName(
                $documentShipToName
            )
        );
        $this->assertSame('', $documentShipToName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToId(
                $documentShipToId
            )
        );
        $this->assertSame('', $documentShipToId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToGlobalId(
                $documentShipToGlobalId,
                $documentShipToGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentShipToGlobalId);
        $this->assertSame('', $documentShipToGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToTaxRegistration(
                $documentShipToTaxRegistrationTaxRegistrationType,
                $documentShipToTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentShipToTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentShipToTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToAddress(
                $documentShipToAddressAddressLine1,
                $documentShipToAddressAddressLine2,
                $documentShipToAddressAddressLine3,
                $documentShipToAddressPostcode,
                $documentShipToAddressCity,
                $documentShipToAddressCountryId,
                $documentShipToAddressSubDivision
            )
        );
        $this->assertSame('', $documentShipToAddressAddressLine1);
        $this->assertSame('', $documentShipToAddressAddressLine2);
        $this->assertSame('', $documentShipToAddressAddressLine3);
        $this->assertSame('', $documentShipToAddressPostcode);
        $this->assertSame('', $documentShipToAddressCity);
        $this->assertSame('', $documentShipToAddressCountryId);
        $this->assertSame('', $documentShipToAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToLegalOrganisation(
                $documentShipToLegalOrganisationType,
                $documentShipToLegalOrganisationId,
                $documentShipToLegalOrganisationName
            )
        );
        $this->assertSame('', $documentShipToLegalOrganisationType);
        $this->assertSame('', $documentShipToLegalOrganisationId);
        $this->assertSame('', $documentShipToLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToContact(
                $documentShipToContactPersonName,
                $documentShipToContactDepartmentName,
                $documentShipToContactPhoneNumber,
                $documentShipToContactFaxNumber,
                $documentShipToContactEmailAddress
            )
        );
        $this->assertSame('', $documentShipToContactPersonName);
        $this->assertSame('', $documentShipToContactDepartmentName);
        $this->assertSame('', $documentShipToContactPhoneNumber);
        $this->assertSame('', $documentShipToContactFaxNumber);
        $this->assertSame('', $documentShipToContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipToCommunication(
                $documentShipToCommunicationType,
                $documentShipToCommunicationUri
            )
        );
        $this->assertSame('', $documentShipToCommunicationType);
        $this->assertSame('', $documentShipToCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToName(
                $documentUltimateShipToName
            )
        );
        $this->assertSame('', $documentUltimateShipToName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToId(
                $documentUltimateShipToId
            )
        );
        $this->assertSame('', $documentUltimateShipToId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToGlobalId(
                $documentUltimateShipToGlobalId,
                $documentUltimateShipToGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentUltimateShipToGlobalId);
        $this->assertSame('', $documentUltimateShipToGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToTaxRegistration(
                $documentUltimateShipToTaxRegistrationTaxRegistrationType,
                $documentUltimateShipToTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentUltimateShipToTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentUltimateShipToTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToAddress(
                $documentUltimateShipToAddressAddressLine1,
                $documentUltimateShipToAddressAddressLine2,
                $documentUltimateShipToAddressAddressLine3,
                $documentUltimateShipToAddressPostcode,
                $documentUltimateShipToAddressCity,
                $documentUltimateShipToAddressCountryId,
                $documentUltimateShipToAddressSubDivision
            )
        );
        $this->assertSame('', $documentUltimateShipToAddressAddressLine1);
        $this->assertSame('', $documentUltimateShipToAddressAddressLine2);
        $this->assertSame('', $documentUltimateShipToAddressAddressLine3);
        $this->assertSame('', $documentUltimateShipToAddressPostcode);
        $this->assertSame('', $documentUltimateShipToAddressCity);
        $this->assertSame('', $documentUltimateShipToAddressCountryId);
        $this->assertSame('', $documentUltimateShipToAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToLegalOrganisation(
                $documentUltimateShipToLegalOrganisationType,
                $documentUltimateShipToLegalOrganisationId,
                $documentUltimateShipToLegalOrganisationName
            )
        );
        $this->assertSame('', $documentUltimateShipToLegalOrganisationType);
        $this->assertSame('', $documentUltimateShipToLegalOrganisationId);
        $this->assertSame('', $documentUltimateShipToLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToContact(
                $documentUltimateShipToContactPersonName,
                $documentUltimateShipToContactDepartmentName,
                $documentUltimateShipToContactPhoneNumber,
                $documentUltimateShipToContactFaxNumber,
                $documentUltimateShipToContactEmailAddress
            )
        );
        $this->assertSame('', $documentUltimateShipToContactPersonName);
        $this->assertSame('', $documentUltimateShipToContactDepartmentName);
        $this->assertSame('', $documentUltimateShipToContactPhoneNumber);
        $this->assertSame('', $documentUltimateShipToContactFaxNumber);
        $this->assertSame('', $documentUltimateShipToContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentUltimateShipToCommunication(
                $documentUltimateShipToCommunicationType,
                $documentUltimateShipToCommunicationUri
            )
        );
        $this->assertSame('', $documentUltimateShipToCommunicationType);
        $this->assertSame('', $documentUltimateShipToCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromName(
                $documentShipFromName
            )
        );
        $this->assertSame('', $documentShipFromName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromId(
                $documentShipFromId
            )
        );
        $this->assertSame('', $documentShipFromId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromGlobalId(
                $documentShipFromGlobalId,
                $documentShipFromGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentShipFromGlobalId);
        $this->assertSame('', $documentShipFromGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromTaxRegistration(
                $documentShipFromTaxRegistrationTaxRegistrationType,
                $documentShipFromTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentShipFromTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentShipFromTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromAddress(
                $documentShipFromAddressAddressLine1,
                $documentShipFromAddressAddressLine2,
                $documentShipFromAddressAddressLine3,
                $documentShipFromAddressPostcode,
                $documentShipFromAddressCity,
                $documentShipFromAddressCountryId,
                $documentShipFromAddressSubDivision
            )
        );
        $this->assertSame('', $documentShipFromAddressAddressLine1);
        $this->assertSame('', $documentShipFromAddressAddressLine2);
        $this->assertSame('', $documentShipFromAddressAddressLine3);
        $this->assertSame('', $documentShipFromAddressPostcode);
        $this->assertSame('', $documentShipFromAddressCity);
        $this->assertSame('', $documentShipFromAddressCountryId);
        $this->assertSame('', $documentShipFromAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromLegalOrganisation(
                $documentShipFromLegalOrganisationType,
                $documentShipFromLegalOrganisationId,
                $documentShipFromLegalOrganisationName
            )
        );
        $this->assertSame('', $documentShipFromLegalOrganisationType);
        $this->assertSame('', $documentShipFromLegalOrganisationId);
        $this->assertSame('', $documentShipFromLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromContact(
                $documentShipFromContactPersonName,
                $documentShipFromContactDepartmentName,
                $documentShipFromContactPhoneNumber,
                $documentShipFromContactFaxNumber,
                $documentShipFromContactEmailAddress
            )
        );
        $this->assertSame('', $documentShipFromContactPersonName);
        $this->assertSame('', $documentShipFromContactDepartmentName);
        $this->assertSame('', $documentShipFromContactPhoneNumber);
        $this->assertSame('', $documentShipFromContactFaxNumber);
        $this->assertSame('', $documentShipFromContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentShipFromCommunication(
                $documentShipFromCommunicationType,
                $documentShipFromCommunicationUri
            )
        );
        $this->assertSame('', $documentShipFromCommunicationType);
        $this->assertSame('', $documentShipFromCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerName(
                $documentInvoicerName
            )
        );
        $this->assertSame('', $documentInvoicerName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerId(
                $documentInvoicerId
            )
        );
        $this->assertSame('', $documentInvoicerId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerGlobalId(
                $documentInvoicerGlobalId,
                $documentInvoicerGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentInvoicerGlobalId);
        $this->assertSame('', $documentInvoicerGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerTaxRegistration(
                $documentInvoicerTaxRegistrationTaxRegistrationType,
                $documentInvoicerTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentInvoicerTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentInvoicerTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerAddress(
                $documentInvoicerAddressAddressLine1,
                $documentInvoicerAddressAddressLine2,
                $documentInvoicerAddressAddressLine3,
                $documentInvoicerAddressPostcode,
                $documentInvoicerAddressCity,
                $documentInvoicerAddressCountryId,
                $documentInvoicerAddressSubDivision
            )
        );
        $this->assertSame('', $documentInvoicerAddressAddressLine1);
        $this->assertSame('', $documentInvoicerAddressAddressLine2);
        $this->assertSame('', $documentInvoicerAddressAddressLine3);
        $this->assertSame('', $documentInvoicerAddressPostcode);
        $this->assertSame('', $documentInvoicerAddressCity);
        $this->assertSame('', $documentInvoicerAddressCountryId);
        $this->assertSame('', $documentInvoicerAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerLegalOrganisation(
                $documentInvoicerLegalOrganisationType,
                $documentInvoicerLegalOrganisationId,
                $documentInvoicerLegalOrganisationName
            )
        );
        $this->assertSame('', $documentInvoicerLegalOrganisationType);
        $this->assertSame('', $documentInvoicerLegalOrganisationId);
        $this->assertSame('', $documentInvoicerLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerContact(
                $documentInvoicerContactPersonName,
                $documentInvoicerContactDepartmentName,
                $documentInvoicerContactPhoneNumber,
                $documentInvoicerContactFaxNumber,
                $documentInvoicerContactEmailAddress
            )
        );
        $this->assertSame('', $documentInvoicerContactPersonName);
        $this->assertSame('', $documentInvoicerContactDepartmentName);
        $this->assertSame('', $documentInvoicerContactPhoneNumber);
        $this->assertSame('', $documentInvoicerContactFaxNumber);
        $this->assertSame('', $documentInvoicerContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoicerCommunication(
                $documentInvoicerCommunicationType,
                $documentInvoicerCommunicationUri
            )
        );
        $this->assertSame('', $documentInvoicerCommunicationType);
        $this->assertSame('', $documentInvoicerCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeName(
                $documentInvoiceeName
            )
        );
        $this->assertSame('', $documentInvoiceeName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeId(
                $documentInvoiceeId
            )
        );
        $this->assertSame('', $documentInvoiceeId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeGlobalId(
                $documentInvoiceeGlobalId,
                $documentInvoiceeGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentInvoiceeGlobalId);
        $this->assertSame('', $documentInvoiceeGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeTaxRegistration(
                $documentInvoiceeTaxRegistrationTaxRegistrationType,
                $documentInvoiceeTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentInvoiceeTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentInvoiceeTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeAddress(
                $documentInvoiceeAddressAddressLine1,
                $documentInvoiceeAddressAddressLine2,
                $documentInvoiceeAddressAddressLine3,
                $documentInvoiceeAddressPostcode,
                $documentInvoiceeAddressCity,
                $documentInvoiceeAddressCountryId,
                $documentInvoiceeAddressSubDivision
            )
        );
        $this->assertSame('', $documentInvoiceeAddressAddressLine1);
        $this->assertSame('', $documentInvoiceeAddressAddressLine2);
        $this->assertSame('', $documentInvoiceeAddressAddressLine3);
        $this->assertSame('', $documentInvoiceeAddressPostcode);
        $this->assertSame('', $documentInvoiceeAddressCity);
        $this->assertSame('', $documentInvoiceeAddressCountryId);
        $this->assertSame('', $documentInvoiceeAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeLegalOrganisation(
                $documentInvoiceeLegalOrganisationType,
                $documentInvoiceeLegalOrganisationId,
                $documentInvoiceeLegalOrganisationName
            )
        );
        $this->assertSame('', $documentInvoiceeLegalOrganisationType);
        $this->assertSame('', $documentInvoiceeLegalOrganisationId);
        $this->assertSame('', $documentInvoiceeLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeContact(
                $documentInvoiceeContactPersonName,
                $documentInvoiceeContactDepartmentName,
                $documentInvoiceeContactPhoneNumber,
                $documentInvoiceeContactFaxNumber,
                $documentInvoiceeContactEmailAddress
            )
        );
        $this->assertSame('', $documentInvoiceeContactPersonName);
        $this->assertSame('', $documentInvoiceeContactDepartmentName);
        $this->assertSame('', $documentInvoiceeContactPhoneNumber);
        $this->assertSame('', $documentInvoiceeContactFaxNumber);
        $this->assertSame('', $documentInvoiceeContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentInvoiceeCommunication(
                $documentInvoiceeCommunicationType,
                $documentInvoiceeCommunicationUri
            )
        );
        $this->assertSame('', $documentInvoiceeCommunicationType);
        $this->assertSame('', $documentInvoiceeCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeName(
                $documentPayeeName
            )
        );
        $this->assertSame('', $documentPayeeName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeId(
                $documentPayeeId
            )
        );
        $this->assertSame('', $documentPayeeId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeGlobalId(
                $documentPayeeGlobalId,
                $documentPayeeGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentPayeeGlobalId);
        $this->assertSame('', $documentPayeeGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeTaxRegistration(
                $documentPayeeTaxRegistrationTaxRegistrationType,
                $documentPayeeTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentPayeeTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentPayeeTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeAddress(
                $documentPayeeAddressAddressLine1,
                $documentPayeeAddressAddressLine2,
                $documentPayeeAddressAddressLine3,
                $documentPayeeAddressPostcode,
                $documentPayeeAddressCity,
                $documentPayeeAddressCountryId,
                $documentPayeeAddressSubDivision
            )
        );
        $this->assertSame('', $documentPayeeAddressAddressLine1);
        $this->assertSame('', $documentPayeeAddressAddressLine2);
        $this->assertSame('', $documentPayeeAddressAddressLine3);
        $this->assertSame('', $documentPayeeAddressPostcode);
        $this->assertSame('', $documentPayeeAddressCity);
        $this->assertSame('', $documentPayeeAddressCountryId);
        $this->assertSame('', $documentPayeeAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeLegalOrganisation(
                $documentPayeeLegalOrganisationType,
                $documentPayeeLegalOrganisationId,
                $documentPayeeLegalOrganisationName
            )
        );
        $this->assertSame('', $documentPayeeLegalOrganisationType);
        $this->assertSame('', $documentPayeeLegalOrganisationId);
        $this->assertSame('', $documentPayeeLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeContact(
                $documentPayeeContactPersonName,
                $documentPayeeContactDepartmentName,
                $documentPayeeContactPhoneNumber,
                $documentPayeeContactFaxNumber,
                $documentPayeeContactEmailAddress
            )
        );
        $this->assertSame('', $documentPayeeContactPersonName);
        $this->assertSame('', $documentPayeeContactDepartmentName);
        $this->assertSame('', $documentPayeeContactPhoneNumber);
        $this->assertSame('', $documentPayeeContactFaxNumber);
        $this->assertSame('', $documentPayeeContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayeeCommunication(
                $documentPayeeCommunicationType,
                $documentPayeeCommunicationUri
            )
        );
        $this->assertSame('', $documentPayeeCommunicationType);
        $this->assertSame('', $documentPayeeCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerName(
                $documentPayerName
            )
        );
        $this->assertSame('', $documentPayerName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerId(
                $documentPayerId
            )
        );
        $this->assertSame('', $documentPayerId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerGlobalId(
                $documentPayerGlobalId,
                $documentPayerGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentPayerGlobalId);
        $this->assertSame('', $documentPayerGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerTaxRegistration(
                $documentPayerTaxRegistrationTaxRegistrationType,
                $documentPayerTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentPayerTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentPayerTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerAddress(
                $documentPayerAddressAddressLine1,
                $documentPayerAddressAddressLine2,
                $documentPayerAddressAddressLine3,
                $documentPayerAddressPostcode,
                $documentPayerAddressCity,
                $documentPayerAddressCountryId,
                $documentPayerAddressSubDivision
            )
        );
        $this->assertSame('', $documentPayerAddressAddressLine1);
        $this->assertSame('', $documentPayerAddressAddressLine2);
        $this->assertSame('', $documentPayerAddressAddressLine3);
        $this->assertSame('', $documentPayerAddressPostcode);
        $this->assertSame('', $documentPayerAddressCity);
        $this->assertSame('', $documentPayerAddressCountryId);
        $this->assertSame('', $documentPayerAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerLegalOrganisation(
                $documentPayerLegalOrganisationType,
                $documentPayerLegalOrganisationId,
                $documentPayerLegalOrganisationName
            )
        );
        $this->assertSame('', $documentPayerLegalOrganisationType);
        $this->assertSame('', $documentPayerLegalOrganisationId);
        $this->assertSame('', $documentPayerLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerContact(
                $documentPayerContactPersonName,
                $documentPayerContactDepartmentName,
                $documentPayerContactPhoneNumber,
                $documentPayerContactFaxNumber,
                $documentPayerContactEmailAddress
            )
        );
        $this->assertSame('', $documentPayerContactPersonName);
        $this->assertSame('', $documentPayerContactDepartmentName);
        $this->assertSame('', $documentPayerContactPhoneNumber);
        $this->assertSame('', $documentPayerContactFaxNumber);
        $this->assertSame('', $documentPayerContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPayerCommunication(
                $documentPayerCommunicationType,
                $documentPayerCommunicationUri
            )
        );
        $this->assertSame('', $documentPayerCommunicationType);
        $this->assertSame('', $documentPayerCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPaymentCreditorReferenceID(
                $documentPaymentCreditorReferenceID
            )
        );
        $this->assertSame('', $documentPaymentCreditorReferenceID);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentAllowanceCharge(
                $documentAllowanceChargeChargeIndicator,
                $documentAllowanceChargeAllowanceChargeAmount,
                $documentAllowanceChargeAllowanceChargeBaseAmount,
                $documentAllowanceChargeTaxCategory,
                $documentAllowanceChargeTaxType,
                $documentAllowanceChargeTaxPercent,
                $documentAllowanceChargeAllowanceChargeReason,
                $documentAllowanceChargeAllowanceChargeReasonCode,
                $documentAllowanceChargeAllowanceChargePercent
            )
        );
        $this->assertFalse($documentAllowanceChargeChargeIndicator);
        $this->assertSame(0.0, $documentAllowanceChargeAllowanceChargeAmount);
        $this->assertSame(0.0, $documentAllowanceChargeAllowanceChargeBaseAmount);
        $this->assertSame('', $documentAllowanceChargeTaxCategory);
        $this->assertSame('', $documentAllowanceChargeTaxType);
        $this->assertSame(0.0, $documentAllowanceChargeTaxPercent);
        $this->assertSame('', $documentAllowanceChargeAllowanceChargeReason);
        $this->assertSame('', $documentAllowanceChargeAllowanceChargeReasonCode);
        $this->assertSame(0.0, $documentAllowanceChargeAllowanceChargePercent);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentLogisticServiceCharge(
                $documentLogisticServiceChargeChargeAmount,
                $documentLogisticServiceChargeDescription,
                $documentLogisticServiceChargeTaxCategory,
                $documentLogisticServiceChargeTaxType,
                $documentLogisticServiceChargeTaxPercent
            )
        );
        $this->assertSame(0.0, $documentLogisticServiceChargeChargeAmount);
        $this->assertSame('', $documentLogisticServiceChargeDescription);
        $this->assertSame('', $documentLogisticServiceChargeTaxCategory);
        $this->assertSame('', $documentLogisticServiceChargeTaxType);
        $this->assertSame(0.0, $documentLogisticServiceChargeTaxPercent);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionNote(
                $documentPositionNoteContent,
                $documentPositionNoteContentCode,
                $documentPositionNoteSubjectCode
            )
        );
        $this->assertSame('', $documentPositionNoteContent);
        $this->assertSame('', $documentPositionNoteContentCode);
        $this->assertSame('', $documentPositionNoteSubjectCode);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionProductCharacteristic(
                $documentPositionProductCharacteristicProductCharacteristicDescription,
                $documentPositionProductCharacteristicProductCharacteristicValue,
                $documentPositionProductCharacteristicProductCharacteristicType,
                $documentPositionProductCharacteristicProductCharacteristicMeasureValue,
                $documentPositionProductCharacteristicProductCharacteristicMeasureUnit
            )
        );
        $this->assertSame('', $documentPositionProductCharacteristicProductCharacteristicDescription);
        $this->assertSame('', $documentPositionProductCharacteristicProductCharacteristicValue);
        $this->assertSame('', $documentPositionProductCharacteristicProductCharacteristicType);
        $this->assertSame(0.0, $documentPositionProductCharacteristicProductCharacteristicMeasureValue);
        $this->assertSame('', $documentPositionProductCharacteristicProductCharacteristicMeasureUnit);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionProductClassification(
                $documentPositionProductClassificationProductClassificationCode,
                $documentPositionProductClassificationProductClassificationListId,
                $documentPositionProductClassificationProductClassificationListVersionId,
                $documentPositionProductClassificationProductClassificationCodeClassname
            )
        );
        $this->assertSame('', $documentPositionProductClassificationProductClassificationCode);
        $this->assertSame('', $documentPositionProductClassificationProductClassificationListId);
        $this->assertSame('', $documentPositionProductClassificationProductClassificationListVersionId);
        $this->assertSame('', $documentPositionProductClassificationProductClassificationCodeClassname);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionReferencedProduct(
                $documentPositionReferencedProductProductId,
                $documentPositionReferencedProductProductName,
                $documentPositionReferencedProductProductDescription,
                $documentPositionReferencedProductProductSellerId,
                $documentPositionReferencedProductProductBuyerId,
                $documentPositionReferencedProductProductGlobalId,
                $documentPositionReferencedProductProductGlobalIdType,
                $documentPositionReferencedProductProductIndustryId,
                $documentPositionReferencedProductProductUnitQuantity,
                $documentPositionReferencedProductProductUnitQuantityUnit
            )
        );
        $this->assertSame('', $documentPositionReferencedProductProductId);
        $this->assertSame('', $documentPositionReferencedProductProductName);
        $this->assertSame('', $documentPositionReferencedProductProductDescription);
        $this->assertSame('', $documentPositionReferencedProductProductSellerId);
        $this->assertSame('', $documentPositionReferencedProductProductBuyerId);
        $this->assertSame('', $documentPositionReferencedProductProductGlobalId);
        $this->assertSame('', $documentPositionReferencedProductProductGlobalIdType);
        $this->assertSame('', $documentPositionReferencedProductProductIndustryId);
        $this->assertSame(0.0, $documentPositionReferencedProductProductUnitQuantity);
        $this->assertSame('', $documentPositionReferencedProductProductUnitQuantityUnit);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionSellerOrderReference(
                $documentPositionSellerOrderReferenceReferenceNumber,
                $documentPositionSellerOrderReferenceReferenceLineNumber,
                $documentPositionSellerOrderReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionSellerOrderReferenceReferenceNumber);
        $this->assertSame('', $documentPositionSellerOrderReferenceReferenceLineNumber);
        $this->assertNull($documentPositionSellerOrderReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionBuyerOrderReference(
                $documentPositionBuyerOrderReferenceReferenceNumber,
                $documentPositionBuyerOrderReferenceReferenceLineNumber,
                $documentPositionBuyerOrderReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionBuyerOrderReferenceReferenceNumber);
        $this->assertSame('', $documentPositionBuyerOrderReferenceReferenceLineNumber);
        $this->assertNull($documentPositionBuyerOrderReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionQuotationReference(
                $documentPositionQuotationReferenceReferenceNumber,
                $documentPositionQuotationReferenceReferenceLineNumber,
                $documentPositionQuotationReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionQuotationReferenceReferenceNumber);
        $this->assertSame('', $documentPositionQuotationReferenceReferenceLineNumber);
        $this->assertNull($documentPositionQuotationReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionContractReference(
                $documentPositionContractReferenceReferenceNumber,
                $documentPositionContractReferenceReferenceLineNumber,
                $documentPositionContractReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionContractReferenceReferenceNumber);
        $this->assertSame('', $documentPositionContractReferenceReferenceLineNumber);
        $this->assertNull($documentPositionContractReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionAdditionalReference(
                $documentPositionAdditionalReferenceReferenceNumber,
                $documentPositionAdditionalReferenceReferenceLineNumber,
                $documentPositionAdditionalReferenceReferenceDate,
                $documentPositionAdditionalReferenceTypeCode,
                $documentPositionAdditionalReferenceReferenceTypeCode,
                $documentPositionAdditionalReferenceDescription,
                $documentPositionAdditionalReferenceInvoiceSuiteAttachment
            )
        );
        $this->assertSame('', $documentPositionAdditionalReferenceReferenceNumber);
        $this->assertSame('', $documentPositionAdditionalReferenceReferenceLineNumber);
        $this->assertNull($documentPositionAdditionalReferenceReferenceDate);
        $this->assertSame('', $documentPositionAdditionalReferenceTypeCode);
        $this->assertSame('', $documentPositionAdditionalReferenceReferenceTypeCode);
        $this->assertSame('', $documentPositionAdditionalReferenceDescription);
        $this->assertNull($documentPositionAdditionalReferenceInvoiceSuiteAttachment);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateCustomerOrderReference(
                $documentPositionUltimateCustomerOrderReferenceReferenceNumber,
                $documentPositionUltimateCustomerOrderReferenceReferenceLineNumber,
                $documentPositionUltimateCustomerOrderReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionUltimateCustomerOrderReferenceReferenceNumber);
        $this->assertSame('', $documentPositionUltimateCustomerOrderReferenceReferenceLineNumber);
        $this->assertNull($documentPositionUltimateCustomerOrderReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionDespatchAdviceReference(
                $documentPositionDespatchAdviceReferenceReferenceNumber,
                $documentPositionDespatchAdviceReferenceReferenceLineNumber,
                $documentPositionDespatchAdviceReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionDespatchAdviceReferenceReferenceNumber);
        $this->assertSame('', $documentPositionDespatchAdviceReferenceReferenceLineNumber);
        $this->assertNull($documentPositionDespatchAdviceReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionReceivingAdviceReference(
                $documentPositionReceivingAdviceReferenceReferenceNumber,
                $documentPositionReceivingAdviceReferenceReferenceLineNumber,
                $documentPositionReceivingAdviceReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionReceivingAdviceReferenceReferenceNumber);
        $this->assertSame('', $documentPositionReceivingAdviceReferenceReferenceLineNumber);
        $this->assertNull($documentPositionReceivingAdviceReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionDeliveryNoteReference(
                $documentPositionDeliveryNoteReferenceReferenceNumber,
                $documentPositionDeliveryNoteReferenceReferenceLineNumber,
                $documentPositionDeliveryNoteReferenceReferenceDate
            )
        );
        $this->assertSame('', $documentPositionDeliveryNoteReferenceReferenceNumber);
        $this->assertSame('', $documentPositionDeliveryNoteReferenceReferenceLineNumber);
        $this->assertNull($documentPositionDeliveryNoteReferenceReferenceDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionInvoiceReference(
                $documentPositionInvoiceReferenceReferenceNumber,
                $documentPositionInvoiceReferenceReferenceLineNumber,
                $documentPositionInvoiceReferenceReferenceDate,
                $documentPositionInvoiceReferenceTypeCode
            )
        );
        $this->assertSame('', $documentPositionInvoiceReferenceReferenceNumber);
        $this->assertSame('', $documentPositionInvoiceReferenceReferenceLineNumber);
        $this->assertNull($documentPositionInvoiceReferenceReferenceDate);
        $this->assertSame('', $documentPositionInvoiceReferenceTypeCode);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionAdditionalObjectReference(
                $documentPositionAdditionalObjectReferenceReferenceNumber,
                $documentPositionAdditionalObjectReferenceTypeCode,
                $documentPositionAdditionalObjectReferenceReferenceTypeCode
            )
        );
        $this->assertSame('', $documentPositionAdditionalObjectReferenceReferenceNumber);
        $this->assertSame('', $documentPositionAdditionalObjectReferenceTypeCode);
        $this->assertSame('', $documentPositionAdditionalObjectReferenceReferenceTypeCode);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionGrossPrice(
                $documentPositionGrossPrice,
                $documentPositionGrossPriceGrossPriceBasisQuantity,
                $documentPositionGrossPriceGrossPriceBasisQuantityUnit
            )
        );
        $this->assertSame(0.0, $documentPositionGrossPrice);
        $this->assertSame(0.0, $documentPositionGrossPriceGrossPriceBasisQuantity);
        $this->assertSame('', $documentPositionGrossPriceGrossPriceBasisQuantityUnit);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionGrossPriceAllowanceCharge(
                $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeAmount,
                $documentPositionGrossPriceAllowanceChargeIsCharge,
                $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargePercent,
                $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeBasisAmount,
                $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeReason,
                $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeReasonCode
            )
        );
        $this->assertSame(0.0, $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeAmount);
        $this->assertFalse($documentPositionGrossPriceAllowanceChargeIsCharge);
        $this->assertSame(0.0, $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargePercent);
        $this->assertSame(0.0, $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeBasisAmount);
        $this->assertSame('', $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeReason);
        $this->assertSame('', $documentPositionGrossPriceAllowanceChargeGrossPriceAllowanceChargeReasonCode);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToName(
                $documentPositionShipToName
            )
        );
        $this->assertSame('', $documentPositionShipToName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToId(
                $documentPositionShipToId
            )
        );
        $this->assertSame('', $documentPositionShipToId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToGlobalId(
                $documentPositionShipToGlobalId,
                $documentPositionShipToGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentPositionShipToGlobalId);
        $this->assertSame('', $documentPositionShipToGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToTaxRegistration(
                $documentPositionShipToTaxRegistrationTaxRegistrationType,
                $documentPositionShipToTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentPositionShipToTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentPositionShipToTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToAddress(
                $documentPositionShipToAddressAddressLine1,
                $documentPositionShipToAddressAddressLine2,
                $documentPositionShipToAddressAddressLine3,
                $documentPositionShipToAddressPostcode,
                $documentPositionShipToAddressCity,
                $documentPositionShipToAddressCountryId,
                $documentPositionShipToAddressSubDivision
            )
        );
        $this->assertSame('', $documentPositionShipToAddressAddressLine1);
        $this->assertSame('', $documentPositionShipToAddressAddressLine2);
        $this->assertSame('', $documentPositionShipToAddressAddressLine3);
        $this->assertSame('', $documentPositionShipToAddressPostcode);
        $this->assertSame('', $documentPositionShipToAddressCity);
        $this->assertSame('', $documentPositionShipToAddressCountryId);
        $this->assertSame('', $documentPositionShipToAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToLegalOrganisation(
                $documentPositionShipToLegalOrganisationType,
                $documentPositionShipToLegalOrganisationId,
                $documentPositionShipToLegalOrganisationName
            )
        );
        $this->assertSame('', $documentPositionShipToLegalOrganisationType);
        $this->assertSame('', $documentPositionShipToLegalOrganisationId);
        $this->assertSame('', $documentPositionShipToLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToContact(
                $documentPositionShipToContactPersonName,
                $documentPositionShipToContactDepartmentName,
                $documentPositionShipToContactPhoneNumber,
                $documentPositionShipToContactFaxNumber,
                $documentPositionShipToContactEmailAddress
            )
        );
        $this->assertSame('', $documentPositionShipToContactPersonName);
        $this->assertSame('', $documentPositionShipToContactDepartmentName);
        $this->assertSame('', $documentPositionShipToContactPhoneNumber);
        $this->assertSame('', $documentPositionShipToContactFaxNumber);
        $this->assertSame('', $documentPositionShipToContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionShipToCommunication(
                $documentPositionShipToCommunicationType,
                $documentPositionShipToCommunicationUri
            )
        );
        $this->assertSame('', $documentPositionShipToCommunicationType);
        $this->assertSame('', $documentPositionShipToCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToName(
                $documentPositionUltimateShipToName
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToId(
                $documentPositionUltimateShipToId
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToGlobalId(
                $documentPositionUltimateShipToGlobalId,
                $documentPositionUltimateShipToGlobalIdGlobalIdType
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToGlobalId);
        $this->assertSame('', $documentPositionUltimateShipToGlobalIdGlobalIdType);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToTaxRegistration(
                $documentPositionUltimateShipToTaxRegistrationTaxRegistrationType,
                $documentPositionUltimateShipToTaxRegistrationTaxRegistrationId
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToTaxRegistrationTaxRegistrationType);
        $this->assertSame('', $documentPositionUltimateShipToTaxRegistrationTaxRegistrationId);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToAddress(
                $documentPositionUltimateShipToAddressAddressLine1,
                $documentPositionUltimateShipToAddressAddressLine2,
                $documentPositionUltimateShipToAddressAddressLine3,
                $documentPositionUltimateShipToAddressPostcode,
                $documentPositionUltimateShipToAddressCity,
                $documentPositionUltimateShipToAddressCountryId,
                $documentPositionUltimateShipToAddressSubDivision
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToAddressAddressLine1);
        $this->assertSame('', $documentPositionUltimateShipToAddressAddressLine2);
        $this->assertSame('', $documentPositionUltimateShipToAddressAddressLine3);
        $this->assertSame('', $documentPositionUltimateShipToAddressPostcode);
        $this->assertSame('', $documentPositionUltimateShipToAddressCity);
        $this->assertSame('', $documentPositionUltimateShipToAddressCountryId);
        $this->assertSame('', $documentPositionUltimateShipToAddressSubDivision);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToLegalOrganisation(
                $documentPositionUltimateShipToLegalOrganisationType,
                $documentPositionUltimateShipToLegalOrganisationId,
                $documentPositionUltimateShipToLegalOrganisationName
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToLegalOrganisationType);
        $this->assertSame('', $documentPositionUltimateShipToLegalOrganisationId);
        $this->assertSame('', $documentPositionUltimateShipToLegalOrganisationName);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToContact(
                $documentPositionUltimateShipToContactPersonName,
                $documentPositionUltimateShipToContactDepartmentName,
                $documentPositionUltimateShipToContactPhoneNumber,
                $documentPositionUltimateShipToContactFaxNumber,
                $documentPositionUltimateShipToContactEmailAddress
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToContactPersonName);
        $this->assertSame('', $documentPositionUltimateShipToContactDepartmentName);
        $this->assertSame('', $documentPositionUltimateShipToContactPhoneNumber);
        $this->assertSame('', $documentPositionUltimateShipToContactFaxNumber);
        $this->assertSame('', $documentPositionUltimateShipToContactEmailAddress);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionUltimateShipToCommunication(
                $documentPositionUltimateShipToCommunicationType,
                $documentPositionUltimateShipToCommunicationUri
            )
        );
        $this->assertSame('', $documentPositionUltimateShipToCommunicationType);
        $this->assertSame('', $documentPositionUltimateShipToCommunicationUri);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionSupplyChainEvent(
                $documentPositionSupplyChainEventDate
            )
        );
        $this->assertNull($documentPositionSupplyChainEventDate);

        $this->assertSame(
            static::$document,
            static::$document->getDocumentPositionPostingReference(
                $documentPositionPostingReferenceType,
                $documentPositionPostingReferenceAccountId
            )
        );
        $this->assertSame('', $documentPositionPostingReferenceType);
        $this->assertSame('', $documentPositionPostingReferenceAccountId);
    }
}
