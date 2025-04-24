<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\AmountType;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffx\udt\MeasureType;
use horstoeko\invoicesuite\models\zffx\udt\PercentType;

class TradePaymentPenaltyTermsType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisDateTime", setter="setBasisDateTime")
     */
    private $dateTimeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\MeasureType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\MeasureType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisPeriodMeasure")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisPeriodMeasure", setter="setBasisPeriodMeasure")
     */
    private $measureType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisAmount", setter="setBasisAmount")
     */
    private $basisAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\PercentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\PercentType")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationPercent")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCalculationPercent", setter="setCalculationPercent")
     */
    private $percentType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPenaltyAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getActualPenaltyAmount", setter="setActualPenaltyAmount")
     */
    private $actualPenaltyAmount;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getBasisDateTime(): ?DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getBasisDateTimeWithCreate(): DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setBasisDateTime(DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\MeasureType|null
     */
    public function getBasisPeriodMeasure(): ?MeasureType
    {
        return $this->measureType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\MeasureType
     */
    public function getBasisPeriodMeasureWithCreate(): MeasureType
    {
        $this->measureType = is_null($this->measureType) ? new MeasureType() : $this->measureType;

        return $this->measureType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\MeasureType $measureType
     * @return self
     */
    public function setBasisPeriodMeasure(MeasureType $measureType): self
    {
        $this->measureType = $measureType;

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
    public function getActualPenaltyAmount(): ?AmountType
    {
        return $this->actualPenaltyAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getActualPenaltyAmountWithCreate(): AmountType
    {
        $this->actualPenaltyAmount = is_null($this->actualPenaltyAmount) ? new AmountType() : $this->actualPenaltyAmount;

        return $this->actualPenaltyAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setActualPenaltyAmount(AmountType $amountType): self
    {
        $this->actualPenaltyAmount = $amountType;

        return $this;
    }
}
