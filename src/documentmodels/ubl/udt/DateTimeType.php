<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\udt;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var DateTime|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return DateTime|null
     */
    public function getValue(): ?DateTime
    {
        return $this->value;
    }

    /**
     * @return DateTime|null
     */
    public function getValueWithCreate(): ?DateTime
    {
        $this->value = is_null($this->value) ? new DateTime() : $this->value;

        return $this->value;
    }

    /**
     * @param DateTime|null $value
     * @return self
     */
    public function setValue(?DateTime $value = null): self
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
}
