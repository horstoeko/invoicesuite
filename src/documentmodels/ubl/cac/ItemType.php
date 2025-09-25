<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric;

class ItemType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PackQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackQuantity", setter="setPackQuantity")
     */
    private $packQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("PackSizeNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackSizeNumeric", setter="setPackSizeNumeric")
     */
    private $packSizeNumeric;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueIndicator", setter="setCatalogueIndicator")
     */
    private $catalogueIndicator;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalInformation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalInformation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalInformation", setter="setAdditionalInformation")
     */
    private $additionalInformation;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword>")
     * @JMS\Expose
     * @JMS\SerializedName("Keyword")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Keyword", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getKeyword", setter="setKeyword")
     */
    private $keyword;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName>")
     * @JMS\Expose
     * @JMS\SerializedName("BrandName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BrandName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getBrandName", setter="setBrandName")
     */
    private $brandName;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName>")
     * @JMS\Expose
     * @JMS\SerializedName("ModelName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ModelName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getModelName", setter="setModelName")
     */
    private $modelName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyersItemIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\BuyersItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("BuyersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyersItemIdentification", setter="setBuyersItemIdentification")
     */
    private $buyersItemIdentification;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\SellersItemIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\SellersItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("SellersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellersItemIdentification", setter="setSellersItemIdentification")
     */
    private $sellersItemIdentification;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("ManufacturersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ManufacturersItemIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getManufacturersItemIdentification", setter="setManufacturersItemIdentification")
     */
    private $manufacturersItemIdentification;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\StandardItemIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\StandardItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("StandardItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStandardItemIdentification", setter="setStandardItemIdentification")
     */
    private $standardItemIdentification;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueItemIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueItemIdentification", setter="setCatalogueItemIdentification")
     */
    private $catalogueItemIdentification;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemIdentification", setter="setAdditionalItemIdentification")
     */
    private $additionalItemIdentification;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueDocumentReference", setter="setCatalogueDocumentReference")
     */
    private $catalogueDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemSpecificationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemSpecificationDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemSpecificationDocumentReference", setter="setItemSpecificationDocumentReference")
     */
    private $itemSpecificationDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginCountry|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OriginCountry")
     * @JMS\Expose
     * @JMS\SerializedName("OriginCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginCountry", setter="setOriginCountry")
     */
    private $originCountry;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification>")
     * @JMS\Expose
     * @JMS\SerializedName("CommodityClassification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CommodityClassification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCommodityClassification", setter="setCommodityClassification")
     */
    private $commodityClassification;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("TransactionConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransactionConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransactionConditions", setter="setTransactionConditions")
     */
    private $transactionConditions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousItem", setter="setHazardousItem")
     */
    private $hazardousItem;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ClassifiedTaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ClassifiedTaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClassifiedTaxCategory", setter="setClassifiedTaxCategory")
     */
    private $classifiedTaxCategory;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemProperty", setter="setAdditionalItemProperty")
     */
    private $additionalItemProperty;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty>")
     * @JMS\Expose
     * @JMS\SerializedName("ManufacturerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ManufacturerParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getManufacturerParty", setter="setManufacturerParty")
     */
    private $manufacturerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\InformationContentProviderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\InformationContentProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("InformationContentProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInformationContentProviderParty", setter="setInformationContentProviderParty")
     */
    private $informationContentProviderParty;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress>")
     * @JMS\Expose
     * @JMS\SerializedName("OriginAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OriginAddress", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOriginAddress", setter="setOriginAddress")
     */
    private $originAddress;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemInstance")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemInstance", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemInstance", setter="setItemInstance")
     */
    private $itemInstance;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate>")
     * @JMS\Expose
     * @JMS\SerializedName("Certificate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Certificate", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCertificate", setter="setCertificate")
     */
    private $certificate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension>")
     * @JMS\Expose
     * @JMS\SerializedName("Dimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Dimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDimension", setter="setDimension")
     */
    private $dimension;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity|null
     */
    public function getPackQuantity(): ?PackQuantity
    {
        return $this->packQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity
     */
    public function getPackQuantityWithCreate(): PackQuantity
    {
        $this->packQuantity = is_null($this->packQuantity) ? new PackQuantity() : $this->packQuantity;

        return $this->packQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackQuantity|null $packQuantity
     * @return self
     */
    public function setPackQuantity(?PackQuantity $packQuantity = null): self
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackQuantity(): self
    {
        $this->packQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric|null
     */
    public function getPackSizeNumeric(): ?PackSizeNumeric
    {
        return $this->packSizeNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric
     */
    public function getPackSizeNumericWithCreate(): PackSizeNumeric
    {
        $this->packSizeNumeric = is_null($this->packSizeNumeric) ? new PackSizeNumeric() : $this->packSizeNumeric;

        return $this->packSizeNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PackSizeNumeric|null $packSizeNumeric
     * @return self
     */
    public function setPackSizeNumeric(?PackSizeNumeric $packSizeNumeric = null): self
    {
        $this->packSizeNumeric = $packSizeNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackSizeNumeric(): self
    {
        $this->packSizeNumeric = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCatalogueIndicator(): ?bool
    {
        return $this->catalogueIndicator;
    }

    /**
     * @param bool|null $catalogueIndicator
     * @return self
     */
    public function setCatalogueIndicator(?bool $catalogueIndicator = null): self
    {
        $this->catalogueIndicator = $catalogueIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCatalogueIndicator(): self
    {
        $this->catalogueIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param bool|null $hazardousRiskIndicator
     * @return self
     */
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): self
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousRiskIndicator(): self
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation>|null
     */
    public function getAdditionalInformation(): ?array
    {
        return $this->additionalInformation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation>|null $additionalInformation
     * @return self
     */
    public function setAdditionalInformation(?array $additionalInformation = null): self
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalInformation(): self
    {
        $this->additionalInformation = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalInformation(): self
    {
        $this->additionalInformation = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation|null
     */
    public function firstAdditionalInformation(): ?AdditionalInformation
    {
        $additionalInformation = $this->additionalInformation ?? [];
        $additionalInformation = reset($additionalInformation);

        if ($additionalInformation === false) {
            return null;
        }

        return $additionalInformation;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation|null
     */
    public function lastAdditionalInformation(): ?AdditionalInformation
    {
        $additionalInformation = $this->additionalInformation ?? [];
        $additionalInformation = end($additionalInformation);

        if ($additionalInformation === false) {
            return null;
        }

        return $additionalInformation;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation $additionalInformation
     * @return self
     */
    public function addToAdditionalInformation(AdditionalInformation $additionalInformation): self
    {
        $this->additionalInformation[] = $additionalInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation
     */
    public function addToAdditionalInformationWithCreate(): AdditionalInformation
    {
        $this->addToadditionalInformation($additionalInformation = new AdditionalInformation());

        return $additionalInformation;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation $additionalInformation
     * @return self
     */
    public function addOnceToAdditionalInformation(AdditionalInformation $additionalInformation): self
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        $this->additionalInformation[0] = $additionalInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AdditionalInformation
     */
    public function addOnceToAdditionalInformationWithCreate(): AdditionalInformation
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        if ($this->additionalInformation === []) {
            $this->addOnceToadditionalInformation(new AdditionalInformation());
        }

        return $this->additionalInformation[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword>|null
     */
    public function getKeyword(): ?array
    {
        return $this->keyword;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword>|null $keyword
     * @return self
     */
    public function setKeyword(?array $keyword = null): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetKeyword(): self
    {
        $this->keyword = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearKeyword(): self
    {
        $this->keyword = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword|null
     */
    public function firstKeyword(): ?Keyword
    {
        $keyword = $this->keyword ?? [];
        $keyword = reset($keyword);

        if ($keyword === false) {
            return null;
        }

        return $keyword;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword|null
     */
    public function lastKeyword(): ?Keyword
    {
        $keyword = $this->keyword ?? [];
        $keyword = end($keyword);

        if ($keyword === false) {
            return null;
        }

        return $keyword;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword $keyword
     * @return self
     */
    public function addToKeyword(Keyword $keyword): self
    {
        $this->keyword[] = $keyword;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword
     */
    public function addToKeywordWithCreate(): Keyword
    {
        $this->addTokeyword($keyword = new Keyword());

        return $keyword;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword $keyword
     * @return self
     */
    public function addOnceToKeyword(Keyword $keyword): self
    {
        if (!is_array($this->keyword)) {
            $this->keyword = [];
        }

        $this->keyword[0] = $keyword;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Keyword
     */
    public function addOnceToKeywordWithCreate(): Keyword
    {
        if (!is_array($this->keyword)) {
            $this->keyword = [];
        }

        if ($this->keyword === []) {
            $this->addOnceTokeyword(new Keyword());
        }

        return $this->keyword[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName>|null
     */
    public function getBrandName(): ?array
    {
        return $this->brandName;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName>|null $brandName
     * @return self
     */
    public function setBrandName(?array $brandName = null): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBrandName(): self
    {
        $this->brandName = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBrandName(): self
    {
        $this->brandName = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName|null
     */
    public function firstBrandName(): ?BrandName
    {
        $brandName = $this->brandName ?? [];
        $brandName = reset($brandName);

        if ($brandName === false) {
            return null;
        }

        return $brandName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName|null
     */
    public function lastBrandName(): ?BrandName
    {
        $brandName = $this->brandName ?? [];
        $brandName = end($brandName);

        if ($brandName === false) {
            return null;
        }

        return $brandName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName $brandName
     * @return self
     */
    public function addToBrandName(BrandName $brandName): self
    {
        $this->brandName[] = $brandName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName
     */
    public function addToBrandNameWithCreate(): BrandName
    {
        $this->addTobrandName($brandName = new BrandName());

        return $brandName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName $brandName
     * @return self
     */
    public function addOnceToBrandName(BrandName $brandName): self
    {
        if (!is_array($this->brandName)) {
            $this->brandName = [];
        }

        $this->brandName[0] = $brandName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrandName
     */
    public function addOnceToBrandNameWithCreate(): BrandName
    {
        if (!is_array($this->brandName)) {
            $this->brandName = [];
        }

        if ($this->brandName === []) {
            $this->addOnceTobrandName(new BrandName());
        }

        return $this->brandName[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName>|null
     */
    public function getModelName(): ?array
    {
        return $this->modelName;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName>|null $modelName
     * @return self
     */
    public function setModelName(?array $modelName = null): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetModelName(): self
    {
        $this->modelName = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearModelName(): self
    {
        $this->modelName = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName|null
     */
    public function firstModelName(): ?ModelName
    {
        $modelName = $this->modelName ?? [];
        $modelName = reset($modelName);

        if ($modelName === false) {
            return null;
        }

        return $modelName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName|null
     */
    public function lastModelName(): ?ModelName
    {
        $modelName = $this->modelName ?? [];
        $modelName = end($modelName);

        if ($modelName === false) {
            return null;
        }

        return $modelName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName $modelName
     * @return self
     */
    public function addToModelName(ModelName $modelName): self
    {
        $this->modelName[] = $modelName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName
     */
    public function addToModelNameWithCreate(): ModelName
    {
        $this->addTomodelName($modelName = new ModelName());

        return $modelName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName $modelName
     * @return self
     */
    public function addOnceToModelName(ModelName $modelName): self
    {
        if (!is_array($this->modelName)) {
            $this->modelName = [];
        }

        $this->modelName[0] = $modelName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ModelName
     */
    public function addOnceToModelNameWithCreate(): ModelName
    {
        if (!is_array($this->modelName)) {
            $this->modelName = [];
        }

        if ($this->modelName === []) {
            $this->addOnceTomodelName(new ModelName());
        }

        return $this->modelName[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyersItemIdentification|null
     */
    public function getBuyersItemIdentification(): ?BuyersItemIdentification
    {
        return $this->buyersItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyersItemIdentification
     */
    public function getBuyersItemIdentificationWithCreate(): BuyersItemIdentification
    {
        $this->buyersItemIdentification = is_null($this->buyersItemIdentification) ? new BuyersItemIdentification() : $this->buyersItemIdentification;

        return $this->buyersItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyersItemIdentification|null $buyersItemIdentification
     * @return self
     */
    public function setBuyersItemIdentification(?BuyersItemIdentification $buyersItemIdentification = null): self
    {
        $this->buyersItemIdentification = $buyersItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuyersItemIdentification(): self
    {
        $this->buyersItemIdentification = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellersItemIdentification|null
     */
    public function getSellersItemIdentification(): ?SellersItemIdentification
    {
        return $this->sellersItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellersItemIdentification
     */
    public function getSellersItemIdentificationWithCreate(): SellersItemIdentification
    {
        $this->sellersItemIdentification = is_null($this->sellersItemIdentification) ? new SellersItemIdentification() : $this->sellersItemIdentification;

        return $this->sellersItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SellersItemIdentification|null $sellersItemIdentification
     * @return self
     */
    public function setSellersItemIdentification(?SellersItemIdentification $sellersItemIdentification = null): self
    {
        $this->sellersItemIdentification = $sellersItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSellersItemIdentification(): self
    {
        $this->sellersItemIdentification = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification>|null
     */
    public function getManufacturersItemIdentification(): ?array
    {
        return $this->manufacturersItemIdentification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification>|null $manufacturersItemIdentification
     * @return self
     */
    public function setManufacturersItemIdentification(?array $manufacturersItemIdentification = null): self
    {
        $this->manufacturersItemIdentification = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetManufacturersItemIdentification(): self
    {
        $this->manufacturersItemIdentification = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearManufacturersItemIdentification(): self
    {
        $this->manufacturersItemIdentification = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification|null
     */
    public function firstManufacturersItemIdentification(): ?ManufacturersItemIdentification
    {
        $manufacturersItemIdentification = $this->manufacturersItemIdentification ?? [];
        $manufacturersItemIdentification = reset($manufacturersItemIdentification);

        if ($manufacturersItemIdentification === false) {
            return null;
        }

        return $manufacturersItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification|null
     */
    public function lastManufacturersItemIdentification(): ?ManufacturersItemIdentification
    {
        $manufacturersItemIdentification = $this->manufacturersItemIdentification ?? [];
        $manufacturersItemIdentification = end($manufacturersItemIdentification);

        if ($manufacturersItemIdentification === false) {
            return null;
        }

        return $manufacturersItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification $manufacturersItemIdentification
     * @return self
     */
    public function addToManufacturersItemIdentification(
        ManufacturersItemIdentification $manufacturersItemIdentification,
    ): self {
        $this->manufacturersItemIdentification[] = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification
     */
    public function addToManufacturersItemIdentificationWithCreate(): ManufacturersItemIdentification
    {
        $this->addTomanufacturersItemIdentification($manufacturersItemIdentification = new ManufacturersItemIdentification());

        return $manufacturersItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification $manufacturersItemIdentification
     * @return self
     */
    public function addOnceToManufacturersItemIdentification(
        ManufacturersItemIdentification $manufacturersItemIdentification,
    ): self {
        if (!is_array($this->manufacturersItemIdentification)) {
            $this->manufacturersItemIdentification = [];
        }

        $this->manufacturersItemIdentification[0] = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturersItemIdentification
     */
    public function addOnceToManufacturersItemIdentificationWithCreate(): ManufacturersItemIdentification
    {
        if (!is_array($this->manufacturersItemIdentification)) {
            $this->manufacturersItemIdentification = [];
        }

        if ($this->manufacturersItemIdentification === []) {
            $this->addOnceTomanufacturersItemIdentification(new ManufacturersItemIdentification());
        }

        return $this->manufacturersItemIdentification[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StandardItemIdentification|null
     */
    public function getStandardItemIdentification(): ?StandardItemIdentification
    {
        return $this->standardItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StandardItemIdentification
     */
    public function getStandardItemIdentificationWithCreate(): StandardItemIdentification
    {
        $this->standardItemIdentification = is_null($this->standardItemIdentification) ? new StandardItemIdentification() : $this->standardItemIdentification;

        return $this->standardItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\StandardItemIdentification|null $standardItemIdentification
     * @return self
     */
    public function setStandardItemIdentification(
        ?StandardItemIdentification $standardItemIdentification = null,
    ): self {
        $this->standardItemIdentification = $standardItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStandardItemIdentification(): self
    {
        $this->standardItemIdentification = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueItemIdentification|null
     */
    public function getCatalogueItemIdentification(): ?CatalogueItemIdentification
    {
        return $this->catalogueItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueItemIdentification
     */
    public function getCatalogueItemIdentificationWithCreate(): CatalogueItemIdentification
    {
        $this->catalogueItemIdentification = is_null($this->catalogueItemIdentification) ? new CatalogueItemIdentification() : $this->catalogueItemIdentification;

        return $this->catalogueItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueItemIdentification|null $catalogueItemIdentification
     * @return self
     */
    public function setCatalogueItemIdentification(
        ?CatalogueItemIdentification $catalogueItemIdentification = null,
    ): self {
        $this->catalogueItemIdentification = $catalogueItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCatalogueItemIdentification(): self
    {
        $this->catalogueItemIdentification = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification>|null
     */
    public function getAdditionalItemIdentification(): ?array
    {
        return $this->additionalItemIdentification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification>|null $additionalItemIdentification
     * @return self
     */
    public function setAdditionalItemIdentification(?array $additionalItemIdentification = null): self
    {
        $this->additionalItemIdentification = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalItemIdentification(): self
    {
        $this->additionalItemIdentification = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalItemIdentification(): self
    {
        $this->additionalItemIdentification = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification|null
     */
    public function firstAdditionalItemIdentification(): ?AdditionalItemIdentification
    {
        $additionalItemIdentification = $this->additionalItemIdentification ?? [];
        $additionalItemIdentification = reset($additionalItemIdentification);

        if ($additionalItemIdentification === false) {
            return null;
        }

        return $additionalItemIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification|null
     */
    public function lastAdditionalItemIdentification(): ?AdditionalItemIdentification
    {
        $additionalItemIdentification = $this->additionalItemIdentification ?? [];
        $additionalItemIdentification = end($additionalItemIdentification);

        if ($additionalItemIdentification === false) {
            return null;
        }

        return $additionalItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification $additionalItemIdentification
     * @return self
     */
    public function addToAdditionalItemIdentification(
        AdditionalItemIdentification $additionalItemIdentification,
    ): self {
        $this->additionalItemIdentification[] = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification
     */
    public function addToAdditionalItemIdentificationWithCreate(): AdditionalItemIdentification
    {
        $this->addToadditionalItemIdentification($additionalItemIdentification = new AdditionalItemIdentification());

        return $additionalItemIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification $additionalItemIdentification
     * @return self
     */
    public function addOnceToAdditionalItemIdentification(
        AdditionalItemIdentification $additionalItemIdentification,
    ): self {
        if (!is_array($this->additionalItemIdentification)) {
            $this->additionalItemIdentification = [];
        }

        $this->additionalItemIdentification[0] = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemIdentification
     */
    public function addOnceToAdditionalItemIdentificationWithCreate(): AdditionalItemIdentification
    {
        if (!is_array($this->additionalItemIdentification)) {
            $this->additionalItemIdentification = [];
        }

        if ($this->additionalItemIdentification === []) {
            $this->addOnceToadditionalItemIdentification(new AdditionalItemIdentification());
        }

        return $this->additionalItemIdentification[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueDocumentReference|null
     */
    public function getCatalogueDocumentReference(): ?CatalogueDocumentReference
    {
        return $this->catalogueDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueDocumentReference
     */
    public function getCatalogueDocumentReferenceWithCreate(): CatalogueDocumentReference
    {
        $this->catalogueDocumentReference = is_null($this->catalogueDocumentReference) ? new CatalogueDocumentReference() : $this->catalogueDocumentReference;

        return $this->catalogueDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CatalogueDocumentReference|null $catalogueDocumentReference
     * @return self
     */
    public function setCatalogueDocumentReference(
        ?CatalogueDocumentReference $catalogueDocumentReference = null,
    ): self {
        $this->catalogueDocumentReference = $catalogueDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCatalogueDocumentReference(): self
    {
        $this->catalogueDocumentReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference>|null
     */
    public function getItemSpecificationDocumentReference(): ?array
    {
        return $this->itemSpecificationDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference>|null $itemSpecificationDocumentReference
     * @return self
     */
    public function setItemSpecificationDocumentReference(?array $itemSpecificationDocumentReference = null): self
    {
        $this->itemSpecificationDocumentReference = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemSpecificationDocumentReference(): self
    {
        $this->itemSpecificationDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItemSpecificationDocumentReference(): self
    {
        $this->itemSpecificationDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference|null
     */
    public function firstItemSpecificationDocumentReference(): ?ItemSpecificationDocumentReference
    {
        $itemSpecificationDocumentReference = $this->itemSpecificationDocumentReference ?? [];
        $itemSpecificationDocumentReference = reset($itemSpecificationDocumentReference);

        if ($itemSpecificationDocumentReference === false) {
            return null;
        }

        return $itemSpecificationDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference|null
     */
    public function lastItemSpecificationDocumentReference(): ?ItemSpecificationDocumentReference
    {
        $itemSpecificationDocumentReference = $this->itemSpecificationDocumentReference ?? [];
        $itemSpecificationDocumentReference = end($itemSpecificationDocumentReference);

        if ($itemSpecificationDocumentReference === false) {
            return null;
        }

        return $itemSpecificationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference $itemSpecificationDocumentReference
     * @return self
     */
    public function addToItemSpecificationDocumentReference(
        ItemSpecificationDocumentReference $itemSpecificationDocumentReference,
    ): self {
        $this->itemSpecificationDocumentReference[] = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference
     */
    public function addToItemSpecificationDocumentReferenceWithCreate(): ItemSpecificationDocumentReference
    {
        $this->addToitemSpecificationDocumentReference($itemSpecificationDocumentReference = new ItemSpecificationDocumentReference());

        return $itemSpecificationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference $itemSpecificationDocumentReference
     * @return self
     */
    public function addOnceToItemSpecificationDocumentReference(
        ItemSpecificationDocumentReference $itemSpecificationDocumentReference,
    ): self {
        if (!is_array($this->itemSpecificationDocumentReference)) {
            $this->itemSpecificationDocumentReference = [];
        }

        $this->itemSpecificationDocumentReference[0] = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemSpecificationDocumentReference
     */
    public function addOnceToItemSpecificationDocumentReferenceWithCreate(): ItemSpecificationDocumentReference
    {
        if (!is_array($this->itemSpecificationDocumentReference)) {
            $this->itemSpecificationDocumentReference = [];
        }

        if ($this->itemSpecificationDocumentReference === []) {
            $this->addOnceToitemSpecificationDocumentReference(new ItemSpecificationDocumentReference());
        }

        return $this->itemSpecificationDocumentReference[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginCountry|null
     */
    public function getOriginCountry(): ?OriginCountry
    {
        return $this->originCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginCountry
     */
    public function getOriginCountryWithCreate(): OriginCountry
    {
        $this->originCountry = is_null($this->originCountry) ? new OriginCountry() : $this->originCountry;

        return $this->originCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginCountry|null $originCountry
     * @return self
     */
    public function setOriginCountry(?OriginCountry $originCountry = null): self
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginCountry(): self
    {
        $this->originCountry = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification>|null
     */
    public function getCommodityClassification(): ?array
    {
        return $this->commodityClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification>|null $commodityClassification
     * @return self
     */
    public function setCommodityClassification(?array $commodityClassification = null): self
    {
        $this->commodityClassification = $commodityClassification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCommodityClassification(): self
    {
        $this->commodityClassification = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCommodityClassification(): self
    {
        $this->commodityClassification = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification|null
     */
    public function firstCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = reset($commodityClassification);

        if ($commodityClassification === false) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification|null
     */
    public function lastCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = end($commodityClassification);

        if ($commodityClassification === false) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification $commodityClassification
     * @return self
     */
    public function addToCommodityClassification(CommodityClassification $commodityClassification): self
    {
        $this->commodityClassification[] = $commodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification
     */
    public function addToCommodityClassificationWithCreate(): CommodityClassification
    {
        $this->addTocommodityClassification($commodityClassification = new CommodityClassification());

        return $commodityClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification $commodityClassification
     * @return self
     */
    public function addOnceToCommodityClassification(CommodityClassification $commodityClassification): self
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        $this->commodityClassification[0] = $commodityClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommodityClassification
     */
    public function addOnceToCommodityClassificationWithCreate(): CommodityClassification
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        if ($this->commodityClassification === []) {
            $this->addOnceTocommodityClassification(new CommodityClassification());
        }

        return $this->commodityClassification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions>|null
     */
    public function getTransactionConditions(): ?array
    {
        return $this->transactionConditions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions>|null $transactionConditions
     * @return self
     */
    public function setTransactionConditions(?array $transactionConditions = null): self
    {
        $this->transactionConditions = $transactionConditions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransactionConditions(): self
    {
        $this->transactionConditions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransactionConditions(): self
    {
        $this->transactionConditions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions|null
     */
    public function firstTransactionConditions(): ?TransactionConditions
    {
        $transactionConditions = $this->transactionConditions ?? [];
        $transactionConditions = reset($transactionConditions);

        if ($transactionConditions === false) {
            return null;
        }

        return $transactionConditions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions|null
     */
    public function lastTransactionConditions(): ?TransactionConditions
    {
        $transactionConditions = $this->transactionConditions ?? [];
        $transactionConditions = end($transactionConditions);

        if ($transactionConditions === false) {
            return null;
        }

        return $transactionConditions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions $transactionConditions
     * @return self
     */
    public function addToTransactionConditions(TransactionConditions $transactionConditions): self
    {
        $this->transactionConditions[] = $transactionConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions
     */
    public function addToTransactionConditionsWithCreate(): TransactionConditions
    {
        $this->addTotransactionConditions($transactionConditions = new TransactionConditions());

        return $transactionConditions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions $transactionConditions
     * @return self
     */
    public function addOnceToTransactionConditions(TransactionConditions $transactionConditions): self
    {
        if (!is_array($this->transactionConditions)) {
            $this->transactionConditions = [];
        }

        $this->transactionConditions[0] = $transactionConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransactionConditions
     */
    public function addOnceToTransactionConditionsWithCreate(): TransactionConditions
    {
        if (!is_array($this->transactionConditions)) {
            $this->transactionConditions = [];
        }

        if ($this->transactionConditions === []) {
            $this->addOnceTotransactionConditions(new TransactionConditions());
        }

        return $this->transactionConditions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem>|null
     */
    public function getHazardousItem(): ?array
    {
        return $this->hazardousItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem>|null $hazardousItem
     * @return self
     */
    public function setHazardousItem(?array $hazardousItem = null): self
    {
        $this->hazardousItem = $hazardousItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousItem(): self
    {
        $this->hazardousItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHazardousItem(): self
    {
        $this->hazardousItem = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem|null
     */
    public function firstHazardousItem(): ?HazardousItem
    {
        $hazardousItem = $this->hazardousItem ?? [];
        $hazardousItem = reset($hazardousItem);

        if ($hazardousItem === false) {
            return null;
        }

        return $hazardousItem;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem|null
     */
    public function lastHazardousItem(): ?HazardousItem
    {
        $hazardousItem = $this->hazardousItem ?? [];
        $hazardousItem = end($hazardousItem);

        if ($hazardousItem === false) {
            return null;
        }

        return $hazardousItem;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem $hazardousItem
     * @return self
     */
    public function addToHazardousItem(HazardousItem $hazardousItem): self
    {
        $this->hazardousItem[] = $hazardousItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem
     */
    public function addToHazardousItemWithCreate(): HazardousItem
    {
        $this->addTohazardousItem($hazardousItem = new HazardousItem());

        return $hazardousItem;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem $hazardousItem
     * @return self
     */
    public function addOnceToHazardousItem(HazardousItem $hazardousItem): self
    {
        if (!is_array($this->hazardousItem)) {
            $this->hazardousItem = [];
        }

        $this->hazardousItem[0] = $hazardousItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItem
     */
    public function addOnceToHazardousItemWithCreate(): HazardousItem
    {
        if (!is_array($this->hazardousItem)) {
            $this->hazardousItem = [];
        }

        if ($this->hazardousItem === []) {
            $this->addOnceTohazardousItem(new HazardousItem());
        }

        return $this->hazardousItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory>|null
     */
    public function getClassifiedTaxCategory(): ?array
    {
        return $this->classifiedTaxCategory;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory>|null $classifiedTaxCategory
     * @return self
     */
    public function setClassifiedTaxCategory(?array $classifiedTaxCategory = null): self
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClassifiedTaxCategory(): self
    {
        $this->classifiedTaxCategory = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearClassifiedTaxCategory(): self
    {
        $this->classifiedTaxCategory = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory|null
     */
    public function firstClassifiedTaxCategory(): ?ClassifiedTaxCategory
    {
        $classifiedTaxCategory = $this->classifiedTaxCategory ?? [];
        $classifiedTaxCategory = reset($classifiedTaxCategory);

        if ($classifiedTaxCategory === false) {
            return null;
        }

        return $classifiedTaxCategory;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory|null
     */
    public function lastClassifiedTaxCategory(): ?ClassifiedTaxCategory
    {
        $classifiedTaxCategory = $this->classifiedTaxCategory ?? [];
        $classifiedTaxCategory = end($classifiedTaxCategory);

        if ($classifiedTaxCategory === false) {
            return null;
        }

        return $classifiedTaxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory $classifiedTaxCategory
     * @return self
     */
    public function addToClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory): self
    {
        $this->classifiedTaxCategory[] = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory
     */
    public function addToClassifiedTaxCategoryWithCreate(): ClassifiedTaxCategory
    {
        $this->addToclassifiedTaxCategory($classifiedTaxCategory = new ClassifiedTaxCategory());

        return $classifiedTaxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory $classifiedTaxCategory
     * @return self
     */
    public function addOnceToClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory): self
    {
        if (!is_array($this->classifiedTaxCategory)) {
            $this->classifiedTaxCategory = [];
        }

        $this->classifiedTaxCategory[0] = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassifiedTaxCategory
     */
    public function addOnceToClassifiedTaxCategoryWithCreate(): ClassifiedTaxCategory
    {
        if (!is_array($this->classifiedTaxCategory)) {
            $this->classifiedTaxCategory = [];
        }

        if ($this->classifiedTaxCategory === []) {
            $this->addOnceToclassifiedTaxCategory(new ClassifiedTaxCategory());
        }

        return $this->classifiedTaxCategory[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null
     */
    public function getAdditionalItemProperty(): ?array
    {
        return $this->additionalItemProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null $additionalItemProperty
     * @return self
     */
    public function setAdditionalItemProperty(?array $additionalItemProperty = null): self
    {
        $this->additionalItemProperty = $additionalItemProperty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalItemProperty(): self
    {
        $this->additionalItemProperty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalItemProperty(): self
    {
        $this->additionalItemProperty = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty|null
     */
    public function firstAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = reset($additionalItemProperty);

        if ($additionalItemProperty === false) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty|null
     */
    public function lastAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = end($additionalItemProperty);

        if ($additionalItemProperty === false) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty $additionalItemProperty
     * @return self
     */
    public function addToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): self
    {
        $this->additionalItemProperty[] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty
     */
    public function addToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        $this->addToadditionalItemProperty($additionalItemProperty = new AdditionalItemProperty());

        return $additionalItemProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty $additionalItemProperty
     * @return self
     */
    public function addOnceToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): self
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        $this->additionalItemProperty[0] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty
     */
    public function addOnceToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        if ($this->additionalItemProperty === []) {
            $this->addOnceToadditionalItemProperty(new AdditionalItemProperty());
        }

        return $this->additionalItemProperty[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty>|null
     */
    public function getManufacturerParty(): ?array
    {
        return $this->manufacturerParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty>|null $manufacturerParty
     * @return self
     */
    public function setManufacturerParty(?array $manufacturerParty = null): self
    {
        $this->manufacturerParty = $manufacturerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetManufacturerParty(): self
    {
        $this->manufacturerParty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearManufacturerParty(): self
    {
        $this->manufacturerParty = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty|null
     */
    public function firstManufacturerParty(): ?ManufacturerParty
    {
        $manufacturerParty = $this->manufacturerParty ?? [];
        $manufacturerParty = reset($manufacturerParty);

        if ($manufacturerParty === false) {
            return null;
        }

        return $manufacturerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty|null
     */
    public function lastManufacturerParty(): ?ManufacturerParty
    {
        $manufacturerParty = $this->manufacturerParty ?? [];
        $manufacturerParty = end($manufacturerParty);

        if ($manufacturerParty === false) {
            return null;
        }

        return $manufacturerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty $manufacturerParty
     * @return self
     */
    public function addToManufacturerParty(ManufacturerParty $manufacturerParty): self
    {
        $this->manufacturerParty[] = $manufacturerParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty
     */
    public function addToManufacturerPartyWithCreate(): ManufacturerParty
    {
        $this->addTomanufacturerParty($manufacturerParty = new ManufacturerParty());

        return $manufacturerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty $manufacturerParty
     * @return self
     */
    public function addOnceToManufacturerParty(ManufacturerParty $manufacturerParty): self
    {
        if (!is_array($this->manufacturerParty)) {
            $this->manufacturerParty = [];
        }

        $this->manufacturerParty[0] = $manufacturerParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ManufacturerParty
     */
    public function addOnceToManufacturerPartyWithCreate(): ManufacturerParty
    {
        if (!is_array($this->manufacturerParty)) {
            $this->manufacturerParty = [];
        }

        if ($this->manufacturerParty === []) {
            $this->addOnceTomanufacturerParty(new ManufacturerParty());
        }

        return $this->manufacturerParty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InformationContentProviderParty|null
     */
    public function getInformationContentProviderParty(): ?InformationContentProviderParty
    {
        return $this->informationContentProviderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InformationContentProviderParty
     */
    public function getInformationContentProviderPartyWithCreate(): InformationContentProviderParty
    {
        $this->informationContentProviderParty = is_null($this->informationContentProviderParty) ? new InformationContentProviderParty() : $this->informationContentProviderParty;

        return $this->informationContentProviderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InformationContentProviderParty|null $informationContentProviderParty
     * @return self
     */
    public function setInformationContentProviderParty(
        ?InformationContentProviderParty $informationContentProviderParty = null,
    ): self {
        $this->informationContentProviderParty = $informationContentProviderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInformationContentProviderParty(): self
    {
        $this->informationContentProviderParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress>|null
     */
    public function getOriginAddress(): ?array
    {
        return $this->originAddress;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress>|null $originAddress
     * @return self
     */
    public function setOriginAddress(?array $originAddress = null): self
    {
        $this->originAddress = $originAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginAddress(): self
    {
        $this->originAddress = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOriginAddress(): self
    {
        $this->originAddress = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress|null
     */
    public function firstOriginAddress(): ?OriginAddress
    {
        $originAddress = $this->originAddress ?? [];
        $originAddress = reset($originAddress);

        if ($originAddress === false) {
            return null;
        }

        return $originAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress|null
     */
    public function lastOriginAddress(): ?OriginAddress
    {
        $originAddress = $this->originAddress ?? [];
        $originAddress = end($originAddress);

        if ($originAddress === false) {
            return null;
        }

        return $originAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress $originAddress
     * @return self
     */
    public function addToOriginAddress(OriginAddress $originAddress): self
    {
        $this->originAddress[] = $originAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress
     */
    public function addToOriginAddressWithCreate(): OriginAddress
    {
        $this->addTooriginAddress($originAddress = new OriginAddress());

        return $originAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress $originAddress
     * @return self
     */
    public function addOnceToOriginAddress(OriginAddress $originAddress): self
    {
        if (!is_array($this->originAddress)) {
            $this->originAddress = [];
        }

        $this->originAddress[0] = $originAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginAddress
     */
    public function addOnceToOriginAddressWithCreate(): OriginAddress
    {
        if (!is_array($this->originAddress)) {
            $this->originAddress = [];
        }

        if ($this->originAddress === []) {
            $this->addOnceTooriginAddress(new OriginAddress());
        }

        return $this->originAddress[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance>|null
     */
    public function getItemInstance(): ?array
    {
        return $this->itemInstance;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance>|null $itemInstance
     * @return self
     */
    public function setItemInstance(?array $itemInstance = null): self
    {
        $this->itemInstance = $itemInstance;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemInstance(): self
    {
        $this->itemInstance = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItemInstance(): self
    {
        $this->itemInstance = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance|null
     */
    public function firstItemInstance(): ?ItemInstance
    {
        $itemInstance = $this->itemInstance ?? [];
        $itemInstance = reset($itemInstance);

        if ($itemInstance === false) {
            return null;
        }

        return $itemInstance;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance|null
     */
    public function lastItemInstance(): ?ItemInstance
    {
        $itemInstance = $this->itemInstance ?? [];
        $itemInstance = end($itemInstance);

        if ($itemInstance === false) {
            return null;
        }

        return $itemInstance;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance $itemInstance
     * @return self
     */
    public function addToItemInstance(ItemInstance $itemInstance): self
    {
        $this->itemInstance[] = $itemInstance;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance
     */
    public function addToItemInstanceWithCreate(): ItemInstance
    {
        $this->addToitemInstance($itemInstance = new ItemInstance());

        return $itemInstance;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance $itemInstance
     * @return self
     */
    public function addOnceToItemInstance(ItemInstance $itemInstance): self
    {
        if (!is_array($this->itemInstance)) {
            $this->itemInstance = [];
        }

        $this->itemInstance[0] = $itemInstance;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ItemInstance
     */
    public function addOnceToItemInstanceWithCreate(): ItemInstance
    {
        if (!is_array($this->itemInstance)) {
            $this->itemInstance = [];
        }

        if ($this->itemInstance === []) {
            $this->addOnceToitemInstance(new ItemInstance());
        }

        return $this->itemInstance[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate>|null
     */
    public function getCertificate(): ?array
    {
        return $this->certificate;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate>|null $certificate
     * @return self
     */
    public function setCertificate(?array $certificate = null): self
    {
        $this->certificate = $certificate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCertificate(): self
    {
        $this->certificate = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCertificate(): self
    {
        $this->certificate = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate|null
     */
    public function firstCertificate(): ?Certificate
    {
        $certificate = $this->certificate ?? [];
        $certificate = reset($certificate);

        if ($certificate === false) {
            return null;
        }

        return $certificate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate|null
     */
    public function lastCertificate(): ?Certificate
    {
        $certificate = $this->certificate ?? [];
        $certificate = end($certificate);

        if ($certificate === false) {
            return null;
        }

        return $certificate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate $certificate
     * @return self
     */
    public function addToCertificate(Certificate $certificate): self
    {
        $this->certificate[] = $certificate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate
     */
    public function addToCertificateWithCreate(): Certificate
    {
        $this->addTocertificate($certificate = new Certificate());

        return $certificate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate $certificate
     * @return self
     */
    public function addOnceToCertificate(Certificate $certificate): self
    {
        if (!is_array($this->certificate)) {
            $this->certificate = [];
        }

        $this->certificate[0] = $certificate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Certificate
     */
    public function addOnceToCertificateWithCreate(): Certificate
    {
        if (!is_array($this->certificate)) {
            $this->certificate = [];
        }

        if ($this->certificate === []) {
            $this->addOnceTocertificate(new Certificate());
        }

        return $this->certificate[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension>|null
     */
    public function getDimension(): ?array
    {
        return $this->dimension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension>|null $dimension
     * @return self
     */
    public function setDimension(?array $dimension = null): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDimension(): self
    {
        $this->dimension = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDimension(): self
    {
        $this->dimension = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension|null
     */
    public function firstDimension(): ?Dimension
    {
        $dimension = $this->dimension ?? [];
        $dimension = reset($dimension);

        if ($dimension === false) {
            return null;
        }

        return $dimension;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension|null
     */
    public function lastDimension(): ?Dimension
    {
        $dimension = $this->dimension ?? [];
        $dimension = end($dimension);

        if ($dimension === false) {
            return null;
        }

        return $dimension;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension $dimension
     * @return self
     */
    public function addToDimension(Dimension $dimension): self
    {
        $this->dimension[] = $dimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension
     */
    public function addToDimensionWithCreate(): Dimension
    {
        $this->addTodimension($dimension = new Dimension());

        return $dimension;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension $dimension
     * @return self
     */
    public function addOnceToDimension(Dimension $dimension): self
    {
        if (!is_array($this->dimension)) {
            $this->dimension = [];
        }

        $this->dimension[0] = $dimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Dimension
     */
    public function addOnceToDimensionWithCreate(): Dimension
    {
        if (!is_array($this->dimension)) {
            $this->dimension = [];
        }

        if ($this->dimension === []) {
            $this->addOnceTodimension(new Dimension());
        }

        return $this->dimension[0];
    }
}
