<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\MeasureType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType;
use JMS\Serializer\Annotation as JMS;

class TradePaymentDiscountTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getBasisDateTime', setter: 'setBasisDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisDateTime;

    /**
     * @var null|MeasureType
     */
    #[JMS\Accessor(getter: 'getBasisPeriodMeasure', setter: 'setBasisPeriodMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisPeriodMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\MeasureType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisPeriodMeasure;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getBasisAmount', setter: 'setBasisAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisAmount;

    /**
     * @var null|PercentType
     */
    #[JMS\Accessor(getter: 'getCalculationPercent', setter: 'setCalculationPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CalculationPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $calculationPercent;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getActualDiscountAmount', setter: 'setActualDiscountAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ActualDiscountAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $actualDiscountAmount;

    /**
     * @return null|DateTimeType
     */
    public function getBasisDateTime(): ?DateTimeType
    {
        return $this->basisDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getBasisDateTimeWithCreate(): DateTimeType
    {
        $this->basisDateTime ??= new DateTimeType();

        return $this->basisDateTime;
    }

    /**
     * @param  null|DateTimeType $basisDateTime
     * @return static
     */
    public function setBasisDateTime(
        ?DateTimeType $basisDateTime = null
    ): static {
        $this->basisDateTime = $basisDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasisDateTime(): static
    {
        $this->basisDateTime = null;

        return $this;
    }

    /**
     * @return null|MeasureType
     */
    public function getBasisPeriodMeasure(): ?MeasureType
    {
        return $this->basisPeriodMeasure;
    }

    /**
     * @return MeasureType
     */
    public function getBasisPeriodMeasureWithCreate(): MeasureType
    {
        $this->basisPeriodMeasure ??= new MeasureType();

        return $this->basisPeriodMeasure;
    }

    /**
     * @param  null|MeasureType $basisPeriodMeasure
     * @return static
     */
    public function setBasisPeriodMeasure(
        ?MeasureType $basisPeriodMeasure = null
    ): static {
        $this->basisPeriodMeasure = $basisPeriodMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasisPeriodMeasure(): static
    {
        $this->basisPeriodMeasure = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getBasisAmount(): ?AmountType
    {
        return $this->basisAmount;
    }

    /**
     * @return AmountType
     */
    public function getBasisAmountWithCreate(): AmountType
    {
        $this->basisAmount ??= new AmountType();

        return $this->basisAmount;
    }

    /**
     * @param  null|AmountType $basisAmount
     * @return static
     */
    public function setBasisAmount(
        ?AmountType $basisAmount = null
    ): static {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasisAmount(): static
    {
        $this->basisAmount = null;

        return $this;
    }

    /**
     * @return null|PercentType
     */
    public function getCalculationPercent(): ?PercentType
    {
        return $this->calculationPercent;
    }

    /**
     * @return PercentType
     */
    public function getCalculationPercentWithCreate(): PercentType
    {
        $this->calculationPercent ??= new PercentType();

        return $this->calculationPercent;
    }

    /**
     * @param  null|PercentType $calculationPercent
     * @return static
     */
    public function setCalculationPercent(
        ?PercentType $calculationPercent = null
    ): static {
        $this->calculationPercent = $calculationPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationPercent(): static
    {
        $this->calculationPercent = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getActualDiscountAmount(): ?AmountType
    {
        return $this->actualDiscountAmount;
    }

    /**
     * @return AmountType
     */
    public function getActualDiscountAmountWithCreate(): AmountType
    {
        $this->actualDiscountAmount ??= new AmountType();

        return $this->actualDiscountAmount;
    }

    /**
     * @param  null|AmountType $actualDiscountAmount
     * @return static
     */
    public function setActualDiscountAmount(
        ?AmountType $actualDiscountAmount = null
    ): static {
        $this->actualDiscountAmount = $actualDiscountAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDiscountAmount(): static
    {
        $this->actualDiscountAmount = null;

        return $this;
    }
}
