<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\IndicatorType;
use horstoeko\invoicesuite\models\zugferd\udt\NumericType;
use horstoeko\invoicesuite\models\zugferd\udt\PercentType;
use horstoeko\invoicesuite\models\zugferd\udt\QuantityType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradeAllowanceChargeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeIndicator", setter="setChargeIndicator")
     */
    private $chargeIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\NumericType")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $calculationPercent;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualAmount", setter="setActualAmount")
     */
    private $actualAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReasonCode", setter="setReasonCode")
     */
    private $reasonCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Reason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReason", setter="setReason")
     */
    private $reason;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryTradeTax", setter="setCategoryTradeTax")
     */
    private $categoryTradeTax;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType|null
     */
    public function getChargeIndicator(): ?IndicatorType
    {
        return $this->chargeIndicator;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     */
    public function getChargeIndicatorWithCreate(): IndicatorType
    {
        $this->chargeIndicator = is_null($this->chargeIndicator) ? new IndicatorType() : $this->chargeIndicator;

        return $this->chargeIndicator;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @return self
     */
    public function setChargeIndicator(IndicatorType $chargeIndicator): self
    {
        $this->chargeIndicator = $chargeIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\NumericType|null
     */
    public function getSequenceNumeric(): ?NumericType
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     */
    public function getSequenceNumericWithCreate(): NumericType
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new NumericType() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     * @return self
     */
    public function setSequenceNumeric(NumericType $sequenceNumeric): self
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType|null
     */
    public function getCalculationPercent(): ?PercentType
    {
        return $this->calculationPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     */
    public function getCalculationPercentWithCreate(): PercentType
    {
        $this->calculationPercent = is_null($this->calculationPercent) ? new PercentType() : $this->calculationPercent;

        return $this->calculationPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @return self
     */
    public function setCalculationPercent(PercentType $calculationPercent): self
    {
        $this->calculationPercent = $calculationPercent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setBasisAmount(AmountType $basisAmount): self
    {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @return self
     */
    public function setBasisQuantity(QuantityType $basisQuantity): self
    {
        $this->basisQuantity = $basisQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getActualAmount(): ?AmountType
    {
        return $this->actualAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getActualAmountWithCreate(): AmountType
    {
        $this->actualAmount = is_null($this->actualAmount) ? new AmountType() : $this->actualAmount;

        return $this->actualAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setActualAmount(AmountType $actualAmount): self
    {
        $this->actualAmount = $actualAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType|null
     */
    public function getReasonCode(): ?AllowanceChargeReasonCodeType
    {
        return $this->reasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     */
    public function getReasonCodeWithCreate(): AllowanceChargeReasonCodeType
    {
        $this->reasonCode = is_null($this->reasonCode) ? new AllowanceChargeReasonCodeType() : $this->reasonCode;

        return $this->reasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     * @return self
     */
    public function setReasonCode(AllowanceChargeReasonCodeType $reasonCode): self
    {
        $this->reasonCode = $reasonCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getReason(): ?TextType
    {
        return $this->reason;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getReasonWithCreate(): TextType
    {
        $this->reason = is_null($this->reason) ? new TextType() : $this->reason;

        return $this->reason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setReason(TextType $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType|null
     */
    public function getCategoryTradeTax(): ?TradeTaxType
    {
        return $this->categoryTradeTax;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function getCategoryTradeTaxWithCreate(): TradeTaxType
    {
        $this->categoryTradeTax = is_null($this->categoryTradeTax) ? new TradeTaxType() : $this->categoryTradeTax;

        return $this->categoryTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     * @return self
     */
    public function setCategoryTradeTax(TradeTaxType $categoryTradeTax): self
    {
        $this->categoryTradeTax = $categoryTradeTax;

        return $this;
    }
}
