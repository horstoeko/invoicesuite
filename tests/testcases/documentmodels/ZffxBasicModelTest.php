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

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
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

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLineID);
        $this->assertSame($testValueForLineID, $model->getLineID());

        // Property IncludedNote

        $testValue = new NoteType();
        $model->setIncludedNote($testValue);

        $this->assertEquals($testValue, $model->getIncludedNote());

        $model->unsetIncludedNote();

        $this->assertNull($model->getIncludedNote());

        $testValueForIncludedNote = $model->getIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $testValueForIncludedNote);
        $this->assertSame($testValueForIncludedNote, $model->getIncludedNote());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxbasicRamExchangedDocumentContextType(): void
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

        $testValue = new CurrencyCodeType();
        $model->setTaxCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTaxCurrencyCode());

        $model->unsetTaxCurrencyCode();

        $this->assertNull($model->getTaxCurrencyCode());

        $testValueForTaxCurrencyCode = $model->getTaxCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForTaxCurrencyCode);
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

        $testValueForGrossPriceProductTradePrice = $model->getGrossPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $testValueForGrossPriceProductTradePrice);
        $this->assertSame($testValueForGrossPriceProductTradePrice, $model->getGrossPriceProductTradePrice());

        // Property NetPriceProductTradePrice

        $testValue = new TradePriceType();
        $model->setNetPriceProductTradePrice($testValue);

        $this->assertEquals($testValue, $model->getNetPriceProductTradePrice());

        $model->unsetNetPriceProductTradePrice();

        $this->assertNull($model->getNetPriceProductTradePrice());

        $testValueForNetPriceProductTradePrice = $model->getNetPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $testValueForNetPriceProductTradePrice);
        $this->assertSame($testValueForNetPriceProductTradePrice, $model->getNetPriceProductTradePrice());
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

        $testValueForBilledQuantity = $model->getBilledQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBilledQuantity);
        $this->assertSame($testValueForBilledQuantity, $model->getBilledQuantity());
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

        $testValueForApplicableTradeTax = $model->getApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForApplicableTradeTax);
        $this->assertSame($testValueForApplicableTradeTax, $model->getApplicableTradeTax());

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

        // Property SpecifiedTradeSettlementLineMonetarySummation

        $testValue = new TradeSettlementLineMonetarySummationType();
        $model->setSpecifiedTradeSettlementLineMonetarySummation($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        $model->unsetSpecifiedTradeSettlementLineMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementLineMonetarySummation());

        $testValueForSpecifiedTradeSettlementLineMonetarySummation = $model->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $testValueForSpecifiedTradeSettlementLineMonetarySummation);
        $this->assertSame($testValueForSpecifiedTradeSettlementLineMonetarySummation, $model->getSpecifiedTradeSettlementLineMonetarySummation());
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

        $testValueForOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForOccurrenceDateTime);
        $this->assertSame($testValueForOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasic\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxbasicRamSupplyChainTradeLineItemType(): void
    {
        $model = new SupplyChainTradeLineItemType();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $model);

        // Property AssociatedDocumentLineDocument

        $testValue = new DocumentLineDocumentType();
        $model->setAssociatedDocumentLineDocument($testValue);

        $this->assertEquals($testValue, $model->getAssociatedDocumentLineDocument());

        $model->unsetAssociatedDocumentLineDocument();

        $this->assertNull($model->getAssociatedDocumentLineDocument());

        $testValueForAssociatedDocumentLineDocument = $model->getAssociatedDocumentLineDocumentWithCreate();

        $this->assertInstanceOf(DocumentLineDocumentType::class, $testValueForAssociatedDocumentLineDocument);
        $this->assertSame($testValueForAssociatedDocumentLineDocument, $model->getAssociatedDocumentLineDocument());

        // Property SpecifiedTradeProduct

        $testValue = new TradeProductType();
        $model->setSpecifiedTradeProduct($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeProduct());

        $model->unsetSpecifiedTradeProduct();

        $this->assertNull($model->getSpecifiedTradeProduct());

        $testValueForSpecifiedTradeProduct = $model->getSpecifiedTradeProductWithCreate();

        $this->assertInstanceOf(TradeProductType::class, $testValueForSpecifiedTradeProduct);
        $this->assertSame($testValueForSpecifiedTradeProduct, $model->getSpecifiedTradeProduct());

        // Property SpecifiedLineTradeAgreement

        $testValue = new LineTradeAgreementType();
        $model->setSpecifiedLineTradeAgreement($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeAgreement());

        $model->unsetSpecifiedLineTradeAgreement();

        $this->assertNull($model->getSpecifiedLineTradeAgreement());

        $testValueForSpecifiedLineTradeAgreement = $model->getSpecifiedLineTradeAgreementWithCreate();

        $this->assertInstanceOf(LineTradeAgreementType::class, $testValueForSpecifiedLineTradeAgreement);
        $this->assertSame($testValueForSpecifiedLineTradeAgreement, $model->getSpecifiedLineTradeAgreement());

        // Property SpecifiedLineTradeDelivery

        $testValue = new LineTradeDeliveryType();
        $model->setSpecifiedLineTradeDelivery($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeDelivery());

        $model->unsetSpecifiedLineTradeDelivery();

        $this->assertNull($model->getSpecifiedLineTradeDelivery());

        $testValueForSpecifiedLineTradeDelivery = $model->getSpecifiedLineTradeDeliveryWithCreate();

        $this->assertInstanceOf(LineTradeDeliveryType::class, $testValueForSpecifiedLineTradeDelivery);
        $this->assertSame($testValueForSpecifiedLineTradeDelivery, $model->getSpecifiedLineTradeDelivery());

        // Property SpecifiedLineTradeSettlement

        $testValue = new LineTradeSettlementType();
        $model->setSpecifiedLineTradeSettlement($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeSettlement());

        $model->unsetSpecifiedLineTradeSettlement();

        $this->assertNull($model->getSpecifiedLineTradeSettlement());

        $testValueForSpecifiedLineTradeSettlement = $model->getSpecifiedLineTradeSettlementWithCreate();

        $this->assertInstanceOf(LineTradeSettlementType::class, $testValueForSpecifiedLineTradeSettlement);
        $this->assertSame($testValueForSpecifiedLineTradeSettlement, $model->getSpecifiedLineTradeSettlement());
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

        $includedSupplyChainTradeLineItemItem = new SupplyChainTradeLineItemType();
        $model->addToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemItem);

        $this->assertIsArray($model->getIncludedSupplyChainTradeLineItem());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedSupplyChainTradeLineItem()));

        $testValueForIncludedSupplyChainTradeLineItemItem = $model->addToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $testValueForIncludedSupplyChainTradeLineItemItem);

        $includedSupplyChainTradeLineItemOnceItem = new SupplyChainTradeLineItemType();

        $model->addOnceToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemOnceItem);
        $model->addOnceToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemOnceItem);

        $itemsAfterOnce = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIncludedSupplyChainTradeLineItemOnceItem = $model->addOnceToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $testValueForIncludedSupplyChainTradeLineItemOnceItem);

        $itemsAfterOnceWithCreate = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $latestIncludedSupplyChainTradeLineItem = $model->getLatestIncludedSupplyChainTradeLineItem();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $latestIncludedSupplyChainTradeLineItem);

        $hasLatestIncludedSupplyChainTradeLineItem = $model->hasLatestIncludedSupplyChainTradeLineItem();
        $this->assertIsBool($hasLatestIncludedSupplyChainTradeLineItem);

        $model->clearIncludedSupplyChainTradeLineItem();

        $itemsAfterClear = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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

        // Property LatestIncludedSupplyChainTradeLineItem

        $testValueForLatestIncludedSupplyChainTradeLineItem = $model->getLatestIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $testValueForLatestIncludedSupplyChainTradeLineItem);
        $this->assertSame($testValueForLatestIncludedSupplyChainTradeLineItem, $model->getLatestIncludedSupplyChainTradeLineItem());

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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForChargeAmount = $model->getChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForChargeAmount);
        $this->assertSame($testValueForChargeAmount, $model->getChargeAmount());

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNull($model->getBasisQuantity());

        $testValueForBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBasisQuantity);
        $this->assertSame($testValueForBasisQuantity, $model->getBasisQuantity());

        // Property AppliedTradeAllowanceCharge

        $testValue = new TradeAllowanceChargeType();
        $model->setAppliedTradeAllowanceCharge($testValue);

        $this->assertEquals($testValue, $model->getAppliedTradeAllowanceCharge());

        $model->unsetAppliedTradeAllowanceCharge();

        $this->assertNull($model->getAppliedTradeAllowanceCharge());

        $testValueForAppliedTradeAllowanceCharge = $model->getAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForAppliedTradeAllowanceCharge);
        $this->assertSame($testValueForAppliedTradeAllowanceCharge, $model->getAppliedTradeAllowanceCharge());
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

        $testValueForGlobalID = $model->getGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalID);
        $this->assertSame($testValueForGlobalID, $model->getGlobalID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());
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

        $testValueForLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalAmount);
        $this->assertSame($testValueForLineTotalAmount, $model->getLineTotalAmount());
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

        $testValueForURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForURIID);
        $this->assertSame($testValueForURIID, $model->getURIID());
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

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
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
