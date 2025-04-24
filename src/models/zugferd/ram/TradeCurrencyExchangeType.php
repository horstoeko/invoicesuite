<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\RateType;

class TradeCurrencyExchangeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\RateType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\RateType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRate", setter="setConversionRate")
     */
    private $rateType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRateDateTime", setter="setConversionRateDateTime")
     */
    private $dateTimeType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getSourceCurrencyCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getSourceCurrencyCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new CurrencyCodeType() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @return self
     */
    public function setSourceCurrencyCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $currencyCodeType,
    ): self {
        $this->sourceCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType|null
     */
    public function getTargetCurrencyCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     */
    public function getTargetCurrencyCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
    {
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new CurrencyCodeType() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType
     * @return self
     */
    public function setTargetCurrencyCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\CurrencyCodeType $currencyCodeType,
    ): self {
        $this->targetCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\RateType|null
     */
    public function getConversionRate(): ?\horstoeko\invoicesuite\models\zugferd\udt\RateType
    {
        return $this->rateType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\RateType
     */
    public function getConversionRateWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\RateType
    {
        $this->rateType = is_null($this->rateType) ? new RateType() : $this->rateType;

        return $this->rateType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\RateType
     * @return self
     */
    public function setConversionRate(\horstoeko\invoicesuite\models\zugferd\udt\RateType $rateType): self
    {
        $this->rateType = $rateType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getConversionRateDateTime(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getConversionRateDateTimeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setConversionRateDateTime(
        \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $dateTimeType,
    ): self {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }
}
