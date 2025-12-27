<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\EndpointID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\IndustryClassificationCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LogoReferenceID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\WebsiteURI;
use JMS\Serializer\Annotation as JMS;

class PartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("MarkCareIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkCareIndicator", setter="setMarkCareIndicator")
     */
    private $markCareIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("MarkAttentionIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkAttentionIndicator", setter="setMarkAttentionIndicator")
     */
    private $markAttentionIndicator;

    /**
     * @var null|WebsiteURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\WebsiteURI")
     * @JMS\Expose
     * @JMS\SerializedName("WebsiteURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWebsiteURI", setter="setWebsiteURI")
     */
    private $websiteURI;

    /**
     * @var null|LogoReferenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LogoReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("LogoReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLogoReferenceID", setter="setLogoReferenceID")
     */
    private $logoReferenceID;

    /**
     * @var null|EndpointID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\EndpointID")
     * @JMS\Expose
     * @JMS\SerializedName("EndpointID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndpointID", setter="setEndpointID")
     */
    private $endpointID;

    /**
     * @var null|IndustryClassificationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\IndustryClassificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("IndustryClassificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIndustryClassificationCode", setter="setIndustryClassificationCode")
     */
    private $industryClassificationCode;

    /**
     * @var null|array<PartyIdentification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PartyIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyIdentification", setter="setPartyIdentification")
     */
    private $partyIdentification;

    /**
     * @var null|array<PartyName>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PartyName>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyName", setter="setPartyName")
     */
    private $partyName;

    /**
     * @var null|Language
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Language")
     * @JMS\Expose
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguage", setter="setLanguage")
     */
    private $language;

    /**
     * @var null|PostalAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PostalAddress")
     * @JMS\Expose
     * @JMS\SerializedName("PostalAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostalAddress", setter="setPostalAddress")
     */
    private $postalAddress;

    /**
     * @var null|PhysicalLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PhysicalLocation")
     * @JMS\Expose
     * @JMS\SerializedName("PhysicalLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPhysicalLocation", setter="setPhysicalLocation")
     */
    private $physicalLocation;

    /**
     * @var null|array<PartyTaxScheme>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PartyTaxScheme>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyTaxScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyTaxScheme", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyTaxScheme", setter="setPartyTaxScheme")
     */
    private $partyTaxScheme;

    /**
     * @var null|array<PartyLegalEntity>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PartyLegalEntity>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyLegalEntity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyLegalEntity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyLegalEntity", setter="setPartyLegalEntity")
     */
    private $partyLegalEntity;

    /**
     * @var null|Contact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Contact")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var null|array<Person>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Person>")
     * @JMS\Expose
     * @JMS\SerializedName("Person")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Person", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPerson", setter="setPerson")
     */
    private $person;

    /**
     * @var null|AgentParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AgentParty")
     * @JMS\Expose
     * @JMS\SerializedName("AgentParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgentParty", setter="setAgentParty")
     */
    private $agentParty;

    /**
     * @var null|array<ServiceProviderParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ServiceProviderParty>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceProviderParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getServiceProviderParty", setter="setServiceProviderParty")
     */
    private $serviceProviderParty;

    /**
     * @var null|array<PowerOfAttorney>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PowerOfAttorney>")
     * @JMS\Expose
     * @JMS\SerializedName("PowerOfAttorney")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PowerOfAttorney", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPowerOfAttorney", setter="setPowerOfAttorney")
     */
    private $powerOfAttorney;

    /**
     * @var null|FinancialAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\FinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("FinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancialAccount", setter="setFinancialAccount")
     */
    private $financialAccount;

    /**
     * @return null|bool
     */
    public function getMarkCareIndicator(): ?bool
    {
        return $this->markCareIndicator;
    }

    /**
     * @param  null|bool $markCareIndicator
     * @return static
     */
    public function setMarkCareIndicator(?bool $markCareIndicator = null): static
    {
        $this->markCareIndicator = $markCareIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMarkCareIndicator(): static
    {
        $this->markCareIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getMarkAttentionIndicator(): ?bool
    {
        return $this->markAttentionIndicator;
    }

    /**
     * @param  null|bool $markAttentionIndicator
     * @return static
     */
    public function setMarkAttentionIndicator(?bool $markAttentionIndicator = null): static
    {
        $this->markAttentionIndicator = $markAttentionIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMarkAttentionIndicator(): static
    {
        $this->markAttentionIndicator = null;

        return $this;
    }

    /**
     * @return null|WebsiteURI
     */
    public function getWebsiteURI(): ?WebsiteURI
    {
        return $this->websiteURI;
    }

    /**
     * @return WebsiteURI
     */
    public function getWebsiteURIWithCreate(): WebsiteURI
    {
        $this->websiteURI = is_null($this->websiteURI) ? new WebsiteURI() : $this->websiteURI;

        return $this->websiteURI;
    }

    /**
     * @param  null|WebsiteURI $websiteURI
     * @return static
     */
    public function setWebsiteURI(?WebsiteURI $websiteURI = null): static
    {
        $this->websiteURI = $websiteURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWebsiteURI(): static
    {
        $this->websiteURI = null;

        return $this;
    }

    /**
     * @return null|LogoReferenceID
     */
    public function getLogoReferenceID(): ?LogoReferenceID
    {
        return $this->logoReferenceID;
    }

    /**
     * @return LogoReferenceID
     */
    public function getLogoReferenceIDWithCreate(): LogoReferenceID
    {
        $this->logoReferenceID = is_null($this->logoReferenceID) ? new LogoReferenceID() : $this->logoReferenceID;

        return $this->logoReferenceID;
    }

    /**
     * @param  null|LogoReferenceID $logoReferenceID
     * @return static
     */
    public function setLogoReferenceID(?LogoReferenceID $logoReferenceID = null): static
    {
        $this->logoReferenceID = $logoReferenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLogoReferenceID(): static
    {
        $this->logoReferenceID = null;

        return $this;
    }

    /**
     * @return null|EndpointID
     */
    public function getEndpointID(): ?EndpointID
    {
        return $this->endpointID;
    }

    /**
     * @return EndpointID
     */
    public function getEndpointIDWithCreate(): EndpointID
    {
        $this->endpointID = is_null($this->endpointID) ? new EndpointID() : $this->endpointID;

        return $this->endpointID;
    }

    /**
     * @param  null|EndpointID $endpointID
     * @return static
     */
    public function setEndpointID(?EndpointID $endpointID = null): static
    {
        $this->endpointID = $endpointID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndpointID(): static
    {
        $this->endpointID = null;

        return $this;
    }

    /**
     * @return null|IndustryClassificationCode
     */
    public function getIndustryClassificationCode(): ?IndustryClassificationCode
    {
        return $this->industryClassificationCode;
    }

    /**
     * @return IndustryClassificationCode
     */
    public function getIndustryClassificationCodeWithCreate(): IndustryClassificationCode
    {
        $this->industryClassificationCode = is_null($this->industryClassificationCode) ? new IndustryClassificationCode() : $this->industryClassificationCode;

        return $this->industryClassificationCode;
    }

    /**
     * @param  null|IndustryClassificationCode $industryClassificationCode
     * @return static
     */
    public function setIndustryClassificationCode(
        ?IndustryClassificationCode $industryClassificationCode = null,
    ): static {
        $this->industryClassificationCode = $industryClassificationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIndustryClassificationCode(): static
    {
        $this->industryClassificationCode = null;

        return $this;
    }

    /**
     * @return null|array<PartyIdentification>
     */
    public function getPartyIdentification(): ?array
    {
        return $this->partyIdentification;
    }

    /**
     * @param  null|array<PartyIdentification> $partyIdentification
     * @return static
     */
    public function setPartyIdentification(?array $partyIdentification = null): static
    {
        $this->partyIdentification = $partyIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyIdentification(): static
    {
        $this->partyIdentification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPartyIdentification(): static
    {
        $this->partyIdentification = [];

        return $this;
    }

    /**
     * @return null|PartyIdentification
     */
    public function firstPartyIdentification(): ?PartyIdentification
    {
        $partyIdentification = $this->partyIdentification ?? [];
        $partyIdentification = reset($partyIdentification);

        if (false === $partyIdentification) {
            return null;
        }

        return $partyIdentification;
    }

    /**
     * @return null|PartyIdentification
     */
    public function lastPartyIdentification(): ?PartyIdentification
    {
        $partyIdentification = $this->partyIdentification ?? [];
        $partyIdentification = end($partyIdentification);

        if (false === $partyIdentification) {
            return null;
        }

        return $partyIdentification;
    }

    /**
     * @param  PartyIdentification $partyIdentification
     * @return static
     */
    public function addToPartyIdentification(PartyIdentification $partyIdentification): static
    {
        $this->partyIdentification[] = $partyIdentification;

        return $this;
    }

    /**
     * @return PartyIdentification
     */
    public function addToPartyIdentificationWithCreate(): PartyIdentification
    {
        $this->addTopartyIdentification($partyIdentification = new PartyIdentification());

        return $partyIdentification;
    }

    /**
     * @param  PartyIdentification $partyIdentification
     * @return static
     */
    public function addOnceToPartyIdentification(PartyIdentification $partyIdentification): static
    {
        if (!is_array($this->partyIdentification)) {
            $this->partyIdentification = [];
        }

        $this->partyIdentification[0] = $partyIdentification;

        return $this;
    }

    /**
     * @return PartyIdentification
     */
    public function addOnceToPartyIdentificationWithCreate(): PartyIdentification
    {
        if (!is_array($this->partyIdentification)) {
            $this->partyIdentification = [];
        }

        if ([] === $this->partyIdentification) {
            $this->addOnceTopartyIdentification(new PartyIdentification());
        }

        return $this->partyIdentification[0];
    }

    /**
     * @return null|array<PartyName>
     */
    public function getPartyName(): ?array
    {
        return $this->partyName;
    }

    /**
     * @param  null|array<PartyName> $partyName
     * @return static
     */
    public function setPartyName(?array $partyName = null): static
    {
        $this->partyName = $partyName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyName(): static
    {
        $this->partyName = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPartyName(): static
    {
        $this->partyName = [];

        return $this;
    }

    /**
     * @return null|PartyName
     */
    public function firstPartyName(): ?PartyName
    {
        $partyName = $this->partyName ?? [];
        $partyName = reset($partyName);

        if (false === $partyName) {
            return null;
        }

        return $partyName;
    }

    /**
     * @return null|PartyName
     */
    public function lastPartyName(): ?PartyName
    {
        $partyName = $this->partyName ?? [];
        $partyName = end($partyName);

        if (false === $partyName) {
            return null;
        }

        return $partyName;
    }

    /**
     * @param  PartyName $partyName
     * @return static
     */
    public function addToPartyName(PartyName $partyName): static
    {
        $this->partyName[] = $partyName;

        return $this;
    }

    /**
     * @return PartyName
     */
    public function addToPartyNameWithCreate(): PartyName
    {
        $this->addTopartyName($partyName = new PartyName());

        return $partyName;
    }

    /**
     * @param  PartyName $partyName
     * @return static
     */
    public function addOnceToPartyName(PartyName $partyName): static
    {
        if (!is_array($this->partyName)) {
            $this->partyName = [];
        }

        $this->partyName[0] = $partyName;

        return $this;
    }

    /**
     * @return PartyName
     */
    public function addOnceToPartyNameWithCreate(): PartyName
    {
        if (!is_array($this->partyName)) {
            $this->partyName = [];
        }

        if ([] === $this->partyName) {
            $this->addOnceTopartyName(new PartyName());
        }

        return $this->partyName[0];
    }

    /**
     * @return null|Language
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return Language
     */
    public function getLanguageWithCreate(): Language
    {
        $this->language = is_null($this->language) ? new Language() : $this->language;

        return $this->language;
    }

    /**
     * @param  null|Language $language
     * @return static
     */
    public function setLanguage(?Language $language = null): static
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguage(): static
    {
        $this->language = null;

        return $this;
    }

    /**
     * @return null|PostalAddress
     */
    public function getPostalAddress(): ?PostalAddress
    {
        return $this->postalAddress;
    }

    /**
     * @return PostalAddress
     */
    public function getPostalAddressWithCreate(): PostalAddress
    {
        $this->postalAddress = is_null($this->postalAddress) ? new PostalAddress() : $this->postalAddress;

        return $this->postalAddress;
    }

    /**
     * @param  null|PostalAddress $postalAddress
     * @return static
     */
    public function setPostalAddress(?PostalAddress $postalAddress = null): static
    {
        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostalAddress(): static
    {
        $this->postalAddress = null;

        return $this;
    }

    /**
     * @return null|PhysicalLocation
     */
    public function getPhysicalLocation(): ?PhysicalLocation
    {
        return $this->physicalLocation;
    }

    /**
     * @return PhysicalLocation
     */
    public function getPhysicalLocationWithCreate(): PhysicalLocation
    {
        $this->physicalLocation = is_null($this->physicalLocation) ? new PhysicalLocation() : $this->physicalLocation;

        return $this->physicalLocation;
    }

    /**
     * @param  null|PhysicalLocation $physicalLocation
     * @return static
     */
    public function setPhysicalLocation(?PhysicalLocation $physicalLocation = null): static
    {
        $this->physicalLocation = $physicalLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPhysicalLocation(): static
    {
        $this->physicalLocation = null;

        return $this;
    }

    /**
     * @return null|array<PartyTaxScheme>
     */
    public function getPartyTaxScheme(): ?array
    {
        return $this->partyTaxScheme;
    }

    /**
     * @param  null|array<PartyTaxScheme> $partyTaxScheme
     * @return static
     */
    public function setPartyTaxScheme(?array $partyTaxScheme = null): static
    {
        $this->partyTaxScheme = $partyTaxScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyTaxScheme(): static
    {
        $this->partyTaxScheme = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPartyTaxScheme(): static
    {
        $this->partyTaxScheme = [];

        return $this;
    }

    /**
     * @return null|PartyTaxScheme
     */
    public function firstPartyTaxScheme(): ?PartyTaxScheme
    {
        $partyTaxScheme = $this->partyTaxScheme ?? [];
        $partyTaxScheme = reset($partyTaxScheme);

        if (false === $partyTaxScheme) {
            return null;
        }

        return $partyTaxScheme;
    }

    /**
     * @return null|PartyTaxScheme
     */
    public function lastPartyTaxScheme(): ?PartyTaxScheme
    {
        $partyTaxScheme = $this->partyTaxScheme ?? [];
        $partyTaxScheme = end($partyTaxScheme);

        if (false === $partyTaxScheme) {
            return null;
        }

        return $partyTaxScheme;
    }

    /**
     * @param  PartyTaxScheme $partyTaxScheme
     * @return static
     */
    public function addToPartyTaxScheme(PartyTaxScheme $partyTaxScheme): static
    {
        $this->partyTaxScheme[] = $partyTaxScheme;

        return $this;
    }

    /**
     * @return PartyTaxScheme
     */
    public function addToPartyTaxSchemeWithCreate(): PartyTaxScheme
    {
        $this->addTopartyTaxScheme($partyTaxScheme = new PartyTaxScheme());

        return $partyTaxScheme;
    }

    /**
     * @param  PartyTaxScheme $partyTaxScheme
     * @return static
     */
    public function addOnceToPartyTaxScheme(PartyTaxScheme $partyTaxScheme): static
    {
        if (!is_array($this->partyTaxScheme)) {
            $this->partyTaxScheme = [];
        }

        $this->partyTaxScheme[0] = $partyTaxScheme;

        return $this;
    }

    /**
     * @return PartyTaxScheme
     */
    public function addOnceToPartyTaxSchemeWithCreate(): PartyTaxScheme
    {
        if (!is_array($this->partyTaxScheme)) {
            $this->partyTaxScheme = [];
        }

        if ([] === $this->partyTaxScheme) {
            $this->addOnceTopartyTaxScheme(new PartyTaxScheme());
        }

        return $this->partyTaxScheme[0];
    }

    /**
     * @return null|array<PartyLegalEntity>
     */
    public function getPartyLegalEntity(): ?array
    {
        return $this->partyLegalEntity;
    }

    /**
     * @param  null|array<PartyLegalEntity> $partyLegalEntity
     * @return static
     */
    public function setPartyLegalEntity(?array $partyLegalEntity = null): static
    {
        $this->partyLegalEntity = $partyLegalEntity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartyLegalEntity(): static
    {
        $this->partyLegalEntity = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPartyLegalEntity(): static
    {
        $this->partyLegalEntity = [];

        return $this;
    }

    /**
     * @return null|PartyLegalEntity
     */
    public function firstPartyLegalEntity(): ?PartyLegalEntity
    {
        $partyLegalEntity = $this->partyLegalEntity ?? [];
        $partyLegalEntity = reset($partyLegalEntity);

        if (false === $partyLegalEntity) {
            return null;
        }

        return $partyLegalEntity;
    }

    /**
     * @return null|PartyLegalEntity
     */
    public function lastPartyLegalEntity(): ?PartyLegalEntity
    {
        $partyLegalEntity = $this->partyLegalEntity ?? [];
        $partyLegalEntity = end($partyLegalEntity);

        if (false === $partyLegalEntity) {
            return null;
        }

        return $partyLegalEntity;
    }

    /**
     * @param  PartyLegalEntity $partyLegalEntity
     * @return static
     */
    public function addToPartyLegalEntity(PartyLegalEntity $partyLegalEntity): static
    {
        $this->partyLegalEntity[] = $partyLegalEntity;

        return $this;
    }

    /**
     * @return PartyLegalEntity
     */
    public function addToPartyLegalEntityWithCreate(): PartyLegalEntity
    {
        $this->addTopartyLegalEntity($partyLegalEntity = new PartyLegalEntity());

        return $partyLegalEntity;
    }

    /**
     * @param  PartyLegalEntity $partyLegalEntity
     * @return static
     */
    public function addOnceToPartyLegalEntity(PartyLegalEntity $partyLegalEntity): static
    {
        if (!is_array($this->partyLegalEntity)) {
            $this->partyLegalEntity = [];
        }

        $this->partyLegalEntity[0] = $partyLegalEntity;

        return $this;
    }

    /**
     * @return PartyLegalEntity
     */
    public function addOnceToPartyLegalEntityWithCreate(): PartyLegalEntity
    {
        if (!is_array($this->partyLegalEntity)) {
            $this->partyLegalEntity = [];
        }

        if ([] === $this->partyLegalEntity) {
            $this->addOnceTopartyLegalEntity(new PartyLegalEntity());
        }

        return $this->partyLegalEntity[0];
    }

    /**
     * @return null|Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return Contact
     */
    public function getContactWithCreate(): Contact
    {
        $this->contact = is_null($this->contact) ? new Contact() : $this->contact;

        return $this->contact;
    }

    /**
     * @param  null|Contact $contact
     * @return static
     */
    public function setContact(?Contact $contact = null): static
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContact(): static
    {
        $this->contact = null;

        return $this;
    }

    /**
     * @return null|array<Person>
     */
    public function getPerson(): ?array
    {
        return $this->person;
    }

    /**
     * @param  null|array<Person> $person
     * @return static
     */
    public function setPerson(?array $person = null): static
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerson(): static
    {
        $this->person = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPerson(): static
    {
        $this->person = [];

        return $this;
    }

    /**
     * @return null|Person
     */
    public function firstPerson(): ?Person
    {
        $person = $this->person ?? [];
        $person = reset($person);

        if (false === $person) {
            return null;
        }

        return $person;
    }

    /**
     * @return null|Person
     */
    public function lastPerson(): ?Person
    {
        $person = $this->person ?? [];
        $person = end($person);

        if (false === $person) {
            return null;
        }

        return $person;
    }

    /**
     * @param  Person $person
     * @return static
     */
    public function addToPerson(Person $person): static
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * @return Person
     */
    public function addToPersonWithCreate(): Person
    {
        $this->addToperson($person = new Person());

        return $person;
    }

    /**
     * @param  Person $person
     * @return static
     */
    public function addOnceToPerson(Person $person): static
    {
        if (!is_array($this->person)) {
            $this->person = [];
        }

        $this->person[0] = $person;

        return $this;
    }

    /**
     * @return Person
     */
    public function addOnceToPersonWithCreate(): Person
    {
        if (!is_array($this->person)) {
            $this->person = [];
        }

        if ([] === $this->person) {
            $this->addOnceToperson(new Person());
        }

        return $this->person[0];
    }

    /**
     * @return null|AgentParty
     */
    public function getAgentParty(): ?AgentParty
    {
        return $this->agentParty;
    }

    /**
     * @return AgentParty
     */
    public function getAgentPartyWithCreate(): AgentParty
    {
        $this->agentParty = is_null($this->agentParty) ? new AgentParty() : $this->agentParty;

        return $this->agentParty;
    }

    /**
     * @param  null|AgentParty $agentParty
     * @return static
     */
    public function setAgentParty(?AgentParty $agentParty = null): static
    {
        $this->agentParty = $agentParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAgentParty(): static
    {
        $this->agentParty = null;

        return $this;
    }

    /**
     * @return null|array<ServiceProviderParty>
     */
    public function getServiceProviderParty(): ?array
    {
        return $this->serviceProviderParty;
    }

    /**
     * @param  null|array<ServiceProviderParty> $serviceProviderParty
     * @return static
     */
    public function setServiceProviderParty(?array $serviceProviderParty = null): static
    {
        $this->serviceProviderParty = $serviceProviderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceProviderParty(): static
    {
        $this->serviceProviderParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearServiceProviderParty(): static
    {
        $this->serviceProviderParty = [];

        return $this;
    }

    /**
     * @return null|ServiceProviderParty
     */
    public function firstServiceProviderParty(): ?ServiceProviderParty
    {
        $serviceProviderParty = $this->serviceProviderParty ?? [];
        $serviceProviderParty = reset($serviceProviderParty);

        if (false === $serviceProviderParty) {
            return null;
        }

        return $serviceProviderParty;
    }

    /**
     * @return null|ServiceProviderParty
     */
    public function lastServiceProviderParty(): ?ServiceProviderParty
    {
        $serviceProviderParty = $this->serviceProviderParty ?? [];
        $serviceProviderParty = end($serviceProviderParty);

        if (false === $serviceProviderParty) {
            return null;
        }

        return $serviceProviderParty;
    }

    /**
     * @param  ServiceProviderParty $serviceProviderParty
     * @return static
     */
    public function addToServiceProviderParty(ServiceProviderParty $serviceProviderParty): static
    {
        $this->serviceProviderParty[] = $serviceProviderParty;

        return $this;
    }

    /**
     * @return ServiceProviderParty
     */
    public function addToServiceProviderPartyWithCreate(): ServiceProviderParty
    {
        $this->addToserviceProviderParty($serviceProviderParty = new ServiceProviderParty());

        return $serviceProviderParty;
    }

    /**
     * @param  ServiceProviderParty $serviceProviderParty
     * @return static
     */
    public function addOnceToServiceProviderParty(ServiceProviderParty $serviceProviderParty): static
    {
        if (!is_array($this->serviceProviderParty)) {
            $this->serviceProviderParty = [];
        }

        $this->serviceProviderParty[0] = $serviceProviderParty;

        return $this;
    }

    /**
     * @return ServiceProviderParty
     */
    public function addOnceToServiceProviderPartyWithCreate(): ServiceProviderParty
    {
        if (!is_array($this->serviceProviderParty)) {
            $this->serviceProviderParty = [];
        }

        if ([] === $this->serviceProviderParty) {
            $this->addOnceToserviceProviderParty(new ServiceProviderParty());
        }

        return $this->serviceProviderParty[0];
    }

    /**
     * @return null|array<PowerOfAttorney>
     */
    public function getPowerOfAttorney(): ?array
    {
        return $this->powerOfAttorney;
    }

    /**
     * @param  null|array<PowerOfAttorney> $powerOfAttorney
     * @return static
     */
    public function setPowerOfAttorney(?array $powerOfAttorney = null): static
    {
        $this->powerOfAttorney = $powerOfAttorney;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPowerOfAttorney(): static
    {
        $this->powerOfAttorney = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPowerOfAttorney(): static
    {
        $this->powerOfAttorney = [];

        return $this;
    }

    /**
     * @return null|PowerOfAttorney
     */
    public function firstPowerOfAttorney(): ?PowerOfAttorney
    {
        $powerOfAttorney = $this->powerOfAttorney ?? [];
        $powerOfAttorney = reset($powerOfAttorney);

        if (false === $powerOfAttorney) {
            return null;
        }

        return $powerOfAttorney;
    }

    /**
     * @return null|PowerOfAttorney
     */
    public function lastPowerOfAttorney(): ?PowerOfAttorney
    {
        $powerOfAttorney = $this->powerOfAttorney ?? [];
        $powerOfAttorney = end($powerOfAttorney);

        if (false === $powerOfAttorney) {
            return null;
        }

        return $powerOfAttorney;
    }

    /**
     * @param  PowerOfAttorney $powerOfAttorney
     * @return static
     */
    public function addToPowerOfAttorney(PowerOfAttorney $powerOfAttorney): static
    {
        $this->powerOfAttorney[] = $powerOfAttorney;

        return $this;
    }

    /**
     * @return PowerOfAttorney
     */
    public function addToPowerOfAttorneyWithCreate(): PowerOfAttorney
    {
        $this->addTopowerOfAttorney($powerOfAttorney = new PowerOfAttorney());

        return $powerOfAttorney;
    }

    /**
     * @param  PowerOfAttorney $powerOfAttorney
     * @return static
     */
    public function addOnceToPowerOfAttorney(PowerOfAttorney $powerOfAttorney): static
    {
        if (!is_array($this->powerOfAttorney)) {
            $this->powerOfAttorney = [];
        }

        $this->powerOfAttorney[0] = $powerOfAttorney;

        return $this;
    }

    /**
     * @return PowerOfAttorney
     */
    public function addOnceToPowerOfAttorneyWithCreate(): PowerOfAttorney
    {
        if (!is_array($this->powerOfAttorney)) {
            $this->powerOfAttorney = [];
        }

        if ([] === $this->powerOfAttorney) {
            $this->addOnceTopowerOfAttorney(new PowerOfAttorney());
        }

        return $this->powerOfAttorney[0];
    }

    /**
     * @return null|FinancialAccount
     */
    public function getFinancialAccount(): ?FinancialAccount
    {
        return $this->financialAccount;
    }

    /**
     * @return FinancialAccount
     */
    public function getFinancialAccountWithCreate(): FinancialAccount
    {
        $this->financialAccount = is_null($this->financialAccount) ? new FinancialAccount() : $this->financialAccount;

        return $this->financialAccount;
    }

    /**
     * @param  null|FinancialAccount $financialAccount
     * @return static
     */
    public function setFinancialAccount(?FinancialAccount $financialAccount = null): static
    {
        $this->financialAccount = $financialAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancialAccount(): static
    {
        $this->financialAccount = null;

        return $this;
    }
}
