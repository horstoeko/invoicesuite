<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use JMS\Serializer\Annotation as JMS;

class PriceExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|array<TaxTotal>
     */
    #[JMS\Accessor(getter: 'getTaxTotal', setter: 'setTaxTotal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxTotal')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxTotal>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TaxTotal', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $taxTotal;

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(
        ?array $taxTotal = null
    ): static {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addToTaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceToTaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }
}
