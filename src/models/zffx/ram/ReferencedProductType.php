<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\QuantityType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ReferencedProductType
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
     * @var array<\horstoeko\invoicesuite\models\zffx\udt\IDType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="GlobalID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerAssignedID", setter="setSellerAssignedID")
     */
    private $sellerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
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
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("UnitQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getUnitQuantity", setter="setUnitQuantity")
     */
    private $quantityType;

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
     * @return array<\horstoeko\invoicesuite\models\zffx\udt\IDType>|null
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\udt\IDType> $globalID
     * @return self
     */
    public function setGlobalID(array $globalID): self
    {
        $this->globalID = $globalID;

        return $this;
    }

    /**
     * @return self
     */
    public function clearGlobalID(): self
    {
        $this->globalID = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function addToGlobalID(IDType $idType): self
    {
        $this->globalID[] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function addToGlobalIDWithCreate(): IDType
    {
        $this->addToglobalID($idType = new IDType());

        return $idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function addOnceToGlobalID(IDType $idType): self
    {
        $this->globalID[0] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function addOnceToGlobalIDWithCreate(): IDType
    {
        if ($this->globalID === []) {
            $this->addOnceToglobalID(new IDType());
        }

        return $this->globalID[0];
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
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType|null
     */
    public function getUnitQuantity(): ?QuantityType
    {
        return $this->quantityType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\QuantityType
     */
    public function getUnitQuantityWithCreate(): QuantityType
    {
        $this->quantityType = is_null($this->quantityType) ? new QuantityType() : $this->quantityType;

        return $this->quantityType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\QuantityType $quantityType
     * @return self
     */
    public function setUnitQuantity(QuantityType $quantityType): self
    {
        $this->quantityType = $quantityType;

        return $this;
    }
}
