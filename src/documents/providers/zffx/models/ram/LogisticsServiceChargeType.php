<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class LogisticsServiceChargeType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $description;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getAppliedAmount', setter: 'setAppliedAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AppliedAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $appliedAmount;

    /**
     * @var null|array<TradeTaxType>
     */
    #[JMS\Accessor(getter: 'getAppliedTradeTax', setter: 'setAppliedTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AppliedTradeTax')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AppliedTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
        $this->description ??= new TextType();

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(
        ?TextType $description = null
    ): static {
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
        $this->appliedAmount ??= new AmountType();

        return $this->appliedAmount;
    }

    /**
     * @param  null|AmountType $appliedAmount
     * @return static
     */
    public function setAppliedAmount(
        ?AmountType $appliedAmount = null
    ): static {
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
    public function setAppliedTradeTax(
        ?array $appliedTradeTax = null
    ): static {
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
    public function addToAppliedTradeTax(
        TradeTaxType $appliedTradeTax
    ): static {
        $this->appliedTradeTax[] = $appliedTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToAppliedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToAppliedTradeTax($appliedTradeTax = new TradeTaxType());

        return $appliedTradeTax;
    }

    /**
     * @param  TradeTaxType $appliedTradeTax
     * @return static
     */
    public function addOnceToAppliedTradeTax(
        TradeTaxType $appliedTradeTax
    ): static {
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
            $this->addOnceToAppliedTradeTax(new TradeTaxType());
        }

        return $this->appliedTradeTax[0];
    }
}
