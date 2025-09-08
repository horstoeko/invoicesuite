<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Comment;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;

class EventTacticType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Comment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Comment")
     * @JMS\Expose
     * @JMS\SerializedName("Comment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComment", setter="setComment")
     */
    private $comment;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EventTacticEnumeration|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EventTacticEnumeration")
     * @JMS\Expose
     * @JMS\SerializedName("EventTacticEnumeration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEventTacticEnumeration", setter="setEventTacticEnumeration")
     */
    private $eventTacticEnumeration;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Period|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Comment|null
     */
    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Comment
     */
    public function getCommentWithCreate(): Comment
    {
        $this->comment = is_null($this->comment) ? new Comment() : $this->comment;

        return $this->comment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Comment|null $comment
     * @return self
     */
    public function setComment(?Comment $comment = null): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetComment(): self
    {
        $this->comment = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuantity(): self
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventTacticEnumeration|null
     */
    public function getEventTacticEnumeration(): ?EventTacticEnumeration
    {
        return $this->eventTacticEnumeration;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EventTacticEnumeration
     */
    public function getEventTacticEnumerationWithCreate(): EventTacticEnumeration
    {
        $this->eventTacticEnumeration = is_null($this->eventTacticEnumeration) ? new EventTacticEnumeration() : $this->eventTacticEnumeration;

        return $this->eventTacticEnumeration;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EventTacticEnumeration|null $eventTacticEnumeration
     * @return self
     */
    public function setEventTacticEnumeration(?EventTacticEnumeration $eventTacticEnumeration = null): self
    {
        $this->eventTacticEnumeration = $eventTacticEnumeration;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEventTacticEnumeration(): self
    {
        $this->eventTacticEnumeration = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period|null
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period|null $period
     * @return self
     */
    public function setPeriod(?Period $period = null): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPeriod(): self
    {
        $this->period = null;

        return $this;
    }
}
