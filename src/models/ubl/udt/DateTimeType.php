<?php

namespace horstoeko\invoicesuite\models\ubl\udt;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var DateTime
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
     * @return DateTime
     */
    public function getValueWithCreate(): DateTime
    {
        $this->value = is_null($this->value) ? new DateTime() : $this->value;

        return $this->value;
    }

    /**
     * @param DateTime $value
     * @return self
     */
    public function setValue(DateTime $value): self
    {
        $this->value = $value;

        return $this;
    }
}
