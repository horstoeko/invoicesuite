<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\AmountType;
use horstoeko\invoicesuite\models\zffx\udt\QuantityType;

class TradePriceType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeAmount", setter="setChargeAmount")
     */
    private $amountType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BasisQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBasisQuantity", setter="setBasisQuantity")
     */
    private $quantityType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeAllowanceCharge", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeAllowanceCharge", setter="setAppliedTradeAllowanceCharge")
     */
    private $appliedTradeAllowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeTaxType")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $tradeTaxType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType|null
     */
    public function getChargeAmount(): ?AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getChargeAmountWithCreate(): AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setChargeAmount(AmountType $amountType): self
    {
        $this->amountType = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getBasisQuantity(): ?QuantityType
    {
        return $this->quantityType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getBasisQuantityWithCreate(): QuantityType
    {
        $this->quantityType = is_null($this->quantityType) ? new QuantityType() : $this->quantityType;

        return $this->quantityType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setBasisQuantity(QuantityType $quantityType): self
    {
        $this->quantityType = $quantityType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType>|null
     */
    public function getAppliedTradeAllowanceCharge(): ?array
    {
        return $this->appliedTradeAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType> $appliedTradeAllowanceCharge
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType $tradeAllowanceChargeType
     * @return self
     */
    public function addToAppliedTradeAllowanceCharge(TradeAllowanceChargeType $tradeAllowanceChargeType): self
    {
        $this->appliedTradeAllowanceCharge[] = $tradeAllowanceChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAllowanceChargeType
     */
    public function addToAppliedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToappliedTradeAllowanceCharge($tradeAllowanceChargeType = new TradeAllowanceChargeType());

        return $tradeAllowanceChargeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType|null
     */
    public function getIncludedTradeTax(): ?TradeTaxType
    {
        return $this->tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function getIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->tradeTaxType = is_null($this->tradeTaxType) ? new TradeTaxType() : $this->tradeTaxType;

        return $this->tradeTaxType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function setIncludedTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->tradeTaxType = $tradeTaxType;

        return $this;
    }
}
