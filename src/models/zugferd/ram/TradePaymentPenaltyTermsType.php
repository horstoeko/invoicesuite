<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\MeasureType;
use horstoeko\invoicesuite\models\zugferd\udt\PercentType;

class TradePaymentPenaltyTermsType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisDateTime", setter="setBasisDateTime")
     */
    private $dateTimeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisPeriodMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisPeriodMeasure", setter="setBasisPeriodMeasure")
     */
    private $measureType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $percentType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPenaltyAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualPenaltyAmount", setter="setActualPenaltyAmount")
     */
    private $actualPenaltyAmount;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getBasisDateTime(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getBasisDateTimeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setBasisDateTime(\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType|null
     */
    public function getBasisPeriodMeasure(): ?\horstoeko\invoicesuite\models\zugferd\udt\MeasureType
    {
        return $this->measureType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     */
    public function getBasisPeriodMeasureWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
    {
        $this->measureType = is_null($this->measureType) ? new MeasureType() : $this->measureType;

        return $this->measureType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @return self
     */
    public function setBasisPeriodMeasure(
        \horstoeko\invoicesuite\models\zugferd\udt\MeasureType $measureType,
    ): self {
        $this->measureType = $measureType;

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
    public function getActualPenaltyAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->actualPenaltyAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getActualPenaltyAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->actualPenaltyAmount = is_null($this->actualPenaltyAmount) ? new AmountType() : $this->actualPenaltyAmount;

        return $this->actualPenaltyAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setActualPenaltyAmount(
        \horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType,
    ): self {
        $this->actualPenaltyAmount = $amountType;

        return $this;
    }
}
