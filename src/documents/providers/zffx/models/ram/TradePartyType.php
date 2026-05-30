<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class TradePartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<IDType>
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ID', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getRoleCode', setter: 'setRoleCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('RoleCode')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $roleCode;

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
     * @var null|LegalOrganizationType
     */
    #[JMS\Accessor(getter: 'getSpecifiedLegalOrganization', setter: 'setSpecifiedLegalOrganization')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedLegalOrganization')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\LegalOrganizationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $specifiedLegalOrganization;

    /**
     * @var null|array<TradeContactType>
     */
    #[JMS\Accessor(getter: 'getDefinedTradeContact', setter: 'setDefinedTradeContact')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DefinedTradeContact')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeContactType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DefinedTradeContact', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $definedTradeContact;

    /**
     * @var null|TradeAddressType
     */
    #[JMS\Accessor(getter: 'getPostalTradeAddress', setter: 'setPostalTradeAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PostalTradeAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAddressType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $postalTradeAddress;

    /**
     * @var null|UniversalCommunicationType
     */
    #[JMS\Accessor(getter: 'getURIUniversalCommunication', setter: 'setURIUniversalCommunication')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('URIUniversalCommunication')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $uRIUniversalCommunication;

    /**
     * @var null|array<TaxRegistrationType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedTaxRegistration', setter: 'setSpecifiedTaxRegistration')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTaxRegistration')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TaxRegistrationType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedTaxRegistration', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedTaxRegistration;

    /**
     * @return null|array<IDType>
     */
    public function getID(): ?array
    {
        return $this->iD;
    }

    /**
     * @param  null|array<IDType> $iD
     * @return static
     */
    public function setID(
        ?array $iD = null
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
     * @return static
     */
    public function clearID(): static
    {
        $this->iD = [];

        return $this;
    }

    /**
     * @param  IDType $iD
     * @return static
     */
    public function addToID(
        IDType $iD
    ): static {
        $this->iD[] = $iD;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addToIDWithCreate(): IDType
    {
        $this->addToiD($iD = new IDType());

        return $iD;
    }

    /**
     * @param  IDType $iD
     * @return static
     */
    public function addOnceToID(
        IDType $iD
    ): static {
        if (!is_array($this->iD)) {
            $this->iD = [];
        }

        $this->iD[0] = $iD;

        return $this;
    }

    /**
     * @return IDType
     */
    public function addOnceToIDWithCreate(): IDType
    {
        if (!is_array($this->iD)) {
            $this->iD = [];
        }

        if ([] === $this->iD) {
            $this->addOnceToiD(new IDType());
        }

        return $this->iD[0];
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
        $this->addToglobalID($globalID = new IDType());

        return $globalID;
    }

    /**
     * @param  IDType $globalID
     * @return static
     */
    public function addOnceToGlobalID(
        IDType $globalID
    ): static {
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
     * @return null|string
     */
    public function getRoleCode(): ?string
    {
        return $this->roleCode;
    }

    /**
     * @param  null|string $roleCode
     * @return static
     */
    public function setRoleCode(
        ?string $roleCode = null
    ): static {
        $this->roleCode = InvoiceSuiteStringUtils::asNullWhenEmpty($roleCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoleCode(): static
    {
        $this->roleCode = null;

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
     * @return null|LegalOrganizationType
     */
    public function getSpecifiedLegalOrganization(): ?LegalOrganizationType
    {
        return $this->specifiedLegalOrganization;
    }

    /**
     * @return LegalOrganizationType
     */
    public function getSpecifiedLegalOrganizationWithCreate(): LegalOrganizationType
    {
        $this->specifiedLegalOrganization ??= new LegalOrganizationType();

        return $this->specifiedLegalOrganization;
    }

    /**
     * @param  null|LegalOrganizationType $specifiedLegalOrganization
     * @return static
     */
    public function setSpecifiedLegalOrganization(
        ?LegalOrganizationType $specifiedLegalOrganization = null
    ): static {
        $this->specifiedLegalOrganization = $specifiedLegalOrganization;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedLegalOrganization(): static
    {
        $this->specifiedLegalOrganization = null;

        return $this;
    }

    /**
     * @return null|array<TradeContactType>
     */
    public function getDefinedTradeContact(): ?array
    {
        return $this->definedTradeContact;
    }

    /**
     * @param  null|array<TradeContactType> $definedTradeContact
     * @return static
     */
    public function setDefinedTradeContact(
        ?array $definedTradeContact = null
    ): static {
        $this->definedTradeContact = $definedTradeContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDefinedTradeContact(): static
    {
        $this->definedTradeContact = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDefinedTradeContact(): static
    {
        $this->definedTradeContact = [];

        return $this;
    }

    /**
     * @param  TradeContactType $definedTradeContact
     * @return static
     */
    public function addToDefinedTradeContact(
        TradeContactType $definedTradeContact
    ): static {
        $this->definedTradeContact[] = $definedTradeContact;

        return $this;
    }

    /**
     * @return TradeContactType
     */
    public function addToDefinedTradeContactWithCreate(): TradeContactType
    {
        $this->addTodefinedTradeContact($definedTradeContact = new TradeContactType());

        return $definedTradeContact;
    }

    /**
     * @param  TradeContactType $definedTradeContact
     * @return static
     */
    public function addOnceToDefinedTradeContact(
        TradeContactType $definedTradeContact
    ): static {
        if (!is_array($this->definedTradeContact)) {
            $this->definedTradeContact = [];
        }

        $this->definedTradeContact[0] = $definedTradeContact;

        return $this;
    }

    /**
     * @return TradeContactType
     */
    public function addOnceToDefinedTradeContactWithCreate(): TradeContactType
    {
        if (!is_array($this->definedTradeContact)) {
            $this->definedTradeContact = [];
        }

        if ([] === $this->definedTradeContact) {
            $this->addOnceTodefinedTradeContact(new TradeContactType());
        }

        return $this->definedTradeContact[0];
    }

    /**
     * @return null|TradeAddressType
     */
    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->postalTradeAddress;
    }

    /**
     * @return TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): TradeAddressType
    {
        $this->postalTradeAddress ??= new TradeAddressType();

        return $this->postalTradeAddress;
    }

    /**
     * @param  null|TradeAddressType $postalTradeAddress
     * @return static
     */
    public function setPostalTradeAddress(
        ?TradeAddressType $postalTradeAddress = null
    ): static {
        $this->postalTradeAddress = $postalTradeAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostalTradeAddress(): static
    {
        $this->postalTradeAddress = null;

        return $this;
    }

    /**
     * @return null|UniversalCommunicationType
     */
    public function getURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->uRIUniversalCommunication;
    }

    /**
     * @return UniversalCommunicationType
     */
    public function getURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->uRIUniversalCommunication ??= new UniversalCommunicationType();

        return $this->uRIUniversalCommunication;
    }

    /**
     * @param  null|UniversalCommunicationType $uRIUniversalCommunication
     * @return static
     */
    public function setURIUniversalCommunication(
        ?UniversalCommunicationType $uRIUniversalCommunication = null
    ): static {
        $this->uRIUniversalCommunication = $uRIUniversalCommunication;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURIUniversalCommunication(): static
    {
        $this->uRIUniversalCommunication = null;

        return $this;
    }

    /**
     * @return null|array<TaxRegistrationType>
     */
    public function getSpecifiedTaxRegistration(): ?array
    {
        return $this->specifiedTaxRegistration;
    }

    /**
     * @param  null|array<TaxRegistrationType> $specifiedTaxRegistration
     * @return static
     */
    public function setSpecifiedTaxRegistration(
        ?array $specifiedTaxRegistration = null
    ): static {
        $this->specifiedTaxRegistration = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTaxRegistration(): static
    {
        $this->specifiedTaxRegistration = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedTaxRegistration(): static
    {
        $this->specifiedTaxRegistration = [];

        return $this;
    }

    /**
     * @param  TaxRegistrationType $specifiedTaxRegistration
     * @return static
     */
    public function addToSpecifiedTaxRegistration(
        TaxRegistrationType $specifiedTaxRegistration
    ): static {
        $this->specifiedTaxRegistration[] = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return TaxRegistrationType
     */
    public function addToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        $this->addTospecifiedTaxRegistration($specifiedTaxRegistration = new TaxRegistrationType());

        return $specifiedTaxRegistration;
    }

    /**
     * @param  TaxRegistrationType $specifiedTaxRegistration
     * @return static
     */
    public function addOnceToSpecifiedTaxRegistration(
        TaxRegistrationType $specifiedTaxRegistration
    ): static {
        if (!is_array($this->specifiedTaxRegistration)) {
            $this->specifiedTaxRegistration = [];
        }

        $this->specifiedTaxRegistration[0] = $specifiedTaxRegistration;

        return $this;
    }

    /**
     * @return TaxRegistrationType
     */
    public function addOnceToSpecifiedTaxRegistrationWithCreate(): TaxRegistrationType
    {
        if (!is_array($this->specifiedTaxRegistration)) {
            $this->specifiedTaxRegistration = [];
        }

        if ([] === $this->specifiedTaxRegistration) {
            $this->addOnceTospecifiedTaxRegistration(new TaxRegistrationType());
        }

        return $this->specifiedTaxRegistration[0];
    }
}
