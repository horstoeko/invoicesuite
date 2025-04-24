<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;

class SupplyChainEventType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDateTime", setter="setOccurrenceDateTime")
     */
    private $occurrenceDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getOccurrenceDateTime(): ?DateTimeType
    {
        return $this->occurrenceDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getOccurrenceDateTimeWithCreate(): DateTimeType
    {
        $this->occurrenceDateTime = is_null($this->occurrenceDateTime) ? new DateTimeType() : $this->occurrenceDateTime;

        return $this->occurrenceDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $occurrenceDateTime
     * @return self
     */
    public function setOccurrenceDateTime(DateTimeType $occurrenceDateTime): self
    {
        $this->occurrenceDateTime = $occurrenceDateTime;

        return $this;
    }
}
