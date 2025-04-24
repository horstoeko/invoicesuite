<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class SpecifiedPeriodType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("StartDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getStartDateTime", setter="setStartDateTime")
     */
    private $startDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("EndDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEndDateTime", setter="setEndDateTime")
     */
    private $endDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("CompleteDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCompleteDateTime", setter="setCompleteDateTime")
     */
    private $completeDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getStartDateTime(): ?DateTimeType
    {
        return $this->startDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getStartDateTimeWithCreate(): DateTimeType
    {
        $this->startDateTime = is_null($this->startDateTime) ? new DateTimeType() : $this->startDateTime;

        return $this->startDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setStartDateTime(DateTimeType $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getEndDateTime(): ?DateTimeType
    {
        return $this->endDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getEndDateTimeWithCreate(): DateTimeType
    {
        $this->endDateTime = is_null($this->endDateTime) ? new DateTimeType() : $this->endDateTime;

        return $this->endDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setEndDateTime(DateTimeType $endDateTime): self
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getCompleteDateTime(): ?DateTimeType
    {
        return $this->completeDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getCompleteDateTimeWithCreate(): DateTimeType
    {
        $this->completeDateTime = is_null($this->completeDateTime) ? new DateTimeType() : $this->completeDateTime;

        return $this->completeDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setCompleteDateTime(DateTimeType $completeDateTime): self
    {
        $this->completeDateTime = $completeDateTime;

        return $this;
    }
}
