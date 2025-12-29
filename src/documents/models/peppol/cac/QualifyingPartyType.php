<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BusinessClassificationEvidenceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BusinessIdentityEvidenceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\EmployeeQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OperatingYearsQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ParticipationPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PersonalSituation;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TendererRoleCode;
use JMS\Serializer\Annotation as JMS;

class QualifyingPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|ParticipationPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ParticipationPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ParticipationPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParticipationPercent", setter="setParticipationPercent")
     */
    private $participationPercent;

    /**
     * @var null|array<PersonalSituation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\PersonalSituation>")
     * @JMS\Expose
     * @JMS\SerializedName("PersonalSituation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PersonalSituation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPersonalSituation", setter="setPersonalSituation")
     */
    private $personalSituation;

    /**
     * @var null|OperatingYearsQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OperatingYearsQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("OperatingYearsQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOperatingYearsQuantity", setter="setOperatingYearsQuantity")
     */
    private $operatingYearsQuantity;

    /**
     * @var null|EmployeeQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\EmployeeQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("EmployeeQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmployeeQuantity", setter="setEmployeeQuantity")
     */
    private $employeeQuantity;

    /**
     * @var null|BusinessClassificationEvidenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BusinessClassificationEvidenceID")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessClassificationEvidenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBusinessClassificationEvidenceID", setter="setBusinessClassificationEvidenceID")
     */
    private $businessClassificationEvidenceID;

    /**
     * @var null|BusinessIdentityEvidenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BusinessIdentityEvidenceID")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessIdentityEvidenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBusinessIdentityEvidenceID", setter="setBusinessIdentityEvidenceID")
     */
    private $businessIdentityEvidenceID;

    /**
     * @var null|TendererRoleCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TendererRoleCode")
     * @JMS\Expose
     * @JMS\SerializedName("TendererRoleCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTendererRoleCode", setter="setTendererRoleCode")
     */
    private $tendererRoleCode;

    /**
     * @var null|BusinessClassificationScheme
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\BusinessClassificationScheme")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessClassificationScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBusinessClassificationScheme", setter="setBusinessClassificationScheme")
     */
    private $businessClassificationScheme;

    /**
     * @var null|array<TechnicalCapability>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TechnicalCapability>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalCapability")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalCapability", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTechnicalCapability", setter="setTechnicalCapability")
     */
    private $technicalCapability;

    /**
     * @var null|array<FinancialCapability>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\FinancialCapability>")
     * @JMS\Expose
     * @JMS\SerializedName("FinancialCapability")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FinancialCapability", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFinancialCapability", setter="setFinancialCapability")
     */
    private $financialCapability;

    /**
     * @var null|array<CompletedTask>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\CompletedTask>")
     * @JMS\Expose
     * @JMS\SerializedName("CompletedTask")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CompletedTask", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCompletedTask", setter="setCompletedTask")
     */
    private $completedTask;

    /**
     * @var null|array<Declaration>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Declaration>")
     * @JMS\Expose
     * @JMS\SerializedName("Declaration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Declaration", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeclaration", setter="setDeclaration")
     */
    private $declaration;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var null|EconomicOperatorRole
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EconomicOperatorRole")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorRole")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEconomicOperatorRole", setter="setEconomicOperatorRole")
     */
    private $economicOperatorRole;

    /**
     * @return null|ParticipationPercent
     */
    public function getParticipationPercent(): ?ParticipationPercent
    {
        return $this->participationPercent;
    }

    /**
     * @return ParticipationPercent
     */
    public function getParticipationPercentWithCreate(): ParticipationPercent
    {
        $this->participationPercent = is_null($this->participationPercent) ? new ParticipationPercent() : $this->participationPercent;

        return $this->participationPercent;
    }

    /**
     * @param  null|ParticipationPercent $participationPercent
     * @return static
     */
    public function setParticipationPercent(?ParticipationPercent $participationPercent = null): static
    {
        $this->participationPercent = $participationPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParticipationPercent(): static
    {
        $this->participationPercent = null;

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
    public function setPersonalSituation(?array $personalSituation = null): static
    {
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
        $personalSituation = reset($personalSituation);

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
        $personalSituation = end($personalSituation);

        if (false === $personalSituation) {
            return null;
        }

        return $personalSituation;
    }

    /**
     * @param  PersonalSituation $personalSituation
     * @return static
     */
    public function addToPersonalSituation(PersonalSituation $personalSituation): static
    {
        $this->personalSituation[] = $personalSituation;

        return $this;
    }

    /**
     * @return PersonalSituation
     */
    public function addToPersonalSituationWithCreate(): PersonalSituation
    {
        $this->addTopersonalSituation($personalSituation = new PersonalSituation());

        return $personalSituation;
    }

    /**
     * @param  PersonalSituation $personalSituation
     * @return static
     */
    public function addOnceToPersonalSituation(PersonalSituation $personalSituation): static
    {
        if (!is_array($this->personalSituation)) {
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
        if (!is_array($this->personalSituation)) {
            $this->personalSituation = [];
        }

        if ([] === $this->personalSituation) {
            $this->addOnceTopersonalSituation(new PersonalSituation());
        }

        return $this->personalSituation[0];
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
        $this->operatingYearsQuantity = is_null($this->operatingYearsQuantity) ? new OperatingYearsQuantity() : $this->operatingYearsQuantity;

        return $this->operatingYearsQuantity;
    }

    /**
     * @param  null|OperatingYearsQuantity $operatingYearsQuantity
     * @return static
     */
    public function setOperatingYearsQuantity(?OperatingYearsQuantity $operatingYearsQuantity = null): static
    {
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
        $this->employeeQuantity = is_null($this->employeeQuantity) ? new EmployeeQuantity() : $this->employeeQuantity;

        return $this->employeeQuantity;
    }

    /**
     * @param  null|EmployeeQuantity $employeeQuantity
     * @return static
     */
    public function setEmployeeQuantity(?EmployeeQuantity $employeeQuantity = null): static
    {
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
     * @return null|BusinessClassificationEvidenceID
     */
    public function getBusinessClassificationEvidenceID(): ?BusinessClassificationEvidenceID
    {
        return $this->businessClassificationEvidenceID;
    }

    /**
     * @return BusinessClassificationEvidenceID
     */
    public function getBusinessClassificationEvidenceIDWithCreate(): BusinessClassificationEvidenceID
    {
        $this->businessClassificationEvidenceID = is_null($this->businessClassificationEvidenceID) ? new BusinessClassificationEvidenceID() : $this->businessClassificationEvidenceID;

        return $this->businessClassificationEvidenceID;
    }

    /**
     * @param  null|BusinessClassificationEvidenceID $businessClassificationEvidenceID
     * @return static
     */
    public function setBusinessClassificationEvidenceID(
        ?BusinessClassificationEvidenceID $businessClassificationEvidenceID = null,
    ): static {
        $this->businessClassificationEvidenceID = $businessClassificationEvidenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBusinessClassificationEvidenceID(): static
    {
        $this->businessClassificationEvidenceID = null;

        return $this;
    }

    /**
     * @return null|BusinessIdentityEvidenceID
     */
    public function getBusinessIdentityEvidenceID(): ?BusinessIdentityEvidenceID
    {
        return $this->businessIdentityEvidenceID;
    }

    /**
     * @return BusinessIdentityEvidenceID
     */
    public function getBusinessIdentityEvidenceIDWithCreate(): BusinessIdentityEvidenceID
    {
        $this->businessIdentityEvidenceID = is_null($this->businessIdentityEvidenceID) ? new BusinessIdentityEvidenceID() : $this->businessIdentityEvidenceID;

        return $this->businessIdentityEvidenceID;
    }

    /**
     * @param  null|BusinessIdentityEvidenceID $businessIdentityEvidenceID
     * @return static
     */
    public function setBusinessIdentityEvidenceID(
        ?BusinessIdentityEvidenceID $businessIdentityEvidenceID = null,
    ): static {
        $this->businessIdentityEvidenceID = $businessIdentityEvidenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBusinessIdentityEvidenceID(): static
    {
        $this->businessIdentityEvidenceID = null;

        return $this;
    }

    /**
     * @return null|TendererRoleCode
     */
    public function getTendererRoleCode(): ?TendererRoleCode
    {
        return $this->tendererRoleCode;
    }

    /**
     * @return TendererRoleCode
     */
    public function getTendererRoleCodeWithCreate(): TendererRoleCode
    {
        $this->tendererRoleCode = is_null($this->tendererRoleCode) ? new TendererRoleCode() : $this->tendererRoleCode;

        return $this->tendererRoleCode;
    }

    /**
     * @param  null|TendererRoleCode $tendererRoleCode
     * @return static
     */
    public function setTendererRoleCode(?TendererRoleCode $tendererRoleCode = null): static
    {
        $this->tendererRoleCode = $tendererRoleCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTendererRoleCode(): static
    {
        $this->tendererRoleCode = null;

        return $this;
    }

    /**
     * @return null|BusinessClassificationScheme
     */
    public function getBusinessClassificationScheme(): ?BusinessClassificationScheme
    {
        return $this->businessClassificationScheme;
    }

    /**
     * @return BusinessClassificationScheme
     */
    public function getBusinessClassificationSchemeWithCreate(): BusinessClassificationScheme
    {
        $this->businessClassificationScheme = is_null($this->businessClassificationScheme) ? new BusinessClassificationScheme() : $this->businessClassificationScheme;

        return $this->businessClassificationScheme;
    }

    /**
     * @param  null|BusinessClassificationScheme $businessClassificationScheme
     * @return static
     */
    public function setBusinessClassificationScheme(
        ?BusinessClassificationScheme $businessClassificationScheme = null,
    ): static {
        $this->businessClassificationScheme = $businessClassificationScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBusinessClassificationScheme(): static
    {
        $this->businessClassificationScheme = null;

        return $this;
    }

    /**
     * @return null|array<TechnicalCapability>
     */
    public function getTechnicalCapability(): ?array
    {
        return $this->technicalCapability;
    }

    /**
     * @param  null|array<TechnicalCapability> $technicalCapability
     * @return static
     */
    public function setTechnicalCapability(?array $technicalCapability = null): static
    {
        $this->technicalCapability = $technicalCapability;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTechnicalCapability(): static
    {
        $this->technicalCapability = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTechnicalCapability(): static
    {
        $this->technicalCapability = [];

        return $this;
    }

    /**
     * @return null|TechnicalCapability
     */
    public function firstTechnicalCapability(): ?TechnicalCapability
    {
        $technicalCapability = $this->technicalCapability ?? [];
        $technicalCapability = reset($technicalCapability);

        if (false === $technicalCapability) {
            return null;
        }

        return $technicalCapability;
    }

    /**
     * @return null|TechnicalCapability
     */
    public function lastTechnicalCapability(): ?TechnicalCapability
    {
        $technicalCapability = $this->technicalCapability ?? [];
        $technicalCapability = end($technicalCapability);

        if (false === $technicalCapability) {
            return null;
        }

        return $technicalCapability;
    }

    /**
     * @param  TechnicalCapability $technicalCapability
     * @return static
     */
    public function addToTechnicalCapability(TechnicalCapability $technicalCapability): static
    {
        $this->technicalCapability[] = $technicalCapability;

        return $this;
    }

    /**
     * @return TechnicalCapability
     */
    public function addToTechnicalCapabilityWithCreate(): TechnicalCapability
    {
        $this->addTotechnicalCapability($technicalCapability = new TechnicalCapability());

        return $technicalCapability;
    }

    /**
     * @param  TechnicalCapability $technicalCapability
     * @return static
     */
    public function addOnceToTechnicalCapability(TechnicalCapability $technicalCapability): static
    {
        if (!is_array($this->technicalCapability)) {
            $this->technicalCapability = [];
        }

        $this->technicalCapability[0] = $technicalCapability;

        return $this;
    }

    /**
     * @return TechnicalCapability
     */
    public function addOnceToTechnicalCapabilityWithCreate(): TechnicalCapability
    {
        if (!is_array($this->technicalCapability)) {
            $this->technicalCapability = [];
        }

        if ([] === $this->technicalCapability) {
            $this->addOnceTotechnicalCapability(new TechnicalCapability());
        }

        return $this->technicalCapability[0];
    }

    /**
     * @return null|array<FinancialCapability>
     */
    public function getFinancialCapability(): ?array
    {
        return $this->financialCapability;
    }

    /**
     * @param  null|array<FinancialCapability> $financialCapability
     * @return static
     */
    public function setFinancialCapability(?array $financialCapability = null): static
    {
        $this->financialCapability = $financialCapability;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancialCapability(): static
    {
        $this->financialCapability = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFinancialCapability(): static
    {
        $this->financialCapability = [];

        return $this;
    }

    /**
     * @return null|FinancialCapability
     */
    public function firstFinancialCapability(): ?FinancialCapability
    {
        $financialCapability = $this->financialCapability ?? [];
        $financialCapability = reset($financialCapability);

        if (false === $financialCapability) {
            return null;
        }

        return $financialCapability;
    }

    /**
     * @return null|FinancialCapability
     */
    public function lastFinancialCapability(): ?FinancialCapability
    {
        $financialCapability = $this->financialCapability ?? [];
        $financialCapability = end($financialCapability);

        if (false === $financialCapability) {
            return null;
        }

        return $financialCapability;
    }

    /**
     * @param  FinancialCapability $financialCapability
     * @return static
     */
    public function addToFinancialCapability(FinancialCapability $financialCapability): static
    {
        $this->financialCapability[] = $financialCapability;

        return $this;
    }

    /**
     * @return FinancialCapability
     */
    public function addToFinancialCapabilityWithCreate(): FinancialCapability
    {
        $this->addTofinancialCapability($financialCapability = new FinancialCapability());

        return $financialCapability;
    }

    /**
     * @param  FinancialCapability $financialCapability
     * @return static
     */
    public function addOnceToFinancialCapability(FinancialCapability $financialCapability): static
    {
        if (!is_array($this->financialCapability)) {
            $this->financialCapability = [];
        }

        $this->financialCapability[0] = $financialCapability;

        return $this;
    }

    /**
     * @return FinancialCapability
     */
    public function addOnceToFinancialCapabilityWithCreate(): FinancialCapability
    {
        if (!is_array($this->financialCapability)) {
            $this->financialCapability = [];
        }

        if ([] === $this->financialCapability) {
            $this->addOnceTofinancialCapability(new FinancialCapability());
        }

        return $this->financialCapability[0];
    }

    /**
     * @return null|array<CompletedTask>
     */
    public function getCompletedTask(): ?array
    {
        return $this->completedTask;
    }

    /**
     * @param  null|array<CompletedTask> $completedTask
     * @return static
     */
    public function setCompletedTask(?array $completedTask = null): static
    {
        $this->completedTask = $completedTask;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompletedTask(): static
    {
        $this->completedTask = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCompletedTask(): static
    {
        $this->completedTask = [];

        return $this;
    }

    /**
     * @return null|CompletedTask
     */
    public function firstCompletedTask(): ?CompletedTask
    {
        $completedTask = $this->completedTask ?? [];
        $completedTask = reset($completedTask);

        if (false === $completedTask) {
            return null;
        }

        return $completedTask;
    }

    /**
     * @return null|CompletedTask
     */
    public function lastCompletedTask(): ?CompletedTask
    {
        $completedTask = $this->completedTask ?? [];
        $completedTask = end($completedTask);

        if (false === $completedTask) {
            return null;
        }

        return $completedTask;
    }

    /**
     * @param  CompletedTask $completedTask
     * @return static
     */
    public function addToCompletedTask(CompletedTask $completedTask): static
    {
        $this->completedTask[] = $completedTask;

        return $this;
    }

    /**
     * @return CompletedTask
     */
    public function addToCompletedTaskWithCreate(): CompletedTask
    {
        $this->addTocompletedTask($completedTask = new CompletedTask());

        return $completedTask;
    }

    /**
     * @param  CompletedTask $completedTask
     * @return static
     */
    public function addOnceToCompletedTask(CompletedTask $completedTask): static
    {
        if (!is_array($this->completedTask)) {
            $this->completedTask = [];
        }

        $this->completedTask[0] = $completedTask;

        return $this;
    }

    /**
     * @return CompletedTask
     */
    public function addOnceToCompletedTaskWithCreate(): CompletedTask
    {
        if (!is_array($this->completedTask)) {
            $this->completedTask = [];
        }

        if ([] === $this->completedTask) {
            $this->addOnceTocompletedTask(new CompletedTask());
        }

        return $this->completedTask[0];
    }

    /**
     * @return null|array<Declaration>
     */
    public function getDeclaration(): ?array
    {
        return $this->declaration;
    }

    /**
     * @param  null|array<Declaration> $declaration
     * @return static
     */
    public function setDeclaration(?array $declaration = null): static
    {
        $this->declaration = $declaration;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeclaration(): static
    {
        $this->declaration = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeclaration(): static
    {
        $this->declaration = [];

        return $this;
    }

    /**
     * @return null|Declaration
     */
    public function firstDeclaration(): ?Declaration
    {
        $declaration = $this->declaration ?? [];
        $declaration = reset($declaration);

        if (false === $declaration) {
            return null;
        }

        return $declaration;
    }

    /**
     * @return null|Declaration
     */
    public function lastDeclaration(): ?Declaration
    {
        $declaration = $this->declaration ?? [];
        $declaration = end($declaration);

        if (false === $declaration) {
            return null;
        }

        return $declaration;
    }

    /**
     * @param  Declaration $declaration
     * @return static
     */
    public function addToDeclaration(Declaration $declaration): static
    {
        $this->declaration[] = $declaration;

        return $this;
    }

    /**
     * @return Declaration
     */
    public function addToDeclarationWithCreate(): Declaration
    {
        $this->addTodeclaration($declaration = new Declaration());

        return $declaration;
    }

    /**
     * @param  Declaration $declaration
     * @return static
     */
    public function addOnceToDeclaration(Declaration $declaration): static
    {
        if (!is_array($this->declaration)) {
            $this->declaration = [];
        }

        $this->declaration[0] = $declaration;

        return $this;
    }

    /**
     * @return Declaration
     */
    public function addOnceToDeclarationWithCreate(): Declaration
    {
        if (!is_array($this->declaration)) {
            $this->declaration = [];
        }

        if ([] === $this->declaration) {
            $this->addOnceTodeclaration(new Declaration());
        }

        return $this->declaration[0];
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }

    /**
     * @return null|EconomicOperatorRole
     */
    public function getEconomicOperatorRole(): ?EconomicOperatorRole
    {
        return $this->economicOperatorRole;
    }

    /**
     * @return EconomicOperatorRole
     */
    public function getEconomicOperatorRoleWithCreate(): EconomicOperatorRole
    {
        $this->economicOperatorRole = is_null($this->economicOperatorRole) ? new EconomicOperatorRole() : $this->economicOperatorRole;

        return $this->economicOperatorRole;
    }

    /**
     * @param  null|EconomicOperatorRole $economicOperatorRole
     * @return static
     */
    public function setEconomicOperatorRole(?EconomicOperatorRole $economicOperatorRole = null): static
    {
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
}
