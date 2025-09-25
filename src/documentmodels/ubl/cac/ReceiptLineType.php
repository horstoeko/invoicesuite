<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Note;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID;

class ReceiptLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedQuantity", setter="setReceivedQuantity")
     */
    private $receivedQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ShortQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShortQuantity", setter="setShortQuantity")
     */
    private $shortQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ShortageActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShortageActionCode", setter="setShortageActionCode")
     */
    private $shortageActionCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("RejectedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectedQuantity", setter="setRejectedQuantity")
     */
    private $rejectedQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("RejectReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectReasonCode", setter="setRejectReasonCode")
     */
    private $rejectReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason>")
     * @JMS\Expose
     * @JMS\SerializedName("RejectReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RejectReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRejectReason", setter="setRejectReason")
     */
    private $rejectReason;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("RejectActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRejectActionCode", setter="setRejectActionCode")
     */
    private $rejectActionCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode")
     * @JMS\Expose
     * @JMS\SerializedName("QuantityDiscrepancyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantityDiscrepancyCode", setter="setQuantityDiscrepancyCode")
     */
    private $quantityDiscrepancyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OversupplyQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOversupplyQuantity", setter="setOversupplyQuantity")
     */
    private $oversupplyQuantity;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedDate", setter="setReceivedDate")
     */
    private $receivedDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode")
     * @JMS\Expose
     * @JMS\SerializedName("TimingComplaintCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimingComplaintCode", setter="setTimingComplaintCode")
     */
    private $timingComplaintCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint")
     * @JMS\Expose
     * @JMS\SerializedName("TimingComplaint")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimingComplaint", setter="setTimingComplaint")
     */
    private $timingComplaint;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderLineReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OrderLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderLineReference", setter="setOrderLineReference")
     */
    private $orderLineReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DespatchLineReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDespatchLineReference", setter="setDespatchLineReference")
     */
    private $despatchLineReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Item>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Item>")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Item", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment>")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Shipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null $note
     * @return self
     */
    public function setNote(?array $note = null): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNote(): self
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
     * @return self
     */
    public function addOnceToNote(Note $note): self
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ($this->note === []) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity|null
     */
    public function getReceivedQuantity(): ?ReceivedQuantity
    {
        return $this->receivedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity
     */
    public function getReceivedQuantityWithCreate(): ReceivedQuantity
    {
        $this->receivedQuantity = is_null($this->receivedQuantity) ? new ReceivedQuantity() : $this->receivedQuantity;

        return $this->receivedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReceivedQuantity|null $receivedQuantity
     * @return self
     */
    public function setReceivedQuantity(?ReceivedQuantity $receivedQuantity = null): self
    {
        $this->receivedQuantity = $receivedQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedQuantity(): self
    {
        $this->receivedQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity|null
     */
    public function getShortQuantity(): ?ShortQuantity
    {
        return $this->shortQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity
     */
    public function getShortQuantityWithCreate(): ShortQuantity
    {
        $this->shortQuantity = is_null($this->shortQuantity) ? new ShortQuantity() : $this->shortQuantity;

        return $this->shortQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortQuantity|null $shortQuantity
     * @return self
     */
    public function setShortQuantity(?ShortQuantity $shortQuantity = null): self
    {
        $this->shortQuantity = $shortQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShortQuantity(): self
    {
        $this->shortQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode|null
     */
    public function getShortageActionCode(): ?ShortageActionCode
    {
        return $this->shortageActionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode
     */
    public function getShortageActionCodeWithCreate(): ShortageActionCode
    {
        $this->shortageActionCode = is_null($this->shortageActionCode) ? new ShortageActionCode() : $this->shortageActionCode;

        return $this->shortageActionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShortageActionCode|null $shortageActionCode
     * @return self
     */
    public function setShortageActionCode(?ShortageActionCode $shortageActionCode = null): self
    {
        $this->shortageActionCode = $shortageActionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShortageActionCode(): self
    {
        $this->shortageActionCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity|null
     */
    public function getRejectedQuantity(): ?RejectedQuantity
    {
        return $this->rejectedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity
     */
    public function getRejectedQuantityWithCreate(): RejectedQuantity
    {
        $this->rejectedQuantity = is_null($this->rejectedQuantity) ? new RejectedQuantity() : $this->rejectedQuantity;

        return $this->rejectedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectedQuantity|null $rejectedQuantity
     * @return self
     */
    public function setRejectedQuantity(?RejectedQuantity $rejectedQuantity = null): self
    {
        $this->rejectedQuantity = $rejectedQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRejectedQuantity(): self
    {
        $this->rejectedQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode|null
     */
    public function getRejectReasonCode(): ?RejectReasonCode
    {
        return $this->rejectReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode
     */
    public function getRejectReasonCodeWithCreate(): RejectReasonCode
    {
        $this->rejectReasonCode = is_null($this->rejectReasonCode) ? new RejectReasonCode() : $this->rejectReasonCode;

        return $this->rejectReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReasonCode|null $rejectReasonCode
     * @return self
     */
    public function setRejectReasonCode(?RejectReasonCode $rejectReasonCode = null): self
    {
        $this->rejectReasonCode = $rejectReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRejectReasonCode(): self
    {
        $this->rejectReasonCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason>|null
     */
    public function getRejectReason(): ?array
    {
        return $this->rejectReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason>|null $rejectReason
     * @return self
     */
    public function setRejectReason(?array $rejectReason = null): self
    {
        $this->rejectReason = $rejectReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRejectReason(): self
    {
        $this->rejectReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRejectReason(): self
    {
        $this->rejectReason = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason|null
     */
    public function firstRejectReason(): ?RejectReason
    {
        $rejectReason = $this->rejectReason ?? [];
        $rejectReason = reset($rejectReason);

        if ($rejectReason === false) {
            return null;
        }

        return $rejectReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason|null
     */
    public function lastRejectReason(): ?RejectReason
    {
        $rejectReason = $this->rejectReason ?? [];
        $rejectReason = end($rejectReason);

        if ($rejectReason === false) {
            return null;
        }

        return $rejectReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason $rejectReason
     * @return self
     */
    public function addToRejectReason(RejectReason $rejectReason): self
    {
        $this->rejectReason[] = $rejectReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason
     */
    public function addToRejectReasonWithCreate(): RejectReason
    {
        $this->addTorejectReason($rejectReason = new RejectReason());

        return $rejectReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason $rejectReason
     * @return self
     */
    public function addOnceToRejectReason(RejectReason $rejectReason): self
    {
        if (!is_array($this->rejectReason)) {
            $this->rejectReason = [];
        }

        $this->rejectReason[0] = $rejectReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectReason
     */
    public function addOnceToRejectReasonWithCreate(): RejectReason
    {
        if (!is_array($this->rejectReason)) {
            $this->rejectReason = [];
        }

        if ($this->rejectReason === []) {
            $this->addOnceTorejectReason(new RejectReason());
        }

        return $this->rejectReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode|null
     */
    public function getRejectActionCode(): ?RejectActionCode
    {
        return $this->rejectActionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode
     */
    public function getRejectActionCodeWithCreate(): RejectActionCode
    {
        $this->rejectActionCode = is_null($this->rejectActionCode) ? new RejectActionCode() : $this->rejectActionCode;

        return $this->rejectActionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RejectActionCode|null $rejectActionCode
     * @return self
     */
    public function setRejectActionCode(?RejectActionCode $rejectActionCode = null): self
    {
        $this->rejectActionCode = $rejectActionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRejectActionCode(): self
    {
        $this->rejectActionCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode|null
     */
    public function getQuantityDiscrepancyCode(): ?QuantityDiscrepancyCode
    {
        return $this->quantityDiscrepancyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode
     */
    public function getQuantityDiscrepancyCodeWithCreate(): QuantityDiscrepancyCode
    {
        $this->quantityDiscrepancyCode = is_null($this->quantityDiscrepancyCode) ? new QuantityDiscrepancyCode() : $this->quantityDiscrepancyCode;

        return $this->quantityDiscrepancyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\QuantityDiscrepancyCode|null $quantityDiscrepancyCode
     * @return self
     */
    public function setQuantityDiscrepancyCode(?QuantityDiscrepancyCode $quantityDiscrepancyCode = null): self
    {
        $this->quantityDiscrepancyCode = $quantityDiscrepancyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuantityDiscrepancyCode(): self
    {
        $this->quantityDiscrepancyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity|null
     */
    public function getOversupplyQuantity(): ?OversupplyQuantity
    {
        return $this->oversupplyQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity
     */
    public function getOversupplyQuantityWithCreate(): OversupplyQuantity
    {
        $this->oversupplyQuantity = is_null($this->oversupplyQuantity) ? new OversupplyQuantity() : $this->oversupplyQuantity;

        return $this->oversupplyQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OversupplyQuantity|null $oversupplyQuantity
     * @return self
     */
    public function setOversupplyQuantity(?OversupplyQuantity $oversupplyQuantity = null): self
    {
        $this->oversupplyQuantity = $oversupplyQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOversupplyQuantity(): self
    {
        $this->oversupplyQuantity = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReceivedDate(): ?\DateTimeInterface
    {
        return $this->receivedDate;
    }

    /**
     * @param \DateTimeInterface|null $receivedDate
     * @return self
     */
    public function setReceivedDate(?\DateTimeInterface $receivedDate = null): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedDate(): self
    {
        $this->receivedDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode|null
     */
    public function getTimingComplaintCode(): ?TimingComplaintCode
    {
        return $this->timingComplaintCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode
     */
    public function getTimingComplaintCodeWithCreate(): TimingComplaintCode
    {
        $this->timingComplaintCode = is_null($this->timingComplaintCode) ? new TimingComplaintCode() : $this->timingComplaintCode;

        return $this->timingComplaintCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaintCode|null $timingComplaintCode
     * @return self
     */
    public function setTimingComplaintCode(?TimingComplaintCode $timingComplaintCode = null): self
    {
        $this->timingComplaintCode = $timingComplaintCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTimingComplaintCode(): self
    {
        $this->timingComplaintCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint|null
     */
    public function getTimingComplaint(): ?TimingComplaint
    {
        return $this->timingComplaint;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint
     */
    public function getTimingComplaintWithCreate(): TimingComplaint
    {
        $this->timingComplaint = is_null($this->timingComplaint) ? new TimingComplaint() : $this->timingComplaint;

        return $this->timingComplaint;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TimingComplaint|null $timingComplaint
     * @return self
     */
    public function setTimingComplaint(?TimingComplaint $timingComplaint = null): self
    {
        $this->timingComplaint = $timingComplaint;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTimingComplaint(): self
    {
        $this->timingComplaint = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderLineReference|null
     */
    public function getOrderLineReference(): ?OrderLineReference
    {
        return $this->orderLineReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderLineReference
     */
    public function getOrderLineReferenceWithCreate(): OrderLineReference
    {
        $this->orderLineReference = is_null($this->orderLineReference) ? new OrderLineReference() : $this->orderLineReference;

        return $this->orderLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderLineReference|null $orderLineReference
     * @return self
     */
    public function setOrderLineReference(?OrderLineReference $orderLineReference = null): self
    {
        $this->orderLineReference = $orderLineReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderLineReference(): self
    {
        $this->orderLineReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference>|null
     */
    public function getDespatchLineReference(): ?array
    {
        return $this->despatchLineReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference>|null $despatchLineReference
     * @return self
     */
    public function setDespatchLineReference(?array $despatchLineReference = null): self
    {
        $this->despatchLineReference = $despatchLineReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatchLineReference(): self
    {
        $this->despatchLineReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDespatchLineReference(): self
    {
        $this->despatchLineReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference|null
     */
    public function firstDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = reset($despatchLineReference);

        if ($despatchLineReference === false) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference|null
     */
    public function lastDespatchLineReference(): ?DespatchLineReference
    {
        $despatchLineReference = $this->despatchLineReference ?? [];
        $despatchLineReference = end($despatchLineReference);

        if ($despatchLineReference === false) {
            return null;
        }

        return $despatchLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference $despatchLineReference
     * @return self
     */
    public function addToDespatchLineReference(DespatchLineReference $despatchLineReference): self
    {
        $this->despatchLineReference[] = $despatchLineReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference
     */
    public function addToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        $this->addTodespatchLineReference($despatchLineReference = new DespatchLineReference());

        return $despatchLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference $despatchLineReference
     * @return self
     */
    public function addOnceToDespatchLineReference(DespatchLineReference $despatchLineReference): self
    {
        if (!is_array($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        $this->despatchLineReference[0] = $despatchLineReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchLineReference
     */
    public function addOnceToDespatchLineReferenceWithCreate(): DespatchLineReference
    {
        if (!is_array($this->despatchLineReference)) {
            $this->despatchLineReference = [];
        }

        if ($this->despatchLineReference === []) {
            $this->addOnceTodespatchLineReference(new DespatchLineReference());
        }

        return $this->despatchLineReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference>|null
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference>|null $documentReference
     * @return self
     */
    public function setDocumentReference(?array $documentReference = null): self
    {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentReference(): self
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDocumentReference(): self
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference|null
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = reset($documentReference);

        if ($documentReference === false) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference|null
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = end($documentReference);

        if ($documentReference === false) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addToDocumentReference(DocumentReference $documentReference): self
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addOnceToDocumentReference(DocumentReference $documentReference): self
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ($this->documentReference === []) {
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Item>|null
     */
    public function getItem(): ?array
    {
        return $this->item;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Item>|null $item
     * @return self
     */
    public function setItem(?array $item = null): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItem(): self
    {
        $this->item = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItem(): self
    {
        $this->item = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item|null
     */
    public function firstItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = reset($item);

        if ($item === false) {
            return null;
        }

        return $item;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item|null
     */
    public function lastItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = end($item);

        if ($item === false) {
            return null;
        }

        return $item;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Item $item
     * @return self
     */
    public function addToItem(Item $item): self
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item
     */
    public function addToItemWithCreate(): Item
    {
        $this->addToitem($item = new Item());

        return $item;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Item $item
     * @return self
     */
    public function addOnceToItem(Item $item): self
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        $this->item[0] = $item;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Item
     */
    public function addOnceToItemWithCreate(): Item
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        if ($this->item === []) {
            $this->addOnceToitem(new Item());
        }

        return $this->item[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment>|null
     */
    public function getShipment(): ?array
    {
        return $this->shipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment>|null $shipment
     * @return self
     */
    public function setShipment(?array $shipment = null): self
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShipment(): self
    {
        $this->shipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearShipment(): self
    {
        $this->shipment = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment|null
     */
    public function firstShipment(): ?Shipment
    {
        $shipment = $this->shipment ?? [];
        $shipment = reset($shipment);

        if ($shipment === false) {
            return null;
        }

        return $shipment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment|null
     */
    public function lastShipment(): ?Shipment
    {
        $shipment = $this->shipment ?? [];
        $shipment = end($shipment);

        if ($shipment === false) {
            return null;
        }

        return $shipment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment $shipment
     * @return self
     */
    public function addToShipment(Shipment $shipment): self
    {
        $this->shipment[] = $shipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment
     */
    public function addToShipmentWithCreate(): Shipment
    {
        $this->addToshipment($shipment = new Shipment());

        return $shipment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment $shipment
     * @return self
     */
    public function addOnceToShipment(Shipment $shipment): self
    {
        if (!is_array($this->shipment)) {
            $this->shipment = [];
        }

        $this->shipment[0] = $shipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Shipment
     */
    public function addOnceToShipmentWithCreate(): Shipment
    {
        if (!is_array($this->shipment)) {
            $this->shipment = [];
        }

        if ($this->shipment === []) {
            $this->addOnceToshipment(new Shipment());
        }

        return $this->shipment[0];
    }
}
