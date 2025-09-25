<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class BinaryObjectType
{
    use HandlesObjectFlags;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\Jms\Base64Encoded")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("format")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getFormat", setter="setFormat")
     */
    private $format;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("mimeCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("encodingCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getEncodingCode", setter="setEncodingCode")
     */
    private $encodingCode;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("characterSetCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCharacterSetCode", setter="setCharacterSetCode")
     */
    private $characterSetCode;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("uri")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUri", setter="setUri")
     */
    private $uri;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("filename")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getFilename", setter="setFilename")
     */
    private $filename;

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return self
     */
    public function setValue(?string $value = null): self
    {
        $this->value = InvoiceSuiteStringUtils::asNullWhenEmpty($value);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValue(): self
    {
        $this->value = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string|null $format
     * @return self
     */
    public function setFormat(?string $format = null): self
    {
        $this->format = InvoiceSuiteStringUtils::asNullWhenEmpty($format);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFormat(): self
    {
        $this->format = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeCode(): ?string
    {
        return $this->mimeCode;
    }

    /**
     * @param string|null $mimeCode
     * @return self
     */
    public function setMimeCode(?string $mimeCode = null): self
    {
        $this->mimeCode = InvoiceSuiteStringUtils::asNullWhenEmpty($mimeCode);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMimeCode(): self
    {
        $this->mimeCode = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEncodingCode(): ?string
    {
        return $this->encodingCode;
    }

    /**
     * @param string|null $encodingCode
     * @return self
     */
    public function setEncodingCode(?string $encodingCode = null): self
    {
        $this->encodingCode = InvoiceSuiteStringUtils::asNullWhenEmpty($encodingCode);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEncodingCode(): self
    {
        $this->encodingCode = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCharacterSetCode(): ?string
    {
        return $this->characterSetCode;
    }

    /**
     * @param string|null $characterSetCode
     * @return self
     */
    public function setCharacterSetCode(?string $characterSetCode = null): self
    {
        $this->characterSetCode = InvoiceSuiteStringUtils::asNullWhenEmpty($characterSetCode);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCharacterSetCode(): self
    {
        $this->characterSetCode = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }

    /**
     * @param string|null $uri
     * @return self
     */
    public function setUri(?string $uri = null): self
    {
        $this->uri = InvoiceSuiteStringUtils::asNullWhenEmpty($uri);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUri(): self
    {
        $this->uri = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return self
     */
    public function setFilename(?string $filename = null): self
    {
        $this->filename = InvoiceSuiteStringUtils::asNullWhenEmpty($filename);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFilename(): self
    {
        $this->filename = null;

        return $this;
    }
}
