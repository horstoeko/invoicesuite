<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MiscellaneousEventTypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class MiscellaneousEventType
{
    use HandlesObjectFlags;

    /**
     * @var null|MiscellaneousEventTypeCode
     */
    #[JMS\Accessor(getter: 'getMiscellaneousEventTypeCode', setter: 'setMiscellaneousEventTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MiscellaneousEventTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MiscellaneousEventTypeCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $miscellaneousEventTypeCode;

    /**
     * @var null|array<EventLineItem>
     */
    #[JMS\Accessor(getter: 'getEventLineItem', setter: 'setEventLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EventLineItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EventLineItem>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'EventLineItem', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->miscellaneousEventTypeCode ??= new MiscellaneousEventTypeCode();

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
    public function setEventLineItem(
        ?array $eventLineItem = null
    ): static {
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
        $eventLineItem = InvoiceSuiteArrayUtils::first($eventLineItem);

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
        $eventLineItem = InvoiceSuiteArrayUtils::last($eventLineItem);

        if (false === $eventLineItem) {
            return null;
        }

        return $eventLineItem;
    }

    /**
     * @param  EventLineItem $eventLineItem
     * @return static
     */
    public function addToEventLineItem(
        EventLineItem $eventLineItem
    ): static {
        $this->eventLineItem[] = $eventLineItem;

        return $this;
    }

    /**
     * @return EventLineItem
     */
    public function addToEventLineItemWithCreate(): EventLineItem
    {
        $this->addToEventLineItem($eventLineItem = new EventLineItem());

        return $eventLineItem;
    }

    /**
     * @param  EventLineItem $eventLineItem
     * @return static
     */
    public function addOnceToEventLineItem(
        EventLineItem $eventLineItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->eventLineItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->eventLineItem)) {
            $this->eventLineItem = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->eventLineItem)) {
            $this->addOnceToEventLineItem(new EventLineItem());
        }

        return $this->eventLineItem[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(EventLineItem): mixed $callback
     * @return static
     */
    public function forEachEventLineItem(
        callable $callback
    ): static {
        foreach ($this->eventLineItem ?? [] as $eventLineItem) {
            $callback($eventLineItem);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(EventLineItem): mixed  $callback
     * @return array<array-key, EventLineItem>
     */
    public function filterEventLineItems(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->eventLineItem ?? [], $callback);
    }
}
