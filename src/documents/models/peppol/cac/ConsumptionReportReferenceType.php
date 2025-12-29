<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionReportID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalConsumedQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionReportReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumptionReportID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionReportID")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionReportID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionReportID", setter="setConsumptionReportID")
     */
    private $consumptionReportID;

    /**
     * @var null|ConsumptionType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionType")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionType", setter="setConsumptionType")
     */
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionTypeCode", setter="setConsumptionTypeCode")
     */
    private $consumptionTypeCode;

    /**
     * @var null|TotalConsumedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalConsumedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalConsumedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalConsumedQuantity", setter="setTotalConsumedQuantity")
     */
    private $totalConsumedQuantity;

    /**
     * @var null|Period
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @return null|ConsumptionReportID
     */
    public function getConsumptionReportID(): ?ConsumptionReportID
    {
        return $this->consumptionReportID;
    }

    /**
     * @return ConsumptionReportID
     */
    public function getConsumptionReportIDWithCreate(): ConsumptionReportID
    {
        $this->consumptionReportID = is_null($this->consumptionReportID) ? new ConsumptionReportID() : $this->consumptionReportID;

        return $this->consumptionReportID;
    }

    /**
     * @param  null|ConsumptionReportID $consumptionReportID
     * @return static
     */
    public function setConsumptionReportID(?ConsumptionReportID $consumptionReportID = null): static
    {
        $this->consumptionReportID = $consumptionReportID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionReportID(): static
    {
        $this->consumptionReportID = null;

        return $this;
    }

    /**
     * @return null|ConsumptionType
     */
    public function getConsumptionType(): ?ConsumptionType
    {
        return $this->consumptionType;
    }

    /**
     * @return ConsumptionType
     */
    public function getConsumptionTypeWithCreate(): ConsumptionType
    {
        $this->consumptionType = is_null($this->consumptionType) ? new ConsumptionType() : $this->consumptionType;

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(?ConsumptionType $consumptionType = null): static
    {
        $this->consumptionType = $consumptionType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionType(): static
    {
        $this->consumptionType = null;

        return $this;
    }

    /**
     * @return null|ConsumptionTypeCode
     */
    public function getConsumptionTypeCode(): ?ConsumptionTypeCode
    {
        return $this->consumptionTypeCode;
    }

    /**
     * @return ConsumptionTypeCode
     */
    public function getConsumptionTypeCodeWithCreate(): ConsumptionTypeCode
    {
        $this->consumptionTypeCode = is_null($this->consumptionTypeCode) ? new ConsumptionTypeCode() : $this->consumptionTypeCode;

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(?ConsumptionTypeCode $consumptionTypeCode = null): static
    {
        $this->consumptionTypeCode = $consumptionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionTypeCode(): static
    {
        $this->consumptionTypeCode = null;

        return $this;
    }

    /**
     * @return null|TotalConsumedQuantity
     */
    public function getTotalConsumedQuantity(): ?TotalConsumedQuantity
    {
        return $this->totalConsumedQuantity;
    }

    /**
     * @return TotalConsumedQuantity
     */
    public function getTotalConsumedQuantityWithCreate(): TotalConsumedQuantity
    {
        $this->totalConsumedQuantity = is_null($this->totalConsumedQuantity) ? new TotalConsumedQuantity() : $this->totalConsumedQuantity;

        return $this->totalConsumedQuantity;
    }

    /**
     * @param  null|TotalConsumedQuantity $totalConsumedQuantity
     * @return static
     */
    public function setTotalConsumedQuantity(?TotalConsumedQuantity $totalConsumedQuantity = null): static
    {
        $this->totalConsumedQuantity = $totalConsumedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalConsumedQuantity(): static
    {
        $this->totalConsumedQuantity = null;

        return $this;
    }

    /**
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(?Period $period = null): static
    {
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
}
