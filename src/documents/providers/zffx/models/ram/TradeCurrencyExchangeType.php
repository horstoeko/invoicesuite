<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\RateType;
use JMS\Serializer\Annotation as JMS;

class TradeCurrencyExchangeType
{
    use HandlesObjectFlags;

    /**
     * @var null|CurrencyCodeType
     */
    #[JMS\Accessor(getter: 'getSourceCurrencyCode', setter: 'setSourceCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SourceCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sourceCurrencyCode;

    /**
     * @var null|CurrencyCodeType
     */
    #[JMS\Accessor(getter: 'getTargetCurrencyCode', setter: 'setTargetCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TargetCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CurrencyCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $targetCurrencyCode;

    /**
     * @var null|RateType
     */
    #[JMS\Accessor(getter: 'getConversionRate', setter: 'setConversionRate')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ConversionRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\RateType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $conversionRate;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getConversionRateDateTime', setter: 'setConversionRateDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ConversionRateDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $conversionRateDateTime;

    /**
     * @return null|CurrencyCodeType
     */
    public function getSourceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getSourceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->sourceCurrencyCode ??= new CurrencyCodeType();

        return $this->sourceCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $sourceCurrencyCode
     * @return static
     */
    public function setSourceCurrencyCode(
        ?CurrencyCodeType $sourceCurrencyCode = null
    ): static {
        $this->sourceCurrencyCode = $sourceCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceCurrencyCode(): static
    {
        $this->sourceCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|CurrencyCodeType
     */
    public function getTargetCurrencyCode(): ?CurrencyCodeType
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getTargetCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->targetCurrencyCode ??= new CurrencyCodeType();

        return $this->targetCurrencyCode;
    }

    /**
     * @param  null|CurrencyCodeType $targetCurrencyCode
     * @return static
     */
    public function setTargetCurrencyCode(
        ?CurrencyCodeType $targetCurrencyCode = null
    ): static {
        $this->targetCurrencyCode = $targetCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTargetCurrencyCode(): static
    {
        $this->targetCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|RateType
     */
    public function getConversionRate(): ?RateType
    {
        return $this->conversionRate;
    }

    /**
     * @return RateType
     */
    public function getConversionRateWithCreate(): RateType
    {
        $this->conversionRate ??= new RateType();

        return $this->conversionRate;
    }

    /**
     * @param  null|RateType $conversionRate
     * @return static
     */
    public function setConversionRate(
        ?RateType $conversionRate = null
    ): static {
        $this->conversionRate = $conversionRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConversionRate(): static
    {
        $this->conversionRate = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getConversionRateDateTime(): ?DateTimeType
    {
        return $this->conversionRateDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getConversionRateDateTimeWithCreate(): DateTimeType
    {
        $this->conversionRateDateTime ??= new DateTimeType();

        return $this->conversionRateDateTime;
    }

    /**
     * @param  null|DateTimeType $conversionRateDateTime
     * @return static
     */
    public function setConversionRateDateTime(
        ?DateTimeType $conversionRateDateTime = null
    ): static {
        $this->conversionRateDateTime = $conversionRateDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConversionRateDateTime(): static
    {
        $this->conversionRateDateTime = null;

        return $this;
    }
}
