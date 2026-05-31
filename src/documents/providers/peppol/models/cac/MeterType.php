<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterConstant;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterConstantCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterNumber;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalDeliveredQuantity;
use JMS\Serializer\Annotation as JMS;

class MeterType
{
    use HandlesObjectFlags;

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
     * @var null|MeterName
     */
    #[JMS\Accessor(getter: 'getMeterName', setter: 'setMeterName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterName;

    /**
     * @var null|MeterConstant
     */
    #[JMS\Accessor(getter: 'getMeterConstant', setter: 'setMeterConstant')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterConstant')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterConstant')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterConstant;

    /**
     * @var null|MeterConstantCode
     */
    #[JMS\Accessor(getter: 'getMeterConstantCode', setter: 'setMeterConstantCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterConstantCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterConstantCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterConstantCode;

    /**
     * @var null|TotalDeliveredQuantity
     */
    #[JMS\Accessor(getter: 'getTotalDeliveredQuantity', setter: 'setTotalDeliveredQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalDeliveredQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalDeliveredQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalDeliveredQuantity;

    /**
     * @var null|array<MeterReading>
     */
    #[JMS\Accessor(getter: 'getMeterReading', setter: 'setMeterReading')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterReading')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeterReading>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MeterReading', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $meterReading;

    /**
     * @var null|array<MeterProperty>
     */
    #[JMS\Accessor(getter: 'getMeterProperty', setter: 'setMeterProperty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterProperty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeterProperty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MeterProperty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $meterProperty;

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
     * @return null|MeterName
     */
    public function getMeterName(): ?MeterName
    {
        return $this->meterName;
    }

    /**
     * @return MeterName
     */
    public function getMeterNameWithCreate(): MeterName
    {
        $this->meterName ??= new MeterName();

        return $this->meterName;
    }

