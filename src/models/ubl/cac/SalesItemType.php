<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;

class SalesItemType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ActivityProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ActivityProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ActivityProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getActivityProperty", setter="setActivityProperty")
     */
    private $activityProperty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxExclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxExclusivePrice", setter="setTaxExclusivePrice")
     */
    private $taxExclusivePrice;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxInclusivePrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxInclusivePrice", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxInclusivePrice", setter="setTaxInclusivePrice")
     */
    private $taxInclusivePrice;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Item|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Item")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ActivityProperty>|null
     */
    public function getActivityProperty(): ?array
    {
        return $this->activityProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ActivityProperty>|null $activityProperty
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
    public function clearActivityProperty(): self
    {
        $this->activityProperty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActivityProperty $activityProperty
     * @return self
     */
    public function addToActivityProperty(ActivityProperty $activityProperty): self
    {
        $this->activityProperty[] = $activityProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityProperty
     */
    public function addToActivityPropertyWithCreate(): ActivityProperty
    {
        $this->addToactivityProperty($activityProperty = new ActivityProperty());

        return $activityProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActivityProperty $activityProperty
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityProperty
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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice>|null
     */
    public function getTaxExclusivePrice(): ?array
    {
        return $this->taxExclusivePrice;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice>|null $taxExclusivePrice
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
    public function clearTaxExclusivePrice(): self
    {
        $this->taxExclusivePrice = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice $taxExclusivePrice
     * @return self
     */
    public function addToTaxExclusivePrice(TaxExclusivePrice $taxExclusivePrice): self
    {
        $this->taxExclusivePrice[] = $taxExclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice
     */
    public function addToTaxExclusivePriceWithCreate(): TaxExclusivePrice
    {
        $this->addTotaxExclusivePrice($taxExclusivePrice = new TaxExclusivePrice());

        return $taxExclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice $taxExclusivePrice
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxExclusivePrice
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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice>|null
     */
    public function getTaxInclusivePrice(): ?array
    {
        return $this->taxInclusivePrice;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice>|null $taxInclusivePrice
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
    public function clearTaxInclusivePrice(): self
    {
        $this->taxInclusivePrice = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice $taxInclusivePrice
     * @return self
     */
    public function addToTaxInclusivePrice(TaxInclusivePrice $taxInclusivePrice): self
    {
        $this->taxInclusivePrice[] = $taxInclusivePrice;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice
     */
    public function addToTaxInclusivePriceWithCreate(): TaxInclusivePrice
    {
        $this->addTotaxInclusivePrice($taxInclusivePrice = new TaxInclusivePrice());

        return $taxInclusivePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice $taxInclusivePrice
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxInclusivePrice
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item|null
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item = is_null($this->item) ? new Item() : $this->item;

        return $this->item;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Item|null $item
     * @return self
     */
    public function setItem(?Item $item = null): self
    {
        $this->item = $item;

        return $this;
    }
}
