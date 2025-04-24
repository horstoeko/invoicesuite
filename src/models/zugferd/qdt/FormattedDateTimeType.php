<?php

namespace horstoeko\invoicesuite\models\zugferd\qdt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType;

class FormattedDateTimeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\FormattedDateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:QualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeStringAType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(
    ): ?\horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType {
        return $this->dateTimeStringAType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType {
        $this->dateTimeStringAType = is_null($this->dateTimeStringAType) ? new DateTimeStringAType() : $this->dateTimeStringAType;

        return $this->dateTimeStringAType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType
     * @return self
     */
    public function setDateTimeString(
        \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType\DateTimeStringAType $dateTimeStringAType,
    ): self {
        $this->dateTimeStringAType = $dateTimeStringAType;

        return $this;
    }
}
