<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContentUnitQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractSubdivision;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LifeCycleStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumOrderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumOrderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderableUnit;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderQuantityIncrementNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WarrantyInformation;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class CatalogueLineType
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
     * @var null|ActionCode
     */
    #[JMS\Accessor(getter: 'getActionCode', setter: 'setActionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $actionCode;

    /**
     * @var null|LifeCycleStatusCode
     */
    #[JMS\Accessor(getter: 'getLifeCycleStatusCode', setter: 'setLifeCycleStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LifeCycleStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LifeCycleStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lifeCycleStatusCode;

    /**
     * @var null|ContractSubdivision
     */
    #[JMS\Accessor(getter: 'getContractSubdivision', setter: 'setContractSubdivision')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractSubdivision')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractSubdivision')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $contractSubdivision;

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
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getOrderableIndicator', setter: 'setOrderableIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderableIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $orderableIndicator;

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
     * @var null|ContractorCustomerParty
     */
    #[JMS\Accessor(getter: 'getContractorCustomerParty', setter: 'setContractorCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractorCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractorCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contractorCustomerParty;

    /**
     * @var null|SellerSupplierParty
     */
    #[JMS\Accessor(getter: 'getSellerSupplierParty', setter: 'setSellerSupplierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerSupplierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerSupplierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerSupplierParty;

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
     * @var null|LineValidityPeriod
     */
    #[JMS\Accessor(getter: 'getLineValidityPeriod', setter: 'setLineValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LineValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $lineValidityPeriod;

    /**
     * @var null|array<ItemComparison>
     */
    #[JMS\Accessor(getter: 'getItemComparison', setter: 'setItemComparison')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ItemComparison')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ItemComparison>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ItemComparison', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $itemComparison;

    /**
     * @var null|array<ComponentRelatedItem>
     */
    #[JMS\Accessor(getter: 'getComponentRelatedItem', setter: 'setComponentRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComponentRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ComponentRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ComponentRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $componentRelatedItem;

    /**
     * @var null|array<AccessoryRelatedItem>
     */
    #[JMS\Accessor(getter: 'getAccessoryRelatedItem', setter: 'setAccessoryRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccessoryRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AccessoryRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AccessoryRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $accessoryRelatedItem;

    /**
     * @var null|array<RequiredRelatedItem>
     */
    #[JMS\Accessor(getter: 'getRequiredRelatedItem', setter: 'setRequiredRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequiredRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RequiredRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requiredRelatedItem;

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
     * @var null|array<ComplementaryRelatedItem>
     */
    #[JMS\Accessor(getter: 'getComplementaryRelatedItem', setter: 'setComplementaryRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComplementaryRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ComplementaryRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ComplementaryRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $complementaryRelatedItem;

    /**
     * @var null|array<ReplacedRelatedItem>
     */
    #[JMS\Accessor(getter: 'getReplacedRelatedItem', setter: 'setReplacedRelatedItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReplacedRelatedItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReplacedRelatedItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReplacedRelatedItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $replacedRelatedItem;

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
     * @var null|array<KeywordItemProperty>
     */
    #[JMS\Accessor(getter: 'getKeywordItemProperty', setter: 'setKeywordItemProperty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('KeywordItemProperty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\KeywordItemProperty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'KeywordItemProperty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $keywordItemProperty;

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
        $this->actionCode ??= new ActionCode();

        return $this->actionCode;
    }

    /**
     * @param  null|ActionCode $actionCode
     * @return static
     */
    public function setActionCode(
        ?ActionCode $actionCode = null
    ): static {
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
        $this->lifeCycleStatusCode ??= new LifeCycleStatusCode();

        return $this->lifeCycleStatusCode;
    }

    /**
     * @param  null|LifeCycleStatusCode $lifeCycleStatusCode
     * @return static
     */
    public function setLifeCycleStatusCode(
        ?LifeCycleStatusCode $lifeCycleStatusCode = null
    ): static {
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
        $this->contractSubdivision ??= new ContractSubdivision();

        return $this->contractSubdivision;
    }

    /**
     * @param  null|ContractSubdivision $contractSubdivision
     * @return static
     */
    public function setContractSubdivision(
        ?ContractSubdivision $contractSubdivision = null
    ): static {
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

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
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
    public function setOrderableIndicator(
        ?bool $orderableIndicator = null
    ): static {
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
        $this->addToWarrantyInformation($warrantyInformation = new WarrantyInformation());

        return $warrantyInformation;
    }

    /**
     * @param  WarrantyInformation $warrantyInformation
     * @return static
     */
    public function addOnceToWarrantyInformation(
        WarrantyInformation $warrantyInformation
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->warrantyInformation)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        if ([] === $this->warrantyInformation) {
            $this->addOnceToWarrantyInformation(new WarrantyInformation());
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
        $this->contractorCustomerParty ??= new ContractorCustomerParty();

        return $this->contractorCustomerParty;
    }

    /**
     * @param  null|ContractorCustomerParty $contractorCustomerParty
     * @return static
     */
    public function setContractorCustomerParty(
        ?ContractorCustomerParty $contractorCustomerParty = null
    ): static {
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
        $this->sellerSupplierParty ??= new SellerSupplierParty();

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(
        ?SellerSupplierParty $sellerSupplierParty = null
    ): static {
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
        $this->lineValidityPeriod ??= new LineValidityPeriod();

        return $this->lineValidityPeriod;
    }

    /**
     * @param  null|LineValidityPeriod $lineValidityPeriod
     * @return static
     */
    public function setLineValidityPeriod(
        ?LineValidityPeriod $lineValidityPeriod = null
    ): static {
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
    public function setItemComparison(
        ?array $itemComparison = null
    ): static {
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
    public function addToItemComparison(
        ItemComparison $itemComparison
    ): static {
        $this->itemComparison[] = $itemComparison;

        return $this;
    }

    /**
     * @return ItemComparison
     */
    public function addToItemComparisonWithCreate(): ItemComparison
    {
        $this->addToItemComparison($itemComparison = new ItemComparison());

        return $itemComparison;
    }

    /**
     * @param  ItemComparison $itemComparison
     * @return static
     */
    public function addOnceToItemComparison(
        ItemComparison $itemComparison
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->itemComparison)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->itemComparison)) {
            $this->itemComparison = [];
        }

        if ([] === $this->itemComparison) {
            $this->addOnceToItemComparison(new ItemComparison());
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
    public function setComponentRelatedItem(
        ?array $componentRelatedItem = null
    ): static {
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
    public function addToComponentRelatedItem(
        ComponentRelatedItem $componentRelatedItem
    ): static {
        $this->componentRelatedItem[] = $componentRelatedItem;

        return $this;
    }

    /**
     * @return ComponentRelatedItem
     */
    public function addToComponentRelatedItemWithCreate(): ComponentRelatedItem
    {
        $this->addToComponentRelatedItem($componentRelatedItem = new ComponentRelatedItem());

        return $componentRelatedItem;
    }

    /**
     * @param  ComponentRelatedItem $componentRelatedItem
     * @return static
     */
    public function addOnceToComponentRelatedItem(
        ComponentRelatedItem $componentRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->componentRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->componentRelatedItem)) {
            $this->componentRelatedItem = [];
        }

        if ([] === $this->componentRelatedItem) {
            $this->addOnceToComponentRelatedItem(new ComponentRelatedItem());
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
    public function setAccessoryRelatedItem(
        ?array $accessoryRelatedItem = null
    ): static {
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
    public function addToAccessoryRelatedItem(
        AccessoryRelatedItem $accessoryRelatedItem
    ): static {
        $this->accessoryRelatedItem[] = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return AccessoryRelatedItem
     */
    public function addToAccessoryRelatedItemWithCreate(): AccessoryRelatedItem
    {
        $this->addToAccessoryRelatedItem($accessoryRelatedItem = new AccessoryRelatedItem());

        return $accessoryRelatedItem;
    }

    /**
     * @param  AccessoryRelatedItem $accessoryRelatedItem
     * @return static
     */
    public function addOnceToAccessoryRelatedItem(
        AccessoryRelatedItem $accessoryRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->accessoryRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->accessoryRelatedItem)) {
            $this->accessoryRelatedItem = [];
        }

        if ([] === $this->accessoryRelatedItem) {
            $this->addOnceToAccessoryRelatedItem(new AccessoryRelatedItem());
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
    public function setRequiredRelatedItem(
        ?array $requiredRelatedItem = null
    ): static {
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
    public function addToRequiredRelatedItem(
        RequiredRelatedItem $requiredRelatedItem
    ): static {
        $this->requiredRelatedItem[] = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return RequiredRelatedItem
     */
    public function addToRequiredRelatedItemWithCreate(): RequiredRelatedItem
    {
        $this->addToRequiredRelatedItem($requiredRelatedItem = new RequiredRelatedItem());

        return $requiredRelatedItem;
    }

    /**
     * @param  RequiredRelatedItem $requiredRelatedItem
     * @return static
     */
    public function addOnceToRequiredRelatedItem(
        RequiredRelatedItem $requiredRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->requiredRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->requiredRelatedItem)) {
            $this->requiredRelatedItem = [];
        }

        if ([] === $this->requiredRelatedItem) {
            $this->addOnceToRequiredRelatedItem(new RequiredRelatedItem());
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
        $this->addToReplacementRelatedItem($replacementRelatedItem = new ReplacementRelatedItem());

        return $replacementRelatedItem;
    }

    /**
     * @param  ReplacementRelatedItem $replacementRelatedItem
     * @return static
     */
    public function addOnceToReplacementRelatedItem(
        ReplacementRelatedItem $replacementRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->replacementRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->replacementRelatedItem)) {
            $this->replacementRelatedItem = [];
        }

        if ([] === $this->replacementRelatedItem) {
            $this->addOnceToReplacementRelatedItem(new ReplacementRelatedItem());
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
    public function setComplementaryRelatedItem(
        ?array $complementaryRelatedItem = null
    ): static {
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
    public function addToComplementaryRelatedItem(
        ComplementaryRelatedItem $complementaryRelatedItem
    ): static {
        $this->complementaryRelatedItem[] = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return ComplementaryRelatedItem
     */
    public function addToComplementaryRelatedItemWithCreate(): ComplementaryRelatedItem
    {
        $this->addToComplementaryRelatedItem($complementaryRelatedItem = new ComplementaryRelatedItem());

        return $complementaryRelatedItem;
    }

    /**
     * @param  ComplementaryRelatedItem $complementaryRelatedItem
     * @return static
     */
    public function addOnceToComplementaryRelatedItem(
        ComplementaryRelatedItem $complementaryRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->complementaryRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->complementaryRelatedItem)) {
            $this->complementaryRelatedItem = [];
        }

        if ([] === $this->complementaryRelatedItem) {
            $this->addOnceToComplementaryRelatedItem(new ComplementaryRelatedItem());
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
    public function setReplacedRelatedItem(
        ?array $replacedRelatedItem = null
    ): static {
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
    public function addToReplacedRelatedItem(
        ReplacedRelatedItem $replacedRelatedItem
    ): static {
        $this->replacedRelatedItem[] = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return ReplacedRelatedItem
     */
    public function addToReplacedRelatedItemWithCreate(): ReplacedRelatedItem
    {
        $this->addToReplacedRelatedItem($replacedRelatedItem = new ReplacedRelatedItem());

        return $replacedRelatedItem;
    }

    /**
     * @param  ReplacedRelatedItem $replacedRelatedItem
     * @return static
     */
    public function addOnceToReplacedRelatedItem(
        ReplacedRelatedItem $replacedRelatedItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->replacedRelatedItem)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->replacedRelatedItem)) {
            $this->replacedRelatedItem = [];
        }

        if ([] === $this->replacedRelatedItem) {
            $this->addOnceToReplacedRelatedItem(new ReplacedRelatedItem());
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
        $this->addToRequiredItemLocationQuantity($requiredItemLocationQuantity = new RequiredItemLocationQuantity());

        return $requiredItemLocationQuantity;
    }

    /**
     * @param  RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return static
     */
    public function addOnceToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->requiredItemLocationQuantity)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        if ([] === $this->requiredItemLocationQuantity) {
            $this->addOnceToRequiredItemLocationQuantity(new RequiredItemLocationQuantity());
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

        if ([] === $this->documentReference) {
            $this->addOnceToDocumentReference(new DocumentReference());
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
    public function setKeywordItemProperty(
        ?array $keywordItemProperty = null
    ): static {
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
    public function addToKeywordItemProperty(
        KeywordItemProperty $keywordItemProperty
    ): static {
        $this->keywordItemProperty[] = $keywordItemProperty;

        return $this;
    }

    /**
     * @return KeywordItemProperty
     */
    public function addToKeywordItemPropertyWithCreate(): KeywordItemProperty
    {
        $this->addToKeywordItemProperty($keywordItemProperty = new KeywordItemProperty());

        return $keywordItemProperty;
    }

    /**
     * @param  KeywordItemProperty $keywordItemProperty
     * @return static
     */
    public function addOnceToKeywordItemProperty(
        KeywordItemProperty $keywordItemProperty
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->keywordItemProperty)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->keywordItemProperty)) {
            $this->keywordItemProperty = [];
        }

        if ([] === $this->keywordItemProperty) {
            $this->addOnceToKeywordItemProperty(new KeywordItemProperty());
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
