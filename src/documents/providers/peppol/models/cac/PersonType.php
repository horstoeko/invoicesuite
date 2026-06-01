<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BirthplaceName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FamilyName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FirstName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GenderCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\JobTitle;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MiddleName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NameSuffix;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NationalityID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrganizationDepartment;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OtherName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Title;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PersonType
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
     * @var null|FirstName
     */
    #[JMS\Accessor(getter: 'getFirstName', setter: 'setFirstName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FirstName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FirstName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $firstName;

    /**
     * @var null|FamilyName
     */
    #[JMS\Accessor(getter: 'getFamilyName', setter: 'setFamilyName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FamilyName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FamilyName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $familyName;

    /**
     * @var null|Title
     */
    #[JMS\Accessor(getter: 'getTitle', setter: 'setTitle')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Title')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Title')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $title;

    /**
     * @var null|MiddleName
     */
    #[JMS\Accessor(getter: 'getMiddleName', setter: 'setMiddleName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MiddleName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MiddleName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $middleName;

    /**
     * @var null|OtherName
     */
    #[JMS\Accessor(getter: 'getOtherName', setter: 'setOtherName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OtherName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OtherName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $otherName;

    /**
     * @var null|NameSuffix
     */
    #[JMS\Accessor(getter: 'getNameSuffix', setter: 'setNameSuffix')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NameSuffix')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NameSuffix')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nameSuffix;

    /**
     * @var null|JobTitle
     */
    #[JMS\Accessor(getter: 'getJobTitle', setter: 'setJobTitle')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('JobTitle')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\JobTitle')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $jobTitle;

    /**
     * @var null|NationalityID
     */
    #[JMS\Accessor(getter: 'getNationalityID', setter: 'setNationalityID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NationalityID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NationalityID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nationalityID;

    /**
     * @var null|GenderCode
     */
    #[JMS\Accessor(getter: 'getGenderCode', setter: 'setGenderCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GenderCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GenderCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $genderCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getBirthDate', setter: 'setBirthDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BirthDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $birthDate;

    /**
     * @var null|BirthplaceName
     */
    #[JMS\Accessor(getter: 'getBirthplaceName', setter: 'setBirthplaceName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BirthplaceName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BirthplaceName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $birthplaceName;

    /**
     * @var null|OrganizationDepartment
     */
    #[JMS\Accessor(getter: 'getOrganizationDepartment', setter: 'setOrganizationDepartment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrganizationDepartment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrganizationDepartment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $organizationDepartment;

    /**
     * @var null|Contact
     */
    #[JMS\Accessor(getter: 'getContact', setter: 'setContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Contact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Contact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contact;

    /**
     * @var null|FinancialAccount
     */
    #[JMS\Accessor(getter: 'getFinancialAccount', setter: 'setFinancialAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancialAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancialAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $financialAccount;

    /**
     * @var null|array<IdentityDocumentReference>
     */
    #[JMS\Accessor(getter: 'getIdentityDocumentReference', setter: 'setIdentityDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IdentityDocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\IdentityDocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IdentityDocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $identityDocumentReference;

    /**
     * @var null|ResidenceAddress
     */
    #[JMS\Accessor(getter: 'getResidenceAddress', setter: 'setResidenceAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResidenceAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ResidenceAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $residenceAddress;

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
     * @return null|FirstName
     */
    public function getFirstName(): ?FirstName
    {
        return $this->firstName;
    }

    /**
     * @return FirstName
     */
    public function getFirstNameWithCreate(): FirstName
    {
        $this->firstName ??= new FirstName();

        return $this->firstName;
    }

    /**
     * @param  null|FirstName $firstName
     * @return static
     */
    public function setFirstName(
        ?FirstName $firstName = null
    ): static {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFirstName(): static
    {
        $this->firstName = null;

        return $this;
    }

    /**
     * @return null|FamilyName
     */
    public function getFamilyName(): ?FamilyName
    {
        return $this->familyName;
    }

    /**
     * @return FamilyName
     */
    public function getFamilyNameWithCreate(): FamilyName
    {
        $this->familyName ??= new FamilyName();

        return $this->familyName;
    }

    /**
     * @param  null|FamilyName $familyName
     * @return static
     */
    public function setFamilyName(
        ?FamilyName $familyName = null
    ): static {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFamilyName(): static
    {
        $this->familyName = null;

        return $this;
    }

    /**
     * @return null|Title
     */
    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * @return Title
     */
    public function getTitleWithCreate(): Title
    {
        $this->title ??= new Title();

        return $this->title;
    }

    /**
     * @param  null|Title $title
     * @return static
     */
    public function setTitle(
        ?Title $title = null
    ): static {
        $this->title = $title;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTitle(): static
    {
        $this->title = null;

        return $this;
    }

    /**
     * @return null|MiddleName
     */
    public function getMiddleName(): ?MiddleName
    {
        return $this->middleName;
    }

    /**
     * @return MiddleName
     */
    public function getMiddleNameWithCreate(): MiddleName
    {
        $this->middleName ??= new MiddleName();

        return $this->middleName;
    }

    /**
     * @param  null|MiddleName $middleName
     * @return static
     */
    public function setMiddleName(
        ?MiddleName $middleName = null
    ): static {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMiddleName(): static
    {
        $this->middleName = null;

        return $this;
    }

    /**
     * @return null|OtherName
     */
    public function getOtherName(): ?OtherName
    {
        return $this->otherName;
    }

    /**
     * @return OtherName
     */
    public function getOtherNameWithCreate(): OtherName
    {
        $this->otherName ??= new OtherName();

        return $this->otherName;
    }

    /**
     * @param  null|OtherName $otherName
     * @return static
     */
    public function setOtherName(
        ?OtherName $otherName = null
    ): static {
        $this->otherName = $otherName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOtherName(): static
    {
        $this->otherName = null;

        return $this;
    }

    /**
     * @return null|NameSuffix
     */
    public function getNameSuffix(): ?NameSuffix
    {
        return $this->nameSuffix;
    }

    /**
     * @return NameSuffix
     */
    public function getNameSuffixWithCreate(): NameSuffix
    {
        $this->nameSuffix ??= new NameSuffix();

        return $this->nameSuffix;
    }

    /**
     * @param  null|NameSuffix $nameSuffix
     * @return static
     */
    public function setNameSuffix(
        ?NameSuffix $nameSuffix = null
    ): static {
        $this->nameSuffix = $nameSuffix;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNameSuffix(): static
    {
        $this->nameSuffix = null;

        return $this;
    }

    /**
     * @return null|JobTitle
     */
    public function getJobTitle(): ?JobTitle
    {
        return $this->jobTitle;
    }

    /**
     * @return JobTitle
     */
    public function getJobTitleWithCreate(): JobTitle
    {
        $this->jobTitle ??= new JobTitle();

        return $this->jobTitle;
    }

    /**
     * @param  null|JobTitle $jobTitle
     * @return static
     */
    public function setJobTitle(
        ?JobTitle $jobTitle = null
    ): static {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetJobTitle(): static
    {
        $this->jobTitle = null;

        return $this;
    }

    /**
     * @return null|NationalityID
     */
    public function getNationalityID(): ?NationalityID
    {
        return $this->nationalityID;
    }

    /**
     * @return NationalityID
     */
    public function getNationalityIDWithCreate(): NationalityID
    {
        $this->nationalityID ??= new NationalityID();

        return $this->nationalityID;
    }

    /**
     * @param  null|NationalityID $nationalityID
     * @return static
     */
    public function setNationalityID(
        ?NationalityID $nationalityID = null
    ): static {
        $this->nationalityID = $nationalityID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNationalityID(): static
    {
        $this->nationalityID = null;

        return $this;
    }

    /**
     * @return null|GenderCode
     */
    public function getGenderCode(): ?GenderCode
    {
        return $this->genderCode;
    }

    /**
     * @return GenderCode
     */
    public function getGenderCodeWithCreate(): GenderCode
    {
        $this->genderCode ??= new GenderCode();

        return $this->genderCode;
    }

    /**
     * @param  null|GenderCode $genderCode
     * @return static
     */
    public function setGenderCode(
        ?GenderCode $genderCode = null
    ): static {
        $this->genderCode = $genderCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGenderCode(): static
    {
        $this->genderCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param  null|DateTimeInterface $birthDate
     * @return static
     */
    public function setBirthDate(
        ?DateTimeInterface $birthDate = null
    ): static {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBirthDate(): static
    {
        $this->birthDate = null;

        return $this;
    }

    /**
     * @return null|BirthplaceName
     */
    public function getBirthplaceName(): ?BirthplaceName
    {
        return $this->birthplaceName;
    }

    /**
     * @return BirthplaceName
     */
    public function getBirthplaceNameWithCreate(): BirthplaceName
    {
        $this->birthplaceName ??= new BirthplaceName();

        return $this->birthplaceName;
    }

    /**
     * @param  null|BirthplaceName $birthplaceName
     * @return static
     */
    public function setBirthplaceName(
        ?BirthplaceName $birthplaceName = null
    ): static {
        $this->birthplaceName = $birthplaceName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBirthplaceName(): static
    {
        $this->birthplaceName = null;

        return $this;
    }

    /**
     * @return null|OrganizationDepartment
     */
    public function getOrganizationDepartment(): ?OrganizationDepartment
    {
        return $this->organizationDepartment;
    }

    /**
     * @return OrganizationDepartment
     */
    public function getOrganizationDepartmentWithCreate(): OrganizationDepartment
    {
        $this->organizationDepartment ??= new OrganizationDepartment();

        return $this->organizationDepartment;
    }

    /**
     * @param  null|OrganizationDepartment $organizationDepartment
     * @return static
     */
    public function setOrganizationDepartment(
        ?OrganizationDepartment $organizationDepartment = null
    ): static {
        $this->organizationDepartment = $organizationDepartment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrganizationDepartment(): static
    {
        $this->organizationDepartment = null;

        return $this;
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
        $this->contact ??= new Contact();

        return $this->contact;
    }

    /**
     * @param  null|Contact $contact
     * @return static
     */
    public function setContact(
        ?Contact $contact = null
    ): static {
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
        $this->financialAccount ??= new FinancialAccount();

        return $this->financialAccount;
    }

    /**
     * @param  null|FinancialAccount $financialAccount
     * @return static
     */
    public function setFinancialAccount(
        ?FinancialAccount $financialAccount = null
    ): static {
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

    /**
     * @return null|array<IdentityDocumentReference>
     */
    public function getIdentityDocumentReference(): ?array
    {
        return $this->identityDocumentReference;
    }

    /**
     * @param  null|array<IdentityDocumentReference> $identityDocumentReference
     * @return static
     */
    public function setIdentityDocumentReference(
        ?array $identityDocumentReference = null
    ): static {
        $this->identityDocumentReference = $identityDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIdentityDocumentReference(): static
    {
        $this->identityDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIdentityDocumentReference(): static
    {
        $this->identityDocumentReference = [];

        return $this;
    }

    /**
     * @return null|IdentityDocumentReference
     */
    public function firstIdentityDocumentReference(): ?IdentityDocumentReference
    {
        $identityDocumentReference = $this->identityDocumentReference ?? [];
        $identityDocumentReference = reset($identityDocumentReference);

        if (false === $identityDocumentReference) {
            return null;
        }

        return $identityDocumentReference;
    }

    /**
     * @return null|IdentityDocumentReference
     */
    public function lastIdentityDocumentReference(): ?IdentityDocumentReference
    {
        $identityDocumentReference = $this->identityDocumentReference ?? [];
        $identityDocumentReference = end($identityDocumentReference);

        if (false === $identityDocumentReference) {
            return null;
        }

        return $identityDocumentReference;
    }

    /**
     * @param  IdentityDocumentReference $identityDocumentReference
     * @return static
     */
    public function addToIdentityDocumentReference(
        IdentityDocumentReference $identityDocumentReference
    ): static {
        $this->identityDocumentReference[] = $identityDocumentReference;

        return $this;
    }

    /**
     * @return IdentityDocumentReference
     */
    public function addToIdentityDocumentReferenceWithCreate(): IdentityDocumentReference
    {
        $this->addToIdentityDocumentReference($identityDocumentReference = new IdentityDocumentReference());

        return $identityDocumentReference;
    }

    /**
     * @param  IdentityDocumentReference $identityDocumentReference
     * @return static
     */
    public function addOnceToIdentityDocumentReference(
        IdentityDocumentReference $identityDocumentReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->identityDocumentReference)) {
            $this->identityDocumentReference = [];
        }

        $this->identityDocumentReference[0] = $identityDocumentReference;

        return $this;
    }

    /**
     * @return IdentityDocumentReference
     */
    public function addOnceToIdentityDocumentReferenceWithCreate(): IdentityDocumentReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->identityDocumentReference)) {
            $this->identityDocumentReference = [];
        }

        if ([] === $this->identityDocumentReference) {
            $this->addOnceToIdentityDocumentReference(new IdentityDocumentReference());
        }

        return $this->identityDocumentReference[0];
    }

    /**
     * @return null|ResidenceAddress
     */
    public function getResidenceAddress(): ?ResidenceAddress
    {
        return $this->residenceAddress;
    }

    /**
     * @return ResidenceAddress
     */
    public function getResidenceAddressWithCreate(): ResidenceAddress
    {
        $this->residenceAddress ??= new ResidenceAddress();

        return $this->residenceAddress;
    }

    /**
     * @param  null|ResidenceAddress $residenceAddress
     * @return static
     */
    public function setResidenceAddress(
        ?ResidenceAddress $residenceAddress = null
    ): static {
        $this->residenceAddress = $residenceAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResidenceAddress(): static
    {
        $this->residenceAddress = null;

        return $this;
    }
}
