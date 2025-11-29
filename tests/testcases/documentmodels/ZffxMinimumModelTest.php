<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\models\zffxminimum\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\models\zffxminimum\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxminimum\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradePartyType;
use horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxminimum\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\models\zffxminimum\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\DateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxMinimumModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\qdt\CountryIDType.
     */
    public function testModelsZffxminimumQdtCountryIDType(): void
    {
        $model = new CountryIDType();

        $this->assertInstanceOf(CountryIDType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\qdt\CurrencyCodeType.
     */
    public function testModelsZffxminimumQdtCurrencyCodeType(): void
    {
        $model = new CurrencyCodeType();

        $this->assertInstanceOf(CurrencyCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\qdt\DocumentCodeType.
     */
    public function testModelsZffxminimumQdtDocumentCodeType(): void
    {
        $model = new DocumentCodeType();

        $this->assertInstanceOf(DocumentCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\DocumentContextParameterType.
     */
    public function testModelsZffxminimumRamDocumentContextParameterType(): void
    {
        $model = new DocumentContextParameterType();

        $this->assertInstanceOf(DocumentContextParameterType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxminimumRamExchangedDocumentContextType(): void
    {
        $model = new ExchangedDocumentContextType();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $model);

        // Property BusinessProcessSpecifiedDocumentContextParameter

        $model->unsetBusinessProcessSpecifiedDocumentContextParameter();

        $this->assertNull($model->getBusinessProcessSpecifiedDocumentContextParameter());

        $createdBusinessProcessSpecifiedDocumentContextParameter = $model->getBusinessProcessSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $createdBusinessProcessSpecifiedDocumentContextParameter);
        $this->assertSame($createdBusinessProcessSpecifiedDocumentContextParameter, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        // Property GuidelineSpecifiedDocumentContextParameter

        $model->unsetGuidelineSpecifiedDocumentContextParameter();

        $this->assertNull($model->getGuidelineSpecifiedDocumentContextParameter());

        $createdGuidelineSpecifiedDocumentContextParameter = $model->getGuidelineSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $createdGuidelineSpecifiedDocumentContextParameter);
        $this->assertSame($createdGuidelineSpecifiedDocumentContextParameter, $model->getGuidelineSpecifiedDocumentContextParameter());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\ExchangedDocumentType.
     */
    public function testModelsZffxminimumRamExchangedDocumentType(): void
    {
        $model = new ExchangedDocumentType();

        $this->assertInstanceOf(ExchangedDocumentType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property IssueDateTime

        $testValue = new DateTimeType();
        $model->setIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getIssueDateTime());

        $model->unsetIssueDateTime();

        $this->assertNull($model->getIssueDateTime());

        $createdIssueDateTime = $model->getIssueDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdIssueDateTime);
        $this->assertSame($createdIssueDateTime, $model->getIssueDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeAgreementType.
     */
    public function testModelsZffxminimumRamHeaderTradeAgreementType(): void
    {
        $model = new HeaderTradeAgreementType();

        $this->assertInstanceOf(HeaderTradeAgreementType::class, $model);

        // Property BuyerReference

        $testValue = new TextType();
        $model->setBuyerReference($testValue);

        $this->assertEquals($testValue, $model->getBuyerReference());

        $model->unsetBuyerReference();

        $this->assertNull($model->getBuyerReference());

        $createdBuyerReference = $model->getBuyerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $createdBuyerReference);
        $this->assertSame($createdBuyerReference, $model->getBuyerReference());

        // Property SellerTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTradeParty());

        $model->unsetSellerTradeParty();

        $this->assertNull($model->getSellerTradeParty());

        $createdSellerTradeParty = $model->getSellerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdSellerTradeParty);
        $this->assertSame($createdSellerTradeParty, $model->getSellerTradeParty());

        // Property BuyerTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerTradeParty());

        $model->unsetBuyerTradeParty();

        $this->assertNull($model->getBuyerTradeParty());

        $createdBuyerTradeParty = $model->getBuyerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdBuyerTradeParty);
        $this->assertSame($createdBuyerTradeParty, $model->getBuyerTradeParty());

        // Property BuyerOrderReferencedDocument

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNull($model->getBuyerOrderReferencedDocument());

        $createdBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdBuyerOrderReferencedDocument);
        $this->assertSame($createdBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxminimumRamHeaderTradeDeliveryType(): void
    {
        $model = new HeaderTradeDeliveryType();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\HeaderTradeSettlementType.
     */
    public function testModelsZffxminimumRamHeaderTradeSettlementType(): void
    {
        $model = new HeaderTradeSettlementType();

        $this->assertInstanceOf(HeaderTradeSettlementType::class, $model);

        // Property InvoiceCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setInvoiceCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getInvoiceCurrencyCode());

        $model->unsetInvoiceCurrencyCode();

        $this->assertNull($model->getInvoiceCurrencyCode());

        $createdInvoiceCurrencyCode = $model->getInvoiceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $createdInvoiceCurrencyCode);
        $this->assertSame($createdInvoiceCurrencyCode, $model->getInvoiceCurrencyCode());

        // Property SpecifiedTradeSettlementHeaderMonetarySummation

        $model->unsetSpecifiedTradeSettlementHeaderMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $createdSpecifiedTradeSettlementHeaderMonetarySummation = $model->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $createdSpecifiedTradeSettlementHeaderMonetarySummation);
        $this->assertSame($createdSpecifiedTradeSettlementHeaderMonetarySummation, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\LegalOrganizationType.
     */
    public function testModelsZffxminimumRamLegalOrganizationType(): void
    {
        $model = new LegalOrganizationType();

        $this->assertInstanceOf(LegalOrganizationType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\ReferencedDocumentType.
     */
    public function testModelsZffxminimumRamReferencedDocumentType(): void
    {
        $model = new ReferencedDocumentType();

        $this->assertInstanceOf(ReferencedDocumentType::class, $model);

        // Property IssuerAssignedID

        $testValue = new IDType();
        $model->setIssuerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIssuerAssignedID());

        $model->unsetIssuerAssignedID();

        $this->assertNull($model->getIssuerAssignedID());

        $createdIssuerAssignedID = $model->getIssuerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIssuerAssignedID);
        $this->assertSame($createdIssuerAssignedID, $model->getIssuerAssignedID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxminimumRamSupplyChainTradeTransactionType(): void
    {
        $model = new SupplyChainTradeTransactionType();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $model);

        // Property ApplicableHeaderTradeAgreement

        $model->unsetApplicableHeaderTradeAgreement();

        $this->assertNull($model->getApplicableHeaderTradeAgreement());

        $createdApplicableHeaderTradeAgreement = $model->getApplicableHeaderTradeAgreementWithCreate();

        $this->assertInstanceOf(HeaderTradeAgreementType::class, $createdApplicableHeaderTradeAgreement);
        $this->assertSame($createdApplicableHeaderTradeAgreement, $model->getApplicableHeaderTradeAgreement());

        // Property ApplicableHeaderTradeDelivery

        $model->unsetApplicableHeaderTradeDelivery();

        $this->assertNull($model->getApplicableHeaderTradeDelivery());

        $createdApplicableHeaderTradeDelivery = $model->getApplicableHeaderTradeDeliveryWithCreate();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $createdApplicableHeaderTradeDelivery);
        $this->assertSame($createdApplicableHeaderTradeDelivery, $model->getApplicableHeaderTradeDelivery());

        // Property ApplicableHeaderTradeSettlement

        $model->unsetApplicableHeaderTradeSettlement();

        $this->assertNull($model->getApplicableHeaderTradeSettlement());

        $createdApplicableHeaderTradeSettlement = $model->getApplicableHeaderTradeSettlementWithCreate();

        $this->assertInstanceOf(HeaderTradeSettlementType::class, $createdApplicableHeaderTradeSettlement);
        $this->assertSame($createdApplicableHeaderTradeSettlement, $model->getApplicableHeaderTradeSettlement());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\TaxRegistrationType.
     */
    public function testModelsZffxminimumRamTaxRegistrationType(): void
    {
        $model = new TaxRegistrationType();

        $this->assertInstanceOf(TaxRegistrationType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradeAddressType.
     */
    public function testModelsZffxminimumRamTradeAddressType(): void
    {
        $model = new TradeAddressType();

        $this->assertInstanceOf(TradeAddressType::class, $model);

        // Property CountryID

        $testValue = new CountryIDType();
        $model->setCountryID($testValue);

        $this->assertEquals($testValue, $model->getCountryID());

        $model->unsetCountryID();

        $this->assertNull($model->getCountryID());

        $createdCountryID = $model->getCountryIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $createdCountryID);
        $this->assertSame($createdCountryID, $model->getCountryID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradePartyType.
     */
    public function testModelsZffxminimumRamTradePartyType(): void
    {
        $model = new TradePartyType();

        $this->assertInstanceOf(TradePartyType::class, $model);

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $createdName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdName);
        $this->assertSame($createdName, $model->getName());

        // Property SpecifiedLegalOrganization

        $testValue = new LegalOrganizationType();
        $model->setSpecifiedLegalOrganization($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLegalOrganization());

        $model->unsetSpecifiedLegalOrganization();

        $this->assertNull($model->getSpecifiedLegalOrganization());

        $createdSpecifiedLegalOrganization = $model->getSpecifiedLegalOrganizationWithCreate();

        $this->assertInstanceOf(LegalOrganizationType::class, $createdSpecifiedLegalOrganization);
        $this->assertSame($createdSpecifiedLegalOrganization, $model->getSpecifiedLegalOrganization());

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNull($model->getPostalTradeAddress());

        $createdPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $createdPostalTradeAddress);
        $this->assertSame($createdPostalTradeAddress, $model->getPostalTradeAddress());

        // Property SpecifiedTaxRegistration

        $specifiedTaxRegistrationItems = [];
        $model->setSpecifiedTaxRegistration($specifiedTaxRegistrationItems);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertCount(0, $model->getSpecifiedTaxRegistration());

        $specifiedTaxRegistrationItem = new TaxRegistrationType();
        $model->addToSpecifiedTaxRegistration($specifiedTaxRegistrationItem);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTaxRegistration()));

        $createdSpecifiedTaxRegistrationItem = $model->addToSpecifiedTaxRegistrationWithCreate();

        $this->assertInstanceOf(TaxRegistrationType::class, $createdSpecifiedTaxRegistrationItem);

        $specifiedTaxRegistrationOnceItem = new TaxRegistrationType();

        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);
        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearSpecifiedTaxRegistration();

        $itemsAfterClear = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType.
     */
    public function testModelsZffxminimumRamTradeSettlementHeaderMonetarySummationType(): void
    {
        $model = new TradeSettlementHeaderMonetarySummationType();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $model);

        // Property TaxBasisTotalAmount

        $testValue = new AmountType();
        $model->setTaxBasisTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxBasisTotalAmount());

        $model->unsetTaxBasisTotalAmount();

        $this->assertNull($model->getTaxBasisTotalAmount());

        $createdTaxBasisTotalAmount = $model->getTaxBasisTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdTaxBasisTotalAmount);
        $this->assertSame($createdTaxBasisTotalAmount, $model->getTaxBasisTotalAmount());

        // Property TaxTotalAmount

        $taxTotalAmountItems = [];
        $model->setTaxTotalAmount($taxTotalAmountItems);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertCount(0, $model->getTaxTotalAmount());

        $taxTotalAmountItem = new AmountType();
        $model->addToTaxTotalAmount($taxTotalAmountItem);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertGreaterThanOrEqual(1, count($model->getTaxTotalAmount()));

        $createdTaxTotalAmountItem = $model->addToTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdTaxTotalAmountItem);

        $taxTotalAmountOnceItem = new AmountType();

        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);
        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);

        $itemsAfterOnce = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearTaxTotalAmount();

        $itemsAfterClear = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property GrandTotalAmount

        $testValue = new AmountType();
        $model->setGrandTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getGrandTotalAmount());

        $model->unsetGrandTotalAmount();

        $this->assertNull($model->getGrandTotalAmount());

        $createdGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdGrandTotalAmount);
        $this->assertSame($createdGrandTotalAmount, $model->getGrandTotalAmount());

        // Property DuePayableAmount

        $testValue = new AmountType();
        $model->setDuePayableAmount($testValue);

        $this->assertEquals($testValue, $model->getDuePayableAmount());

        $model->unsetDuePayableAmount();

        $this->assertNull($model->getDuePayableAmount());

        $createdDuePayableAmount = $model->getDuePayableAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdDuePayableAmount);
        $this->assertSame($createdDuePayableAmount, $model->getDuePayableAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxminimumRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\rsm\CrossIndustryInvoiceType.
     */
    public function testModelsZffxminimumRsmCrossIndustryInvoiceType(): void
    {
        $model = new CrossIndustryInvoiceType();

        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);

        // Property ExchangedDocumentContext

        $testValue = new ExchangedDocumentContextType();
        $model->setExchangedDocumentContext($testValue);

        $this->assertEquals($testValue, $model->getExchangedDocumentContext());

        $model->unsetExchangedDocumentContext();

        $this->assertNull($model->getExchangedDocumentContext());

        $createdExchangedDocumentContext = $model->getExchangedDocumentContextWithCreate();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $createdExchangedDocumentContext);
        $this->assertSame($createdExchangedDocumentContext, $model->getExchangedDocumentContext());

        // Property ExchangedDocument

        $testValue = new ExchangedDocumentType();
        $model->setExchangedDocument($testValue);

        $this->assertEquals($testValue, $model->getExchangedDocument());

        $model->unsetExchangedDocument();

        $this->assertNull($model->getExchangedDocument());

        $createdExchangedDocument = $model->getExchangedDocumentWithCreate();

        $this->assertInstanceOf(ExchangedDocumentType::class, $createdExchangedDocument);
        $this->assertSame($createdExchangedDocument, $model->getExchangedDocument());

        // Property SupplyChainTradeTransaction

        $model->unsetSupplyChainTradeTransaction();

        $this->assertNull($model->getSupplyChainTradeTransaction());

        $createdSupplyChainTradeTransaction = $model->getSupplyChainTradeTransactionWithCreate();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $createdSupplyChainTradeTransaction);
        $this->assertSame($createdSupplyChainTradeTransaction, $model->getSupplyChainTradeTransaction());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\udt\AmountType.
     */
    public function testModelsZffxminimumUdtAmountType(): void
    {
        $model = new AmountType();

        $this->assertInstanceOf(AmountType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property CurrencyID

        $testValue = 'dummy-CurrencyIDValue';
        $model->setCurrencyID($testValue);

        $this->assertEquals($testValue, $model->getCurrencyID());

        $model->unsetCurrencyID();

        $this->assertNull($model->getCurrencyID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxminimumUdtDatetimetypeDateTimeStringAType(): void
    {
        $model = new DateTimeStringAType();

        $this->assertInstanceOf(DateTimeStringAType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property Format

        $testValue = 'dummy-FormatValue';
        $model->setFormat($testValue);

        $this->assertEquals($testValue, $model->getFormat());

        $model->unsetFormat();

        $this->assertNull($model->getFormat());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\udt\DateTimeType.
     */
    public function testModelsZffxminimumUdtDateTimeType(): void
    {
        $model = new DateTimeType();

        $this->assertInstanceOf(DateTimeType::class, $model);

        // Property DateTimeString

        $testValue = new DateTimeStringAType();
        $model->setDateTimeString($testValue);

        $this->assertEquals($testValue, $model->getDateTimeString());

        $model->unsetDateTimeString();

        $this->assertNull($model->getDateTimeString());

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\udt\IDType.
     */
    public function testModelsZffxminimumUdtIDType(): void
    {
        $model = new IDType();

        $this->assertInstanceOf(IDType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property SchemeID

        $testValue = 'dummy-SchemeIDValue';
        $model->setSchemeID($testValue);

        $this->assertEquals($testValue, $model->getSchemeID());

        $model->unsetSchemeID();

        $this->assertNull($model->getSchemeID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxminimum\udt\TextType.
     */
    public function testModelsZffxminimumUdtTextType(): void
    {
        $model = new TextType();

        $this->assertInstanceOf(TextType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }
}
