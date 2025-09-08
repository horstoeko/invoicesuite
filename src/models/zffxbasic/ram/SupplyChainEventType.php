<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType;

class SupplyChainEventType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDateTime", setter="setOccurrenceDateTime")
     */
    private $occurrenceDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType|null
     */
    public function getOccurrenceDateTime(): ?DateTimeType
    {
        return $this->occurrenceDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType
     */
    public function getOccurrenceDateTimeWithCreate(): DateTimeType
    {
        $this->occurrenceDateTime = is_null($this->occurrenceDateTime) ? new DateTimeType() : $this->occurrenceDateTime;

        return $this->occurrenceDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\DateTimeType|null $occurrenceDateTime
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
