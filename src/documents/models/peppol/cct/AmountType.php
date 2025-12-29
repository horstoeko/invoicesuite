<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cct;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class AmountType
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
     * @JMS\SerializedName("currencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCurrencyID", setter="setCurrencyID")
     */
    private $currencyID;

    /**
     * @var null|string
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("currencyCodeListVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCurrencyCodeListVersionID", setter="setCurrencyCodeListVersionID")
     */
    private $currencyCodeListVersionID;

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
    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }

    /**
     * @param  null|string $currencyID
     * @return static
     */
    public function setCurrencyID(?string $currencyID = null): static
    {
        $this->currencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($currencyID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrencyID(): static
    {
        $this->currencyID = null;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCurrencyCodeListVersionID(): ?string
    {
        return $this->currencyCodeListVersionID;
    }

    /**
     * @param  null|string $currencyCodeListVersionID
     * @return static
     */
    public function setCurrencyCodeListVersionID(?string $currencyCodeListVersionID = null): static
    {
        $this->currencyCodeListVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($currencyCodeListVersionID);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrencyCodeListVersionID(): static
    {
        $this->currencyCodeListVersionID = null;

        return $this;
    }
}
