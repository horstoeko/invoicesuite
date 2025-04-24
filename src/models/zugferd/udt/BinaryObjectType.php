<?php

namespace horstoeko\invoicesuite\models\zugferd\udt;

use JMS\Serializer\Annotation as JMS;

class BinaryObjectType
{
    /**
     * @var string
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlValue(cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @var string
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("mimeCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var string
     * @JMS\Groups({"zffxen16931", "zffxextended"})
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
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

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
     * @param string $mimeCode
     * @return self
     */
    public function setMimeCode(string $mimeCode): self
    {
        $this->mimeCode = $mimeCode;

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
     * @param string $filename
     * @return self
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
}
