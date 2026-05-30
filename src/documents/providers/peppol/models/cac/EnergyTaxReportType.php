<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyBalanceAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyOnAccountAmount;
use JMS\Serializer\Annotation as JMS;

class EnergyTaxReportType
{
    use HandlesObjectFlags;

    /**
     * @var null|TaxEnergyAmount
     */
    #[JMS\Accessor(getter: 'getTaxEnergyAmount', setter: 'setTaxEnergyAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxEnergyAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxEnergyAmount;

    /**
     * @var null|TaxEnergyOnAccountAmount
     */
    #[JMS\Accessor(getter: 'getTaxEnergyOnAccountAmount', setter: 'setTaxEnergyOnAccountAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxEnergyOnAccountAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyOnAccountAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxEnergyOnAccountAmount;

    /**
     * @var null|TaxEnergyBalanceAmount
     */
    #[JMS\Accessor(getter: 'getTaxEnergyBalanceAmount', setter: 'setTaxEnergyBalanceAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxEnergyBalanceAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxEnergyBalanceAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxEnergyBalanceAmount;

    /**
     * @var null|TaxScheme
     */
    #[JMS\Accessor(getter: 'getTaxScheme', setter: 'setTaxScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxScheme')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxScheme')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->taxEnergyAmount ??= new TaxEnergyAmount();

        return $this->taxEnergyAmount;
    }

    /**
     * @param  null|TaxEnergyAmount $taxEnergyAmount
     * @return static
     */
    public function setTaxEnergyAmount(
        ?TaxEnergyAmount $taxEnergyAmount = null
    ): static {
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
        $this->taxEnergyOnAccountAmount ??= new TaxEnergyOnAccountAmount();

        return $this->taxEnergyOnAccountAmount;
    }

    /**
     * @param  null|TaxEnergyOnAccountAmount $taxEnergyOnAccountAmount
     * @return static
     */
    public function setTaxEnergyOnAccountAmount(
        ?TaxEnergyOnAccountAmount $taxEnergyOnAccountAmount = null
    ): static {
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
        $this->taxEnergyBalanceAmount ??= new TaxEnergyBalanceAmount();

        return $this->taxEnergyBalanceAmount;
    }

    /**
     * @param  null|TaxEnergyBalanceAmount $taxEnergyBalanceAmount
     * @return static
     */
    public function setTaxEnergyBalanceAmount(
        ?TaxEnergyBalanceAmount $taxEnergyBalanceAmount = null
    ): static {
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
        $this->taxScheme ??= new TaxScheme();

        return $this->taxScheme;
    }

    /**
     * @param  null|TaxScheme $taxScheme
     * @return static
     */
    public function setTaxScheme(
        ?TaxScheme $taxScheme = null
    ): static {
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
