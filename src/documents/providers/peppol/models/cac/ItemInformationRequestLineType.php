<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimeFrequencyCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ItemInformationRequestLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|TimeFrequencyCode
     */
    #[JMS\Accessor(getter: 'getTimeFrequencyCode', setter: 'setTimeFrequencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TimeFrequencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimeFrequencyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $timeFrequencyCode;

    /**
     * @var null|SupplyChainActivityTypeCode
     */
    #[JMS\Accessor(getter: 'getSupplyChainActivityTypeCode', setter: 'setSupplyChainActivityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyChainActivityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $supplyChainActivityTypeCode;

    /**
     * @var null|ForecastTypeCode
     */
    #[JMS\Accessor(getter: 'getForecastTypeCode', setter: 'setForecastTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $forecastTypeCode;

    /**
     * @var null|PerformanceMetricTypeCode
     */
    #[JMS\Accessor(getter: 'getPerformanceMetricTypeCode', setter: 'setPerformanceMetricTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerformanceMetricTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $performanceMetricTypeCode;

    /**
     * @var null|array<Period>
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Period', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $period;

    /**
     * @var null|array<SalesItem>
     */
    #[JMS\Accessor(getter: 'getSalesItem', setter: 'setSalesItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SalesItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SalesItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SalesItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $salesItem;

    /**
     * @return null|TimeFrequencyCode
     */
    public function getTimeFrequencyCode(): ?TimeFrequencyCode
    {
        return $this->timeFrequencyCode;
    }

    /**
     * @return TimeFrequencyCode
     */
    public function getTimeFrequencyCodeWithCreate(): TimeFrequencyCode
    {
        $this->timeFrequencyCode ??= new TimeFrequencyCode();

        return $this->timeFrequencyCode;
    }

    /**
     * @param  null|TimeFrequencyCode $timeFrequencyCode
     * @return static
     */
    public function setTimeFrequencyCode(
        ?TimeFrequencyCode $timeFrequencyCode = null
    ): static {
        $this->timeFrequencyCode = $timeFrequencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimeFrequencyCode(): static
    {
        $this->timeFrequencyCode = null;

        return $this;
    }

    /**
     * @return null|SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode ??= new SupplyChainActivityTypeCode();

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param  null|SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     * @return static
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): static {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyChainActivityTypeCode(): static
    {
        $this->supplyChainActivityTypeCode = null;

        return $this;
    }

    /**
     * @return null|ForecastTypeCode
     */
    public function getForecastTypeCode(): ?ForecastTypeCode
    {
        return $this->forecastTypeCode;
    }

    /**
     * @return ForecastTypeCode
     */
    public function getForecastTypeCodeWithCreate(): ForecastTypeCode
    {
        $this->forecastTypeCode ??= new ForecastTypeCode();

        return $this->forecastTypeCode;
    }

    /**
     * @param  null|ForecastTypeCode $forecastTypeCode
     * @return static
     */
    public function setForecastTypeCode(
        ?ForecastTypeCode $forecastTypeCode = null
    ): static {
        $this->forecastTypeCode = $forecastTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastTypeCode(): static
    {
        $this->forecastTypeCode = null;

        return $this;
    }

    /**
     * @return null|PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCode(): ?PerformanceMetricTypeCode
    {
        return $this->performanceMetricTypeCode;
    }

    /**
     * @return PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCodeWithCreate(): PerformanceMetricTypeCode
    {
        $this->performanceMetricTypeCode ??= new PerformanceMetricTypeCode();

        return $this->performanceMetricTypeCode;
    }

    /**
     * @param  null|PerformanceMetricTypeCode $performanceMetricTypeCode
     * @return static
     */
    public function setPerformanceMetricTypeCode(
        ?PerformanceMetricTypeCode $performanceMetricTypeCode = null
    ): static {
        $this->performanceMetricTypeCode = $performanceMetricTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerformanceMetricTypeCode(): static
    {
        $this->performanceMetricTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<Period>
     */
    public function getPeriod(): ?array
    {
        return $this->period;
    }

    /**
     * @param  null|array<Period> $period
     * @return static
     */
    public function setPeriod(
        ?array $period = null
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPeriod(): static
    {
        $this->period = [];

        return $this;
    }

    /**
     * @return null|Period
     */
    public function firstPeriod(): ?Period
    {
        $period = $this->period ?? [];
        $period = reset($period);

        if (false === $period) {
            return null;
        }

        return $period;
    }

    /**
     * @return null|Period
     */
    public function lastPeriod(): ?Period
    {
        $period = $this->period ?? [];
        $period = end($period);

        if (false === $period) {
            return null;
        }

        return $period;
    }

    /**
     * @param  Period $period
     * @return static
     */
    public function addToPeriod(
        Period $period
    ): static {
        $this->period[] = $period;

        return $this;
    }

    /**
     * @return Period
     */
    public function addToPeriodWithCreate(): Period
    {
        $this->addToPeriod($period = new Period());

        return $period;
    }

    /**
     * @param  Period $period
     * @return static
     */
    public function addOnceToPeriod(
        Period $period
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->period)) {
            $this->period = [];
        }

        $this->period[0] = $period;

        return $this;
    }

    /**
     * @return Period
     */
    public function addOnceToPeriodWithCreate(): Period
    {
        if (!InvoiceSuiteArrayUtils::is($this->period)) {
            $this->period = [];
        }

        if ([] === $this->period) {
            $this->addOnceToPeriod(new Period());
        }

        return $this->period[0];
    }

    /**
     * @return null|array<SalesItem>
     */
    public function getSalesItem(): ?array
    {
        return $this->salesItem;
    }

    /**
     * @param  null|array<SalesItem> $salesItem
     * @return static
     */
    public function setSalesItem(
        ?array $salesItem = null
    ): static {
        $this->salesItem = $salesItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesItem(): static
    {
        $this->salesItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSalesItem(): static
    {
        $this->salesItem = [];

        return $this;
    }

    /**
     * @return null|SalesItem
     */
    public function firstSalesItem(): ?SalesItem
    {
        $salesItem = $this->salesItem ?? [];
        $salesItem = reset($salesItem);

        if (false === $salesItem) {
            return null;
        }

        return $salesItem;
    }

    /**
     * @return null|SalesItem
     */
    public function lastSalesItem(): ?SalesItem
    {
        $salesItem = $this->salesItem ?? [];
        $salesItem = end($salesItem);

        if (false === $salesItem) {
            return null;
        }

        return $salesItem;
    }

    /**
     * @param  SalesItem $salesItem
     * @return static
     */
    public function addToSalesItem(
        SalesItem $salesItem
    ): static {
        $this->salesItem[] = $salesItem;

        return $this;
    }

    /**
     * @return SalesItem
     */
    public function addToSalesItemWithCreate(): SalesItem
    {
        $this->addToSalesItem($salesItem = new SalesItem());

        return $salesItem;
    }

    /**
     * @param  SalesItem $salesItem
     * @return static
     */
    public function addOnceToSalesItem(
        SalesItem $salesItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->salesItem)) {
            $this->salesItem = [];
        }

        $this->salesItem[0] = $salesItem;

        return $this;
    }

    /**
     * @return SalesItem
     */
    public function addOnceToSalesItemWithCreate(): SalesItem
    {
        if (!InvoiceSuiteArrayUtils::is($this->salesItem)) {
            $this->salesItem = [];
        }

        if ([] === $this->salesItem) {
            $this->addOnceToSalesItem(new SalesItem());
        }

        return $this->salesItem[0];
    }
}
