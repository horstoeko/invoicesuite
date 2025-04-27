<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\AmountType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class LogisticsServiceChargeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedAmount", setter="setAppliedAmount")
     */
    private $amountType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeTax", setter="setAppliedTradeTax")
     */
    private $appliedTradeTax;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setDescription(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType|null
     */
    public function getAppliedAmount(): ?AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getAppliedAmountWithCreate(): AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setAppliedAmount(AmountType $amountType): self
    {
        $this->amountType = $amountType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>|null
     */
    public function getAppliedTradeTax(): ?array
    {
        return $this->appliedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType> $appliedTradeTax
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToAppliedTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->appliedTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToappliedTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addOnceToAppliedTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->appliedTradeTax[0] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function addOnceToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        if ($this->appliedTradeTax === []) {
            $this->addOnceToappliedTradeTax(new TradeTaxType());
        }

        return $this->appliedTradeTax[0];
    }
}
