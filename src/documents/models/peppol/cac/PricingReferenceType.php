<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class PricingReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|OriginalItemLocationQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OriginalItemLocationQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalItemLocationQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalItemLocationQuantity", setter="setOriginalItemLocationQuantity")
     */
    private $originalItemLocationQuantity;

    /**
     * @var null|array<AlternativeConditionPrice>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AlternativeConditionPrice>")
     * @JMS\Expose
     * @JMS\SerializedName("AlternativeConditionPrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AlternativeConditionPrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAlternativeConditionPrice", setter="setAlternativeConditionPrice")
     */
    private $alternativeConditionPrice;

    /**
     * @return null|OriginalItemLocationQuantity
     */
    public function getOriginalItemLocationQuantity(): ?OriginalItemLocationQuantity
    {
        return $this->originalItemLocationQuantity;
    }

    /**
     * @return OriginalItemLocationQuantity
     */
    public function getOriginalItemLocationQuantityWithCreate(): OriginalItemLocationQuantity
    {
        $this->originalItemLocationQuantity = is_null($this->originalItemLocationQuantity) ? new OriginalItemLocationQuantity() : $this->originalItemLocationQuantity;

        return $this->originalItemLocationQuantity;
    }

    /**
     * @param  null|OriginalItemLocationQuantity $originalItemLocationQuantity
     * @return static
     */
    public function setOriginalItemLocationQuantity(
        ?OriginalItemLocationQuantity $originalItemLocationQuantity = null,
    ): static {
        $this->originalItemLocationQuantity = $originalItemLocationQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalItemLocationQuantity(): static
    {
        $this->originalItemLocationQuantity = null;

        return $this;
    }

    /**
     * @return null|array<AlternativeConditionPrice>
     */
    public function getAlternativeConditionPrice(): ?array
    {
        return $this->alternativeConditionPrice;
    }

    /**
     * @param  null|array<AlternativeConditionPrice> $alternativeConditionPrice
     * @return static
     */
    public function setAlternativeConditionPrice(?array $alternativeConditionPrice = null): static
    {
        $this->alternativeConditionPrice = $alternativeConditionPrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAlternativeConditionPrice(): static
    {
        $this->alternativeConditionPrice = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAlternativeConditionPrice(): static
    {
        $this->alternativeConditionPrice = [];

        return $this;
    }

    /**
     * @return null|AlternativeConditionPrice
     */
    public function firstAlternativeConditionPrice(): ?AlternativeConditionPrice
    {
        $alternativeConditionPrice = $this->alternativeConditionPrice ?? [];
        $alternativeConditionPrice = reset($alternativeConditionPrice);

        if (false === $alternativeConditionPrice) {
            return null;
        }

        return $alternativeConditionPrice;
    }

    /**
     * @return null|AlternativeConditionPrice
     */
    public function lastAlternativeConditionPrice(): ?AlternativeConditionPrice
    {
        $alternativeConditionPrice = $this->alternativeConditionPrice ?? [];
        $alternativeConditionPrice = end($alternativeConditionPrice);

        if (false === $alternativeConditionPrice) {
            return null;
        }

        return $alternativeConditionPrice;
    }

    /**
     * @param  AlternativeConditionPrice $alternativeConditionPrice
     * @return static
     */
    public function addToAlternativeConditionPrice(AlternativeConditionPrice $alternativeConditionPrice): static
    {
        $this->alternativeConditionPrice[] = $alternativeConditionPrice;

        return $this;
    }

    /**
     * @return AlternativeConditionPrice
     */
    public function addToAlternativeConditionPriceWithCreate(): AlternativeConditionPrice
    {
        $this->addToalternativeConditionPrice($alternativeConditionPrice = new AlternativeConditionPrice());

        return $alternativeConditionPrice;
    }

    /**
     * @param  AlternativeConditionPrice $alternativeConditionPrice
     * @return static
     */
    public function addOnceToAlternativeConditionPrice(AlternativeConditionPrice $alternativeConditionPrice): static
    {
        if (!is_array($this->alternativeConditionPrice)) {
            $this->alternativeConditionPrice = [];
        }

        $this->alternativeConditionPrice[0] = $alternativeConditionPrice;

        return $this;
    }

    /**
     * @return AlternativeConditionPrice
     */
    public function addOnceToAlternativeConditionPriceWithCreate(): AlternativeConditionPrice
    {
        if (!is_array($this->alternativeConditionPrice)) {
            $this->alternativeConditionPrice = [];
        }

        if ([] === $this->alternativeConditionPrice) {
            $this->addOnceToalternativeConditionPrice(new AlternativeConditionPrice());
        }

        return $this->alternativeConditionPrice[0];
    }
}
