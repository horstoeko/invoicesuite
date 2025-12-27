<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RoundingAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TaxAmount;
use JMS\Serializer\Annotation as JMS;

class TaxTotalType
{
    use HandlesObjectFlags;

    /**
     * @var null|TaxAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxAmount", setter="setTaxAmount")
     */
    private $taxAmount;

    /**
     * @var null|RoundingAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\RoundingAmount")
     * @JMS\Expose
     * @JMS\SerializedName("RoundingAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoundingAmount", setter="setRoundingAmount")
     */
    private $roundingAmount;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxEvidenceIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxEvidenceIndicator", setter="setTaxEvidenceIndicator")
     */
    private $taxEvidenceIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxIncludedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxIncludedIndicator", setter="setTaxIncludedIndicator")
     */
    private $taxIncludedIndicator;

    /**
     * @var null|array<TaxSubtotal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TaxSubtotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxSubtotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxSubtotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxSubtotal", setter="setTaxSubtotal")
     */
    private $taxSubtotal;

    /**
     * @return null|TaxAmount
     */
    public function getTaxAmount(): ?TaxAmount
    {
        return $this->taxAmount;
    }

    /**
     * @return TaxAmount
     */
    public function getTaxAmountWithCreate(): TaxAmount
    {
        $this->taxAmount = is_null($this->taxAmount) ? new TaxAmount() : $this->taxAmount;

        return $this->taxAmount;
    }

    /**
     * @param  null|TaxAmount $taxAmount
     * @return static
     */
    public function setTaxAmount(?TaxAmount $taxAmount = null): static
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxAmount(): static
    {
        $this->taxAmount = null;

        return $this;
    }

    /**
     * @return null|RoundingAmount
     */
    public function getRoundingAmount(): ?RoundingAmount
    {
        return $this->roundingAmount;
    }

    /**
     * @return RoundingAmount
     */
    public function getRoundingAmountWithCreate(): RoundingAmount
    {
        $this->roundingAmount = is_null($this->roundingAmount) ? new RoundingAmount() : $this->roundingAmount;

        return $this->roundingAmount;
    }

    /**
     * @param  null|RoundingAmount $roundingAmount
     * @return static
     */
    public function setRoundingAmount(?RoundingAmount $roundingAmount = null): static
    {
        $this->roundingAmount = $roundingAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoundingAmount(): static
    {
        $this->roundingAmount = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getTaxEvidenceIndicator(): ?bool
    {
        return $this->taxEvidenceIndicator;
    }

    /**
     * @param  null|bool $taxEvidenceIndicator
     * @return static
     */
    public function setTaxEvidenceIndicator(?bool $taxEvidenceIndicator = null): static
    {
        $this->taxEvidenceIndicator = $taxEvidenceIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxEvidenceIndicator(): static
    {
        $this->taxEvidenceIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getTaxIncludedIndicator(): ?bool
    {
        return $this->taxIncludedIndicator;
    }

    /**
     * @param  null|bool $taxIncludedIndicator
     * @return static
     */
    public function setTaxIncludedIndicator(?bool $taxIncludedIndicator = null): static
    {
        $this->taxIncludedIndicator = $taxIncludedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxIncludedIndicator(): static
    {
        $this->taxIncludedIndicator = null;

        return $this;
    }

    /**
     * @return null|array<TaxSubtotal>
     */
    public function getTaxSubtotal(): ?array
    {
        return $this->taxSubtotal;
    }

    /**
     * @param  null|array<TaxSubtotal> $taxSubtotal
     * @return static
     */
    public function setTaxSubtotal(?array $taxSubtotal = null): static
    {
        $this->taxSubtotal = $taxSubtotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxSubtotal(): static
    {
        $this->taxSubtotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxSubtotal(): static
    {
        $this->taxSubtotal = [];

        return $this;
    }

    /**
     * @return null|TaxSubtotal
     */
    public function firstTaxSubtotal(): ?TaxSubtotal
    {
        $taxSubtotal = $this->taxSubtotal ?? [];
        $taxSubtotal = reset($taxSubtotal);

        if (false === $taxSubtotal) {
            return null;
        }

        return $taxSubtotal;
    }

    /**
     * @return null|TaxSubtotal
     */
    public function lastTaxSubtotal(): ?TaxSubtotal
    {
        $taxSubtotal = $this->taxSubtotal ?? [];
        $taxSubtotal = end($taxSubtotal);

        if (false === $taxSubtotal) {
            return null;
        }

        return $taxSubtotal;
    }

    /**
     * @param  TaxSubtotal $taxSubtotal
     * @return static
     */
    public function addToTaxSubtotal(TaxSubtotal $taxSubtotal): static
    {
        $this->taxSubtotal[] = $taxSubtotal;

        return $this;
    }

    /**
     * @return TaxSubtotal
     */
    public function addToTaxSubtotalWithCreate(): TaxSubtotal
    {
        $this->addTotaxSubtotal($taxSubtotal = new TaxSubtotal());

        return $taxSubtotal;
    }

    /**
     * @param  TaxSubtotal $taxSubtotal
     * @return static
     */
    public function addOnceToTaxSubtotal(TaxSubtotal $taxSubtotal): static
    {
        if (!is_array($this->taxSubtotal)) {
            $this->taxSubtotal = [];
        }

        $this->taxSubtotal[0] = $taxSubtotal;

        return $this;
    }

    /**
     * @return TaxSubtotal
     */
    public function addOnceToTaxSubtotalWithCreate(): TaxSubtotal
    {
        if (!is_array($this->taxSubtotal)) {
            $this->taxSubtotal = [];
        }

        if ([] === $this->taxSubtotal) {
            $this->addOnceTotaxSubtotal(new TaxSubtotal());
        }

        return $this->taxSubtotal[0];
    }
}
