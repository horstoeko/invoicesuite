<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BasicConsumedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumersEnergyLevel;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumersEnergyLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HeatingType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HeatingTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidenceType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidenceTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidentOccupantsNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalConsumedQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionReportType
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
     * @var null|ConsumptionType
     */
    #[JMS\Accessor(getter: 'getConsumptionType', setter: 'setConsumptionType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     */
    #[JMS\Accessor(getter: 'getConsumptionTypeCode', setter: 'setConsumptionTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionTypeCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|TotalConsumedQuantity
     */
    #[JMS\Accessor(getter: 'getTotalConsumedQuantity', setter: 'setTotalConsumedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalConsumedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalConsumedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalConsumedQuantity;

    /**
     * @var null|BasicConsumedQuantity
     */
    #[JMS\Accessor(getter: 'getBasicConsumedQuantity', setter: 'setBasicConsumedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BasicConsumedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BasicConsumedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $basicConsumedQuantity;

    /**
     * @var null|ResidentOccupantsNumeric
     */
    #[JMS\Accessor(getter: 'getResidentOccupantsNumeric', setter: 'setResidentOccupantsNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResidentOccupantsNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidentOccupantsNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $residentOccupantsNumeric;

    /**
     * @var null|ConsumersEnergyLevelCode
     */
    #[JMS\Accessor(getter: 'getConsumersEnergyLevelCode', setter: 'setConsumersEnergyLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumersEnergyLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumersEnergyLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumersEnergyLevelCode;

    /**
     * @var null|ConsumersEnergyLevel
     */
    #[JMS\Accessor(getter: 'getConsumersEnergyLevel', setter: 'setConsumersEnergyLevel')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumersEnergyLevel')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumersEnergyLevel')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumersEnergyLevel;

    /**
     * @var null|ResidenceType
     */
    #[JMS\Accessor(getter: 'getResidenceType', setter: 'setResidenceType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResidenceType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidenceType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $residenceType;

    /**
     * @var null|ResidenceTypeCode
     */
    #[JMS\Accessor(getter: 'getResidenceTypeCode', setter: 'setResidenceTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResidenceTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResidenceTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $residenceTypeCode;

    /**
     * @var null|HeatingType
     */
    #[JMS\Accessor(getter: 'getHeatingType', setter: 'setHeatingType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HeatingType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HeatingType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $heatingType;

    /**
     * @var null|HeatingTypeCode
     */
    #[JMS\Accessor(getter: 'getHeatingTypeCode', setter: 'setHeatingTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HeatingTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HeatingTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $heatingTypeCode;

    /**
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $period;

    /**
     * @var null|GuidanceDocumentReference
     */
    #[JMS\Accessor(getter: 'getGuidanceDocumentReference', setter: 'setGuidanceDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GuidanceDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\GuidanceDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $guidanceDocumentReference;

    /**
     * @var null|DocumentReference
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $documentReference;

    /**
     * @var null|array<ConsumptionReportReference>
     */
    #[JMS\Accessor(getter: 'getConsumptionReportReference', setter: 'setConsumptionReportReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionReportReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsumptionReportReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ConsumptionReportReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consumptionReportReference;

    /**
     * @var null|array<ConsumptionHistory>
     */
    #[JMS\Accessor(getter: 'getConsumptionHistory', setter: 'setConsumptionHistory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionHistory')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsumptionHistory>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ConsumptionHistory', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consumptionHistory;

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
     * @return null|ConsumptionType
     */
    public function getConsumptionType(): ?ConsumptionType
    {
        return $this->consumptionType;
    }

    /**
     * @return ConsumptionType
     */
    public function getConsumptionTypeWithCreate(): ConsumptionType
    {
        $this->consumptionType ??= new ConsumptionType();

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(
        ?ConsumptionType $consumptionType = null
    ): static {
        $this->consumptionType = $consumptionType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionType(): static
    {
        $this->consumptionType = null;

        return $this;
    }

    /**
     * @return null|ConsumptionTypeCode
     */
    public function getConsumptionTypeCode(): ?ConsumptionTypeCode
    {
        return $this->consumptionTypeCode;
    }

    /**
     * @return ConsumptionTypeCode
     */
    public function getConsumptionTypeCodeWithCreate(): ConsumptionTypeCode
    {
        $this->consumptionTypeCode ??= new ConsumptionTypeCode();

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(
        ?ConsumptionTypeCode $consumptionTypeCode = null
    ): static {
        $this->consumptionTypeCode = $consumptionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionTypeCode(): static
    {
        $this->consumptionTypeCode = null;

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
        $description = reset($description);

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
        $description = end($description);

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
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!is_array($this->description)) {
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
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|TotalConsumedQuantity
     */
    public function getTotalConsumedQuantity(): ?TotalConsumedQuantity
    {
        return $this->totalConsumedQuantity;
    }

    /**
     * @return TotalConsumedQuantity
     */
    public function getTotalConsumedQuantityWithCreate(): TotalConsumedQuantity
    {
        $this->totalConsumedQuantity ??= new TotalConsumedQuantity();

        return $this->totalConsumedQuantity;
    }

    /**
     * @param  null|TotalConsumedQuantity $totalConsumedQuantity
     * @return static
     */
    public function setTotalConsumedQuantity(
        ?TotalConsumedQuantity $totalConsumedQuantity = null
    ): static {
        $this->totalConsumedQuantity = $totalConsumedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalConsumedQuantity(): static
    {
        $this->totalConsumedQuantity = null;

        return $this;
    }

    /**
     * @return null|BasicConsumedQuantity
     */
    public function getBasicConsumedQuantity(): ?BasicConsumedQuantity
    {
        return $this->basicConsumedQuantity;
    }

    /**
     * @return BasicConsumedQuantity
     */
    public function getBasicConsumedQuantityWithCreate(): BasicConsumedQuantity
    {
        $this->basicConsumedQuantity ??= new BasicConsumedQuantity();

        return $this->basicConsumedQuantity;
    }

    /**
     * @param  null|BasicConsumedQuantity $basicConsumedQuantity
     * @return static
     */
    public function setBasicConsumedQuantity(
        ?BasicConsumedQuantity $basicConsumedQuantity = null
    ): static {
        $this->basicConsumedQuantity = $basicConsumedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBasicConsumedQuantity(): static
    {
        $this->basicConsumedQuantity = null;

        return $this;
    }

    /**
     * @return null|ResidentOccupantsNumeric
     */
    public function getResidentOccupantsNumeric(): ?ResidentOccupantsNumeric
    {
        return $this->residentOccupantsNumeric;
    }

    /**
     * @return ResidentOccupantsNumeric
     */
    public function getResidentOccupantsNumericWithCreate(): ResidentOccupantsNumeric
    {
        $this->residentOccupantsNumeric ??= new ResidentOccupantsNumeric();

        return $this->residentOccupantsNumeric;
    }

    /**
     * @param  null|ResidentOccupantsNumeric $residentOccupantsNumeric
     * @return static
     */
    public function setResidentOccupantsNumeric(
        ?ResidentOccupantsNumeric $residentOccupantsNumeric = null
    ): static {
        $this->residentOccupantsNumeric = $residentOccupantsNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResidentOccupantsNumeric(): static
    {
        $this->residentOccupantsNumeric = null;

        return $this;
    }

    /**
     * @return null|ConsumersEnergyLevelCode
     */
    public function getConsumersEnergyLevelCode(): ?ConsumersEnergyLevelCode
    {
        return $this->consumersEnergyLevelCode;
    }

    /**
     * @return ConsumersEnergyLevelCode
     */
    public function getConsumersEnergyLevelCodeWithCreate(): ConsumersEnergyLevelCode
    {
        $this->consumersEnergyLevelCode ??= new ConsumersEnergyLevelCode();

        return $this->consumersEnergyLevelCode;
    }

    /**
     * @param  null|ConsumersEnergyLevelCode $consumersEnergyLevelCode
     * @return static
     */
    public function setConsumersEnergyLevelCode(
        ?ConsumersEnergyLevelCode $consumersEnergyLevelCode = null
    ): static {
        $this->consumersEnergyLevelCode = $consumersEnergyLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumersEnergyLevelCode(): static
    {
        $this->consumersEnergyLevelCode = null;

        return $this;
    }

    /**
     * @return null|ConsumersEnergyLevel
     */
    public function getConsumersEnergyLevel(): ?ConsumersEnergyLevel
    {
        return $this->consumersEnergyLevel;
    }

    /**
     * @return ConsumersEnergyLevel
     */
    public function getConsumersEnergyLevelWithCreate(): ConsumersEnergyLevel
    {
        $this->consumersEnergyLevel ??= new ConsumersEnergyLevel();

        return $this->consumersEnergyLevel;
    }

    /**
     * @param  null|ConsumersEnergyLevel $consumersEnergyLevel
     * @return static
     */
    public function setConsumersEnergyLevel(
        ?ConsumersEnergyLevel $consumersEnergyLevel = null
    ): static {
        $this->consumersEnergyLevel = $consumersEnergyLevel;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumersEnergyLevel(): static
    {
        $this->consumersEnergyLevel = null;

        return $this;
    }

    /**
     * @return null|ResidenceType
     */
    public function getResidenceType(): ?ResidenceType
    {
        return $this->residenceType;
    }

    /**
     * @return ResidenceType
     */
    public function getResidenceTypeWithCreate(): ResidenceType
    {
        $this->residenceType ??= new ResidenceType();

        return $this->residenceType;
    }

    /**
     * @param  null|ResidenceType $residenceType
     * @return static
     */
    public function setResidenceType(
        ?ResidenceType $residenceType = null
    ): static {
        $this->residenceType = $residenceType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResidenceType(): static
    {
        $this->residenceType = null;

        return $this;
    }

    /**
     * @return null|ResidenceTypeCode
     */
    public function getResidenceTypeCode(): ?ResidenceTypeCode
    {
        return $this->residenceTypeCode;
    }

    /**
     * @return ResidenceTypeCode
     */
    public function getResidenceTypeCodeWithCreate(): ResidenceTypeCode
    {
        $this->residenceTypeCode ??= new ResidenceTypeCode();

        return $this->residenceTypeCode;
    }

    /**
     * @param  null|ResidenceTypeCode $residenceTypeCode
     * @return static
     */
    public function setResidenceTypeCode(
        ?ResidenceTypeCode $residenceTypeCode = null
    ): static {
        $this->residenceTypeCode = $residenceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResidenceTypeCode(): static
    {
        $this->residenceTypeCode = null;

        return $this;
    }

    /**
     * @return null|HeatingType
     */
    public function getHeatingType(): ?HeatingType
    {
        return $this->heatingType;
    }

    /**
     * @return HeatingType
     */
    public function getHeatingTypeWithCreate(): HeatingType
    {
        $this->heatingType ??= new HeatingType();

        return $this->heatingType;
    }

    /**
     * @param  null|HeatingType $heatingType
     * @return static
     */
    public function setHeatingType(
        ?HeatingType $heatingType = null
    ): static {
        $this->heatingType = $heatingType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHeatingType(): static
    {
        $this->heatingType = null;

        return $this;
    }

    /**
     * @return null|HeatingTypeCode
     */
    public function getHeatingTypeCode(): ?HeatingTypeCode
    {
        return $this->heatingTypeCode;
    }

    /**
     * @return HeatingTypeCode
     */
    public function getHeatingTypeCodeWithCreate(): HeatingTypeCode
    {
        $this->heatingTypeCode ??= new HeatingTypeCode();

        return $this->heatingTypeCode;
    }

    /**
     * @param  null|HeatingTypeCode $heatingTypeCode
     * @return static
     */
    public function setHeatingTypeCode(
        ?HeatingTypeCode $heatingTypeCode = null
    ): static {
        $this->heatingTypeCode = $heatingTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHeatingTypeCode(): static
    {
        $this->heatingTypeCode = null;

        return $this;
    }

    /**
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
    }

    /**
     * @return null|GuidanceDocumentReference
     */
    public function getGuidanceDocumentReference(): ?GuidanceDocumentReference
    {
        return $this->guidanceDocumentReference;
    }

    /**
     * @return GuidanceDocumentReference
     */
    public function getGuidanceDocumentReferenceWithCreate(): GuidanceDocumentReference
    {
        $this->guidanceDocumentReference ??= new GuidanceDocumentReference();

        return $this->guidanceDocumentReference;
    }

    /**
     * @param  null|GuidanceDocumentReference $guidanceDocumentReference
     * @return static
     */
    public function setGuidanceDocumentReference(
        ?GuidanceDocumentReference $guidanceDocumentReference = null
    ): static {
        $this->guidanceDocumentReference = $guidanceDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGuidanceDocumentReference(): static
    {
        $this->guidanceDocumentReference = null;

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function getDocumentReference(): ?DocumentReference
    {
        return $this->documentReference;
    }

    /**
     * @return DocumentReference
     */
    public function getDocumentReferenceWithCreate(): DocumentReference
    {
        $this->documentReference ??= new DocumentReference();

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?DocumentReference $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return null|array<ConsumptionReportReference>
     */
    public function getConsumptionReportReference(): ?array
    {
        return $this->consumptionReportReference;
    }

    /**
     * @param  null|array<ConsumptionReportReference> $consumptionReportReference
     * @return static
     */
    public function setConsumptionReportReference(
        ?array $consumptionReportReference = null
    ): static {
        $this->consumptionReportReference = $consumptionReportReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionReportReference(): static
    {
        $this->consumptionReportReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsumptionReportReference(): static
    {
        $this->consumptionReportReference = [];

        return $this;
    }

    /**
     * @return null|ConsumptionReportReference
     */
    public function firstConsumptionReportReference(): ?ConsumptionReportReference
    {
        $consumptionReportReference = $this->consumptionReportReference ?? [];
        $consumptionReportReference = reset($consumptionReportReference);

        if (false === $consumptionReportReference) {
            return null;
        }

        return $consumptionReportReference;
    }

    /**
     * @return null|ConsumptionReportReference
     */
    public function lastConsumptionReportReference(): ?ConsumptionReportReference
    {
        $consumptionReportReference = $this->consumptionReportReference ?? [];
        $consumptionReportReference = end($consumptionReportReference);

        if (false === $consumptionReportReference) {
            return null;
        }

        return $consumptionReportReference;
    }

    /**
     * @param  ConsumptionReportReference $consumptionReportReference
     * @return static
     */
    public function addToConsumptionReportReference(
        ConsumptionReportReference $consumptionReportReference
    ): static {
        $this->consumptionReportReference[] = $consumptionReportReference;

        return $this;
    }

    /**
     * @return ConsumptionReportReference
     */
    public function addToConsumptionReportReferenceWithCreate(): ConsumptionReportReference
    {
        $this->addToconsumptionReportReference($consumptionReportReference = new ConsumptionReportReference());

        return $consumptionReportReference;
    }

    /**
     * @param  ConsumptionReportReference $consumptionReportReference
     * @return static
     */
    public function addOnceToConsumptionReportReference(
        ConsumptionReportReference $consumptionReportReference
    ): static {
        if (!is_array($this->consumptionReportReference)) {
            $this->consumptionReportReference = [];
        }

        $this->consumptionReportReference[0] = $consumptionReportReference;

        return $this;
    }

    /**
     * @return ConsumptionReportReference
     */
    public function addOnceToConsumptionReportReferenceWithCreate(): ConsumptionReportReference
    {
        if (!is_array($this->consumptionReportReference)) {
            $this->consumptionReportReference = [];
        }

        if ([] === $this->consumptionReportReference) {
            $this->addOnceToconsumptionReportReference(new ConsumptionReportReference());
        }

        return $this->consumptionReportReference[0];
    }

    /**
     * @return null|array<ConsumptionHistory>
     */
    public function getConsumptionHistory(): ?array
    {
        return $this->consumptionHistory;
    }

    /**
     * @param  null|array<ConsumptionHistory> $consumptionHistory
     * @return static
     */
    public function setConsumptionHistory(
        ?array $consumptionHistory = null
    ): static {
        $this->consumptionHistory = $consumptionHistory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionHistory(): static
    {
        $this->consumptionHistory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsumptionHistory(): static
    {
        $this->consumptionHistory = [];

        return $this;
    }

    /**
     * @return null|ConsumptionHistory
     */
    public function firstConsumptionHistory(): ?ConsumptionHistory
    {
        $consumptionHistory = $this->consumptionHistory ?? [];
        $consumptionHistory = reset($consumptionHistory);

        if (false === $consumptionHistory) {
            return null;
        }

        return $consumptionHistory;
    }

    /**
     * @return null|ConsumptionHistory
     */
    public function lastConsumptionHistory(): ?ConsumptionHistory
    {
        $consumptionHistory = $this->consumptionHistory ?? [];
        $consumptionHistory = end($consumptionHistory);

        if (false === $consumptionHistory) {
            return null;
        }

        return $consumptionHistory;
    }

    /**
     * @param  ConsumptionHistory $consumptionHistory
     * @return static
     */
    public function addToConsumptionHistory(
        ConsumptionHistory $consumptionHistory
    ): static {
        $this->consumptionHistory[] = $consumptionHistory;

        return $this;
    }

    /**
     * @return ConsumptionHistory
     */
    public function addToConsumptionHistoryWithCreate(): ConsumptionHistory
    {
        $this->addToconsumptionHistory($consumptionHistory = new ConsumptionHistory());

        return $consumptionHistory;
    }

    /**
     * @param  ConsumptionHistory $consumptionHistory
     * @return static
     */
    public function addOnceToConsumptionHistory(
        ConsumptionHistory $consumptionHistory
    ): static {
        if (!is_array($this->consumptionHistory)) {
            $this->consumptionHistory = [];
        }

        $this->consumptionHistory[0] = $consumptionHistory;

        return $this;
    }

    /**
     * @return ConsumptionHistory
     */
    public function addOnceToConsumptionHistoryWithCreate(): ConsumptionHistory
    {
        if (!is_array($this->consumptionHistory)) {
            $this->consumptionHistory = [];
        }

        if ([] === $this->consumptionHistory) {
            $this->addOnceToconsumptionHistory(new ConsumptionHistory());
        }

        return $this->consumptionHistory[0];
    }
}
