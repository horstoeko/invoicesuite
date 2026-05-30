<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class SpecifiedPeriodType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $description;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getStartDateTime', setter: 'setStartDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('StartDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $startDateTime;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getEndDateTime', setter: 'setEndDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('EndDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $endDateTime;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getCompleteDateTime', setter: 'setCompleteDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CompleteDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $completeDateTime;

    /**
     * @return null|TextType
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description ??= new TextType();

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(
        ?TextType $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getStartDateTime(): ?DateTimeType
    {
        return $this->startDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getStartDateTimeWithCreate(): DateTimeType
    {
        $this->startDateTime ??= new DateTimeType();

        return $this->startDateTime;
    }

    /**
     * @param  null|DateTimeType $startDateTime
     * @return static
     */
    public function setStartDateTime(
        ?DateTimeType $startDateTime = null
    ): static {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStartDateTime(): static
    {
        $this->startDateTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getEndDateTime(): ?DateTimeType
    {
        return $this->endDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getEndDateTimeWithCreate(): DateTimeType
    {
        $this->endDateTime ??= new DateTimeType();

        return $this->endDateTime;
    }

    /**
     * @param  null|DateTimeType $endDateTime
     * @return static
     */
    public function setEndDateTime(
        ?DateTimeType $endDateTime = null
    ): static {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndDateTime(): static
    {
        $this->endDateTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getCompleteDateTime(): ?DateTimeType
    {
        return $this->completeDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getCompleteDateTimeWithCreate(): DateTimeType
    {
        $this->completeDateTime ??= new DateTimeType();

        return $this->completeDateTime;
    }

    /**
     * @param  null|DateTimeType $completeDateTime
     * @return static
     */
    public function setCompleteDateTime(
        ?DateTimeType $completeDateTime = null
    ): static {
        $this->completeDateTime = $completeDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompleteDateTime(): static
    {
        $this->completeDateTime = null;

        return $this;
    }
}
