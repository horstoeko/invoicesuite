<?php

namespace horstoeko\invoicesuite\models\zugferd\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType;

class DateType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateType\DateStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateString", setter="setDateString")
     */
    private $dateStringAType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType|null
     */
    public function getDateString(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
    {
        return $this->dateStringAType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     */
    public function getDateStringWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
    {
        $this->dateStringAType = is_null($this->dateStringAType) ? new DateStringAType() : $this->dateStringAType;

        return $this->dateStringAType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType
     * @return self
     */
    public function setDateString(\horstoeko\invoicesuite\models\zugferd\udt\DateType\DateStringAType $dateStringAType): self
    {
        $this->dateStringAType = $dateStringAType;

        return $this;
    }
}
