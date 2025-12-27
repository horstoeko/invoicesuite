<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType;
use JMS\Serializer\Annotation as JMS;

class TradePriceType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $chargeAmount;

    /**
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var null|array<TradeAllowanceChargeType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @var null|TradeTaxType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
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
        $this->chargeAmount = is_null($this->chargeAmount) ? new AmountType() : $this->chargeAmount;

        return $this->chargeAmount;
    }

    /**
     * @param  null|AmountType $chargeAmount
     * @return static
     */
    public function setChargeAmount(?AmountType $chargeAmount = null): static
    {
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
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param  null|QuantityType $basisQuantity
     * @return static
     */
    public function setBasisQuantity(?QuantityType $basisQuantity = null): static
    {
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
    public function setAppliedTradeAllowanceCharge(?array $appliedTradeAllowanceCharge = null): static
    {
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
    public function addToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): static
    {
        $this->appliedTradeAllowanceCharge[] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToappliedTradeAllowanceCharge($appliedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $appliedTradeAllowanceCharge;
    }

    /**
     * @param  TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return static
     */
    public function addOnceToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): static
    {
        if (!is_array($this->appliedTradeAllowanceCharge)) {
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
        if (!is_array($this->appliedTradeAllowanceCharge)) {
            $this->appliedTradeAllowanceCharge = [];
        }

        if ([] === $this->appliedTradeAllowanceCharge) {
            $this->addOnceToappliedTradeAllowanceCharge(new TradeAllowanceChargeType());
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
        $this->includedTradeTax = is_null($this->includedTradeTax) ? new TradeTaxType() : $this->includedTradeTax;

        return $this->includedTradeTax;
    }

    /**
     * @param  null|TradeTaxType $includedTradeTax
     * @return static
     */
    public function setIncludedTradeTax(?TradeTaxType $includedTradeTax = null): static
    {
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
