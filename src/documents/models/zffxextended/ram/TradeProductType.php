<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeProductType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerAssignedID", setter="setSellerAssignedID")
     */
    private $sellerAssignedID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAssignedID", setter="setBuyerAssignedID")
     */
    private $buyerAssignedID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IndustryAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIndustryAssignedID", setter="setIndustryAssignedID")
     */
    private $industryAssignedID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelID", setter="setModelID")
     */
    private $modelID;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<IDType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="BatchID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BrandName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBrandName", setter="setBrandName")
     */
    private $brandName;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("ModelName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModelName", setter="setModelName")
     */
    private $modelName;

    /**
     * @var null|array<ProductCharacteristicType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductCharacteristicType>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableProductCharacteristic")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableProductCharacteristic", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getApplicableProductCharacteristic", setter="setApplicableProductCharacteristic")
     */
    private $applicableProductCharacteristic;

    /**
     * @var null|array<ProductClassificationType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ProductClassificationType>")
     * @JMS\Expose
     * @JMS\SerializedName("DesignatedProductClassification")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DesignatedProductClassification", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDesignatedProductClassification", setter="setDesignatedProductClassification")
     */
    private $designatedProductClassification;

    /**
     * @var null|array<TradeProductInstanceType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeProductInstanceType>")
     * @JMS\Expose
     * @JMS\SerializedName("IndividualTradeProductInstance")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IndividualTradeProductInstance", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIndividualTradeProductInstance", setter="setIndividualTradeProductInstance")
     */
    private $individualTradeProductInstance;

    /**
     * @var null|TradeCountryType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeCountryType")
     * @JMS\Expose
     * @JMS\SerializedName("OriginTradeCountry")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOriginTradeCountry", setter="setOriginTradeCountry")
     */
    private $originTradeCountry;

    /**
     * @var null|array<ReferencedProductType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedProductType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedReferencedProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedReferencedProduct", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedReferencedProduct", setter="setIncludedReferencedProduct")
     */
    private $includedReferencedProduct;

    /**
     * @return null|IDType
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(?IDType $iD = null): static
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
     * @return null|IDType
     */
    public function getGlobalID(): ?IDType
    {
        return $this->globalID;
    }

    /**
     * @return IDType
     */
    public function getGlobalIDWithCreate(): IDType
    {
        $this->globalID = is_null($this->globalID) ? new IDType() : $this->globalID;

        return $this->globalID;
    }

    /**
     * @param  null|IDType $globalID
     * @return static
     */
    public function setGlobalID(?IDType $globalID = null): static
    {
        $this->globalID = $globalID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGlobalID(): static
    {
        $this->globalID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getSellerAssignedID(): ?IDType
    {
        return $this->sellerAssignedID;
    }

    /**
     * @return IDType
     */
    public function getSellerAssignedIDWithCreate(): IDType
    {
        $this->sellerAssignedID = is_null($this->sellerAssignedID) ? new IDType() : $this->sellerAssignedID;

        return $this->sellerAssignedID;
    }

    /**
     * @param  null|IDType $sellerAssignedID
     * @return static
     */
    public function setSellerAssignedID(?IDType $sellerAssignedID = null): static
    {
        $this->sellerAssignedID = $sellerAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerAssignedID(): static
    {
        $this->sellerAssignedID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getBuyerAssignedID(): ?IDType
    {
        return $this->buyerAssignedID;
    }

    /**
     * @return IDType
     */
    public function getBuyerAssignedIDWithCreate(): IDType
    {
        $this->buyerAssignedID = is_null($this->buyerAssignedID) ? new IDType() : $this->buyerAssignedID;

        return $this->buyerAssignedID;
    }

    /**
     * @param  null|IDType $buyerAssignedID
     * @return static
     */
    public function setBuyerAssignedID(?IDType $buyerAssignedID = null): static
    {
        $this->buyerAssignedID = $buyerAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerAssignedID(): static
    {
        $this->buyerAssignedID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getIndustryAssignedID(): ?IDType
    {
        return $this->industryAssignedID;
    }

    /**
     * @return IDType
     */
    public function getIndustryAssignedIDWithCreate(): IDType
    {
        $this->industryAssignedID = is_null($this->industryAssignedID) ? new IDType() : $this->industryAssignedID;

        return $this->industryAssignedID;
    }

    /**
     * @param  null|IDType $industryAssignedID
     * @return static
     */
    public function setIndustryAssignedID(?IDType $industryAssignedID = null): static
    {
        $this->industryAssignedID = $industryAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIndustryAssignedID(): static
    {
        $this->industryAssignedID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getModelID(): ?IDType
    {
        return $this->modelID;
    }

    /**
     * @return IDType
     */
    public function getModelIDWithCreate(): IDType
    {
        $this->modelID = is_null($this->modelID) ? new IDType() : $this->modelID;

        return $this->modelID;
    }

    /**
     * @param  null|IDType $modelID
     * @return static
     */
    public function setModelID(?IDType $modelID = null): static
    {
        $this->modelID = $modelID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetModelID(): static
    {
        $this->modelID = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(?TextType $name = null): static
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
     * @return null|TextType
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(?TextType $description = null): static
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
     * @return null|array<IDType>
     */
    public function getBatchID(): ?array
    {
        return $this->batchID;
    }

    /**
     * @param  null|array<IDType> $batchID
     * @return static
     */
    public function setBatchID(?array $batchID = null): static
    {
        $this->batchID = $batchID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBatchID(): static
    {
        $this->batchID = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBatchID(): static
    {
        $this->batchID = [];

        return $this;
    }

    /**
     * @param  IDType $batchID
     * @return static
     */
    public function addToBatchID(IDType $batchID): static
    {
        $this->batchID[] = $batchID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addToBatchIDWithCreate(): IDType
    {
        $this->addTobatchID($batchID = new IDType());

        return $batchID;
    }

    /**
     * @param  IDType $batchID
     * @return static
     */
    public function addOnceToBatchID(IDType $batchID): static
    {
        if (!is_array($this->batchID)) {
            $this->batchID = [];
        }

        $this->batchID[0] = $batchID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addOnceToBatchIDWithCreate(): IDType
    {
        if (!is_array($this->batchID)) {
            $this->batchID = [];
        }

        if ([] === $this->batchID) {
            $this->addOnceTobatchID(new IDType());
        }

        return $this->batchID[0];
    }

    /**
     * @return null|TextType
     */
    public function getBrandName(): ?TextType
    {
        return $this->brandName;
    }

    /**
     * @return TextType
     */
    public function getBrandNameWithCreate(): TextType
    {
        $this->brandName = is_null($this->brandName) ? new TextType() : $this->brandName;

        return $this->brandName;
    }

    /**
     * @param  null|TextType $brandName
     * @return static
     */
    public function setBrandName(?TextType $brandName = null): static
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
     * @return null|TextType
     */
    public function getModelName(): ?TextType
    {
        return $this->modelName;
    }

    /**
     * @return TextType
     */
    public function getModelNameWithCreate(): TextType
    {
        $this->modelName = is_null($this->modelName) ? new TextType() : $this->modelName;

        return $this->modelName;
    }

    /**
     * @param  null|TextType $modelName
     * @return static
     */
    public function setModelName(?TextType $modelName = null): static
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
     * @return null|array<ProductCharacteristicType>
     */
    public function getApplicableProductCharacteristic(): ?array
    {
        return $this->applicableProductCharacteristic;
    }

    /**
     * @param  null|array<ProductCharacteristicType> $applicableProductCharacteristic
     * @return static
     */
    public function setApplicableProductCharacteristic(?array $applicableProductCharacteristic = null): static
    {
        $this->applicableProductCharacteristic = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableProductCharacteristic(): static
    {
        $this->applicableProductCharacteristic = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableProductCharacteristic(): static
    {
        $this->applicableProductCharacteristic = [];

        return $this;
    }

    /**
     * @param  ProductCharacteristicType $applicableProductCharacteristic
     * @return static
     */
    public function addToApplicableProductCharacteristic(
        ProductCharacteristicType $applicableProductCharacteristic,
    ): static {
        $this->applicableProductCharacteristic[] = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return ProductCharacteristicType
     */
    public function addToApplicableProductCharacteristicWithCreate(): ProductCharacteristicType
    {
        $this->addToapplicableProductCharacteristic($applicableProductCharacteristic = new ProductCharacteristicType());

        return $applicableProductCharacteristic;
    }

    /**
     * @param  ProductCharacteristicType $applicableProductCharacteristic
     * @return static
     */
    public function addOnceToApplicableProductCharacteristic(
        ProductCharacteristicType $applicableProductCharacteristic,
    ): static {
        if (!is_array($this->applicableProductCharacteristic)) {
            $this->applicableProductCharacteristic = [];
        }

        $this->applicableProductCharacteristic[0] = $applicableProductCharacteristic;

        return $this;
    }

    /**
     * @return ProductCharacteristicType
     */
    public function addOnceToApplicableProductCharacteristicWithCreate(): ProductCharacteristicType
    {
        if (!is_array($this->applicableProductCharacteristic)) {
            $this->applicableProductCharacteristic = [];
        }

        if ([] === $this->applicableProductCharacteristic) {
            $this->addOnceToapplicableProductCharacteristic(new ProductCharacteristicType());
        }

        return $this->applicableProductCharacteristic[0];
    }

    /**
     * @return null|array<ProductClassificationType>
     */
    public function getDesignatedProductClassification(): ?array
    {
        return $this->designatedProductClassification;
    }

    /**
     * @param  null|array<ProductClassificationType> $designatedProductClassification
     * @return static
     */
    public function setDesignatedProductClassification(?array $designatedProductClassification = null): static
    {
        $this->designatedProductClassification = $designatedProductClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDesignatedProductClassification(): static
    {
        $this->designatedProductClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDesignatedProductClassification(): static
    {
        $this->designatedProductClassification = [];

        return $this;
    }

    /**
     * @param  ProductClassificationType $designatedProductClassification
     * @return static
     */
    public function addToDesignatedProductClassification(
        ProductClassificationType $designatedProductClassification,
    ): static {
        $this->designatedProductClassification[] = $designatedProductClassification;

        return $this;
    }

    /**
     * @return ProductClassificationType
     */
    public function addToDesignatedProductClassificationWithCreate(): ProductClassificationType
    {
        $this->addTodesignatedProductClassification($designatedProductClassification = new ProductClassificationType());

        return $designatedProductClassification;
    }

    /**
     * @param  ProductClassificationType $designatedProductClassification
     * @return static
     */
    public function addOnceToDesignatedProductClassification(
        ProductClassificationType $designatedProductClassification,
    ): static {
        if (!is_array($this->designatedProductClassification)) {
            $this->designatedProductClassification = [];
        }

        $this->designatedProductClassification[0] = $designatedProductClassification;

        return $this;
    }

    /**
     * @return ProductClassificationType
     */
    public function addOnceToDesignatedProductClassificationWithCreate(): ProductClassificationType
    {
        if (!is_array($this->designatedProductClassification)) {
            $this->designatedProductClassification = [];
        }

        if ([] === $this->designatedProductClassification) {
            $this->addOnceTodesignatedProductClassification(new ProductClassificationType());
        }

        return $this->designatedProductClassification[0];
    }

    /**
     * @return null|array<TradeProductInstanceType>
     */
    public function getIndividualTradeProductInstance(): ?array
    {
        return $this->individualTradeProductInstance;
    }

    /**
     * @param  null|array<TradeProductInstanceType> $individualTradeProductInstance
     * @return static
     */
    public function setIndividualTradeProductInstance(?array $individualTradeProductInstance = null): static
    {
        $this->individualTradeProductInstance = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIndividualTradeProductInstance(): static
    {
        $this->individualTradeProductInstance = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIndividualTradeProductInstance(): static
    {
        $this->individualTradeProductInstance = [];

        return $this;
    }

    /**
     * @param  TradeProductInstanceType $individualTradeProductInstance
     * @return static
     */
    public function addToIndividualTradeProductInstance(
        TradeProductInstanceType $individualTradeProductInstance,
    ): static {
        $this->individualTradeProductInstance[] = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return TradeProductInstanceType
     */
    public function addToIndividualTradeProductInstanceWithCreate(): TradeProductInstanceType
    {
        $this->addToindividualTradeProductInstance($individualTradeProductInstance = new TradeProductInstanceType());

        return $individualTradeProductInstance;
    }

    /**
     * @param  TradeProductInstanceType $individualTradeProductInstance
     * @return static
     */
    public function addOnceToIndividualTradeProductInstance(
        TradeProductInstanceType $individualTradeProductInstance,
    ): static {
        if (!is_array($this->individualTradeProductInstance)) {
            $this->individualTradeProductInstance = [];
        }

        $this->individualTradeProductInstance[0] = $individualTradeProductInstance;

        return $this;
    }

    /**
     * @return TradeProductInstanceType
     */
    public function addOnceToIndividualTradeProductInstanceWithCreate(): TradeProductInstanceType
    {
        if (!is_array($this->individualTradeProductInstance)) {
            $this->individualTradeProductInstance = [];
        }

        if ([] === $this->individualTradeProductInstance) {
            $this->addOnceToindividualTradeProductInstance(new TradeProductInstanceType());
        }

        return $this->individualTradeProductInstance[0];
    }

    /**
     * @return null|TradeCountryType
     */
    public function getOriginTradeCountry(): ?TradeCountryType
    {
        return $this->originTradeCountry;
    }

    /**
     * @return TradeCountryType
     */
    public function getOriginTradeCountryWithCreate(): TradeCountryType
    {
        $this->originTradeCountry = is_null($this->originTradeCountry) ? new TradeCountryType() : $this->originTradeCountry;

        return $this->originTradeCountry;
    }

    /**
     * @param  null|TradeCountryType $originTradeCountry
     * @return static
     */
    public function setOriginTradeCountry(?TradeCountryType $originTradeCountry = null): static
    {
        $this->originTradeCountry = $originTradeCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginTradeCountry(): static
    {
        $this->originTradeCountry = null;

        return $this;
    }

    /**
     * @return null|array<ReferencedProductType>
     */
    public function getIncludedReferencedProduct(): ?array
    {
        return $this->includedReferencedProduct;
    }

    /**
     * @param  null|array<ReferencedProductType> $includedReferencedProduct
     * @return static
     */
    public function setIncludedReferencedProduct(?array $includedReferencedProduct = null): static
    {
        $this->includedReferencedProduct = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedReferencedProduct(): static
    {
        $this->includedReferencedProduct = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIncludedReferencedProduct(): static
    {
        $this->includedReferencedProduct = [];

        return $this;
    }

    /**
     * @param  ReferencedProductType $includedReferencedProduct
     * @return static
     */
    public function addToIncludedReferencedProduct(ReferencedProductType $includedReferencedProduct): static
    {
        $this->includedReferencedProduct[] = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return ReferencedProductType
     */
    public function addToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        $this->addToincludedReferencedProduct($includedReferencedProduct = new ReferencedProductType());

        return $includedReferencedProduct;
    }

    /**
     * @param  ReferencedProductType $includedReferencedProduct
     * @return static
     */
    public function addOnceToIncludedReferencedProduct(ReferencedProductType $includedReferencedProduct): static
    {
        if (!is_array($this->includedReferencedProduct)) {
            $this->includedReferencedProduct = [];
        }

        $this->includedReferencedProduct[0] = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return ReferencedProductType
     */
    public function addOnceToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        if (!is_array($this->includedReferencedProduct)) {
            $this->includedReferencedProduct = [];
        }

        if ([] === $this->includedReferencedProduct) {
            $this->addOnceToincludedReferencedProduct(new ReferencedProductType());
        }

        return $this->includedReferencedProduct[0];
    }
}
