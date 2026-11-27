<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalForm;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalFormCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmployeeQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OperatingYearsQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PersonalSituation;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TendererQualificationRequestType
{
    use HandlesObjectFlags;

    /**
     * @var null|CompanyLegalFormCode
     */
    #[JMS\Accessor(getter: 'getCompanyLegalFormCode', setter: 'setCompanyLegalFormCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyLegalFormCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalFormCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $companyLegalFormCode;

    /**
     * @var null|CompanyLegalForm
     */
    #[JMS\Accessor(getter: 'getCompanyLegalForm', setter: 'setCompanyLegalForm')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompanyLegalForm')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CompanyLegalForm')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $companyLegalForm;

    /**
     * @var null|array<PersonalSituation>
     */
    #[JMS\Accessor(getter: 'getPersonalSituation', setter: 'setPersonalSituation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PersonalSituation')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PersonalSituation>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'PersonalSituation', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $personalSituation;

    /**
     * @var null|OperatingYearsQuantity
     */
    #[JMS\Accessor(getter: 'getOperatingYearsQuantity', setter: 'setOperatingYearsQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OperatingYearsQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OperatingYearsQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $operatingYearsQuantity;

    /**
     * @var null|EmployeeQuantity
     */
    #[JMS\Accessor(getter: 'getEmployeeQuantity', setter: 'setEmployeeQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EmployeeQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmployeeQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $employeeQuantity;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Description', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|array<RequiredBusinessClassificationScheme>
     */
    #[JMS\Accessor(getter: 'getRequiredBusinessClassificationScheme', setter: 'setRequiredBusinessClassificationScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredBusinessClassificationScheme')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequiredBusinessClassificationScheme>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'RequiredBusinessClassificationScheme', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requiredBusinessClassificationScheme;

    /**
     * @var null|array<TechnicalEvaluationCriterion>
     */
    #[JMS\Accessor(getter: 'getTechnicalEvaluationCriterion', setter: 'setTechnicalEvaluationCriterion')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TechnicalEvaluationCriterion')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TechnicalEvaluationCriterion>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'TechnicalEvaluationCriterion', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $technicalEvaluationCriterion;

    /**
     * @var null|array<FinancialEvaluationCriterion>
     */
    #[JMS\Accessor(getter: 'getFinancialEvaluationCriterion', setter: 'setFinancialEvaluationCriterion')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancialEvaluationCriterion')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancialEvaluationCriterion>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'FinancialEvaluationCriterion', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $financialEvaluationCriterion;

    /**
     * @var null|array<SpecificTendererRequirement>
     */
    #[JMS\Accessor(getter: 'getSpecificTendererRequirement', setter: 'setSpecificTendererRequirement')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecificTendererRequirement')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SpecificTendererRequirement>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'SpecificTendererRequirement', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $specificTendererRequirement;

    /**
     * @var null|array<EconomicOperatorRole>
     */
    #[JMS\Accessor(getter: 'getEconomicOperatorRole', setter: 'setEconomicOperatorRole')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EconomicOperatorRole')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EconomicOperatorRole>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'EconomicOperatorRole', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $economicOperatorRole;

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
     * @return null|array<PersonalSituation>
     */
    public function getPersonalSituation(): ?array
    {
        return $this->personalSituation;
    }

    /**
     * @param  null|array<PersonalSituation> $personalSituation
     * @return static
     */
    public function setPersonalSituation(
        ?array $personalSituation = null
    ): static {
        $this->personalSituation = $personalSituation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPersonalSituation(): static
    {
        $this->personalSituation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPersonalSituation(): static
    {
        $this->personalSituation = [];

        return $this;
    }

    /**
     * @return null|PersonalSituation
     */
    public function firstPersonalSituation(): ?PersonalSituation
    {
        $personalSituation = $this->personalSituation ?? [];
        $personalSituation = InvoiceSuiteArrayUtils::first($personalSituation);

        if (false === $personalSituation) {
            return null;
        }

        return $personalSituation;
    }

    /**
     * @return null|PersonalSituation
     */
    public function lastPersonalSituation(): ?PersonalSituation
    {
        $personalSituation = $this->personalSituation ?? [];
        $personalSituation = InvoiceSuiteArrayUtils::last($personalSituation);

        if (false === $personalSituation) {
            return null;
        }

        return $personalSituation;
    }

    /**
     * @param  PersonalSituation $personalSituation
     * @return static
     */
    public function addToPersonalSituation(
        PersonalSituation $personalSituation
    ): static {
        $this->personalSituation[] = $personalSituation;

        return $this;
    }

    /**
     * @return PersonalSituation
     */
    public function addToPersonalSituationWithCreate(): PersonalSituation
    {
        $this->addToPersonalSituation($personalSituation = new PersonalSituation());

        return $personalSituation;
    }

    /**
     * @param  PersonalSituation $personalSituation
     * @return static
     */
    public function addOnceToPersonalSituation(
        PersonalSituation $personalSituation
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->personalSituation)) {
            $this->personalSituation = [];
        }

        $this->personalSituation[0] = $personalSituation;

        return $this;
    }

    /**
     * @return PersonalSituation
     */
    public function addOnceToPersonalSituationWithCreate(): PersonalSituation
    {
        if (!InvoiceSuiteArrayUtils::is($this->personalSituation)) {
            $this->personalSituation = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->personalSituation)) {
            $this->addOnceToPersonalSituation(new PersonalSituation());
        }

        return $this->personalSituation[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(PersonalSituation): mixed $callback
     * @return static
     */
    public function forEachPersonalSituation(
        callable $callback
    ): static {
        foreach ($this->personalSituation ?? [] as $personalSituation) {
            $callback($personalSituation);
        }

        return $this;
    }

    /**
     * @return null|OperatingYearsQuantity
     */
    public function getOperatingYearsQuantity(): ?OperatingYearsQuantity
    {
        return $this->operatingYearsQuantity;
    }

    /**
     * @return OperatingYearsQuantity
     */
    public function getOperatingYearsQuantityWithCreate(): OperatingYearsQuantity
    {
        $this->operatingYearsQuantity ??= new OperatingYearsQuantity();

        return $this->operatingYearsQuantity;
    }

    /**
     * @param  null|OperatingYearsQuantity $operatingYearsQuantity
     * @return static
     */
    public function setOperatingYearsQuantity(
        ?OperatingYearsQuantity $operatingYearsQuantity = null
    ): static {
        $this->operatingYearsQuantity = $operatingYearsQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOperatingYearsQuantity(): static
    {
        $this->operatingYearsQuantity = null;

        return $this;
    }

    /**
     * @return null|EmployeeQuantity
     */
    public function getEmployeeQuantity(): ?EmployeeQuantity
    {
        return $this->employeeQuantity;
    }

    /**
     * @return EmployeeQuantity
     */
    public function getEmployeeQuantityWithCreate(): EmployeeQuantity
    {
        $this->employeeQuantity ??= new EmployeeQuantity();

        return $this->employeeQuantity;
    }

    /**
     * @param  null|EmployeeQuantity $employeeQuantity
     * @return static
     */
    public function setEmployeeQuantity(
        ?EmployeeQuantity $employeeQuantity = null
    ): static {
        $this->employeeQuantity = $employeeQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmployeeQuantity(): static
    {
        $this->employeeQuantity = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = InvoiceSuiteArrayUtils::first($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = InvoiceSuiteArrayUtils::last($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->description)) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Description): mixed $callback
     * @return static
     */
    public function forEachDescription(
        callable $callback
    ): static {
        foreach ($this->description ?? [] as $description) {
            $callback($description);
        }

        return $this;
    }

    /**
     * @return null|array<RequiredBusinessClassificationScheme>
     */
    public function getRequiredBusinessClassificationScheme(): ?array
    {
        return $this->requiredBusinessClassificationScheme;
    }

    /**
     * @param  null|array<RequiredBusinessClassificationScheme> $requiredBusinessClassificationScheme
     * @return static
     */
    public function setRequiredBusinessClassificationScheme(
        ?array $requiredBusinessClassificationScheme = null
    ): static {
        $this->requiredBusinessClassificationScheme = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredBusinessClassificationScheme(): static
    {
        $this->requiredBusinessClassificationScheme = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequiredBusinessClassificationScheme(): static
    {
        $this->requiredBusinessClassificationScheme = [];

        return $this;
    }

    /**
     * @return null|RequiredBusinessClassificationScheme
     */
    public function firstRequiredBusinessClassificationScheme(): ?RequiredBusinessClassificationScheme
    {
        $requiredBusinessClassificationScheme = $this->requiredBusinessClassificationScheme ?? [];
        $requiredBusinessClassificationScheme = InvoiceSuiteArrayUtils::first($requiredBusinessClassificationScheme);

        if (false === $requiredBusinessClassificationScheme) {
            return null;
        }

        return $requiredBusinessClassificationScheme;
    }

    /**
     * @return null|RequiredBusinessClassificationScheme
     */
    public function lastRequiredBusinessClassificationScheme(): ?RequiredBusinessClassificationScheme
    {
        $requiredBusinessClassificationScheme = $this->requiredBusinessClassificationScheme ?? [];
        $requiredBusinessClassificationScheme = InvoiceSuiteArrayUtils::last($requiredBusinessClassificationScheme);

        if (false === $requiredBusinessClassificationScheme) {
            return null;
        }

        return $requiredBusinessClassificationScheme;
    }

    /**
     * @param  RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme
     * @return static
     */
    public function addToRequiredBusinessClassificationScheme(
        RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme,
    ): static {
        $this->requiredBusinessClassificationScheme[] = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return RequiredBusinessClassificationScheme
     */
    public function addToRequiredBusinessClassificationSchemeWithCreate(): RequiredBusinessClassificationScheme
    {
        $this->addToRequiredBusinessClassificationScheme($requiredBusinessClassificationScheme = new RequiredBusinessClassificationScheme());

        return $requiredBusinessClassificationScheme;
    }

    /**
     * @param  RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme
     * @return static
     */
    public function addOnceToRequiredBusinessClassificationScheme(
        RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->requiredBusinessClassificationScheme)) {
            $this->requiredBusinessClassificationScheme = [];
        }

        $this->requiredBusinessClassificationScheme[0] = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return RequiredBusinessClassificationScheme
     */
    public function addOnceToRequiredBusinessClassificationSchemeWithCreate(): RequiredBusinessClassificationScheme
    {
        if (!InvoiceSuiteArrayUtils::is($this->requiredBusinessClassificationScheme)) {
            $this->requiredBusinessClassificationScheme = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->requiredBusinessClassificationScheme)) {
            $this->addOnceToRequiredBusinessClassificationScheme(new RequiredBusinessClassificationScheme());
        }

        return $this->requiredBusinessClassificationScheme[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(RequiredBusinessClassificationScheme): mixed $callback
     * @return static
     */
    public function forEachRequiredBusinessClassificationScheme(
        callable $callback
    ): static {
        foreach ($this->requiredBusinessClassificationScheme ?? [] as $requiredBusinessClassificationScheme) {
            $callback($requiredBusinessClassificationScheme);
        }

        return $this;
    }

    /**
     * @return null|array<TechnicalEvaluationCriterion>
     */
    public function getTechnicalEvaluationCriterion(): ?array
    {
        return $this->technicalEvaluationCriterion;
    }

    /**
     * @param  null|array<TechnicalEvaluationCriterion> $technicalEvaluationCriterion
     * @return static
     */
    public function setTechnicalEvaluationCriterion(
        ?array $technicalEvaluationCriterion = null
    ): static {
        $this->technicalEvaluationCriterion = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTechnicalEvaluationCriterion(): static
    {
        $this->technicalEvaluationCriterion = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTechnicalEvaluationCriterion(): static
    {
        $this->technicalEvaluationCriterion = [];

        return $this;
    }

    /**
     * @return null|TechnicalEvaluationCriterion
     */
    public function firstTechnicalEvaluationCriterion(): ?TechnicalEvaluationCriterion
    {
        $technicalEvaluationCriterion = $this->technicalEvaluationCriterion ?? [];
        $technicalEvaluationCriterion = InvoiceSuiteArrayUtils::first($technicalEvaluationCriterion);

        if (false === $technicalEvaluationCriterion) {
            return null;
        }

        return $technicalEvaluationCriterion;
    }

    /**
     * @return null|TechnicalEvaluationCriterion
     */
    public function lastTechnicalEvaluationCriterion(): ?TechnicalEvaluationCriterion
    {
        $technicalEvaluationCriterion = $this->technicalEvaluationCriterion ?? [];
        $technicalEvaluationCriterion = InvoiceSuiteArrayUtils::last($technicalEvaluationCriterion);

        if (false === $technicalEvaluationCriterion) {
            return null;
        }

        return $technicalEvaluationCriterion;
    }

    /**
     * @param  TechnicalEvaluationCriterion $technicalEvaluationCriterion
     * @return static
     */
    public function addToTechnicalEvaluationCriterion(
        TechnicalEvaluationCriterion $technicalEvaluationCriterion,
    ): static {
        $this->technicalEvaluationCriterion[] = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return TechnicalEvaluationCriterion
     */
    public function addToTechnicalEvaluationCriterionWithCreate(): TechnicalEvaluationCriterion
    {
        $this->addToTechnicalEvaluationCriterion($technicalEvaluationCriterion = new TechnicalEvaluationCriterion());

        return $technicalEvaluationCriterion;
    }

    /**
     * @param  TechnicalEvaluationCriterion $technicalEvaluationCriterion
     * @return static
     */
    public function addOnceToTechnicalEvaluationCriterion(
        TechnicalEvaluationCriterion $technicalEvaluationCriterion,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->technicalEvaluationCriterion)) {
            $this->technicalEvaluationCriterion = [];
        }

        $this->technicalEvaluationCriterion[0] = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return TechnicalEvaluationCriterion
     */
    public function addOnceToTechnicalEvaluationCriterionWithCreate(): TechnicalEvaluationCriterion
    {
        if (!InvoiceSuiteArrayUtils::is($this->technicalEvaluationCriterion)) {
            $this->technicalEvaluationCriterion = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->technicalEvaluationCriterion)) {
            $this->addOnceToTechnicalEvaluationCriterion(new TechnicalEvaluationCriterion());
        }

        return $this->technicalEvaluationCriterion[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(TechnicalEvaluationCriterion): mixed $callback
     * @return static
     */
    public function forEachTechnicalEvaluationCriterion(
        callable $callback
    ): static {
        foreach ($this->technicalEvaluationCriterion ?? [] as $technicalEvaluationCriterion) {
            $callback($technicalEvaluationCriterion);
        }

        return $this;
    }

    /**
     * @return null|array<FinancialEvaluationCriterion>
     */
    public function getFinancialEvaluationCriterion(): ?array
    {
        return $this->financialEvaluationCriterion;
    }

    /**
     * @param  null|array<FinancialEvaluationCriterion> $financialEvaluationCriterion
     * @return static
     */
    public function setFinancialEvaluationCriterion(
        ?array $financialEvaluationCriterion = null
    ): static {
        $this->financialEvaluationCriterion = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancialEvaluationCriterion(): static
    {
        $this->financialEvaluationCriterion = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFinancialEvaluationCriterion(): static
    {
        $this->financialEvaluationCriterion = [];

        return $this;
    }

    /**
     * @return null|FinancialEvaluationCriterion
     */
    public function firstFinancialEvaluationCriterion(): ?FinancialEvaluationCriterion
    {
        $financialEvaluationCriterion = $this->financialEvaluationCriterion ?? [];
        $financialEvaluationCriterion = InvoiceSuiteArrayUtils::first($financialEvaluationCriterion);

        if (false === $financialEvaluationCriterion) {
            return null;
        }

        return $financialEvaluationCriterion;
    }

    /**
     * @return null|FinancialEvaluationCriterion
     */
    public function lastFinancialEvaluationCriterion(): ?FinancialEvaluationCriterion
    {
        $financialEvaluationCriterion = $this->financialEvaluationCriterion ?? [];
        $financialEvaluationCriterion = InvoiceSuiteArrayUtils::last($financialEvaluationCriterion);

        if (false === $financialEvaluationCriterion) {
            return null;
        }

        return $financialEvaluationCriterion;
    }

    /**
     * @param  FinancialEvaluationCriterion $financialEvaluationCriterion
     * @return static
     */
    public function addToFinancialEvaluationCriterion(
        FinancialEvaluationCriterion $financialEvaluationCriterion,
    ): static {
        $this->financialEvaluationCriterion[] = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return FinancialEvaluationCriterion
     */
    public function addToFinancialEvaluationCriterionWithCreate(): FinancialEvaluationCriterion
    {
        $this->addToFinancialEvaluationCriterion($financialEvaluationCriterion = new FinancialEvaluationCriterion());

        return $financialEvaluationCriterion;
    }

    /**
     * @param  FinancialEvaluationCriterion $financialEvaluationCriterion
     * @return static
     */
    public function addOnceToFinancialEvaluationCriterion(
        FinancialEvaluationCriterion $financialEvaluationCriterion,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->financialEvaluationCriterion)) {
            $this->financialEvaluationCriterion = [];
        }

        $this->financialEvaluationCriterion[0] = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return FinancialEvaluationCriterion
     */
    public function addOnceToFinancialEvaluationCriterionWithCreate(): FinancialEvaluationCriterion
    {
        if (!InvoiceSuiteArrayUtils::is($this->financialEvaluationCriterion)) {
            $this->financialEvaluationCriterion = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->financialEvaluationCriterion)) {
            $this->addOnceToFinancialEvaluationCriterion(new FinancialEvaluationCriterion());
        }

        return $this->financialEvaluationCriterion[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(FinancialEvaluationCriterion): mixed $callback
     * @return static
     */
    public function forEachFinancialEvaluationCriterion(
        callable $callback
    ): static {
        foreach ($this->financialEvaluationCriterion ?? [] as $financialEvaluationCriterion) {
            $callback($financialEvaluationCriterion);
        }

        return $this;
    }

    /**
     * @return null|array<SpecificTendererRequirement>
     */
    public function getSpecificTendererRequirement(): ?array
    {
        return $this->specificTendererRequirement;
    }

    /**
     * @param  null|array<SpecificTendererRequirement> $specificTendererRequirement
     * @return static
     */
    public function setSpecificTendererRequirement(
        ?array $specificTendererRequirement = null
    ): static {
        $this->specificTendererRequirement = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecificTendererRequirement(): static
    {
        $this->specificTendererRequirement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecificTendererRequirement(): static
    {
        $this->specificTendererRequirement = [];

        return $this;
    }

    /**
     * @return null|SpecificTendererRequirement
     */
    public function firstSpecificTendererRequirement(): ?SpecificTendererRequirement
    {
        $specificTendererRequirement = $this->specificTendererRequirement ?? [];
        $specificTendererRequirement = InvoiceSuiteArrayUtils::first($specificTendererRequirement);

        if (false === $specificTendererRequirement) {
            return null;
        }

        return $specificTendererRequirement;
    }

    /**
     * @return null|SpecificTendererRequirement
     */
    public function lastSpecificTendererRequirement(): ?SpecificTendererRequirement
    {
        $specificTendererRequirement = $this->specificTendererRequirement ?? [];
        $specificTendererRequirement = InvoiceSuiteArrayUtils::last($specificTendererRequirement);

        if (false === $specificTendererRequirement) {
            return null;
        }

        return $specificTendererRequirement;
    }

    /**
     * @param  SpecificTendererRequirement $specificTendererRequirement
     * @return static
     */
    public function addToSpecificTendererRequirement(
        SpecificTendererRequirement $specificTendererRequirement
    ): static {
        $this->specificTendererRequirement[] = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return SpecificTendererRequirement
     */
    public function addToSpecificTendererRequirementWithCreate(): SpecificTendererRequirement
    {
        $this->addToSpecificTendererRequirement($specificTendererRequirement = new SpecificTendererRequirement());

        return $specificTendererRequirement;
    }

    /**
     * @param  SpecificTendererRequirement $specificTendererRequirement
     * @return static
     */
    public function addOnceToSpecificTendererRequirement(
        SpecificTendererRequirement $specificTendererRequirement,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specificTendererRequirement)) {
            $this->specificTendererRequirement = [];
        }

        $this->specificTendererRequirement[0] = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return SpecificTendererRequirement
     */
    public function addOnceToSpecificTendererRequirementWithCreate(): SpecificTendererRequirement
    {
        if (!InvoiceSuiteArrayUtils::is($this->specificTendererRequirement)) {
            $this->specificTendererRequirement = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->specificTendererRequirement)) {
            $this->addOnceToSpecificTendererRequirement(new SpecificTendererRequirement());
        }

        return $this->specificTendererRequirement[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(SpecificTendererRequirement): mixed $callback
     * @return static
     */
    public function forEachSpecificTendererRequirement(
        callable $callback
    ): static {
        foreach ($this->specificTendererRequirement ?? [] as $specificTendererRequirement) {
            $callback($specificTendererRequirement);
        }

        return $this;
    }

    /**
     * @return null|array<EconomicOperatorRole>
     */
    public function getEconomicOperatorRole(): ?array
    {
        return $this->economicOperatorRole;
    }

    /**
     * @param  null|array<EconomicOperatorRole> $economicOperatorRole
     * @return static
     */
    public function setEconomicOperatorRole(
        ?array $economicOperatorRole = null
    ): static {
        $this->economicOperatorRole = $economicOperatorRole;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEconomicOperatorRole(): static
    {
        $this->economicOperatorRole = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEconomicOperatorRole(): static
    {
        $this->economicOperatorRole = [];

        return $this;
    }

    /**
     * @return null|EconomicOperatorRole
     */
    public function firstEconomicOperatorRole(): ?EconomicOperatorRole
    {
        $economicOperatorRole = $this->economicOperatorRole ?? [];
        $economicOperatorRole = InvoiceSuiteArrayUtils::first($economicOperatorRole);

        if (false === $economicOperatorRole) {
            return null;
        }

        return $economicOperatorRole;
    }

    /**
     * @return null|EconomicOperatorRole
     */
    public function lastEconomicOperatorRole(): ?EconomicOperatorRole
    {
        $economicOperatorRole = $this->economicOperatorRole ?? [];
        $economicOperatorRole = InvoiceSuiteArrayUtils::last($economicOperatorRole);

        if (false === $economicOperatorRole) {
            return null;
        }

        return $economicOperatorRole;
    }

    /**
     * @param  EconomicOperatorRole $economicOperatorRole
     * @return static
     */
    public function addToEconomicOperatorRole(
        EconomicOperatorRole $economicOperatorRole
    ): static {
        $this->economicOperatorRole[] = $economicOperatorRole;

        return $this;
    }

    /**
     * @return EconomicOperatorRole
     */
    public function addToEconomicOperatorRoleWithCreate(): EconomicOperatorRole
    {
        $this->addToEconomicOperatorRole($economicOperatorRole = new EconomicOperatorRole());

        return $economicOperatorRole;
    }

    /**
     * @param  EconomicOperatorRole $economicOperatorRole
     * @return static
     */
    public function addOnceToEconomicOperatorRole(
        EconomicOperatorRole $economicOperatorRole
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->economicOperatorRole)) {
            $this->economicOperatorRole = [];
        }

        $this->economicOperatorRole[0] = $economicOperatorRole;

        return $this;
    }

    /**
     * @return EconomicOperatorRole
     */
    public function addOnceToEconomicOperatorRoleWithCreate(): EconomicOperatorRole
    {
        if (!InvoiceSuiteArrayUtils::is($this->economicOperatorRole)) {
            $this->economicOperatorRole = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->economicOperatorRole)) {
            $this->addOnceToEconomicOperatorRole(new EconomicOperatorRole());
        }

        return $this->economicOperatorRole[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(EconomicOperatorRole): mixed $callback
     * @return static
     */
    public function forEachEconomicOperatorRole(
        callable $callback
    ): static {
        foreach ($this->economicOperatorRole ?? [] as $economicOperatorRole) {
            $callback($economicOperatorRole);
        }

        return $this;
    }
}
