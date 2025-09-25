<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent;

class ItemManagementProfileType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("FrozenPeriodDaysNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFrozenPeriodDaysNumeric", setter="setFrozenPeriodDaysNumeric")
     */
    private $frozenPeriodDaysNumeric;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumInventoryQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumInventoryQuantity", setter="setMinimumInventoryQuantity")
     */
    private $minimumInventoryQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MultipleOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMultipleOrderQuantity", setter="setMultipleOrderQuantity")
     */
    private $multipleOrderQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("OrderIntervalDaysNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderIntervalDaysNumeric", setter="setOrderIntervalDaysNumeric")
     */
    private $orderIntervalDaysNumeric;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplenishmentOwnerDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplenishmentOwnerDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getReplenishmentOwnerDescription", setter="setReplenishmentOwnerDescription")
     */
    private $replenishmentOwnerDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent")
     * @JMS\Expose
     * @JMS\SerializedName("TargetServicePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetServicePercent", setter="setTargetServicePercent")
     */
    private $targetServicePercent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TargetInventoryQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetInventoryQuantity", setter="setTargetInventoryQuantity")
     */
    private $targetInventoryQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\EffectivePeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\EffectivePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EffectivePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEffectivePeriod", setter="setEffectivePeriod")
     */
    private $effectivePeriod;

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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemLocationQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ItemLocationQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ItemLocationQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemLocationQuantity", setter="setItemLocationQuantity")
     */
    private $itemLocationQuantity;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric|null
     */
    public function getFrozenPeriodDaysNumeric(): ?FrozenPeriodDaysNumeric
    {
        return $this->frozenPeriodDaysNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric
     */
    public function getFrozenPeriodDaysNumericWithCreate(): FrozenPeriodDaysNumeric
    {
        $this->frozenPeriodDaysNumeric = is_null($this->frozenPeriodDaysNumeric) ? new FrozenPeriodDaysNumeric() : $this->frozenPeriodDaysNumeric;

        return $this->frozenPeriodDaysNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FrozenPeriodDaysNumeric|null $frozenPeriodDaysNumeric
     * @return self
     */
    public function setFrozenPeriodDaysNumeric(?FrozenPeriodDaysNumeric $frozenPeriodDaysNumeric = null): self
    {
        $this->frozenPeriodDaysNumeric = $frozenPeriodDaysNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFrozenPeriodDaysNumeric(): self
    {
        $this->frozenPeriodDaysNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity|null
     */
    public function getMinimumInventoryQuantity(): ?MinimumInventoryQuantity
    {
        return $this->minimumInventoryQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity
     */
    public function getMinimumInventoryQuantityWithCreate(): MinimumInventoryQuantity
    {
        $this->minimumInventoryQuantity = is_null($this->minimumInventoryQuantity) ? new MinimumInventoryQuantity() : $this->minimumInventoryQuantity;

        return $this->minimumInventoryQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumInventoryQuantity|null $minimumInventoryQuantity
     * @return self
     */
    public function setMinimumInventoryQuantity(?MinimumInventoryQuantity $minimumInventoryQuantity = null): self
    {
        $this->minimumInventoryQuantity = $minimumInventoryQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumInventoryQuantity(): self
    {
        $this->minimumInventoryQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity|null
     */
    public function getMultipleOrderQuantity(): ?MultipleOrderQuantity
    {
        return $this->multipleOrderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity
     */
    public function getMultipleOrderQuantityWithCreate(): MultipleOrderQuantity
    {
        $this->multipleOrderQuantity = is_null($this->multipleOrderQuantity) ? new MultipleOrderQuantity() : $this->multipleOrderQuantity;

        return $this->multipleOrderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MultipleOrderQuantity|null $multipleOrderQuantity
     * @return self
     */
    public function setMultipleOrderQuantity(?MultipleOrderQuantity $multipleOrderQuantity = null): self
    {
        $this->multipleOrderQuantity = $multipleOrderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMultipleOrderQuantity(): self
    {
        $this->multipleOrderQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric|null
     */
    public function getOrderIntervalDaysNumeric(): ?OrderIntervalDaysNumeric
    {
        return $this->orderIntervalDaysNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric
     */
    public function getOrderIntervalDaysNumericWithCreate(): OrderIntervalDaysNumeric
    {
        $this->orderIntervalDaysNumeric = is_null($this->orderIntervalDaysNumeric) ? new OrderIntervalDaysNumeric() : $this->orderIntervalDaysNumeric;

        return $this->orderIntervalDaysNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderIntervalDaysNumeric|null $orderIntervalDaysNumeric
     * @return self
     */
    public function setOrderIntervalDaysNumeric(?OrderIntervalDaysNumeric $orderIntervalDaysNumeric = null): self
    {
        $this->orderIntervalDaysNumeric = $orderIntervalDaysNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderIntervalDaysNumeric(): self
    {
        $this->orderIntervalDaysNumeric = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription>|null
     */
    public function getReplenishmentOwnerDescription(): ?array
    {
        return $this->replenishmentOwnerDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription>|null $replenishmentOwnerDescription
     * @return self
     */
    public function setReplenishmentOwnerDescription(?array $replenishmentOwnerDescription = null): self
    {
        $this->replenishmentOwnerDescription = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReplenishmentOwnerDescription(): self
    {
        $this->replenishmentOwnerDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReplenishmentOwnerDescription(): self
    {
        $this->replenishmentOwnerDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription|null
     */
    public function firstReplenishmentOwnerDescription(): ?ReplenishmentOwnerDescription
    {
        $replenishmentOwnerDescription = $this->replenishmentOwnerDescription ?? [];
        $replenishmentOwnerDescription = reset($replenishmentOwnerDescription);

        if ($replenishmentOwnerDescription === false) {
            return null;
        }

        return $replenishmentOwnerDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription|null
     */
    public function lastReplenishmentOwnerDescription(): ?ReplenishmentOwnerDescription
    {
        $replenishmentOwnerDescription = $this->replenishmentOwnerDescription ?? [];
        $replenishmentOwnerDescription = end($replenishmentOwnerDescription);

        if ($replenishmentOwnerDescription === false) {
            return null;
        }

        return $replenishmentOwnerDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription $replenishmentOwnerDescription
     * @return self
     */
    public function addToReplenishmentOwnerDescription(
        ReplenishmentOwnerDescription $replenishmentOwnerDescription,
    ): self {
        $this->replenishmentOwnerDescription[] = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription
     */
    public function addToReplenishmentOwnerDescriptionWithCreate(): ReplenishmentOwnerDescription
    {
        $this->addToreplenishmentOwnerDescription($replenishmentOwnerDescription = new ReplenishmentOwnerDescription());

        return $replenishmentOwnerDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription $replenishmentOwnerDescription
     * @return self
     */
    public function addOnceToReplenishmentOwnerDescription(
        ReplenishmentOwnerDescription $replenishmentOwnerDescription,
    ): self {
        if (!is_array($this->replenishmentOwnerDescription)) {
            $this->replenishmentOwnerDescription = [];
        }

        $this->replenishmentOwnerDescription[0] = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReplenishmentOwnerDescription
     */
    public function addOnceToReplenishmentOwnerDescriptionWithCreate(): ReplenishmentOwnerDescription
    {
        if (!is_array($this->replenishmentOwnerDescription)) {
            $this->replenishmentOwnerDescription = [];
        }

        if ($this->replenishmentOwnerDescription === []) {
            $this->addOnceToreplenishmentOwnerDescription(new ReplenishmentOwnerDescription());
        }

        return $this->replenishmentOwnerDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent|null
     */
    public function getTargetServicePercent(): ?TargetServicePercent
    {
        return $this->targetServicePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent
     */
    public function getTargetServicePercentWithCreate(): TargetServicePercent
    {
        $this->targetServicePercent = is_null($this->targetServicePercent) ? new TargetServicePercent() : $this->targetServicePercent;

        return $this->targetServicePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetServicePercent|null $targetServicePercent
     * @return self
     */
    public function setTargetServicePercent(?TargetServicePercent $targetServicePercent = null): self
    {
        $this->targetServicePercent = $targetServicePercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTargetServicePercent(): self
    {
        $this->targetServicePercent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity|null
     */
    public function getTargetInventoryQuantity(): ?TargetInventoryQuantity
    {
        return $this->targetInventoryQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity
     */
    public function getTargetInventoryQuantityWithCreate(): TargetInventoryQuantity
    {
        $this->targetInventoryQuantity = is_null($this->targetInventoryQuantity) ? new TargetInventoryQuantity() : $this->targetInventoryQuantity;

        return $this->targetInventoryQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TargetInventoryQuantity|null $targetInventoryQuantity
     * @return self
     */
    public function setTargetInventoryQuantity(?TargetInventoryQuantity $targetInventoryQuantity = null): self
    {
        $this->targetInventoryQuantity = $targetInventoryQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTargetInventoryQuantity(): self
    {
        $this->targetInventoryQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EffectivePeriod|null
     */
    public function getEffectivePeriod(): ?EffectivePeriod
    {
        return $this->effectivePeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EffectivePeriod
     */
    public function getEffectivePeriodWithCreate(): EffectivePeriod
    {
        $this->effectivePeriod = is_null($this->effectivePeriod) ? new EffectivePeriod() : $this->effectivePeriod;

        return $this->effectivePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EffectivePeriod|null $effectivePeriod
     * @return self
     */
    public function setEffectivePeriod(?EffectivePeriod $effectivePeriod = null): self
    {
        $this->effectivePeriod = $effectivePeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEffectivePeriod(): self
    {
        $this->effectivePeriod = null;

        return $this;
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

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemLocationQuantity|null
     */
    public function getItemLocationQuantity(): ?ItemLocationQuantity
    {
        return $this->itemLocationQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemLocationQuantity
     */
    public function getItemLocationQuantityWithCreate(): ItemLocationQuantity
    {
        $this->itemLocationQuantity = is_null($this->itemLocationQuantity) ? new ItemLocationQuantity() : $this->itemLocationQuantity;

        return $this->itemLocationQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemLocationQuantity|null $itemLocationQuantity
     * @return self
     */
    public function setItemLocationQuantity(?ItemLocationQuantity $itemLocationQuantity = null): self
    {
        $this->itemLocationQuantity = $itemLocationQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemLocationQuantity(): self
    {
        $this->itemLocationQuantity = null;

        return $this;
    }
}
