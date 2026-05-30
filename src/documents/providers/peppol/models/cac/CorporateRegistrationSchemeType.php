<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorporateRegistrationTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class CorporateRegistrationSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|CorporateRegistrationTypeCode
     */
    #[JMS\Accessor(getter: 'getCorporateRegistrationTypeCode', setter: 'setCorporateRegistrationTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorporateRegistrationTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorporateRegistrationTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $corporateRegistrationTypeCode;

    /**
     * @var null|array<JurisdictionRegionAddress>
     */
    #[JMS\Accessor(getter: 'getJurisdictionRegionAddress', setter: 'setJurisdictionRegionAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('JurisdictionRegionAddress')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\JurisdictionRegionAddress>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'JurisdictionRegionAddress', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $jurisdictionRegionAddress;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
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
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
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
     * @return null|CorporateRegistrationTypeCode
     */
    public function getCorporateRegistrationTypeCode(): ?CorporateRegistrationTypeCode
    {
        return $this->corporateRegistrationTypeCode;
    }

    /**
     * @return CorporateRegistrationTypeCode
     */
    public function getCorporateRegistrationTypeCodeWithCreate(): CorporateRegistrationTypeCode
    {
        $this->corporateRegistrationTypeCode ??= new CorporateRegistrationTypeCode();

        return $this->corporateRegistrationTypeCode;
    }

    /**
     * @param  null|CorporateRegistrationTypeCode $corporateRegistrationTypeCode
     * @return static
     */
    public function setCorporateRegistrationTypeCode(
        ?CorporateRegistrationTypeCode $corporateRegistrationTypeCode = null,
    ): static {
        $this->corporateRegistrationTypeCode = $corporateRegistrationTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorporateRegistrationTypeCode(): static
    {
        $this->corporateRegistrationTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<JurisdictionRegionAddress>
     */
    public function getJurisdictionRegionAddress(): ?array
    {
        return $this->jurisdictionRegionAddress;
    }

    /**
     * @param  null|array<JurisdictionRegionAddress> $jurisdictionRegionAddress
     * @return static
     */
    public function setJurisdictionRegionAddress(
        ?array $jurisdictionRegionAddress = null
    ): static {
        $this->jurisdictionRegionAddress = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetJurisdictionRegionAddress(): static
    {
        $this->jurisdictionRegionAddress = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearJurisdictionRegionAddress(): static
    {
        $this->jurisdictionRegionAddress = [];

        return $this;
    }

    /**
     * @return null|JurisdictionRegionAddress
     */
    public function firstJurisdictionRegionAddress(): ?JurisdictionRegionAddress
    {
        $jurisdictionRegionAddress = $this->jurisdictionRegionAddress ?? [];
        $jurisdictionRegionAddress = reset($jurisdictionRegionAddress);

        if (false === $jurisdictionRegionAddress) {
            return null;
        }

        return $jurisdictionRegionAddress;
    }

    /**
     * @return null|JurisdictionRegionAddress
     */
    public function lastJurisdictionRegionAddress(): ?JurisdictionRegionAddress
    {
        $jurisdictionRegionAddress = $this->jurisdictionRegionAddress ?? [];
        $jurisdictionRegionAddress = end($jurisdictionRegionAddress);

        if (false === $jurisdictionRegionAddress) {
            return null;
        }

        return $jurisdictionRegionAddress;
    }

    /**
     * @param  JurisdictionRegionAddress $jurisdictionRegionAddress
     * @return static
     */
    public function addToJurisdictionRegionAddress(
        JurisdictionRegionAddress $jurisdictionRegionAddress
    ): static {
        $this->jurisdictionRegionAddress[] = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return JurisdictionRegionAddress
     */
    public function addToJurisdictionRegionAddressWithCreate(): JurisdictionRegionAddress
    {
        $this->addTojurisdictionRegionAddress($jurisdictionRegionAddress = new JurisdictionRegionAddress());

        return $jurisdictionRegionAddress;
    }

    /**
     * @param  JurisdictionRegionAddress $jurisdictionRegionAddress
     * @return static
     */
    public function addOnceToJurisdictionRegionAddress(
        JurisdictionRegionAddress $jurisdictionRegionAddress
    ): static {
        if (!is_array($this->jurisdictionRegionAddress)) {
            $this->jurisdictionRegionAddress = [];
        }

        $this->jurisdictionRegionAddress[0] = $jurisdictionRegionAddress;

        return $this;
    }

    /**
     * @return JurisdictionRegionAddress
     */
    public function addOnceToJurisdictionRegionAddressWithCreate(): JurisdictionRegionAddress
    {
        if (!is_array($this->jurisdictionRegionAddress)) {
            $this->jurisdictionRegionAddress = [];
        }

        if ([] === $this->jurisdictionRegionAddress) {
            $this->addOnceTojurisdictionRegionAddress(new JurisdictionRegionAddress());
        }

        return $this->jurisdictionRegionAddress[0];
    }
}
