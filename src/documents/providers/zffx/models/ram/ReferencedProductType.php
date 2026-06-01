<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ReferencedProductType
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
     * @var null|array<IDType>
     */
    #[JMS\Accessor(getter: 'getGlobalID', setter: 'setGlobalID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('GlobalID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'GlobalID', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
     * @var null|QuantityType
     */
    #[JMS\Accessor(getter: 'getUnitQuantity', setter: 'setUnitQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('UnitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\QuantityType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
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
    public function setGlobalID(
        ?array $globalID = null
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
    public function addToGlobalID(
        IDType $globalID
    ): static {
        $this->globalID[] = $globalID;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addToGlobalIDWithCreate(): IDType
    {
        $this->addToGlobalID($globalID = new IDType());

        return $globalID;
    }

    /**
     * @param  IDType $globalID
     * @return static
     */
    public function addOnceToGlobalID(
        IDType $globalID
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->globalID)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->globalID)) {
            $this->globalID = [];
        }

        if ([] === $this->globalID) {
            $this->addOnceToGlobalID(new IDType());
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
        $this->unitQuantity ??= new QuantityType();

        return $this->unitQuantity;
    }

    /**
     * @param  null|QuantityType $unitQuantity
     * @return static
     */
    public function setUnitQuantity(
        ?QuantityType $unitQuantity = null
    ): static {
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
