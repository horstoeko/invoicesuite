<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AccountingAccountTypeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ContactTypeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DeliveryTermsCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType\DateTimeStringAType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\LineStatusCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\PartyRoleCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxCategoryCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxTypeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TimeReferenceCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TransportModeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\AdvancePaymentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\CreditorFinancialAccountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\CreditorFinancialInstitutionType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\DebtorFinancialAccountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentLineDocumentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeAgreementType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeDeliveryType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeSettlementType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LegalOrganizationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeAgreementType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeDeliveryType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeSettlementType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsServiceChargeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsTransportMovementType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\NoteType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProcuringProjectType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductCharacteristicType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductClassificationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedProductType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SpecifiedPeriodType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainConsignmentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainEventType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeLineItemType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeTransactionType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TaxRegistrationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAccountingAccountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAddressType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAllowanceChargeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeContactType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCountryType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCurrencyExchangeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeDeliveryTermsType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentDiscountTermsType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentPenaltyTermsType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePriceType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeProductInstanceType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeProductType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementFinancialCardType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementHeaderMonetarySummationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementLineMonetarySummationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementPaymentMeansType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType;
use horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\BinaryObjectType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType\DateTimeStringAType as DateTimeStringAType1;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType\DateStringAType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\MeasureType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\NumericType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\RateType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\tests\TestCase;

final class ZffxModelTest extends TestCase
{
    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AccountingAccountTypeCodeType.
     */
    public function testModelsZffxextendedQdtAccountingAccountTypeCodeType(): void
    {
        $model = new AccountingAccountTypeCodeType();

        $this->assertInstanceOf(AccountingAccountTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AllowanceChargeReasonCodeType.
     */
    public function testModelsZffxextendedQdtAllowanceChargeReasonCodeType(): void
    {
        $model = new AllowanceChargeReasonCodeType();

        $this->assertInstanceOf(AllowanceChargeReasonCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ContactTypeCodeType.
     */
    public function testModelsZffxextendedQdtContactTypeCodeType(): void
    {
        $model = new ContactTypeCodeType();

        $this->assertInstanceOf(ContactTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType.
     */
    public function testModelsZffxextendedQdtCountryIDType(): void
    {
        $model = new CountryIDType();

        $this->assertInstanceOf(CountryIDType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType.
     */
    public function testModelsZffxextendedQdtCurrencyCodeType(): void
    {
        $model = new CurrencyCodeType();

        $this->assertInstanceOf(CurrencyCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DeliveryTermsCodeType.
     */
    public function testModelsZffxextendedQdtDeliveryTermsCodeType(): void
    {
        $model = new DeliveryTermsCodeType();

        $this->assertInstanceOf(DeliveryTermsCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType.
     */
    public function testModelsZffxextendedQdtDocumentCodeType(): void
    {
        $model = new DocumentCodeType();

        $this->assertInstanceOf(DocumentCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxextendedQdtFormatteddatetimetypeDateTimeStringAType(): void
    {
        $model = new DateTimeStringAType();

        $this->assertInstanceOf(DateTimeStringAType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property Format

        $testValue = 'dummy-FormatValue';
        $model->setFormat($testValue);

        $this->assertSame($testValue, $model->getFormat());

        $model->unsetFormat();

        $this->assertNull($model->getFormat());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType.
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

        $this->assertNotInstanceOf(DateTimeStringAType::class, $model->getDateTimeString());

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\LineStatusCodeType.
     */
    public function testModelsZffxextendedQdtLineStatusCodeType(): void
    {
        $model = new LineStatusCodeType();

        $this->assertInstanceOf(LineStatusCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\PartyRoleCodeType.
     */
    public function testModelsZffxextendedQdtPartyRoleCodeType(): void
    {
        $model = new PartyRoleCodeType();

        $this->assertInstanceOf(PartyRoleCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\PaymentMeansCodeType.
     */
    public function testModelsZffxextendedQdtPaymentMeansCodeType(): void
    {
        $model = new PaymentMeansCodeType();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ReferenceCodeType.
     */
    public function testModelsZffxextendedQdtReferenceCodeType(): void
    {
        $model = new ReferenceCodeType();

        $this->assertInstanceOf(ReferenceCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxCategoryCodeType.
     */
    public function testModelsZffxextendedQdtTaxCategoryCodeType(): void
    {
        $model = new TaxCategoryCodeType();

        $this->assertInstanceOf(TaxCategoryCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TaxTypeCodeType.
     */
    public function testModelsZffxextendedQdtTaxTypeCodeType(): void
    {
        $model = new TaxTypeCodeType();

        $this->assertInstanceOf(TaxTypeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TimeReferenceCodeType.
     */
    public function testModelsZffxextendedQdtTimeReferenceCodeType(): void
    {
        $model = new TimeReferenceCodeType();

        $this->assertInstanceOf(TimeReferenceCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TransportModeCodeType.
     */
    public function testModelsZffxextendedQdtTransportModeCodeType(): void
    {
        $model = new TransportModeCodeType();

        $this->assertInstanceOf(TransportModeCodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\AdvancePaymentType.
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

        $this->assertNotInstanceOf(AmountType::class, $model->getPaidAmount());

        $testValueForPaidAmount = $model->getPaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForPaidAmount);
        $this->assertSame($testValueForPaidAmount, $model->getPaidAmount());

        // Property FormattedReceivedDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedReceivedDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedReceivedDateTime());

        $model->unsetFormattedReceivedDateTime();

        $this->assertNotInstanceOf(FormattedDateTimeType::class, $model->getFormattedReceivedDateTime());

        $testValueForFormattedReceivedDateTime = $model->getFormattedReceivedDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $testValueForFormattedReceivedDateTime);
        $this->assertSame($testValueForFormattedReceivedDateTime, $model->getFormattedReceivedDateTime());

        // (1) Property IncludedTradeTax - Test set empty array

        $includedTradeTaxItems = [];
        $model->setIncludedTradeTax($includedTradeTaxItems);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertCount(0, $model->getIncludedTradeTax());

        // (2) Property IncludedTradeTax - Add instance

        $includedTradeTaxItem = new TradeTaxType();
        $model->addToIncludedTradeTax($includedTradeTaxItem);

        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertCount(1, $model->getIncludedTradeTax());

        // (3) Property IncludedTradeTax - Add and create instancc

        $testValueForIncludedTradeTaxItem = $model->addToIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForIncludedTradeTaxItem);
        $this->assertIsArray($model->getIncludedTradeTax());
        $this->assertCount(2, $model->getIncludedTradeTax());

        // (4) Property IncludedTradeTax - Add once an instance

        $includedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);
        $model->addOnceToIncludedTradeTax($includedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IncludedTradeTax - Add once an instance with implicit creation

        $firstIncludedTradeTaxOnceItem = $model->addOnceToIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $firstIncludedTradeTaxOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IncludedTradeTax - Add once an instance with implicit creation (2)

        $secondIncludedTradeTaxOnceItem = $model->addOnceToIncludedTradeTaxWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIncludedTradeTaxOnceItem, $secondIncludedTradeTaxOnceItem);

        // (7) Property IncludedTradeTax - Clesr

        $model->clearIncludedTradeTax();

        $itemsAfterClear = $model->getIncludedTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property InvoiceSpecifiedReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setInvoiceSpecifiedReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getInvoiceSpecifiedReferencedDocument());

        $model->unsetInvoiceSpecifiedReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getInvoiceSpecifiedReferencedDocument());

        $testValueForInvoiceSpecifiedReferencedDocument = $model->getInvoiceSpecifiedReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceSpecifiedReferencedDocument);
        $this->assertSame($testValueForInvoiceSpecifiedReferencedDocument, $model->getInvoiceSpecifiedReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\CreditorFinancialAccountType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getIBANID());

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());

        // Property AccountName

        $testValue = new TextType();
        $model->setAccountName($testValue);

        $this->assertEquals($testValue, $model->getAccountName());

        $model->unsetAccountName();

        $this->assertNotInstanceOf(TextType::class, $model->getAccountName());

        $testValueForAccountName = $model->getAccountNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForAccountName);
        $this->assertSame($testValueForAccountName, $model->getAccountName());

        // Property ProprietaryID

        $testValue = new IDType();
        $model->setProprietaryID($testValue);

        $this->assertEquals($testValue, $model->getProprietaryID());

        $model->unsetProprietaryID();

        $this->assertNotInstanceOf(IDType::class, $model->getProprietaryID());

        $testValueForProprietaryID = $model->getProprietaryIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForProprietaryID);
        $this->assertSame($testValueForProprietaryID, $model->getProprietaryID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\CreditorFinancialInstitutionType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getBICID());

        $testValueForBICID = $model->getBICIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBICID);
        $this->assertSame($testValueForBICID, $model->getBICID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\DebtorFinancialAccountType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getIBANID());

        $testValueForIBANID = $model->getIBANIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIBANID);
        $this->assertSame($testValueForIBANID, $model->getIBANID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentContextParameterType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentLineDocumentType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getLineID());

        $testValueForLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLineID);
        $this->assertSame($testValueForLineID, $model->getLineID());

        // Property ParentLineID

        $testValue = new IDType();
        $model->setParentLineID($testValue);

        $this->assertEquals($testValue, $model->getParentLineID());

        $model->unsetParentLineID();

        $this->assertNotInstanceOf(IDType::class, $model->getParentLineID());

        $testValueForParentLineID = $model->getParentLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForParentLineID);
        $this->assertSame($testValueForParentLineID, $model->getParentLineID());

        // Property LineStatusCode

        $testValue = new LineStatusCodeType();
        $model->setLineStatusCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusCode());

        $model->unsetLineStatusCode();

        $this->assertNotInstanceOf(LineStatusCodeType::class, $model->getLineStatusCode());

        $testValueForLineStatusCode = $model->getLineStatusCodeWithCreate();

        $this->assertInstanceOf(LineStatusCodeType::class, $testValueForLineStatusCode);
        $this->assertSame($testValueForLineStatusCode, $model->getLineStatusCode());

        // Property LineStatusReasonCode

        $testValue = new CodeType();
        $model->setLineStatusReasonCode($testValue);

        $this->assertEquals($testValue, $model->getLineStatusReasonCode());

        $model->unsetLineStatusReasonCode();

        $this->assertNotInstanceOf(CodeType::class, $model->getLineStatusReasonCode());

        $testValueForLineStatusReasonCode = $model->getLineStatusReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForLineStatusReasonCode);
        $this->assertSame($testValueForLineStatusReasonCode, $model->getLineStatusReasonCode());

        // (1) Property IncludedNote - Test set empty array

        $includedNoteItems = [];
        $model->setIncludedNote($includedNoteItems);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(0, $model->getIncludedNote());

        // (2) Property IncludedNote - Add instance

        $includedNoteItem = new NoteType();
        $model->addToIncludedNote($includedNoteItem);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(1, $model->getIncludedNote());

        // (3) Property IncludedNote - Add and create instancc

        $testValueForIncludedNoteItem = $model->addToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $testValueForIncludedNoteItem);
        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(2, $model->getIncludedNote());

        // (4) Property IncludedNote - Add once an instance

        $includedNoteOnceItem = new NoteType();

        $model->addOnceToIncludedNote($includedNoteOnceItem);
        $model->addOnceToIncludedNote($includedNoteOnceItem);

        $itemsAfterOnce = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IncludedNote - Add once an instance with implicit creation

        $firstIncludedNoteOnceItem = $model->addOnceToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $firstIncludedNoteOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IncludedNote - Add once an instance with implicit creation (2)

        $secondIncludedNoteOnceItem = $model->addOnceToIncludedNoteWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIncludedNoteOnceItem, $secondIncludedNoteOnceItem);

        // (7) Property IncludedNote - Clesr

        $model->clearIncludedNote();

        $itemsAfterClear = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentContextType.
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

        $this->assertNotInstanceOf(IndicatorType::class, $model->getTestIndicator());

        $testValueForTestIndicator = $model->getTestIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForTestIndicator);
        $this->assertSame($testValueForTestIndicator, $model->getTestIndicator());

        // Property BusinessProcessSpecifiedDocumentContextParameter

        $testValue = new DocumentContextParameterType();
        $model->setBusinessProcessSpecifiedDocumentContextParameter($testValue);

        $this->assertEquals($testValue, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        $model->unsetBusinessProcessSpecifiedDocumentContextParameter();

        $this->assertNotInstanceOf(DocumentContextParameterType::class, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        $testValueForBusinessProcessSpecifiedDocumentContextParameter = $model->getBusinessProcessSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $testValueForBusinessProcessSpecifiedDocumentContextParameter);
        $this->assertSame($testValueForBusinessProcessSpecifiedDocumentContextParameter, $model->getBusinessProcessSpecifiedDocumentContextParameter());

        // Property GuidelineSpecifiedDocumentContextParameter

        $testValue = new DocumentContextParameterType();
        $model->setGuidelineSpecifiedDocumentContextParameter($testValue);

        $this->assertEquals($testValue, $model->getGuidelineSpecifiedDocumentContextParameter());

        $model->unsetGuidelineSpecifiedDocumentContextParameter();

        $this->assertNotInstanceOf(DocumentContextParameterType::class, $model->getGuidelineSpecifiedDocumentContextParameter());

        $testValueForGuidelineSpecifiedDocumentContextParameter = $model->getGuidelineSpecifiedDocumentContextParameterWithCreate();

        $this->assertInstanceOf(DocumentContextParameterType::class, $testValueForGuidelineSpecifiedDocumentContextParameter);
        $this->assertSame($testValueForGuidelineSpecifiedDocumentContextParameter, $model->getGuidelineSpecifiedDocumentContextParameter());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNotInstanceOf(DocumentCodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property IssueDateTime

        $testValue = new DateTimeType();
        $model->setIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getIssueDateTime());

        $model->unsetIssueDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getIssueDateTime());

        $testValueForIssueDateTime = $model->getIssueDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForIssueDateTime);
        $this->assertSame($testValueForIssueDateTime, $model->getIssueDateTime());

        // Property CopyIndicator

        $testValue = new IndicatorType();
        $model->setCopyIndicator($testValue);

        $this->assertEquals($testValue, $model->getCopyIndicator());

        $model->unsetCopyIndicator();

        $this->assertNotInstanceOf(IndicatorType::class, $model->getCopyIndicator());

        $testValueForCopyIndicator = $model->getCopyIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForCopyIndicator);
        $this->assertSame($testValueForCopyIndicator, $model->getCopyIndicator());

        // Property LanguageID

        $testValue = new IDType();
        $model->setLanguageID($testValue);

        $this->assertEquals($testValue, $model->getLanguageID());

        $model->unsetLanguageID();

        $this->assertNotInstanceOf(IDType::class, $model->getLanguageID());

        $testValueForLanguageID = $model->getLanguageIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLanguageID);
        $this->assertSame($testValueForLanguageID, $model->getLanguageID());

        // (1) Property IncludedNote - Test set empty array

        $includedNoteItems = [];
        $model->setIncludedNote($includedNoteItems);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(0, $model->getIncludedNote());

        // (2) Property IncludedNote - Add instance

        $includedNoteItem = new NoteType();
        $model->addToIncludedNote($includedNoteItem);

        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(1, $model->getIncludedNote());

        // (3) Property IncludedNote - Add and create instancc

        $testValueForIncludedNoteItem = $model->addToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $testValueForIncludedNoteItem);
        $this->assertIsArray($model->getIncludedNote());
        $this->assertCount(2, $model->getIncludedNote());

        // (4) Property IncludedNote - Add once an instance

        $includedNoteOnceItem = new NoteType();

        $model->addOnceToIncludedNote($includedNoteOnceItem);
        $model->addOnceToIncludedNote($includedNoteOnceItem);

        $itemsAfterOnce = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IncludedNote - Add once an instance with implicit creation

        $firstIncludedNoteOnceItem = $model->addOnceToIncludedNoteWithCreate();

        $this->assertInstanceOf(NoteType::class, $firstIncludedNoteOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IncludedNote - Add once an instance with implicit creation (2)

        $secondIncludedNoteOnceItem = $model->addOnceToIncludedNoteWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIncludedNoteOnceItem, $secondIncludedNoteOnceItem);

        // (7) Property IncludedNote - Clesr

        $model->clearIncludedNote();

        $itemsAfterClear = $model->getIncludedNote();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property EffectiveSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setEffectiveSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getEffectiveSpecifiedPeriod());

        $model->unsetEffectiveSpecifiedPeriod();

        $this->assertNotInstanceOf(SpecifiedPeriodType::class, $model->getEffectiveSpecifiedPeriod());

        $testValueForEffectiveSpecifiedPeriod = $model->getEffectiveSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $testValueForEffectiveSpecifiedPeriod);
        $this->assertSame($testValueForEffectiveSpecifiedPeriod, $model->getEffectiveSpecifiedPeriod());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeAgreementType.
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

        $this->assertNotInstanceOf(TextType::class, $model->getBuyerReference());

        $testValueForBuyerReference = $model->getBuyerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForBuyerReference);
        $this->assertSame($testValueForBuyerReference, $model->getBuyerReference());

        // Property SellerTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTradeParty());

        $model->unsetSellerTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getSellerTradeParty());

        $testValueForSellerTradeParty = $model->getSellerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSellerTradeParty);
        $this->assertSame($testValueForSellerTradeParty, $model->getSellerTradeParty());

        // Property BuyerTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerTradeParty());

        $model->unsetBuyerTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getBuyerTradeParty());

        $testValueForBuyerTradeParty = $model->getBuyerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerTradeParty);
        $this->assertSame($testValueForBuyerTradeParty, $model->getBuyerTradeParty());

        // Property SalesAgentTradeParty

        $testValue = new TradePartyType();
        $model->setSalesAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSalesAgentTradeParty());

