<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxminimum\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxminimum\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradePartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxminimum\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|LegalOrganizationType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxminimum\ram\LegalOrganizationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLegalOrganization")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLegalOrganization", setter="setSpecifiedLegalOrganization")
     */
    private $specifiedLegalOrganization;

    /**
     * @var null|TradeAddressType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxminimum\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $postalTradeAddress;

    /**
     * @var null|array<TaxRegistrationType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxminimum\ram\TaxRegistrationType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTaxRegistration")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedTaxRegistration", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedTaxRegistration", setter="setSpecifiedTaxRegistration")
     */
    private $specifiedTaxRegistration;

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
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(?TextType $name = null): static
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
        $this->specifiedLegalOrganization = is_null($this->specifiedLegalOrganization) ? new LegalOrganizationType() : $this->specifiedLegalOrganization;

        return $this->specifiedLegalOrganization;
    }

    /**
     * @param  null|LegalOrganizationType $specifiedLegalOrganization
     * @return static
     */
    public function setSpecifiedLegalOrganization(?LegalOrganizationType $specifiedLegalOrganization = null): static
    {
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
        $this->postalTradeAddress = is_null($this->postalTradeAddress) ? new TradeAddressType() : $this->postalTradeAddress;

        return $this->postalTradeAddress;
    }

    /**
     * @param  null|TradeAddressType $postalTradeAddress
     * @return static
     */
    public function setPostalTradeAddress(?TradeAddressType $postalTradeAddress = null): static
    {
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
    public function setSpecifiedTaxRegistration(?array $specifiedTaxRegistration = null): static
    {
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
    public function addToSpecifiedTaxRegistration(TaxRegistrationType $specifiedTaxRegistration): static
    {
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
    public function addOnceToSpecifiedTaxRegistration(TaxRegistrationType $specifiedTaxRegistration): static
    {
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
