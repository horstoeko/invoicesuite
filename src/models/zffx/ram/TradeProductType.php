<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradeProductType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerAssignedID", setter="setSellerAssignedID")
     */
    private $sellerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAssignedID", setter="setBuyerAssignedID")
     */
    private $buyerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IndustryAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIndustryAssignedID", setter="setIndustryAssignedID")
     */
    private $industryAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelID", setter="setModelID")
     */
    private $modelID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\udt\IDType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="BatchID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BrandName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBrandName", setter="setBrandName")
     */
    private $brandName;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelName", setter="setModelName")
     */
    private $modelName;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableProductCharacteristic")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableProductCharacteristic", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableProductCharacteristic", setter="setApplicableProductCharacteristic")
     */
    private $applicableProductCharacteristic;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType>")
     * @JMS\Expose
     * @JMS\SerializedName("DesignatedProductClassification")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DesignatedProductClassification", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDesignatedProductClassification", setter="setDesignatedProductClassification")
     */
    private $designatedProductClassification;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType>")
     * @JMS\Expose
     * @JMS\SerializedName("IndividualTradeProductInstance")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IndividualTradeProductInstance", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIndividualTradeProductInstance", setter="setIndividualTradeProductInstance")
     */
    private $individualTradeProductInstance;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeCountryType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeCountryType")
     * @JMS\Expose
     * @JMS\SerializedName("OriginTradeCountry")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOriginTradeCountry", setter="setOriginTradeCountry")
     */
    private $tradeCountryType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedReferencedProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedReferencedProduct", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedReferencedProduct", setter="setIncludedReferencedProduct")
     */
    private $includedReferencedProduct;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setID(IDType $idType): self
    {
        $this->iD = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getGlobalID(): ?IDType
    {
        return $this->globalID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getGlobalIDWithCreate(): IDType
    {
        $this->globalID = is_null($this->globalID) ? new IDType() : $this->globalID;

        return $this->globalID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setGlobalID(IDType $idType): self
    {
        $this->globalID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getSellerAssignedID(): ?IDType
    {
        return $this->sellerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getSellerAssignedIDWithCreate(): IDType
    {
        $this->sellerAssignedID = is_null($this->sellerAssignedID) ? new IDType() : $this->sellerAssignedID;

        return $this->sellerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setSellerAssignedID(IDType $idType): self
    {
        $this->sellerAssignedID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getBuyerAssignedID(): ?IDType
    {
        return $this->buyerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getBuyerAssignedIDWithCreate(): IDType
    {
        $this->buyerAssignedID = is_null($this->buyerAssignedID) ? new IDType() : $this->buyerAssignedID;

        return $this->buyerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setBuyerAssignedID(IDType $idType): self
    {
        $this->buyerAssignedID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getIndustryAssignedID(): ?IDType
    {
        return $this->industryAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getIndustryAssignedIDWithCreate(): IDType
    {
        $this->industryAssignedID = is_null($this->industryAssignedID) ? new IDType() : $this->industryAssignedID;

        return $this->industryAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setIndustryAssignedID(IDType $idType): self
    {
        $this->industryAssignedID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getModelID(): ?IDType
    {
        return $this->modelID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getModelIDWithCreate(): IDType
    {
        $this->modelID = is_null($this->modelID) ? new IDType() : $this->modelID;

        return $this->modelID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setModelID(IDType $idType): self
    {
        $this->modelID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setName(TextType $textType): self
    {
        $this->name = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setDescription(TextType $textType): self
    {
        $this->description = $textType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\udt\IDType>|null
     */
    public function getBatchID(): ?array
    {
        return $this->batchID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\udt\IDType> $batchID
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
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function addToBatchID(IDType $idType): self
    {
        $this->batchID[] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function addToBatchIDWithCreate(): IDType
    {
        $this->addTobatchID($idType = new IDType());

        return $idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getBrandName(): ?TextType
    {
        return $this->brandName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getBrandNameWithCreate(): TextType
    {
        $this->brandName = is_null($this->brandName) ? new TextType() : $this->brandName;

        return $this->brandName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setBrandName(TextType $textType): self
    {
        $this->brandName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getModelName(): ?TextType
    {
        return $this->modelName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getModelNameWithCreate(): TextType
    {
        $this->modelName = is_null($this->modelName) ? new TextType() : $this->modelName;

        return $this->modelName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setModelName(TextType $textType): self
    {
        $this->modelName = $textType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType>|null
     */
    public function getApplicableProductCharacteristic(): ?array
    {
        return $this->applicableProductCharacteristic;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType> $applicableProductCharacteristic
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType $productCharacteristicType
     * @return self
     */
    public function addToApplicableProductCharacteristic(
        ProductCharacteristicType $productCharacteristicType,
    ): self {
        $this->applicableProductCharacteristic[] = $productCharacteristicType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ProductCharacteristicType
     */
    public function addToApplicableProductCharacteristicWithCreate(): ProductCharacteristicType
    {
        $this->addToapplicableProductCharacteristic($productCharacteristicType = new ProductCharacteristicType());

        return $productCharacteristicType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType>|null
     */
    public function getDesignatedProductClassification(): ?array
    {
        return $this->designatedProductClassification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType> $designatedProductClassification
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType $productClassificationType
     * @return self
     */
    public function addToDesignatedProductClassification(
        ProductClassificationType $productClassificationType,
    ): self {
        $this->designatedProductClassification[] = $productClassificationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ProductClassificationType
     */
    public function addToDesignatedProductClassificationWithCreate(): ProductClassificationType
    {
        $this->addTodesignatedProductClassification($productClassificationType = new ProductClassificationType());

        return $productClassificationType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType>|null
     */
    public function getIndividualTradeProductInstance(): ?array
    {
        return $this->individualTradeProductInstance;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType> $individualTradeProductInstance
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType $tradeProductInstanceType
     * @return self
     */
    public function addToIndividualTradeProductInstance(
        TradeProductInstanceType $tradeProductInstanceType,
    ): self {
        $this->individualTradeProductInstance[] = $tradeProductInstanceType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeProductInstanceType
     */
    public function addToIndividualTradeProductInstanceWithCreate(): TradeProductInstanceType
    {
        $this->addToindividualTradeProductInstance($tradeProductInstanceType = new TradeProductInstanceType());

        return $tradeProductInstanceType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeCountryType|null
     */
    public function getOriginTradeCountry(): ?TradeCountryType
    {
        return $this->tradeCountryType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeCountryType
     */
    public function getOriginTradeCountryWithCreate(): TradeCountryType
    {
        $this->tradeCountryType = is_null($this->tradeCountryType) ? new TradeCountryType() : $this->tradeCountryType;

        return $this->tradeCountryType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeCountryType $tradeCountryType
     * @return self
     */
    public function setOriginTradeCountry(TradeCountryType $tradeCountryType): self
    {
        $this->tradeCountryType = $tradeCountryType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType>|null
     */
    public function getIncludedReferencedProduct(): ?array
    {
        return $this->includedReferencedProduct;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType> $includedReferencedProduct
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType $referencedProductType
     * @return self
     */
    public function addToIncludedReferencedProduct(ReferencedProductType $referencedProductType): self
    {
        $this->includedReferencedProduct[] = $referencedProductType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedProductType
     */
    public function addToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        $this->addToincludedReferencedProduct($referencedProductType = new ReferencedProductType());

        return $referencedProductType;
    }
}
