<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount;

class TaxTotalType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxAmount", setter="setTaxAmount")
     */
    private $taxAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount")
     * @JMS\Expose
     * @JMS\SerializedName("RoundingAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoundingAmount", setter="setRoundingAmount")
     */
    private $roundingAmount;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxEvidenceIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxEvidenceIndicator", setter="setTaxEvidenceIndicator")
     */
    private $taxEvidenceIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxIncludedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxIncludedIndicator", setter="setTaxIncludedIndicator")
     */
    private $taxIncludedIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxSubtotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxSubtotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxSubtotal", setter="setTaxSubtotal")
     */
    private $taxSubtotal;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount|null
     */
    public function getTaxAmount(): ?TaxAmount
    {
        return $this->taxAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount
     */
    public function getTaxAmountWithCreate(): TaxAmount
    {
        $this->taxAmount = is_null($this->taxAmount) ? new TaxAmount() : $this->taxAmount;

        return $this->taxAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxAmount|null $taxAmount
     * @return self
     */
    public function setTaxAmount(?TaxAmount $taxAmount = null): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxAmount(): self
    {
        $this->taxAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount|null
     */
    public function getRoundingAmount(): ?RoundingAmount
    {
        return $this->roundingAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount
     */
    public function getRoundingAmountWithCreate(): RoundingAmount
    {
        $this->roundingAmount = is_null($this->roundingAmount) ? new RoundingAmount() : $this->roundingAmount;

        return $this->roundingAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RoundingAmount|null $roundingAmount
     * @return self
     */
    public function setRoundingAmount(?RoundingAmount $roundingAmount = null): self
    {
        $this->roundingAmount = $roundingAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRoundingAmount(): self
    {
        $this->roundingAmount = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTaxEvidenceIndicator(): ?bool
    {
        return $this->taxEvidenceIndicator;
    }

    /**
     * @param bool|null $taxEvidenceIndicator
     * @return self
     */
    public function setTaxEvidenceIndicator(?bool $taxEvidenceIndicator = null): self
    {
        $this->taxEvidenceIndicator = $taxEvidenceIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxEvidenceIndicator(): self
    {
        $this->taxEvidenceIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTaxIncludedIndicator(): ?bool
    {
        return $this->taxIncludedIndicator;
    }

    /**
     * @param bool|null $taxIncludedIndicator
     * @return self
     */
    public function setTaxIncludedIndicator(?bool $taxIncludedIndicator = null): self
    {
        $this->taxIncludedIndicator = $taxIncludedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxIncludedIndicator(): self
    {
        $this->taxIncludedIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal>|null
     */
    public function getTaxSubtotal(): ?array
    {
        return $this->taxSubtotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal>|null $taxSubtotal
     * @return self
     */
    public function setTaxSubtotal(?array $taxSubtotal = null): self
    {
        $this->taxSubtotal = $taxSubtotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxSubtotal(): self
    {
        $this->taxSubtotal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxSubtotal(): self
    {
        $this->taxSubtotal = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal|null
     */
    public function firstTaxSubtotal(): ?TaxSubtotal
    {
        $taxSubtotal = $this->taxSubtotal ?? [];
        $taxSubtotal = reset($taxSubtotal);

        if ($taxSubtotal === false) {
            return null;
        }

        return $taxSubtotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal|null
     */
    public function lastTaxSubtotal(): ?TaxSubtotal
    {
        $taxSubtotal = $this->taxSubtotal ?? [];
        $taxSubtotal = end($taxSubtotal);

        if ($taxSubtotal === false) {
            return null;
        }

        return $taxSubtotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal $taxSubtotal
     * @return self
     */
    public function addToTaxSubtotal(TaxSubtotal $taxSubtotal): self
    {
        $this->taxSubtotal[] = $taxSubtotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal
     */
    public function addToTaxSubtotalWithCreate(): TaxSubtotal
    {
        $this->addTotaxSubtotal($taxSubtotal = new TaxSubtotal());

        return $taxSubtotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal $taxSubtotal
     * @return self
     */
    public function addOnceToTaxSubtotal(TaxSubtotal $taxSubtotal): self
    {
        if (!is_array($this->taxSubtotal)) {
            $this->taxSubtotal = [];
        }

        $this->taxSubtotal[0] = $taxSubtotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxSubtotal
     */
    public function addOnceToTaxSubtotalWithCreate(): TaxSubtotal
    {
        if (!is_array($this->taxSubtotal)) {
            $this->taxSubtotal = [];
        }

        if ($this->taxSubtotal === []) {
            $this->addOnceTotaxSubtotal(new TaxSubtotal());
        }

        return $this->taxSubtotal[0];
    }
}
