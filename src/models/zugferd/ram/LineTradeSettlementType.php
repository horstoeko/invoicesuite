<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class LineTradeSettlementType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
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
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $billingSpecifiedPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementLineMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementLineMonetarySummation", setter="setSpecifiedTradeSettlementLineMonetarySummation")
     */
    private $specifiedTradeSettlementLineMonetarySummation;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $invoiceReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $receivableSpecifiedTradeAccountingAccount;

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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
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
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementLineMonetarySummation(): ?TradeSettlementLineMonetarySummationType
    {
        return $this->specifiedTradeSettlementLineMonetarySummation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType
     */
    public function getSpecifiedTradeSettlementLineMonetarySummationWithCreate(
    ): TradeSettlementLineMonetarySummationType {
        $this->specifiedTradeSettlementLineMonetarySummation = is_null($this->specifiedTradeSettlementLineMonetarySummation) ? new TradeSettlementLineMonetarySummationType() : $this->specifiedTradeSettlementLineMonetarySummation;

        return $this->specifiedTradeSettlementLineMonetarySummation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType
     * @return self
     */
    public function setSpecifiedTradeSettlementLineMonetarySummation(
        TradeSettlementLineMonetarySummationType $specifiedTradeSettlementLineMonetarySummation,
    ): self {
        $this->specifiedTradeSettlementLineMonetarySummation = $specifiedTradeSettlementLineMonetarySummation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getInvoiceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->invoiceReferencedDocument = is_null($this->invoiceReferencedDocument) ? new ReferencedDocumentType() : $this->invoiceReferencedDocument;

        return $this->invoiceReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setInvoiceReferencedDocument(ReferencedDocumentType $invoiceReferencedDocument): self
    {
        $this->invoiceReferencedDocument = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>|null
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @return self
     */
    public function setAdditionalReferencedDocument(array $additionalReferencedDocument): self
    {
        $this->additionalReferencedDocument = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalReferencedDocument(): self
    {
        $this->additionalReferencedDocument = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $additionalReferencedDocument
     * @return self
     */
    public function addToAdditionalReferencedDocument(ReferencedDocumentType $additionalReferencedDocument): self
    {
        $this->additionalReferencedDocument[] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToadditionalReferencedDocument($additionalReferencedDocument = new ReferencedDocumentType());

        return $additionalReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?TradeAccountingAccountType
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     */
    public function getReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->receivableSpecifiedTradeAccountingAccount = is_null($this->receivableSpecifiedTradeAccountingAccount) ? new TradeAccountingAccountType() : $this->receivableSpecifiedTradeAccountingAccount;

        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): self {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }
}
