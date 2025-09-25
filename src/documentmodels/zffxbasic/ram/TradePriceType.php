<?php

namespace horstoeko\invoicesuite\documentmodels\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType;
use horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType;

class TradePriceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $chargeAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxbasic\ram\TradeAllowanceChargeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxbasic\ram\TradeAllowanceChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType|null
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->chargeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->chargeAmount = is_null($this->chargeAmount) ? new AmountType() : $this->chargeAmount;

        return $this->chargeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\AmountType|null $chargeAmount
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\QuantityType|null $basisQuantity
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
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\ram\TradeAllowanceChargeType|null
     */
    public function getAppliedTradeAllowanceCharge(): ?TradeAllowanceChargeType
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\ram\TradeAllowanceChargeType
     */
    public function getAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->appliedTradeAllowanceCharge = is_null($this->appliedTradeAllowanceCharge) ? new TradeAllowanceChargeType() : $this->appliedTradeAllowanceCharge;

        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxbasic\ram\TradeAllowanceChargeType|null $appliedTradeAllowanceCharge
     * @return self
     */
    public function setAppliedTradeAllowanceCharge(
        ?TradeAllowanceChargeType $appliedTradeAllowanceCharge = null,
    ): self {
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
}
