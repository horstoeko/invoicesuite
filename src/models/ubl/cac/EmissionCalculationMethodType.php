<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode;
use horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode;

class EmissionCalculationMethodType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationMethodCode", setter="setCalculationMethodCode")
     */
    private $calculationMethodCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode")
     * @JMS\Expose
     * @JMS\SerializedName("FullnessIndicationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFullnessIndicationCode", setter="setFullnessIndicationCode")
     */
    private $fullnessIndicationCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MeasurementFromLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MeasurementFromLocation")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementFromLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeasurementFromLocation", setter="setMeasurementFromLocation")
     */
    private $measurementFromLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MeasurementToLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MeasurementToLocation")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementToLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeasurementToLocation", setter="setMeasurementToLocation")
     */
    private $measurementToLocation;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode|null
     */
    public function getCalculationMethodCode(): ?CalculationMethodCode
    {
        return $this->calculationMethodCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode
     */
    public function getCalculationMethodCodeWithCreate(): CalculationMethodCode
    {
        $this->calculationMethodCode = is_null($this->calculationMethodCode) ? new CalculationMethodCode() : $this->calculationMethodCode;

        return $this->calculationMethodCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CalculationMethodCode|null $calculationMethodCode
     * @return self
     */
    public function setCalculationMethodCode(?CalculationMethodCode $calculationMethodCode = null): self
    {
        $this->calculationMethodCode = $calculationMethodCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null
     */
    public function getFullnessIndicationCode(): ?FullnessIndicationCode
    {
        return $this->fullnessIndicationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode
     */
    public function getFullnessIndicationCodeWithCreate(): FullnessIndicationCode
    {
        $this->fullnessIndicationCode = is_null($this->fullnessIndicationCode) ? new FullnessIndicationCode() : $this->fullnessIndicationCode;

        return $this->fullnessIndicationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null $fullnessIndicationCode
     * @return self
     */
    public function setFullnessIndicationCode(?FullnessIndicationCode $fullnessIndicationCode = null): self
    {
        $this->fullnessIndicationCode = $fullnessIndicationCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementFromLocation|null
     */
    public function getMeasurementFromLocation(): ?MeasurementFromLocation
    {
        return $this->measurementFromLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementFromLocation
     */
    public function getMeasurementFromLocationWithCreate(): MeasurementFromLocation
    {
        $this->measurementFromLocation = is_null($this->measurementFromLocation) ? new MeasurementFromLocation() : $this->measurementFromLocation;

        return $this->measurementFromLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementFromLocation|null $measurementFromLocation
     * @return self
     */
    public function setMeasurementFromLocation(?MeasurementFromLocation $measurementFromLocation = null): self
    {
        $this->measurementFromLocation = $measurementFromLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementToLocation|null
     */
    public function getMeasurementToLocation(): ?MeasurementToLocation
    {
        return $this->measurementToLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementToLocation
     */
    public function getMeasurementToLocationWithCreate(): MeasurementToLocation
    {
        $this->measurementToLocation = is_null($this->measurementToLocation) ? new MeasurementToLocation() : $this->measurementToLocation;

        return $this->measurementToLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementToLocation|null $measurementToLocation
     * @return self
     */
    public function setMeasurementToLocation(?MeasurementToLocation $measurementToLocation = null): self
    {
        $this->measurementToLocation = $measurementToLocation;

        return $this;
    }
}
