<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FrozenPeriodDaysNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumInventoryQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MultipleOrderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderIntervalDaysNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReplenishmentOwnerDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetInventoryQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetServicePercent;
use JMS\Serializer\Annotation as JMS;

class ItemManagementProfileType
{
    use HandlesObjectFlags;

    /**
     * @var null|FrozenPeriodDaysNumeric
     */
    #[JMS\Accessor(getter: 'getFrozenPeriodDaysNumeric', setter: 'setFrozenPeriodDaysNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FrozenPeriodDaysNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FrozenPeriodDaysNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $frozenPeriodDaysNumeric;

    /**
     * @var null|MinimumInventoryQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumInventoryQuantity', setter: 'setMinimumInventoryQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumInventoryQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumInventoryQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumInventoryQuantity;

    /**
     * @var null|MultipleOrderQuantity
     */
    #[JMS\Accessor(getter: 'getMultipleOrderQuantity', setter: 'setMultipleOrderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MultipleOrderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MultipleOrderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $multipleOrderQuantity;

    /**
     * @var null|OrderIntervalDaysNumeric
     */
    #[JMS\Accessor(getter: 'getOrderIntervalDaysNumeric', setter: 'setOrderIntervalDaysNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderIntervalDaysNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderIntervalDaysNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $orderIntervalDaysNumeric;

    /**
     * @var null|array<ReplenishmentOwnerDescription>
     */
    #[JMS\Accessor(getter: 'getReplenishmentOwnerDescription', setter: 'setReplenishmentOwnerDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReplenishmentOwnerDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReplenishmentOwnerDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReplenishmentOwnerDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $replenishmentOwnerDescription;

    /**
     * @var null|TargetServicePercent
     */
    #[JMS\Accessor(getter: 'getTargetServicePercent', setter: 'setTargetServicePercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TargetServicePercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetServicePercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $targetServicePercent;

    /**
     * @var null|TargetInventoryQuantity
     */
    #[JMS\Accessor(getter: 'getTargetInventoryQuantity', setter: 'setTargetInventoryQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TargetInventoryQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetInventoryQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $targetInventoryQuantity;

    /**
     * @var null|EffectivePeriod
     */
    #[JMS\Accessor(getter: 'getEffectivePeriod', setter: 'setEffectivePeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EffectivePeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EffectivePeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $effectivePeriod;

    /**
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $item;

    /**
     * @var null|ItemLocationQuantity
     */
    #[JMS\Accessor(getter: 'getItemLocationQuantity', setter: 'setItemLocationQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ItemLocationQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ItemLocationQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->frozenPeriodDaysNumeric ??= new FrozenPeriodDaysNumeric();

        return $this->frozenPeriodDaysNumeric;
    }

    /**
     * @param  null|FrozenPeriodDaysNumeric $frozenPeriodDaysNumeric
     * @return static
     */
    public function setFrozenPeriodDaysNumeric(
        ?FrozenPeriodDaysNumeric $frozenPeriodDaysNumeric = null
    ): static {
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
        $this->minimumInventoryQuantity ??= new MinimumInventoryQuantity();

        return $this->minimumInventoryQuantity;
    }

    /**
     * @param  null|MinimumInventoryQuantity $minimumInventoryQuantity
     * @return static
     */
    public function setMinimumInventoryQuantity(
        ?MinimumInventoryQuantity $minimumInventoryQuantity = null
    ): static {
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
        $this->multipleOrderQuantity ??= new MultipleOrderQuantity();

        return $this->multipleOrderQuantity;
    }

    /**
     * @param  null|MultipleOrderQuantity $multipleOrderQuantity
     * @return static
     */
    public function setMultipleOrderQuantity(
        ?MultipleOrderQuantity $multipleOrderQuantity = null
    ): static {
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
        $this->orderIntervalDaysNumeric ??= new OrderIntervalDaysNumeric();

        return $this->orderIntervalDaysNumeric;
    }

    /**
     * @param  null|OrderIntervalDaysNumeric $orderIntervalDaysNumeric
     * @return static
     */
    public function setOrderIntervalDaysNumeric(
        ?OrderIntervalDaysNumeric $orderIntervalDaysNumeric = null
    ): static {
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
    public function setReplenishmentOwnerDescription(
        ?array $replenishmentOwnerDescription = null
    ): static {
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
        $this->addToReplenishmentOwnerDescription($replenishmentOwnerDescription = new ReplenishmentOwnerDescription());

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
            $this->addOnceToReplenishmentOwnerDescription(new ReplenishmentOwnerDescription());
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
        $this->targetServicePercent ??= new TargetServicePercent();

        return $this->targetServicePercent;
    }

    /**
     * @param  null|TargetServicePercent $targetServicePercent
     * @return static
     */
    public function setTargetServicePercent(
        ?TargetServicePercent $targetServicePercent = null
    ): static {
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
        $this->targetInventoryQuantity ??= new TargetInventoryQuantity();

        return $this->targetInventoryQuantity;
    }

    /**
     * @param  null|TargetInventoryQuantity $targetInventoryQuantity
     * @return static
     */
    public function setTargetInventoryQuantity(
        ?TargetInventoryQuantity $targetInventoryQuantity = null
    ): static {
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
        $this->effectivePeriod ??= new EffectivePeriod();

        return $this->effectivePeriod;
    }

    /**
     * @param  null|EffectivePeriod $effectivePeriod
     * @return static
     */
    public function setEffectivePeriod(
        ?EffectivePeriod $effectivePeriod = null
    ): static {
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
        $this->item ??= new Item();

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(
        ?Item $item = null
    ): static {
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
        $this->itemLocationQuantity ??= new ItemLocationQuantity();

        return $this->itemLocationQuantity;
    }

    /**
     * @param  null|ItemLocationQuantity $itemLocationQuantity
     * @return static
     */
    public function setItemLocationQuantity(
        ?ItemLocationQuantity $itemLocationQuantity = null
    ): static {
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
