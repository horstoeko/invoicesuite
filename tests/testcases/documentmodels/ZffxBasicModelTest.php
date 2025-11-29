<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\FormattedDateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\CreditorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\DebtorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\DocumentLineDocumentType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\NoteType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\SpecifiedPeriodType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainEventType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainTradeLineItemType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAccountingAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAllowanceChargeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePartyType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePriceType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeProductType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementLineMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementPaymentMeansType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeTaxType;
use horstoeko\invoicesuite\documents\models\zffxbasic\ram\UniversalCommunicationType;
use horstoeko\invoicesuite\documents\models\zffxbasic\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\models\zffxbasic\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\CodeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\DateTimeType\DateTimeStringAType as DateTimeStringAType1;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\IndicatorType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\PercentType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\QuantityType;
use horstoeko\invoicesuite\documents\models\zffxbasic\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxBasicModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\AllowanceChargeReasonCodeType.
     */
    public function testModelsZffxbasicQdtAllowanceChargeReasonCodeType(): void
    {
        $model = new AllowanceChargeReasonCodeType();

        $this->assertInstanceOf(AllowanceChargeReasonCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\CountryIDType.
     */
    public function testModelsZffxbasicQdtCountryIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\CurrencyCodeType.
     */
    public function testModelsZffxbasicQdtCurrencyCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\DocumentCodeType.
     */
    public function testModelsZffxbasicQdtDocumentCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\FormattedDateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxbasicQdtFormatteddatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\FormattedDateTimeType.
     */
    public function testModelsZffxbasicQdtFormattedDateTimeType(): void
    {
        $model = new FormattedDateTimeType();

        $this->assertInstanceOf(FormattedDateTimeType::class, $model);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\PaymentMeansCodeType.
     */
    public function testModelsZffxbasicQdtPaymentMeansCodeType(): void
    {
        $model = new PaymentMeansCodeType();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TaxCategoryCodeType.
     */
    public function testModelsZffxbasicQdtTaxCategoryCodeType(): void
    {
        $model = new TaxCategoryCodeType();

        $this->assertInstanceOf(TaxCategoryCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TaxTypeCodeType.
     */
    public function testModelsZffxbasicQdtTaxTypeCodeType(): void
    {
        $model = new TaxTypeCodeType();

        $this->assertInstanceOf(TaxTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\qdt\TimeReferenceCodeType.
     */
    public function testModelsZffxbasicQdtTimeReferenceCodeType(): void
    {
        $model = new TimeReferenceCodeType();

        $this->assertInstanceOf(TimeReferenceCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\CreditorFinancialAccountType.
     */
    public function testModelsZffxbasicRamCreditorFinancialAccountType(): void
    {
        $model = new CreditorFinancialAccountType();

        $this->assertInstanceOf(CreditorFinancialAccountType::class, $model);

        // Property IBANID

        $testValue = new IDType();
        $model->setIBANID($testValue);

        $this->assertEquals($testValue, $model->getIBANID());

        $model->unsetIBANID();

        $this->assertNull($model->getIBANID());

        $createdIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIBANID);
        $this->assertSame($createdIBANID, $model->getIBANID());

        // Property ProprietaryID

        $testValue = new IDType();
        $model->setProprietaryID($testValue);

        $this->assertEquals($testValue, $model->getProprietaryID());

        $model->unsetProprietaryID();

        $this->assertNull($model->getProprietaryID());

        $createdProprietaryID = $model->getProprietaryIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdProprietaryID);
        $this->assertSame($createdProprietaryID, $model->getProprietaryID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\DebtorFinancialAccountType.
     */
    public function testModelsZffxbasicRamDebtorFinancialAccountType(): void
    {
        $model = new DebtorFinancialAccountType();

        $this->assertInstanceOf(DebtorFinancialAccountType::class, $model);

        // Property IBANID

        $testValue = new IDType();
        $model->setIBANID($testValue);

        $this->assertEquals($testValue, $model->getIBANID());

        $model->unsetIBANID();

        $this->assertNull($model->getIBANID());

        $createdIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIBANID);
        $this->assertSame($createdIBANID, $model->getIBANID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\DocumentContextParameterType.
     */
    public function testModelsZffxbasicRamDocumentContextParameterType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\DocumentLineDocumentType.
     */
    public function testModelsZffxbasicRamDocumentLineDocumentType(): void
    {
        $model = new DocumentLineDocumentType();

        $this->assertInstanceOf(DocumentLineDocumentType::class, $model);

        // Property LineID

        $testValue = new IDType();
        $model->setLineID($testValue);

        $this->assertEquals($testValue, $model->getLineID());

        $model->unsetLineID();

        $this->assertNull($model->getLineID());

        $createdLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdLineID);
        $this->assertSame($createdLineID, $model->getLineID());

        // Property IncludedNote

        $testValue = new NoteType();
        $model->setIncludedNote($testValue);

        $this->assertEquals($testValue, $model->getIncludedNote());

        $model->unsetIncludedNote();

        $this->assertNull($model->getIncludedNote());

        $createdIncludedNote = $model->getIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $createdIncludedNote);
        $this->assertSame($createdIncludedNote, $model->getIncludedNote());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxbasicRamExchangedDocumentContextType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\ExchangedDocumentType.
     */
    public function testModelsZffxbasicRamExchangedDocumentType(): void
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

        // Property IncludedNote

        $includedNoteItems = [];
        $model->setIncludedNote($includedNoteItems);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(0, $model->getIncludedNote());

        $includedNoteItem = new NoteType();
        $model->addToIncludedNote($includedNoteItem);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedNote()));

        $createdIncludedNoteItem = $model->addToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $createdIncludedNoteItem);

        $includedNoteOnceItem = new NoteType();

        $model->addOnceToIncludedNote($includedNoteOnceItem);
        $model->addOnceToIncludedNote($includedNoteOnceItem);

        $itemsAfterOnce = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearIncludedNote();

        $itemsAfterClear = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeAgreementType.
     */
    public function testModelsZffxbasicRamHeaderTradeAgreementType(): void
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

        // Property SellerTaxRepresentativeTradeParty

        $model->unsetSellerTaxRepresentativeTradeParty();

        $this->assertNull($model->getSellerTaxRepresentativeTradeParty());

        $createdSellerTaxRepresentativeTradeParty = $model->getSellerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdSellerTaxRepresentativeTradeParty);
        $this->assertSame($createdSellerTaxRepresentativeTradeParty, $model->getSellerTaxRepresentativeTradeParty());

        // Property BuyerOrderReferencedDocument

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNull($model->getBuyerOrderReferencedDocument());

        $createdBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdBuyerOrderReferencedDocument);
        $this->assertSame($createdBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

        // Property ContractReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setContractReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getContractReferencedDocument());

        $model->unsetContractReferencedDocument();

        $this->assertNull($model->getContractReferencedDocument());

        $createdContractReferencedDocument = $model->getContractReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdContractReferencedDocument);
        $this->assertSame($createdContractReferencedDocument, $model->getContractReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxbasicRamHeaderTradeDeliveryType(): void
    {
        $model = new HeaderTradeDeliveryType();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $model);

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNull($model->getShipToTradeParty());

        $createdShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdShipToTradeParty);
        $this->assertSame($createdShipToTradeParty, $model->getShipToTradeParty());

        // Property ActualDeliverySupplyChainEvent

        $model->unsetActualDeliverySupplyChainEvent();

        $this->assertNull($model->getActualDeliverySupplyChainEvent());

        $createdActualDeliverySupplyChainEvent = $model->getActualDeliverySupplyChainEventWithCreate();

        $this->assertInstanceOf(SupplyChainEventType::class, $createdActualDeliverySupplyChainEvent);
        $this->assertSame($createdActualDeliverySupplyChainEvent, $model->getActualDeliverySupplyChainEvent());

        // Property DespatchAdviceReferencedDocument

        $model->unsetDespatchAdviceReferencedDocument();

        $this->assertNull($model->getDespatchAdviceReferencedDocument());

        $createdDespatchAdviceReferencedDocument = $model->getDespatchAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdDespatchAdviceReferencedDocument);
        $this->assertSame($createdDespatchAdviceReferencedDocument, $model->getDespatchAdviceReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\HeaderTradeSettlementType.
     */
    public function testModelsZffxbasicRamHeaderTradeSettlementType(): void
    {
        $model = new HeaderTradeSettlementType();

        $this->assertInstanceOf(HeaderTradeSettlementType::class, $model);

        // Property CreditorReferenceID

        $testValue = new IDType();
        $model->setCreditorReferenceID($testValue);

        $this->assertEquals($testValue, $model->getCreditorReferenceID());

        $model->unsetCreditorReferenceID();

        $this->assertNull($model->getCreditorReferenceID());

        $createdCreditorReferenceID = $model->getCreditorReferenceIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdCreditorReferenceID);
        $this->assertSame($createdCreditorReferenceID, $model->getCreditorReferenceID());

        // Property PaymentReference

        $testValue = new TextType();
        $model->setPaymentReference($testValue);

        $this->assertEquals($testValue, $model->getPaymentReference());

        $model->unsetPaymentReference();

        $this->assertNull($model->getPaymentReference());

        $createdPaymentReference = $model->getPaymentReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $createdPaymentReference);
        $this->assertSame($createdPaymentReference, $model->getPaymentReference());

        // Property TaxCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setTaxCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTaxCurrencyCode());

        $model->unsetTaxCurrencyCode();

        $this->assertNull($model->getTaxCurrencyCode());

        $createdTaxCurrencyCode = $model->getTaxCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $createdTaxCurrencyCode);
        $this->assertSame($createdTaxCurrencyCode, $model->getTaxCurrencyCode());

        // Property InvoiceCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setInvoiceCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getInvoiceCurrencyCode());

        $model->unsetInvoiceCurrencyCode();

        $this->assertNull($model->getInvoiceCurrencyCode());

        $createdInvoiceCurrencyCode = $model->getInvoiceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $createdInvoiceCurrencyCode);
        $this->assertSame($createdInvoiceCurrencyCode, $model->getInvoiceCurrencyCode());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $createdPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdPayeeTradeParty);
        $this->assertSame($createdPayeeTradeParty, $model->getPayeeTradeParty());

        // Property SpecifiedTradeSettlementPaymentMeans

        $specifiedTradeSettlementPaymentMeansItems = [];
        $model->setSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansItems);

        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertCount(0, $model->getSpecifiedTradeSettlementPaymentMeans());

        $createdSpecifiedTradeSettlementPaymentMeansItem = $model->addToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $createdSpecifiedTradeSettlementPaymentMeansItem);

        $model->clearSpecifiedTradeSettlementPaymentMeans();

        $itemsAfterClear = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ApplicableTradeTax

        $applicableTradeTaxItems = [];
        $model->setApplicableTradeTax($applicableTradeTaxItems);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(0, $model->getApplicableTradeTax());

        $applicableTradeTaxItem = new TradeTaxType();
        $model->addToApplicableTradeTax($applicableTradeTaxItem);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertGreaterThanOrEqual(1, count($model->getApplicableTradeTax()));

        $createdApplicableTradeTaxItem = $model->addToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdApplicableTradeTaxItem);

        $applicableTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);
        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);

        $itemsAfterOnce = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearApplicableTradeTax();

        $itemsAfterClear = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BillingSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setBillingSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getBillingSpecifiedPeriod());

        $model->unsetBillingSpecifiedPeriod();

        $this->assertNull($model->getBillingSpecifiedPeriod());

        $createdBillingSpecifiedPeriod = $model->getBillingSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $createdBillingSpecifiedPeriod);
        $this->assertSame($createdBillingSpecifiedPeriod, $model->getBillingSpecifiedPeriod());

        // Property SpecifiedTradeAllowanceCharge

        $specifiedTradeAllowanceChargeItems = [];
        $model->setSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(0, $model->getSpecifiedTradeAllowanceCharge());

        $specifiedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTradeAllowanceCharge()));

        $createdSpecifiedTradeAllowanceChargeItem = $model->addToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $createdSpecifiedTradeAllowanceChargeItem);

        $model->clearSpecifiedTradeAllowanceCharge();

        $itemsAfterClear = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedTradePaymentTerms

        $testValue = new TradePaymentTermsType();
        $model->setSpecifiedTradePaymentTerms($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradePaymentTerms());

        $model->unsetSpecifiedTradePaymentTerms();

        $this->assertNull($model->getSpecifiedTradePaymentTerms());

        $createdSpecifiedTradePaymentTerms = $model->getSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $createdSpecifiedTradePaymentTerms);
        $this->assertSame($createdSpecifiedTradePaymentTerms, $model->getSpecifiedTradePaymentTerms());

        // Property SpecifiedTradeSettlementHeaderMonetarySummation

        $model->unsetSpecifiedTradeSettlementHeaderMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $createdSpecifiedTradeSettlementHeaderMonetarySummation = $model->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $createdSpecifiedTradeSettlementHeaderMonetarySummation);
        $this->assertSame($createdSpecifiedTradeSettlementHeaderMonetarySummation, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        // Property InvoiceReferencedDocument

        $invoiceReferencedDocumentItems = [];
        $model->setInvoiceReferencedDocument($invoiceReferencedDocumentItems);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertCount(0, $model->getInvoiceReferencedDocument());

        $invoiceReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToInvoiceReferencedDocument($invoiceReferencedDocumentItem);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getInvoiceReferencedDocument()));

        $createdInvoiceReferencedDocumentItem = $model->addToInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdInvoiceReferencedDocumentItem);

        $invoiceReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);
        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearInvoiceReferencedDocument();

        $itemsAfterClear = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ReceivableSpecifiedTradeAccountingAccount

        $model->unsetReceivableSpecifiedTradeAccountingAccount();

        $this->assertNull($model->getReceivableSpecifiedTradeAccountingAccount());

        $createdReceivableSpecifiedTradeAccountingAccount = $model->getReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $createdReceivableSpecifiedTradeAccountingAccount);
        $this->assertSame($createdReceivableSpecifiedTradeAccountingAccount, $model->getReceivableSpecifiedTradeAccountingAccount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\LegalOrganizationType.
     */
    public function testModelsZffxbasicRamLegalOrganizationType(): void
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

        // Property TradingBusinessName

        $testValue = new TextType();
        $model->setTradingBusinessName($testValue);

        $this->assertEquals($testValue, $model->getTradingBusinessName());

        $model->unsetTradingBusinessName();

        $this->assertNull($model->getTradingBusinessName());

        $createdTradingBusinessName = $model->getTradingBusinessNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdTradingBusinessName);
        $this->assertSame($createdTradingBusinessName, $model->getTradingBusinessName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeAgreementType.
     */
    public function testModelsZffxbasicRamLineTradeAgreementType(): void
    {
        $model = new LineTradeAgreementType();

        $this->assertInstanceOf(LineTradeAgreementType::class, $model);

        // Property GrossPriceProductTradePrice

        $testValue = new TradePriceType();
        $model->setGrossPriceProductTradePrice($testValue);

        $this->assertEquals($testValue, $model->getGrossPriceProductTradePrice());

        $model->unsetGrossPriceProductTradePrice();

        $this->assertNull($model->getGrossPriceProductTradePrice());

        $createdGrossPriceProductTradePrice = $model->getGrossPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $createdGrossPriceProductTradePrice);
        $this->assertSame($createdGrossPriceProductTradePrice, $model->getGrossPriceProductTradePrice());

        // Property NetPriceProductTradePrice

        $testValue = new TradePriceType();
        $model->setNetPriceProductTradePrice($testValue);

        $this->assertEquals($testValue, $model->getNetPriceProductTradePrice());

        $model->unsetNetPriceProductTradePrice();

        $this->assertNull($model->getNetPriceProductTradePrice());

        $createdNetPriceProductTradePrice = $model->getNetPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $createdNetPriceProductTradePrice);
        $this->assertSame($createdNetPriceProductTradePrice, $model->getNetPriceProductTradePrice());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeDeliveryType.
     */
    public function testModelsZffxbasicRamLineTradeDeliveryType(): void
    {
        $model = new LineTradeDeliveryType();

        $this->assertInstanceOf(LineTradeDeliveryType::class, $model);

        // Property BilledQuantity

        $testValue = new QuantityType();
        $model->setBilledQuantity($testValue);

        $this->assertEquals($testValue, $model->getBilledQuantity());

        $model->unsetBilledQuantity();

        $this->assertNull($model->getBilledQuantity());

        $createdBilledQuantity = $model->getBilledQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdBilledQuantity);
        $this->assertSame($createdBilledQuantity, $model->getBilledQuantity());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\LineTradeSettlementType.
     */
    public function testModelsZffxbasicRamLineTradeSettlementType(): void
    {
        $model = new LineTradeSettlementType();

        $this->assertInstanceOf(LineTradeSettlementType::class, $model);

        // Property ApplicableTradeTax

        $testValue = new TradeTaxType();
        $model->setApplicableTradeTax($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradeTax());

        $model->unsetApplicableTradeTax();

        $this->assertNull($model->getApplicableTradeTax());

        $createdApplicableTradeTax = $model->getApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdApplicableTradeTax);
        $this->assertSame($createdApplicableTradeTax, $model->getApplicableTradeTax());

        // Property BillingSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setBillingSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getBillingSpecifiedPeriod());

        $model->unsetBillingSpecifiedPeriod();

        $this->assertNull($model->getBillingSpecifiedPeriod());

        $createdBillingSpecifiedPeriod = $model->getBillingSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $createdBillingSpecifiedPeriod);
        $this->assertSame($createdBillingSpecifiedPeriod, $model->getBillingSpecifiedPeriod());

        // Property SpecifiedTradeAllowanceCharge

        $specifiedTradeAllowanceChargeItems = [];
        $model->setSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(0, $model->getSpecifiedTradeAllowanceCharge());

        $specifiedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTradeAllowanceCharge()));

        $createdSpecifiedTradeAllowanceChargeItem = $model->addToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $createdSpecifiedTradeAllowanceChargeItem);

        $model->clearSpecifiedTradeAllowanceCharge();

        $itemsAfterClear = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedTradeSettlementLineMonetarySummation

        $model->unsetSpecifiedTradeSettlementLineMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementLineMonetarySummation());

        $createdSpecifiedTradeSettlementLineMonetarySummation = $model->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $createdSpecifiedTradeSettlementLineMonetarySummation);
        $this->assertSame($createdSpecifiedTradeSettlementLineMonetarySummation, $model->getSpecifiedTradeSettlementLineMonetarySummation());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\NoteType.
     */
    public function testModelsZffxbasicRamNoteType(): void
    {
        $model = new NoteType();

        $this->assertInstanceOf(NoteType::class, $model);

        // Property Content

        $testValue = new TextType();
        $model->setContent($testValue);

        $this->assertEquals($testValue, $model->getContent());

        $model->unsetContent();

        $this->assertNull($model->getContent());

        $createdContent = $model->getContentWithCreate();

        $this->assertInstanceOf(TextType::class, $createdContent);
        $this->assertSame($createdContent, $model->getContent());

        // Property SubjectCode

        $testValue = new CodeType();
        $model->setSubjectCode($testValue);

        $this->assertEquals($testValue, $model->getSubjectCode());

        $model->unsetSubjectCode();

        $this->assertNull($model->getSubjectCode());

        $createdSubjectCode = $model->getSubjectCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdSubjectCode);
        $this->assertSame($createdSubjectCode, $model->getSubjectCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\ReferencedDocumentType.
     */
    public function testModelsZffxbasicRamReferencedDocumentType(): void
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

        // Property FormattedIssueDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedIssueDateTime());

        $model->unsetFormattedIssueDateTime();

        $this->assertNull($model->getFormattedIssueDateTime());

        $createdFormattedIssueDateTime = $model->getFormattedIssueDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $createdFormattedIssueDateTime);
        $this->assertSame($createdFormattedIssueDateTime, $model->getFormattedIssueDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\SpecifiedPeriodType.
     */
    public function testModelsZffxbasicRamSpecifiedPeriodType(): void
    {
        $model = new SpecifiedPeriodType();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $model);

        // Property StartDateTime

        $testValue = new DateTimeType();
        $model->setStartDateTime($testValue);

        $this->assertEquals($testValue, $model->getStartDateTime());

        $model->unsetStartDateTime();

        $this->assertNull($model->getStartDateTime());

        $createdStartDateTime = $model->getStartDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdStartDateTime);
        $this->assertSame($createdStartDateTime, $model->getStartDateTime());

        // Property EndDateTime

        $testValue = new DateTimeType();
        $model->setEndDateTime($testValue);

        $this->assertEquals($testValue, $model->getEndDateTime());

        $model->unsetEndDateTime();

        $this->assertNull($model->getEndDateTime());

        $createdEndDateTime = $model->getEndDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdEndDateTime);
        $this->assertSame($createdEndDateTime, $model->getEndDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainEventType.
     */
    public function testModelsZffxbasicRamSupplyChainEventType(): void
    {
        $model = new SupplyChainEventType();

        $this->assertInstanceOf(SupplyChainEventType::class, $model);

        // Property OccurrenceDateTime

        $testValue = new DateTimeType();
        $model->setOccurrenceDateTime($testValue);

        $this->assertEquals($testValue, $model->getOccurrenceDateTime());

        $model->unsetOccurrenceDateTime();

        $this->assertNull($model->getOccurrenceDateTime());

        $createdOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdOccurrenceDateTime);
        $this->assertSame($createdOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxbasicRamSupplyChainTradeLineItemType(): void
    {
        $model = new SupplyChainTradeLineItemType();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $model);

        // Property AssociatedDocumentLineDocument

        $model->unsetAssociatedDocumentLineDocument();

        $this->assertNull($model->getAssociatedDocumentLineDocument());

        $createdAssociatedDocumentLineDocument = $model->getAssociatedDocumentLineDocumentWithCreate();

        $this->assertInstanceOf(DocumentLineDocumentType::class, $createdAssociatedDocumentLineDocument);
        $this->assertSame($createdAssociatedDocumentLineDocument, $model->getAssociatedDocumentLineDocument());

        // Property SpecifiedTradeProduct

        $testValue = new TradeProductType();
        $model->setSpecifiedTradeProduct($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeProduct());

        $model->unsetSpecifiedTradeProduct();

        $this->assertNull($model->getSpecifiedTradeProduct());

        $createdSpecifiedTradeProduct = $model->getSpecifiedTradeProductWithCreate();

        $this->assertInstanceOf(TradeProductType::class, $createdSpecifiedTradeProduct);
        $this->assertSame($createdSpecifiedTradeProduct, $model->getSpecifiedTradeProduct());

        // Property SpecifiedLineTradeAgreement

        $testValue = new LineTradeAgreementType();
        $model->setSpecifiedLineTradeAgreement($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeAgreement());

        $model->unsetSpecifiedLineTradeAgreement();

        $this->assertNull($model->getSpecifiedLineTradeAgreement());

        $createdSpecifiedLineTradeAgreement = $model->getSpecifiedLineTradeAgreementWithCreate();

        $this->assertInstanceOf(LineTradeAgreementType::class, $createdSpecifiedLineTradeAgreement);
        $this->assertSame($createdSpecifiedLineTradeAgreement, $model->getSpecifiedLineTradeAgreement());

        // Property SpecifiedLineTradeDelivery

        $testValue = new LineTradeDeliveryType();
        $model->setSpecifiedLineTradeDelivery($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeDelivery());

        $model->unsetSpecifiedLineTradeDelivery();

        $this->assertNull($model->getSpecifiedLineTradeDelivery());

        $createdSpecifiedLineTradeDelivery = $model->getSpecifiedLineTradeDeliveryWithCreate();

        $this->assertInstanceOf(LineTradeDeliveryType::class, $createdSpecifiedLineTradeDelivery);
        $this->assertSame($createdSpecifiedLineTradeDelivery, $model->getSpecifiedLineTradeDelivery());

        // Property SpecifiedLineTradeSettlement

        $model->unsetSpecifiedLineTradeSettlement();

        $this->assertNull($model->getSpecifiedLineTradeSettlement());

        $createdSpecifiedLineTradeSettlement = $model->getSpecifiedLineTradeSettlementWithCreate();

        $this->assertInstanceOf(LineTradeSettlementType::class, $createdSpecifiedLineTradeSettlement);
        $this->assertSame($createdSpecifiedLineTradeSettlement, $model->getSpecifiedLineTradeSettlement());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxbasicRamSupplyChainTradeTransactionType(): void
    {
        $model = new SupplyChainTradeTransactionType();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $model);

        // Property IncludedSupplyChainTradeLineItem

        $includedSupplyChainTradeLineItemItems = [];
        $model->setIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemItems);

        $this->assertIsArray($model->getIncludedSupplyChainTradeLineItem());
        $this->assertCount(0, $model->getIncludedSupplyChainTradeLineItem());

        $createdIncludedSupplyChainTradeLineItemItem = $model->addToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $createdIncludedSupplyChainTradeLineItemItem);

        $latestIncludedSupplyChainTradeLineItem = $model->getLatestIncludedSupplyChainTradeLineItem();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $latestIncludedSupplyChainTradeLineItem);

        $hasLatestIncludedSupplyChainTradeLineItem = $model->hasLatestIncludedSupplyChainTradeLineItem();
        $this->assertIsBool($hasLatestIncludedSupplyChainTradeLineItem);

        $model->clearIncludedSupplyChainTradeLineItem();

        $itemsAfterClear = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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

        // Property LatestIncludedSupplyChainTradeLineItem

        $createdLatestIncludedSupplyChainTradeLineItem = $model->getLatestIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $createdLatestIncludedSupplyChainTradeLineItem);
        $this->assertSame($createdLatestIncludedSupplyChainTradeLineItem, $model->getLatestIncludedSupplyChainTradeLineItem());

        // Property IncludedSupplyChainTradeLineItemWithCreate

        // Property NotLatestIncludedSupplyChainTradeLineItem
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TaxRegistrationType.
     */
    public function testModelsZffxbasicRamTaxRegistrationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAccountingAccountType.
     */
    public function testModelsZffxbasicRamTradeAccountingAccountType(): void
    {
        $model = new TradeAccountingAccountType();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $model);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAddressType.
     */
    public function testModelsZffxbasicRamTradeAddressType(): void
    {
        $model = new TradeAddressType();

        $this->assertInstanceOf(TradeAddressType::class, $model);

        // Property PostcodeCode

        $testValue = new CodeType();
        $model->setPostcodeCode($testValue);

        $this->assertEquals($testValue, $model->getPostcodeCode());

        $model->unsetPostcodeCode();

        $this->assertNull($model->getPostcodeCode());

        $createdPostcodeCode = $model->getPostcodeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdPostcodeCode);
        $this->assertSame($createdPostcodeCode, $model->getPostcodeCode());

        // Property LineOne

        $testValue = new TextType();
        $model->setLineOne($testValue);

        $this->assertEquals($testValue, $model->getLineOne());

        $model->unsetLineOne();

        $this->assertNull($model->getLineOne());

        $createdLineOne = $model->getLineOneWithCreate();

        $this->assertInstanceOf(TextType::class, $createdLineOne);
        $this->assertSame($createdLineOne, $model->getLineOne());

        // Property LineTwo

        $testValue = new TextType();
        $model->setLineTwo($testValue);

        $this->assertEquals($testValue, $model->getLineTwo());

        $model->unsetLineTwo();

        $this->assertNull($model->getLineTwo());

        $createdLineTwo = $model->getLineTwoWithCreate();

        $this->assertInstanceOf(TextType::class, $createdLineTwo);
        $this->assertSame($createdLineTwo, $model->getLineTwo());

        // Property LineThree

        $testValue = new TextType();
        $model->setLineThree($testValue);

        $this->assertEquals($testValue, $model->getLineThree());

        $model->unsetLineThree();

        $this->assertNull($model->getLineThree());

        $createdLineThree = $model->getLineThreeWithCreate();

        $this->assertInstanceOf(TextType::class, $createdLineThree);
        $this->assertSame($createdLineThree, $model->getLineThree());

        // Property CityName

        $testValue = new TextType();
        $model->setCityName($testValue);

        $this->assertEquals($testValue, $model->getCityName());

        $model->unsetCityName();

        $this->assertNull($model->getCityName());

        $createdCityName = $model->getCityNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdCityName);
        $this->assertSame($createdCityName, $model->getCityName());

        // Property CountryID

        $testValue = new CountryIDType();
        $model->setCountryID($testValue);

        $this->assertEquals($testValue, $model->getCountryID());

        $model->unsetCountryID();

        $this->assertNull($model->getCountryID());

        $createdCountryID = $model->getCountryIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $createdCountryID);
        $this->assertSame($createdCountryID, $model->getCountryID());

        // Property CountrySubDivisionName

        $testValue = new TextType();
        $model->setCountrySubDivisionName($testValue);

        $this->assertEquals($testValue, $model->getCountrySubDivisionName());

        $model->unsetCountrySubDivisionName();

        $this->assertNull($model->getCountrySubDivisionName());

        $createdCountrySubDivisionName = $model->getCountrySubDivisionNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdCountrySubDivisionName);
        $this->assertSame($createdCountrySubDivisionName, $model->getCountrySubDivisionName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeAllowanceChargeType.
     */
    public function testModelsZffxbasicRamTradeAllowanceChargeType(): void
    {
        $model = new TradeAllowanceChargeType();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $model);

        // Property ChargeIndicator

        $testValue = new IndicatorType();
        $model->setChargeIndicator($testValue);

        $this->assertEquals($testValue, $model->getChargeIndicator());

        $model->unsetChargeIndicator();

        $this->assertNull($model->getChargeIndicator());

        $createdChargeIndicator = $model->getChargeIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $createdChargeIndicator);
        $this->assertSame($createdChargeIndicator, $model->getChargeIndicator());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $createdCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $createdCalculationPercent);
        $this->assertSame($createdCalculationPercent, $model->getCalculationPercent());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $createdBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdBasisAmount);
        $this->assertSame($createdBasisAmount, $model->getBasisAmount());

        // Property ActualAmount

        $testValue = new AmountType();
        $model->setActualAmount($testValue);

        $this->assertEquals($testValue, $model->getActualAmount());

        $model->unsetActualAmount();

        $this->assertNull($model->getActualAmount());

        $createdActualAmount = $model->getActualAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdActualAmount);
        $this->assertSame($createdActualAmount, $model->getActualAmount());

        // Property ReasonCode

        $testValue = new AllowanceChargeReasonCodeType();
        $model->setReasonCode($testValue);

        $this->assertEquals($testValue, $model->getReasonCode());

        $model->unsetReasonCode();

        $this->assertNull($model->getReasonCode());

        $createdReasonCode = $model->getReasonCodeWithCreate();

        $this->assertInstanceOf(AllowanceChargeReasonCodeType::class, $createdReasonCode);
        $this->assertSame($createdReasonCode, $model->getReasonCode());

        // Property Reason

        $testValue = new TextType();
        $model->setReason($testValue);

        $this->assertEquals($testValue, $model->getReason());

        $model->unsetReason();

        $this->assertNull($model->getReason());

        $createdReason = $model->getReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $createdReason);
        $this->assertSame($createdReason, $model->getReason());

        // Property CategoryTradeTax

        $testValue = new TradeTaxType();
        $model->setCategoryTradeTax($testValue);

        $this->assertEquals($testValue, $model->getCategoryTradeTax());

        $model->unsetCategoryTradeTax();

        $this->assertNull($model->getCategoryTradeTax());

        $createdCategoryTradeTax = $model->getCategoryTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdCategoryTradeTax);
        $this->assertSame($createdCategoryTradeTax, $model->getCategoryTradeTax());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePartyType.
     */
    public function testModelsZffxbasicRamTradePartyType(): void
    {
        $model = new TradePartyType();

        $this->assertInstanceOf(TradePartyType::class, $model);

        // Property ID

        $iDItems = [];
        $model->setID($iDItems);

        $this->assertIsArray($model->getID());
        $this->assertCount(0, $model->getID());

        $iDItem = new IDType();
        $model->addToID($iDItem);

        $this->assertIsArray($model->getID());
        $this->assertGreaterThanOrEqual(1, count($model->getID()));

        $createdIDItem = $model->addToIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIDItem);

        $iDOnceItem = new IDType();

        $model->addOnceToID($iDOnceItem);
        $model->addOnceToID($iDOnceItem);

        $itemsAfterOnce = $model->getID();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearID();

        $itemsAfterClear = $model->getID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property GlobalID

        $globalIDItems = [];
        $model->setGlobalID($globalIDItems);

        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(0, $model->getGlobalID());

        $globalIDItem = new IDType();
        $model->addToGlobalID($globalIDItem);

        $this->assertIsArray($model->getGlobalID());
        $this->assertGreaterThanOrEqual(1, count($model->getGlobalID()));

        $createdGlobalIDItem = $model->addToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdGlobalIDItem);

        $globalIDOnceItem = new IDType();

        $model->addOnceToGlobalID($globalIDOnceItem);
        $model->addOnceToGlobalID($globalIDOnceItem);

        $itemsAfterOnce = $model->getGlobalID();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearGlobalID();

        $itemsAfterClear = $model->getGlobalID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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

        // Property URIUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setURIUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getURIUniversalCommunication());

        $model->unsetURIUniversalCommunication();

        $this->assertNull($model->getURIUniversalCommunication());

        $createdURIUniversalCommunication = $model->getURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdURIUniversalCommunication);
        $this->assertSame($createdURIUniversalCommunication, $model->getURIUniversalCommunication());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePaymentTermsType.
     */
    public function testModelsZffxbasicRamTradePaymentTermsType(): void
    {
        $model = new TradePaymentTermsType();

        $this->assertInstanceOf(TradePaymentTermsType::class, $model);

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property DueDateDateTime

        $testValue = new DateTimeType();
        $model->setDueDateDateTime($testValue);

        $this->assertEquals($testValue, $model->getDueDateDateTime());

        $model->unsetDueDateDateTime();

        $this->assertNull($model->getDueDateDateTime());

        $createdDueDateDateTime = $model->getDueDateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdDueDateDateTime);
        $this->assertSame($createdDueDateDateTime, $model->getDueDateDateTime());

        // Property DirectDebitMandateID

        $testValue = new IDType();
        $model->setDirectDebitMandateID($testValue);

        $this->assertEquals($testValue, $model->getDirectDebitMandateID());

        $model->unsetDirectDebitMandateID();

        $this->assertNull($model->getDirectDebitMandateID());

        $createdDirectDebitMandateID = $model->getDirectDebitMandateIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdDirectDebitMandateID);
        $this->assertSame($createdDirectDebitMandateID, $model->getDirectDebitMandateID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradePriceType.
     */
    public function testModelsZffxbasicRamTradePriceType(): void
    {
        $model = new TradePriceType();

        $this->assertInstanceOf(TradePriceType::class, $model);

        // Property ChargeAmount

        $testValue = new AmountType();
        $model->setChargeAmount($testValue);

        $this->assertEquals($testValue, $model->getChargeAmount());

        $model->unsetChargeAmount();

        $this->assertNull($model->getChargeAmount());

        $createdChargeAmount = $model->getChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdChargeAmount);
        $this->assertSame($createdChargeAmount, $model->getChargeAmount());

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNull($model->getBasisQuantity());

        $createdBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdBasisQuantity);
        $this->assertSame($createdBasisQuantity, $model->getBasisQuantity());

        // Property AppliedTradeAllowanceCharge

        $model->unsetAppliedTradeAllowanceCharge();

        $this->assertNull($model->getAppliedTradeAllowanceCharge());

        $createdAppliedTradeAllowanceCharge = $model->getAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $createdAppliedTradeAllowanceCharge);
        $this->assertSame($createdAppliedTradeAllowanceCharge, $model->getAppliedTradeAllowanceCharge());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeProductType.
     */
    public function testModelsZffxbasicRamTradeProductType(): void
    {
        $model = new TradeProductType();

        $this->assertInstanceOf(TradeProductType::class, $model);

        // Property GlobalID

        $testValue = new IDType();
        $model->setGlobalID($testValue);

        $this->assertEquals($testValue, $model->getGlobalID());

        $model->unsetGlobalID();

        $this->assertNull($model->getGlobalID());

        $createdGlobalID = $model->getGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdGlobalID);
        $this->assertSame($createdGlobalID, $model->getGlobalID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $createdName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdName);
        $this->assertSame($createdName, $model->getName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementHeaderMonetarySummationType.
     */
    public function testModelsZffxbasicRamTradeSettlementHeaderMonetarySummationType(): void
    {
        $model = new TradeSettlementHeaderMonetarySummationType();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $model);

        // Property LineTotalAmount

        $testValue = new AmountType();
        $model->setLineTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalAmount());

        $model->unsetLineTotalAmount();

        $this->assertNull($model->getLineTotalAmount());

        $createdLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdLineTotalAmount);
        $this->assertSame($createdLineTotalAmount, $model->getLineTotalAmount());

        // Property ChargeTotalAmount

        $testValue = new AmountType();
        $model->setChargeTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getChargeTotalAmount());

        $model->unsetChargeTotalAmount();

        $this->assertNull($model->getChargeTotalAmount());

        $createdChargeTotalAmount = $model->getChargeTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdChargeTotalAmount);
        $this->assertSame($createdChargeTotalAmount, $model->getChargeTotalAmount());

        // Property AllowanceTotalAmount

        $testValue = new AmountType();
        $model->setAllowanceTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceTotalAmount());

        $model->unsetAllowanceTotalAmount();

        $this->assertNull($model->getAllowanceTotalAmount());

        $createdAllowanceTotalAmount = $model->getAllowanceTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdAllowanceTotalAmount);
        $this->assertSame($createdAllowanceTotalAmount, $model->getAllowanceTotalAmount());

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

        // Property TotalPrepaidAmount

        $testValue = new AmountType();
        $model->setTotalPrepaidAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalPrepaidAmount());

        $model->unsetTotalPrepaidAmount();

        $this->assertNull($model->getTotalPrepaidAmount());

        $createdTotalPrepaidAmount = $model->getTotalPrepaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdTotalPrepaidAmount);
        $this->assertSame($createdTotalPrepaidAmount, $model->getTotalPrepaidAmount());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementLineMonetarySummationType.
     */
    public function testModelsZffxbasicRamTradeSettlementLineMonetarySummationType(): void
    {
        $model = new TradeSettlementLineMonetarySummationType();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $model);

        // Property LineTotalAmount

        $testValue = new AmountType();
        $model->setLineTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalAmount());

        $model->unsetLineTotalAmount();

        $this->assertNull($model->getLineTotalAmount());

        $createdLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdLineTotalAmount);
        $this->assertSame($createdLineTotalAmount, $model->getLineTotalAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeSettlementPaymentMeansType.
     */
    public function testModelsZffxbasicRamTradeSettlementPaymentMeansType(): void
    {
        $model = new TradeSettlementPaymentMeansType();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $model);

        // Property TypeCode

        $testValue = new PaymentMeansCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property PayerPartyDebtorFinancialAccount

        $model->unsetPayerPartyDebtorFinancialAccount();

        $this->assertNull($model->getPayerPartyDebtorFinancialAccount());

        $createdPayerPartyDebtorFinancialAccount = $model->getPayerPartyDebtorFinancialAccountWithCreate();

        $this->assertInstanceOf(DebtorFinancialAccountType::class, $createdPayerPartyDebtorFinancialAccount);
        $this->assertSame($createdPayerPartyDebtorFinancialAccount, $model->getPayerPartyDebtorFinancialAccount());

        // Property PayeePartyCreditorFinancialAccount

        $model->unsetPayeePartyCreditorFinancialAccount();

        $this->assertNull($model->getPayeePartyCreditorFinancialAccount());

        $createdPayeePartyCreditorFinancialAccount = $model->getPayeePartyCreditorFinancialAccountWithCreate();

        $this->assertInstanceOf(CreditorFinancialAccountType::class, $createdPayeePartyCreditorFinancialAccount);
        $this->assertSame($createdPayeePartyCreditorFinancialAccount, $model->getPayeePartyCreditorFinancialAccount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\TradeTaxType.
     */
    public function testModelsZffxbasicRamTradeTaxType(): void
    {
        $model = new TradeTaxType();

        $this->assertInstanceOf(TradeTaxType::class, $model);

        // Property CalculatedAmount

        $testValue = new AmountType();
        $model->setCalculatedAmount($testValue);

        $this->assertEquals($testValue, $model->getCalculatedAmount());

        $model->unsetCalculatedAmount();

        $this->assertNull($model->getCalculatedAmount());

        $createdCalculatedAmount = $model->getCalculatedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdCalculatedAmount);
        $this->assertSame($createdCalculatedAmount, $model->getCalculatedAmount());

        // Property TypeCode

        $testValue = new TaxTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(TaxTypeCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property ExemptionReason

        $testValue = new TextType();
        $model->setExemptionReason($testValue);

        $this->assertEquals($testValue, $model->getExemptionReason());

        $model->unsetExemptionReason();

        $this->assertNull($model->getExemptionReason());

        $createdExemptionReason = $model->getExemptionReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $createdExemptionReason);
        $this->assertSame($createdExemptionReason, $model->getExemptionReason());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $createdBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdBasisAmount);
        $this->assertSame($createdBasisAmount, $model->getBasisAmount());

        // Property CategoryCode

        $testValue = new TaxCategoryCodeType();
        $model->setCategoryCode($testValue);

        $this->assertEquals($testValue, $model->getCategoryCode());

        $model->unsetCategoryCode();

        $this->assertNull($model->getCategoryCode());

        $createdCategoryCode = $model->getCategoryCodeWithCreate();

        $this->assertInstanceOf(TaxCategoryCodeType::class, $createdCategoryCode);
        $this->assertSame($createdCategoryCode, $model->getCategoryCode());

        // Property ExemptionReasonCode

        $testValue = new CodeType();
        $model->setExemptionReasonCode($testValue);

        $this->assertEquals($testValue, $model->getExemptionReasonCode());

        $model->unsetExemptionReasonCode();

        $this->assertNull($model->getExemptionReasonCode());

        $createdExemptionReasonCode = $model->getExemptionReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdExemptionReasonCode);
        $this->assertSame($createdExemptionReasonCode, $model->getExemptionReasonCode());

        // Property DueDateTypeCode

        $testValue = new TimeReferenceCodeType();
        $model->setDueDateTypeCode($testValue);

        $this->assertEquals($testValue, $model->getDueDateTypeCode());

        $model->unsetDueDateTypeCode();

        $this->assertNull($model->getDueDateTypeCode());

        $createdDueDateTypeCode = $model->getDueDateTypeCodeWithCreate();

        $this->assertInstanceOf(TimeReferenceCodeType::class, $createdDueDateTypeCode);
        $this->assertSame($createdDueDateTypeCode, $model->getDueDateTypeCode());

        // Property RateApplicablePercent

        $testValue = new PercentType();
        $model->setRateApplicablePercent($testValue);

        $this->assertEquals($testValue, $model->getRateApplicablePercent());

        $model->unsetRateApplicablePercent();

        $this->assertNull($model->getRateApplicablePercent());

        $createdRateApplicablePercent = $model->getRateApplicablePercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $createdRateApplicablePercent);
        $this->assertSame($createdRateApplicablePercent, $model->getRateApplicablePercent());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\UniversalCommunicationType.
     */
    public function testModelsZffxbasicRamUniversalCommunicationType(): void
    {
        $model = new UniversalCommunicationType();

        $this->assertInstanceOf(UniversalCommunicationType::class, $model);

        // Property URIID

        $testValue = new IDType();
        $model->setURIID($testValue);

        $this->assertEquals($testValue, $model->getURIID());

        $model->unsetURIID();

        $this->assertNull($model->getURIID());

        $createdURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdURIID);
        $this->assertSame($createdURIID, $model->getURIID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxbasicRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\rsm\CrossIndustryInvoiceType.
     */
    public function testModelsZffxbasicRsmCrossIndustryInvoiceType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\AmountType.
     */
    public function testModelsZffxbasicUdtAmountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\CodeType.
     */
    public function testModelsZffxbasicUdtCodeType(): void
    {
        $model = new CodeType();

        $this->assertInstanceOf(CodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxbasicUdtDatetimetypeDateTimeStringAType(): void
    {
        $model = new DateTimeStringAType1();

        $this->assertInstanceOf(DateTimeStringAType1::class, $model);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\DateTimeType.
     */
    public function testModelsZffxbasicUdtDateTimeType(): void
    {
        $model = new DateTimeType();

        $this->assertInstanceOf(DateTimeType::class, $model);

        // Property DateTimeString

        $testValue = new DateTimeStringAType1();
        $model->setDateTimeString($testValue);

        $this->assertEquals($testValue, $model->getDateTimeString());

        $model->unsetDateTimeString();

        $this->assertNull($model->getDateTimeString());

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\IDType.
     */
    public function testModelsZffxbasicUdtIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\IndicatorType.
     */
    public function testModelsZffxbasicUdtIndicatorType(): void
    {
        $model = new IndicatorType();

        $this->assertInstanceOf(IndicatorType::class, $model);

        // Property Indicator

        $testValue = true;
        $model->setIndicator($testValue);

        $this->assertEquals($testValue, $model->getIndicator());

        $model->unsetIndicator();

        $this->assertNull($model->getIndicator());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\PercentType.
     */
    public function testModelsZffxbasicUdtPercentType(): void
    {
        $model = new PercentType();

        $this->assertInstanceOf(PercentType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\QuantityType.
     */
    public function testModelsZffxbasicUdtQuantityType(): void
    {
        $model = new QuantityType();

        $this->assertInstanceOf(QuantityType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property UnitCode

        $testValue = 'dummy-UnitCodeValue';
        $model->setUnitCode($testValue);

        $this->assertEquals($testValue, $model->getUnitCode());

        $model->unsetUnitCode();

        $this->assertNull($model->getUnitCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\udt\TextType.
     */
    public function testModelsZffxbasicUdtTextType(): void
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
