<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\EndpointID;
use horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode;
use horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID;
use horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI;

class PartyType
{
    use HandlesObjectFlags;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("MarkCareIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkCareIndicator", setter="setMarkCareIndicator")
     */
    private $markCareIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("MarkAttentionIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkAttentionIndicator", setter="setMarkAttentionIndicator")
     */
    private $markAttentionIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI")
     * @JMS\Expose
     * @JMS\SerializedName("WebsiteURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWebsiteURI", setter="setWebsiteURI")
     */
    private $websiteURI;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("LogoReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLogoReferenceID", setter="setLogoReferenceID")
     */
    private $logoReferenceID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EndpointID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EndpointID")
     * @JMS\Expose
     * @JMS\SerializedName("EndpointID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndpointID", setter="setEndpointID")
     */
    private $endpointID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("IndustryClassificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIndustryClassificationCode", setter="setIndustryClassificationCode")
     */
    private $industryClassificationCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyIdentification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyIdentification", setter="setPartyIdentification")
     */
    private $partyIdentification;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyName>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PartyName>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyName", setter="setPartyName")
     */
    private $partyName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Language|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Language")
     * @JMS\Expose
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguage", setter="setLanguage")
     */
    private $language;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PostalAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PostalAddress")
     * @JMS\Expose
     * @JMS\SerializedName("PostalAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostalAddress", setter="setPostalAddress")
     */
    private $postalAddress;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PhysicalLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PhysicalLocation")
     * @JMS\Expose
     * @JMS\SerializedName("PhysicalLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPhysicalLocation", setter="setPhysicalLocation")
     */
    private $physicalLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyTaxScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyTaxScheme", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyTaxScheme", setter="setPartyTaxScheme")
     */
    private $partyTaxScheme;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>")
     * @JMS\Expose
     * @JMS\SerializedName("PartyLegalEntity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PartyLegalEntity", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPartyLegalEntity", setter="setPartyLegalEntity")
     */
    private $partyLegalEntity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Contact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Contact")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Person>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Person>")
     * @JMS\Expose
     * @JMS\SerializedName("Person")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Person", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPerson", setter="setPerson")
     */
    private $person;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AgentParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AgentParty")
     * @JMS\Expose
     * @JMS\SerializedName("AgentParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgentParty", setter="setAgentParty")
     */
    private $agentParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceProviderParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getServiceProviderParty", setter="setServiceProviderParty")
     */
    private $serviceProviderParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney>")
     * @JMS\Expose
     * @JMS\SerializedName("PowerOfAttorney")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PowerOfAttorney", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPowerOfAttorney", setter="setPowerOfAttorney")
     */
    private $powerOfAttorney;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FinancialAccount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("FinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancialAccount", setter="setFinancialAccount")
     */
    private $financialAccount;

    /**
     * @return bool|null
     */
    public function getMarkCareIndicator(): ?bool
    {
        return $this->markCareIndicator;
    }

    /**
     * @param bool|null $markCareIndicator
     * @return self
     */
    public function setMarkCareIndicator(?bool $markCareIndicator = null): self
    {
        $this->markCareIndicator = $markCareIndicator;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMarkAttentionIndicator(): ?bool
    {
        return $this->markAttentionIndicator;
    }

    /**
     * @param bool|null $markAttentionIndicator
     * @return self
     */
    public function setMarkAttentionIndicator(?bool $markAttentionIndicator = null): self
    {
        $this->markAttentionIndicator = $markAttentionIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI|null
     */
    public function getWebsiteURI(): ?WebsiteURI
    {
        return $this->websiteURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI
     */
    public function getWebsiteURIWithCreate(): WebsiteURI
    {
        $this->websiteURI = is_null($this->websiteURI) ? new WebsiteURI() : $this->websiteURI;

        return $this->websiteURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\WebsiteURI|null $websiteURI
     * @return self
     */
    public function setWebsiteURI(?WebsiteURI $websiteURI = null): self
    {
        $this->websiteURI = $websiteURI;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID|null
     */
    public function getLogoReferenceID(): ?LogoReferenceID
    {
        return $this->logoReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID
     */
    public function getLogoReferenceIDWithCreate(): LogoReferenceID
    {
        $this->logoReferenceID = is_null($this->logoReferenceID) ? new LogoReferenceID() : $this->logoReferenceID;

        return $this->logoReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LogoReferenceID|null $logoReferenceID
     * @return self
     */
    public function setLogoReferenceID(?LogoReferenceID $logoReferenceID = null): self
    {
        $this->logoReferenceID = $logoReferenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EndpointID|null
     */
    public function getEndpointID(): ?EndpointID
    {
        return $this->endpointID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EndpointID
     */
    public function getEndpointIDWithCreate(): EndpointID
    {
        $this->endpointID = is_null($this->endpointID) ? new EndpointID() : $this->endpointID;

        return $this->endpointID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EndpointID|null $endpointID
     * @return self
     */
    public function setEndpointID(?EndpointID $endpointID = null): self
    {
        $this->endpointID = $endpointID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode|null
     */
    public function getIndustryClassificationCode(): ?IndustryClassificationCode
    {
        return $this->industryClassificationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode
     */
    public function getIndustryClassificationCodeWithCreate(): IndustryClassificationCode
    {
        $this->industryClassificationCode = is_null($this->industryClassificationCode) ? new IndustryClassificationCode() : $this->industryClassificationCode;

        return $this->industryClassificationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\IndustryClassificationCode|null $industryClassificationCode
     * @return self
     */
    public function setIndustryClassificationCode(
        ?IndustryClassificationCode $industryClassificationCode = null,
    ): self {
        $this->industryClassificationCode = $industryClassificationCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>|null
     */
    public function getPartyIdentification(): ?array
    {
        return $this->partyIdentification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>|null $partyIdentification
     * @return self
     */
    public function setPartyIdentification(?array $partyIdentification = null): self
    {
        $this->partyIdentification = $partyIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPartyIdentification(): self
    {
        $this->partyIdentification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification $partyIdentification
     * @return self
     */
    public function addToPartyIdentification(PartyIdentification $partyIdentification): self
    {
        $this->partyIdentification[] = $partyIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
     */
    public function addToPartyIdentificationWithCreate(): PartyIdentification
    {
        $this->addTopartyIdentification($partyIdentification = new PartyIdentification());

        return $partyIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification $partyIdentification
     * @return self
     */
    public function addOnceToPartyIdentification(PartyIdentification $partyIdentification): self
    {
        if (!is_array($this->partyIdentification)) {
            $this->partyIdentification = [];
        }

        $this->partyIdentification[0] = $partyIdentification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
     */
    public function addOnceToPartyIdentificationWithCreate(): PartyIdentification
    {
        if (!is_array($this->partyIdentification)) {
            $this->partyIdentification = [];
        }

        if ($this->partyIdentification === []) {
            $this->addOnceTopartyIdentification(new PartyIdentification());
        }

        return $this->partyIdentification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyName>|null
     */
    public function getPartyName(): ?array
    {
        return $this->partyName;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PartyName>|null $partyName
     * @return self
     */
    public function setPartyName(?array $partyName = null): self
    {
        $this->partyName = $partyName;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPartyName(): self
    {
        $this->partyName = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyName $partyName
     * @return self
     */
    public function addToPartyName(PartyName $partyName): self
    {
        $this->partyName[] = $partyName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyName
     */
    public function addToPartyNameWithCreate(): PartyName
    {
        $this->addTopartyName($partyName = new PartyName());

        return $partyName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyName $partyName
     * @return self
     */
    public function addOnceToPartyName(PartyName $partyName): self
    {
        if (!is_array($this->partyName)) {
            $this->partyName = [];
        }

        $this->partyName[0] = $partyName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyName
     */
    public function addOnceToPartyNameWithCreate(): PartyName
    {
        if (!is_array($this->partyName)) {
            $this->partyName = [];
        }

        if ($this->partyName === []) {
            $this->addOnceTopartyName(new PartyName());
        }

        return $this->partyName[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Language
     */
    public function getLanguageWithCreate(): Language
    {
        $this->language = is_null($this->language) ? new Language() : $this->language;

        return $this->language;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Language|null $language
     * @return self
     */
    public function setLanguage(?Language $language = null): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PostalAddress|null
     */
    public function getPostalAddress(): ?PostalAddress
    {
        return $this->postalAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PostalAddress
     */
    public function getPostalAddressWithCreate(): PostalAddress
    {
        $this->postalAddress = is_null($this->postalAddress) ? new PostalAddress() : $this->postalAddress;

        return $this->postalAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PostalAddress|null $postalAddress
     * @return self
     */
    public function setPostalAddress(?PostalAddress $postalAddress = null): self
    {
        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PhysicalLocation|null
     */
    public function getPhysicalLocation(): ?PhysicalLocation
    {
        return $this->physicalLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PhysicalLocation
     */
    public function getPhysicalLocationWithCreate(): PhysicalLocation
    {
        $this->physicalLocation = is_null($this->physicalLocation) ? new PhysicalLocation() : $this->physicalLocation;

        return $this->physicalLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PhysicalLocation|null $physicalLocation
     * @return self
     */
    public function setPhysicalLocation(?PhysicalLocation $physicalLocation = null): self
    {
        $this->physicalLocation = $physicalLocation;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>|null
     */
    public function getPartyTaxScheme(): ?array
    {
        return $this->partyTaxScheme;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>|null $partyTaxScheme
     * @return self
     */
    public function setPartyTaxScheme(?array $partyTaxScheme = null): self
    {
        $this->partyTaxScheme = $partyTaxScheme;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPartyTaxScheme(): self
    {
        $this->partyTaxScheme = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme $partyTaxScheme
     * @return self
     */
    public function addToPartyTaxScheme(PartyTaxScheme $partyTaxScheme): self
    {
        $this->partyTaxScheme[] = $partyTaxScheme;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
     */
    public function addToPartyTaxSchemeWithCreate(): PartyTaxScheme
    {
        $this->addTopartyTaxScheme($partyTaxScheme = new PartyTaxScheme());

        return $partyTaxScheme;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme $partyTaxScheme
     * @return self
     */
    public function addOnceToPartyTaxScheme(PartyTaxScheme $partyTaxScheme): self
    {
        if (!is_array($this->partyTaxScheme)) {
            $this->partyTaxScheme = [];
        }

        $this->partyTaxScheme[0] = $partyTaxScheme;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
     */
    public function addOnceToPartyTaxSchemeWithCreate(): PartyTaxScheme
    {
        if (!is_array($this->partyTaxScheme)) {
            $this->partyTaxScheme = [];
        }

        if ($this->partyTaxScheme === []) {
            $this->addOnceTopartyTaxScheme(new PartyTaxScheme());
        }

        return $this->partyTaxScheme[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>|null
     */
    public function getPartyLegalEntity(): ?array
    {
        return $this->partyLegalEntity;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>|null $partyLegalEntity
     * @return self
     */
    public function setPartyLegalEntity(?array $partyLegalEntity = null): self
    {
        $this->partyLegalEntity = $partyLegalEntity;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPartyLegalEntity(): self
    {
        $this->partyLegalEntity = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity $partyLegalEntity
     * @return self
     */
    public function addToPartyLegalEntity(PartyLegalEntity $partyLegalEntity): self
    {
        $this->partyLegalEntity[] = $partyLegalEntity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity
     */
    public function addToPartyLegalEntityWithCreate(): PartyLegalEntity
    {
        $this->addTopartyLegalEntity($partyLegalEntity = new PartyLegalEntity());

        return $partyLegalEntity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity $partyLegalEntity
     * @return self
     */
    public function addOnceToPartyLegalEntity(PartyLegalEntity $partyLegalEntity): self
    {
        if (!is_array($this->partyLegalEntity)) {
            $this->partyLegalEntity = [];
        }

        $this->partyLegalEntity[0] = $partyLegalEntity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity
     */
    public function addOnceToPartyLegalEntityWithCreate(): PartyLegalEntity
    {
        if (!is_array($this->partyLegalEntity)) {
            $this->partyLegalEntity = [];
        }

        if ($this->partyLegalEntity === []) {
            $this->addOnceTopartyLegalEntity(new PartyLegalEntity());
        }

        return $this->partyLegalEntity[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact
     */
    public function getContactWithCreate(): Contact
    {
        $this->contact = is_null($this->contact) ? new Contact() : $this->contact;

        return $this->contact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Contact|null $contact
     * @return self
     */
    public function setContact(?Contact $contact = null): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Person>|null
     */
    public function getPerson(): ?array
    {
        return $this->person;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Person>|null $person
     * @return self
     */
    public function setPerson(?array $person = null): self
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPerson(): self
    {
        $this->person = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Person $person
     * @return self
     */
    public function addToPerson(Person $person): self
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Person
     */
    public function addToPersonWithCreate(): Person
    {
        $this->addToperson($person = new Person());

        return $person;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Person $person
     * @return self
     */
    public function addOnceToPerson(Person $person): self
    {
        if (!is_array($this->person)) {
            $this->person = [];
        }

        $this->person[0] = $person;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Person
     */
    public function addOnceToPersonWithCreate(): Person
    {
        if (!is_array($this->person)) {
            $this->person = [];
        }

        if ($this->person === []) {
            $this->addOnceToperson(new Person());
        }

        return $this->person[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AgentParty|null
     */
    public function getAgentParty(): ?AgentParty
    {
        return $this->agentParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AgentParty
     */
    public function getAgentPartyWithCreate(): AgentParty
    {
        $this->agentParty = is_null($this->agentParty) ? new AgentParty() : $this->agentParty;

        return $this->agentParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AgentParty|null $agentParty
     * @return self
     */
    public function setAgentParty(?AgentParty $agentParty = null): self
    {
        $this->agentParty = $agentParty;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty>|null
     */
    public function getServiceProviderParty(): ?array
    {
        return $this->serviceProviderParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty>|null $serviceProviderParty
     * @return self
     */
    public function setServiceProviderParty(?array $serviceProviderParty = null): self
    {
        $this->serviceProviderParty = $serviceProviderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearServiceProviderParty(): self
    {
        $this->serviceProviderParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty $serviceProviderParty
     * @return self
     */
    public function addToServiceProviderParty(ServiceProviderParty $serviceProviderParty): self
    {
        $this->serviceProviderParty[] = $serviceProviderParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty
     */
    public function addToServiceProviderPartyWithCreate(): ServiceProviderParty
    {
        $this->addToserviceProviderParty($serviceProviderParty = new ServiceProviderParty());

        return $serviceProviderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty $serviceProviderParty
     * @return self
     */
    public function addOnceToServiceProviderParty(ServiceProviderParty $serviceProviderParty): self
    {
        if (!is_array($this->serviceProviderParty)) {
            $this->serviceProviderParty = [];
        }

        $this->serviceProviderParty[0] = $serviceProviderParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ServiceProviderParty
     */
    public function addOnceToServiceProviderPartyWithCreate(): ServiceProviderParty
    {
        if (!is_array($this->serviceProviderParty)) {
            $this->serviceProviderParty = [];
        }

        if ($this->serviceProviderParty === []) {
            $this->addOnceToserviceProviderParty(new ServiceProviderParty());
        }

        return $this->serviceProviderParty[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney>|null
     */
    public function getPowerOfAttorney(): ?array
    {
        return $this->powerOfAttorney;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney>|null $powerOfAttorney
     * @return self
     */
    public function setPowerOfAttorney(?array $powerOfAttorney = null): self
    {
        $this->powerOfAttorney = $powerOfAttorney;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPowerOfAttorney(): self
    {
        $this->powerOfAttorney = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney $powerOfAttorney
     * @return self
     */
    public function addToPowerOfAttorney(PowerOfAttorney $powerOfAttorney): self
    {
        $this->powerOfAttorney[] = $powerOfAttorney;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney
     */
    public function addToPowerOfAttorneyWithCreate(): PowerOfAttorney
    {
        $this->addTopowerOfAttorney($powerOfAttorney = new PowerOfAttorney());

        return $powerOfAttorney;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney $powerOfAttorney
     * @return self
     */
    public function addOnceToPowerOfAttorney(PowerOfAttorney $powerOfAttorney): self
    {
        if (!is_array($this->powerOfAttorney)) {
            $this->powerOfAttorney = [];
        }

        $this->powerOfAttorney[0] = $powerOfAttorney;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PowerOfAttorney
     */
    public function addOnceToPowerOfAttorneyWithCreate(): PowerOfAttorney
    {
        if (!is_array($this->powerOfAttorney)) {
            $this->powerOfAttorney = [];
        }

        if ($this->powerOfAttorney === []) {
            $this->addOnceTopowerOfAttorney(new PowerOfAttorney());
        }

        return $this->powerOfAttorney[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancialAccount|null
     */
    public function getFinancialAccount(): ?FinancialAccount
    {
        return $this->financialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancialAccount
     */
    public function getFinancialAccountWithCreate(): FinancialAccount
    {
        $this->financialAccount = is_null($this->financialAccount) ? new FinancialAccount() : $this->financialAccount;

        return $this->financialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FinancialAccount|null $financialAccount
     * @return self
     */
    public function setFinancialAccount(?FinancialAccount $financialAccount = null): self
    {
        $this->financialAccount = $financialAccount;

        return $this;
    }
}
