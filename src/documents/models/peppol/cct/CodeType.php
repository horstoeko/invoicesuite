<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class CodeType
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
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
     * @JMS\SerializedName("listID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListID", setter="setListID")
     */
    private $listID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listAgencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListAgencyID", setter="setListAgencyID")
     */
    private $listAgencyID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listAgencyName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListAgencyName", setter="setListAgencyName")
     */
    private $listAgencyName;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListName", setter="setListName")
     */
    private $listName;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListVersionID", setter="setListVersionID")
     */
    private $listVersionID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("name")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("languageID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListURI", setter="setListURI")
     */
    private $listURI;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("listSchemeURI")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getListSchemeURI", setter="setListSchemeURI")
     */
    private $listSchemeURI;

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
    public function getListID(): ?string
    {
        return $this->listID;
    }

    /**
     * @param  null|string $listID
     * @return static
     */
    public function setListID(?string $listID = null): static
    {
        $this->listID = InvoiceSuiteStringUtils::asNullWhenEmpty($listID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListID(): static
    {
        $this->listID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListAgencyID(): ?string
    {
        return $this->listAgencyID;
    }

    /**
     * @param  null|string $listAgencyID
     * @return static
     */
    public function setListAgencyID(?string $listAgencyID = null): static
    {
        $this->listAgencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($listAgencyID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListAgencyID(): static
    {
        $this->listAgencyID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListAgencyName(): ?string
    {
        return $this->listAgencyName;
    }

    /**
     * @param  null|string $listAgencyName
     * @return static
     */
    public function setListAgencyName(?string $listAgencyName = null): static
    {
        $this->listAgencyName = InvoiceSuiteStringUtils::asNullWhenEmpty($listAgencyName);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListAgencyName(): static
    {
        $this->listAgencyName = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListName(): ?string
    {
        return $this->listName;
    }

    /**
     * @param  null|string $listName
     * @return static
     */
    public function setListName(?string $listName = null): static
    {
        $this->listName = InvoiceSuiteStringUtils::asNullWhenEmpty($listName);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListName(): static
    {
        $this->listName = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListVersionID(): ?string
    {
        return $this->listVersionID;
    }

    /**
     * @param  null|string $listVersionID
     * @return static
     */
    public function setListVersionID(?string $listVersionID = null): static
    {
        $this->listVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($listVersionID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListVersionID(): static
    {
        $this->listVersionID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param  null|string $name
     * @return static
     */
    public function setName(?string $name = null): static
    {
        $this->name = InvoiceSuiteStringUtils::asNullWhenEmpty($name);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLanguageID(): ?string
    {
        return $this->languageID;
    }

    /**
     * @param  null|string $languageID
     * @return static
     */
    public function setLanguageID(?string $languageID = null): static
    {
        $this->languageID = InvoiceSuiteStringUtils::asNullWhenEmpty($languageID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguageID(): static
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListURI(): ?string
    {
        return $this->listURI;
    }

    /**
     * @param  null|string $listURI
     * @return static
     */
    public function setListURI(?string $listURI = null): static
    {
        $this->listURI = InvoiceSuiteStringUtils::asNullWhenEmpty($listURI);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListURI(): static
    {
        $this->listURI = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getListSchemeURI(): ?string
    {
        return $this->listSchemeURI;
    }

    /**
     * @param  null|string $listSchemeURI
     * @return static
     */
    public function setListSchemeURI(?string $listSchemeURI = null): static
    {
        $this->listSchemeURI = InvoiceSuiteStringUtils::asNullWhenEmpty($listSchemeURI);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetListSchemeURI(): static
    {
        $this->listSchemeURI = null;

        return $this;
    }
}
