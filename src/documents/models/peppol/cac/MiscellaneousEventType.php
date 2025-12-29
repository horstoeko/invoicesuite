<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MiscellaneousEventTypeCode;
use JMS\Serializer\Annotation as JMS;

class MiscellaneousEventType
{
    use HandlesObjectFlags;

    /**
     * @var null|MiscellaneousEventTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MiscellaneousEventTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MiscellaneousEventTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMiscellaneousEventTypeCode", setter="setMiscellaneousEventTypeCode")
     */
    private $miscellaneousEventTypeCode;

    /**
     * @var null|array<EventLineItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\EventLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("EventLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EventLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEventLineItem", setter="setEventLineItem")
     */
    private $eventLineItem;

    /**
     * @return null|MiscellaneousEventTypeCode
     */
    public function getMiscellaneousEventTypeCode(): ?MiscellaneousEventTypeCode
    {
        return $this->miscellaneousEventTypeCode;
    }

    /**
     * @return MiscellaneousEventTypeCode
     */
    public function getMiscellaneousEventTypeCodeWithCreate(): MiscellaneousEventTypeCode
    {
        $this->miscellaneousEventTypeCode = is_null($this->miscellaneousEventTypeCode) ? new MiscellaneousEventTypeCode() : $this->miscellaneousEventTypeCode;

        return $this->miscellaneousEventTypeCode;
    }

    /**
     * @param  null|MiscellaneousEventTypeCode $miscellaneousEventTypeCode
     * @return static
     */
    public function setMiscellaneousEventTypeCode(
        ?MiscellaneousEventTypeCode $miscellaneousEventTypeCode = null,
    ): static {
        $this->miscellaneousEventTypeCode = $miscellaneousEventTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMiscellaneousEventTypeCode(): static
    {
        $this->miscellaneousEventTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<EventLineItem>
     */
    public function getEventLineItem(): ?array
    {
        return $this->eventLineItem;
    }

    /**
     * @param  null|array<EventLineItem> $eventLineItem
     * @return static
     */
    public function setEventLineItem(?array $eventLineItem = null): static
    {
        $this->eventLineItem = $eventLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEventLineItem(): static
    {
        $this->eventLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEventLineItem(): static
    {
        $this->eventLineItem = [];

        return $this;
    }

    /**
     * @return null|EventLineItem
     */
    public function firstEventLineItem(): ?EventLineItem
    {
        $eventLineItem = $this->eventLineItem ?? [];
        $eventLineItem = reset($eventLineItem);

        if (false === $eventLineItem) {
            return null;
        }

        return $eventLineItem;
    }

    /**
     * @return null|EventLineItem
     */
    public function lastEventLineItem(): ?EventLineItem
    {
        $eventLineItem = $this->eventLineItem ?? [];
        $eventLineItem = end($eventLineItem);

        if (false === $eventLineItem) {
            return null;
        }

        return $eventLineItem;
    }

    /**
     * @param  EventLineItem $eventLineItem
     * @return static
     */
    public function addToEventLineItem(EventLineItem $eventLineItem): static
    {
        $this->eventLineItem[] = $eventLineItem;

        return $this;
    }

    /**
     * @return EventLineItem
     */
    public function addToEventLineItemWithCreate(): EventLineItem
    {
        $this->addToeventLineItem($eventLineItem = new EventLineItem());

        return $eventLineItem;
    }

    /**
     * @param  EventLineItem $eventLineItem
     * @return static
     */
    public function addOnceToEventLineItem(EventLineItem $eventLineItem): static
    {
        if (!is_array($this->eventLineItem)) {
            $this->eventLineItem = [];
        }

        $this->eventLineItem[0] = $eventLineItem;

        return $this;
    }

    /**
     * @return EventLineItem
     */
    public function addOnceToEventLineItemWithCreate(): EventLineItem
    {
        if (!is_array($this->eventLineItem)) {
            $this->eventLineItem = [];
        }

        if ([] === $this->eventLineItem) {
            $this->addOnceToeventLineItem(new EventLineItem());
        }

        return $this->eventLineItem[0];
    }
}
