<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cct\AmountType as AmountTypeBase;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class AmountType extends AmountTypeBase
{
    use HandlesObjectFlags;

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
}
