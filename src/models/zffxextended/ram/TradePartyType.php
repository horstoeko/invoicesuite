<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class TradePartyType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="ID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\udt\IDType>")
     * @JMS\Expose
     * @JMS\SerializedName("GlobalID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="GlobalID", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getGlobalID", setter="setGlobalID")
     */
    private $globalID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var string|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("RoleCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getRoleCode", setter="setRoleCode")
     */
    private $roleCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLegalOrganization")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLegalOrganization", setter="setSpecifiedLegalOrganization")
     */
    private $specifiedLegalOrganization;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>")
     * @JMS\Expose
     * @JMS\SerializedName("DefinedTradeContact")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="DefinedTradeContact", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getDefinedTradeContact", setter="setDefinedTradeContact")
     */
    private $definedTradeContact;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $postalTradeAddress;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("URIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIUniversalCommunication", setter="setURIUniversalCommunication")
     */
    private $uRIUniversalCommunication;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTaxRegistration")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTaxRegistration", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTaxRegistration", setter="setSpecifiedTaxRegistration")
     */
    private $specifiedTaxRegistration;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null
     */
    public function getID(): ?array
    {
        return $this->iD;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null $iD
     * @return self
     */
    public function setID(?array $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $iD
     * @return self
     */
    public function addToID(IDType $iD): self
    {
        $this->iD[] = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addToIDWithCreate(): IDType
    {
        $this->addToiD($iD = new IDType());

        return $iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $iD
     * @return self
     */
    public function addOnceToID(IDType $iD): self
    {
        if (!is_array($this->iD)) {
            $this->iD = [];
        }

        $this->iD[0] = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addOnceToIDWithCreate(): IDType
    {
        if (!is_array($this->iD)) {
            $this->iD = [];
        }

        if ($this->iD === []) {
            $this->addOnceToiD(new IDType());
        }

        return $this->iD[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>|null $globalID
     * @return self
     */
    public function setGlobalID(?array $globalID = null): self
    {
        $this->globalID = $globalID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGlobalID(): self
    {
        $this->globalID = null;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $globalID
     * @return self
     */
    public function addToGlobalID(IDType $globalID): self
    {
        $this->globalID[] = $globalID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addToGlobalIDWithCreate(): IDType
    {
        $this->addToglobalID($globalID = new IDType());

        return $globalID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType $globalID
     * @return self
     */
    public function addOnceToGlobalID(IDType $globalID): self
    {
        if (!is_array($this->globalID)) {
            $this->globalID = [];
        }

        $this->globalID[0] = $globalID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function addOnceToGlobalIDWithCreate(): IDType
    {
        if (!is_array($this->globalID)) {
            $this->globalID = [];
        }

        if ($this->globalID === []) {
            $this->addOnceToglobalID(new IDType());
        }

        return $this->globalID[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null $name
     * @return self
     */
    public function setName(?TextType $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

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
     * @param string|null $roleCode
     * @return self
     */
    public function setRoleCode(?string $roleCode = null): self
    {
        $this->roleCode = InvoiceSuiteStringUtils::asNullWhenEmpty($roleCode);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRoleCode(): self
    {
        $this->roleCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null $description
     * @return self
     */
    public function setDescription(?TextType $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType|null
     */
    public function getSpecifiedLegalOrganization(): ?LegalOrganizationType
    {
        return $this->specifiedLegalOrganization;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
     */
    public function getSpecifiedLegalOrganizationWithCreate(): LegalOrganizationType
    {
        $this->specifiedLegalOrganization = is_null($this->specifiedLegalOrganization) ? new LegalOrganizationType() : $this->specifiedLegalOrganization;

        return $this->specifiedLegalOrganization;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType|null $specifiedLegalOrganization
     * @return self
     */
    public function setSpecifiedLegalOrganization(?LegalOrganizationType $specifiedLegalOrganization = null): self
    {
        $this->specifiedLegalOrganization = $specifiedLegalOrganization;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedLegalOrganization(): self
    {
        $this->specifiedLegalOrganization = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>|null
     */
    public function getDefinedTradeContact(): ?array
    {
        return $this->definedTradeContact;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>|null $definedTradeContact
     * @return self
     */
    public function setDefinedTradeContact(?array $definedTradeContact = null): self
    {
        $this->definedTradeContact = $definedTradeContact;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDefinedTradeContact(): self
    {
        $this->definedTradeContact = null;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType $definedTradeContact
     * @return self
     */
    public function addToDefinedTradeContact(TradeContactType $definedTradeContact): self
    {
        $this->definedTradeContact[] = $definedTradeContact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
     */
    public function addToDefinedTradeContactWithCreate(): TradeContactType
    {
        $this->addTodefinedTradeContact($definedTradeContact = new TradeContactType());

        return $definedTradeContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType $definedTradeContact
     * @return self
     */
    public function addOnceToDefinedTradeContact(TradeContactType $definedTradeContact): self
    {
        if (!is_array($this->definedTradeContact)) {
            $this->definedTradeContact = [];
        }

        $this->definedTradeContact[0] = $definedTradeContact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
     */
    public function addOnceToDefinedTradeContactWithCreate(): TradeContactType
    {
        if (!is_array($this->definedTradeContact)) {
            $this->definedTradeContact = [];
        }

        if ($this->definedTradeContact === []) {
            $this->addOnceTodefinedTradeContact(new TradeContactType());
        }

        return $this->definedTradeContact[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType|null
     */
    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->postalTradeAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): TradeAddressType
    {
        $this->postalTradeAddress = is_null($this->postalTradeAddress) ? new TradeAddressType() : $this->postalTradeAddress;

        return $this->postalTradeAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType|null $postalTradeAddress
     * @return self
     */
    public function setPostalTradeAddress(?TradeAddressType $postalTradeAddress = null): self
    {
        $this->postalTradeAddress = $postalTradeAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPostalTradeAddress(): self
    {
        $this->postalTradeAddress = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     */
    public function getURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->uRIUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
     */
    public function getURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->uRIUniversalCommunication = is_null($this->uRIUniversalCommunication) ? new UniversalCommunicationType() : $this->uRIUniversalCommunication;

        return $this->uRIUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null $uRIUniversalCommunication
     * @return self
     */
    public function setURIUniversalCommunication(?UniversalCommunicationType $uRIUniversalCommunication = null): self
    {
        $this->uRIUniversalCommunication = $uRIUniversalCommunication;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetURIUniversalCommunication(): self
    {
        $this->uRIUniversalCommunication = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>|null
     */
    public function getSpecifiedTaxRegistration(): ?array
    {
        return $this->specifiedTaxRegistration;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>|null $specifiedTaxRegistration
     * @return self
     */
    public function setSpecifiedTaxRegistration(?array $specifiedTaxRegistration = null): self
    {
        $this->specifiedTaxRegistration = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTaxRegistration(): self
    {
        $this->specifiedTaxRegistration = null;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType $specifiedTaxRegistration
     * @return self
     */
    public function addToSpecifiedTaxRegistration(TaxRegistrationType $specifiedTaxRegistration): self
    {
        $this->specifiedTaxRegistration[] = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
     */
    public function addToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        $this->addTospecifiedTaxRegistration($specifiedTaxRegistration = new TaxRegistrationType());

        return $specifiedTaxRegistration;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType $specifiedTaxRegistration
     * @return self
     */
    public function addOnceToSpecifiedTaxRegistration(TaxRegistrationType $specifiedTaxRegistration): self
    {
        if (!is_array($this->specifiedTaxRegistration)) {
            $this->specifiedTaxRegistration = [];
        }

        $this->specifiedTaxRegistration[0] = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
     */
    public function addOnceToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        if (!is_array($this->specifiedTaxRegistration)) {
            $this->specifiedTaxRegistration = [];
        }

        if ($this->specifiedTaxRegistration === []) {
            $this->addOnceTospecifiedTaxRegistration(new TaxRegistrationType());
        }

        return $this->specifiedTaxRegistration[0];
    }
}
