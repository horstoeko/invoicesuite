<?php

namespace horstoeko\invoicesuite\models\zffxextended\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class BinaryObjectType
{
    use HandlesObjectFlags;

    /**
     * @var string|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var string|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("mimeCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var string|null
     * @JMS\Groups({"zffx"})
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
