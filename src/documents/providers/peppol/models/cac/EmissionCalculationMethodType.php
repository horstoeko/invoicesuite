<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationMethodCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FullnessIndicationCode;
use JMS\Serializer\Annotation as JMS;

class EmissionCalculationMethodType
{
    use HandlesObjectFlags;

    /**
     * @var null|CalculationMethodCode
     */
    #[JMS\Accessor(getter: 'getCalculationMethodCode', setter: 'setCalculationMethodCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CalculationMethodCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationMethodCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $calculationMethodCode;

    /**
     * @var null|FullnessIndicationCode
     */
    #[JMS\Accessor(getter: 'getFullnessIndicationCode', setter: 'setFullnessIndicationCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FullnessIndicationCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FullnessIndicationCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $fullnessIndicationCode;

    /**
     * @var null|MeasurementFromLocation
     */
    #[JMS\Accessor(getter: 'getMeasurementFromLocation', setter: 'setMeasurementFromLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeasurementFromLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeasurementFromLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $measurementFromLocation;

    /**
     * @var null|MeasurementToLocation
     */
    #[JMS\Accessor(getter: 'getMeasurementToLocation', setter: 'setMeasurementToLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeasurementToLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeasurementToLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $measurementToLocation;

    /**
     * @return null|CalculationMethodCode
     */
    public function getCalculationMethodCode(): ?CalculationMethodCode
    {
        return $this->calculationMethodCode;
    }

    /**
     * @return CalculationMethodCode
     */
    public function getCalculationMethodCodeWithCreate(): CalculationMethodCode
    {
        $this->calculationMethodCode ??= new CalculationMethodCode();

        return $this->calculationMethodCode;
    }

    /**
     * @param  null|CalculationMethodCode $calculationMethodCode
     * @return static
     */
    public function setCalculationMethodCode(
        ?CalculationMethodCode $calculationMethodCode = null
    ): static {
        $this->calculationMethodCode = $calculationMethodCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationMethodCode(): static
    {
        $this->calculationMethodCode = null;

        return $this;
    }

    /**
     * @return null|FullnessIndicationCode
     */
    public function getFullnessIndicationCode(): ?FullnessIndicationCode
    {
        return $this->fullnessIndicationCode;
    }

    /**
     * @return FullnessIndicationCode
     */
    public function getFullnessIndicationCodeWithCreate(): FullnessIndicationCode
    {
        $this->fullnessIndicationCode ??= new FullnessIndicationCode();

        return $this->fullnessIndicationCode;
    }

    /**
     * @param  null|FullnessIndicationCode $fullnessIndicationCode
     * @return static
     */
    public function setFullnessIndicationCode(
        ?FullnessIndicationCode $fullnessIndicationCode = null
    ): static {
        $this->fullnessIndicationCode = $fullnessIndicationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFullnessIndicationCode(): static
    {
        $this->fullnessIndicationCode = null;

        return $this;
    }

    /**
     * @return null|MeasurementFromLocation
     */
    public function getMeasurementFromLocation(): ?MeasurementFromLocation
    {
        return $this->measurementFromLocation;
    }

    /**
     * @return MeasurementFromLocation
     */
    public function getMeasurementFromLocationWithCreate(): MeasurementFromLocation
    {
        $this->measurementFromLocation ??= new MeasurementFromLocation();

        return $this->measurementFromLocation;
    }

    /**
     * @param  null|MeasurementFromLocation $measurementFromLocation
     * @return static
     */
    public function setMeasurementFromLocation(
        ?MeasurementFromLocation $measurementFromLocation = null
    ): static {
        $this->measurementFromLocation = $measurementFromLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasurementFromLocation(): static
    {
        $this->measurementFromLocation = null;

        return $this;
    }

    /**
     * @return null|MeasurementToLocation
     */
    public function getMeasurementToLocation(): ?MeasurementToLocation
    {
        return $this->measurementToLocation;
    }

    /**
     * @return MeasurementToLocation
     */
    public function getMeasurementToLocationWithCreate(): MeasurementToLocation
    {
        $this->measurementToLocation ??= new MeasurementToLocation();

        return $this->measurementToLocation;
    }

    /**
     * @param  null|MeasurementToLocation $measurementToLocation
     * @return static
     */
    public function setMeasurementToLocation(
        ?MeasurementToLocation $measurementToLocation = null
    ): static {
        $this->measurementToLocation = $measurementToLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasurementToLocation(): static
    {
        $this->measurementToLocation = null;

        return $this;
    }
}
