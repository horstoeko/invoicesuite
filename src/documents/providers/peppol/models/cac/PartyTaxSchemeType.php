<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExemptionReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExemptionReasonCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RegistrationName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxLevelCode;
use JMS\Serializer\Annotation as JMS;

class PartyTaxSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var null|RegistrationName
     */
    #[JMS\Accessor(getter: 'getRegistrationName', setter: 'setRegistrationName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistrationName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RegistrationName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $registrationName;

    /**
     * @var null|CompanyID
     */
    #[JMS\Accessor(getter: 'getCompanyID', setter: 'setCompanyID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $companyID;

    /**
     * @var null|TaxLevelCode
     */
    #[JMS\Accessor(getter: 'getTaxLevelCode', setter: 'setTaxLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxLevelCode;

    /**
     * @var null|ExemptionReasonCode
     */
    #[JMS\Accessor(getter: 'getExemptionReasonCode', setter: 'setExemptionReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExemptionReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExemptionReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $exemptionReasonCode;

    /**
     * @var null|array<ExemptionReason>
     */
    #[JMS\Accessor(getter: 'getExemptionReason', setter: 'setExemptionReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExemptionReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExemptionReason>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ExemptionReason', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $exemptionReason;

    /**
     * @var null|RegistrationAddress
     */
    #[JMS\Accessor(getter: 'getRegistrationAddress', setter: 'setRegistrationAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistrationAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RegistrationAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $registrationAddress;

    /**
     * @var null|TaxScheme
     */
    #[JMS\Accessor(getter: 'getTaxScheme', setter: 'setTaxScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxScheme')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxScheme')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->registrationName ??= new RegistrationName();

        return $this->registrationName;
    }

    /**
     * @param  null|RegistrationName $registrationName
     * @return static
     */
    public function setRegistrationName(
        ?RegistrationName $registrationName = null
    ): static {
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
        $this->companyID ??= new CompanyID();

        return $this->companyID;
    }

    /**
     * @param  null|CompanyID $companyID
     * @return static
     */
    public function setCompanyID(
        ?CompanyID $companyID = null
    ): static {
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
        $this->taxLevelCode ??= new TaxLevelCode();

        return $this->taxLevelCode;
    }

    /**
     * @param  null|TaxLevelCode $taxLevelCode
     * @return static
     */
    public function setTaxLevelCode(
        ?TaxLevelCode $taxLevelCode = null
    ): static {
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
        $this->exemptionReasonCode ??= new ExemptionReasonCode();

        return $this->exemptionReasonCode;
    }

    /**
     * @param  null|ExemptionReasonCode $exemptionReasonCode
     * @return static
     */
    public function setExemptionReasonCode(
        ?ExemptionReasonCode $exemptionReasonCode = null
    ): static {
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
    public function setExemptionReason(
        ?array $exemptionReason = null
    ): static {
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
    public function addToExemptionReason(
        ExemptionReason $exemptionReason
    ): static {
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
    public function addOnceToExemptionReason(
        ExemptionReason $exemptionReason
    ): static {
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
        $this->registrationAddress ??= new RegistrationAddress();

        return $this->registrationAddress;
    }

    /**
     * @param  null|RegistrationAddress $registrationAddress
     * @return static
     */
    public function setRegistrationAddress(
        ?RegistrationAddress $registrationAddress = null
    ): static {
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
        $this->taxScheme ??= new TaxScheme();

        return $this->taxScheme;
    }

    /**
     * @param  null|TaxScheme $taxScheme
     * @return static
     */
    public function setTaxScheme(
        ?TaxScheme $taxScheme = null
    ): static {
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
