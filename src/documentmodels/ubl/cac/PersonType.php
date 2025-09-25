<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Title;

class PersonType
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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName")
     * @JMS\Expose
     * @JMS\SerializedName("FirstName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFirstName", setter="setFirstName")
     */
    private $firstName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName")
     * @JMS\Expose
     * @JMS\SerializedName("FamilyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFamilyName", setter="setFamilyName")
     */
    private $familyName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Title|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Title")
     * @JMS\Expose
     * @JMS\SerializedName("Title")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTitle", setter="setTitle")
     */
    private $title;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName")
     * @JMS\Expose
     * @JMS\SerializedName("MiddleName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMiddleName", setter="setMiddleName")
     */
    private $middleName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName")
     * @JMS\Expose
     * @JMS\SerializedName("OtherName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOtherName", setter="setOtherName")
     */
    private $otherName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix")
     * @JMS\Expose
     * @JMS\SerializedName("NameSuffix")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNameSuffix", setter="setNameSuffix")
     */
    private $nameSuffix;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle")
     * @JMS\Expose
     * @JMS\SerializedName("JobTitle")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getJobTitle", setter="setJobTitle")
     */
    private $jobTitle;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID")
     * @JMS\Expose
     * @JMS\SerializedName("NationalityID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNationalityID", setter="setNationalityID")
     */
    private $nationalityID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode")
     * @JMS\Expose
     * @JMS\SerializedName("GenderCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGenderCode", setter="setGenderCode")
     */
    private $genderCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("BirthDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBirthDate", setter="setBirthDate")
     */
    private $birthDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName")
     * @JMS\Expose
     * @JMS\SerializedName("BirthplaceName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBirthplaceName", setter="setBirthplaceName")
     */
    private $birthplaceName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment")
     * @JMS\Expose
     * @JMS\SerializedName("OrganizationDepartment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrganizationDepartment", setter="setOrganizationDepartment")
     */
    private $organizationDepartment;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\Contact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\Contact")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FinancialAccount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("FinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancialAccount", setter="setFinancialAccount")
     */
    private $financialAccount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("IdentityDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="IdentityDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getIdentityDocumentReference", setter="setIdentityDocumentReference")
     */
    private $identityDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ResidenceAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ResidenceAddress")
     * @JMS\Expose
     * @JMS\SerializedName("ResidenceAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResidenceAddress", setter="setResidenceAddress")
     */
    private $residenceAddress;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName|null
     */
    public function getFirstName(): ?FirstName
    {
        return $this->firstName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName
     */
    public function getFirstNameWithCreate(): FirstName
    {
        $this->firstName = is_null($this->firstName) ? new FirstName() : $this->firstName;

        return $this->firstName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FirstName|null $firstName
     * @return self
     */
    public function setFirstName(?FirstName $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFirstName(): self
    {
        $this->firstName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName|null
     */
    public function getFamilyName(): ?FamilyName
    {
        return $this->familyName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName
     */
    public function getFamilyNameWithCreate(): FamilyName
    {
        $this->familyName = is_null($this->familyName) ? new FamilyName() : $this->familyName;

        return $this->familyName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FamilyName|null $familyName
     * @return self
     */
    public function setFamilyName(?FamilyName $familyName = null): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFamilyName(): self
    {
        $this->familyName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Title|null
     */
    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Title
     */
    public function getTitleWithCreate(): Title
    {
        $this->title = is_null($this->title) ? new Title() : $this->title;

        return $this->title;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Title|null $title
     * @return self
     */
    public function setTitle(?Title $title = null): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTitle(): self
    {
        $this->title = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName|null
     */
    public function getMiddleName(): ?MiddleName
    {
        return $this->middleName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName
     */
    public function getMiddleNameWithCreate(): MiddleName
    {
        $this->middleName = is_null($this->middleName) ? new MiddleName() : $this->middleName;

        return $this->middleName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MiddleName|null $middleName
     * @return self
     */
    public function setMiddleName(?MiddleName $middleName = null): self
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMiddleName(): self
    {
        $this->middleName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName|null
     */
    public function getOtherName(): ?OtherName
    {
        return $this->otherName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName
     */
    public function getOtherNameWithCreate(): OtherName
    {
        $this->otherName = is_null($this->otherName) ? new OtherName() : $this->otherName;

        return $this->otherName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OtherName|null $otherName
     * @return self
     */
    public function setOtherName(?OtherName $otherName = null): self
    {
        $this->otherName = $otherName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOtherName(): self
    {
        $this->otherName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix|null
     */
    public function getNameSuffix(): ?NameSuffix
    {
        return $this->nameSuffix;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix
     */
    public function getNameSuffixWithCreate(): NameSuffix
    {
        $this->nameSuffix = is_null($this->nameSuffix) ? new NameSuffix() : $this->nameSuffix;

        return $this->nameSuffix;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NameSuffix|null $nameSuffix
     * @return self
     */
    public function setNameSuffix(?NameSuffix $nameSuffix = null): self
    {
        $this->nameSuffix = $nameSuffix;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNameSuffix(): self
    {
        $this->nameSuffix = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle|null
     */
    public function getJobTitle(): ?JobTitle
    {
        return $this->jobTitle;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle
     */
    public function getJobTitleWithCreate(): JobTitle
    {
        $this->jobTitle = is_null($this->jobTitle) ? new JobTitle() : $this->jobTitle;

        return $this->jobTitle;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\JobTitle|null $jobTitle
     * @return self
     */
    public function setJobTitle(?JobTitle $jobTitle = null): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetJobTitle(): self
    {
        $this->jobTitle = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID|null
     */
    public function getNationalityID(): ?NationalityID
    {
        return $this->nationalityID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID
     */
    public function getNationalityIDWithCreate(): NationalityID
    {
        $this->nationalityID = is_null($this->nationalityID) ? new NationalityID() : $this->nationalityID;

        return $this->nationalityID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NationalityID|null $nationalityID
     * @return self
     */
    public function setNationalityID(?NationalityID $nationalityID = null): self
    {
        $this->nationalityID = $nationalityID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNationalityID(): self
    {
        $this->nationalityID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode|null
     */
    public function getGenderCode(): ?GenderCode
    {
        return $this->genderCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode
     */
    public function getGenderCodeWithCreate(): GenderCode
    {
        $this->genderCode = is_null($this->genderCode) ? new GenderCode() : $this->genderCode;

        return $this->genderCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\GenderCode|null $genderCode
     * @return self
     */
    public function setGenderCode(?GenderCode $genderCode = null): self
    {
        $this->genderCode = $genderCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGenderCode(): self
    {
        $this->genderCode = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTimeInterface|null $birthDate
     * @return self
     */
    public function setBirthDate(?\DateTimeInterface $birthDate = null): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBirthDate(): self
    {
        $this->birthDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName|null
     */
    public function getBirthplaceName(): ?BirthplaceName
    {
        return $this->birthplaceName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName
     */
    public function getBirthplaceNameWithCreate(): BirthplaceName
    {
        $this->birthplaceName = is_null($this->birthplaceName) ? new BirthplaceName() : $this->birthplaceName;

        return $this->birthplaceName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BirthplaceName|null $birthplaceName
     * @return self
     */
    public function setBirthplaceName(?BirthplaceName $birthplaceName = null): self
    {
        $this->birthplaceName = $birthplaceName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBirthplaceName(): self
    {
        $this->birthplaceName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment|null
     */
    public function getOrganizationDepartment(): ?OrganizationDepartment
    {
        return $this->organizationDepartment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment
     */
    public function getOrganizationDepartmentWithCreate(): OrganizationDepartment
    {
        $this->organizationDepartment = is_null($this->organizationDepartment) ? new OrganizationDepartment() : $this->organizationDepartment;

        return $this->organizationDepartment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrganizationDepartment|null $organizationDepartment
     * @return self
     */
    public function setOrganizationDepartment(?OrganizationDepartment $organizationDepartment = null): self
    {
        $this->organizationDepartment = $organizationDepartment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrganizationDepartment(): self
    {
        $this->organizationDepartment = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Contact
     */
    public function getContactWithCreate(): Contact
    {
        $this->contact = is_null($this->contact) ? new Contact() : $this->contact;

        return $this->contact;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Contact|null $contact
     * @return self
     */
    public function setContact(?Contact $contact = null): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContact(): self
    {
        $this->contact = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinancialAccount|null
     */
    public function getFinancialAccount(): ?FinancialAccount
    {
        return $this->financialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinancialAccount
     */
    public function getFinancialAccountWithCreate(): FinancialAccount
    {
        $this->financialAccount = is_null($this->financialAccount) ? new FinancialAccount() : $this->financialAccount;

        return $this->financialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FinancialAccount|null $financialAccount
     * @return self
     */
    public function setFinancialAccount(?FinancialAccount $financialAccount = null): self
    {
        $this->financialAccount = $financialAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinancialAccount(): self
    {
        $this->financialAccount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference>|null
     */
    public function getIdentityDocumentReference(): ?array
    {
        return $this->identityDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference>|null $identityDocumentReference
     * @return self
     */
    public function setIdentityDocumentReference(?array $identityDocumentReference = null): self
    {
        $this->identityDocumentReference = $identityDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIdentityDocumentReference(): self
    {
        $this->identityDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIdentityDocumentReference(): self
    {
        $this->identityDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference|null
     */
    public function firstIdentityDocumentReference(): ?IdentityDocumentReference
    {
        $identityDocumentReference = $this->identityDocumentReference ?? [];
        $identityDocumentReference = reset($identityDocumentReference);

        if ($identityDocumentReference === false) {
            return null;
        }

        return $identityDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference|null
     */
    public function lastIdentityDocumentReference(): ?IdentityDocumentReference
    {
        $identityDocumentReference = $this->identityDocumentReference ?? [];
        $identityDocumentReference = end($identityDocumentReference);

        if ($identityDocumentReference === false) {
            return null;
        }

        return $identityDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference $identityDocumentReference
     * @return self
     */
    public function addToIdentityDocumentReference(IdentityDocumentReference $identityDocumentReference): self
    {
        $this->identityDocumentReference[] = $identityDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference
     */
    public function addToIdentityDocumentReferenceWithCreate(): IdentityDocumentReference
    {
        $this->addToidentityDocumentReference($identityDocumentReference = new IdentityDocumentReference());

        return $identityDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference $identityDocumentReference
     * @return self
     */
    public function addOnceToIdentityDocumentReference(IdentityDocumentReference $identityDocumentReference): self
    {
        if (!is_array($this->identityDocumentReference)) {
            $this->identityDocumentReference = [];
        }

        $this->identityDocumentReference[0] = $identityDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IdentityDocumentReference
     */
    public function addOnceToIdentityDocumentReferenceWithCreate(): IdentityDocumentReference
    {
        if (!is_array($this->identityDocumentReference)) {
            $this->identityDocumentReference = [];
        }

        if ($this->identityDocumentReference === []) {
            $this->addOnceToidentityDocumentReference(new IdentityDocumentReference());
        }

        return $this->identityDocumentReference[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ResidenceAddress|null
     */
    public function getResidenceAddress(): ?ResidenceAddress
    {
        return $this->residenceAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ResidenceAddress
     */
    public function getResidenceAddressWithCreate(): ResidenceAddress
    {
        $this->residenceAddress = is_null($this->residenceAddress) ? new ResidenceAddress() : $this->residenceAddress;

        return $this->residenceAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ResidenceAddress|null $residenceAddress
     * @return self
     */
    public function setResidenceAddress(?ResidenceAddress $residenceAddress = null): self
    {
        $this->residenceAddress = $residenceAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetResidenceAddress(): self
    {
        $this->residenceAddress = null;

        return $this;
    }
}
