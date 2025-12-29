<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationMethodCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FullnessIndicationCode;
use JMS\Serializer\Annotation as JMS;

class EmissionCalculationMethodType
{
    use HandlesObjectFlags;

    /**
     * @var null|CalculationMethodCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationMethodCode", setter="setCalculationMethodCode")
     */
    private $calculationMethodCode;

    /**
     * @var null|FullnessIndicationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FullnessIndicationCode")
     * @JMS\Expose
     * @JMS\SerializedName("FullnessIndicationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFullnessIndicationCode", setter="setFullnessIndicationCode")
     */
    private $fullnessIndicationCode;

    /**
     * @var null|MeasurementFromLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MeasurementFromLocation")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementFromLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeasurementFromLocation", setter="setMeasurementFromLocation")
     */
    private $measurementFromLocation;

    /**
     * @var null|MeasurementToLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MeasurementToLocation")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementToLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeasurementToLocation", setter="setMeasurementToLocation")
     */
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
        $this->calculationMethodCode = is_null($this->calculationMethodCode) ? new CalculationMethodCode() : $this->calculationMethodCode;

        return $this->calculationMethodCode;
    }

    /**
     * @param  null|CalculationMethodCode $calculationMethodCode
     * @return static
     */
    public function setCalculationMethodCode(?CalculationMethodCode $calculationMethodCode = null): static
    {
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
        $this->fullnessIndicationCode = is_null($this->fullnessIndicationCode) ? new FullnessIndicationCode() : $this->fullnessIndicationCode;

        return $this->fullnessIndicationCode;
    }

    /**
     * @param  null|FullnessIndicationCode $fullnessIndicationCode
     * @return static
     */
    public function setFullnessIndicationCode(?FullnessIndicationCode $fullnessIndicationCode = null): static
    {
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
        $this->measurementFromLocation = is_null($this->measurementFromLocation) ? new MeasurementFromLocation() : $this->measurementFromLocation;

        return $this->measurementFromLocation;
    }

    /**
     * @param  null|MeasurementFromLocation $measurementFromLocation
     * @return static
     */
    public function setMeasurementFromLocation(?MeasurementFromLocation $measurementFromLocation = null): static
    {
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
        $this->measurementToLocation = is_null($this->measurementToLocation) ? new MeasurementToLocation() : $this->measurementToLocation;

        return $this->measurementToLocation;
    }

    /**
     * @param  null|MeasurementToLocation $measurementToLocation
     * @return static
     */
    public function setMeasurementToLocation(?MeasurementToLocation $measurementToLocation = null): static
    {
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
