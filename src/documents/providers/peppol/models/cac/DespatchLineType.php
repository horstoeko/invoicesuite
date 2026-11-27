<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BackorderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BackorderReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveredQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OutstandingQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OutstandingReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OversupplyQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class DespatchLineType
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
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $iD;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $uUID;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Note', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|LineStatusCode
     */
    #[JMS\Accessor(getter: 'getLineStatusCode', setter: 'setLineStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $lineStatusCode;

    /**
     * @var null|DeliveredQuantity
     */
    #[JMS\Accessor(getter: 'getDeliveredQuantity', setter: 'setDeliveredQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveredQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveredQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $deliveredQuantity;

    /**
     * @var null|BackorderQuantity
     */
    #[JMS\Accessor(getter: 'getBackorderQuantity', setter: 'setBackorderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BackorderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BackorderQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $backorderQuantity;

    /**
     * @var null|array<BackorderReason>
     */
    #[JMS\Accessor(getter: 'getBackorderReason', setter: 'setBackorderReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BackorderReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BackorderReason>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'BackorderReason', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $backorderReason;

    /**
     * @var null|OutstandingQuantity
     */
    #[JMS\Accessor(getter: 'getOutstandingQuantity', setter: 'setOutstandingQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OutstandingQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OutstandingQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $outstandingQuantity;

    /**
     * @var null|array<OutstandingReason>
     */
    #[JMS\Accessor(getter: 'getOutstandingReason', setter: 'setOutstandingReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OutstandingReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OutstandingReason>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'OutstandingReason', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $outstandingReason;

    /**
     * @var null|OversupplyQuantity
     */
    #[JMS\Accessor(getter: 'getOversupplyQuantity', setter: 'setOversupplyQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OversupplyQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OversupplyQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $oversupplyQuantity;

    /**
     * @var null|array<OrderLineReference>
     */
    #[JMS\Accessor(getter: 'getOrderLineReference', setter: 'setOrderLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderLineReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\OrderLineReference>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'OrderLineReference', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $orderLineReference;

    /**
     * @var null|array<DocumentReference>
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'DocumentReference', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $documentReference;

    /**
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $item;

    /**
     * @var null|array<Shipment>
     */
    #[JMS\Accessor(getter: 'getShipment', setter: 'setShipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Shipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Shipment>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'Shipment', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shipment;

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
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

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
        $note = InvoiceSuiteArrayUtils::first($note);

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
        $note = InvoiceSuiteArrayUtils::last($note);

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

        if (InvoiceSuiteArrayUtils::empty($this->note)) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Note): mixed $callback
     * @return static
     */
    public function forEachNote(
        callable $callback
    ): static {
        foreach ($this->note ?? [] as $note) {
            $callback($note);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(Note): mixed  $callback
     * @return array<array-key, Note>
     */
    public function filterNotes(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->note ?? [], $callback);
    }

    /**
     * @return null|LineStatusCode
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode ??= new LineStatusCode();

        return $this->lineStatusCode;
    }

    /**
     * @param  null|LineStatusCode $lineStatusCode
     * @return static
     */
    public function setLineStatusCode(
        ?LineStatusCode $lineStatusCode = null
    ): static {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusCode(): static
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return null|DeliveredQuantity
     */
    public function getDeliveredQuantity(): ?DeliveredQuantity
    {
        return $this->deliveredQuantity;
    }

    /**
     * @return DeliveredQuantity
     */
    public function getDeliveredQuantityWithCreate(): DeliveredQuantity
    {
        $this->deliveredQuantity ??= new DeliveredQuantity();

        return $this->deliveredQuantity;
    }

    /**
     * @param  null|DeliveredQuantity $deliveredQuantity
     * @return static
     */
    public function setDeliveredQuantity(
        ?DeliveredQuantity $deliveredQuantity = null
    ): static {
        $this->deliveredQuantity = $deliveredQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveredQuantity(): static
    {
        $this->deliveredQuantity = null;

        return $this;
    }

    /**
     * @return null|BackorderQuantity
     */
    public function getBackorderQuantity(): ?BackorderQuantity
    {
        return $this->backorderQuantity;
    }

    /**
     * @return BackorderQuantity
     */
    public function getBackorderQuantityWithCreate(): BackorderQuantity
    {
        $this->backorderQuantity ??= new BackorderQuantity();

        return $this->backorderQuantity;
    }

    /**
     * @param  null|BackorderQuantity $backorderQuantity
     * @return static
     */
    public function setBackorderQuantity(
        ?BackorderQuantity $backorderQuantity = null
    ): static {
        $this->backorderQuantity = $backorderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBackorderQuantity(): static
    {
        $this->backorderQuantity = null;

        return $this;
    }

    /**
     * @return null|array<BackorderReason>
     */
    public function getBackorderReason(): ?array
    {
        return $this->backorderReason;
    }

    /**
     * @param  null|array<BackorderReason> $backorderReason
     * @return static
     */
    public function setBackorderReason(
        ?array $backorderReason = null
    ): static {
        $this->backorderReason = $backorderReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBackorderReason(): static
    {
        $this->backorderReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBackorderReason(): static
    {
        $this->backorderReason = [];

        return $this;
    }

    /**
     * @return null|BackorderReason
     */
    public function firstBackorderReason(): ?BackorderReason
    {
        $backorderReason = $this->backorderReason ?? [];
        $backorderReason = InvoiceSuiteArrayUtils::first($backorderReason);

        if (false === $backorderReason) {
            return null;
        }

        return $backorderReason;
    }

    /**
     * @return null|BackorderReason
     */
    public function lastBackorderReason(): ?BackorderReason
    {
        $backorderReason = $this->backorderReason ?? [];
        $backorderReason = InvoiceSuiteArrayUtils::last($backorderReason);

        if (false === $backorderReason) {
            return null;
        }

        return $backorderReason;
    }

    /**
     * @param  BackorderReason $backorderReason
     * @return static
     */
    public function addToBackorderReason(
        BackorderReason $backorderReason
    ): static {
        $this->backorderReason[] = $backorderReason;

        return $this;
    }

    /**
     * @return BackorderReason
     */
    public function addToBackorderReasonWithCreate(): BackorderReason
    {
        $this->addToBackorderReason($backorderReason = new BackorderReason());

        return $backorderReason;
    }

    /**
     * @param  BackorderReason $backorderReason
     * @return static
     */
    public function addOnceToBackorderReason(
        BackorderReason $backorderReason
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->backorderReason)) {
            $this->backorderReason = [];
        }

        $this->backorderReason[0] = $backorderReason;

        return $this;
    }

    /**
     * @return BackorderReason
     */
    public function addOnceToBackorderReasonWithCreate(): BackorderReason
    {
        if (!InvoiceSuiteArrayUtils::is($this->backorderReason)) {
            $this->backorderReason = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->backorderReason)) {
            $this->addOnceToBackorderReason(new BackorderReason());
        }

        return $this->backorderReason[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(BackorderReason): mixed $callback
     * @return static
     */
    public function forEachBackorderReason(
        callable $callback
    ): static {
        foreach ($this->backorderReason ?? [] as $backorderReason) {
            $callback($backorderReason);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(BackorderReason): mixed  $callback
     * @return array<array-key, BackorderReason>
     */
    public function filterBackorderReasons(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->backorderReason ?? [], $callback);
    }

    /**
     * @return null|OutstandingQuantity
     */
    public function getOutstandingQuantity(): ?OutstandingQuantity
    {
        return $this->outstandingQuantity;
    }

    /**
     * @return OutstandingQuantity
     */
    public function getOutstandingQuantityWithCreate(): OutstandingQuantity
    {
        $this->outstandingQuantity ??= new OutstandingQuantity();

        return $this->outstandingQuantity;
    }

    /**
     * @param  null|OutstandingQuantity $outstandingQuantity
     * @return static
     */
    public function setOutstandingQuantity(
        ?OutstandingQuantity $outstandingQuantity = null
    ): static {
        $this->outstandingQuantity = $outstandingQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOutstandingQuantity(): static
    {
        $this->outstandingQuantity = null;

        return $this;
    }

    /**
     * @return null|array<OutstandingReason>
     */
    public function getOutstandingReason(): ?array
    {
        return $this->outstandingReason;
    }

    /**
     * @param  null|array<OutstandingReason> $outstandingReason
     * @return static
     */
    public function setOutstandingReason(
        ?array $outstandingReason = null
    ): static {
        $this->outstandingReason = $outstandingReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOutstandingReason(): static
    {
        $this->outstandingReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOutstandingReason(): static
    {
        $this->outstandingReason = [];

        return $this;
    }

    /**
     * @return null|OutstandingReason
     */
    public function firstOutstandingReason(): ?OutstandingReason
    {
        $outstandingReason = $this->outstandingReason ?? [];
        $outstandingReason = InvoiceSuiteArrayUtils::first($outstandingReason);

        if (false === $outstandingReason) {
            return null;
        }

        return $outstandingReason;
    }

    /**
     * @return null|OutstandingReason
     */
    public function lastOutstandingReason(): ?OutstandingReason
    {
        $outstandingReason = $this->outstandingReason ?? [];
        $outstandingReason = InvoiceSuiteArrayUtils::last($outstandingReason);

        if (false === $outstandingReason) {
            return null;
        }

        return $outstandingReason;
    }

    /**
     * @param  OutstandingReason $outstandingReason
     * @return static
     */
    public function addToOutstandingReason(
        OutstandingReason $outstandingReason
    ): static {
        $this->outstandingReason[] = $outstandingReason;

        return $this;
    }

    /**
     * @return OutstandingReason
     */
    public function addToOutstandingReasonWithCreate(): OutstandingReason
    {
        $this->addToOutstandingReason($outstandingReason = new OutstandingReason());

        return $outstandingReason;
    }

    /**
     * @param  OutstandingReason $outstandingReason
     * @return static
     */
    public function addOnceToOutstandingReason(
        OutstandingReason $outstandingReason
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->outstandingReason)) {
            $this->outstandingReason = [];
        }

        $this->outstandingReason[0] = $outstandingReason;

        return $this;
    }

    /**
     * @return OutstandingReason
     */
    public function addOnceToOutstandingReasonWithCreate(): OutstandingReason
    {
        if (!InvoiceSuiteArrayUtils::is($this->outstandingReason)) {
            $this->outstandingReason = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->outstandingReason)) {
            $this->addOnceToOutstandingReason(new OutstandingReason());
        }

        return $this->outstandingReason[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(OutstandingReason): mixed $callback
     * @return static
     */
    public function forEachOutstandingReason(
        callable $callback
    ): static {
        foreach ($this->outstandingReason ?? [] as $outstandingReason) {
            $callback($outstandingReason);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(OutstandingReason): mixed  $callback
     * @return array<array-key, OutstandingReason>
     */
    public function filterOutstandingReasons(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->outstandingReason ?? [], $callback);
    }

    /**
     * @return null|OversupplyQuantity
     */
    public function getOversupplyQuantity(): ?OversupplyQuantity
    {
        return $this->oversupplyQuantity;
    }

    /**
     * @return OversupplyQuantity
     */
    public function getOversupplyQuantityWithCreate(): OversupplyQuantity
    {
        $this->oversupplyQuantity ??= new OversupplyQuantity();

        return $this->oversupplyQuantity;
    }

    /**
     * @param  null|OversupplyQuantity $oversupplyQuantity
     * @return static
     */
    public function setOversupplyQuantity(
        ?OversupplyQuantity $oversupplyQuantity = null
    ): static {
        $this->oversupplyQuantity = $oversupplyQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOversupplyQuantity(): static
    {
        $this->oversupplyQuantity = null;

        return $this;
    }

    /**
     * @return null|array<OrderLineReference>
     */
    public function getOrderLineReference(): ?array
    {
        return $this->orderLineReference;
    }

    /**
     * @param  null|array<OrderLineReference> $orderLineReference
     * @return static
     */
    public function setOrderLineReference(
        ?array $orderLineReference = null
    ): static {
        $this->orderLineReference = $orderLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderLineReference(): static
    {
        $this->orderLineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOrderLineReference(): static
    {
        $this->orderLineReference = [];

        return $this;
    }

    /**
     * @return null|OrderLineReference
     */
    public function firstOrderLineReference(): ?OrderLineReference
    {
        $orderLineReference = $this->orderLineReference ?? [];
        $orderLineReference = InvoiceSuiteArrayUtils::first($orderLineReference);

        if (false === $orderLineReference) {
            return null;
        }

        return $orderLineReference;
    }

    /**
     * @return null|OrderLineReference
     */
    public function lastOrderLineReference(): ?OrderLineReference
    {
        $orderLineReference = $this->orderLineReference ?? [];
        $orderLineReference = InvoiceSuiteArrayUtils::last($orderLineReference);

        if (false === $orderLineReference) {
            return null;
        }

        return $orderLineReference;
    }

    /**
     * @param  OrderLineReference $orderLineReference
     * @return static
     */
    public function addToOrderLineReference(
        OrderLineReference $orderLineReference
    ): static {
        $this->orderLineReference[] = $orderLineReference;

        return $this;
    }

    /**
     * @return OrderLineReference
     */
    public function addToOrderLineReferenceWithCreate(): OrderLineReference
    {
        $this->addToOrderLineReference($orderLineReference = new OrderLineReference());

        return $orderLineReference;
    }

    /**
     * @param  OrderLineReference $orderLineReference
     * @return static
     */
    public function addOnceToOrderLineReference(
        OrderLineReference $orderLineReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        $this->orderLineReference[0] = $orderLineReference;

        return $this;
    }

    /**
     * @return OrderLineReference
     */
    public function addOnceToOrderLineReferenceWithCreate(): OrderLineReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->orderLineReference)) {
            $this->addOnceToOrderLineReference(new OrderLineReference());
        }

        return $this->orderLineReference[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(OrderLineReference): mixed $callback
     * @return static
     */
    public function forEachOrderLineReference(
        callable $callback
    ): static {
        foreach ($this->orderLineReference ?? [] as $orderLineReference) {
            $callback($orderLineReference);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(OrderLineReference): mixed  $callback
     * @return array<array-key, OrderLineReference>
     */
    public function filterOrderLineReferences(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->orderLineReference ?? [], $callback);
    }

    /**
     * @return null|array<DocumentReference>
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param  null|array<DocumentReference> $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?array $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentReference(): static
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = InvoiceSuiteArrayUtils::first($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return null|DocumentReference
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = InvoiceSuiteArrayUtils::last($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addToDocumentReference(
        DocumentReference $documentReference
    ): static {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addToDocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(
        DocumentReference $documentReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
            $this->documentReference = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->documentReference)) {
            $this->addOnceToDocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(DocumentReference): mixed $callback
     * @return static
     */
    public function forEachDocumentReference(
        callable $callback
    ): static {
        foreach ($this->documentReference ?? [] as $documentReference) {
            $callback($documentReference);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(DocumentReference): mixed  $callback
     * @return array<array-key, DocumentReference>
     */
    public function filterDocumentReferences(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->documentReference ?? [], $callback);
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
     * @return null|array<Shipment>
     */
    public function getShipment(): ?array
    {
        return $this->shipment;
    }

    /**
     * @param  null|array<Shipment> $shipment
     * @return static
     */
    public function setShipment(
        ?array $shipment = null
    ): static {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipment(): static
    {
        $this->shipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipment(): static
    {
        $this->shipment = [];

        return $this;
    }

    /**
     * @return null|Shipment
     */
    public function firstShipment(): ?Shipment
    {
        $shipment = $this->shipment ?? [];
        $shipment = InvoiceSuiteArrayUtils::first($shipment);

        if (false === $shipment) {
            return null;
        }

        return $shipment;
    }

    /**
     * @return null|Shipment
     */
    public function lastShipment(): ?Shipment
    {
        $shipment = $this->shipment ?? [];
        $shipment = InvoiceSuiteArrayUtils::last($shipment);

        if (false === $shipment) {
            return null;
        }

        return $shipment;
    }

    /**
     * @param  Shipment $shipment
     * @return static
     */
    public function addToShipment(
        Shipment $shipment
    ): static {
        $this->shipment[] = $shipment;

        return $this;
    }

    /**
     * @return Shipment
     */
    public function addToShipmentWithCreate(): Shipment
    {
        $this->addToShipment($shipment = new Shipment());

        return $shipment;
    }

    /**
     * @param  Shipment $shipment
     * @return static
     */
    public function addOnceToShipment(
        Shipment $shipment
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->shipment)) {
            $this->shipment = [];
        }

        $this->shipment[0] = $shipment;

        return $this;
    }

    /**
     * @return Shipment
     */
    public function addOnceToShipmentWithCreate(): Shipment
    {
        if (!InvoiceSuiteArrayUtils::is($this->shipment)) {
            $this->shipment = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->shipment)) {
            $this->addOnceToShipment(new Shipment());
        }

        return $this->shipment[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Shipment): mixed $callback
     * @return static
     */
    public function forEachShipment(
        callable $callback
    ): static {
        foreach ($this->shipment ?? [] as $shipment) {
            $callback($shipment);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(Shipment): mixed  $callback
     * @return array<array-key, Shipment>
     */
    public function filterShipments(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->shipment ?? [], $callback);
    }
}
