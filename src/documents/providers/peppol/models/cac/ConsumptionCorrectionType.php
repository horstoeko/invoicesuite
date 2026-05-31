<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActualTemperatureReductionQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionEnergyQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionWaterQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionUnitAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DifferenceTemperatureReductionQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GasPressureQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterNumber;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NormalTemperatureReductionQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionCorrectionType
{
    use HandlesObjectFlags;

    /**
     * @var null|CorrectionType
     */
    #[JMS\Accessor(getter: 'getCorrectionType', setter: 'setCorrectionType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorrectionType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $correctionType;

    /**
     * @var null|CorrectionTypeCode
     */
    #[JMS\Accessor(getter: 'getCorrectionTypeCode', setter: 'setCorrectionTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorrectionTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $correctionTypeCode;

    /**
     * @var null|MeterNumber
     */
    #[JMS\Accessor(getter: 'getMeterNumber', setter: 'setMeterNumber')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterNumber')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterNumber')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterNumber;

    /**
     * @var null|GasPressureQuantity
     */
    #[JMS\Accessor(getter: 'getGasPressureQuantity', setter: 'setGasPressureQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GasPressureQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GasPressureQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $gasPressureQuantity;

    /**
     * @var null|ActualTemperatureReductionQuantity
     */
    #[JMS\Accessor(getter: 'getActualTemperatureReductionQuantity', setter: 'setActualTemperatureReductionQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualTemperatureReductionQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActualTemperatureReductionQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $actualTemperatureReductionQuantity;

    /**
     * @var null|NormalTemperatureReductionQuantity
     */
    #[JMS\Accessor(getter: 'getNormalTemperatureReductionQuantity', setter: 'setNormalTemperatureReductionQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NormalTemperatureReductionQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NormalTemperatureReductionQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $normalTemperatureReductionQuantity;

    /**
     * @var null|DifferenceTemperatureReductionQuantity
     */
    #[JMS\Accessor(getter: 'getDifferenceTemperatureReductionQuantity', setter: 'setDifferenceTemperatureReductionQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DifferenceTemperatureReductionQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DifferenceTemperatureReductionQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $differenceTemperatureReductionQuantity;

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
     * @var null|CorrectionUnitAmount
     */
    #[JMS\Accessor(getter: 'getCorrectionUnitAmount', setter: 'setCorrectionUnitAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorrectionUnitAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionUnitAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $correctionUnitAmount;

    /**
     * @var null|ConsumptionEnergyQuantity
     */
    #[JMS\Accessor(getter: 'getConsumptionEnergyQuantity', setter: 'setConsumptionEnergyQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionEnergyQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionEnergyQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionEnergyQuantity;

    /**
     * @var null|ConsumptionWaterQuantity
     */
    #[JMS\Accessor(getter: 'getConsumptionWaterQuantity', setter: 'setConsumptionWaterQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionWaterQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionWaterQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionWaterQuantity;

    /**
     * @var null|CorrectionAmount
     */
    #[JMS\Accessor(getter: 'getCorrectionAmount', setter: 'setCorrectionAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CorrectionAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CorrectionAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->correctionType ??= new CorrectionType();

        return $this->correctionType;
    }

    /**
     * @param  null|CorrectionType $correctionType
     * @return static
     */
    public function setCorrectionType(
        ?CorrectionType $correctionType = null
    ): static {
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
        $this->correctionTypeCode ??= new CorrectionTypeCode();

        return $this->correctionTypeCode;
    }

    /**
     * @param  null|CorrectionTypeCode $correctionTypeCode
     * @return static
     */
    public function setCorrectionTypeCode(
        ?CorrectionTypeCode $correctionTypeCode = null
    ): static {
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
        $this->meterNumber ??= new MeterNumber();

        return $this->meterNumber;
    }

    /**
     * @param  null|MeterNumber $meterNumber
     * @return static
     */
    public function setMeterNumber(
        ?MeterNumber $meterNumber = null
    ): static {
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
        $this->gasPressureQuantity ??= new GasPressureQuantity();

        return $this->gasPressureQuantity;
    }

    /**
     * @param  null|GasPressureQuantity $gasPressureQuantity
     * @return static
     */
    public function setGasPressureQuantity(
        ?GasPressureQuantity $gasPressureQuantity = null
    ): static {
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
        $this->actualTemperatureReductionQuantity ??= new ActualTemperatureReductionQuantity();

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
        $this->normalTemperatureReductionQuantity ??= new NormalTemperatureReductionQuantity();

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
        $this->differenceTemperatureReductionQuantity ??= new DifferenceTemperatureReductionQuantity();

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
            $this->addOnceToDescription(new Description());
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
        $this->correctionUnitAmount ??= new CorrectionUnitAmount();

        return $this->correctionUnitAmount;
    }

    /**
     * @param  null|CorrectionUnitAmount $correctionUnitAmount
     * @return static
     */
    public function setCorrectionUnitAmount(
        ?CorrectionUnitAmount $correctionUnitAmount = null
    ): static {
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
        $this->consumptionEnergyQuantity ??= new ConsumptionEnergyQuantity();

        return $this->consumptionEnergyQuantity;
    }

    /**
     * @param  null|ConsumptionEnergyQuantity $consumptionEnergyQuantity
     * @return static
     */
    public function setConsumptionEnergyQuantity(
        ?ConsumptionEnergyQuantity $consumptionEnergyQuantity = null
    ): static {
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
        $this->consumptionWaterQuantity ??= new ConsumptionWaterQuantity();

        return $this->consumptionWaterQuantity;
    }

    /**
     * @param  null|ConsumptionWaterQuantity $consumptionWaterQuantity
     * @return static
     */
    public function setConsumptionWaterQuantity(
        ?ConsumptionWaterQuantity $consumptionWaterQuantity = null
    ): static {
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
        $this->correctionAmount ??= new CorrectionAmount();

        return $this->correctionAmount;
    }

    /**
     * @param  null|CorrectionAmount $correctionAmount
     * @return static
     */
    public function setCorrectionAmount(
        ?CorrectionAmount $correctionAmount = null
    ): static {
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
