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

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
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

        $createdIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIBANID);
        $this->assertSame($createdIBANID, $model->getIBANID());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxbasicwlRamExchangedDocumentContextType(): void
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

        $testValue = new CodeType();
        $model->setTaxCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTaxCurrencyCode());

        $model->unsetTaxCurrencyCode();

        $this->assertNull($model->getTaxCurrencyCode());

        $createdTaxCurrencyCode = $model->getTaxCurrencyCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdTaxCurrencyCode);
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

        $createdOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdOccurrenceDateTime);
        $this->assertSame($createdOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxbasicwl\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxbasicwlRamSupplyChainTradeTransactionType(): void
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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

        $createdURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdURIID);
        $this->assertSame($createdURIID, $model->getURIID());
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

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
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
