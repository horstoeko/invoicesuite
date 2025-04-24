<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;

class LineTradeSettlementType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
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
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("BillingSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBillingSpecifiedPeriod", setter="setBillingSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTradeAllowanceCharge", setter="setSpecifiedTradeAllowanceCharge")
     */
    private $specifiedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementLineMonetarySummationType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeSettlementLineMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementLineMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementLineMonetarySummation", setter="setSpecifiedTradeSettlementLineMonetarySummation")
     */
    private $tradeSettlementLineMonetarySummationType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceReferencedDocument", setter="setInvoiceReferencedDocument")
     */
    private $referencedDocumentType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivableSpecifiedTradeAccountingAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReceivableSpecifiedTradeAccountingAccount", setter="setReceivableSpecifiedTradeAccountingAccount")
     */
    private $tradeAccountingAccountType;

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
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementLineMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementLineMonetarySummation(): ?TradeSettlementLineMonetarySummationType
    {
        return $this->tradeSettlementLineMonetarySummationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementLineMonetarySummationType
     */
    public function getSpecifiedTradeSettlementLineMonetarySummationWithCreate(): TradeSettlementLineMonetarySummationType
    {
        $this->tradeSettlementLineMonetarySummationType = is_null($this->tradeSettlementLineMonetarySummationType) ? new TradeSettlementLineMonetarySummationType() : $this->tradeSettlementLineMonetarySummationType;

        return $this->tradeSettlementLineMonetarySummationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementLineMonetarySummationType $tradeSettlementLineMonetarySummationType
     * @return self
     */
    public function setSpecifiedTradeSettlementLineMonetarySummation(
        TradeSettlementLineMonetarySummationType $tradeSettlementLineMonetarySummationType,
    ): self {
        $this->tradeSettlementLineMonetarySummationType = $tradeSettlementLineMonetarySummationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getInvoiceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->referencedDocumentType = is_null($this->referencedDocumentType) ? new ReferencedDocumentType() : $this->referencedDocumentType;

        return $this->referencedDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setInvoiceReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->referencedDocumentType = $referencedDocumentType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>|null
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType> $additionalReferencedDocument
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToAdditionalReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->additionalReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToadditionalReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType|null
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?TradeAccountingAccountType
    {
        return $this->tradeAccountingAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType
     */
    public function getReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->tradeAccountingAccountType = is_null($this->tradeAccountingAccountType) ? new TradeAccountingAccountType() : $this->tradeAccountingAccountType;

        return $this->tradeAccountingAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeAccountingAccountType $tradeAccountingAccountType
     * @return self
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $tradeAccountingAccountType,
    ): self {
        $this->tradeAccountingAccountType = $tradeAccountingAccountType;

        return $this;
    }
}
