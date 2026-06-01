<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UtilityStatementTypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ConsumptionType
{
    use HandlesObjectFlags;

    /**
     * @var null|UtilityStatementTypeCode
     */
    #[JMS\Accessor(getter: 'getUtilityStatementTypeCode', setter: 'setUtilityStatementTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UtilityStatementTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UtilityStatementTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $utilityStatementTypeCode;

    /**
     * @var null|MainPeriod
     */
    #[JMS\Accessor(getter: 'getMainPeriod', setter: 'setMainPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MainPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MainPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $mainPeriod;

    /**
     * @var null|array<AllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getAllowanceCharge', setter: 'setAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $allowanceCharge;

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
     * @var null|EnergyWaterSupply
     */
    #[JMS\Accessor(getter: 'getEnergyWaterSupply', setter: 'setEnergyWaterSupply')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EnergyWaterSupply')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EnergyWaterSupply')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $energyWaterSupply;

    /**
     * @var null|TelecommunicationsSupply
     */
    #[JMS\Accessor(getter: 'getTelecommunicationsSupply', setter: 'setTelecommunicationsSupply')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TelecommunicationsSupply')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TelecommunicationsSupply')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $telecommunicationsSupply;

    /**
     * @var null|LegalMonetaryTotal
     */
    #[JMS\Accessor(getter: 'getLegalMonetaryTotal', setter: 'setLegalMonetaryTotal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LegalMonetaryTotal')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LegalMonetaryTotal')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $legalMonetaryTotal;

    /**
     * @return null|UtilityStatementTypeCode
     */
    public function getUtilityStatementTypeCode(): ?UtilityStatementTypeCode
    {
        return $this->utilityStatementTypeCode;
    }

    /**
     * @return UtilityStatementTypeCode
     */
    public function getUtilityStatementTypeCodeWithCreate(): UtilityStatementTypeCode
    {
        $this->utilityStatementTypeCode ??= new UtilityStatementTypeCode();

        return $this->utilityStatementTypeCode;
    }

    /**
     * @param  null|UtilityStatementTypeCode $utilityStatementTypeCode
     * @return static
     */
    public function setUtilityStatementTypeCode(
        ?UtilityStatementTypeCode $utilityStatementTypeCode = null
    ): static {
        $this->utilityStatementTypeCode = $utilityStatementTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilityStatementTypeCode(): static
    {
        $this->utilityStatementTypeCode = null;

        return $this;
    }

    /**
     * @return null|MainPeriod
     */
    public function getMainPeriod(): ?MainPeriod
    {
        return $this->mainPeriod;
    }

    /**
     * @return MainPeriod
     */
    public function getMainPeriodWithCreate(): MainPeriod
    {
        $this->mainPeriod ??= new MainPeriod();

        return $this->mainPeriod;
    }

    /**
     * @param  null|MainPeriod $mainPeriod
     * @return static
     */
    public function setMainPeriod(
        ?MainPeriod $mainPeriod = null
    ): static {
        $this->mainPeriod = $mainPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMainPeriod(): static
    {
        $this->mainPeriod = null;

        return $this;
    }

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(
        ?array $allowanceCharge = null
    ): static {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToAllowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToAllowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
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
        if (!InvoiceSuiteArrayUtils::is($this->taxTotal)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceToTaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|EnergyWaterSupply
     */
    public function getEnergyWaterSupply(): ?EnergyWaterSupply
    {
        return $this->energyWaterSupply;
    }

    /**
     * @return EnergyWaterSupply
     */
    public function getEnergyWaterSupplyWithCreate(): EnergyWaterSupply
    {
        $this->energyWaterSupply ??= new EnergyWaterSupply();

        return $this->energyWaterSupply;
    }

    /**
     * @param  null|EnergyWaterSupply $energyWaterSupply
     * @return static
     */
    public function setEnergyWaterSupply(
        ?EnergyWaterSupply $energyWaterSupply = null
    ): static {
        $this->energyWaterSupply = $energyWaterSupply;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnergyWaterSupply(): static
    {
        $this->energyWaterSupply = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsSupply
     */
    public function getTelecommunicationsSupply(): ?TelecommunicationsSupply
    {
        return $this->telecommunicationsSupply;
    }

    /**
     * @return TelecommunicationsSupply
     */
    public function getTelecommunicationsSupplyWithCreate(): TelecommunicationsSupply
    {
        $this->telecommunicationsSupply ??= new TelecommunicationsSupply();

        return $this->telecommunicationsSupply;
    }

    /**
     * @param  null|TelecommunicationsSupply $telecommunicationsSupply
     * @return static
     */
    public function setTelecommunicationsSupply(
        ?TelecommunicationsSupply $telecommunicationsSupply = null
    ): static {
        $this->telecommunicationsSupply = $telecommunicationsSupply;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsSupply(): static
    {
        $this->telecommunicationsSupply = null;

        return $this;
    }

    /**
     * @return null|LegalMonetaryTotal
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal ??= new LegalMonetaryTotal();

        return $this->legalMonetaryTotal;
    }

    /**
     * @param  null|LegalMonetaryTotal $legalMonetaryTotal
     * @return static
     */
    public function setLegalMonetaryTotal(
        ?LegalMonetaryTotal $legalMonetaryTotal = null
    ): static {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLegalMonetaryTotal(): static
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }
}
