<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\udt\AmountType;

class TradeSettlementLineMonetarySummationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTotalAmount", setter="setLineTotalAmount")
     */
    private $lineTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeTotalAmount", setter="setChargeTotalAmount")
     */
    private $chargeTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAllowanceTotalAmount", setter="setAllowanceTotalAmount")
     */
    private $allowanceTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxTotalAmount", setter="setTaxTotalAmount")
     */
    private $taxTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("GrandTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGrandTotalAmount", setter="setGrandTotalAmount")
     */
    private $grandTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAllowanceChargeAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTotalAllowanceChargeAmount", setter="setTotalAllowanceChargeAmount")
     */
    private $totalAllowanceChargeAmount;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getLineTotalAmount(): ?AmountType
    {
        return $this->lineTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getLineTotalAmountWithCreate(): AmountType
    {
        $this->lineTotalAmount = is_null($this->lineTotalAmount) ? new AmountType() : $this->lineTotalAmount;

        return $this->lineTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $lineTotalAmount
     * @return self
     */
    public function setLineTotalAmount(?AmountType $lineTotalAmount = null): self
    {
        $this->lineTotalAmount = $lineTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineTotalAmount(): self
    {
        $this->lineTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getChargeTotalAmount(): ?AmountType
    {
        return $this->chargeTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getChargeTotalAmountWithCreate(): AmountType
    {
        $this->chargeTotalAmount = is_null($this->chargeTotalAmount) ? new AmountType() : $this->chargeTotalAmount;

        return $this->chargeTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $chargeTotalAmount
     * @return self
     */
    public function setChargeTotalAmount(?AmountType $chargeTotalAmount = null): self
    {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChargeTotalAmount(): self
    {
        $this->chargeTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getAllowanceTotalAmount(): ?AmountType
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getAllowanceTotalAmountWithCreate(): AmountType
    {
        $this->allowanceTotalAmount = is_null($this->allowanceTotalAmount) ? new AmountType() : $this->allowanceTotalAmount;

        return $this->allowanceTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $allowanceTotalAmount
     * @return self
     */
    public function setAllowanceTotalAmount(?AmountType $allowanceTotalAmount = null): self
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceTotalAmount(): self
    {
        $this->allowanceTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getTaxTotalAmount(): ?AmountType
    {
        return $this->taxTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getTaxTotalAmountWithCreate(): AmountType
    {
        $this->taxTotalAmount = is_null($this->taxTotalAmount) ? new AmountType() : $this->taxTotalAmount;

        return $this->taxTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $taxTotalAmount
     * @return self
     */
    public function setTaxTotalAmount(?AmountType $taxTotalAmount = null): self
    {
        $this->taxTotalAmount = $taxTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxTotalAmount(): self
    {
        $this->taxTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getGrandTotalAmount(): ?AmountType
    {
        return $this->grandTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getGrandTotalAmountWithCreate(): AmountType
    {
        $this->grandTotalAmount = is_null($this->grandTotalAmount) ? new AmountType() : $this->grandTotalAmount;

        return $this->grandTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $grandTotalAmount
     * @return self
     */
    public function setGrandTotalAmount(?AmountType $grandTotalAmount = null): self
    {
        $this->grandTotalAmount = $grandTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGrandTotalAmount(): self
    {
        $this->grandTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getTotalAllowanceChargeAmount(): ?AmountType
    {
        return $this->totalAllowanceChargeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getTotalAllowanceChargeAmountWithCreate(): AmountType
    {
        $this->totalAllowanceChargeAmount = is_null($this->totalAllowanceChargeAmount) ? new AmountType() : $this->totalAllowanceChargeAmount;

        return $this->totalAllowanceChargeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $totalAllowanceChargeAmount
     * @return self
     */
    public function setTotalAllowanceChargeAmount(?AmountType $totalAllowanceChargeAmount = null): self
    {
        $this->totalAllowanceChargeAmount = $totalAllowanceChargeAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalAllowanceChargeAmount(): self
    {
        $this->totalAllowanceChargeAmount = null;

        return $this;
    }
}
