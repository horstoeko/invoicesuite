<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Comment;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class EventTacticType
{
    use HandlesObjectFlags;

    /**
     * @var null|Comment
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Comment")
     * @JMS\Expose
     * @JMS\SerializedName("Comment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComment", setter="setComment")
     */
    private $comment;

    /**
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var null|EventTacticEnumeration
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EventTacticEnumeration")
     * @JMS\Expose
     * @JMS\SerializedName("EventTacticEnumeration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEventTacticEnumeration", setter="setEventTacticEnumeration")
     */
    private $eventTacticEnumeration;

    /**
     * @var null|Period
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @return null|Comment
     */
    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    /**
     * @return Comment
     */
    public function getCommentWithCreate(): Comment
    {
        $this->comment = is_null($this->comment) ? new Comment() : $this->comment;

        return $this->comment;
    }

    /**
     * @param  null|Comment $comment
     * @return static
     */
    public function setComment(?Comment $comment = null): static
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComment(): static
    {
        $this->comment = null;

        return $this;
    }

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|EventTacticEnumeration
     */
    public function getEventTacticEnumeration(): ?EventTacticEnumeration
    {
        return $this->eventTacticEnumeration;
    }

    /**
     * @return EventTacticEnumeration
     */
    public function getEventTacticEnumerationWithCreate(): EventTacticEnumeration
    {
        $this->eventTacticEnumeration = is_null($this->eventTacticEnumeration) ? new EventTacticEnumeration() : $this->eventTacticEnumeration;

        return $this->eventTacticEnumeration;
    }

    /**
     * @param  null|EventTacticEnumeration $eventTacticEnumeration
     * @return static
     */
    public function setEventTacticEnumeration(?EventTacticEnumeration $eventTacticEnumeration = null): static
    {
        $this->eventTacticEnumeration = $eventTacticEnumeration;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEventTacticEnumeration(): static
    {
        $this->eventTacticEnumeration = null;

        return $this;
    }

    /**
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(?Period $period = null): static
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
    }
}
