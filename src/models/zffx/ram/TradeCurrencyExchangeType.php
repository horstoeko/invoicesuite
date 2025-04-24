<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffx\udt\RateType;

class TradeCurrencyExchangeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\RateType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\RateType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRate", setter="setConversionRate")
     */
    private $rateType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRateDateTime", setter="setConversionRateDateTime")
     */
    private $dateTimeType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType|null
     */
    public function getSourceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     */
    public function getSourceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new CurrencyCodeType() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType $currencyCodeType
     * @return self
     */
    public function setSourceCurrencyCode(CurrencyCodeType $currencyCodeType): self
    {
        $this->sourceCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType|null
     */
    public function getTargetCurrencyCode(): ?CurrencyCodeType
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType
     */
    public function getTargetCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new CurrencyCodeType() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CurrencyCodeType $currencyCodeType
     * @return self
     */
    public function setTargetCurrencyCode(CurrencyCodeType $currencyCodeType): self
    {
        $this->targetCurrencyCode = $currencyCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\RateType|null
     */
    public function getConversionRate(): ?RateType
    {
        return $this->rateType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\RateType
     */
    public function getConversionRateWithCreate(): RateType
    {
        $this->rateType = is_null($this->rateType) ? new RateType() : $this->rateType;

        return $this->rateType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\RateType $rateType
     * @return self
     */
    public function setConversionRate(RateType $rateType): self
    {
        $this->rateType = $rateType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getConversionRateDateTime(): ?DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getConversionRateDateTimeWithCreate(): DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setConversionRateDateTime(DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }
}
