<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\BackorderReason;
use horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason;
use horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\UUID;

class DespatchLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveredQuantity", setter="setDeliveredQuantity")
     */
    private $deliveredQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BackorderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBackorderQuantity", setter="setBackorderQuantity")
     */
    private $backorderQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\BackorderReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\BackorderReason>")
     * @JMS\Expose
     * @JMS\SerializedName("BackorderReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BackorderReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getBackorderReason", setter="setBackorderReason")
     */
    private $backorderReason;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OutstandingQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOutstandingQuantity", setter="setOutstandingQuantity")
     */
    private $outstandingQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason>")
     * @JMS\Expose
     * @JMS\SerializedName("OutstandingReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OutstandingReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getOutstandingReason", setter="setOutstandingReason")
     */
    private $outstandingReason;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OversupplyQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOversupplyQuantity", setter="setOversupplyQuantity")
     */
    private $oversupplyQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\OrderLineReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\OrderLineReference>")
     * @JMS\Expose
     * @JMS\SerializedName("OrderLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OrderLineReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOrderLineReference", setter="setOrderLineReference")
     */
    private $orderLineReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Item|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Item")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Shipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Shipment>")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Shipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null $note
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
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode = is_null($this->lineStatusCode) ? new LineStatusCode() : $this->lineStatusCode;

        return $this->lineStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null $lineStatusCode
     * @return self
     */
    public function setLineStatusCode(?LineStatusCode $lineStatusCode = null): self
    {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity|null
     */
    public function getDeliveredQuantity(): ?DeliveredQuantity
    {
        return $this->deliveredQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity
     */
    public function getDeliveredQuantityWithCreate(): DeliveredQuantity
    {
        $this->deliveredQuantity = is_null($this->deliveredQuantity) ? new DeliveredQuantity() : $this->deliveredQuantity;

        return $this->deliveredQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DeliveredQuantity|null $deliveredQuantity
     * @return self
     */
    public function setDeliveredQuantity(?DeliveredQuantity $deliveredQuantity = null): self
    {
        $this->deliveredQuantity = $deliveredQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity|null
     */
    public function getBackorderQuantity(): ?BackorderQuantity
    {
        return $this->backorderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity
     */
    public function getBackorderQuantityWithCreate(): BackorderQuantity
    {
        $this->backorderQuantity = is_null($this->backorderQuantity) ? new BackorderQuantity() : $this->backorderQuantity;

        return $this->backorderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BackorderQuantity|null $backorderQuantity
     * @return self
     */
    public function setBackorderQuantity(?BackorderQuantity $backorderQuantity = null): self
    {
        $this->backorderQuantity = $backorderQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\BackorderReason>|null
     */
    public function getBackorderReason(): ?array
    {
        return $this->backorderReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\BackorderReason>|null $backorderReason
     * @return self
     */
    public function setBackorderReason(?array $backorderReason = null): self
    {
        $this->backorderReason = $backorderReason;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBackorderReason(): self
    {
        $this->backorderReason = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BackorderReason $backorderReason
     * @return self
     */
    public function addToBackorderReason(BackorderReason $backorderReason): self
    {
        $this->backorderReason[] = $backorderReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BackorderReason
     */
    public function addToBackorderReasonWithCreate(): BackorderReason
    {
        $this->addTobackorderReason($backorderReason = new BackorderReason());

        return $backorderReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BackorderReason $backorderReason
     * @return self
     */
    public function addOnceToBackorderReason(BackorderReason $backorderReason): self
    {
        if (!is_array($this->backorderReason)) {
            $this->backorderReason = [];
        }

        $this->backorderReason[0] = $backorderReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BackorderReason
     */
    public function addOnceToBackorderReasonWithCreate(): BackorderReason
    {
        if (!is_array($this->backorderReason)) {
            $this->backorderReason = [];
        }

        if ($this->backorderReason === []) {
            $this->addOnceTobackorderReason(new BackorderReason());
        }

        return $this->backorderReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity|null
     */
    public function getOutstandingQuantity(): ?OutstandingQuantity
    {
        return $this->outstandingQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity
     */
    public function getOutstandingQuantityWithCreate(): OutstandingQuantity
    {
        $this->outstandingQuantity = is_null($this->outstandingQuantity) ? new OutstandingQuantity() : $this->outstandingQuantity;

        return $this->outstandingQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OutstandingQuantity|null $outstandingQuantity
     * @return self
     */
    public function setOutstandingQuantity(?OutstandingQuantity $outstandingQuantity = null): self
    {
        $this->outstandingQuantity = $outstandingQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason>|null
     */
    public function getOutstandingReason(): ?array
    {
        return $this->outstandingReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason>|null $outstandingReason
     * @return self
     */
    public function setOutstandingReason(?array $outstandingReason = null): self
    {
        $this->outstandingReason = $outstandingReason;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOutstandingReason(): self
    {
        $this->outstandingReason = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason $outstandingReason
     * @return self
     */
    public function addToOutstandingReason(OutstandingReason $outstandingReason): self
    {
        $this->outstandingReason[] = $outstandingReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason
     */
    public function addToOutstandingReasonWithCreate(): OutstandingReason
    {
        $this->addTooutstandingReason($outstandingReason = new OutstandingReason());

        return $outstandingReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason $outstandingReason
     * @return self
     */
    public function addOnceToOutstandingReason(OutstandingReason $outstandingReason): self
    {
        if (!is_array($this->outstandingReason)) {
            $this->outstandingReason = [];
        }

        $this->outstandingReason[0] = $outstandingReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OutstandingReason
     */
    public function addOnceToOutstandingReasonWithCreate(): OutstandingReason
    {
        if (!is_array($this->outstandingReason)) {
            $this->outstandingReason = [];
        }

        if ($this->outstandingReason === []) {
            $this->addOnceTooutstandingReason(new OutstandingReason());
        }

        return $this->outstandingReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity|null
     */
    public function getOversupplyQuantity(): ?OversupplyQuantity
    {
        return $this->oversupplyQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity
     */
    public function getOversupplyQuantityWithCreate(): OversupplyQuantity
    {
        $this->oversupplyQuantity = is_null($this->oversupplyQuantity) ? new OversupplyQuantity() : $this->oversupplyQuantity;

        return $this->oversupplyQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OversupplyQuantity|null $oversupplyQuantity
     * @return self
     */
    public function setOversupplyQuantity(?OversupplyQuantity $oversupplyQuantity = null): self
    {
        $this->oversupplyQuantity = $oversupplyQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\OrderLineReference>|null
     */
    public function getOrderLineReference(): ?array
    {
        return $this->orderLineReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\OrderLineReference>|null $orderLineReference
     * @return self
     */
    public function setOrderLineReference(?array $orderLineReference = null): self
    {
        $this->orderLineReference = $orderLineReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOrderLineReference(): self
    {
        $this->orderLineReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OrderLineReference $orderLineReference
     * @return self
     */
    public function addToOrderLineReference(OrderLineReference $orderLineReference): self
    {
        $this->orderLineReference[] = $orderLineReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OrderLineReference
     */
    public function addToOrderLineReferenceWithCreate(): OrderLineReference
    {
        $this->addToorderLineReference($orderLineReference = new OrderLineReference());

        return $orderLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OrderLineReference $orderLineReference
     * @return self
     */
    public function addOnceToOrderLineReference(OrderLineReference $orderLineReference): self
    {
        if (!is_array($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        $this->orderLineReference[0] = $orderLineReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OrderLineReference
     */
    public function addOnceToOrderLineReferenceWithCreate(): OrderLineReference
    {
        if (!is_array($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        if ($this->orderLineReference === []) {
            $this->addOnceToorderLineReference(new OrderLineReference());
        }

        return $this->orderLineReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null $documentReference
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
    public function clearDocumentReference(): self
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addToDocumentReference(DocumentReference $documentReference): self
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item|null
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item = is_null($this->item) ? new Item() : $this->item;

        return $this->item;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Item|null $item
     * @return self
     */
    public function setItem(?Item $item = null): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Shipment>|null
     */
    public function getShipment(): ?array
    {
        return $this->shipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Shipment>|null $shipment
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
    public function clearShipment(): self
    {
        $this->shipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Shipment $shipment
     * @return self
     */
    public function addToShipment(Shipment $shipment): self
    {
        $this->shipment[] = $shipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment
     */
    public function addToShipmentWithCreate(): Shipment
    {
        $this->addToshipment($shipment = new Shipment());

        return $shipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Shipment $shipment
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment
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
