<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class BinaryObjectType
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
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getMimeCode', setter: 'setMimeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('mimeCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $mimeCode;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getFilename', setter: 'setFilename')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('filename')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $filename;

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

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param  null|string $filename
     * @return static
     */
    public function setFilename(
        ?string $filename = null
    ): static {
        $this->filename = InvoiceSuiteStringUtils::asNullWhenEmpty($filename);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFilename(): static
    {
        $this->filename = null;

        return $this;
    }
}