        $model->unsetSalesAgentTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getSalesAgentTradeParty());

        $testValueForSalesAgentTradeParty = $model->getSalesAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSalesAgentTradeParty);
        $this->assertSame($testValueForSalesAgentTradeParty, $model->getSalesAgentTradeParty());

        // Property BuyerTaxRepresentativeTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerTaxRepresentativeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerTaxRepresentativeTradeParty());

        $model->unsetBuyerTaxRepresentativeTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getBuyerTaxRepresentativeTradeParty());

        $testValueForBuyerTaxRepresentativeTradeParty = $model->getBuyerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerTaxRepresentativeTradeParty);
        $this->assertSame($testValueForBuyerTaxRepresentativeTradeParty, $model->getBuyerTaxRepresentativeTradeParty());

        // Property SellerTaxRepresentativeTradeParty

        $testValue = new TradePartyType();
        $model->setSellerTaxRepresentativeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getSellerTaxRepresentativeTradeParty());

        $model->unsetSellerTaxRepresentativeTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getSellerTaxRepresentativeTradeParty());

        $testValueForSellerTaxRepresentativeTradeParty = $model->getSellerTaxRepresentativeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForSellerTaxRepresentativeTradeParty);
        $this->assertSame($testValueForSellerTaxRepresentativeTradeParty, $model->getSellerTaxRepresentativeTradeParty());

        // Property ProductEndUserTradeParty

        $testValue = new TradePartyType();
        $model->setProductEndUserTradeParty($testValue);

        $this->assertEquals($testValue, $model->getProductEndUserTradeParty());

        $model->unsetProductEndUserTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getProductEndUserTradeParty());

        $testValueForProductEndUserTradeParty = $model->getProductEndUserTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForProductEndUserTradeParty);
        $this->assertSame($testValueForProductEndUserTradeParty, $model->getProductEndUserTradeParty());

        // Property ApplicableTradeDeliveryTerms

        $testValue = new TradeDeliveryTermsType();
        $model->setApplicableTradeDeliveryTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradeDeliveryTerms());

        $model->unsetApplicableTradeDeliveryTerms();

        $this->assertNotInstanceOf(TradeDeliveryTermsType::class, $model->getApplicableTradeDeliveryTerms());

        $testValueForApplicableTradeDeliveryTerms = $model->getApplicableTradeDeliveryTermsWithCreate();

        $this->assertInstanceOf(TradeDeliveryTermsType::class, $testValueForApplicableTradeDeliveryTerms);
        $this->assertSame($testValueForApplicableTradeDeliveryTerms, $model->getApplicableTradeDeliveryTerms());

        // Property SellerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setSellerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getSellerOrderReferencedDocument());

        $model->unsetSellerOrderReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getSellerOrderReferencedDocument());

        $testValueForSellerOrderReferencedDocument = $model->getSellerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForSellerOrderReferencedDocument);
        $this->assertSame($testValueForSellerOrderReferencedDocument, $model->getSellerOrderReferencedDocument());

        // Property BuyerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setBuyerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getBuyerOrderReferencedDocument());

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getBuyerOrderReferencedDocument());

        $testValueForBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForBuyerOrderReferencedDocument);
        $this->assertSame($testValueForBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getQuotationReferencedDocument());

        $testValueForQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForQuotationReferencedDocument);
        $this->assertSame($testValueForQuotationReferencedDocument, $model->getQuotationReferencedDocument());

        // Property ContractReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setContractReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getContractReferencedDocument());

        $model->unsetContractReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getContractReferencedDocument());

        $testValueForContractReferencedDocument = $model->getContractReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForContractReferencedDocument);
        $this->assertSame($testValueForContractReferencedDocument, $model->getContractReferencedDocument());

        // (1) Property AdditionalReferencedDocument - Test set empty array

        $additionalReferencedDocumentItems = [];
        $model->setAdditionalReferencedDocument($additionalReferencedDocumentItems);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(0, $model->getAdditionalReferencedDocument());

        // (2) Property AdditionalReferencedDocument - Add instance

        $additionalReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToAdditionalReferencedDocument($additionalReferencedDocumentItem);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(1, $model->getAdditionalReferencedDocument());

        // (3) Property AdditionalReferencedDocument - Add and create instancc

        $testValueForAdditionalReferencedDocumentItem = $model->addToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocumentItem);
        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(2, $model->getAdditionalReferencedDocument());

        // (4) Property AdditionalReferencedDocument - Add once an instance

        $additionalReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);
        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation

        $firstAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstAdditionalReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation (2)

        $secondAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstAdditionalReferencedDocumentOnceItem, $secondAdditionalReferencedDocumentOnceItem);

        // (7) Property AdditionalReferencedDocument - Clesr

        $model->clearAdditionalReferencedDocument();

        $itemsAfterClear = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BuyerAgentTradeParty

        $testValue = new TradePartyType();
        $model->setBuyerAgentTradeParty($testValue);

        $this->assertEquals($testValue, $model->getBuyerAgentTradeParty());

        $model->unsetBuyerAgentTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getBuyerAgentTradeParty());

        $testValueForBuyerAgentTradeParty = $model->getBuyerAgentTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForBuyerAgentTradeParty);
        $this->assertSame($testValueForBuyerAgentTradeParty, $model->getBuyerAgentTradeParty());

        // Property SpecifiedProcuringProject

        $testValue = new ProcuringProjectType();
        $model->setSpecifiedProcuringProject($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedProcuringProject());

        $model->unsetSpecifiedProcuringProject();

        $this->assertNotInstanceOf(ProcuringProjectType::class, $model->getSpecifiedProcuringProject());

        $testValueForSpecifiedProcuringProject = $model->getSpecifiedProcuringProjectWithCreate();

        $this->assertInstanceOf(ProcuringProjectType::class, $testValueForSpecifiedProcuringProject);
        $this->assertSame($testValueForSpecifiedProcuringProject, $model->getSpecifiedProcuringProject());

        // (1) Property UltimateCustomerOrderReferencedDocument - Test set empty array

        $ultimateCustomerOrderReferencedDocumentItems = [];
        $model->setUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItems);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(0, $model->getUltimateCustomerOrderReferencedDocument());

        // (2) Property UltimateCustomerOrderReferencedDocument - Add instance

        $ultimateCustomerOrderReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItem);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(1, $model->getUltimateCustomerOrderReferencedDocument());

        // (3) Property UltimateCustomerOrderReferencedDocument - Add and create instancc

        $testValueForUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentItem);
        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(2, $model->getUltimateCustomerOrderReferencedDocument());

        // (4) Property UltimateCustomerOrderReferencedDocument - Add once an instance

        $ultimateCustomerOrderReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);
        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property UltimateCustomerOrderReferencedDocument - Add once an instance with implicit creation

        $firstUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstUltimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property UltimateCustomerOrderReferencedDocument - Add once an instance with implicit creation (2)

        $secondUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstUltimateCustomerOrderReferencedDocumentOnceItem, $secondUltimateCustomerOrderReferencedDocumentOnceItem);

        // (7) Property UltimateCustomerOrderReferencedDocument - Clesr

        $model->clearUltimateCustomerOrderReferencedDocument();

        $itemsAfterClear = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeDeliveryType.
     */
    public function testModelsZffxextendedRamHeaderTradeDeliveryType(): void
    {
        $model = new HeaderTradeDeliveryType();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $model);

        // (1) Property RelatedSupplyChainConsignment - Test set empty array

        $relatedSupplyChainConsignmentItems = [];
        $model->setRelatedSupplyChainConsignment($relatedSupplyChainConsignmentItems);

        $this->assertIsArray($model->getRelatedSupplyChainConsignment());
        $this->assertCount(0, $model->getRelatedSupplyChainConsignment());

        // (2) Property RelatedSupplyChainConsignment - Add instance

        $relatedSupplyChainConsignmentItem = new LogisticsTransportMovementType();
        $model->addToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentItem);

        $this->assertIsArray($model->getRelatedSupplyChainConsignment());
        $this->assertCount(1, $model->getRelatedSupplyChainConsignment());

        // (3) Property RelatedSupplyChainConsignment - Add and create instancc

        $testValueForRelatedSupplyChainConsignmentItem = $model->addToRelatedSupplyChainConsignmentWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForRelatedSupplyChainConsignmentItem);
        $this->assertIsArray($model->getRelatedSupplyChainConsignment());
        $this->assertCount(2, $model->getRelatedSupplyChainConsignment());

        // (4) Property RelatedSupplyChainConsignment - Add once an instance

        $relatedSupplyChainConsignmentOnceItem = new LogisticsTransportMovementType();

        $model->addOnceToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentOnceItem);
        $model->addOnceToRelatedSupplyChainConsignment($relatedSupplyChainConsignmentOnceItem);

        $itemsAfterOnce = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property RelatedSupplyChainConsignment - Add once an instance with implicit creation

        $firstRelatedSupplyChainConsignmentOnceItem = $model->addOnceToRelatedSupplyChainConsignmentWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $firstRelatedSupplyChainConsignmentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property RelatedSupplyChainConsignment - Add once an instance with implicit creation (2)

        $secondRelatedSupplyChainConsignmentOnceItem = $model->addOnceToRelatedSupplyChainConsignmentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstRelatedSupplyChainConsignmentOnceItem, $secondRelatedSupplyChainConsignmentOnceItem);

        // (7) Property RelatedSupplyChainConsignment - Clesr

        $model->clearRelatedSupplyChainConsignment();

        $itemsAfterClear = $model->getRelatedSupplyChainConsignment();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getShipToTradeParty());

        $testValueForShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipToTradeParty);
        $this->assertSame($testValueForShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getUltimateShipToTradeParty());

        $testValueForUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForUltimateShipToTradeParty);
        $this->assertSame($testValueForUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

        // Property ShipFromTradeParty

        $testValue = new TradePartyType();
        $model->setShipFromTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipFromTradeParty());

        $model->unsetShipFromTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getShipFromTradeParty());

        $testValueForShipFromTradeParty = $model->getShipFromTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipFromTradeParty);
        $this->assertSame($testValueForShipFromTradeParty, $model->getShipFromTradeParty());

        // Property ActualDeliverySupplyChainEvent

        $testValue = new SupplyChainEventType();
        $model->setActualDeliverySupplyChainEvent($testValue);

        $this->assertEquals($testValue, $model->getActualDeliverySupplyChainEvent());

        $model->unsetActualDeliverySupplyChainEvent();

        $this->assertNotInstanceOf(SupplyChainEventType::class, $model->getActualDeliverySupplyChainEvent());

        $testValueForActualDeliverySupplyChainEvent = $model->getActualDeliverySupplyChainEventWithCreate();

        $this->assertInstanceOf(SupplyChainEventType::class, $testValueForActualDeliverySupplyChainEvent);
        $this->assertSame($testValueForActualDeliverySupplyChainEvent, $model->getActualDeliverySupplyChainEvent());

        // Property DespatchAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDespatchAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDespatchAdviceReferencedDocument());

        $model->unsetDespatchAdviceReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getDespatchAdviceReferencedDocument());

        $testValueForDespatchAdviceReferencedDocument = $model->getDespatchAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDespatchAdviceReferencedDocument);
        $this->assertSame($testValueForDespatchAdviceReferencedDocument, $model->getDespatchAdviceReferencedDocument());

        // Property ReceivingAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setReceivingAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getReceivingAdviceReferencedDocument());

        $model->unsetReceivingAdviceReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getReceivingAdviceReferencedDocument());

        $testValueForReceivingAdviceReferencedDocument = $model->getReceivingAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForReceivingAdviceReferencedDocument);
        $this->assertSame($testValueForReceivingAdviceReferencedDocument, $model->getReceivingAdviceReferencedDocument());

        // Property DeliveryNoteReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDeliveryNoteReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDeliveryNoteReferencedDocument());

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getDeliveryNoteReferencedDocument());

        $testValueForDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDeliveryNoteReferencedDocument);
        $this->assertSame($testValueForDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\HeaderTradeSettlementType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getCreditorReferenceID());

        $testValueForCreditorReferenceID = $model->getCreditorReferenceIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForCreditorReferenceID);
        $this->assertSame($testValueForCreditorReferenceID, $model->getCreditorReferenceID());

        // Property PaymentReference

        $testValue = new TextType();
        $model->setPaymentReference($testValue);

        $this->assertEquals($testValue, $model->getPaymentReference());

        $model->unsetPaymentReference();

        $this->assertNotInstanceOf(TextType::class, $model->getPaymentReference());

        $testValueForPaymentReference = $model->getPaymentReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForPaymentReference);
        $this->assertSame($testValueForPaymentReference, $model->getPaymentReference());

        // Property TaxCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setTaxCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTaxCurrencyCode());

        $model->unsetTaxCurrencyCode();

        $this->assertNotInstanceOf(CurrencyCodeType::class, $model->getTaxCurrencyCode());

        $testValueForTaxCurrencyCode = $model->getTaxCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForTaxCurrencyCode);
        $this->assertSame($testValueForTaxCurrencyCode, $model->getTaxCurrencyCode());

        // Property InvoiceCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setInvoiceCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getInvoiceCurrencyCode());

        $model->unsetInvoiceCurrencyCode();

        $this->assertNotInstanceOf(CurrencyCodeType::class, $model->getInvoiceCurrencyCode());

        $testValueForInvoiceCurrencyCode = $model->getInvoiceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForInvoiceCurrencyCode);
        $this->assertSame($testValueForInvoiceCurrencyCode, $model->getInvoiceCurrencyCode());

        // Property InvoiceIssuerReference

        $testValue = new TextType();
        $model->setInvoiceIssuerReference($testValue);

        $this->assertEquals($testValue, $model->getInvoiceIssuerReference());

        $model->unsetInvoiceIssuerReference();

        $this->assertNotInstanceOf(TextType::class, $model->getInvoiceIssuerReference());

        $testValueForInvoiceIssuerReference = $model->getInvoiceIssuerReferenceWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForInvoiceIssuerReference);
        $this->assertSame($testValueForInvoiceIssuerReference, $model->getInvoiceIssuerReference());

        // Property InvoicerTradeParty

        $testValue = new TradePartyType();
        $model->setInvoicerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoicerTradeParty());

        $model->unsetInvoicerTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getInvoicerTradeParty());

        $testValueForInvoicerTradeParty = $model->getInvoicerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForInvoicerTradeParty);
        $this->assertSame($testValueForInvoicerTradeParty, $model->getInvoicerTradeParty());

        // Property InvoiceeTradeParty

        $testValue = new TradePartyType();
        $model->setInvoiceeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getInvoiceeTradeParty());

        $model->unsetInvoiceeTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getInvoiceeTradeParty());

        $testValueForInvoiceeTradeParty = $model->getInvoiceeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForInvoiceeTradeParty);
        $this->assertSame($testValueForInvoiceeTradeParty, $model->getInvoiceeTradeParty());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getPayeeTradeParty());

        $testValueForPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayeeTradeParty);
        $this->assertSame($testValueForPayeeTradeParty, $model->getPayeeTradeParty());

        // Property PayerTradeParty

        $testValue = new TradePartyType();
        $model->setPayerTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayerTradeParty());

        $model->unsetPayerTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getPayerTradeParty());

        $testValueForPayerTradeParty = $model->getPayerTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayerTradeParty);
        $this->assertSame($testValueForPayerTradeParty, $model->getPayerTradeParty());

        // Property TaxApplicableTradeCurrencyExchange

        $testValue = new TradeCurrencyExchangeType();
        $model->setTaxApplicableTradeCurrencyExchange($testValue);

        $this->assertEquals($testValue, $model->getTaxApplicableTradeCurrencyExchange());

        $model->unsetTaxApplicableTradeCurrencyExchange();

        $this->assertNotInstanceOf(TradeCurrencyExchangeType::class, $model->getTaxApplicableTradeCurrencyExchange());

        $testValueForTaxApplicableTradeCurrencyExchange = $model->getTaxApplicableTradeCurrencyExchangeWithCreate();

        $this->assertInstanceOf(TradeCurrencyExchangeType::class, $testValueForTaxApplicableTradeCurrencyExchange);
        $this->assertSame($testValueForTaxApplicableTradeCurrencyExchange, $model->getTaxApplicableTradeCurrencyExchange());

        // (1) Property SpecifiedTradeSettlementPaymentMeans - Test set empty array

        $specifiedTradeSettlementPaymentMeansItems = [];
        $model->setSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansItems);

        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertCount(0, $model->getSpecifiedTradeSettlementPaymentMeans());

        // (2) Property SpecifiedTradeSettlementPaymentMeans - Add instance

        $specifiedTradeSettlementPaymentMeansItem = new TradeSettlementPaymentMeansType();
        $model->addToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansItem);

        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertCount(1, $model->getSpecifiedTradeSettlementPaymentMeans());

        // (3) Property SpecifiedTradeSettlementPaymentMeans - Add and create instancc

        $testValueForSpecifiedTradeSettlementPaymentMeansItem = $model->addToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $testValueForSpecifiedTradeSettlementPaymentMeansItem);
        $this->assertIsArray($model->getSpecifiedTradeSettlementPaymentMeans());
        $this->assertCount(2, $model->getSpecifiedTradeSettlementPaymentMeans());

        // (4) Property SpecifiedTradeSettlementPaymentMeans - Add once an instance

        $specifiedTradeSettlementPaymentMeansOnceItem = new TradeSettlementPaymentMeansType();

        $model->addOnceToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansOnceItem);
        $model->addOnceToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeansOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedTradeSettlementPaymentMeans - Add once an instance with implicit creation

        $firstSpecifiedTradeSettlementPaymentMeansOnceItem = $model->addOnceToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertInstanceOf(TradeSettlementPaymentMeansType::class, $firstSpecifiedTradeSettlementPaymentMeansOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedTradeSettlementPaymentMeans - Add once an instance with implicit creation (2)

        $secondSpecifiedTradeSettlementPaymentMeansOnceItem = $model->addOnceToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedTradeSettlementPaymentMeansOnceItem, $secondSpecifiedTradeSettlementPaymentMeansOnceItem);

        // (7) Property SpecifiedTradeSettlementPaymentMeans - Clesr

        $model->clearSpecifiedTradeSettlementPaymentMeans();

        $itemsAfterClear = $model->getSpecifiedTradeSettlementPaymentMeans();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property ApplicableTradeTax - Test set empty array

        $applicableTradeTaxItems = [];
        $model->setApplicableTradeTax($applicableTradeTaxItems);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(0, $model->getApplicableTradeTax());

        // (2) Property ApplicableTradeTax - Add instance

        $applicableTradeTaxItem = new TradeTaxType();
        $model->addToApplicableTradeTax($applicableTradeTaxItem);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(1, $model->getApplicableTradeTax());

        // (3) Property ApplicableTradeTax - Add and create instancc

        $testValueForApplicableTradeTaxItem = $model->addToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForApplicableTradeTaxItem);
        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(2, $model->getApplicableTradeTax());

        // (4) Property ApplicableTradeTax - Add once an instance

        $applicableTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);
        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);

        $itemsAfterOnce = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ApplicableTradeTax - Add once an instance with implicit creation

        $firstApplicableTradeTaxOnceItem = $model->addOnceToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $firstApplicableTradeTaxOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ApplicableTradeTax - Add once an instance with implicit creation (2)

        $secondApplicableTradeTaxOnceItem = $model->addOnceToApplicableTradeTaxWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstApplicableTradeTaxOnceItem, $secondApplicableTradeTaxOnceItem);

        // (7) Property ApplicableTradeTax - Clesr

        $model->clearApplicableTradeTax();

        $itemsAfterClear = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BillingSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setBillingSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getBillingSpecifiedPeriod());

        $model->unsetBillingSpecifiedPeriod();

        $this->assertNotInstanceOf(SpecifiedPeriodType::class, $model->getBillingSpecifiedPeriod());

        $testValueForBillingSpecifiedPeriod = $model->getBillingSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $testValueForBillingSpecifiedPeriod);
        $this->assertSame($testValueForBillingSpecifiedPeriod, $model->getBillingSpecifiedPeriod());

        // (1) Property SpecifiedTradeAllowanceCharge - Test set empty array

        $specifiedTradeAllowanceChargeItems = [];
        $model->setSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(0, $model->getSpecifiedTradeAllowanceCharge());

        // (2) Property SpecifiedTradeAllowanceCharge - Add instance

        $specifiedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(1, $model->getSpecifiedTradeAllowanceCharge());

        // (3) Property SpecifiedTradeAllowanceCharge - Add and create instancc

        $testValueForSpecifiedTradeAllowanceChargeItem = $model->addToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForSpecifiedTradeAllowanceChargeItem);
        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(2, $model->getSpecifiedTradeAllowanceCharge());

        // (4) Property SpecifiedTradeAllowanceCharge - Add once an instance

        $specifiedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);
        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedTradeAllowanceCharge - Add once an instance with implicit creation

        $firstSpecifiedTradeAllowanceChargeOnceItem = $model->addOnceToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $firstSpecifiedTradeAllowanceChargeOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedTradeAllowanceCharge - Add once an instance with implicit creation (2)

        $secondSpecifiedTradeAllowanceChargeOnceItem = $model->addOnceToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedTradeAllowanceChargeOnceItem, $secondSpecifiedTradeAllowanceChargeOnceItem);

        // (7) Property SpecifiedTradeAllowanceCharge - Clesr

        $model->clearSpecifiedTradeAllowanceCharge();

        $itemsAfterClear = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property SpecifiedLogisticsServiceCharge - Test set empty array

        $specifiedLogisticsServiceChargeItems = [];
        $model->setSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeItems);

        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertCount(0, $model->getSpecifiedLogisticsServiceCharge());

        // (2) Property SpecifiedLogisticsServiceCharge - Add instance

        $specifiedLogisticsServiceChargeItem = new LogisticsServiceChargeType();
        $model->addToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeItem);

        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertCount(1, $model->getSpecifiedLogisticsServiceCharge());

        // (3) Property SpecifiedLogisticsServiceCharge - Add and create instancc

        $testValueForSpecifiedLogisticsServiceChargeItem = $model->addToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $testValueForSpecifiedLogisticsServiceChargeItem);
        $this->assertIsArray($model->getSpecifiedLogisticsServiceCharge());
        $this->assertCount(2, $model->getSpecifiedLogisticsServiceCharge());

        // (4) Property SpecifiedLogisticsServiceCharge - Add once an instance

        $specifiedLogisticsServiceChargeOnceItem = new LogisticsServiceChargeType();

        $model->addOnceToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeOnceItem);
        $model->addOnceToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceChargeOnceItem);

        $itemsAfterOnce = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedLogisticsServiceCharge - Add once an instance with implicit creation

        $firstSpecifiedLogisticsServiceChargeOnceItem = $model->addOnceToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertInstanceOf(LogisticsServiceChargeType::class, $firstSpecifiedLogisticsServiceChargeOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedLogisticsServiceCharge - Add once an instance with implicit creation (2)

        $secondSpecifiedLogisticsServiceChargeOnceItem = $model->addOnceToSpecifiedLogisticsServiceChargeWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedLogisticsServiceChargeOnceItem, $secondSpecifiedLogisticsServiceChargeOnceItem);

        // (7) Property SpecifiedLogisticsServiceCharge - Clesr

        $model->clearSpecifiedLogisticsServiceCharge();

        $itemsAfterClear = $model->getSpecifiedLogisticsServiceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property SpecifiedTradePaymentTerms - Test set empty array

        $specifiedTradePaymentTermsItems = [];
        $model->setSpecifiedTradePaymentTerms($specifiedTradePaymentTermsItems);

        $this->assertIsArray($model->getSpecifiedTradePaymentTerms());
        $this->assertCount(0, $model->getSpecifiedTradePaymentTerms());

        // (2) Property SpecifiedTradePaymentTerms - Add instance

        $specifiedTradePaymentTermsItem = new TradePaymentTermsType();
        $model->addToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsItem);

        $this->assertIsArray($model->getSpecifiedTradePaymentTerms());
        $this->assertCount(1, $model->getSpecifiedTradePaymentTerms());

        // (3) Property SpecifiedTradePaymentTerms - Add and create instancc

        $testValueForSpecifiedTradePaymentTermsItem = $model->addToSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $testValueForSpecifiedTradePaymentTermsItem);
        $this->assertIsArray($model->getSpecifiedTradePaymentTerms());
        $this->assertCount(2, $model->getSpecifiedTradePaymentTerms());

        // (4) Property SpecifiedTradePaymentTerms - Add once an instance

        $specifiedTradePaymentTermsOnceItem = new TradePaymentTermsType();

        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);
        $model->addOnceToSpecifiedTradePaymentTerms($specifiedTradePaymentTermsOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedTradePaymentTerms - Add once an instance with implicit creation

        $firstSpecifiedTradePaymentTermsOnceItem = $model->addOnceToSpecifiedTradePaymentTermsWithCreate();

        $this->assertInstanceOf(TradePaymentTermsType::class, $firstSpecifiedTradePaymentTermsOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedTradePaymentTerms - Add once an instance with implicit creation (2)

        $secondSpecifiedTradePaymentTermsOnceItem = $model->addOnceToSpecifiedTradePaymentTermsWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedTradePaymentTermsOnceItem, $secondSpecifiedTradePaymentTermsOnceItem);

        // (7) Property SpecifiedTradePaymentTerms - Clesr

        $model->clearSpecifiedTradePaymentTerms();

        $itemsAfterClear = $model->getSpecifiedTradePaymentTerms();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedTradeSettlementHeaderMonetarySummation

        $testValue = new TradeSettlementHeaderMonetarySummationType();
        $model->setSpecifiedTradeSettlementHeaderMonetarySummation($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $model->unsetSpecifiedTradeSettlementHeaderMonetarySummation();

        $this->assertNotInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        $testValueForSpecifiedTradeSettlementHeaderMonetarySummation = $model->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementHeaderMonetarySummationType::class, $testValueForSpecifiedTradeSettlementHeaderMonetarySummation);
        $this->assertSame($testValueForSpecifiedTradeSettlementHeaderMonetarySummation, $model->getSpecifiedTradeSettlementHeaderMonetarySummation());

        // (1) Property InvoiceReferencedDocument - Test set empty array

        $invoiceReferencedDocumentItems = [];
        $model->setInvoiceReferencedDocument($invoiceReferencedDocumentItems);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertCount(0, $model->getInvoiceReferencedDocument());

        // (2) Property InvoiceReferencedDocument - Add instance

        $invoiceReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToInvoiceReferencedDocument($invoiceReferencedDocumentItem);

        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertCount(1, $model->getInvoiceReferencedDocument());

        // (3) Property InvoiceReferencedDocument - Add and create instancc

        $testValueForInvoiceReferencedDocumentItem = $model->addToInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceReferencedDocumentItem);
        $this->assertIsArray($model->getInvoiceReferencedDocument());
        $this->assertCount(2, $model->getInvoiceReferencedDocument());

        // (4) Property InvoiceReferencedDocument - Add once an instance

        $invoiceReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);
        $model->addOnceToInvoiceReferencedDocument($invoiceReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property InvoiceReferencedDocument - Add once an instance with implicit creation

        $firstInvoiceReferencedDocumentOnceItem = $model->addOnceToInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstInvoiceReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property InvoiceReferencedDocument - Add once an instance with implicit creation (2)

        $secondInvoiceReferencedDocumentOnceItem = $model->addOnceToInvoiceReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstInvoiceReferencedDocumentOnceItem, $secondInvoiceReferencedDocumentOnceItem);

        // (7) Property InvoiceReferencedDocument - Clesr

        $model->clearInvoiceReferencedDocument();

        $itemsAfterClear = $model->getInvoiceReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property ReceivableSpecifiedTradeAccountingAccount - Test set empty array

        $receivableSpecifiedTradeAccountingAccountItems = [];
        $model->setReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItems);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(0, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (2) Property ReceivableSpecifiedTradeAccountingAccount - Add instance

        $receivableSpecifiedTradeAccountingAccountItem = new TradeAccountingAccountType();
        $model->addToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItem);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(1, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (3) Property ReceivableSpecifiedTradeAccountingAccount - Add and create instancc

        $testValueForReceivableSpecifiedTradeAccountingAccountItem = $model->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $testValueForReceivableSpecifiedTradeAccountingAccountItem);
        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(2, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (4) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance

        $receivableSpecifiedTradeAccountingAccountOnceItem = new TradeAccountingAccountType();

        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);
        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterOnce = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance with implicit creation

        $firstReceivableSpecifiedTradeAccountingAccountOnceItem = $model->addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $firstReceivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance with implicit creation (2)

        $secondReceivableSpecifiedTradeAccountingAccountOnceItem = $model->addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstReceivableSpecifiedTradeAccountingAccountOnceItem, $secondReceivableSpecifiedTradeAccountingAccountOnceItem);

        // (7) Property ReceivableSpecifiedTradeAccountingAccount - Clesr

        $model->clearReceivableSpecifiedTradeAccountingAccount();

        $itemsAfterClear = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property SpecifiedAdvancePayment - Test set empty array

        $specifiedAdvancePaymentItems = [];
        $model->setSpecifiedAdvancePayment($specifiedAdvancePaymentItems);

        $this->assertIsArray($model->getSpecifiedAdvancePayment());
        $this->assertCount(0, $model->getSpecifiedAdvancePayment());

        // (2) Property SpecifiedAdvancePayment - Add instance

        $specifiedAdvancePaymentItem = new AdvancePaymentType();
        $model->addToSpecifiedAdvancePayment($specifiedAdvancePaymentItem);

        $this->assertIsArray($model->getSpecifiedAdvancePayment());
        $this->assertCount(1, $model->getSpecifiedAdvancePayment());

        // (3) Property SpecifiedAdvancePayment - Add and create instancc

        $testValueForSpecifiedAdvancePaymentItem = $model->addToSpecifiedAdvancePaymentWithCreate();

        $this->assertInstanceOf(AdvancePaymentType::class, $testValueForSpecifiedAdvancePaymentItem);
        $this->assertIsArray($model->getSpecifiedAdvancePayment());
        $this->assertCount(2, $model->getSpecifiedAdvancePayment());

        // (4) Property SpecifiedAdvancePayment - Add once an instance

        $specifiedAdvancePaymentOnceItem = new AdvancePaymentType();

        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);
        $model->addOnceToSpecifiedAdvancePayment($specifiedAdvancePaymentOnceItem);

        $itemsAfterOnce = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedAdvancePayment - Add once an instance with implicit creation

        $firstSpecifiedAdvancePaymentOnceItem = $model->addOnceToSpecifiedAdvancePaymentWithCreate();

        $this->assertInstanceOf(AdvancePaymentType::class, $firstSpecifiedAdvancePaymentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedAdvancePayment - Add once an instance with implicit creation (2)

        $secondSpecifiedAdvancePaymentOnceItem = $model->addOnceToSpecifiedAdvancePaymentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedAdvancePaymentOnceItem, $secondSpecifiedAdvancePaymentOnceItem);

        // (7) Property SpecifiedAdvancePayment - Clesr

        $model->clearSpecifiedAdvancePayment();

        $itemsAfterClear = $model->getSpecifiedAdvancePayment();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LegalOrganizationType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property TradingBusinessName

        $testValue = new TextType();
        $model->setTradingBusinessName($testValue);

        $this->assertEquals($testValue, $model->getTradingBusinessName());

        $model->unsetTradingBusinessName();

        $this->assertNotInstanceOf(TextType::class, $model->getTradingBusinessName());

        $testValueForTradingBusinessName = $model->getTradingBusinessNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForTradingBusinessName);
        $this->assertSame($testValueForTradingBusinessName, $model->getTradingBusinessName());

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNotInstanceOf(TradeAddressType::class, $model->getPostalTradeAddress());

        $testValueForPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $testValueForPostalTradeAddress);
        $this->assertSame($testValueForPostalTradeAddress, $model->getPostalTradeAddress());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeAgreementType.
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

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getSellerOrderReferencedDocument());

        $testValueForSellerOrderReferencedDocument = $model->getSellerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForSellerOrderReferencedDocument);
        $this->assertSame($testValueForSellerOrderReferencedDocument, $model->getSellerOrderReferencedDocument());

        // Property BuyerOrderReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setBuyerOrderReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getBuyerOrderReferencedDocument());

        $model->unsetBuyerOrderReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getBuyerOrderReferencedDocument());

        $testValueForBuyerOrderReferencedDocument = $model->getBuyerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForBuyerOrderReferencedDocument);
        $this->assertSame($testValueForBuyerOrderReferencedDocument, $model->getBuyerOrderReferencedDocument());

        // Property QuotationReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setQuotationReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getQuotationReferencedDocument());

        $model->unsetQuotationReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getQuotationReferencedDocument());

        $testValueForQuotationReferencedDocument = $model->getQuotationReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForQuotationReferencedDocument);
        $this->assertSame($testValueForQuotationReferencedDocument, $model->getQuotationReferencedDocument());

        // Property ContractReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setContractReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getContractReferencedDocument());

        $model->unsetContractReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getContractReferencedDocument());

        $testValueForContractReferencedDocument = $model->getContractReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForContractReferencedDocument);
        $this->assertSame($testValueForContractReferencedDocument, $model->getContractReferencedDocument());

        // (1) Property AdditionalReferencedDocument - Test set empty array

        $additionalReferencedDocumentItems = [];
        $model->setAdditionalReferencedDocument($additionalReferencedDocumentItems);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(0, $model->getAdditionalReferencedDocument());

        // (2) Property AdditionalReferencedDocument - Add instance

        $additionalReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToAdditionalReferencedDocument($additionalReferencedDocumentItem);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(1, $model->getAdditionalReferencedDocument());

        // (3) Property AdditionalReferencedDocument - Add and create instancc

        $testValueForAdditionalReferencedDocumentItem = $model->addToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocumentItem);
        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(2, $model->getAdditionalReferencedDocument());

        // (4) Property AdditionalReferencedDocument - Add once an instance

        $additionalReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);
        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation

        $firstAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstAdditionalReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation (2)

        $secondAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstAdditionalReferencedDocumentOnceItem, $secondAdditionalReferencedDocumentOnceItem);

        // (7) Property AdditionalReferencedDocument - Clesr

        $model->clearAdditionalReferencedDocument();

        $itemsAfterClear = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property GrossPriceProductTradePrice

        $testValue = new TradePriceType();
        $model->setGrossPriceProductTradePrice($testValue);

        $this->assertEquals($testValue, $model->getGrossPriceProductTradePrice());

        $model->unsetGrossPriceProductTradePrice();

        $this->assertNotInstanceOf(TradePriceType::class, $model->getGrossPriceProductTradePrice());

        $testValueForGrossPriceProductTradePrice = $model->getGrossPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $testValueForGrossPriceProductTradePrice);
        $this->assertSame($testValueForGrossPriceProductTradePrice, $model->getGrossPriceProductTradePrice());

        // Property NetPriceProductTradePrice

        $testValue = new TradePriceType();
        $model->setNetPriceProductTradePrice($testValue);

        $this->assertEquals($testValue, $model->getNetPriceProductTradePrice());

        $model->unsetNetPriceProductTradePrice();

        $this->assertNotInstanceOf(TradePriceType::class, $model->getNetPriceProductTradePrice());

        $testValueForNetPriceProductTradePrice = $model->getNetPriceProductTradePriceWithCreate();

        $this->assertInstanceOf(TradePriceType::class, $testValueForNetPriceProductTradePrice);
        $this->assertSame($testValueForNetPriceProductTradePrice, $model->getNetPriceProductTradePrice());

        // (1) Property UltimateCustomerOrderReferencedDocument - Test set empty array

        $ultimateCustomerOrderReferencedDocumentItems = [];
        $model->setUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItems);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(0, $model->getUltimateCustomerOrderReferencedDocument());

        // (2) Property UltimateCustomerOrderReferencedDocument - Add instance

        $ultimateCustomerOrderReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentItem);

        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(1, $model->getUltimateCustomerOrderReferencedDocument());

        // (3) Property UltimateCustomerOrderReferencedDocument - Add and create instancc

        $testValueForUltimateCustomerOrderReferencedDocumentItem = $model->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForUltimateCustomerOrderReferencedDocumentItem);
        $this->assertIsArray($model->getUltimateCustomerOrderReferencedDocument());
        $this->assertCount(2, $model->getUltimateCustomerOrderReferencedDocument());

        // (4) Property UltimateCustomerOrderReferencedDocument - Add once an instance

        $ultimateCustomerOrderReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);
        $model->addOnceToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property UltimateCustomerOrderReferencedDocument - Add once an instance with implicit creation

        $firstUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstUltimateCustomerOrderReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property UltimateCustomerOrderReferencedDocument - Add once an instance with implicit creation (2)

        $secondUltimateCustomerOrderReferencedDocumentOnceItem = $model->addOnceToUltimateCustomerOrderReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstUltimateCustomerOrderReferencedDocumentOnceItem, $secondUltimateCustomerOrderReferencedDocumentOnceItem);

        // (7) Property UltimateCustomerOrderReferencedDocument - Clesr

        $model->clearUltimateCustomerOrderReferencedDocument();

        $itemsAfterClear = $model->getUltimateCustomerOrderReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeDeliveryType.
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

        $this->assertNotInstanceOf(QuantityType::class, $model->getBilledQuantity());

        $testValueForBilledQuantity = $model->getBilledQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBilledQuantity);
        $this->assertSame($testValueForBilledQuantity, $model->getBilledQuantity());

        // Property ChargeFreeQuantity

        $testValue = new QuantityType();
        $model->setChargeFreeQuantity($testValue);

        $this->assertEquals($testValue, $model->getChargeFreeQuantity());

        $model->unsetChargeFreeQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getChargeFreeQuantity());

        $testValueForChargeFreeQuantity = $model->getChargeFreeQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForChargeFreeQuantity);
        $this->assertSame($testValueForChargeFreeQuantity, $model->getChargeFreeQuantity());

        // Property PackageQuantity

        $testValue = new QuantityType();
        $model->setPackageQuantity($testValue);

        $this->assertEquals($testValue, $model->getPackageQuantity());

        $model->unsetPackageQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getPackageQuantity());

        $testValueForPackageQuantity = $model->getPackageQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForPackageQuantity);
        $this->assertSame($testValueForPackageQuantity, $model->getPackageQuantity());

        // Property PerPackageUnitQuantity

        $testValue = new QuantityType();
        $model->setPerPackageUnitQuantity($testValue);

        $this->assertEquals($testValue, $model->getPerPackageUnitQuantity());

        $model->unsetPerPackageUnitQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getPerPackageUnitQuantity());

        $testValueForPerPackageUnitQuantity = $model->getPerPackageUnitQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForPerPackageUnitQuantity);
        $this->assertSame($testValueForPerPackageUnitQuantity, $model->getPerPackageUnitQuantity());

        // Property ShipToTradeParty

        $testValue = new TradePartyType();
        $model->setShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getShipToTradeParty());

        $model->unsetShipToTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getShipToTradeParty());

        $testValueForShipToTradeParty = $model->getShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForShipToTradeParty);
        $this->assertSame($testValueForShipToTradeParty, $model->getShipToTradeParty());

        // Property UltimateShipToTradeParty

        $testValue = new TradePartyType();
        $model->setUltimateShipToTradeParty($testValue);

        $this->assertEquals($testValue, $model->getUltimateShipToTradeParty());

        $model->unsetUltimateShipToTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getUltimateShipToTradeParty());

        $testValueForUltimateShipToTradeParty = $model->getUltimateShipToTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForUltimateShipToTradeParty);
        $this->assertSame($testValueForUltimateShipToTradeParty, $model->getUltimateShipToTradeParty());

        // Property ActualDeliverySupplyChainEvent

        $testValue = new SupplyChainEventType();
        $model->setActualDeliverySupplyChainEvent($testValue);

        $this->assertEquals($testValue, $model->getActualDeliverySupplyChainEvent());

        $model->unsetActualDeliverySupplyChainEvent();

        $this->assertNotInstanceOf(SupplyChainEventType::class, $model->getActualDeliverySupplyChainEvent());

        $testValueForActualDeliverySupplyChainEvent = $model->getActualDeliverySupplyChainEventWithCreate();

        $this->assertInstanceOf(SupplyChainEventType::class, $testValueForActualDeliverySupplyChainEvent);
        $this->assertSame($testValueForActualDeliverySupplyChainEvent, $model->getActualDeliverySupplyChainEvent());

        // Property DespatchAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDespatchAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDespatchAdviceReferencedDocument());

        $model->unsetDespatchAdviceReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getDespatchAdviceReferencedDocument());

        $testValueForDespatchAdviceReferencedDocument = $model->getDespatchAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDespatchAdviceReferencedDocument);
        $this->assertSame($testValueForDespatchAdviceReferencedDocument, $model->getDespatchAdviceReferencedDocument());

        // Property ReceivingAdviceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setReceivingAdviceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getReceivingAdviceReferencedDocument());

        $model->unsetReceivingAdviceReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getReceivingAdviceReferencedDocument());

        $testValueForReceivingAdviceReferencedDocument = $model->getReceivingAdviceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForReceivingAdviceReferencedDocument);
        $this->assertSame($testValueForReceivingAdviceReferencedDocument, $model->getReceivingAdviceReferencedDocument());

        // Property DeliveryNoteReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setDeliveryNoteReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getDeliveryNoteReferencedDocument());

        $model->unsetDeliveryNoteReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getDeliveryNoteReferencedDocument());

        $testValueForDeliveryNoteReferencedDocument = $model->getDeliveryNoteReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForDeliveryNoteReferencedDocument);
        $this->assertSame($testValueForDeliveryNoteReferencedDocument, $model->getDeliveryNoteReferencedDocument());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LineTradeSettlementType.
     */
    public function testModelsZffxextendedRamLineTradeSettlementType(): void
    {
        $model = new LineTradeSettlementType();

        $this->assertInstanceOf(LineTradeSettlementType::class, $model);

        // (1) Property ApplicableTradeTax - Test set empty array

        $applicableTradeTaxItems = [];
        $model->setApplicableTradeTax($applicableTradeTaxItems);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(0, $model->getApplicableTradeTax());

        // (2) Property ApplicableTradeTax - Add instance

        $applicableTradeTaxItem = new TradeTaxType();
        $model->addToApplicableTradeTax($applicableTradeTaxItem);

        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(1, $model->getApplicableTradeTax());

        // (3) Property ApplicableTradeTax - Add and create instancc

        $testValueForApplicableTradeTaxItem = $model->addToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForApplicableTradeTaxItem);
        $this->assertIsArray($model->getApplicableTradeTax());
        $this->assertCount(2, $model->getApplicableTradeTax());

        // (4) Property ApplicableTradeTax - Add once an instance

        $applicableTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);
        $model->addOnceToApplicableTradeTax($applicableTradeTaxOnceItem);

        $itemsAfterOnce = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ApplicableTradeTax - Add once an instance with implicit creation

        $firstApplicableTradeTaxOnceItem = $model->addOnceToApplicableTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $firstApplicableTradeTaxOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ApplicableTradeTax - Add once an instance with implicit creation (2)

        $secondApplicableTradeTaxOnceItem = $model->addOnceToApplicableTradeTaxWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstApplicableTradeTaxOnceItem, $secondApplicableTradeTaxOnceItem);

        // (7) Property ApplicableTradeTax - Clesr

        $model->clearApplicableTradeTax();

        $itemsAfterClear = $model->getApplicableTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BillingSpecifiedPeriod

        $testValue = new SpecifiedPeriodType();
        $model->setBillingSpecifiedPeriod($testValue);

        $this->assertEquals($testValue, $model->getBillingSpecifiedPeriod());

        $model->unsetBillingSpecifiedPeriod();

        $this->assertNotInstanceOf(SpecifiedPeriodType::class, $model->getBillingSpecifiedPeriod());

        $testValueForBillingSpecifiedPeriod = $model->getBillingSpecifiedPeriodWithCreate();

        $this->assertInstanceOf(SpecifiedPeriodType::class, $testValueForBillingSpecifiedPeriod);
        $this->assertSame($testValueForBillingSpecifiedPeriod, $model->getBillingSpecifiedPeriod());

        // (1) Property SpecifiedTradeAllowanceCharge - Test set empty array

        $specifiedTradeAllowanceChargeItems = [];
        $model->setSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(0, $model->getSpecifiedTradeAllowanceCharge());

        // (2) Property SpecifiedTradeAllowanceCharge - Add instance

        $specifiedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(1, $model->getSpecifiedTradeAllowanceCharge());

        // (3) Property SpecifiedTradeAllowanceCharge - Add and create instancc

        $testValueForSpecifiedTradeAllowanceChargeItem = $model->addToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForSpecifiedTradeAllowanceChargeItem);
        $this->assertIsArray($model->getSpecifiedTradeAllowanceCharge());
        $this->assertCount(2, $model->getSpecifiedTradeAllowanceCharge());

        // (4) Property SpecifiedTradeAllowanceCharge - Add once an instance

        $specifiedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);
        $model->addOnceToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedTradeAllowanceCharge - Add once an instance with implicit creation

        $firstSpecifiedTradeAllowanceChargeOnceItem = $model->addOnceToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $firstSpecifiedTradeAllowanceChargeOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedTradeAllowanceCharge - Add once an instance with implicit creation (2)

        $secondSpecifiedTradeAllowanceChargeOnceItem = $model->addOnceToSpecifiedTradeAllowanceChargeWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedTradeAllowanceChargeOnceItem, $secondSpecifiedTradeAllowanceChargeOnceItem);

        // (7) Property SpecifiedTradeAllowanceCharge - Clesr

        $model->clearSpecifiedTradeAllowanceCharge();

        $itemsAfterClear = $model->getSpecifiedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SpecifiedTradeSettlementLineMonetarySummation

        $testValue = new TradeSettlementLineMonetarySummationType();
        $model->setSpecifiedTradeSettlementLineMonetarySummation($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        $model->unsetSpecifiedTradeSettlementLineMonetarySummation();

        $this->assertNotInstanceOf(TradeSettlementLineMonetarySummationType::class, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        $testValueForSpecifiedTradeSettlementLineMonetarySummation = $model->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $this->assertInstanceOf(TradeSettlementLineMonetarySummationType::class, $testValueForSpecifiedTradeSettlementLineMonetarySummation);
        $this->assertSame($testValueForSpecifiedTradeSettlementLineMonetarySummation, $model->getSpecifiedTradeSettlementLineMonetarySummation());

        // Property InvoiceReferencedDocument

        $testValue = new ReferencedDocumentType();
        $model->setInvoiceReferencedDocument($testValue);

        $this->assertEquals($testValue, $model->getInvoiceReferencedDocument());

        $model->unsetInvoiceReferencedDocument();

        $this->assertNotInstanceOf(ReferencedDocumentType::class, $model->getInvoiceReferencedDocument());

        $testValueForInvoiceReferencedDocument = $model->getInvoiceReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForInvoiceReferencedDocument);
        $this->assertSame($testValueForInvoiceReferencedDocument, $model->getInvoiceReferencedDocument());

        // (1) Property AdditionalReferencedDocument - Test set empty array

        $additionalReferencedDocumentItems = [];
        $model->setAdditionalReferencedDocument($additionalReferencedDocumentItems);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(0, $model->getAdditionalReferencedDocument());

        // (2) Property AdditionalReferencedDocument - Add instance

        $additionalReferencedDocumentItem = new ReferencedDocumentType();
        $model->addToAdditionalReferencedDocument($additionalReferencedDocumentItem);

        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(1, $model->getAdditionalReferencedDocument());

        // (3) Property AdditionalReferencedDocument - Add and create instancc

        $testValueForAdditionalReferencedDocumentItem = $model->addToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $testValueForAdditionalReferencedDocumentItem);
        $this->assertIsArray($model->getAdditionalReferencedDocument());
        $this->assertCount(2, $model->getAdditionalReferencedDocument());

        // (4) Property AdditionalReferencedDocument - Add once an instance

        $additionalReferencedDocumentOnceItem = new ReferencedDocumentType();

        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);
        $model->addOnceToAdditionalReferencedDocument($additionalReferencedDocumentOnceItem);

        $itemsAfterOnce = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation

        $firstAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertInstanceOf(ReferencedDocumentType::class, $firstAdditionalReferencedDocumentOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property AdditionalReferencedDocument - Add once an instance with implicit creation (2)

        $secondAdditionalReferencedDocumentOnceItem = $model->addOnceToAdditionalReferencedDocumentWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstAdditionalReferencedDocumentOnceItem, $secondAdditionalReferencedDocumentOnceItem);

        // (7) Property AdditionalReferencedDocument - Clesr

        $model->clearAdditionalReferencedDocument();

        $itemsAfterClear = $model->getAdditionalReferencedDocument();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property ReceivableSpecifiedTradeAccountingAccount - Test set empty array

        $receivableSpecifiedTradeAccountingAccountItems = [];
        $model->setReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItems);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(0, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (2) Property ReceivableSpecifiedTradeAccountingAccount - Add instance

        $receivableSpecifiedTradeAccountingAccountItem = new TradeAccountingAccountType();
        $model->addToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountItem);

        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(1, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (3) Property ReceivableSpecifiedTradeAccountingAccount - Add and create instancc

        $testValueForReceivableSpecifiedTradeAccountingAccountItem = $model->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $testValueForReceivableSpecifiedTradeAccountingAccountItem);
        $this->assertIsArray($model->getReceivableSpecifiedTradeAccountingAccount());
        $this->assertCount(2, $model->getReceivableSpecifiedTradeAccountingAccount());

        // (4) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance

        $receivableSpecifiedTradeAccountingAccountOnceItem = new TradeAccountingAccountType();

        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);
        $model->addOnceToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterOnce = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance with implicit creation

        $firstReceivableSpecifiedTradeAccountingAccountOnceItem = $model->addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertInstanceOf(TradeAccountingAccountType::class, $firstReceivableSpecifiedTradeAccountingAccountOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ReceivableSpecifiedTradeAccountingAccount - Add once an instance with implicit creation (2)

        $secondReceivableSpecifiedTradeAccountingAccountOnceItem = $model->addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstReceivableSpecifiedTradeAccountingAccountOnceItem, $secondReceivableSpecifiedTradeAccountingAccountOnceItem);

        // (7) Property ReceivableSpecifiedTradeAccountingAccount - Clesr

        $model->clearReceivableSpecifiedTradeAccountingAccount();

        $itemsAfterClear = $model->getReceivableSpecifiedTradeAccountingAccount();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsServiceChargeType.
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

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property AppliedAmount

        $testValue = new AmountType();
        $model->setAppliedAmount($testValue);

        $this->assertEquals($testValue, $model->getAppliedAmount());

        $model->unsetAppliedAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getAppliedAmount());

        $testValueForAppliedAmount = $model->getAppliedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAppliedAmount);
        $this->assertSame($testValueForAppliedAmount, $model->getAppliedAmount());

        // (1) Property AppliedTradeTax - Test set empty array

        $appliedTradeTaxItems = [];
        $model->setAppliedTradeTax($appliedTradeTaxItems);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertCount(0, $model->getAppliedTradeTax());

        // (2) Property AppliedTradeTax - Add instance

        $appliedTradeTaxItem = new TradeTaxType();
        $model->addToAppliedTradeTax($appliedTradeTaxItem);

        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertCount(1, $model->getAppliedTradeTax());

        // (3) Property AppliedTradeTax - Add and create instancc

        $testValueForAppliedTradeTaxItem = $model->addToAppliedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForAppliedTradeTaxItem);
        $this->assertIsArray($model->getAppliedTradeTax());
        $this->assertCount(2, $model->getAppliedTradeTax());

        // (4) Property AppliedTradeTax - Add once an instance

        $appliedTradeTaxOnceItem = new TradeTaxType();

        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);
        $model->addOnceToAppliedTradeTax($appliedTradeTaxOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property AppliedTradeTax - Add once an instance with implicit creation

        $firstAppliedTradeTaxOnceItem = $model->addOnceToAppliedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $firstAppliedTradeTaxOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property AppliedTradeTax - Add once an instance with implicit creation (2)

        $secondAppliedTradeTaxOnceItem = $model->addOnceToAppliedTradeTaxWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstAppliedTradeTaxOnceItem, $secondAppliedTradeTaxOnceItem);

        // (7) Property AppliedTradeTax - Clesr

        $model->clearAppliedTradeTax();

        $itemsAfterClear = $model->getAppliedTradeTax();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsTransportMovementType.
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

        $this->assertNotInstanceOf(TransportModeCodeType::class, $model->getModeCode());

        $testValueForModeCode = $model->getModeCodeWithCreate();

        $this->assertInstanceOf(TransportModeCodeType::class, $testValueForModeCode);
        $this->assertSame($testValueForModeCode, $model->getModeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\NoteType.
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

        $this->assertNotInstanceOf(CodeType::class, $model->getContentCode());

        $testValueForContentCode = $model->getContentCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForContentCode);
        $this->assertSame($testValueForContentCode, $model->getContentCode());

        // Property Content

        $testValue = new TextType();
        $model->setContent($testValue);

        $this->assertEquals($testValue, $model->getContent());

        $model->unsetContent();

        $this->assertNotInstanceOf(TextType::class, $model->getContent());

        $testValueForContent = $model->getContentWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForContent);
        $this->assertSame($testValueForContent, $model->getContent());

        // Property SubjectCode

        $testValue = new CodeType();
        $model->setSubjectCode($testValue);

        $this->assertEquals($testValue, $model->getSubjectCode());

        $model->unsetSubjectCode();

        $this->assertNotInstanceOf(CodeType::class, $model->getSubjectCode());

        $testValueForSubjectCode = $model->getSubjectCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForSubjectCode);
        $this->assertSame($testValueForSubjectCode, $model->getSubjectCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProcuringProjectType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductCharacteristicType.
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

        $this->assertNotInstanceOf(CodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property ValueMeasure

        $testValue = new MeasureType();
        $model->setValueMeasure($testValue);

        $this->assertEquals($testValue, $model->getValueMeasure());

        $model->unsetValueMeasure();

        $this->assertNotInstanceOf(MeasureType::class, $model->getValueMeasure());

        $testValueForValueMeasure = $model->getValueMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForValueMeasure);
        $this->assertSame($testValueForValueMeasure, $model->getValueMeasure());

        // Property Value

        $testValue = new TextType();
        $model->setValue($testValue);

        $this->assertEquals($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNotInstanceOf(TextType::class, $model->getValue());

        $testValueForValue = $model->getValueWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForValue);
        $this->assertSame($testValueForValue, $model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductClassificationType.
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

        $this->assertNotInstanceOf(CodeType::class, $model->getClassCode());

        $testValueForClassCode = $model->getClassCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForClassCode);
        $this->assertSame($testValueForClassCode, $model->getClassCode());

        // Property ClassName

        $testValue = new TextType();
        $model->setClassName($testValue);

        $this->assertEquals($testValue, $model->getClassName());

        $model->unsetClassName();

        $this->assertNotInstanceOf(TextType::class, $model->getClassName());

        $testValueForClassName = $model->getClassNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForClassName);
        $this->assertSame($testValueForClassName, $model->getClassName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getIssuerAssignedID());

        $testValueForIssuerAssignedID = $model->getIssuerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIssuerAssignedID);
        $this->assertSame($testValueForIssuerAssignedID, $model->getIssuerAssignedID());

        // Property URIID

        $testValue = new IDType();
        $model->setURIID($testValue);

        $this->assertEquals($testValue, $model->getURIID());

        $model->unsetURIID();

        $this->assertNotInstanceOf(IDType::class, $model->getURIID());

        $testValueForURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForURIID);
        $this->assertSame($testValueForURIID, $model->getURIID());

        // Property LineID

        $testValue = new IDType();
        $model->setLineID($testValue);

        $this->assertEquals($testValue, $model->getLineID());

        $model->unsetLineID();

        $this->assertNotInstanceOf(IDType::class, $model->getLineID());

        $testValueForLineID = $model->getLineIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForLineID);
        $this->assertSame($testValueForLineID, $model->getLineID());

        // Property TypeCode

        $testValue = new DocumentCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNotInstanceOf(DocumentCodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(DocumentCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property AttachmentBinaryObject

        $testValue = new BinaryObjectType();
        $model->setAttachmentBinaryObject($testValue);

        $this->assertEquals($testValue, $model->getAttachmentBinaryObject());

        $model->unsetAttachmentBinaryObject();

        $this->assertNotInstanceOf(BinaryObjectType::class, $model->getAttachmentBinaryObject());

        $testValueForAttachmentBinaryObject = $model->getAttachmentBinaryObjectWithCreate();

        $this->assertInstanceOf(BinaryObjectType::class, $testValueForAttachmentBinaryObject);
        $this->assertSame($testValueForAttachmentBinaryObject, $model->getAttachmentBinaryObject());

        // Property ReferenceTypeCode

        $testValue = new ReferenceCodeType();
        $model->setReferenceTypeCode($testValue);

        $this->assertEquals($testValue, $model->getReferenceTypeCode());

        $model->unsetReferenceTypeCode();

        $this->assertNotInstanceOf(ReferenceCodeType::class, $model->getReferenceTypeCode());

        $testValueForReferenceTypeCode = $model->getReferenceTypeCodeWithCreate();

        $this->assertInstanceOf(ReferenceCodeType::class, $testValueForReferenceTypeCode);
        $this->assertSame($testValueForReferenceTypeCode, $model->getReferenceTypeCode());

        // Property FormattedIssueDateTime

        $testValue = new FormattedDateTimeType();
        $model->setFormattedIssueDateTime($testValue);

        $this->assertEquals($testValue, $model->getFormattedIssueDateTime());

        $model->unsetFormattedIssueDateTime();

        $this->assertNotInstanceOf(FormattedDateTimeType::class, $model->getFormattedIssueDateTime());

        $testValueForFormattedIssueDateTime = $model->getFormattedIssueDateTimeWithCreate();

        $this->assertInstanceOf(FormattedDateTimeType::class, $testValueForFormattedIssueDateTime);
        $this->assertSame($testValueForFormattedIssueDateTime, $model->getFormattedIssueDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedProductType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // (1) Property GlobalID - Test set empty array

        $globalIDItems = [];
        $model->setGlobalID($globalIDItems);

        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(0, $model->getGlobalID());

        // (2) Property GlobalID - Add instance

        $globalIDItem = new IDType();
        $model->addToGlobalID($globalIDItem);

        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(1, $model->getGlobalID());

        // (3) Property GlobalID - Add and create instancc

        $testValueForGlobalIDItem = $model->addToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalIDItem);
        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(2, $model->getGlobalID());

        // (4) Property GlobalID - Add once an instance

        $globalIDOnceItem = new IDType();

        $model->addOnceToGlobalID($globalIDOnceItem);
        $model->addOnceToGlobalID($globalIDOnceItem);

        $itemsAfterOnce = $model->getGlobalID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property GlobalID - Add once an instance with implicit creation

        $firstGlobalIDOnceItem = $model->addOnceToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $firstGlobalIDOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getGlobalID();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property GlobalID - Add once an instance with implicit creation (2)

        $secondGlobalIDOnceItem = $model->addOnceToGlobalIDWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstGlobalIDOnceItem, $secondGlobalIDOnceItem);

        // (7) Property GlobalID - Clesr

        $model->clearGlobalID();

        $itemsAfterClear = $model->getGlobalID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property SellerAssignedID

        $testValue = new IDType();
        $model->setSellerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getSellerAssignedID());

        $model->unsetSellerAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getSellerAssignedID());

        $testValueForSellerAssignedID = $model->getSellerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForSellerAssignedID);
        $this->assertSame($testValueForSellerAssignedID, $model->getSellerAssignedID());

        // Property BuyerAssignedID

        $testValue = new IDType();
        $model->setBuyerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getBuyerAssignedID());

        $model->unsetBuyerAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getBuyerAssignedID());

        $testValueForBuyerAssignedID = $model->getBuyerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBuyerAssignedID);
        $this->assertSame($testValueForBuyerAssignedID, $model->getBuyerAssignedID());

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getIndustryAssignedID());

        $testValueForIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIndustryAssignedID);
        $this->assertSame($testValueForIndustryAssignedID, $model->getIndustryAssignedID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property UnitQuantity

        $testValue = new QuantityType();
        $model->setUnitQuantity($testValue);

        $this->assertEquals($testValue, $model->getUnitQuantity());

        $model->unsetUnitQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getUnitQuantity());

        $testValueForUnitQuantity = $model->getUnitQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForUnitQuantity);
        $this->assertSame($testValueForUnitQuantity, $model->getUnitQuantity());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\SpecifiedPeriodType.
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

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property StartDateTime

        $testValue = new DateTimeType();
        $model->setStartDateTime($testValue);

        $this->assertEquals($testValue, $model->getStartDateTime());

        $model->unsetStartDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getStartDateTime());

        $testValueForStartDateTime = $model->getStartDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForStartDateTime);
        $this->assertSame($testValueForStartDateTime, $model->getStartDateTime());

        // Property EndDateTime

        $testValue = new DateTimeType();
        $model->setEndDateTime($testValue);

        $this->assertEquals($testValue, $model->getEndDateTime());

        $model->unsetEndDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getEndDateTime());

        $testValueForEndDateTime = $model->getEndDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForEndDateTime);
        $this->assertSame($testValueForEndDateTime, $model->getEndDateTime());

        // Property CompleteDateTime

        $testValue = new DateTimeType();
        $model->setCompleteDateTime($testValue);

        $this->assertEquals($testValue, $model->getCompleteDateTime());

        $model->unsetCompleteDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getCompleteDateTime());

        $testValueForCompleteDateTime = $model->getCompleteDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForCompleteDateTime);
        $this->assertSame($testValueForCompleteDateTime, $model->getCompleteDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainConsignmentType.
     */
    public function testModelsZffxextendedRamSupplyChainConsignmentType(): void
    {
        $model = new SupplyChainConsignmentType();

        $this->assertInstanceOf(SupplyChainConsignmentType::class, $model);

        // (1) Property SpecifiedLogisticsTransportMovement - Test set empty array

        $specifiedLogisticsTransportMovementItems = [];
        $model->setSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementItems);

        $this->assertIsArray($model->getSpecifiedLogisticsTransportMovement());
        $this->assertCount(0, $model->getSpecifiedLogisticsTransportMovement());

        // (2) Property SpecifiedLogisticsTransportMovement - Add instance

        $specifiedLogisticsTransportMovementItem = new LogisticsTransportMovementType();
        $model->addToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementItem);

        $this->assertIsArray($model->getSpecifiedLogisticsTransportMovement());
        $this->assertCount(1, $model->getSpecifiedLogisticsTransportMovement());

        // (3) Property SpecifiedLogisticsTransportMovement - Add and create instancc

        $testValueForSpecifiedLogisticsTransportMovementItem = $model->addToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $testValueForSpecifiedLogisticsTransportMovementItem);
        $this->assertIsArray($model->getSpecifiedLogisticsTransportMovement());
        $this->assertCount(2, $model->getSpecifiedLogisticsTransportMovement());

        // (4) Property SpecifiedLogisticsTransportMovement - Add once an instance

        $specifiedLogisticsTransportMovementOnceItem = new LogisticsTransportMovementType();

        $model->addOnceToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementOnceItem);
        $model->addOnceToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovementOnceItem);

        $itemsAfterOnce = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedLogisticsTransportMovement - Add once an instance with implicit creation

        $firstSpecifiedLogisticsTransportMovementOnceItem = $model->addOnceToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertInstanceOf(LogisticsTransportMovementType::class, $firstSpecifiedLogisticsTransportMovementOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedLogisticsTransportMovement - Add once an instance with implicit creation (2)

        $secondSpecifiedLogisticsTransportMovementOnceItem = $model->addOnceToSpecifiedLogisticsTransportMovementWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedLogisticsTransportMovementOnceItem, $secondSpecifiedLogisticsTransportMovementOnceItem);

        // (7) Property SpecifiedLogisticsTransportMovement - Clesr

        $model->clearSpecifiedLogisticsTransportMovement();

        $itemsAfterClear = $model->getSpecifiedLogisticsTransportMovement();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainEventType.
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

        $this->assertNotInstanceOf(DateTimeType::class, $model->getOccurrenceDateTime());

        $testValueForOccurrenceDateTime = $model->getOccurrenceDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForOccurrenceDateTime);
        $this->assertSame($testValueForOccurrenceDateTime, $model->getOccurrenceDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeLineItemType.
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

        $this->assertNotInstanceOf(DocumentLineDocumentType::class, $model->getAssociatedDocumentLineDocument());

        $testValueForAssociatedDocumentLineDocument = $model->getAssociatedDocumentLineDocumentWithCreate();

        $this->assertInstanceOf(DocumentLineDocumentType::class, $testValueForAssociatedDocumentLineDocument);
        $this->assertSame($testValueForAssociatedDocumentLineDocument, $model->getAssociatedDocumentLineDocument());

        // Property SpecifiedTradeProduct

        $testValue = new TradeProductType();
        $model->setSpecifiedTradeProduct($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedTradeProduct());

        $model->unsetSpecifiedTradeProduct();

        $this->assertNotInstanceOf(TradeProductType::class, $model->getSpecifiedTradeProduct());

        $testValueForSpecifiedTradeProduct = $model->getSpecifiedTradeProductWithCreate();

        $this->assertInstanceOf(TradeProductType::class, $testValueForSpecifiedTradeProduct);
        $this->assertSame($testValueForSpecifiedTradeProduct, $model->getSpecifiedTradeProduct());

        // Property SpecifiedLineTradeAgreement

        $testValue = new LineTradeAgreementType();
        $model->setSpecifiedLineTradeAgreement($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeAgreement());

        $model->unsetSpecifiedLineTradeAgreement();

        $this->assertNotInstanceOf(LineTradeAgreementType::class, $model->getSpecifiedLineTradeAgreement());

        $testValueForSpecifiedLineTradeAgreement = $model->getSpecifiedLineTradeAgreementWithCreate();

        $this->assertInstanceOf(LineTradeAgreementType::class, $testValueForSpecifiedLineTradeAgreement);
        $this->assertSame($testValueForSpecifiedLineTradeAgreement, $model->getSpecifiedLineTradeAgreement());

        // Property SpecifiedLineTradeDelivery

        $testValue = new LineTradeDeliveryType();
        $model->setSpecifiedLineTradeDelivery($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeDelivery());

        $model->unsetSpecifiedLineTradeDelivery();

        $this->assertNotInstanceOf(LineTradeDeliveryType::class, $model->getSpecifiedLineTradeDelivery());

        $testValueForSpecifiedLineTradeDelivery = $model->getSpecifiedLineTradeDeliveryWithCreate();

        $this->assertInstanceOf(LineTradeDeliveryType::class, $testValueForSpecifiedLineTradeDelivery);
        $this->assertSame($testValueForSpecifiedLineTradeDelivery, $model->getSpecifiedLineTradeDelivery());

        // Property SpecifiedLineTradeSettlement

        $testValue = new LineTradeSettlementType();
        $model->setSpecifiedLineTradeSettlement($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLineTradeSettlement());

        $model->unsetSpecifiedLineTradeSettlement();

        $this->assertNotInstanceOf(LineTradeSettlementType::class, $model->getSpecifiedLineTradeSettlement());

        $testValueForSpecifiedLineTradeSettlement = $model->getSpecifiedLineTradeSettlementWithCreate();

        $this->assertInstanceOf(LineTradeSettlementType::class, $testValueForSpecifiedLineTradeSettlement);
        $this->assertSame($testValueForSpecifiedLineTradeSettlement, $model->getSpecifiedLineTradeSettlement());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeTransactionType.
     */
    public function testModelsZffxextendedRamSupplyChainTradeTransactionType(): void
    {
        $model = new SupplyChainTradeTransactionType();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $model);

        // (1) Property IncludedSupplyChainTradeLineItem - Test set empty array

        $includedSupplyChainTradeLineItemItems = [];
        $model->setIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemItems);

        $this->assertIsArray($model->getIncludedSupplyChainTradeLineItem());
        $this->assertCount(0, $model->getIncludedSupplyChainTradeLineItem());

        // (2) Property IncludedSupplyChainTradeLineItem - Add instance

        $includedSupplyChainTradeLineItemItem = new SupplyChainTradeLineItemType();
        $model->addToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemItem);

        $this->assertIsArray($model->getIncludedSupplyChainTradeLineItem());
        $this->assertCount(1, $model->getIncludedSupplyChainTradeLineItem());

        // (3) Property IncludedSupplyChainTradeLineItem - Add and create instancc

        $testValueForIncludedSupplyChainTradeLineItemItem = $model->addToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $testValueForIncludedSupplyChainTradeLineItemItem);
        $this->assertIsArray($model->getIncludedSupplyChainTradeLineItem());
        $this->assertCount(2, $model->getIncludedSupplyChainTradeLineItem());

        // (4) Property IncludedSupplyChainTradeLineItem - Add once an instance

        $includedSupplyChainTradeLineItemOnceItem = new SupplyChainTradeLineItemType();

        $model->addOnceToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemOnceItem);
        $model->addOnceToIncludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItemOnceItem);

        $itemsAfterOnce = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IncludedSupplyChainTradeLineItem - Add once an instance with implicit creation

        $firstIncludedSupplyChainTradeLineItemOnceItem = $model->addOnceToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $firstIncludedSupplyChainTradeLineItemOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IncludedSupplyChainTradeLineItem - Add once an instance with implicit creation (2)

        $secondIncludedSupplyChainTradeLineItemOnceItem = $model->addOnceToIncludedSupplyChainTradeLineItemWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIncludedSupplyChainTradeLineItemOnceItem, $secondIncludedSupplyChainTradeLineItemOnceItem);

        // (6) Property IncludedSupplyChainTradeLineItem - Latest added instance

        $latestIncludedSupplyChainTradeLineItem = $model->getLatestIncludedSupplyChainTradeLineItem();

        $this->assertInstanceOf(SupplyChainTradeLineItemType::class, $latestIncludedSupplyChainTradeLineItem);

        // (6) Property IncludedSupplyChainTradeLineItem - Has latest added instance

        $hasLatestIncludedSupplyChainTradeLineItem = $model->hasLatestIncludedSupplyChainTradeLineItem();

        $this->assertIsBool($hasLatestIncludedSupplyChainTradeLineItem);
        $this->assertTrue($hasLatestIncludedSupplyChainTradeLineItem);

        // (7) Property IncludedSupplyChainTradeLineItem - Clesr

        $model->clearIncludedSupplyChainTradeLineItem();

        $itemsAfterClear = $model->getIncludedSupplyChainTradeLineItem();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property ApplicableHeaderTradeAgreement

        $testValue = new HeaderTradeAgreementType();
        $model->setApplicableHeaderTradeAgreement($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeAgreement());

        $model->unsetApplicableHeaderTradeAgreement();

        $this->assertNotInstanceOf(HeaderTradeAgreementType::class, $model->getApplicableHeaderTradeAgreement());

        $testValueForApplicableHeaderTradeAgreement = $model->getApplicableHeaderTradeAgreementWithCreate();

        $this->assertInstanceOf(HeaderTradeAgreementType::class, $testValueForApplicableHeaderTradeAgreement);
        $this->assertSame($testValueForApplicableHeaderTradeAgreement, $model->getApplicableHeaderTradeAgreement());

        // Property ApplicableHeaderTradeDelivery

        $testValue = new HeaderTradeDeliveryType();
        $model->setApplicableHeaderTradeDelivery($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeDelivery());

        $model->unsetApplicableHeaderTradeDelivery();

        $this->assertNotInstanceOf(HeaderTradeDeliveryType::class, $model->getApplicableHeaderTradeDelivery());

        $testValueForApplicableHeaderTradeDelivery = $model->getApplicableHeaderTradeDeliveryWithCreate();

        $this->assertInstanceOf(HeaderTradeDeliveryType::class, $testValueForApplicableHeaderTradeDelivery);
        $this->assertSame($testValueForApplicableHeaderTradeDelivery, $model->getApplicableHeaderTradeDelivery());

        // Property ApplicableHeaderTradeSettlement

        $testValue = new HeaderTradeSettlementType();
        $model->setApplicableHeaderTradeSettlement($testValue);

        $this->assertEquals($testValue, $model->getApplicableHeaderTradeSettlement());

        $model->unsetApplicableHeaderTradeSettlement();

        $this->assertNotInstanceOf(HeaderTradeSettlementType::class, $model->getApplicableHeaderTradeSettlement());

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
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TaxRegistrationType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAccountingAccountType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property TypeCode

        $testValue = new AccountingAccountTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNotInstanceOf(AccountingAccountTypeCodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(AccountingAccountTypeCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAddressType.
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

        $this->assertNotInstanceOf(CodeType::class, $model->getPostcodeCode());

        $testValueForPostcodeCode = $model->getPostcodeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForPostcodeCode);
        $this->assertSame($testValueForPostcodeCode, $model->getPostcodeCode());

        // Property LineOne

        $testValue = new TextType();
        $model->setLineOne($testValue);

        $this->assertEquals($testValue, $model->getLineOne());

        $model->unsetLineOne();

        $this->assertNotInstanceOf(TextType::class, $model->getLineOne());

        $testValueForLineOne = $model->getLineOneWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineOne);
        $this->assertSame($testValueForLineOne, $model->getLineOne());

        // Property LineTwo

        $testValue = new TextType();
        $model->setLineTwo($testValue);

        $this->assertEquals($testValue, $model->getLineTwo());

        $model->unsetLineTwo();

        $this->assertNotInstanceOf(TextType::class, $model->getLineTwo());

        $testValueForLineTwo = $model->getLineTwoWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineTwo);
        $this->assertSame($testValueForLineTwo, $model->getLineTwo());

        // Property LineThree

        $testValue = new TextType();
        $model->setLineThree($testValue);

        $this->assertEquals($testValue, $model->getLineThree());

        $model->unsetLineThree();

        $this->assertNotInstanceOf(TextType::class, $model->getLineThree());

        $testValueForLineThree = $model->getLineThreeWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForLineThree);
        $this->assertSame($testValueForLineThree, $model->getLineThree());

        // Property CityName

        $testValue = new TextType();
        $model->setCityName($testValue);

        $this->assertEquals($testValue, $model->getCityName());

        $model->unsetCityName();

        $this->assertNotInstanceOf(TextType::class, $model->getCityName());

        $testValueForCityName = $model->getCityNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCityName);
        $this->assertSame($testValueForCityName, $model->getCityName());

        // Property CountryID

        $testValue = new CountryIDType();
        $model->setCountryID($testValue);

        $this->assertEquals($testValue, $model->getCountryID());

        $model->unsetCountryID();

        $this->assertNotInstanceOf(CountryIDType::class, $model->getCountryID());

        $testValueForCountryID = $model->getCountryIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $testValueForCountryID);
        $this->assertSame($testValueForCountryID, $model->getCountryID());

        // Property CountrySubDivisionName

        $testValue = new TextType();
        $model->setCountrySubDivisionName($testValue);

        $this->assertEquals($testValue, $model->getCountrySubDivisionName());

        $model->unsetCountrySubDivisionName();

        $this->assertNotInstanceOf(TextType::class, $model->getCountrySubDivisionName());

        $testValueForCountrySubDivisionName = $model->getCountrySubDivisionNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCountrySubDivisionName);
        $this->assertSame($testValueForCountrySubDivisionName, $model->getCountrySubDivisionName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAllowanceChargeType.
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

        $this->assertNotInstanceOf(IndicatorType::class, $model->getChargeIndicator());

        $testValueForChargeIndicator = $model->getChargeIndicatorWithCreate();

        $this->assertInstanceOf(IndicatorType::class, $testValueForChargeIndicator);
        $this->assertSame($testValueForChargeIndicator, $model->getChargeIndicator());

        // Property SequenceNumeric

        $testValue = new NumericType();
        $model->setSequenceNumeric($testValue);

        $this->assertEquals($testValue, $model->getSequenceNumeric());

        $model->unsetSequenceNumeric();

        $this->assertNotInstanceOf(NumericType::class, $model->getSequenceNumeric());

        $testValueForSequenceNumeric = $model->getSequenceNumericWithCreate();

        $this->assertInstanceOf(NumericType::class, $testValueForSequenceNumeric);
        $this->assertSame($testValueForSequenceNumeric, $model->getSequenceNumeric());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNotInstanceOf(PercentType::class, $model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getBasisQuantity());

        $testValueForBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBasisQuantity);
        $this->assertSame($testValueForBasisQuantity, $model->getBasisQuantity());

        // Property ActualAmount

        $testValue = new AmountType();
        $model->setActualAmount($testValue);

        $this->assertEquals($testValue, $model->getActualAmount());

        $model->unsetActualAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getActualAmount());

        $testValueForActualAmount = $model->getActualAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualAmount);
        $this->assertSame($testValueForActualAmount, $model->getActualAmount());

        // Property ReasonCode

        $testValue = new AllowanceChargeReasonCodeType();
        $model->setReasonCode($testValue);

        $this->assertEquals($testValue, $model->getReasonCode());

        $model->unsetReasonCode();

        $this->assertNotInstanceOf(AllowanceChargeReasonCodeType::class, $model->getReasonCode());

        $testValueForReasonCode = $model->getReasonCodeWithCreate();

        $this->assertInstanceOf(AllowanceChargeReasonCodeType::class, $testValueForReasonCode);
        $this->assertSame($testValueForReasonCode, $model->getReasonCode());

        // Property Reason

        $testValue = new TextType();
        $model->setReason($testValue);

        $this->assertEquals($testValue, $model->getReason());

        $model->unsetReason();

        $this->assertNotInstanceOf(TextType::class, $model->getReason());

        $testValueForReason = $model->getReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForReason);
        $this->assertSame($testValueForReason, $model->getReason());

        // Property CategoryTradeTax

        $testValue = new TradeTaxType();
        $model->setCategoryTradeTax($testValue);

        $this->assertEquals($testValue, $model->getCategoryTradeTax());

        $model->unsetCategoryTradeTax();

        $this->assertNotInstanceOf(TradeTaxType::class, $model->getCategoryTradeTax());

        $testValueForCategoryTradeTax = $model->getCategoryTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForCategoryTradeTax);
        $this->assertSame($testValueForCategoryTradeTax, $model->getCategoryTradeTax());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeContactType.
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

        $this->assertNotInstanceOf(TextType::class, $model->getPersonName());

        $testValueForPersonName = $model->getPersonNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForPersonName);
        $this->assertSame($testValueForPersonName, $model->getPersonName());

        // Property DepartmentName

        $testValue = new TextType();
        $model->setDepartmentName($testValue);

        $this->assertEquals($testValue, $model->getDepartmentName());

        $model->unsetDepartmentName();

        $this->assertNotInstanceOf(TextType::class, $model->getDepartmentName());

        $testValueForDepartmentName = $model->getDepartmentNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDepartmentName);
        $this->assertSame($testValueForDepartmentName, $model->getDepartmentName());

        // Property TypeCode

        $testValue = new CodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNotInstanceOf(CodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property TelephoneUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setTelephoneUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getTelephoneUniversalCommunication());

        $model->unsetTelephoneUniversalCommunication();

        $this->assertNotInstanceOf(UniversalCommunicationType::class, $model->getTelephoneUniversalCommunication());

        $testValueForTelephoneUniversalCommunication = $model->getTelephoneUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForTelephoneUniversalCommunication);
        $this->assertSame($testValueForTelephoneUniversalCommunication, $model->getTelephoneUniversalCommunication());

        // Property FaxUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setFaxUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getFaxUniversalCommunication());

        $model->unsetFaxUniversalCommunication();

        $this->assertNotInstanceOf(UniversalCommunicationType::class, $model->getFaxUniversalCommunication());

        $testValueForFaxUniversalCommunication = $model->getFaxUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForFaxUniversalCommunication);
        $this->assertSame($testValueForFaxUniversalCommunication, $model->getFaxUniversalCommunication());

        // Property EmailURIUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setEmailURIUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getEmailURIUniversalCommunication());

        $model->unsetEmailURIUniversalCommunication();

        $this->assertNotInstanceOf(UniversalCommunicationType::class, $model->getEmailURIUniversalCommunication());

        $testValueForEmailURIUniversalCommunication = $model->getEmailURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForEmailURIUniversalCommunication);
        $this->assertSame($testValueForEmailURIUniversalCommunication, $model->getEmailURIUniversalCommunication());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCountryType.
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

        $this->assertNotInstanceOf(CountryIDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(CountryIDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCurrencyExchangeType.
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

        $this->assertNotInstanceOf(CurrencyCodeType::class, $model->getSourceCurrencyCode());

        $testValueForSourceCurrencyCode = $model->getSourceCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForSourceCurrencyCode);
        $this->assertSame($testValueForSourceCurrencyCode, $model->getSourceCurrencyCode());

        // Property TargetCurrencyCode

        $testValue = new CurrencyCodeType();
        $model->setTargetCurrencyCode($testValue);

        $this->assertEquals($testValue, $model->getTargetCurrencyCode());

        $model->unsetTargetCurrencyCode();

        $this->assertNotInstanceOf(CurrencyCodeType::class, $model->getTargetCurrencyCode());

        $testValueForTargetCurrencyCode = $model->getTargetCurrencyCodeWithCreate();

        $this->assertInstanceOf(CurrencyCodeType::class, $testValueForTargetCurrencyCode);
        $this->assertSame($testValueForTargetCurrencyCode, $model->getTargetCurrencyCode());

        // Property ConversionRate

        $testValue = new RateType();
        $model->setConversionRate($testValue);

        $this->assertEquals($testValue, $model->getConversionRate());

        $model->unsetConversionRate();

        $this->assertNotInstanceOf(RateType::class, $model->getConversionRate());

        $testValueForConversionRate = $model->getConversionRateWithCreate();

        $this->assertInstanceOf(RateType::class, $testValueForConversionRate);
        $this->assertSame($testValueForConversionRate, $model->getConversionRate());

        // Property ConversionRateDateTime

        $testValue = new DateTimeType();
        $model->setConversionRateDateTime($testValue);

        $this->assertEquals($testValue, $model->getConversionRateDateTime());

        $model->unsetConversionRateDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getConversionRateDateTime());

        $testValueForConversionRateDateTime = $model->getConversionRateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForConversionRateDateTime);
        $this->assertSame($testValueForConversionRateDateTime, $model->getConversionRateDateTime());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeDeliveryTermsType.
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

        $this->assertNotInstanceOf(DeliveryTermsCodeType::class, $model->getDeliveryTypeCode());

        $testValueForDeliveryTypeCode = $model->getDeliveryTypeCodeWithCreate();

        $this->assertInstanceOf(DeliveryTermsCodeType::class, $testValueForDeliveryTypeCode);
        $this->assertSame($testValueForDeliveryTypeCode, $model->getDeliveryTypeCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType.
     */
    public function testModelsZffxextendedRamTradePartyType(): void
    {
        $model = new TradePartyType();

        $this->assertInstanceOf(TradePartyType::class, $model);

        // (1) Property ID - Test set empty array

        $iDItems = [];
        $model->setID($iDItems);

        $this->assertIsArray($model->getID());
        $this->assertCount(0, $model->getID());

        // (2) Property ID - Add instance

        $iDItem = new IDType();
        $model->addToID($iDItem);

        $this->assertIsArray($model->getID());
        $this->assertCount(1, $model->getID());

        // (3) Property ID - Add and create instancc

        $testValueForIDItem = $model->addToIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIDItem);
        $this->assertIsArray($model->getID());
        $this->assertCount(2, $model->getID());

        // (4) Property ID - Add once an instance

        $iDOnceItem = new IDType();

        $model->addOnceToID($iDOnceItem);
        $model->addOnceToID($iDOnceItem);

        $itemsAfterOnce = $model->getID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ID - Add once an instance with implicit creation

        $firstIDOnceItem = $model->addOnceToIDWithCreate();

        $this->assertInstanceOf(IDType::class, $firstIDOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getID();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ID - Add once an instance with implicit creation (2)

        $secondIDOnceItem = $model->addOnceToIDWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIDOnceItem, $secondIDOnceItem);

        // (7) Property ID - Clesr

        $model->clearID();

        $itemsAfterClear = $model->getID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property GlobalID - Test set empty array

        $globalIDItems = [];
        $model->setGlobalID($globalIDItems);

        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(0, $model->getGlobalID());

        // (2) Property GlobalID - Add instance

        $globalIDItem = new IDType();
        $model->addToGlobalID($globalIDItem);

        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(1, $model->getGlobalID());

        // (3) Property GlobalID - Add and create instancc

        $testValueForGlobalIDItem = $model->addToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalIDItem);
        $this->assertIsArray($model->getGlobalID());
        $this->assertCount(2, $model->getGlobalID());

        // (4) Property GlobalID - Add once an instance

        $globalIDOnceItem = new IDType();

        $model->addOnceToGlobalID($globalIDOnceItem);
        $model->addOnceToGlobalID($globalIDOnceItem);

        $itemsAfterOnce = $model->getGlobalID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property GlobalID - Add once an instance with implicit creation

        $firstGlobalIDOnceItem = $model->addOnceToGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $firstGlobalIDOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getGlobalID();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property GlobalID - Add once an instance with implicit creation (2)

        $secondGlobalIDOnceItem = $model->addOnceToGlobalIDWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstGlobalIDOnceItem, $secondGlobalIDOnceItem);

        // (7) Property GlobalID - Clesr

        $model->clearGlobalID();

        $itemsAfterClear = $model->getGlobalID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property RoleCode

        $testValue = 'dummy-RoleCodeValue';
        $model->setRoleCode($testValue);

        $this->assertSame($testValue, $model->getRoleCode());

        $model->unsetRoleCode();

        $this->assertNull($model->getRoleCode());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property SpecifiedLegalOrganization

        $testValue = new LegalOrganizationType();
        $model->setSpecifiedLegalOrganization($testValue);

        $this->assertEquals($testValue, $model->getSpecifiedLegalOrganization());

        $model->unsetSpecifiedLegalOrganization();

        $this->assertNotInstanceOf(LegalOrganizationType::class, $model->getSpecifiedLegalOrganization());

        $testValueForSpecifiedLegalOrganization = $model->getSpecifiedLegalOrganizationWithCreate();

        $this->assertInstanceOf(LegalOrganizationType::class, $testValueForSpecifiedLegalOrganization);
        $this->assertSame($testValueForSpecifiedLegalOrganization, $model->getSpecifiedLegalOrganization());

        // (1) Property DefinedTradeContact - Test set empty array

        $definedTradeContactItems = [];
        $model->setDefinedTradeContact($definedTradeContactItems);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertCount(0, $model->getDefinedTradeContact());

        // (2) Property DefinedTradeContact - Add instance

        $definedTradeContactItem = new TradeContactType();
        $model->addToDefinedTradeContact($definedTradeContactItem);

        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertCount(1, $model->getDefinedTradeContact());

        // (3) Property DefinedTradeContact - Add and create instancc

        $testValueForDefinedTradeContactItem = $model->addToDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $testValueForDefinedTradeContactItem);
        $this->assertIsArray($model->getDefinedTradeContact());
        $this->assertCount(2, $model->getDefinedTradeContact());

        // (4) Property DefinedTradeContact - Add once an instance

        $definedTradeContactOnceItem = new TradeContactType();

        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);
        $model->addOnceToDefinedTradeContact($definedTradeContactOnceItem);

        $itemsAfterOnce = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property DefinedTradeContact - Add once an instance with implicit creation

        $firstDefinedTradeContactOnceItem = $model->addOnceToDefinedTradeContactWithCreate();

        $this->assertInstanceOf(TradeContactType::class, $firstDefinedTradeContactOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property DefinedTradeContact - Add once an instance with implicit creation (2)

        $secondDefinedTradeContactOnceItem = $model->addOnceToDefinedTradeContactWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstDefinedTradeContactOnceItem, $secondDefinedTradeContactOnceItem);

        // (7) Property DefinedTradeContact - Clesr

        $model->clearDefinedTradeContact();

        $itemsAfterClear = $model->getDefinedTradeContact();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property PostalTradeAddress

        $testValue = new TradeAddressType();
        $model->setPostalTradeAddress($testValue);

        $this->assertEquals($testValue, $model->getPostalTradeAddress());

        $model->unsetPostalTradeAddress();

        $this->assertNotInstanceOf(TradeAddressType::class, $model->getPostalTradeAddress());

        $testValueForPostalTradeAddress = $model->getPostalTradeAddressWithCreate();

        $this->assertInstanceOf(TradeAddressType::class, $testValueForPostalTradeAddress);
        $this->assertSame($testValueForPostalTradeAddress, $model->getPostalTradeAddress());

        // Property URIUniversalCommunication

        $testValue = new UniversalCommunicationType();
        $model->setURIUniversalCommunication($testValue);

        $this->assertEquals($testValue, $model->getURIUniversalCommunication());

        $model->unsetURIUniversalCommunication();

        $this->assertNotInstanceOf(UniversalCommunicationType::class, $model->getURIUniversalCommunication());

        $testValueForURIUniversalCommunication = $model->getURIUniversalCommunicationWithCreate();

        $this->assertInstanceOf(UniversalCommunicationType::class, $testValueForURIUniversalCommunication);
        $this->assertSame($testValueForURIUniversalCommunication, $model->getURIUniversalCommunication());

        // (1) Property SpecifiedTaxRegistration - Test set empty array

        $specifiedTaxRegistrationItems = [];
        $model->setSpecifiedTaxRegistration($specifiedTaxRegistrationItems);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertCount(0, $model->getSpecifiedTaxRegistration());

        // (2) Property SpecifiedTaxRegistration - Add instance

        $specifiedTaxRegistrationItem = new TaxRegistrationType();
        $model->addToSpecifiedTaxRegistration($specifiedTaxRegistrationItem);

        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertCount(1, $model->getSpecifiedTaxRegistration());

        // (3) Property SpecifiedTaxRegistration - Add and create instancc

        $testValueForSpecifiedTaxRegistrationItem = $model->addToSpecifiedTaxRegistrationWithCreate();

        $this->assertInstanceOf(TaxRegistrationType::class, $testValueForSpecifiedTaxRegistrationItem);
        $this->assertIsArray($model->getSpecifiedTaxRegistration());
        $this->assertCount(2, $model->getSpecifiedTaxRegistration());

        // (4) Property SpecifiedTaxRegistration - Add once an instance

        $specifiedTaxRegistrationOnceItem = new TaxRegistrationType();

        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);
        $model->addOnceToSpecifiedTaxRegistration($specifiedTaxRegistrationOnceItem);

        $itemsAfterOnce = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property SpecifiedTaxRegistration - Add once an instance with implicit creation

        $firstSpecifiedTaxRegistrationOnceItem = $model->addOnceToSpecifiedTaxRegistrationWithCreate();

        $this->assertInstanceOf(TaxRegistrationType::class, $firstSpecifiedTaxRegistrationOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property SpecifiedTaxRegistration - Add once an instance with implicit creation (2)

        $secondSpecifiedTaxRegistrationOnceItem = $model->addOnceToSpecifiedTaxRegistrationWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstSpecifiedTaxRegistrationOnceItem, $secondSpecifiedTaxRegistrationOnceItem);

        // (7) Property SpecifiedTaxRegistration - Clesr

        $model->clearSpecifiedTaxRegistration();

        $itemsAfterClear = $model->getSpecifiedTaxRegistration();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentDiscountTermsType.
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

        $this->assertNotInstanceOf(DateTimeType::class, $model->getBasisDateTime());

        $testValueForBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForBasisDateTime);
        $this->assertSame($testValueForBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNotInstanceOf(MeasureType::class, $model->getBasisPeriodMeasure());

        $testValueForBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForBasisPeriodMeasure);
        $this->assertSame($testValueForBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNotInstanceOf(PercentType::class, $model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property ActualDiscountAmount

        $testValue = new AmountType();
        $model->setActualDiscountAmount($testValue);

        $this->assertEquals($testValue, $model->getActualDiscountAmount());

        $model->unsetActualDiscountAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getActualDiscountAmount());

        $testValueForActualDiscountAmount = $model->getActualDiscountAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualDiscountAmount);
        $this->assertSame($testValueForActualDiscountAmount, $model->getActualDiscountAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentPenaltyTermsType.
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

        $this->assertNotInstanceOf(DateTimeType::class, $model->getBasisDateTime());

        $testValueForBasisDateTime = $model->getBasisDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForBasisDateTime);
        $this->assertSame($testValueForBasisDateTime, $model->getBasisDateTime());

        // Property BasisPeriodMeasure

        $testValue = new MeasureType();
        $model->setBasisPeriodMeasure($testValue);

        $this->assertEquals($testValue, $model->getBasisPeriodMeasure());

        $model->unsetBasisPeriodMeasure();

        $this->assertNotInstanceOf(MeasureType::class, $model->getBasisPeriodMeasure());

        $testValueForBasisPeriodMeasure = $model->getBasisPeriodMeasureWithCreate();

        $this->assertInstanceOf(MeasureType::class, $testValueForBasisPeriodMeasure);
        $this->assertSame($testValueForBasisPeriodMeasure, $model->getBasisPeriodMeasure());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property CalculationPercent

        $testValue = new PercentType();
        $model->setCalculationPercent($testValue);

        $this->assertEquals($testValue, $model->getCalculationPercent());

        $model->unsetCalculationPercent();

        $this->assertNotInstanceOf(PercentType::class, $model->getCalculationPercent());

        $testValueForCalculationPercent = $model->getCalculationPercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForCalculationPercent);
        $this->assertSame($testValueForCalculationPercent, $model->getCalculationPercent());

        // Property ActualPenaltyAmount

        $testValue = new AmountType();
        $model->setActualPenaltyAmount($testValue);

        $this->assertEquals($testValue, $model->getActualPenaltyAmount());

        $model->unsetActualPenaltyAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getActualPenaltyAmount());

        $testValueForActualPenaltyAmount = $model->getActualPenaltyAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForActualPenaltyAmount);
        $this->assertSame($testValueForActualPenaltyAmount, $model->getActualPenaltyAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentTermsType.
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

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // Property DueDateDateTime

        $testValue = new DateTimeType();
        $model->setDueDateDateTime($testValue);

        $this->assertEquals($testValue, $model->getDueDateDateTime());

        $model->unsetDueDateDateTime();

        $this->assertNotInstanceOf(DateTimeType::class, $model->getDueDateDateTime());

        $testValueForDueDateDateTime = $model->getDueDateDateTimeWithCreate();

        $this->assertInstanceOf(DateTimeType::class, $testValueForDueDateDateTime);
        $this->assertSame($testValueForDueDateDateTime, $model->getDueDateDateTime());

        // Property DirectDebitMandateID

        $testValue = new IDType();
        $model->setDirectDebitMandateID($testValue);

        $this->assertEquals($testValue, $model->getDirectDebitMandateID());

        $model->unsetDirectDebitMandateID();

        $this->assertNotInstanceOf(IDType::class, $model->getDirectDebitMandateID());

        $testValueForDirectDebitMandateID = $model->getDirectDebitMandateIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForDirectDebitMandateID);
        $this->assertSame($testValueForDirectDebitMandateID, $model->getDirectDebitMandateID());

        // Property PartialPaymentAmount

        $testValue = new AmountType();
        $model->setPartialPaymentAmount($testValue);

        $this->assertEquals($testValue, $model->getPartialPaymentAmount());

        $model->unsetPartialPaymentAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getPartialPaymentAmount());

        $testValueForPartialPaymentAmount = $model->getPartialPaymentAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForPartialPaymentAmount);
        $this->assertSame($testValueForPartialPaymentAmount, $model->getPartialPaymentAmount());

        // Property ApplicableTradePaymentPenaltyTerms

        $testValue = new TradePaymentPenaltyTermsType();
        $model->setApplicableTradePaymentPenaltyTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradePaymentPenaltyTerms());

        $model->unsetApplicableTradePaymentPenaltyTerms();

        $this->assertNotInstanceOf(TradePaymentPenaltyTermsType::class, $model->getApplicableTradePaymentPenaltyTerms());

        $testValueForApplicableTradePaymentPenaltyTerms = $model->getApplicableTradePaymentPenaltyTermsWithCreate();

        $this->assertInstanceOf(TradePaymentPenaltyTermsType::class, $testValueForApplicableTradePaymentPenaltyTerms);
        $this->assertSame($testValueForApplicableTradePaymentPenaltyTerms, $model->getApplicableTradePaymentPenaltyTerms());

        // Property ApplicableTradePaymentDiscountTerms

        $testValue = new TradePaymentDiscountTermsType();
        $model->setApplicableTradePaymentDiscountTerms($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradePaymentDiscountTerms());

        $model->unsetApplicableTradePaymentDiscountTerms();

        $this->assertNotInstanceOf(TradePaymentDiscountTermsType::class, $model->getApplicableTradePaymentDiscountTerms());

        $testValueForApplicableTradePaymentDiscountTerms = $model->getApplicableTradePaymentDiscountTermsWithCreate();

        $this->assertInstanceOf(TradePaymentDiscountTermsType::class, $testValueForApplicableTradePaymentDiscountTerms);
        $this->assertSame($testValueForApplicableTradePaymentDiscountTerms, $model->getApplicableTradePaymentDiscountTerms());

        // Property PayeeTradeParty

        $testValue = new TradePartyType();
        $model->setPayeeTradeParty($testValue);

        $this->assertEquals($testValue, $model->getPayeeTradeParty());

        $model->unsetPayeeTradeParty();

        $this->assertNotInstanceOf(TradePartyType::class, $model->getPayeeTradeParty());

        $testValueForPayeeTradeParty = $model->getPayeeTradePartyWithCreate();

        $this->assertInstanceOf(TradePartyType::class, $testValueForPayeeTradeParty);
        $this->assertSame($testValueForPayeeTradeParty, $model->getPayeeTradeParty());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePriceType.
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

        $this->assertNotInstanceOf(AmountType::class, $model->getChargeAmount());

        $testValueForChargeAmount = $model->getChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForChargeAmount);
        $this->assertSame($testValueForChargeAmount, $model->getChargeAmount());

        // Property BasisQuantity

        $testValue = new QuantityType();
        $model->setBasisQuantity($testValue);

        $this->assertEquals($testValue, $model->getBasisQuantity());

        $model->unsetBasisQuantity();

        $this->assertNotInstanceOf(QuantityType::class, $model->getBasisQuantity());

        $testValueForBasisQuantity = $model->getBasisQuantityWithCreate();

        $this->assertInstanceOf(QuantityType::class, $testValueForBasisQuantity);
        $this->assertSame($testValueForBasisQuantity, $model->getBasisQuantity());

        // (1) Property AppliedTradeAllowanceCharge - Test set empty array

        $appliedTradeAllowanceChargeItems = [];
        $model->setAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItems);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertCount(0, $model->getAppliedTradeAllowanceCharge());

        // (2) Property AppliedTradeAllowanceCharge - Add instance

        $appliedTradeAllowanceChargeItem = new TradeAllowanceChargeType();
        $model->addToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeItem);

        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertCount(1, $model->getAppliedTradeAllowanceCharge());

        // (3) Property AppliedTradeAllowanceCharge - Add and create instancc

        $testValueForAppliedTradeAllowanceChargeItem = $model->addToAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $testValueForAppliedTradeAllowanceChargeItem);
        $this->assertIsArray($model->getAppliedTradeAllowanceCharge());
        $this->assertCount(2, $model->getAppliedTradeAllowanceCharge());

        // (4) Property AppliedTradeAllowanceCharge - Add once an instance

        $appliedTradeAllowanceChargeOnceItem = new TradeAllowanceChargeType();

        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);
        $model->addOnceToAppliedTradeAllowanceCharge($appliedTradeAllowanceChargeOnceItem);

        $itemsAfterOnce = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property AppliedTradeAllowanceCharge - Add once an instance with implicit creation

        $firstAppliedTradeAllowanceChargeOnceItem = $model->addOnceToAppliedTradeAllowanceChargeWithCreate();

        $this->assertInstanceOf(TradeAllowanceChargeType::class, $firstAppliedTradeAllowanceChargeOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property AppliedTradeAllowanceCharge - Add once an instance with implicit creation (2)

        $secondAppliedTradeAllowanceChargeOnceItem = $model->addOnceToAppliedTradeAllowanceChargeWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstAppliedTradeAllowanceChargeOnceItem, $secondAppliedTradeAllowanceChargeOnceItem);

        // (7) Property AppliedTradeAllowanceCharge - Clesr

        $model->clearAppliedTradeAllowanceCharge();

        $itemsAfterClear = $model->getAppliedTradeAllowanceCharge();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property IncludedTradeTax

        $testValue = new TradeTaxType();
        $model->setIncludedTradeTax($testValue);

        $this->assertEquals($testValue, $model->getIncludedTradeTax());

        $model->unsetIncludedTradeTax();

        $this->assertNotInstanceOf(TradeTaxType::class, $model->getIncludedTradeTax());

        $testValueForIncludedTradeTax = $model->getIncludedTradeTaxWithCreate();

        $this->assertInstanceOf(TradeTaxType::class, $testValueForIncludedTradeTax);
        $this->assertSame($testValueForIncludedTradeTax, $model->getIncludedTradeTax());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeProductInstanceType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getBatchID());

        $testValueForBatchID = $model->getBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBatchID);
        $this->assertSame($testValueForBatchID, $model->getBatchID());

        // Property SupplierAssignedSerialID

        $testValue = new IDType();
        $model->setSupplierAssignedSerialID($testValue);

        $this->assertEquals($testValue, $model->getSupplierAssignedSerialID());

        $model->unsetSupplierAssignedSerialID();

        $this->assertNotInstanceOf(IDType::class, $model->getSupplierAssignedSerialID());

        $testValueForSupplierAssignedSerialID = $model->getSupplierAssignedSerialIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForSupplierAssignedSerialID);
        $this->assertSame($testValueForSupplierAssignedSerialID, $model->getSupplierAssignedSerialID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeProductType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property GlobalID

        $testValue = new IDType();
        $model->setGlobalID($testValue);

        $this->assertEquals($testValue, $model->getGlobalID());

        $model->unsetGlobalID();

        $this->assertNotInstanceOf(IDType::class, $model->getGlobalID());

        $testValueForGlobalID = $model->getGlobalIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForGlobalID);
        $this->assertSame($testValueForGlobalID, $model->getGlobalID());

        // Property SellerAssignedID

        $testValue = new IDType();
        $model->setSellerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getSellerAssignedID());

        $model->unsetSellerAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getSellerAssignedID());

        $testValueForSellerAssignedID = $model->getSellerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForSellerAssignedID);
        $this->assertSame($testValueForSellerAssignedID, $model->getSellerAssignedID());

        // Property BuyerAssignedID

        $testValue = new IDType();
        $model->setBuyerAssignedID($testValue);

        $this->assertEquals($testValue, $model->getBuyerAssignedID());

        $model->unsetBuyerAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getBuyerAssignedID());

        $testValueForBuyerAssignedID = $model->getBuyerAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBuyerAssignedID);
        $this->assertSame($testValueForBuyerAssignedID, $model->getBuyerAssignedID());

        // Property IndustryAssignedID

        $testValue = new IDType();
        $model->setIndustryAssignedID($testValue);

        $this->assertEquals($testValue, $model->getIndustryAssignedID());

        $model->unsetIndustryAssignedID();

        $this->assertNotInstanceOf(IDType::class, $model->getIndustryAssignedID());

        $testValueForIndustryAssignedID = $model->getIndustryAssignedIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForIndustryAssignedID);
        $this->assertSame($testValueForIndustryAssignedID, $model->getIndustryAssignedID());

        // Property ModelID

        $testValue = new IDType();
        $model->setModelID($testValue);

        $this->assertEquals($testValue, $model->getModelID());

        $model->unsetModelID();

        $this->assertNotInstanceOf(IDType::class, $model->getModelID());

        $testValueForModelID = $model->getModelIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForModelID);
        $this->assertSame($testValueForModelID, $model->getModelID());

        // Property Name

        $testValue = new TextType();
        $model->setName($testValue);

        $this->assertEquals($testValue, $model->getName());

        $model->unsetName();

        $this->assertNotInstanceOf(TextType::class, $model->getName());

        $testValueForName = $model->getNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForName);
        $this->assertSame($testValueForName, $model->getName());

        // Property Description

        $testValue = new TextType();
        $model->setDescription($testValue);

        $this->assertEquals($testValue, $model->getDescription());

        $model->unsetDescription();

        $this->assertNotInstanceOf(TextType::class, $model->getDescription());

        $testValueForDescription = $model->getDescriptionWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForDescription);
        $this->assertSame($testValueForDescription, $model->getDescription());

        // (1) Property BatchID - Test set empty array

        $batchIDItems = [];
        $model->setBatchID($batchIDItems);

        $this->assertIsArray($model->getBatchID());
        $this->assertCount(0, $model->getBatchID());

        // (2) Property BatchID - Add instance

        $batchIDItem = new IDType();
        $model->addToBatchID($batchIDItem);

        $this->assertIsArray($model->getBatchID());
        $this->assertCount(1, $model->getBatchID());

        // (3) Property BatchID - Add and create instancc

        $testValueForBatchIDItem = $model->addToBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForBatchIDItem);
        $this->assertIsArray($model->getBatchID());
        $this->assertCount(2, $model->getBatchID());

        // (4) Property BatchID - Add once an instance

        $batchIDOnceItem = new IDType();

        $model->addOnceToBatchID($batchIDOnceItem);
        $model->addOnceToBatchID($batchIDOnceItem);

        $itemsAfterOnce = $model->getBatchID();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property BatchID - Add once an instance with implicit creation

        $firstBatchIDOnceItem = $model->addOnceToBatchIDWithCreate();

        $this->assertInstanceOf(IDType::class, $firstBatchIDOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getBatchID();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property BatchID - Add once an instance with implicit creation (2)

        $secondBatchIDOnceItem = $model->addOnceToBatchIDWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstBatchIDOnceItem, $secondBatchIDOnceItem);

        // (7) Property BatchID - Clesr

        $model->clearBatchID();

        $itemsAfterClear = $model->getBatchID();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property BrandName

        $testValue = new TextType();
        $model->setBrandName($testValue);

        $this->assertEquals($testValue, $model->getBrandName());

        $model->unsetBrandName();

        $this->assertNotInstanceOf(TextType::class, $model->getBrandName());

        $testValueForBrandName = $model->getBrandNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForBrandName);
        $this->assertSame($testValueForBrandName, $model->getBrandName());

        // Property ModelName

        $testValue = new TextType();
        $model->setModelName($testValue);

        $this->assertEquals($testValue, $model->getModelName());

        $model->unsetModelName();

        $this->assertNotInstanceOf(TextType::class, $model->getModelName());

        $testValueForModelName = $model->getModelNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForModelName);
        $this->assertSame($testValueForModelName, $model->getModelName());

        // (1) Property ApplicableProductCharacteristic - Test set empty array

        $applicableProductCharacteristicItems = [];
        $model->setApplicableProductCharacteristic($applicableProductCharacteristicItems);

        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertCount(0, $model->getApplicableProductCharacteristic());

        // (2) Property ApplicableProductCharacteristic - Add instance

        $applicableProductCharacteristicItem = new ProductCharacteristicType();
        $model->addToApplicableProductCharacteristic($applicableProductCharacteristicItem);

        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertCount(1, $model->getApplicableProductCharacteristic());

        // (3) Property ApplicableProductCharacteristic - Add and create instancc

        $testValueForApplicableProductCharacteristicItem = $model->addToApplicableProductCharacteristicWithCreate();

        $this->assertInstanceOf(ProductCharacteristicType::class, $testValueForApplicableProductCharacteristicItem);
        $this->assertIsArray($model->getApplicableProductCharacteristic());
        $this->assertCount(2, $model->getApplicableProductCharacteristic());

        // (4) Property ApplicableProductCharacteristic - Add once an instance

        $applicableProductCharacteristicOnceItem = new ProductCharacteristicType();

        $model->addOnceToApplicableProductCharacteristic($applicableProductCharacteristicOnceItem);
        $model->addOnceToApplicableProductCharacteristic($applicableProductCharacteristicOnceItem);

        $itemsAfterOnce = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property ApplicableProductCharacteristic - Add once an instance with implicit creation

        $firstApplicableProductCharacteristicOnceItem = $model->addOnceToApplicableProductCharacteristicWithCreate();

        $this->assertInstanceOf(ProductCharacteristicType::class, $firstApplicableProductCharacteristicOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property ApplicableProductCharacteristic - Add once an instance with implicit creation (2)

        $secondApplicableProductCharacteristicOnceItem = $model->addOnceToApplicableProductCharacteristicWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstApplicableProductCharacteristicOnceItem, $secondApplicableProductCharacteristicOnceItem);

        // (7) Property ApplicableProductCharacteristic - Clesr

        $model->clearApplicableProductCharacteristic();

        $itemsAfterClear = $model->getApplicableProductCharacteristic();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property DesignatedProductClassification - Test set empty array

        $designatedProductClassificationItems = [];
        $model->setDesignatedProductClassification($designatedProductClassificationItems);

        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertCount(0, $model->getDesignatedProductClassification());

        // (2) Property DesignatedProductClassification - Add instance

        $designatedProductClassificationItem = new ProductClassificationType();
        $model->addToDesignatedProductClassification($designatedProductClassificationItem);

        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertCount(1, $model->getDesignatedProductClassification());

        // (3) Property DesignatedProductClassification - Add and create instancc

        $testValueForDesignatedProductClassificationItem = $model->addToDesignatedProductClassificationWithCreate();

        $this->assertInstanceOf(ProductClassificationType::class, $testValueForDesignatedProductClassificationItem);
        $this->assertIsArray($model->getDesignatedProductClassification());
        $this->assertCount(2, $model->getDesignatedProductClassification());

        // (4) Property DesignatedProductClassification - Add once an instance

        $designatedProductClassificationOnceItem = new ProductClassificationType();

        $model->addOnceToDesignatedProductClassification($designatedProductClassificationOnceItem);
        $model->addOnceToDesignatedProductClassification($designatedProductClassificationOnceItem);

        $itemsAfterOnce = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property DesignatedProductClassification - Add once an instance with implicit creation

        $firstDesignatedProductClassificationOnceItem = $model->addOnceToDesignatedProductClassificationWithCreate();

        $this->assertInstanceOf(ProductClassificationType::class, $firstDesignatedProductClassificationOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property DesignatedProductClassification - Add once an instance with implicit creation (2)

        $secondDesignatedProductClassificationOnceItem = $model->addOnceToDesignatedProductClassificationWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstDesignatedProductClassificationOnceItem, $secondDesignatedProductClassificationOnceItem);

        // (7) Property DesignatedProductClassification - Clesr

        $model->clearDesignatedProductClassification();

        $itemsAfterClear = $model->getDesignatedProductClassification();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // (1) Property IndividualTradeProductInstance - Test set empty array

        $individualTradeProductInstanceItems = [];
        $model->setIndividualTradeProductInstance($individualTradeProductInstanceItems);

        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertCount(0, $model->getIndividualTradeProductInstance());

        // (2) Property IndividualTradeProductInstance - Add instance

        $individualTradeProductInstanceItem = new TradeProductInstanceType();
        $model->addToIndividualTradeProductInstance($individualTradeProductInstanceItem);

        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertCount(1, $model->getIndividualTradeProductInstance());

        // (3) Property IndividualTradeProductInstance - Add and create instancc

        $testValueForIndividualTradeProductInstanceItem = $model->addToIndividualTradeProductInstanceWithCreate();

        $this->assertInstanceOf(TradeProductInstanceType::class, $testValueForIndividualTradeProductInstanceItem);
        $this->assertIsArray($model->getIndividualTradeProductInstance());
        $this->assertCount(2, $model->getIndividualTradeProductInstance());

        // (4) Property IndividualTradeProductInstance - Add once an instance

        $individualTradeProductInstanceOnceItem = new TradeProductInstanceType();

        $model->addOnceToIndividualTradeProductInstance($individualTradeProductInstanceOnceItem);
        $model->addOnceToIndividualTradeProductInstance($individualTradeProductInstanceOnceItem);

        $itemsAfterOnce = $model->getIndividualTradeProductInstance();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IndividualTradeProductInstance - Add once an instance with implicit creation

        $firstIndividualTradeProductInstanceOnceItem = $model->addOnceToIndividualTradeProductInstanceWithCreate();

        $this->assertInstanceOf(TradeProductInstanceType::class, $firstIndividualTradeProductInstanceOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIndividualTradeProductInstance();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IndividualTradeProductInstance - Add once an instance with implicit creation (2)

        $secondIndividualTradeProductInstanceOnceItem = $model->addOnceToIndividualTradeProductInstanceWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIndividualTradeProductInstanceOnceItem, $secondIndividualTradeProductInstanceOnceItem);

        // (7) Property IndividualTradeProductInstance - Clesr

        $model->clearIndividualTradeProductInstance();

        $itemsAfterClear = $model->getIndividualTradeProductInstance();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property OriginTradeCountry

        $testValue = new TradeCountryType();
        $model->setOriginTradeCountry($testValue);

        $this->assertEquals($testValue, $model->getOriginTradeCountry());

        $model->unsetOriginTradeCountry();

        $this->assertNotInstanceOf(TradeCountryType::class, $model->getOriginTradeCountry());

        $testValueForOriginTradeCountry = $model->getOriginTradeCountryWithCreate();

        $this->assertInstanceOf(TradeCountryType::class, $testValueForOriginTradeCountry);
        $this->assertSame($testValueForOriginTradeCountry, $model->getOriginTradeCountry());

        // (1) Property IncludedReferencedProduct - Test set empty array

        $includedReferencedProductItems = [];
        $model->setIncludedReferencedProduct($includedReferencedProductItems);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertCount(0, $model->getIncludedReferencedProduct());

        // (2) Property IncludedReferencedProduct - Add instance

        $includedReferencedProductItem = new ReferencedProductType();
        $model->addToIncludedReferencedProduct($includedReferencedProductItem);

        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertCount(1, $model->getIncludedReferencedProduct());

        // (3) Property IncludedReferencedProduct - Add and create instancc

        $testValueForIncludedReferencedProductItem = $model->addToIncludedReferencedProductWithCreate();

        $this->assertInstanceOf(ReferencedProductType::class, $testValueForIncludedReferencedProductItem);
        $this->assertIsArray($model->getIncludedReferencedProduct());
        $this->assertCount(2, $model->getIncludedReferencedProduct());

        // (4) Property IncludedReferencedProduct - Add once an instance

        $includedReferencedProductOnceItem = new ReferencedProductType();

        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);
        $model->addOnceToIncludedReferencedProduct($includedReferencedProductOnceItem);

        $itemsAfterOnce = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property IncludedReferencedProduct - Add once an instance with implicit creation

        $firstIncludedReferencedProductOnceItem = $model->addOnceToIncludedReferencedProductWithCreate();

        $this->assertInstanceOf(ReferencedProductType::class, $firstIncludedReferencedProductOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property IncludedReferencedProduct - Add once an instance with implicit creation (2)

        $secondIncludedReferencedProductOnceItem = $model->addOnceToIncludedReferencedProductWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstIncludedReferencedProductOnceItem, $secondIncludedReferencedProductOnceItem);

        // (7) Property IncludedReferencedProduct - Clesr

        $model->clearIncludedReferencedProduct();

        $itemsAfterClear = $model->getIncludedReferencedProduct();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementFinancialCardType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getID());

        $testValueForID = $model->getIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForID);
        $this->assertSame($testValueForID, $model->getID());

        // Property CardholderName

        $testValue = new TextType();
        $model->setCardholderName($testValue);

        $this->assertEquals($testValue, $model->getCardholderName());

        $model->unsetCardholderName();

        $this->assertNotInstanceOf(TextType::class, $model->getCardholderName());

        $testValueForCardholderName = $model->getCardholderNameWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCardholderName);
        $this->assertSame($testValueForCardholderName, $model->getCardholderName());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementHeaderMonetarySummationType.
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

        $this->assertNotInstanceOf(AmountType::class, $model->getLineTotalAmount());

        $testValueForLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalAmount);
        $this->assertSame($testValueForLineTotalAmount, $model->getLineTotalAmount());

        // Property ChargeTotalAmount

        $testValue = new AmountType();
        $model->setChargeTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getChargeTotalAmount());

        $model->unsetChargeTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getChargeTotalAmount());

        $testValueForChargeTotalAmount = $model->getChargeTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForChargeTotalAmount);
        $this->assertSame($testValueForChargeTotalAmount, $model->getChargeTotalAmount());

        // Property AllowanceTotalAmount

        $testValue = new AmountType();
        $model->setAllowanceTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceTotalAmount());

        $model->unsetAllowanceTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getAllowanceTotalAmount());

        $testValueForAllowanceTotalAmount = $model->getAllowanceTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAllowanceTotalAmount);
        $this->assertSame($testValueForAllowanceTotalAmount, $model->getAllowanceTotalAmount());

        // Property TaxBasisTotalAmount

        $testValue = new AmountType();
        $model->setTaxBasisTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxBasisTotalAmount());

        $model->unsetTaxBasisTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getTaxBasisTotalAmount());

        $testValueForTaxBasisTotalAmount = $model->getTaxBasisTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxBasisTotalAmount);
        $this->assertSame($testValueForTaxBasisTotalAmount, $model->getTaxBasisTotalAmount());

        // (1) Property TaxTotalAmount - Test set empty array

        $taxTotalAmountItems = [];
        $model->setTaxTotalAmount($taxTotalAmountItems);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertCount(0, $model->getTaxTotalAmount());

        // (2) Property TaxTotalAmount - Add instance

        $taxTotalAmountItem = new AmountType();
        $model->addToTaxTotalAmount($taxTotalAmountItem);

        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertCount(1, $model->getTaxTotalAmount());

        // (3) Property TaxTotalAmount - Add and create instancc

        $testValueForTaxTotalAmountItem = $model->addToTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxTotalAmountItem);
        $this->assertIsArray($model->getTaxTotalAmount());
        $this->assertCount(2, $model->getTaxTotalAmount());

        // (4) Property TaxTotalAmount - Add once an instance

        $taxTotalAmountOnceItem = new AmountType();

        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);
        $model->addOnceToTaxTotalAmount($taxTotalAmountOnceItem);

        $itemsAfterOnce = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterOnce);
        $this->assertCount(2, $itemsAfterOnce);

        // (5) Property TaxTotalAmount - Add once an instance with implicit creation

        $firstTaxTotalAmountOnceItem = $model->addOnceToTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $firstTaxTotalAmountOnceItem);

        $itemsAfterFirstOnceWithCreate = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);

        // (5) Property TaxTotalAmount - Add once an instance with implicit creation (2)

        $secondTaxTotalAmountOnceItem = $model->addOnceToTaxTotalAmountWithCreate();

        $this->assertIsArray($itemsAfterFirstOnceWithCreate);
        $this->assertCount(2, $itemsAfterFirstOnceWithCreate);
        $this->assertSame($firstTaxTotalAmountOnceItem, $secondTaxTotalAmountOnceItem);

        // (7) Property TaxTotalAmount - Clesr

        $model->clearTaxTotalAmount();

        $itemsAfterClear = $model->getTaxTotalAmount();

        $this->assertIsArray($itemsAfterClear);
        $this->assertCount(0, $itemsAfterClear);

        // Property RoundingAmount

        $testValue = new AmountType();
        $model->setRoundingAmount($testValue);

        $this->assertEquals($testValue, $model->getRoundingAmount());

        $model->unsetRoundingAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getRoundingAmount());

        $testValueForRoundingAmount = $model->getRoundingAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForRoundingAmount);
        $this->assertSame($testValueForRoundingAmount, $model->getRoundingAmount());

        // Property GrandTotalAmount

        $testValue = new AmountType();
        $model->setGrandTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getGrandTotalAmount());

        $model->unsetGrandTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getGrandTotalAmount());

        $testValueForGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForGrandTotalAmount);
        $this->assertSame($testValueForGrandTotalAmount, $model->getGrandTotalAmount());

        // Property TotalPrepaidAmount

        $testValue = new AmountType();
        $model->setTotalPrepaidAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalPrepaidAmount());

        $model->unsetTotalPrepaidAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getTotalPrepaidAmount());

        $testValueForTotalPrepaidAmount = $model->getTotalPrepaidAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTotalPrepaidAmount);
        $this->assertSame($testValueForTotalPrepaidAmount, $model->getTotalPrepaidAmount());

        // Property DuePayableAmount

        $testValue = new AmountType();
        $model->setDuePayableAmount($testValue);

        $this->assertEquals($testValue, $model->getDuePayableAmount());

        $model->unsetDuePayableAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getDuePayableAmount());

        $testValueForDuePayableAmount = $model->getDuePayableAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForDuePayableAmount);
        $this->assertSame($testValueForDuePayableAmount, $model->getDuePayableAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementLineMonetarySummationType.
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

        $this->assertNotInstanceOf(AmountType::class, $model->getLineTotalAmount());

        $testValueForLineTotalAmount = $model->getLineTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalAmount);
        $this->assertSame($testValueForLineTotalAmount, $model->getLineTotalAmount());

        // Property ChargeTotalAmount

        $testValue = new AmountType();
        $model->setChargeTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getChargeTotalAmount());

        $model->unsetChargeTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getChargeTotalAmount());

        $testValueForChargeTotalAmount = $model->getChargeTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForChargeTotalAmount);
        $this->assertSame($testValueForChargeTotalAmount, $model->getChargeTotalAmount());

        // Property AllowanceTotalAmount

        $testValue = new AmountType();
        $model->setAllowanceTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceTotalAmount());

        $model->unsetAllowanceTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getAllowanceTotalAmount());

        $testValueForAllowanceTotalAmount = $model->getAllowanceTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAllowanceTotalAmount);
        $this->assertSame($testValueForAllowanceTotalAmount, $model->getAllowanceTotalAmount());

        // Property TaxTotalAmount

        $testValue = new AmountType();
        $model->setTaxTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getTaxTotalAmount());

        $model->unsetTaxTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getTaxTotalAmount());

        $testValueForTaxTotalAmount = $model->getTaxTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTaxTotalAmount);
        $this->assertSame($testValueForTaxTotalAmount, $model->getTaxTotalAmount());

        // Property GrandTotalAmount

        $testValue = new AmountType();
        $model->setGrandTotalAmount($testValue);

        $this->assertEquals($testValue, $model->getGrandTotalAmount());

        $model->unsetGrandTotalAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getGrandTotalAmount());

        $testValueForGrandTotalAmount = $model->getGrandTotalAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForGrandTotalAmount);
        $this->assertSame($testValueForGrandTotalAmount, $model->getGrandTotalAmount());

        // Property TotalAllowanceChargeAmount

        $testValue = new AmountType();
        $model->setTotalAllowanceChargeAmount($testValue);

        $this->assertEquals($testValue, $model->getTotalAllowanceChargeAmount());

        $model->unsetTotalAllowanceChargeAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getTotalAllowanceChargeAmount());

        $testValueForTotalAllowanceChargeAmount = $model->getTotalAllowanceChargeAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForTotalAllowanceChargeAmount);
        $this->assertSame($testValueForTotalAllowanceChargeAmount, $model->getTotalAllowanceChargeAmount());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementPaymentMeansType.
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

        $this->assertNotInstanceOf(PaymentMeansCodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(PaymentMeansCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property Information

        $testValue = new TextType();
        $model->setInformation($testValue);

        $this->assertEquals($testValue, $model->getInformation());

        $model->unsetInformation();

        $this->assertNotInstanceOf(TextType::class, $model->getInformation());

        $testValueForInformation = $model->getInformationWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForInformation);
        $this->assertSame($testValueForInformation, $model->getInformation());

        // Property ApplicableTradeSettlementFinancialCard

        $testValue = new TradeSettlementFinancialCardType();
        $model->setApplicableTradeSettlementFinancialCard($testValue);

        $this->assertEquals($testValue, $model->getApplicableTradeSettlementFinancialCard());

        $model->unsetApplicableTradeSettlementFinancialCard();

        $this->assertNotInstanceOf(TradeSettlementFinancialCardType::class, $model->getApplicableTradeSettlementFinancialCard());

        $testValueForApplicableTradeSettlementFinancialCard = $model->getApplicableTradeSettlementFinancialCardWithCreate();

        $this->assertInstanceOf(TradeSettlementFinancialCardType::class, $testValueForApplicableTradeSettlementFinancialCard);
        $this->assertSame($testValueForApplicableTradeSettlementFinancialCard, $model->getApplicableTradeSettlementFinancialCard());

        // Property PayerPartyDebtorFinancialAccount

        $testValue = new DebtorFinancialAccountType();
        $model->setPayerPartyDebtorFinancialAccount($testValue);

        $this->assertEquals($testValue, $model->getPayerPartyDebtorFinancialAccount());

        $model->unsetPayerPartyDebtorFinancialAccount();

        $this->assertNotInstanceOf(DebtorFinancialAccountType::class, $model->getPayerPartyDebtorFinancialAccount());

        $testValueForPayerPartyDebtorFinancialAccount = $model->getPayerPartyDebtorFinancialAccountWithCreate();

        $this->assertInstanceOf(DebtorFinancialAccountType::class, $testValueForPayerPartyDebtorFinancialAccount);
        $this->assertSame($testValueForPayerPartyDebtorFinancialAccount, $model->getPayerPartyDebtorFinancialAccount());

        // Property PayeePartyCreditorFinancialAccount

        $testValue = new CreditorFinancialAccountType();
        $model->setPayeePartyCreditorFinancialAccount($testValue);

        $this->assertEquals($testValue, $model->getPayeePartyCreditorFinancialAccount());

        $model->unsetPayeePartyCreditorFinancialAccount();

        $this->assertNotInstanceOf(CreditorFinancialAccountType::class, $model->getPayeePartyCreditorFinancialAccount());

        $testValueForPayeePartyCreditorFinancialAccount = $model->getPayeePartyCreditorFinancialAccountWithCreate();

        $this->assertInstanceOf(CreditorFinancialAccountType::class, $testValueForPayeePartyCreditorFinancialAccount);
        $this->assertSame($testValueForPayeePartyCreditorFinancialAccount, $model->getPayeePartyCreditorFinancialAccount());

        // Property PayeeSpecifiedCreditorFinancialInstitution

        $testValue = new CreditorFinancialInstitutionType();
        $model->setPayeeSpecifiedCreditorFinancialInstitution($testValue);

        $this->assertEquals($testValue, $model->getPayeeSpecifiedCreditorFinancialInstitution());

        $model->unsetPayeeSpecifiedCreditorFinancialInstitution();

        $this->assertNotInstanceOf(CreditorFinancialInstitutionType::class, $model->getPayeeSpecifiedCreditorFinancialInstitution());

        $testValueForPayeeSpecifiedCreditorFinancialInstitution = $model->getPayeeSpecifiedCreditorFinancialInstitutionWithCreate();

        $this->assertInstanceOf(CreditorFinancialInstitutionType::class, $testValueForPayeeSpecifiedCreditorFinancialInstitution);
        $this->assertSame($testValueForPayeeSpecifiedCreditorFinancialInstitution, $model->getPayeeSpecifiedCreditorFinancialInstitution());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType.
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

        $this->assertNotInstanceOf(AmountType::class, $model->getCalculatedAmount());

        $testValueForCalculatedAmount = $model->getCalculatedAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForCalculatedAmount);
        $this->assertSame($testValueForCalculatedAmount, $model->getCalculatedAmount());

        // Property TypeCode

        $testValue = new TaxTypeCodeType();
        $model->setTypeCode($testValue);

        $this->assertEquals($testValue, $model->getTypeCode());

        $model->unsetTypeCode();

        $this->assertNotInstanceOf(TaxTypeCodeType::class, $model->getTypeCode());

        $testValueForTypeCode = $model->getTypeCodeWithCreate();

        $this->assertInstanceOf(TaxTypeCodeType::class, $testValueForTypeCode);
        $this->assertSame($testValueForTypeCode, $model->getTypeCode());

        // Property ExemptionReason

        $testValue = new TextType();
        $model->setExemptionReason($testValue);

        $this->assertEquals($testValue, $model->getExemptionReason());

        $model->unsetExemptionReason();

        $this->assertNotInstanceOf(TextType::class, $model->getExemptionReason());

        $testValueForExemptionReason = $model->getExemptionReasonWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForExemptionReason);
        $this->assertSame($testValueForExemptionReason, $model->getExemptionReason());

        // Property BasisAmount

        $testValue = new AmountType();
        $model->setBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getBasisAmount());

        $model->unsetBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getBasisAmount());

        $testValueForBasisAmount = $model->getBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForBasisAmount);
        $this->assertSame($testValueForBasisAmount, $model->getBasisAmount());

        // Property LineTotalBasisAmount

        $testValue = new AmountType();
        $model->setLineTotalBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getLineTotalBasisAmount());

        $model->unsetLineTotalBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getLineTotalBasisAmount());

        $testValueForLineTotalBasisAmount = $model->getLineTotalBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForLineTotalBasisAmount);
        $this->assertSame($testValueForLineTotalBasisAmount, $model->getLineTotalBasisAmount());

        // Property AllowanceChargeBasisAmount

        $testValue = new AmountType();
        $model->setAllowanceChargeBasisAmount($testValue);

        $this->assertEquals($testValue, $model->getAllowanceChargeBasisAmount());

        $model->unsetAllowanceChargeBasisAmount();

        $this->assertNotInstanceOf(AmountType::class, $model->getAllowanceChargeBasisAmount());

        $testValueForAllowanceChargeBasisAmount = $model->getAllowanceChargeBasisAmountWithCreate();

        $this->assertInstanceOf(AmountType::class, $testValueForAllowanceChargeBasisAmount);
        $this->assertSame($testValueForAllowanceChargeBasisAmount, $model->getAllowanceChargeBasisAmount());

        // Property CategoryCode

        $testValue = new TaxCategoryCodeType();
        $model->setCategoryCode($testValue);

        $this->assertEquals($testValue, $model->getCategoryCode());

        $model->unsetCategoryCode();

        $this->assertNotInstanceOf(TaxCategoryCodeType::class, $model->getCategoryCode());

        $testValueForCategoryCode = $model->getCategoryCodeWithCreate();

        $this->assertInstanceOf(TaxCategoryCodeType::class, $testValueForCategoryCode);
        $this->assertSame($testValueForCategoryCode, $model->getCategoryCode());

        // Property ExemptionReasonCode

        $testValue = new CodeType();
        $model->setExemptionReasonCode($testValue);

        $this->assertEquals($testValue, $model->getExemptionReasonCode());

        $model->unsetExemptionReasonCode();

        $this->assertNotInstanceOf(CodeType::class, $model->getExemptionReasonCode());

        $testValueForExemptionReasonCode = $model->getExemptionReasonCodeWithCreate();

        $this->assertInstanceOf(CodeType::class, $testValueForExemptionReasonCode);
        $this->assertSame($testValueForExemptionReasonCode, $model->getExemptionReasonCode());

        // Property TaxPointDate

        $testValue = new DateType();
        $model->setTaxPointDate($testValue);

        $this->assertEquals($testValue, $model->getTaxPointDate());

        $model->unsetTaxPointDate();

        $this->assertNotInstanceOf(DateType::class, $model->getTaxPointDate());

        $testValueForTaxPointDate = $model->getTaxPointDateWithCreate();

        $this->assertInstanceOf(DateType::class, $testValueForTaxPointDate);
        $this->assertSame($testValueForTaxPointDate, $model->getTaxPointDate());

        // Property DueDateTypeCode

        $testValue = new TimeReferenceCodeType();
        $model->setDueDateTypeCode($testValue);

        $this->assertEquals($testValue, $model->getDueDateTypeCode());

        $model->unsetDueDateTypeCode();

        $this->assertNotInstanceOf(TimeReferenceCodeType::class, $model->getDueDateTypeCode());

        $testValueForDueDateTypeCode = $model->getDueDateTypeCodeWithCreate();

        $this->assertInstanceOf(TimeReferenceCodeType::class, $testValueForDueDateTypeCode);
        $this->assertSame($testValueForDueDateTypeCode, $model->getDueDateTypeCode());

        // Property RateApplicablePercent

        $testValue = new PercentType();
        $model->setRateApplicablePercent($testValue);

        $this->assertEquals($testValue, $model->getRateApplicablePercent());

        $model->unsetRateApplicablePercent();

        $this->assertNotInstanceOf(PercentType::class, $model->getRateApplicablePercent());

        $testValueForRateApplicablePercent = $model->getRateApplicablePercentWithCreate();

        $this->assertInstanceOf(PercentType::class, $testValueForRateApplicablePercent);
        $this->assertSame($testValueForRateApplicablePercent, $model->getRateApplicablePercent());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType.
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

        $this->assertNotInstanceOf(IDType::class, $model->getURIID());

        $testValueForURIID = $model->getURIIDWithCreate();

        $this->assertInstanceOf(IDType::class, $testValueForURIID);
        $this->assertSame($testValueForURIID, $model->getURIID());

        // Property CompleteNumber

        $testValue = new TextType();
        $model->setCompleteNumber($testValue);

        $this->assertEquals($testValue, $model->getCompleteNumber());

        $model->unsetCompleteNumber();

        $this->assertNotInstanceOf(TextType::class, $model->getCompleteNumber());

        $testValueForCompleteNumber = $model->getCompleteNumberWithCreate();

        $this->assertInstanceOf(TextType::class, $testValueForCompleteNumber);
        $this->assertSame($testValueForCompleteNumber, $model->getCompleteNumber());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoice.
     */
    public function testModelsZffxextendedRsmCrossIndustryInvoice(): void
    {
        $model = new CrossIndustryInvoice();

        $this->assertInstanceOf(CrossIndustryInvoice::class, $model);
        $this->assertInstanceOf(CrossIndustryInvoiceType::class, $model);
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoiceType.
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

        $this->assertNotInstanceOf(ExchangedDocumentContextType::class, $model->getExchangedDocumentContext());

        $testValueForExchangedDocumentContext = $model->getExchangedDocumentContextWithCreate();

        $this->assertInstanceOf(ExchangedDocumentContextType::class, $testValueForExchangedDocumentContext);
        $this->assertSame($testValueForExchangedDocumentContext, $model->getExchangedDocumentContext());

        // Property ExchangedDocument

        $testValue = new ExchangedDocumentType();
        $model->setExchangedDocument($testValue);

        $this->assertEquals($testValue, $model->getExchangedDocument());

        $model->unsetExchangedDocument();

        $this->assertNotInstanceOf(ExchangedDocumentType::class, $model->getExchangedDocument());

        $testValueForExchangedDocument = $model->getExchangedDocumentWithCreate();

        $this->assertInstanceOf(ExchangedDocumentType::class, $testValueForExchangedDocument);
        $this->assertSame($testValueForExchangedDocument, $model->getExchangedDocument());

        // Property SupplyChainTradeTransaction

        $testValue = new SupplyChainTradeTransactionType();
        $model->setSupplyChainTradeTransaction($testValue);

        $this->assertEquals($testValue, $model->getSupplyChainTradeTransaction());

        $model->unsetSupplyChainTradeTransaction();

        $this->assertNotInstanceOf(SupplyChainTradeTransactionType::class, $model->getSupplyChainTradeTransaction());

        $testValueForSupplyChainTradeTransaction = $model->getSupplyChainTradeTransactionWithCreate();

        $this->assertInstanceOf(SupplyChainTradeTransactionType::class, $testValueForSupplyChainTradeTransaction);
        $this->assertSame($testValueForSupplyChainTradeTransaction, $model->getSupplyChainTradeTransaction());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType.
     */
    public function testModelsZffxextendedUdtAmountType(): void
    {
        $model = new AmountType();

        $this->assertInstanceOf(AmountType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property CurrencyID

        $testValue = 'dummy-CurrencyIDValue';
        $model->setCurrencyID($testValue);

        $this->assertSame($testValue, $model->getCurrencyID());

        $model->unsetCurrencyID();

        $this->assertNull($model->getCurrencyID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\BinaryObjectType.
     */
    public function testModelsZffxextendedUdtBinaryObjectType(): void
    {
        $model = new BinaryObjectType();

        $this->assertInstanceOf(BinaryObjectType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property MimeCode

        $testValue = 'dummy-MimeCodeValue';
        $model->setMimeCode($testValue);

        $this->assertSame($testValue, $model->getMimeCode());

        $model->unsetMimeCode();

        $this->assertNull($model->getMimeCode());

        // Property Filename

        $testValue = 'dummy-FilenameValue';
        $model->setFilename($testValue);

        $this->assertSame($testValue, $model->getFilename());

        $model->unsetFilename();

        $this->assertNull($model->getFilename());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType.
     */
    public function testModelsZffxextendedUdtCodeType(): void
    {
        $model = new CodeType();

        $this->assertInstanceOf(CodeType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property ListID

        $testValue = 'dummy-ListIDValue';
        $model->setListID($testValue);

        $this->assertSame($testValue, $model->getListID());

        $model->unsetListID();

        $this->assertNull($model->getListID());

        // Property ListVersionID

        $testValue = 'dummy-ListVersionIDValue';
        $model->setListVersionID($testValue);

        $this->assertSame($testValue, $model->getListVersionID());

        $model->unsetListVersionID();

        $this->assertNull($model->getListVersionID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType\DateTimeStringAType.
     */
    public function testModelsZffxextendedUdtDatetimetypeDateTimeStringAType(): void
    {
        $model = new DateTimeStringAType1();

        $this->assertInstanceOf(DateTimeStringAType1::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property Format

        $testValue = 'dummy-FormatValue';
        $model->setFormat($testValue);

        $this->assertSame($testValue, $model->getFormat());

        $model->unsetFormat();

        $this->assertNull($model->getFormat());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType.
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

        $this->assertNotInstanceOf(DateTimeStringAType1::class, $model->getDateTimeString());

        $testValueForDateTimeString = $model->getDateTimeStringWithCreate();

        $this->assertInstanceOf(DateTimeStringAType1::class, $testValueForDateTimeString);
        $this->assertSame($testValueForDateTimeString, $model->getDateTimeString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType\DateStringAType.
     */
    public function testModelsZffxextendedUdtDatetypeDateStringAType(): void
    {
        $model = new DateStringAType();

        $this->assertInstanceOf(DateStringAType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property Format

        $testValue = 'dummy-FormatValue';
        $model->setFormat($testValue);

        $this->assertSame($testValue, $model->getFormat());

        $model->unsetFormat();

        $this->assertNull($model->getFormat());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType.
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

        $this->assertNotInstanceOf(DateStringAType::class, $model->getDateString());

        $testValueForDateString = $model->getDateStringWithCreate();

        $this->assertInstanceOf(DateStringAType::class, $testValueForDateString);
        $this->assertSame($testValueForDateString, $model->getDateString());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType.
     */
    public function testModelsZffxextendedUdtIDType(): void
    {
        $model = new IDType();

        $this->assertInstanceOf(IDType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property SchemeID

        $testValue = 'dummy-SchemeIDValue';
        $model->setSchemeID($testValue);

        $this->assertSame($testValue, $model->getSchemeID());

        $model->unsetSchemeID();

        $this->assertNull($model->getSchemeID());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType.
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
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\MeasureType.
     */
    public function testModelsZffxextendedUdtMeasureType(): void
    {
        $model = new MeasureType();

        $this->assertInstanceOf(MeasureType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property UnitCode

        $testValue = 'dummy-UnitCodeValue';
        $model->setUnitCode($testValue);

        $this->assertSame($testValue, $model->getUnitCode());

        $model->unsetUnitCode();

        $this->assertNull($model->getUnitCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\NumericType.
     */
    public function testModelsZffxextendedUdtNumericType(): void
    {
        $model = new NumericType();

        $this->assertInstanceOf(NumericType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType.
     */
    public function testModelsZffxextendedUdtPercentType(): void
    {
        $model = new PercentType();

        $this->assertInstanceOf(PercentType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType.
     */
    public function testModelsZffxextendedUdtQuantityType(): void
    {
        $model = new QuantityType();

        $this->assertInstanceOf(QuantityType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());

        // Property UnitCode

        $testValue = 'dummy-UnitCodeValue';
        $model->setUnitCode($testValue);

        $this->assertSame($testValue, $model->getUnitCode());

        $model->unsetUnitCode();

        $this->assertNull($model->getUnitCode());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\RateType.
     */
    public function testModelsZffxextendedUdtRateType(): void
    {
        $model = new RateType();

        $this->assertInstanceOf(RateType::class, $model);

        // Property Value

        $testValue = 1.23;
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }

    /**
     * Tests methods of \horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType.
     */
    public function testModelsZffxextendedUdtTextType(): void
    {
        $model = new TextType();

        $this->assertInstanceOf(TextType::class, $model);

        // Property Value

        $testValue = 'dummy-ValueValue';
        $model->setValue($testValue);

        $this->assertSame($testValue, $model->getValue());

        $model->unsetValue();

        $this->assertNull($model->getValue());
    }
}
