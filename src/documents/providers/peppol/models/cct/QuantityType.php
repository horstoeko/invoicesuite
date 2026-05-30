<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class QuantityType
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
    #[JMS\Accessor(getter: 'getUnitCodeListID', setter: 'setUnitCodeListID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCodeListID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCodeListID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnitCodeListAgencyID', setter: 'setUnitCodeListAgencyID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCodeListAgencyID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCodeListAgencyID;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnitCodeListAgencyName', setter: 'setUnitCodeListAgencyName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCodeListAgencyName')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCodeListAgencyName;

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
    public function getUnitCodeListID(): ?string
    {
        return $this->unitCodeListID;
    }

    /**
     * @param  null|string $unitCodeListID
     * @return static
     */
    public function setUnitCodeListID(
        ?string $unitCodeListID = null
    ): static {
        $this->unitCodeListID = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCodeListID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCodeListID(): static
    {
        $this->unitCodeListID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnitCodeListAgencyID(): ?string
    {
        return $this->unitCodeListAgencyID;
    }

    /**
     * @param  null|string $unitCodeListAgencyID
     * @return static
     */
    public function setUnitCodeListAgencyID(
        ?string $unitCodeListAgencyID = null
    ): static {
        $this->unitCodeListAgencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCodeListAgencyID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCodeListAgencyID(): static
    {
        $this->unitCodeListAgencyID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnitCodeListAgencyName(): ?string
    {
        return $this->unitCodeListAgencyName;
    }

    /**
     * @param  null|string $unitCodeListAgencyName
     * @return static
     */
    public function setUnitCodeListAgencyName(
        ?string $unitCodeListAgencyName = null
    ): static {
        $this->unitCodeListAgencyName = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCodeListAgencyName);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCodeListAgencyName(): static
    {
        $this->unitCodeListAgencyName = null;

        return $this;
    }
}
