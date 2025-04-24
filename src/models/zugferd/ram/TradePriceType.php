<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\QuantityType;

class TradePriceType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $chargeAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $basisQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->chargeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->chargeAmount = is_null($this->chargeAmount) ? new AmountType() : $this->chargeAmount;

        return $this->chargeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType $chargeAmount
     * @return self
     */
    public function setChargeAmount(AmountType $chargeAmount): self
    {
        $this->chargeAmount = $chargeAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->basisQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->basisQuantity = is_null($this->basisQuantity) ? new QuantityType() : $this->basisQuantity;

        return $this->basisQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\QuantityType $basisQuantity
     * @return self
     */
    public function setBasisQuantity(QuantityType $basisQuantity): self
    {
        $this->basisQuantity = $basisQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType>|null
     */
    public function getAppliedTradeAllowanceCharge(): ?array
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType> $appliedTradeAllowanceCharge
     * @return self
     */
    public function setAppliedTradeAllowanceCharge(array $appliedTradeAllowanceCharge): self
    {
        $this->appliedTradeAllowanceCharge = $appliedTradeAllowanceCharge;

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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType $appliedTradeAllowanceCharge
     * @return self
     */
    public function addToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $appliedTradeAllowanceCharge): self
    {
        $this->appliedTradeAllowanceCharge[] = $appliedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAllowanceChargeType
     */
    public function addToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToappliedTradeAllowanceCharge($appliedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $appliedTradeAllowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType|null
     */
    public function getIncludedTradeTax(): ?TradeTaxType
    {
        return $this->includedTradeTax;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function getIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->includedTradeTax = is_null($this->includedTradeTax) ? new TradeTaxType() : $this->includedTradeTax;

        return $this->includedTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $includedTradeTax
     * @return self
     */
    public function setIncludedTradeTax(TradeTaxType $includedTradeTax): self
    {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }
}
