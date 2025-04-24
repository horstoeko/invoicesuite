<?php

namespace horstoeko\invoicesuite\models\zugferd\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType;

class DateType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateString", setter="setDateString")
     */
    private $dateString;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType|null
     */
    public function getDateString(): ?DateStringAType
    {
        return $this->dateString;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     */
    public function getDateStringWithCreate(): DateStringAType
    {
        $this->dateString = is_null($this->dateString) ? new DateStringAType() : $this->dateString;

        return $this->dateString;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     * @return self
     */
    public function setDateString(DateStringAType $dateString): self
    {
        $this->dateString = $dateString;

        return $this;
    }
}
