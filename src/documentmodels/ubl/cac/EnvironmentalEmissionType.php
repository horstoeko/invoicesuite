<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure;

class EnvironmentalEmissionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalEmissionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEnvironmentalEmissionTypeCode", setter="setEnvironmentalEmissionTypeCode")
     */
    private $environmentalEmissionTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("ValueMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValueMeasure", setter="setValueMeasure")
     */
    private $valueMeasure;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod>")
     * @JMS\Expose
     * @JMS\SerializedName("EmissionCalculationMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EmissionCalculationMethod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEmissionCalculationMethod", setter="setEmissionCalculationMethod")
     */
    private $emissionCalculationMethod;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode|null
     */
    public function getEnvironmentalEmissionTypeCode(): ?EnvironmentalEmissionTypeCode
    {
        return $this->environmentalEmissionTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode
     */
    public function getEnvironmentalEmissionTypeCodeWithCreate(): EnvironmentalEmissionTypeCode
    {
        $this->environmentalEmissionTypeCode = is_null($this->environmentalEmissionTypeCode) ? new EnvironmentalEmissionTypeCode() : $this->environmentalEmissionTypeCode;

        return $this->environmentalEmissionTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\EnvironmentalEmissionTypeCode|null $environmentalEmissionTypeCode
     * @return self
     */
    public function setEnvironmentalEmissionTypeCode(
        ?EnvironmentalEmissionTypeCode $environmentalEmissionTypeCode = null,
    ): self {
        $this->environmentalEmissionTypeCode = $environmentalEmissionTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEnvironmentalEmissionTypeCode(): self
    {
        $this->environmentalEmissionTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure|null
     */
    public function getValueMeasure(): ?ValueMeasure
    {
        return $this->valueMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure
     */
    public function getValueMeasureWithCreate(): ValueMeasure
    {
        $this->valueMeasure = is_null($this->valueMeasure) ? new ValueMeasure() : $this->valueMeasure;

        return $this->valueMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ValueMeasure|null $valueMeasure
     * @return self
     */
    public function setValueMeasure(?ValueMeasure $valueMeasure = null): self
    {
        $this->valueMeasure = $valueMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValueMeasure(): self
    {
        $this->valueMeasure = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod>|null
     */
    public function getEmissionCalculationMethod(): ?array
    {
        return $this->emissionCalculationMethod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod>|null $emissionCalculationMethod
     * @return self
     */
    public function setEmissionCalculationMethod(?array $emissionCalculationMethod = null): self
    {
        $this->emissionCalculationMethod = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmissionCalculationMethod(): self
    {
        $this->emissionCalculationMethod = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEmissionCalculationMethod(): self
    {
        $this->emissionCalculationMethod = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod|null
     */
    public function firstEmissionCalculationMethod(): ?EmissionCalculationMethod
    {
        $emissionCalculationMethod = $this->emissionCalculationMethod ?? [];
        $emissionCalculationMethod = reset($emissionCalculationMethod);

        if ($emissionCalculationMethod === false) {
            return null;
        }

        return $emissionCalculationMethod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod|null
     */
    public function lastEmissionCalculationMethod(): ?EmissionCalculationMethod
    {
        $emissionCalculationMethod = $this->emissionCalculationMethod ?? [];
        $emissionCalculationMethod = end($emissionCalculationMethod);

        if ($emissionCalculationMethod === false) {
            return null;
        }

        return $emissionCalculationMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod $emissionCalculationMethod
     * @return self
     */
    public function addToEmissionCalculationMethod(EmissionCalculationMethod $emissionCalculationMethod): self
    {
        $this->emissionCalculationMethod[] = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod
     */
    public function addToEmissionCalculationMethodWithCreate(): EmissionCalculationMethod
    {
        $this->addToemissionCalculationMethod($emissionCalculationMethod = new EmissionCalculationMethod());

        return $emissionCalculationMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod $emissionCalculationMethod
     * @return self
     */
    public function addOnceToEmissionCalculationMethod(EmissionCalculationMethod $emissionCalculationMethod): self
    {
        if (!is_array($this->emissionCalculationMethod)) {
            $this->emissionCalculationMethod = [];
        }

        $this->emissionCalculationMethod[0] = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EmissionCalculationMethod
     */
    public function addOnceToEmissionCalculationMethodWithCreate(): EmissionCalculationMethod
    {
        if (!is_array($this->emissionCalculationMethod)) {
            $this->emissionCalculationMethod = [];
        }

        if ($this->emissionCalculationMethod === []) {
            $this->addOnceToemissionCalculationMethod(new EmissionCalculationMethod());
        }

        return $this->emissionCalculationMethod[0];
    }
}
