<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\models\zffx\udt\AmountType;
use horstoeko\invoicesuite\models\zffx\udt\IndicatorType;
use horstoeko\invoicesuite\models\zffx\udt\NumericType;
use horstoeko\invoicesuite\models\zffx\udt\PercentType;
use horstoeko\invoicesuite\models\zffx\udt\QuantityType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradeAllowanceChargeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeIndicator", setter="setChargeIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\NumericType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\NumericType")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $numericType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\PercentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $percentType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $quantityType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualAmount", setter="setActualAmount")
     */
    private $actualAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReasonCode", setter="setReasonCode")
     */
    private $allowanceChargeReasonCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Reason")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReason", setter="setReason")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCategoryTradeTax", setter="setCategoryTradeTax")
     */
    private $tradeTaxType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType|null
     */
    public function getChargeIndicator(): ?IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     */
    public function getChargeIndicatorWithCreate(): IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IndicatorType $indicatorType
     * @return self
     */
    public function setChargeIndicator(IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\NumericType|null
     */
    public function getSequenceNumeric(): ?NumericType
    {
        return $this->numericType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\NumericType
     */
    public function getSequenceNumericWithCreate(): NumericType
    {
        $this->numericType = is_null($this->numericType) ? new NumericType() : $this->numericType;

        return $this->numericType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\NumericType $numericType
     * @return self
     */
    public function setSequenceNumeric(NumericType $numericType): self
    {
        $this->numericType = $numericType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\PercentType|null
     */
    public function getCalculationPercent(): ?PercentType
    {
        return $this->percentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\PercentType
     */
    public function getCalculationPercentWithCreate(): PercentType
    {
        $this->percentType = is_null($this->percentType) ? new PercentType() : $this->percentType;

        return $this->percentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\PercentType $percentType
     * @return self
     */
    public function setCalculationPercent(PercentType $percentType): self
    {
        $this->percentType = $percentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType|null
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount = is_null($this->basisAmount) ? new AmountType() : $this->basisAmount;

        return $this->basisAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setBasisAmount(AmountType $amountType): self
    {
        $this->basisAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->quantityType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->quantityType = is_null($this->quantityType) ? new QuantityType() : $this->quantityType;

        return $this->quantityType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setBasisQuantity(QuantityType $quantityType): self
    {
        $this->quantityType = $quantityType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType|null
     */
    public function getActualAmount(): ?AmountType
    {
        return $this->actualAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getActualAmountWithCreate(): AmountType
    {
        $this->actualAmount = is_null($this->actualAmount) ? new AmountType() : $this->actualAmount;

        return $this->actualAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setActualAmount(AmountType $amountType): self
    {
        $this->actualAmount = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType|null
     */
    public function getReasonCode(): ?AllowanceChargeReasonCodeType
    {
        return $this->allowanceChargeReasonCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType
     */
    public function getReasonCodeWithCreate(): AllowanceChargeReasonCodeType
    {
        $this->allowanceChargeReasonCodeType = is_null($this->allowanceChargeReasonCodeType) ? new AllowanceChargeReasonCodeType() : $this->allowanceChargeReasonCodeType;

        return $this->allowanceChargeReasonCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\AllowanceChargeReasonCodeType $allowanceChargeReasonCodeType
     * @return self
     */
    public function setReasonCode(AllowanceChargeReasonCodeType $allowanceChargeReasonCodeType): self
    {
        $this->allowanceChargeReasonCodeType = $allowanceChargeReasonCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getReason(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getReasonWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setReason(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType|null
     */
    public function getCategoryTradeTax(): ?TradeTaxType
    {
        return $this->tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function getCategoryTradeTaxWithCreate(): TradeTaxType
    {
        $this->tradeTaxType = is_null($this->tradeTaxType) ? new TradeTaxType() : $this->tradeTaxType;

        return $this->tradeTaxType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function setCategoryTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->tradeTaxType = $tradeTaxType;

        return $this;
    }
}
