<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\FormattedDateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\CreditorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\DebtorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\NoteType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SpecifiedPeriodType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SupplyChainEventType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAccountingAccountType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAllowanceChargeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradePartyType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeSettlementPaymentMeansType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeTaxType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\UniversalCommunicationType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\CodeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType as DateTimeStringAType1;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\IndicatorType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\PercentType;
use horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxBasicWlModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\AllowanceChargeReasonCodeType.
     */
    public function testModelsZffxbasicwlQdtAllowanceChargeReasonCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\CountryIDType.
     */
    public function testModelsZffxbasicwlQdtCountryIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\CurrencyCodeType.
     */
    public function testModelsZffxbasicwlQdtCurrencyCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\DocumentCodeType.
     */
    public function testModelsZffxbasicwlQdtDocumentCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\FormattedDateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxbasicwlQdtFormatteddatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\FormattedDateTimeType.
     */
    public function testModelsZffxbasicwlQdtFormattedDateTimeType(): void
    {
        $model = new FormattedDateTimeType();

        $this->assertInstanceOf(FormattedDateTimeType::class, $model);

        // Property DateTimeString

        $testValue = new DateTimeStringAType();
        $model->setDateTimeString($testValue);

        $this->assertEquals($testValue, $model->getDateTimeString());

        $model->unsetDateTimeString();

        $this->assertNull($model->getDateTimeString());

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\PaymentMeansCodeType.
     */
    public function testModelsZffxbasicwlQdtPaymentMeansCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TaxCategoryCodeType.
     */
    public function testModelsZffxbasicwlQdtTaxCategoryCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TaxTypeCodeType.
     */
    public function testModelsZffxbasicwlQdtTaxTypeCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\qdt\TimeReferenceCodeType.
     */
    public function testModelsZffxbasicwlQdtTimeReferenceCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\CreditorFinancialAccountType.
     */
    public function testModelsZffxbasicwlRamCreditorFinancialAccountType(): void
    {
        $model = new CreditorFinancialAccountType();

        $this->assertInstanceOf(CreditorFinancialAccountType::class, $model);

        // Property IBANID

        $testValue = new IDType();
        $model->setIBANID($testValue);

        $this->assertEquals($testValue, $model->getIBANID());

        $model->unsetIBANID();

        $this->assertNull($model->getIBANID());

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());

        // Property ProprietaryID

        $testValue = new IDType();
        $model->setProprietaryID($testValue);

        $this->assertEquals($testValue, $model->getProprietaryID());

        $model->unsetProprietaryID();

        $this->assertNull($model->getProprietaryID());

        $testValueForProprietaryID = $model->getProprietaryIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForProprietaryID);
        $this->assertSame($testValueForProprietaryID, $model->getProprietaryID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\DebtorFinancialAccountType.
     */
    public function testModelsZffxbasicwlRamDebtorFinancialAccountType(): void
    {
        $model = new DebtorFinancialAccountType();

        $this->assertInstanceOf(DebtorFinancialAccountType::class, $model);

        // Property IBANID

        $testValue = new IDType();
        $model->setIBANID($testValue);

        $this->assertEquals($testValue, $model->getIBANID());

        $model->unsetIBANID();

        $this->assertNull($model->getIBANID());

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\DocumentContextParameterType.
     */
    public function testModelsZffxbasicwlRamDocumentContextParameterType(): void
    {
        $model = new DocumentContextParameterType();

        $this->assertInstanceOf(DocumentContextParameterType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxbasicwlRamExchangedDocumentContextType(): void
    {
        $model = new ExchangedDocumentContextType();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $model);

        // Property BusinessProcessSpecifiedDocumentContextParameter

        $testValue = new DocumentContextParameterType();
        $model->setBusinessProcessSpecifiedDocumentContextParameter($testValue);

        $this->assertEquals($testValue, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        $model->unsetBusinessProcessSpecifiedDocumentContextParameter();

        $this->assertNull($model->getBusinessProcessSpecifiedDocumentContextParameter());

        $testValueForBusinessProcessSpecifiedDocumentContextParameter = $model->getBusinessProcessSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $testValueForBusinessProcessSpecifiedDocumentContextParameter);
        $this->assertSame($testValueForBusinessProcessSpecifiedDocumentContextParameter, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        // Property GuidelineSpecifiedDocumentContextParameter

        $testValue = new DocumentContextParameterType();
        $model->setGuidelineSpecifiedDocumentContextParameter($testValue);

        $this->assertEquals($testValue, $model->getGuidelineSpecifiedDocumentContextParameter());

        $model->unsetGuidelineSpecifiedDocumentContextParameter();

        $this->assertNull($model->getGuidelineSpecifiedDocumentContextParameter());

        $testValueForGuidelineSpecifiedDocumentContextParameter = $model->getGuidelineSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $testValueForGuidelineSpecifiedDocumentContextParameter);
        $this->assertSame($testValueForGuidelineSpecifiedDocumentContextParameter, $model->getGuidelineSpecifiedDocumentContextParameter());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ExchangedDocumentType.
     */
    public function testModelsZffxbasicwlRamExchangedDocumentType(): void
    {
        $model = new ExchangedDocumentType();

        $this->assertInstanceOf(ExchangedDocumentType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property IssueDateTime

        $testValue = new DateTimeType();
        $model->setIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getIssueDateTime());

        $model->unsetIssueDateTime();

        $this->assertNull($model->getIssueDateTime());

        $testValueForIssueDateTime = $model->getIssueDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForIssueDateTime);
        $this->assertSame($testValueForIssueDateTime, $model->getIssueDateTime());

        // Property IncludedNote

        $includedNoteItems = [];
        $model->setIncludedNote($includedNoteItems);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(0, $model->getIncludedNote());

        $includedNoteItem = new NoteType();
        $model->addToIncludedNote($includedNoteItem);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedNote()));

        $testValueForIncludedNoteItem = $model->addToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $testValueForIncludedNoteItem);

        $includedNoteOnceItem = new NoteType();

        $model->addOnceToIncludedNote($includedNoteOnceItem);
        $model->addOnceToIncludedNote($includedNoteOnceItem);

        $itemsAfterOnce = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIncludedNoteOnceItem = $model->addOnceToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $testValueForIncludedNoteOnceItem);

        $itemsAfterOnceWithCreate = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearIncludedNote();

        $itemsAfterClear = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeAgreementType.
     */
    public function testModelsZffxbasicwlRamHeaderTradeAgreementType(): void
    {
        $model = new HeaderTradeAgreementType();

        $this->assertInstanceOf(HeaderTradeAgreementType::class, $model);

        // Property BuyerReference

        $testValue = new TextType();
        $model->setBuyerReference($testValue);

        $this->assertEquals($testValue, $model->getBuyerReference());

        $model->unsetBuyerReference();

        $this->assertNull($model->getBuyerReference());

        $testValueForBuyerReference = $model->getBuyerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForBuyerReference);
        $this->assertSame($testValueForBuyerReference, $model->getBuyerReference());

        // Property SellerTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTradeParty());

        $model->unsetSellerTradeParty();

        $this->assertNull($model->getSellerTradeParty());

        $testValueForSellerTradeParty = $model->getSellerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSellerTradeParty);
        $this->assertSame($testValueForSellerTradeParty, $model->getSellerTradeParty());

        // Property BuyerTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerTradeParty());

        $model->unsetBuyerTradeParty();

        $this->assertNull($model->getBuyerTradeParty());

        $testValueForBuyerTradeParty = $model->getBuyerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerTradeParty);
        $this->assertSame($testValueForBuyerTradeParty, $model->getBuyerTradeParty());

        // Property SellerTaxRepresentativeTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTaxRepresentativeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTaxRepresentativeTradeParty());

        $model->unsetSellerTaxRepresentativeTradeParty();

        $this->assertNull($model->getSellerTaxRepresentativeTradeParty());

        $testValueForSellerTaxRepresentativeTradeParty = $model->getSellerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSellerTaxRepresentativeTradeParty);
        $this->assertSame($testValueForSellerTaxRepresentativeTradeParty, $model->getSellerTaxRepresentativeTradeParty());

        // Property BuyerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setBuyerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getBuyerOrderReferencedDocument());

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNull($model->getBuyerOrderReferencedDocument());

        $testValueForBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForBuyerOrderReferencedDocument);
        $this->assertSame($testValueForBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

        // Property ContractReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setContractReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getContractReferencedDocument());

        $model->unsetContractReferencedDocument();

        $this->assertNull($model->getContractReferencedDocument());

        $testValueForContractReferencedDocument = $model->getContractReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForContractReferencedDocument);
        $this->assertSame($testValueForContractReferencedDocument, $model->getContractReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxbasicwlRamHeaderTradeDeliveryType(): void
    {
        $model = new HeaderTradeDeliveryType();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $model);

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNull($model->getShipToTradeParty());

        $testValueForShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipToTradeParty);
        $this->assertSame($testValueForShipToTradeParty, $model->getShipToTradeParty());

        // Property ActualDeliverySupplyChainEvent

        $testValue = new SupplyChainEventType();
        $model->setActualDeliverySupplyChainEvent($testValue);

        $this->assertEquals($testValue, $model->getActualDeliverySupplyChainEvent());

        $model->unsetActualDeliverySupplyChainEvent();

        $this->assertNull($model->getActualDeliverySupplyChainEvent());

        $testValueForActualDeliverySupplyChainEvent = $model->getActualDeliverySupplyChainEventWithCreate();

        $this->assertInstanceOf(SupplyChainEventType::class, $testValueForActualDeliverySupplyChainEvent);
        $this->assertSame($testValueForActualDeliverySupplyChainEvent, $model->getActualDeliverySupplyChainEvent());

        // Property DespatchAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDespatchAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDespatchAdviceReferencedDocument());

        $model->unsetDespatchAdviceReferencedDocument();

        $this->assertNull($model->getDespatchAdviceReferencedDocument());

        $testValueForDespatchAdviceReferencedDocument = $model->getDespatchAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDespatchAdviceReferencedDocument);
        $this->assertSame($testValueForDespatchAdviceReferencedDocument, $model->getDespatchAdviceReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\HeaderTradeSettlementType.
     */
    public function testModelsZffxbasicwlRamHeaderTradeSettlementType(): void
    {
        $model = new HeaderTradeSettlementType();

        $this->assertInstanceOf(HeaderTradeSettlementType::class, $model);

        // Property CreditorReferenceID

        $testValue = new IDType();
        $model->setCreditorReferenceID($testValue);

        $this->assertEquals($testValue, $model->getCreditorReferenceID());

        $model->unsetCreditorReferenceID();

        $this->assertNull($model->getCreditorReferenceID());

        $testValueForCreditorReferenceID = $model->getCreditorReferenceIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForCreditorReferenceID);
        $this->assertSame($testValueForCreditorReferenceID, $model->getCreditorReferenceID());

        // Property PaymentReference

        $testValue = new TextType();
        $model->setPaymentReference($testValue);

        $this->assertEquals($testValue, $model->getPaymentReference());

        $model->unsetPaymentReference();

        $this->assertNull($model->getPaymentReference());

        $testValueForPaymentReference = $model->getPaymentReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForPaymentReference);
        $this->assertSame($testValueForPaymentReference, $model->getPaymentReference());

        // Property TaxCurrencyCode

        $testValue = new CodeType();
        $model->setTaxCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTaxCurrencyCode());

        $model->unsetTaxCurrencyCode();

        $this->assertNull($model->getTaxCurrencyCode());

        $testValueForTaxCurrencyCode = $model->getTaxCurrencyCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForTaxCurrencyCode);
        $this->assertSame($testValueForTaxCurrencyCode, $model->getTaxCurrencyCode());

        // Property InvoiceCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setInvoiceCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getInvoiceCurrencyCode());

        $model->unsetInvoiceCurrencyCode();

        $this->assertNull($model->getInvoiceCurrencyCode());

        $testValueForInvoiceCurrencyCode = $model->getInvoiceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForInvoiceCurrencyCode);
        $this->assertSame($testValueForInvoiceCurrencyCode, $model->getInvoiceCurrencyCode());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $testValueForPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayeeTradeParty);
        $this->assertSame($testValueForPayeeTradeParty, $model->getPayeeTradeParty());

        // Property SpecifiedTradeSettlementPaymentMeans

        $specifiedTradeSettlementPaymentMeansItems = [];
        $model->setSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansItems);

        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertCount(0, $model->getSpecifiedTradeSettlementPaymentMeans());

        $specifiedTradeSettlementPaymentMeansItem = new TradeSettlementPaymentMeansType();
        $model->addToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansItem);

        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTradeSettlementPaymentMeans()));

        $testValueForSpecifiedTradeSettlementPaymentMeansItem = $model->addToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $testValueForSpecifiedTradeSettlementPaymentMeansItem);

        $specifiedTradeSettlementPaymentMeansOnceItem = new TradeSettlementPaymentMeansType();

        $model->addOnceToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansOnceItem);
        $model->addOnceToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedTradeSettlementPaymentMeansOnceItem = $model->addOnceToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $testValueForSpecifiedTradeSettlementPaymentMeansOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForApplicableTradeTaxItem = $model->addToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForApplicableTradeTaxItem);

        $applicableTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);
        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);

        $itemsAfterOnce = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForApplicableTradeTaxOnceItem = $model->addOnceToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForApplicableTradeTaxOnceItem);

        $itemsAfterOnceWithCreate = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForBillingSpecifiedPeriod = $model->getBillingSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $testValueForBillingSpecifiedPeriod);
        $this->assertSame($testValueForBillingSpecifiedPeriod, $model->getBillingSpecifiedPeriod());

        // Property SpecifiedTradeAllowanceCharge

        $specifiedTradeAllowanceChargeItems = [];
        $model->setSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(0, $model->getSpecifiedTradeAllowanceCharge());

        $specifiedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTradeAllowanceCharge()));

        $testValueForSpecifiedTradeAllowanceChargeItem = $model->addToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForSpecifiedTradeAllowanceChargeItem);

        $specifiedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);
        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedTradeAllowanceChargeOnceItem = $model->addOnceToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForSpecifiedTradeAllowanceChargeOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForSpecifiedTradePaymentTerms = $model->getSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $testValueForSpecifiedTradePaymentTerms);
        $this->assertSame($testValueForSpecifiedTradePaymentTerms, $model->getSpecifiedTradePaymentTerms());

        // Property SpecifiedTradeSettlementHeaderMonetarySummation

        $testValue = new TradeSettlementHeaderMonetarySummationType();
        $model->setSpecifiedTradeSettlementHeaderMonetarySummation($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $model->unsetSpecifiedTradeSettlementHeaderMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $testValueForSpecifiedTradeSettlementHeaderMonetarySummation = $model->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $testValueForSpecifiedTradeSettlementHeaderMonetarySummation);
        $this->assertSame($testValueForSpecifiedTradeSettlementHeaderMonetarySummation, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        // Property InvoiceReferencedDocument

        $invoiceReferencedDocumentItems = [];
        $model->setInvoiceReferencedDocument($invoiceReferencedDocumentItems);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertCount(0, $model->getInvoiceReferencedDocument());

        $invoiceReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToInvoiceReferencedDocument($invoiceReferencedDocumentItem);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getInvoiceReferencedDocument()));

        $testValueForInvoiceReferencedDocumentItem = $model->addToInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceReferencedDocumentItem);

        $invoiceReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);
        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForInvoiceReferencedDocumentOnceItem = $model->addOnceToInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceReferencedDocumentOnceItem);

        $itemsAfterOnceWithCreate = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearInvoiceReferencedDocument();

        $itemsAfterClear = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ReceivableSpecifiedTradeAccountingAccount

        $testValue = new TradeAccountingAccountType();
        $model->setReceivableSpecifiedTradeAccountingAccount($testValue);

        $this->assertEquals($testValue, $model->getReceivableSpecifiedTradeAccountingAccount());

        $model->unsetReceivableSpecifiedTradeAccountingAccount();

        $this->assertNull($model->getReceivableSpecifiedTradeAccountingAccount());

        $testValueForReceivableSpecifiedTradeAccountingAccount = $model->getReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $testValueForReceivableSpecifiedTradeAccountingAccount);
        $this->assertSame($testValueForReceivableSpecifiedTradeAccountingAccount, $model->getReceivableSpecifiedTradeAccountingAccount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\LegalOrganizationType.
     */
    public function testModelsZffxbasicwlRamLegalOrganizationType(): void
    {
        $model = new LegalOrganizationType();

        $this->assertInstanceOf(LegalOrganizationType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property TradingBusinessName

        $testValue = new TextType();
        $model->setTradingBusinessName($testValue);

        $this->assertEquals($testValue, $model->getTradingBusinessName());

        $model->unsetTradingBusinessName();

        $this->assertNull($model->getTradingBusinessName());

        $testValueForTradingBusinessName = $model->getTradingBusinessNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForTradingBusinessName);
        $this->assertSame($testValueForTradingBusinessName, $model->getTradingBusinessName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\NoteType.
     */
    public function testModelsZffxbasicwlRamNoteType(): void
    {
        $model = new NoteType();

        $this->assertInstanceOf(NoteType::class, $model);

        // Property Content

        $testValue = new TextType();
        $model->setContent($testValue);

        $this->assertEquals($testValue, $model->getContent());

        $model->unsetContent();

        $this->assertNull($model->getContent());

        $testValueForContent = $model->getContentWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForContent);
        $this->assertSame($testValueForContent, $model->getContent());

        // Property SubjectCode

        $testValue = new CodeType();
        $model->setSubjectCode($testValue);

        $this->assertEquals($testValue, $model->getSubjectCode());

        $model->unsetSubjectCode();

        $this->assertNull($model->getSubjectCode());

        $testValueForSubjectCode = $model->getSubjectCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForSubjectCode);
        $this->assertSame($testValueForSubjectCode, $model->getSubjectCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ReferencedDocumentType.
     */
    public function testModelsZffxbasicwlRamReferencedDocumentType(): void
    {
        $model = new ReferencedDocumentType();

        $this->assertInstanceOf(ReferencedDocumentType::class, $model);

        // Property IssuerAssignedID

        $testValue = new IDType();
        $model->setIssuerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIssuerAssignedID());

        $model->unsetIssuerAssignedID();

        $this->assertNull($model->getIssuerAssignedID());

        $testValueForIssuerAssignedID = $model->getIssuerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIssuerAssignedID);
        $this->assertSame($testValueForIssuerAssignedID, $model->getIssuerAssignedID());

        // Property FormattedIssueDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedIssueDateTime());

        $model->unsetFormattedIssueDateTime();

        $this->assertNull($model->getFormattedIssueDateTime());

        $testValueForFormattedIssueDateTime = $model->getFormattedIssueDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $testValueForFormattedIssueDateTime);
        $this->assertSame($testValueForFormattedIssueDateTime, $model->getFormattedIssueDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SpecifiedPeriodType.
     */
    public function testModelsZffxbasicwlRamSpecifiedPeriodType(): void
    {
        $model = new SpecifiedPeriodType();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $model);

        // Property StartDateTime

        $testValue = new DateTimeType();
        $model->setStartDateTime($testValue);

        $this->assertEquals($testValue, $model->getStartDateTime());

        $model->unsetStartDateTime();

        $this->assertNull($model->getStartDateTime());

        $testValueForStartDateTime = $model->getStartDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForStartDateTime);
        $this->assertSame($testValueForStartDateTime, $model->getStartDateTime());

        // Property EndDateTime

        $testValue = new DateTimeType();
        $model->setEndDateTime($testValue);

        $this->assertEquals($testValue, $model->getEndDateTime());

        $model->unsetEndDateTime();

        $this->assertNull($model->getEndDateTime());

        $testValueForEndDateTime = $model->getEndDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForEndDateTime);
        $this->assertSame($testValueForEndDateTime, $model->getEndDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SupplyChainEventType.
     */
    public function testModelsZffxbasicwlRamSupplyChainEventType(): void
    {
        $model = new SupplyChainEventType();

        $this->assertInstanceOf(SupplyChainEventType::class, $model);

        // Property OccurrenceDateTime

        $testValue = new DateTimeType();
        $model->setOccurrenceDateTime($testValue);

        $this->assertEquals($testValue, $model->getOccurrenceDateTime());

        $model->unsetOccurrenceDateTime();

        $this->assertNull($model->getOccurrenceDateTime());

        $testValueForOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForOccurrenceDateTime);
        $this->assertSame($testValueForOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxbasicwlRamSupplyChainTradeTransactionType(): void
    {
        $model = new SupplyChainTradeTransactionType();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $model);

        // Property ApplicableHeaderTradeAgreement

        $testValue = new HeaderTradeAgreementType();
        $model->setApplicableHeaderTradeAgreement($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeAgreement());

        $model->unsetApplicableHeaderTradeAgreement();

        $this->assertNull($model->getApplicableHeaderTradeAgreement());

        $testValueForApplicableHeaderTradeAgreement = $model->getApplicableHeaderTradeAgreementWithCreate();

        $this->assertInstanceOf(HeaderTradeAgreementType::class, $testValueForApplicableHeaderTradeAgreement);
        $this->assertSame($testValueForApplicableHeaderTradeAgreement, $model->getApplicableHeaderTradeAgreement());

        // Property ApplicableHeaderTradeDelivery

        $testValue = new HeaderTradeDeliveryType();
        $model->setApplicableHeaderTradeDelivery($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeDelivery());

        $model->unsetApplicableHeaderTradeDelivery();

        $this->assertNull($model->getApplicableHeaderTradeDelivery());

        $testValueForApplicableHeaderTradeDelivery = $model->getApplicableHeaderTradeDeliveryWithCreate();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $testValueForApplicableHeaderTradeDelivery);
        $this->assertSame($testValueForApplicableHeaderTradeDelivery, $model->getApplicableHeaderTradeDelivery());

        // Property ApplicableHeaderTradeSettlement

        $testValue = new HeaderTradeSettlementType();
        $model->setApplicableHeaderTradeSettlement($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeSettlement());

        $model->unsetApplicableHeaderTradeSettlement();

        $this->assertNull($model->getApplicableHeaderTradeSettlement());

        $testValueForApplicableHeaderTradeSettlement = $model->getApplicableHeaderTradeSettlementWithCreate();

        $this->assertInstanceOf(HeaderTradeSettlementType::class, $testValueForApplicableHeaderTradeSettlement);
        $this->assertSame($testValueForApplicableHeaderTradeSettlement, $model->getApplicableHeaderTradeSettlement());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TaxRegistrationType.
     */
    public function testModelsZffxbasicwlRamTaxRegistrationType(): void
    {
        $model = new TaxRegistrationType();

        $this->assertInstanceOf(TaxRegistrationType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAccountingAccountType.
     */
    public function testModelsZffxbasicwlRamTradeAccountingAccountType(): void
    {
        $model = new TradeAccountingAccountType();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAddressType.
     */
    public function testModelsZffxbasicwlRamTradeAddressType(): void
    {
        $model = new TradeAddressType();

        $this->assertInstanceOf(TradeAddressType::class, $model);

        // Property PostcodeCode

        $testValue = new CodeType();
        $model->setPostcodeCode($testValue);

        $this->assertEquals($testValue, $model->getPostcodeCode());

        $model->unsetPostcodeCode();

        $this->assertNull($model->getPostcodeCode());

        $testValueForPostcodeCode = $model->getPostcodeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForPostcodeCode);
        $this->assertSame($testValueForPostcodeCode, $model->getPostcodeCode());

        // Property LineOne

        $testValue = new TextType();
        $model->setLineOne($testValue);

        $this->assertEquals($testValue, $model->getLineOne());

        $model->unsetLineOne();

        $this->assertNull($model->getLineOne());

        $testValueForLineOne = $model->getLineOneWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineOne);
        $this->assertSame($testValueForLineOne, $model->getLineOne());

        // Property LineTwo

        $testValue = new TextType();
        $model->setLineTwo($testValue);

        $this->assertEquals($testValue, $model->getLineTwo());

        $model->unsetLineTwo();

        $this->assertNull($model->getLineTwo());

        $testValueForLineTwo = $model->getLineTwoWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineTwo);
        $this->assertSame($testValueForLineTwo, $model->getLineTwo());

        // Property LineThree

        $testValue = new TextType();
        $model->setLineThree($testValue);

        $this->assertEquals($testValue, $model->getLineThree());

        $model->unsetLineThree();

        $this->assertNull($model->getLineThree());

        $testValueForLineThree = $model->getLineThreeWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineThree);
        $this->assertSame($testValueForLineThree, $model->getLineThree());

        // Property CityName

        $testValue = new TextType();
        $model->setCityName($testValue);

        $this->assertEquals($testValue, $model->getCityName());

        $model->unsetCityName();

        $this->assertNull($model->getCityName());

        $testValueForCityName = $model->getCityNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCityName);
        $this->assertSame($testValueForCityName, $model->getCityName());

        // Property CountryID

        $testValue = new CountryIDType();
        $model->setCountryID($testValue);

        $this->assertEquals($testValue, $model->getCountryID());

        $model->unsetCountryID();

        $this->assertNull($model->getCountryID());

        $testValueForCountryID = $model->getCountryIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $testValueForCountryID);
        $this->assertSame($testValueForCountryID, $model->getCountryID());

        // Property CountrySubDivisionName

        $testValue = new TextType();
        $model->setCountrySubDivisionName($testValue);

        $this->assertEquals($testValue, $model->getCountrySubDivisionName());

        $model->unsetCountrySubDivisionName();

        $this->assertNull($model->getCountrySubDivisionName());

        $testValueForCountrySubDivisionName = $model->getCountrySubDivisionNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCountrySubDivisionName);
        $this->assertSame($testValueForCountrySubDivisionName, $model->getCountrySubDivisionName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeAllowanceChargeType.
     */
    public function testModelsZffxbasicwlRamTradeAllowanceChargeType(): void
    {
        $model = new TradeAllowanceChargeType();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $model);

        // Property ChargeIndicator

        $testValue = new IndicatorType();
        $model->setChargeIndicator($testValue);

        $this->assertEquals($testValue, $model->getChargeIndicator());

        $model->unsetChargeIndicator();

        $this->assertNull($model->getChargeIndicator());

        $testValueForChargeIndicator = $model->getChargeIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForChargeIndicator);
        $this->assertSame($testValueForChargeIndicator, $model->getChargeIndicator());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property ActualAmount

        $testValue = new AmountType();
        $model->setActualAmount($testValue);

        $this->assertEquals($testValue, $model->getActualAmount());

        $model->unsetActualAmount();

        $this->assertNull($model->getActualAmount());

        $testValueForActualAmount = $model->getActualAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualAmount);
        $this->assertSame($testValueForActualAmount, $model->getActualAmount());

        // Property ReasonCode

        $testValue = new AllowanceChargeReasonCodeType();
        $model->setReasonCode($testValue);

        $this->assertEquals($testValue, $model->getReasonCode());

        $model->unsetReasonCode();

        $this->assertNull($model->getReasonCode());

        $testValueForReasonCode = $model->getReasonCodeWithCreate();

        $this->assertInstanceOf(AllowanceChargeReasonCodeType::class, $testValueForReasonCode);
        $this->assertSame($testValueForReasonCode, $model->getReasonCode());

        // Property Reason

        $testValue = new TextType();
        $model->setReason($testValue);

        $this->assertEquals($testValue, $model->getReason());

        $model->unsetReason();

        $this->assertNull($model->getReason());

        $testValueForReason = $model->getReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForReason);
        $this->assertSame($testValueForReason, $model->getReason());

        // Property CategoryTradeTax

        $testValue = new TradeTaxType();
        $model->setCategoryTradeTax($testValue);

        $this->assertEquals($testValue, $model->getCategoryTradeTax());

        $model->unsetCategoryTradeTax();

        $this->assertNull($model->getCategoryTradeTax());

        $testValueForCategoryTradeTax = $model->getCategoryTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForCategoryTradeTax);
        $this->assertSame($testValueForCategoryTradeTax, $model->getCategoryTradeTax());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradePartyType.
     */
    public function testModelsZffxbasicwlRamTradePartyType(): void
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

        $testValueForIDItem = $model->addToIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIDItem);

        $iDOnceItem = new IDType();

        $model->addOnceToID($iDOnceItem);
        $model->addOnceToID($iDOnceItem);

        $itemsAfterOnce = $model->getID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIDOnceItem = $model->addOnceToIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIDOnceItem);

        $itemsAfterOnceWithCreate = $model->getID();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForGlobalIDItem = $model->addToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalIDItem);

        $globalIDOnceItem = new IDType();

        $model->addOnceToGlobalID($globalIDOnceItem);
        $model->addOnceToGlobalID($globalIDOnceItem);

        $itemsAfterOnce = $model->getGlobalID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForGlobalIDOnceItem = $model->addOnceToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalIDOnceItem);

        $itemsAfterOnceWithCreate = $model->getGlobalID();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property SpecifiedLegalOrganization

        $testValue = new LegalOrganizationType();
        $model->setSpecifiedLegalOrganization($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLegalOrganization());

        $model->unsetSpecifiedLegalOrganization();

        $this->assertNull($model->getSpecifiedLegalOrganization());

        $testValueForSpecifiedLegalOrganization = $model->getSpecifiedLegalOrganizationWithCreate();

        $this->assertInstanceOf(LegalOrganizationType::class, $testValueForSpecifiedLegalOrganization);
        $this->assertSame($testValueForSpecifiedLegalOrganization, $model->getSpecifiedLegalOrganization());

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNull($model->getPostalTradeAddress());

        $testValueForPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $testValueForPostalTradeAddress);
        $this->assertSame($testValueForPostalTradeAddress, $model->getPostalTradeAddress());

        // Property URIUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setURIUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getURIUniversalCommunication());

        $model->unsetURIUniversalCommunication();

        $this->assertNull($model->getURIUniversalCommunication());

        $testValueForURIUniversalCommunication = $model->getURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForURIUniversalCommunication);
        $this->assertSame($testValueForURIUniversalCommunication, $model->getURIUniversalCommunication());

        // Property SpecifiedTaxRegistration

        $specifiedTaxRegistrationItems = [];
        $model->setSpecifiedTaxRegistration($specifiedTaxRegistrationItems);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertCount(0, $model->getSpecifiedTaxRegistration());

        $specifiedTaxRegistrationItem = new TaxRegistrationType();
        $model->addToSpecifiedTaxRegistration($specifiedTaxRegistrationItem);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTaxRegistration()));

        $testValueForSpecifiedTaxRegistrationItem = $model->addToSpecifiedTaxRegistrationWithCreate();

        $this->assertInstanceOf(TaxRegistrationType::class, $testValueForSpecifiedTaxRegistrationItem);

        $specifiedTaxRegistrationOnceItem = new TaxRegistrationType();

        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);
        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedTaxRegistrationOnceItem = $model->addOnceToSpecifiedTaxRegistrationWithCreate();

        $this->assertInstanceOf(TaxRegistrationType::class, $testValueForSpecifiedTaxRegistrationOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearSpecifiedTaxRegistration();

        $itemsAfterClear = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradePaymentTermsType.
     */
    public function testModelsZffxbasicwlRamTradePaymentTermsType(): void
    {
        $model = new TradePaymentTermsType();

        $this->assertInstanceOf(TradePaymentTermsType::class, $model);

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property DueDateDateTime

        $testValue = new DateTimeType();
        $model->setDueDateDateTime($testValue);

        $this->assertEquals($testValue, $model->getDueDateDateTime());

        $model->unsetDueDateDateTime();

        $this->assertNull($model->getDueDateDateTime());

        $testValueForDueDateDateTime = $model->getDueDateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForDueDateDateTime);
        $this->assertSame($testValueForDueDateDateTime, $model->getDueDateDateTime());

        // Property DirectDebitMandateID

        $testValue = new IDType();
        $model->setDirectDebitMandateID($testValue);

        $this->assertEquals($testValue, $model->getDirectDebitMandateID());

        $model->unsetDirectDebitMandateID();

        $this->assertNull($model->getDirectDebitMandateID());

        $testValueForDirectDebitMandateID = $model->getDirectDebitMandateIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForDirectDebitMandateID);
        $this->assertSame($testValueForDirectDebitMandateID, $model->getDirectDebitMandateID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeSettlementHeaderMonetarySummationType.
     */
    public function testModelsZffxbasicwlRamTradeSettlementHeaderMonetarySummationType(): void
    {
        $model = new TradeSettlementHeaderMonetarySummationType();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $model);

        // Property LineTotalAmount

        $testValue = new AmountType();
        $model->setLineTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalAmount());

        $model->unsetLineTotalAmount();

        $this->assertNull($model->getLineTotalAmount());

        $testValueForLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalAmount);
        $this->assertSame($testValueForLineTotalAmount, $model->getLineTotalAmount());

        // Property ChargeTotalAmount

        $testValue = new AmountType();
        $model->setChargeTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getChargeTotalAmount());

        $model->unsetChargeTotalAmount();

        $this->assertNull($model->getChargeTotalAmount());

        $testValueForChargeTotalAmount = $model->getChargeTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForChargeTotalAmount);
        $this->assertSame($testValueForChargeTotalAmount, $model->getChargeTotalAmount());

        // Property AllowanceTotalAmount

        $testValue = new AmountType();
        $model->setAllowanceTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceTotalAmount());

        $model->unsetAllowanceTotalAmount();

        $this->assertNull($model->getAllowanceTotalAmount());

        $testValueForAllowanceTotalAmount = $model->getAllowanceTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAllowanceTotalAmount);
        $this->assertSame($testValueForAllowanceTotalAmount, $model->getAllowanceTotalAmount());

        // Property TaxBasisTotalAmount

        $testValue = new AmountType();
        $model->setTaxBasisTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxBasisTotalAmount());

        $model->unsetTaxBasisTotalAmount();

        $this->assertNull($model->getTaxBasisTotalAmount());

        $testValueForTaxBasisTotalAmount = $model->getTaxBasisTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxBasisTotalAmount);
        $this->assertSame($testValueForTaxBasisTotalAmount, $model->getTaxBasisTotalAmount());

        // Property TaxTotalAmount

        $taxTotalAmountItems = [];
        $model->setTaxTotalAmount($taxTotalAmountItems);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertCount(0, $model->getTaxTotalAmount());

        $taxTotalAmountItem = new AmountType();
        $model->addToTaxTotalAmount($taxTotalAmountItem);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertGreaterThanOrEqual(1, count($model->getTaxTotalAmount()));

        $testValueForTaxTotalAmountItem = $model->addToTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxTotalAmountItem);

        $taxTotalAmountOnceItem = new AmountType();

        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);
        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);

        $itemsAfterOnce = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForTaxTotalAmountOnceItem = $model->addOnceToTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxTotalAmountOnceItem);

        $itemsAfterOnceWithCreate = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForGrandTotalAmount);
        $this->assertSame($testValueForGrandTotalAmount, $model->getGrandTotalAmount());

        // Property TotalPrepaidAmount

        $testValue = new AmountType();
        $model->setTotalPrepaidAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalPrepaidAmount());

        $model->unsetTotalPrepaidAmount();

        $this->assertNull($model->getTotalPrepaidAmount());

        $testValueForTotalPrepaidAmount = $model->getTotalPrepaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTotalPrepaidAmount);
        $this->assertSame($testValueForTotalPrepaidAmount, $model->getTotalPrepaidAmount());

        // Property DuePayableAmount

        $testValue = new AmountType();
        $model->setDuePayableAmount($testValue);

        $this->assertEquals($testValue, $model->getDuePayableAmount());

        $model->unsetDuePayableAmount();

        $this->assertNull($model->getDuePayableAmount());

        $testValueForDuePayableAmount = $model->getDuePayableAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForDuePayableAmount);
        $this->assertSame($testValueForDuePayableAmount, $model->getDuePayableAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeSettlementPaymentMeansType.
     */
    public function testModelsZffxbasicwlRamTradeSettlementPaymentMeansType(): void
    {
        $model = new TradeSettlementPaymentMeansType();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $model);

        // Property TypeCode

        $testValue = new PaymentMeansCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property PayerPartyDebtorFinancialAccount

        $testValue = new DebtorFinancialAccountType();
        $model->setPayerPartyDebtorFinancialAccount($testValue);

        $this->assertEquals($testValue, $model->getPayerPartyDebtorFinancialAccount());

        $model->unsetPayerPartyDebtorFinancialAccount();

        $this->assertNull($model->getPayerPartyDebtorFinancialAccount());

        $testValueForPayerPartyDebtorFinancialAccount = $model->getPayerPartyDebtorFinancialAccountWithCreate();

        $this->assertInstanceOf(DebtorFinancialAccountType::class, $testValueForPayerPartyDebtorFinancialAccount);
        $this->assertSame($testValueForPayerPartyDebtorFinancialAccount, $model->getPayerPartyDebtorFinancialAccount());

        // Property PayeePartyCreditorFinancialAccount

        $testValue = new CreditorFinancialAccountType();
        $model->setPayeePartyCreditorFinancialAccount($testValue);

        $this->assertEquals($testValue, $model->getPayeePartyCreditorFinancialAccount());

        $model->unsetPayeePartyCreditorFinancialAccount();

        $this->assertNull($model->getPayeePartyCreditorFinancialAccount());

        $testValueForPayeePartyCreditorFinancialAccount = $model->getPayeePartyCreditorFinancialAccountWithCreate();

        $this->assertInstanceOf(CreditorFinancialAccountType::class, $testValueForPayeePartyCreditorFinancialAccount);
        $this->assertSame($testValueForPayeePartyCreditorFinancialAccount, $model->getPayeePartyCreditorFinancialAccount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\TradeTaxType.
     */
    public function testModelsZffxbasicwlRamTradeTaxType(): void
    {
        $model = new TradeTaxType();

        $this->assertInstanceOf(TradeTaxType::class, $model);

        // Property CalculatedAmount

        $testValue = new AmountType();
        $model->setCalculatedAmount($testValue);

        $this->assertEquals($testValue, $model->getCalculatedAmount());

        $model->unsetCalculatedAmount();

        $this->assertNull($model->getCalculatedAmount());

        $testValueForCalculatedAmount = $model->getCalculatedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForCalculatedAmount);
        $this->assertSame($testValueForCalculatedAmount, $model->getCalculatedAmount());

        // Property TypeCode

        $testValue = new TaxTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(TaxTypeCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property ExemptionReason

        $testValue = new TextType();
        $model->setExemptionReason($testValue);

        $this->assertEquals($testValue, $model->getExemptionReason());

        $model->unsetExemptionReason();

        $this->assertNull($model->getExemptionReason());

        $testValueForExemptionReason = $model->getExemptionReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForExemptionReason);
        $this->assertSame($testValueForExemptionReason, $model->getExemptionReason());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property CategoryCode

        $testValue = new TaxCategoryCodeType();
        $model->setCategoryCode($testValue);

        $this->assertEquals($testValue, $model->getCategoryCode());

        $model->unsetCategoryCode();

        $this->assertNull($model->getCategoryCode());

        $testValueForCategoryCode = $model->getCategoryCodeWithCreate();

        $this->assertInstanceOf(TaxCategoryCodeType::class, $testValueForCategoryCode);
        $this->assertSame($testValueForCategoryCode, $model->getCategoryCode());

        // Property ExemptionReasonCode

        $testValue = new CodeType();
        $model->setExemptionReasonCode($testValue);

        $this->assertEquals($testValue, $model->getExemptionReasonCode());

        $model->unsetExemptionReasonCode();

        $this->assertNull($model->getExemptionReasonCode());

        $testValueForExemptionReasonCode = $model->getExemptionReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForExemptionReasonCode);
        $this->assertSame($testValueForExemptionReasonCode, $model->getExemptionReasonCode());

        // Property DueDateTypeCode

        $testValue = new TimeReferenceCodeType();
        $model->setDueDateTypeCode($testValue);

        $this->assertEquals($testValue, $model->getDueDateTypeCode());

        $model->unsetDueDateTypeCode();

        $this->assertNull($model->getDueDateTypeCode());

        $testValueForDueDateTypeCode = $model->getDueDateTypeCodeWithCreate();

        $this->assertInstanceOf(TimeReferenceCodeType::class, $testValueForDueDateTypeCode);
        $this->assertSame($testValueForDueDateTypeCode, $model->getDueDateTypeCode());

        // Property RateApplicablePercent

        $testValue = new PercentType();
        $model->setRateApplicablePercent($testValue);

        $this->assertEquals($testValue, $model->getRateApplicablePercent());

        $model->unsetRateApplicablePercent();

        $this->assertNull($model->getRateApplicablePercent());

        $testValueForRateApplicablePercent = $model->getRateApplicablePercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForRateApplicablePercent);
        $this->assertSame($testValueForRateApplicablePercent, $model->getRateApplicablePercent());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\UniversalCommunicationType.
     */
    public function testModelsZffxbasicwlRamUniversalCommunicationType(): void
    {
        $model = new UniversalCommunicationType();

        $this->assertInstanceOf(UniversalCommunicationType::class, $model);

        // Property URIID

        $testValue = new IDType();
        $model->setURIID($testValue);

        $this->assertEquals($testValue, $model->getURIID());

        $model->unsetURIID();

        $this->assertNull($model->getURIID());

        $testValueForURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForURIID);
        $this->assertSame($testValueForURIID, $model->getURIID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxbasicwlRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\rsm\CrossIndustryInvoiceType.
     */
    public function testModelsZffxbasicwlRsmCrossIndustryInvoiceType(): void
    {
        $model = new CrossIndustryInvoiceType();

        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);

        // Property ExchangedDocumentContext

        $testValue = new ExchangedDocumentContextType();
        $model->setExchangedDocumentContext($testValue);

        $this->assertEquals($testValue, $model->getExchangedDocumentContext());

        $model->unsetExchangedDocumentContext();

        $this->assertNull($model->getExchangedDocumentContext());

        $testValueForExchangedDocumentContext = $model->getExchangedDocumentContextWithCreate();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $testValueForExchangedDocumentContext);
        $this->assertSame($testValueForExchangedDocumentContext, $model->getExchangedDocumentContext());

        // Property ExchangedDocument

        $testValue = new ExchangedDocumentType();
        $model->setExchangedDocument($testValue);

        $this->assertEquals($testValue, $model->getExchangedDocument());

        $model->unsetExchangedDocument();

        $this->assertNull($model->getExchangedDocument());

        $testValueForExchangedDocument = $model->getExchangedDocumentWithCreate();

        $this->assertInstanceOf(ExchangedDocumentType::class, $testValueForExchangedDocument);
        $this->assertSame($testValueForExchangedDocument, $model->getExchangedDocument());

        // Property SupplyChainTradeTransaction

        $testValue = new SupplyChainTradeTransactionType();
        $model->setSupplyChainTradeTransaction($testValue);

        $this->assertEquals($testValue, $model->getSupplyChainTradeTransaction());

        $model->unsetSupplyChainTradeTransaction();

        $this->assertNull($model->getSupplyChainTradeTransaction());

        $testValueForSupplyChainTradeTransaction = $model->getSupplyChainTradeTransactionWithCreate();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $testValueForSupplyChainTradeTransaction);
        $this->assertSame($testValueForSupplyChainTradeTransaction, $model->getSupplyChainTradeTransaction());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\AmountType.
     */
    public function testModelsZffxbasicwlUdtAmountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\CodeType.
     */
    public function testModelsZffxbasicwlUdtCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxbasicwlUdtDatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\DateTimeType.
     */
    public function testModelsZffxbasicwlUdtDateTimeType(): void
    {
        $model = new DateTimeType();

        $this->assertInstanceOf(DateTimeType::class, $model);

        // Property DateTimeString

        $testValue = new DateTimeStringAType1();
        $model->setDateTimeString($testValue);

        $this->assertEquals($testValue, $model->getDateTimeString());

        $model->unsetDateTimeString();

        $this->assertNull($model->getDateTimeString());

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\IDType.
     */
    public function testModelsZffxbasicwlUdtIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\IndicatorType.
     */
    public function testModelsZffxbasicwlUdtIndicatorType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\PercentType.
     */
    public function testModelsZffxbasicwlUdtPercentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\TextType.
     */
    public function testModelsZffxbasicwlUdtTextType(): void
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
