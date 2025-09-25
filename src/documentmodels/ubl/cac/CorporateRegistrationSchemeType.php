<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;

class CorporateRegistrationSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CorporateRegistrationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCorporateRegistrationTypeCode", setter="setCorporateRegistrationTypeCode")
     */
    private $corporateRegistrationTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress>")
     * @JMS\Expose
     * @JMS\SerializedName("JurisdictionRegionAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="JurisdictionRegionAddress", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getJurisdictionRegionAddress", setter="setJurisdictionRegionAddress")
     */
    private $jurisdictionRegionAddress;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode|null
     */
    public function getCorporateRegistrationTypeCode(): ?CorporateRegistrationTypeCode
    {
        return $this->corporateRegistrationTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode
     */
    public function getCorporateRegistrationTypeCodeWithCreate(): CorporateRegistrationTypeCode
    {
        $this->corporateRegistrationTypeCode = is_null($this->corporateRegistrationTypeCode) ? new CorporateRegistrationTypeCode() : $this->corporateRegistrationTypeCode;

        return $this->corporateRegistrationTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CorporateRegistrationTypeCode|null $corporateRegistrationTypeCode
     * @return self
     */
    public function setCorporateRegistrationTypeCode(
        ?CorporateRegistrationTypeCode $corporateRegistrationTypeCode = null,
    ): self {
        $this->corporateRegistrationTypeCode = $corporateRegistrationTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCorporateRegistrationTypeCode(): self
    {
        $this->corporateRegistrationTypeCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress>|null
     */
    public function getJurisdictionRegionAddress(): ?array
    {
        return $this->jurisdictionRegionAddress;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress>|null $jurisdictionRegionAddress
     * @return self
     */
    public function setJurisdictionRegionAddress(?array $jurisdictionRegionAddress = null): self
    {
        $this->jurisdictionRegionAddress = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetJurisdictionRegionAddress(): self
    {
        $this->jurisdictionRegionAddress = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearJurisdictionRegionAddress(): self
    {
        $this->jurisdictionRegionAddress = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress|null
     */
    public function firstJurisdictionRegionAddress(): ?JurisdictionRegionAddress
    {
        $jurisdictionRegionAddress = $this->jurisdictionRegionAddress ?? [];
        $jurisdictionRegionAddress = reset($jurisdictionRegionAddress);

        if ($jurisdictionRegionAddress === false) {
            return null;
        }

        return $jurisdictionRegionAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress|null
     */
    public function lastJurisdictionRegionAddress(): ?JurisdictionRegionAddress
    {
        $jurisdictionRegionAddress = $this->jurisdictionRegionAddress ?? [];
        $jurisdictionRegionAddress = end($jurisdictionRegionAddress);

        if ($jurisdictionRegionAddress === false) {
            return null;
        }

        return $jurisdictionRegionAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress $jurisdictionRegionAddress
     * @return self
     */
    public function addToJurisdictionRegionAddress(JurisdictionRegionAddress $jurisdictionRegionAddress): self
    {
        $this->jurisdictionRegionAddress[] = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress
     */
    public function addToJurisdictionRegionAddressWithCreate(): JurisdictionRegionAddress
    {
        $this->addTojurisdictionRegionAddress($jurisdictionRegionAddress = new JurisdictionRegionAddress());

        return $jurisdictionRegionAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress $jurisdictionRegionAddress
     * @return self
     */
    public function addOnceToJurisdictionRegionAddress(JurisdictionRegionAddress $jurisdictionRegionAddress): self
    {
        if (!is_array($this->jurisdictionRegionAddress)) {
            $this->jurisdictionRegionAddress = [];
        }

        $this->jurisdictionRegionAddress[0] = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\JurisdictionRegionAddress
     */
    public function addOnceToJurisdictionRegionAddressWithCreate(): JurisdictionRegionAddress
    {
        if (!is_array($this->jurisdictionRegionAddress)) {
            $this->jurisdictionRegionAddress = [];
        }

        if ($this->jurisdictionRegionAddress === []) {
            $this->addOnceTojurisdictionRegionAddress(new JurisdictionRegionAddress());
        }

        return $this->jurisdictionRegionAddress[0];
    }
}
