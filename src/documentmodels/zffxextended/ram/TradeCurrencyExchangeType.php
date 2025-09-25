<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType;

class TradeCurrencyExchangeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRate", setter="setConversionRate")
     */
    private $conversionRate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRateDateTime", setter="setConversionRateDateTime")
     */
    private $conversionRateDateTime;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getSourceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType
     */
    public function getSourceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new CurrencyCodeType() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null $sourceCurrencyCode
     * @return self
     */
    public function setSourceCurrencyCode(?CurrencyCodeType $sourceCurrencyCode = null): self
    {
        $this->sourceCurrencyCode = $sourceCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSourceCurrencyCode(): self
    {
        $this->sourceCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getTargetCurrencyCode(): ?CurrencyCodeType
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType
     */
    public function getTargetCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new CurrencyCodeType() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CurrencyCodeType|null $targetCurrencyCode
     * @return self
     */
    public function setTargetCurrencyCode(?CurrencyCodeType $targetCurrencyCode = null): self
    {
        $this->targetCurrencyCode = $targetCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTargetCurrencyCode(): self
    {
        $this->targetCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType|null
     */
    public function getConversionRate(): ?RateType
    {
        return $this->conversionRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType
     */
    public function getConversionRateWithCreate(): RateType
    {
        $this->conversionRate = is_null($this->conversionRate) ? new RateType() : $this->conversionRate;

        return $this->conversionRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\RateType|null $conversionRate
     * @return self
     */
    public function setConversionRate(?RateType $conversionRate = null): self
    {
        $this->conversionRate = $conversionRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConversionRate(): self
    {
        $this->conversionRate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType|null
     */
    public function getConversionRateDateTime(): ?DateTimeType
    {
        return $this->conversionRateDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType
     */
    public function getConversionRateDateTimeWithCreate(): DateTimeType
    {
        $this->conversionRateDateTime = is_null($this->conversionRateDateTime) ? new DateTimeType() : $this->conversionRateDateTime;

        return $this->conversionRateDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\DateTimeType|null $conversionRateDateTime
     * @return self
     */
    public function setConversionRateDateTime(?DateTimeType $conversionRateDateTime = null): self
    {
        $this->conversionRateDateTime = $conversionRateDateTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConversionRateDateTime(): self
    {
        $this->conversionRateDateTime = null;

        return $this;
    }
}
