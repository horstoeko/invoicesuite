<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cbc;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class PaidTimeType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @return null|DateTimeInterface
     */
    public function getValue(): ?DateTimeInterface
    {
        return $this->value;
    }

    /**
     * @param  null|DateTimeInterface $value
     * @return static
     */
    public function setValue(
        ?DateTimeInterface $value = null
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
