<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AllowanceChargeReasonCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\NumericType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\PercentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeAllowanceChargeType
{
    use HandlesObjectFlags;

    /**
     * @var null|IndicatorType
     */
    #[JMS\Accessor(getter: 'getChargeIndicator', setter: 'setChargeIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ChargeIndicator')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $chargeIndicator;

    /**
     * @var null|NumericType
     */
    #[JMS\Accessor(getter: 'getSequenceNumeric', setter: 'setSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\NumericType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sequenceNumeric;

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
    #[JMS\Accessor(getter: 'getBasisAmount', setter: 'setBasisAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisAmount;

    /**
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getBasisQuantity', setter: 'setBasisQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BasisQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $basisQuantity;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getActualAmount', setter: 'setActualAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ActualAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $actualAmount;

    /**
     * @var null|AllowanceChargeReasonCodeType
     */
    #[JMS\Accessor(getter: 'getReasonCode', setter: 'setReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AllowanceChargeReasonCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $reasonCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getReason', setter: 'setReason')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Reason')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $reason;

    /**
     * @var null|TradeTaxType
     */
    #[JMS\Accessor(getter: 'getCategoryTradeTax', setter: 'setCategoryTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CategoryTradeTax')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $categoryTradeTax;

    /**
     * @return null|IndicatorType
     */
    public function getChargeIndicator(): ?IndicatorType
    {
        return $this->chargeIndicator;
    }

    /**
     * @return IndicatorType
     */
    public function getChargeIndicatorWithCreate(): IndicatorType
    {
        $this->chargeIndicator ??= new IndicatorType();

        return $this->chargeIndicator;
    }

    /**
     * @param  null|IndicatorType $chargeIndicator
     * @return static
     */
    public function setChargeIndicator(
        ?IndicatorType $chargeIndicator = null
    ): static {
        $this->chargeIndicator = $chargeIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeIndicator(): static
    {
        $this->chargeIndicator = null;

        return $this;
    }

    /**
     * @return null|NumericType
     */
    public function getSequenceNumeric(): ?NumericType
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return NumericType
     */
    public function getSequenceNumericWithCreate(): NumericType
    {
        $this->sequenceNumeric ??= new NumericType();

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|NumericType $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(
        ?NumericType $sequenceNumeric = null
    ): static {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

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
     * @return null|QuantityType
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity ??= new QuantityType();

        return $this->basisQuantity;
    }

    /**
     * @param  null|QuantityType $basisQuantity
     * @return static
     */
    public function setBasisQuantity(
        ?QuantityType $basisQuantity = null
    ): static {
        $this->basisQuantity = $basisQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasisQuantity(): static
    {
        $this->basisQuantity = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getActualAmount(): ?AmountType
    {
        return $this->actualAmount;
    }

    /**
     * @return AmountType
     */
    public function getActualAmountWithCreate(): AmountType
    {
        $this->actualAmount ??= new AmountType();

        return $this->actualAmount;
    }

    /**
     * @param  null|AmountType $actualAmount
     * @return static
     */
    public function setActualAmount(
        ?AmountType $actualAmount = null
    ): static {
        $this->actualAmount = $actualAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualAmount(): static
    {
        $this->actualAmount = null;

        return $this;
    }

    /**
     * @return null|AllowanceChargeReasonCodeType
     */
    public function getReasonCode(): ?AllowanceChargeReasonCodeType
    {
        return $this->reasonCode;
    }

    /**
     * @return AllowanceChargeReasonCodeType
     */
    public function getReasonCodeWithCreate(): AllowanceChargeReasonCodeType
    {
        $this->reasonCode ??= new AllowanceChargeReasonCodeType();

        return $this->reasonCode;
    }

    /**
     * @param  null|AllowanceChargeReasonCodeType $reasonCode
     * @return static
     */
    public function setReasonCode(
        ?AllowanceChargeReasonCodeType $reasonCode = null
    ): static {
        $this->reasonCode = $reasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReasonCode(): static
    {
        $this->reasonCode = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getReason(): ?TextType
    {
        return $this->reason;
    }

    /**
     * @return TextType
     */
    public function getReasonWithCreate(): TextType
    {
        $this->reason ??= new TextType();

        return $this->reason;
    }

    /**
     * @param  null|TextType $reason
     * @return static
     */
    public function setReason(
        ?TextType $reason = null
    ): static {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReason(): static
    {
        $this->reason = null;

        return $this;
    }

    /**
     * @return null|TradeTaxType
     */
    public function getCategoryTradeTax(): ?TradeTaxType
    {
        return $this->categoryTradeTax;
    }

    /**
     * @return TradeTaxType
     */
    public function getCategoryTradeTaxWithCreate(): TradeTaxType
    {
        $this->categoryTradeTax ??= new TradeTaxType();

        return $this->categoryTradeTax;
    }

    /**
     * @param  null|TradeTaxType $categoryTradeTax
     * @return static
     */
    public function setCategoryTradeTax(
        ?TradeTaxType $categoryTradeTax = null
    ): static {
        $this->categoryTradeTax = $categoryTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCategoryTradeTax(): static
    {
        $this->categoryTradeTax = null;

        return $this;
    }
}
