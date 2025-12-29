<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Amount;
use JMS\Serializer\Annotation as JMS;

class PromotionalEventLineItemType
{
    use HandlesObjectFlags;

    /**
     * @var null|Amount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var null|EventLineItem
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EventLineItem")
     * @JMS\Expose
     * @JMS\SerializedName("EventLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEventLineItem", setter="setEventLineItem")
     */
    private $eventLineItem;

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(?Amount $amount = null): static
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|EventLineItem
     */
    public function getEventLineItem(): ?EventLineItem
    {
        return $this->eventLineItem;
    }

    /**
     * @return EventLineItem
     */
    public function getEventLineItemWithCreate(): EventLineItem
    {
        $this->eventLineItem = is_null($this->eventLineItem) ? new EventLineItem() : $this->eventLineItem;

        return $this->eventLineItem;
    }

    /**
     * @param  null|EventLineItem $eventLineItem
     * @return static
     */
    public function setEventLineItem(?EventLineItem $eventLineItem = null): static
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
}
