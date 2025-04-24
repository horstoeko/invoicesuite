<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class HeaderTradeSettlementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceIssuerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceIssuerReference", setter="setInvoiceIssuerReference")
     */
    private $invoiceIssuerReference;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoicerTradeParty", setter="setInvoicerTradeParty")
     */
    private $invoicerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceeTradeParty", setter="setInvoiceeTradeParty")
     */
    private $invoiceeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerTradeParty", setter="setPayerTradeParty")
     */
    private $payerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeCurrencyExchangeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeCurrencyExchangeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxApplicableTradeCurrencyExchange")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxApplicableTradeCurrencyExchange", setter="setTaxApplicableTradeCurrencyExchange")
     */
    private $tradeCurrencyExchangeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementPaymentMeans")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeSettlementPaymentMeans", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementPaymentMeans", setter="setSpecifiedTradeSettlementPaymentMeans")
     */
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableTradeTax", setter="setApplicableTradeTax")
     */
    private $applicableTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsServiceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsServiceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsServiceCharge", setter="setSpecifiedLogisticsServiceCharge")
     */
    private $specifiedLogisticsServiceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradePaymentTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradePaymentTerms", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradePaymentTerms", setter="setSpecifiedTradePaymentTerms")
     */
    private $specifiedTradePaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementHeaderMonetarySummationType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $tradeSettlementHeaderMonetarySummationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivableSpecifiedTradeAccountingAccount", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedAdvancePayment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedAdvancePayment", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedAdvancePayment", setter="setSpecifiedAdvancePayment")
     */
    private $specifiedAdvancePayment;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getCreditorReferenceID(): ?IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getCreditorReferenceIDWithCreate(): IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setCreditorReferenceID(IDType $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getPaymentReference(): ?TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getPaymentReferenceWithCreate(): TextType
    {
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setPaymentReference(TextType $textType): self
    {
        $this->paymentReference = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType|null
     */
    public function getTaxCurrencyCode(): ?CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType $currencyCodeType
     * @return self
     */
    public function setTaxCurrencyCode(CurrencyCodeType $currencyCodeType): self
    {
        $this->taxCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType $currencyCodeType
     * @return self
     */
    public function setInvoiceCurrencyCode(CurrencyCodeType $currencyCodeType): self
    {
        $this->invoiceCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getInvoiceIssuerReference(): ?TextType
    {
        return $this->invoiceIssuerReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getInvoiceIssuerReferenceWithCreate(): TextType
    {
        $this->invoiceIssuerReference = is_null($this->invoiceIssuerReference) ? new TextType() : $this->invoiceIssuerReference;

        return $this->invoiceIssuerReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setInvoiceIssuerReference(TextType $textType): self
    {
        $this->invoiceIssuerReference = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getInvoicerTradeParty(): ?TradePartyType
    {
        return $this->invoicerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getInvoicerTradePartyWithCreate(): TradePartyType
    {
        $this->invoicerTradeParty = is_null($this->invoicerTradeParty) ? new TradePartyType() : $this->invoicerTradeParty;

        return $this->invoicerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setInvoicerTradeParty(TradePartyType $tradePartyType): self
    {
        $this->invoicerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getInvoiceeTradeParty(): ?TradePartyType
    {
        return $this->invoiceeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getInvoiceeTradePartyWithCreate(): TradePartyType
    {
        $this->invoiceeTradeParty = is_null($this->invoiceeTradeParty) ? new TradePartyType() : $this->invoiceeTradeParty;

        return $this->invoiceeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setInvoiceeTradeParty(TradePartyType $tradePartyType): self
    {
        $this->invoiceeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setPayeeTradeParty(TradePartyType $tradePartyType): self
    {
        $this->payeeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getPayerTradeParty(): ?TradePartyType
    {
        return $this->payerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getPayerTradePartyWithCreate(): TradePartyType
    {
        $this->payerTradeParty = is_null($this->payerTradeParty) ? new TradePartyType() : $this->payerTradeParty;

        return $this->payerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setPayerTradeParty(TradePartyType $tradePartyType): self
    {
        $this->payerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeCurrencyExchangeType|null
     */
    public function getTaxApplicableTradeCurrencyExchange(): ?TradeCurrencyExchangeType
    {
        return $this->tradeCurrencyExchangeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchangeWithCreate(): TradeCurrencyExchangeType
    {
        $this->tradeCurrencyExchangeType = is_null($this->tradeCurrencyExchangeType) ? new TradeCurrencyExchangeType() : $this->tradeCurrencyExchangeType;

        return $this->tradeCurrencyExchangeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeCurrencyExchangeType $tradeCurrencyExchangeType
     * @return self
     */
    public function setTaxApplicableTradeCurrencyExchange(
        TradeCurrencyExchangeType $tradeCurrencyExchangeType,
    ): self {
        $this->tradeCurrencyExchangeType = $tradeCurrencyExchangeType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType>|null
     */
    public function getSpecifiedTradeSettlementPaymentMeans(): ?array
    {
        return $this->specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType> $specifiedTradeSettlementPaymentMeans
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType $tradeSettlementPaymentMeansType
     * @return self
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $tradeSettlementPaymentMeansType,
    ): self {
        $this->specifiedTradeSettlementPaymentMeans[] = $tradeSettlementPaymentMeansType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        $this->addTospecifiedTradeSettlementPaymentMeans($tradeSettlementPaymentMeansType = new TradeSettlementPaymentMeansType());

        return $tradeSettlementPaymentMeansType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>|null
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType> $applicableTradeTax
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToApplicableTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->applicableTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToapplicableTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType|null
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->specifiedPeriodType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->specifiedPeriodType = is_null($this->specifiedPeriodType) ? new SpecifiedPeriodType() : $this->specifiedPeriodType;

        return $this->specifiedPeriodType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType $specifiedPeriodType
     * @return self
     */
    public function setBillingSpecifiedPeriod(SpecifiedPeriodType $specifiedPeriodType): self
    {
        $this->specifiedPeriodType = $specifiedPeriodType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>|null
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType> $specifiedTradeAllowanceCharge
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType $tradeAllowanceChargeType
     * @return self
     */
    public function addToSpecifiedTradeAllowanceCharge(TradeAllowanceChargeType $tradeAllowanceChargeType): self
    {
        $this->specifiedTradeAllowanceCharge[] = $tradeAllowanceChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addTospecifiedTradeAllowanceCharge($tradeAllowanceChargeType = new TradeAllowanceChargeType());

        return $tradeAllowanceChargeType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType>|null
     */
    public function getSpecifiedLogisticsServiceCharge(): ?array
    {
        return $this->specifiedLogisticsServiceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType> $specifiedLogisticsServiceCharge
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType $logisticsServiceChargeType
     * @return self
     */
    public function addToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $logisticsServiceChargeType,
    ): self {
        $this->specifiedLogisticsServiceCharge[] = $logisticsServiceChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LogisticsServiceChargeType
     */
    public function addToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        $this->addTospecifiedLogisticsServiceCharge($logisticsServiceChargeType = new LogisticsServiceChargeType());

        return $logisticsServiceChargeType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType>|null
     */
    public function getSpecifiedTradePaymentTerms(): ?array
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType> $specifiedTradePaymentTerms
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType $tradePaymentTermsType
     * @return self
     */
    public function addToSpecifiedTradePaymentTerms(TradePaymentTermsType $tradePaymentTermsType): self
    {
        $this->specifiedTradePaymentTerms[] = $tradePaymentTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->addTospecifiedTradePaymentTerms($tradePaymentTermsType = new TradePaymentTermsType());

        return $tradePaymentTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->tradeSettlementHeaderMonetarySummationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->tradeSettlementHeaderMonetarySummationType = is_null($this->tradeSettlementHeaderMonetarySummationType) ? new TradeSettlementHeaderMonetarySummationType() : $this->tradeSettlementHeaderMonetarySummationType;

        return $this->tradeSettlementHeaderMonetarySummationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementHeaderMonetarySummationType $tradeSettlementHeaderMonetarySummationType
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        TradeSettlementHeaderMonetarySummationType $tradeSettlementHeaderMonetarySummationType,
    ): self {
        $this->tradeSettlementHeaderMonetarySummationType = $tradeSettlementHeaderMonetarySummationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>|null
     */
    public function getInvoiceReferencedDocument(): ?array
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType> $invoiceReferencedDocument
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToInvoiceReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->invoiceReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToinvoiceReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType>|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType> $receivableSpecifiedTradeAccountingAccount
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType $tradeAccountingAccountType
     * @return self
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $tradeAccountingAccountType,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount[] = $tradeAccountingAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->addToreceivableSpecifiedTradeAccountingAccount($tradeAccountingAccountType = new TradeAccountingAccountType());

        return $tradeAccountingAccountType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType>|null
     */
    public function getSpecifiedAdvancePayment(): ?array
    {
        return $this->specifiedAdvancePayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType> $specifiedAdvancePayment
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType $advancePaymentType
     * @return self
     */
    public function addToSpecifiedAdvancePayment(AdvancePaymentType $advancePaymentType): self
    {
        $this->specifiedAdvancePayment[] = $advancePaymentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        $this->addTospecifiedAdvancePayment($advancePaymentType = new AdvancePaymentType());

        return $advancePaymentType;
    }
}
