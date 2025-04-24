<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;

class TradeSettlementHeaderMonetarySummationType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTotalAmount", setter="setLineTotalAmount")
     */
    private $lineTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getChargeTotalAmount", setter="setChargeTotalAmount")
     */
    private $chargeTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAllowanceTotalAmount", setter="setAllowanceTotalAmount")
     */
    private $allowanceTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("TaxBasisTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTaxBasisTotalAmount", setter="setTaxBasisTotalAmount")
     */
    private $taxBasisTotalAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\udt\AmountType>
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\udt\AmountType>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotalAmount", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getTaxTotalAmount", setter="setTaxTotalAmount")
     */
    private $taxTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("RoundingAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRoundingAmount", setter="setRoundingAmount")
     */
    private $roundingAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("GrandTotalAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGrandTotalAmount", setter="setGrandTotalAmount")
     */
    private $grandTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("TotalPrepaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTotalPrepaidAmount", setter="setTotalPrepaidAmount")
     */
    private $totalPrepaidAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("DuePayableAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDuePayableAmount", setter="setDuePayableAmount")
     */
    private $duePayableAmount;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getLineTotalAmount(): ?AmountType
    {
        return $this->lineTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getLineTotalAmountWithCreate(): AmountType
    {
        $this->lineTotalAmount = is_null($this->lineTotalAmount) ? new AmountType() : $this->lineTotalAmount;

        return $this->lineTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setLineTotalAmount(AmountType $lineTotalAmount): self
    {
        $this->lineTotalAmount = $lineTotalAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getChargeTotalAmount(): ?AmountType
    {
        return $this->chargeTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getChargeTotalAmountWithCreate(): AmountType
    {
        $this->chargeTotalAmount = is_null($this->chargeTotalAmount) ? new AmountType() : $this->chargeTotalAmount;

        return $this->chargeTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setChargeTotalAmount(AmountType $chargeTotalAmount): self
    {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getAllowanceTotalAmount(): ?AmountType
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getAllowanceTotalAmountWithCreate(): AmountType
    {
        $this->allowanceTotalAmount = is_null($this->allowanceTotalAmount) ? new AmountType() : $this->allowanceTotalAmount;

        return $this->allowanceTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setAllowanceTotalAmount(AmountType $allowanceTotalAmount): self
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getTaxBasisTotalAmount(): ?AmountType
    {
        return $this->taxBasisTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getTaxBasisTotalAmountWithCreate(): AmountType
    {
        $this->taxBasisTotalAmount = is_null($this->taxBasisTotalAmount) ? new AmountType() : $this->taxBasisTotalAmount;

        return $this->taxBasisTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setTaxBasisTotalAmount(AmountType $taxBasisTotalAmount): self
    {
        $this->taxBasisTotalAmount = $taxBasisTotalAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\udt\AmountType>|null
     */
    public function getTaxTotalAmount(): ?array
    {
        return $this->taxTotalAmount;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\udt\AmountType>
     * @return self
     */
    public function setTaxTotalAmount(array $taxTotalAmount): self
    {
        $this->taxTotalAmount = $taxTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxTotalAmount(): self
    {
        $this->taxTotalAmount = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType $taxTotalAmount
     * @return self
     */
    public function addToTaxTotalAmount(AmountType $taxTotalAmount): self
    {
        $this->taxTotalAmount[] = $taxTotalAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function addToTaxTotalAmountWithCreate(): AmountType
    {
        $this->addTotaxTotalAmount($taxTotalAmount = new AmountType());

        return $taxTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getRoundingAmount(): ?AmountType
    {
        return $this->roundingAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getRoundingAmountWithCreate(): AmountType
    {
        $this->roundingAmount = is_null($this->roundingAmount) ? new AmountType() : $this->roundingAmount;

        return $this->roundingAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setRoundingAmount(AmountType $roundingAmount): self
    {
        $this->roundingAmount = $roundingAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getGrandTotalAmount(): ?AmountType
    {
        return $this->grandTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getGrandTotalAmountWithCreate(): AmountType
    {
        $this->grandTotalAmount = is_null($this->grandTotalAmount) ? new AmountType() : $this->grandTotalAmount;

        return $this->grandTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setGrandTotalAmount(AmountType $grandTotalAmount): self
    {
        $this->grandTotalAmount = $grandTotalAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getTotalPrepaidAmount(): ?AmountType
    {
        return $this->totalPrepaidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getTotalPrepaidAmountWithCreate(): AmountType
    {
        $this->totalPrepaidAmount = is_null($this->totalPrepaidAmount) ? new AmountType() : $this->totalPrepaidAmount;

        return $this->totalPrepaidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setTotalPrepaidAmount(AmountType $totalPrepaidAmount): self
    {
        $this->totalPrepaidAmount = $totalPrepaidAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getDuePayableAmount(): ?AmountType
    {
        return $this->duePayableAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getDuePayableAmountWithCreate(): AmountType
    {
        $this->duePayableAmount = is_null($this->duePayableAmount) ? new AmountType() : $this->duePayableAmount;

        return $this->duePayableAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setDuePayableAmount(AmountType $duePayableAmount): self
    {
        $this->duePayableAmount = $duePayableAmount;

        return $this;
    }
}
