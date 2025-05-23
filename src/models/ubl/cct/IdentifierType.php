<?php

namespace horstoeko\invoicesuite\models\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

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
        $this->value = $value;

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
        $this->schemeID = $schemeID;

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
        $this->schemeName = $schemeName;

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
        $this->schemeAgencyID = $schemeAgencyID;

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
        $this->schemeAgencyName = $schemeAgencyName;

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
        $this->schemeVersionID = $schemeVersionID;

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
        $this->schemeDataURI = $schemeDataURI;

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
        $this->schemeURI = $schemeURI;

        return $this;
    }
}
