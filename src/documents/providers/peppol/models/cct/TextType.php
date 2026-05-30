<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class TextType
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
    #[JMS\Accessor(getter: 'getLanguageLocaleID', setter: 'setLanguageLocaleID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('languageLocaleID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $languageLocaleID;

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
    public function getLanguageLocaleID(): ?string
    {
        return $this->languageLocaleID;
    }

    /**
     * @param  null|string $languageLocaleID
     * @return static
     */
    public function setLanguageLocaleID(
        ?string $languageLocaleID = null
    ): static {
        $this->languageLocaleID = InvoiceSuiteStringUtils::asNullWhenEmpty($languageLocaleID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguageLocaleID(): static
    {
        $this->languageLocaleID = null;

        return $this;
    }
}
