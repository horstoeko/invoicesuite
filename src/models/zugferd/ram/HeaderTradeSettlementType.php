<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class HeaderTradeSettlementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceIssuerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceIssuerReference", setter="setInvoiceIssuerReference")
     */
    private $invoiceIssuerReference;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoicerTradeParty", setter="setInvoicerTradeParty")
     */
    private $invoicerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceeTradeParty", setter="setInvoiceeTradeParty")
     */
    private $invoiceeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerTradeParty", setter="setPayerTradeParty")
     */
    private $payerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeCurrencyExchangeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxApplicableTradeCurrencyExchange")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxApplicableTradeCurrencyExchange", setter="setTaxApplicableTradeCurrencyExchange")
     */
    private $tradeCurrencyExchangeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeSettlementPaymentMeansType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementPaymentMeans")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeSettlementPaymentMeans", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementPaymentMeans", setter="setSpecifiedTradeSettlementPaymentMeans")
     */
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableTradeTax", setter="setApplicableTradeTax")
     */
    private $applicableTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\LogisticsServiceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsServiceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsServiceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsServiceCharge", setter="setSpecifiedLogisticsServiceCharge")
     */
    private $specifiedLogisticsServiceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradePaymentTermsType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradePaymentTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradePaymentTerms", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradePaymentTerms", setter="setSpecifiedTradePaymentTerms")
     */
    private $specifiedTradePaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $tradeSettlementHeaderMonetarySummationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeAccountingAccountType>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivableSpecifiedTradeAccountingAccount", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\AdvancePaymentType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedAdvancePayment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedAdvancePayment", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedAdvancePayment", setter="setSpecifiedAdvancePayment")
     */
    private $specifiedAdvancePayment;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getCreditorReferenceID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getCreditorReferenceIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setCreditorReferenceID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getPaymentReference(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getPaymentReferenceWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setPaymentReference(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->paymentReference = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getTaxCurrencyCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @return self
     */
    public function setTaxCurrencyCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $currencyCodeType,
    ): self {
        $this->taxCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @return self
     */
    public function setInvoiceCurrencyCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $currencyCodeType,
    ): self {
        $this->invoiceCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getInvoiceIssuerReference(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->invoiceIssuerReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getInvoiceIssuerReferenceWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->invoiceIssuerReference = is_null($this->invoiceIssuerReference) ? new TextType() : $this->invoiceIssuerReference;

        return $this->invoiceIssuerReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setInvoiceIssuerReference(
        \horstoeko\invoicesuite\models\zugferd\udt\TextType $textType,
    ): self {
        $this->invoiceIssuerReference = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getInvoicerTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->invoicerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getInvoicerTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->invoicerTradeParty = is_null($this->invoicerTradeParty) ? new TradePartyType() : $this->invoicerTradeParty;

        return $this->invoicerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setInvoicerTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->invoicerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getInvoiceeTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->invoiceeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getInvoiceeTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->invoiceeTradeParty = is_null($this->invoiceeTradeParty) ? new TradePartyType() : $this->invoiceeTradeParty;

        return $this->invoiceeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setInvoiceeTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->invoiceeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setPayeeTradeParty(\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType): self
    {
        $this->payeeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayerTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->payerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayerTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->payerTradeParty = is_null($this->payerTradeParty) ? new TradePartyType() : $this->payerTradeParty;

        return $this->payerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setPayerTradeParty(\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType): self
    {
        $this->payerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType|null
     */
    public function getTaxApplicableTradeCurrencyExchange(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType {
        return $this->tradeCurrencyExchangeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchangeWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType {
        $this->tradeCurrencyExchangeType = is_null($this->tradeCurrencyExchangeType) ? new TradeCurrencyExchangeType() : $this->tradeCurrencyExchangeType;

        return $this->tradeCurrencyExchangeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType
     * @return self
     */
    public function setTaxApplicableTradeCurrencyExchange(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType $tradeCurrencyExchangeType,
    ): self {
        $this->tradeCurrencyExchangeType = $tradeCurrencyExchangeType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType>|null
     */
    public function getSpecifiedTradeSettlementPaymentMeans(): ?array
    {
        return $this->specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType $tradeSettlementPaymentMeansType
     * @return self
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType $tradeSettlementPaymentMeansType,
    ): self {
        $this->specifiedTradeSettlementPaymentMeans[] = $tradeSettlementPaymentMeansType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType {
        $this->addTospecifiedTradeSettlementPaymentMeans($tradeSettlementPaymentMeansType = new TradeSettlementPaymentMeansType());

        return $tradeSettlementPaymentMeansType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>|null
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToApplicableTradeTax(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType,
    ): self {
        $this->applicableTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
    {
        $this->addToapplicableTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType|null
     */
    public function getBillingSpecifiedPeriod(): ?\horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
    {
        return $this->specifiedPeriodType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType {
        $this->specifiedPeriodType = is_null($this->specifiedPeriodType) ? new SpecifiedPeriodType() : $this->specifiedPeriodType;

        return $this->specifiedPeriodType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     * @return self
     */
    public function setBillingSpecifiedPeriod(
        \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType $specifiedPeriodType,
    ): self {
        $this->specifiedPeriodType = $specifiedPeriodType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>|null
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType $tradeAllowanceChargeType
     * @return self
     */
    public function addToSpecifiedTradeAllowanceCharge(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType $tradeAllowanceChargeType,
    ): self {
        $this->specifiedTradeAllowanceCharge[] = $tradeAllowanceChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType {
        $this->addTospecifiedTradeAllowanceCharge($tradeAllowanceChargeType = new TradeAllowanceChargeType());

        return $tradeAllowanceChargeType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType>|null
     */
    public function getSpecifiedLogisticsServiceCharge(): ?array
    {
        return $this->specifiedLogisticsServiceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType>
     * @return self
     */
    public function setSpecifiedLogisticsServiceCharge(array $specifiedLogisticsServiceCharge): self
    {
        $this->specifiedLogisticsServiceCharge = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedLogisticsServiceCharge(): self
    {
        $this->specifiedLogisticsServiceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType $logisticsServiceChargeType
     * @return self
     */
    public function addToSpecifiedLogisticsServiceCharge(
        \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType $logisticsServiceChargeType,
    ): self {
        $this->specifiedLogisticsServiceCharge[] = $logisticsServiceChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType
     */
    public function addToSpecifiedLogisticsServiceChargeWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType {
        $this->addTospecifiedLogisticsServiceCharge($logisticsServiceChargeType = new LogisticsServiceChargeType());

        return $logisticsServiceChargeType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType>|null
     */
    public function getSpecifiedTradePaymentTerms(): ?array
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType>
     * @return self
     */
    public function setSpecifiedTradePaymentTerms(array $specifiedTradePaymentTerms): self
    {
        $this->specifiedTradePaymentTerms = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedTradePaymentTerms(): self
    {
        $this->specifiedTradePaymentTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType $tradePaymentTermsType
     * @return self
     */
    public function addToSpecifiedTradePaymentTerms(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType $tradePaymentTermsType,
    ): self {
        $this->specifiedTradePaymentTerms[] = $tradePaymentTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType {
        $this->addTospecifiedTradePaymentTerms($tradePaymentTermsType = new TradePaymentTermsType());

        return $tradePaymentTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType {
        return $this->tradeSettlementHeaderMonetarySummationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType {
        $this->tradeSettlementHeaderMonetarySummationType = is_null($this->tradeSettlementHeaderMonetarySummationType) ? new TradeSettlementHeaderMonetarySummationType() : $this->tradeSettlementHeaderMonetarySummationType;

        return $this->tradeSettlementHeaderMonetarySummationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType $tradeSettlementHeaderMonetarySummationType,
    ): self {
        $this->tradeSettlementHeaderMonetarySummationType = $tradeSettlementHeaderMonetarySummationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>|null
     */
    public function getInvoiceReferencedDocument(): ?array
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToInvoiceReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->invoiceReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->addToinvoiceReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType>|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType>
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        array $receivableSpecifiedTradeAccountingAccount,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReceivableSpecifiedTradeAccountingAccount(): self
    {
        $this->receivableSpecifiedTradeAccountingAccount = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType $tradeAccountingAccountType
     * @return self
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType $tradeAccountingAccountType,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount[] = $tradeAccountingAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType {
        $this->addToreceivableSpecifiedTradeAccountingAccount($tradeAccountingAccountType = new TradeAccountingAccountType());

        return $tradeAccountingAccountType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType>|null
     */
    public function getSpecifiedAdvancePayment(): ?array
    {
        return $this->specifiedAdvancePayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType>
     * @return self
     */
    public function setSpecifiedAdvancePayment(array $specifiedAdvancePayment): self
    {
        $this->specifiedAdvancePayment = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedAdvancePayment(): self
    {
        $this->specifiedAdvancePayment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType $advancePaymentType
     * @return self
     */
    public function addToSpecifiedAdvancePayment(
        \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType $advancePaymentType,
    ): self {
        $this->specifiedAdvancePayment[] = $advancePaymentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType {
        $this->addTospecifiedAdvancePayment($advancePaymentType = new AdvancePaymentType());

        return $advancePaymentType;
    }
}
