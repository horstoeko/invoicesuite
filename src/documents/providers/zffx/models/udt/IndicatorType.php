<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class IndicatorType
{
    use HandlesObjectFlags;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getIndicator', setter: 'setIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Indicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100', cdata: false)]
    private $indicator;

    /**
     * @return null|bool
     */
    public function getIndicator(): ?bool
    {
        return $this->indicator;
    }

    /**
     * @param  null|bool $indicator
     * @return static
     */
    public function setIndicator(
        ?bool $indicator = null
    ): static {
        $this->indicator = $indicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIndicator(): static
    {
        $this->indicator = null;

        return $this;
    }
}
