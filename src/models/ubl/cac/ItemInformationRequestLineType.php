<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode;

class ItemInformationRequestLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("TimeFrequencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimeFrequencyCode", setter="setTimeFrequencyCode")
     */
    private $timeFrequencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainActivityTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainActivityTypeCode", setter="setSupplyChainActivityTypeCode")
     */
    private $supplyChainActivityTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastTypeCode", setter="setForecastTypeCode")
     */
    private $forecastTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PerformanceMetricTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerformanceMetricTypeCode", setter="setPerformanceMetricTypeCode")
     */
    private $performanceMetricTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Period>")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Period", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SalesItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SalesItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SalesItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSalesItem", setter="setSalesItem")
     */
    private $salesItem;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode|null
     */
    public function getTimeFrequencyCode(): ?TimeFrequencyCode
    {
        return $this->timeFrequencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode
     */
    public function getTimeFrequencyCodeWithCreate(): TimeFrequencyCode
    {
        $this->timeFrequencyCode = is_null($this->timeFrequencyCode) ? new TimeFrequencyCode() : $this->timeFrequencyCode;

        return $this->timeFrequencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TimeFrequencyCode|null $timeFrequencyCode
     * @return self
     */
    public function setTimeFrequencyCode(?TimeFrequencyCode $timeFrequencyCode = null): self
    {
        $this->timeFrequencyCode = $timeFrequencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode = is_null($this->supplyChainActivityTypeCode) ? new SupplyChainActivityTypeCode() : $this->supplyChainActivityTypeCode;

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null $supplyChainActivityTypeCode
     * @return self
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): self {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null
     */
    public function getForecastTypeCode(): ?ForecastTypeCode
    {
        return $this->forecastTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode
     */
    public function getForecastTypeCodeWithCreate(): ForecastTypeCode
    {
        $this->forecastTypeCode = is_null($this->forecastTypeCode) ? new ForecastTypeCode() : $this->forecastTypeCode;

        return $this->forecastTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null $forecastTypeCode
     * @return self
     */
    public function setForecastTypeCode(?ForecastTypeCode $forecastTypeCode = null): self
    {
        $this->forecastTypeCode = $forecastTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode|null
     */
    public function getPerformanceMetricTypeCode(): ?PerformanceMetricTypeCode
    {
        return $this->performanceMetricTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCodeWithCreate(): PerformanceMetricTypeCode
    {
        $this->performanceMetricTypeCode = is_null($this->performanceMetricTypeCode) ? new PerformanceMetricTypeCode() : $this->performanceMetricTypeCode;

        return $this->performanceMetricTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PerformanceMetricTypeCode|null $performanceMetricTypeCode
     * @return self
     */
    public function setPerformanceMetricTypeCode(?PerformanceMetricTypeCode $performanceMetricTypeCode = null): self
    {
        $this->performanceMetricTypeCode = $performanceMetricTypeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null
     */
    public function getPeriod(): ?array
    {
        return $this->period;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null $period
     * @return self
     */
    public function setPeriod(?array $period = null): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPeriod(): self
    {
        $this->period = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period $period
     * @return self
     */
    public function addToPeriod(Period $period): self
    {
        $this->period[] = $period;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function addToPeriodWithCreate(): Period
    {
        $this->addToperiod($period = new Period());

        return $period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period $period
     * @return self
     */
    public function addOnceToPeriod(Period $period): self
    {
        if (!is_array($this->period)) {
            $this->period = [];
        }

        $this->period[0] = $period;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function addOnceToPeriodWithCreate(): Period
    {
        if (!is_array($this->period)) {
            $this->period = [];
        }

        if ($this->period === []) {
            $this->addOnceToperiod(new Period());
        }

        return $this->period[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null
     */
    public function getSalesItem(): ?array
    {
        return $this->salesItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null $salesItem
     * @return self
     */
    public function setSalesItem(?array $salesItem = null): self
    {
        $this->salesItem = $salesItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSalesItem(): self
    {
        $this->salesItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SalesItem $salesItem
     * @return self
     */
    public function addToSalesItem(SalesItem $salesItem): self
    {
        $this->salesItem[] = $salesItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem
     */
    public function addToSalesItemWithCreate(): SalesItem
    {
        $this->addTosalesItem($salesItem = new SalesItem());

        return $salesItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SalesItem $salesItem
     * @return self
     */
    public function addOnceToSalesItem(SalesItem $salesItem): self
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        $this->salesItem[0] = $salesItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem
     */
    public function addOnceToSalesItemWithCreate(): SalesItem
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        if ($this->salesItem === []) {
            $this->addOnceTosalesItem(new SalesItem());
        }

        return $this->salesItem[0];
    }
}
