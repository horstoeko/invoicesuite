<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContentUnitQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumOrderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumOrderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderableUnit;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderQuantityIncrementNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaxAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WarrantyInformation;
use JMS\Serializer\Annotation as JMS;

class TenderLineType
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
     * @var null|OrderableUnit
     */
    #[JMS\Accessor(getter: 'getOrderableUnit', setter: 'setOrderableUnit')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderableUnit')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderableUnit')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $orderableUnit;

    /**
     * @var null|ContentUnitQuantity
     */
    #[JMS\Accessor(getter: 'getContentUnitQuantity', setter: 'setContentUnitQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContentUnitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContentUnitQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $contentUnitQuantity;

    /**
     * @var null|OrderQuantityIncrementNumeric
     */
    #[JMS\Accessor(getter: 'getOrderQuantityIncrementNumeric', setter: 'setOrderQuantityIncrementNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderQuantityIncrementNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderQuantityIncrementNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $orderQuantityIncrementNumeric;

    /**
     * @var null|MinimumOrderQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumOrderQuantity', setter: 'setMinimumOrderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumOrderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumOrderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumOrderQuantity;

    /**
     * @var null|MaximumOrderQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumOrderQuantity', setter: 'setMaximumOrderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumOrderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumOrderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumOrderQuantity;

    /**
     * @var null|array<WarrantyInformation>
     */
    #[JMS\Accessor(getter: 'getWarrantyInformation', setter: 'setWarrantyInformation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyInformation')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WarrantyInformation>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'WarrantyInformation', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $warrantyInformation;

    /**
     * @var null|PackLevelCode
     */
    #[JMS\Accessor(getter: 'getPackLevelCode', setter: 'setPackLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $packLevelCode;

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
     * @var null|array<OfferedItemLocationQuantity>
     */
    #[JMS\Accessor(getter: 'getOfferedItemLocationQuantity', setter: 'setOfferedItemLocationQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OfferedItemLocationQuantity')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\OfferedItemLocationQuantity>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'OfferedItemLocationQuantity', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $offeredItemLocationQuantity;

    /**
     * @var null|array<ReplacementRelatedItem>
     */
    #[JMS\Accessor(getter: 'getReplacementRelatedItem', setter: 'setReplacementRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReplacementRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReplacementRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReplacementRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $replacementRelatedItem;

    /**
     * @var null|WarrantyParty
     */
    #[JMS\Accessor(getter: 'getWarrantyParty', setter: 'setWarrantyParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WarrantyParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $warrantyParty;

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
     * @var null|array<SubTenderLine>
     */
    #[JMS\Accessor(getter: 'getSubTenderLine', setter: 'setSubTenderLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubTenderLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubTenderLine>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubTenderLine', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subTenderLine;

    /**
     * @var null|CallForTendersLineReference
     */
    #[JMS\Accessor(getter: 'getCallForTendersLineReference', setter: 'setCallForTendersLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CallForTendersLineReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CallForTendersLineReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $callForTendersLineReference;

    /**
     * @var null|CallForTendersDocumentReference
     */
    #[JMS\Accessor(getter: 'getCallForTendersDocumentReference', setter: 'setCallForTendersDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CallForTendersDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CallForTendersDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $callForTendersDocumentReference;

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
     * @return null|OrderableUnit
     */
    public function getOrderableUnit(): ?OrderableUnit
    {
        return $this->orderableUnit;
    }

    /**
     * @return OrderableUnit
     */
    public function getOrderableUnitWithCreate(): OrderableUnit
    {
        $this->orderableUnit ??= new OrderableUnit();

        return $this->orderableUnit;
    }

    /**
     * @param  null|OrderableUnit $orderableUnit
     * @return static
     */
    public function setOrderableUnit(
        ?OrderableUnit $orderableUnit = null
    ): static {
        $this->orderableUnit = $orderableUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderableUnit(): static
    {
        $this->orderableUnit = null;

        return $this;
    }

    /**
     * @return null|ContentUnitQuantity
     */
    public function getContentUnitQuantity(): ?ContentUnitQuantity
    {
        return $this->contentUnitQuantity;
    }

    /**
     * @return ContentUnitQuantity
     */
    public function getContentUnitQuantityWithCreate(): ContentUnitQuantity
    {
        $this->contentUnitQuantity ??= new ContentUnitQuantity();

        return $this->contentUnitQuantity;
    }

    /**
     * @param  null|ContentUnitQuantity $contentUnitQuantity
     * @return static
     */
    public function setContentUnitQuantity(
        ?ContentUnitQuantity $contentUnitQuantity = null
    ): static {
        $this->contentUnitQuantity = $contentUnitQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContentUnitQuantity(): static
    {
        $this->contentUnitQuantity = null;

        return $this;
    }

    /**
     * @return null|OrderQuantityIncrementNumeric
     */
    public function getOrderQuantityIncrementNumeric(): ?OrderQuantityIncrementNumeric
    {
        return $this->orderQuantityIncrementNumeric;
    }

    /**
     * @return OrderQuantityIncrementNumeric
     */
    public function getOrderQuantityIncrementNumericWithCreate(): OrderQuantityIncrementNumeric
    {
        $this->orderQuantityIncrementNumeric ??= new OrderQuantityIncrementNumeric();

        return $this->orderQuantityIncrementNumeric;
    }

    /**
     * @param  null|OrderQuantityIncrementNumeric $orderQuantityIncrementNumeric
     * @return static
     */
    public function setOrderQuantityIncrementNumeric(
        ?OrderQuantityIncrementNumeric $orderQuantityIncrementNumeric = null,
    ): static {
        $this->orderQuantityIncrementNumeric = $orderQuantityIncrementNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderQuantityIncrementNumeric(): static
    {
        $this->orderQuantityIncrementNumeric = null;

        return $this;
    }

    /**
     * @return null|MinimumOrderQuantity
     */
    public function getMinimumOrderQuantity(): ?MinimumOrderQuantity
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @return MinimumOrderQuantity
     */
    public function getMinimumOrderQuantityWithCreate(): MinimumOrderQuantity
    {
        $this->minimumOrderQuantity ??= new MinimumOrderQuantity();

        return $this->minimumOrderQuantity;
    }

    /**
     * @param  null|MinimumOrderQuantity $minimumOrderQuantity
     * @return static
     */
    public function setMinimumOrderQuantity(
        ?MinimumOrderQuantity $minimumOrderQuantity = null
    ): static {
        $this->minimumOrderQuantity = $minimumOrderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumOrderQuantity(): static
    {
        $this->minimumOrderQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumOrderQuantity
     */
    public function getMaximumOrderQuantity(): ?MaximumOrderQuantity
    {
        return $this->maximumOrderQuantity;
    }

    /**
     * @return MaximumOrderQuantity
     */
    public function getMaximumOrderQuantityWithCreate(): MaximumOrderQuantity
    {
        $this->maximumOrderQuantity ??= new MaximumOrderQuantity();

        return $this->maximumOrderQuantity;
    }

    /**
     * @param  null|MaximumOrderQuantity $maximumOrderQuantity
     * @return static
     */
    public function setMaximumOrderQuantity(
        ?MaximumOrderQuantity $maximumOrderQuantity = null
    ): static {
        $this->maximumOrderQuantity = $maximumOrderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumOrderQuantity(): static
    {
        $this->maximumOrderQuantity = null;

        return $this;
    }

    /**
     * @return null|array<WarrantyInformation>
     */
    public function getWarrantyInformation(): ?array
    {
        return $this->warrantyInformation;
    }

    /**
     * @param  null|array<WarrantyInformation> $warrantyInformation
     * @return static
     */
    public function setWarrantyInformation(
        ?array $warrantyInformation = null
    ): static {
        $this->warrantyInformation = $warrantyInformation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyInformation(): static
    {
        $this->warrantyInformation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWarrantyInformation(): static
    {
        $this->warrantyInformation = [];

        return $this;
    }

    /**
     * @return null|WarrantyInformation
     */
    public function firstWarrantyInformation(): ?WarrantyInformation
    {
        $warrantyInformation = $this->warrantyInformation ?? [];
        $warrantyInformation = reset($warrantyInformation);

        if (false === $warrantyInformation) {
            return null;
        }

        return $warrantyInformation;
    }

    /**
     * @return null|WarrantyInformation
     */
    public function lastWarrantyInformation(): ?WarrantyInformation
    {
        $warrantyInformation = $this->warrantyInformation ?? [];
        $warrantyInformation = end($warrantyInformation);

        if (false === $warrantyInformation) {
            return null;
        }

        return $warrantyInformation;
    }

    /**
     * @param  WarrantyInformation $warrantyInformation
     * @return static
     */
    public function addToWarrantyInformation(
        WarrantyInformation $warrantyInformation
    ): static {
        $this->warrantyInformation[] = $warrantyInformation;

        return $this;
    }

    /**
     * @return WarrantyInformation
     */
    public function addToWarrantyInformationWithCreate(): WarrantyInformation
    {
        $this->addTowarrantyInformation($warrantyInformation = new WarrantyInformation());

        return $warrantyInformation;
    }

    /**
     * @param  WarrantyInformation $warrantyInformation
     * @return static
     */
    public function addOnceToWarrantyInformation(
        WarrantyInformation $warrantyInformation
    ): static {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        $this->warrantyInformation[0] = $warrantyInformation;

        return $this;
    }

    /**
     * @return WarrantyInformation
     */
    public function addOnceToWarrantyInformationWithCreate(): WarrantyInformation
    {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        if ([] === $this->warrantyInformation) {
            $this->addOnceTowarrantyInformation(new WarrantyInformation());
        }

        return $this->warrantyInformation[0];
    }

    /**
     * @return null|PackLevelCode
     */
    public function getPackLevelCode(): ?PackLevelCode
    {
        return $this->packLevelCode;
    }

    /**
     * @return PackLevelCode
     */
    public function getPackLevelCodeWithCreate(): PackLevelCode
    {
        $this->packLevelCode ??= new PackLevelCode();

        return $this->packLevelCode;
    }

    /**
     * @param  null|PackLevelCode $packLevelCode
     * @return static
     */
    public function setPackLevelCode(
        ?PackLevelCode $packLevelCode = null
    ): static {
        $this->packLevelCode = $packLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackLevelCode(): static
    {
        $this->packLevelCode = null;

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
     * @return null|array<OfferedItemLocationQuantity>
     */
    public function getOfferedItemLocationQuantity(): ?array
    {
        return $this->offeredItemLocationQuantity;
    }

    /**
     * @param  null|array<OfferedItemLocationQuantity> $offeredItemLocationQuantity
     * @return static
     */
    public function setOfferedItemLocationQuantity(
        ?array $offeredItemLocationQuantity = null
    ): static {
        $this->offeredItemLocationQuantity = $offeredItemLocationQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOfferedItemLocationQuantity(): static
    {
        $this->offeredItemLocationQuantity = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOfferedItemLocationQuantity(): static
    {
        $this->offeredItemLocationQuantity = [];

        return $this;
    }

    /**
     * @return null|OfferedItemLocationQuantity
     */
    public function firstOfferedItemLocationQuantity(): ?OfferedItemLocationQuantity
    {
        $offeredItemLocationQuantity = $this->offeredItemLocationQuantity ?? [];
        $offeredItemLocationQuantity = reset($offeredItemLocationQuantity);

        if (false === $offeredItemLocationQuantity) {
            return null;
        }

        return $offeredItemLocationQuantity;
    }

    /**
     * @return null|OfferedItemLocationQuantity
     */
    public function lastOfferedItemLocationQuantity(): ?OfferedItemLocationQuantity
    {
        $offeredItemLocationQuantity = $this->offeredItemLocationQuantity ?? [];
        $offeredItemLocationQuantity = end($offeredItemLocationQuantity);

        if (false === $offeredItemLocationQuantity) {
            return null;
        }

        return $offeredItemLocationQuantity;
    }

    /**
     * @param  OfferedItemLocationQuantity $offeredItemLocationQuantity
     * @return static
     */
    public function addToOfferedItemLocationQuantity(
        OfferedItemLocationQuantity $offeredItemLocationQuantity
    ): static {
        $this->offeredItemLocationQuantity[] = $offeredItemLocationQuantity;

        return $this;
    }

    /**
     * @return OfferedItemLocationQuantity
     */
    public function addToOfferedItemLocationQuantityWithCreate(): OfferedItemLocationQuantity
    {
        $this->addToofferedItemLocationQuantity($offeredItemLocationQuantity = new OfferedItemLocationQuantity());

        return $offeredItemLocationQuantity;
    }

    /**
     * @param  OfferedItemLocationQuantity $offeredItemLocationQuantity
     * @return static
     */
    public function addOnceToOfferedItemLocationQuantity(
        OfferedItemLocationQuantity $offeredItemLocationQuantity,
    ): static {
        if (!is_array($this->offeredItemLocationQuantity)) {
            $this->offeredItemLocationQuantity = [];
        }

        $this->offeredItemLocationQuantity[0] = $offeredItemLocationQuantity;

        return $this;
    }

    /**
     * @return OfferedItemLocationQuantity
     */
    public function addOnceToOfferedItemLocationQuantityWithCreate(): OfferedItemLocationQuantity
    {
        if (!is_array($this->offeredItemLocationQuantity)) {
            $this->offeredItemLocationQuantity = [];
        }

        if ([] === $this->offeredItemLocationQuantity) {
            $this->addOnceToofferedItemLocationQuantity(new OfferedItemLocationQuantity());
        }

        return $this->offeredItemLocationQuantity[0];
    }

    /**
     * @return null|array<ReplacementRelatedItem>
     */
    public function getReplacementRelatedItem(): ?array
    {
        return $this->replacementRelatedItem;
    }

    /**
     * @param  null|array<ReplacementRelatedItem> $replacementRelatedItem
     * @return static
     */
    public function setReplacementRelatedItem(
        ?array $replacementRelatedItem = null
    ): static {
        $this->replacementRelatedItem = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReplacementRelatedItem(): static
    {
        $this->replacementRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReplacementRelatedItem(): static
    {
        $this->replacementRelatedItem = [];

        return $this;
    }

    /**
     * @return null|ReplacementRelatedItem
     */
    public function firstReplacementRelatedItem(): ?ReplacementRelatedItem
    {
        $replacementRelatedItem = $this->replacementRelatedItem ?? [];
        $replacementRelatedItem = reset($replacementRelatedItem);

        if (false === $replacementRelatedItem) {
            return null;
        }

        return $replacementRelatedItem;
    }

    /**
     * @return null|ReplacementRelatedItem
     */
    public function lastReplacementRelatedItem(): ?ReplacementRelatedItem
    {
        $replacementRelatedItem = $this->replacementRelatedItem ?? [];
        $replacementRelatedItem = end($replacementRelatedItem);

        if (false === $replacementRelatedItem) {
            return null;
        }

        return $replacementRelatedItem;
    }

    /**
     * @param  ReplacementRelatedItem $replacementRelatedItem
     * @return static
     */
    public function addToReplacementRelatedItem(
        ReplacementRelatedItem $replacementRelatedItem
    ): static {
        $this->replacementRelatedItem[] = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return ReplacementRelatedItem
     */
    public function addToReplacementRelatedItemWithCreate(): ReplacementRelatedItem
    {
        $this->addToreplacementRelatedItem($replacementRelatedItem = new ReplacementRelatedItem());

        return $replacementRelatedItem;
    }

    /**
     * @param  ReplacementRelatedItem $replacementRelatedItem
     * @return static
     */
    public function addOnceToReplacementRelatedItem(
        ReplacementRelatedItem $replacementRelatedItem
    ): static {
        if (!is_array($this->replacementRelatedItem)) {
            $this->replacementRelatedItem = [];
        }

        $this->replacementRelatedItem[0] = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return ReplacementRelatedItem
     */
    public function addOnceToReplacementRelatedItemWithCreate(): ReplacementRelatedItem
    {
        if (!is_array($this->replacementRelatedItem)) {
            $this->replacementRelatedItem = [];
        }

        if ([] === $this->replacementRelatedItem) {
            $this->addOnceToreplacementRelatedItem(new ReplacementRelatedItem());
        }

        return $this->replacementRelatedItem[0];
    }

    /**
     * @return null|WarrantyParty
     */
    public function getWarrantyParty(): ?WarrantyParty
    {
        return $this->warrantyParty;
    }

    /**
     * @return WarrantyParty
     */
    public function getWarrantyPartyWithCreate(): WarrantyParty
    {
        $this->warrantyParty ??= new WarrantyParty();

        return $this->warrantyParty;
    }

    /**
     * @param  null|WarrantyParty $warrantyParty
     * @return static
     */
    public function setWarrantyParty(
        ?WarrantyParty $warrantyParty = null
    ): static {
        $this->warrantyParty = $warrantyParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyParty(): static
    {
        $this->warrantyParty = null;

        return $this;
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
     * @return null|array<SubTenderLine>
     */
    public function getSubTenderLine(): ?array
    {
        return $this->subTenderLine;
    }

    /**
     * @param  null|array<SubTenderLine> $subTenderLine
     * @return static
     */
    public function setSubTenderLine(
        ?array $subTenderLine = null
    ): static {
        $this->subTenderLine = $subTenderLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubTenderLine(): static
    {
        $this->subTenderLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubTenderLine(): static
    {
        $this->subTenderLine = [];

        return $this;
    }

    /**
     * @return null|SubTenderLine
     */
    public function firstSubTenderLine(): ?SubTenderLine
    {
        $subTenderLine = $this->subTenderLine ?? [];
        $subTenderLine = reset($subTenderLine);

        if (false === $subTenderLine) {
            return null;
        }

        return $subTenderLine;
    }

    /**
     * @return null|SubTenderLine
     */
    public function lastSubTenderLine(): ?SubTenderLine
    {
        $subTenderLine = $this->subTenderLine ?? [];
        $subTenderLine = end($subTenderLine);

        if (false === $subTenderLine) {
            return null;
        }

        return $subTenderLine;
    }

    /**
     * @param  SubTenderLine $subTenderLine
     * @return static
     */
    public function addToSubTenderLine(
        SubTenderLine $subTenderLine
    ): static {
        $this->subTenderLine[] = $subTenderLine;

        return $this;
    }

    /**
     * @return SubTenderLine
     */
    public function addToSubTenderLineWithCreate(): SubTenderLine
    {
        $this->addTosubTenderLine($subTenderLine = new SubTenderLine());

        return $subTenderLine;
    }

    /**
     * @param  SubTenderLine $subTenderLine
     * @return static
     */
    public function addOnceToSubTenderLine(
        SubTenderLine $subTenderLine
    ): static {
        if (!is_array($this->subTenderLine)) {
            $this->subTenderLine = [];
        }

        $this->subTenderLine[0] = $subTenderLine;

        return $this;
    }

    /**
     * @return SubTenderLine
     */
    public function addOnceToSubTenderLineWithCreate(): SubTenderLine
    {
        if (!is_array($this->subTenderLine)) {
            $this->subTenderLine = [];
        }

        if ([] === $this->subTenderLine) {
            $this->addOnceTosubTenderLine(new SubTenderLine());
        }

        return $this->subTenderLine[0];
    }

    /**
     * @return null|CallForTendersLineReference
     */
    public function getCallForTendersLineReference(): ?CallForTendersLineReference
    {
        return $this->callForTendersLineReference;
    }

    /**
     * @return CallForTendersLineReference
     */
    public function getCallForTendersLineReferenceWithCreate(): CallForTendersLineReference
    {
        $this->callForTendersLineReference ??= new CallForTendersLineReference();

        return $this->callForTendersLineReference;
    }

    /**
     * @param  null|CallForTendersLineReference $callForTendersLineReference
     * @return static
     */
    public function setCallForTendersLineReference(
        ?CallForTendersLineReference $callForTendersLineReference = null,
    ): static {
        $this->callForTendersLineReference = $callForTendersLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallForTendersLineReference(): static
    {
        $this->callForTendersLineReference = null;

        return $this;
    }

    /**
     * @return null|CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReference(): ?CallForTendersDocumentReference
    {
        return $this->callForTendersDocumentReference;
    }

    /**
     * @return CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReferenceWithCreate(): CallForTendersDocumentReference
    {
        $this->callForTendersDocumentReference ??= new CallForTendersDocumentReference();

        return $this->callForTendersDocumentReference;
    }

    /**
     * @param  null|CallForTendersDocumentReference $callForTendersDocumentReference
     * @return static
     */
    public function setCallForTendersDocumentReference(
        ?CallForTendersDocumentReference $callForTendersDocumentReference = null,
    ): static {
        $this->callForTendersDocumentReference = $callForTendersDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallForTendersDocumentReference(): static
    {
        $this->callForTendersDocumentReference = null;

        return $this;
    }
}
