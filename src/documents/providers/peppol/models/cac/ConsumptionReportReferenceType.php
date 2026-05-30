<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionReportID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalConsumedQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionReportReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumptionReportID
     */
    #[JMS\Accessor(getter: 'getConsumptionReportID', setter: 'setConsumptionReportID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionReportID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionReportID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionReportID;

    /**
     * @var null|ConsumptionType
     */
    #[JMS\Accessor(getter: 'getConsumptionType', setter: 'setConsumptionType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     */
    #[JMS\Accessor(getter: 'getConsumptionTypeCode', setter: 'setConsumptionTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionTypeCode;

    /**
     * @var null|TotalConsumedQuantity
     */
    #[JMS\Accessor(getter: 'getTotalConsumedQuantity', setter: 'setTotalConsumedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalConsumedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalConsumedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalConsumedQuantity;

    /**
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->consumptionReportID ??= new ConsumptionReportID();

        return $this->consumptionReportID;
    }

    /**
     * @param  null|ConsumptionReportID $consumptionReportID
     * @return static
     */
    public function setConsumptionReportID(
        ?ConsumptionReportID $consumptionReportID = null
    ): static {
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
        $this->consumptionType ??= new ConsumptionType();

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(
        ?ConsumptionType $consumptionType = null
    ): static {
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
        $this->consumptionTypeCode ??= new ConsumptionTypeCode();

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(
        ?ConsumptionTypeCode $consumptionTypeCode = null
    ): static {
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
        $this->totalConsumedQuantity ??= new TotalConsumedQuantity();

        return $this->totalConsumedQuantity;
    }

    /**
     * @param  null|TotalConsumedQuantity $totalConsumedQuantity
     * @return static
     */
    public function setTotalConsumedQuantity(
        ?TotalConsumedQuantity $totalConsumedQuantity = null
    ): static {
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
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
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
}
