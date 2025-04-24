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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeIndicator", setter="setChargeIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\NumericType")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $numericType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $percentType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $quantityType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualAmount", setter="setActualAmount")
     */
    private $actualAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\AllowanceChargeReasonCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReasonCode", setter="setReasonCode")
     */
    private $allowanceChargeReasonCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Reason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReason", setter="setReason")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryTradeTax", setter="setCategoryTradeTax")
     */
    private $tradeTaxType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType|null
     */
    public function getChargeIndicator(): ?\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     */
    public function getChargeIndicatorWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @return self
     */
    public function setChargeIndicator(\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\NumericType|null
     */
    public function getSequenceNumeric(): ?\horstoeko\invoicesuite\models\zugferd\udt\NumericType
    {
        return $this->numericType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     */
    public function getSequenceNumericWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\NumericType
    {
        $this->numericType = is_null($this->numericType) ? new NumericType() : $this->numericType;

        return $this->numericType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\NumericType
     * @return self
     */
    public function setSequenceNumeric(\horstoeko\invoicesuite\models\zugferd\udt\NumericType $numericType): self
    {
        $this->numericType = $numericType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType|null
     */
    public function getCalculationPercent(): ?\horstoeko\invoicesuite\models\zugferd\udt\PercentType
    {
        return $this->percentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     */
    public function getCalculationPercentWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\PercentType
    {
        $this->percentType = is_null($this->percentType) ? new PercentType() : $this->percentType;

        return $this->percentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @return self
     */
    public function setCalculationPercent(
        \horstoeko\invoicesuite\models\zugferd\udt\PercentType $percentType,
    ): self {
        $this->percentType = $percentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getBasisAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getBasisAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setBasisAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->basisAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?\horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        return $this->quantityType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
    {
        $this->quantityType = is_null($this->quantityType) ? new QuantityType() : $this->quantityType;

        return $this->quantityType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @return self
     */
    public function setBasisQuantity(\horstoeko\invoicesuite\models\zugferd\udt\QuantityType $quantityType): self
    {
        $this->quantityType = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getActualAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->actualAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getActualAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->actualAmount = is_null($this->actualAmount) ? new AmountType() : $this->actualAmount;

        return $this->actualAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setActualAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->actualAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType|null
     */
    public function getReasonCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
    {
        return $this->allowanceChargeReasonCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     */
    public function getReasonCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
    {
        $this->allowanceChargeReasonCodeType = is_null($this->allowanceChargeReasonCodeType) ? new AllowanceChargeReasonCodeType() : $this->allowanceChargeReasonCodeType;

        return $this->allowanceChargeReasonCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType
     * @return self
     */
    public function setReasonCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\AllowanceChargeReasonCodeType $allowanceChargeReasonCodeType,
    ): self {
        $this->allowanceChargeReasonCodeType = $allowanceChargeReasonCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getReason(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getReasonWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setReason(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType|null
     */
    public function getCategoryTradeTax(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
    {
        return $this->tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function getCategoryTradeTaxWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
    {
        $this->tradeTaxType = is_null($this->tradeTaxType) ? new TradeTaxType() : $this->tradeTaxType;

        return $this->tradeTaxType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     * @return self
     */
    public function setCategoryTradeTax(\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType): self
    {
        $this->tradeTaxType = $tradeTaxType;

        return $this;
    }
}
