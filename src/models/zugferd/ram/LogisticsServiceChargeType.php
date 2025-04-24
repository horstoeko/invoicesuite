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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedAmount", setter="setAppliedAmount")
     */
    private $amountType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeTaxType>")
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
    public function getDescription(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDescription(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getAppliedAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getAppliedAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setAppliedAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->amountType = $amountType;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToAppliedTradeTax(\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType): self
    {
        $this->appliedTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
    {
        $this->addToappliedTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }
}
