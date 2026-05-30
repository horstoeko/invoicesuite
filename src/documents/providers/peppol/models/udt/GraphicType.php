<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cct\BinaryObjectType;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class GraphicType extends BinaryObjectType
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getMimeCode', setter: 'setMimeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('mimeCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $mimeCode;

    /**
     * @return null|string
     */
    public function getMimeCode(): ?string
    {
        return $this->mimeCode;
    }

    /**
     * @param  null|string $mimeCode
     * @return static
     */
    public function setMimeCode(
        ?string $mimeCode = null
    ): static {
        $this->mimeCode = InvoiceSuiteStringUtils::asNullWhenEmpty($mimeCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMimeCode(): static
    {
        $this->mimeCode = null;

        return $this;
    }
}
