<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradePartyType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\udt\IDType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\udt\IDType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="GlobalID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
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
     * @var \horstoeko\invoicesuite\models\zffx\ram\LegalOrganizationType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\LegalOrganizationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLegalOrganization")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLegalOrganization", setter="setSpecifiedLegalOrganization")
     */
    private $legalOrganizationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeContactType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeContactType>")
     * @JMS\Expose
     * @JMS\SerializedName("DefinedTradeContact")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DefinedTradeContact", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDefinedTradeContact", setter="setDefinedTradeContact")
     */
    private $definedTradeContact;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeAddressType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $tradeAddressType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("URIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIUniversalCommunication", setter="setURIUniversalCommunication")
     */
    private $universalCommunicationType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType>
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTaxRegistration")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTaxRegistration", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTaxRegistration", setter="setSpecifiedTaxRegistration")
     */
    private $specifiedTaxRegistration;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\udt\IDType>|null
     */
    public function getID(): ?array
    {
        return $this->iD;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\udt\IDType> $iD
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
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function addToID(IDType $idType): self
    {
        $this->iD[] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function addToIDWithCreate(): IDType
    {
        $this->addToiD($idType = new IDType());

        return $idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function addOnceToID(IDType $idType): self
    {
        $this->iD[0] = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function addOnceToIDWithCreate(): IDType
    {
        if ($this->iD === []) {
            $this->addOnceToiD(new IDType());
        }

        return $this->iD[0];
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
     * @return \horstoeko\invoicesuite\models\zffx\ram\LegalOrganizationType|null
     */
    public function getSpecifiedLegalOrganization(): ?LegalOrganizationType
    {
        return $this->legalOrganizationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LegalOrganizationType
     */
    public function getSpecifiedLegalOrganizationWithCreate(): LegalOrganizationType
    {
        $this->legalOrganizationType = is_null($this->legalOrganizationType) ? new LegalOrganizationType() : $this->legalOrganizationType;

        return $this->legalOrganizationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LegalOrganizationType $legalOrganizationType
     * @return self
     */
    public function setSpecifiedLegalOrganization(LegalOrganizationType $legalOrganizationType): self
    {
        $this->legalOrganizationType = $legalOrganizationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeContactType>|null
     */
    public function getDefinedTradeContact(): ?array
    {
        return $this->definedTradeContact;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeContactType> $definedTradeContact
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeContactType $tradeContactType
     * @return self
     */
    public function addToDefinedTradeContact(TradeContactType $tradeContactType): self
    {
        $this->definedTradeContact[] = $tradeContactType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeContactType
     */
    public function addToDefinedTradeContactWithCreate(): TradeContactType
    {
        $this->addTodefinedTradeContact($tradeContactType = new TradeContactType());

        return $tradeContactType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeContactType $tradeContactType
     * @return self
     */
    public function addOnceToDefinedTradeContact(TradeContactType $tradeContactType): self
    {
        $this->definedTradeContact[0] = $tradeContactType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeContactType
     */
    public function addOnceToDefinedTradeContactWithCreate(): TradeContactType
    {
        if ($this->definedTradeContact === []) {
            $this->addOnceTodefinedTradeContact(new TradeContactType());
        }

        return $this->definedTradeContact[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAddressType|null
     */
    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->tradeAddressType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): TradeAddressType
    {
        $this->tradeAddressType = is_null($this->tradeAddressType) ? new TradeAddressType() : $this->tradeAddressType;

        return $this->tradeAddressType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeAddressType $tradeAddressType
     * @return self
     */
    public function setPostalTradeAddress(TradeAddressType $tradeAddressType): self
    {
        $this->tradeAddressType = $tradeAddressType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType|null
     */
    public function getURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->universalCommunicationType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     */
    public function getURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->universalCommunicationType = is_null($this->universalCommunicationType) ? new UniversalCommunicationType() : $this->universalCommunicationType;

        return $this->universalCommunicationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType $universalCommunicationType
     * @return self
     */
    public function setURIUniversalCommunication(UniversalCommunicationType $universalCommunicationType): self
    {
        $this->universalCommunicationType = $universalCommunicationType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType>|null
     */
    public function getSpecifiedTaxRegistration(): ?array
    {
        return $this->specifiedTaxRegistration;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType> $specifiedTaxRegistration
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType $taxRegistrationType
     * @return self
     */
    public function addToSpecifiedTaxRegistration(TaxRegistrationType $taxRegistrationType): self
    {
        $this->specifiedTaxRegistration[] = $taxRegistrationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType
     */
    public function addToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        $this->addTospecifiedTaxRegistration($taxRegistrationType = new TaxRegistrationType());

        return $taxRegistrationType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType $taxRegistrationType
     * @return self
     */
    public function addOnceToSpecifiedTaxRegistration(TaxRegistrationType $taxRegistrationType): self
    {
        $this->specifiedTaxRegistration[0] = $taxRegistrationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TaxRegistrationType
     */
    public function addOnceToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        if ($this->specifiedTaxRegistration === []) {
            $this->addOnceTospecifiedTaxRegistration(new TaxRegistrationType());
        }

        return $this->specifiedTaxRegistration[0];
    }
}
