<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\MeterConstant;
use horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode;
use horstoeko\invoicesuite\models\ubl\cbc\MeterName;
use horstoeko\invoicesuite\models\ubl\cbc\MeterNumber;
use horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity;

class MeterType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MeterNumber|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MeterNumber")
     * @JMS\Expose
     * @JMS\SerializedName("MeterNumber")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterNumber", setter="setMeterNumber")
     */
    private $meterNumber;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MeterName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MeterName")
     * @JMS\Expose
     * @JMS\SerializedName("MeterName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterName", setter="setMeterName")
     */
    private $meterName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MeterConstant|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MeterConstant")
     * @JMS\Expose
     * @JMS\SerializedName("MeterConstant")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterConstant", setter="setMeterConstant")
     */
    private $meterConstant;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode")
     * @JMS\Expose
     * @JMS\SerializedName("MeterConstantCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterConstantCode", setter="setMeterConstantCode")
     */
    private $meterConstantCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalDeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalDeliveredQuantity", setter="setTotalDeliveredQuantity")
     */
    private $totalDeliveredQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\MeterReading>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\MeterReading>")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReading")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeterReading", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeterReading", setter="setMeterReading")
     */
    private $meterReading;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\MeterProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\MeterProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("MeterProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeterProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeterProperty", setter="setMeterProperty")
     */
    private $meterProperty;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterNumber|null
     */
    public function getMeterNumber(): ?MeterNumber
    {
        return $this->meterNumber;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterNumber
     */
    public function getMeterNumberWithCreate(): MeterNumber
    {
        $this->meterNumber = is_null($this->meterNumber) ? new MeterNumber() : $this->meterNumber;

        return $this->meterNumber;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MeterNumber|null $meterNumber
     * @return self
     */
    public function setMeterNumber(?MeterNumber $meterNumber = null): self
    {
        $this->meterNumber = $meterNumber;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterNumber(): self
    {
        $this->meterNumber = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterName|null
     */
    public function getMeterName(): ?MeterName
    {
        return $this->meterName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterName
     */
    public function getMeterNameWithCreate(): MeterName
    {
        $this->meterName = is_null($this->meterName) ? new MeterName() : $this->meterName;

        return $this->meterName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MeterName|null $meterName
     * @return self
     */
    public function setMeterName(?MeterName $meterName = null): self
    {
        $this->meterName = $meterName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterName(): self
    {
        $this->meterName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterConstant|null
     */
    public function getMeterConstant(): ?MeterConstant
    {
        return $this->meterConstant;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterConstant
     */
    public function getMeterConstantWithCreate(): MeterConstant
    {
        $this->meterConstant = is_null($this->meterConstant) ? new MeterConstant() : $this->meterConstant;

        return $this->meterConstant;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MeterConstant|null $meterConstant
     * @return self
     */
    public function setMeterConstant(?MeterConstant $meterConstant = null): self
    {
        $this->meterConstant = $meterConstant;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterConstant(): self
    {
        $this->meterConstant = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode|null
     */
    public function getMeterConstantCode(): ?MeterConstantCode
    {
        return $this->meterConstantCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode
     */
    public function getMeterConstantCodeWithCreate(): MeterConstantCode
    {
        $this->meterConstantCode = is_null($this->meterConstantCode) ? new MeterConstantCode() : $this->meterConstantCode;

        return $this->meterConstantCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MeterConstantCode|null $meterConstantCode
     * @return self
     */
    public function setMeterConstantCode(?MeterConstantCode $meterConstantCode = null): self
    {
        $this->meterConstantCode = $meterConstantCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterConstantCode(): self
    {
        $this->meterConstantCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null
     */
    public function getTotalDeliveredQuantity(): ?TotalDeliveredQuantity
    {
        return $this->totalDeliveredQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantityWithCreate(): TotalDeliveredQuantity
    {
        $this->totalDeliveredQuantity = is_null($this->totalDeliveredQuantity) ? new TotalDeliveredQuantity() : $this->totalDeliveredQuantity;

        return $this->totalDeliveredQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null $totalDeliveredQuantity
     * @return self
     */
    public function setTotalDeliveredQuantity(?TotalDeliveredQuantity $totalDeliveredQuantity = null): self
    {
        $this->totalDeliveredQuantity = $totalDeliveredQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalDeliveredQuantity(): self
    {
        $this->totalDeliveredQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\MeterReading>|null
     */
    public function getMeterReading(): ?array
    {
        return $this->meterReading;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\MeterReading>|null $meterReading
     * @return self
     */
    public function setMeterReading(?array $meterReading = null): self
    {
        $this->meterReading = $meterReading;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterReading(): self
    {
        $this->meterReading = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeterReading(): self
    {
        $this->meterReading = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeterReading $meterReading
     * @return self
     */
    public function addToMeterReading(MeterReading $meterReading): self
    {
        $this->meterReading[] = $meterReading;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeterReading
     */
    public function addToMeterReadingWithCreate(): MeterReading
    {
        $this->addTometerReading($meterReading = new MeterReading());

        return $meterReading;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeterReading $meterReading
     * @return self
     */
    public function addOnceToMeterReading(MeterReading $meterReading): self
    {
        if (!is_array($this->meterReading)) {
            $this->meterReading = [];
        }

        $this->meterReading[0] = $meterReading;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeterReading
     */
    public function addOnceToMeterReadingWithCreate(): MeterReading
    {
        if (!is_array($this->meterReading)) {
            $this->meterReading = [];
        }

        if ($this->meterReading === []) {
            $this->addOnceTometerReading(new MeterReading());
        }

        return $this->meterReading[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\MeterProperty>|null
     */
    public function getMeterProperty(): ?array
    {
        return $this->meterProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\MeterProperty>|null $meterProperty
     * @return self
     */
    public function setMeterProperty(?array $meterProperty = null): self
    {
        $this->meterProperty = $meterProperty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterProperty(): self
    {
        $this->meterProperty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeterProperty(): self
    {
        $this->meterProperty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeterProperty $meterProperty
     * @return self
     */
    public function addToMeterProperty(MeterProperty $meterProperty): self
    {
        $this->meterProperty[] = $meterProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeterProperty
     */
    public function addToMeterPropertyWithCreate(): MeterProperty
    {
        $this->addTometerProperty($meterProperty = new MeterProperty());

        return $meterProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeterProperty $meterProperty
     * @return self
     */
    public function addOnceToMeterProperty(MeterProperty $meterProperty): self
    {
        if (!is_array($this->meterProperty)) {
            $this->meterProperty = [];
        }

        $this->meterProperty[0] = $meterProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeterProperty
     */
    public function addOnceToMeterPropertyWithCreate(): MeterProperty
    {
        if (!is_array($this->meterProperty)) {
            $this->meterProperty = [];
        }

        if ($this->meterProperty === []) {
            $this->addOnceTometerProperty(new MeterProperty());
        }

        return $this->meterProperty[0];
    }
}
