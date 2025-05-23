<?php

namespace horstoeko\invoicesuite\models\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class QuantityType
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
     * @JMS\SerializedName("unitCodeListID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListID", setter="setUnitCodeListID")
     */
    private $unitCodeListID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListAgencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListAgencyID", setter="setUnitCodeListAgencyID")
     */
    private $unitCodeListAgencyID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListAgencyName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListAgencyName", setter="setUnitCodeListAgencyName")
     */
    private $unitCodeListAgencyName;

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
        $this->unitCode = $unitCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitCodeListID(): ?string
    {
        return $this->unitCodeListID;
    }

    /**
     * @param string|null $unitCodeListID
     * @return self
     */
    public function setUnitCodeListID(?string $unitCodeListID = null): self
    {
        $this->unitCodeListID = $unitCodeListID;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitCodeListAgencyID(): ?string
    {
        return $this->unitCodeListAgencyID;
    }

    /**
     * @param string|null $unitCodeListAgencyID
     * @return self
     */
    public function setUnitCodeListAgencyID(?string $unitCodeListAgencyID = null): self
    {
        $this->unitCodeListAgencyID = $unitCodeListAgencyID;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitCodeListAgencyName(): ?string
    {
        return $this->unitCodeListAgencyName;
    }

    /**
     * @param string|null $unitCodeListAgencyName
     * @return self
     */
    public function setUnitCodeListAgencyName(?string $unitCodeListAgencyName = null): self
    {
        $this->unitCodeListAgencyName = $unitCodeListAgencyName;

        return $this;
    }
}
