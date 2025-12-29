<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CompanyID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ExemptionReason;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ExemptionReasonCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationName;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxLevelCode;
use JMS\Serializer\Annotation as JMS;

class PartyTaxSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var null|RegistrationName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RegistrationName")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistrationName", setter="setRegistrationName")
     */
    private $registrationName;

    /**
     * @var null|CompanyID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CompanyID")
     * @JMS\Expose
     * @JMS\SerializedName("CompanyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCompanyID", setter="setCompanyID")
     */
    private $companyID;

    /**
     * @var null|TaxLevelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("TaxLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxLevelCode", setter="setTaxLevelCode")
     */
    private $taxLevelCode;

    /**
     * @var null|ExemptionReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ExemptionReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExemptionReasonCode", setter="setExemptionReasonCode")
     */
    private $exemptionReasonCode;

    /**
     * @var null|array<ExemptionReason>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ExemptionReason>")
     * @JMS\Expose
     * @JMS\SerializedName("ExemptionReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ExemptionReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getExemptionReason", setter="setExemptionReason")
     */
    private $exemptionReason;

    /**
     * @var null|RegistrationAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RegistrationAddress")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistrationAddress", setter="setRegistrationAddress")
     */
    private $registrationAddress;

    /**
     * @var null|TaxScheme
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxScheme")
     * @JMS\Expose
     * @JMS\SerializedName("TaxScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxScheme", setter="setTaxScheme")
     */
    private $taxScheme;

    /**
     * @return null|RegistrationName
     */
    public function getRegistrationName(): ?RegistrationName
    {
        return $this->registrationName;
    }

    /**
     * @return RegistrationName
     */
    public function getRegistrationNameWithCreate(): RegistrationName
    {
        $this->registrationName = is_null($this->registrationName) ? new RegistrationName() : $this->registrationName;

        return $this->registrationName;
    }

    /**
     * @param  null|RegistrationName $registrationName
     * @return static
     */
    public function setRegistrationName(?RegistrationName $registrationName = null): static
    {
        $this->registrationName = $registrationName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationName(): static
    {
        $this->registrationName = null;

        return $this;
    }

    /**
     * @return null|CompanyID
     */
    public function getCompanyID(): ?CompanyID
    {
        return $this->companyID;
    }

    /**
     * @return CompanyID
     */
    public function getCompanyIDWithCreate(): CompanyID
    {
        $this->companyID = is_null($this->companyID) ? new CompanyID() : $this->companyID;

        return $this->companyID;
    }

    /**
     * @param  null|CompanyID $companyID
     * @return static
     */
    public function setCompanyID(?CompanyID $companyID = null): static
    {
        $this->companyID = $companyID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompanyID(): static
    {
        $this->companyID = null;

        return $this;
    }

    /**
     * @return null|TaxLevelCode
     */
    public function getTaxLevelCode(): ?TaxLevelCode
    {
        return $this->taxLevelCode;
    }

    /**
     * @return TaxLevelCode
     */
    public function getTaxLevelCodeWithCreate(): TaxLevelCode
    {
        $this->taxLevelCode = is_null($this->taxLevelCode) ? new TaxLevelCode() : $this->taxLevelCode;

        return $this->taxLevelCode;
    }

    /**
     * @param  null|TaxLevelCode $taxLevelCode
     * @return static
     */
    public function setTaxLevelCode(?TaxLevelCode $taxLevelCode = null): static
    {
        $this->taxLevelCode = $taxLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxLevelCode(): static
    {
        $this->taxLevelCode = null;

        return $this;
    }

    /**
     * @return null|ExemptionReasonCode
     */
    public function getExemptionReasonCode(): ?ExemptionReasonCode
    {
        return $this->exemptionReasonCode;
    }

    /**
     * @return ExemptionReasonCode
     */
    public function getExemptionReasonCodeWithCreate(): ExemptionReasonCode
    {
        $this->exemptionReasonCode = is_null($this->exemptionReasonCode) ? new ExemptionReasonCode() : $this->exemptionReasonCode;

        return $this->exemptionReasonCode;
    }

    /**
     * @param  null|ExemptionReasonCode $exemptionReasonCode
     * @return static
     */
    public function setExemptionReasonCode(?ExemptionReasonCode $exemptionReasonCode = null): static
    {
        $this->exemptionReasonCode = $exemptionReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExemptionReasonCode(): static
    {
        $this->exemptionReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<ExemptionReason>
     */
    public function getExemptionReason(): ?array
    {
        return $this->exemptionReason;
    }

    /**
     * @param  null|array<ExemptionReason> $exemptionReason
     * @return static
     */
    public function setExemptionReason(?array $exemptionReason = null): static
    {
        $this->exemptionReason = $exemptionReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExemptionReason(): static
    {
        $this->exemptionReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExemptionReason(): static
    {
        $this->exemptionReason = [];

        return $this;
    }

    /**
     * @return null|ExemptionReason
     */
    public function firstExemptionReason(): ?ExemptionReason
    {
        $exemptionReason = $this->exemptionReason ?? [];
        $exemptionReason = reset($exemptionReason);

        if (false === $exemptionReason) {
            return null;
        }

        return $exemptionReason;
    }

    /**
     * @return null|ExemptionReason
     */
    public function lastExemptionReason(): ?ExemptionReason
    {
        $exemptionReason = $this->exemptionReason ?? [];
        $exemptionReason = end($exemptionReason);

        if (false === $exemptionReason) {
            return null;
        }

        return $exemptionReason;
    }

    /**
     * @param  ExemptionReason $exemptionReason
     * @return static
     */
    public function addToExemptionReason(ExemptionReason $exemptionReason): static
    {
        $this->exemptionReason[] = $exemptionReason;

        return $this;
    }

    /**
     * @return ExemptionReason
     */
    public function addToExemptionReasonWithCreate(): ExemptionReason
    {
        $this->addToexemptionReason($exemptionReason = new ExemptionReason());

        return $exemptionReason;
    }

    /**
     * @param  ExemptionReason $exemptionReason
     * @return static
     */
    public function addOnceToExemptionReason(ExemptionReason $exemptionReason): static
    {
        if (!is_array($this->exemptionReason)) {
            $this->exemptionReason = [];
        }

        $this->exemptionReason[0] = $exemptionReason;

        return $this;
    }

    /**
     * @return ExemptionReason
     */
    public function addOnceToExemptionReasonWithCreate(): ExemptionReason
    {
        if (!is_array($this->exemptionReason)) {
            $this->exemptionReason = [];
        }

        if ([] === $this->exemptionReason) {
            $this->addOnceToexemptionReason(new ExemptionReason());
        }

        return $this->exemptionReason[0];
    }

    /**
     * @return null|RegistrationAddress
     */
    public function getRegistrationAddress(): ?RegistrationAddress
    {
        return $this->registrationAddress;
    }

    /**
     * @return RegistrationAddress
     */
    public function getRegistrationAddressWithCreate(): RegistrationAddress
    {
        $this->registrationAddress = is_null($this->registrationAddress) ? new RegistrationAddress() : $this->registrationAddress;

        return $this->registrationAddress;
    }

    /**
     * @param  null|RegistrationAddress $registrationAddress
     * @return static
     */
    public function setRegistrationAddress(?RegistrationAddress $registrationAddress = null): static
    {
        $this->registrationAddress = $registrationAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationAddress(): static
    {
        $this->registrationAddress = null;

        return $this;
    }

    /**
     * @return null|TaxScheme
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @return TaxScheme
     */
    public function getTaxSchemeWithCreate(): TaxScheme
    {
        $this->taxScheme = is_null($this->taxScheme) ? new TaxScheme() : $this->taxScheme;

        return $this->taxScheme;
    }

    /**
     * @param  null|TaxScheme $taxScheme
     * @return static
     */
    public function setTaxScheme(?TaxScheme $taxScheme = null): static
    {
        $this->taxScheme = $taxScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxScheme(): static
    {
        $this->taxScheme = null;

        return $this;
    }
}
