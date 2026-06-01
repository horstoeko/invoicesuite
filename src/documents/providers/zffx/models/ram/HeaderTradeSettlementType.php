<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class HeaderTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getCreditorReferenceID', setter: 'setCreditorReferenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CreditorReferenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $creditorReferenceID;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getPaymentReference', setter: 'setPaymentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PaymentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $paymentReference;

    /**
     * @var null|CurrencyCodeType
     */
    #[JMS\Accessor(getter: 'getTaxCurrencyCode', setter: 'setTaxCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $taxCurrencyCode;

    /**
     * @var null|CurrencyCodeType
     */
    #[JMS\Accessor(getter: 'getInvoiceCurrencyCode', setter: 'setInvoiceCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $invoiceCurrencyCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getInvoiceIssuerReference', setter: 'setInvoiceIssuerReference')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceIssuerReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $invoiceIssuerReference;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getInvoicerTradeParty', setter: 'setInvoicerTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoicerTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $invoicerTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getInvoiceeTradeParty', setter: 'setInvoiceeTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceeTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $invoiceeTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getPayeeTradeParty', setter: 'setPayeeTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PayeeTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $payeeTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getPayerTradeParty', setter: 'setPayerTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PayerTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $payerTradeParty;

    /**
     * @var null|TradeCurrencyExchangeType
     */
    #[JMS\Accessor(getter: 'getTaxApplicableTradeCurrencyExchange', setter: 'setTaxApplicableTradeCurrencyExchange')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TaxApplicableTradeCurrencyExchange')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCurrencyExchangeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $taxApplicableTradeCurrencyExchange;

    /**
     * @var null|array<TradeSettlementPaymentMeansType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradeSettlementPaymentMeans', setter: 'setSpecifiedTradeSettlementPaymentMeans')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradeSettlementPaymentMeans')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementPaymentMeansType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedTradeSettlementPaymentMeans', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var null|array<TradeTaxType>
     */
    #[JMS\Accessor(getter: 'getApplicableTradeTax', setter: 'setApplicableTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableTradeTax')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ApplicableTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $applicableTradeTax;

    /**
     * @var null|SpecifiedPeriodType
     */
    #[JMS\Accessor(getter: 'getBillingSpecifiedPeriod', setter: 'setBillingSpecifiedPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BillingSpecifiedPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\SpecifiedPeriodType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $billingSpecifiedPeriod;

    /**
     * @var null|array<TradeAllowanceChargeType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradeAllowanceCharge', setter: 'setSpecifiedTradeAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradeAllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAllowanceChargeType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedTradeAllowanceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedTradeAllowanceCharge;

    /**
     * @var null|array<LogisticsServiceChargeType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedLogisticsServiceCharge', setter: 'setSpecifiedLogisticsServiceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedLogisticsServiceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsServiceChargeType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedLogisticsServiceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedLogisticsServiceCharge;

    /**
     * @var null|array<TradePaymentTermsType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradePaymentTerms', setter: 'setSpecifiedTradePaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradePaymentTerms')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentTermsType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedTradePaymentTerms', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedTradePaymentTerms;

    /**
     * @var null|TradeSettlementHeaderMonetarySummationType
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradeSettlementHeaderMonetarySummation', setter: 'setSpecifiedTradeSettlementHeaderMonetarySummation')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradeSettlementHeaderMonetarySummation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementHeaderMonetarySummationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @var null|array<ReferencedDocumentType>
     */
    #[JMS\Accessor(getter: 'getInvoiceReferencedDocument', setter: 'setInvoiceReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceReferencedDocument')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'InvoiceReferencedDocument', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $invoiceReferencedDocument;

    /**
     * @var null|array<TradeAccountingAccountType>
     */
    #[JMS\Accessor(getter: 'getReceivableSpecifiedTradeAccountingAccount', setter: 'setReceivableSpecifiedTradeAccountingAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ReceivableSpecifiedTradeAccountingAccount')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAccountingAccountType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReceivableSpecifiedTradeAccountingAccount', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @var null|array<AdvancePaymentType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedAdvancePayment', setter: 'setSpecifiedAdvancePayment')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedAdvancePayment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\AdvancePaymentType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedAdvancePayment', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedAdvancePayment;

    /**
     * @return null|IDType
     */
    public function getCreditorReferenceID(): ?IDType
    {
        return $this->creditorReferenceID;
    }

    /**
     * @return IDType
     */
    public function getCreditorReferenceIDWithCreate(): IDType
    {
        $this->creditorReferenceID ??= new IDType();

        return $this->creditorReferenceID;
    }

    /**
     * @param  null|IDType $creditorReferenceID
     * @return static
     */
    public function setCreditorReferenceID(
        ?IDType $creditorReferenceID = null
    ): static {
        $this->creditorReferenceID = $creditorReferenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCreditorReferenceID(): static
    {
        $this->creditorReferenceID = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getPaymentReference(): ?TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return TextType
     */
    public function getPaymentReferenceWithCreate(): TextType
    {
        $this->paymentReference ??= new TextType();

        return $this->paymentReference;
    }

    /**
     * @param  null|TextType $paymentReference
     * @return static
     */
    public function setPaymentReference(
        ?TextType $paymentReference = null
    ): static {
        $this->paymentReference = $paymentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentReference(): static
    {
        $this->paymentReference = null;

        return $this;
    }

    /**
     * @return null|CurrencyCodeType
     */
    public function getTaxCurrencyCode(): ?CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->taxCurrencyCode ??= new CurrencyCodeType();

        return $this->taxCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $taxCurrencyCode
     * @return static
     */
    public function setTaxCurrencyCode(
        ?CurrencyCodeType $taxCurrencyCode = null
    ): static {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxCurrencyCode(): static
    {
        $this->taxCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|CurrencyCodeType
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode ??= new CurrencyCodeType();

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $invoiceCurrencyCode
     * @return static
     */
    public function setInvoiceCurrencyCode(
        ?CurrencyCodeType $invoiceCurrencyCode = null
    ): static {
        $this->invoiceCurrencyCode = $invoiceCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceCurrencyCode(): static
    {
        $this->invoiceCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getInvoiceIssuerReference(): ?TextType
    {
        return $this->invoiceIssuerReference;
    }

    /**
     * @return TextType
     */
    public function getInvoiceIssuerReferenceWithCreate(): TextType
    {
        $this->invoiceIssuerReference ??= new TextType();

        return $this->invoiceIssuerReference;
    }

    /**
     * @param  null|TextType $invoiceIssuerReference
     * @return static
     */
    public function setInvoiceIssuerReference(
        ?TextType $invoiceIssuerReference = null
    ): static {
        $this->invoiceIssuerReference = $invoiceIssuerReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceIssuerReference(): static
    {
        $this->invoiceIssuerReference = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getInvoicerTradeParty(): ?TradePartyType
    {
        return $this->invoicerTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getInvoicerTradePartyWithCreate(): TradePartyType
    {
        $this->invoicerTradeParty ??= new TradePartyType();

        return $this->invoicerTradeParty;
    }

    /**
     * @param  null|TradePartyType $invoicerTradeParty
     * @return static
     */
    public function setInvoicerTradeParty(
        ?TradePartyType $invoicerTradeParty = null
    ): static {
        $this->invoicerTradeParty = $invoicerTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoicerTradeParty(): static
    {
        $this->invoicerTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getInvoiceeTradeParty(): ?TradePartyType
    {
        return $this->invoiceeTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getInvoiceeTradePartyWithCreate(): TradePartyType
    {
        $this->invoiceeTradeParty ??= new TradePartyType();

        return $this->invoiceeTradeParty;
    }

    /**
     * @param  null|TradePartyType $invoiceeTradeParty
     * @return static
     */
    public function setInvoiceeTradeParty(
        ?TradePartyType $invoiceeTradeParty = null
    ): static {
        $this->invoiceeTradeParty = $invoiceeTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceeTradeParty(): static
    {
        $this->invoiceeTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty ??= new TradePartyType();

        return $this->payeeTradeParty;
    }

    /**
     * @param  null|TradePartyType $payeeTradeParty
     * @return static
     */
    public function setPayeeTradeParty(
        ?TradePartyType $payeeTradeParty = null
    ): static {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayeeTradeParty(): static
    {
        $this->payeeTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getPayerTradeParty(): ?TradePartyType
    {
        return $this->payerTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getPayerTradePartyWithCreate(): TradePartyType
    {
        $this->payerTradeParty ??= new TradePartyType();

        return $this->payerTradeParty;
    }

    /**
     * @param  null|TradePartyType $payerTradeParty
     * @return static
     */
    public function setPayerTradeParty(
        ?TradePartyType $payerTradeParty = null
    ): static {
        $this->payerTradeParty = $payerTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayerTradeParty(): static
    {
        $this->payerTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchange(): ?TradeCurrencyExchangeType
    {
        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @return TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchangeWithCreate(): TradeCurrencyExchangeType
    {
        $this->taxApplicableTradeCurrencyExchange ??= new TradeCurrencyExchangeType();

        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @param  null|TradeCurrencyExchangeType $taxApplicableTradeCurrencyExchange
     * @return static
     */
    public function setTaxApplicableTradeCurrencyExchange(
        ?TradeCurrencyExchangeType $taxApplicableTradeCurrencyExchange = null,
    ): static {
        $this->taxApplicableTradeCurrencyExchange = $taxApplicableTradeCurrencyExchange;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxApplicableTradeCurrencyExchange(): static
    {
        $this->taxApplicableTradeCurrencyExchange = null;

        return $this;
    }

    /**
     * @return null|array<TradeSettlementPaymentMeansType>
     */
    public function getSpecifiedTradeSettlementPaymentMeans(): ?array
    {
        return $this->specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param  null|array<TradeSettlementPaymentMeansType> $specifiedTradeSettlementPaymentMeans
     * @return static
     */
    public function setSpecifiedTradeSettlementPaymentMeans(
        ?array $specifiedTradeSettlementPaymentMeans = null
    ): static {
        $this->specifiedTradeSettlementPaymentMeans = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradeSettlementPaymentMeans(): static
    {
        $this->specifiedTradeSettlementPaymentMeans = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedTradeSettlementPaymentMeans(): static
    {
        $this->specifiedTradeSettlementPaymentMeans = [];

        return $this;
    }

    /**
     * @param  TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return static
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): static {
        $this->specifiedTradeSettlementPaymentMeans[] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        $this->addToSpecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeans = new TradeSettlementPaymentMeansType());

        return $specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param  TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return static
     */
    public function addOnceToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradeSettlementPaymentMeans)) {
            $this->specifiedTradeSettlementPaymentMeans = [];
        }

        $this->specifiedTradeSettlementPaymentMeans[0] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return TradeSettlementPaymentMeansType
     */
    public function addOnceToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradeSettlementPaymentMeans)) {
            $this->specifiedTradeSettlementPaymentMeans = [];
        }

        if ([] === $this->specifiedTradeSettlementPaymentMeans) {
            $this->addOnceToSpecifiedTradeSettlementPaymentMeans(new TradeSettlementPaymentMeansType());
        }

        return $this->specifiedTradeSettlementPaymentMeans[0];
    }

    /**
     * @return null|array<TradeTaxType>
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param  null|array<TradeTaxType> $applicableTradeTax
     * @return static
     */
    public function setApplicableTradeTax(
        ?array $applicableTradeTax = null
    ): static {
        $this->applicableTradeTax = $applicableTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTradeTax(): static
    {
        $this->applicableTradeTax = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableTradeTax(): static
    {
        $this->applicableTradeTax = [];

        return $this;
    }

    /**
     * @param  TradeTaxType $applicableTradeTax
     * @return static
     */
    public function addToApplicableTradeTax(
        TradeTaxType $applicableTradeTax
    ): static {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToApplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @param  TradeTaxType $applicableTradeTax
     * @return static
     */
    public function addOnceToApplicableTradeTax(
        TradeTaxType $applicableTradeTax
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        $this->applicableTradeTax[0] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addOnceToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        if ([] === $this->applicableTradeTax) {
            $this->addOnceToApplicableTradeTax(new TradeTaxType());
        }

        return $this->applicableTradeTax[0];
    }

    /**
     * @return null|SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->billingSpecifiedPeriod;
    }

    /**
     * @return SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->billingSpecifiedPeriod ??= new SpecifiedPeriodType();

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param  null|SpecifiedPeriodType $billingSpecifiedPeriod
     * @return static
     */
    public function setBillingSpecifiedPeriod(
        ?SpecifiedPeriodType $billingSpecifiedPeriod = null
    ): static {
        $this->billingSpecifiedPeriod = $billingSpecifiedPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillingSpecifiedPeriod(): static
    {
        $this->billingSpecifiedPeriod = null;

        return $this;
    }

    /**
     * @return null|array<TradeAllowanceChargeType>
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param  null|array<TradeAllowanceChargeType> $specifiedTradeAllowanceCharge
     * @return static
     */
    public function setSpecifiedTradeAllowanceCharge(
        ?array $specifiedTradeAllowanceCharge = null
    ): static {
        $this->specifiedTradeAllowanceCharge = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradeAllowanceCharge(): static
    {
        $this->specifiedTradeAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedTradeAllowanceCharge(): static
    {
        $this->specifiedTradeAllowanceCharge = [];

        return $this;
    }

    /**
     * @param  TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return static
     */
    public function addToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge
    ): static {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @param  TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return static
     */
    public function addOnceToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        $this->specifiedTradeAllowanceCharge[0] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addOnceToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        if ([] === $this->specifiedTradeAllowanceCharge) {
            $this->addOnceToSpecifiedTradeAllowanceCharge(new TradeAllowanceChargeType());
        }

        return $this->specifiedTradeAllowanceCharge[0];
    }

    /**
     * @return null|array<LogisticsServiceChargeType>
     */
    public function getSpecifiedLogisticsServiceCharge(): ?array
    {
        return $this->specifiedLogisticsServiceCharge;
    }

    /**
     * @param  null|array<LogisticsServiceChargeType> $specifiedLogisticsServiceCharge
     * @return static
     */
    public function setSpecifiedLogisticsServiceCharge(
        ?array $specifiedLogisticsServiceCharge = null
    ): static {
        $this->specifiedLogisticsServiceCharge = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedLogisticsServiceCharge(): static
    {
        $this->specifiedLogisticsServiceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedLogisticsServiceCharge(): static
    {
        $this->specifiedLogisticsServiceCharge = [];

        return $this;
    }

    /**
     * @param  LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return static
     */
    public function addToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): static {
        $this->specifiedLogisticsServiceCharge[] = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return LogisticsServiceChargeType
     */
    public function addToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        $this->addToSpecifiedLogisticsServiceCharge($specifiedLogisticsServiceCharge = new LogisticsServiceChargeType());

        return $specifiedLogisticsServiceCharge;
    }

    /**
     * @param  LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return static
     */
    public function addOnceToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedLogisticsServiceCharge)) {
            $this->specifiedLogisticsServiceCharge = [];
        }

        $this->specifiedLogisticsServiceCharge[0] = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return LogisticsServiceChargeType
     */
    public function addOnceToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedLogisticsServiceCharge)) {
            $this->specifiedLogisticsServiceCharge = [];
        }

        if ([] === $this->specifiedLogisticsServiceCharge) {
            $this->addOnceToSpecifiedLogisticsServiceCharge(new LogisticsServiceChargeType());
        }

        return $this->specifiedLogisticsServiceCharge[0];
    }

    /**
     * @return null|array<TradePaymentTermsType>
     */
    public function getSpecifiedTradePaymentTerms(): ?array
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param  null|array<TradePaymentTermsType> $specifiedTradePaymentTerms
     * @return static
     */
    public function setSpecifiedTradePaymentTerms(
        ?array $specifiedTradePaymentTerms = null
    ): static {
        $this->specifiedTradePaymentTerms = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradePaymentTerms(): static
    {
        $this->specifiedTradePaymentTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedTradePaymentTerms(): static
    {
        $this->specifiedTradePaymentTerms = [];

        return $this;
    }

    /**
     * @param  TradePaymentTermsType $specifiedTradePaymentTerms
     * @return static
     */
    public function addToSpecifiedTradePaymentTerms(
        TradePaymentTermsType $specifiedTradePaymentTerms
    ): static {
        $this->specifiedTradePaymentTerms[] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->addToSpecifiedTradePaymentTerms($specifiedTradePaymentTerms = new TradePaymentTermsType());

        return $specifiedTradePaymentTerms;
    }

    /**
     * @param  TradePaymentTermsType $specifiedTradePaymentTerms
     * @return static
     */
    public function addOnceToSpecifiedTradePaymentTerms(
        TradePaymentTermsType $specifiedTradePaymentTerms
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradePaymentTerms)) {
            $this->specifiedTradePaymentTerms = [];
        }

        $this->specifiedTradePaymentTerms[0] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return TradePaymentTermsType
     */
    public function addOnceToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedTradePaymentTerms)) {
            $this->specifiedTradePaymentTerms = [];
        }

        if ([] === $this->specifiedTradePaymentTerms) {
            $this->addOnceToSpecifiedTradePaymentTerms(new TradePaymentTermsType());
        }

        return $this->specifiedTradePaymentTerms[0];
    }

    /**
     * @return null|TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @return TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation ??= new TradeSettlementHeaderMonetarySummationType();

        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @param  null|TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation
     * @return static
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        ?TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation = null,
    ): static {
        $this->specifiedTradeSettlementHeaderMonetarySummation = $specifiedTradeSettlementHeaderMonetarySummation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradeSettlementHeaderMonetarySummation(): static
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = null;

        return $this;
    }

    /**
     * @return null|array<ReferencedDocumentType>
     */
    public function getInvoiceReferencedDocument(): ?array
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @param  null|array<ReferencedDocumentType> $invoiceReferencedDocument
     * @return static
     */
    public function setInvoiceReferencedDocument(
        ?array $invoiceReferencedDocument = null
    ): static {
        $this->invoiceReferencedDocument = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceReferencedDocument(): static
    {
        $this->invoiceReferencedDocument = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInvoiceReferencedDocument(): static
    {
        $this->invoiceReferencedDocument = [];

        return $this;
    }

    /**
     * @param  ReferencedDocumentType $invoiceReferencedDocument
     * @return static
     */
    public function addToInvoiceReferencedDocument(
        ReferencedDocumentType $invoiceReferencedDocument
    ): static {
        $this->invoiceReferencedDocument[] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToInvoiceReferencedDocument($invoiceReferencedDocument = new ReferencedDocumentType());

        return $invoiceReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $invoiceReferencedDocument
     * @return static
     */
    public function addOnceToInvoiceReferencedDocument(
        ReferencedDocumentType $invoiceReferencedDocument
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->invoiceReferencedDocument)) {
            $this->invoiceReferencedDocument = [];
        }

        $this->invoiceReferencedDocument[0] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addOnceToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        if (!InvoiceSuiteArrayUtils::is($this->invoiceReferencedDocument)) {
            $this->invoiceReferencedDocument = [];
        }

        if ([] === $this->invoiceReferencedDocument) {
            $this->addOnceToInvoiceReferencedDocument(new ReferencedDocumentType());
        }

        return $this->invoiceReferencedDocument[0];
    }

    /**
     * @return null|array<TradeAccountingAccountType>
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param  null|array<TradeAccountingAccountType> $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        ?array $receivableSpecifiedTradeAccountingAccount = null,
    ): static {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivableSpecifiedTradeAccountingAccount(): static
    {
        $this->receivableSpecifiedTradeAccountingAccount = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReceivableSpecifiedTradeAccountingAccount(): static
    {
        $this->receivableSpecifiedTradeAccountingAccount = [];

        return $this;
    }

    /**
     * @param  TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): static {
        $this->receivableSpecifiedTradeAccountingAccount[] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->addToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccount = new TradeAccountingAccountType());

        return $receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param  TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        $this->receivableSpecifiedTradeAccountingAccount[0] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return TradeAccountingAccountType
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        if (!InvoiceSuiteArrayUtils::is($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        if ([] === $this->receivableSpecifiedTradeAccountingAccount) {
            $this->addOnceToReceivableSpecifiedTradeAccountingAccount(new TradeAccountingAccountType());
        }

        return $this->receivableSpecifiedTradeAccountingAccount[0];
    }

    /**
     * @return null|array<AdvancePaymentType>
     */
    public function getSpecifiedAdvancePayment(): ?array
    {
        return $this->specifiedAdvancePayment;
    }

    /**
     * @param  null|array<AdvancePaymentType> $specifiedAdvancePayment
     * @return static
     */
    public function setSpecifiedAdvancePayment(
        ?array $specifiedAdvancePayment = null
    ): static {
        $this->specifiedAdvancePayment = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedAdvancePayment(): static
    {
        $this->specifiedAdvancePayment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedAdvancePayment(): static
    {
        $this->specifiedAdvancePayment = [];

        return $this;
    }

    /**
     * @param  AdvancePaymentType $specifiedAdvancePayment
     * @return static
     */
    public function addToSpecifiedAdvancePayment(
        AdvancePaymentType $specifiedAdvancePayment
    ): static {
        $this->specifiedAdvancePayment[] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        $this->addToSpecifiedAdvancePayment($specifiedAdvancePayment = new AdvancePaymentType());

        return $specifiedAdvancePayment;
    }

    /**
     * @param  AdvancePaymentType $specifiedAdvancePayment
     * @return static
     */
    public function addOnceToSpecifiedAdvancePayment(
        AdvancePaymentType $specifiedAdvancePayment
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedAdvancePayment)) {
            $this->specifiedAdvancePayment = [];
        }

        $this->specifiedAdvancePayment[0] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return AdvancePaymentType
     */
    public function addOnceToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedAdvancePayment)) {
            $this->specifiedAdvancePayment = [];
        }

        if ([] === $this->specifiedAdvancePayment) {
            $this->addOnceToSpecifiedAdvancePayment(new AdvancePaymentType());
        }

        return $this->specifiedAdvancePayment[0];
    }
}
