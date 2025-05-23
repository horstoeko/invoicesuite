<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID;
use horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount;

class QuotationLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LineExtensionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineExtensionAmount", setter="setLineExtensionAmount")
     */
    private $lineExtensionAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalTaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalTaxAmount", setter="setTotalTaxAmount")
     */
    private $totalTaxAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID")
     * @JMS\Expose
     * @JMS\SerializedName("RequestForQuotationLineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestForQuotationLineID", setter="setRequestForQuotationLineID")
     */
    private $requestForQuotationLineID;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\LineItem|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LineItem")
     * @JMS\Expose
     * @JMS\SerializedName("LineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineItem", setter="setLineItem")
     */
    private $lineItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SellerProposedSubstituteLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SellerProposedSubstituteLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSellerProposedSubstituteLineItem", setter="setSellerProposedSubstituteLineItem")
     */
    private $sellerProposedSubstituteLineItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("AlternativeLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AlternativeLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAlternativeLineItem", setter="setAlternativeLineItem")
     */
    private $alternativeLineItem;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequestLineReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequestLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("RequestLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestLineReference", setter="setRequestLineReference")
     */
    private $requestLineReference;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount = is_null($this->lineExtensionAmount) ? new LineExtensionAmount() : $this->lineExtensionAmount;

        return $this->lineExtensionAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null $lineExtensionAmount
     * @return self
     */
    public function setLineExtensionAmount(?LineExtensionAmount $lineExtensionAmount = null): self
    {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount|null
     */
    public function getTotalTaxAmount(): ?TotalTaxAmount
    {
        return $this->totalTaxAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount
     */
    public function getTotalTaxAmountWithCreate(): TotalTaxAmount
    {
        $this->totalTaxAmount = is_null($this->totalTaxAmount) ? new TotalTaxAmount() : $this->totalTaxAmount;

        return $this->totalTaxAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalTaxAmount|null $totalTaxAmount
     * @return self
     */
    public function setTotalTaxAmount(?TotalTaxAmount $totalTaxAmount = null): self
    {
        $this->totalTaxAmount = $totalTaxAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID|null
     */
    public function getRequestForQuotationLineID(): ?RequestForQuotationLineID
    {
        return $this->requestForQuotationLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID
     */
    public function getRequestForQuotationLineIDWithCreate(): RequestForQuotationLineID
    {
        $this->requestForQuotationLineID = is_null($this->requestForQuotationLineID) ? new RequestForQuotationLineID() : $this->requestForQuotationLineID;

        return $this->requestForQuotationLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RequestForQuotationLineID|null $requestForQuotationLineID
     * @return self
     */
    public function setRequestForQuotationLineID(?RequestForQuotationLineID $requestForQuotationLineID = null): self
    {
        $this->requestForQuotationLineID = $requestForQuotationLineID;

        return $this;
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\LineItem|null
     */
    public function getLineItem(): ?LineItem
    {
        return $this->lineItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LineItem
     */
    public function getLineItemWithCreate(): LineItem
    {
        $this->lineItem = is_null($this->lineItem) ? new LineItem() : $this->lineItem;

        return $this->lineItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LineItem|null $lineItem
     * @return self
     */
    public function setLineItem(?LineItem $lineItem = null): self
    {
        $this->lineItem = $lineItem;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem>|null
     */
    public function getSellerProposedSubstituteLineItem(): ?array
    {
        return $this->sellerProposedSubstituteLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem>|null $sellerProposedSubstituteLineItem
     * @return self
     */
    public function setSellerProposedSubstituteLineItem(?array $sellerProposedSubstituteLineItem = null): self
    {
        $this->sellerProposedSubstituteLineItem = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSellerProposedSubstituteLineItem(): self
    {
        $this->sellerProposedSubstituteLineItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return self
     */
    public function addToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): self {
        $this->sellerProposedSubstituteLineItem[] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem
     */
    public function addToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        $this->addTosellerProposedSubstituteLineItem($sellerProposedSubstituteLineItem = new SellerProposedSubstituteLineItem());

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return self
     */
    public function addOnceToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): self {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        $this->sellerProposedSubstituteLineItem[0] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerProposedSubstituteLineItem
     */
    public function addOnceToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        if ($this->sellerProposedSubstituteLineItem === []) {
            $this->addOnceTosellerProposedSubstituteLineItem(new SellerProposedSubstituteLineItem());
        }

        return $this->sellerProposedSubstituteLineItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem>|null
     */
    public function getAlternativeLineItem(): ?array
    {
        return $this->alternativeLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem>|null $alternativeLineItem
     * @return self
     */
    public function setAlternativeLineItem(?array $alternativeLineItem = null): self
    {
        $this->alternativeLineItem = $alternativeLineItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAlternativeLineItem(): self
    {
        $this->alternativeLineItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem $alternativeLineItem
     * @return self
     */
    public function addToAlternativeLineItem(AlternativeLineItem $alternativeLineItem): self
    {
        $this->alternativeLineItem[] = $alternativeLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem
     */
    public function addToAlternativeLineItemWithCreate(): AlternativeLineItem
    {
        $this->addToalternativeLineItem($alternativeLineItem = new AlternativeLineItem());

        return $alternativeLineItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem $alternativeLineItem
     * @return self
     */
    public function addOnceToAlternativeLineItem(AlternativeLineItem $alternativeLineItem): self
    {
        if (!is_array($this->alternativeLineItem)) {
            $this->alternativeLineItem = [];
        }

        $this->alternativeLineItem[0] = $alternativeLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AlternativeLineItem
     */
    public function addOnceToAlternativeLineItemWithCreate(): AlternativeLineItem
    {
        if (!is_array($this->alternativeLineItem)) {
            $this->alternativeLineItem = [];
        }

        if ($this->alternativeLineItem === []) {
            $this->addOnceToalternativeLineItem(new AlternativeLineItem());
        }

        return $this->alternativeLineItem[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestLineReference|null
     */
    public function getRequestLineReference(): ?RequestLineReference
    {
        return $this->requestLineReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestLineReference
     */
    public function getRequestLineReferenceWithCreate(): RequestLineReference
    {
        $this->requestLineReference = is_null($this->requestLineReference) ? new RequestLineReference() : $this->requestLineReference;

        return $this->requestLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestLineReference|null $requestLineReference
     * @return self
     */
    public function setRequestLineReference(?RequestLineReference $requestLineReference = null): self
    {
        $this->requestLineReference = $requestLineReference;

        return $this;
    }
}
