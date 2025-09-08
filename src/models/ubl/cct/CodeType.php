<?php

namespace horstoeko\invoicesuite\models\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class CodeType
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
     * @JMS\SerializedName("listID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListID", setter="setListID")
     */
    private $listID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listAgencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListAgencyID", setter="setListAgencyID")
     */
    private $listAgencyID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listAgencyName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListAgencyName", setter="setListAgencyName")
     */
    private $listAgencyName;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListName", setter="setListName")
     */
    private $listName;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListVersionID", setter="setListVersionID")
     */
    private $listVersionID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("name")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("languageID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListURI", setter="setListURI")
     */
    private $listURI;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listSchemeURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListSchemeURI", setter="setListSchemeURI")
     */
    private $listSchemeURI;

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
    public function getListID(): ?string
    {
        return $this->listID;
    }

    /**
     * @param string|null $listID
     * @return self
     */
    public function setListID(?string $listID = null): self
    {
        $this->listID = InvoiceSuiteStringUtils::asNullWhenEmpty($listID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListID(): self
    {
        $this->listID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListAgencyID(): ?string
    {
        return $this->listAgencyID;
    }

    /**
     * @param string|null $listAgencyID
     * @return self
     */
    public function setListAgencyID(?string $listAgencyID = null): self
    {
        $this->listAgencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($listAgencyID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListAgencyID(): self
    {
        $this->listAgencyID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListAgencyName(): ?string
    {
        return $this->listAgencyName;
    }

    /**
     * @param string|null $listAgencyName
     * @return self
     */
    public function setListAgencyName(?string $listAgencyName = null): self
    {
        $this->listAgencyName = InvoiceSuiteStringUtils::asNullWhenEmpty($listAgencyName);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListAgencyName(): self
    {
        $this->listAgencyName = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListName(): ?string
    {
        return $this->listName;
    }

    /**
     * @param string|null $listName
     * @return self
     */
    public function setListName(?string $listName = null): self
    {
        $this->listName = InvoiceSuiteStringUtils::asNullWhenEmpty($listName);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListName(): self
    {
        $this->listName = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListVersionID(): ?string
    {
        return $this->listVersionID;
    }

    /**
     * @param string|null $listVersionID
     * @return self
     */
    public function setListVersionID(?string $listVersionID = null): self
    {
        $this->listVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($listVersionID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListVersionID(): self
    {
        $this->listVersionID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name = null): self
    {
        $this->name = InvoiceSuiteStringUtils::asNullWhenEmpty($name);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageID(): ?string
    {
        return $this->languageID;
    }

    /**
     * @param string|null $languageID
     * @return self
     */
    public function setLanguageID(?string $languageID = null): self
    {
        $this->languageID = InvoiceSuiteStringUtils::asNullWhenEmpty($languageID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLanguageID(): self
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListURI(): ?string
    {
        return $this->listURI;
    }

    /**
     * @param string|null $listURI
     * @return self
     */
    public function setListURI(?string $listURI = null): self
    {
        $this->listURI = InvoiceSuiteStringUtils::asNullWhenEmpty($listURI);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListURI(): self
    {
        $this->listURI = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getListSchemeURI(): ?string
    {
        return $this->listSchemeURI;
    }

    /**
     * @param string|null $listSchemeURI
     * @return self
     */
    public function setListSchemeURI(?string $listSchemeURI = null): self
    {
        $this->listSchemeURI = InvoiceSuiteStringUtils::asNullWhenEmpty($listSchemeURI);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetListSchemeURI(): self
    {
        $this->listSchemeURI = null;

        return $this;
    }
}
