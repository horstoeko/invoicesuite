<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType;

class HeaderTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("CreditorReferenceID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCreditorReferenceID", setter="setCreditorReferenceID")
     */
    private $creditorReferenceID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaymentReference", setter="setPaymentReference")
     */
    private $paymentReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceIssuerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceIssuerReference", setter="setInvoiceIssuerReference")
     */
    private $invoiceIssuerReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoicerTradeParty", setter="setInvoicerTradeParty")
     */
    private $invoicerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceeTradeParty", setter="setInvoiceeTradeParty")
     */
    private $invoiceeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerTradeParty", setter="setPayerTradeParty")
     */
    private $payerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeCurrencyExchangeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeCurrencyExchangeType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxApplicableTradeCurrencyExchange")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxApplicableTradeCurrencyExchange", setter="setTaxApplicableTradeCurrencyExchange")
     */
    private $taxApplicableTradeCurrencyExchange;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementPaymentMeans")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeSettlementPaymentMeans", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementPaymentMeans", setter="setSpecifiedTradeSettlementPaymentMeans")
     */
    private $specifiedTradeSettlementPaymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableTradeTax", setter="setApplicableTradeTax")
     */
    private $applicableTradeTax;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\SpecifiedPeriodType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $billingSpecifiedPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsServiceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsServiceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsServiceCharge", setter="setSpecifiedLogisticsServiceCharge")
     */
    private $specifiedLogisticsServiceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradePaymentTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradePaymentTerms", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradePaymentTerms", setter="setSpecifiedTradePaymentTerms")
     */
    private $specifiedTradePaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementHeaderMonetarySummationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivableSpecifiedTradeAccountingAccount", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedAdvancePayment")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedAdvancePayment", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedAdvancePayment", setter="setSpecifiedAdvancePayment")
     */
    private $specifiedAdvancePayment;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     */
    public function getCreditorReferenceID(): ?IDType
    {
        return $this->creditorReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType
     */
    public function getCreditorReferenceIDWithCreate(): IDType
    {
        $this->creditorReferenceID = is_null($this->creditorReferenceID) ? new IDType() : $this->creditorReferenceID;

        return $this->creditorReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null $creditorReferenceID
     * @return self
     */
    public function setCreditorReferenceID(?IDType $creditorReferenceID = null): self
    {
        $this->creditorReferenceID = $creditorReferenceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCreditorReferenceID(): self
    {
        $this->creditorReferenceID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getPaymentReference(): ?TextType
    {
        return $this->paymentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getPaymentReferenceWithCreate(): TextType
    {
        $this->paymentReference = is_null($this->paymentReference) ? new TextType() : $this->paymentReference;

        return $this->paymentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $paymentReference
     * @return self
     */
    public function setPaymentReference(?TextType $paymentReference = null): self
    {
        $this->paymentReference = $paymentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentReference(): self
    {
        $this->paymentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getTaxCurrencyCode(): ?CurrencyCodeType
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType
     */
    public function getTaxCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new CurrencyCodeType() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null $taxCurrencyCode
     * @return self
     */
    public function setTaxCurrencyCode(?CurrencyCodeType $taxCurrencyCode = null): self
    {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxCurrencyCode(): self
    {
        $this->taxCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null $invoiceCurrencyCode
     * @return self
     */
    public function setInvoiceCurrencyCode(?CurrencyCodeType $invoiceCurrencyCode = null): self
    {
        $this->invoiceCurrencyCode = $invoiceCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceCurrencyCode(): self
    {
        $this->invoiceCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getInvoiceIssuerReference(): ?TextType
    {
        return $this->invoiceIssuerReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getInvoiceIssuerReferenceWithCreate(): TextType
    {
        $this->invoiceIssuerReference = is_null($this->invoiceIssuerReference) ? new TextType() : $this->invoiceIssuerReference;

        return $this->invoiceIssuerReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $invoiceIssuerReference
     * @return self
     */
    public function setInvoiceIssuerReference(?TextType $invoiceIssuerReference = null): self
    {
        $this->invoiceIssuerReference = $invoiceIssuerReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceIssuerReference(): self
    {
        $this->invoiceIssuerReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     */
    public function getInvoicerTradeParty(): ?TradePartyType
    {
        return $this->invoicerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType
     */
    public function getInvoicerTradePartyWithCreate(): TradePartyType
    {
        $this->invoicerTradeParty = is_null($this->invoicerTradeParty) ? new TradePartyType() : $this->invoicerTradeParty;

        return $this->invoicerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null $invoicerTradeParty
     * @return self
     */
    public function setInvoicerTradeParty(?TradePartyType $invoicerTradeParty = null): self
    {
        $this->invoicerTradeParty = $invoicerTradeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoicerTradeParty(): self
    {
        $this->invoicerTradeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     */
    public function getInvoiceeTradeParty(): ?TradePartyType
    {
        return $this->invoiceeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType
     */
    public function getInvoiceeTradePartyWithCreate(): TradePartyType
    {
        $this->invoiceeTradeParty = is_null($this->invoiceeTradeParty) ? new TradePartyType() : $this->invoiceeTradeParty;

        return $this->invoiceeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null $invoiceeTradeParty
     * @return self
     */
    public function setInvoiceeTradeParty(?TradePartyType $invoiceeTradeParty = null): self
    {
        $this->invoiceeTradeParty = $invoiceeTradeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceeTradeParty(): self
    {
        $this->invoiceeTradeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null $payeeTradeParty
     * @return self
     */
    public function setPayeeTradeParty(?TradePartyType $payeeTradeParty = null): self
    {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayeeTradeParty(): self
    {
        $this->payeeTradeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null
     */
    public function getPayerTradeParty(): ?TradePartyType
    {
        return $this->payerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType
     */
    public function getPayerTradePartyWithCreate(): TradePartyType
    {
        $this->payerTradeParty = is_null($this->payerTradeParty) ? new TradePartyType() : $this->payerTradeParty;

        return $this->payerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePartyType|null $payerTradeParty
     * @return self
     */
    public function setPayerTradeParty(?TradePartyType $payerTradeParty = null): self
    {
        $this->payerTradeParty = $payerTradeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayerTradeParty(): self
    {
        $this->payerTradeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeCurrencyExchangeType|null
     */
    public function getTaxApplicableTradeCurrencyExchange(): ?TradeCurrencyExchangeType
    {
        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeCurrencyExchangeType
     */
    public function getTaxApplicableTradeCurrencyExchangeWithCreate(): TradeCurrencyExchangeType
    {
        $this->taxApplicableTradeCurrencyExchange = is_null($this->taxApplicableTradeCurrencyExchange) ? new TradeCurrencyExchangeType() : $this->taxApplicableTradeCurrencyExchange;

        return $this->taxApplicableTradeCurrencyExchange;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeCurrencyExchangeType|null $taxApplicableTradeCurrencyExchange
     * @return self
     */
    public function setTaxApplicableTradeCurrencyExchange(
        ?TradeCurrencyExchangeType $taxApplicableTradeCurrencyExchange = null,
    ): self {
        $this->taxApplicableTradeCurrencyExchange = $taxApplicableTradeCurrencyExchange;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxApplicableTradeCurrencyExchange(): self
    {
        $this->taxApplicableTradeCurrencyExchange = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType>|null
     */
    public function getSpecifiedTradeSettlementPaymentMeans(): ?array
    {
        return $this->specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType>|null $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function setSpecifiedTradeSettlementPaymentMeans(?array $specifiedTradeSettlementPaymentMeans = null): self
    {
        $this->specifiedTradeSettlementPaymentMeans = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTradeSettlementPaymentMeans(): self
    {
        $this->specifiedTradeSettlementPaymentMeans = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
     * @return self
     */
    public function addToSpecifiedTradeSettlementPaymentMeans(
        TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans,
    ): self {
        $this->specifiedTradeSettlementPaymentMeans[] = $specifiedTradeSettlementPaymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType
     */
    public function addToSpecifiedTradeSettlementPaymentMeansWithCreate(): TradeSettlementPaymentMeansType
    {
        $this->addTospecifiedTradeSettlementPaymentMeans($specifiedTradeSettlementPaymentMeans = new TradeSettlementPaymentMeansType());

        return $specifiedTradeSettlementPaymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType $specifiedTradeSettlementPaymentMeans
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementPaymentMeansType
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
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType>|null
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType>|null $applicableTradeTax
     * @return self
     */
    public function setApplicableTradeTax(?array $applicableTradeTax = null): self
    {
        $this->applicableTradeTax = $applicableTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetApplicableTradeTax(): self
    {
        $this->applicableTradeTax = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType $applicableTradeTax
     * @return self
     */
    public function addToApplicableTradeTax(TradeTaxType $applicableTradeTax): self
    {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToapplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType $applicableTradeTax
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\SpecifiedPeriodType|null
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->billingSpecifiedPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->billingSpecifiedPeriod = is_null($this->billingSpecifiedPeriod) ? new SpecifiedPeriodType() : $this->billingSpecifiedPeriod;

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\SpecifiedPeriodType|null $billingSpecifiedPeriod
     * @return self
     */
    public function setBillingSpecifiedPeriod(?SpecifiedPeriodType $billingSpecifiedPeriod = null): self
    {
        $this->billingSpecifiedPeriod = $billingSpecifiedPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBillingSpecifiedPeriod(): self
    {
        $this->billingSpecifiedPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null $specifiedTradeAllowanceCharge
     * @return self
     */
    public function setSpecifiedTradeAllowanceCharge(?array $specifiedTradeAllowanceCharge = null): self
    {
        $this->specifiedTradeAllowanceCharge = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTradeAllowanceCharge(): self
    {
        $this->specifiedTradeAllowanceCharge = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return self
     */
    public function addToSpecifiedTradeAllowanceCharge(TradeAllowanceChargeType $specifiedTradeAllowanceCharge): self
    {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addTospecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType $specifiedTradeAllowanceCharge
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType
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
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType>|null
     */
    public function getSpecifiedLogisticsServiceCharge(): ?array
    {
        return $this->specifiedLogisticsServiceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType>|null $specifiedLogisticsServiceCharge
     * @return self
     */
    public function setSpecifiedLogisticsServiceCharge(?array $specifiedLogisticsServiceCharge = null): self
    {
        $this->specifiedLogisticsServiceCharge = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedLogisticsServiceCharge(): self
    {
        $this->specifiedLogisticsServiceCharge = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return self
     */
    public function addToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): self {
        $this->specifiedLogisticsServiceCharge[] = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType
     */
    public function addToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        $this->addTospecifiedLogisticsServiceCharge($specifiedLogisticsServiceCharge = new LogisticsServiceChargeType());

        return $specifiedLogisticsServiceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType $specifiedLogisticsServiceCharge
     * @return self
     */
    public function addOnceToSpecifiedLogisticsServiceCharge(
        LogisticsServiceChargeType $specifiedLogisticsServiceCharge,
    ): self {
        if (!is_array($this->specifiedLogisticsServiceCharge)) {
            $this->specifiedLogisticsServiceCharge = [];
        }

        $this->specifiedLogisticsServiceCharge[0] = $specifiedLogisticsServiceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\LogisticsServiceChargeType
     */
    public function addOnceToSpecifiedLogisticsServiceChargeWithCreate(): LogisticsServiceChargeType
    {
        if (!is_array($this->specifiedLogisticsServiceCharge)) {
            $this->specifiedLogisticsServiceCharge = [];
        }

        if ($this->specifiedLogisticsServiceCharge === []) {
            $this->addOnceTospecifiedLogisticsServiceCharge(new LogisticsServiceChargeType());
        }

        return $this->specifiedLogisticsServiceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType>|null
     */
    public function getSpecifiedTradePaymentTerms(): ?array
    {
        return $this->specifiedTradePaymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType>|null $specifiedTradePaymentTerms
     * @return self
     */
    public function setSpecifiedTradePaymentTerms(?array $specifiedTradePaymentTerms = null): self
    {
        $this->specifiedTradePaymentTerms = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTradePaymentTerms(): self
    {
        $this->specifiedTradePaymentTerms = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType $specifiedTradePaymentTerms
     * @return self
     */
    public function addToSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): self
    {
        $this->specifiedTradePaymentTerms[] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType
     */
    public function addToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        $this->addTospecifiedTradePaymentTerms($specifiedTradePaymentTerms = new TradePaymentTermsType());

        return $specifiedTradePaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType $specifiedTradePaymentTerms
     * @return self
     */
    public function addOnceToSpecifiedTradePaymentTerms(TradePaymentTermsType $specifiedTradePaymentTerms): self
    {
        if (!is_array($this->specifiedTradePaymentTerms)) {
            $this->specifiedTradePaymentTerms = [];
        }

        $this->specifiedTradePaymentTerms[0] = $specifiedTradePaymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradePaymentTermsType
     */
    public function addOnceToSpecifiedTradePaymentTermsWithCreate(): TradePaymentTermsType
    {
        if (!is_array($this->specifiedTradePaymentTerms)) {
            $this->specifiedTradePaymentTerms = [];
        }

        if ($this->specifiedTradePaymentTerms === []) {
            $this->addOnceTospecifiedTradePaymentTerms(new TradePaymentTermsType());
        }

        return $this->specifiedTradePaymentTerms[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = is_null($this->specifiedTradeSettlementHeaderMonetarySummation) ? new TradeSettlementHeaderMonetarySummationType() : $this->specifiedTradeSettlementHeaderMonetarySummation;

        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeSettlementHeaderMonetarySummationType|null $specifiedTradeSettlementHeaderMonetarySummation
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        ?TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation = null,
    ): self {
        $this->specifiedTradeSettlementHeaderMonetarySummation = $specifiedTradeSettlementHeaderMonetarySummation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTradeSettlementHeaderMonetarySummation(): self
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType>|null
     */
    public function getInvoiceReferencedDocument(): ?array
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType>|null $invoiceReferencedDocument
     * @return self
     */
    public function setInvoiceReferencedDocument(?array $invoiceReferencedDocument = null): self
    {
        $this->invoiceReferencedDocument = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceReferencedDocument(): self
    {
        $this->invoiceReferencedDocument = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType $invoiceReferencedDocument
     * @return self
     */
    public function addToInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): self
    {
        $this->invoiceReferencedDocument[] = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType
     */
    public function addToInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToinvoiceReferencedDocument($invoiceReferencedDocument = new ReferencedDocumentType());

        return $invoiceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType $invoiceReferencedDocument
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType
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
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType>|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType>|null $receivableSpecifiedTradeAccountingAccount
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        ?array $receivableSpecifiedTradeAccountingAccount = null,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivableSpecifiedTradeAccountingAccount(): self
    {
        $this->receivableSpecifiedTradeAccountingAccount = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return self
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount[] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->addToreceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccount = new TradeAccountingAccountType());

        return $receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return self
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): self {
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        $this->receivableSpecifiedTradeAccountingAccount[0] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAccountingAccountType
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        if ($this->receivableSpecifiedTradeAccountingAccount === []) {
            $this->addOnceToreceivableSpecifiedTradeAccountingAccount(new TradeAccountingAccountType());
        }

        return $this->receivableSpecifiedTradeAccountingAccount[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType>|null
     */
    public function getSpecifiedAdvancePayment(): ?array
    {
        return $this->specifiedAdvancePayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType>|null $specifiedAdvancePayment
     * @return self
     */
    public function setSpecifiedAdvancePayment(?array $specifiedAdvancePayment = null): self
    {
        $this->specifiedAdvancePayment = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedAdvancePayment(): self
    {
        $this->specifiedAdvancePayment = null;

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
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType $specifiedAdvancePayment
     * @return self
     */
    public function addToSpecifiedAdvancePayment(AdvancePaymentType $specifiedAdvancePayment): self
    {
        $this->specifiedAdvancePayment[] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType
     */
    public function addToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        $this->addTospecifiedAdvancePayment($specifiedAdvancePayment = new AdvancePaymentType());

        return $specifiedAdvancePayment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType $specifiedAdvancePayment
     * @return self
     */
    public function addOnceToSpecifiedAdvancePayment(AdvancePaymentType $specifiedAdvancePayment): self
    {
        if (!is_array($this->specifiedAdvancePayment)) {
            $this->specifiedAdvancePayment = [];
        }

        $this->specifiedAdvancePayment[0] = $specifiedAdvancePayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\AdvancePaymentType
     */
    public function addOnceToSpecifiedAdvancePaymentWithCreate(): AdvancePaymentType
    {
        if (!is_array($this->specifiedAdvancePayment)) {
            $this->specifiedAdvancePayment = [];
        }

        if ($this->specifiedAdvancePayment === []) {
            $this->addOnceTospecifiedAdvancePayment(new AdvancePaymentType());
        }

        return $this->specifiedAdvancePayment[0];
    }
}
