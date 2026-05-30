<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalForm;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalFormCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLiquidationStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorporateStockAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RegistrationName;
use JMS\Serializer\Annotation as JMS;

class PartyLegalEntityType
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
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getRegistrationDate', setter: 'setRegistrationDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistrationDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $registrationDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getRegistrationExpirationDate', setter: 'setRegistrationExpirationDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistrationExpirationDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $registrationExpirationDate;

    /**
     * @var null|CompanyLegalFormCode
     */
    #[JMS\Accessor(getter: 'getCompanyLegalFormCode', setter: 'setCompanyLegalFormCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyLegalFormCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalFormCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $companyLegalFormCode;

    /**
     * @var null|CompanyLegalForm
     */
    #[JMS\Accessor(getter: 'getCompanyLegalForm', setter: 'setCompanyLegalForm')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyLegalForm')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalForm')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $companyLegalForm;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getSoleProprietorshipIndicator', setter: 'setSoleProprietorshipIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SoleProprietorshipIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $soleProprietorshipIndicator;

    /**
     * @var null|CompanyLiquidationStatusCode
     */
    #[JMS\Accessor(getter: 'getCompanyLiquidationStatusCode', setter: 'setCompanyLiquidationStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyLiquidationStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLiquidationStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $companyLiquidationStatusCode;

    /**
     * @var null|CorporateStockAmount
     */
    #[JMS\Accessor(getter: 'getCorporateStockAmount', setter: 'setCorporateStockAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorporateStockAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorporateStockAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $corporateStockAmount;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getFullyPaidSharesIndicator', setter: 'setFullyPaidSharesIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FullyPaidSharesIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $fullyPaidSharesIndicator;

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
     * @var null|CorporateRegistrationScheme
     */
    #[JMS\Accessor(getter: 'getCorporateRegistrationScheme', setter: 'setCorporateRegistrationScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorporateRegistrationScheme')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CorporateRegistrationScheme')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $corporateRegistrationScheme;

    /**
     * @var null|HeadOfficeParty
     */
    #[JMS\Accessor(getter: 'getHeadOfficeParty', setter: 'setHeadOfficeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HeadOfficeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\HeadOfficeParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $headOfficeParty;

    /**
     * @var null|array<ShareholderParty>
     */
    #[JMS\Accessor(getter: 'getShareholderParty', setter: 'setShareholderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShareholderParty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShareholderParty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ShareholderParty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shareholderParty;

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
     * @return null|DateTimeInterface
     */
    public function getRegistrationDate(): ?DateTimeInterface
    {
        return $this->registrationDate;
    }

    /**
     * @param  null|DateTimeInterface $registrationDate
     * @return static
     */
    public function setRegistrationDate(
        ?DateTimeInterface $registrationDate = null
    ): static {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationDate(): static
    {
        $this->registrationDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getRegistrationExpirationDate(): ?DateTimeInterface
    {
        return $this->registrationExpirationDate;
    }

    /**
     * @param  null|DateTimeInterface $registrationExpirationDate
     * @return static
     */
    public function setRegistrationExpirationDate(
        ?DateTimeInterface $registrationExpirationDate = null
    ): static {
        $this->registrationExpirationDate = $registrationExpirationDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationExpirationDate(): static
    {
        $this->registrationExpirationDate = null;

        return $this;
    }

    /**
     * @return null|CompanyLegalFormCode
     */
    public function getCompanyLegalFormCode(): ?CompanyLegalFormCode
    {
        return $this->companyLegalFormCode;
    }

    /**
     * @return CompanyLegalFormCode
     */
    public function getCompanyLegalFormCodeWithCreate(): CompanyLegalFormCode
    {
        $this->companyLegalFormCode ??= new CompanyLegalFormCode();

        return $this->companyLegalFormCode;
    }

    /**
     * @param  null|CompanyLegalFormCode $companyLegalFormCode
     * @return static
     */
    public function setCompanyLegalFormCode(
        ?CompanyLegalFormCode $companyLegalFormCode = null
    ): static {
        $this->companyLegalFormCode = $companyLegalFormCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompanyLegalFormCode(): static
    {
        $this->companyLegalFormCode = null;

        return $this;
    }

    /**
     * @return null|CompanyLegalForm
     */
    public function getCompanyLegalForm(): ?CompanyLegalForm
    {
        return $this->companyLegalForm;
    }

    /**
     * @return CompanyLegalForm
     */
    public function getCompanyLegalFormWithCreate(): CompanyLegalForm
    {
        $this->companyLegalForm ??= new CompanyLegalForm();

        return $this->companyLegalForm;
    }

    /**
     * @param  null|CompanyLegalForm $companyLegalForm
     * @return static
     */
    public function setCompanyLegalForm(
        ?CompanyLegalForm $companyLegalForm = null
    ): static {
        $this->companyLegalForm = $companyLegalForm;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompanyLegalForm(): static
    {
        $this->companyLegalForm = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getSoleProprietorshipIndicator(): ?bool
    {
        return $this->soleProprietorshipIndicator;
    }

    /**
     * @param  null|bool $soleProprietorshipIndicator
     * @return static
     */
    public function setSoleProprietorshipIndicator(
        ?bool $soleProprietorshipIndicator = null
    ): static {
        $this->soleProprietorshipIndicator = $soleProprietorshipIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSoleProprietorshipIndicator(): static
    {
        $this->soleProprietorshipIndicator = null;

        return $this;
    }

    /**
     * @return null|CompanyLiquidationStatusCode
     */
    public function getCompanyLiquidationStatusCode(): ?CompanyLiquidationStatusCode
    {
        return $this->companyLiquidationStatusCode;
    }

    /**
     * @return CompanyLiquidationStatusCode
     */
    public function getCompanyLiquidationStatusCodeWithCreate(): CompanyLiquidationStatusCode
    {
        $this->companyLiquidationStatusCode ??= new CompanyLiquidationStatusCode();

        return $this->companyLiquidationStatusCode;
    }

    /**
     * @param  null|CompanyLiquidationStatusCode $companyLiquidationStatusCode
     * @return static
     */
    public function setCompanyLiquidationStatusCode(
        ?CompanyLiquidationStatusCode $companyLiquidationStatusCode = null,
    ): static {
        $this->companyLiquidationStatusCode = $companyLiquidationStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompanyLiquidationStatusCode(): static
    {
        $this->companyLiquidationStatusCode = null;

        return $this;
    }

    /**
     * @return null|CorporateStockAmount
     */
    public function getCorporateStockAmount(): ?CorporateStockAmount
    {
        return $this->corporateStockAmount;
    }

    /**
     * @return CorporateStockAmount
     */
    public function getCorporateStockAmountWithCreate(): CorporateStockAmount
    {
        $this->corporateStockAmount ??= new CorporateStockAmount();

        return $this->corporateStockAmount;
    }

    /**
     * @param  null|CorporateStockAmount $corporateStockAmount
     * @return static
     */
    public function setCorporateStockAmount(
        ?CorporateStockAmount $corporateStockAmount = null
    ): static {
        $this->corporateStockAmount = $corporateStockAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorporateStockAmount(): static
    {
        $this->corporateStockAmount = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getFullyPaidSharesIndicator(): ?bool
    {
        return $this->fullyPaidSharesIndicator;
    }

    /**
     * @param  null|bool $fullyPaidSharesIndicator
     * @return static
     */
    public function setFullyPaidSharesIndicator(
        ?bool $fullyPaidSharesIndicator = null
    ): static {
        $this->fullyPaidSharesIndicator = $fullyPaidSharesIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFullyPaidSharesIndicator(): static
    {
        $this->fullyPaidSharesIndicator = null;

        return $this;
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
     * @return null|CorporateRegistrationScheme
     */
    public function getCorporateRegistrationScheme(): ?CorporateRegistrationScheme
    {
        return $this->corporateRegistrationScheme;
    }

    /**
     * @return CorporateRegistrationScheme
     */
    public function getCorporateRegistrationSchemeWithCreate(): CorporateRegistrationScheme
    {
        $this->corporateRegistrationScheme ??= new CorporateRegistrationScheme();

        return $this->corporateRegistrationScheme;
    }

    /**
     * @param  null|CorporateRegistrationScheme $corporateRegistrationScheme
     * @return static
     */
    public function setCorporateRegistrationScheme(
        ?CorporateRegistrationScheme $corporateRegistrationScheme = null,
    ): static {
        $this->corporateRegistrationScheme = $corporateRegistrationScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorporateRegistrationScheme(): static
    {
        $this->corporateRegistrationScheme = null;

        return $this;
    }

    /**
     * @return null|HeadOfficeParty
     */
    public function getHeadOfficeParty(): ?HeadOfficeParty
    {
        return $this->headOfficeParty;
    }

    /**
     * @return HeadOfficeParty
     */
    public function getHeadOfficePartyWithCreate(): HeadOfficeParty
    {
        $this->headOfficeParty ??= new HeadOfficeParty();

        return $this->headOfficeParty;
    }

    /**
     * @param  null|HeadOfficeParty $headOfficeParty
     * @return static
     */
    public function setHeadOfficeParty(
        ?HeadOfficeParty $headOfficeParty = null
    ): static {
        $this->headOfficeParty = $headOfficeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHeadOfficeParty(): static
    {
        $this->headOfficeParty = null;

        return $this;
    }

    /**
     * @return null|array<ShareholderParty>
     */
    public function getShareholderParty(): ?array
    {
        return $this->shareholderParty;
    }

    /**
     * @param  null|array<ShareholderParty> $shareholderParty
     * @return static
     */
    public function setShareholderParty(
        ?array $shareholderParty = null
    ): static {
        $this->shareholderParty = $shareholderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShareholderParty(): static
    {
        $this->shareholderParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShareholderParty(): static
    {
        $this->shareholderParty = [];

        return $this;
    }

    /**
     * @return null|ShareholderParty
     */
    public function firstShareholderParty(): ?ShareholderParty
    {
        $shareholderParty = $this->shareholderParty ?? [];
        $shareholderParty = reset($shareholderParty);

        if (false === $shareholderParty) {
            return null;
        }

        return $shareholderParty;
    }

    /**
     * @return null|ShareholderParty
     */
    public function lastShareholderParty(): ?ShareholderParty
    {
        $shareholderParty = $this->shareholderParty ?? [];
        $shareholderParty = end($shareholderParty);

        if (false === $shareholderParty) {
            return null;
        }

        return $shareholderParty;
    }

    /**
     * @param  ShareholderParty $shareholderParty
     * @return static
     */
    public function addToShareholderParty(
        ShareholderParty $shareholderParty
    ): static {
        $this->shareholderParty[] = $shareholderParty;

        return $this;
    }

    /**
     * @return ShareholderParty
     */
    public function addToShareholderPartyWithCreate(): ShareholderParty
    {
        $this->addToshareholderParty($shareholderParty = new ShareholderParty());

        return $shareholderParty;
    }

    /**
     * @param  ShareholderParty $shareholderParty
     * @return static
     */
    public function addOnceToShareholderParty(
        ShareholderParty $shareholderParty
    ): static {
        if (!is_array($this->shareholderParty)) {
            $this->shareholderParty = [];
        }

        $this->shareholderParty[0] = $shareholderParty;

        return $this;
    }

    /**
     * @return ShareholderParty
     */
    public function addOnceToShareholderPartyWithCreate(): ShareholderParty
    {
        if (!is_array($this->shareholderParty)) {
            $this->shareholderParty = [];
        }

        if ([] === $this->shareholderParty) {
            $this->addOnceToshareholderParty(new ShareholderParty());
        }

        return $this->shareholderParty[0];
    }
}
