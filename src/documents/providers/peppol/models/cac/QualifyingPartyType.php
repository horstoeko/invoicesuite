<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BusinessClassificationEvidenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BusinessIdentityEvidenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmployeeQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OperatingYearsQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ParticipationPercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PersonalSituation;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TendererRoleCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class QualifyingPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|ParticipationPercent
     */
    #[JMS\Accessor(getter: 'getParticipationPercent', setter: 'setParticipationPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ParticipationPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ParticipationPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $participationPercent;

    /**
     * @var null|array<PersonalSituation>
     */
    #[JMS\Accessor(getter: 'getPersonalSituation', setter: 'setPersonalSituation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PersonalSituation')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PersonalSituation>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PersonalSituation', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $personalSituation;

    /**
     * @var null|OperatingYearsQuantity
     */
    #[JMS\Accessor(getter: 'getOperatingYearsQuantity', setter: 'setOperatingYearsQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OperatingYearsQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OperatingYearsQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $operatingYearsQuantity;

    /**
     * @var null|EmployeeQuantity
     */
    #[JMS\Accessor(getter: 'getEmployeeQuantity', setter: 'setEmployeeQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EmployeeQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmployeeQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $employeeQuantity;

    /**
     * @var null|BusinessClassificationEvidenceID
     */
    #[JMS\Accessor(getter: 'getBusinessClassificationEvidenceID', setter: 'setBusinessClassificationEvidenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BusinessClassificationEvidenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BusinessClassificationEvidenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $businessClassificationEvidenceID;

    /**
     * @var null|BusinessIdentityEvidenceID
     */
    #[JMS\Accessor(getter: 'getBusinessIdentityEvidenceID', setter: 'setBusinessIdentityEvidenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BusinessIdentityEvidenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BusinessIdentityEvidenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $businessIdentityEvidenceID;

    /**
     * @var null|TendererRoleCode
     */
    #[JMS\Accessor(getter: 'getTendererRoleCode', setter: 'setTendererRoleCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TendererRoleCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TendererRoleCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tendererRoleCode;

    /**
     * @var null|BusinessClassificationScheme
     */
    #[JMS\Accessor(getter: 'getBusinessClassificationScheme', setter: 'setBusinessClassificationScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BusinessClassificationScheme')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\BusinessClassificationScheme')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $businessClassificationScheme;

    /**
     * @var null|array<TechnicalCapability>
     */
    #[JMS\Accessor(getter: 'getTechnicalCapability', setter: 'setTechnicalCapability')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TechnicalCapability')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TechnicalCapability>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TechnicalCapability', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $technicalCapability;

    /**
     * @var null|array<FinancialCapability>
     */
    #[JMS\Accessor(getter: 'getFinancialCapability', setter: 'setFinancialCapability')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancialCapability')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancialCapability>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'FinancialCapability', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $financialCapability;

    /**
     * @var null|array<CompletedTask>
     */
    #[JMS\Accessor(getter: 'getCompletedTask', setter: 'setCompletedTask')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompletedTask')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CompletedTask>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CompletedTask', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $completedTask;

    /**
     * @var null|array<Declaration>
     */
    #[JMS\Accessor(getter: 'getDeclaration', setter: 'setDeclaration')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Declaration')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Declaration>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Declaration', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $declaration;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $party;

    /**
     * @var null|EconomicOperatorRole
     */
    #[JMS\Accessor(getter: 'getEconomicOperatorRole', setter: 'setEconomicOperatorRole')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EconomicOperatorRole')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EconomicOperatorRole')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->participationPercent ??= new ParticipationPercent();

        return $this->participationPercent;
    }

    /**
     * @param  null|ParticipationPercent $participationPercent
     * @return static
     */
    public function setParticipationPercent(
        ?ParticipationPercent $participationPercent = null
    ): static {
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

        if ([] === $this->personalSituation) {
            $this->addOnceToPersonalSituation(new PersonalSituation());
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
        $this->businessClassificationEvidenceID ??= new BusinessClassificationEvidenceID();

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
        $this->businessIdentityEvidenceID ??= new BusinessIdentityEvidenceID();

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
        $this->tendererRoleCode ??= new TendererRoleCode();

        return $this->tendererRoleCode;
    }

    /**
     * @param  null|TendererRoleCode $tendererRoleCode
     * @return static
     */
    public function setTendererRoleCode(
        ?TendererRoleCode $tendererRoleCode = null
    ): static {
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
        $this->businessClassificationScheme ??= new BusinessClassificationScheme();

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
    public function setTechnicalCapability(
        ?array $technicalCapability = null
    ): static {
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
    public function addToTechnicalCapability(
        TechnicalCapability $technicalCapability
    ): static {
        $this->technicalCapability[] = $technicalCapability;

        return $this;
    }

    /**
     * @return TechnicalCapability
     */
    public function addToTechnicalCapabilityWithCreate(): TechnicalCapability
    {
        $this->addToTechnicalCapability($technicalCapability = new TechnicalCapability());

        return $technicalCapability;
    }

    /**
     * @param  TechnicalCapability $technicalCapability
     * @return static
     */
    public function addOnceToTechnicalCapability(
        TechnicalCapability $technicalCapability
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->technicalCapability)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->technicalCapability)) {
            $this->technicalCapability = [];
        }

        if ([] === $this->technicalCapability) {
            $this->addOnceToTechnicalCapability(new TechnicalCapability());
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
    public function setFinancialCapability(
        ?array $financialCapability = null
    ): static {
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
    public function addToFinancialCapability(
        FinancialCapability $financialCapability
    ): static {
        $this->financialCapability[] = $financialCapability;

        return $this;
    }

    /**
     * @return FinancialCapability
     */
    public function addToFinancialCapabilityWithCreate(): FinancialCapability
    {
        $this->addToFinancialCapability($financialCapability = new FinancialCapability());

        return $financialCapability;
    }

    /**
     * @param  FinancialCapability $financialCapability
     * @return static
     */
    public function addOnceToFinancialCapability(
        FinancialCapability $financialCapability
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->financialCapability)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->financialCapability)) {
            $this->financialCapability = [];
        }

        if ([] === $this->financialCapability) {
            $this->addOnceToFinancialCapability(new FinancialCapability());
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
    public function setCompletedTask(
        ?array $completedTask = null
    ): static {
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
    public function addToCompletedTask(
        CompletedTask $completedTask
    ): static {
        $this->completedTask[] = $completedTask;

        return $this;
    }

    /**
     * @return CompletedTask
     */
    public function addToCompletedTaskWithCreate(): CompletedTask
    {
        $this->addToCompletedTask($completedTask = new CompletedTask());

        return $completedTask;
    }

    /**
     * @param  CompletedTask $completedTask
     * @return static
     */
    public function addOnceToCompletedTask(
        CompletedTask $completedTask
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->completedTask)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->completedTask)) {
            $this->completedTask = [];
        }

        if ([] === $this->completedTask) {
            $this->addOnceToCompletedTask(new CompletedTask());
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
    public function setDeclaration(
        ?array $declaration = null
    ): static {
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
    public function addToDeclaration(
        Declaration $declaration
    ): static {
        $this->declaration[] = $declaration;

        return $this;
    }

    /**
     * @return Declaration
     */
    public function addToDeclarationWithCreate(): Declaration
    {
        $this->addToDeclaration($declaration = new Declaration());

        return $declaration;
    }

    /**
     * @param  Declaration $declaration
     * @return static
     */
    public function addOnceToDeclaration(
        Declaration $declaration
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->declaration)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->declaration)) {
            $this->declaration = [];
        }

        if ([] === $this->declaration) {
            $this->addOnceToDeclaration(new Declaration());
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
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
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
        $this->economicOperatorRole ??= new EconomicOperatorRole();

        return $this->economicOperatorRole;
    }

    /**
     * @param  null|EconomicOperatorRole $economicOperatorRole
     * @return static
     */
    public function setEconomicOperatorRole(
        ?EconomicOperatorRole $economicOperatorRole = null
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
}
