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

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
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

        $testValueForPaidAmount = $model->getPaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForPaidAmount);
        $this->assertSame($testValueForPaidAmount, $model->getPaidAmount());

        // Property FormattedReceivedDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedReceivedDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedReceivedDateTime());

        $model->unsetFormattedReceivedDateTime();

        $this->assertNull($model->getFormattedReceivedDateTime());

        $testValueForFormattedReceivedDateTime = $model->getFormattedReceivedDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $testValueForFormattedReceivedDateTime);
        $this->assertSame($testValueForFormattedReceivedDateTime, $model->getFormattedReceivedDateTime());

        // Property IncludedTradeTax

        $includedTradeTaxItems = [];
        $model->setIncludedTradeTax($includedTradeTaxItems);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertCount(0, $model->getIncludedTradeTax());

        $includedTradeTaxItem = new TradeTaxType();
        $model->addToIncludedTradeTax($includedTradeTaxItem);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedTradeTax()));

        $testValueForIncludedTradeTaxItem = $model->addToIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForIncludedTradeTaxItem);

        $includedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);
        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIncludedTradeTaxOnceItem = $model->addOnceToIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForIncludedTradeTaxOnceItem);

        $itemsAfterOnceWithCreate = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearIncludedTradeTax();

        $itemsAfterClear = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property InvoiceSpecifiedReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setInvoiceSpecifiedReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getInvoiceSpecifiedReferencedDocument());

        $model->unsetInvoiceSpecifiedReferencedDocument();

        $this->assertNull($model->getInvoiceSpecifiedReferencedDocument());

        $testValueForInvoiceSpecifiedReferencedDocument = $model->getInvoiceSpecifiedReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceSpecifiedReferencedDocument);
        $this->assertSame($testValueForInvoiceSpecifiedReferencedDocument, $model->getInvoiceSpecifiedReferencedDocument());
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

        $testValueForBICID = $model->getBICIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBICID);
        $this->assertSame($testValueForBICID, $model->getBICID());
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

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLineID);
        $this->assertSame($testValueForLineID, $model->getLineID());

        // Property ParentLineID

        $testValue = new IDType();
        $model->setParentLineID($testValue);

        $this->assertEquals($testValue, $model->getParentLineID());

        $model->unsetParentLineID();

        $this->assertNull($model->getParentLineID());

        $testValueForParentLineID = $model->getParentLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForParentLineID);
        $this->assertSame($testValueForParentLineID, $model->getParentLineID());

        // Property LineStatusCode

        $testValue = new LineStatusCodeType();
        $model->setLineStatusCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusCode());

        $model->unsetLineStatusCode();

        $this->assertNull($model->getLineStatusCode());

        $testValueForLineStatusCode = $model->getLineStatusCodeWithCreate();

        $this->assertInstanceOf(LineStatusCodeType::class, $testValueForLineStatusCode);
        $this->assertSame($testValueForLineStatusCode, $model->getLineStatusCode());

        // Property LineStatusReasonCode

        $testValue = new CodeType();
        $model->setLineStatusReasonCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusReasonCode());

        $model->unsetLineStatusReasonCode();

        $this->assertNull($model->getLineStatusReasonCode());

        $testValueForLineStatusReasonCode = $model->getLineStatusReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForLineStatusReasonCode);
        $this->assertSame($testValueForLineStatusReasonCode, $model->getLineStatusReasonCode());

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

        $testValueForTestIndicator = $model->getTestIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForTestIndicator);
        $this->assertSame($testValueForTestIndicator, $model->getTestIndicator());

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

        // Property CopyIndicator

        $testValue = new IndicatorType();
        $model->setCopyIndicator($testValue);

        $this->assertEquals($testValue, $model->getCopyIndicator());

        $model->unsetCopyIndicator();

        $this->assertNull($model->getCopyIndicator());

        $testValueForCopyIndicator = $model->getCopyIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForCopyIndicator);
        $this->assertSame($testValueForCopyIndicator, $model->getCopyIndicator());

        // Property LanguageID

        $testValue = new IDType();
        $model->setLanguageID($testValue);

        $this->assertEquals($testValue, $model->getLanguageID());

        $model->unsetLanguageID();

        $this->assertNull($model->getLanguageID());

        $testValueForLanguageID = $model->getLanguageIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLanguageID);
        $this->assertSame($testValueForLanguageID, $model->getLanguageID());

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

        // Property EffectiveSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setEffectiveSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getEffectiveSpecifiedPeriod());

        $model->unsetEffectiveSpecifiedPeriod();

        $this->assertNull($model->getEffectiveSpecifiedPeriod());

        $testValueForEffectiveSpecifiedPeriod = $model->getEffectiveSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $testValueForEffectiveSpecifiedPeriod);
        $this->assertSame($testValueForEffectiveSpecifiedPeriod, $model->getEffectiveSpecifiedPeriod());
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

        // Property SalesAgentTradeParty

        $testValue = new TradePartyType();
        $model->setSalesAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSalesAgentTradeParty());

        $model->unsetSalesAgentTradeParty();

        $this->assertNull($model->getSalesAgentTradeParty());

        $testValueForSalesAgentTradeParty = $model->getSalesAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSalesAgentTradeParty);
        $this->assertSame($testValueForSalesAgentTradeParty, $model->getSalesAgentTradeParty());

        // Property BuyerTaxRepresentativeTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerTaxRepresentativeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerTaxRepresentativeTradeParty());

        $model->unsetBuyerTaxRepresentativeTradeParty();

        $this->assertNull($model->getBuyerTaxRepresentativeTradeParty());

        $testValueForBuyerTaxRepresentativeTradeParty = $model->getBuyerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerTaxRepresentativeTradeParty);
        $this->assertSame($testValueForBuyerTaxRepresentativeTradeParty, $model->getBuyerTaxRepresentativeTradeParty());

        // Property SellerTaxRepresentativeTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTaxRepresentativeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTaxRepresentativeTradeParty());

        $model->unsetSellerTaxRepresentativeTradeParty();

        $this->assertNull($model->getSellerTaxRepresentativeTradeParty());

        $testValueForSellerTaxRepresentativeTradeParty = $model->getSellerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSellerTaxRepresentativeTradeParty);
        $this->assertSame($testValueForSellerTaxRepresentativeTradeParty, $model->getSellerTaxRepresentativeTradeParty());

        // Property ProductEndUserTradeParty

        $testValue = new TradePartyType();
        $model->setProductEndUserTradeParty($testValue);

        $this->assertEquals($testValue, $model->getProductEndUserTradeParty());

        $model->unsetProductEndUserTradeParty();

        $this->assertNull($model->getProductEndUserTradeParty());

        $testValueForProductEndUserTradeParty = $model->getProductEndUserTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForProductEndUserTradeParty);
        $this->assertSame($testValueForProductEndUserTradeParty, $model->getProductEndUserTradeParty());

        // Property ApplicableTradeDeliveryTerms

        $testValue = new TradeDeliveryTermsType();
        $model->setApplicableTradeDeliveryTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradeDeliveryTerms());

        $model->unsetApplicableTradeDeliveryTerms();

        $this->assertNull($model->getApplicableTradeDeliveryTerms());

        $testValueForApplicableTradeDeliveryTerms = $model->getApplicableTradeDeliveryTermsWithCreate();

        $this->assertInstanceOf(TradeDeliveryTermsType::class, $testValueForApplicableTradeDeliveryTerms);
        $this->assertSame($testValueForApplicableTradeDeliveryTerms, $model->getApplicableTradeDeliveryTerms());

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

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNull($model->getQuotationReferencedDocument());

        $testValueForQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForQuotationReferencedDocument);
        $this->assertSame($testValueForQuotationReferencedDocument, $model->getQuotationReferencedDocument());

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

        // Property BuyerAgentTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerAgentTradeParty());

        $model->unsetBuyerAgentTradeParty();

        $this->assertNull($model->getBuyerAgentTradeParty());

        $testValueForBuyerAgentTradeParty = $model->getBuyerAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerAgentTradeParty);
        $this->assertSame($testValueForBuyerAgentTradeParty, $model->getBuyerAgentTradeParty());

        // Property SpecifiedProcuringProject

        $testValue = new ProcuringProjectType();
        $model->setSpecifiedProcuringProject($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedProcuringProject());

        $model->unsetSpecifiedProcuringProject();

        $this->assertNull($model->getSpecifiedProcuringProject());

        $testValueForSpecifiedProcuringProject = $model->getSpecifiedProcuringProjectWithCreate();

        $this->assertInstanceOf(ProcuringProjectType::class, $testValueForSpecifiedProcuringProject);
        $this->assertSame($testValueForSpecifiedProcuringProject, $model->getSpecifiedProcuringProject());

        // Property UltimateCustomerOrderReferencedDocument

        $ultimateCustomerOrderReferencedDocumentItems = [];
        $model->setUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItems);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(0, $model->getUltimateCustomerOrderReferencedDocument());

        $ultimateCustomerOrderReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItem);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getUltimateCustomerOrderReferencedDocument()));

        $testValueForUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentItem);

        $ultimateCustomerOrderReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);
        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnceWithCreate = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $relatedSupplyChainConsignmentItem = new LogisticsTransportMovementType();
        $model->addToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentItem);

        $this->assertIsArray($model->getRelatedSupplyChainConsignment());
        $this->assertGreaterThanOrEqual(1, count($model->getRelatedSupplyChainConsignment()));

        $testValueForRelatedSupplyChainConsignmentItem = $model->addToRelatedSupplyChainConsignmentWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForRelatedSupplyChainConsignmentItem);

        $relatedSupplyChainConsignmentOnceItem = new LogisticsTransportMovementType();

        $model->addOnceToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentOnceItem);
        $model->addOnceToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentOnceItem);

        $itemsAfterOnce = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForRelatedSupplyChainConsignmentOnceItem = $model->addOnceToRelatedSupplyChainConsignmentWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForRelatedSupplyChainConsignmentOnceItem);

        $itemsAfterOnceWithCreate = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipToTradeParty);
        $this->assertSame($testValueForShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNull($model->getUltimateShipToTradeParty());

        $testValueForUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForUltimateShipToTradeParty);
        $this->assertSame($testValueForUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

        // Property ShipFromTradeParty

        $testValue = new TradePartyType();
        $model->setShipFromTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipFromTradeParty());

        $model->unsetShipFromTradeParty();

        $this->assertNull($model->getShipFromTradeParty());

        $testValueForShipFromTradeParty = $model->getShipFromTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipFromTradeParty);
        $this->assertSame($testValueForShipFromTradeParty, $model->getShipFromTradeParty());

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

        // Property DeliveryNoteReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDeliveryNoteReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDeliveryNoteReferencedDocument());

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNull($model->getDeliveryNoteReferencedDocument());

        $testValueForDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDeliveryNoteReferencedDocument);
        $this->assertSame($testValueForDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
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

        // Property InvoiceIssuerReference

        $testValue = new TextType();
        $model->setInvoiceIssuerReference($testValue);

        $this->assertEquals($testValue, $model->getInvoiceIssuerReference());

        $model->unsetInvoiceIssuerReference();

        $this->assertNull($model->getInvoiceIssuerReference());

        $testValueForInvoiceIssuerReference = $model->getInvoiceIssuerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForInvoiceIssuerReference);
        $this->assertSame($testValueForInvoiceIssuerReference, $model->getInvoiceIssuerReference());

        // Property InvoicerTradeParty

        $testValue = new TradePartyType();
        $model->setInvoicerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoicerTradeParty());

        $model->unsetInvoicerTradeParty();

        $this->assertNull($model->getInvoicerTradeParty());

        $testValueForInvoicerTradeParty = $model->getInvoicerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForInvoicerTradeParty);
        $this->assertSame($testValueForInvoicerTradeParty, $model->getInvoicerTradeParty());

        // Property InvoiceeTradeParty

        $testValue = new TradePartyType();
        $model->setInvoiceeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoiceeTradeParty());

        $model->unsetInvoiceeTradeParty();

        $this->assertNull($model->getInvoiceeTradeParty());

        $testValueForInvoiceeTradeParty = $model->getInvoiceeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForInvoiceeTradeParty);
        $this->assertSame($testValueForInvoiceeTradeParty, $model->getInvoiceeTradeParty());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $testValueForPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayeeTradeParty);
        $this->assertSame($testValueForPayeeTradeParty, $model->getPayeeTradeParty());

        // Property PayerTradeParty

        $testValue = new TradePartyType();
        $model->setPayerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayerTradeParty());

        $model->unsetPayerTradeParty();

        $this->assertNull($model->getPayerTradeParty());

        $testValueForPayerTradeParty = $model->getPayerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayerTradeParty);
        $this->assertSame($testValueForPayerTradeParty, $model->getPayerTradeParty());

        // Property TaxApplicableTradeCurrencyExchange

        $testValue = new TradeCurrencyExchangeType();
        $model->setTaxApplicableTradeCurrencyExchange($testValue);

        $this->assertEquals($testValue, $model->getTaxApplicableTradeCurrencyExchange());

        $model->unsetTaxApplicableTradeCurrencyExchange();

        $this->assertNull($model->getTaxApplicableTradeCurrencyExchange());

        $testValueForTaxApplicableTradeCurrencyExchange = $model->getTaxApplicableTradeCurrencyExchangeWithCreate();

        $this->assertInstanceOf(TradeCurrencyExchangeType::class, $testValueForTaxApplicableTradeCurrencyExchange);
        $this->assertSame($testValueForTaxApplicableTradeCurrencyExchange, $model->getTaxApplicableTradeCurrencyExchange());

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

        // Property SpecifiedLogisticsServiceCharge

        $specifiedLogisticsServiceChargeItems = [];
        $model->setSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeItems);

        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertCount(0, $model->getSpecifiedLogisticsServiceCharge());

        $specifiedLogisticsServiceChargeItem = new LogisticsServiceChargeType();
        $model->addToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeItem);

        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedLogisticsServiceCharge()));

        $testValueForSpecifiedLogisticsServiceChargeItem = $model->addToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $testValueForSpecifiedLogisticsServiceChargeItem);

        $specifiedLogisticsServiceChargeOnceItem = new LogisticsServiceChargeType();

        $model->addOnceToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeOnceItem);
        $model->addOnceToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeOnceItem);

        $itemsAfterOnce = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedLogisticsServiceChargeOnceItem = $model->addOnceToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $testValueForSpecifiedLogisticsServiceChargeOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForSpecifiedTradePaymentTermsItem = $model->addToSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $testValueForSpecifiedTradePaymentTermsItem);

        $specifiedTradePaymentTermsOnceItem = new TradePaymentTermsType();

        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);
        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedTradePaymentTermsOnceItem = $model->addOnceToSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $testValueForSpecifiedTradePaymentTermsOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterOnceWithCreate);

        $model->clearSpecifiedTradePaymentTerms();

        $itemsAfterClear = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

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

        $receivableSpecifiedTradeAccountingAccountItems = [];
        $model->setReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItems);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(0, $model->getReceivableSpecifiedTradeAccountingAccount());

        $receivableSpecifiedTradeAccountingAccountItem = new TradeAccountingAccountType();
        $model->addToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItem);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertGreaterThanOrEqual(1, count($model->getReceivableSpecifiedTradeAccountingAccount()));

        $testValueForReceivableSpecifiedTradeAccountingAccountItem = $model->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $testValueForReceivableSpecifiedTradeAccountingAccountItem);

        $receivableSpecifiedTradeAccountingAccountOnceItem = new TradeAccountingAccountType();

        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);
        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterOnce = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForReceivableSpecifiedTradeAccountingAccountOnceItem = $model->addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $testValueForReceivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterOnceWithCreate = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForSpecifiedAdvancePaymentItem = $model->addToSpecifiedAdvancePaymentWithCreate();

        $this->assertInstanceOf(AdvancePaymentType::class, $testValueForSpecifiedAdvancePaymentItem);

        $specifiedAdvancePaymentOnceItem = new AdvancePaymentType();

        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);
        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);

        $itemsAfterOnce = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedAdvancePaymentOnceItem = $model->addOnceToSpecifiedAdvancePaymentWithCreate();

        $this->assertInstanceOf(AdvancePaymentType::class, $testValueForSpecifiedAdvancePaymentOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNull($model->getPostalTradeAddress());

        $testValueForPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $testValueForPostalTradeAddress);
        $this->assertSame($testValueForPostalTradeAddress, $model->getPostalTradeAddress());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\LineTradeAgreementType.
     */
    public function testModelsZffxextendedRamLineTradeAgreementType(): void
    {
        $model = new LineTradeAgreementType();

        $this->assertInstanceOf(LineTradeAgreementType::class, $model);

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

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNull($model->getQuotationReferencedDocument());

        $testValueForQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForQuotationReferencedDocument);
        $this->assertSame($testValueForQuotationReferencedDocument, $model->getQuotationReferencedDocument());

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

        // Property UltimateCustomerOrderReferencedDocument

        $ultimateCustomerOrderReferencedDocumentItems = [];
        $model->setUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItems);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(0, $model->getUltimateCustomerOrderReferencedDocument());

        $ultimateCustomerOrderReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItem);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertGreaterThanOrEqual(1, count($model->getUltimateCustomerOrderReferencedDocument()));

        $testValueForUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentItem);

        $ultimateCustomerOrderReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);
        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnceWithCreate = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForBilledQuantity = $model->getBilledQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBilledQuantity);
        $this->assertSame($testValueForBilledQuantity, $model->getBilledQuantity());

        // Property ChargeFreeQuantity

        $testValue = new QuantityType();
        $model->setChargeFreeQuantity($testValue);

        $this->assertEquals($testValue, $model->getChargeFreeQuantity());

        $model->unsetChargeFreeQuantity();

        $this->assertNull($model->getChargeFreeQuantity());

        $testValueForChargeFreeQuantity = $model->getChargeFreeQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForChargeFreeQuantity);
        $this->assertSame($testValueForChargeFreeQuantity, $model->getChargeFreeQuantity());

        // Property PackageQuantity

        $testValue = new QuantityType();
        $model->setPackageQuantity($testValue);

        $this->assertEquals($testValue, $model->getPackageQuantity());

        $model->unsetPackageQuantity();

        $this->assertNull($model->getPackageQuantity());

        $testValueForPackageQuantity = $model->getPackageQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForPackageQuantity);
        $this->assertSame($testValueForPackageQuantity, $model->getPackageQuantity());

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNull($model->getShipToTradeParty());

        $testValueForShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipToTradeParty);
        $this->assertSame($testValueForShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNull($model->getUltimateShipToTradeParty());

        $testValueForUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForUltimateShipToTradeParty);
        $this->assertSame($testValueForUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

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

        // Property DeliveryNoteReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDeliveryNoteReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDeliveryNoteReferencedDocument());

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNull($model->getDeliveryNoteReferencedDocument());

        $testValueForDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDeliveryNoteReferencedDocument);
        $this->assertSame($testValueForDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
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

        // Property SpecifiedTradeSettlementLineMonetarySummation

        $testValue = new TradeSettlementLineMonetarySummationType();
        $model->setSpecifiedTradeSettlementLineMonetarySummation($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        $model->unsetSpecifiedTradeSettlementLineMonetarySummation();

        $this->assertNull($model->getSpecifiedTradeSettlementLineMonetarySummation());

        $testValueForSpecifiedTradeSettlementLineMonetarySummation = $model->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $testValueForSpecifiedTradeSettlementLineMonetarySummation);
        $this->assertSame($testValueForSpecifiedTradeSettlementLineMonetarySummation, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        // Property InvoiceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setInvoiceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getInvoiceReferencedDocument());

        $model->unsetInvoiceReferencedDocument();

        $this->assertNull($model->getInvoiceReferencedDocument());

        $testValueForInvoiceReferencedDocument = $model->getInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceReferencedDocument);
        $this->assertSame($testValueForInvoiceReferencedDocument, $model->getInvoiceReferencedDocument());

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

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property AppliedAmount

        $testValue = new AmountType();
        $model->setAppliedAmount($testValue);

        $this->assertEquals($testValue, $model->getAppliedAmount());

        $model->unsetAppliedAmount();

        $this->assertNull($model->getAppliedAmount());

        $testValueForAppliedAmount = $model->getAppliedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAppliedAmount);
        $this->assertSame($testValueForAppliedAmount, $model->getAppliedAmount());

        // Property AppliedTradeTax

        $appliedTradeTaxItems = [];
        $model->setAppliedTradeTax($appliedTradeTaxItems);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertCount(0, $model->getAppliedTradeTax());

        $appliedTradeTaxItem = new TradeTaxType();
        $model->addToAppliedTradeTax($appliedTradeTaxItem);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertGreaterThanOrEqual(1, count($model->getAppliedTradeTax()));

        $testValueForAppliedTradeTaxItem = $model->addToAppliedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForAppliedTradeTaxItem);

        $appliedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);
        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForAppliedTradeTaxOnceItem = $model->addOnceToAppliedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForAppliedTradeTaxOnceItem);

        $itemsAfterOnceWithCreate = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForModeCode = $model->getModeCodeWithCreate();

        $this->assertInstanceOf(TransportModeCodeType::class, $testValueForModeCode);
        $this->assertSame($testValueForModeCode, $model->getModeCode());
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

        $testValueForContentCode = $model->getContentCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForContentCode);
        $this->assertSame($testValueForContentCode, $model->getContentCode());

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

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNull($model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property ValueMeasure

        $testValue = new MeasureType();
        $model->setValueMeasure($testValue);

        $this->assertEquals($testValue, $model->getValueMeasure());

        $model->unsetValueMeasure();

        $this->assertNull($model->getValueMeasure());

        $testValueForValueMeasure = $model->getValueMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForValueMeasure);
        $this->assertSame($testValueForValueMeasure, $model->getValueMeasure());

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

        $testValueForClassCode = $model->getClassCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForClassCode);
        $this->assertSame($testValueForClassCode, $model->getClassCode());

        // Property ClassName

        $testValue = new TextType();
        $model->setClassName($testValue);

        $this->assertEquals($testValue, $model->getClassName());

        $model->unsetClassName();

        $this->assertNull($model->getClassName());

        $testValueForClassName = $model->getClassNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForClassName);
        $this->assertSame($testValueForClassName, $model->getClassName());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

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

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNull($model->getIndustryAssignedID());

        $testValueForIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIndustryAssignedID);
        $this->assertSame($testValueForIndustryAssignedID, $model->getIndustryAssignedID());

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

        // Property UnitQuantity

        $testValue = new QuantityType();
        $model->setUnitQuantity($testValue);

        $this->assertEquals($testValue, $model->getUnitQuantity());

        $model->unsetUnitQuantity();

        $this->assertNull($model->getUnitQuantity());

        $testValueForUnitQuantity = $model->getUnitQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForUnitQuantity);
        $this->assertSame($testValueForUnitQuantity, $model->getUnitQuantity());
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

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

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

        // Property CompleteDateTime

        $testValue = new DateTimeType();
        $model->setCompleteDateTime($testValue);

        $this->assertEquals($testValue, $model->getCompleteDateTime());

        $model->unsetCompleteDateTime();

        $this->assertNull($model->getCompleteDateTime());

        $testValueForCompleteDateTime = $model->getCompleteDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForCompleteDateTime);
        $this->assertSame($testValueForCompleteDateTime, $model->getCompleteDateTime());
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

        $specifiedLogisticsTransportMovementItem = new LogisticsTransportMovementType();
        $model->addToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementItem);

        $this->assertIsArray($model->getSpecifiedLogisticsTransportMovement());
        $this->assertGreaterThanOrEqual(1, count($model->getSpecifiedLogisticsTransportMovement()));

        $testValueForSpecifiedLogisticsTransportMovementItem = $model->addToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForSpecifiedLogisticsTransportMovementItem);

        $specifiedLogisticsTransportMovementOnceItem = new LogisticsTransportMovementType();

        $model->addOnceToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementOnceItem);
        $model->addOnceToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementOnceItem);

        $itemsAfterOnce = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForSpecifiedLogisticsTransportMovementOnceItem = $model->addOnceToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForSpecifiedLogisticsTransportMovementOnceItem);

        $itemsAfterOnceWithCreate = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForOccurrenceDateTime);
        $this->assertSame($testValueForOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\models\zffxextended\ram\SupplyChainTradeLineItemType.
     */
    public function testModelsZffxextendedRamSupplyChainTradeLineItemType(): void
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property TypeCode

        $testValue = new AccountingAccountTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(AccountingAccountTypeCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());
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

        $testValueForChargeIndicator = $model->getChargeIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForChargeIndicator);
        $this->assertSame($testValueForChargeIndicator, $model->getChargeIndicator());

        // Property SequenceNumeric

        $testValue = new NumericType();
        $model->setSequenceNumeric($testValue);

        $this->assertEquals($testValue, $model->getSequenceNumeric());

        $model->unsetSequenceNumeric();

        $this->assertNull($model->getSequenceNumeric());

        $testValueForSequenceNumeric = $model->getSequenceNumericWithCreate();

        $this->assertInstanceOf(NumericType::class, $testValueForSequenceNumeric);
        $this->assertSame($testValueForSequenceNumeric, $model->getSequenceNumeric());

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

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNull($model->getBasisQuantity());

        $testValueForBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBasisQuantity);
        $this->assertSame($testValueForBasisQuantity, $model->getBasisQuantity());

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

        // Property TypeCode

        $testValue = new CodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNull($model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property TelephoneUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setTelephoneUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getTelephoneUniversalCommunication());

        $model->unsetTelephoneUniversalCommunication();

        $this->assertNull($model->getTelephoneUniversalCommunication());

        $testValueForTelephoneUniversalCommunication = $model->getTelephoneUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForTelephoneUniversalCommunication);
        $this->assertSame($testValueForTelephoneUniversalCommunication, $model->getTelephoneUniversalCommunication());

        // Property FaxUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setFaxUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getFaxUniversalCommunication());

        $model->unsetFaxUniversalCommunication();

        $this->assertNull($model->getFaxUniversalCommunication());

        $testValueForFaxUniversalCommunication = $model->getFaxUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForFaxUniversalCommunication);
        $this->assertSame($testValueForFaxUniversalCommunication, $model->getFaxUniversalCommunication());

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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
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

        $testValueForSourceCurrencyCode = $model->getSourceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForSourceCurrencyCode);
        $this->assertSame($testValueForSourceCurrencyCode, $model->getSourceCurrencyCode());

        // Property TargetCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setTargetCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTargetCurrencyCode());

        $model->unsetTargetCurrencyCode();

        $this->assertNull($model->getTargetCurrencyCode());

        $testValueForTargetCurrencyCode = $model->getTargetCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForTargetCurrencyCode);
        $this->assertSame($testValueForTargetCurrencyCode, $model->getTargetCurrencyCode());

        // Property ConversionRate

        $testValue = new RateType();
        $model->setConversionRate($testValue);

        $this->assertEquals($testValue, $model->getConversionRate());

        $model->unsetConversionRate();

        $this->assertNull($model->getConversionRate());

        $testValueForConversionRate = $model->getConversionRateWithCreate();

        $this->assertInstanceOf(RateType::class, $testValueForConversionRate);
        $this->assertSame($testValueForConversionRate, $model->getConversionRate());

        // Property ConversionRateDateTime

        $testValue = new DateTimeType();
        $model->setConversionRateDateTime($testValue);

        $this->assertEquals($testValue, $model->getConversionRateDateTime());

        $model->unsetConversionRateDateTime();

        $this->assertNull($model->getConversionRateDateTime());

        $testValueForConversionRateDateTime = $model->getConversionRateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForConversionRateDateTime);
        $this->assertSame($testValueForConversionRateDateTime, $model->getConversionRateDateTime());
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

        $testValueForDeliveryTypeCode = $model->getDeliveryTypeCodeWithCreate();

        $this->assertInstanceOf(DeliveryTermsCodeType::class, $testValueForDeliveryTypeCode);
        $this->assertSame($testValueForDeliveryTypeCode, $model->getDeliveryTypeCode());
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

        $definedTradeContactItems = [];
        $model->setDefinedTradeContact($definedTradeContactItems);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertCount(0, $model->getDefinedTradeContact());

        $definedTradeContactItem = new TradeContactType();
        $model->addToDefinedTradeContact($definedTradeContactItem);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertGreaterThanOrEqual(1, count($model->getDefinedTradeContact()));

        $testValueForDefinedTradeContactItem = $model->addToDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $testValueForDefinedTradeContactItem);

        $definedTradeContactOnceItem = new TradeContactType();

        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);
        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);

        $itemsAfterOnce = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForDefinedTradeContactOnceItem = $model->addOnceToDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $testValueForDefinedTradeContactOnceItem);

        $itemsAfterOnceWithCreate = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForBasisDateTime);
        $this->assertSame($testValueForBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNull($model->getBasisPeriodMeasure());

        $testValueForBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForBasisPeriodMeasure);
        $this->assertSame($testValueForBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property ActualDiscountAmount

        $testValue = new AmountType();
        $model->setActualDiscountAmount($testValue);

        $this->assertEquals($testValue, $model->getActualDiscountAmount());

        $model->unsetActualDiscountAmount();

        $this->assertNull($model->getActualDiscountAmount());

        $testValueForActualDiscountAmount = $model->getActualDiscountAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualDiscountAmount);
        $this->assertSame($testValueForActualDiscountAmount, $model->getActualDiscountAmount());
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

        $testValueForBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForBasisDateTime);
        $this->assertSame($testValueForBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNull($model->getBasisPeriodMeasure());

        $testValueForBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForBasisPeriodMeasure);
        $this->assertSame($testValueForBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNull($model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNull($model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property ActualPenaltyAmount

        $testValue = new AmountType();
        $model->setActualPenaltyAmount($testValue);

        $this->assertEquals($testValue, $model->getActualPenaltyAmount());

        $model->unsetActualPenaltyAmount();

        $this->assertNull($model->getActualPenaltyAmount());

        $testValueForActualPenaltyAmount = $model->getActualPenaltyAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualPenaltyAmount);
        $this->assertSame($testValueForActualPenaltyAmount, $model->getActualPenaltyAmount());
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

        // Property PartialPaymentAmount

        $testValue = new AmountType();
        $model->setPartialPaymentAmount($testValue);

        $this->assertEquals($testValue, $model->getPartialPaymentAmount());

        $model->unsetPartialPaymentAmount();

        $this->assertNull($model->getPartialPaymentAmount());

        $testValueForPartialPaymentAmount = $model->getPartialPaymentAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForPartialPaymentAmount);
        $this->assertSame($testValueForPartialPaymentAmount, $model->getPartialPaymentAmount());

        // Property ApplicableTradePaymentPenaltyTerms

        $testValue = new TradePaymentPenaltyTermsType();
        $model->setApplicableTradePaymentPenaltyTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradePaymentPenaltyTerms());

        $model->unsetApplicableTradePaymentPenaltyTerms();

        $this->assertNull($model->getApplicableTradePaymentPenaltyTerms());

        $testValueForApplicableTradePaymentPenaltyTerms = $model->getApplicableTradePaymentPenaltyTermsWithCreate();

        $this->assertInstanceOf(TradePaymentPenaltyTermsType::class, $testValueForApplicableTradePaymentPenaltyTerms);
        $this->assertSame($testValueForApplicableTradePaymentPenaltyTerms, $model->getApplicableTradePaymentPenaltyTerms());

        // Property ApplicableTradePaymentDiscountTerms

        $testValue = new TradePaymentDiscountTermsType();
        $model->setApplicableTradePaymentDiscountTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradePaymentDiscountTerms());

        $model->unsetApplicableTradePaymentDiscountTerms();

        $this->assertNull($model->getApplicableTradePaymentDiscountTerms());

        $testValueForApplicableTradePaymentDiscountTerms = $model->getApplicableTradePaymentDiscountTermsWithCreate();

        $this->assertInstanceOf(TradePaymentDiscountTermsType::class, $testValueForApplicableTradePaymentDiscountTerms);
        $this->assertSame($testValueForApplicableTradePaymentDiscountTerms, $model->getApplicableTradePaymentDiscountTerms());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNull($model->getPayeeTradeParty());

        $testValueForPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayeeTradeParty);
        $this->assertSame($testValueForPayeeTradeParty, $model->getPayeeTradeParty());
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

        $appliedTradeAllowanceChargeItems = [];
        $model->setAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertCount(0, $model->getAppliedTradeAllowanceCharge());

        $appliedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertGreaterThanOrEqual(1, count($model->getAppliedTradeAllowanceCharge()));

        $testValueForAppliedTradeAllowanceChargeItem = $model->addToAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForAppliedTradeAllowanceChargeItem);

        $appliedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);
        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForAppliedTradeAllowanceChargeOnceItem = $model->addOnceToAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForAppliedTradeAllowanceChargeOnceItem);

        $itemsAfterOnceWithCreate = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForIncludedTradeTax = $model->getIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForIncludedTradeTax);
        $this->assertSame($testValueForIncludedTradeTax, $model->getIncludedTradeTax());
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

        $testValueForBatchID = $model->getBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBatchID);
        $this->assertSame($testValueForBatchID, $model->getBatchID());

        // Property SupplierAssignedSerialID

        $testValue = new IDType();
        $model->setSupplierAssignedSerialID($testValue);

        $this->assertEquals($testValue, $model->getSupplierAssignedSerialID());

        $model->unsetSupplierAssignedSerialID();

        $this->assertNull($model->getSupplierAssignedSerialID());

        $testValueForSupplierAssignedSerialID = $model->getSupplierAssignedSerialIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForSupplierAssignedSerialID);
        $this->assertSame($testValueForSupplierAssignedSerialID, $model->getSupplierAssignedSerialID());
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

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

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

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNull($model->getIndustryAssignedID());

        $testValueForIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIndustryAssignedID);
        $this->assertSame($testValueForIndustryAssignedID, $model->getIndustryAssignedID());

        // Property ModelID

        $testValue = new IDType();
        $model->setModelID($testValue);

        $this->assertEquals($testValue, $model->getModelID());

        $model->unsetModelID();

        $this->assertNull($model->getModelID());

        $testValueForModelID = $model->getModelIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForModelID);
        $this->assertSame($testValueForModelID, $model->getModelID());

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

        // Property BatchID

        $batchIDItems = [];
        $model->setBatchID($batchIDItems);

        $this->assertIsArray($model->getBatchID());
        $this->assertCount(0, $model->getBatchID());

        $batchIDItem = new IDType();
        $model->addToBatchID($batchIDItem);

        $this->assertIsArray($model->getBatchID());
        $this->assertGreaterThanOrEqual(1, count($model->getBatchID()));

        $testValueForBatchIDItem = $model->addToBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBatchIDItem);

        $batchIDOnceItem = new IDType();

        $model->addOnceToBatchID($batchIDOnceItem);
        $model->addOnceToBatchID($batchIDOnceItem);

        $itemsAfterOnce = $model->getBatchID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForBatchIDOnceItem = $model->addOnceToBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBatchIDOnceItem);

        $itemsAfterOnceWithCreate = $model->getBatchID();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForBrandName = $model->getBrandNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForBrandName);
        $this->assertSame($testValueForBrandName, $model->getBrandName());

        // Property ModelName

        $testValue = new TextType();
        $model->setModelName($testValue);

        $this->assertEquals($testValue, $model->getModelName());

        $model->unsetModelName();

        $this->assertNull($model->getModelName());

        $testValueForModelName = $model->getModelNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForModelName);
        $this->assertSame($testValueForModelName, $model->getModelName());

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

        // Property IndividualTradeProductInstance

        $individualTradeProductInstanceItems = [];
        $model->setIndividualTradeProductInstance($individualTradeProductInstanceItems);

        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertCount(0, $model->getIndividualTradeProductInstance());

        $individualTradeProductInstanceItem = new TradeProductInstanceType();
        $model->addToIndividualTradeProductInstance($individualTradeProductInstanceItem);

        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertGreaterThanOrEqual(1, count($model->getIndividualTradeProductInstance()));

        $testValueForIndividualTradeProductInstanceItem = $model->addToIndividualTradeProductInstanceWithCreate();

        $this->assertInstanceOf(TradeProductInstanceType::class, $testValueForIndividualTradeProductInstanceItem);

        $individualTradeProductInstanceOnceItem = new TradeProductInstanceType();

        $model->addOnceToIndividualTradeProductInstance($individualTradeProductInstanceOnceItem);
        $model->addOnceToIndividualTradeProductInstance($individualTradeProductInstanceOnceItem);

        $itemsAfterOnce = $model->getIndividualTradeProductInstance();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIndividualTradeProductInstanceOnceItem = $model->addOnceToIndividualTradeProductInstanceWithCreate();

        $this->assertInstanceOf(TradeProductInstanceType::class, $testValueForIndividualTradeProductInstanceOnceItem);

        $itemsAfterOnceWithCreate = $model->getIndividualTradeProductInstance();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        $testValueForOriginTradeCountry = $model->getOriginTradeCountryWithCreate();

        $this->assertInstanceOf(TradeCountryType::class, $testValueForOriginTradeCountry);
        $this->assertSame($testValueForOriginTradeCountry, $model->getOriginTradeCountry());

        // Property IncludedReferencedProduct

        $includedReferencedProductItems = [];
        $model->setIncludedReferencedProduct($includedReferencedProductItems);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertCount(0, $model->getIncludedReferencedProduct());

        $includedReferencedProductItem = new ReferencedProductType();
        $model->addToIncludedReferencedProduct($includedReferencedProductItem);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertGreaterThanOrEqual(1, count($model->getIncludedReferencedProduct()));

        $testValueForIncludedReferencedProductItem = $model->addToIncludedReferencedProductWithCreate();

        $this->assertInstanceOf(ReferencedProductType::class, $testValueForIncludedReferencedProductItem);

        $includedReferencedProductOnceItem = new ReferencedProductType();

        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);
        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);

        $itemsAfterOnce = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        $testValueForIncludedReferencedProductOnceItem = $model->addOnceToIncludedReferencedProductWithCreate();

        $this->assertInstanceOf(ReferencedProductType::class, $testValueForIncludedReferencedProductOnceItem);

        $itemsAfterOnceWithCreate = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterOnceWithCreate);

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

        // Property TaxTotalAmount

        $testValue = new AmountType();
        $model->setTaxTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxTotalAmount());

        $model->unsetTaxTotalAmount();

        $this->assertNull($model->getTaxTotalAmount());

        $testValueForTaxTotalAmount = $model->getTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxTotalAmount);
        $this->assertSame($testValueForTaxTotalAmount, $model->getTaxTotalAmount());

        // Property GrandTotalAmount

        $testValue = new AmountType();
        $model->setGrandTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getGrandTotalAmount());

        $model->unsetGrandTotalAmount();

        $this->assertNull($model->getGrandTotalAmount());

        $testValueForGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForGrandTotalAmount);
        $this->assertSame($testValueForGrandTotalAmount, $model->getGrandTotalAmount());

        // Property TotalAllowanceChargeAmount

        $testValue = new AmountType();
        $model->setTotalAllowanceChargeAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalAllowanceChargeAmount());

        $model->unsetTotalAllowanceChargeAmount();

        $this->assertNull($model->getTotalAllowanceChargeAmount());

        $testValueForTotalAllowanceChargeAmount = $model->getTotalAllowanceChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTotalAllowanceChargeAmount);
        $this->assertSame($testValueForTotalAllowanceChargeAmount, $model->getTotalAllowanceChargeAmount());
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

        // Property LineTotalBasisAmount

        $testValue = new AmountType();
        $model->setLineTotalBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalBasisAmount());

        $model->unsetLineTotalBasisAmount();

        $this->assertNull($model->getLineTotalBasisAmount());

        $testValueForLineTotalBasisAmount = $model->getLineTotalBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalBasisAmount);
        $this->assertSame($testValueForLineTotalBasisAmount, $model->getLineTotalBasisAmount());

        // Property AllowanceChargeBasisAmount

        $testValue = new AmountType();
        $model->setAllowanceChargeBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceChargeBasisAmount());

        $model->unsetAllowanceChargeBasisAmount();

        $this->assertNull($model->getAllowanceChargeBasisAmount());

        $testValueForAllowanceChargeBasisAmount = $model->getAllowanceChargeBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAllowanceChargeBasisAmount);
        $this->assertSame($testValueForAllowanceChargeBasisAmount, $model->getAllowanceChargeBasisAmount());

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

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
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

        $testValueForDateString = $model->getDateStringWithCreate();

        $this->assertInstanceOf(DateStringAType::class, $testValueForDateString);
        $this->assertSame($testValueForDateString, $model->getDateString());
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
