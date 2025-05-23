<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity;

class ConsumptionReportReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionReportID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionReportID", setter="setConsumptionReportID")
     */
    private $consumptionReportID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionType", setter="setConsumptionType")
     */
    private $consumptionType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionTypeCode", setter="setConsumptionTypeCode")
     */
    private $consumptionTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalConsumedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalConsumedQuantity", setter="setTotalConsumedQuantity")
     */
    private $totalConsumedQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Period|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID|null
     */
    public function getConsumptionReportID(): ?ConsumptionReportID
    {
        return $this->consumptionReportID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID
     */
    public function getConsumptionReportIDWithCreate(): ConsumptionReportID
    {
        $this->consumptionReportID = is_null($this->consumptionReportID) ? new ConsumptionReportID() : $this->consumptionReportID;

        return $this->consumptionReportID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionReportID|null $consumptionReportID
     * @return self
     */
    public function setConsumptionReportID(?ConsumptionReportID $consumptionReportID = null): self
    {
        $this->consumptionReportID = $consumptionReportID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null
     */
    public function getConsumptionType(): ?ConsumptionType
    {
        return $this->consumptionType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType
     */
    public function getConsumptionTypeWithCreate(): ConsumptionType
    {
        $this->consumptionType = is_null($this->consumptionType) ? new ConsumptionType() : $this->consumptionType;

        return $this->consumptionType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null $consumptionType
     * @return self
     */
    public function setConsumptionType(?ConsumptionType $consumptionType = null): self
    {
        $this->consumptionType = $consumptionType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null
     */
    public function getConsumptionTypeCode(): ?ConsumptionTypeCode
    {
        return $this->consumptionTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode
     */
    public function getConsumptionTypeCodeWithCreate(): ConsumptionTypeCode
    {
        $this->consumptionTypeCode = is_null($this->consumptionTypeCode) ? new ConsumptionTypeCode() : $this->consumptionTypeCode;

        return $this->consumptionTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null $consumptionTypeCode
     * @return self
     */
    public function setConsumptionTypeCode(?ConsumptionTypeCode $consumptionTypeCode = null): self
    {
        $this->consumptionTypeCode = $consumptionTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity|null
     */
    public function getTotalConsumedQuantity(): ?TotalConsumedQuantity
    {
        return $this->totalConsumedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity
     */
    public function getTotalConsumedQuantityWithCreate(): TotalConsumedQuantity
    {
        $this->totalConsumedQuantity = is_null($this->totalConsumedQuantity) ? new TotalConsumedQuantity() : $this->totalConsumedQuantity;

        return $this->totalConsumedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalConsumedQuantity|null $totalConsumedQuantity
     * @return self
     */
    public function setTotalConsumedQuantity(?TotalConsumedQuantity $totalConsumedQuantity = null): self
    {
        $this->totalConsumedQuantity = $totalConsumedQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period|null
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period|null $period
     * @return self
     */
    public function setPeriod(?Period $period = null): self
    {
        $this->period = $period;

        return $this;
    }
}
