<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

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
    #[JMS\Groups(['zffx'])]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListID', setter: 'setListID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('listID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getListVersionID', setter: 'setListVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('listVersionID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $listVersionID;

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
}
