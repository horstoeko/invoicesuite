<?php

namespace horstoeko\invoicesuite\models\zffxbasicwl\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;

class IndicatorType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var bool
     * @JMS\Groups({"zffx"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("Indicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getIndicator", setter="setIndicator")
     */
    private $indicator;

    /**
     * @return bool|null
     */
    public function getIndicator(): ?bool
    {
        return $this->indicator;
    }

    /**
     * @param bool $indicator
     * @return self
     */
    public function setIndicator(bool $indicator): self
    {
        $this->indicator = $indicator;

        return $this;
    }
}