    /**
     * @param  null|MeterName $meterName
     * @return static
     */
    public function setMeterName(
        ?MeterName $meterName = null
    ): static {
        $this->meterName = $meterName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterName(): static
    {
        $this->meterName = null;

        return $this;
    }

    /**
     * @return null|MeterConstant
     */
    public function getMeterConstant(): ?MeterConstant
    {
        return $this->meterConstant;
    }

    /**
     * @return MeterConstant
     */
    public function getMeterConstantWithCreate(): MeterConstant
    {
        $this->meterConstant ??= new MeterConstant();

        return $this->meterConstant;
    }

    /**
     * @param  null|MeterConstant $meterConstant
     * @return static
     */
    public function setMeterConstant(
        ?MeterConstant $meterConstant = null
    ): static {
        $this->meterConstant = $meterConstant;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterConstant(): static
    {
        $this->meterConstant = null;

        return $this;
    }

    /**
     * @return null|MeterConstantCode
     */
    public function getMeterConstantCode(): ?MeterConstantCode
    {
        return $this->meterConstantCode;
    }

    /**
     * @return MeterConstantCode
     */
    public function getMeterConstantCodeWithCreate(): MeterConstantCode
    {
        $this->meterConstantCode ??= new MeterConstantCode();

        return $this->meterConstantCode;
    }

    /**
     * @param  null|MeterConstantCode $meterConstantCode
     * @return static
     */
    public function setMeterConstantCode(
        ?MeterConstantCode $meterConstantCode = null
    ): static {
        $this->meterConstantCode = $meterConstantCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterConstantCode(): static
    {
        $this->meterConstantCode = null;

        return $this;
    }

    /**
     * @return null|TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantity(): ?TotalDeliveredQuantity
    {
        return $this->totalDeliveredQuantity;
    }

    /**
     * @return TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantityWithCreate(): TotalDeliveredQuantity
    {
        $this->totalDeliveredQuantity ??= new TotalDeliveredQuantity();

        return $this->totalDeliveredQuantity;
    }

    /**
     * @param  null|TotalDeliveredQuantity $totalDeliveredQuantity
     * @return static
     */
    public function setTotalDeliveredQuantity(
        ?TotalDeliveredQuantity $totalDeliveredQuantity = null
    ): static {
        $this->totalDeliveredQuantity = $totalDeliveredQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalDeliveredQuantity(): static
    {
        $this->totalDeliveredQuantity = null;

        return $this;
    }

    /**
     * @return null|array<MeterReading>
     */
    public function getMeterReading(): ?array
    {
        return $this->meterReading;
    }

    /**
     * @param  null|array<MeterReading> $meterReading
     * @return static
     */
    public function setMeterReading(
        ?array $meterReading = null
    ): static {
        $this->meterReading = $meterReading;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterReading(): static
    {
        $this->meterReading = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeterReading(): static
    {
        $this->meterReading = [];

        return $this;
    }

    /**
     * @return null|MeterReading
     */
    public function firstMeterReading(): ?MeterReading
    {
        $meterReading = $this->meterReading ?? [];
        $meterReading = reset($meterReading);

        if (false === $meterReading) {
            return null;
        }

        return $meterReading;
    }

    /**
     * @return null|MeterReading
     */
    public function lastMeterReading(): ?MeterReading
    {
        $meterReading = $this->meterReading ?? [];
        $meterReading = end($meterReading);

        if (false === $meterReading) {
            return null;
        }

        return $meterReading;
    }

    /**
     * @param  MeterReading $meterReading
     * @return static
     */
    public function addToMeterReading(
        MeterReading $meterReading
    ): static {
        $this->meterReading[] = $meterReading;

        return $this;
    }

    /**
     * @return MeterReading
     */
    public function addToMeterReadingWithCreate(): MeterReading
    {
        $this->addToMeterReading($meterReading = new MeterReading());

        return $meterReading;
    }

    /**
     * @param  MeterReading $meterReading
     * @return static
     */
    public function addOnceToMeterReading(
        MeterReading $meterReading
    ): static {
        if (!is_array($this->meterReading)) {
            $this->meterReading = [];
        }

        $this->meterReading[0] = $meterReading;

        return $this;
    }

    /**
     * @return MeterReading
     */
    public function addOnceToMeterReadingWithCreate(): MeterReading
    {
        if (!is_array($this->meterReading)) {
            $this->meterReading = [];
        }

        if ([] === $this->meterReading) {
            $this->addOnceToMeterReading(new MeterReading());
        }

        return $this->meterReading[0];
    }

    /**
     * @return null|array<MeterProperty>
     */
    public function getMeterProperty(): ?array
    {
        return $this->meterProperty;
    }

    /**
     * @param  null|array<MeterProperty> $meterProperty
     * @return static
     */
    public function setMeterProperty(
        ?array $meterProperty = null
    ): static {
        $this->meterProperty = $meterProperty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterProperty(): static
    {
        $this->meterProperty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeterProperty(): static
    {
        $this->meterProperty = [];

        return $this;
    }

    /**
     * @return null|MeterProperty
     */
    public function firstMeterProperty(): ?MeterProperty
    {
        $meterProperty = $this->meterProperty ?? [];
        $meterProperty = reset($meterProperty);

        if (false === $meterProperty) {
            return null;
        }

        return $meterProperty;
    }

    /**
     * @return null|MeterProperty
     */
    public function lastMeterProperty(): ?MeterProperty
    {
        $meterProperty = $this->meterProperty ?? [];
        $meterProperty = end($meterProperty);

        if (false === $meterProperty) {
            return null;
        }

        return $meterProperty;
    }

    /**
     * @param  MeterProperty $meterProperty
     * @return static
     */
    public function addToMeterProperty(
        MeterProperty $meterProperty
    ): static {
        $this->meterProperty[] = $meterProperty;

        return $this;
    }

    /**
     * @return MeterProperty
     */
    public function addToMeterPropertyWithCreate(): MeterProperty
    {
        $this->addToMeterProperty($meterProperty = new MeterProperty());

        return $meterProperty;
    }

    /**
     * @param  MeterProperty $meterProperty
     * @return static
     */
    public function addOnceToMeterProperty(
        MeterProperty $meterProperty
    ): static {
        if (!is_array($this->meterProperty)) {
            $this->meterProperty = [];
        }

        $this->meterProperty[0] = $meterProperty;

        return $this;
    }

    /**
     * @return MeterProperty
     */
    public function addOnceToMeterPropertyWithCreate(): MeterProperty
    {
        if (!is_array($this->meterProperty)) {
            $this->meterProperty = [];
        }

        if ([] === $this->meterProperty) {
            $this->addOnceToMeterProperty(new MeterProperty());
        }

        return $this->meterProperty[0];
    }
}
