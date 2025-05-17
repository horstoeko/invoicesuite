<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class TradeProductType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerAssignedID", setter="setSellerAssignedID")
     */
    private $sellerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAssignedID", setter="setBuyerAssignedID")
     */
    private $buyerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IndustryAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIndustryAssignedID", setter="setIndustryAssignedID")
     */
    private $industryAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelID", setter="setModelID")
     */
    private $modelID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="BatchID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BrandName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBrandName", setter="setBrandName")
     */
    private $brandName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelName", setter="setModelName")
     */
    private $modelName;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableProductCharacteristic")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableProductCharacteristic", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableProductCharacteristic", setter="setApplicableProductCharacteristic")
     */
    private $applicableProductCharacteristic;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType>")
     * @JMS\Expose
     * @JMS\SerializedName("DesignatedProductClassification")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DesignatedProductClassification", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDesignatedProductClassification", setter="setDesignatedProductClassification")
     */
    private $designatedProductClassification;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType>")
     * @JMS\Expose
     * @JMS\SerializedName("IndividualTradeProductInstance")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IndividualTradeProductInstance", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIndividualTradeProductInstance", setter="setIndividualTradeProductInstance")
     */
    private $individualTradeProductInstance;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeCountryType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\TradeCountryType")
     * @JMS\Expose
     * @JMS\SerializedName("OriginTradeCountry")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOriginTradeCountry", setter="setOriginTradeCountry")
     */
    private $originTradeCountry;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedReferencedProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedReferencedProduct", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedReferencedProduct", setter="setIncludedReferencedProduct")
     */
    private $includedReferencedProduct;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $iD
     * @return self
     */
    public function setID(IDType $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getGlobalID(): ?IDType
    {
        return $this->globalID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getGlobalIDWithCreate(): IDType
    {
        $this->globalID = is_null($this->globalID) ? new IDType() : $this->globalID;

        return $this->globalID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $globalID
     * @return self
     */
    public function setGlobalID(IDType $globalID): self
    {
        $this->globalID = $globalID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getSellerAssignedID(): ?IDType
    {
        return $this->sellerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getSellerAssignedIDWithCreate(): IDType
    {
        $this->sellerAssignedID = is_null($this->sellerAssignedID) ? new IDType() : $this->sellerAssignedID;

        return $this->sellerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $sellerAssignedID
     * @return self
     */
    public function setSellerAssignedID(IDType $sellerAssignedID): self
    {
        $this->sellerAssignedID = $sellerAssignedID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getBuyerAssignedID(): ?IDType
    {
        return $this->buyerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getBuyerAssignedIDWithCreate(): IDType
    {
        $this->buyerAssignedID = is_null($this->buyerAssignedID) ? new IDType() : $this->buyerAssignedID;

        return $this->buyerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $buyerAssignedID
     * @return self
     */
    public function setBuyerAssignedID(IDType $buyerAssignedID): self
    {
        $this->buyerAssignedID = $buyerAssignedID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getIndustryAssignedID(): ?IDType
    {
        return $this->industryAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getIndustryAssignedIDWithCreate(): IDType
    {
        $this->industryAssignedID = is_null($this->industryAssignedID) ? new IDType() : $this->industryAssignedID;

        return $this->industryAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $industryAssignedID
     * @return self
     */
    public function setIndustryAssignedID(IDType $industryAssignedID): self
    {
        $this->industryAssignedID = $industryAssignedID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getModelID(): ?IDType
    {
        return $this->modelID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getModelIDWithCreate(): IDType
    {
        $this->modelID = is_null($this->modelID) ? new IDType() : $this->modelID;

        return $this->modelID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $modelID
     * @return self
     */
    public function setModelID(IDType $modelID): self
    {
        $this->modelID = $modelID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $name
     * @return self
     */
    public function setName(TextType $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $description
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null
     */
    public function getBatchID(): ?array
    {
        return $this->batchID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType> $batchID
     * @return self
     */
    public function setBatchID(array $batchID): self
    {
        $this->batchID = $batchID;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBatchID(): self
    {
        $this->batchID = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $batchID
     * @return self
     */
    public function addToBatchID(IDType $batchID): self
    {
        $this->batchID[] = $batchID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addToBatchIDWithCreate(): IDType
    {
        $this->addTobatchID($batchID = new IDType());

        return $batchID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $batchID
     * @return self
     */
    public function addOnceToBatchID(IDType $batchID): self
    {
        if (!is_array($this->batchID)) {
            $this->batchID = [];
        }

        $this->batchID[0] = $batchID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addOnceToBatchIDWithCreate(): IDType
    {
        if (!is_array($this->batchID)) {
            $this->batchID = [];
        }

        if ($this->batchID === []) {
            $this->addOnceTobatchID(new IDType());
        }

        return $this->batchID[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getBrandName(): ?TextType
    {
        return $this->brandName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getBrandNameWithCreate(): TextType
    {
        $this->brandName = is_null($this->brandName) ? new TextType() : $this->brandName;

        return $this->brandName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $brandName
     * @return self
     */
    public function setBrandName(TextType $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getModelName(): ?TextType
    {
        return $this->modelName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getModelNameWithCreate(): TextType
    {
        $this->modelName = is_null($this->modelName) ? new TextType() : $this->modelName;

        return $this->modelName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $modelName
     * @return self
     */
    public function setModelName(TextType $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType>|null
     */
    public function getApplicableProductCharacteristic(): ?array
    {
        return $this->applicableProductCharacteristic;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType> $applicableProductCharacteristic
     * @return self
     */
    public function setApplicableProductCharacteristic(array $applicableProductCharacteristic): self
    {
        $this->applicableProductCharacteristic = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return self
     */
    public function clearApplicableProductCharacteristic(): self
    {
        $this->applicableProductCharacteristic = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType $applicableProductCharacteristic
     * @return self
     */
    public function addToApplicableProductCharacteristic(
        ProductCharacteristicType $applicableProductCharacteristic,
    ): self {
        $this->applicableProductCharacteristic[] = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType
     */
    public function addToApplicableProductCharacteristicWithCreate(): ProductCharacteristicType
    {
        $this->addToapplicableProductCharacteristic($applicableProductCharacteristic = new ProductCharacteristicType());

        return $applicableProductCharacteristic;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType $applicableProductCharacteristic
     * @return self
     */
    public function addOnceToApplicableProductCharacteristic(
        ProductCharacteristicType $applicableProductCharacteristic,
    ): self {
        if (!is_array($this->applicableProductCharacteristic)) {
            $this->applicableProductCharacteristic = [];
        }

        $this->applicableProductCharacteristic[0] = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ProductCharacteristicType
     */
    public function addOnceToApplicableProductCharacteristicWithCreate(): ProductCharacteristicType
    {
        if (!is_array($this->applicableProductCharacteristic)) {
            $this->applicableProductCharacteristic = [];
        }

        if ($this->applicableProductCharacteristic === []) {
            $this->addOnceToapplicableProductCharacteristic(new ProductCharacteristicType());
        }

        return $this->applicableProductCharacteristic[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType>|null
     */
    public function getDesignatedProductClassification(): ?array
    {
        return $this->designatedProductClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType> $designatedProductClassification
     * @return self
     */
    public function setDesignatedProductClassification(array $designatedProductClassification): self
    {
        $this->designatedProductClassification = $designatedProductClassification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDesignatedProductClassification(): self
    {
        $this->designatedProductClassification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType $designatedProductClassification
     * @return self
     */
    public function addToDesignatedProductClassification(
        ProductClassificationType $designatedProductClassification,
    ): self {
        $this->designatedProductClassification[] = $designatedProductClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType
     */
    public function addToDesignatedProductClassificationWithCreate(): ProductClassificationType
    {
        $this->addTodesignatedProductClassification($designatedProductClassification = new ProductClassificationType());

        return $designatedProductClassification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType $designatedProductClassification
     * @return self
     */
    public function addOnceToDesignatedProductClassification(
        ProductClassificationType $designatedProductClassification,
    ): self {
        if (!is_array($this->designatedProductClassification)) {
            $this->designatedProductClassification = [];
        }

        $this->designatedProductClassification[0] = $designatedProductClassification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ProductClassificationType
     */
    public function addOnceToDesignatedProductClassificationWithCreate(): ProductClassificationType
    {
        if (!is_array($this->designatedProductClassification)) {
            $this->designatedProductClassification = [];
        }

        if ($this->designatedProductClassification === []) {
            $this->addOnceTodesignatedProductClassification(new ProductClassificationType());
        }

        return $this->designatedProductClassification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType>|null
     */
    public function getIndividualTradeProductInstance(): ?array
    {
        return $this->individualTradeProductInstance;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType> $individualTradeProductInstance
     * @return self
     */
    public function setIndividualTradeProductInstance(array $individualTradeProductInstance): self
    {
        $this->individualTradeProductInstance = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIndividualTradeProductInstance(): self
    {
        $this->individualTradeProductInstance = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType $individualTradeProductInstance
     * @return self
     */
    public function addToIndividualTradeProductInstance(
        TradeProductInstanceType $individualTradeProductInstance,
    ): self {
        $this->individualTradeProductInstance[] = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType
     */
    public function addToIndividualTradeProductInstanceWithCreate(): TradeProductInstanceType
    {
        $this->addToindividualTradeProductInstance($individualTradeProductInstance = new TradeProductInstanceType());

        return $individualTradeProductInstance;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType $individualTradeProductInstance
     * @return self
     */
    public function addOnceToIndividualTradeProductInstance(
        TradeProductInstanceType $individualTradeProductInstance,
    ): self {
        if (!is_array($this->individualTradeProductInstance)) {
            $this->individualTradeProductInstance = [];
        }

        $this->individualTradeProductInstance[0] = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeProductInstanceType
     */
    public function addOnceToIndividualTradeProductInstanceWithCreate(): TradeProductInstanceType
    {
        if (!is_array($this->individualTradeProductInstance)) {
            $this->individualTradeProductInstance = [];
        }

        if ($this->individualTradeProductInstance === []) {
            $this->addOnceToindividualTradeProductInstance(new TradeProductInstanceType());
        }

        return $this->individualTradeProductInstance[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeCountryType|null
     */
    public function getOriginTradeCountry(): ?TradeCountryType
    {
        return $this->originTradeCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeCountryType
     */
    public function getOriginTradeCountryWithCreate(): TradeCountryType
    {
        $this->originTradeCountry = is_null($this->originTradeCountry) ? new TradeCountryType() : $this->originTradeCountry;

        return $this->originTradeCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeCountryType $originTradeCountry
     * @return self
     */
    public function setOriginTradeCountry(TradeCountryType $originTradeCountry): self
    {
        $this->originTradeCountry = $originTradeCountry;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType>|null
     */
    public function getIncludedReferencedProduct(): ?array
    {
        return $this->includedReferencedProduct;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType> $includedReferencedProduct
     * @return self
     */
    public function setIncludedReferencedProduct(array $includedReferencedProduct): self
    {
        $this->includedReferencedProduct = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIncludedReferencedProduct(): self
    {
        $this->includedReferencedProduct = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType $includedReferencedProduct
     * @return self
     */
    public function addToIncludedReferencedProduct(ReferencedProductType $includedReferencedProduct): self
    {
        $this->includedReferencedProduct[] = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType
     */
    public function addToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        $this->addToincludedReferencedProduct($includedReferencedProduct = new ReferencedProductType());

        return $includedReferencedProduct;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType $includedReferencedProduct
     * @return self
     */
    public function addOnceToIncludedReferencedProduct(ReferencedProductType $includedReferencedProduct): self
    {
        if (!is_array($this->includedReferencedProduct)) {
            $this->includedReferencedProduct = [];
        }

        $this->includedReferencedProduct[0] = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedProductType
     */
    public function addOnceToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        if (!is_array($this->includedReferencedProduct)) {
            $this->includedReferencedProduct = [];
        }

        if ($this->includedReferencedProduct === []) {
            $this->addOnceToincludedReferencedProduct(new ReferencedProductType());
        }

        return $this->includedReferencedProduct[0];
    }
}
