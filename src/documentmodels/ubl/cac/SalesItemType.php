<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity;

class SalesItemType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ActivityProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getActivityProperty", setter="setActivityProperty")
     */
    private $activityProperty;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxExclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxExclusivePrice", setter="setTaxExclusivePrice")
     */
    private $taxExclusivePrice;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxInclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxInclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxInclusivePrice", setter="setTaxInclusivePrice")
     */
    private $taxInclusivePrice;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\Item|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\Item")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuantity(): self
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty>|null
     */
    public function getActivityProperty(): ?array
    {
        return $this->activityProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty>|null $activityProperty
     * @return self
     */
    public function setActivityProperty(?array $activityProperty = null): self
    {
        $this->activityProperty = $activityProperty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActivityProperty(): self
    {
        $this->activityProperty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearActivityProperty(): self
    {
        $this->activityProperty = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty|null
     */
    public function firstActivityProperty(): ?ActivityProperty
    {
        $activityProperty = $this->activityProperty ?? [];
        $activityProperty = reset($activityProperty);

        if ($activityProperty === false) {
            return null;
        }

        return $activityProperty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty|null
     */
    public function lastActivityProperty(): ?ActivityProperty
    {
        $activityProperty = $this->activityProperty ?? [];
        $activityProperty = end($activityProperty);

        if ($activityProperty === false) {
            return null;
        }

        return $activityProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty $activityProperty
     * @return self
     */
    public function addToActivityProperty(ActivityProperty $activityProperty): self
    {
        $this->activityProperty[] = $activityProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty
     */
    public function addToActivityPropertyWithCreate(): ActivityProperty
    {
        $this->addToactivityProperty($activityProperty = new ActivityProperty());

        return $activityProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty $activityProperty
     * @return self
     */
    public function addOnceToActivityProperty(ActivityProperty $activityProperty): self
    {
        if (!is_array($this->activityProperty)) {
            $this->activityProperty = [];
        }

        $this->activityProperty[0] = $activityProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ActivityProperty
     */
    public function addOnceToActivityPropertyWithCreate(): ActivityProperty
    {
        if (!is_array($this->activityProperty)) {
            $this->activityProperty = [];
        }

        if ($this->activityProperty === []) {
            $this->addOnceToactivityProperty(new ActivityProperty());
        }

        return $this->activityProperty[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice>|null
     */
    public function getTaxExclusivePrice(): ?array
    {
        return $this->taxExclusivePrice;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice>|null $taxExclusivePrice
     * @return self
     */
    public function setTaxExclusivePrice(?array $taxExclusivePrice = null): self
    {
        $this->taxExclusivePrice = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxExclusivePrice(): self
    {
        $this->taxExclusivePrice = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxExclusivePrice(): self
    {
        $this->taxExclusivePrice = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice|null
     */
    public function firstTaxExclusivePrice(): ?TaxExclusivePrice
    {
        $taxExclusivePrice = $this->taxExclusivePrice ?? [];
        $taxExclusivePrice = reset($taxExclusivePrice);

        if ($taxExclusivePrice === false) {
            return null;
        }

        return $taxExclusivePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice|null
     */
    public function lastTaxExclusivePrice(): ?TaxExclusivePrice
    {
        $taxExclusivePrice = $this->taxExclusivePrice ?? [];
        $taxExclusivePrice = end($taxExclusivePrice);

        if ($taxExclusivePrice === false) {
            return null;
        }

        return $taxExclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice $taxExclusivePrice
     * @return self
     */
    public function addToTaxExclusivePrice(TaxExclusivePrice $taxExclusivePrice): self
    {
        $this->taxExclusivePrice[] = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice
     */
    public function addToTaxExclusivePriceWithCreate(): TaxExclusivePrice
    {
        $this->addTotaxExclusivePrice($taxExclusivePrice = new TaxExclusivePrice());

        return $taxExclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice $taxExclusivePrice
     * @return self
     */
    public function addOnceToTaxExclusivePrice(TaxExclusivePrice $taxExclusivePrice): self
    {
        if (!is_array($this->taxExclusivePrice)) {
            $this->taxExclusivePrice = [];
        }

        $this->taxExclusivePrice[0] = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExclusivePrice
     */
    public function addOnceToTaxExclusivePriceWithCreate(): TaxExclusivePrice
    {
        if (!is_array($this->taxExclusivePrice)) {
            $this->taxExclusivePrice = [];
        }

        if ($this->taxExclusivePrice === []) {
            $this->addOnceTotaxExclusivePrice(new TaxExclusivePrice());
        }

        return $this->taxExclusivePrice[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice>|null
     */
    public function getTaxInclusivePrice(): ?array
    {
        return $this->taxInclusivePrice;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice>|null $taxInclusivePrice
     * @return self
     */
    public function setTaxInclusivePrice(?array $taxInclusivePrice = null): self
    {
        $this->taxInclusivePrice = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxInclusivePrice(): self
    {
        $this->taxInclusivePrice = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxInclusivePrice(): self
    {
        $this->taxInclusivePrice = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice|null
     */
    public function firstTaxInclusivePrice(): ?TaxInclusivePrice
    {
        $taxInclusivePrice = $this->taxInclusivePrice ?? [];
        $taxInclusivePrice = reset($taxInclusivePrice);

        if ($taxInclusivePrice === false) {
            return null;
        }

        return $taxInclusivePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice|null
     */
    public function lastTaxInclusivePrice(): ?TaxInclusivePrice
    {
        $taxInclusivePrice = $this->taxInclusivePrice ?? [];
        $taxInclusivePrice = end($taxInclusivePrice);

        if ($taxInclusivePrice === false) {
            return null;
        }

        return $taxInclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice $taxInclusivePrice
     * @return self
     */
    public function addToTaxInclusivePrice(TaxInclusivePrice $taxInclusivePrice): self
    {
        $this->taxInclusivePrice[] = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice
     */
    public function addToTaxInclusivePriceWithCreate(): TaxInclusivePrice
    {
        $this->addTotaxInclusivePrice($taxInclusivePrice = new TaxInclusivePrice());

        return $taxInclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice $taxInclusivePrice
     * @return self
     */
    public function addOnceToTaxInclusivePrice(TaxInclusivePrice $taxInclusivePrice): self
    {
        if (!is_array($this->taxInclusivePrice)) {
            $this->taxInclusivePrice = [];
        }

        $this->taxInclusivePrice[0] = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxInclusivePrice
     */
    public function addOnceToTaxInclusivePriceWithCreate(): TaxInclusivePrice
    {
        if (!is_array($this->taxInclusivePrice)) {
            $this->taxInclusivePrice = [];
        }

        if ($this->taxInclusivePrice === []) {
            $this->addOnceTotaxInclusivePrice(new TaxInclusivePrice());
        }

        return $this->taxInclusivePrice[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item|null
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item = is_null($this->item) ? new Item() : $this->item;

        return $this->item;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Item|null $item
     * @return self
     */
    public function setItem(?Item $item = null): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItem(): self
    {
        $this->item = null;

        return $this;
    }
}
