<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FrozenPeriodDaysNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumInventoryQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MultipleOrderQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OrderIntervalDaysNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReplenishmentOwnerDescription;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TargetInventoryQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TargetServicePercent;
use JMS\Serializer\Annotation as JMS;

class ItemManagementProfileType
{
    use HandlesObjectFlags;

    /**
     * @var null|FrozenPeriodDaysNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FrozenPeriodDaysNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("FrozenPeriodDaysNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFrozenPeriodDaysNumeric", setter="setFrozenPeriodDaysNumeric")
     */
    private $frozenPeriodDaysNumeric;

    /**
     * @var null|MinimumInventoryQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumInventoryQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumInventoryQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumInventoryQuantity", setter="setMinimumInventoryQuantity")
     */
    private $minimumInventoryQuantity;

    /**
     * @var null|MultipleOrderQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MultipleOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MultipleOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMultipleOrderQuantity", setter="setMultipleOrderQuantity")
     */
    private $multipleOrderQuantity;

    /**
     * @var null|OrderIntervalDaysNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OrderIntervalDaysNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("OrderIntervalDaysNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderIntervalDaysNumeric", setter="setOrderIntervalDaysNumeric")
     */
    private $orderIntervalDaysNumeric;

    /**
     * @var null|array<ReplenishmentOwnerDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ReplenishmentOwnerDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplenishmentOwnerDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplenishmentOwnerDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getReplenishmentOwnerDescription", setter="setReplenishmentOwnerDescription")
     */
    private $replenishmentOwnerDescription;

    /**
     * @var null|TargetServicePercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TargetServicePercent")
     * @JMS\Expose
     * @JMS\SerializedName("TargetServicePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetServicePercent", setter="setTargetServicePercent")
     */
    private $targetServicePercent;

    /**
     * @var null|TargetInventoryQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TargetInventoryQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TargetInventoryQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetInventoryQuantity", setter="setTargetInventoryQuantity")
     */
    private $targetInventoryQuantity;

    /**
     * @var null|EffectivePeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EffectivePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EffectivePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEffectivePeriod", setter="setEffectivePeriod")
     */
    private $effectivePeriod;

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
     * @var null|ItemLocationQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ItemLocationQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ItemLocationQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemLocationQuantity", setter="setItemLocationQuantity")
     */
    private $itemLocationQuantity;

    /**
     * @return null|FrozenPeriodDaysNumeric
     */
    public function getFrozenPeriodDaysNumeric(): ?FrozenPeriodDaysNumeric
    {
        return $this->frozenPeriodDaysNumeric;
    }

    /**
     * @return FrozenPeriodDaysNumeric
     */
    public function getFrozenPeriodDaysNumericWithCreate(): FrozenPeriodDaysNumeric
    {
        $this->frozenPeriodDaysNumeric = is_null($this->frozenPeriodDaysNumeric) ? new FrozenPeriodDaysNumeric() : $this->frozenPeriodDaysNumeric;

        return $this->frozenPeriodDaysNumeric;
    }

