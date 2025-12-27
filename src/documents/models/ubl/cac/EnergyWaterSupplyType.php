<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class EnergyWaterSupplyType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<ConsumptionReport>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ConsumptionReport>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionReport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionReport", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionReport", setter="setConsumptionReport")
     */
    private $consumptionReport;

    /**
     * @var null|array<EnergyTaxReport>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\EnergyTaxReport>")
     * @JMS\Expose
     * @JMS\SerializedName("EnergyTaxReport")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnergyTaxReport", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnergyTaxReport", setter="setEnergyTaxReport")
     */
    private $energyTaxReport;

    /**
     * @var null|array<ConsumptionAverage>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ConsumptionAverage>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionAverage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionAverage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionAverage", setter="setConsumptionAverage")
     */
    private $consumptionAverage;

    /**
     * @var null|array<EnergyWaterConsumptionCorrection>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\EnergyWaterConsumptionCorrection>")
     * @JMS\Expose
     * @JMS\SerializedName("EnergyWaterConsumptionCorrection")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnergyWaterConsumptionCorrection", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnergyWaterConsumptionCorrection", setter="setEnergyWaterConsumptionCorrection")
     */
    private $energyWaterConsumptionCorrection;

    /**
     * @return null|array<ConsumptionReport>
     */
    public function getConsumptionReport(): ?array
    {
        return $this->consumptionReport;
    }

    /**
     * @param  null|array<ConsumptionReport> $consumptionReport
     * @return static
     */
    public function setConsumptionReport(?array $consumptionReport = null): static
    {
        $this->consumptionReport = $consumptionReport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionReport(): static
    {
        $this->consumptionReport = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsumptionReport(): static
    {
        $this->consumptionReport = [];

        return $this;
    }

    /**
     * @return null|ConsumptionReport
     */
    public function firstConsumptionReport(): ?ConsumptionReport
    {
        $consumptionReport = $this->consumptionReport ?? [];
        $consumptionReport = reset($consumptionReport);

        if (false === $consumptionReport) {
            return null;
        }

        return $consumptionReport;
    }

    /**
     * @return null|ConsumptionReport
     */
    public function lastConsumptionReport(): ?ConsumptionReport
    {
        $consumptionReport = $this->consumptionReport ?? [];
        $consumptionReport = end($consumptionReport);

        if (false === $consumptionReport) {
            return null;
        }

        return $consumptionReport;
    }

    /**
     * @param  ConsumptionReport $consumptionReport
     * @return static
     */
    public function addToConsumptionReport(ConsumptionReport $consumptionReport): static
    {
        $this->consumptionReport[] = $consumptionReport;

        return $this;
    }

    /**
     * @return ConsumptionReport
     */
    public function addToConsumptionReportWithCreate(): ConsumptionReport
    {
        $this->addToconsumptionReport($consumptionReport = new ConsumptionReport());

        return $consumptionReport;
    }

    /**
     * @param  ConsumptionReport $consumptionReport
     * @return static
     */
    public function addOnceToConsumptionReport(ConsumptionReport $consumptionReport): static
    {
        if (!is_array($this->consumptionReport)) {
            $this->consumptionReport = [];
        }

        $this->consumptionReport[0] = $consumptionReport;

        return $this;
    }

    /**
     * @return ConsumptionReport
     */
    public function addOnceToConsumptionReportWithCreate(): ConsumptionReport
    {
        if (!is_array($this->consumptionReport)) {
            $this->consumptionReport = [];
        }

        if ([] === $this->consumptionReport) {
            $this->addOnceToconsumptionReport(new ConsumptionReport());
        }

        return $this->consumptionReport[0];
    }

    /**
     * @return null|array<EnergyTaxReport>
     */
    public function getEnergyTaxReport(): ?array
    {
        return $this->energyTaxReport;
    }

    /**
     * @param  null|array<EnergyTaxReport> $energyTaxReport
     * @return static
     */
    public function setEnergyTaxReport(?array $energyTaxReport = null): static
    {
        $this->energyTaxReport = $energyTaxReport;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnergyTaxReport(): static
    {
        $this->energyTaxReport = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEnergyTaxReport(): static
    {
        $this->energyTaxReport = [];

        return $this;
    }

    /**
     * @return null|EnergyTaxReport
     */
    public function firstEnergyTaxReport(): ?EnergyTaxReport
    {
        $energyTaxReport = $this->energyTaxReport ?? [];
        $energyTaxReport = reset($energyTaxReport);

        if (false === $energyTaxReport) {
            return null;
        }

        return $energyTaxReport;
    }

    /**
     * @return null|EnergyTaxReport
     */
    public function lastEnergyTaxReport(): ?EnergyTaxReport
    {
        $energyTaxReport = $this->energyTaxReport ?? [];
        $energyTaxReport = end($energyTaxReport);

        if (false === $energyTaxReport) {
            return null;
        }

        return $energyTaxReport;
    }

    /**
     * @param  EnergyTaxReport $energyTaxReport
     * @return static
     */
    public function addToEnergyTaxReport(EnergyTaxReport $energyTaxReport): static
    {
        $this->energyTaxReport[] = $energyTaxReport;

        return $this;
    }

    /**
     * @return EnergyTaxReport
     */
    public function addToEnergyTaxReportWithCreate(): EnergyTaxReport
    {
        $this->addToenergyTaxReport($energyTaxReport = new EnergyTaxReport());

        return $energyTaxReport;
    }

    /**
     * @param  EnergyTaxReport $energyTaxReport
     * @return static
     */
    public function addOnceToEnergyTaxReport(EnergyTaxReport $energyTaxReport): static
    {
        if (!is_array($this->energyTaxReport)) {
            $this->energyTaxReport = [];
        }

        $this->energyTaxReport[0] = $energyTaxReport;

        return $this;
    }

    /**
     * @return EnergyTaxReport
     */
    public function addOnceToEnergyTaxReportWithCreate(): EnergyTaxReport
    {
        if (!is_array($this->energyTaxReport)) {
            $this->energyTaxReport = [];
        }

        if ([] === $this->energyTaxReport) {
            $this->addOnceToenergyTaxReport(new EnergyTaxReport());
        }

        return $this->energyTaxReport[0];
    }

    /**
     * @return null|array<ConsumptionAverage>
     */
    public function getConsumptionAverage(): ?array
    {
        return $this->consumptionAverage;
    }

    /**
     * @param  null|array<ConsumptionAverage> $consumptionAverage
     * @return static
     */
    public function setConsumptionAverage(?array $consumptionAverage = null): static
    {
        $this->consumptionAverage = $consumptionAverage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionAverage(): static
    {
        $this->consumptionAverage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsumptionAverage(): static
    {
        $this->consumptionAverage = [];

        return $this;
    }

    /**
     * @return null|ConsumptionAverage
     */
    public function firstConsumptionAverage(): ?ConsumptionAverage
    {
        $consumptionAverage = $this->consumptionAverage ?? [];
        $consumptionAverage = reset($consumptionAverage);

        if (false === $consumptionAverage) {
            return null;
        }

        return $consumptionAverage;
    }

    /**
     * @return null|ConsumptionAverage
     */
    public function lastConsumptionAverage(): ?ConsumptionAverage
    {
        $consumptionAverage = $this->consumptionAverage ?? [];
        $consumptionAverage = end($consumptionAverage);

        if (false === $consumptionAverage) {
            return null;
        }

        return $consumptionAverage;
    }

    /**
     * @param  ConsumptionAverage $consumptionAverage
     * @return static
     */
    public function addToConsumptionAverage(ConsumptionAverage $consumptionAverage): static
    {
        $this->consumptionAverage[] = $consumptionAverage;

        return $this;
    }

    /**
     * @return ConsumptionAverage
     */
    public function addToConsumptionAverageWithCreate(): ConsumptionAverage
    {
        $this->addToconsumptionAverage($consumptionAverage = new ConsumptionAverage());

        return $consumptionAverage;
    }

    /**
     * @param  ConsumptionAverage $consumptionAverage
     * @return static
     */
    public function addOnceToConsumptionAverage(ConsumptionAverage $consumptionAverage): static
    {
        if (!is_array($this->consumptionAverage)) {
            $this->consumptionAverage = [];
        }

        $this->consumptionAverage[0] = $consumptionAverage;

        return $this;
    }

    /**
     * @return ConsumptionAverage
     */
    public function addOnceToConsumptionAverageWithCreate(): ConsumptionAverage
    {
        if (!is_array($this->consumptionAverage)) {
            $this->consumptionAverage = [];
        }

        if ([] === $this->consumptionAverage) {
            $this->addOnceToconsumptionAverage(new ConsumptionAverage());
        }

        return $this->consumptionAverage[0];
    }

    /**
     * @return null|array<EnergyWaterConsumptionCorrection>
     */
    public function getEnergyWaterConsumptionCorrection(): ?array
    {
        return $this->energyWaterConsumptionCorrection;
    }

    /**
     * @param  null|array<EnergyWaterConsumptionCorrection> $energyWaterConsumptionCorrection
     * @return static
     */
    public function setEnergyWaterConsumptionCorrection(?array $energyWaterConsumptionCorrection = null): static
    {
        $this->energyWaterConsumptionCorrection = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnergyWaterConsumptionCorrection(): static
    {
        $this->energyWaterConsumptionCorrection = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEnergyWaterConsumptionCorrection(): static
    {
        $this->energyWaterConsumptionCorrection = [];

        return $this;
    }

    /**
     * @return null|EnergyWaterConsumptionCorrection
     */
    public function firstEnergyWaterConsumptionCorrection(): ?EnergyWaterConsumptionCorrection
    {
        $energyWaterConsumptionCorrection = $this->energyWaterConsumptionCorrection ?? [];
        $energyWaterConsumptionCorrection = reset($energyWaterConsumptionCorrection);

        if (false === $energyWaterConsumptionCorrection) {
            return null;
        }

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @return null|EnergyWaterConsumptionCorrection
     */
    public function lastEnergyWaterConsumptionCorrection(): ?EnergyWaterConsumptionCorrection
    {
        $energyWaterConsumptionCorrection = $this->energyWaterConsumptionCorrection ?? [];
        $energyWaterConsumptionCorrection = end($energyWaterConsumptionCorrection);

        if (false === $energyWaterConsumptionCorrection) {
            return null;
        }

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @param  EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection
     * @return static
     */
    public function addToEnergyWaterConsumptionCorrection(
        EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection,
    ): static {
        $this->energyWaterConsumptionCorrection[] = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return EnergyWaterConsumptionCorrection
     */
    public function addToEnergyWaterConsumptionCorrectionWithCreate(): EnergyWaterConsumptionCorrection
    {
        $this->addToenergyWaterConsumptionCorrection($energyWaterConsumptionCorrection = new EnergyWaterConsumptionCorrection());

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @param  EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection
     * @return static
     */
    public function addOnceToEnergyWaterConsumptionCorrection(
        EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection,
    ): static {
        if (!is_array($this->energyWaterConsumptionCorrection)) {
            $this->energyWaterConsumptionCorrection = [];
        }

        $this->energyWaterConsumptionCorrection[0] = $energyWaterConsumptionCorrection;

        return $this;
    }

    /**
     * @return EnergyWaterConsumptionCorrection
     */
    public function addOnceToEnergyWaterConsumptionCorrectionWithCreate(): EnergyWaterConsumptionCorrection
    {
        if (!is_array($this->energyWaterConsumptionCorrection)) {
            $this->energyWaterConsumptionCorrection = [];
        }

        if ([] === $this->energyWaterConsumptionCorrection) {
            $this->addOnceToenergyWaterConsumptionCorrection(new EnergyWaterConsumptionCorrection());
        }

        return $this->energyWaterConsumptionCorrection[0];
    }
}
