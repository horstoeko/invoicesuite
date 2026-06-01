<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EnvironmentalEmissionTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueMeasure;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class EnvironmentalEmissionType
{
    use HandlesObjectFlags;

    /**
     * @var null|EnvironmentalEmissionTypeCode
     */
    #[JMS\Accessor(getter: 'getEnvironmentalEmissionTypeCode', setter: 'setEnvironmentalEmissionTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EnvironmentalEmissionTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EnvironmentalEmissionTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $environmentalEmissionTypeCode;

    /**
     * @var null|ValueMeasure
     */
    #[JMS\Accessor(getter: 'getValueMeasure', setter: 'setValueMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $valueMeasure;

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
     * @var null|array<EmissionCalculationMethod>
     */
    #[JMS\Accessor(getter: 'getEmissionCalculationMethod', setter: 'setEmissionCalculationMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EmissionCalculationMethod')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EmissionCalculationMethod>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'EmissionCalculationMethod', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $emissionCalculationMethod;

    /**
     * @return null|EnvironmentalEmissionTypeCode
     */
    public function getEnvironmentalEmissionTypeCode(): ?EnvironmentalEmissionTypeCode
    {
        return $this->environmentalEmissionTypeCode;
    }

    /**
     * @return EnvironmentalEmissionTypeCode
     */
    public function getEnvironmentalEmissionTypeCodeWithCreate(): EnvironmentalEmissionTypeCode
    {
        $this->environmentalEmissionTypeCode ??= new EnvironmentalEmissionTypeCode();

        return $this->environmentalEmissionTypeCode;
    }

    /**
     * @param  null|EnvironmentalEmissionTypeCode $environmentalEmissionTypeCode
     * @return static
     */
    public function setEnvironmentalEmissionTypeCode(
        ?EnvironmentalEmissionTypeCode $environmentalEmissionTypeCode = null,
    ): static {
        $this->environmentalEmissionTypeCode = $environmentalEmissionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnvironmentalEmissionTypeCode(): static
    {
        $this->environmentalEmissionTypeCode = null;

        return $this;
    }

    /**
     * @return null|ValueMeasure
     */
    public function getValueMeasure(): ?ValueMeasure
    {
        return $this->valueMeasure;
    }

    /**
     * @return ValueMeasure
     */
    public function getValueMeasureWithCreate(): ValueMeasure
    {
        $this->valueMeasure ??= new ValueMeasure();

        return $this->valueMeasure;
    }

    /**
     * @param  null|ValueMeasure $valueMeasure
     * @return static
     */
    public function setValueMeasure(
        ?ValueMeasure $valueMeasure = null
    ): static {
        $this->valueMeasure = $valueMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueMeasure(): static
    {
        $this->valueMeasure = null;

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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|array<EmissionCalculationMethod>
     */
    public function getEmissionCalculationMethod(): ?array
    {
        return $this->emissionCalculationMethod;
    }

    /**
     * @param  null|array<EmissionCalculationMethod> $emissionCalculationMethod
     * @return static
     */
    public function setEmissionCalculationMethod(
        ?array $emissionCalculationMethod = null
    ): static {
        $this->emissionCalculationMethod = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmissionCalculationMethod(): static
    {
        $this->emissionCalculationMethod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEmissionCalculationMethod(): static
    {
        $this->emissionCalculationMethod = [];

        return $this;
    }

    /**
     * @return null|EmissionCalculationMethod
     */
    public function firstEmissionCalculationMethod(): ?EmissionCalculationMethod
    {
        $emissionCalculationMethod = $this->emissionCalculationMethod ?? [];
        $emissionCalculationMethod = reset($emissionCalculationMethod);

        if (false === $emissionCalculationMethod) {
            return null;
        }

        return $emissionCalculationMethod;
    }

    /**
     * @return null|EmissionCalculationMethod
     */
    public function lastEmissionCalculationMethod(): ?EmissionCalculationMethod
    {
        $emissionCalculationMethod = $this->emissionCalculationMethod ?? [];
        $emissionCalculationMethod = end($emissionCalculationMethod);

        if (false === $emissionCalculationMethod) {
            return null;
        }

        return $emissionCalculationMethod;
    }

    /**
     * @param  EmissionCalculationMethod $emissionCalculationMethod
     * @return static
     */
    public function addToEmissionCalculationMethod(
        EmissionCalculationMethod $emissionCalculationMethod
    ): static {
        $this->emissionCalculationMethod[] = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return EmissionCalculationMethod
     */
    public function addToEmissionCalculationMethodWithCreate(): EmissionCalculationMethod
    {
        $this->addToEmissionCalculationMethod($emissionCalculationMethod = new EmissionCalculationMethod());

        return $emissionCalculationMethod;
    }

    /**
     * @param  EmissionCalculationMethod $emissionCalculationMethod
     * @return static
     */
    public function addOnceToEmissionCalculationMethod(
        EmissionCalculationMethod $emissionCalculationMethod
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->emissionCalculationMethod)) {
            $this->emissionCalculationMethod = [];
        }

        $this->emissionCalculationMethod[0] = $emissionCalculationMethod;

        return $this;
    }

    /**
     * @return EmissionCalculationMethod
     */
    public function addOnceToEmissionCalculationMethodWithCreate(): EmissionCalculationMethod
    {
        if (!InvoiceSuiteArrayUtils::is($this->emissionCalculationMethod)) {
            $this->emissionCalculationMethod = [];
        }

        if ([] === $this->emissionCalculationMethod) {
            $this->addOnceToEmissionCalculationMethod(new EmissionCalculationMethod());
        }

        return $this->emissionCalculationMethod[0];
    }
}
