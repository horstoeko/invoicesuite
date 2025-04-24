<?php

namespace horstoeko\invoicesuite\models\zugferd\udt;

use JMS\Serializer\Annotation as JMS;

class IndicatorType
{
    /**
     * @var bool
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
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
     * @param bool
     * @return self
     */
    public function setIndicator(bool $indicator): self
    {
        $this->indicator = $indicator;

        return $this;
    }
}
