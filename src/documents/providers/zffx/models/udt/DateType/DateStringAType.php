<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class DateStringAType
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getFormat', setter: 'setFormat')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('format')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $format;

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param  null|string $value
     * @return static
     */
    public function setValue(
        ?string $value = null
    ): static {
        $this->value = InvoiceSuiteStringUtils::asNullWhenEmpty($value);

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
    public function setFormat(
        ?string $format = null
    ): static {
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
