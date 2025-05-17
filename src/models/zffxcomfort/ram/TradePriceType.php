<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType;

class TradePriceType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $chargeAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType|null
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->chargeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->chargeAmount = is_null($this->chargeAmount) ? new AmountType() : $this->chargeAmount;

        return $this->chargeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\AmountType $chargeAmount
     * @return self
     */
    public function setChargeAmount(AmountType $chargeAmount): self
    {
        $this->chargeAmount = $chargeAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType $basisQuantity
     * @return self
     */
    public function setBasisQuantity(QuantityType $basisQuantity): self
    {
        $this->basisQuantity = $basisQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType|null
     */
    public function getAppliedTradeAllowanceCharge(): ?TradeAllowanceChargeType
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType
     */
    public function getAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->appliedTradeAllowanceCharge = is_null($this->appliedTradeAllowanceCharge) ? new TradeAllowanceChargeType() : $this->appliedTradeAllowanceCharge;

        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return self
     */
    public function setAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): self
    {
        $this->appliedTradeAllowanceCharge = $appliedTradeAllowanceCharge;

        return $this;
    }
}