    /**
     * @param  null|FrozenPeriodDaysNumeric $frozenPeriodDaysNumeric
     * @return static
     */
    public function setFrozenPeriodDaysNumeric(?FrozenPeriodDaysNumeric $frozenPeriodDaysNumeric = null): static
    {
        $this->frozenPeriodDaysNumeric = $frozenPeriodDaysNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFrozenPeriodDaysNumeric(): static
    {
        $this->frozenPeriodDaysNumeric = null;

        return $this;
    }

    /**
     * @return null|MinimumInventoryQuantity
     */
    public function getMinimumInventoryQuantity(): ?MinimumInventoryQuantity
    {
        return $this->minimumInventoryQuantity;
    }

    /**
     * @return MinimumInventoryQuantity
     */
    public function getMinimumInventoryQuantityWithCreate(): MinimumInventoryQuantity
    {
        $this->minimumInventoryQuantity = is_null($this->minimumInventoryQuantity) ? new MinimumInventoryQuantity() : $this->minimumInventoryQuantity;

        return $this->minimumInventoryQuantity;
    }

    /**
     * @param  null|MinimumInventoryQuantity $minimumInventoryQuantity
     * @return static
     */
    public function setMinimumInventoryQuantity(?MinimumInventoryQuantity $minimumInventoryQuantity = null): static
    {
        $this->minimumInventoryQuantity = $minimumInventoryQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumInventoryQuantity(): static
    {
        $this->minimumInventoryQuantity = null;

        return $this;
    }

    /**
     * @return null|MultipleOrderQuantity
     */
    public function getMultipleOrderQuantity(): ?MultipleOrderQuantity
    {
        return $this->multipleOrderQuantity;
    }

    /**
     * @return MultipleOrderQuantity
     */
    public function getMultipleOrderQuantityWithCreate(): MultipleOrderQuantity
    {
        $this->multipleOrderQuantity = is_null($this->multipleOrderQuantity) ? new MultipleOrderQuantity() : $this->multipleOrderQuantity;

        return $this->multipleOrderQuantity;
    }

    /**
     * @param  null|MultipleOrderQuantity $multipleOrderQuantity
     * @return static
     */
    public function setMultipleOrderQuantity(?MultipleOrderQuantity $multipleOrderQuantity = null): static
    {
        $this->multipleOrderQuantity = $multipleOrderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMultipleOrderQuantity(): static
    {
        $this->multipleOrderQuantity = null;

        return $this;
    }

    /**
     * @return null|OrderIntervalDaysNumeric
     */
    public function getOrderIntervalDaysNumeric(): ?OrderIntervalDaysNumeric
    {
        return $this->orderIntervalDaysNumeric;
    }

    /**
     * @return OrderIntervalDaysNumeric
     */
    public function getOrderIntervalDaysNumericWithCreate(): OrderIntervalDaysNumeric
    {
        $this->orderIntervalDaysNumeric = is_null($this->orderIntervalDaysNumeric) ? new OrderIntervalDaysNumeric() : $this->orderIntervalDaysNumeric;

        return $this->orderIntervalDaysNumeric;
    }

    /**
     * @param  null|OrderIntervalDaysNumeric $orderIntervalDaysNumeric
     * @return static
     */
    public function setOrderIntervalDaysNumeric(?OrderIntervalDaysNumeric $orderIntervalDaysNumeric = null): static
    {
        $this->orderIntervalDaysNumeric = $orderIntervalDaysNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderIntervalDaysNumeric(): static
    {
        $this->orderIntervalDaysNumeric = null;

        return $this;
    }

    /**
     * @return null|array<ReplenishmentOwnerDescription>
     */
    public function getReplenishmentOwnerDescription(): ?array
    {
        return $this->replenishmentOwnerDescription;
    }

    /**
     * @param  null|array<ReplenishmentOwnerDescription> $replenishmentOwnerDescription
     * @return static
     */
    public function setReplenishmentOwnerDescription(?array $replenishmentOwnerDescription = null): static
    {
        $this->replenishmentOwnerDescription = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReplenishmentOwnerDescription(): static
    {
        $this->replenishmentOwnerDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReplenishmentOwnerDescription(): static
    {
        $this->replenishmentOwnerDescription = [];

        return $this;
    }

    /**
     * @return null|ReplenishmentOwnerDescription
     */
    public function firstReplenishmentOwnerDescription(): ?ReplenishmentOwnerDescription
    {
        $replenishmentOwnerDescription = $this->replenishmentOwnerDescription ?? [];
        $replenishmentOwnerDescription = reset($replenishmentOwnerDescription);

        if (false === $replenishmentOwnerDescription) {
            return null;
        }

        return $replenishmentOwnerDescription;
    }

    /**
     * @return null|ReplenishmentOwnerDescription
     */
    public function lastReplenishmentOwnerDescription(): ?ReplenishmentOwnerDescription
    {
        $replenishmentOwnerDescription = $this->replenishmentOwnerDescription ?? [];
        $replenishmentOwnerDescription = end($replenishmentOwnerDescription);

        if (false === $replenishmentOwnerDescription) {
            return null;
        }

        return $replenishmentOwnerDescription;
    }

    /**
     * @param  ReplenishmentOwnerDescription $replenishmentOwnerDescription
     * @return static
     */
    public function addToReplenishmentOwnerDescription(
        ReplenishmentOwnerDescription $replenishmentOwnerDescription,
    ): static {
        $this->replenishmentOwnerDescription[] = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return ReplenishmentOwnerDescription
     */
    public function addToReplenishmentOwnerDescriptionWithCreate(): ReplenishmentOwnerDescription
    {
        $this->addToreplenishmentOwnerDescription($replenishmentOwnerDescription = new ReplenishmentOwnerDescription());

        return $replenishmentOwnerDescription;
    }

    /**
     * @param  ReplenishmentOwnerDescription $replenishmentOwnerDescription
     * @return static
     */
    public function addOnceToReplenishmentOwnerDescription(
        ReplenishmentOwnerDescription $replenishmentOwnerDescription,
    ): static {
        if (!is_array($this->replenishmentOwnerDescription)) {
            $this->replenishmentOwnerDescription = [];
        }

        $this->replenishmentOwnerDescription[0] = $replenishmentOwnerDescription;

        return $this;
    }

    /**
     * @return ReplenishmentOwnerDescription
     */
    public function addOnceToReplenishmentOwnerDescriptionWithCreate(): ReplenishmentOwnerDescription
    {
        if (!is_array($this->replenishmentOwnerDescription)) {
            $this->replenishmentOwnerDescription = [];
        }

        if ([] === $this->replenishmentOwnerDescription) {
            $this->addOnceToreplenishmentOwnerDescription(new ReplenishmentOwnerDescription());
        }

        return $this->replenishmentOwnerDescription[0];
    }

    /**
     * @return null|TargetServicePercent
     */
    public function getTargetServicePercent(): ?TargetServicePercent
    {
        return $this->targetServicePercent;
    }

    /**
     * @return TargetServicePercent
     */
    public function getTargetServicePercentWithCreate(): TargetServicePercent
    {
        $this->targetServicePercent = is_null($this->targetServicePercent) ? new TargetServicePercent() : $this->targetServicePercent;

        return $this->targetServicePercent;
    }

    /**
     * @param  null|TargetServicePercent $targetServicePercent
     * @return static
     */
    public function setTargetServicePercent(?TargetServicePercent $targetServicePercent = null): static
    {
        $this->targetServicePercent = $targetServicePercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTargetServicePercent(): static
    {
        $this->targetServicePercent = null;

        return $this;
    }

    /**
     * @return null|TargetInventoryQuantity
     */
    public function getTargetInventoryQuantity(): ?TargetInventoryQuantity
    {
        return $this->targetInventoryQuantity;
    }

    /**
     * @return TargetInventoryQuantity
     */
    public function getTargetInventoryQuantityWithCreate(): TargetInventoryQuantity
    {
        $this->targetInventoryQuantity = is_null($this->targetInventoryQuantity) ? new TargetInventoryQuantity() : $this->targetInventoryQuantity;

        return $this->targetInventoryQuantity;
    }

    /**
     * @param  null|TargetInventoryQuantity $targetInventoryQuantity
     * @return static
     */
    public function setTargetInventoryQuantity(?TargetInventoryQuantity $targetInventoryQuantity = null): static
    {
        $this->targetInventoryQuantity = $targetInventoryQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTargetInventoryQuantity(): static
    {
        $this->targetInventoryQuantity = null;

        return $this;
    }

    /**
     * @return null|EffectivePeriod
     */
    public function getEffectivePeriod(): ?EffectivePeriod
    {
        return $this->effectivePeriod;
    }

    /**
     * @return EffectivePeriod
     */
    public function getEffectivePeriodWithCreate(): EffectivePeriod
    {
        $this->effectivePeriod = is_null($this->effectivePeriod) ? new EffectivePeriod() : $this->effectivePeriod;

        return $this->effectivePeriod;
    }

    /**
     * @param  null|EffectivePeriod $effectivePeriod
     * @return static
     */
    public function setEffectivePeriod(?EffectivePeriod $effectivePeriod = null): static
    {
        $this->effectivePeriod = $effectivePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEffectivePeriod(): static
    {
        $this->effectivePeriod = null;

        return $this;
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

    /**
     * @return null|ItemLocationQuantity
     */
    public function getItemLocationQuantity(): ?ItemLocationQuantity
    {
        return $this->itemLocationQuantity;
    }

    /**
     * @return ItemLocationQuantity
     */
    public function getItemLocationQuantityWithCreate(): ItemLocationQuantity
    {
        $this->itemLocationQuantity = is_null($this->itemLocationQuantity) ? new ItemLocationQuantity() : $this->itemLocationQuantity;

        return $this->itemLocationQuantity;
    }

    /**
     * @param  null|ItemLocationQuantity $itemLocationQuantity
     * @return static
     */
    public function setItemLocationQuantity(?ItemLocationQuantity $itemLocationQuantity = null): static
    {
        $this->itemLocationQuantity = $itemLocationQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemLocationQuantity(): static
    {
        $this->itemLocationQuantity = null;

        return $this;
    }
}
