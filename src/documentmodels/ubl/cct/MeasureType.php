<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class MeasureType
{
    use HandlesObjectFlags;

    /**
     * @var float|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("float")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCode", setter="setUnitCode")
     */
    private $unitCode;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListVersionID", setter="setUnitCodeListVersionID")
     */
    private $unitCodeListVersionID;

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return self
     */
    public function setValue(?float $value = null): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValue(): self
    {
        $this->value = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    /**
     * @param string|null $unitCode
     * @return self
     */
    public function setUnitCode(?string $unitCode = null): self
    {
        $this->unitCode = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCode);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUnitCode(): self
    {
        $this->unitCode = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitCodeListVersionID(): ?string
    {
        return $this->unitCodeListVersionID;
    }

    /**
     * @param string|null $unitCodeListVersionID
     * @return self
     */
    public function setUnitCodeListVersionID(?string $unitCodeListVersionID = null): self
    {
        $this->unitCodeListVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCodeListVersionID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUnitCodeListVersionID(): self
    {
        $this->unitCodeListVersionID = null;

        return $this;
    }
}
