<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class SpecifiedPeriodType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("StartDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getStartDateTime", setter="setStartDateTime")
     */
    private $startDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("EndDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEndDateTime", setter="setEndDateTime")
     */
    private $endDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("CompleteDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCompleteDateTime", setter="setCompleteDateTime")
     */
    private $completeDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setDescription(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getStartDateTime(): ?DateTimeType
    {
        return $this->startDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getStartDateTimeWithCreate(): DateTimeType
    {
        $this->startDateTime = is_null($this->startDateTime) ? new DateTimeType() : $this->startDateTime;

        return $this->startDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setStartDateTime(DateTimeType $dateTimeType): self
    {
        $this->startDateTime = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getEndDateTime(): ?DateTimeType
    {
        return $this->endDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getEndDateTimeWithCreate(): DateTimeType
    {
        $this->endDateTime = is_null($this->endDateTime) ? new DateTimeType() : $this->endDateTime;

        return $this->endDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setEndDateTime(DateTimeType $dateTimeType): self
    {
        $this->endDateTime = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getCompleteDateTime(): ?DateTimeType
    {
        return $this->completeDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getCompleteDateTimeWithCreate(): DateTimeType
    {
        $this->completeDateTime = is_null($this->completeDateTime) ? new DateTimeType() : $this->completeDateTime;

        return $this->completeDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setCompleteDateTime(DateTimeType $dateTimeType): self
    {
        $this->completeDateTime = $dateTimeType;

        return $this;
    }
}
