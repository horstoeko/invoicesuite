<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxTypeCode;
use JMS\Serializer\Annotation as JMS;

class TaxSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|TaxTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxTypeCode", setter="setTaxTypeCode")
     */
    private $taxTypeCode;

    /**
     * @var null|CurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("CurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCurrencyCode", setter="setCurrencyCode")
     */
    private $currencyCode;

    /**
     * @var null|array<JurisdictionRegionAddress>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\JurisdictionRegionAddress>")
     * @JMS\Expose
     * @JMS\SerializedName("JurisdictionRegionAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="JurisdictionRegionAddress", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getJurisdictionRegionAddress", setter="setJurisdictionRegionAddress")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
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
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
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
     * @return null|TaxTypeCode
     */
    public function getTaxTypeCode(): ?TaxTypeCode
    {
        return $this->taxTypeCode;
    }

    /**
     * @return TaxTypeCode
     */
    public function getTaxTypeCodeWithCreate(): TaxTypeCode
    {
        $this->taxTypeCode = is_null($this->taxTypeCode) ? new TaxTypeCode() : $this->taxTypeCode;

        return $this->taxTypeCode;
    }

    /**
     * @param  null|TaxTypeCode $taxTypeCode
     * @return static
     */
    public function setTaxTypeCode(?TaxTypeCode $taxTypeCode = null): static
    {
        $this->taxTypeCode = $taxTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTypeCode(): static
    {
        $this->taxTypeCode = null;

        return $this;
    }

    /**
     * @return null|CurrencyCode
     */
    public function getCurrencyCode(): ?CurrencyCode
    {
        return $this->currencyCode;
    }

    /**
     * @return CurrencyCode
     */
    public function getCurrencyCodeWithCreate(): CurrencyCode
    {
        $this->currencyCode = is_null($this->currencyCode) ? new CurrencyCode() : $this->currencyCode;

        return $this->currencyCode;
    }

    /**
     * @param  null|CurrencyCode $currencyCode
     * @return static
     */
    public function setCurrencyCode(?CurrencyCode $currencyCode = null): static
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrencyCode(): static
    {
        $this->currencyCode = null;

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
    public function setJurisdictionRegionAddress(?array $jurisdictionRegionAddress = null): static
    {
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
    public function addToJurisdictionRegionAddress(JurisdictionRegionAddress $jurisdictionRegionAddress): static
    {
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
    public function addOnceToJurisdictionRegionAddress(JurisdictionRegionAddress $jurisdictionRegionAddress): static
    {
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
