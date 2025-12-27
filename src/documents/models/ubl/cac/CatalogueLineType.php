<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ActionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ContentUnitQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ContractSubdivision;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LifeCycleStatusCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumOrderQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumOrderQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\documents\models\ubl\cbc\OrderableUnit;
use horstoeko\invoicesuite\documents\models\ubl\cbc\OrderQuantityIncrementNumeric;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PackLevelCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\WarrantyInformation;
use JMS\Serializer\Annotation as JMS;

class CatalogueLineType
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
     * @var null|ActionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActionCode", setter="setActionCode")
     */
    private $actionCode;

    /**
     * @var null|LifeCycleStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LifeCycleStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("LifeCycleStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLifeCycleStatusCode", setter="setLifeCycleStatusCode")
     */
    private $lifeCycleStatusCode;

    /**
     * @var null|ContractSubdivision
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ContractSubdivision")
     * @JMS\Expose
     * @JMS\SerializedName("ContractSubdivision")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractSubdivision", setter="setContractSubdivision")
     */
    private $contractSubdivision;

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
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableIndicator", setter="setOrderableIndicator")
     */
    private $orderableIndicator;

    /**
     * @var null|OrderableUnit
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\OrderableUnit")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableUnit", setter="setOrderableUnit")
     */
    private $orderableUnit;

    /**
     * @var null|ContentUnitQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ContentUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ContentUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContentUnitQuantity", setter="setContentUnitQuantity")
     */
    private $contentUnitQuantity;

    /**
     * @var null|OrderQuantityIncrementNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\OrderQuantityIncrementNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("OrderQuantityIncrementNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderQuantityIncrementNumeric", setter="setOrderQuantityIncrementNumeric")
     */
    private $orderQuantityIncrementNumeric;

    /**
     * @var null|MinimumOrderQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumOrderQuantity", setter="setMinimumOrderQuantity")
     */
    private $minimumOrderQuantity;

    /**
     * @var null|MaximumOrderQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumOrderQuantity", setter="setMaximumOrderQuantity")
     */
    private $maximumOrderQuantity;

    /**
     * @var null|array<WarrantyInformation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\WarrantyInformation>")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyInformation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WarrantyInformation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getWarrantyInformation", setter="setWarrantyInformation")
     */
    private $warrantyInformation;

    /**
     * @var null|PackLevelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PackLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("PackLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackLevelCode", setter="setPackLevelCode")
     */
    private $packLevelCode;

    /**
     * @var null|ContractorCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ContractorCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("ContractorCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractorCustomerParty", setter="setContractorCustomerParty")
     */
    private $contractorCustomerParty;

    /**
     * @var null|SellerSupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var null|WarrantyParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\WarrantyParty")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyParty", setter="setWarrantyParty")
     */
    private $warrantyParty;

    /**
     * @var null|WarrantyValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\WarrantyValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyValidityPeriod", setter="setWarrantyValidityPeriod")
     */
    private $warrantyValidityPeriod;

    /**
     * @var null|LineValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\LineValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("LineValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineValidityPeriod", setter="setLineValidityPeriod")
     */
    private $lineValidityPeriod;

    /**
     * @var null|array<ItemComparison>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ItemComparison>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemComparison")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemComparison", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemComparison", setter="setItemComparison")
     */
    private $itemComparison;

    /**
     * @var null|array<ComponentRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ComponentRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ComponentRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ComponentRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getComponentRelatedItem", setter="setComponentRelatedItem")
     */
    private $componentRelatedItem;

    /**
     * @var null|array<AccessoryRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AccessoryRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("AccessoryRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AccessoryRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAccessoryRelatedItem", setter="setAccessoryRelatedItem")
     */
    private $accessoryRelatedItem;

    /**
     * @var null|array<RequiredRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\RequiredRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredRelatedItem", setter="setRequiredRelatedItem")
     */
    private $requiredRelatedItem;

    /**
     * @var null|array<ReplacementRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ReplacementRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacementRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplacementRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReplacementRelatedItem", setter="setReplacementRelatedItem")
     */
    private $replacementRelatedItem;

    /**
     * @var null|array<ComplementaryRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ComplementaryRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ComplementaryRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ComplementaryRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getComplementaryRelatedItem", setter="setComplementaryRelatedItem")
     */
    private $complementaryRelatedItem;

    /**
     * @var null|array<ReplacedRelatedItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ReplacedRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacedRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplacedRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReplacedRelatedItem", setter="setReplacedRelatedItem")
     */
    private $replacedRelatedItem;

    /**
     * @var null|array<RequiredItemLocationQuantity>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\RequiredItemLocationQuantity>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredItemLocationQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredItemLocationQuantity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredItemLocationQuantity", setter="setRequiredItemLocationQuantity")
     */
    private $requiredItemLocationQuantity;

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
     * @var null|Item
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Item")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var null|array<KeywordItemProperty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\KeywordItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("KeywordItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="KeywordItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getKeywordItemProperty", setter="setKeywordItemProperty")
     */
    private $keywordItemProperty;

    /**
     * @var null|CallForTendersLineReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CallForTendersLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersLineReference", setter="setCallForTendersLineReference")
     */
    private $callForTendersLineReference;

    /**
     * @var null|CallForTendersDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CallForTendersDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersDocumentReference", setter="setCallForTendersDocumentReference")
     */
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
     * @return null|ActionCode
     */
    public function getActionCode(): ?ActionCode
    {
        return $this->actionCode;
    }

    /**
     * @return ActionCode
     */
    public function getActionCodeWithCreate(): ActionCode
    {
        $this->actionCode = is_null($this->actionCode) ? new ActionCode() : $this->actionCode;

        return $this->actionCode;
    }

    /**
     * @param  null|ActionCode $actionCode
     * @return static
     */
    public function setActionCode(?ActionCode $actionCode = null): static
    {
        $this->actionCode = $actionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActionCode(): static
    {
        $this->actionCode = null;

        return $this;
    }

    /**
     * @return null|LifeCycleStatusCode
     */
    public function getLifeCycleStatusCode(): ?LifeCycleStatusCode
    {
        return $this->lifeCycleStatusCode;
    }

    /**
     * @return LifeCycleStatusCode
     */
    public function getLifeCycleStatusCodeWithCreate(): LifeCycleStatusCode
    {
        $this->lifeCycleStatusCode = is_null($this->lifeCycleStatusCode) ? new LifeCycleStatusCode() : $this->lifeCycleStatusCode;

        return $this->lifeCycleStatusCode;
    }

    /**
     * @param  null|LifeCycleStatusCode $lifeCycleStatusCode
     * @return static
     */
    public function setLifeCycleStatusCode(?LifeCycleStatusCode $lifeCycleStatusCode = null): static
    {
        $this->lifeCycleStatusCode = $lifeCycleStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLifeCycleStatusCode(): static
    {
        $this->lifeCycleStatusCode = null;

        return $this;
    }

    /**
     * @return null|ContractSubdivision
     */
    public function getContractSubdivision(): ?ContractSubdivision
    {
        return $this->contractSubdivision;
    }

    /**
     * @return ContractSubdivision
     */
    public function getContractSubdivisionWithCreate(): ContractSubdivision
    {
        $this->contractSubdivision = is_null($this->contractSubdivision) ? new ContractSubdivision() : $this->contractSubdivision;

        return $this->contractSubdivision;
    }

    /**
     * @param  null|ContractSubdivision $contractSubdivision
     * @return static
     */
    public function setContractSubdivision(?ContractSubdivision $contractSubdivision = null): static
    {
        $this->contractSubdivision = $contractSubdivision;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractSubdivision(): static
    {
        $this->contractSubdivision = null;

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
     * @return null|bool
     */
    public function getOrderableIndicator(): ?bool
    {
        return $this->orderableIndicator;
    }

    /**
     * @param  null|bool $orderableIndicator
     * @return static
     */
    public function setOrderableIndicator(?bool $orderableIndicator = null): static
    {
        $this->orderableIndicator = $orderableIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderableIndicator(): static
    {
        $this->orderableIndicator = null;

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
        $this->orderableUnit = is_null($this->orderableUnit) ? new OrderableUnit() : $this->orderableUnit;

        return $this->orderableUnit;
    }

    /**
     * @param  null|OrderableUnit $orderableUnit
     * @return static
     */
    public function setOrderableUnit(?OrderableUnit $orderableUnit = null): static
    {
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
        $this->contentUnitQuantity = is_null($this->contentUnitQuantity) ? new ContentUnitQuantity() : $this->contentUnitQuantity;

        return $this->contentUnitQuantity;
    }

    /**
     * @param  null|ContentUnitQuantity $contentUnitQuantity
     * @return static
     */
    public function setContentUnitQuantity(?ContentUnitQuantity $contentUnitQuantity = null): static
    {
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
        $this->orderQuantityIncrementNumeric = is_null($this->orderQuantityIncrementNumeric) ? new OrderQuantityIncrementNumeric() : $this->orderQuantityIncrementNumeric;

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
        $this->minimumOrderQuantity = is_null($this->minimumOrderQuantity) ? new MinimumOrderQuantity() : $this->minimumOrderQuantity;

        return $this->minimumOrderQuantity;
    }

    /**
     * @param  null|MinimumOrderQuantity $minimumOrderQuantity
     * @return static
     */
    public function setMinimumOrderQuantity(?MinimumOrderQuantity $minimumOrderQuantity = null): static
    {
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
        $this->maximumOrderQuantity = is_null($this->maximumOrderQuantity) ? new MaximumOrderQuantity() : $this->maximumOrderQuantity;

        return $this->maximumOrderQuantity;
    }

    /**
     * @param  null|MaximumOrderQuantity $maximumOrderQuantity
     * @return static
     */
    public function setMaximumOrderQuantity(?MaximumOrderQuantity $maximumOrderQuantity = null): static
    {
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
    public function setWarrantyInformation(?array $warrantyInformation = null): static
    {
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
    public function addToWarrantyInformation(WarrantyInformation $warrantyInformation): static
    {
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
    public function addOnceToWarrantyInformation(WarrantyInformation $warrantyInformation): static
    {
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
        $this->packLevelCode = is_null($this->packLevelCode) ? new PackLevelCode() : $this->packLevelCode;

        return $this->packLevelCode;
    }

    /**
     * @param  null|PackLevelCode $packLevelCode
     * @return static
     */
    public function setPackLevelCode(?PackLevelCode $packLevelCode = null): static
    {
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
     * @return null|ContractorCustomerParty
     */
    public function getContractorCustomerParty(): ?ContractorCustomerParty
    {
        return $this->contractorCustomerParty;
    }

    /**
     * @return ContractorCustomerParty
     */
    public function getContractorCustomerPartyWithCreate(): ContractorCustomerParty
    {
        $this->contractorCustomerParty = is_null($this->contractorCustomerParty) ? new ContractorCustomerParty() : $this->contractorCustomerParty;

        return $this->contractorCustomerParty;
    }

    /**
     * @param  null|ContractorCustomerParty $contractorCustomerParty
     * @return static
     */
    public function setContractorCustomerParty(?ContractorCustomerParty $contractorCustomerParty = null): static
    {
        $this->contractorCustomerParty = $contractorCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractorCustomerParty(): static
    {
        $this->contractorCustomerParty = null;

        return $this;
    }

    /**
     * @return null|SellerSupplierParty
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): static
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSupplierParty(): static
    {
        $this->sellerSupplierParty = null;

        return $this;
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
        $this->warrantyParty = is_null($this->warrantyParty) ? new WarrantyParty() : $this->warrantyParty;

        return $this->warrantyParty;
    }

    /**
     * @param  null|WarrantyParty $warrantyParty
     * @return static
     */
    public function setWarrantyParty(?WarrantyParty $warrantyParty = null): static
    {
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
        $this->warrantyValidityPeriod = is_null($this->warrantyValidityPeriod) ? new WarrantyValidityPeriod() : $this->warrantyValidityPeriod;

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param  null|WarrantyValidityPeriod $warrantyValidityPeriod
     * @return static
     */
    public function setWarrantyValidityPeriod(?WarrantyValidityPeriod $warrantyValidityPeriod = null): static
    {
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
     * @return null|LineValidityPeriod
     */
    public function getLineValidityPeriod(): ?LineValidityPeriod
    {
        return $this->lineValidityPeriod;
    }

    /**
     * @return LineValidityPeriod
     */
    public function getLineValidityPeriodWithCreate(): LineValidityPeriod
    {
        $this->lineValidityPeriod = is_null($this->lineValidityPeriod) ? new LineValidityPeriod() : $this->lineValidityPeriod;

        return $this->lineValidityPeriod;
    }

    /**
     * @param  null|LineValidityPeriod $lineValidityPeriod
     * @return static
     */
    public function setLineValidityPeriod(?LineValidityPeriod $lineValidityPeriod = null): static
    {
        $this->lineValidityPeriod = $lineValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineValidityPeriod(): static
    {
        $this->lineValidityPeriod = null;

        return $this;
    }

    /**
     * @return null|array<ItemComparison>
     */
    public function getItemComparison(): ?array
    {
        return $this->itemComparison;
    }

    /**
     * @param  null|array<ItemComparison> $itemComparison
     * @return static
     */
    public function setItemComparison(?array $itemComparison = null): static
    {
        $this->itemComparison = $itemComparison;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemComparison(): static
    {
        $this->itemComparison = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearItemComparison(): static
    {
        $this->itemComparison = [];

        return $this;
    }

    /**
     * @return null|ItemComparison
     */
    public function firstItemComparison(): ?ItemComparison
    {
        $itemComparison = $this->itemComparison ?? [];
        $itemComparison = reset($itemComparison);

        if (false === $itemComparison) {
            return null;
        }

        return $itemComparison;
    }

    /**
     * @return null|ItemComparison
     */
    public function lastItemComparison(): ?ItemComparison
    {
        $itemComparison = $this->itemComparison ?? [];
        $itemComparison = end($itemComparison);

        if (false === $itemComparison) {
            return null;
        }

        return $itemComparison;
    }

    /**
     * @param  ItemComparison $itemComparison
     * @return static
     */
    public function addToItemComparison(ItemComparison $itemComparison): static
    {
        $this->itemComparison[] = $itemComparison;

        return $this;
    }

    /**
     * @return ItemComparison
     */
    public function addToItemComparisonWithCreate(): ItemComparison
    {
        $this->addToitemComparison($itemComparison = new ItemComparison());

        return $itemComparison;
    }

    /**
     * @param  ItemComparison $itemComparison
     * @return static
     */
    public function addOnceToItemComparison(ItemComparison $itemComparison): static
    {
        if (!is_array($this->itemComparison)) {
            $this->itemComparison = [];
        }

        $this->itemComparison[0] = $itemComparison;

        return $this;
    }

    /**
     * @return ItemComparison
     */
    public function addOnceToItemComparisonWithCreate(): ItemComparison
    {
        if (!is_array($this->itemComparison)) {
            $this->itemComparison = [];
        }

        if ([] === $this->itemComparison) {
            $this->addOnceToitemComparison(new ItemComparison());
        }

        return $this->itemComparison[0];
    }

    /**
     * @return null|array<ComponentRelatedItem>
     */
    public function getComponentRelatedItem(): ?array
    {
        return $this->componentRelatedItem;
    }

    /**
     * @param  null|array<ComponentRelatedItem> $componentRelatedItem
     * @return static
     */
    public function setComponentRelatedItem(?array $componentRelatedItem = null): static
    {
        $this->componentRelatedItem = $componentRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComponentRelatedItem(): static
    {
        $this->componentRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearComponentRelatedItem(): static
    {
        $this->componentRelatedItem = [];

        return $this;
    }

    /**
     * @return null|ComponentRelatedItem
     */
    public function firstComponentRelatedItem(): ?ComponentRelatedItem
    {
        $componentRelatedItem = $this->componentRelatedItem ?? [];
        $componentRelatedItem = reset($componentRelatedItem);

        if (false === $componentRelatedItem) {
            return null;
        }

        return $componentRelatedItem;
    }

    /**
     * @return null|ComponentRelatedItem
     */
    public function lastComponentRelatedItem(): ?ComponentRelatedItem
    {
        $componentRelatedItem = $this->componentRelatedItem ?? [];
        $componentRelatedItem = end($componentRelatedItem);

        if (false === $componentRelatedItem) {
            return null;
        }

        return $componentRelatedItem;
    }

    /**
     * @param  ComponentRelatedItem $componentRelatedItem
     * @return static
     */
    public function addToComponentRelatedItem(ComponentRelatedItem $componentRelatedItem): static
    {
        $this->componentRelatedItem[] = $componentRelatedItem;

        return $this;
    }

    /**
     * @return ComponentRelatedItem
     */
    public function addToComponentRelatedItemWithCreate(): ComponentRelatedItem
    {
        $this->addTocomponentRelatedItem($componentRelatedItem = new ComponentRelatedItem());

        return $componentRelatedItem;
    }

    /**
     * @param  ComponentRelatedItem $componentRelatedItem
     * @return static
     */
    public function addOnceToComponentRelatedItem(ComponentRelatedItem $componentRelatedItem): static
    {
        if (!is_array($this->componentRelatedItem)) {
            $this->componentRelatedItem = [];
        }

        $this->componentRelatedItem[0] = $componentRelatedItem;

        return $this;
    }

    /**
     * @return ComponentRelatedItem
     */
    public function addOnceToComponentRelatedItemWithCreate(): ComponentRelatedItem
    {
        if (!is_array($this->componentRelatedItem)) {
            $this->componentRelatedItem = [];
        }

        if ([] === $this->componentRelatedItem) {
            $this->addOnceTocomponentRelatedItem(new ComponentRelatedItem());
        }

        return $this->componentRelatedItem[0];
    }

    /**
     * @return null|array<AccessoryRelatedItem>
     */
    public function getAccessoryRelatedItem(): ?array
    {
        return $this->accessoryRelatedItem;
    }

    /**
     * @param  null|array<AccessoryRelatedItem> $accessoryRelatedItem
     * @return static
     */
    public function setAccessoryRelatedItem(?array $accessoryRelatedItem = null): static
    {
        $this->accessoryRelatedItem = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccessoryRelatedItem(): static
    {
        $this->accessoryRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAccessoryRelatedItem(): static
    {
        $this->accessoryRelatedItem = [];

        return $this;
    }

    /**
     * @return null|AccessoryRelatedItem
     */
    public function firstAccessoryRelatedItem(): ?AccessoryRelatedItem
    {
        $accessoryRelatedItem = $this->accessoryRelatedItem ?? [];
        $accessoryRelatedItem = reset($accessoryRelatedItem);

        if (false === $accessoryRelatedItem) {
            return null;
        }

        return $accessoryRelatedItem;
    }

    /**
     * @return null|AccessoryRelatedItem
     */
    public function lastAccessoryRelatedItem(): ?AccessoryRelatedItem
    {
        $accessoryRelatedItem = $this->accessoryRelatedItem ?? [];
        $accessoryRelatedItem = end($accessoryRelatedItem);

        if (false === $accessoryRelatedItem) {
            return null;
        }

        return $accessoryRelatedItem;
    }

    /**
     * @param  AccessoryRelatedItem $accessoryRelatedItem
     * @return static
     */
    public function addToAccessoryRelatedItem(AccessoryRelatedItem $accessoryRelatedItem): static
    {
        $this->accessoryRelatedItem[] = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return AccessoryRelatedItem
     */
    public function addToAccessoryRelatedItemWithCreate(): AccessoryRelatedItem
    {
        $this->addToaccessoryRelatedItem($accessoryRelatedItem = new AccessoryRelatedItem());

        return $accessoryRelatedItem;
    }

    /**
     * @param  AccessoryRelatedItem $accessoryRelatedItem
     * @return static
     */
    public function addOnceToAccessoryRelatedItem(AccessoryRelatedItem $accessoryRelatedItem): static
    {
        if (!is_array($this->accessoryRelatedItem)) {
            $this->accessoryRelatedItem = [];
        }

        $this->accessoryRelatedItem[0] = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return AccessoryRelatedItem
     */
    public function addOnceToAccessoryRelatedItemWithCreate(): AccessoryRelatedItem
    {
        if (!is_array($this->accessoryRelatedItem)) {
            $this->accessoryRelatedItem = [];
        }

        if ([] === $this->accessoryRelatedItem) {
            $this->addOnceToaccessoryRelatedItem(new AccessoryRelatedItem());
        }

        return $this->accessoryRelatedItem[0];
    }

    /**
     * @return null|array<RequiredRelatedItem>
     */
    public function getRequiredRelatedItem(): ?array
    {
        return $this->requiredRelatedItem;
    }

    /**
     * @param  null|array<RequiredRelatedItem> $requiredRelatedItem
     * @return static
     */
    public function setRequiredRelatedItem(?array $requiredRelatedItem = null): static
    {
        $this->requiredRelatedItem = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredRelatedItem(): static
    {
        $this->requiredRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequiredRelatedItem(): static
    {
        $this->requiredRelatedItem = [];

        return $this;
    }

    /**
     * @return null|RequiredRelatedItem
     */
    public function firstRequiredRelatedItem(): ?RequiredRelatedItem
    {
        $requiredRelatedItem = $this->requiredRelatedItem ?? [];
        $requiredRelatedItem = reset($requiredRelatedItem);

        if (false === $requiredRelatedItem) {
            return null;
        }

        return $requiredRelatedItem;
    }

    /**
     * @return null|RequiredRelatedItem
     */
    public function lastRequiredRelatedItem(): ?RequiredRelatedItem
    {
        $requiredRelatedItem = $this->requiredRelatedItem ?? [];
        $requiredRelatedItem = end($requiredRelatedItem);

        if (false === $requiredRelatedItem) {
            return null;
        }

        return $requiredRelatedItem;
    }

    /**
     * @param  RequiredRelatedItem $requiredRelatedItem
     * @return static
     */
    public function addToRequiredRelatedItem(RequiredRelatedItem $requiredRelatedItem): static
    {
        $this->requiredRelatedItem[] = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return RequiredRelatedItem
     */
    public function addToRequiredRelatedItemWithCreate(): RequiredRelatedItem
    {
        $this->addTorequiredRelatedItem($requiredRelatedItem = new RequiredRelatedItem());

        return $requiredRelatedItem;
    }

    /**
     * @param  RequiredRelatedItem $requiredRelatedItem
     * @return static
     */
    public function addOnceToRequiredRelatedItem(RequiredRelatedItem $requiredRelatedItem): static
    {
        if (!is_array($this->requiredRelatedItem)) {
            $this->requiredRelatedItem = [];
        }

        $this->requiredRelatedItem[0] = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return RequiredRelatedItem
     */
    public function addOnceToRequiredRelatedItemWithCreate(): RequiredRelatedItem
    {
        if (!is_array($this->requiredRelatedItem)) {
            $this->requiredRelatedItem = [];
        }

        if ([] === $this->requiredRelatedItem) {
            $this->addOnceTorequiredRelatedItem(new RequiredRelatedItem());
        }

        return $this->requiredRelatedItem[0];
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
    public function setReplacementRelatedItem(?array $replacementRelatedItem = null): static
    {
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
    public function addToReplacementRelatedItem(ReplacementRelatedItem $replacementRelatedItem): static
    {
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
    public function addOnceToReplacementRelatedItem(ReplacementRelatedItem $replacementRelatedItem): static
    {
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
     * @return null|array<ComplementaryRelatedItem>
     */
    public function getComplementaryRelatedItem(): ?array
    {
        return $this->complementaryRelatedItem;
    }

    /**
     * @param  null|array<ComplementaryRelatedItem> $complementaryRelatedItem
     * @return static
     */
    public function setComplementaryRelatedItem(?array $complementaryRelatedItem = null): static
    {
        $this->complementaryRelatedItem = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComplementaryRelatedItem(): static
    {
        $this->complementaryRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearComplementaryRelatedItem(): static
    {
        $this->complementaryRelatedItem = [];

        return $this;
    }

    /**
     * @return null|ComplementaryRelatedItem
     */
    public function firstComplementaryRelatedItem(): ?ComplementaryRelatedItem
    {
        $complementaryRelatedItem = $this->complementaryRelatedItem ?? [];
        $complementaryRelatedItem = reset($complementaryRelatedItem);

        if (false === $complementaryRelatedItem) {
            return null;
        }

        return $complementaryRelatedItem;
    }

    /**
     * @return null|ComplementaryRelatedItem
     */
    public function lastComplementaryRelatedItem(): ?ComplementaryRelatedItem
    {
        $complementaryRelatedItem = $this->complementaryRelatedItem ?? [];
        $complementaryRelatedItem = end($complementaryRelatedItem);

        if (false === $complementaryRelatedItem) {
            return null;
        }

        return $complementaryRelatedItem;
    }

    /**
     * @param  ComplementaryRelatedItem $complementaryRelatedItem
     * @return static
     */
    public function addToComplementaryRelatedItem(ComplementaryRelatedItem $complementaryRelatedItem): static
    {
        $this->complementaryRelatedItem[] = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return ComplementaryRelatedItem
     */
    public function addToComplementaryRelatedItemWithCreate(): ComplementaryRelatedItem
    {
        $this->addTocomplementaryRelatedItem($complementaryRelatedItem = new ComplementaryRelatedItem());

        return $complementaryRelatedItem;
    }

    /**
     * @param  ComplementaryRelatedItem $complementaryRelatedItem
     * @return static
     */
    public function addOnceToComplementaryRelatedItem(ComplementaryRelatedItem $complementaryRelatedItem): static
    {
        if (!is_array($this->complementaryRelatedItem)) {
            $this->complementaryRelatedItem = [];
        }

        $this->complementaryRelatedItem[0] = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return ComplementaryRelatedItem
     */
    public function addOnceToComplementaryRelatedItemWithCreate(): ComplementaryRelatedItem
    {
        if (!is_array($this->complementaryRelatedItem)) {
            $this->complementaryRelatedItem = [];
        }

        if ([] === $this->complementaryRelatedItem) {
            $this->addOnceTocomplementaryRelatedItem(new ComplementaryRelatedItem());
        }

        return $this->complementaryRelatedItem[0];
    }

    /**
     * @return null|array<ReplacedRelatedItem>
     */
    public function getReplacedRelatedItem(): ?array
    {
        return $this->replacedRelatedItem;
    }

    /**
     * @param  null|array<ReplacedRelatedItem> $replacedRelatedItem
     * @return static
     */
    public function setReplacedRelatedItem(?array $replacedRelatedItem = null): static
    {
        $this->replacedRelatedItem = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReplacedRelatedItem(): static
    {
        $this->replacedRelatedItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReplacedRelatedItem(): static
    {
        $this->replacedRelatedItem = [];

        return $this;
    }

    /**
     * @return null|ReplacedRelatedItem
     */
    public function firstReplacedRelatedItem(): ?ReplacedRelatedItem
    {
        $replacedRelatedItem = $this->replacedRelatedItem ?? [];
        $replacedRelatedItem = reset($replacedRelatedItem);

        if (false === $replacedRelatedItem) {
            return null;
        }

        return $replacedRelatedItem;
    }

    /**
     * @return null|ReplacedRelatedItem
     */
    public function lastReplacedRelatedItem(): ?ReplacedRelatedItem
    {
        $replacedRelatedItem = $this->replacedRelatedItem ?? [];
        $replacedRelatedItem = end($replacedRelatedItem);

        if (false === $replacedRelatedItem) {
            return null;
        }

        return $replacedRelatedItem;
    }

    /**
     * @param  ReplacedRelatedItem $replacedRelatedItem
     * @return static
     */
    public function addToReplacedRelatedItem(ReplacedRelatedItem $replacedRelatedItem): static
    {
        $this->replacedRelatedItem[] = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return ReplacedRelatedItem
     */
    public function addToReplacedRelatedItemWithCreate(): ReplacedRelatedItem
    {
        $this->addToreplacedRelatedItem($replacedRelatedItem = new ReplacedRelatedItem());

        return $replacedRelatedItem;
    }

    /**
     * @param  ReplacedRelatedItem $replacedRelatedItem
     * @return static
     */
    public function addOnceToReplacedRelatedItem(ReplacedRelatedItem $replacedRelatedItem): static
    {
        if (!is_array($this->replacedRelatedItem)) {
            $this->replacedRelatedItem = [];
        }

        $this->replacedRelatedItem[0] = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return ReplacedRelatedItem
     */
    public function addOnceToReplacedRelatedItemWithCreate(): ReplacedRelatedItem
    {
        if (!is_array($this->replacedRelatedItem)) {
            $this->replacedRelatedItem = [];
        }

        if ([] === $this->replacedRelatedItem) {
            $this->addOnceToreplacedRelatedItem(new ReplacedRelatedItem());
        }

        return $this->replacedRelatedItem[0];
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
    public function setRequiredItemLocationQuantity(?array $requiredItemLocationQuantity = null): static
    {
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
        $this->item = is_null($this->item) ? new Item() : $this->item;

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(?Item $item = null): static
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
     * @return null|array<KeywordItemProperty>
     */
    public function getKeywordItemProperty(): ?array
    {
        return $this->keywordItemProperty;
    }

    /**
     * @param  null|array<KeywordItemProperty> $keywordItemProperty
     * @return static
     */
    public function setKeywordItemProperty(?array $keywordItemProperty = null): static
    {
        $this->keywordItemProperty = $keywordItemProperty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetKeywordItemProperty(): static
    {
        $this->keywordItemProperty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearKeywordItemProperty(): static
    {
        $this->keywordItemProperty = [];

        return $this;
    }

    /**
     * @return null|KeywordItemProperty
     */
    public function firstKeywordItemProperty(): ?KeywordItemProperty
    {
        $keywordItemProperty = $this->keywordItemProperty ?? [];
        $keywordItemProperty = reset($keywordItemProperty);

        if (false === $keywordItemProperty) {
            return null;
        }

        return $keywordItemProperty;
    }

    /**
     * @return null|KeywordItemProperty
     */
    public function lastKeywordItemProperty(): ?KeywordItemProperty
    {
        $keywordItemProperty = $this->keywordItemProperty ?? [];
        $keywordItemProperty = end($keywordItemProperty);

        if (false === $keywordItemProperty) {
            return null;
        }

        return $keywordItemProperty;
    }

    /**
     * @param  KeywordItemProperty $keywordItemProperty
     * @return static
     */
    public function addToKeywordItemProperty(KeywordItemProperty $keywordItemProperty): static
    {
        $this->keywordItemProperty[] = $keywordItemProperty;

        return $this;
    }

    /**
     * @return KeywordItemProperty
     */
    public function addToKeywordItemPropertyWithCreate(): KeywordItemProperty
    {
        $this->addTokeywordItemProperty($keywordItemProperty = new KeywordItemProperty());

        return $keywordItemProperty;
    }

    /**
     * @param  KeywordItemProperty $keywordItemProperty
     * @return static
     */
    public function addOnceToKeywordItemProperty(KeywordItemProperty $keywordItemProperty): static
    {
        if (!is_array($this->keywordItemProperty)) {
            $this->keywordItemProperty = [];
        }

        $this->keywordItemProperty[0] = $keywordItemProperty;

        return $this;
    }

    /**
     * @return KeywordItemProperty
     */
    public function addOnceToKeywordItemPropertyWithCreate(): KeywordItemProperty
    {
        if (!is_array($this->keywordItemProperty)) {
            $this->keywordItemProperty = [];
        }

        if ([] === $this->keywordItemProperty) {
            $this->addOnceTokeywordItemProperty(new KeywordItemProperty());
        }

        return $this->keywordItemProperty[0];
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
        $this->callForTendersLineReference = is_null($this->callForTendersLineReference) ? new CallForTendersLineReference() : $this->callForTendersLineReference;

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
        $this->callForTendersDocumentReference = is_null($this->callForTendersDocumentReference) ? new CallForTendersDocumentReference() : $this->callForTendersDocumentReference;

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
