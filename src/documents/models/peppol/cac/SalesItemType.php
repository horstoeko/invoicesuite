<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class SalesItemType
{
    use HandlesObjectFlags;

    /**
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var null|array<ActivityProperty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ActivityProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ActivityProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getActivityProperty", setter="setActivityProperty")
     */
    private $activityProperty;

    /**
     * @var null|array<TaxExclusivePrice>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TaxExclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxExclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxExclusivePrice", setter="setTaxExclusivePrice")
     */
    private $taxExclusivePrice;

    /**
     * @var null|array<TaxInclusivePrice>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TaxInclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxInclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxInclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxInclusivePrice", setter="setTaxInclusivePrice")
     */
    private $taxInclusivePrice;

    /**
     * @var null|Item
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Item")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|array<ActivityProperty>
     */
    public function getActivityProperty(): ?array
    {
        return $this->activityProperty;
    }

    /**
     * @param  null|array<ActivityProperty> $activityProperty
     * @return static
     */
    public function setActivityProperty(?array $activityProperty = null): static
    {
        $this->activityProperty = $activityProperty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityProperty(): static
    {
        $this->activityProperty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearActivityProperty(): static
    {
        $this->activityProperty = [];

        return $this;
    }

    /**
     * @return null|ActivityProperty
     */
    public function firstActivityProperty(): ?ActivityProperty
    {
        $activityProperty = $this->activityProperty ?? [];
        $activityProperty = reset($activityProperty);

        if (false === $activityProperty) {
            return null;
        }

        return $activityProperty;
    }

    /**
     * @return null|ActivityProperty
     */
    public function lastActivityProperty(): ?ActivityProperty
    {
        $activityProperty = $this->activityProperty ?? [];
        $activityProperty = end($activityProperty);

        if (false === $activityProperty) {
            return null;
        }

        return $activityProperty;
    }

    /**
     * @param  ActivityProperty $activityProperty
     * @return static
     */
    public function addToActivityProperty(ActivityProperty $activityProperty): static
    {
        $this->activityProperty[] = $activityProperty;

        return $this;
    }

    /**
     * @return ActivityProperty
     */
    public function addToActivityPropertyWithCreate(): ActivityProperty
    {
        $this->addToactivityProperty($activityProperty = new ActivityProperty());

        return $activityProperty;
    }

    /**
     * @param  ActivityProperty $activityProperty
     * @return static
     */
    public function addOnceToActivityProperty(ActivityProperty $activityProperty): static
    {
        if (!is_array($this->activityProperty)) {
            $this->activityProperty = [];
        }

        $this->activityProperty[0] = $activityProperty;

        return $this;
    }

    /**
     * @return ActivityProperty
     */
    public function addOnceToActivityPropertyWithCreate(): ActivityProperty
    {
        if (!is_array($this->activityProperty)) {
            $this->activityProperty = [];
        }

        if ([] === $this->activityProperty) {
            $this->addOnceToactivityProperty(new ActivityProperty());
        }

        return $this->activityProperty[0];
    }

    /**
     * @return null|array<TaxExclusivePrice>
     */
    public function getTaxExclusivePrice(): ?array
    {
        return $this->taxExclusivePrice;
    }

    /**
     * @param  null|array<TaxExclusivePrice> $taxExclusivePrice
     * @return static
     */
    public function setTaxExclusivePrice(?array $taxExclusivePrice = null): static
    {
        $this->taxExclusivePrice = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxExclusivePrice(): static
    {
        $this->taxExclusivePrice = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxExclusivePrice(): static
    {
        $this->taxExclusivePrice = [];

        return $this;
    }

    /**
     * @return null|TaxExclusivePrice
     */
    public function firstTaxExclusivePrice(): ?TaxExclusivePrice
    {
        $taxExclusivePrice = $this->taxExclusivePrice ?? [];
        $taxExclusivePrice = reset($taxExclusivePrice);

        if (false === $taxExclusivePrice) {
            return null;
        }

        return $taxExclusivePrice;
    }

    /**
     * @return null|TaxExclusivePrice
     */
    public function lastTaxExclusivePrice(): ?TaxExclusivePrice
    {
        $taxExclusivePrice = $this->taxExclusivePrice ?? [];
        $taxExclusivePrice = end($taxExclusivePrice);

        if (false === $taxExclusivePrice) {
            return null;
        }

        return $taxExclusivePrice;
    }

    /**
     * @param  TaxExclusivePrice $taxExclusivePrice
     * @return static
     */
    public function addToTaxExclusivePrice(TaxExclusivePrice $taxExclusivePrice): static
    {
        $this->taxExclusivePrice[] = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return TaxExclusivePrice
     */
    public function addToTaxExclusivePriceWithCreate(): TaxExclusivePrice
    {
        $this->addTotaxExclusivePrice($taxExclusivePrice = new TaxExclusivePrice());

        return $taxExclusivePrice;
    }

    /**
     * @param  TaxExclusivePrice $taxExclusivePrice
     * @return static
     */
    public function addOnceToTaxExclusivePrice(TaxExclusivePrice $taxExclusivePrice): static
    {
        if (!is_array($this->taxExclusivePrice)) {
            $this->taxExclusivePrice = [];
        }

        $this->taxExclusivePrice[0] = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return TaxExclusivePrice
     */
    public function addOnceToTaxExclusivePriceWithCreate(): TaxExclusivePrice
    {
        if (!is_array($this->taxExclusivePrice)) {
            $this->taxExclusivePrice = [];
        }

        if ([] === $this->taxExclusivePrice) {
            $this->addOnceTotaxExclusivePrice(new TaxExclusivePrice());
        }

        return $this->taxExclusivePrice[0];
    }

    /**
     * @return null|array<TaxInclusivePrice>
     */
    public function getTaxInclusivePrice(): ?array
    {
        return $this->taxInclusivePrice;
    }

    /**
     * @param  null|array<TaxInclusivePrice> $taxInclusivePrice
     * @return static
     */
    public function setTaxInclusivePrice(?array $taxInclusivePrice = null): static
    {
        $this->taxInclusivePrice = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxInclusivePrice(): static
    {
        $this->taxInclusivePrice = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxInclusivePrice(): static
    {
        $this->taxInclusivePrice = [];

        return $this;
    }

    /**
     * @return null|TaxInclusivePrice
     */
    public function firstTaxInclusivePrice(): ?TaxInclusivePrice
    {
        $taxInclusivePrice = $this->taxInclusivePrice ?? [];
        $taxInclusivePrice = reset($taxInclusivePrice);

        if (false === $taxInclusivePrice) {
            return null;
        }

        return $taxInclusivePrice;
    }

    /**
     * @return null|TaxInclusivePrice
     */
    public function lastTaxInclusivePrice(): ?TaxInclusivePrice
    {
        $taxInclusivePrice = $this->taxInclusivePrice ?? [];
        $taxInclusivePrice = end($taxInclusivePrice);

        if (false === $taxInclusivePrice) {
            return null;
        }

        return $taxInclusivePrice;
    }

    /**
     * @param  TaxInclusivePrice $taxInclusivePrice
     * @return static
     */
    public function addToTaxInclusivePrice(TaxInclusivePrice $taxInclusivePrice): static
    {
        $this->taxInclusivePrice[] = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return TaxInclusivePrice
     */
    public function addToTaxInclusivePriceWithCreate(): TaxInclusivePrice
    {
        $this->addTotaxInclusivePrice($taxInclusivePrice = new TaxInclusivePrice());

        return $taxInclusivePrice;
    }

    /**
     * @param  TaxInclusivePrice $taxInclusivePrice
     * @return static
     */
    public function addOnceToTaxInclusivePrice(TaxInclusivePrice $taxInclusivePrice): static
    {
        if (!is_array($this->taxInclusivePrice)) {
            $this->taxInclusivePrice = [];
        }

        $this->taxInclusivePrice[0] = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return TaxInclusivePrice
     */
    public function addOnceToTaxInclusivePriceWithCreate(): TaxInclusivePrice
    {
        if (!is_array($this->taxInclusivePrice)) {
            $this->taxInclusivePrice = [];
        }

        if ([] === $this->taxInclusivePrice) {
            $this->addOnceTotaxInclusivePrice(new TaxInclusivePrice());
        }

        return $this->taxInclusivePrice[0];
    }

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item = is_null($this->item) ? new Item() : $this->item;

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(?Item $item = null): static
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItem(): static
    {
        $this->item = null;

        return $this;
    }
}
