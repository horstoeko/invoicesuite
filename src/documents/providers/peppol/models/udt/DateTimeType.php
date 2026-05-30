<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\udt;

use DateTime;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTime
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
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
        $this->value ??= new DateTime();

        return $this->value;
    }

    /**
     * @param  null|DateTime $value
     * @return static
     */
    public function setValue(
        ?DateTime $value = null
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
