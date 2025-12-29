<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyBalanceAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyOnAccountAmount;
use JMS\Serializer\Annotation as JMS;

class EnergyTaxReportType
{
    use HandlesObjectFlags;

    /**
     * @var null|TaxEnergyAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxEnergyAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxEnergyAmount", setter="setTaxEnergyAmount")
     */
    private $taxEnergyAmount;

    /**
     * @var null|TaxEnergyOnAccountAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyOnAccountAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxEnergyOnAccountAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxEnergyOnAccountAmount", setter="setTaxEnergyOnAccountAmount")
     */
    private $taxEnergyOnAccountAmount;

    /**
     * @var null|TaxEnergyBalanceAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxEnergyBalanceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxEnergyBalanceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxEnergyBalanceAmount", setter="setTaxEnergyBalanceAmount")
     */
    private $taxEnergyBalanceAmount;

    /**
     * @var null|TaxScheme
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxScheme")
     * @JMS\Expose
     * @JMS\SerializedName("TaxScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxScheme", setter="setTaxScheme")
     */
    private $taxScheme;

    /**
     * @return null|TaxEnergyAmount
     */
    public function getTaxEnergyAmount(): ?TaxEnergyAmount
    {
        return $this->taxEnergyAmount;
    }

    /**
     * @return TaxEnergyAmount
     */
    public function getTaxEnergyAmountWithCreate(): TaxEnergyAmount
    {
        $this->taxEnergyAmount = is_null($this->taxEnergyAmount) ? new TaxEnergyAmount() : $this->taxEnergyAmount;

        return $this->taxEnergyAmount;
    }

    /**
     * @param  null|TaxEnergyAmount $taxEnergyAmount
     * @return static
     */
    public function setTaxEnergyAmount(?TaxEnergyAmount $taxEnergyAmount = null): static
    {
        $this->taxEnergyAmount = $taxEnergyAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxEnergyAmount(): static
    {
        $this->taxEnergyAmount = null;

        return $this;
    }

    /**
     * @return null|TaxEnergyOnAccountAmount
     */
    public function getTaxEnergyOnAccountAmount(): ?TaxEnergyOnAccountAmount
    {
        return $this->taxEnergyOnAccountAmount;
    }

    /**
     * @return TaxEnergyOnAccountAmount
     */
    public function getTaxEnergyOnAccountAmountWithCreate(): TaxEnergyOnAccountAmount
    {
        $this->taxEnergyOnAccountAmount = is_null($this->taxEnergyOnAccountAmount) ? new TaxEnergyOnAccountAmount() : $this->taxEnergyOnAccountAmount;

        return $this->taxEnergyOnAccountAmount;
    }

    /**
     * @param  null|TaxEnergyOnAccountAmount $taxEnergyOnAccountAmount
     * @return static
     */
    public function setTaxEnergyOnAccountAmount(?TaxEnergyOnAccountAmount $taxEnergyOnAccountAmount = null): static
    {
        $this->taxEnergyOnAccountAmount = $taxEnergyOnAccountAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxEnergyOnAccountAmount(): static
    {
        $this->taxEnergyOnAccountAmount = null;

        return $this;
    }

    /**
     * @return null|TaxEnergyBalanceAmount
     */
    public function getTaxEnergyBalanceAmount(): ?TaxEnergyBalanceAmount
    {
        return $this->taxEnergyBalanceAmount;
    }

    /**
     * @return TaxEnergyBalanceAmount
     */
    public function getTaxEnergyBalanceAmountWithCreate(): TaxEnergyBalanceAmount
    {
        $this->taxEnergyBalanceAmount = is_null($this->taxEnergyBalanceAmount) ? new TaxEnergyBalanceAmount() : $this->taxEnergyBalanceAmount;

        return $this->taxEnergyBalanceAmount;
    }

    /**
     * @param  null|TaxEnergyBalanceAmount $taxEnergyBalanceAmount
     * @return static
     */
    public function setTaxEnergyBalanceAmount(?TaxEnergyBalanceAmount $taxEnergyBalanceAmount = null): static
    {
        $this->taxEnergyBalanceAmount = $taxEnergyBalanceAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxEnergyBalanceAmount(): static
    {
        $this->taxEnergyBalanceAmount = null;

        return $this;
    }

    /**
     * @return null|TaxScheme
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @return TaxScheme
     */
    public function getTaxSchemeWithCreate(): TaxScheme
    {
        $this->taxScheme = is_null($this->taxScheme) ? new TaxScheme() : $this->taxScheme;

        return $this->taxScheme;
    }

    /**
     * @param  null|TaxScheme $taxScheme
     * @return static
     */
    public function setTaxScheme(?TaxScheme $taxScheme = null): static
    {
        $this->taxScheme = $taxScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxScheme(): static
    {
        $this->taxScheme = null;

        return $this;
    }
}
