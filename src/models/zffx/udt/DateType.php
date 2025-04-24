<?php

namespace horstoeko\invoicesuite\models\zffx\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType;

class DateType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateString", setter="setDateString")
     */
    private $dateStringAType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType|null
     */
    public function getDateString(): ?DateStringAType
    {
        return $this->dateStringAType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType
     */
    public function getDateStringWithCreate(): DateStringAType
    {
        $this->dateStringAType = is_null($this->dateStringAType) ? new DateStringAType() : $this->dateStringAType;

        return $this->dateStringAType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateType\DateStringAType $dateStringAType
     * @return self
     */
    public function setDateString(DateStringAType $dateStringAType): self
    {
        $this->dateStringAType = $dateStringAType;

        return $this;
    }
}
