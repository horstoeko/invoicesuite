<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\models\zffxextended\qdt\AccountingAccountTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\ContactTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\DeliveryTermsCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\LineStatusCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\PartyRoleCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\TransportModeCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\AdvancePaymentType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\CreditorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\CreditorFinancialInstitutionType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\DebtorFinancialAccountType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\DocumentLineDocumentType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeAgreementType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeDeliveryType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeSettlementType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsServiceChargeType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsTransportMovementType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\NoteType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ProcuringProjectType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductCharacteristicType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductClassificationType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedProductType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\SpecifiedPeriodType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainConsignmentType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainEventType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainTradeLineItemType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAccountingAccountType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAllowanceChargeType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeContactType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCountryType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCurrencyExchangeType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeDeliveryTermsType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentDiscountTermsType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentPenaltyTermsType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePriceType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeProductInstanceType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeProductType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementFinancialCardType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementLineMonetarySummationType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementPaymentMeansType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType;
use horstoeko\invoicesuite\documents\models\zffxextended\ram\UniversalCommunicationType;
use horstoeko\invoicesuite\documents\models\zffxextended\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\models\zffxextended\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\BinaryObjectType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType\DateTimeStringAType as DateTimeStringAType1;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\DateType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\DateType\DateStringAType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IndicatorType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\MeasureType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\NumericType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\PercentType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\RateType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxExtendedModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\AccountingAccountTypeCodeType.
     */
    public function testModelsZffxextendedQdtAccountingAccountTypeCodeType(): void
    {
        $model = new AccountingAccountTypeCodeType();

        $this->assertInstanceOf(AccountingAccountTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\AllowanceChargeReasonCodeType.
     */
    public function testModelsZffxextendedQdtAllowanceChargeReasonCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\ContactTypeCodeType.
     */
    public function testModelsZffxextendedQdtContactTypeCodeType(): void
    {
        $model = new ContactTypeCodeType();

        $this->assertInstanceOf(ContactTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\CountryIDType.
     */
    public function testModelsZffxextendedQdtCountryIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\CurrencyCodeType.
     */
    public function testModelsZffxextendedQdtCurrencyCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\DeliveryTermsCodeType.
     */
    public function testModelsZffxextendedQdtDeliveryTermsCodeType(): void
    {
        $model = new DeliveryTermsCodeType();

        $this->assertInstanceOf(DeliveryTermsCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\DocumentCodeType.
     */
    public function testModelsZffxextendedQdtDocumentCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxextendedQdtFormatteddatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType.
     */
    public function testModelsZffxextendedQdtFormattedDateTimeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\LineStatusCodeType.
     */
    public function testModelsZffxextendedQdtLineStatusCodeType(): void
    {
        $model = new LineStatusCodeType();

        $this->assertInstanceOf(LineStatusCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\PartyRoleCodeType.
     */
    public function testModelsZffxextendedQdtPartyRoleCodeType(): void
    {
        $model = new PartyRoleCodeType();

        $this->assertInstanceOf(PartyRoleCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\PaymentMeansCodeType.
     */
    public function testModelsZffxextendedQdtPaymentMeansCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\ReferenceCodeType.
     */
    public function testModelsZffxextendedQdtReferenceCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\TaxCategoryCodeType.
     */
    public function testModelsZffxextendedQdtTaxCategoryCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\TaxTypeCodeType.
     */
    public function testModelsZffxextendedQdtTaxTypeCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\TimeReferenceCodeType.
     */
    public function testModelsZffxextendedQdtTimeReferenceCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\qdt\TransportModeCodeType.
     */
    public function testModelsZffxextendedQdtTransportModeCodeType(): void
    {
        $model = new TransportModeCodeType();

        $this->assertInstanceOf(TransportModeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\AdvancePaymentType.
     */
    public function testModelsZffxextendedRamAdvancePaymentType(): void
    {
        $model = new AdvancePaymentType();

        $this->assertInstanceOf(AdvancePaymentType::class, $model);

        // Property PaidAmount

        $testValue = new AmountType();
        $model->setPaidAmount($testValue);

        $this->assertEquals($testValue, $model->getPaidAmount());

        $model->unsetPaidAmount();

        $this->assertNull($model->getPaidAmount());

        $createdPaidAmount = $model->getPaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdPaidAmount);
        $this->assertSame($createdPaidAmount, $model->getPaidAmount());

        // Property FormattedReceivedDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedReceivedDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedReceivedDateTime());

        $model->unsetFormattedReceivedDateTime();

        $this->assertNull($model->getFormattedReceivedDateTime());

        $createdFormattedReceivedDateTime = $model->getFormattedReceivedDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $createdFormattedReceivedDateTime);
        $this->assertSame($createdFormattedReceivedDateTime, $model->getFormattedReceivedDateTime());

        // Property IncludedTradeTax

        $includedTradeTaxItems = [];
        $model->setIncludedTradeTax($includedTradeTaxItems);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertCount(0, $model->getIncludedTradeTax());

        $includedTradeTaxItem = new TradeTaxType();
        $model->addToIncludedTradeTax($includedTradeTaxItem);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedTradeTax()));

        $createdIncludedTradeTaxItem = $model->addToIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdIncludedTradeTaxItem);

        $includedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);
        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearIncludedTradeTax();

        $itemsAfterClear = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property InvoiceSpecifiedReferencedDocument

        $model->unsetInvoiceSpecifiedReferencedDocument();

        $this->assertNull($model->getInvoiceSpecifiedReferencedDocument());

        $createdInvoiceSpecifiedReferencedDocument = $model->getInvoiceSpecifiedReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdInvoiceSpecifiedReferencedDocument);
        $this->assertSame($createdInvoiceSpecifiedReferencedDocument, $model->getInvoiceSpecifiedReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\CreditorFinancialAccountType.
     */
    public function testModelsZffxextendedRamCreditorFinancialAccountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\CreditorFinancialInstitutionType.
     */
    public function testModelsZffxextendedRamCreditorFinancialInstitutionType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\DebtorFinancialAccountType.
     */
    public function testModelsZffxextendedRamDebtorFinancialAccountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\DocumentContextParameterType.
     */
    public function testModelsZffxextendedRamDocumentContextParameterType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\DocumentLineDocumentType.
     */
    public function testModelsZffxextendedRamDocumentLineDocumentType(): void
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

        // Property ParentLineID

        $testValue = new IDType();
        $model->setParentLineID($testValue);

        $this->assertEquals($testValue, $model->getParentLineID());

        $model->unsetParentLineID();

        $this->assertNull($model->getParentLineID());

        $createdParentLineID = $model->getParentLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdParentLineID);
        $this->assertSame($createdParentLineID, $model->getParentLineID());

        // Property LineStatusCode

        $testValue = new LineStatusCodeType();
        $model->setLineStatusCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusCode());

        $model->unsetLineStatusCode();

        $this->assertNull($model->getLineStatusCode());

        $createdLineStatusCode = $model->getLineStatusCodeWithCreate();

        $this->assertInstanceOf(LineStatusCodeType::class, $createdLineStatusCode);
        $this->assertSame($createdLineStatusCode, $model->getLineStatusCode());

        // Property LineStatusReasonCode

        $testValue = new CodeType();
        $model->setLineStatusReasonCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusReasonCode());

        $model->unsetLineStatusReasonCode();

        $this->assertNull($model->getLineStatusReasonCode());

        $createdLineStatusReasonCode = $model->getLineStatusReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdLineStatusReasonCode);
        $this->assertSame($createdLineStatusReasonCode, $model->getLineStatusReasonCode());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ExchangedDocumentContextType.
     */
    public function testModelsZffxextendedRamExchangedDocumentContextType(): void
    {
        $model = new ExchangedDocumentContextType();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $model);

        // Property TestIndicator

        $testValue = new IndicatorType();
        $model->setTestIndicator($testValue);

        $this->assertEquals($testValue, $model->getTestIndicator());

        $model->unsetTestIndicator();

        $this->assertNull($model->getTestIndicator());

        $createdTestIndicator = $model->getTestIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $createdTestIndicator);
        $this->assertSame($createdTestIndicator, $model->getTestIndicator());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ExchangedDocumentType.
     */
    public function testModelsZffxextendedRamExchangedDocumentType(): void
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

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNull($model->getName());

        $createdName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdName);
        $this->assertSame($createdName, $model->getName());

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

        // Property CopyIndicator

        $testValue = new IndicatorType();
        $model->setCopyIndicator($testValue);

        $this->assertEquals($testValue, $model->getCopyIndicator());

        $model->unsetCopyIndicator();

        $this->assertNull($model->getCopyIndicator());

        $createdCopyIndicator = $model->getCopyIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $createdCopyIndicator);
        $this->assertSame($createdCopyIndicator, $model->getCopyIndicator());

        // Property LanguageID

        $testValue = new IDType();
        $model->setLanguageID($testValue);

        $this->assertEquals($testValue, $model->getLanguageID());

        $model->unsetLanguageID();

        $this->assertNull($model->getLanguageID());

        $createdLanguageID = $model->getLanguageIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdLanguageID);
        $this->assertSame($createdLanguageID, $model->getLanguageID());

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

        // Property EffectiveSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setEffectiveSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getEffectiveSpecifiedPeriod());

        $model->unsetEffectiveSpecifiedPeriod();

        $this->assertNull($model->getEffectiveSpecifiedPeriod());

        $createdEffectiveSpecifiedPeriod = $model->getEffectiveSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $createdEffectiveSpecifiedPeriod);
        $this->assertSame($createdEffectiveSpecifiedPeriod, $model->getEffectiveSpecifiedPeriod());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeAgreementType.
     */
    public function testModelsZffxextendedRamHeaderTradeAgreementType(): void
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

        // Property SalesAgentTradeParty

        $testValue = new TradePartyType();
        $model->setSalesAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSalesAgentTradeParty());

        $model->unsetSalesAgentTradeParty();

        $this->assertNull($model->getSalesAgentTradeParty());

        $createdSalesAgentTradeParty = $model->getSalesAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdSalesAgentTradeParty);
        $this->assertSame($createdSalesAgentTradeParty, $model->getSalesAgentTradeParty());

        // Property BuyerTaxRepresentativeTradeParty

        $model->unsetBuyerTaxRepresentativeTradeParty();

        $this->assertNull($model->getBuyerTaxRepresentativeTradeParty());

        $createdBuyerTaxRepresentativeTradeParty = $model->getBuyerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdBuyerTaxRepresentativeTradeParty);
        $this->assertSame($createdBuyerTaxRepresentativeTradeParty, $model->getBuyerTaxRepresentativeTradeParty());

        // Property SellerTaxRepresentativeTradeParty

        $model->unsetSellerTaxRepresentativeTradeParty();

        $this->assertNull($model->getSellerTaxRepresentativeTradeParty());

        $createdSellerTaxRepresentativeTradeParty = $model->getSellerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdSellerTaxRepresentativeTradeParty);
        $this->assertSame($createdSellerTaxRepresentativeTradeParty, $model->getSellerTaxRepresentativeTradeParty());

        // Property ProductEndUserTradeParty

        $testValue = new TradePartyType();
        $model->setProductEndUserTradeParty($testValue);

        $this->assertEquals($testValue, $model->getProductEndUserTradeParty());

        $model->unsetProductEndUserTradeParty();

        $this->assertNull($model->getProductEndUserTradeParty());

        $createdProductEndUserTradeParty = $model->getProductEndUserTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdProductEndUserTradeParty);
        $this->assertSame($createdProductEndUserTradeParty, $model->getProductEndUserTradeParty());

        // Property ApplicableTradeDeliveryTerms

        $model->unsetApplicableTradeDeliveryTerms();

        $this->assertNull($model->getApplicableTradeDeliveryTerms());

        $createdApplicableTradeDeliveryTerms = $model->getApplicableTradeDeliveryTermsWithCreate();

        $this->assertInstanceOf(TradeDeliveryTermsType::class, $createdApplicableTradeDeliveryTerms);
        $this->assertSame($createdApplicableTradeDeliveryTerms, $model->getApplicableTradeDeliveryTerms());

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

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNull($model->getQuotationReferencedDocument());

        $createdQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdQuotationReferencedDocument);
        $this->assertSame($createdQuotationReferencedDocument, $model->getQuotationReferencedDocument());

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

        // Property BuyerAgentTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerAgentTradeParty());

        $model->unsetBuyerAgentTradeParty();

        $this->assertNull($model->getBuyerAgentTradeParty());

        $createdBuyerAgentTradeParty = $model->getBuyerAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdBuyerAgentTradeParty);
        $this->assertSame($createdBuyerAgentTradeParty, $model->getBuyerAgentTradeParty());

        // Property SpecifiedProcuringProject

        $testValue = new ProcuringProjectType();
        $model->setSpecifiedProcuringProject($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedProcuringProject());

        $model->unsetSpecifiedProcuringProject();

        $this->assertNull($model->getSpecifiedProcuringProject());

        $createdSpecifiedProcuringProject = $model->getSpecifiedProcuringProjectWithCreate();

        $this->assertInstanceOf(ProcuringProjectType::class, $createdSpecifiedProcuringProject);
        $this->assertSame($createdSpecifiedProcuringProject, $model->getSpecifiedProcuringProject());

        // Property UltimateCustomerOrderReferencedDocument

        $createdUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdUltimateCustomerOrderReferencedDocumentItem);

        $model->clearUltimateCustomerOrderReferencedDocument();

        $itemsAfterClear = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxextendedRamHeaderTradeDeliveryType(): void
    {
        $model = new HeaderTradeDeliveryType();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $model);

        // Property RelatedSupplyChainConsignment

        $relatedSupplyChainConsignmentItems = [];
        $model->setRelatedSupplyChainConsignment($relatedSupplyChainConsignmentItems);

        $this->assertIsArray($model->getRelatedSupplyChainConsignment());
        $this->assertCount(0, $model->getRelatedSupplyChainConsignment());

        $createdRelatedSupplyChainConsignmentItem = $model->addToRelatedSupplyChainConsignmentWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $createdRelatedSupplyChainConsignmentItem);

        $model->clearRelatedSupplyChainConsignment();

        $itemsAfterClear = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNull($model->getShipToTradeParty());

        $createdShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdShipToTradeParty);
        $this->assertSame($createdShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNull($model->getUltimateShipToTradeParty());

        $createdUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdUltimateShipToTradeParty);
        $this->assertSame($createdUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

        // Property ShipFromTradeParty

        $testValue = new TradePartyType();
        $model->setShipFromTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipFromTradeParty());

        $model->unsetShipFromTradeParty();

        $this->assertNull($model->getShipFromTradeParty());

        $createdShipFromTradeParty = $model->getShipFromTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdShipFromTradeParty);
        $this->assertSame($createdShipFromTradeParty, $model->getShipFromTradeParty());

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

        // Property DeliveryNoteReferencedDocument

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNull($model->getDeliveryNoteReferencedDocument());

        $createdDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdDeliveryNoteReferencedDocument);
        $this->assertSame($createdDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\HeaderTradeSettlementType.
     */
    public function testModelsZffxextendedRamHeaderTradeSettlementType(): void
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

        // Property InvoiceIssuerReference

        $testValue = new TextType();
        $model->setInvoiceIssuerReference($testValue);

        $this->assertEquals($testValue, $model->getInvoiceIssuerReference());

        $model->unsetInvoiceIssuerReference();

        $this->assertNull($model->getInvoiceIssuerReference());

        $createdInvoiceIssuerReference = $model->getInvoiceIssuerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $createdInvoiceIssuerReference);
        $this->assertSame($createdInvoiceIssuerReference, $model->getInvoiceIssuerReference());

        // Property InvoicerTradeParty

        $testValue = new TradePartyType();
        $model->setInvoicerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoicerTradeParty());

        $model->unsetInvoicerTradeParty();

        $this->assertNull($model->getInvoicerTradeParty());

        $createdInvoicerTradeParty = $model->getInvoicerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdInvoicerTradeParty);
        $this->assertSame($createdInvoicerTradeParty, $model->getInvoicerTradeParty());

        // Property InvoiceeTradeParty

        $testValue = new TradePartyType();
        $model->setInvoiceeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoiceeTradeParty());

        $model->unsetInvoiceeTradeParty();

        $this->assertNull($model->getInvoiceeTradeParty());

        $createdInvoiceeTradeParty = $model->getInvoiceeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdInvoiceeTradeParty);
        $this->assertSame($createdInvoiceeTradeParty, $model->getInvoiceeTradeParty());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $createdPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdPayeeTradeParty);
        $this->assertSame($createdPayeeTradeParty, $model->getPayeeTradeParty());

        // Property PayerTradeParty

        $testValue = new TradePartyType();
        $model->setPayerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayerTradeParty());

        $model->unsetPayerTradeParty();

        $this->assertNull($model->getPayerTradeParty());

        $createdPayerTradeParty = $model->getPayerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdPayerTradeParty);
        $this->assertSame($createdPayerTradeParty, $model->getPayerTradeParty());

        // Property TaxApplicableTradeCurrencyExchange

        $model->unsetTaxApplicableTradeCurrencyExchange();

        $this->assertNull($model->getTaxApplicableTradeCurrencyExchange());

        $createdTaxApplicableTradeCurrencyExchange = $model->getTaxApplicableTradeCurrencyExchangeWithCreate();

        $this->assertInstanceOf(TradeCurrencyExchangeType::class, $createdTaxApplicableTradeCurrencyExchange);
        $this->assertSame($createdTaxApplicableTradeCurrencyExchange, $model->getTaxApplicableTradeCurrencyExchange());

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

        // Property SpecifiedLogisticsServiceCharge

        $specifiedLogisticsServiceChargeItems = [];
        $model->setSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeItems);

        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertCount(0, $model->getSpecifiedLogisticsServiceCharge());

        $createdSpecifiedLogisticsServiceChargeItem = $model->addToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $createdSpecifiedLogisticsServiceChargeItem);

        $model->clearSpecifiedLogisticsServiceCharge();

        $itemsAfterClear = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedTradePaymentTerms

        $specifiedTradePaymentTermsItems = [];
        $model->setSpecifiedTradePaymentTerms($specifiedTradePaymentTermsItems);

        $this->assertIsArray($model->getSpecifiedTradePaymentTerms());
        $this->assertCount(0, $model->getSpecifiedTradePaymentTerms());

        $specifiedTradePaymentTermsItem = new TradePaymentTermsType();
        $model->addToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsItem);

        $this->assertIsArray($model->getSpecifiedTradePaymentTerms());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedTradePaymentTerms()));

        $createdSpecifiedTradePaymentTermsItem = $model->addToSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $createdSpecifiedTradePaymentTermsItem);

        $specifiedTradePaymentTermsOnceItem = new TradePaymentTermsType();

        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);
        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearSpecifiedTradePaymentTerms();

        $itemsAfterClear = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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

        $createdReceivableSpecifiedTradeAccountingAccountItem = $model->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $createdReceivableSpecifiedTradeAccountingAccountItem);

        $model->clearReceivableSpecifiedTradeAccountingAccount();

        $itemsAfterClear = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedAdvancePayment

        $specifiedAdvancePaymentItems = [];
        $model->setSpecifiedAdvancePayment($specifiedAdvancePaymentItems);

        $this->assertIsArray($model->getSpecifiedAdvancePayment());
        $this->assertCount(0, $model->getSpecifiedAdvancePayment());

        $specifiedAdvancePaymentItem = new AdvancePaymentType();
        $model->addToSpecifiedAdvancePayment($specifiedAdvancePaymentItem);

        $this->assertIsArray($model->getSpecifiedAdvancePayment());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedAdvancePayment()));

        $createdSpecifiedAdvancePaymentItem = $model->addToSpecifiedAdvancePaymentWithCreate();

        $this->assertInstanceOf(AdvancePaymentType::class, $createdSpecifiedAdvancePaymentItem);

        $specifiedAdvancePaymentOnceItem = new AdvancePaymentType();

        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);
        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);

        $itemsAfterOnce = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearSpecifiedAdvancePayment();

        $itemsAfterClear = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LegalOrganizationType.
     */
    public function testModelsZffxextendedRamLegalOrganizationType(): void
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

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNull($model->getPostalTradeAddress());

        $createdPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $createdPostalTradeAddress);
        $this->assertSame($createdPostalTradeAddress, $model->getPostalTradeAddress());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeAgreementType.
     */
    public function testModelsZffxextendedRamLineTradeAgreementType(): void
    {
        $model = new LineTradeAgreementType();

        $this->assertInstanceOf(LineTradeAgreementType::class, $model);

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

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNull($model->getQuotationReferencedDocument());

        $createdQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdQuotationReferencedDocument);
        $this->assertSame($createdQuotationReferencedDocument, $model->getQuotationReferencedDocument());

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

        // Property UltimateCustomerOrderReferencedDocument

        $createdUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdUltimateCustomerOrderReferencedDocumentItem);

        $model->clearUltimateCustomerOrderReferencedDocument();

        $itemsAfterClear = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeDeliveryType.
     */
    public function testModelsZffxextendedRamLineTradeDeliveryType(): void
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

        // Property ChargeFreeQuantity

        $testValue = new QuantityType();
        $model->setChargeFreeQuantity($testValue);

        $this->assertEquals($testValue, $model->getChargeFreeQuantity());

        $model->unsetChargeFreeQuantity();

        $this->assertNull($model->getChargeFreeQuantity());

        $createdChargeFreeQuantity = $model->getChargeFreeQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdChargeFreeQuantity);
        $this->assertSame($createdChargeFreeQuantity, $model->getChargeFreeQuantity());

        // Property PackageQuantity

        $testValue = new QuantityType();
        $model->setPackageQuantity($testValue);

        $this->assertEquals($testValue, $model->getPackageQuantity());

        $model->unsetPackageQuantity();

        $this->assertNull($model->getPackageQuantity());

        $createdPackageQuantity = $model->getPackageQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdPackageQuantity);
        $this->assertSame($createdPackageQuantity, $model->getPackageQuantity());

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNull($model->getShipToTradeParty());

        $createdShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdShipToTradeParty);
        $this->assertSame($createdShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNull($model->getUltimateShipToTradeParty());

        $createdUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdUltimateShipToTradeParty);
        $this->assertSame($createdUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

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

        // Property DeliveryNoteReferencedDocument

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNull($model->getDeliveryNoteReferencedDocument());

        $createdDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdDeliveryNoteReferencedDocument);
        $this->assertSame($createdDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeSettlementType.
     */
    public function testModelsZffxextendedRamLineTradeSettlementType(): void
    {
        $model = new LineTradeSettlementType();

        $this->assertInstanceOf(LineTradeSettlementType::class, $model);

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

        // Property SpecifiedTradeSettlementLineMonetarySummation

        $model->unsetSpecifiedTradeSettlementLineMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementLineMonetarySummation());

        $createdSpecifiedTradeSettlementLineMonetarySummation = $model->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $createdSpecifiedTradeSettlementLineMonetarySummation);
        $this->assertSame($createdSpecifiedTradeSettlementLineMonetarySummation, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        // Property InvoiceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setInvoiceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getInvoiceReferencedDocument());

        $model->unsetInvoiceReferencedDocument();

        $this->assertNull($model->getInvoiceReferencedDocument());

        $createdInvoiceReferencedDocument = $model->getInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $createdInvoiceReferencedDocument);
        $this->assertSame($createdInvoiceReferencedDocument, $model->getInvoiceReferencedDocument());

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

        // Property ReceivableSpecifiedTradeAccountingAccount

        $model->unsetReceivableSpecifiedTradeAccountingAccount();

        $this->assertNull($model->getReceivableSpecifiedTradeAccountingAccount());

        $createdReceivableSpecifiedTradeAccountingAccount = $model->getReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $createdReceivableSpecifiedTradeAccountingAccount);
        $this->assertSame($createdReceivableSpecifiedTradeAccountingAccount, $model->getReceivableSpecifiedTradeAccountingAccount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsServiceChargeType.
     */
    public function testModelsZffxextendedRamLogisticsServiceChargeType(): void
    {
        $model = new LogisticsServiceChargeType();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $model);

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property AppliedAmount

        $testValue = new AmountType();
        $model->setAppliedAmount($testValue);

        $this->assertEquals($testValue, $model->getAppliedAmount());

        $model->unsetAppliedAmount();

        $this->assertNull($model->getAppliedAmount());

        $createdAppliedAmount = $model->getAppliedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdAppliedAmount);
        $this->assertSame($createdAppliedAmount, $model->getAppliedAmount());

        // Property AppliedTradeTax

        $appliedTradeTaxItems = [];
        $model->setAppliedTradeTax($appliedTradeTaxItems);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertCount(0, $model->getAppliedTradeTax());

        $appliedTradeTaxItem = new TradeTaxType();
        $model->addToAppliedTradeTax($appliedTradeTaxItem);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertGreaterThanOrEqual(1, count($model->getAppliedTradeTax()));

        $createdAppliedTradeTaxItem = $model->addToAppliedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdAppliedTradeTaxItem);

        $appliedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);
        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearAppliedTradeTax();

        $itemsAfterClear = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsTransportMovementType.
     */
    public function testModelsZffxextendedRamLogisticsTransportMovementType(): void
    {
        $model = new LogisticsTransportMovementType();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $model);

        // Property ModeCode

        $testValue = new TransportModeCodeType();
        $model->setModeCode($testValue);

        $this->assertEquals($testValue, $model->getModeCode());

        $model->unsetModeCode();

        $this->assertNull($model->getModeCode());

        $createdModeCode = $model->getModeCodeWithCreate();

        $this->assertInstanceOf(TransportModeCodeType::class, $createdModeCode);
        $this->assertSame($createdModeCode, $model->getModeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\NoteType.
     */
    public function testModelsZffxextendedRamNoteType(): void
    {
        $model = new NoteType();

        $this->assertInstanceOf(NoteType::class, $model);

        // Property ContentCode

        $testValue = new CodeType();
        $model->setContentCode($testValue);

        $this->assertEquals($testValue, $model->getContentCode());

        $model->unsetContentCode();

        $this->assertNull($model->getContentCode());

        $createdContentCode = $model->getContentCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdContentCode);
        $this->assertSame($createdContentCode, $model->getContentCode());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ProcuringProjectType.
     */
    public function testModelsZffxextendedRamProcuringProjectType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductCharacteristicType.
     */
    public function testModelsZffxextendedRamProductCharacteristicType(): void
    {
        $model = new ProductCharacteristicType();

        $this->assertInstanceOf(ProductCharacteristicType::class, $model);

        // Property TypeCode

        $testValue = new CodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

        // Property ValueMeasure

        $testValue = new MeasureType();
        $model->setValueMeasure($testValue);

        $this->assertEquals($testValue, $model->getValueMeasure());

        $model->unsetValueMeasure();

        $this->assertNull($model->getValueMeasure());

        $createdValueMeasure = $model->getValueMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $createdValueMeasure);
        $this->assertSame($createdValueMeasure, $model->getValueMeasure());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductClassificationType.
     */
    public function testModelsZffxextendedRamProductClassificationType(): void
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

        // Property ClassName

        $testValue = new TextType();
        $model->setClassName($testValue);

        $this->assertEquals($testValue, $model->getClassName());

        $model->unsetClassName();

        $this->assertNull($model->getClassName());

        $createdClassName = $model->getClassNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdClassName);
        $this->assertSame($createdClassName, $model->getClassName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType.
     */
    public function testModelsZffxextendedRamReferencedDocumentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedProductType.
     */
    public function testModelsZffxextendedRamReferencedProductType(): void
    {
        $model = new ReferencedProductType();

        $this->assertInstanceOf(ReferencedProductType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());

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

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNull($model->getIndustryAssignedID());

        $createdIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIndustryAssignedID);
        $this->assertSame($createdIndustryAssignedID, $model->getIndustryAssignedID());

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

        // Property UnitQuantity

        $testValue = new QuantityType();
        $model->setUnitQuantity($testValue);

        $this->assertEquals($testValue, $model->getUnitQuantity());

        $model->unsetUnitQuantity();

        $this->assertNull($model->getUnitQuantity());

        $createdUnitQuantity = $model->getUnitQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdUnitQuantity);
        $this->assertSame($createdUnitQuantity, $model->getUnitQuantity());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SpecifiedPeriodType.
     */
    public function testModelsZffxextendedRamSpecifiedPeriodType(): void
    {
        $model = new SpecifiedPeriodType();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $model);

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $createdDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $createdDescription);
        $this->assertSame($createdDescription, $model->getDescription());

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

        // Property CompleteDateTime

        $testValue = new DateTimeType();
        $model->setCompleteDateTime($testValue);

        $this->assertEquals($testValue, $model->getCompleteDateTime());

        $model->unsetCompleteDateTime();

        $this->assertNull($model->getCompleteDateTime());

        $createdCompleteDateTime = $model->getCompleteDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdCompleteDateTime);
        $this->assertSame($createdCompleteDateTime, $model->getCompleteDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainConsignmentType.
     */
    public function testModelsZffxextendedRamSupplyChainConsignmentType(): void
    {
        $model = new SupplyChainConsignmentType();

        $this->assertInstanceOf(SupplyChainConsignmentType::class, $model);

        // Property SpecifiedLogisticsTransportMovement

        $specifiedLogisticsTransportMovementItems = [];
        $model->setSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementItems);

        $this->assertIsArray($model->getSpecifiedLogisticsTransportMovement());
        $this->assertCount(0, $model->getSpecifiedLogisticsTransportMovement());

        $createdSpecifiedLogisticsTransportMovementItem = $model->addToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $createdSpecifiedLogisticsTransportMovementItem);

        $model->clearSpecifiedLogisticsTransportMovement();

        $itemsAfterClear = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainEventType.
     */
    public function testModelsZffxextendedRamSupplyChainEventType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxextendedRamSupplyChainTradeLineItemType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxextendedRamSupplyChainTradeTransactionType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TaxRegistrationType.
     */
    public function testModelsZffxextendedRamTaxRegistrationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAccountingAccountType.
     */
    public function testModelsZffxextendedRamTradeAccountingAccountType(): void
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

        // Property TypeCode

        $testValue = new AccountingAccountTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(AccountingAccountTypeCodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAddressType.
     */
    public function testModelsZffxextendedRamTradeAddressType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAllowanceChargeType.
     */
    public function testModelsZffxextendedRamTradeAllowanceChargeType(): void
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

        // Property SequenceNumeric

        $testValue = new NumericType();
        $model->setSequenceNumeric($testValue);

        $this->assertEquals($testValue, $model->getSequenceNumeric());

        $model->unsetSequenceNumeric();

        $this->assertNull($model->getSequenceNumeric());

        $createdSequenceNumeric = $model->getSequenceNumericWithCreate();

        $this->assertInstanceOf(NumericType::class, $createdSequenceNumeric);
        $this->assertSame($createdSequenceNumeric, $model->getSequenceNumeric());

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

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNull($model->getBasisQuantity());

        $createdBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $createdBasisQuantity);
        $this->assertSame($createdBasisQuantity, $model->getBasisQuantity());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeContactType.
     */
    public function testModelsZffxextendedRamTradeContactType(): void
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

        // Property TypeCode

        $testValue = new CodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $createdTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $createdTypeCode);
        $this->assertSame($createdTypeCode, $model->getTypeCode());

        // Property TelephoneUniversalCommunication

        $model->unsetTelephoneUniversalCommunication();

        $this->assertNull($model->getTelephoneUniversalCommunication());

        $createdTelephoneUniversalCommunication = $model->getTelephoneUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdTelephoneUniversalCommunication);
        $this->assertSame($createdTelephoneUniversalCommunication, $model->getTelephoneUniversalCommunication());

        // Property FaxUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setFaxUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getFaxUniversalCommunication());

        $model->unsetFaxUniversalCommunication();

        $this->assertNull($model->getFaxUniversalCommunication());

        $createdFaxUniversalCommunication = $model->getFaxUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdFaxUniversalCommunication);
        $this->assertSame($createdFaxUniversalCommunication, $model->getFaxUniversalCommunication());

        // Property EmailURIUniversalCommunication

        $model->unsetEmailURIUniversalCommunication();

        $this->assertNull($model->getEmailURIUniversalCommunication());

        $createdEmailURIUniversalCommunication = $model->getEmailURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $createdEmailURIUniversalCommunication);
        $this->assertSame($createdEmailURIUniversalCommunication, $model->getEmailURIUniversalCommunication());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCountryType.
     */
    public function testModelsZffxextendedRamTradeCountryType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCurrencyExchangeType.
     */
    public function testModelsZffxextendedRamTradeCurrencyExchangeType(): void
    {
        $model = new TradeCurrencyExchangeType();

        $this->assertInstanceOf(TradeCurrencyExchangeType::class, $model);

        // Property SourceCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setSourceCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getSourceCurrencyCode());

        $model->unsetSourceCurrencyCode();

        $this->assertNull($model->getSourceCurrencyCode());

        $createdSourceCurrencyCode = $model->getSourceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $createdSourceCurrencyCode);
        $this->assertSame($createdSourceCurrencyCode, $model->getSourceCurrencyCode());

        // Property TargetCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setTargetCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTargetCurrencyCode());

        $model->unsetTargetCurrencyCode();

        $this->assertNull($model->getTargetCurrencyCode());

        $createdTargetCurrencyCode = $model->getTargetCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $createdTargetCurrencyCode);
        $this->assertSame($createdTargetCurrencyCode, $model->getTargetCurrencyCode());

        // Property ConversionRate

        $testValue = new RateType();
        $model->setConversionRate($testValue);

        $this->assertEquals($testValue, $model->getConversionRate());

        $model->unsetConversionRate();

        $this->assertNull($model->getConversionRate());

        $createdConversionRate = $model->getConversionRateWithCreate();

        $this->assertInstanceOf(RateType::class, $createdConversionRate);
        $this->assertSame($createdConversionRate, $model->getConversionRate());

        // Property ConversionRateDateTime

        $testValue = new DateTimeType();
        $model->setConversionRateDateTime($testValue);

        $this->assertEquals($testValue, $model->getConversionRateDateTime());

        $model->unsetConversionRateDateTime();

        $this->assertNull($model->getConversionRateDateTime());

        $createdConversionRateDateTime = $model->getConversionRateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdConversionRateDateTime);
        $this->assertSame($createdConversionRateDateTime, $model->getConversionRateDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeDeliveryTermsType.
     */
    public function testModelsZffxextendedRamTradeDeliveryTermsType(): void
    {
        $model = new TradeDeliveryTermsType();

        $this->assertInstanceOf(TradeDeliveryTermsType::class, $model);

        // Property DeliveryTypeCode

        $testValue = new DeliveryTermsCodeType();
        $model->setDeliveryTypeCode($testValue);

        $this->assertEquals($testValue, $model->getDeliveryTypeCode());

        $model->unsetDeliveryTypeCode();

        $this->assertNull($model->getDeliveryTypeCode());

        $createdDeliveryTypeCode = $model->getDeliveryTypeCodeWithCreate();

        $this->assertInstanceOf(DeliveryTermsCodeType::class, $createdDeliveryTypeCode);
        $this->assertSame($createdDeliveryTypeCode, $model->getDeliveryTypeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType.
     */
    public function testModelsZffxextendedRamTradePartyType(): void
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

        // Property RoleCode

        $testValue = 'dummy-RoleCodeValue';
        $model->setRoleCode($testValue);

        $this->assertEquals($testValue, $model->getRoleCode());

        $model->unsetRoleCode();

        $this->assertNull($model->getRoleCode());

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

        $definedTradeContactItems = [];
        $model->setDefinedTradeContact($definedTradeContactItems);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertCount(0, $model->getDefinedTradeContact());

        $definedTradeContactItem = new TradeContactType();
        $model->addToDefinedTradeContact($definedTradeContactItem);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertGreaterThanOrEqual(1, count($model->getDefinedTradeContact()));

        $createdDefinedTradeContactItem = $model->addToDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $createdDefinedTradeContactItem);

        $definedTradeContactOnceItem = new TradeContactType();

        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);
        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);

        $itemsAfterOnce = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearDefinedTradeContact();

        $itemsAfterClear = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentDiscountTermsType.
     */
    public function testModelsZffxextendedRamTradePaymentDiscountTermsType(): void
    {
        $model = new TradePaymentDiscountTermsType();

        $this->assertInstanceOf(TradePaymentDiscountTermsType::class, $model);

        // Property BasisDateTime

        $testValue = new DateTimeType();
        $model->setBasisDateTime($testValue);

        $this->assertEquals($testValue, $model->getBasisDateTime());

        $model->unsetBasisDateTime();

        $this->assertNull($model->getBasisDateTime());

        $createdBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdBasisDateTime);
        $this->assertSame($createdBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNull($model->getBasisPeriodMeasure());

        $createdBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $createdBasisPeriodMeasure);
        $this->assertSame($createdBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $createdBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdBasisAmount);
        $this->assertSame($createdBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $createdCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $createdCalculationPercent);
        $this->assertSame($createdCalculationPercent, $model->getCalculationPercent());

        // Property ActualDiscountAmount

        $testValue = new AmountType();
        $model->setActualDiscountAmount($testValue);

        $this->assertEquals($testValue, $model->getActualDiscountAmount());

        $model->unsetActualDiscountAmount();

        $this->assertNull($model->getActualDiscountAmount());

        $createdActualDiscountAmount = $model->getActualDiscountAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdActualDiscountAmount);
        $this->assertSame($createdActualDiscountAmount, $model->getActualDiscountAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentPenaltyTermsType.
     */
    public function testModelsZffxextendedRamTradePaymentPenaltyTermsType(): void
    {
        $model = new TradePaymentPenaltyTermsType();

        $this->assertInstanceOf(TradePaymentPenaltyTermsType::class, $model);

        // Property BasisDateTime

        $testValue = new DateTimeType();
        $model->setBasisDateTime($testValue);

        $this->assertEquals($testValue, $model->getBasisDateTime());

        $model->unsetBasisDateTime();

        $this->assertNull($model->getBasisDateTime());

        $createdBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $createdBasisDateTime);
        $this->assertSame($createdBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNull($model->getBasisPeriodMeasure());

        $createdBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $createdBasisPeriodMeasure);
        $this->assertSame($createdBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $createdBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdBasisAmount);
        $this->assertSame($createdBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $createdCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $createdCalculationPercent);
        $this->assertSame($createdCalculationPercent, $model->getCalculationPercent());

        // Property ActualPenaltyAmount

        $testValue = new AmountType();
        $model->setActualPenaltyAmount($testValue);

        $this->assertEquals($testValue, $model->getActualPenaltyAmount());

        $model->unsetActualPenaltyAmount();

        $this->assertNull($model->getActualPenaltyAmount());

        $createdActualPenaltyAmount = $model->getActualPenaltyAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdActualPenaltyAmount);
        $this->assertSame($createdActualPenaltyAmount, $model->getActualPenaltyAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentTermsType.
     */
    public function testModelsZffxextendedRamTradePaymentTermsType(): void
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

        // Property PartialPaymentAmount

        $testValue = new AmountType();
        $model->setPartialPaymentAmount($testValue);

        $this->assertEquals($testValue, $model->getPartialPaymentAmount());

        $model->unsetPartialPaymentAmount();

        $this->assertNull($model->getPartialPaymentAmount());

        $createdPartialPaymentAmount = $model->getPartialPaymentAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdPartialPaymentAmount);
        $this->assertSame($createdPartialPaymentAmount, $model->getPartialPaymentAmount());

        // Property ApplicableTradePaymentPenaltyTerms

        $model->unsetApplicableTradePaymentPenaltyTerms();

        $this->assertNull($model->getApplicableTradePaymentPenaltyTerms());

        $createdApplicableTradePaymentPenaltyTerms = $model->getApplicableTradePaymentPenaltyTermsWithCreate();

        $this->assertInstanceOf(TradePaymentPenaltyTermsType::class, $createdApplicableTradePaymentPenaltyTerms);
        $this->assertSame($createdApplicableTradePaymentPenaltyTerms, $model->getApplicableTradePaymentPenaltyTerms());

        // Property ApplicableTradePaymentDiscountTerms

        $model->unsetApplicableTradePaymentDiscountTerms();

        $this->assertNull($model->getApplicableTradePaymentDiscountTerms());

        $createdApplicableTradePaymentDiscountTerms = $model->getApplicableTradePaymentDiscountTermsWithCreate();

        $this->assertInstanceOf(TradePaymentDiscountTermsType::class, $createdApplicableTradePaymentDiscountTerms);
        $this->assertSame($createdApplicableTradePaymentDiscountTerms, $model->getApplicableTradePaymentDiscountTerms());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $createdPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $createdPayeeTradeParty);
        $this->assertSame($createdPayeeTradeParty, $model->getPayeeTradeParty());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePriceType.
     */
    public function testModelsZffxextendedRamTradePriceType(): void
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

        $appliedTradeAllowanceChargeItems = [];
        $model->setAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertCount(0, $model->getAppliedTradeAllowanceCharge());

        $appliedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getAppliedTradeAllowanceCharge()));

        $createdAppliedTradeAllowanceChargeItem = $model->addToAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $createdAppliedTradeAllowanceChargeItem);

        $appliedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);
        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearAppliedTradeAllowanceCharge();

        $itemsAfterClear = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property IncludedTradeTax

        $testValue = new TradeTaxType();
        $model->setIncludedTradeTax($testValue);

        $this->assertEquals($testValue, $model->getIncludedTradeTax());

        $model->unsetIncludedTradeTax();

        $this->assertNull($model->getIncludedTradeTax());

        $createdIncludedTradeTax = $model->getIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $createdIncludedTradeTax);
        $this->assertSame($createdIncludedTradeTax, $model->getIncludedTradeTax());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeProductInstanceType.
     */
    public function testModelsZffxextendedRamTradeProductInstanceType(): void
    {
        $model = new TradeProductInstanceType();

        $this->assertInstanceOf(TradeProductInstanceType::class, $model);

        // Property BatchID

        $testValue = new IDType();
        $model->setBatchID($testValue);

        $this->assertEquals($testValue, $model->getBatchID());

        $model->unsetBatchID();

        $this->assertNull($model->getBatchID());

        $createdBatchID = $model->getBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdBatchID);
        $this->assertSame($createdBatchID, $model->getBatchID());

        // Property SupplierAssignedSerialID

        $testValue = new IDType();
        $model->setSupplierAssignedSerialID($testValue);

        $this->assertEquals($testValue, $model->getSupplierAssignedSerialID());

        $model->unsetSupplierAssignedSerialID();

        $this->assertNull($model->getSupplierAssignedSerialID());

        $createdSupplierAssignedSerialID = $model->getSupplierAssignedSerialIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdSupplierAssignedSerialID);
        $this->assertSame($createdSupplierAssignedSerialID, $model->getSupplierAssignedSerialID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeProductType.
     */
    public function testModelsZffxextendedRamTradeProductType(): void
    {
        $model = new TradeProductType();

        $this->assertInstanceOf(TradeProductType::class, $model);

        // Property ID

        $testValue = new IDType();
        $model->setID($testValue);

        $this->assertEquals($testValue, $model->getID());

        $model->unsetID();

        $this->assertNull($model->getID());

        $createdID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdID);
        $this->assertSame($createdID, $model->getID());

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

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNull($model->getIndustryAssignedID());

        $createdIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdIndustryAssignedID);
        $this->assertSame($createdIndustryAssignedID, $model->getIndustryAssignedID());

        // Property ModelID

        $testValue = new IDType();
        $model->setModelID($testValue);

        $this->assertEquals($testValue, $model->getModelID());

        $model->unsetModelID();

        $this->assertNull($model->getModelID());

        $createdModelID = $model->getModelIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdModelID);
        $this->assertSame($createdModelID, $model->getModelID());

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

        // Property BatchID

        $batchIDItems = [];
        $model->setBatchID($batchIDItems);

        $this->assertIsArray($model->getBatchID());
        $this->assertCount(0, $model->getBatchID());

        $batchIDItem = new IDType();
        $model->addToBatchID($batchIDItem);

        $this->assertIsArray($model->getBatchID());
        $this->assertGreaterThanOrEqual(1, count($model->getBatchID()));

        $createdBatchIDItem = $model->addToBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $createdBatchIDItem);

        $batchIDOnceItem = new IDType();

        $model->addOnceToBatchID($batchIDOnceItem);
        $model->addOnceToBatchID($batchIDOnceItem);

        $itemsAfterOnce = $model->getBatchID();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearBatchID();

        $itemsAfterClear = $model->getBatchID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BrandName

        $testValue = new TextType();
        $model->setBrandName($testValue);

        $this->assertEquals($testValue, $model->getBrandName());

        $model->unsetBrandName();

        $this->assertNull($model->getBrandName());

        $createdBrandName = $model->getBrandNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdBrandName);
        $this->assertSame($createdBrandName, $model->getBrandName());

        // Property ModelName

        $testValue = new TextType();
        $model->setModelName($testValue);

        $this->assertEquals($testValue, $model->getModelName());

        $model->unsetModelName();

        $this->assertNull($model->getModelName());

        $createdModelName = $model->getModelNameWithCreate();

        $this->assertInstanceOf(TextType::class, $createdModelName);
        $this->assertSame($createdModelName, $model->getModelName());

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

        // Property IndividualTradeProductInstance

        $individualTradeProductInstanceItems = [];
        $model->setIndividualTradeProductInstance($individualTradeProductInstanceItems);

        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertCount(0, $model->getIndividualTradeProductInstance());

        $createdIndividualTradeProductInstanceItem = $model->addToIndividualTradeProductInstanceWithCreate();

        $this->assertInstanceOf(TradeProductInstanceType::class, $createdIndividualTradeProductInstanceItem);

        $model->clearIndividualTradeProductInstance();

        $itemsAfterClear = $model->getIndividualTradeProductInstance();

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

        // Property IncludedReferencedProduct

        $includedReferencedProductItems = [];
        $model->setIncludedReferencedProduct($includedReferencedProductItems);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertCount(0, $model->getIncludedReferencedProduct());

        $includedReferencedProductItem = new ReferencedProductType();
        $model->addToIncludedReferencedProduct($includedReferencedProductItem);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedReferencedProduct()));

        $createdIncludedReferencedProductItem = $model->addToIncludedReferencedProductWithCreate();

        $this->assertInstanceOf(ReferencedProductType::class, $createdIncludedReferencedProductItem);

        $includedReferencedProductOnceItem = new ReferencedProductType();

        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);
        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);

        $itemsAfterOnce = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterOnce);

        $model->clearIncludedReferencedProduct();

        $itemsAfterClear = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementFinancialCardType.
     */
    public function testModelsZffxextendedRamTradeSettlementFinancialCardType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementHeaderMonetarySummationType.
     */
    public function testModelsZffxextendedRamTradeSettlementHeaderMonetarySummationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementLineMonetarySummationType.
     */
    public function testModelsZffxextendedRamTradeSettlementLineMonetarySummationType(): void
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

        // Property TaxTotalAmount

        $testValue = new AmountType();
        $model->setTaxTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxTotalAmount());

        $model->unsetTaxTotalAmount();

        $this->assertNull($model->getTaxTotalAmount());

        $createdTaxTotalAmount = $model->getTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdTaxTotalAmount);
        $this->assertSame($createdTaxTotalAmount, $model->getTaxTotalAmount());

        // Property GrandTotalAmount

        $testValue = new AmountType();
        $model->setGrandTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getGrandTotalAmount());

        $model->unsetGrandTotalAmount();

        $this->assertNull($model->getGrandTotalAmount());

        $createdGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdGrandTotalAmount);
        $this->assertSame($createdGrandTotalAmount, $model->getGrandTotalAmount());

        // Property TotalAllowanceChargeAmount

        $testValue = new AmountType();
        $model->setTotalAllowanceChargeAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalAllowanceChargeAmount());

        $model->unsetTotalAllowanceChargeAmount();

        $this->assertNull($model->getTotalAllowanceChargeAmount());

        $createdTotalAllowanceChargeAmount = $model->getTotalAllowanceChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdTotalAllowanceChargeAmount);
        $this->assertSame($createdTotalAllowanceChargeAmount, $model->getTotalAllowanceChargeAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementPaymentMeansType.
     */
    public function testModelsZffxextendedRamTradeSettlementPaymentMeansType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType.
     */
    public function testModelsZffxextendedRamTradeTaxType(): void
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

        // Property LineTotalBasisAmount

        $testValue = new AmountType();
        $model->setLineTotalBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalBasisAmount());

        $model->unsetLineTotalBasisAmount();

        $this->assertNull($model->getLineTotalBasisAmount());

        $createdLineTotalBasisAmount = $model->getLineTotalBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdLineTotalBasisAmount);
        $this->assertSame($createdLineTotalBasisAmount, $model->getLineTotalBasisAmount());

        // Property AllowanceChargeBasisAmount

        $testValue = new AmountType();
        $model->setAllowanceChargeBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceChargeBasisAmount());

        $model->unsetAllowanceChargeBasisAmount();

        $this->assertNull($model->getAllowanceChargeBasisAmount());

        $createdAllowanceChargeBasisAmount = $model->getAllowanceChargeBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $createdAllowanceChargeBasisAmount);
        $this->assertSame($createdAllowanceChargeBasisAmount, $model->getAllowanceChargeBasisAmount());

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\UniversalCommunicationType.
     */
    public function testModelsZffxextendedRamUniversalCommunicationType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxextendedRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\rsm\CrossIndustryInvoiceType.
     */
    public function testModelsZffxextendedRsmCrossIndustryInvoiceType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType.
     */
    public function testModelsZffxextendedUdtAmountType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\BinaryObjectType.
     */
    public function testModelsZffxextendedUdtBinaryObjectType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\CodeType.
     */
    public function testModelsZffxextendedUdtCodeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxextendedUdtDatetimetypeDateTimeStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType.
     */
    public function testModelsZffxextendedUdtDateTimeType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\DateType\DateStringAType.
     */
    public function testModelsZffxextendedUdtDatetypeDateStringAType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\DateType.
     */
    public function testModelsZffxextendedUdtDateType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType.
     */
    public function testModelsZffxextendedUdtIDType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\IndicatorType.
     */
    public function testModelsZffxextendedUdtIndicatorType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\MeasureType.
     */
    public function testModelsZffxextendedUdtMeasureType(): void
    {
        $model = new MeasureType();

        $this->assertInstanceOf(MeasureType::class, $model);

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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\NumericType.
     */
    public function testModelsZffxextendedUdtNumericType(): void
    {
        $model = new NumericType();

        $this->assertInstanceOf(NumericType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\PercentType.
     */
    public function testModelsZffxextendedUdtPercentType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType.
     */
    public function testModelsZffxextendedUdtQuantityType(): void
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
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\RateType.
     */
    public function testModelsZffxextendedUdtRateType(): void
    {
        $model = new RateType();

        $this->assertInstanceOf(RateType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType.
     */
    public function testModelsZffxextendedUdtTextType(): void
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
