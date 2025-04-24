<?php

namespace horstoeko\invoicesuite\models\zugferd\qdt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType;

class FormattedDateTimeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:QualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeString;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeString;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeString = is_null($this->dateTimeString) ? new DateTimeStringAType() : $this->dateTimeString;

        return $this->dateTimeString;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     * @return self
     */
    public function setDateTimeString(DateTimeStringAType $dateTimeString): self
    {
        $this->dateTimeString = $dateTimeString;

        return $this;
    }
}
