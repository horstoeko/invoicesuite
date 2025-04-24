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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisDateTime", setter="setBasisDateTime")
     */
    private $basisDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisPeriodMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisPeriodMeasure", setter="setBasisPeriodMeasure")
     */
    private $basisPeriodMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\PercentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $calculationPercent;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPenaltyAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualPenaltyAmount", setter="setActualPenaltyAmount")
     */
    private $actualPenaltyAmount;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getBasisDateTime(): ?DateTimeType
    {
        return $this->basisDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getBasisDateTimeWithCreate(): DateTimeType
    {
        $this->basisDateTime = is_null($this->basisDateTime) ? new DateTimeType() : $this->basisDateTime;

        return $this->basisDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setBasisDateTime(DateTimeType $basisDateTime): self
    {
        $this->basisDateTime = $basisDateTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType|null
     */
    public function getBasisPeriodMeasure(): ?MeasureType
    {
        return $this->basisPeriodMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     */
    public function getBasisPeriodMeasureWithCreate(): MeasureType
    {
        $this->basisPeriodMeasure = is_null($this->basisPeriodMeasure) ? new MeasureType() : $this->basisPeriodMeasure;

        return $this->basisPeriodMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\MeasureType
     * @return self
     */
    public function setBasisPeriodMeasure(MeasureType $basisPeriodMeasure): self
    {
        $this->basisPeriodMeasure = $basisPeriodMeasure;

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
    public function getActualPenaltyAmount(): ?AmountType
    {
        return $this->actualPenaltyAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getActualPenaltyAmountWithCreate(): AmountType
    {
        $this->actualPenaltyAmount = is_null($this->actualPenaltyAmount) ? new AmountType() : $this->actualPenaltyAmount;

        return $this->actualPenaltyAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setActualPenaltyAmount(AmountType $actualPenaltyAmount): self
    {
        $this->actualPenaltyAmount = $actualPenaltyAmount;

        return $this;
    }
}
