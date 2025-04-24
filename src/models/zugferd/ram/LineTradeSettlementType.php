<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class LineTradeSettlementType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
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
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeAllowanceChargeType>")
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
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeSettlementLineMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementLineMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementLineMonetarySummation", setter="setSpecifiedTradeSettlementLineMonetarySummation")
     */
    private $tradeSettlementLineMonetarySummationType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $referencedDocumentType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType>")
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
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeAccountingAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $tradeAccountingAccountType;

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
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementLineMonetarySummation(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType {
        return $this->tradeSettlementLineMonetarySummationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType
     */
    public function getSpecifiedTradeSettlementLineMonetarySummationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType {
        $this->tradeSettlementLineMonetarySummationType = is_null($this->tradeSettlementLineMonetarySummationType) ? new TradeSettlementLineMonetarySummationType() : $this->tradeSettlementLineMonetarySummationType;

        return $this->tradeSettlementLineMonetarySummationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType
     * @return self
     */
    public function setSpecifiedTradeSettlementLineMonetarySummation(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementLineMonetarySummationType $tradeSettlementLineMonetarySummationType,
    ): self {
        $this->tradeSettlementLineMonetarySummationType = $tradeSettlementLineMonetarySummationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getInvoiceReferencedDocument(): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
    {
        return $this->referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getInvoiceReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->referencedDocumentType = is_null($this->referencedDocumentType) ? new ReferencedDocumentType() : $this->referencedDocumentType;

        return $this->referencedDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setInvoiceReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->referencedDocumentType = $referencedDocumentType;

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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToAdditionalReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->additionalReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->addToadditionalReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType {
        return $this->tradeAccountingAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     */
    public function getReceivableSpecifiedTradeAccountingAccountWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType {
        $this->tradeAccountingAccountType = is_null($this->tradeAccountingAccountType) ? new TradeAccountingAccountType() : $this->tradeAccountingAccountType;

        return $this->tradeAccountingAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeAccountingAccountType $tradeAccountingAccountType,
    ): self {
        $this->tradeAccountingAccountType = $tradeAccountingAccountType;

        return $this;
    }
}
