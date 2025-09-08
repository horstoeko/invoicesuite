<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode;

class ConsumptionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityStatementTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUtilityStatementTypeCode", setter="setUtilityStatementTypeCode")
     */
    private $utilityStatementTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MainPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MainPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("MainPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMainPeriod", setter="setMainPeriod")
     */
    private $mainPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EnergyWaterSupply|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EnergyWaterSupply")
     * @JMS\Expose
     * @JMS\SerializedName("EnergyWaterSupply")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEnergyWaterSupply", setter="setEnergyWaterSupply")
     */
    private $energyWaterSupply;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TelecommunicationsSupply|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TelecommunicationsSupply")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupply")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsSupply", setter="setTelecommunicationsSupply")
     */
    private $telecommunicationsSupply;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LegalMonetaryTotal|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LegalMonetaryTotal")
     * @JMS\Expose
     * @JMS\SerializedName("LegalMonetaryTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalMonetaryTotal", setter="setLegalMonetaryTotal")
     */
    private $legalMonetaryTotal;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode|null
     */
    public function getUtilityStatementTypeCode(): ?UtilityStatementTypeCode
    {
        return $this->utilityStatementTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode
     */
    public function getUtilityStatementTypeCodeWithCreate(): UtilityStatementTypeCode
    {
        $this->utilityStatementTypeCode = is_null($this->utilityStatementTypeCode) ? new UtilityStatementTypeCode() : $this->utilityStatementTypeCode;

        return $this->utilityStatementTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UtilityStatementTypeCode|null $utilityStatementTypeCode
     * @return self
     */
    public function setUtilityStatementTypeCode(?UtilityStatementTypeCode $utilityStatementTypeCode = null): self
    {
        $this->utilityStatementTypeCode = $utilityStatementTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUtilityStatementTypeCode(): self
    {
        $this->utilityStatementTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MainPeriod|null
     */
    public function getMainPeriod(): ?MainPeriod
    {
        return $this->mainPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MainPeriod
     */
    public function getMainPeriodWithCreate(): MainPeriod
    {
        $this->mainPeriod = is_null($this->mainPeriod) ? new MainPeriod() : $this->mainPeriod;

        return $this->mainPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MainPeriod|null $mainPeriod
     * @return self
     */
    public function setMainPeriod(?MainPeriod $mainPeriod = null): self
    {
        $this->mainPeriod = $mainPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMainPeriod(): self
    {
        $this->mainPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceCharge(): self
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceCharge(): self
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ($this->allowanceCharge === []) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null $taxTotal
     * @return self
     */
    public function setTaxTotal(?array $taxTotal = null): self
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxTotal(): self
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxTotal(): self
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addToTaxTotal(TaxTotal $taxTotal): self
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): self
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ($this->taxTotal === []) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnergyWaterSupply|null
     */
    public function getEnergyWaterSupply(): ?EnergyWaterSupply
    {
        return $this->energyWaterSupply;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnergyWaterSupply
     */
    public function getEnergyWaterSupplyWithCreate(): EnergyWaterSupply
    {
        $this->energyWaterSupply = is_null($this->energyWaterSupply) ? new EnergyWaterSupply() : $this->energyWaterSupply;

        return $this->energyWaterSupply;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EnergyWaterSupply|null $energyWaterSupply
     * @return self
     */
    public function setEnergyWaterSupply(?EnergyWaterSupply $energyWaterSupply = null): self
    {
        $this->energyWaterSupply = $energyWaterSupply;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEnergyWaterSupply(): self
    {
        $this->energyWaterSupply = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TelecommunicationsSupply|null
     */
    public function getTelecommunicationsSupply(): ?TelecommunicationsSupply
    {
        return $this->telecommunicationsSupply;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TelecommunicationsSupply
     */
    public function getTelecommunicationsSupplyWithCreate(): TelecommunicationsSupply
    {
        $this->telecommunicationsSupply = is_null($this->telecommunicationsSupply) ? new TelecommunicationsSupply() : $this->telecommunicationsSupply;

        return $this->telecommunicationsSupply;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TelecommunicationsSupply|null $telecommunicationsSupply
     * @return self
     */
    public function setTelecommunicationsSupply(?TelecommunicationsSupply $telecommunicationsSupply = null): self
    {
        $this->telecommunicationsSupply = $telecommunicationsSupply;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelecommunicationsSupply(): self
    {
        $this->telecommunicationsSupply = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LegalMonetaryTotal|null
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal = is_null($this->legalMonetaryTotal) ? new LegalMonetaryTotal() : $this->legalMonetaryTotal;

        return $this->legalMonetaryTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LegalMonetaryTotal|null $legalMonetaryTotal
     * @return self
     */
    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal = null): self
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLegalMonetaryTotal(): self
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }
}
