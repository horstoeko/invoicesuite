<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AvailabilityStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InventoryValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class InventoryReportLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

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
     * @var null|InventoryValueAmount
     */
    #[JMS\Accessor(getter: 'getInventoryValueAmount', setter: 'setInventoryValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InventoryValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InventoryValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $inventoryValueAmount;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getAvailabilityDate', setter: 'setAvailabilityDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AvailabilityDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $availabilityDate;

    /**
     * @var null|AvailabilityStatusCode
     */
    #[JMS\Accessor(getter: 'getAvailabilityStatusCode', setter: 'setAvailabilityStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AvailabilityStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AvailabilityStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $availabilityStatusCode;

    /**
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $item;

    /**
     * @var null|InventoryLocation
     */
    #[JMS\Accessor(getter: 'getInventoryLocation', setter: 'setInventoryLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InventoryLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\InventoryLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $inventoryLocation;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(
        ?array $note = null
    ): static {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
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
     * @return null|InventoryValueAmount
     */
    public function getInventoryValueAmount(): ?InventoryValueAmount
    {
        return $this->inventoryValueAmount;
    }

    /**
     * @return InventoryValueAmount
     */
    public function getInventoryValueAmountWithCreate(): InventoryValueAmount
    {
        $this->inventoryValueAmount ??= new InventoryValueAmount();

        return $this->inventoryValueAmount;
    }

    /**
     * @param  null|InventoryValueAmount $inventoryValueAmount
     * @return static
     */
    public function setInventoryValueAmount(
        ?InventoryValueAmount $inventoryValueAmount = null
    ): static {
        $this->inventoryValueAmount = $inventoryValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInventoryValueAmount(): static
    {
        $this->inventoryValueAmount = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getAvailabilityDate(): ?DateTimeInterface
    {
        return $this->availabilityDate;
    }

    /**
     * @param  null|DateTimeInterface $availabilityDate
     * @return static
     */
    public function setAvailabilityDate(
        ?DateTimeInterface $availabilityDate = null
    ): static {
        $this->availabilityDate = $availabilityDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAvailabilityDate(): static
    {
        $this->availabilityDate = null;

        return $this;
    }

    /**
     * @return null|AvailabilityStatusCode
     */
    public function getAvailabilityStatusCode(): ?AvailabilityStatusCode
    {
        return $this->availabilityStatusCode;
    }

    /**
     * @return AvailabilityStatusCode
     */
    public function getAvailabilityStatusCodeWithCreate(): AvailabilityStatusCode
    {
        $this->availabilityStatusCode ??= new AvailabilityStatusCode();

        return $this->availabilityStatusCode;
    }

    /**
     * @param  null|AvailabilityStatusCode $availabilityStatusCode
     * @return static
     */
    public function setAvailabilityStatusCode(
        ?AvailabilityStatusCode $availabilityStatusCode = null
    ): static {
        $this->availabilityStatusCode = $availabilityStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAvailabilityStatusCode(): static
    {
        $this->availabilityStatusCode = null;

        return $this;
    }

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item ??= new Item();

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(
        ?Item $item = null
    ): static {
        $this->item = $item;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItem(): static
    {
        $this->item = null;

        return $this;
    }

    /**
     * @return null|InventoryLocation
     */
    public function getInventoryLocation(): ?InventoryLocation
    {
        return $this->inventoryLocation;
    }

    /**
     * @return InventoryLocation
     */
    public function getInventoryLocationWithCreate(): InventoryLocation
    {
        $this->inventoryLocation ??= new InventoryLocation();

        return $this->inventoryLocation;
    }

    /**
     * @param  null|InventoryLocation $inventoryLocation
     * @return static
     */
    public function setInventoryLocation(
        ?InventoryLocation $inventoryLocation = null
    ): static {
        $this->inventoryLocation = $inventoryLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInventoryLocation(): static
    {
        $this->inventoryLocation = null;

        return $this;
    }
}
