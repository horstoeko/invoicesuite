<?php

namespace horstoeko\invoicesuite\models\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class IdentifierType
{
    use HandlesObjectFlags;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
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
     * @JMS\SerializedName("schemeID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeID", setter="setSchemeID")
     */
    private $schemeID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeName", setter="setSchemeName")
     */
    private $schemeName;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeAgencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeAgencyID", setter="setSchemeAgencyID")
     */
    private $schemeAgencyID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeAgencyName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeAgencyName", setter="setSchemeAgencyName")
     */
    private $schemeAgencyName;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeVersionID", setter="setSchemeVersionID")
     */
    private $schemeVersionID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeDataURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeDataURI", setter="setSchemeDataURI")
     */
    private $schemeDataURI;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("schemeURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getSchemeURI", setter="setSchemeURI")
     */
    private $schemeURI;

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

    /**
     * @return string|null
     */
    public function getSchemeName(): ?string
    {
        return $this->schemeName;
    }

    /**
     * @param string|null $schemeName
     * @return self
     */
    public function setSchemeName(?string $schemeName = null): self
    {
        $this->schemeName = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeName);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeName(): self
    {
        $this->schemeName = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchemeAgencyID(): ?string
    {
        return $this->schemeAgencyID;
    }

    /**
     * @param string|null $schemeAgencyID
     * @return self
     */
    public function setSchemeAgencyID(?string $schemeAgencyID = null): self
    {
        $this->schemeAgencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeAgencyID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeAgencyID(): self
    {
        $this->schemeAgencyID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchemeAgencyName(): ?string
    {
        return $this->schemeAgencyName;
    }

    /**
     * @param string|null $schemeAgencyName
     * @return self
     */
    public function setSchemeAgencyName(?string $schemeAgencyName = null): self
    {
        $this->schemeAgencyName = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeAgencyName);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeAgencyName(): self
    {
        $this->schemeAgencyName = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchemeVersionID(): ?string
    {
        return $this->schemeVersionID;
    }

    /**
     * @param string|null $schemeVersionID
     * @return self
     */
    public function setSchemeVersionID(?string $schemeVersionID = null): self
    {
        $this->schemeVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeVersionID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeVersionID(): self
    {
        $this->schemeVersionID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchemeDataURI(): ?string
    {
        return $this->schemeDataURI;
    }

    /**
     * @param string|null $schemeDataURI
     * @return self
     */
    public function setSchemeDataURI(?string $schemeDataURI = null): self
    {
        $this->schemeDataURI = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeDataURI);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeDataURI(): self
    {
        $this->schemeDataURI = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchemeURI(): ?string
    {
        return $this->schemeURI;
    }

    /**
     * @param string|null $schemeURI
     * @return self
     */
    public function setSchemeURI(?string $schemeURI = null): self
    {
        $this->schemeURI = InvoiceSuiteStringUtils::asNullWhenEmpty($schemeURI);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeURI(): self
    {
        $this->schemeURI = null;

        return $this;
    }
}
