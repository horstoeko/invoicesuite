<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class AmountType
{
    use HandlesObjectFlags;

    /**
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\Type('float')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlValue(cdata: false)]
    private $value;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getCurrencyID', setter: 'setCurrencyID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('currencyID')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $currencyID;

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
    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }

    /**
     * @param  null|string $currencyID
     * @return static
     */
    public function setCurrencyID(
        ?string $currencyID = null
    ): static {
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
}
