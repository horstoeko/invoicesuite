<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PricingReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|OriginalItemLocationQuantity
     */
    #[JMS\Accessor(getter: 'getOriginalItemLocationQuantity', setter: 'setOriginalItemLocationQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginalItemLocationQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginalItemLocationQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originalItemLocationQuantity;

    /**
     * @var null|array<AlternativeConditionPrice>
     */
    #[JMS\Accessor(getter: 'getAlternativeConditionPrice', setter: 'setAlternativeConditionPrice')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AlternativeConditionPrice')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AlternativeConditionPrice>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AlternativeConditionPrice', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->originalItemLocationQuantity ??= new OriginalItemLocationQuantity();

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
    public function setAlternativeConditionPrice(
        ?array $alternativeConditionPrice = null
    ): static {
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
    public function addToAlternativeConditionPrice(
        AlternativeConditionPrice $alternativeConditionPrice
    ): static {
        $this->alternativeConditionPrice[] = $alternativeConditionPrice;

        return $this;
    }

    /**
     * @return AlternativeConditionPrice
     */
    public function addToAlternativeConditionPriceWithCreate(): AlternativeConditionPrice
    {
        $this->addToAlternativeConditionPrice($alternativeConditionPrice = new AlternativeConditionPrice());

        return $alternativeConditionPrice;
    }

    /**
     * @param  AlternativeConditionPrice $alternativeConditionPrice
     * @return static
     */
    public function addOnceToAlternativeConditionPrice(
        AlternativeConditionPrice $alternativeConditionPrice
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->alternativeConditionPrice)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->alternativeConditionPrice)) {
            $this->alternativeConditionPrice = [];
        }

        if ([] === $this->alternativeConditionPrice) {
            $this->addOnceToAlternativeConditionPrice(new AlternativeConditionPrice());
        }

        return $this->alternativeConditionPrice[0];
    }
}
