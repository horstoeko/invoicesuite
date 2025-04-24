<?php

namespace horstoeko\invoicesuite\models\zffx\qdt;

use JMS\Serializer\Annotation as JMS;

class LineStatusCodeType
{
    /**
     * @var string
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
