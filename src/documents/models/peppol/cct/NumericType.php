<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class NumericType
{
    use HandlesObjectFlags;

    /**
     * @var null|float
     * @JMS\Groups({"ubl"})
     * @JMS\Type("float")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("format")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getFormat", setter="setFormat")
     */
    private $format;

    /**
     * @return null|float
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param  null|float $value
     * @return static
     */
    public function setValue(?float $value = null): static
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

    /**
     * @return null|string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param  null|string $format
     * @return static
     */
    public function setFormat(?string $format = null): static
    {
        $this->format = InvoiceSuiteStringUtils::asNullWhenEmpty($format);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFormat(): static
    {
        $this->format = null;

        return $this;
    }
}
