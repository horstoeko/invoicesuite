<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cct;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class AmountType
{
    use HandlesObjectFlags;

    /**
     * @var float|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("float")
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
     * @JMS\SerializedName("currencyID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCurrencyID", setter="setCurrencyID")
     */
    private $currencyID;

    /**
     * @var string|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\SerializedName("currencyCodeListVersionID")
     * @JMS\XmlAttribute
     * @JMS\Accessor(getter="getCurrencyCodeListVersionID", setter="setCurrencyCodeListVersionID")
     */
    private $currencyCodeListVersionID;

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return self
     */
    public function setValue(?float $value = null): self
    {
        $this->value = $value;

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
    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }

    /**
     * @param string|null $currencyID
     * @return self
     */
    public function setCurrencyID(?string $currencyID = null): self
    {
        $this->currencyID = InvoiceSuiteStringUtils::asNullWhenEmpty($currencyID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCurrencyID(): self
    {
        $this->currencyID = null;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrencyCodeListVersionID(): ?string
    {
        return $this->currencyCodeListVersionID;
    }

    /**
     * @param string|null $currencyCodeListVersionID
     * @return self
     */
    public function setCurrencyCodeListVersionID(?string $currencyCodeListVersionID = null): self
    {
        $this->currencyCodeListVersionID = InvoiceSuiteStringUtils::asNullWhenEmpty($currencyCodeListVersionID);

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCurrencyCodeListVersionID(): self
    {
        $this->currencyCodeListVersionID = null;

        return $this;
    }
}
