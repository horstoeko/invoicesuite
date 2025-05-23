<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric;

class EventLineItemType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("LineNumberNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineNumberNumeric", setter="setLineNumberNumeric")
     */
    private $lineNumberNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ParticipatingLocationsLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ParticipatingLocationsLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ParticipatingLocationsLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParticipatingLocationsLocation", setter="setParticipatingLocationsLocation")
     */
    private $participatingLocationsLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact>")
     * @JMS\Expose
     * @JMS\SerializedName("RetailPlannedImpact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RetailPlannedImpact", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRetailPlannedImpact", setter="setRetailPlannedImpact")
     */
    private $retailPlannedImpact;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SupplyItem|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SupplyItem")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyItem", setter="setSupplyItem")
     */
    private $supplyItem;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric|null
     */
    public function getLineNumberNumeric(): ?LineNumberNumeric
    {
        return $this->lineNumberNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric
     */
    public function getLineNumberNumericWithCreate(): LineNumberNumeric
    {
        $this->lineNumberNumeric = is_null($this->lineNumberNumeric) ? new LineNumberNumeric() : $this->lineNumberNumeric;

        return $this->lineNumberNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineNumberNumeric|null $lineNumberNumeric
     * @return self
     */
    public function setLineNumberNumeric(?LineNumberNumeric $lineNumberNumeric = null): self
    {
        $this->lineNumberNumeric = $lineNumberNumeric;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ParticipatingLocationsLocation|null
     */
    public function getParticipatingLocationsLocation(): ?ParticipatingLocationsLocation
    {
        return $this->participatingLocationsLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ParticipatingLocationsLocation
     */
    public function getParticipatingLocationsLocationWithCreate(): ParticipatingLocationsLocation
    {
        $this->participatingLocationsLocation = is_null($this->participatingLocationsLocation) ? new ParticipatingLocationsLocation() : $this->participatingLocationsLocation;

        return $this->participatingLocationsLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ParticipatingLocationsLocation|null $participatingLocationsLocation
     * @return self
     */
    public function setParticipatingLocationsLocation(
        ?ParticipatingLocationsLocation $participatingLocationsLocation = null,
    ): self {
        $this->participatingLocationsLocation = $participatingLocationsLocation;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact>|null
     */
    public function getRetailPlannedImpact(): ?array
    {
        return $this->retailPlannedImpact;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact>|null $retailPlannedImpact
     * @return self
     */
    public function setRetailPlannedImpact(?array $retailPlannedImpact = null): self
    {
        $this->retailPlannedImpact = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRetailPlannedImpact(): self
    {
        $this->retailPlannedImpact = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact $retailPlannedImpact
     * @return self
     */
    public function addToRetailPlannedImpact(RetailPlannedImpact $retailPlannedImpact): self
    {
        $this->retailPlannedImpact[] = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact
     */
    public function addToRetailPlannedImpactWithCreate(): RetailPlannedImpact
    {
        $this->addToretailPlannedImpact($retailPlannedImpact = new RetailPlannedImpact());

        return $retailPlannedImpact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact $retailPlannedImpact
     * @return self
     */
    public function addOnceToRetailPlannedImpact(RetailPlannedImpact $retailPlannedImpact): self
    {
        if (!is_array($this->retailPlannedImpact)) {
            $this->retailPlannedImpact = [];
        }

        $this->retailPlannedImpact[0] = $retailPlannedImpact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RetailPlannedImpact
     */
    public function addOnceToRetailPlannedImpactWithCreate(): RetailPlannedImpact
    {
        if (!is_array($this->retailPlannedImpact)) {
            $this->retailPlannedImpact = [];
        }

        if ($this->retailPlannedImpact === []) {
            $this->addOnceToretailPlannedImpact(new RetailPlannedImpact());
        }

        return $this->retailPlannedImpact[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupplyItem|null
     */
    public function getSupplyItem(): ?SupplyItem
    {
        return $this->supplyItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupplyItem
     */
    public function getSupplyItemWithCreate(): SupplyItem
    {
        $this->supplyItem = is_null($this->supplyItem) ? new SupplyItem() : $this->supplyItem;

        return $this->supplyItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupplyItem|null $supplyItem
     * @return self
     */
    public function setSupplyItem(?SupplyItem $supplyItem = null): self
    {
        $this->supplyItem = $supplyItem;

        return $this;
    }
}
