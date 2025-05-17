<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\udt\AmountType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class LogisticsServiceChargeType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedAmount", setter="setAppliedAmount")
     */
    private $appliedAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeTax", setter="setAppliedTradeTax")
     */
    private $appliedTradeTax;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $description
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getAppliedAmount(): ?AmountType
    {
        return $this->appliedAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getAppliedAmountWithCreate(): AmountType
    {
        $this->appliedAmount = is_null($this->appliedAmount) ? new AmountType() : $this->appliedAmount;

        return $this->appliedAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType $appliedAmount
     * @return self
     */
    public function setAppliedAmount(AmountType $appliedAmount): self
    {
        $this->appliedAmount = $appliedAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>|null
     */
    public function getAppliedTradeTax(): ?array
    {
        return $this->appliedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType> $appliedTradeTax
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
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType $appliedTradeTax
     * @return self
     */
    public function addToAppliedTradeTax(TradeTaxType $appliedTradeTax): self
    {
        $this->appliedTradeTax[] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToappliedTradeTax($appliedTradeTax = new TradeTaxType());

        return $appliedTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType $appliedTradeTax
     * @return self
     */
    public function addOnceToAppliedTradeTax(TradeTaxType $appliedTradeTax): self
    {
        if (!is_array($this->appliedTradeTax)) {
            $this->appliedTradeTax = [];
        }

        $this->appliedTradeTax[0] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType
     */
    public function addOnceToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->appliedTradeTax)) {
            $this->appliedTradeTax = [];
        }

        if ($this->appliedTradeTax === []) {
            $this->addOnceToappliedTradeTax(new TradeTaxType());
        }

        return $this->appliedTradeTax[0];
    }
}
