<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\qdt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class DeliveryTermsCodeType
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
}
