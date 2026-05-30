<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Line;
use JMS\Serializer\Annotation as JMS;

class AddressLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|Line
     */
    #[JMS\Accessor(getter: 'getLine', setter: 'setLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Line')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Line')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->line ??= new Line();

        return $this->line;
    }

    /**
     * @param  null|Line $line
     * @return static
     */
    public function setLine(
        ?Line $line = null
    ): static {
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
