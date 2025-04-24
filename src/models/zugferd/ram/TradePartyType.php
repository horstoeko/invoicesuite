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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\udt\IDType>")
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
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\udt\IDType>")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLegalOrganization")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLegalOrganization", setter="setSpecifiedLegalOrganization")
     */
    private $specifiedLegalOrganization;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeContactType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeContactType>")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $postalTradeAddress;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("URIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIUniversalCommunication", setter="setURIUniversalCommunication")
     */
    private $uRIUniversalCommunication;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType>
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType>")
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
     * @param array<\horstoeko\invoicesuite\models\zugferd\udt\IDType> $iD
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
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $iD
     * @return self
     */
    public function addToID(IDType $iD): self
    {
        $this->iD[] = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function addToIDWithCreate(): IDType
    {
        $this->addToiD($iD = new IDType());

        return $iD;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\udt\IDType>|null
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\udt\IDType> $globalID
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
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $globalID
     * @return self
     */
    public function addToGlobalID(IDType $globalID): self
    {
        $this->globalID[] = $globalID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function addToGlobalIDWithCreate(): IDType
    {
        $this->addToglobalID($globalID = new IDType());

        return $globalID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $name
     * @return self
     */
    public function setName(TextType $name): self
    {
        $this->name = $name;

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
     * @param string $roleCode
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
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $description
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType|null
     */
    public function getSpecifiedLegalOrganization(): ?LegalOrganizationType
    {
        return $this->specifiedLegalOrganization;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType
     */
    public function getSpecifiedLegalOrganizationWithCreate(): LegalOrganizationType
    {
        $this->specifiedLegalOrganization = is_null($this->specifiedLegalOrganization) ? new LegalOrganizationType() : $this->specifiedLegalOrganization;

        return $this->specifiedLegalOrganization;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LegalOrganizationType $specifiedLegalOrganization
     * @return self
     */
    public function setSpecifiedLegalOrganization(LegalOrganizationType $specifiedLegalOrganization): self
    {
        $this->specifiedLegalOrganization = $specifiedLegalOrganization;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeContactType> $definedTradeContact
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType $definedTradeContact
     * @return self
     */
    public function addToDefinedTradeContact(TradeContactType $definedTradeContact): self
    {
        $this->definedTradeContact[] = $definedTradeContact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeContactType
     */
    public function addToDefinedTradeContactWithCreate(): TradeContactType
    {
        $this->addTodefinedTradeContact($definedTradeContact = new TradeContactType());

        return $definedTradeContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType|null
     */
    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->postalTradeAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): TradeAddressType
    {
        $this->postalTradeAddress = is_null($this->postalTradeAddress) ? new TradeAddressType() : $this->postalTradeAddress;

        return $this->postalTradeAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType $postalTradeAddress
     * @return self
     */
    public function setPostalTradeAddress(TradeAddressType $postalTradeAddress): self
    {
        $this->postalTradeAddress = $postalTradeAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType|null
     */
    public function getURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->uRIUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     */
    public function getURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->uRIUniversalCommunication = is_null($this->uRIUniversalCommunication) ? new UniversalCommunicationType() : $this->uRIUniversalCommunication;

        return $this->uRIUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType $uRIUniversalCommunication
     * @return self
     */
    public function setURIUniversalCommunication(UniversalCommunicationType $uRIUniversalCommunication): self
    {
        $this->uRIUniversalCommunication = $uRIUniversalCommunication;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType> $specifiedTaxRegistration
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType $specifiedTaxRegistration
     * @return self
     */
    public function addToSpecifiedTaxRegistration(TaxRegistrationType $specifiedTaxRegistration): self
    {
        $this->specifiedTaxRegistration[] = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TaxRegistrationType
     */
    public function addToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        $this->addTospecifiedTaxRegistration($specifiedTaxRegistration = new TaxRegistrationType());

        return $specifiedTaxRegistration;
    }
}
