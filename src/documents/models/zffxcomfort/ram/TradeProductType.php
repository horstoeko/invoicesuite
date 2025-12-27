<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxcomfort\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxcomfort\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeProductType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerAssignedID", setter="setSellerAssignedID")
     */
    private $sellerAssignedID;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAssignedID", setter="setBuyerAssignedID")
     */
    private $buyerAssignedID;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<ProductCharacteristicType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductCharacteristicType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxcomfort\ram\ProductClassificationType>")
     * @JMS\Expose
     * @JMS\SerializedName("DesignatedProductClassification")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DesignatedProductClassification", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDesignatedProductClassification", setter="setDesignatedProductClassification")
     */
    private $designatedProductClassification;

    /**
     * @var null|TradeCountryType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxcomfort\ram\TradeCountryType")
     * @JMS\Expose
     * @JMS\SerializedName("OriginTradeCountry")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOriginTradeCountry", setter="setOriginTradeCountry")
     */
    private $originTradeCountry;

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
}
