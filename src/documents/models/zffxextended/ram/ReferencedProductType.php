<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class ReferencedProductType
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
     * @var null|array<IDType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="GlobalID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
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
     * @var null|QuantityType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("UnitQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUnitQuantity", setter="setUnitQuantity")
     */
    private $unitQuantity;

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
     * @return null|array<IDType>
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    /**
     * @param  null|array<IDType> $globalID
     * @return static
     */
    public function setGlobalID(?array $globalID = null): static
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
     * @return static
     */
    public function clearGlobalID(): static
    {
        $this->globalID = [];

        return $this;
    }

    /**
     * @param  IDType $globalID
     * @return static
     */
    public function addToGlobalID(IDType $globalID): static
    {
        $this->globalID[] = $globalID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addToGlobalIDWithCreate(): IDType
    {
        $this->addToglobalID($globalID = new IDType());

        return $globalID;
    }

    /**
     * @param  IDType $globalID
     * @return static
     */
    public function addOnceToGlobalID(IDType $globalID): static
    {
        if (!is_array($this->globalID)) {
            $this->globalID = [];
        }

        $this->globalID[0] = $globalID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addOnceToGlobalIDWithCreate(): IDType
    {
        if (!is_array($this->globalID)) {
            $this->globalID = [];
        }

        if ([] === $this->globalID) {
            $this->addOnceToglobalID(new IDType());
        }

        return $this->globalID[0];
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
     * @return null|QuantityType
     */
    public function getUnitQuantity(): ?QuantityType
    {
        return $this->unitQuantity;
    }

    /**
     * @return QuantityType
     */
    public function getUnitQuantityWithCreate(): QuantityType
    {
        $this->unitQuantity = is_null($this->unitQuantity) ? new QuantityType() : $this->unitQuantity;

        return $this->unitQuantity;
    }

    /**
     * @param  null|QuantityType $unitQuantity
     * @return static
     */
    public function setUnitQuantity(?QuantityType $unitQuantity = null): static
    {
        $this->unitQuantity = $unitQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitQuantity(): static
    {
        $this->unitQuantity = null;

        return $this;
    }
}
