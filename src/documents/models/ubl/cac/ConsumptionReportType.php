<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BasicConsumedQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumersEnergyLevel;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumersEnergyLevelCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\HeatingType;
use horstoeko\invoicesuite\documents\models\ubl\cbc\HeatingTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ResidenceType;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ResidenceTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ResidentOccupantsNumeric;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TotalConsumedQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionReportType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|ConsumptionType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionType")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionType", setter="setConsumptionType")
     */
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionTypeCode", setter="setConsumptionTypeCode")
     */
    private $consumptionTypeCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|TotalConsumedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TotalConsumedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalConsumedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalConsumedQuantity", setter="setTotalConsumedQuantity")
     */
    private $totalConsumedQuantity;

    /**
     * @var null|BasicConsumedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BasicConsumedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BasicConsumedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBasicConsumedQuantity", setter="setBasicConsumedQuantity")
     */
    private $basicConsumedQuantity;

    /**
     * @var null|ResidentOccupantsNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ResidentOccupantsNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("ResidentOccupantsNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResidentOccupantsNumeric", setter="setResidentOccupantsNumeric")
     */
    private $residentOccupantsNumeric;

    /**
     * @var null|ConsumersEnergyLevelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumersEnergyLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumersEnergyLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumersEnergyLevelCode", setter="setConsumersEnergyLevelCode")
     */
    private $consumersEnergyLevelCode;

    /**
     * @var null|ConsumersEnergyLevel
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumersEnergyLevel")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumersEnergyLevel")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumersEnergyLevel", setter="setConsumersEnergyLevel")
     */
    private $consumersEnergyLevel;

    /**
     * @var null|ResidenceType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ResidenceType")
     * @JMS\Expose
     * @JMS\SerializedName("ResidenceType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResidenceType", setter="setResidenceType")
     */
    private $residenceType;

    /**
     * @var null|ResidenceTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ResidenceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ResidenceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResidenceTypeCode", setter="setResidenceTypeCode")
     */
    private $residenceTypeCode;

    /**
     * @var null|HeatingType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\HeatingType")
     * @JMS\Expose
     * @JMS\SerializedName("HeatingType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHeatingType", setter="setHeatingType")
     */
    private $heatingType;

    /**
     * @var null|HeatingTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\HeatingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("HeatingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHeatingTypeCode", setter="setHeatingTypeCode")
     */
    private $heatingTypeCode;

    /**
     * @var null|Period
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @var null|GuidanceDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\GuidanceDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("GuidanceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuidanceDocumentReference", setter="setGuidanceDocumentReference")
     */
    private $guidanceDocumentReference;

    /**
     * @var null|DocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var null|array<ConsumptionReportReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ConsumptionReportReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionReportReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionReportReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionReportReference", setter="setConsumptionReportReference")
     */
    private $consumptionReportReference;

    /**
     * @var null|array<ConsumptionHistory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ConsumptionHistory>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionHistory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionHistory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionHistory", setter="setConsumptionHistory")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
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
        $this->consumptionType = is_null($this->consumptionType) ? new ConsumptionType() : $this->consumptionType;

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(?ConsumptionType $consumptionType = null): static
    {
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
        $this->consumptionTypeCode = is_null($this->consumptionTypeCode) ? new ConsumptionTypeCode() : $this->consumptionTypeCode;

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(?ConsumptionTypeCode $consumptionTypeCode = null): static
    {
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
    public function setDescription(?array $description = null): static
    {
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
    public function addToDescription(Description $description): static
    {
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
    public function addOnceToDescription(Description $description): static
    {
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
        $this->totalConsumedQuantity = is_null($this->totalConsumedQuantity) ? new TotalConsumedQuantity() : $this->totalConsumedQuantity;

        return $this->totalConsumedQuantity;
    }

    /**
     * @param  null|TotalConsumedQuantity $totalConsumedQuantity
     * @return static
     */
    public function setTotalConsumedQuantity(?TotalConsumedQuantity $totalConsumedQuantity = null): static
    {
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
        $this->basicConsumedQuantity = is_null($this->basicConsumedQuantity) ? new BasicConsumedQuantity() : $this->basicConsumedQuantity;

        return $this->basicConsumedQuantity;
    }

    /**
     * @param  null|BasicConsumedQuantity $basicConsumedQuantity
     * @return static
     */
    public function setBasicConsumedQuantity(?BasicConsumedQuantity $basicConsumedQuantity = null): static
    {
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
        $this->residentOccupantsNumeric = is_null($this->residentOccupantsNumeric) ? new ResidentOccupantsNumeric() : $this->residentOccupantsNumeric;

        return $this->residentOccupantsNumeric;
    }

    /**
     * @param  null|ResidentOccupantsNumeric $residentOccupantsNumeric
     * @return static
     */
    public function setResidentOccupantsNumeric(?ResidentOccupantsNumeric $residentOccupantsNumeric = null): static
    {
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
        $this->consumersEnergyLevelCode = is_null($this->consumersEnergyLevelCode) ? new ConsumersEnergyLevelCode() : $this->consumersEnergyLevelCode;

        return $this->consumersEnergyLevelCode;
    }

    /**
     * @param  null|ConsumersEnergyLevelCode $consumersEnergyLevelCode
     * @return static
     */
    public function setConsumersEnergyLevelCode(?ConsumersEnergyLevelCode $consumersEnergyLevelCode = null): static
    {
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
        $this->consumersEnergyLevel = is_null($this->consumersEnergyLevel) ? new ConsumersEnergyLevel() : $this->consumersEnergyLevel;

        return $this->consumersEnergyLevel;
    }

    /**
     * @param  null|ConsumersEnergyLevel $consumersEnergyLevel
     * @return static
     */
    public function setConsumersEnergyLevel(?ConsumersEnergyLevel $consumersEnergyLevel = null): static
    {
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
        $this->residenceType = is_null($this->residenceType) ? new ResidenceType() : $this->residenceType;

        return $this->residenceType;
    }

    /**
     * @param  null|ResidenceType $residenceType
     * @return static
     */
    public function setResidenceType(?ResidenceType $residenceType = null): static
    {
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
        $this->residenceTypeCode = is_null($this->residenceTypeCode) ? new ResidenceTypeCode() : $this->residenceTypeCode;

        return $this->residenceTypeCode;
    }

    /**
     * @param  null|ResidenceTypeCode $residenceTypeCode
     * @return static
     */
    public function setResidenceTypeCode(?ResidenceTypeCode $residenceTypeCode = null): static
    {
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
        $this->heatingType = is_null($this->heatingType) ? new HeatingType() : $this->heatingType;

        return $this->heatingType;
    }

    /**
     * @param  null|HeatingType $heatingType
     * @return static
     */
    public function setHeatingType(?HeatingType $heatingType = null): static
    {
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
        $this->heatingTypeCode = is_null($this->heatingTypeCode) ? new HeatingTypeCode() : $this->heatingTypeCode;

        return $this->heatingTypeCode;
    }

    /**
     * @param  null|HeatingTypeCode $heatingTypeCode
     * @return static
     */
    public function setHeatingTypeCode(?HeatingTypeCode $heatingTypeCode = null): static
    {
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
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(?Period $period = null): static
    {
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
        $this->guidanceDocumentReference = is_null($this->guidanceDocumentReference) ? new GuidanceDocumentReference() : $this->guidanceDocumentReference;

        return $this->guidanceDocumentReference;
    }

    /**
     * @param  null|GuidanceDocumentReference $guidanceDocumentReference
     * @return static
     */
    public function setGuidanceDocumentReference(?GuidanceDocumentReference $guidanceDocumentReference = null): static
    {
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
        $this->documentReference = is_null($this->documentReference) ? new DocumentReference() : $this->documentReference;

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(?DocumentReference $documentReference = null): static
    {
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
    public function setConsumptionReportReference(?array $consumptionReportReference = null): static
    {
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
    public function addToConsumptionReportReference(ConsumptionReportReference $consumptionReportReference): static
    {
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
    public function addOnceToConsumptionReportReference(ConsumptionReportReference $consumptionReportReference): static
    {
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
    public function setConsumptionHistory(?array $consumptionHistory = null): static
    {
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
    public function addToConsumptionHistory(ConsumptionHistory $consumptionHistory): static
    {
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
    public function addOnceToConsumptionHistory(ConsumptionHistory $consumptionHistory): static
    {
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
