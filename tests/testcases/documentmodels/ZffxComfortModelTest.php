<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\FormattedDateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\CreditorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\CreditorFinancialInstitutionType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DebtorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DocumentLineDocumentType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\NoteType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProcuringProjectType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductCharacteristicType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductClassificationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SpecifiedPeriodType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainEventType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainTradeLineItemType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAccountingAccountType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAllowanceChargeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeContactType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeCountryType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePartyType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePriceType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeProductType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementFinancialCardType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementLineMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementPaymentMeansType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeTaxType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\ram\UniversalCommunicationType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\models\zffxcomfort\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\BinaryObjectType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\CodeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateTimeType\DateTimeStringAType as DateTimeStringAType1;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateType\DateStringAType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IndicatorType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\PercentType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\QuantityType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxComfortModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\AllowanceChargeReasonCodeType.
     */
    public function testModelsZffxcomfortQdtAllowanceChargeReasonCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\CountryIDType.
     */
    public function testModelsZffxcomfortQdtCountryIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\CurrencyCodeType.
     */
    public function testModelsZffxcomfortQdtCurrencyCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\DocumentCodeType.
     */
    public function testModelsZffxcomfortQdtDocumentCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\FormattedDateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxcomfortQdtFormatteddatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\FormattedDateTimeType.
     */
    public function testModelsZffxcomfortQdtFormattedDateTimeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\PaymentMeansCodeType.
     */
    public function testModelsZffxcomfortQdtPaymentMeansCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\ReferenceCodeType.
     */
    public function testModelsZffxcomfortQdtReferenceCodeType(): void
    {
        $model = new ReferenceCodeType();

        $this->assertInstanceOf(ReferenceCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TaxCategoryCodeType.
     */
    public function testModelsZffxcomfortQdtTaxCategoryCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TaxTypeCodeType.
     */
    public function testModelsZffxcomfortQdtTaxTypeCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\qdt\TimeReferenceCodeType.
     */
    public function testModelsZffxcomfortQdtTimeReferenceCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\CreditorFinancialAccountType.
     */
    public function testModelsZffxcomfortRamCreditorFinancialAccountType(): void
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

        // Property AccountName

        $testValue = new TextType();
        $model->setAccountName($testValue);

        $this->assertEquals($testValue, $model->getAccountName());

        $model->unsetAccountName();

        $this->assertNull($model->getAccountName());

        $testValueForAccountName = $model->getAccountNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForAccountName);
        $this->assertSame($testValueForAccountName, $model->getAccountName());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\CreditorFinancialInstitutionType.
     */
    public function testModelsZffxcomfortRamCreditorFinancialInstitutionType(): void
    {
        $model = new CreditorFinancialInstitutionType();

        $this->assertInstanceOf(CreditorFinancialInstitutionType::class, $model);

        // Property BICID

        $testValue = new IDType();
        $model->setBICID($testValue);

        $this->assertEquals($testValue, $model->getBICID());

        $model->unsetBICID();

        $this->assertNull($model->getBICID());

        $testValueForBICID = $model->getBICIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBICID);
        $this->assertSame($testValueForBICID, $model->getBICID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DebtorFinancialAccountType.
     */
    public function testModelsZffxcomfortRamDebtorFinancialAccountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DocumentContextParameterType.
     */
    public function testModelsZffxcomfortRamDocumentContextParameterType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\DocumentLineDocumentType.
     */
    public function testModelsZffxcomfortRamDocumentLineDocumentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxcomfortRamExchangedDocumentContextType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ExchangedDocumentType.
     */
    public function testModelsZffxcomfortRamExchangedDocumentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeAgreementType.
     */
    public function testModelsZffxcomfortRamHeaderTradeAgreementType(): void
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

        // Property SellerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setSellerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getSellerOrderReferencedDocument());

        $model->unsetSellerOrderReferencedDocument();

        $this->assertNull($model->getSellerOrderReferencedDocument());

        $testValueForSellerOrderReferencedDocument = $model->getSellerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForSellerOrderReferencedDocument);
        $this->assertSame($testValueForSellerOrderReferencedDocument, $model->getSellerOrderReferencedDocument());

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

        // Property AdditionalReferencedDocument

        $additionalReferencedDocumentItems = [];
        $model->setAdditionalReferencedDocument($additionalReferencedDocumentItems);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(0, $model->getAdditionalReferencedDocument());

        $additionalReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToAdditionalReferencedDocument($additionalReferencedDocumentItem);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getAdditionalReferencedDocument()));

        $testValueForAdditionalReferencedDocumentItem = $model->addToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocumentItem);

        $additionalReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);
        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocumentOnceItem);

        $itemsAfterOnceWithCreate = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearAdditionalReferencedDocument();

        $itemsAfterClear = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedProcuringProject

        $testValue = new ProcuringProjectType();
        $model->setSpecifiedProcuringProject($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedProcuringProject());

        $model->unsetSpecifiedProcuringProject();

        $this->assertNull($model->getSpecifiedProcuringProject());

        $testValueForSpecifiedProcuringProject = $model->getSpecifiedProcuringProjectWithCreate();

        $this->assertInstanceOf(ProcuringProjectType::class, $testValueForSpecifiedProcuringProject);
        $this->assertSame($testValueForSpecifiedProcuringProject, $model->getSpecifiedProcuringProject());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxcomfortRamHeaderTradeDeliveryType(): void
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

        // Property ReceivingAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setReceivingAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getReceivingAdviceReferencedDocument());

        $model->unsetReceivingAdviceReferencedDocument();

        $this->assertNull($model->getReceivingAdviceReferencedDocument());

        $testValueForReceivingAdviceReferencedDocument = $model->getReceivingAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForReceivingAdviceReferencedDocument);
        $this->assertSame($testValueForReceivingAdviceReferencedDocument, $model->getReceivingAdviceReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\HeaderTradeSettlementType.
     */
    public function testModelsZffxcomfortRamHeaderTradeSettlementType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LegalOrganizationType.
     */
    public function testModelsZffxcomfortRamLegalOrganizationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeAgreementType.
     */
    public function testModelsZffxcomfortRamLineTradeAgreementType(): void
    {
        $model = new LineTradeAgreementType();

        $this->assertInstanceOf(LineTradeAgreementType::class, $model);

        // Property BuyerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setBuyerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getBuyerOrderReferencedDocument());

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNull($model->getBuyerOrderReferencedDocument());

        $testValueForBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForBuyerOrderReferencedDocument);
        $this->assertSame($testValueForBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeDeliveryType.
     */
    public function testModelsZffxcomfortRamLineTradeDeliveryType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeSettlementType.
     */
    public function testModelsZffxcomfortRamLineTradeSettlementType(): void
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

        // Property AdditionalReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setAdditionalReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getAdditionalReferencedDocument());

        $model->unsetAdditionalReferencedDocument();

        $this->assertNull($model->getAdditionalReferencedDocument());

        $testValueForAdditionalReferencedDocument = $model->getAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocument);
        $this->assertSame($testValueForAdditionalReferencedDocument, $model->getAdditionalReferencedDocument());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\NoteType.
     */
    public function testModelsZffxcomfortRamNoteType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProcuringProjectType.
     */
    public function testModelsZffxcomfortRamProcuringProjectType(): void
    {
        $model = new ProcuringProjectType();

        $this->assertInstanceOf(ProcuringProjectType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductCharacteristicType.
     */
    public function testModelsZffxcomfortRamProductCharacteristicType(): void
    {
        $model = new ProductCharacteristicType();

        $this->assertInstanceOf(ProductCharacteristicType::class, $model);

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property Value

        $testValue = new TextType();
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        $testValueForValue = $model->getValueWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForValue);
        $this->assertSame($testValueForValue, $model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductClassificationType.
     */
    public function testModelsZffxcomfortRamProductClassificationType(): void
    {
        $model = new ProductClassificationType();

        $this->assertInstanceOf(ProductClassificationType::class, $model);

        // Property ClassCode

        $testValue = new CodeType();
        $model->setClassCode($testValue);

        $this->assertEquals($testValue, $model->getClassCode());

        $model->unsetClassCode();

        $this->assertNull($model->getClassCode());

        $testValueForClassCode = $model->getClassCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForClassCode);
        $this->assertSame($testValueForClassCode, $model->getClassCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ReferencedDocumentType.
     */
    public function testModelsZffxcomfortRamReferencedDocumentType(): void
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

        // Property URIID

        $testValue = new IDType();
        $model->setURIID($testValue);

        $this->assertEquals($testValue, $model->getURIID());

        $model->unsetURIID();

        $this->assertNull($model->getURIID());

        $testValueForURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForURIID);
        $this->assertSame($testValueForURIID, $model->getURIID());

        // Property LineID

        $testValue = new IDType();
        $model->setLineID($testValue);

        $this->assertEquals($testValue, $model->getLineID());

        $model->unsetLineID();

        $this->assertNull($model->getLineID());

        $testValueForLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLineID);
        $this->assertSame($testValueForLineID, $model->getLineID());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property AttachmentBinaryObject

        $testValue = new BinaryObjectType();
        $model->setAttachmentBinaryObject($testValue);

        $this->assertEquals($testValue, $model->getAttachmentBinaryObject());

        $model->unsetAttachmentBinaryObject();

        $this->assertNull($model->getAttachmentBinaryObject());

        $testValueForAttachmentBinaryObject = $model->getAttachmentBinaryObjectWithCreate();

        $this->assertInstanceOf(BinaryObjectType::class, $testValueForAttachmentBinaryObject);
        $this->assertSame($testValueForAttachmentBinaryObject, $model->getAttachmentBinaryObject());

        // Property ReferenceTypeCode

        $testValue = new ReferenceCodeType();
        $model->setReferenceTypeCode($testValue);

        $this->assertEquals($testValue, $model->getReferenceTypeCode());

        $model->unsetReferenceTypeCode();

        $this->assertNull($model->getReferenceTypeCode());

        $testValueForReferenceTypeCode = $model->getReferenceTypeCodeWithCreate();

        $this->assertInstanceOf(ReferenceCodeType::class, $testValueForReferenceTypeCode);
        $this->assertSame($testValueForReferenceTypeCode, $model->getReferenceTypeCode());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SpecifiedPeriodType.
     */
    public function testModelsZffxcomfortRamSpecifiedPeriodType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainEventType.
     */
    public function testModelsZffxcomfortRamSupplyChainEventType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxcomfortRamSupplyChainTradeLineItemType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxcomfortRamSupplyChainTradeTransactionType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TaxRegistrationType.
     */
    public function testModelsZffxcomfortRamTaxRegistrationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAccountingAccountType.
     */
    public function testModelsZffxcomfortRamTradeAccountingAccountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAddressType.
     */
    public function testModelsZffxcomfortRamTradeAddressType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeAllowanceChargeType.
     */
    public function testModelsZffxcomfortRamTradeAllowanceChargeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeContactType.
     */
    public function testModelsZffxcomfortRamTradeContactType(): void
    {
        $model = new TradeContactType();

        $this->assertInstanceOf(TradeContactType::class, $model);

        // Property PersonName

        $testValue = new TextType();
        $model->setPersonName($testValue);

        $this->assertEquals($testValue, $model->getPersonName());

        $model->unsetPersonName();

        $this->assertNull($model->getPersonName());

        $testValueForPersonName = $model->getPersonNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForPersonName);
        $this->assertSame($testValueForPersonName, $model->getPersonName());

        // Property DepartmentName

        $testValue = new TextType();
        $model->setDepartmentName($testValue);

        $this->assertEquals($testValue, $model->getDepartmentName());

        $model->unsetDepartmentName();

        $this->assertNull($model->getDepartmentName());

        $testValueForDepartmentName = $model->getDepartmentNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDepartmentName);
        $this->assertSame($testValueForDepartmentName, $model->getDepartmentName());

        // Property TelephoneUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setTelephoneUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getTelephoneUniversalCommunication());

        $model->unsetTelephoneUniversalCommunication();

        $this->assertNull($model->getTelephoneUniversalCommunication());

        $testValueForTelephoneUniversalCommunication = $model->getTelephoneUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForTelephoneUniversalCommunication);
        $this->assertSame($testValueForTelephoneUniversalCommunication, $model->getTelephoneUniversalCommunication());

        // Property EmailURIUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setEmailURIUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getEmailURIUniversalCommunication());

        $model->unsetEmailURIUniversalCommunication();

        $this->assertNull($model->getEmailURIUniversalCommunication());

        $testValueForEmailURIUniversalCommunication = $model->getEmailURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForEmailURIUniversalCommunication);
        $this->assertSame($testValueForEmailURIUniversalCommunication, $model->getEmailURIUniversalCommunication());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeCountryType.
     */
    public function testModelsZffxcomfortRamTradeCountryType(): void
    {
        $model = new TradeCountryType();

        $this->assertInstanceOf(TradeCountryType::class, $model);

        // Property ID

        $testValue = new CountryIDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePartyType.
     */
    public function testModelsZffxcomfortRamTradePartyType(): void
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

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property SpecifiedLegalOrganization

        $testValue = new LegalOrganizationType();
        $model->setSpecifiedLegalOrganization($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLegalOrganization());

        $model->unsetSpecifiedLegalOrganization();

        $this->assertNull($model->getSpecifiedLegalOrganization());

        $testValueForSpecifiedLegalOrganization = $model->getSpecifiedLegalOrganizationWithCreate();

        $this->assertInstanceOf(LegalOrganizationType::class, $testValueForSpecifiedLegalOrganization);
        $this->assertSame($testValueForSpecifiedLegalOrganization, $model->getSpecifiedLegalOrganization());

        // Property DefinedTradeContact

        $testValue = new TradeContactType();
        $model->setDefinedTradeContact($testValue);

        $this->assertEquals($testValue, $model->getDefinedTradeContact());

        $model->unsetDefinedTradeContact();

        $this->assertNull($model->getDefinedTradeContact());

        $testValueForDefinedTradeContact = $model->getDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $testValueForDefinedTradeContact);
        $this->assertSame($testValueForDefinedTradeContact, $model->getDefinedTradeContact());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePaymentTermsType.
     */
    public function testModelsZffxcomfortRamTradePaymentTermsType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradePriceType.
     */
    public function testModelsZffxcomfortRamTradePriceType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeProductType.
     */
    public function testModelsZffxcomfortRamTradeProductType(): void
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

        // Property SellerAssignedID

        $testValue = new IDType();
        $model->setSellerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getSellerAssignedID());

        $model->unsetSellerAssignedID();

        $this->assertNull($model->getSellerAssignedID());

        $testValueForSellerAssignedID = $model->getSellerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForSellerAssignedID);
        $this->assertSame($testValueForSellerAssignedID, $model->getSellerAssignedID());

        // Property BuyerAssignedID

        $testValue = new IDType();
        $model->setBuyerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getBuyerAssignedID());

        $model->unsetBuyerAssignedID();

        $this->assertNull($model->getBuyerAssignedID());

        $testValueForBuyerAssignedID = $model->getBuyerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBuyerAssignedID);
        $this->assertSame($testValueForBuyerAssignedID, $model->getBuyerAssignedID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property ApplicableProductCharacteristic

        $applicableProductCharacteristicItems = [];
        $model->setApplicableProductCharacteristic($applicableProductCharacteristicItems);

        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertCount(0, $model->getApplicableProductCharacteristic());

        $applicableProductCharacteristicItem = new ProductCharacteristicType();
        $model->addToApplicableProductCharacteristic($applicableProductCharacteristicItem);

        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertGreaterThanOrEqual(1, count($model->getApplicableProductCharacteristic()));

        $testValueForApplicableProductCharacteristicItem = $model->addToApplicableProductCharacteristicWithCreate();

        $this->assertInstanceOf(ProductCharacteristicType::class, $testValueForApplicableProductCharacteristicItem);

        $applicableProductCharacteristicOnceItem = new ProductCharacteristicType();

        $model->addOnceToApplicableProductCharacteristic($applicableProductCharacteristicOnceItem);
        $model->addOnceToApplicableProductCharacteristic($applicableProductCharacteristicOnceItem);

        $itemsAfterOnce = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForApplicableProductCharacteristicOnceItem = $model->addOnceToApplicableProductCharacteristicWithCreate();

        $this->assertInstanceOf(ProductCharacteristicType::class, $testValueForApplicableProductCharacteristicOnceItem);

        $itemsAfterOnceWithCreate = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearApplicableProductCharacteristic();

        $itemsAfterClear = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property DesignatedProductClassification

        $designatedProductClassificationItems = [];
        $model->setDesignatedProductClassification($designatedProductClassificationItems);

        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertCount(0, $model->getDesignatedProductClassification());

        $designatedProductClassificationItem = new ProductClassificationType();
        $model->addToDesignatedProductClassification($designatedProductClassificationItem);

        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertGreaterThanOrEqual(1, count($model->getDesignatedProductClassification()));

        $testValueForDesignatedProductClassificationItem = $model->addToDesignatedProductClassificationWithCreate();

        $this->assertInstanceOf(ProductClassificationType::class, $testValueForDesignatedProductClassificationItem);

        $designatedProductClassificationOnceItem = new ProductClassificationType();

        $model->addOnceToDesignatedProductClassification($designatedProductClassificationOnceItem);
        $model->addOnceToDesignatedProductClassification($designatedProductClassificationOnceItem);

        $itemsAfterOnce = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForDesignatedProductClassificationOnceItem = $model->addOnceToDesignatedProductClassificationWithCreate();

        $this->assertInstanceOf(ProductClassificationType::class, $testValueForDesignatedProductClassificationOnceItem);

        $itemsAfterOnceWithCreate = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearDesignatedProductClassification();

        $itemsAfterClear = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property OriginTradeCountry

        $testValue = new TradeCountryType();
        $model->setOriginTradeCountry($testValue);

        $this->assertEquals($testValue, $model->getOriginTradeCountry());

        $model->unsetOriginTradeCountry();

        $this->assertNull($model->getOriginTradeCountry());

        $testValueForOriginTradeCountry = $model->getOriginTradeCountryWithCreate();

        $this->assertInstanceOf(TradeCountryType::class, $testValueForOriginTradeCountry);
        $this->assertSame($testValueForOriginTradeCountry, $model->getOriginTradeCountry());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementFinancialCardType.
     */
    public function testModelsZffxcomfortRamTradeSettlementFinancialCardType(): void
    {
        $model = new TradeSettlementFinancialCardType();

        $this->assertInstanceOf(TradeSettlementFinancialCardType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property CardholderName

        $testValue = new TextType();
        $model->setCardholderName($testValue);

        $this->assertEquals($testValue, $model->getCardholderName());

        $model->unsetCardholderName();

        $this->assertNull($model->getCardholderName());

        $testValueForCardholderName = $model->getCardholderNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCardholderName);
        $this->assertSame($testValueForCardholderName, $model->getCardholderName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType.
     */
    public function testModelsZffxcomfortRamTradeSettlementHeaderMonetarySummationType(): void
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

        // Property RoundingAmount

        $testValue = new AmountType();
        $model->setRoundingAmount($testValue);

        $this->assertEquals($testValue, $model->getRoundingAmount());

        $model->unsetRoundingAmount();

        $this->assertNull($model->getRoundingAmount());

        $testValueForRoundingAmount = $model->getRoundingAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForRoundingAmount);
        $this->assertSame($testValueForRoundingAmount, $model->getRoundingAmount());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementLineMonetarySummationType.
     */
    public function testModelsZffxcomfortRamTradeSettlementLineMonetarySummationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeSettlementPaymentMeansType.
     */
    public function testModelsZffxcomfortRamTradeSettlementPaymentMeansType(): void
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

        // Property Information

        $testValue = new TextType();
        $model->setInformation($testValue);

        $this->assertEquals($testValue, $model->getInformation());

        $model->unsetInformation();

        $this->assertNull($model->getInformation());

        $testValueForInformation = $model->getInformationWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForInformation);
        $this->assertSame($testValueForInformation, $model->getInformation());

        // Property ApplicableTradeSettlementFinancialCard

        $testValue = new TradeSettlementFinancialCardType();
        $model->setApplicableTradeSettlementFinancialCard($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradeSettlementFinancialCard());

        $model->unsetApplicableTradeSettlementFinancialCard();

        $this->assertNull($model->getApplicableTradeSettlementFinancialCard());

        $testValueForApplicableTradeSettlementFinancialCard = $model->getApplicableTradeSettlementFinancialCardWithCreate();

        $this->assertInstanceOf(TradeSettlementFinancialCardType::class, $testValueForApplicableTradeSettlementFinancialCard);
        $this->assertSame($testValueForApplicableTradeSettlementFinancialCard, $model->getApplicableTradeSettlementFinancialCard());

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

        // Property PayeeSpecifiedCreditorFinancialInstitution

        $testValue = new CreditorFinancialInstitutionType();
        $model->setPayeeSpecifiedCreditorFinancialInstitution($testValue);

        $this->assertEquals($testValue, $model->getPayeeSpecifiedCreditorFinancialInstitution());

        $model->unsetPayeeSpecifiedCreditorFinancialInstitution();

        $this->assertNull($model->getPayeeSpecifiedCreditorFinancialInstitution());

        $testValueForPayeeSpecifiedCreditorFinancialInstitution = $model->getPayeeSpecifiedCreditorFinancialInstitutionWithCreate();

        $this->assertInstanceOf(CreditorFinancialInstitutionType::class, $testValueForPayeeSpecifiedCreditorFinancialInstitution);
        $this->assertSame($testValueForPayeeSpecifiedCreditorFinancialInstitution, $model->getPayeeSpecifiedCreditorFinancialInstitution());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeTaxType.
     */
    public function testModelsZffxcomfortRamTradeTaxType(): void
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

        // Property TaxPointDate

        $testValue = new DateType();
        $model->setTaxPointDate($testValue);

        $this->assertEquals($testValue, $model->getTaxPointDate());

        $model->unsetTaxPointDate();

        $this->assertNull($model->getTaxPointDate());

        $testValueForTaxPointDate = $model->getTaxPointDateWithCreate();

        $this->assertInstanceOf(DateType::class, $testValueForTaxPointDate);
        $this->assertSame($testValueForTaxPointDate, $model->getTaxPointDate());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\UniversalCommunicationType.
     */
    public function testModelsZffxcomfortRamUniversalCommunicationType(): void
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

        // Property CompleteNumber

        $testValue = new TextType();
        $model->setCompleteNumber($testValue);

        $this->assertEquals($testValue, $model->getCompleteNumber());

        $model->unsetCompleteNumber();

        $this->assertNull($model->getCompleteNumber());

        $testValueForCompleteNumber = $model->getCompleteNumberWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCompleteNumber);
        $this->assertSame($testValueForCompleteNumber, $model->getCompleteNumber());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxcomfortRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\rsm\CrossIndustryInvoiceType.
     */
    public function testModelsZffxcomfortRsmCrossIndustryInvoiceType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\AmountType.
     */
    public function testModelsZffxcomfortUdtAmountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\BinaryObjectType.
     */
    public function testModelsZffxcomfortUdtBinaryObjectType(): void
    {
        $model = new BinaryObjectType();

        $this->assertInstanceOf(BinaryObjectType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property MimeCode

        $testValue = 'dummy-MimeCodeValue';
        $model->setMimeCode($testValue);

        $this->assertEquals($testValue, $model->getMimeCode());

        $model->unsetMimeCode();

        $this->assertNull($model->getMimeCode());

        // Property Filename

        $testValue = 'dummy-FilenameValue';
        $model->setFilename($testValue);

        $this->assertEquals($testValue, $model->getFilename());

        $model->unsetFilename();

        $this->assertNull($model->getFilename());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\CodeType.
     */
    public function testModelsZffxcomfortUdtCodeType(): void
    {
        $model = new CodeType();

        $this->assertInstanceOf(CodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property ListID

        $testValue = 'dummy-ListIDValue';
        $model->setListID($testValue);

        $this->assertEquals($testValue, $model->getListID());

        $model->unsetListID();

        $this->assertNull($model->getListID());

        // Property ListVersionID

        $testValue = 'dummy-ListVersionIDValue';
        $model->setListVersionID($testValue);

        $this->assertEquals($testValue, $model->getListVersionID());

        $model->unsetListVersionID();

        $this->assertNull($model->getListVersionID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxcomfortUdtDatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateTimeType.
     */
    public function testModelsZffxcomfortUdtDateTimeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateType\DateStringAType.
     */
    public function testModelsZffxcomfortUdtDatetypeDateStringAType(): void
    {
        $model = new DateStringAType();

        $this->assertInstanceOf(DateStringAType::class, $model);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\DateType.
     */
    public function testModelsZffxcomfortUdtDateType(): void
    {
        $model = new DateType();

        $this->assertInstanceOf(DateType::class, $model);

        // Property DateString

        $testValue = new DateStringAType();
        $model->setDateString($testValue);

        $this->assertEquals($testValue, $model->getDateString());

        $model->unsetDateString();

        $this->assertNull($model->getDateString());

        $testValueForDateString = $model->getDateStringWithCreate();

        $this->assertInstanceOf(DateStringAType::class, $testValueForDateString);
        $this->assertSame($testValueForDateString, $model->getDateString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType.
     */
    public function testModelsZffxcomfortUdtIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IndicatorType.
     */
    public function testModelsZffxcomfortUdtIndicatorType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\PercentType.
     */
    public function testModelsZffxcomfortUdtPercentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\QuantityType.
     */
    public function testModelsZffxcomfortUdtQuantityType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\udt\TextType.
     */
    public function testModelsZffxcomfortUdtTextType(): void
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
