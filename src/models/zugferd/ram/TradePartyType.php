<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradePartyType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="GlobalID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var string
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("RoleCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRoleCode", setter="setRoleCode")
     */
    private $roleCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\LegalOrganizationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLegalOrganization")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLegalOrganization", setter="setSpecifiedLegalOrganization")
     */
    private $legalOrganizationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeContactType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeContactType>")
     * @JMS\Expose
     * @JMS\SerializedName("DefinedTradeContact")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DefinedTradeContact", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDefinedTradeContact", setter="setDefinedTradeContact")
     */
    private $definedTradeContact;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $tradeAddressType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("URIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIUniversalCommunication", setter="setURIUniversalCommunication")
     */
    private $universalCommunicationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType>
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TaxRegistrationType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTaxRegistration")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTaxRegistration", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTaxRegistration", setter="setSpecifiedTaxRegistration")
     */
    private $specifiedTaxRegistration;

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>|null
     */
    public function getID(): ?array
    {
        return $this->iD;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>
     * @return self
     */
    public function setID(array $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function clearID(): self
    {
        $this->iD = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $idType
     * @return self
     */
    public function addToID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->iD[] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function addToIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->addToiD($idType = new IDType());

        return $idType;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>|null
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $idType
     * @return self
     */
    public function addToGlobalID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->globalID[] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function addToGlobalIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->addToglobalID($idType = new IDType());

        return $idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->name = $textType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoleCode(): ?string
    {
        return $this->roleCode;
    }

    /**
     * @param string
     * @return self
     */
    public function setRoleCode(string $roleCode): self
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDescription(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->description = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType|null
     */
    public function getSpecifiedLegalOrganization(): ?\horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
    {
        return $this->legalOrganizationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
     */
    public function getSpecifiedLegalOrganizationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType {
        $this->legalOrganizationType = is_null($this->legalOrganizationType) ? new LegalOrganizationType() : $this->legalOrganizationType;

        return $this->legalOrganizationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
     * @return self
     */
    public function setSpecifiedLegalOrganization(
        \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType $legalOrganizationType,
    ): self {
        $this->legalOrganizationType = $legalOrganizationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeContactType>|null
     */
    public function getDefinedTradeContact(): ?array
    {
        return $this->definedTradeContact;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeContactType>
     * @return self
     */
    public function setDefinedTradeContact(array $definedTradeContact): self
    {
        $this->definedTradeContact = $definedTradeContact;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDefinedTradeContact(): self
    {
        $this->definedTradeContact = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType $tradeContactType
     * @return self
     */
    public function addToDefinedTradeContact(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType $tradeContactType,
    ): self {
        $this->definedTradeContact[] = $tradeContactType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType
     */
    public function addToDefinedTradeContactWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType
    {
        $this->addTodefinedTradeContact($tradeContactType = new TradeContactType());

        return $tradeContactType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType|null
     */
    public function getPostalTradeAddress(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
    {
        return $this->tradeAddressType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
    {
        $this->tradeAddressType = is_null($this->tradeAddressType) ? new TradeAddressType() : $this->tradeAddressType;

        return $this->tradeAddressType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     * @return self
     */
    public function setPostalTradeAddress(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType $tradeAddressType,
    ): self {
        $this->tradeAddressType = $tradeAddressType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType|null
     */
    public function getURIUniversalCommunication(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        return $this->universalCommunicationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     */
    public function getURIUniversalCommunicationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        $this->universalCommunicationType = is_null($this->universalCommunicationType) ? new UniversalCommunicationType() : $this->universalCommunicationType;

        return $this->universalCommunicationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @return self
     */
    public function setURIUniversalCommunication(
        \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->universalCommunicationType = $universalCommunicationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType>|null
     */
    public function getSpecifiedTaxRegistration(): ?array
    {
        return $this->specifiedTaxRegistration;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType>
     * @return self
     */
    public function setSpecifiedTaxRegistration(array $specifiedTaxRegistration): self
    {
        $this->specifiedTaxRegistration = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedTaxRegistration(): self
    {
        $this->specifiedTaxRegistration = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType $taxRegistrationType
     * @return self
     */
    public function addToSpecifiedTaxRegistration(
        \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType $taxRegistrationType,
    ): self {
        $this->specifiedTaxRegistration[] = $taxRegistrationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType
     */
    public function addToSpecifiedTaxRegistrationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType {
        $this->addTospecifiedTaxRegistration($taxRegistrationType = new TaxRegistrationType());

        return $taxRegistrationType;
    }
}
