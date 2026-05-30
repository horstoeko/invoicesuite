<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlRoot(name: 'TaxIncludedIndicator', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
class TaxIncludedIndicator
{
    use HandlesObjectFlags;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @return null|bool
     */
    public function getValue(): ?bool
    {
        return $this->value;
    }

    /**
     * @param  null|bool $value
     * @return static
     */
    public function setValue(
        ?bool $value = null
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
