<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType;

class SupplyChainEventType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDateTime", setter="setOccurrenceDateTime")
     */
    private $dateTimeType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getOccurrenceDateTime(): ?DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getOccurrenceDateTimeWithCreate(): DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setOccurrenceDateTime(DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }
}
