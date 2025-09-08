<?php

namespace horstoeko\invoicesuite\models\zffxbasicwl\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType;

class SupplyChainEventType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDateTime", setter="setOccurrenceDateTime")
     */
    private $occurrenceDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null
     */
    public function getOccurrenceDateTime(): ?DateTimeType
    {
        return $this->occurrenceDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType
     */
    public function getOccurrenceDateTimeWithCreate(): DateTimeType
    {
        $this->occurrenceDateTime = is_null($this->occurrenceDateTime) ? new DateTimeType() : $this->occurrenceDateTime;

        return $this->occurrenceDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null $occurrenceDateTime
     * @return self
     */
    public function setOccurrenceDateTime(?DateTimeType $occurrenceDateTime = null): self
    {
        $this->occurrenceDateTime = $occurrenceDateTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOccurrenceDateTime(): self
    {
        $this->occurrenceDateTime = null;

        return $this;
    }
}
