<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class EnergyWaterSupplyType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<ConsumptionReport>
     */
    #[JMS\Accessor(getter: 'getConsumptionReport', setter: 'setConsumptionReport')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionReport')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsumptionReport>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'ConsumptionReport', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consumptionReport;

    /**
     * @var null|array<EnergyTaxReport>
     */
    #[JMS\Accessor(getter: 'getEnergyTaxReport', setter: 'setEnergyTaxReport')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EnergyTaxReport')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EnergyTaxReport>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'EnergyTaxReport', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $energyTaxReport;

    /**
     * @var null|array<ConsumptionAverage>
     */
    #[JMS\Accessor(getter: 'getConsumptionAverage', setter: 'setConsumptionAverage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionAverage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsumptionAverage>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'ConsumptionAverage', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consumptionAverage;

    /**
     * @var null|array<EnergyWaterConsumptionCorrection>
     */
    #[JMS\Accessor(getter: 'getEnergyWaterConsumptionCorrection', setter: 'setEnergyWaterConsumptionCorrection')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EnergyWaterConsumptionCorrection')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EnergyWaterConsumptionCorrection>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'EnergyWaterConsumptionCorrection', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
    public function setConsumptionReport(
        ?array $consumptionReport = null
    ): static {
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
        $consumptionReport = InvoiceSuiteArrayUtils::first($consumptionReport);

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
        $consumptionReport = InvoiceSuiteArrayUtils::last($consumptionReport);

        if (false === $consumptionReport) {
            return null;
        }

        return $consumptionReport;
    }

    /**
     * @param  ConsumptionReport $consumptionReport
     * @return static
     */
    public function addToConsumptionReport(
        ConsumptionReport $consumptionReport
    ): static {
        $this->consumptionReport[] = $consumptionReport;

        return $this;
    }

    /**
     * @return ConsumptionReport
     */
    public function addToConsumptionReportWithCreate(): ConsumptionReport
    {
        $this->addToConsumptionReport($consumptionReport = new ConsumptionReport());

        return $consumptionReport;
    }

    /**
     * @param  ConsumptionReport $consumptionReport
     * @return static
     */
    public function addOnceToConsumptionReport(
        ConsumptionReport $consumptionReport
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->consumptionReport)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->consumptionReport)) {
            $this->consumptionReport = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->consumptionReport)) {
            $this->addOnceToConsumptionReport(new ConsumptionReport());
        }

        return $this->consumptionReport[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(ConsumptionReport): mixed $callback
     * @return static
     */
    public function forEachConsumptionReport(
        callable $callback
    ): static {
        foreach ($this->consumptionReport ?? [] as $consumptionReport) {
            $callback($consumptionReport);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(ConsumptionReport): mixed  $callback
     * @return array<array-key, ConsumptionReport>
     */
    public function filterConsumptionReports(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->consumptionReport ?? [], $callback);
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
    public function setEnergyTaxReport(
        ?array $energyTaxReport = null
    ): static {
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
        $energyTaxReport = InvoiceSuiteArrayUtils::first($energyTaxReport);

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
        $energyTaxReport = InvoiceSuiteArrayUtils::last($energyTaxReport);

        if (false === $energyTaxReport) {
            return null;
        }

        return $energyTaxReport;
    }

    /**
     * @param  EnergyTaxReport $energyTaxReport
     * @return static
     */
    public function addToEnergyTaxReport(
        EnergyTaxReport $energyTaxReport
    ): static {
        $this->energyTaxReport[] = $energyTaxReport;

        return $this;
    }

    /**
     * @return EnergyTaxReport
     */
    public function addToEnergyTaxReportWithCreate(): EnergyTaxReport
    {
        $this->addToEnergyTaxReport($energyTaxReport = new EnergyTaxReport());

        return $energyTaxReport;
    }

    /**
     * @param  EnergyTaxReport $energyTaxReport
     * @return static
     */
    public function addOnceToEnergyTaxReport(
        EnergyTaxReport $energyTaxReport
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->energyTaxReport)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->energyTaxReport)) {
            $this->energyTaxReport = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->energyTaxReport)) {
            $this->addOnceToEnergyTaxReport(new EnergyTaxReport());
        }

        return $this->energyTaxReport[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(EnergyTaxReport): mixed $callback
     * @return static
     */
    public function forEachEnergyTaxReport(
        callable $callback
    ): static {
        foreach ($this->energyTaxReport ?? [] as $energyTaxReport) {
            $callback($energyTaxReport);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(EnergyTaxReport): mixed  $callback
     * @return array<array-key, EnergyTaxReport>
     */
    public function filterEnergyTaxReports(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->energyTaxReport ?? [], $callback);
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
    public function setConsumptionAverage(
        ?array $consumptionAverage = null
    ): static {
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
        $consumptionAverage = InvoiceSuiteArrayUtils::first($consumptionAverage);

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
        $consumptionAverage = InvoiceSuiteArrayUtils::last($consumptionAverage);

        if (false === $consumptionAverage) {
            return null;
        }

        return $consumptionAverage;
    }

    /**
     * @param  ConsumptionAverage $consumptionAverage
     * @return static
     */
    public function addToConsumptionAverage(
        ConsumptionAverage $consumptionAverage
    ): static {
        $this->consumptionAverage[] = $consumptionAverage;

        return $this;
    }

    /**
     * @return ConsumptionAverage
     */
    public function addToConsumptionAverageWithCreate(): ConsumptionAverage
    {
        $this->addToConsumptionAverage($consumptionAverage = new ConsumptionAverage());

        return $consumptionAverage;
    }

    /**
     * @param  ConsumptionAverage $consumptionAverage
     * @return static
     */
    public function addOnceToConsumptionAverage(
        ConsumptionAverage $consumptionAverage
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->consumptionAverage)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->consumptionAverage)) {
            $this->consumptionAverage = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->consumptionAverage)) {
            $this->addOnceToConsumptionAverage(new ConsumptionAverage());
        }

        return $this->consumptionAverage[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(ConsumptionAverage): mixed $callback
     * @return static
     */
    public function forEachConsumptionAverage(
        callable $callback
    ): static {
        foreach ($this->consumptionAverage ?? [] as $consumptionAverage) {
            $callback($consumptionAverage);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(ConsumptionAverage): mixed  $callback
     * @return array<array-key, ConsumptionAverage>
     */
    public function filterConsumptionAverages(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->consumptionAverage ?? [], $callback);
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
    public function setEnergyWaterConsumptionCorrection(
        ?array $energyWaterConsumptionCorrection = null
    ): static {
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
        $energyWaterConsumptionCorrection = InvoiceSuiteArrayUtils::first($energyWaterConsumptionCorrection);

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
        $energyWaterConsumptionCorrection = InvoiceSuiteArrayUtils::last($energyWaterConsumptionCorrection);

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
        $this->addToEnergyWaterConsumptionCorrection($energyWaterConsumptionCorrection = new EnergyWaterConsumptionCorrection());

        return $energyWaterConsumptionCorrection;
    }

    /**
     * @param  EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection
     * @return static
     */
    public function addOnceToEnergyWaterConsumptionCorrection(
        EnergyWaterConsumptionCorrection $energyWaterConsumptionCorrection,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->energyWaterConsumptionCorrection)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->energyWaterConsumptionCorrection)) {
            $this->energyWaterConsumptionCorrection = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->energyWaterConsumptionCorrection)) {
            $this->addOnceToEnergyWaterConsumptionCorrection(new EnergyWaterConsumptionCorrection());
        }

        return $this->energyWaterConsumptionCorrection[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(EnergyWaterConsumptionCorrection): mixed $callback
     * @return static
     */
    public function forEachEnergyWaterConsumptionCorrection(
        callable $callback
    ): static {
        foreach ($this->energyWaterConsumptionCorrection ?? [] as $energyWaterConsumptionCorrection) {
            $callback($energyWaterConsumptionCorrection);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(EnergyWaterConsumptionCorrection): mixed  $callback
     * @return array<array-key, EnergyWaterConsumptionCorrection>
     */
    public function filterEnergyWaterConsumptionCorrections(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->energyWaterConsumptionCorrection ?? [], $callback);
    }
}
