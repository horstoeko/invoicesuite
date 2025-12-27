<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class LogisticsServiceChargeType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|AmountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAppliedAmount", setter="setAppliedAmount")
     */
    private $appliedAmount;

    /**
     * @var null|array<TradeTaxType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("AppliedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AppliedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAppliedTradeTax", setter="setAppliedTradeTax")
     */
    private $appliedTradeTax;

    /**
     * @return null|TextType
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(?TextType $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getAppliedAmount(): ?AmountType
    {
        return $this->appliedAmount;
    }

    /**
     * @return AmountType
     */
    public function getAppliedAmountWithCreate(): AmountType
    {
        $this->appliedAmount = is_null($this->appliedAmount) ? new AmountType() : $this->appliedAmount;

        return $this->appliedAmount;
    }

    /**
     * @param  null|AmountType $appliedAmount
     * @return static
     */
    public function setAppliedAmount(?AmountType $appliedAmount = null): static
    {
        $this->appliedAmount = $appliedAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppliedAmount(): static
    {
        $this->appliedAmount = null;

        return $this;
    }

    /**
     * @return null|array<TradeTaxType>
     */
    public function getAppliedTradeTax(): ?array
    {
        return $this->appliedTradeTax;
    }

    /**
     * @param  null|array<TradeTaxType> $appliedTradeTax
     * @return static
     */
    public function setAppliedTradeTax(?array $appliedTradeTax = null): static
    {
        $this->appliedTradeTax = $appliedTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppliedTradeTax(): static
    {
        $this->appliedTradeTax = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAppliedTradeTax(): static
    {
        $this->appliedTradeTax = [];

        return $this;
    }

    /**
     * @param  TradeTaxType $appliedTradeTax
     * @return static
     */
    public function addToAppliedTradeTax(TradeTaxType $appliedTradeTax): static
    {
        $this->appliedTradeTax[] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToappliedTradeTax($appliedTradeTax = new TradeTaxType());

        return $appliedTradeTax;
    }

    /**
     * @param  TradeTaxType $appliedTradeTax
     * @return static
     */
    public function addOnceToAppliedTradeTax(TradeTaxType $appliedTradeTax): static
    {
        if (!is_array($this->appliedTradeTax)) {
            $this->appliedTradeTax = [];
        }

        $this->appliedTradeTax[0] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addOnceToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->appliedTradeTax)) {
            $this->appliedTradeTax = [];
        }

        if ([] === $this->appliedTradeTax) {
            $this->addOnceToappliedTradeTax(new TradeTaxType());
        }

        return $this->appliedTradeTax[0];
    }
}
