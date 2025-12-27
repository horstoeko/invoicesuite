<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\documents\models\ubl\cbc\OversupplyQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\QuantityDiscrepancyCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ReceivedQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RejectActionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RejectedQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RejectReason;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RejectReasonCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ShortageActionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ShortQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TimingComplaint;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TimingComplaintCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class ReceiptLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|ReceivedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ReceivedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedQuantity", setter="setReceivedQuantity")
     */
    private $receivedQuantity;

    /**
     * @var null|ShortQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ShortQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ShortQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShortQuantity", setter="setShortQuantity")
     */
    private $shortQuantity;

    /**
     * @var null|ShortageActionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ShortageActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ShortageActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShortageActionCode", setter="setShortageActionCode")
     */
    private $shortageActionCode;

    /**
     * @var null|RejectedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\RejectedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("RejectedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectedQuantity", setter="setRejectedQuantity")
     */
    private $rejectedQuantity;

    /**
     * @var null|RejectReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\RejectReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("RejectReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectReasonCode", setter="setRejectReasonCode")
     */
    private $rejectReasonCode;

    /**
     * @var null|array<RejectReason>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\RejectReason>")
     * @JMS\Expose
     * @JMS\SerializedName("RejectReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RejectReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRejectReason", setter="setRejectReason")
     */
    private $rejectReason;

    /**
     * @var null|RejectActionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\RejectActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("RejectActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectActionCode", setter="setRejectActionCode")
     */
    private $rejectActionCode;

    /**
     * @var null|QuantityDiscrepancyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\QuantityDiscrepancyCode")
     * @JMS\Expose
     * @JMS\SerializedName("QuantityDiscrepancyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantityDiscrepancyCode", setter="setQuantityDiscrepancyCode")
     */
    private $quantityDiscrepancyCode;

    /**
     * @var null|OversupplyQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\OversupplyQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OversupplyQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOversupplyQuantity", setter="setOversupplyQuantity")
     */
    private $oversupplyQuantity;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedDate", setter="setReceivedDate")
     */
    private $receivedDate;

    /**
     * @var null|TimingComplaintCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TimingComplaintCode")
     * @JMS\Expose
     * @JMS\SerializedName("TimingComplaintCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimingComplaintCode", setter="setTimingComplaintCode")
     */
    private $timingComplaintCode;

    /**
     * @var null|TimingComplaint
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TimingComplaint")
     * @JMS\Expose
     * @JMS\SerializedName("TimingComplaint")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimingComplaint", setter="setTimingComplaint")
     */
    private $timingComplaint;

    /**
     * @var null|OrderLineReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\OrderLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderLineReference", setter="setOrderLineReference")
     */
    private $orderLineReference;

    /**
     * @var null|array<DespatchLineReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DespatchLineReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DespatchLineReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDespatchLineReference", setter="setDespatchLineReference")
     */
    private $despatchLineReference;

    /**
     * @var null|array<DocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var null|array<Item>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Item>")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Item", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var null|array<Shipment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Shipment>")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Shipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
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
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
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
    public function setNote(?array $note = null): static
    {
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
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
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
            $this->addOnceTonote(new Note());
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
        $this->receivedQuantity = is_null($this->receivedQuantity) ? new ReceivedQuantity() : $this->receivedQuantity;

        return $this->receivedQuantity;
    }

    /**
     * @param  null|ReceivedQuantity $receivedQuantity
     * @return static
     */
    public function setReceivedQuantity(?ReceivedQuantity $receivedQuantity = null): static
    {
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
        $this->shortQuantity = is_null($this->shortQuantity) ? new ShortQuantity() : $this->shortQuantity;

        return $this->shortQuantity;
    }

    /**
     * @param  null|ShortQuantity $shortQuantity
     * @return static
     */
    public function setShortQuantity(?ShortQuantity $shortQuantity = null): static
    {
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
        $this->shortageActionCode = is_null($this->shortageActionCode) ? new ShortageActionCode() : $this->shortageActionCode;

        return $this->shortageActionCode;
    }

    /**
     * @param  null|ShortageActionCode $shortageActionCode
     * @return static
     */
    public function setShortageActionCode(?ShortageActionCode $shortageActionCode = null): static
    {
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
        $this->rejectedQuantity = is_null($this->rejectedQuantity) ? new RejectedQuantity() : $this->rejectedQuantity;

        return $this->rejectedQuantity;
    }

    /**
     * @param  null|RejectedQuantity $rejectedQuantity
     * @return static
     */
    public function setRejectedQuantity(?RejectedQuantity $rejectedQuantity = null): static
    {
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
        $this->rejectReasonCode = is_null($this->rejectReasonCode) ? new RejectReasonCode() : $this->rejectReasonCode;

        return $this->rejectReasonCode;
    }

    /**
     * @param  null|RejectReasonCode $rejectReasonCode
     * @return static
     */
    public function setRejectReasonCode(?RejectReasonCode $rejectReasonCode = null): static
    {
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
    public function setRejectReason(?array $rejectReason = null): static
    {
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
    public function addToRejectReason(RejectReason $rejectReason): static
    {
        $this->rejectReason[] = $rejectReason;

        return $this;
    }

    /**
     * @return RejectReason
     */
    public function addToRejectReasonWithCreate(): RejectReason
    {
        $this->addTorejectReason($rejectReason = new RejectReason());

        return $rejectReason;
    }

    /**
     * @param  RejectReason $rejectReason
     * @return static
     */
    public function addOnceToRejectReason(RejectReason $rejectReason): static
    {
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
            $this->addOnceTorejectReason(new RejectReason());
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
        $this->rejectActionCode = is_null($this->rejectActionCode) ? new RejectActionCode() : $this->rejectActionCode;

        return $this->rejectActionCode;
    }

    /**
     * @param  null|RejectActionCode $rejectActionCode
     * @return static
     */
    public function setRejectActionCode(?RejectActionCode $rejectActionCode = null): static
    {
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
        $this->quantityDiscrepancyCode = is_null($this->quantityDiscrepancyCode) ? new QuantityDiscrepancyCode() : $this->quantityDiscrepancyCode;

        return $this->quantityDiscrepancyCode;
    }

    /**
     * @param  null|QuantityDiscrepancyCode $quantityDiscrepancyCode
     * @return static
     */
    public function setQuantityDiscrepancyCode(?QuantityDiscrepancyCode $quantityDiscrepancyCode = null): static
    {
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
        $this->oversupplyQuantity = is_null($this->oversupplyQuantity) ? new OversupplyQuantity() : $this->oversupplyQuantity;

        return $this->oversupplyQuantity;
    }

    /**
     * @param  null|OversupplyQuantity $oversupplyQuantity
     * @return static
     */
    public function setOversupplyQuantity(?OversupplyQuantity $oversupplyQuantity = null): static
    {
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
    public function setReceivedDate(?DateTimeInterface $receivedDate = null): static
    {
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
        $this->timingComplaintCode = is_null($this->timingComplaintCode) ? new TimingComplaintCode() : $this->timingComplaintCode;

        return $this->timingComplaintCode;
    }

    /**
     * @param  null|TimingComplaintCode $timingComplaintCode
     * @return static
     */
    public function setTimingComplaintCode(?TimingComplaintCode $timingComplaintCode = null): static
    {
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
        $this->timingComplaint = is_null($this->timingComplaint) ? new TimingComplaint() : $this->timingComplaint;

        return $this->timingComplaint;
    }

    /**
     * @param  null|TimingComplaint $timingComplaint
     * @return static
     */
    public function setTimingComplaint(?TimingComplaint $timingComplaint = null): static
    {
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
        $this->orderLineReference = is_null($this->orderLineReference) ? new OrderLineReference() : $this->orderLineReference;

        return $this->orderLineReference;
    }

    /**
     * @param  null|OrderLineReference $orderLineReference
     * @return static
     */
    public function setOrderLineReference(?OrderLineReference $orderLineReference = null): static
    {
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
    public function setDespatchLineReference(?array $despatchLineReference = null): static
    {
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
    public function addToDespatchLineReference(DespatchLineReference $despatchLineReference): static
    {
        $this->despatchLineReference[] = $despatchLineReference;

        return $this;
    }

    /**
     * @return DespatchLineReference
     */
    public function addToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        $this->addTodespatchLineReference($despatchLineReference = new DespatchLineReference());

        return $despatchLineReference;
    }

    /**
     * @param  DespatchLineReference $despatchLineReference
     * @return static
     */
    public function addOnceToDespatchLineReference(DespatchLineReference $despatchLineReference): static
    {
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
            $this->addOnceTodespatchLineReference(new DespatchLineReference());
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
    public function setDocumentReference(?array $documentReference = null): static
    {
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
    public function addToDocumentReference(DocumentReference $documentReference): static
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(DocumentReference $documentReference): static
    {
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
            $this->addOnceTodocumentReference(new DocumentReference());
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
    public function setItem(?array $item = null): static
    {
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
    public function addToItem(Item $item): static
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * @return Item
     */
    public function addToItemWithCreate(): Item
    {
        $this->addToitem($item = new Item());

        return $item;
    }

    /**
     * @param  Item   $item
     * @return static
     */
    public function addOnceToItem(Item $item): static
    {
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
            $this->addOnceToitem(new Item());
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
    public function setShipment(?array $shipment = null): static
    {
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
    public function addToShipment(Shipment $shipment): static
    {
        $this->shipment[] = $shipment;

        return $this;
    }

    /**
     * @return Shipment
     */
    public function addToShipmentWithCreate(): Shipment
    {
        $this->addToshipment($shipment = new Shipment());

        return $shipment;
    }

    /**
     * @param  Shipment $shipment
     * @return static
     */
    public function addOnceToShipment(Shipment $shipment): static
    {
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
            $this->addOnceToshipment(new Shipment());
        }

        return $this->shipment[0];
    }
}
