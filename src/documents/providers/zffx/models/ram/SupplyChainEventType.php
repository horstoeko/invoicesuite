<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use JMS\Serializer\Annotation as JMS;

class SupplyChainEventType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getOccurrenceDateTime', setter: 'setOccurrenceDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('OccurrenceDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $occurrenceDateTime;

    /**
     * @return null|DateTimeType
     */
    public function getOccurrenceDateTime(): ?DateTimeType
    {
        return $this->occurrenceDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getOccurrenceDateTimeWithCreate(): DateTimeType
    {
        $this->occurrenceDateTime ??= new DateTimeType();

        return $this->occurrenceDateTime;
    }

    /**
     * @param  null|DateTimeType $occurrenceDateTime
     * @return static
     */
    public function setOccurrenceDateTime(
        ?DateTimeType $occurrenceDateTime = null
    ): static {
        $this->occurrenceDateTime = $occurrenceDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOccurrenceDateTime(): static
    {
        $this->occurrenceDateTime = null;

        return $this;
    }
}
