<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequestForQuotationLineID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaxAmount;
use JMS\Serializer\Annotation as JMS;

class QuotationLineType
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
     * @var null|LineExtensionAmount
     */
    #[JMS\Accessor(getter: 'getLineExtensionAmount', setter: 'setLineExtensionAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineExtensionAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineExtensionAmount;

    /**
     * @var null|TotalTaxAmount
     */
    #[JMS\Accessor(getter: 'getTotalTaxAmount', setter: 'setTotalTaxAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalTaxAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaxAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalTaxAmount;

    /**
     * @var null|RequestForQuotationLineID
     */
    #[JMS\Accessor(getter: 'getRequestForQuotationLineID', setter: 'setRequestForQuotationLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestForQuotationLineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequestForQuotationLineID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $requestForQuotationLineID;

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
     * @var null|LineItem
     */
    #[JMS\Accessor(getter: 'getLineItem', setter: 'setLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineItem')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LineItem')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $lineItem;

    /**
     * @var null|array<SellerProposedSubstituteLineItem>
     */
    #[JMS\Accessor(getter: 'getSellerProposedSubstituteLineItem', setter: 'setSellerProposedSubstituteLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerProposedSubstituteLineItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerProposedSubstituteLineItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SellerProposedSubstituteLineItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $sellerProposedSubstituteLineItem;

    /**
     * @var null|array<AlternativeLineItem>
     */
    #[JMS\Accessor(getter: 'getAlternativeLineItem', setter: 'setAlternativeLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AlternativeLineItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AlternativeLineItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AlternativeLineItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $alternativeLineItem;

    /**
     * @var null|RequestLineReference
     */
    #[JMS\Accessor(getter: 'getRequestLineReference', setter: 'setRequestLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestLineReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestLineReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $requestLineReference;

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
     * @return null|LineExtensionAmount
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount ??= new LineExtensionAmount();

        return $this->lineExtensionAmount;
    }

    /**
     * @param  null|LineExtensionAmount $lineExtensionAmount
     * @return static
     */
    public function setLineExtensionAmount(
        ?LineExtensionAmount $lineExtensionAmount = null
    ): static {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineExtensionAmount(): static
    {
        $this->lineExtensionAmount = null;

        return $this;
    }

    /**
     * @return null|TotalTaxAmount
     */
    public function getTotalTaxAmount(): ?TotalTaxAmount
    {
        return $this->totalTaxAmount;
    }

    /**
     * @return TotalTaxAmount
     */
    public function getTotalTaxAmountWithCreate(): TotalTaxAmount
    {
        $this->totalTaxAmount ??= new TotalTaxAmount();

        return $this->totalTaxAmount;
    }

    /**
     * @param  null|TotalTaxAmount $totalTaxAmount
     * @return static
     */
    public function setTotalTaxAmount(
        ?TotalTaxAmount $totalTaxAmount = null
    ): static {
        $this->totalTaxAmount = $totalTaxAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalTaxAmount(): static
    {
        $this->totalTaxAmount = null;

        return $this;
    }

    /**
     * @return null|RequestForQuotationLineID
     */
    public function getRequestForQuotationLineID(): ?RequestForQuotationLineID
    {
        return $this->requestForQuotationLineID;
    }

    /**
     * @return RequestForQuotationLineID
     */
    public function getRequestForQuotationLineIDWithCreate(): RequestForQuotationLineID
    {
        $this->requestForQuotationLineID ??= new RequestForQuotationLineID();

        return $this->requestForQuotationLineID;
    }

    /**
     * @param  null|RequestForQuotationLineID $requestForQuotationLineID
     * @return static
     */
    public function setRequestForQuotationLineID(
        ?RequestForQuotationLineID $requestForQuotationLineID = null
    ): static {
        $this->requestForQuotationLineID = $requestForQuotationLineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestForQuotationLineID(): static
    {
        $this->requestForQuotationLineID = null;

        return $this;
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
     * @return null|LineItem
     */
    public function getLineItem(): ?LineItem
    {
        return $this->lineItem;
    }

    /**
     * @return LineItem
     */
    public function getLineItemWithCreate(): LineItem
    {
        $this->lineItem ??= new LineItem();

        return $this->lineItem;
    }

    /**
     * @param  null|LineItem $lineItem
     * @return static
     */
    public function setLineItem(
        ?LineItem $lineItem = null
    ): static {
        $this->lineItem = $lineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineItem(): static
    {
        $this->lineItem = null;

        return $this;
    }

    /**
     * @return null|array<SellerProposedSubstituteLineItem>
     */
    public function getSellerProposedSubstituteLineItem(): ?array
    {
        return $this->sellerProposedSubstituteLineItem;
    }

    /**
     * @param  null|array<SellerProposedSubstituteLineItem> $sellerProposedSubstituteLineItem
     * @return static
     */
    public function setSellerProposedSubstituteLineItem(
        ?array $sellerProposedSubstituteLineItem = null
    ): static {
        $this->sellerProposedSubstituteLineItem = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerProposedSubstituteLineItem(): static
    {
        $this->sellerProposedSubstituteLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSellerProposedSubstituteLineItem(): static
    {
        $this->sellerProposedSubstituteLineItem = [];

        return $this;
    }

    /**
     * @return null|SellerProposedSubstituteLineItem
     */
    public function firstSellerProposedSubstituteLineItem(): ?SellerProposedSubstituteLineItem
    {
        $sellerProposedSubstituteLineItem = $this->sellerProposedSubstituteLineItem ?? [];
        $sellerProposedSubstituteLineItem = reset($sellerProposedSubstituteLineItem);

        if (false === $sellerProposedSubstituteLineItem) {
            return null;
        }

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @return null|SellerProposedSubstituteLineItem
     */
    public function lastSellerProposedSubstituteLineItem(): ?SellerProposedSubstituteLineItem
    {
        $sellerProposedSubstituteLineItem = $this->sellerProposedSubstituteLineItem ?? [];
        $sellerProposedSubstituteLineItem = end($sellerProposedSubstituteLineItem);

        if (false === $sellerProposedSubstituteLineItem) {
            return null;
        }

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @param  SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return static
     */
    public function addToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): static {
        $this->sellerProposedSubstituteLineItem[] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return SellerProposedSubstituteLineItem
     */
    public function addToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        $this->addToSellerProposedSubstituteLineItem($sellerProposedSubstituteLineItem = new SellerProposedSubstituteLineItem());

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @param  SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return static
     */
    public function addOnceToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): static {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        $this->sellerProposedSubstituteLineItem[0] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return SellerProposedSubstituteLineItem
     */
    public function addOnceToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        if ([] === $this->sellerProposedSubstituteLineItem) {
            $this->addOnceToSellerProposedSubstituteLineItem(new SellerProposedSubstituteLineItem());
        }

        return $this->sellerProposedSubstituteLineItem[0];
    }

    /**
     * @return null|array<AlternativeLineItem>
     */
    public function getAlternativeLineItem(): ?array
    {
        return $this->alternativeLineItem;
    }

    /**
     * @param  null|array<AlternativeLineItem> $alternativeLineItem
     * @return static
     */
    public function setAlternativeLineItem(
        ?array $alternativeLineItem = null
    ): static {
        $this->alternativeLineItem = $alternativeLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAlternativeLineItem(): static
    {
        $this->alternativeLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAlternativeLineItem(): static
    {
        $this->alternativeLineItem = [];

        return $this;
    }

    /**
     * @return null|AlternativeLineItem
     */
    public function firstAlternativeLineItem(): ?AlternativeLineItem
    {
        $alternativeLineItem = $this->alternativeLineItem ?? [];
        $alternativeLineItem = reset($alternativeLineItem);

        if (false === $alternativeLineItem) {
            return null;
        }

        return $alternativeLineItem;
    }

    /**
     * @return null|AlternativeLineItem
     */
    public function lastAlternativeLineItem(): ?AlternativeLineItem
    {
        $alternativeLineItem = $this->alternativeLineItem ?? [];
        $alternativeLineItem = end($alternativeLineItem);

        if (false === $alternativeLineItem) {
            return null;
        }

        return $alternativeLineItem;
    }

    /**
     * @param  AlternativeLineItem $alternativeLineItem
     * @return static
     */
    public function addToAlternativeLineItem(
        AlternativeLineItem $alternativeLineItem
    ): static {
        $this->alternativeLineItem[] = $alternativeLineItem;

        return $this;
    }

    /**
     * @return AlternativeLineItem
     */
    public function addToAlternativeLineItemWithCreate(): AlternativeLineItem
    {
        $this->addToAlternativeLineItem($alternativeLineItem = new AlternativeLineItem());

        return $alternativeLineItem;
    }

    /**
     * @param  AlternativeLineItem $alternativeLineItem
     * @return static
     */
    public function addOnceToAlternativeLineItem(
        AlternativeLineItem $alternativeLineItem
    ): static {
        if (!is_array($this->alternativeLineItem)) {
            $this->alternativeLineItem = [];
        }

        $this->alternativeLineItem[0] = $alternativeLineItem;

        return $this;
    }

    /**
     * @return AlternativeLineItem
     */
    public function addOnceToAlternativeLineItemWithCreate(): AlternativeLineItem
    {
        if (!is_array($this->alternativeLineItem)) {
            $this->alternativeLineItem = [];
        }

        if ([] === $this->alternativeLineItem) {
            $this->addOnceToAlternativeLineItem(new AlternativeLineItem());
        }

        return $this->alternativeLineItem[0];
    }

    /**
     * @return null|RequestLineReference
     */
    public function getRequestLineReference(): ?RequestLineReference
    {
        return $this->requestLineReference;
    }

    /**
     * @return RequestLineReference
     */
    public function getRequestLineReferenceWithCreate(): RequestLineReference
    {
        $this->requestLineReference ??= new RequestLineReference();

        return $this->requestLineReference;
    }

    /**
     * @param  null|RequestLineReference $requestLineReference
     * @return static
     */
    public function setRequestLineReference(
        ?RequestLineReference $requestLineReference = null
    ): static {
        $this->requestLineReference = $requestLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestLineReference(): static
    {
        $this->requestLineReference = null;

        return $this;
    }
}
