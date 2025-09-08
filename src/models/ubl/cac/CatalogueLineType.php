<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ActionCode;
use horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit;
use horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode;
use horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation;

class CatalogueLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ActionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ActionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ActionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActionCode", setter="setActionCode")
     */
    private $actionCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("LifeCycleStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLifeCycleStatusCode", setter="setLifeCycleStatusCode")
     */
    private $lifeCycleStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision")
     * @JMS\Expose
     * @JMS\SerializedName("ContractSubdivision")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractSubdivision", setter="setContractSubdivision")
     */
    private $contractSubdivision;

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
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableIndicator", setter="setOrderableIndicator")
     */
    private $orderableIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableUnit", setter="setOrderableUnit")
     */
    private $orderableUnit;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ContentUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContentUnitQuantity", setter="setContentUnitQuantity")
     */
    private $contentUnitQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("OrderQuantityIncrementNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderQuantityIncrementNumeric", setter="setOrderQuantityIncrementNumeric")
     */
    private $orderQuantityIncrementNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumOrderQuantity", setter="setMinimumOrderQuantity")
     */
    private $minimumOrderQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumOrderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumOrderQuantity", setter="setMaximumOrderQuantity")
     */
    private $maximumOrderQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation>")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyInformation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WarrantyInformation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getWarrantyInformation", setter="setWarrantyInformation")
     */
    private $warrantyInformation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("PackLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackLevelCode", setter="setPackLevelCode")
     */
    private $packLevelCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContractorCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContractorCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("ContractorCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractorCustomerParty", setter="setContractorCustomerParty")
     */
    private $contractorCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\WarrantyParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\WarrantyParty")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyParty", setter="setWarrantyParty")
     */
    private $warrantyParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyValidityPeriod", setter="setWarrantyValidityPeriod")
     */
    private $warrantyValidityPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LineValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LineValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("LineValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineValidityPeriod", setter="setLineValidityPeriod")
     */
    private $lineValidityPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ItemComparison>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ItemComparison>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemComparison")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemComparison", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemComparison", setter="setItemComparison")
     */
    private $itemComparison;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ComponentRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ComponentRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getComponentRelatedItem", setter="setComponentRelatedItem")
     */
    private $componentRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("AccessoryRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AccessoryRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAccessoryRelatedItem", setter="setAccessoryRelatedItem")
     */
    private $accessoryRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredRelatedItem", setter="setRequiredRelatedItem")
     */
    private $requiredRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacementRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplacementRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReplacementRelatedItem", setter="setReplacementRelatedItem")
     */
    private $replacementRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ComplementaryRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ComplementaryRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getComplementaryRelatedItem", setter="setComplementaryRelatedItem")
     */
    private $complementaryRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacedRelatedItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReplacedRelatedItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReplacedRelatedItem", setter="setReplacedRelatedItem")
     */
    private $replacedRelatedItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredItemLocationQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredItemLocationQuantity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredItemLocationQuantity", setter="setRequiredItemLocationQuantity")
     */
    private $requiredItemLocationQuantity;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("KeywordItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="KeywordItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getKeywordItemProperty", setter="setKeywordItemProperty")
     */
    private $keywordItemProperty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CallForTendersLineReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CallForTendersLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersLineReference", setter="setCallForTendersLineReference")
     */
    private $callForTendersLineReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersDocumentReference", setter="setCallForTendersDocumentReference")
     */
    private $callForTendersDocumentReference;

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
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ActionCode|null
     */
    public function getActionCode(): ?ActionCode
    {
        return $this->actionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ActionCode
     */
    public function getActionCodeWithCreate(): ActionCode
    {
        $this->actionCode = is_null($this->actionCode) ? new ActionCode() : $this->actionCode;

        return $this->actionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ActionCode|null $actionCode
     * @return self
     */
    public function setActionCode(?ActionCode $actionCode = null): self
    {
        $this->actionCode = $actionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActionCode(): self
    {
        $this->actionCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode|null
     */
    public function getLifeCycleStatusCode(): ?LifeCycleStatusCode
    {
        return $this->lifeCycleStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode
     */
    public function getLifeCycleStatusCodeWithCreate(): LifeCycleStatusCode
    {
        $this->lifeCycleStatusCode = is_null($this->lifeCycleStatusCode) ? new LifeCycleStatusCode() : $this->lifeCycleStatusCode;

        return $this->lifeCycleStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LifeCycleStatusCode|null $lifeCycleStatusCode
     * @return self
     */
    public function setLifeCycleStatusCode(?LifeCycleStatusCode $lifeCycleStatusCode = null): self
    {
        $this->lifeCycleStatusCode = $lifeCycleStatusCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLifeCycleStatusCode(): self
    {
        $this->lifeCycleStatusCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision|null
     */
    public function getContractSubdivision(): ?ContractSubdivision
    {
        return $this->contractSubdivision;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision
     */
    public function getContractSubdivisionWithCreate(): ContractSubdivision
    {
        $this->contractSubdivision = is_null($this->contractSubdivision) ? new ContractSubdivision() : $this->contractSubdivision;

        return $this->contractSubdivision;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ContractSubdivision|null $contractSubdivision
     * @return self
     */
    public function setContractSubdivision(?ContractSubdivision $contractSubdivision = null): self
    {
        $this->contractSubdivision = $contractSubdivision;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractSubdivision(): self
    {
        $this->contractSubdivision = null;

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
     * @return bool|null
     */
    public function getOrderableIndicator(): ?bool
    {
        return $this->orderableIndicator;
    }

    /**
     * @param bool|null $orderableIndicator
     * @return self
     */
    public function setOrderableIndicator(?bool $orderableIndicator = null): self
    {
        $this->orderableIndicator = $orderableIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderableIndicator(): self
    {
        $this->orderableIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit|null
     */
    public function getOrderableUnit(): ?OrderableUnit
    {
        return $this->orderableUnit;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit
     */
    public function getOrderableUnitWithCreate(): OrderableUnit
    {
        $this->orderableUnit = is_null($this->orderableUnit) ? new OrderableUnit() : $this->orderableUnit;

        return $this->orderableUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OrderableUnit|null $orderableUnit
     * @return self
     */
    public function setOrderableUnit(?OrderableUnit $orderableUnit = null): self
    {
        $this->orderableUnit = $orderableUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderableUnit(): self
    {
        $this->orderableUnit = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity|null
     */
    public function getContentUnitQuantity(): ?ContentUnitQuantity
    {
        return $this->contentUnitQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity
     */
    public function getContentUnitQuantityWithCreate(): ContentUnitQuantity
    {
        $this->contentUnitQuantity = is_null($this->contentUnitQuantity) ? new ContentUnitQuantity() : $this->contentUnitQuantity;

        return $this->contentUnitQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ContentUnitQuantity|null $contentUnitQuantity
     * @return self
     */
    public function setContentUnitQuantity(?ContentUnitQuantity $contentUnitQuantity = null): self
    {
        $this->contentUnitQuantity = $contentUnitQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContentUnitQuantity(): self
    {
        $this->contentUnitQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric|null
     */
    public function getOrderQuantityIncrementNumeric(): ?OrderQuantityIncrementNumeric
    {
        return $this->orderQuantityIncrementNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric
     */
    public function getOrderQuantityIncrementNumericWithCreate(): OrderQuantityIncrementNumeric
    {
        $this->orderQuantityIncrementNumeric = is_null($this->orderQuantityIncrementNumeric) ? new OrderQuantityIncrementNumeric() : $this->orderQuantityIncrementNumeric;

        return $this->orderQuantityIncrementNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OrderQuantityIncrementNumeric|null $orderQuantityIncrementNumeric
     * @return self
     */
    public function setOrderQuantityIncrementNumeric(
        ?OrderQuantityIncrementNumeric $orderQuantityIncrementNumeric = null,
    ): self {
        $this->orderQuantityIncrementNumeric = $orderQuantityIncrementNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderQuantityIncrementNumeric(): self
    {
        $this->orderQuantityIncrementNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity|null
     */
    public function getMinimumOrderQuantity(): ?MinimumOrderQuantity
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity
     */
    public function getMinimumOrderQuantityWithCreate(): MinimumOrderQuantity
    {
        $this->minimumOrderQuantity = is_null($this->minimumOrderQuantity) ? new MinimumOrderQuantity() : $this->minimumOrderQuantity;

        return $this->minimumOrderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumOrderQuantity|null $minimumOrderQuantity
     * @return self
     */
    public function setMinimumOrderQuantity(?MinimumOrderQuantity $minimumOrderQuantity = null): self
    {
        $this->minimumOrderQuantity = $minimumOrderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumOrderQuantity(): self
    {
        $this->minimumOrderQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity|null
     */
    public function getMaximumOrderQuantity(): ?MaximumOrderQuantity
    {
        return $this->maximumOrderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity
     */
    public function getMaximumOrderQuantityWithCreate(): MaximumOrderQuantity
    {
        $this->maximumOrderQuantity = is_null($this->maximumOrderQuantity) ? new MaximumOrderQuantity() : $this->maximumOrderQuantity;

        return $this->maximumOrderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumOrderQuantity|null $maximumOrderQuantity
     * @return self
     */
    public function setMaximumOrderQuantity(?MaximumOrderQuantity $maximumOrderQuantity = null): self
    {
        $this->maximumOrderQuantity = $maximumOrderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumOrderQuantity(): self
    {
        $this->maximumOrderQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation>|null
     */
    public function getWarrantyInformation(): ?array
    {
        return $this->warrantyInformation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation>|null $warrantyInformation
     * @return self
     */
    public function setWarrantyInformation(?array $warrantyInformation = null): self
    {
        $this->warrantyInformation = $warrantyInformation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWarrantyInformation(): self
    {
        $this->warrantyInformation = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWarrantyInformation(): self
    {
        $this->warrantyInformation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation $warrantyInformation
     * @return self
     */
    public function addToWarrantyInformation(WarrantyInformation $warrantyInformation): self
    {
        $this->warrantyInformation[] = $warrantyInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation
     */
    public function addToWarrantyInformationWithCreate(): WarrantyInformation
    {
        $this->addTowarrantyInformation($warrantyInformation = new WarrantyInformation());

        return $warrantyInformation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation $warrantyInformation
     * @return self
     */
    public function addOnceToWarrantyInformation(WarrantyInformation $warrantyInformation): self
    {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        $this->warrantyInformation[0] = $warrantyInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WarrantyInformation
     */
    public function addOnceToWarrantyInformationWithCreate(): WarrantyInformation
    {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        if ($this->warrantyInformation === []) {
            $this->addOnceTowarrantyInformation(new WarrantyInformation());
        }

        return $this->warrantyInformation[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode|null
     */
    public function getPackLevelCode(): ?PackLevelCode
    {
        return $this->packLevelCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode
     */
    public function getPackLevelCodeWithCreate(): PackLevelCode
    {
        $this->packLevelCode = is_null($this->packLevelCode) ? new PackLevelCode() : $this->packLevelCode;

        return $this->packLevelCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackLevelCode|null $packLevelCode
     * @return self
     */
    public function setPackLevelCode(?PackLevelCode $packLevelCode = null): self
    {
        $this->packLevelCode = $packLevelCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackLevelCode(): self
    {
        $this->packLevelCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractorCustomerParty|null
     */
    public function getContractorCustomerParty(): ?ContractorCustomerParty
    {
        return $this->contractorCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractorCustomerParty
     */
    public function getContractorCustomerPartyWithCreate(): ContractorCustomerParty
    {
        $this->contractorCustomerParty = is_null($this->contractorCustomerParty) ? new ContractorCustomerParty() : $this->contractorCustomerParty;

        return $this->contractorCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractorCustomerParty|null $contractorCustomerParty
     * @return self
     */
    public function setContractorCustomerParty(?ContractorCustomerParty $contractorCustomerParty = null): self
    {
        $this->contractorCustomerParty = $contractorCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractorCustomerParty(): self
    {
        $this->contractorCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null $sellerSupplierParty
     * @return self
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): self
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSellerSupplierParty(): self
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyParty|null
     */
    public function getWarrantyParty(): ?WarrantyParty
    {
        return $this->warrantyParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyParty
     */
    public function getWarrantyPartyWithCreate(): WarrantyParty
    {
        $this->warrantyParty = is_null($this->warrantyParty) ? new WarrantyParty() : $this->warrantyParty;

        return $this->warrantyParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WarrantyParty|null $warrantyParty
     * @return self
     */
    public function setWarrantyParty(?WarrantyParty $warrantyParty = null): self
    {
        $this->warrantyParty = $warrantyParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWarrantyParty(): self
    {
        $this->warrantyParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null
     */
    public function getWarrantyValidityPeriod(): ?WarrantyValidityPeriod
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriodWithCreate(): WarrantyValidityPeriod
    {
        $this->warrantyValidityPeriod = is_null($this->warrantyValidityPeriod) ? new WarrantyValidityPeriod() : $this->warrantyValidityPeriod;

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null $warrantyValidityPeriod
     * @return self
     */
    public function setWarrantyValidityPeriod(?WarrantyValidityPeriod $warrantyValidityPeriod = null): self
    {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWarrantyValidityPeriod(): self
    {
        $this->warrantyValidityPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LineValidityPeriod|null
     */
    public function getLineValidityPeriod(): ?LineValidityPeriod
    {
        return $this->lineValidityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LineValidityPeriod
     */
    public function getLineValidityPeriodWithCreate(): LineValidityPeriod
    {
        $this->lineValidityPeriod = is_null($this->lineValidityPeriod) ? new LineValidityPeriod() : $this->lineValidityPeriod;

        return $this->lineValidityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LineValidityPeriod|null $lineValidityPeriod
     * @return self
     */
    public function setLineValidityPeriod(?LineValidityPeriod $lineValidityPeriod = null): self
    {
        $this->lineValidityPeriod = $lineValidityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineValidityPeriod(): self
    {
        $this->lineValidityPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ItemComparison>|null
     */
    public function getItemComparison(): ?array
    {
        return $this->itemComparison;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ItemComparison>|null $itemComparison
     * @return self
     */
    public function setItemComparison(?array $itemComparison = null): self
    {
        $this->itemComparison = $itemComparison;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemComparison(): self
    {
        $this->itemComparison = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItemComparison(): self
    {
        $this->itemComparison = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ItemComparison $itemComparison
     * @return self
     */
    public function addToItemComparison(ItemComparison $itemComparison): self
    {
        $this->itemComparison[] = $itemComparison;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemComparison
     */
    public function addToItemComparisonWithCreate(): ItemComparison
    {
        $this->addToitemComparison($itemComparison = new ItemComparison());

        return $itemComparison;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ItemComparison $itemComparison
     * @return self
     */
    public function addOnceToItemComparison(ItemComparison $itemComparison): self
    {
        if (!is_array($this->itemComparison)) {
            $this->itemComparison = [];
        }

        $this->itemComparison[0] = $itemComparison;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ItemComparison
     */
    public function addOnceToItemComparisonWithCreate(): ItemComparison
    {
        if (!is_array($this->itemComparison)) {
            $this->itemComparison = [];
        }

        if ($this->itemComparison === []) {
            $this->addOnceToitemComparison(new ItemComparison());
        }

        return $this->itemComparison[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem>|null
     */
    public function getComponentRelatedItem(): ?array
    {
        return $this->componentRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem>|null $componentRelatedItem
     * @return self
     */
    public function setComponentRelatedItem(?array $componentRelatedItem = null): self
    {
        $this->componentRelatedItem = $componentRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetComponentRelatedItem(): self
    {
        $this->componentRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearComponentRelatedItem(): self
    {
        $this->componentRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem $componentRelatedItem
     * @return self
     */
    public function addToComponentRelatedItem(ComponentRelatedItem $componentRelatedItem): self
    {
        $this->componentRelatedItem[] = $componentRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem
     */
    public function addToComponentRelatedItemWithCreate(): ComponentRelatedItem
    {
        $this->addTocomponentRelatedItem($componentRelatedItem = new ComponentRelatedItem());

        return $componentRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem $componentRelatedItem
     * @return self
     */
    public function addOnceToComponentRelatedItem(ComponentRelatedItem $componentRelatedItem): self
    {
        if (!is_array($this->componentRelatedItem)) {
            $this->componentRelatedItem = [];
        }

        $this->componentRelatedItem[0] = $componentRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ComponentRelatedItem
     */
    public function addOnceToComponentRelatedItemWithCreate(): ComponentRelatedItem
    {
        if (!is_array($this->componentRelatedItem)) {
            $this->componentRelatedItem = [];
        }

        if ($this->componentRelatedItem === []) {
            $this->addOnceTocomponentRelatedItem(new ComponentRelatedItem());
        }

        return $this->componentRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem>|null
     */
    public function getAccessoryRelatedItem(): ?array
    {
        return $this->accessoryRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem>|null $accessoryRelatedItem
     * @return self
     */
    public function setAccessoryRelatedItem(?array $accessoryRelatedItem = null): self
    {
        $this->accessoryRelatedItem = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccessoryRelatedItem(): self
    {
        $this->accessoryRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAccessoryRelatedItem(): self
    {
        $this->accessoryRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem $accessoryRelatedItem
     * @return self
     */
    public function addToAccessoryRelatedItem(AccessoryRelatedItem $accessoryRelatedItem): self
    {
        $this->accessoryRelatedItem[] = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem
     */
    public function addToAccessoryRelatedItemWithCreate(): AccessoryRelatedItem
    {
        $this->addToaccessoryRelatedItem($accessoryRelatedItem = new AccessoryRelatedItem());

        return $accessoryRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem $accessoryRelatedItem
     * @return self
     */
    public function addOnceToAccessoryRelatedItem(AccessoryRelatedItem $accessoryRelatedItem): self
    {
        if (!is_array($this->accessoryRelatedItem)) {
            $this->accessoryRelatedItem = [];
        }

        $this->accessoryRelatedItem[0] = $accessoryRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccessoryRelatedItem
     */
    public function addOnceToAccessoryRelatedItemWithCreate(): AccessoryRelatedItem
    {
        if (!is_array($this->accessoryRelatedItem)) {
            $this->accessoryRelatedItem = [];
        }

        if ($this->accessoryRelatedItem === []) {
            $this->addOnceToaccessoryRelatedItem(new AccessoryRelatedItem());
        }

        return $this->accessoryRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem>|null
     */
    public function getRequiredRelatedItem(): ?array
    {
        return $this->requiredRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem>|null $requiredRelatedItem
     * @return self
     */
    public function setRequiredRelatedItem(?array $requiredRelatedItem = null): self
    {
        $this->requiredRelatedItem = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequiredRelatedItem(): self
    {
        $this->requiredRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRequiredRelatedItem(): self
    {
        $this->requiredRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem $requiredRelatedItem
     * @return self
     */
    public function addToRequiredRelatedItem(RequiredRelatedItem $requiredRelatedItem): self
    {
        $this->requiredRelatedItem[] = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem
     */
    public function addToRequiredRelatedItemWithCreate(): RequiredRelatedItem
    {
        $this->addTorequiredRelatedItem($requiredRelatedItem = new RequiredRelatedItem());

        return $requiredRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem $requiredRelatedItem
     * @return self
     */
    public function addOnceToRequiredRelatedItem(RequiredRelatedItem $requiredRelatedItem): self
    {
        if (!is_array($this->requiredRelatedItem)) {
            $this->requiredRelatedItem = [];
        }

        $this->requiredRelatedItem[0] = $requiredRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredRelatedItem
     */
    public function addOnceToRequiredRelatedItemWithCreate(): RequiredRelatedItem
    {
        if (!is_array($this->requiredRelatedItem)) {
            $this->requiredRelatedItem = [];
        }

        if ($this->requiredRelatedItem === []) {
            $this->addOnceTorequiredRelatedItem(new RequiredRelatedItem());
        }

        return $this->requiredRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem>|null
     */
    public function getReplacementRelatedItem(): ?array
    {
        return $this->replacementRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem>|null $replacementRelatedItem
     * @return self
     */
    public function setReplacementRelatedItem(?array $replacementRelatedItem = null): self
    {
        $this->replacementRelatedItem = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReplacementRelatedItem(): self
    {
        $this->replacementRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReplacementRelatedItem(): self
    {
        $this->replacementRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem $replacementRelatedItem
     * @return self
     */
    public function addToReplacementRelatedItem(ReplacementRelatedItem $replacementRelatedItem): self
    {
        $this->replacementRelatedItem[] = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem
     */
    public function addToReplacementRelatedItemWithCreate(): ReplacementRelatedItem
    {
        $this->addToreplacementRelatedItem($replacementRelatedItem = new ReplacementRelatedItem());

        return $replacementRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem $replacementRelatedItem
     * @return self
     */
    public function addOnceToReplacementRelatedItem(ReplacementRelatedItem $replacementRelatedItem): self
    {
        if (!is_array($this->replacementRelatedItem)) {
            $this->replacementRelatedItem = [];
        }

        $this->replacementRelatedItem[0] = $replacementRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacementRelatedItem
     */
    public function addOnceToReplacementRelatedItemWithCreate(): ReplacementRelatedItem
    {
        if (!is_array($this->replacementRelatedItem)) {
            $this->replacementRelatedItem = [];
        }

        if ($this->replacementRelatedItem === []) {
            $this->addOnceToreplacementRelatedItem(new ReplacementRelatedItem());
        }

        return $this->replacementRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem>|null
     */
    public function getComplementaryRelatedItem(): ?array
    {
        return $this->complementaryRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem>|null $complementaryRelatedItem
     * @return self
     */
    public function setComplementaryRelatedItem(?array $complementaryRelatedItem = null): self
    {
        $this->complementaryRelatedItem = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetComplementaryRelatedItem(): self
    {
        $this->complementaryRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearComplementaryRelatedItem(): self
    {
        $this->complementaryRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem $complementaryRelatedItem
     * @return self
     */
    public function addToComplementaryRelatedItem(ComplementaryRelatedItem $complementaryRelatedItem): self
    {
        $this->complementaryRelatedItem[] = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem
     */
    public function addToComplementaryRelatedItemWithCreate(): ComplementaryRelatedItem
    {
        $this->addTocomplementaryRelatedItem($complementaryRelatedItem = new ComplementaryRelatedItem());

        return $complementaryRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem $complementaryRelatedItem
     * @return self
     */
    public function addOnceToComplementaryRelatedItem(ComplementaryRelatedItem $complementaryRelatedItem): self
    {
        if (!is_array($this->complementaryRelatedItem)) {
            $this->complementaryRelatedItem = [];
        }

        $this->complementaryRelatedItem[0] = $complementaryRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ComplementaryRelatedItem
     */
    public function addOnceToComplementaryRelatedItemWithCreate(): ComplementaryRelatedItem
    {
        if (!is_array($this->complementaryRelatedItem)) {
            $this->complementaryRelatedItem = [];
        }

        if ($this->complementaryRelatedItem === []) {
            $this->addOnceTocomplementaryRelatedItem(new ComplementaryRelatedItem());
        }

        return $this->complementaryRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem>|null
     */
    public function getReplacedRelatedItem(): ?array
    {
        return $this->replacedRelatedItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem>|null $replacedRelatedItem
     * @return self
     */
    public function setReplacedRelatedItem(?array $replacedRelatedItem = null): self
    {
        $this->replacedRelatedItem = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReplacedRelatedItem(): self
    {
        $this->replacedRelatedItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReplacedRelatedItem(): self
    {
        $this->replacedRelatedItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem $replacedRelatedItem
     * @return self
     */
    public function addToReplacedRelatedItem(ReplacedRelatedItem $replacedRelatedItem): self
    {
        $this->replacedRelatedItem[] = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem
     */
    public function addToReplacedRelatedItemWithCreate(): ReplacedRelatedItem
    {
        $this->addToreplacedRelatedItem($replacedRelatedItem = new ReplacedRelatedItem());

        return $replacedRelatedItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem $replacedRelatedItem
     * @return self
     */
    public function addOnceToReplacedRelatedItem(ReplacedRelatedItem $replacedRelatedItem): self
    {
        if (!is_array($this->replacedRelatedItem)) {
            $this->replacedRelatedItem = [];
        }

        $this->replacedRelatedItem[0] = $replacedRelatedItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacedRelatedItem
     */
    public function addOnceToReplacedRelatedItemWithCreate(): ReplacedRelatedItem
    {
        if (!is_array($this->replacedRelatedItem)) {
            $this->replacedRelatedItem = [];
        }

        if ($this->replacedRelatedItem === []) {
            $this->addOnceToreplacedRelatedItem(new ReplacedRelatedItem());
        }

        return $this->replacedRelatedItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity>|null
     */
    public function getRequiredItemLocationQuantity(): ?array
    {
        return $this->requiredItemLocationQuantity;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity>|null $requiredItemLocationQuantity
     * @return self
     */
    public function setRequiredItemLocationQuantity(?array $requiredItemLocationQuantity = null): self
    {
        $this->requiredItemLocationQuantity = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequiredItemLocationQuantity(): self
    {
        $this->requiredItemLocationQuantity = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRequiredItemLocationQuantity(): self
    {
        $this->requiredItemLocationQuantity = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return self
     */
    public function addToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): self {
        $this->requiredItemLocationQuantity[] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity
     */
    public function addToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        $this->addTorequiredItemLocationQuantity($requiredItemLocationQuantity = new RequiredItemLocationQuantity());

        return $requiredItemLocationQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return self
     */
    public function addOnceToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): self {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        $this->requiredItemLocationQuantity[0] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredItemLocationQuantity
     */
    public function addOnceToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        if ($this->requiredItemLocationQuantity === []) {
            $this->addOnceTorequiredItemLocationQuantity(new RequiredItemLocationQuantity());
        }

        return $this->requiredItemLocationQuantity[0];
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
     * @return self
     */
    public function unsetItem(): self
    {
        $this->item = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty>|null
     */
    public function getKeywordItemProperty(): ?array
    {
        return $this->keywordItemProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty>|null $keywordItemProperty
     * @return self
     */
    public function setKeywordItemProperty(?array $keywordItemProperty = null): self
    {
        $this->keywordItemProperty = $keywordItemProperty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetKeywordItemProperty(): self
    {
        $this->keywordItemProperty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearKeywordItemProperty(): self
    {
        $this->keywordItemProperty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty $keywordItemProperty
     * @return self
     */
    public function addToKeywordItemProperty(KeywordItemProperty $keywordItemProperty): self
    {
        $this->keywordItemProperty[] = $keywordItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty
     */
    public function addToKeywordItemPropertyWithCreate(): KeywordItemProperty
    {
        $this->addTokeywordItemProperty($keywordItemProperty = new KeywordItemProperty());

        return $keywordItemProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty $keywordItemProperty
     * @return self
     */
    public function addOnceToKeywordItemProperty(KeywordItemProperty $keywordItemProperty): self
    {
        if (!is_array($this->keywordItemProperty)) {
            $this->keywordItemProperty = [];
        }

        $this->keywordItemProperty[0] = $keywordItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\KeywordItemProperty
     */
    public function addOnceToKeywordItemPropertyWithCreate(): KeywordItemProperty
    {
        if (!is_array($this->keywordItemProperty)) {
            $this->keywordItemProperty = [];
        }

        if ($this->keywordItemProperty === []) {
            $this->addOnceTokeywordItemProperty(new KeywordItemProperty());
        }

        return $this->keywordItemProperty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersLineReference|null
     */
    public function getCallForTendersLineReference(): ?CallForTendersLineReference
    {
        return $this->callForTendersLineReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersLineReference
     */
    public function getCallForTendersLineReferenceWithCreate(): CallForTendersLineReference
    {
        $this->callForTendersLineReference = is_null($this->callForTendersLineReference) ? new CallForTendersLineReference() : $this->callForTendersLineReference;

        return $this->callForTendersLineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CallForTendersLineReference|null $callForTendersLineReference
     * @return self
     */
    public function setCallForTendersLineReference(
        ?CallForTendersLineReference $callForTendersLineReference = null,
    ): self {
        $this->callForTendersLineReference = $callForTendersLineReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCallForTendersLineReference(): self
    {
        $this->callForTendersLineReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null
     */
    public function getCallForTendersDocumentReference(): ?CallForTendersDocumentReference
    {
        return $this->callForTendersDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReferenceWithCreate(): CallForTendersDocumentReference
    {
        $this->callForTendersDocumentReference = is_null($this->callForTendersDocumentReference) ? new CallForTendersDocumentReference() : $this->callForTendersDocumentReference;

        return $this->callForTendersDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null $callForTendersDocumentReference
     * @return self
     */
    public function setCallForTendersDocumentReference(
        ?CallForTendersDocumentReference $callForTendersDocumentReference = null,
    ): self {
        $this->callForTendersDocumentReference = $callForTendersDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCallForTendersDocumentReference(): self
    {
        $this->callForTendersDocumentReference = null;

        return $this;
    }
}
