<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm;
use horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation;

class TendererQualificationRequestType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode")
     * @JMS\Expose
     * @JMS\SerializedName("CompanyLegalFormCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCompanyLegalFormCode", setter="setCompanyLegalFormCode")
     */
    private $companyLegalFormCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm")
     * @JMS\Expose
     * @JMS\SerializedName("CompanyLegalForm")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCompanyLegalForm", setter="setCompanyLegalForm")
     */
    private $companyLegalForm;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation>")
     * @JMS\Expose
     * @JMS\SerializedName("PersonalSituation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PersonalSituation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPersonalSituation", setter="setPersonalSituation")
     */
    private $personalSituation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OperatingYearsQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOperatingYearsQuantity", setter="setOperatingYearsQuantity")
     */
    private $operatingYearsQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("EmployeeQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmployeeQuantity", setter="setEmployeeQuantity")
     */
    private $employeeQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredBusinessClassificationScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredBusinessClassificationScheme", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredBusinessClassificationScheme", setter="setRequiredBusinessClassificationScheme")
     */
    private $requiredBusinessClassificationScheme;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalEvaluationCriterion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalEvaluationCriterion", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTechnicalEvaluationCriterion", setter="setTechnicalEvaluationCriterion")
     */
    private $technicalEvaluationCriterion;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion>")
     * @JMS\Expose
     * @JMS\SerializedName("FinancialEvaluationCriterion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FinancialEvaluationCriterion", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFinancialEvaluationCriterion", setter="setFinancialEvaluationCriterion")
     */
    private $financialEvaluationCriterion;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecificTendererRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecificTendererRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSpecificTendererRequirement", setter="setSpecificTendererRequirement")
     */
    private $specificTendererRequirement;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole>")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorRole")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EconomicOperatorRole", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEconomicOperatorRole", setter="setEconomicOperatorRole")
     */
    private $economicOperatorRole;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode|null
     */
    public function getCompanyLegalFormCode(): ?CompanyLegalFormCode
    {
        return $this->companyLegalFormCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode
     */
    public function getCompanyLegalFormCodeWithCreate(): CompanyLegalFormCode
    {
        $this->companyLegalFormCode = is_null($this->companyLegalFormCode) ? new CompanyLegalFormCode() : $this->companyLegalFormCode;

        return $this->companyLegalFormCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalFormCode|null $companyLegalFormCode
     * @return self
     */
    public function setCompanyLegalFormCode(?CompanyLegalFormCode $companyLegalFormCode = null): self
    {
        $this->companyLegalFormCode = $companyLegalFormCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCompanyLegalFormCode(): self
    {
        $this->companyLegalFormCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm|null
     */
    public function getCompanyLegalForm(): ?CompanyLegalForm
    {
        return $this->companyLegalForm;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm
     */
    public function getCompanyLegalFormWithCreate(): CompanyLegalForm
    {
        $this->companyLegalForm = is_null($this->companyLegalForm) ? new CompanyLegalForm() : $this->companyLegalForm;

        return $this->companyLegalForm;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CompanyLegalForm|null $companyLegalForm
     * @return self
     */
    public function setCompanyLegalForm(?CompanyLegalForm $companyLegalForm = null): self
    {
        $this->companyLegalForm = $companyLegalForm;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCompanyLegalForm(): self
    {
        $this->companyLegalForm = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation>|null
     */
    public function getPersonalSituation(): ?array
    {
        return $this->personalSituation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation>|null $personalSituation
     * @return self
     */
    public function setPersonalSituation(?array $personalSituation = null): self
    {
        $this->personalSituation = $personalSituation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPersonalSituation(): self
    {
        $this->personalSituation = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPersonalSituation(): self
    {
        $this->personalSituation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation $personalSituation
     * @return self
     */
    public function addToPersonalSituation(PersonalSituation $personalSituation): self
    {
        $this->personalSituation[] = $personalSituation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation
     */
    public function addToPersonalSituationWithCreate(): PersonalSituation
    {
        $this->addTopersonalSituation($personalSituation = new PersonalSituation());

        return $personalSituation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation $personalSituation
     * @return self
     */
    public function addOnceToPersonalSituation(PersonalSituation $personalSituation): self
    {
        if (!is_array($this->personalSituation)) {
            $this->personalSituation = [];
        }

        $this->personalSituation[0] = $personalSituation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PersonalSituation
     */
    public function addOnceToPersonalSituationWithCreate(): PersonalSituation
    {
        if (!is_array($this->personalSituation)) {
            $this->personalSituation = [];
        }

        if ($this->personalSituation === []) {
            $this->addOnceTopersonalSituation(new PersonalSituation());
        }

        return $this->personalSituation[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity|null
     */
    public function getOperatingYearsQuantity(): ?OperatingYearsQuantity
    {
        return $this->operatingYearsQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity
     */
    public function getOperatingYearsQuantityWithCreate(): OperatingYearsQuantity
    {
        $this->operatingYearsQuantity = is_null($this->operatingYearsQuantity) ? new OperatingYearsQuantity() : $this->operatingYearsQuantity;

        return $this->operatingYearsQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OperatingYearsQuantity|null $operatingYearsQuantity
     * @return self
     */
    public function setOperatingYearsQuantity(?OperatingYearsQuantity $operatingYearsQuantity = null): self
    {
        $this->operatingYearsQuantity = $operatingYearsQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOperatingYearsQuantity(): self
    {
        $this->operatingYearsQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity|null
     */
    public function getEmployeeQuantity(): ?EmployeeQuantity
    {
        return $this->employeeQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity
     */
    public function getEmployeeQuantityWithCreate(): EmployeeQuantity
    {
        $this->employeeQuantity = is_null($this->employeeQuantity) ? new EmployeeQuantity() : $this->employeeQuantity;

        return $this->employeeQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EmployeeQuantity|null $employeeQuantity
     * @return self
     */
    public function setEmployeeQuantity(?EmployeeQuantity $employeeQuantity = null): self
    {
        $this->employeeQuantity = $employeeQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmployeeQuantity(): self
    {
        $this->employeeQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme>|null
     */
    public function getRequiredBusinessClassificationScheme(): ?array
    {
        return $this->requiredBusinessClassificationScheme;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme>|null $requiredBusinessClassificationScheme
     * @return self
     */
    public function setRequiredBusinessClassificationScheme(?array $requiredBusinessClassificationScheme = null): self
    {
        $this->requiredBusinessClassificationScheme = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequiredBusinessClassificationScheme(): self
    {
        $this->requiredBusinessClassificationScheme = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRequiredBusinessClassificationScheme(): self
    {
        $this->requiredBusinessClassificationScheme = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme
     * @return self
     */
    public function addToRequiredBusinessClassificationScheme(
        RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme,
    ): self {
        $this->requiredBusinessClassificationScheme[] = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme
     */
    public function addToRequiredBusinessClassificationSchemeWithCreate(): RequiredBusinessClassificationScheme
    {
        $this->addTorequiredBusinessClassificationScheme($requiredBusinessClassificationScheme = new RequiredBusinessClassificationScheme());

        return $requiredBusinessClassificationScheme;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme
     * @return self
     */
    public function addOnceToRequiredBusinessClassificationScheme(
        RequiredBusinessClassificationScheme $requiredBusinessClassificationScheme,
    ): self {
        if (!is_array($this->requiredBusinessClassificationScheme)) {
            $this->requiredBusinessClassificationScheme = [];
        }

        $this->requiredBusinessClassificationScheme[0] = $requiredBusinessClassificationScheme;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredBusinessClassificationScheme
     */
    public function addOnceToRequiredBusinessClassificationSchemeWithCreate(): RequiredBusinessClassificationScheme
    {
        if (!is_array($this->requiredBusinessClassificationScheme)) {
            $this->requiredBusinessClassificationScheme = [];
        }

        if ($this->requiredBusinessClassificationScheme === []) {
            $this->addOnceTorequiredBusinessClassificationScheme(new RequiredBusinessClassificationScheme());
        }

        return $this->requiredBusinessClassificationScheme[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion>|null
     */
    public function getTechnicalEvaluationCriterion(): ?array
    {
        return $this->technicalEvaluationCriterion;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion>|null $technicalEvaluationCriterion
     * @return self
     */
    public function setTechnicalEvaluationCriterion(?array $technicalEvaluationCriterion = null): self
    {
        $this->technicalEvaluationCriterion = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTechnicalEvaluationCriterion(): self
    {
        $this->technicalEvaluationCriterion = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTechnicalEvaluationCriterion(): self
    {
        $this->technicalEvaluationCriterion = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion $technicalEvaluationCriterion
     * @return self
     */
    public function addToTechnicalEvaluationCriterion(
        TechnicalEvaluationCriterion $technicalEvaluationCriterion,
    ): self {
        $this->technicalEvaluationCriterion[] = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion
     */
    public function addToTechnicalEvaluationCriterionWithCreate(): TechnicalEvaluationCriterion
    {
        $this->addTotechnicalEvaluationCriterion($technicalEvaluationCriterion = new TechnicalEvaluationCriterion());

        return $technicalEvaluationCriterion;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion $technicalEvaluationCriterion
     * @return self
     */
    public function addOnceToTechnicalEvaluationCriterion(
        TechnicalEvaluationCriterion $technicalEvaluationCriterion,
    ): self {
        if (!is_array($this->technicalEvaluationCriterion)) {
            $this->technicalEvaluationCriterion = [];
        }

        $this->technicalEvaluationCriterion[0] = $technicalEvaluationCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TechnicalEvaluationCriterion
     */
    public function addOnceToTechnicalEvaluationCriterionWithCreate(): TechnicalEvaluationCriterion
    {
        if (!is_array($this->technicalEvaluationCriterion)) {
            $this->technicalEvaluationCriterion = [];
        }

        if ($this->technicalEvaluationCriterion === []) {
            $this->addOnceTotechnicalEvaluationCriterion(new TechnicalEvaluationCriterion());
        }

        return $this->technicalEvaluationCriterion[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion>|null
     */
    public function getFinancialEvaluationCriterion(): ?array
    {
        return $this->financialEvaluationCriterion;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion>|null $financialEvaluationCriterion
     * @return self
     */
    public function setFinancialEvaluationCriterion(?array $financialEvaluationCriterion = null): self
    {
        $this->financialEvaluationCriterion = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinancialEvaluationCriterion(): self
    {
        $this->financialEvaluationCriterion = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearFinancialEvaluationCriterion(): self
    {
        $this->financialEvaluationCriterion = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion $financialEvaluationCriterion
     * @return self
     */
    public function addToFinancialEvaluationCriterion(
        FinancialEvaluationCriterion $financialEvaluationCriterion,
    ): self {
        $this->financialEvaluationCriterion[] = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion
     */
    public function addToFinancialEvaluationCriterionWithCreate(): FinancialEvaluationCriterion
    {
        $this->addTofinancialEvaluationCriterion($financialEvaluationCriterion = new FinancialEvaluationCriterion());

        return $financialEvaluationCriterion;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion $financialEvaluationCriterion
     * @return self
     */
    public function addOnceToFinancialEvaluationCriterion(
        FinancialEvaluationCriterion $financialEvaluationCriterion,
    ): self {
        if (!is_array($this->financialEvaluationCriterion)) {
            $this->financialEvaluationCriterion = [];
        }

        $this->financialEvaluationCriterion[0] = $financialEvaluationCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancialEvaluationCriterion
     */
    public function addOnceToFinancialEvaluationCriterionWithCreate(): FinancialEvaluationCriterion
    {
        if (!is_array($this->financialEvaluationCriterion)) {
            $this->financialEvaluationCriterion = [];
        }

        if ($this->financialEvaluationCriterion === []) {
            $this->addOnceTofinancialEvaluationCriterion(new FinancialEvaluationCriterion());
        }

        return $this->financialEvaluationCriterion[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement>|null
     */
    public function getSpecificTendererRequirement(): ?array
    {
        return $this->specificTendererRequirement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement>|null $specificTendererRequirement
     * @return self
     */
    public function setSpecificTendererRequirement(?array $specificTendererRequirement = null): self
    {
        $this->specificTendererRequirement = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecificTendererRequirement(): self
    {
        $this->specificTendererRequirement = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecificTendererRequirement(): self
    {
        $this->specificTendererRequirement = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement $specificTendererRequirement
     * @return self
     */
    public function addToSpecificTendererRequirement(SpecificTendererRequirement $specificTendererRequirement): self
    {
        $this->specificTendererRequirement[] = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement
     */
    public function addToSpecificTendererRequirementWithCreate(): SpecificTendererRequirement
    {
        $this->addTospecificTendererRequirement($specificTendererRequirement = new SpecificTendererRequirement());

        return $specificTendererRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement $specificTendererRequirement
     * @return self
     */
    public function addOnceToSpecificTendererRequirement(
        SpecificTendererRequirement $specificTendererRequirement,
    ): self {
        if (!is_array($this->specificTendererRequirement)) {
            $this->specificTendererRequirement = [];
        }

        $this->specificTendererRequirement[0] = $specificTendererRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SpecificTendererRequirement
     */
    public function addOnceToSpecificTendererRequirementWithCreate(): SpecificTendererRequirement
    {
        if (!is_array($this->specificTendererRequirement)) {
            $this->specificTendererRequirement = [];
        }

        if ($this->specificTendererRequirement === []) {
            $this->addOnceTospecificTendererRequirement(new SpecificTendererRequirement());
        }

        return $this->specificTendererRequirement[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole>|null
     */
    public function getEconomicOperatorRole(): ?array
    {
        return $this->economicOperatorRole;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole>|null $economicOperatorRole
     * @return self
     */
    public function setEconomicOperatorRole(?array $economicOperatorRole = null): self
    {
        $this->economicOperatorRole = $economicOperatorRole;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEconomicOperatorRole(): self
    {
        $this->economicOperatorRole = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEconomicOperatorRole(): self
    {
        $this->economicOperatorRole = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole $economicOperatorRole
     * @return self
     */
    public function addToEconomicOperatorRole(EconomicOperatorRole $economicOperatorRole): self
    {
        $this->economicOperatorRole[] = $economicOperatorRole;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole
     */
    public function addToEconomicOperatorRoleWithCreate(): EconomicOperatorRole
    {
        $this->addToeconomicOperatorRole($economicOperatorRole = new EconomicOperatorRole());

        return $economicOperatorRole;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole $economicOperatorRole
     * @return self
     */
    public function addOnceToEconomicOperatorRole(EconomicOperatorRole $economicOperatorRole): self
    {
        if (!is_array($this->economicOperatorRole)) {
            $this->economicOperatorRole = [];
        }

        $this->economicOperatorRole[0] = $economicOperatorRole;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorRole
     */
    public function addOnceToEconomicOperatorRoleWithCreate(): EconomicOperatorRole
    {
        if (!is_array($this->economicOperatorRole)) {
            $this->economicOperatorRole = [];
        }

        if ($this->economicOperatorRole === []) {
            $this->addOnceToeconomicOperatorRole(new EconomicOperatorRole());
        }

        return $this->economicOperatorRole[0];
    }
}
