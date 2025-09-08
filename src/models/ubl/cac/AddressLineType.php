<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Line;

class AddressLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Line|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Line")
     * @JMS\Expose
     * @JMS\SerializedName("Line")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLine", setter="setLine")
     */
    private $line;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Line|null
     */
    public function getLine(): ?Line
    {
        return $this->line;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Line
     */
    public function getLineWithCreate(): Line
    {
        $this->line = is_null($this->line) ? new Line() : $this->line;

        return $this->line;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Line|null $line
     * @return self
     */
    public function setLine(?Line $line = null): self
    {
        $this->line = $line;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLine(): self
    {
        $this->line = null;

        return $this;
    }
}
