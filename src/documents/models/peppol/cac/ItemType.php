<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AdditionalInformation;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BrandName;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Keyword;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ModelName;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PackQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PackSizeNumeric;
use JMS\Serializer\Annotation as JMS;

class ItemType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|PackQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PackQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PackQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackQuantity", setter="setPackQuantity")
     */
    private $packQuantity;

    /**
     * @var null|PackSizeNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PackSizeNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("PackSizeNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackSizeNumeric", setter="setPackSizeNumeric")
     */
    private $packSizeNumeric;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueIndicator", setter="setCatalogueIndicator")
     */
    private $catalogueIndicator;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @var null|array<AdditionalInformation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\AdditionalInformation>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalInformation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalInformation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalInformation", setter="setAdditionalInformation")
     */
    private $additionalInformation;

    /**
     * @var null|array<Keyword>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Keyword>")
     * @JMS\Expose
     * @JMS\SerializedName("Keyword")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Keyword", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getKeyword", setter="setKeyword")
     */
    private $keyword;

    /**
     * @var null|array<BrandName>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\BrandName>")
     * @JMS\Expose
     * @JMS\SerializedName("BrandName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BrandName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getBrandName", setter="setBrandName")
     */
    private $brandName;

    /**
     * @var null|array<ModelName>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ModelName>")
     * @JMS\Expose
     * @JMS\SerializedName("ModelName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ModelName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getModelName", setter="setModelName")
     */
    private $modelName;

    /**
     * @var null|BuyersItemIdentification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\BuyersItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("BuyersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyersItemIdentification", setter="setBuyersItemIdentification")
     */
    private $buyersItemIdentification;

    /**
     * @var null|SellersItemIdentification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SellersItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("SellersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellersItemIdentification", setter="setSellersItemIdentification")
     */
    private $sellersItemIdentification;

    /**
     * @var null|array<ManufacturersItemIdentification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ManufacturersItemIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("ManufacturersItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ManufacturersItemIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getManufacturersItemIdentification", setter="setManufacturersItemIdentification")
     */
    private $manufacturersItemIdentification;

    /**
     * @var null|StandardItemIdentification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\StandardItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("StandardItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStandardItemIdentification", setter="setStandardItemIdentification")
     */
    private $standardItemIdentification;

    /**
     * @var null|CatalogueItemIdentification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\CatalogueItemIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueItemIdentification", setter="setCatalogueItemIdentification")
     */
    private $catalogueItemIdentification;

    /**
     * @var null|array<AdditionalItemIdentification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalItemIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemIdentification", setter="setAdditionalItemIdentification")
     */
    private $additionalItemIdentification;

    /**
     * @var null|CatalogueDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\CatalogueDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueDocumentReference", setter="setCatalogueDocumentReference")
     */
    private $catalogueDocumentReference;

    /**
     * @var null|array<ItemSpecificationDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ItemSpecificationDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemSpecificationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemSpecificationDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemSpecificationDocumentReference", setter="setItemSpecificationDocumentReference")
     */
    private $itemSpecificationDocumentReference;

    /**
     * @var null|OriginCountry
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OriginCountry")
     * @JMS\Expose
     * @JMS\SerializedName("OriginCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginCountry", setter="setOriginCountry")
     */
    private $originCountry;

    /**
     * @var null|array<CommodityClassification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\CommodityClassification>")
     * @JMS\Expose
     * @JMS\SerializedName("CommodityClassification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CommodityClassification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCommodityClassification", setter="setCommodityClassification")
     */
    private $commodityClassification;

    /**
     * @var null|array<TransactionConditions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransactionConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("TransactionConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransactionConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransactionConditions", setter="setTransactionConditions")
     */
    private $transactionConditions;

    /**
     * @var null|array<HazardousItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\HazardousItem>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousItem", setter="setHazardousItem")
     */
    private $hazardousItem;

    /**
     * @var null|array<ClassifiedTaxCategory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ClassifiedTaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ClassifiedTaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ClassifiedTaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClassifiedTaxCategory", setter="setClassifiedTaxCategory")
     */
    private $classifiedTaxCategory;

    /**
     * @var null|array<AdditionalItemProperty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemProperty", setter="setAdditionalItemProperty")
     */
    private $additionalItemProperty;

    /**
     * @var null|array<ManufacturerParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ManufacturerParty>")
     * @JMS\Expose
     * @JMS\SerializedName("ManufacturerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ManufacturerParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getManufacturerParty", setter="setManufacturerParty")
     */
    private $manufacturerParty;

    /**
     * @var null|InformationContentProviderParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\InformationContentProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("InformationContentProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInformationContentProviderParty", setter="setInformationContentProviderParty")
     */
    private $informationContentProviderParty;

    /**
     * @var null|array<OriginAddress>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\OriginAddress>")
     * @JMS\Expose
     * @JMS\SerializedName("OriginAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OriginAddress", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOriginAddress", setter="setOriginAddress")
     */
    private $originAddress;

    /**
     * @var null|array<ItemInstance>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ItemInstance>")
     * @JMS\Expose
     * @JMS\SerializedName("ItemInstance")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ItemInstance", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItemInstance", setter="setItemInstance")
     */
    private $itemInstance;

    /**
     * @var null|array<Certificate>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Certificate>")
     * @JMS\Expose
     * @JMS\SerializedName("Certificate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Certificate", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCertificate", setter="setCertificate")
     */
    private $certificate;

    /**
     * @var null|array<Dimension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Dimension>")
     * @JMS\Expose
     * @JMS\SerializedName("Dimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Dimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDimension", setter="setDimension")
     */
    private $dimension;

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|PackQuantity
     */
    public function getPackQuantity(): ?PackQuantity
    {
        return $this->packQuantity;
    }

    /**
     * @return PackQuantity
     */
    public function getPackQuantityWithCreate(): PackQuantity
    {
        $this->packQuantity = is_null($this->packQuantity) ? new PackQuantity() : $this->packQuantity;

        return $this->packQuantity;
    }

    /**
     * @param  null|PackQuantity $packQuantity
     * @return static
     */
    public function setPackQuantity(?PackQuantity $packQuantity = null): static
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackQuantity(): static
    {
        $this->packQuantity = null;

        return $this;
    }

    /**
     * @return null|PackSizeNumeric
     */
    public function getPackSizeNumeric(): ?PackSizeNumeric
    {
        return $this->packSizeNumeric;
    }

    /**
     * @return PackSizeNumeric
     */
    public function getPackSizeNumericWithCreate(): PackSizeNumeric
    {
        $this->packSizeNumeric = is_null($this->packSizeNumeric) ? new PackSizeNumeric() : $this->packSizeNumeric;

        return $this->packSizeNumeric;
    }

    /**
     * @param  null|PackSizeNumeric $packSizeNumeric
     * @return static
     */
    public function setPackSizeNumeric(?PackSizeNumeric $packSizeNumeric = null): static
    {
        $this->packSizeNumeric = $packSizeNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackSizeNumeric(): static
    {
        $this->packSizeNumeric = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCatalogueIndicator(): ?bool
    {
        return $this->catalogueIndicator;
    }

    /**
     * @param  null|bool $catalogueIndicator
     * @return static
     */
    public function setCatalogueIndicator(?bool $catalogueIndicator = null): static
    {
        $this->catalogueIndicator = $catalogueIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCatalogueIndicator(): static
    {
        $this->catalogueIndicator = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param  null|bool $hazardousRiskIndicator
     * @return static
     */
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): static
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousRiskIndicator(): static
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalInformation>
     */
    public function getAdditionalInformation(): ?array
    {
        return $this->additionalInformation;
    }

    /**
     * @param  null|array<AdditionalInformation> $additionalInformation
     * @return static
     */
    public function setAdditionalInformation(?array $additionalInformation = null): static
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalInformation(): static
    {
        $this->additionalInformation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalInformation(): static
    {
        $this->additionalInformation = [];

        return $this;
    }

    /**
     * @return null|AdditionalInformation
     */
    public function firstAdditionalInformation(): ?AdditionalInformation
    {
        $additionalInformation = $this->additionalInformation ?? [];
        $additionalInformation = reset($additionalInformation);

        if (false === $additionalInformation) {
            return null;
        }

        return $additionalInformation;
    }

    /**
     * @return null|AdditionalInformation
     */
    public function lastAdditionalInformation(): ?AdditionalInformation
    {
        $additionalInformation = $this->additionalInformation ?? [];
        $additionalInformation = end($additionalInformation);

        if (false === $additionalInformation) {
            return null;
        }

        return $additionalInformation;
    }

    /**
     * @param  AdditionalInformation $additionalInformation
     * @return static
     */
    public function addToAdditionalInformation(AdditionalInformation $additionalInformation): static
    {
        $this->additionalInformation[] = $additionalInformation;

        return $this;
    }

    /**
     * @return AdditionalInformation
     */
    public function addToAdditionalInformationWithCreate(): AdditionalInformation
    {
        $this->addToadditionalInformation($additionalInformation = new AdditionalInformation());

        return $additionalInformation;
    }

    /**
     * @param  AdditionalInformation $additionalInformation
     * @return static
     */
    public function addOnceToAdditionalInformation(AdditionalInformation $additionalInformation): static
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        $this->additionalInformation[0] = $additionalInformation;

        return $this;
    }

    /**
     * @return AdditionalInformation
     */
    public function addOnceToAdditionalInformationWithCreate(): AdditionalInformation
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        if ([] === $this->additionalInformation) {
            $this->addOnceToadditionalInformation(new AdditionalInformation());
        }

        return $this->additionalInformation[0];
    }

    /**
     * @return null|array<Keyword>
     */
    public function getKeyword(): ?array
    {
        return $this->keyword;
    }

    /**
     * @param  null|array<Keyword> $keyword
     * @return static
     */
    public function setKeyword(?array $keyword = null): static
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetKeyword(): static
    {
        $this->keyword = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearKeyword(): static
    {
        $this->keyword = [];

        return $this;
    }

    /**
     * @return null|Keyword
     */
    public function firstKeyword(): ?Keyword
    {
        $keyword = $this->keyword ?? [];
        $keyword = reset($keyword);

        if (false === $keyword) {
            return null;
        }

        return $keyword;
    }

    /**
     * @return null|Keyword
     */
    public function lastKeyword(): ?Keyword
    {
        $keyword = $this->keyword ?? [];
        $keyword = end($keyword);

        if (false === $keyword) {
            return null;
        }

        return $keyword;
    }

    /**
     * @param  Keyword $keyword
     * @return static
     */
    public function addToKeyword(Keyword $keyword): static
    {
        $this->keyword[] = $keyword;

        return $this;
    }

    /**
     * @return Keyword
     */
    public function addToKeywordWithCreate(): Keyword
    {
        $this->addTokeyword($keyword = new Keyword());

        return $keyword;
    }

    /**
     * @param  Keyword $keyword
     * @return static
     */
    public function addOnceToKeyword(Keyword $keyword): static
    {
        if (!is_array($this->keyword)) {
            $this->keyword = [];
        }

        $this->keyword[0] = $keyword;

        return $this;
    }

    /**
     * @return Keyword
     */
    public function addOnceToKeywordWithCreate(): Keyword
    {
        if (!is_array($this->keyword)) {
            $this->keyword = [];
        }

        if ([] === $this->keyword) {
            $this->addOnceTokeyword(new Keyword());
        }

        return $this->keyword[0];
    }

    /**
     * @return null|array<BrandName>
     */
    public function getBrandName(): ?array
    {
        return $this->brandName;
    }

    /**
     * @param  null|array<BrandName> $brandName
     * @return static
     */
    public function setBrandName(?array $brandName = null): static
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBrandName(): static
    {
        $this->brandName = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBrandName(): static
    {
        $this->brandName = [];

        return $this;
    }

    /**
     * @return null|BrandName
     */
    public function firstBrandName(): ?BrandName
    {
        $brandName = $this->brandName ?? [];
        $brandName = reset($brandName);

        if (false === $brandName) {
            return null;
        }

        return $brandName;
    }

    /**
     * @return null|BrandName
     */
    public function lastBrandName(): ?BrandName
    {
        $brandName = $this->brandName ?? [];
        $brandName = end($brandName);

        if (false === $brandName) {
            return null;
        }

        return $brandName;
    }

    /**
     * @param  BrandName $brandName
     * @return static
     */
    public function addToBrandName(BrandName $brandName): static
    {
        $this->brandName[] = $brandName;

        return $this;
    }

    /**
     * @return BrandName
     */
    public function addToBrandNameWithCreate(): BrandName
    {
        $this->addTobrandName($brandName = new BrandName());

        return $brandName;
    }

    /**
     * @param  BrandName $brandName
     * @return static
     */
    public function addOnceToBrandName(BrandName $brandName): static
    {
        if (!is_array($this->brandName)) {
            $this->brandName = [];
        }

        $this->brandName[0] = $brandName;

        return $this;
    }

    /**
     * @return BrandName
     */
    public function addOnceToBrandNameWithCreate(): BrandName
    {
        if (!is_array($this->brandName)) {
            $this->brandName = [];
        }

        if ([] === $this->brandName) {
            $this->addOnceTobrandName(new BrandName());
        }

        return $this->brandName[0];
    }

    /**
     * @return null|array<ModelName>
     */
    public function getModelName(): ?array
    {
        return $this->modelName;
    }

    /**
     * @param  null|array<ModelName> $modelName
     * @return static
     */
    public function setModelName(?array $modelName = null): static
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetModelName(): static
    {
        $this->modelName = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearModelName(): static
    {
        $this->modelName = [];

        return $this;
    }

    /**
     * @return null|ModelName
     */
    public function firstModelName(): ?ModelName
    {
        $modelName = $this->modelName ?? [];
        $modelName = reset($modelName);

        if (false === $modelName) {
            return null;
        }

        return $modelName;
    }

    /**
     * @return null|ModelName
     */
    public function lastModelName(): ?ModelName
    {
        $modelName = $this->modelName ?? [];
        $modelName = end($modelName);

        if (false === $modelName) {
            return null;
        }

        return $modelName;
    }

    /**
     * @param  ModelName $modelName
     * @return static
     */
    public function addToModelName(ModelName $modelName): static
    {
        $this->modelName[] = $modelName;

        return $this;
    }

    /**
     * @return ModelName
     */
    public function addToModelNameWithCreate(): ModelName
    {
        $this->addTomodelName($modelName = new ModelName());

        return $modelName;
    }

    /**
     * @param  ModelName $modelName
     * @return static
     */
    public function addOnceToModelName(ModelName $modelName): static
    {
        if (!is_array($this->modelName)) {
            $this->modelName = [];
        }

        $this->modelName[0] = $modelName;

        return $this;
    }

    /**
     * @return ModelName
     */
    public function addOnceToModelNameWithCreate(): ModelName
    {
        if (!is_array($this->modelName)) {
            $this->modelName = [];
        }

        if ([] === $this->modelName) {
            $this->addOnceTomodelName(new ModelName());
        }

        return $this->modelName[0];
    }

    /**
     * @return null|BuyersItemIdentification
     */
    public function getBuyersItemIdentification(): ?BuyersItemIdentification
    {
        return $this->buyersItemIdentification;
    }

    /**
     * @return BuyersItemIdentification
     */
    public function getBuyersItemIdentificationWithCreate(): BuyersItemIdentification
    {
        $this->buyersItemIdentification = is_null($this->buyersItemIdentification) ? new BuyersItemIdentification() : $this->buyersItemIdentification;

        return $this->buyersItemIdentification;
    }

    /**
     * @param  null|BuyersItemIdentification $buyersItemIdentification
     * @return static
     */
    public function setBuyersItemIdentification(?BuyersItemIdentification $buyersItemIdentification = null): static
    {
        $this->buyersItemIdentification = $buyersItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyersItemIdentification(): static
    {
        $this->buyersItemIdentification = null;

        return $this;
    }

    /**
     * @return null|SellersItemIdentification
     */
    public function getSellersItemIdentification(): ?SellersItemIdentification
    {
        return $this->sellersItemIdentification;
    }

    /**
     * @return SellersItemIdentification
     */
    public function getSellersItemIdentificationWithCreate(): SellersItemIdentification
    {
        $this->sellersItemIdentification = is_null($this->sellersItemIdentification) ? new SellersItemIdentification() : $this->sellersItemIdentification;

        return $this->sellersItemIdentification;
    }

    /**
     * @param  null|SellersItemIdentification $sellersItemIdentification
     * @return static
     */
    public function setSellersItemIdentification(?SellersItemIdentification $sellersItemIdentification = null): static
    {
        $this->sellersItemIdentification = $sellersItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellersItemIdentification(): static
    {
        $this->sellersItemIdentification = null;

        return $this;
    }

    /**
     * @return null|array<ManufacturersItemIdentification>
     */
    public function getManufacturersItemIdentification(): ?array
    {
        return $this->manufacturersItemIdentification;
    }

    /**
     * @param  null|array<ManufacturersItemIdentification> $manufacturersItemIdentification
     * @return static
     */
    public function setManufacturersItemIdentification(?array $manufacturersItemIdentification = null): static
    {
        $this->manufacturersItemIdentification = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetManufacturersItemIdentification(): static
    {
        $this->manufacturersItemIdentification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearManufacturersItemIdentification(): static
    {
        $this->manufacturersItemIdentification = [];

        return $this;
    }

    /**
     * @return null|ManufacturersItemIdentification
     */
    public function firstManufacturersItemIdentification(): ?ManufacturersItemIdentification
    {
        $manufacturersItemIdentification = $this->manufacturersItemIdentification ?? [];
        $manufacturersItemIdentification = reset($manufacturersItemIdentification);

        if (false === $manufacturersItemIdentification) {
            return null;
        }

        return $manufacturersItemIdentification;
    }

    /**
     * @return null|ManufacturersItemIdentification
     */
    public function lastManufacturersItemIdentification(): ?ManufacturersItemIdentification
    {
        $manufacturersItemIdentification = $this->manufacturersItemIdentification ?? [];
        $manufacturersItemIdentification = end($manufacturersItemIdentification);

        if (false === $manufacturersItemIdentification) {
            return null;
        }

        return $manufacturersItemIdentification;
    }

    /**
     * @param  ManufacturersItemIdentification $manufacturersItemIdentification
     * @return static
     */
    public function addToManufacturersItemIdentification(
        ManufacturersItemIdentification $manufacturersItemIdentification,
    ): static {
        $this->manufacturersItemIdentification[] = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return ManufacturersItemIdentification
     */
    public function addToManufacturersItemIdentificationWithCreate(): ManufacturersItemIdentification
    {
        $this->addTomanufacturersItemIdentification($manufacturersItemIdentification = new ManufacturersItemIdentification());

        return $manufacturersItemIdentification;
    }

    /**
     * @param  ManufacturersItemIdentification $manufacturersItemIdentification
     * @return static
     */
    public function addOnceToManufacturersItemIdentification(
        ManufacturersItemIdentification $manufacturersItemIdentification,
    ): static {
        if (!is_array($this->manufacturersItemIdentification)) {
            $this->manufacturersItemIdentification = [];
        }

        $this->manufacturersItemIdentification[0] = $manufacturersItemIdentification;

        return $this;
    }

    /**
     * @return ManufacturersItemIdentification
     */
    public function addOnceToManufacturersItemIdentificationWithCreate(): ManufacturersItemIdentification
    {
        if (!is_array($this->manufacturersItemIdentification)) {
            $this->manufacturersItemIdentification = [];
        }

        if ([] === $this->manufacturersItemIdentification) {
            $this->addOnceTomanufacturersItemIdentification(new ManufacturersItemIdentification());
        }

        return $this->manufacturersItemIdentification[0];
    }

    /**
     * @return null|StandardItemIdentification
     */
    public function getStandardItemIdentification(): ?StandardItemIdentification
    {
        return $this->standardItemIdentification;
    }

    /**
     * @return StandardItemIdentification
     */
    public function getStandardItemIdentificationWithCreate(): StandardItemIdentification
    {
        $this->standardItemIdentification = is_null($this->standardItemIdentification) ? new StandardItemIdentification() : $this->standardItemIdentification;

        return $this->standardItemIdentification;
    }

    /**
     * @param  null|StandardItemIdentification $standardItemIdentification
     * @return static
     */
    public function setStandardItemIdentification(
        ?StandardItemIdentification $standardItemIdentification = null,
    ): static {
        $this->standardItemIdentification = $standardItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStandardItemIdentification(): static
    {
        $this->standardItemIdentification = null;

        return $this;
    }

    /**
     * @return null|CatalogueItemIdentification
     */
    public function getCatalogueItemIdentification(): ?CatalogueItemIdentification
    {
        return $this->catalogueItemIdentification;
    }

    /**
     * @return CatalogueItemIdentification
     */
    public function getCatalogueItemIdentificationWithCreate(): CatalogueItemIdentification
    {
        $this->catalogueItemIdentification = is_null($this->catalogueItemIdentification) ? new CatalogueItemIdentification() : $this->catalogueItemIdentification;

        return $this->catalogueItemIdentification;
    }

    /**
     * @param  null|CatalogueItemIdentification $catalogueItemIdentification
     * @return static
     */
    public function setCatalogueItemIdentification(
        ?CatalogueItemIdentification $catalogueItemIdentification = null,
    ): static {
        $this->catalogueItemIdentification = $catalogueItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCatalogueItemIdentification(): static
    {
        $this->catalogueItemIdentification = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalItemIdentification>
     */
    public function getAdditionalItemIdentification(): ?array
    {
        return $this->additionalItemIdentification;
    }

    /**
     * @param  null|array<AdditionalItemIdentification> $additionalItemIdentification
     * @return static
     */
    public function setAdditionalItemIdentification(?array $additionalItemIdentification = null): static
    {
        $this->additionalItemIdentification = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalItemIdentification(): static
    {
        $this->additionalItemIdentification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalItemIdentification(): static
    {
        $this->additionalItemIdentification = [];

        return $this;
    }

    /**
     * @return null|AdditionalItemIdentification
     */
    public function firstAdditionalItemIdentification(): ?AdditionalItemIdentification
    {
        $additionalItemIdentification = $this->additionalItemIdentification ?? [];
        $additionalItemIdentification = reset($additionalItemIdentification);

        if (false === $additionalItemIdentification) {
            return null;
        }

        return $additionalItemIdentification;
    }

    /**
     * @return null|AdditionalItemIdentification
     */
    public function lastAdditionalItemIdentification(): ?AdditionalItemIdentification
    {
        $additionalItemIdentification = $this->additionalItemIdentification ?? [];
        $additionalItemIdentification = end($additionalItemIdentification);

        if (false === $additionalItemIdentification) {
            return null;
        }

        return $additionalItemIdentification;
    }

    /**
     * @param  AdditionalItemIdentification $additionalItemIdentification
     * @return static
     */
    public function addToAdditionalItemIdentification(
        AdditionalItemIdentification $additionalItemIdentification,
    ): static {
        $this->additionalItemIdentification[] = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return AdditionalItemIdentification
     */
    public function addToAdditionalItemIdentificationWithCreate(): AdditionalItemIdentification
    {
        $this->addToadditionalItemIdentification($additionalItemIdentification = new AdditionalItemIdentification());

        return $additionalItemIdentification;
    }

    /**
     * @param  AdditionalItemIdentification $additionalItemIdentification
     * @return static
     */
    public function addOnceToAdditionalItemIdentification(
        AdditionalItemIdentification $additionalItemIdentification,
    ): static {
        if (!is_array($this->additionalItemIdentification)) {
            $this->additionalItemIdentification = [];
        }

        $this->additionalItemIdentification[0] = $additionalItemIdentification;

        return $this;
    }

    /**
     * @return AdditionalItemIdentification
     */
    public function addOnceToAdditionalItemIdentificationWithCreate(): AdditionalItemIdentification
    {
        if (!is_array($this->additionalItemIdentification)) {
            $this->additionalItemIdentification = [];
        }

        if ([] === $this->additionalItemIdentification) {
            $this->addOnceToadditionalItemIdentification(new AdditionalItemIdentification());
        }

        return $this->additionalItemIdentification[0];
    }

    /**
     * @return null|CatalogueDocumentReference
     */
    public function getCatalogueDocumentReference(): ?CatalogueDocumentReference
    {
        return $this->catalogueDocumentReference;
    }

    /**
     * @return CatalogueDocumentReference
     */
    public function getCatalogueDocumentReferenceWithCreate(): CatalogueDocumentReference
    {
        $this->catalogueDocumentReference = is_null($this->catalogueDocumentReference) ? new CatalogueDocumentReference() : $this->catalogueDocumentReference;

        return $this->catalogueDocumentReference;
    }

    /**
     * @param  null|CatalogueDocumentReference $catalogueDocumentReference
     * @return static
     */
    public function setCatalogueDocumentReference(
        ?CatalogueDocumentReference $catalogueDocumentReference = null,
    ): static {
        $this->catalogueDocumentReference = $catalogueDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCatalogueDocumentReference(): static
    {
        $this->catalogueDocumentReference = null;

        return $this;
    }

    /**
     * @return null|array<ItemSpecificationDocumentReference>
     */
    public function getItemSpecificationDocumentReference(): ?array
    {
        return $this->itemSpecificationDocumentReference;
    }

    /**
     * @param  null|array<ItemSpecificationDocumentReference> $itemSpecificationDocumentReference
     * @return static
     */
    public function setItemSpecificationDocumentReference(?array $itemSpecificationDocumentReference = null): static
    {
        $this->itemSpecificationDocumentReference = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemSpecificationDocumentReference(): static
    {
        $this->itemSpecificationDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearItemSpecificationDocumentReference(): static
    {
        $this->itemSpecificationDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ItemSpecificationDocumentReference
     */
    public function firstItemSpecificationDocumentReference(): ?ItemSpecificationDocumentReference
    {
        $itemSpecificationDocumentReference = $this->itemSpecificationDocumentReference ?? [];
        $itemSpecificationDocumentReference = reset($itemSpecificationDocumentReference);

        if (false === $itemSpecificationDocumentReference) {
            return null;
        }

        return $itemSpecificationDocumentReference;
    }

    /**
     * @return null|ItemSpecificationDocumentReference
     */
    public function lastItemSpecificationDocumentReference(): ?ItemSpecificationDocumentReference
    {
        $itemSpecificationDocumentReference = $this->itemSpecificationDocumentReference ?? [];
        $itemSpecificationDocumentReference = end($itemSpecificationDocumentReference);

        if (false === $itemSpecificationDocumentReference) {
            return null;
        }

        return $itemSpecificationDocumentReference;
    }

    /**
     * @param  ItemSpecificationDocumentReference $itemSpecificationDocumentReference
     * @return static
     */
    public function addToItemSpecificationDocumentReference(
        ItemSpecificationDocumentReference $itemSpecificationDocumentReference,
    ): static {
        $this->itemSpecificationDocumentReference[] = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return ItemSpecificationDocumentReference
     */
    public function addToItemSpecificationDocumentReferenceWithCreate(): ItemSpecificationDocumentReference
    {
        $this->addToitemSpecificationDocumentReference($itemSpecificationDocumentReference = new ItemSpecificationDocumentReference());

        return $itemSpecificationDocumentReference;
    }

    /**
     * @param  ItemSpecificationDocumentReference $itemSpecificationDocumentReference
     * @return static
     */
    public function addOnceToItemSpecificationDocumentReference(
        ItemSpecificationDocumentReference $itemSpecificationDocumentReference,
    ): static {
        if (!is_array($this->itemSpecificationDocumentReference)) {
            $this->itemSpecificationDocumentReference = [];
        }

        $this->itemSpecificationDocumentReference[0] = $itemSpecificationDocumentReference;

        return $this;
    }

    /**
     * @return ItemSpecificationDocumentReference
     */
    public function addOnceToItemSpecificationDocumentReferenceWithCreate(): ItemSpecificationDocumentReference
    {
        if (!is_array($this->itemSpecificationDocumentReference)) {
            $this->itemSpecificationDocumentReference = [];
        }

        if ([] === $this->itemSpecificationDocumentReference) {
            $this->addOnceToitemSpecificationDocumentReference(new ItemSpecificationDocumentReference());
        }

        return $this->itemSpecificationDocumentReference[0];
    }

    /**
     * @return null|OriginCountry
     */
    public function getOriginCountry(): ?OriginCountry
    {
        return $this->originCountry;
    }

    /**
     * @return OriginCountry
     */
    public function getOriginCountryWithCreate(): OriginCountry
    {
        $this->originCountry = is_null($this->originCountry) ? new OriginCountry() : $this->originCountry;

        return $this->originCountry;
    }

    /**
     * @param  null|OriginCountry $originCountry
     * @return static
     */
    public function setOriginCountry(?OriginCountry $originCountry = null): static
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginCountry(): static
    {
        $this->originCountry = null;

        return $this;
    }

    /**
     * @return null|array<CommodityClassification>
     */
    public function getCommodityClassification(): ?array
    {
        return $this->commodityClassification;
    }

    /**
     * @param  null|array<CommodityClassification> $commodityClassification
     * @return static
     */
    public function setCommodityClassification(?array $commodityClassification = null): static
    {
        $this->commodityClassification = $commodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCommodityClassification(): static
    {
        $this->commodityClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCommodityClassification(): static
    {
        $this->commodityClassification = [];

        return $this;
    }

    /**
     * @return null|CommodityClassification
     */
    public function firstCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = reset($commodityClassification);

        if (false === $commodityClassification) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @return null|CommodityClassification
     */
    public function lastCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = end($commodityClassification);

        if (false === $commodityClassification) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @param  CommodityClassification $commodityClassification
     * @return static
     */
    public function addToCommodityClassification(CommodityClassification $commodityClassification): static
    {
        $this->commodityClassification[] = $commodityClassification;

        return $this;
    }

    /**
     * @return CommodityClassification
     */
    public function addToCommodityClassificationWithCreate(): CommodityClassification
    {
        $this->addTocommodityClassification($commodityClassification = new CommodityClassification());

        return $commodityClassification;
    }

    /**
     * @param  CommodityClassification $commodityClassification
     * @return static
     */
    public function addOnceToCommodityClassification(CommodityClassification $commodityClassification): static
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        $this->commodityClassification[0] = $commodityClassification;

        return $this;
    }

    /**
     * @return CommodityClassification
     */
    public function addOnceToCommodityClassificationWithCreate(): CommodityClassification
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        if ([] === $this->commodityClassification) {
            $this->addOnceTocommodityClassification(new CommodityClassification());
        }

        return $this->commodityClassification[0];
    }

    /**
     * @return null|array<TransactionConditions>
     */
    public function getTransactionConditions(): ?array
    {
        return $this->transactionConditions;
    }

    /**
     * @param  null|array<TransactionConditions> $transactionConditions
     * @return static
     */
    public function setTransactionConditions(?array $transactionConditions = null): static
    {
        $this->transactionConditions = $transactionConditions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransactionConditions(): static
    {
        $this->transactionConditions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransactionConditions(): static
    {
        $this->transactionConditions = [];

        return $this;
    }

    /**
     * @return null|TransactionConditions
     */
    public function firstTransactionConditions(): ?TransactionConditions
    {
        $transactionConditions = $this->transactionConditions ?? [];
        $transactionConditions = reset($transactionConditions);

        if (false === $transactionConditions) {
            return null;
        }

        return $transactionConditions;
    }

    /**
     * @return null|TransactionConditions
     */
    public function lastTransactionConditions(): ?TransactionConditions
    {
        $transactionConditions = $this->transactionConditions ?? [];
        $transactionConditions = end($transactionConditions);

        if (false === $transactionConditions) {
            return null;
        }

        return $transactionConditions;
    }

    /**
     * @param  TransactionConditions $transactionConditions
     * @return static
     */
    public function addToTransactionConditions(TransactionConditions $transactionConditions): static
    {
        $this->transactionConditions[] = $transactionConditions;

        return $this;
    }

    /**
     * @return TransactionConditions
     */
    public function addToTransactionConditionsWithCreate(): TransactionConditions
    {
        $this->addTotransactionConditions($transactionConditions = new TransactionConditions());

        return $transactionConditions;
    }

    /**
     * @param  TransactionConditions $transactionConditions
     * @return static
     */
    public function addOnceToTransactionConditions(TransactionConditions $transactionConditions): static
    {
        if (!is_array($this->transactionConditions)) {
            $this->transactionConditions = [];
        }

        $this->transactionConditions[0] = $transactionConditions;

        return $this;
    }

    /**
     * @return TransactionConditions
     */
    public function addOnceToTransactionConditionsWithCreate(): TransactionConditions
    {
        if (!is_array($this->transactionConditions)) {
            $this->transactionConditions = [];
        }

        if ([] === $this->transactionConditions) {
            $this->addOnceTotransactionConditions(new TransactionConditions());
        }

        return $this->transactionConditions[0];
    }

    /**
     * @return null|array<HazardousItem>
     */
    public function getHazardousItem(): ?array
    {
        return $this->hazardousItem;
    }

    /**
     * @param  null|array<HazardousItem> $hazardousItem
     * @return static
     */
    public function setHazardousItem(?array $hazardousItem = null): static
    {
        $this->hazardousItem = $hazardousItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousItem(): static
    {
        $this->hazardousItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHazardousItem(): static
    {
        $this->hazardousItem = [];

        return $this;
    }

    /**
     * @return null|HazardousItem
     */
    public function firstHazardousItem(): ?HazardousItem
    {
        $hazardousItem = $this->hazardousItem ?? [];
        $hazardousItem = reset($hazardousItem);

        if (false === $hazardousItem) {
            return null;
        }

        return $hazardousItem;
    }

    /**
     * @return null|HazardousItem
     */
    public function lastHazardousItem(): ?HazardousItem
    {
        $hazardousItem = $this->hazardousItem ?? [];
        $hazardousItem = end($hazardousItem);

        if (false === $hazardousItem) {
            return null;
        }

        return $hazardousItem;
    }

    /**
     * @param  HazardousItem $hazardousItem
     * @return static
     */
    public function addToHazardousItem(HazardousItem $hazardousItem): static
    {
        $this->hazardousItem[] = $hazardousItem;

        return $this;
    }

    /**
     * @return HazardousItem
     */
    public function addToHazardousItemWithCreate(): HazardousItem
    {
        $this->addTohazardousItem($hazardousItem = new HazardousItem());

        return $hazardousItem;
    }

    /**
     * @param  HazardousItem $hazardousItem
     * @return static
     */
    public function addOnceToHazardousItem(HazardousItem $hazardousItem): static
    {
        if (!is_array($this->hazardousItem)) {
            $this->hazardousItem = [];
        }

        $this->hazardousItem[0] = $hazardousItem;

        return $this;
    }

    /**
     * @return HazardousItem
     */
    public function addOnceToHazardousItemWithCreate(): HazardousItem
    {
        if (!is_array($this->hazardousItem)) {
            $this->hazardousItem = [];
        }

        if ([] === $this->hazardousItem) {
            $this->addOnceTohazardousItem(new HazardousItem());
        }

        return $this->hazardousItem[0];
    }

    /**
     * @return null|array<ClassifiedTaxCategory>
     */
    public function getClassifiedTaxCategory(): ?array
    {
        return $this->classifiedTaxCategory;
    }

    /**
     * @param  null|array<ClassifiedTaxCategory> $classifiedTaxCategory
     * @return static
     */
    public function setClassifiedTaxCategory(?array $classifiedTaxCategory = null): static
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClassifiedTaxCategory(): static
    {
        $this->classifiedTaxCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearClassifiedTaxCategory(): static
    {
        $this->classifiedTaxCategory = [];

        return $this;
    }

    /**
     * @return null|ClassifiedTaxCategory
     */
    public function firstClassifiedTaxCategory(): ?ClassifiedTaxCategory
    {
        $classifiedTaxCategory = $this->classifiedTaxCategory ?? [];
        $classifiedTaxCategory = reset($classifiedTaxCategory);

        if (false === $classifiedTaxCategory) {
            return null;
        }

        return $classifiedTaxCategory;
    }

    /**
     * @return null|ClassifiedTaxCategory
     */
    public function lastClassifiedTaxCategory(): ?ClassifiedTaxCategory
    {
        $classifiedTaxCategory = $this->classifiedTaxCategory ?? [];
        $classifiedTaxCategory = end($classifiedTaxCategory);

        if (false === $classifiedTaxCategory) {
            return null;
        }

        return $classifiedTaxCategory;
    }

    /**
     * @param  ClassifiedTaxCategory $classifiedTaxCategory
     * @return static
     */
    public function addToClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory): static
    {
        $this->classifiedTaxCategory[] = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return ClassifiedTaxCategory
     */
    public function addToClassifiedTaxCategoryWithCreate(): ClassifiedTaxCategory
    {
        $this->addToclassifiedTaxCategory($classifiedTaxCategory = new ClassifiedTaxCategory());

        return $classifiedTaxCategory;
    }

    /**
     * @param  ClassifiedTaxCategory $classifiedTaxCategory
     * @return static
     */
    public function addOnceToClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory): static
    {
        if (!is_array($this->classifiedTaxCategory)) {
            $this->classifiedTaxCategory = [];
        }

        $this->classifiedTaxCategory[0] = $classifiedTaxCategory;

        return $this;
    }

    /**
     * @return ClassifiedTaxCategory
     */
    public function addOnceToClassifiedTaxCategoryWithCreate(): ClassifiedTaxCategory
    {
        if (!is_array($this->classifiedTaxCategory)) {
            $this->classifiedTaxCategory = [];
        }

        if ([] === $this->classifiedTaxCategory) {
            $this->addOnceToclassifiedTaxCategory(new ClassifiedTaxCategory());
        }

        return $this->classifiedTaxCategory[0];
    }

    /**
     * @return null|array<AdditionalItemProperty>
     */
    public function getAdditionalItemProperty(): ?array
    {
        return $this->additionalItemProperty;
    }

    /**
     * @param  null|array<AdditionalItemProperty> $additionalItemProperty
     * @return static
     */
    public function setAdditionalItemProperty(?array $additionalItemProperty = null): static
    {
        $this->additionalItemProperty = $additionalItemProperty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalItemProperty(): static
    {
        $this->additionalItemProperty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalItemProperty(): static
    {
        $this->additionalItemProperty = [];

        return $this;
    }

    /**
     * @return null|AdditionalItemProperty
     */
    public function firstAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = reset($additionalItemProperty);

        if (false === $additionalItemProperty) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @return null|AdditionalItemProperty
     */
    public function lastAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = end($additionalItemProperty);

        if (false === $additionalItemProperty) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @param  AdditionalItemProperty $additionalItemProperty
     * @return static
     */
    public function addToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): static
    {
        $this->additionalItemProperty[] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return AdditionalItemProperty
     */
    public function addToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        $this->addToadditionalItemProperty($additionalItemProperty = new AdditionalItemProperty());

        return $additionalItemProperty;
    }

    /**
     * @param  AdditionalItemProperty $additionalItemProperty
     * @return static
     */
    public function addOnceToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): static
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        $this->additionalItemProperty[0] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return AdditionalItemProperty
     */
    public function addOnceToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        if ([] === $this->additionalItemProperty) {
            $this->addOnceToadditionalItemProperty(new AdditionalItemProperty());
        }

        return $this->additionalItemProperty[0];
    }

    /**
     * @return null|array<ManufacturerParty>
     */
    public function getManufacturerParty(): ?array
    {
        return $this->manufacturerParty;
    }

    /**
     * @param  null|array<ManufacturerParty> $manufacturerParty
     * @return static
     */
    public function setManufacturerParty(?array $manufacturerParty = null): static
    {
        $this->manufacturerParty = $manufacturerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetManufacturerParty(): static
    {
        $this->manufacturerParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearManufacturerParty(): static
    {
        $this->manufacturerParty = [];

        return $this;
    }

    /**
     * @return null|ManufacturerParty
     */
    public function firstManufacturerParty(): ?ManufacturerParty
    {
        $manufacturerParty = $this->manufacturerParty ?? [];
        $manufacturerParty = reset($manufacturerParty);

        if (false === $manufacturerParty) {
            return null;
        }

        return $manufacturerParty;
    }

    /**
     * @return null|ManufacturerParty
     */
    public function lastManufacturerParty(): ?ManufacturerParty
    {
        $manufacturerParty = $this->manufacturerParty ?? [];
        $manufacturerParty = end($manufacturerParty);

        if (false === $manufacturerParty) {
            return null;
        }

        return $manufacturerParty;
    }

    /**
     * @param  ManufacturerParty $manufacturerParty
     * @return static
     */
    public function addToManufacturerParty(ManufacturerParty $manufacturerParty): static
    {
        $this->manufacturerParty[] = $manufacturerParty;

        return $this;
    }

    /**
     * @return ManufacturerParty
     */
    public function addToManufacturerPartyWithCreate(): ManufacturerParty
    {
        $this->addTomanufacturerParty($manufacturerParty = new ManufacturerParty());

        return $manufacturerParty;
    }

    /**
     * @param  ManufacturerParty $manufacturerParty
     * @return static
     */
    public function addOnceToManufacturerParty(ManufacturerParty $manufacturerParty): static
    {
        if (!is_array($this->manufacturerParty)) {
            $this->manufacturerParty = [];
        }

        $this->manufacturerParty[0] = $manufacturerParty;

        return $this;
    }

    /**
     * @return ManufacturerParty
     */
    public function addOnceToManufacturerPartyWithCreate(): ManufacturerParty
    {
        if (!is_array($this->manufacturerParty)) {
            $this->manufacturerParty = [];
        }

        if ([] === $this->manufacturerParty) {
            $this->addOnceTomanufacturerParty(new ManufacturerParty());
        }

        return $this->manufacturerParty[0];
    }

    /**
     * @return null|InformationContentProviderParty
     */
    public function getInformationContentProviderParty(): ?InformationContentProviderParty
    {
        return $this->informationContentProviderParty;
    }

    /**
     * @return InformationContentProviderParty
     */
    public function getInformationContentProviderPartyWithCreate(): InformationContentProviderParty
    {
        $this->informationContentProviderParty = is_null($this->informationContentProviderParty) ? new InformationContentProviderParty() : $this->informationContentProviderParty;

        return $this->informationContentProviderParty;
    }

    /**
     * @param  null|InformationContentProviderParty $informationContentProviderParty
     * @return static
     */
    public function setInformationContentProviderParty(
        ?InformationContentProviderParty $informationContentProviderParty = null,
    ): static {
        $this->informationContentProviderParty = $informationContentProviderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInformationContentProviderParty(): static
    {
        $this->informationContentProviderParty = null;

        return $this;
    }

    /**
     * @return null|array<OriginAddress>
     */
    public function getOriginAddress(): ?array
    {
        return $this->originAddress;
    }

    /**
     * @param  null|array<OriginAddress> $originAddress
     * @return static
     */
    public function setOriginAddress(?array $originAddress = null): static
    {
        $this->originAddress = $originAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginAddress(): static
    {
        $this->originAddress = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOriginAddress(): static
    {
        $this->originAddress = [];

        return $this;
    }

    /**
     * @return null|OriginAddress
     */
    public function firstOriginAddress(): ?OriginAddress
    {
        $originAddress = $this->originAddress ?? [];
        $originAddress = reset($originAddress);

        if (false === $originAddress) {
            return null;
        }

        return $originAddress;
    }

    /**
     * @return null|OriginAddress
     */
    public function lastOriginAddress(): ?OriginAddress
    {
        $originAddress = $this->originAddress ?? [];
        $originAddress = end($originAddress);

        if (false === $originAddress) {
            return null;
        }

        return $originAddress;
    }

    /**
     * @param  OriginAddress $originAddress
     * @return static
     */
    public function addToOriginAddress(OriginAddress $originAddress): static
    {
        $this->originAddress[] = $originAddress;

        return $this;
    }

    /**
     * @return OriginAddress
     */
    public function addToOriginAddressWithCreate(): OriginAddress
    {
        $this->addTooriginAddress($originAddress = new OriginAddress());

        return $originAddress;
    }

    /**
     * @param  OriginAddress $originAddress
     * @return static
     */
    public function addOnceToOriginAddress(OriginAddress $originAddress): static
    {
        if (!is_array($this->originAddress)) {
            $this->originAddress = [];
        }

        $this->originAddress[0] = $originAddress;

        return $this;
    }

    /**
     * @return OriginAddress
     */
    public function addOnceToOriginAddressWithCreate(): OriginAddress
    {
        if (!is_array($this->originAddress)) {
            $this->originAddress = [];
        }

        if ([] === $this->originAddress) {
            $this->addOnceTooriginAddress(new OriginAddress());
        }

        return $this->originAddress[0];
    }

    /**
     * @return null|array<ItemInstance>
     */
    public function getItemInstance(): ?array
    {
        return $this->itemInstance;
    }

    /**
     * @param  null|array<ItemInstance> $itemInstance
     * @return static
     */
    public function setItemInstance(?array $itemInstance = null): static
    {
        $this->itemInstance = $itemInstance;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemInstance(): static
    {
        $this->itemInstance = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearItemInstance(): static
    {
        $this->itemInstance = [];

        return $this;
    }

    /**
     * @return null|ItemInstance
     */
    public function firstItemInstance(): ?ItemInstance
    {
        $itemInstance = $this->itemInstance ?? [];
        $itemInstance = reset($itemInstance);

        if (false === $itemInstance) {
            return null;
        }

        return $itemInstance;
    }

    /**
     * @return null|ItemInstance
     */
    public function lastItemInstance(): ?ItemInstance
    {
        $itemInstance = $this->itemInstance ?? [];
        $itemInstance = end($itemInstance);

        if (false === $itemInstance) {
            return null;
        }

        return $itemInstance;
    }

    /**
     * @param  ItemInstance $itemInstance
     * @return static
     */
    public function addToItemInstance(ItemInstance $itemInstance): static
    {
        $this->itemInstance[] = $itemInstance;

        return $this;
    }

    /**
     * @return ItemInstance
     */
    public function addToItemInstanceWithCreate(): ItemInstance
    {
        $this->addToitemInstance($itemInstance = new ItemInstance());

        return $itemInstance;
    }

    /**
     * @param  ItemInstance $itemInstance
     * @return static
     */
    public function addOnceToItemInstance(ItemInstance $itemInstance): static
    {
        if (!is_array($this->itemInstance)) {
            $this->itemInstance = [];
        }

        $this->itemInstance[0] = $itemInstance;

        return $this;
    }

    /**
     * @return ItemInstance
     */
    public function addOnceToItemInstanceWithCreate(): ItemInstance
    {
        if (!is_array($this->itemInstance)) {
            $this->itemInstance = [];
        }

        if ([] === $this->itemInstance) {
            $this->addOnceToitemInstance(new ItemInstance());
        }

        return $this->itemInstance[0];
    }

    /**
     * @return null|array<Certificate>
     */
    public function getCertificate(): ?array
    {
        return $this->certificate;
    }

    /**
     * @param  null|array<Certificate> $certificate
     * @return static
     */
    public function setCertificate(?array $certificate = null): static
    {
        $this->certificate = $certificate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCertificate(): static
    {
        $this->certificate = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCertificate(): static
    {
        $this->certificate = [];

        return $this;
    }

    /**
     * @return null|Certificate
     */
    public function firstCertificate(): ?Certificate
    {
        $certificate = $this->certificate ?? [];
        $certificate = reset($certificate);

        if (false === $certificate) {
            return null;
        }

        return $certificate;
    }

    /**
     * @return null|Certificate
     */
    public function lastCertificate(): ?Certificate
    {
        $certificate = $this->certificate ?? [];
        $certificate = end($certificate);

        if (false === $certificate) {
            return null;
        }

        return $certificate;
    }

    /**
     * @param  Certificate $certificate
     * @return static
     */
    public function addToCertificate(Certificate $certificate): static
    {
        $this->certificate[] = $certificate;

        return $this;
    }

    /**
     * @return Certificate
     */
    public function addToCertificateWithCreate(): Certificate
    {
        $this->addTocertificate($certificate = new Certificate());

        return $certificate;
    }

    /**
     * @param  Certificate $certificate
     * @return static
     */
    public function addOnceToCertificate(Certificate $certificate): static
    {
        if (!is_array($this->certificate)) {
            $this->certificate = [];
        }

        $this->certificate[0] = $certificate;

        return $this;
    }

    /**
     * @return Certificate
     */
    public function addOnceToCertificateWithCreate(): Certificate
    {
        if (!is_array($this->certificate)) {
            $this->certificate = [];
        }

        if ([] === $this->certificate) {
            $this->addOnceTocertificate(new Certificate());
        }

        return $this->certificate[0];
    }

    /**
     * @return null|array<Dimension>
     */
    public function getDimension(): ?array
    {
        return $this->dimension;
    }

    /**
     * @param  null|array<Dimension> $dimension
     * @return static
     */
    public function setDimension(?array $dimension = null): static
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDimension(): static
    {
        $this->dimension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDimension(): static
    {
        $this->dimension = [];

        return $this;
    }

    /**
     * @return null|Dimension
     */
    public function firstDimension(): ?Dimension
    {
        $dimension = $this->dimension ?? [];
        $dimension = reset($dimension);

        if (false === $dimension) {
            return null;
        }

        return $dimension;
    }

    /**
     * @return null|Dimension
     */
    public function lastDimension(): ?Dimension
    {
        $dimension = $this->dimension ?? [];
        $dimension = end($dimension);

        if (false === $dimension) {
            return null;
        }

        return $dimension;
    }

    /**
     * @param  Dimension $dimension
     * @return static
     */
    public function addToDimension(Dimension $dimension): static
    {
        $this->dimension[] = $dimension;

        return $this;
    }

    /**
     * @return Dimension
     */
    public function addToDimensionWithCreate(): Dimension
    {
        $this->addTodimension($dimension = new Dimension());

        return $dimension;
    }

    /**
     * @param  Dimension $dimension
     * @return static
     */
    public function addOnceToDimension(Dimension $dimension): static
    {
        if (!is_array($this->dimension)) {
            $this->dimension = [];
        }

        $this->dimension[0] = $dimension;

        return $this;
    }

    /**
     * @return Dimension
     */
    public function addOnceToDimensionWithCreate(): Dimension
    {
        if (!is_array($this->dimension)) {
            $this->dimension = [];
        }

        if ([] === $this->dimension) {
            $this->addOnceTodimension(new Dimension());
        }

        return $this->dimension[0];
    }
}
