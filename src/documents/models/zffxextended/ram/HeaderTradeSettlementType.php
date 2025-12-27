<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class HeaderTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $creditorReferenceID;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var null|CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var null|CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceIssuerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceIssuerReference", setter="setInvoiceIssuerReference")
     */
    private $invoiceIssuerReference;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoicerTradeParty", setter="setInvoicerTradeParty")
     */
    private $invoicerTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceeTradeParty", setter="setInvoiceeTradeParty")
     */
    private $invoiceeTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerTradeParty", setter="setPayerTradeParty")
     */
    private $payerTradeParty;

    /**
     * @var null|TradeCurrencyExchangeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCurrencyExchangeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxApplicableTradeCurrencyExchange")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxApplicableTradeCurrencyExchange", setter="setTaxApplicableTradeCurrencyExchange")
     */
    private $taxApplicableTradeCurrencyExchange;

    /**
     * @var null|array<TradeSettlementPaymentMeansType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementPaymentMeansType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementPaymentMeans")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeSettlementPaymentMeans", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementPaymentMeans", setter="setSpecifiedTradeSettlementPaymentMeans")
     */
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var null|array<TradeTaxType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableTradeTax", setter="setApplicableTradeTax")
     */
    private $applicableTradeTax;

    /**
     * @var null|SpecifiedPeriodType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $billingSpecifiedPeriod;

    /**
     * @var null|array<TradeAllowanceChargeType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var null|array<LogisticsServiceChargeType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsServiceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsServiceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsServiceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsServiceCharge", setter="setSpecifiedLogisticsServiceCharge")
     */
    private $specifiedLogisticsServiceCharge;

    /**
     * @var null|array<TradePaymentTermsType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePaymentTermsType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradePaymentTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradePaymentTerms", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradePaymentTerms", setter="setSpecifiedTradePaymentTerms")
     */
    private $specifiedTradePaymentTerms;

    /**
     * @var null|TradeSettlementHeaderMonetarySummationType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @var null|array<ReferencedDocumentType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var null|array<TradeAccountingAccountType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAccountingAccountType>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivableSpecifiedTradeAccountingAccount", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @var null|array<AdvancePaymentType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\AdvancePaymentType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedAdvancePayment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedAdvancePayment", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedAdvancePayment", setter="setSpecifiedAdvancePayment")
     */
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
        $this->creditorReferenceID = is_null($this->creditorReferenceID) ? new IDType() : $this->creditorReferenceID;

        return $this->creditorReferenceID;
    }

    /**
     * @param  null|IDType $creditorReferenceID
     * @return static
     */
    public function setCreditorReferenceID(?IDType $creditorReferenceID = null): static
    {
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
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param  null|TextType $paymentReference
     * @return static
     */
    public function setPaymentReference(?TextType $paymentReference = null): static
    {
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
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $taxCurrencyCode
     * @return static
     */
    public function setTaxCurrencyCode(?CurrencyCodeType $taxCurrencyCode = null): static
    {
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
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $invoiceCurrencyCode
     * @return static
     */
    public function setInvoiceCurrencyCode(?CurrencyCodeType $invoiceCurrencyCode = null): static
    {
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
        $this->invoiceIssuerReference = is_null($this->invoiceIssuerReference) ? new TextType() : $this->invoiceIssuerReference;

        return $this->invoiceIssuerReference;
    }

    /**
     * @param  null|TextType $invoiceIssuerReference
     * @return static
     */
    public function setInvoiceIssuerReference(?TextType $invoiceIssuerReference = null): static
    {
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
        $this->invoicerTradeParty = is_null($this->invoicerTradeParty) ? new TradePartyType() : $this->invoicerTradeParty;

        return $this->invoicerTradeParty;
    }

    /**
     * @param  null|TradePartyType $invoicerTradeParty
     * @return static
     */
    public function setInvoicerTradeParty(?TradePartyType $invoicerTradeParty = null): static
    {
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
        $this->invoiceeTradeParty = is_null($this->invoiceeTradeParty) ? new TradePartyType() : $this->invoiceeTradeParty;

        return $this->invoiceeTradeParty;
    }

    /**
     * @param  null|TradePartyType $invoiceeTradeParty
     * @return static
     */
    public function setInvoiceeTradeParty(?TradePartyType $invoiceeTradeParty = null): static
    {
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
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param  null|TradePartyType $payeeTradeParty
     * @return static
     */
    public function setPayeeTradeParty(?TradePartyType $payeeTradeParty = null): static
    {
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
        $this->payerTradeParty = is_null($this->payerTradeParty) ? new TradePartyType() : $this->payerTradeParty;

        return $this->payerTradeParty;
    }

    /**
     * @param  null|TradePartyType $payerTradeParty
     * @return static
     */
    public function setPayerTradeParty(?TradePartyType $payerTradeParty = null): static
    {
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
        $this->taxApplicableTradeCurrencyExchange = is_null($this->taxApplicableTradeCurrencyExchange) ? new TradeCurrencyExchangeType() : $this->taxApplicableTradeCurrencyExchange;

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
    public function setSpecifiedTradeSettlementPaymentMeans(?array $specifiedTradeSettlementPaymentMeans = null): static
    {
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
        $this->addTospecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeans = new TradeSettlementPaymentMeansType());

        return $specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param  TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return static
     */
    public function addOnceToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): static {
        if (!is_array($this->specifiedTradeSettlementPaymentMeans)) {
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
        if (!is_array($this->specifiedTradeSettlementPaymentMeans)) {
            $this->specifiedTradeSettlementPaymentMeans = [];
        }

        if ([] === $this->specifiedTradeSettlementPaymentMeans) {
            $this->addOnceTospecifiedTradeSettlementPaymentMeans(new TradeSettlementPaymentMeansType());
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
    public function setApplicableTradeTax(?array $applicableTradeTax = null): static
    {
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
    public function addToApplicableTradeTax(TradeTaxType $applicableTradeTax): static
    {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToapplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @param  TradeTaxType $applicableTradeTax
     * @return static
     */
    public function addOnceToApplicableTradeTax(TradeTaxType $applicableTradeTax): static
    {
        if (!is_array($this->applicableTradeTax)) {
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
        if (!is_array($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        if ([] === $this->applicableTradeTax) {
            $this->addOnceToapplicableTradeTax(new TradeTaxType());
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
        $this->billingSpecifiedPeriod = is_null($this->billingSpecifiedPeriod) ? new SpecifiedPeriodType() : $this->billingSpecifiedPeriod;

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param  null|SpecifiedPeriodType $billingSpecifiedPeriod
     * @return static
     */
    public function setBillingSpecifiedPeriod(?SpecifiedPeriodType $billingSpecifiedPeriod = null): static
    {
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
    public function setSpecifiedTradeAllowanceCharge(?array $specifiedTradeAllowanceCharge = null): static
    {
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
    public function addToSpecifiedTradeAllowanceCharge(TradeAllowanceChargeType $specifiedTradeAllowanceCharge): static
    {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addTospecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @param  TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return static
     */
    public function addOnceToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge,
    ): static {
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
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
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        if ([] === $this->specifiedTradeAllowanceCharge) {
            $this->addOnceTospecifiedTradeAllowanceCharge(new TradeAllowanceChargeType());
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
    public function setSpecifiedLogisticsServiceCharge(?array $specifiedLogisticsServiceCharge = null): static
    {
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
        $this->addTospecifiedLogisticsServiceCharge($specifiedLogisticsServiceCharge = new LogisticsServiceChargeType());

        return $specifiedLogisticsServiceCharge;
    }

    /**
     * @param  LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return static
     */
    public function addOnceToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): static {
        if (!is_array($this->specifiedLogisticsServiceCharge)) {
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
        if (!is_array($this->specifiedLogisticsServiceCharge)) {
            $this->specifiedLogisticsServiceCharge = [];
        }

        if ([] === $this->specifiedLogisticsServiceCharge) {
            $this->addOnceTospecifiedLogisticsServiceCharge(new LogisticsServiceChargeType());
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
    public function setSpecifiedTradePaymentTerms(?array $specifiedTradePaymentTerms = null): static
    {
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
    public function addToSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): static
    {
        $this->specifiedTradePaymentTerms[] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->addTospecifiedTradePaymentTerms($specifiedTradePaymentTerms = new TradePaymentTermsType());

        return $specifiedTradePaymentTerms;
    }

    /**
     * @param  TradePaymentTermsType $specifiedTradePaymentTerms
     * @return static
     */
    public function addOnceToSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): static
    {
        if (!is_array($this->specifiedTradePaymentTerms)) {
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
        if (!is_array($this->specifiedTradePaymentTerms)) {
            $this->specifiedTradePaymentTerms = [];
        }

        if ([] === $this->specifiedTradePaymentTerms) {
            $this->addOnceTospecifiedTradePaymentTerms(new TradePaymentTermsType());
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
        $this->specifiedTradeSettlementHeaderMonetarySummation = is_null($this->specifiedTradeSettlementHeaderMonetarySummation) ? new TradeSettlementHeaderMonetarySummationType() : $this->specifiedTradeSettlementHeaderMonetarySummation;

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
    public function setInvoiceReferencedDocument(?array $invoiceReferencedDocument = null): static
    {
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
    public function addToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): static
    {
        $this->invoiceReferencedDocument[] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToinvoiceReferencedDocument($invoiceReferencedDocument = new ReferencedDocumentType());

        return $invoiceReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $invoiceReferencedDocument
     * @return static
     */
    public function addOnceToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): static
    {
        if (!is_array($this->invoiceReferencedDocument)) {
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
        if (!is_array($this->invoiceReferencedDocument)) {
            $this->invoiceReferencedDocument = [];
        }

        if ([] === $this->invoiceReferencedDocument) {
            $this->addOnceToinvoiceReferencedDocument(new ReferencedDocumentType());
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
        $this->addToreceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccount = new TradeAccountingAccountType());

        return $receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param  TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): static {
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
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
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        if ([] === $this->receivableSpecifiedTradeAccountingAccount) {
            $this->addOnceToreceivableSpecifiedTradeAccountingAccount(new TradeAccountingAccountType());
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
    public function setSpecifiedAdvancePayment(?array $specifiedAdvancePayment = null): static
    {
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
    public function addToSpecifiedAdvancePayment(AdvancePaymentType $specifiedAdvancePayment): static
    {
        $this->specifiedAdvancePayment[] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        $this->addTospecifiedAdvancePayment($specifiedAdvancePayment = new AdvancePaymentType());

        return $specifiedAdvancePayment;
    }

    /**
     * @param  AdvancePaymentType $specifiedAdvancePayment
     * @return static
     */
    public function addOnceToSpecifiedAdvancePayment(AdvancePaymentType $specifiedAdvancePayment): static
    {
        if (!is_array($this->specifiedAdvancePayment)) {
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
        if (!is_array($this->specifiedAdvancePayment)) {
            $this->specifiedAdvancePayment = [];
        }

        if ([] === $this->specifiedAdvancePayment) {
            $this->addOnceTospecifiedAdvancePayment(new AdvancePaymentType());
        }

        return $this->specifiedAdvancePayment[0];
    }
}
