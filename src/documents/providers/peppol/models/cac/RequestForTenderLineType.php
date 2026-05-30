<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EstimatedAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class RequestForTenderLineType
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
     * @var null|MinimumQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumQuantity', setter: 'setMinimumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumQuantity;

    /**
     * @var null|MaximumQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumQuantity', setter: 'setMaximumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumQuantity;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getTaxIncludedIndicator', setter: 'setTaxIncludedIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxIncludedIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxIncludedIndicator;

    /**
     * @var null|MinimumAmount
     */
    #[JMS\Accessor(getter: 'getMinimumAmount', setter: 'setMinimumAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumAmount;

    /**
     * @var null|MaximumAmount
     */
    #[JMS\Accessor(getter: 'getMaximumAmount', setter: 'setMaximumAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumAmount;

    /**
     * @var null|EstimatedAmount
     */
    #[JMS\Accessor(getter: 'getEstimatedAmount', setter: 'setEstimatedAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EstimatedAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $estimatedAmount;

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
     * @var null|array<DeliveryPeriod>
     */
    #[JMS\Accessor(getter: 'getDeliveryPeriod', setter: 'setDeliveryPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryPeriod')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryPeriod>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DeliveryPeriod', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $deliveryPeriod;

    /**
     * @var null|array<RequiredItemLocationQuantity>
     */
    #[JMS\Accessor(getter: 'getRequiredItemLocationQuantity', setter: 'setRequiredItemLocationQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredItemLocationQuantity')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequiredItemLocationQuantity>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RequiredItemLocationQuantity', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requiredItemLocationQuantity;

    /**
     * @var null|WarrantyValidityPeriod
     */
    #[JMS\Accessor(getter: 'getWarrantyValidityPeriod', setter: 'setWarrantyValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WarrantyValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $warrantyValidityPeriod;

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
     * @var null|array<SubRequestForTenderLine>
     */
    #[JMS\Accessor(getter: 'getSubRequestForTenderLine', setter: 'setSubRequestForTenderLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubRequestForTenderLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubRequestForTenderLine>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubRequestForTenderLine', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subRequestForTenderLine;

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
        $this->addTonote($note = new Note());

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
            $this->addOnceTonote(new Note());
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
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity ??= new MinimumQuantity();

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(
        ?MinimumQuantity $minimumQuantity = null
    ): static {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity ??= new MaximumQuantity();

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(
        ?MaximumQuantity $maximumQuantity = null
    ): static {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getTaxIncludedIndicator(): ?bool
    {
        return $this->taxIncludedIndicator;
    }

    /**
     * @param  null|bool $taxIncludedIndicator
     * @return static
     */
    public function setTaxIncludedIndicator(
        ?bool $taxIncludedIndicator = null
    ): static {
        $this->taxIncludedIndicator = $taxIncludedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxIncludedIndicator(): static
    {
        $this->taxIncludedIndicator = null;

        return $this;
    }

    /**
     * @return null|MinimumAmount
     */
    public function getMinimumAmount(): ?MinimumAmount
    {
        return $this->minimumAmount;
    }

    /**
     * @return MinimumAmount
     */
    public function getMinimumAmountWithCreate(): MinimumAmount
    {
        $this->minimumAmount ??= new MinimumAmount();

        return $this->minimumAmount;
    }

    /**
     * @param  null|MinimumAmount $minimumAmount
     * @return static
     */
    public function setMinimumAmount(
        ?MinimumAmount $minimumAmount = null
    ): static {
        $this->minimumAmount = $minimumAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumAmount(): static
    {
        $this->minimumAmount = null;

        return $this;
    }

    /**
     * @return null|MaximumAmount
     */
    public function getMaximumAmount(): ?MaximumAmount
    {
        return $this->maximumAmount;
    }

    /**
     * @return MaximumAmount
     */
    public function getMaximumAmountWithCreate(): MaximumAmount
    {
        $this->maximumAmount ??= new MaximumAmount();

        return $this->maximumAmount;
    }

    /**
     * @param  null|MaximumAmount $maximumAmount
     * @return static
     */
    public function setMaximumAmount(
        ?MaximumAmount $maximumAmount = null
    ): static {
        $this->maximumAmount = $maximumAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumAmount(): static
    {
        $this->maximumAmount = null;

        return $this;
    }

    /**
     * @return null|EstimatedAmount
     */
    public function getEstimatedAmount(): ?EstimatedAmount
    {
        return $this->estimatedAmount;
    }

    /**
     * @return EstimatedAmount
     */
    public function getEstimatedAmountWithCreate(): EstimatedAmount
    {
        $this->estimatedAmount ??= new EstimatedAmount();

        return $this->estimatedAmount;
    }

    /**
     * @param  null|EstimatedAmount $estimatedAmount
     * @return static
     */
    public function setEstimatedAmount(
        ?EstimatedAmount $estimatedAmount = null
    ): static {
        $this->estimatedAmount = $estimatedAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedAmount(): static
    {
        $this->estimatedAmount = null;

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
        $this->addTodocumentReference($documentReference = new DocumentReference());

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
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return null|array<DeliveryPeriod>
     */
    public function getDeliveryPeriod(): ?array
    {
        return $this->deliveryPeriod;
    }

    /**
     * @param  null|array<DeliveryPeriod> $deliveryPeriod
     * @return static
     */
    public function setDeliveryPeriod(
        ?array $deliveryPeriod = null
    ): static {
        $this->deliveryPeriod = $deliveryPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryPeriod(): static
    {
        $this->deliveryPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryPeriod(): static
    {
        $this->deliveryPeriod = [];

        return $this;
    }

    /**
     * @return null|DeliveryPeriod
     */
    public function firstDeliveryPeriod(): ?DeliveryPeriod
    {
        $deliveryPeriod = $this->deliveryPeriod ?? [];
        $deliveryPeriod = reset($deliveryPeriod);

        if (false === $deliveryPeriod) {
            return null;
        }

        return $deliveryPeriod;
    }

    /**
     * @return null|DeliveryPeriod
     */
    public function lastDeliveryPeriod(): ?DeliveryPeriod
    {
        $deliveryPeriod = $this->deliveryPeriod ?? [];
        $deliveryPeriod = end($deliveryPeriod);

        if (false === $deliveryPeriod) {
            return null;
        }

        return $deliveryPeriod;
    }

    /**
     * @param  DeliveryPeriod $deliveryPeriod
     * @return static
     */
    public function addToDeliveryPeriod(
        DeliveryPeriod $deliveryPeriod
    ): static {
        $this->deliveryPeriod[] = $deliveryPeriod;

        return $this;
    }

    /**
     * @return DeliveryPeriod
     */
    public function addToDeliveryPeriodWithCreate(): DeliveryPeriod
    {
        $this->addTodeliveryPeriod($deliveryPeriod = new DeliveryPeriod());

        return $deliveryPeriod;
    }

    /**
     * @param  DeliveryPeriod $deliveryPeriod
     * @return static
     */
    public function addOnceToDeliveryPeriod(
        DeliveryPeriod $deliveryPeriod
    ): static {
        if (!is_array($this->deliveryPeriod)) {
            $this->deliveryPeriod = [];
        }

        $this->deliveryPeriod[0] = $deliveryPeriod;

        return $this;
    }

    /**
     * @return DeliveryPeriod
     */
    public function addOnceToDeliveryPeriodWithCreate(): DeliveryPeriod
    {
        if (!is_array($this->deliveryPeriod)) {
            $this->deliveryPeriod = [];
        }

        if ([] === $this->deliveryPeriod) {
            $this->addOnceTodeliveryPeriod(new DeliveryPeriod());
        }

        return $this->deliveryPeriod[0];
    }

    /**
     * @return null|array<RequiredItemLocationQuantity>
     */
    public function getRequiredItemLocationQuantity(): ?array
    {
        return $this->requiredItemLocationQuantity;
    }

    /**
     * @param  null|array<RequiredItemLocationQuantity> $requiredItemLocationQuantity
     * @return static
     */
    public function setRequiredItemLocationQuantity(
        ?array $requiredItemLocationQuantity = null
    ): static {
        $this->requiredItemLocationQuantity = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredItemLocationQuantity(): static
    {
        $this->requiredItemLocationQuantity = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequiredItemLocationQuantity(): static
    {
        $this->requiredItemLocationQuantity = [];

        return $this;
    }

    /**
     * @return null|RequiredItemLocationQuantity
     */
    public function firstRequiredItemLocationQuantity(): ?RequiredItemLocationQuantity
    {
        $requiredItemLocationQuantity = $this->requiredItemLocationQuantity ?? [];
        $requiredItemLocationQuantity = reset($requiredItemLocationQuantity);

        if (false === $requiredItemLocationQuantity) {
            return null;
        }

        return $requiredItemLocationQuantity;
    }

    /**
     * @return null|RequiredItemLocationQuantity
     */
    public function lastRequiredItemLocationQuantity(): ?RequiredItemLocationQuantity
    {
        $requiredItemLocationQuantity = $this->requiredItemLocationQuantity ?? [];
        $requiredItemLocationQuantity = end($requiredItemLocationQuantity);

        if (false === $requiredItemLocationQuantity) {
            return null;
        }

        return $requiredItemLocationQuantity;
    }

    /**
     * @param  RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return static
     */
    public function addToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): static {
        $this->requiredItemLocationQuantity[] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return RequiredItemLocationQuantity
     */
    public function addToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        $this->addTorequiredItemLocationQuantity($requiredItemLocationQuantity = new RequiredItemLocationQuantity());

        return $requiredItemLocationQuantity;
    }

    /**
     * @param  RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return static
     */
    public function addOnceToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): static {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        $this->requiredItemLocationQuantity[0] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return RequiredItemLocationQuantity
     */
    public function addOnceToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        if ([] === $this->requiredItemLocationQuantity) {
            $this->addOnceTorequiredItemLocationQuantity(new RequiredItemLocationQuantity());
        }

        return $this->requiredItemLocationQuantity[0];
    }

    /**
     * @return null|WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriod(): ?WarrantyValidityPeriod
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * @return WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriodWithCreate(): WarrantyValidityPeriod
    {
        $this->warrantyValidityPeriod ??= new WarrantyValidityPeriod();

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param  null|WarrantyValidityPeriod $warrantyValidityPeriod
     * @return static
     */
    public function setWarrantyValidityPeriod(
        ?WarrantyValidityPeriod $warrantyValidityPeriod = null
    ): static {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyValidityPeriod(): static
    {
        $this->warrantyValidityPeriod = null;

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
     * @return null|array<SubRequestForTenderLine>
     */
    public function getSubRequestForTenderLine(): ?array
    {
        return $this->subRequestForTenderLine;
    }

    /**
     * @param  null|array<SubRequestForTenderLine> $subRequestForTenderLine
     * @return static
     */
    public function setSubRequestForTenderLine(
        ?array $subRequestForTenderLine = null
    ): static {
        $this->subRequestForTenderLine = $subRequestForTenderLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubRequestForTenderLine(): static
    {
        $this->subRequestForTenderLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubRequestForTenderLine(): static
    {
        $this->subRequestForTenderLine = [];

        return $this;
    }

    /**
     * @return null|SubRequestForTenderLine
     */
    public function firstSubRequestForTenderLine(): ?SubRequestForTenderLine
    {
        $subRequestForTenderLine = $this->subRequestForTenderLine ?? [];
        $subRequestForTenderLine = reset($subRequestForTenderLine);

        if (false === $subRequestForTenderLine) {
            return null;
        }

        return $subRequestForTenderLine;
    }

    /**
     * @return null|SubRequestForTenderLine
     */
    public function lastSubRequestForTenderLine(): ?SubRequestForTenderLine
    {
        $subRequestForTenderLine = $this->subRequestForTenderLine ?? [];
        $subRequestForTenderLine = end($subRequestForTenderLine);

        if (false === $subRequestForTenderLine) {
            return null;
        }

        return $subRequestForTenderLine;
    }

    /**
     * @param  SubRequestForTenderLine $subRequestForTenderLine
     * @return static
     */
    public function addToSubRequestForTenderLine(
        SubRequestForTenderLine $subRequestForTenderLine
    ): static {
        $this->subRequestForTenderLine[] = $subRequestForTenderLine;

        return $this;
    }

    /**
     * @return SubRequestForTenderLine
     */
    public function addToSubRequestForTenderLineWithCreate(): SubRequestForTenderLine
    {
        $this->addTosubRequestForTenderLine($subRequestForTenderLine = new SubRequestForTenderLine());

        return $subRequestForTenderLine;
    }

    /**
     * @param  SubRequestForTenderLine $subRequestForTenderLine
     * @return static
     */
    public function addOnceToSubRequestForTenderLine(
        SubRequestForTenderLine $subRequestForTenderLine
    ): static {
        if (!is_array($this->subRequestForTenderLine)) {
            $this->subRequestForTenderLine = [];
        }

        $this->subRequestForTenderLine[0] = $subRequestForTenderLine;

        return $this;
    }

    /**
     * @return SubRequestForTenderLine
     */
    public function addOnceToSubRequestForTenderLineWithCreate(): SubRequestForTenderLine
    {
        if (!is_array($this->subRequestForTenderLine)) {
            $this->subRequestForTenderLine = [];
        }

        if ([] === $this->subRequestForTenderLine) {
            $this->addOnceTosubRequestForTenderLine(new SubRequestForTenderLine());
        }

        return $this->subRequestForTenderLine[0];
    }
}
