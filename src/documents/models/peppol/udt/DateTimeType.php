<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\udt;

use DateTime;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTime
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return null|DateTime
     */
    public function getValue(): ?DateTime
    {
        return $this->value;
    }

    /**
     * @return null|DateTime
     */
    public function getValueWithCreate(): ?DateTime
    {
        $this->value = is_null($this->value) ? new DateTime() : $this->value;

        return $this->value;
    }

    /**
     * @param  null|DateTime $value
     * @return static
     */
    public function setValue(?DateTime $value = null): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValue(): static
    {
        $this->value = null;

        return $this;
    }
}
