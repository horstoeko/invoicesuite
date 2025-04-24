<?php

namespace horstoeko\invoicesuite\models\zugferd\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType;

class DateTimeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeString;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeString;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeString = is_null($this->dateTimeString) ? new DateTimeStringAType() : $this->dateTimeString;

        return $this->dateTimeString;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType\DateTimeStringAType $dateTimeString
     * @return self
     */
    public function setDateTimeString(DateTimeStringAType $dateTimeString): self
    {
        $this->dateTimeString = $dateTimeString;

        return $this;
    }
}
