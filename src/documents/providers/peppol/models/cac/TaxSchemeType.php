<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrencyCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxTypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TaxSchemeType
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
     * @var null|TaxTypeCode
     */
    #[JMS\Accessor(getter: 'getTaxTypeCode', setter: 'setTaxTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxTypeCode;

    /**
     * @var null|CurrencyCode
     */
    #[JMS\Accessor(getter: 'getCurrencyCode', setter: 'setCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrencyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $currencyCode;

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
        $this->taxTypeCode ??= new TaxTypeCode();

        return $this->taxTypeCode;
    }

    /**
     * @param  null|TaxTypeCode $taxTypeCode
     * @return static
     */
    public function setTaxTypeCode(
        ?TaxTypeCode $taxTypeCode = null
    ): static {
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
        $this->currencyCode ??= new CurrencyCode();

        return $this->currencyCode;
    }

    /**
     * @param  null|CurrencyCode $currencyCode
     * @return static
     */
    public function setCurrencyCode(
        ?CurrencyCode $currencyCode = null
    ): static {
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
        $this->addToJurisdictionRegionAddress($jurisdictionRegionAddress = new JurisdictionRegionAddress());

        return $jurisdictionRegionAddress;
    }

    /**
     * @param  JurisdictionRegionAddress $jurisdictionRegionAddress
     * @return static
     */
    public function addOnceToJurisdictionRegionAddress(
        JurisdictionRegionAddress $jurisdictionRegionAddress
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->jurisdictionRegionAddress)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->jurisdictionRegionAddress)) {
            $this->jurisdictionRegionAddress = [];
        }

        if ([] === $this->jurisdictionRegionAddress) {
            $this->addOnceToJurisdictionRegionAddress(new JurisdictionRegionAddress());
        }

        return $this->jurisdictionRegionAddress[0];
    }
}
