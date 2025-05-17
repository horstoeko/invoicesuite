<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\IDType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\TextType;

class HeaderTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $creditorReferenceID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementPaymentMeans")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeSettlementPaymentMeans", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementPaymentMeans", setter="setSpecifiedTradeSettlementPaymentMeans")
     */
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableTradeTax", setter="setApplicableTradeTax")
     */
    private $applicableTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\SpecifiedPeriodType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $billingSpecifiedPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePaymentTermsType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradePaymentTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradePaymentTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradePaymentTerms", setter="setSpecifiedTradePaymentTerms")
     */
    private $specifiedTradePaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAccountingAccountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAccountingAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType|null
     */
    public function getCreditorReferenceID(): ?IDType
    {
        return $this->creditorReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType
     */
    public function getCreditorReferenceIDWithCreate(): IDType
    {
        $this->creditorReferenceID = is_null($this->creditorReferenceID) ? new IDType() : $this->creditorReferenceID;

        return $this->creditorReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\IDType $creditorReferenceID
     * @return self
     */
    public function setCreditorReferenceID(IDType $creditorReferenceID): self
    {
        $this->creditorReferenceID = $creditorReferenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     */
    public function getPaymentReference(): ?TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     */
    public function getPaymentReferenceWithCreate(): TextType
    {
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType $paymentReference
     * @return self
     */
    public function setPaymentReference(TextType $paymentReference): self
    {
        $this->paymentReference = $paymentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType|null
     */
    public function getTaxCurrencyCode(): ?CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType $taxCurrencyCode
     * @return self
     */
    public function setTaxCurrencyCode(CurrencyCodeType $taxCurrencyCode): self
    {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\qdt\CurrencyCodeType $invoiceCurrencyCode
     * @return self
     */
    public function setInvoiceCurrencyCode(CurrencyCodeType $invoiceCurrencyCode): self
    {
        $this->invoiceCurrencyCode = $invoiceCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePartyType $payeeTradeParty
     * @return self
     */
    public function setPayeeTradeParty(TradePartyType $payeeTradeParty): self
    {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType>|null
     */
    public function getSpecifiedTradeSettlementPaymentMeans(): ?array
    {
        return $this->specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType> $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function setSpecifiedTradeSettlementPaymentMeans(array $specifiedTradeSettlementPaymentMeans): self
    {
        $this->specifiedTradeSettlementPaymentMeans = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedTradeSettlementPaymentMeans(): self
    {
        $this->specifiedTradeSettlementPaymentMeans = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): self {
        $this->specifiedTradeSettlementPaymentMeans[] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        $this->addTospecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeans = new TradeSettlementPaymentMeansType());

        return $specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function addOnceToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): self {
        if (!is_array($this->specifiedTradeSettlementPaymentMeans)) {
            $this->specifiedTradeSettlementPaymentMeans = [];
        }

        $this->specifiedTradeSettlementPaymentMeans[0] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementPaymentMeansType
     */
    public function addOnceToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        if (!is_array($this->specifiedTradeSettlementPaymentMeans)) {
            $this->specifiedTradeSettlementPaymentMeans = [];
        }

        if ($this->specifiedTradeSettlementPaymentMeans === []) {
            $this->addOnceTospecifiedTradeSettlementPaymentMeans(new TradeSettlementPaymentMeansType());
        }

        return $this->specifiedTradeSettlementPaymentMeans[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType>|null
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType> $applicableTradeTax
     * @return self
     */
    public function setApplicableTradeTax(array $applicableTradeTax): self
    {
        $this->applicableTradeTax = $applicableTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function clearApplicableTradeTax(): self
    {
        $this->applicableTradeTax = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType $applicableTradeTax
     * @return self
     */
    public function addToApplicableTradeTax(TradeTaxType $applicableTradeTax): self
    {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToapplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType $applicableTradeTax
     * @return self
     */
    public function addOnceToApplicableTradeTax(TradeTaxType $applicableTradeTax): self
    {
        if (!is_array($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        $this->applicableTradeTax[0] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeTaxType
     */
    public function addOnceToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        if ($this->applicableTradeTax === []) {
            $this->addOnceToapplicableTradeTax(new TradeTaxType());
        }

        return $this->applicableTradeTax[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\SpecifiedPeriodType|null
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->billingSpecifiedPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->billingSpecifiedPeriod = is_null($this->billingSpecifiedPeriod) ? new SpecifiedPeriodType() : $this->billingSpecifiedPeriod;

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\SpecifiedPeriodType $billingSpecifiedPeriod
     * @return self
     */
    public function setBillingSpecifiedPeriod(SpecifiedPeriodType $billingSpecifiedPeriod): self
    {
        $this->billingSpecifiedPeriod = $billingSpecifiedPeriod;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType>|null
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType> $specifiedTradeAllowanceCharge
     * @return self
     */
    public function setSpecifiedTradeAllowanceCharge(array $specifiedTradeAllowanceCharge): self
    {
        $this->specifiedTradeAllowanceCharge = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedTradeAllowanceCharge(): self
    {
        $this->specifiedTradeAllowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return self
     */
    public function addToSpecifiedTradeAllowanceCharge(TradeAllowanceChargeType $specifiedTradeAllowanceCharge): self
    {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addTospecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return self
     */
    public function addOnceToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge,
    ): self {
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        $this->specifiedTradeAllowanceCharge[0] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType
     */
    public function addOnceToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        if ($this->specifiedTradeAllowanceCharge === []) {
            $this->addOnceTospecifiedTradeAllowanceCharge(new TradeAllowanceChargeType());
        }

        return $this->specifiedTradeAllowanceCharge[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePaymentTermsType|null
     */
    public function getSpecifiedTradePaymentTerms(): ?TradePaymentTermsType
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePaymentTermsType
     */
    public function getSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->specifiedTradePaymentTerms = is_null($this->specifiedTradePaymentTerms) ? new TradePaymentTermsType() : $this->specifiedTradePaymentTerms;

        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradePaymentTermsType $specifiedTradePaymentTerms
     * @return self
     */
    public function setSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): self
    {
        $this->specifiedTradePaymentTerms = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = is_null($this->specifiedTradeSettlementHeaderMonetarySummation) ? new TradeSettlementHeaderMonetarySummationType() : $this->specifiedTradeSettlementHeaderMonetarySummation;

        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation,
    ): self {
        $this->specifiedTradeSettlementHeaderMonetarySummation = $specifiedTradeSettlementHeaderMonetarySummation;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType>|null
     */
    public function getInvoiceReferencedDocument(): ?array
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType> $invoiceReferencedDocument
     * @return self
     */
    public function setInvoiceReferencedDocument(array $invoiceReferencedDocument): self
    {
        $this->invoiceReferencedDocument = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInvoiceReferencedDocument(): self
    {
        $this->invoiceReferencedDocument = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType $invoiceReferencedDocument
     * @return self
     */
    public function addToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): self
    {
        $this->invoiceReferencedDocument[] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToinvoiceReferencedDocument($invoiceReferencedDocument = new ReferencedDocumentType());

        return $invoiceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType $invoiceReferencedDocument
     * @return self
     */
    public function addOnceToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): self
    {
        if (!is_array($this->invoiceReferencedDocument)) {
            $this->invoiceReferencedDocument = [];
        }

        $this->invoiceReferencedDocument[0] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ReferencedDocumentType
     */
    public function addOnceToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        if (!is_array($this->invoiceReferencedDocument)) {
            $this->invoiceReferencedDocument = [];
        }

        if ($this->invoiceReferencedDocument === []) {
            $this->addOnceToinvoiceReferencedDocument(new ReferencedDocumentType());
        }

        return $this->invoiceReferencedDocument[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAccountingAccountType|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?TradeAccountingAccountType
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAccountingAccountType
     */
    public function getReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->receivableSpecifiedTradeAccountingAccount = is_null($this->receivableSpecifiedTradeAccountingAccount) ? new TradeAccountingAccountType() : $this->receivableSpecifiedTradeAccountingAccount;

        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }
}
