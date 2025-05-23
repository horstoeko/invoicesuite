<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\SpecificationID;

class PromotionalSpecificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SpecificationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SpecificationID")
     * @JMS\Expose
     * @JMS\SerializedName("SpecificationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSpecificationID", setter="setSpecificationID")
     */
    private $specificationID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalEventLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PromotionalEventLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPromotionalEventLineItem", setter="setPromotionalEventLineItem")
     */
    private $promotionalEventLineItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EventTactic>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EventTactic>")
     * @JMS\Expose
     * @JMS\SerializedName("EventTactic")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EventTactic", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEventTactic", setter="setEventTactic")
     */
    private $eventTactic;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecificationID|null
     */
    public function getSpecificationID(): ?SpecificationID
    {
        return $this->specificationID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecificationID
     */
    public function getSpecificationIDWithCreate(): SpecificationID
    {
        $this->specificationID = is_null($this->specificationID) ? new SpecificationID() : $this->specificationID;

        return $this->specificationID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SpecificationID|null $specificationID
     * @return self
     */
    public function setSpecificationID(?SpecificationID $specificationID = null): self
    {
        $this->specificationID = $specificationID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem>|null
     */
    public function getPromotionalEventLineItem(): ?array
    {
        return $this->promotionalEventLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem>|null $promotionalEventLineItem
     * @return self
     */
    public function setPromotionalEventLineItem(?array $promotionalEventLineItem = null): self
    {
        $this->promotionalEventLineItem = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPromotionalEventLineItem(): self
    {
        $this->promotionalEventLineItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem $promotionalEventLineItem
     * @return self
     */
    public function addToPromotionalEventLineItem(PromotionalEventLineItem $promotionalEventLineItem): self
    {
        $this->promotionalEventLineItem[] = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem
     */
    public function addToPromotionalEventLineItemWithCreate(): PromotionalEventLineItem
    {
        $this->addTopromotionalEventLineItem($promotionalEventLineItem = new PromotionalEventLineItem());

        return $promotionalEventLineItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem $promotionalEventLineItem
     * @return self
     */
    public function addOnceToPromotionalEventLineItem(PromotionalEventLineItem $promotionalEventLineItem): self
    {
        if (!is_array($this->promotionalEventLineItem)) {
            $this->promotionalEventLineItem = [];
        }

        $this->promotionalEventLineItem[0] = $promotionalEventLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromotionalEventLineItem
     */
    public function addOnceToPromotionalEventLineItemWithCreate(): PromotionalEventLineItem
    {
        if (!is_array($this->promotionalEventLineItem)) {
            $this->promotionalEventLineItem = [];
        }

        if ($this->promotionalEventLineItem === []) {
            $this->addOnceTopromotionalEventLineItem(new PromotionalEventLineItem());
        }

        return $this->promotionalEventLineItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EventTactic>|null
     */
    public function getEventTactic(): ?array
    {
        return $this->eventTactic;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EventTactic>|null $eventTactic
     * @return self
     */
    public function setEventTactic(?array $eventTactic = null): self
    {
        $this->eventTactic = $eventTactic;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEventTactic(): self
    {
        $this->eventTactic = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EventTactic $eventTactic
     * @return self
     */
    public function addToEventTactic(EventTactic $eventTactic): self
    {
        $this->eventTactic[] = $eventTactic;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventTactic
     */
    public function addToEventTacticWithCreate(): EventTactic
    {
        $this->addToeventTactic($eventTactic = new EventTactic());

        return $eventTactic;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EventTactic $eventTactic
     * @return self
     */
    public function addOnceToEventTactic(EventTactic $eventTactic): self
    {
        if (!is_array($this->eventTactic)) {
            $this->eventTactic = [];
        }

        $this->eventTactic[0] = $eventTactic;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventTactic
     */
    public function addOnceToEventTacticWithCreate(): EventTactic
    {
        if (!is_array($this->eventTactic)) {
            $this->eventTactic = [];
        }

        if ($this->eventTactic === []) {
            $this->addOnceToeventTactic(new EventTactic());
        }

        return $this->eventTactic[0];
    }
}
