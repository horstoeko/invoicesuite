<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OversupplyQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\QuantityDiscrepancyCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectActionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectReasonCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShortageActionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShortQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimingComplaint;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimingComplaintCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class ReceiptLineType
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
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

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
     * @var null|ReceivedQuantity
     */
    #[JMS\Accessor(getter: 'getReceivedQuantity', setter: 'setReceivedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedQuantity;

    /**
     * @var null|ShortQuantity
     */
    #[JMS\Accessor(getter: 'getShortQuantity', setter: 'setShortQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShortQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShortQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $shortQuantity;

    /**
     * @var null|ShortageActionCode
     */
    #[JMS\Accessor(getter: 'getShortageActionCode', setter: 'setShortageActionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShortageActionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShortageActionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $shortageActionCode;

    /**
     * @var null|RejectedQuantity
     */
    #[JMS\Accessor(getter: 'getRejectedQuantity', setter: 'setRejectedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RejectedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $rejectedQuantity;

    /**
     * @var null|RejectReasonCode
     */
    #[JMS\Accessor(getter: 'getRejectReasonCode', setter: 'setRejectReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RejectReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $rejectReasonCode;

    /**
     * @var null|array<RejectReason>
     */
    #[JMS\Accessor(getter: 'getRejectReason', setter: 'setRejectReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RejectReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectReason>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RejectReason', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $rejectReason;

    /**
     * @var null|RejectActionCode
     */
    #[JMS\Accessor(getter: 'getRejectActionCode', setter: 'setRejectActionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RejectActionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RejectActionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $rejectActionCode;

    /**
     * @var null|QuantityDiscrepancyCode
     */
    #[JMS\Accessor(getter: 'getQuantityDiscrepancyCode', setter: 'setQuantityDiscrepancyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('QuantityDiscrepancyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\QuantityDiscrepancyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantityDiscrepancyCode;

    /**
     * @var null|OversupplyQuantity
     */
    #[JMS\Accessor(getter: 'getOversupplyQuantity', setter: 'setOversupplyQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OversupplyQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OversupplyQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $oversupplyQuantity;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getReceivedDate', setter: 'setReceivedDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedDate;

    /**
     * @var null|TimingComplaintCode
     */
    #[JMS\Accessor(getter: 'getTimingComplaintCode', setter: 'setTimingComplaintCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TimingComplaintCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimingComplaintCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $timingComplaintCode;

    /**
     * @var null|TimingComplaint
     */
    #[JMS\Accessor(getter: 'getTimingComplaint', setter: 'setTimingComplaint')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TimingComplaint')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimingComplaint')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $timingComplaint;

    /**
     * @var null|OrderLineReference
     */
    #[JMS\Accessor(getter: 'getOrderLineReference', setter: 'setOrderLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderLineReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OrderLineReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $orderLineReference;

    /**
     * @var null|array<DespatchLineReference>
     */
    #[JMS\Accessor(getter: 'getDespatchLineReference', setter: 'setDespatchLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DespatchLineReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DespatchLineReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DespatchLineReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $despatchLineReference;

    /**
     * @var null|array<DocumentReference>
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $documentReference;

    /**
     * @var null|array<Item>
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Item', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $item;

    /**
     * @var null|array<Shipment>
     */
    #[JMS\Accessor(getter: 'getShipment', setter: 'setShipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Shipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Shipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Shipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        if (!is_array($this->note)) {
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
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|ReceivedQuantity
     */
    public function getReceivedQuantity(): ?ReceivedQuantity
    {
        return $this->receivedQuantity;
    }

    /**
     * @return ReceivedQuantity
     */
    public function getReceivedQuantityWithCreate(): ReceivedQuantity
    {
        $this->receivedQuantity ??= new ReceivedQuantity();

        return $this->receivedQuantity;
    }

    /**
     * @param  null|ReceivedQuantity $receivedQuantity
     * @return static
     */
    public function setReceivedQuantity(
        ?ReceivedQuantity $receivedQuantity = null
    ): static {
        $this->receivedQuantity = $receivedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedQuantity(): static
    {
        $this->receivedQuantity = null;

        return $this;
    }

    /**
     * @return null|ShortQuantity
     */
    public function getShortQuantity(): ?ShortQuantity
    {
        return $this->shortQuantity;
    }

    /**
     * @return ShortQuantity
     */
    public function getShortQuantityWithCreate(): ShortQuantity
    {
        $this->shortQuantity ??= new ShortQuantity();

        return $this->shortQuantity;
    }

    /**
     * @param  null|ShortQuantity $shortQuantity
     * @return static
     */
    public function setShortQuantity(
        ?ShortQuantity $shortQuantity = null
    ): static {
        $this->shortQuantity = $shortQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShortQuantity(): static
    {
        $this->shortQuantity = null;

        return $this;
    }

    /**
     * @return null|ShortageActionCode
     */
    public function getShortageActionCode(): ?ShortageActionCode
    {
        return $this->shortageActionCode;
    }

    /**
     * @return ShortageActionCode
     */
    public function getShortageActionCodeWithCreate(): ShortageActionCode
    {
        $this->shortageActionCode ??= new ShortageActionCode();

        return $this->shortageActionCode;
    }

    /**
     * @param  null|ShortageActionCode $shortageActionCode
     * @return static
     */
    public function setShortageActionCode(
        ?ShortageActionCode $shortageActionCode = null
    ): static {
        $this->shortageActionCode = $shortageActionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShortageActionCode(): static
    {
        $this->shortageActionCode = null;

        return $this;
    }

    /**
     * @return null|RejectedQuantity
     */
    public function getRejectedQuantity(): ?RejectedQuantity
    {
        return $this->rejectedQuantity;
    }

    /**
     * @return RejectedQuantity
     */
    public function getRejectedQuantityWithCreate(): RejectedQuantity
    {
        $this->rejectedQuantity ??= new RejectedQuantity();

        return $this->rejectedQuantity;
    }

    /**
     * @param  null|RejectedQuantity $rejectedQuantity
     * @return static
     */
    public function setRejectedQuantity(
        ?RejectedQuantity $rejectedQuantity = null
    ): static {
        $this->rejectedQuantity = $rejectedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRejectedQuantity(): static
    {
        $this->rejectedQuantity = null;

        return $this;
    }

    /**
     * @return null|RejectReasonCode
     */
    public function getRejectReasonCode(): ?RejectReasonCode
    {
        return $this->rejectReasonCode;
    }

    /**
     * @return RejectReasonCode
     */
    public function getRejectReasonCodeWithCreate(): RejectReasonCode
    {
        $this->rejectReasonCode ??= new RejectReasonCode();

        return $this->rejectReasonCode;
    }

    /**
     * @param  null|RejectReasonCode $rejectReasonCode
     * @return static
     */
    public function setRejectReasonCode(
        ?RejectReasonCode $rejectReasonCode = null
    ): static {
        $this->rejectReasonCode = $rejectReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRejectReasonCode(): static
    {
        $this->rejectReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<RejectReason>
     */
    public function getRejectReason(): ?array
    {
        return $this->rejectReason;
    }

    /**
     * @param  null|array<RejectReason> $rejectReason
     * @return static
     */
    public function setRejectReason(
        ?array $rejectReason = null
    ): static {
        $this->rejectReason = $rejectReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRejectReason(): static
    {
        $this->rejectReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRejectReason(): static
    {
        $this->rejectReason = [];

        return $this;
    }

    /**
     * @return null|RejectReason
     */
    public function firstRejectReason(): ?RejectReason
    {
        $rejectReason = $this->rejectReason ?? [];
        $rejectReason = reset($rejectReason);

        if (false === $rejectReason) {
            return null;
        }

        return $rejectReason;
    }

    /**
     * @return null|RejectReason
     */
    public function lastRejectReason(): ?RejectReason
    {
        $rejectReason = $this->rejectReason ?? [];
        $rejectReason = end($rejectReason);

        if (false === $rejectReason) {
            return null;
        }

        return $rejectReason;
    }

    /**
     * @param  RejectReason $rejectReason
     * @return static
     */
    public function addToRejectReason(
        RejectReason $rejectReason
    ): static {
        $this->rejectReason[] = $rejectReason;

        return $this;
    }

    /**
     * @return RejectReason
     */
    public function addToRejectReasonWithCreate(): RejectReason
    {
        $this->addToRejectReason($rejectReason = new RejectReason());

        return $rejectReason;
    }

    /**
     * @param  RejectReason $rejectReason
     * @return static
     */
    public function addOnceToRejectReason(
        RejectReason $rejectReason
    ): static {
        if (!is_array($this->rejectReason)) {
            $this->rejectReason = [];
        }

        $this->rejectReason[0] = $rejectReason;

        return $this;
    }

    /**
     * @return RejectReason
     */
    public function addOnceToRejectReasonWithCreate(): RejectReason
    {
        if (!is_array($this->rejectReason)) {
            $this->rejectReason = [];
        }

        if ([] === $this->rejectReason) {
            $this->addOnceToRejectReason(new RejectReason());
        }

        return $this->rejectReason[0];
    }

    /**
     * @return null|RejectActionCode
     */
    public function getRejectActionCode(): ?RejectActionCode
    {
        return $this->rejectActionCode;
    }

    /**
     * @return RejectActionCode
     */
    public function getRejectActionCodeWithCreate(): RejectActionCode
    {
        $this->rejectActionCode ??= new RejectActionCode();

        return $this->rejectActionCode;
    }

    /**
     * @param  null|RejectActionCode $rejectActionCode
     * @return static
     */
    public function setRejectActionCode(
        ?RejectActionCode $rejectActionCode = null
    ): static {
        $this->rejectActionCode = $rejectActionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRejectActionCode(): static
    {
        $this->rejectActionCode = null;

        return $this;
    }

    /**
     * @return null|QuantityDiscrepancyCode
     */
    public function getQuantityDiscrepancyCode(): ?QuantityDiscrepancyCode
    {
        return $this->quantityDiscrepancyCode;
    }

    /**
     * @return QuantityDiscrepancyCode
     */
    public function getQuantityDiscrepancyCodeWithCreate(): QuantityDiscrepancyCode
    {
        $this->quantityDiscrepancyCode ??= new QuantityDiscrepancyCode();

        return $this->quantityDiscrepancyCode;
    }

    /**
     * @param  null|QuantityDiscrepancyCode $quantityDiscrepancyCode
     * @return static
     */
    public function setQuantityDiscrepancyCode(
        ?QuantityDiscrepancyCode $quantityDiscrepancyCode = null
    ): static {
        $this->quantityDiscrepancyCode = $quantityDiscrepancyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantityDiscrepancyCode(): static
    {
        $this->quantityDiscrepancyCode = null;

        return $this;
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
     * @return null|DateTimeInterface
     */
    public function getReceivedDate(): ?DateTimeInterface
    {
        return $this->receivedDate;
    }

    /**
     * @param  null|DateTimeInterface $receivedDate
     * @return static
     */
    public function setReceivedDate(
        ?DateTimeInterface $receivedDate = null
    ): static {
        $this->receivedDate = $receivedDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedDate(): static
    {
        $this->receivedDate = null;

        return $this;
    }

    /**
     * @return null|TimingComplaintCode
     */
    public function getTimingComplaintCode(): ?TimingComplaintCode
    {
        return $this->timingComplaintCode;
    }

    /**
     * @return TimingComplaintCode
     */
    public function getTimingComplaintCodeWithCreate(): TimingComplaintCode
    {
        $this->timingComplaintCode ??= new TimingComplaintCode();

        return $this->timingComplaintCode;
    }

    /**
     * @param  null|TimingComplaintCode $timingComplaintCode
     * @return static
     */
    public function setTimingComplaintCode(
        ?TimingComplaintCode $timingComplaintCode = null
    ): static {
        $this->timingComplaintCode = $timingComplaintCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimingComplaintCode(): static
    {
        $this->timingComplaintCode = null;

        return $this;
    }

    /**
     * @return null|TimingComplaint
     */
    public function getTimingComplaint(): ?TimingComplaint
    {
        return $this->timingComplaint;
    }

    /**
     * @return TimingComplaint
     */
    public function getTimingComplaintWithCreate(): TimingComplaint
    {
        $this->timingComplaint ??= new TimingComplaint();

        return $this->timingComplaint;
    }

    /**
     * @param  null|TimingComplaint $timingComplaint
     * @return static
     */
    public function setTimingComplaint(
        ?TimingComplaint $timingComplaint = null
    ): static {
        $this->timingComplaint = $timingComplaint;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimingComplaint(): static
    {
        $this->timingComplaint = null;

        return $this;
    }

    /**
     * @return null|OrderLineReference
     */
    public function getOrderLineReference(): ?OrderLineReference
    {
        return $this->orderLineReference;
    }

    /**
     * @return OrderLineReference
     */
    public function getOrderLineReferenceWithCreate(): OrderLineReference
    {
        $this->orderLineReference ??= new OrderLineReference();

        return $this->orderLineReference;
    }

    /**
     * @param  null|OrderLineReference $orderLineReference
     * @return static
     */
    public function setOrderLineReference(
        ?OrderLineReference $orderLineReference = null
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
     * @return null|array<DespatchLineReference>
     */
    public function getDespatchLineReference(): ?array
    {
        return $this->despatchLineReference;
    }

    /**
     * @param  null|array<DespatchLineReference> $despatchLineReference
     * @return static
     */
    public function setDespatchLineReference(
        ?array $despatchLineReference = null
    ): static {
        $this->despatchLineReference = $despatchLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchLineReference(): static
    {
        $this->despatchLineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDespatchLineReference(): static
    {
        $this->despatchLineReference = [];

        return $this;
    }

    /**
     * @return null|DespatchLineReference
     */
    public function firstDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = reset($despatchLineReference);

        if (false === $despatchLineReference) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @return null|DespatchLineReference
     */
    public function lastDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = end($despatchLineReference);

        if (false === $despatchLineReference) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @param  DespatchLineReference $despatchLineReference
     * @return static
     */
    public function addToDespatchLineReference(
        DespatchLineReference $despatchLineReference
    ): static {
        $this->despatchLineReference[] = $despatchLineReference;

        return $this;
    }

    /**
     * @return DespatchLineReference
     */
    public function addToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        $this->addToDespatchLineReference($despatchLineReference = new DespatchLineReference());

        return $despatchLineReference;
    }

    /**
     * @param  DespatchLineReference $despatchLineReference
     * @return static
     */
    public function addOnceToDespatchLineReference(
        DespatchLineReference $despatchLineReference
    ): static {
        if (!is_array($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        $this->despatchLineReference[0] = $despatchLineReference;

        return $this;
    }

    /**
     * @return DespatchLineReference
     */
    public function addOnceToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        if (!is_array($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        if ([] === $this->despatchLineReference) {
            $this->addOnceToDespatchLineReference(new DespatchLineReference());
        }

        return $this->despatchLineReference[0];
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
        $documentReference = reset($documentReference);

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
        $documentReference = end($documentReference);

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
        if (!is_array($this->documentReference)) {
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
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceToDocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return null|array<Item>
     */
    public function getItem(): ?array
    {
        return $this->item;
    }

    /**
     * @param  null|array<Item> $item
     * @return static
     */
    public function setItem(
        ?array $item = null
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
     * @return static
     */
    public function clearItem(): static
    {
        $this->item = [];

        return $this;
    }

    /**
     * @return null|Item
     */
    public function firstItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = reset($item);

        if (false === $item) {
            return null;
        }

        return $item;
    }

    /**
     * @return null|Item
     */
    public function lastItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = end($item);

        if (false === $item) {
            return null;
        }

        return $item;
    }

    /**
     * @param  Item   $item
     * @return static
     */
    public function addToItem(
        Item $item
    ): static {
        $this->item[] = $item;

        return $this;
    }

    /**
     * @return Item
     */
    public function addToItemWithCreate(): Item
    {
        $this->addToItem($item = new Item());

        return $item;
    }

    /**
     * @param  Item   $item
     * @return static
     */
    public function addOnceToItem(
        Item $item
    ): static {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        $this->item[0] = $item;

        return $this;
    }

    /**
     * @return Item
     */
    public function addOnceToItemWithCreate(): Item
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        if ([] === $this->item) {
            $this->addOnceToItem(new Item());
        }

        return $this->item[0];
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
        $shipment = reset($shipment);

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
        $shipment = end($shipment);

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
        if (!is_array($this->shipment)) {
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
        if (!is_array($this->shipment)) {
            $this->shipment = [];
        }

        if ([] === $this->shipment) {
            $this->addOnceToShipment(new Shipment());
        }

        return $this->shipment[0];
    }
}
