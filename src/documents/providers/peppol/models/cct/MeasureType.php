<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class MeasureType
{
    use HandlesObjectFlags;

    /**
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\Type('float')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnitCode', setter: 'setUnitCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCode;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnitCodeListVersionID', setter: 'setUnitCodeListVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCodeListVersionID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCodeListVersionID;

    /**
     * @return null|float
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param  null|float $value
     * @return static
     */
    public function setValue(
        ?float $value = null
    ): static {
        $this->value = $value;

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
    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    /**
     * @param  null|string $unitCode
     * @return static
     */
    public function setUnitCode(
        ?string $unitCode = null
    ): static {
        $this->unitCode = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCode(): static
    {
        $this->unitCode = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnitCodeListVersionID(): ?string
    {
        return $this->unitCodeListVersionID;
    }

    /**
     * @param  null|string $unitCodeListVersionID
     * @return static
     */
    public function setUnitCodeListVersionID(
        ?string $unitCodeListVersionID = null
    ): static {
        $this->unitCodeListVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCodeListVersionID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCodeListVersionID(): static
    {
        $this->unitCodeListVersionID = null;

        return $this;
    }
}
