<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LineNumberNumeric;
use JMS\Serializer\Annotation as JMS;

class EventLineItemType
{
    use HandlesObjectFlags;

    /**
     * @var null|LineNumberNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LineNumberNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("LineNumberNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineNumberNumeric", setter="setLineNumberNumeric")
     */
    private $lineNumberNumeric;

    /**
     * @var null|ParticipatingLocationsLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ParticipatingLocationsLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ParticipatingLocationsLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParticipatingLocationsLocation", setter="setParticipatingLocationsLocation")
     */
    private $participatingLocationsLocation;

    /**
     * @var null|array<RetailPlannedImpact>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\RetailPlannedImpact>")
     * @JMS\Expose
     * @JMS\SerializedName("RetailPlannedImpact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RetailPlannedImpact", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRetailPlannedImpact", setter="setRetailPlannedImpact")
     */
    private $retailPlannedImpact;

    /**
     * @var null|SupplyItem
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\SupplyItem")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyItem", setter="setSupplyItem")
     */
    private $supplyItem;

    /**
     * @return null|LineNumberNumeric
     */
    public function getLineNumberNumeric(): ?LineNumberNumeric
    {
        return $this->lineNumberNumeric;
    }

    /**
     * @return LineNumberNumeric
     */
    public function getLineNumberNumericWithCreate(): LineNumberNumeric
    {
        $this->lineNumberNumeric = is_null($this->lineNumberNumeric) ? new LineNumberNumeric() : $this->lineNumberNumeric;

        return $this->lineNumberNumeric;
    }

    /**
     * @param  null|LineNumberNumeric $lineNumberNumeric
     * @return static
     */
    public function setLineNumberNumeric(?LineNumberNumeric $lineNumberNumeric = null): static
    {
        $this->lineNumberNumeric = $lineNumberNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineNumberNumeric(): static
    {
        $this->lineNumberNumeric = null;

        return $this;
    }

    /**
     * @return null|ParticipatingLocationsLocation
     */
    public function getParticipatingLocationsLocation(): ?ParticipatingLocationsLocation
    {
        return $this->participatingLocationsLocation;
    }

    /**
     * @return ParticipatingLocationsLocation
     */
    public function getParticipatingLocationsLocationWithCreate(): ParticipatingLocationsLocation
    {
        $this->participatingLocationsLocation = is_null($this->participatingLocationsLocation) ? new ParticipatingLocationsLocation() : $this->participatingLocationsLocation;

        return $this->participatingLocationsLocation;
    }

    /**
     * @param  null|ParticipatingLocationsLocation $participatingLocationsLocation
     * @return static
     */
    public function setParticipatingLocationsLocation(
        ?ParticipatingLocationsLocation $participatingLocationsLocation = null,
    ): static {
        $this->participatingLocationsLocation = $participatingLocationsLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParticipatingLocationsLocation(): static
    {
        $this->participatingLocationsLocation = null;

        return $this;
    }

    /**
     * @return null|array<RetailPlannedImpact>
     */
    public function getRetailPlannedImpact(): ?array
    {
        return $this->retailPlannedImpact;
    }

    /**
     * @param  null|array<RetailPlannedImpact> $retailPlannedImpact
     * @return static
     */
    public function setRetailPlannedImpact(?array $retailPlannedImpact = null): static
    {
        $this->retailPlannedImpact = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRetailPlannedImpact(): static
    {
        $this->retailPlannedImpact = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRetailPlannedImpact(): static
    {
        $this->retailPlannedImpact = [];

        return $this;
    }

    /**
     * @return null|RetailPlannedImpact
     */
    public function firstRetailPlannedImpact(): ?RetailPlannedImpact
    {
        $retailPlannedImpact = $this->retailPlannedImpact ?? [];
        $retailPlannedImpact = reset($retailPlannedImpact);

        if (false === $retailPlannedImpact) {
            return null;
        }

        return $retailPlannedImpact;
    }

    /**
     * @return null|RetailPlannedImpact
     */
    public function lastRetailPlannedImpact(): ?RetailPlannedImpact
    {
        $retailPlannedImpact = $this->retailPlannedImpact ?? [];
        $retailPlannedImpact = end($retailPlannedImpact);

        if (false === $retailPlannedImpact) {
            return null;
        }

        return $retailPlannedImpact;
    }

    /**
     * @param  RetailPlannedImpact $retailPlannedImpact
     * @return static
     */
    public function addToRetailPlannedImpact(RetailPlannedImpact $retailPlannedImpact): static
    {
        $this->retailPlannedImpact[] = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return RetailPlannedImpact
     */
    public function addToRetailPlannedImpactWithCreate(): RetailPlannedImpact
    {
        $this->addToretailPlannedImpact($retailPlannedImpact = new RetailPlannedImpact());

        return $retailPlannedImpact;
    }

    /**
     * @param  RetailPlannedImpact $retailPlannedImpact
     * @return static
     */
    public function addOnceToRetailPlannedImpact(RetailPlannedImpact $retailPlannedImpact): static
    {
        if (!is_array($this->retailPlannedImpact)) {
            $this->retailPlannedImpact = [];
        }

        $this->retailPlannedImpact[0] = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return RetailPlannedImpact
     */
    public function addOnceToRetailPlannedImpactWithCreate(): RetailPlannedImpact
    {
        if (!is_array($this->retailPlannedImpact)) {
            $this->retailPlannedImpact = [];
        }

        if ([] === $this->retailPlannedImpact) {
            $this->addOnceToretailPlannedImpact(new RetailPlannedImpact());
        }

        return $this->retailPlannedImpact[0];
    }

    /**
     * @return null|SupplyItem
     */
    public function getSupplyItem(): ?SupplyItem
    {
        return $this->supplyItem;
    }

    /**
     * @return SupplyItem
     */
    public function getSupplyItemWithCreate(): SupplyItem
    {
        $this->supplyItem = is_null($this->supplyItem) ? new SupplyItem() : $this->supplyItem;

        return $this->supplyItem;
    }

    /**
     * @param  null|SupplyItem $supplyItem
     * @return static
     */
    public function setSupplyItem(?SupplyItem $supplyItem = null): static
    {
        $this->supplyItem = $supplyItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyItem(): static
    {
        $this->supplyItem = null;

        return $this;
    }
}
