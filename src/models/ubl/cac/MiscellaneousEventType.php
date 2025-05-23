<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode;

class MiscellaneousEventType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MiscellaneousEventTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMiscellaneousEventTypeCode", setter="setMiscellaneousEventTypeCode")
     */
    private $miscellaneousEventTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EventLineItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EventLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("EventLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EventLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEventLineItem", setter="setEventLineItem")
     */
    private $eventLineItem;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode|null
     */
    public function getMiscellaneousEventTypeCode(): ?MiscellaneousEventTypeCode
    {
        return $this->miscellaneousEventTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode
     */
    public function getMiscellaneousEventTypeCodeWithCreate(): MiscellaneousEventTypeCode
    {
        $this->miscellaneousEventTypeCode = is_null($this->miscellaneousEventTypeCode) ? new MiscellaneousEventTypeCode() : $this->miscellaneousEventTypeCode;

        return $this->miscellaneousEventTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MiscellaneousEventTypeCode|null $miscellaneousEventTypeCode
     * @return self
     */
    public function setMiscellaneousEventTypeCode(
        ?MiscellaneousEventTypeCode $miscellaneousEventTypeCode = null,
    ): self {
        $this->miscellaneousEventTypeCode = $miscellaneousEventTypeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EventLineItem>|null
     */
    public function getEventLineItem(): ?array
    {
        return $this->eventLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EventLineItem>|null $eventLineItem
     * @return self
     */
    public function setEventLineItem(?array $eventLineItem = null): self
    {
        $this->eventLineItem = $eventLineItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEventLineItem(): self
    {
        $this->eventLineItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EventLineItem $eventLineItem
     * @return self
     */
    public function addToEventLineItem(EventLineItem $eventLineItem): self
    {
        $this->eventLineItem[] = $eventLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventLineItem
     */
    public function addToEventLineItemWithCreate(): EventLineItem
    {
        $this->addToeventLineItem($eventLineItem = new EventLineItem());

        return $eventLineItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EventLineItem $eventLineItem
     * @return self
     */
    public function addOnceToEventLineItem(EventLineItem $eventLineItem): self
    {
        if (!is_array($this->eventLineItem)) {
            $this->eventLineItem = [];
        }

        $this->eventLineItem[0] = $eventLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventLineItem
     */
    public function addOnceToEventLineItemWithCreate(): EventLineItem
    {
        if (!is_array($this->eventLineItem)) {
            $this->eventLineItem = [];
        }

        if ($this->eventLineItem === []) {
            $this->addOnceToeventLineItem(new EventLineItem());
        }

        return $this->eventLineItem[0];
    }
}
