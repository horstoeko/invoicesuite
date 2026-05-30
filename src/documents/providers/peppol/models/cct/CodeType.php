<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class CodeType
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListID', setter: 'setListID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListAgencyID', setter: 'setListAgencyID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listAgencyID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listAgencyID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListAgencyName', setter: 'setListAgencyName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listAgencyName')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listAgencyName;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListName', setter: 'setListName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listName')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listName;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListVersionID', setter: 'setListVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listVersionID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listVersionID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('name')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $name;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getLanguageID', setter: 'setLanguageID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('languageID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $languageID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListURI', setter: 'setListURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listURI')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listURI;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListSchemeURI', setter: 'setListSchemeURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('listSchemeURI')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
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
    public function getListID(): ?string
    {
        return $this->listID;
    }

    /**
     * @param  null|string $listID
     * @return static
     */
    public function setListID(
        ?string $listID = null
    ): static {
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
    public function setListAgencyID(
        ?string $listAgencyID = null
    ): static {
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
    public function setListAgencyName(
        ?string $listAgencyName = null
    ): static {
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
    public function setListName(
        ?string $listName = null
    ): static {
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
    public function setListVersionID(
        ?string $listVersionID = null
    ): static {
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
    public function setName(
        ?string $name = null
    ): static {
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
    public function setLanguageID(
        ?string $languageID = null
    ): static {
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
    public function setListURI(
        ?string $listURI = null
    ): static {
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
    public function setListSchemeURI(
        ?string $listSchemeURI = null
    ): static {
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
