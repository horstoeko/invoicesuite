<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Line;
use JMS\Serializer\Annotation as JMS;

class AddressLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|Line
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Line")
     * @JMS\Expose
     * @JMS\SerializedName("Line")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLine", setter="setLine")
     */
    private $line;

    /**
     * @return null|Line
     */
    public function getLine(): ?Line
    {
        return $this->line;
    }

    /**
     * @return Line
     */
    public function getLineWithCreate(): Line
    {
        $this->line = is_null($this->line) ? new Line() : $this->line;

        return $this->line;
    }

    /**
     * @param  null|Line $line
     * @return static
     */
    public function setLine(?Line $line = null): static
    {
        $this->line = $line;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLine(): static
    {
        $this->line = null;

        return $this;
    }
}
