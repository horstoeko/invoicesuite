<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class IDType
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
     * @JMS\SerializedName("schemeID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeID", setter="setSchemeID")
     */
    private $schemeID;

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
    public function getSchemeID(): ?string
    {
        return $this->schemeID;
    }

    /**
     * @param string|null $schemeID
     * @return self
     */
    public function setSchemeID(?string $schemeID = null): self
    {
        $this->schemeID = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeID(): self
    {
        $this->schemeID = null;

        return $this;
    }
}
