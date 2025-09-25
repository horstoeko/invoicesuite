<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType;

class TradePriceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $chargeAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType|null
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->chargeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->chargeAmount = is_null($this->chargeAmount) ? new AmountType() : $this->chargeAmount;

        return $this->chargeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\AmountType|null $chargeAmount
     * @return self
     */
    public function setChargeAmount(?AmountType $chargeAmount = null): self
    {
        $this->chargeAmount = $chargeAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChargeAmount(): self
    {
        $this->chargeAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\QuantityType|null $basisQuantity
     * @return self
     */
    public function setBasisQuantity(?QuantityType $basisQuantity = null): self
    {
        $this->basisQuantity = $basisQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBasisQuantity(): self
    {
        $this->basisQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null
     */
    public function getAppliedTradeAllowanceCharge(): ?array
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType>|null $appliedTradeAllowanceCharge
     * @return self
     */
    public function setAppliedTradeAllowanceCharge(?array $appliedTradeAllowanceCharge = null): self
    {
        $this->appliedTradeAllowanceCharge = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAppliedTradeAllowanceCharge(): self
    {
        $this->appliedTradeAllowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAppliedTradeAllowanceCharge(): self
    {
        $this->appliedTradeAllowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return self
     */
    public function addToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): self
    {
        $this->appliedTradeAllowanceCharge[] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType
     */
    public function addToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToappliedTradeAllowanceCharge($appliedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $appliedTradeAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return self
     */
    public function addOnceToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): self
    {
        if (!is_array($this->appliedTradeAllowanceCharge)) {
            $this->appliedTradeAllowanceCharge = [];
        }

        $this->appliedTradeAllowanceCharge[0] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeAllowanceChargeType
     */
    public function addOnceToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        if (!is_array($this->appliedTradeAllowanceCharge)) {
            $this->appliedTradeAllowanceCharge = [];
        }

        if ($this->appliedTradeAllowanceCharge === []) {
            $this->addOnceToappliedTradeAllowanceCharge(new TradeAllowanceChargeType());
        }

        return $this->appliedTradeAllowanceCharge[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType|null
     */
    public function getIncludedTradeTax(): ?TradeTaxType
    {
        return $this->includedTradeTax;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType
     */
    public function getIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->includedTradeTax = is_null($this->includedTradeTax) ? new TradeTaxType() : $this->includedTradeTax;

        return $this->includedTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\ram\TradeTaxType|null $includedTradeTax
     * @return self
     */
    public function setIncludedTradeTax(?TradeTaxType $includedTradeTax = null): self
    {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIncludedTradeTax(): self
    {
        $this->includedTradeTax = null;

        return $this;
    }
}
