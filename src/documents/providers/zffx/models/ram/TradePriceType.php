<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TradePriceType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getChargeAmount', setter: 'setChargeAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ChargeAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $chargeAmount;

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
     * @var null|array<TradeAllowanceChargeType>
     */
    #[JMS\Accessor(getter: 'getAppliedTradeAllowanceCharge', setter: 'setAppliedTradeAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AppliedTradeAllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAllowanceChargeType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AppliedTradeAllowanceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $appliedTradeAllowanceCharge;

    /**
     * @var null|TradeTaxType
     */
    #[JMS\Accessor(getter: 'getIncludedTradeTax', setter: 'setIncludedTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedTradeTax')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $includedTradeTax;

    /**
     * @return null|AmountType
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->chargeAmount;
    }

    /**
     * @return AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->chargeAmount ??= new AmountType();

        return $this->chargeAmount;
    }

    /**
     * @param  null|AmountType $chargeAmount
     * @return static
     */
    public function setChargeAmount(
        ?AmountType $chargeAmount = null
    ): static {
        $this->chargeAmount = $chargeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeAmount(): static
    {
        $this->chargeAmount = null;

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
     * @return null|array<TradeAllowanceChargeType>
     */
    public function getAppliedTradeAllowanceCharge(): ?array
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param  null|array<TradeAllowanceChargeType> $appliedTradeAllowanceCharge
     * @return static
     */
    public function setAppliedTradeAllowanceCharge(
        ?array $appliedTradeAllowanceCharge = null
    ): static {
        $this->appliedTradeAllowanceCharge = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppliedTradeAllowanceCharge(): static
    {
        $this->appliedTradeAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAppliedTradeAllowanceCharge(): static
    {
        $this->appliedTradeAllowanceCharge = [];

        return $this;
    }

    /**
     * @param  TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return static
     */
    public function addToAppliedTradeAllowanceCharge(
        TradeAllowanceChargeType $appliedTradeAllowanceCharge
    ): static {
        $this->appliedTradeAllowanceCharge[] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToAppliedTradeAllowanceCharge($appliedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $appliedTradeAllowanceCharge;
    }

    /**
     * @param  TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return static
     */
    public function addOnceToAppliedTradeAllowanceCharge(
        TradeAllowanceChargeType $appliedTradeAllowanceCharge
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->appliedTradeAllowanceCharge)) {
            $this->appliedTradeAllowanceCharge = [];
        }

        $this->appliedTradeAllowanceCharge[0] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addOnceToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        if (!InvoiceSuiteArrayUtils::is($this->appliedTradeAllowanceCharge)) {
            $this->appliedTradeAllowanceCharge = [];
        }

        if ([] === $this->appliedTradeAllowanceCharge) {
            $this->addOnceToAppliedTradeAllowanceCharge(new TradeAllowanceChargeType());
        }

        return $this->appliedTradeAllowanceCharge[0];
    }

    /**
     * @return null|TradeTaxType
     */
    public function getIncludedTradeTax(): ?TradeTaxType
    {
        return $this->includedTradeTax;
    }

    /**
     * @return TradeTaxType
     */
    public function getIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->includedTradeTax ??= new TradeTaxType();

        return $this->includedTradeTax;
    }

    /**
     * @param  null|TradeTaxType $includedTradeTax
     * @return static
     */
    public function setIncludedTradeTax(
        ?TradeTaxType $includedTradeTax = null
    ): static {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedTradeTax(): static
    {
        $this->includedTradeTax = null;

        return $this;
    }
}
