<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class LogisticsServiceChargeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedAmount", setter="setAppliedAmount")
     */
    private $appliedAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeTax", setter="setAppliedTradeTax")
     */
    private $appliedTradeTax;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $description
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getAppliedAmount(): ?AmountType
    {
        return $this->appliedAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getAppliedAmountWithCreate(): AmountType
    {
        $this->appliedAmount = is_null($this->appliedAmount) ? new AmountType() : $this->appliedAmount;

        return $this->appliedAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType $appliedAmount
     * @return self
     */
    public function setAppliedAmount(AmountType $appliedAmount): self
    {
        $this->appliedAmount = $appliedAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>|null
     */
    public function getAppliedTradeTax(): ?array
    {
        return $this->appliedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType> $appliedTradeTax
     * @return self
     */
    public function setAppliedTradeTax(array $appliedTradeTax): self
    {
        $this->appliedTradeTax = $appliedTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAppliedTradeTax(): self
    {
        $this->appliedTradeTax = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $appliedTradeTax
     * @return self
     */
    public function addToAppliedTradeTax(TradeTaxType $appliedTradeTax): self
    {
        $this->appliedTradeTax[] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToappliedTradeTax($appliedTradeTax = new TradeTaxType());

        return $appliedTradeTax;
    }
}
