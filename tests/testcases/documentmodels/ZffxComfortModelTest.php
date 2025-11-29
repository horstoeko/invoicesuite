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

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
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

        $createdIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIBANID);
        $this->assertSame($createdIBANID, $model->getIBANID());

        // Property AccountName

        $testValue = new TextType();
        $model->setAccountName($testValue);

        $this->assertEquals($testValue, $model->getAccountName());

        $model->unsetAccountName();

        $this->assertNull($model->getAccountName());

        $createdAccountName = $model->getAccountNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdAccountName);
        $this->assertSame($createdAccountName, $model->getAccountName());

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

        $createdBICID = $model->getBICIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdBICID);
        $this->assertSame($createdBICID, $model->getBICID());
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

        $createdIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIBANID);
        $this->assertSame($createdIBANID, $model->getIBANID());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxcomfortRamExchangedDocumentContextType(): void
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

        // Property SellerOrderReferencedDocument

        $model->unsetSellerOrderReferencedDocument();

        $this->assertNull($model->getSellerOrderReferencedDocument());

        $createdSellerOrderReferencedDocument = $model->getSellerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdSellerOrderReferencedDocument);
        $this->assertSame($createdSellerOrderReferencedDocument, $model->getSellerOrderReferencedDocument());

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

        // Property AdditionalReferencedDocument

        $additionalReferencedDocumentItems = [];
        $model->setAdditionalReferencedDocument($additionalReferencedDocumentItems);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(0, $model->getAdditionalReferencedDocument());

        $additionalReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToAdditionalReferencedDocument($additionalReferencedDocumentItem);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getAdditionalReferencedDocument()));

        $createdAdditionalReferencedDocumentItem = $model->addToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdAdditionalReferencedDocumentItem);

        $additionalReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);
        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);

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

        $createdSpecifiedProcuringProject = $model->getSpecifiedProcuringProjectWithCreate();

        $this->assertInstanceOf(ProcuringProjectType::class, $createdSpecifiedProcuringProject);
        $this->assertSame($createdSpecifiedProcuringProject, $model->getSpecifiedProcuringProject());
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

        // Property ReceivingAdviceReferencedDocument

        $model->unsetReceivingAdviceReferencedDocument();

        $this->assertNull($model->getReceivingAdviceReferencedDocument());

        $createdReceivingAdviceReferencedDocument = $model->getReceivingAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdReceivingAdviceReferencedDocument);
        $this->assertSame($createdReceivingAdviceReferencedDocument, $model->getReceivingAdviceReferencedDocument());
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\LineTradeAgreementType.
     */
    public function testModelsZffxcomfortRamLineTradeAgreementType(): void
    {
        $model = new LineTradeAgreementType();

        $this->assertInstanceOf(LineTradeAgreementType::class, $model);

        // Property BuyerOrderReferencedDocument

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNull($model->getBuyerOrderReferencedDocument());

        $createdBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdBuyerOrderReferencedDocument);
        $this->assertSame($createdBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

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

        $createdBilledQuantity = $model->getBilledQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdBilledQuantity);
        $this->assertSame($createdBilledQuantity, $model->getBilledQuantity());
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

        // Property AdditionalReferencedDocument

        $model->unsetAdditionalReferencedDocument();

        $this->assertNull($model->getAdditionalReferencedDocument());

        $createdAdditionalReferencedDocument = $model->getAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdAdditionalReferencedDocument);
        $this->assertSame($createdAdditionalReferencedDocument, $model->getAdditionalReferencedDocument());

        // Property ReceivableSpecifiedTradeAccountingAccount

        $model->unsetReceivableSpecifiedTradeAccountingAccount();

        $this->assertNull($model->getReceivableSpecifiedTradeAccountingAccount());

        $createdReceivableSpecifiedTradeAccountingAccount = $model->getReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $createdReceivableSpecifiedTradeAccountingAccount);
        $this->assertSame($createdReceivableSpecifiedTradeAccountingAccount, $model->getReceivableSpecifiedTradeAccountingAccount());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());

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

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property Value

        $testValue = new TextType();
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        $createdValue = $model->getValueWithCreate();

        $this->assertInstanceOf(TextType::class, $createdValue);
        $this->assertSame($createdValue, $model->getValue());
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

        $createdClassCode = $model->getClassCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdClassCode);
        $this->assertSame($createdClassCode, $model->getClassCode());
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

        $createdIssuerAssignedID = $model->getIssuerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIssuerAssignedID);
        $this->assertSame($createdIssuerAssignedID, $model->getIssuerAssignedID());

        // Property URIID

        $testValue = new IDType();
        $model->setURIID($testValue);

        $this->assertEquals($testValue, $model->getURIID());

        $model->unsetURIID();

        $this->assertNull($model->getURIID());

        $createdURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdURIID);
        $this->assertSame($createdURIID, $model->getURIID());

        // Property LineID

        $testValue = new IDType();
        $model->setLineID($testValue);

        $this->assertEquals($testValue, $model->getLineID());

        $model->unsetLineID();

        $this->assertNull($model->getLineID());

        $createdLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdLineID);
        $this->assertSame($createdLineID, $model->getLineID());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $createdName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdName);
        $this->assertSame($createdName, $model->getName());

        // Property AttachmentBinaryObject

        $testValue = new BinaryObjectType();
        $model->setAttachmentBinaryObject($testValue);

        $this->assertEquals($testValue, $model->getAttachmentBinaryObject());

        $model->unsetAttachmentBinaryObject();

        $this->assertNull($model->getAttachmentBinaryObject());

        $createdAttachmentBinaryObject = $model->getAttachmentBinaryObjectWithCreate();

        $this->assertInstanceOf(BinaryObjectType::class, $createdAttachmentBinaryObject);
        $this->assertSame($createdAttachmentBinaryObject, $model->getAttachmentBinaryObject());

        // Property ReferenceTypeCode

        $testValue = new ReferenceCodeType();
        $model->setReferenceTypeCode($testValue);

        $this->assertEquals($testValue, $model->getReferenceTypeCode());

        $model->unsetReferenceTypeCode();

        $this->assertNull($model->getReferenceTypeCode());

        $createdReferenceTypeCode = $model->getReferenceTypeCodeWithCreate();

        $this->assertInstanceOf(ReferenceCodeType::class, $createdReferenceTypeCode);
        $this->assertSame($createdReferenceTypeCode, $model->getReferenceTypeCode());

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

        $createdOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdOccurrenceDateTime);
        $this->assertSame($createdOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxcomfort\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxcomfortRamSupplyChainTradeLineItemType(): void
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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

        $createdPersonName = $model->getPersonNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdPersonName);
        $this->assertSame($createdPersonName, $model->getPersonName());

        // Property DepartmentName

        $testValue = new TextType();
        $model->setDepartmentName($testValue);

        $this->assertEquals($testValue, $model->getDepartmentName());

        $model->unsetDepartmentName();

        $this->assertNull($model->getDepartmentName());

        $createdDepartmentName = $model->getDepartmentNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDepartmentName);
        $this->assertSame($createdDepartmentName, $model->getDepartmentName());

        // Property TelephoneUniversalCommunication

        $model->unsetTelephoneUniversalCommunication();

        $this->assertNull($model->getTelephoneUniversalCommunication());

        $createdTelephoneUniversalCommunication = $model->getTelephoneUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdTelephoneUniversalCommunication);
        $this->assertSame($createdTelephoneUniversalCommunication, $model->getTelephoneUniversalCommunication());

        // Property EmailURIUniversalCommunication

        $model->unsetEmailURIUniversalCommunication();

        $this->assertNull($model->getEmailURIUniversalCommunication());

        $createdEmailURIUniversalCommunication = $model->getEmailURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdEmailURIUniversalCommunication);
        $this->assertSame($createdEmailURIUniversalCommunication, $model->getEmailURIUniversalCommunication());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());
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

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property SpecifiedLegalOrganization

        $testValue = new LegalOrganizationType();
        $model->setSpecifiedLegalOrganization($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLegalOrganization());

        $model->unsetSpecifiedLegalOrganization();

        $this->assertNull($model->getSpecifiedLegalOrganization());

        $createdSpecifiedLegalOrganization = $model->getSpecifiedLegalOrganizationWithCreate();

        $this->assertInstanceOf(LegalOrganizationType::class, $createdSpecifiedLegalOrganization);
        $this->assertSame($createdSpecifiedLegalOrganization, $model->getSpecifiedLegalOrganization());

        // Property DefinedTradeContact

        $testValue = new TradeContactType();
        $model->setDefinedTradeContact($testValue);

        $this->assertEquals($testValue, $model->getDefinedTradeContact());

        $model->unsetDefinedTradeContact();

        $this->assertNull($model->getDefinedTradeContact());

        $createdDefinedTradeContact = $model->getDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $createdDefinedTradeContact);
        $this->assertSame($createdDefinedTradeContact, $model->getDefinedTradeContact());

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

        $createdGlobalID = $model->getGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdGlobalID);
        $this->assertSame($createdGlobalID, $model->getGlobalID());

        // Property SellerAssignedID

        $testValue = new IDType();
        $model->setSellerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getSellerAssignedID());

        $model->unsetSellerAssignedID();

        $this->assertNull($model->getSellerAssignedID());

        $createdSellerAssignedID = $model->getSellerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdSellerAssignedID);
        $this->assertSame($createdSellerAssignedID, $model->getSellerAssignedID());

        // Property BuyerAssignedID

        $testValue = new IDType();
        $model->setBuyerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getBuyerAssignedID());

        $model->unsetBuyerAssignedID();

        $this->assertNull($model->getBuyerAssignedID());

        $createdBuyerAssignedID = $model->getBuyerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdBuyerAssignedID);
        $this->assertSame($createdBuyerAssignedID, $model->getBuyerAssignedID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $createdName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdName);
        $this->assertSame($createdName, $model->getName());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property ApplicableProductCharacteristic

        $applicableProductCharacteristicItems = [];
        $model->setApplicableProductCharacteristic($applicableProductCharacteristicItems);

        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertCount(0, $model->getApplicableProductCharacteristic());

        $createdApplicableProductCharacteristicItem = $model->addToApplicableProductCharacteristicWithCreate();

        $this->assertInstanceOf(ProductCharacteristicType::class, $createdApplicableProductCharacteristicItem);

        $model->clearApplicableProductCharacteristic();

        $itemsAfterClear = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property DesignatedProductClassification

        $designatedProductClassificationItems = [];
        $model->setDesignatedProductClassification($designatedProductClassificationItems);

        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertCount(0, $model->getDesignatedProductClassification());

        $createdDesignatedProductClassificationItem = $model->addToDesignatedProductClassificationWithCreate();

        $this->assertInstanceOf(ProductClassificationType::class, $createdDesignatedProductClassificationItem);

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

        $createdOriginTradeCountry = $model->getOriginTradeCountryWithCreate();

        $this->assertInstanceOf(TradeCountryType::class, $createdOriginTradeCountry);
        $this->assertSame($createdOriginTradeCountry, $model->getOriginTradeCountry());
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

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());

        // Property CardholderName

        $testValue = new TextType();
        $model->setCardholderName($testValue);

        $this->assertEquals($testValue, $model->getCardholderName());

        $model->unsetCardholderName();

        $this->assertNull($model->getCardholderName());

        $createdCardholderName = $model->getCardholderNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdCardholderName);
        $this->assertSame($createdCardholderName, $model->getCardholderName());
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

        // Property RoundingAmount

        $testValue = new AmountType();
        $model->setRoundingAmount($testValue);

        $this->assertEquals($testValue, $model->getRoundingAmount());

        $model->unsetRoundingAmount();

        $this->assertNull($model->getRoundingAmount());

        $createdRoundingAmount = $model->getRoundingAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdRoundingAmount);
        $this->assertSame($createdRoundingAmount, $model->getRoundingAmount());

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

        $createdLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdLineTotalAmount);
        $this->assertSame($createdLineTotalAmount, $model->getLineTotalAmount());
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

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property Information

        $testValue = new TextType();
        $model->setInformation($testValue);

        $this->assertEquals($testValue, $model->getInformation());

        $model->unsetInformation();

        $this->assertNull($model->getInformation());

        $createdInformation = $model->getInformationWithCreate();

        $this->assertInstanceOf(TextType::class, $createdInformation);
        $this->assertSame($createdInformation, $model->getInformation());

        // Property ApplicableTradeSettlementFinancialCard

        $model->unsetApplicableTradeSettlementFinancialCard();

        $this->assertNull($model->getApplicableTradeSettlementFinancialCard());

        $createdApplicableTradeSettlementFinancialCard = $model->getApplicableTradeSettlementFinancialCardWithCreate();

        $this->assertInstanceOf(TradeSettlementFinancialCardType::class, $createdApplicableTradeSettlementFinancialCard);
        $this->assertSame($createdApplicableTradeSettlementFinancialCard, $model->getApplicableTradeSettlementFinancialCard());

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

        // Property PayeeSpecifiedCreditorFinancialInstitution

        $model->unsetPayeeSpecifiedCreditorFinancialInstitution();

        $this->assertNull($model->getPayeeSpecifiedCreditorFinancialInstitution());

        $createdPayeeSpecifiedCreditorFinancialInstitution = $model->getPayeeSpecifiedCreditorFinancialInstitutionWithCreate();

        $this->assertInstanceOf(CreditorFinancialInstitutionType::class, $createdPayeeSpecifiedCreditorFinancialInstitution);
        $this->assertSame($createdPayeeSpecifiedCreditorFinancialInstitution, $model->getPayeeSpecifiedCreditorFinancialInstitution());
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

        // Property TaxPointDate

        $testValue = new DateType();
        $model->setTaxPointDate($testValue);

        $this->assertEquals($testValue, $model->getTaxPointDate());

        $model->unsetTaxPointDate();

        $this->assertNull($model->getTaxPointDate());

        $createdTaxPointDate = $model->getTaxPointDateWithCreate();

        $this->assertInstanceOf(DateType::class, $createdTaxPointDate);
        $this->assertSame($createdTaxPointDate, $model->getTaxPointDate());

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

        $createdURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdURIID);
        $this->assertSame($createdURIID, $model->getURIID());

        // Property CompleteNumber

        $testValue = new TextType();
        $model->setCompleteNumber($testValue);

        $this->assertEquals($testValue, $model->getCompleteNumber());

        $model->unsetCompleteNumber();

        $this->assertNull($model->getCompleteNumber());

        $createdCompleteNumber = $model->getCompleteNumberWithCreate();

        $this->assertInstanceOf(TextType::class, $createdCompleteNumber);
        $this->assertSame($createdCompleteNumber, $model->getCompleteNumber());
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

        $createdDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $createdDateTimeString);
        $this->assertSame($createdDateTimeString, $model->getDateTimeString());
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

        $createdDateString = $model->getDateStringWithCreate();

        $this->assertInstanceOf(DateStringAType::class, $createdDateString);
        $this->assertSame($createdDateString, $model->getDateString());
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
