<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class EnergyWaterSupplyType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionReport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionReport", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionReport", setter="setConsumptionReport")
     */
    private $consumptionReport;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport>")
     * @JMS\Expose
     * @JMS\SerializedName("EnergyTaxReport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnergyTaxReport", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnergyTaxReport", setter="setEnergyTaxReport")
     */
    private $energyTaxReport;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionAverage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionAverage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionAverage", setter="setConsumptionAverage")
     */
    private $consumptionAverage;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection>")
     * @JMS\Expose
     * @JMS\SerializedName("EnergyWaterConsumptionCorrection")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnergyWaterConsumptionCorrection", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnergyWaterConsumptionCorrection", setter="setEnergyWaterConsumptionCorrection")
     */
    private $energyWaterConsumptionCorrection;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport>|null
     */
    public function getConsumptionReport(): ?array
    {
        return $this->consumptionReport;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport>|null $consumptionReport
     * @return self
     */
    public function setConsumptionReport(?array $consumptionReport = null): self
    {
        $this->consumptionReport = $consumptionReport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsumptionReport(): self
    {
        $this->consumptionReport = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearConsumptionReport(): self
    {
        $this->consumptionReport = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport|null
     */
    public function firstConsumptionReport(): ?ConsumptionReport
    {
        $consumptionReport = $this->consumptionReport ?? [];
        $consumptionReport = reset($consumptionReport);

        if ($consumptionReport === false) {
            return null;
        }

        return $consumptionReport;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport|null
     */
    public function lastConsumptionReport(): ?ConsumptionReport
    {
        $consumptionReport = $this->consumptionReport ?? [];
        $consumptionReport = end($consumptionReport);

        if ($consumptionReport === false) {
            return null;
        }

        return $consumptionReport;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport $consumptionReport
     * @return self
     */
    public function addToConsumptionReport(ConsumptionReport $consumptionReport): self
    {
        $this->consumptionReport[] = $consumptionReport;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport
     */
    public function addToConsumptionReportWithCreate(): ConsumptionReport
    {
        $this->addToconsumptionReport($consumptionReport = new ConsumptionReport());

        return $consumptionReport;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport $consumptionReport
     * @return self
     */
    public function addOnceToConsumptionReport(ConsumptionReport $consumptionReport): self
    {
        if (!is_array($this->consumptionReport)) {
            $this->consumptionReport = [];
        }

        $this->consumptionReport[0] = $consumptionReport;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionReport
     */
    public function addOnceToConsumptionReportWithCreate(): ConsumptionReport
    {
        if (!is_array($this->consumptionReport)) {
            $this->consumptionReport = [];
        }

        if ($this->consumptionReport === []) {
            $this->addOnceToconsumptionReport(new ConsumptionReport());
        }

        return $this->consumptionReport[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport>|null
     */
    public function getEnergyTaxReport(): ?array
    {
        return $this->energyTaxReport;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport>|null $energyTaxReport
     * @return self
     */
    public function setEnergyTaxReport(?array $energyTaxReport = null): self
    {
        $this->energyTaxReport = $energyTaxReport;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEnergyTaxReport(): self
    {
        $this->energyTaxReport = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEnergyTaxReport(): self
    {
        $this->energyTaxReport = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport|null
     */
    public function firstEnergyTaxReport(): ?EnergyTaxReport
    {
        $energyTaxReport = $this->energyTaxReport ?? [];
        $energyTaxReport = reset($energyTaxReport);

        if ($energyTaxReport === false) {
            return null;
        }

        return $energyTaxReport;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport|null
     */
    public function lastEnergyTaxReport(): ?EnergyTaxReport
    {
        $energyTaxReport = $this->energyTaxReport ?? [];
        $energyTaxReport = end($energyTaxReport);

        if ($energyTaxReport === false) {
            return null;
        }

        return $energyTaxReport;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport $energyTaxReport
     * @return self
     */
    public function addToEnergyTaxReport(EnergyTaxReport $energyTaxReport): self
    {
        $this->energyTaxReport[] = $energyTaxReport;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport
     */
    public function addToEnergyTaxReportWithCreate(): EnergyTaxReport
    {
        $this->addToenergyTaxReport($energyTaxReport = new EnergyTaxReport());

        return $energyTaxReport;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport $energyTaxReport
     * @return self
     */
    public function addOnceToEnergyTaxReport(EnergyTaxReport $energyTaxReport): self
    {
        if (!is_array($this->energyTaxReport)) {
            $this->energyTaxReport = [];
        }

        $this->energyTaxReport[0] = $energyTaxReport;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyTaxReport
     */
    public function addOnceToEnergyTaxReportWithCreate(): EnergyTaxReport
    {
        if (!is_array($this->energyTaxReport)) {
            $this->energyTaxReport = [];
        }

        if ($this->energyTaxReport === []) {
            $this->addOnceToenergyTaxReport(new EnergyTaxReport());
        }

        return $this->energyTaxReport[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage>|null
     */
    public function getConsumptionAverage(): ?array
    {
        return $this->consumptionAverage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage>|null $consumptionAverage
     * @return self
     */
    public function setConsumptionAverage(?array $consumptionAverage = null): self
    {
        $this->consumptionAverage = $consumptionAverage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsumptionAverage(): self
    {
        $this->consumptionAverage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearConsumptionAverage(): self
    {
        $this->consumptionAverage = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage|null
     */
    public function firstConsumptionAverage(): ?ConsumptionAverage
    {
        $consumptionAverage = $this->consumptionAverage ?? [];
        $consumptionAverage = reset($consumptionAverage);

        if ($consumptionAverage === false) {
            return null;
        }

        return $consumptionAverage;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage|null
     */
    public function lastConsumptionAverage(): ?ConsumptionAverage
    {
        $consumptionAverage = $this->consumptionAverage ?? [];
        $consumptionAverage = end($consumptionAverage);

        if ($consumptionAverage === false) {
            return null;
        }

        return $consumptionAverage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage $consumptionAverage
     * @return self
     */
    public function addToConsumptionAverage(ConsumptionAverage $consumptionAverage): self
    {
        $this->consumptionAverage[] = $consumptionAverage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage
     */
    public function addToConsumptionAverageWithCreate(): ConsumptionAverage
    {
        $this->addToconsumptionAverage($consumptionAverage = new ConsumptionAverage());

        return $consumptionAverage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage $consumptionAverage
     * @return self
     */
    public function addOnceToConsumptionAverage(ConsumptionAverage $consumptionAverage): self
    {
        if (!is_array($this->consumptionAverage)) {
            $this->consumptionAverage = [];
        }

        $this->consumptionAverage[0] = $consumptionAverage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsumptionAverage
     */
    public function addOnceToConsumptionAverageWithCreate(): ConsumptionAverage
    {
        if (!is_array($this->consumptionAverage)) {
            $this->consumptionAverage = [];
        }

        if ($this->consumptionAverage === []) {
            $this->addOnceToconsumptionAverage(new ConsumptionAverage());
        }

        return $this->consumptionAverage[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection>|null
     */
    public function getEnergyWaterConsumptionCorrection(): ?array
    {
        return $this->energyWaterConsumptionCorrection;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection>|null $energyWaterConsumptionCorrection
     * @return self
     */
    public function setEnergyWaterConsumptionCorrection(?array $energyWaterConsumptionCorrection = null): self
    {
        $this->energyWaterConsumptionCorrection = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEnergyWaterConsumptionCorrection(): self
    {
        $this->energyWaterConsumptionCorrection = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEnergyWaterConsumptionCorrection(): self
    {
        $this->energyWaterConsumptionCorrection = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection|null
     */
    public function firstEnergyWaterConsumptionCorrection(): ?EnergyWaterConsumptionCorrection
    {
        $energyWaterConsumptionCorrection = $this->energyWaterConsumptionCorrection ?? [];
        $energyWaterConsumptionCorrection = reset($energyWaterConsumptionCorrection);

        if ($energyWaterConsumptionCorrection === false) {
            return null;
        }

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection|null
     */
    public function lastEnergyWaterConsumptionCorrection(): ?EnergyWaterConsumptionCorrection
    {
        $energyWaterConsumptionCorrection = $this->energyWaterConsumptionCorrection ?? [];
        $energyWaterConsumptionCorrection = end($energyWaterConsumptionCorrection);

        if ($energyWaterConsumptionCorrection === false) {
            return null;
        }

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection
     * @return self
     */
    public function addToEnergyWaterConsumptionCorrection(
        EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection,
    ): self {
        $this->energyWaterConsumptionCorrection[] = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection
     */
    public function addToEnergyWaterConsumptionCorrectionWithCreate(): EnergyWaterConsumptionCorrection
    {
        $this->addToenergyWaterConsumptionCorrection($energyWaterConsumptionCorrection = new EnergyWaterConsumptionCorrection());

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection
     * @return self
     */
    public function addOnceToEnergyWaterConsumptionCorrection(
        EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection,
    ): self {
        if (!is_array($this->energyWaterConsumptionCorrection)) {
            $this->energyWaterConsumptionCorrection = [];
        }

        $this->energyWaterConsumptionCorrection[0] = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnergyWaterConsumptionCorrection
     */
    public function addOnceToEnergyWaterConsumptionCorrectionWithCreate(): EnergyWaterConsumptionCorrection
    {
        if (!is_array($this->energyWaterConsumptionCorrection)) {
            $this->energyWaterConsumptionCorrection = [];
        }

        if ($this->energyWaterConsumptionCorrection === []) {
            $this->addOnceToenergyWaterConsumptionCorrection(new EnergyWaterConsumptionCorrection());
        }

        return $this->energyWaterConsumptionCorrection[0];
    }
}
