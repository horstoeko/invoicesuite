<?php

namespace horstoeko\invoicesuite\models\zffx\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType;

class DateTimeType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeStringAType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeStringAType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeStringAType = is_null($this->dateTimeStringAType) ? new DateTimeStringAType() : $this->dateTimeStringAType;

        return $this->dateTimeStringAType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType\DateTimeStringAType $dateTimeStringAType
     * @return self
     */
    public function setDateTimeString(DateTimeStringAType $dateTimeStringAType): self
    {
        $this->dateTimeStringAType = $dateTimeStringAType;

        return $this;
    }
}
