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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $creditorReferenceID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceIssuerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceIssuerReference", setter="setInvoiceIssuerReference")
     */
    private $invoiceIssuerReference;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoicerTradeParty", setter="setInvoicerTradeParty")
     */
    private $invoicerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceeTradeParty", setter="setInvoiceeTradeParty")
     */
    private $invoiceeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerTradeParty", setter="setPayerTradeParty")
     */
    private $payerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxApplicableTradeCurrencyExchange")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxApplicableTradeCurrencyExchange", setter="setTaxApplicableTradeCurrencyExchange")
     */
    private $taxApplicableTradeCurrencyExchange;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $billingSpecifiedPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType>")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType>")
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
    public function getCreditorReferenceID(): ?IDType
    {
        return $this->creditorReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getCreditorReferenceIDWithCreate(): IDType
    {
        $this->creditorReferenceID = is_null($this->creditorReferenceID) ? new IDType() : $this->creditorReferenceID;

        return $this->creditorReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $creditorReferenceID
     * @return self
     */
    public function setCreditorReferenceID(IDType $creditorReferenceID): self
    {
        $this->creditorReferenceID = $creditorReferenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getPaymentReference(): ?TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getPaymentReferenceWithCreate(): TextType
    {
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $paymentReference
     * @return self
     */
    public function setPaymentReference(TextType $paymentReference): self
    {
        $this->paymentReference = $paymentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getTaxCurrencyCode(): ?CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $taxCurrencyCode
     * @return self
     */
    public function setTaxCurrencyCode(CurrencyCodeType $taxCurrencyCode): self
    {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $invoiceCurrencyCode
     * @return self
     */
    public function setInvoiceCurrencyCode(CurrencyCodeType $invoiceCurrencyCode): self
    {
        $this->invoiceCurrencyCode = $invoiceCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getInvoiceIssuerReference(): ?TextType
    {
        return $this->invoiceIssuerReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getInvoiceIssuerReferenceWithCreate(): TextType
    {
        $this->invoiceIssuerReference = is_null($this->invoiceIssuerReference) ? new TextType() : $this->invoiceIssuerReference;

        return $this->invoiceIssuerReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $invoiceIssuerReference
     * @return self
     */
    public function setInvoiceIssuerReference(TextType $invoiceIssuerReference): self
    {
        $this->invoiceIssuerReference = $invoiceIssuerReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getInvoicerTradeParty(): ?TradePartyType
    {
        return $this->invoicerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getInvoicerTradePartyWithCreate(): TradePartyType
    {
        $this->invoicerTradeParty = is_null($this->invoicerTradeParty) ? new TradePartyType() : $this->invoicerTradeParty;

        return $this->invoicerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $invoicerTradeParty
     * @return self
     */
    public function setInvoicerTradeParty(TradePartyType $invoicerTradeParty): self
    {
        $this->invoicerTradeParty = $invoicerTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getInvoiceeTradeParty(): ?TradePartyType
    {
        return $this->invoiceeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getInvoiceeTradePartyWithCreate(): TradePartyType
    {
        $this->invoiceeTradeParty = is_null($this->invoiceeTradeParty) ? new TradePartyType() : $this->invoiceeTradeParty;

        return $this->invoiceeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $invoiceeTradeParty
     * @return self
     */
    public function setInvoiceeTradeParty(TradePartyType $invoiceeTradeParty): self
    {
        $this->invoiceeTradeParty = $invoiceeTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $payeeTradeParty
     * @return self
     */
    public function setPayeeTradeParty(TradePartyType $payeeTradeParty): self
    {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayerTradeParty(): ?TradePartyType
    {
        return $this->payerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayerTradePartyWithCreate(): TradePartyType
    {
        $this->payerTradeParty = is_null($this->payerTradeParty) ? new TradePartyType() : $this->payerTradeParty;

        return $this->payerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $payerTradeParty
     * @return self
     */
    public function setPayerTradeParty(TradePartyType $payerTradeParty): self
    {
        $this->payerTradeParty = $payerTradeParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType|null
     */
    public function getTaxApplicableTradeCurrencyExchange(): ?TradeCurrencyExchangeType
    {
        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchangeWithCreate(): TradeCurrencyExchangeType
    {
        $this->taxApplicableTradeCurrencyExchange = is_null($this->taxApplicableTradeCurrencyExchange) ? new TradeCurrencyExchangeType() : $this->taxApplicableTradeCurrencyExchange;

        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeCurrencyExchangeType $taxApplicableTradeCurrencyExchange
     * @return self
     */
    public function setTaxApplicableTradeCurrencyExchange(
        TradeCurrencyExchangeType $taxApplicableTradeCurrencyExchange,
    ): self {
        $this->taxApplicableTradeCurrencyExchange = $taxApplicableTradeCurrencyExchange;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType> $specifiedTradeSettlementPaymentMeans
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): self {
        $this->specifiedTradeSettlementPaymentMeans[] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        $this->addTospecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeans = new TradeSettlementPaymentMeansType());

        return $specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>|null
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType> $applicableTradeTax
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $applicableTradeTax
     * @return self
     */
    public function addToApplicableTradeTax(TradeTaxType $applicableTradeTax): self
    {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToapplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType|null
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->billingSpecifiedPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->billingSpecifiedPeriod = is_null($this->billingSpecifiedPeriod) ? new SpecifiedPeriodType() : $this->billingSpecifiedPeriod;

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType $billingSpecifiedPeriod
     * @return self
     */
    public function setBillingSpecifiedPeriod(SpecifiedPeriodType $billingSpecifiedPeriod): self
    {
        $this->billingSpecifiedPeriod = $billingSpecifiedPeriod;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType> $specifiedTradeAllowanceCharge
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return self
     */
    public function addToSpecifiedTradeAllowanceCharge(TradeAllowanceChargeType $specifiedTradeAllowanceCharge): self
    {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addTospecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType>|null
     */
    public function getSpecifiedLogisticsServiceCharge(): ?array
    {
        return $this->specifiedLogisticsServiceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType> $specifiedLogisticsServiceCharge
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return self
     */
    public function addToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): self {
        $this->specifiedLogisticsServiceCharge[] = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LogisticsServiceChargeType
     */
    public function addToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        $this->addTospecifiedLogisticsServiceCharge($specifiedLogisticsServiceCharge = new LogisticsServiceChargeType());

        return $specifiedLogisticsServiceCharge;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType>|null
     */
    public function getSpecifiedTradePaymentTerms(): ?array
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType> $specifiedTradePaymentTerms
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType $specifiedTradePaymentTerms
     * @return self
     */
    public function addToSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): self
    {
        $this->specifiedTradePaymentTerms[] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->addTospecifiedTradePaymentTerms($specifiedTradePaymentTerms = new TradePaymentTermsType());

        return $specifiedTradePaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = is_null($this->specifiedTradeSettlementHeaderMonetarySummation) ? new TradeSettlementHeaderMonetarySummationType() : $this->specifiedTradeSettlementHeaderMonetarySummation;

        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation,
    ): self {
        $this->specifiedTradeSettlementHeaderMonetarySummation = $specifiedTradeSettlementHeaderMonetarySummation;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType> $invoiceReferencedDocument
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $invoiceReferencedDocument
     * @return self
     */
    public function addToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): self
    {
        $this->invoiceReferencedDocument[] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToinvoiceReferencedDocument($invoiceReferencedDocument = new ReferencedDocumentType());

        return $invoiceReferencedDocument;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType>|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType> $receivableSpecifiedTradeAccountingAccount
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return self
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount[] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->addToreceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccount = new TradeAccountingAccountType());

        return $receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType>|null
     */
    public function getSpecifiedAdvancePayment(): ?array
    {
        return $this->specifiedAdvancePayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType> $specifiedAdvancePayment
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType $specifiedAdvancePayment
     * @return self
     */
    public function addToSpecifiedAdvancePayment(AdvancePaymentType $specifiedAdvancePayment): self
    {
        $this->specifiedAdvancePayment[] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        $this->addTospecifiedAdvancePayment($specifiedAdvancePayment = new AdvancePaymentType());

        return $specifiedAdvancePayment;
    }
}
