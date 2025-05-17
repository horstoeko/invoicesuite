<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffxextended\udt\RateType;

class TradeCurrencyExchangeType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\RateType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\RateType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRate")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRate", setter="setConversionRate")
     */
    private $conversionRate;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("ConversionRateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getConversionRateDateTime", setter="setConversionRateDateTime")
     */
    private $conversionRateDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getSourceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType
     */
    public function getSourceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new CurrencyCodeType() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType $sourceCurrencyCode
     * @return self
     */
    public function setSourceCurrencyCode(CurrencyCodeType $sourceCurrencyCode): self
    {
        $this->sourceCurrencyCode = $sourceCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType|null
     */
    public function getTargetCurrencyCode(): ?CurrencyCodeType
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType
     */
    public function getTargetCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new CurrencyCodeType() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\qdt\CurrencyCodeType $targetCurrencyCode
     * @return self
     */
    public function setTargetCurrencyCode(CurrencyCodeType $targetCurrencyCode): self
    {
        $this->targetCurrencyCode = $targetCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\RateType|null
     */
    public function getConversionRate(): ?RateType
    {
        return $this->conversionRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\RateType
     */
    public function getConversionRateWithCreate(): RateType
    {
        $this->conversionRate = is_null($this->conversionRate) ? new RateType() : $this->conversionRate;

        return $this->conversionRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\RateType $conversionRate
     * @return self
     */
    public function setConversionRate(RateType $conversionRate): self
    {
        $this->conversionRate = $conversionRate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType|null
     */
    public function getConversionRateDateTime(): ?DateTimeType
    {
        return $this->conversionRateDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType
     */
    public function getConversionRateDateTimeWithCreate(): DateTimeType
    {
        $this->conversionRateDateTime = is_null($this->conversionRateDateTime) ? new DateTimeType() : $this->conversionRateDateTime;

        return $this->conversionRateDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\DateTimeType $conversionRateDateTime
     * @return self
     */
    public function setConversionRateDateTime(DateTimeType $conversionRateDateTime): self
    {
        $this->conversionRateDateTime = $conversionRateDateTime;

        return $this;
    }
}
