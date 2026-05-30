<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Comment;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class EventTacticType
{
    use HandlesObjectFlags;

    /**
     * @var null|Comment
     */
    #[JMS\Accessor(getter: 'getComment', setter: 'setComment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Comment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Comment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $comment;

    /**
     * @var null|Quantity
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Quantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantity;

    /**
     * @var null|EventTacticEnumeration
     */
    #[JMS\Accessor(getter: 'getEventTacticEnumeration', setter: 'setEventTacticEnumeration')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EventTacticEnumeration')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EventTacticEnumeration')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $eventTacticEnumeration;

    /**
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->comment ??= new Comment();

        return $this->comment;
    }

    /**
     * @param  null|Comment $comment
     * @return static
     */
    public function setComment(
        ?Comment $comment = null
    ): static {
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
        $this->quantity ??= new Quantity();

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(
        ?Quantity $quantity = null
    ): static {
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
        $this->eventTacticEnumeration ??= new EventTacticEnumeration();

        return $this->eventTacticEnumeration;
    }

    /**
     * @param  null|EventTacticEnumeration $eventTacticEnumeration
     * @return static
     */
    public function setEventTacticEnumeration(
        ?EventTacticEnumeration $eventTacticEnumeration = null
    ): static {
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
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
    ): static {
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
