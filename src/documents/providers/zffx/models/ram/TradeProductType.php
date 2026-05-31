<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeProductType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $iD;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getGlobalID', setter: 'setGlobalID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('GlobalID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $globalID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getSellerAssignedID', setter: 'setSellerAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SellerAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sellerAssignedID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getBuyerAssignedID', setter: 'setBuyerAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerAssignedID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getIndustryAssignedID', setter: 'setIndustryAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IndustryAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $industryAssignedID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getModelID', setter: 'setModelID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ModelID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $modelID;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $name;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $description;

    /**
     * @var null|array<IDType>
     */
    #[JMS\Accessor(getter: 'getBatchID', setter: 'setBatchID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BatchID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'BatchID', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $batchID;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getBrandName', setter: 'setBrandName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BrandName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $brandName;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getModelName', setter: 'setModelName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ModelName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $modelName;

    /**
     * @var null|array<ProductCharacteristicType>
     */
    #[JMS\Accessor(getter: 'getApplicableProductCharacteristic', setter: 'setApplicableProductCharacteristic')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableProductCharacteristic')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductCharacteristicType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ApplicableProductCharacteristic', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $applicableProductCharacteristic;

    /**
     * @var null|array<ProductClassificationType>
     */
    #[JMS\Accessor(getter: 'getDesignatedProductClassification', setter: 'setDesignatedProductClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DesignatedProductClassification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProductClassificationType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DesignatedProductClassification', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $designatedProductClassification;

    /**
     * @var null|array<TradeProductInstanceType>
     */
    #[JMS\Accessor(getter: 'getIndividualTradeProductInstance', setter: 'setIndividualTradeProductInstance')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IndividualTradeProductInstance')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeProductInstanceType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IndividualTradeProductInstance', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $individualTradeProductInstance;

    /**
     * @var null|TradeCountryType
     */
    #[JMS\Accessor(getter: 'getOriginTradeCountry', setter: 'setOriginTradeCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('OriginTradeCountry')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeCountryType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $originTradeCountry;

    /**
     * @var null|array<ReferencedProductType>
     */
    #[JMS\Accessor(getter: 'getIncludedReferencedProduct', setter: 'setIncludedReferencedProduct')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedReferencedProduct')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedProductType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IncludedReferencedProduct', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
        $this->iD ??= new IDType();

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(
        ?IDType $iD = null
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
        $this->globalID ??= new IDType();

        return $this->globalID;
    }

    /**
     * @param  null|IDType $globalID
     * @return static
     */
    public function setGlobalID(
        ?IDType $globalID = null
    ): static {
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
        $this->sellerAssignedID ??= new IDType();

        return $this->sellerAssignedID;
    }

    /**
     * @param  null|IDType $sellerAssignedID
     * @return static
     */
    public function setSellerAssignedID(
        ?IDType $sellerAssignedID = null
    ): static {
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
        $this->buyerAssignedID ??= new IDType();

        return $this->buyerAssignedID;
    }

    /**
     * @param  null|IDType $buyerAssignedID
     * @return static
     */
    public function setBuyerAssignedID(
        ?IDType $buyerAssignedID = null
    ): static {
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
        $this->industryAssignedID ??= new IDType();

        return $this->industryAssignedID;
    }

    /**
     * @param  null|IDType $industryAssignedID
     * @return static
     */
    public function setIndustryAssignedID(
        ?IDType $industryAssignedID = null
    ): static {
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
        $this->modelID ??= new IDType();

        return $this->modelID;
    }

    /**
     * @param  null|IDType $modelID
     * @return static
     */
    public function setModelID(
        ?IDType $modelID = null
    ): static {
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
        $this->name ??= new TextType();

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(
        ?TextType $name = null
    ): static {
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
        $this->description ??= new TextType();

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(
        ?TextType $description = null
    ): static {
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
    public function setBatchID(
        ?array $batchID = null
    ): static {
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
    public function addToBatchID(
        IDType $batchID
    ): static {
        $this->batchID[] = $batchID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addToBatchIDWithCreate(): IDType
    {
        $this->addToBatchID($batchID = new IDType());

        return $batchID;
    }

    /**
     * @param  IDType $batchID
     * @return static
     */
    public function addOnceToBatchID(
        IDType $batchID
    ): static {
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
            $this->addOnceToBatchID(new IDType());
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
        $this->brandName ??= new TextType();

        return $this->brandName;
    }

    /**
     * @param  null|TextType $brandName
     * @return static
     */
    public function setBrandName(
        ?TextType $brandName = null
    ): static {
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
        $this->modelName ??= new TextType();

        return $this->modelName;
    }

    /**
     * @param  null|TextType $modelName
     * @return static
     */
    public function setModelName(
        ?TextType $modelName = null
    ): static {
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
    public function setApplicableProductCharacteristic(
        ?array $applicableProductCharacteristic = null
    ): static {
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
        $this->addToApplicableProductCharacteristic($applicableProductCharacteristic = new ProductCharacteristicType());

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
            $this->addOnceToApplicableProductCharacteristic(new ProductCharacteristicType());
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
    public function setDesignatedProductClassification(
        ?array $designatedProductClassification = null
    ): static {
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
        $this->addToDesignatedProductClassification($designatedProductClassification = new ProductClassificationType());

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
            $this->addOnceToDesignatedProductClassification(new ProductClassificationType());
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
    public function setIndividualTradeProductInstance(
        ?array $individualTradeProductInstance = null
    ): static {
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
        $this->addToIndividualTradeProductInstance($individualTradeProductInstance = new TradeProductInstanceType());

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
            $this->addOnceToIndividualTradeProductInstance(new TradeProductInstanceType());
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
        $this->originTradeCountry ??= new TradeCountryType();

        return $this->originTradeCountry;
    }

    /**
     * @param  null|TradeCountryType $originTradeCountry
     * @return static
     */
    public function setOriginTradeCountry(
        ?TradeCountryType $originTradeCountry = null
    ): static {
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
    public function setIncludedReferencedProduct(
        ?array $includedReferencedProduct = null
    ): static {
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
    public function addToIncludedReferencedProduct(
        ReferencedProductType $includedReferencedProduct
    ): static {
        $this->includedReferencedProduct[] = $includedReferencedProduct;

        return $this;
    }

    /**
     * @return ReferencedProductType
     */
    public function addToIncludedReferencedProductWithCreate(): ReferencedProductType
    {
        $this->addToIncludedReferencedProduct($includedReferencedProduct = new ReferencedProductType());

        return $includedReferencedProduct;
    }

    /**
     * @param  ReferencedProductType $includedReferencedProduct
     * @return static
     */
    public function addOnceToIncludedReferencedProduct(
        ReferencedProductType $includedReferencedProduct
    ): static {
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
            $this->addOnceToIncludedReferencedProduct(new ReferencedProductType());
        }

        return $this->includedReferencedProduct[0];
    }
}
