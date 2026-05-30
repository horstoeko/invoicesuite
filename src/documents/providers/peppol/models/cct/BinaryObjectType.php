<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cct;

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
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\Jms\Base64Encoded')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getFormat', setter: 'setFormat')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('format')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $format;

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
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getEncodingCode', setter: 'setEncodingCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('encodingCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $encodingCode;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getCharacterSetCode', setter: 'setCharacterSetCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('characterSetCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $characterSetCode;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUri', setter: 'setUri')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('uri')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $uri;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getFilename', setter: 'setFilename')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
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
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param  null|string $format
     * @return static
     */
    public function setFormat(
        ?string $format = null
    ): static {
        $this->format = InvoiceSuiteStringUtils::asNullWhenEmpty($format);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFormat(): static
    {
        $this->format = null;

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
    public function getEncodingCode(): ?string
    {
        return $this->encodingCode;
    }

    /**
     * @param  null|string $encodingCode
     * @return static
     */
    public function setEncodingCode(
        ?string $encodingCode = null
    ): static {
        $this->encodingCode = InvoiceSuiteStringUtils::asNullWhenEmpty($encodingCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEncodingCode(): static
    {
        $this->encodingCode = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCharacterSetCode(): ?string
    {
        return $this->characterSetCode;
    }

    /**
     * @param  null|string $characterSetCode
     * @return static
     */
    public function setCharacterSetCode(
        ?string $characterSetCode = null
    ): static {
        $this->characterSetCode = InvoiceSuiteStringUtils::asNullWhenEmpty($characterSetCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCharacterSetCode(): static
    {
        $this->characterSetCode = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }

    /**
     * @param  null|string $uri
     * @return static
     */
    public function setUri(
        ?string $uri = null
    ): static {
        $this->uri = InvoiceSuiteStringUtils::asNullWhenEmpty($uri);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUri(): static
    {
        $this->uri = null;

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
