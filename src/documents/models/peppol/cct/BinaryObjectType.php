<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class BinaryObjectType
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\Jms\Base64Encoded")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("format")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getFormat", setter="setFormat")
     */
    private $format;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("mimeCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("encodingCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getEncodingCode", setter="setEncodingCode")
     */
    private $encodingCode;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("characterSetCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCharacterSetCode", setter="setCharacterSetCode")
     */
    private $characterSetCode;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("uri")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUri", setter="setUri")
     */
    private $uri;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("filename")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getFilename", setter="setFilename")
     */
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
    public function setValue(?string $value = null): static
    {
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
    public function setFormat(?string $format = null): static
    {
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
    public function setMimeCode(?string $mimeCode = null): static
    {
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
    public function setEncodingCode(?string $encodingCode = null): static
    {
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
    public function setCharacterSetCode(?string $characterSetCode = null): static
    {
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
    public function setUri(?string $uri = null): static
    {
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
    public function setFilename(?string $filename = null): static
    {
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
