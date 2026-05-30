<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class NumericType
{
    use HandlesObjectFlags;

    /**
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\Type('float')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

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
    public function setValue(
        ?float $value = null
    ): static {
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
