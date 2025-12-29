<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class QuantityType
{
    use HandlesObjectFlags;

    /**
     * @var null|float
     * @JMS\Groups({"ubl"})
     * @JMS\Type("float")
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
     * @JMS\SerializedName("unitCode")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCode", setter="setUnitCode")
     */
    private $unitCode;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListID", setter="setUnitCodeListID")
     */
    private $unitCodeListID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListAgencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListAgencyID", setter="setUnitCodeListAgencyID")
     */
    private $unitCodeListAgencyID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("unitCodeListAgencyName")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getUnitCodeListAgencyName", setter="setUnitCodeListAgencyName")
     */
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
    public function setValue(?float $value = null): static
    {
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
    public function setUnitCode(?string $unitCode = null): static
    {
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
    public function setUnitCodeListID(?string $unitCodeListID = null): static
    {
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
    public function setUnitCodeListAgencyID(?string $unitCodeListAgencyID = null): static
    {
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
    public function setUnitCodeListAgencyName(?string $unitCodeListAgencyName = null): static
    {
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
