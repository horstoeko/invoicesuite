<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ActualTemperatureReductionQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionEnergyQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionWaterQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionType;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionUnitAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DifferenceTemperatureReductionQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\GasPressureQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MeterNumber;
use horstoeko\invoicesuite\documents\models\ubl\cbc\NormalTemperatureReductionQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionCorrectionType
{
    use HandlesObjectFlags;

    /**
     * @var null|CorrectionType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionType")
     * @JMS\Expose
     * @JMS\SerializedName("CorrectionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCorrectionType", setter="setCorrectionType")
     */
    private $correctionType;

    /**
     * @var null|CorrectionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CorrectionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCorrectionTypeCode", setter="setCorrectionTypeCode")
     */
    private $correctionTypeCode;

    /**
     * @var null|MeterNumber
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MeterNumber")
     * @JMS\Expose
     * @JMS\SerializedName("MeterNumber")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterNumber", setter="setMeterNumber")
     */
    private $meterNumber;

    /**
     * @var null|GasPressureQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\GasPressureQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("GasPressureQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGasPressureQuantity", setter="setGasPressureQuantity")
     */
    private $gasPressureQuantity;

    /**
     * @var null|ActualTemperatureReductionQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ActualTemperatureReductionQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ActualTemperatureReductionQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualTemperatureReductionQuantity", setter="setActualTemperatureReductionQuantity")
     */
    private $actualTemperatureReductionQuantity;

    /**
     * @var null|NormalTemperatureReductionQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\NormalTemperatureReductionQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("NormalTemperatureReductionQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNormalTemperatureReductionQuantity", setter="setNormalTemperatureReductionQuantity")
     */
    private $normalTemperatureReductionQuantity;

    /**
     * @var null|DifferenceTemperatureReductionQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DifferenceTemperatureReductionQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("DifferenceTemperatureReductionQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDifferenceTemperatureReductionQuantity", setter="setDifferenceTemperatureReductionQuantity")
     */
    private $differenceTemperatureReductionQuantity;

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
     * @var null|CorrectionUnitAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionUnitAmount")
     * @JMS\Expose
     * @JMS\SerializedName("CorrectionUnitAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCorrectionUnitAmount", setter="setCorrectionUnitAmount")
     */
    private $correctionUnitAmount;

    /**
     * @var null|ConsumptionEnergyQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionEnergyQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionEnergyQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionEnergyQuantity", setter="setConsumptionEnergyQuantity")
     */
    private $consumptionEnergyQuantity;

    /**
     * @var null|ConsumptionWaterQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ConsumptionWaterQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionWaterQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionWaterQuantity", setter="setConsumptionWaterQuantity")
     */
    private $consumptionWaterQuantity;

    /**
     * @var null|CorrectionAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CorrectionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("CorrectionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCorrectionAmount", setter="setCorrectionAmount")
     */
    private $correctionAmount;

    /**
     * @return null|CorrectionType
     */
    public function getCorrectionType(): ?CorrectionType
    {
        return $this->correctionType;
    }

    /**
     * @return CorrectionType
     */
    public function getCorrectionTypeWithCreate(): CorrectionType
    {
        $this->correctionType = is_null($this->correctionType) ? new CorrectionType() : $this->correctionType;

        return $this->correctionType;
    }

    /**
     * @param  null|CorrectionType $correctionType
     * @return static
     */
    public function setCorrectionType(?CorrectionType $correctionType = null): static
    {
        $this->correctionType = $correctionType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorrectionType(): static
    {
        $this->correctionType = null;

        return $this;
    }

    /**
     * @return null|CorrectionTypeCode
     */
    public function getCorrectionTypeCode(): ?CorrectionTypeCode
    {
        return $this->correctionTypeCode;
    }

    /**
     * @return CorrectionTypeCode
     */
    public function getCorrectionTypeCodeWithCreate(): CorrectionTypeCode
    {
        $this->correctionTypeCode = is_null($this->correctionTypeCode) ? new CorrectionTypeCode() : $this->correctionTypeCode;

        return $this->correctionTypeCode;
    }

    /**
     * @param  null|CorrectionTypeCode $correctionTypeCode
     * @return static
     */
    public function setCorrectionTypeCode(?CorrectionTypeCode $correctionTypeCode = null): static
    {
        $this->correctionTypeCode = $correctionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorrectionTypeCode(): static
    {
        $this->correctionTypeCode = null;

        return $this;
    }

    /**
     * @return null|MeterNumber
     */
    public function getMeterNumber(): ?MeterNumber
    {
        return $this->meterNumber;
    }

    /**
     * @return MeterNumber
     */
    public function getMeterNumberWithCreate(): MeterNumber
    {
        $this->meterNumber = is_null($this->meterNumber) ? new MeterNumber() : $this->meterNumber;

        return $this->meterNumber;
    }

    /**
     * @param  null|MeterNumber $meterNumber
     * @return static
     */
    public function setMeterNumber(?MeterNumber $meterNumber = null): static
    {
        $this->meterNumber = $meterNumber;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterNumber(): static
    {
        $this->meterNumber = null;

        return $this;
    }

    /**
     * @return null|GasPressureQuantity
     */
    public function getGasPressureQuantity(): ?GasPressureQuantity
    {
        return $this->gasPressureQuantity;
    }

    /**
     * @return GasPressureQuantity
     */
    public function getGasPressureQuantityWithCreate(): GasPressureQuantity
    {
        $this->gasPressureQuantity = is_null($this->gasPressureQuantity) ? new GasPressureQuantity() : $this->gasPressureQuantity;

        return $this->gasPressureQuantity;
    }

    /**
     * @param  null|GasPressureQuantity $gasPressureQuantity
     * @return static
     */
    public function setGasPressureQuantity(?GasPressureQuantity $gasPressureQuantity = null): static
    {
        $this->gasPressureQuantity = $gasPressureQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGasPressureQuantity(): static
    {
        $this->gasPressureQuantity = null;

        return $this;
    }

    /**
     * @return null|ActualTemperatureReductionQuantity
     */
    public function getActualTemperatureReductionQuantity(): ?ActualTemperatureReductionQuantity
    {
        return $this->actualTemperatureReductionQuantity;
    }

    /**
     * @return ActualTemperatureReductionQuantity
     */
    public function getActualTemperatureReductionQuantityWithCreate(): ActualTemperatureReductionQuantity
    {
        $this->actualTemperatureReductionQuantity = is_null($this->actualTemperatureReductionQuantity) ? new ActualTemperatureReductionQuantity() : $this->actualTemperatureReductionQuantity;

        return $this->actualTemperatureReductionQuantity;
    }

    /**
     * @param  null|ActualTemperatureReductionQuantity $actualTemperatureReductionQuantity
     * @return static
     */
    public function setActualTemperatureReductionQuantity(
        ?ActualTemperatureReductionQuantity $actualTemperatureReductionQuantity = null,
    ): static {
        $this->actualTemperatureReductionQuantity = $actualTemperatureReductionQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualTemperatureReductionQuantity(): static
    {
        $this->actualTemperatureReductionQuantity = null;

        return $this;
    }

    /**
     * @return null|NormalTemperatureReductionQuantity
     */
    public function getNormalTemperatureReductionQuantity(): ?NormalTemperatureReductionQuantity
    {
        return $this->normalTemperatureReductionQuantity;
    }

    /**
     * @return NormalTemperatureReductionQuantity
     */
    public function getNormalTemperatureReductionQuantityWithCreate(): NormalTemperatureReductionQuantity
    {
        $this->normalTemperatureReductionQuantity = is_null($this->normalTemperatureReductionQuantity) ? new NormalTemperatureReductionQuantity() : $this->normalTemperatureReductionQuantity;

        return $this->normalTemperatureReductionQuantity;
    }

    /**
     * @param  null|NormalTemperatureReductionQuantity $normalTemperatureReductionQuantity
     * @return static
     */
    public function setNormalTemperatureReductionQuantity(
        ?NormalTemperatureReductionQuantity $normalTemperatureReductionQuantity = null,
    ): static {
        $this->normalTemperatureReductionQuantity = $normalTemperatureReductionQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNormalTemperatureReductionQuantity(): static
    {
        $this->normalTemperatureReductionQuantity = null;

        return $this;
    }

    /**
     * @return null|DifferenceTemperatureReductionQuantity
     */
    public function getDifferenceTemperatureReductionQuantity(): ?DifferenceTemperatureReductionQuantity
    {
        return $this->differenceTemperatureReductionQuantity;
    }

    /**
     * @return DifferenceTemperatureReductionQuantity
     */
    public function getDifferenceTemperatureReductionQuantityWithCreate(): DifferenceTemperatureReductionQuantity
    {
        $this->differenceTemperatureReductionQuantity = is_null($this->differenceTemperatureReductionQuantity) ? new DifferenceTemperatureReductionQuantity() : $this->differenceTemperatureReductionQuantity;

        return $this->differenceTemperatureReductionQuantity;
    }

    /**
     * @param  null|DifferenceTemperatureReductionQuantity $differenceTemperatureReductionQuantity
     * @return static
     */
    public function setDifferenceTemperatureReductionQuantity(
        ?DifferenceTemperatureReductionQuantity $differenceTemperatureReductionQuantity = null,
    ): static {
        $this->differenceTemperatureReductionQuantity = $differenceTemperatureReductionQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDifferenceTemperatureReductionQuantity(): static
    {
        $this->differenceTemperatureReductionQuantity = null;

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
     * @return null|CorrectionUnitAmount
     */
    public function getCorrectionUnitAmount(): ?CorrectionUnitAmount
    {
        return $this->correctionUnitAmount;
    }

    /**
     * @return CorrectionUnitAmount
     */
    public function getCorrectionUnitAmountWithCreate(): CorrectionUnitAmount
    {
        $this->correctionUnitAmount = is_null($this->correctionUnitAmount) ? new CorrectionUnitAmount() : $this->correctionUnitAmount;

        return $this->correctionUnitAmount;
    }

    /**
     * @param  null|CorrectionUnitAmount $correctionUnitAmount
     * @return static
     */
    public function setCorrectionUnitAmount(?CorrectionUnitAmount $correctionUnitAmount = null): static
    {
        $this->correctionUnitAmount = $correctionUnitAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorrectionUnitAmount(): static
    {
        $this->correctionUnitAmount = null;

        return $this;
    }

    /**
     * @return null|ConsumptionEnergyQuantity
     */
    public function getConsumptionEnergyQuantity(): ?ConsumptionEnergyQuantity
    {
        return $this->consumptionEnergyQuantity;
    }

    /**
     * @return ConsumptionEnergyQuantity
     */
    public function getConsumptionEnergyQuantityWithCreate(): ConsumptionEnergyQuantity
    {
        $this->consumptionEnergyQuantity = is_null($this->consumptionEnergyQuantity) ? new ConsumptionEnergyQuantity() : $this->consumptionEnergyQuantity;

        return $this->consumptionEnergyQuantity;
    }

    /**
     * @param  null|ConsumptionEnergyQuantity $consumptionEnergyQuantity
     * @return static
     */
    public function setConsumptionEnergyQuantity(?ConsumptionEnergyQuantity $consumptionEnergyQuantity = null): static
    {
        $this->consumptionEnergyQuantity = $consumptionEnergyQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionEnergyQuantity(): static
    {
        $this->consumptionEnergyQuantity = null;

        return $this;
    }

    /**
     * @return null|ConsumptionWaterQuantity
     */
    public function getConsumptionWaterQuantity(): ?ConsumptionWaterQuantity
    {
        return $this->consumptionWaterQuantity;
    }

    /**
     * @return ConsumptionWaterQuantity
     */
    public function getConsumptionWaterQuantityWithCreate(): ConsumptionWaterQuantity
    {
        $this->consumptionWaterQuantity = is_null($this->consumptionWaterQuantity) ? new ConsumptionWaterQuantity() : $this->consumptionWaterQuantity;

        return $this->consumptionWaterQuantity;
    }

    /**
     * @param  null|ConsumptionWaterQuantity $consumptionWaterQuantity
     * @return static
     */
    public function setConsumptionWaterQuantity(?ConsumptionWaterQuantity $consumptionWaterQuantity = null): static
    {
        $this->consumptionWaterQuantity = $consumptionWaterQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionWaterQuantity(): static
    {
        $this->consumptionWaterQuantity = null;

        return $this;
    }

    /**
     * @return null|CorrectionAmount
     */
    public function getCorrectionAmount(): ?CorrectionAmount
    {
        return $this->correctionAmount;
    }

    /**
     * @return CorrectionAmount
     */
    public function getCorrectionAmountWithCreate(): CorrectionAmount
    {
        $this->correctionAmount = is_null($this->correctionAmount) ? new CorrectionAmount() : $this->correctionAmount;

        return $this->correctionAmount;
    }

    /**
     * @param  null|CorrectionAmount $correctionAmount
     * @return static
     */
    public function setCorrectionAmount(?CorrectionAmount $correctionAmount = null): static
    {
        $this->correctionAmount = $correctionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCorrectionAmount(): static
    {
        $this->correctionAmount = null;

        return $this;
    }
}
