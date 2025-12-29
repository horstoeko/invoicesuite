<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SpecificationID;
use JMS\Serializer\Annotation as JMS;

class PromotionalSpecificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|SpecificationID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SpecificationID")
     * @JMS\Expose
     * @JMS\SerializedName("SpecificationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSpecificationID", setter="setSpecificationID")
     */
    private $specificationID;

    /**
     * @var null|array<PromotionalEventLineItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PromotionalEventLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalEventLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PromotionalEventLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPromotionalEventLineItem", setter="setPromotionalEventLineItem")
     */
    private $promotionalEventLineItem;

    /**
     * @var null|array<EventTactic>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\EventTactic>")
     * @JMS\Expose
     * @JMS\SerializedName("EventTactic")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EventTactic", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEventTactic", setter="setEventTactic")
     */
    private $eventTactic;

    /**
     * @return null|SpecificationID
     */
    public function getSpecificationID(): ?SpecificationID
    {
        return $this->specificationID;
    }

    /**
     * @return SpecificationID
     */
    public function getSpecificationIDWithCreate(): SpecificationID
    {
        $this->specificationID = is_null($this->specificationID) ? new SpecificationID() : $this->specificationID;

        return $this->specificationID;
    }

    /**
     * @param  null|SpecificationID $specificationID
     * @return static
     */
    public function setSpecificationID(?SpecificationID $specificationID = null): static
    {
        $this->specificationID = $specificationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecificationID(): static
    {
        $this->specificationID = null;

        return $this;
    }

    /**
     * @return null|array<PromotionalEventLineItem>
     */
    public function getPromotionalEventLineItem(): ?array
    {
        return $this->promotionalEventLineItem;
    }

    /**
     * @param  null|array<PromotionalEventLineItem> $promotionalEventLineItem
     * @return static
     */
    public function setPromotionalEventLineItem(?array $promotionalEventLineItem = null): static
    {
        $this->promotionalEventLineItem = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPromotionalEventLineItem(): static
    {
        $this->promotionalEventLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPromotionalEventLineItem(): static
    {
        $this->promotionalEventLineItem = [];

        return $this;
    }

    /**
     * @return null|PromotionalEventLineItem
     */
    public function firstPromotionalEventLineItem(): ?PromotionalEventLineItem
    {
        $promotionalEventLineItem = $this->promotionalEventLineItem ?? [];
        $promotionalEventLineItem = reset($promotionalEventLineItem);

        if (false === $promotionalEventLineItem) {
            return null;
        }

        return $promotionalEventLineItem;
    }

    /**
     * @return null|PromotionalEventLineItem
     */
    public function lastPromotionalEventLineItem(): ?PromotionalEventLineItem
    {
        $promotionalEventLineItem = $this->promotionalEventLineItem ?? [];
        $promotionalEventLineItem = end($promotionalEventLineItem);

        if (false === $promotionalEventLineItem) {
            return null;
        }

        return $promotionalEventLineItem;
    }

    /**
     * @param  PromotionalEventLineItem $promotionalEventLineItem
     * @return static
     */
    public function addToPromotionalEventLineItem(PromotionalEventLineItem $promotionalEventLineItem): static
    {
        $this->promotionalEventLineItem[] = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return PromotionalEventLineItem
     */
    public function addToPromotionalEventLineItemWithCreate(): PromotionalEventLineItem
    {
        $this->addTopromotionalEventLineItem($promotionalEventLineItem = new PromotionalEventLineItem());

        return $promotionalEventLineItem;
    }

    /**
     * @param  PromotionalEventLineItem $promotionalEventLineItem
     * @return static
     */
    public function addOnceToPromotionalEventLineItem(PromotionalEventLineItem $promotionalEventLineItem): static
    {
        if (!is_array($this->promotionalEventLineItem)) {
            $this->promotionalEventLineItem = [];
        }

        $this->promotionalEventLineItem[0] = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return PromotionalEventLineItem
     */
    public function addOnceToPromotionalEventLineItemWithCreate(): PromotionalEventLineItem
    {
        if (!is_array($this->promotionalEventLineItem)) {
            $this->promotionalEventLineItem = [];
        }

        if ([] === $this->promotionalEventLineItem) {
            $this->addOnceTopromotionalEventLineItem(new PromotionalEventLineItem());
        }

        return $this->promotionalEventLineItem[0];
    }

    /**
     * @return null|array<EventTactic>
     */
    public function getEventTactic(): ?array
    {
        return $this->eventTactic;
    }

    /**
     * @param  null|array<EventTactic> $eventTactic
     * @return static
     */
    public function setEventTactic(?array $eventTactic = null): static
    {
        $this->eventTactic = $eventTactic;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEventTactic(): static
    {
        $this->eventTactic = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEventTactic(): static
    {
        $this->eventTactic = [];

        return $this;
    }

    /**
     * @return null|EventTactic
     */
    public function firstEventTactic(): ?EventTactic
    {
        $eventTactic = $this->eventTactic ?? [];
        $eventTactic = reset($eventTactic);

        if (false === $eventTactic) {
            return null;
        }

        return $eventTactic;
    }

    /**
     * @return null|EventTactic
     */
    public function lastEventTactic(): ?EventTactic
    {
        $eventTactic = $this->eventTactic ?? [];
        $eventTactic = end($eventTactic);

        if (false === $eventTactic) {
            return null;
        }

        return $eventTactic;
    }

    /**
     * @param  EventTactic $eventTactic
     * @return static
     */
    public function addToEventTactic(EventTactic $eventTactic): static
    {
        $this->eventTactic[] = $eventTactic;

        return $this;
    }

    /**
     * @return EventTactic
     */
    public function addToEventTacticWithCreate(): EventTactic
    {
        $this->addToeventTactic($eventTactic = new EventTactic());

        return $eventTactic;
    }

    /**
     * @param  EventTactic $eventTactic
     * @return static
     */
    public function addOnceToEventTactic(EventTactic $eventTactic): static
    {
        if (!is_array($this->eventTactic)) {
            $this->eventTactic = [];
        }

        $this->eventTactic[0] = $eventTactic;

        return $this;
    }

    /**
     * @return EventTactic
     */
    public function addOnceToEventTacticWithCreate(): EventTactic
    {
        if (!is_array($this->eventTactic)) {
            $this->eventTactic = [];
        }

        if ([] === $this->eventTactic) {
            $this->addOnceToeventTactic(new EventTactic());
        }

        return $this->eventTactic[0];
    }
}
