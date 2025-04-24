<?php

namespace horstoeko\invoicesuite\models\zffx\udt;

use JMS\Serializer\Annotation as JMS;

class MeasureType
{
    /**
     * @var float
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("float")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var string
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCode", setter="setUnitCode")
     */
    private $unitCode;

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return self
     */
    public function setValue(float $value): self
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
     * @param string $unitCode
     * @return self
     */
    public function setUnitCode(string $unitCode): self
    {
        $this->unitCode = $unitCode;

        return $this;
    }
}
