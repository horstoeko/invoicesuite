<?php

namespace horstoeko\invoicesuite\models\zffxbasicwl\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeString;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeString;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeString = is_null($this->dateTimeString) ? new DateTimeStringAType() : $this->dateTimeString;

        return $this->dateTimeString;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType\DateTimeStringAType|null $dateTimeString
     * @return self
     */
    public function setDateTimeString(?DateTimeStringAType $dateTimeString = null): self
    {
        $this->dateTimeString = $dateTimeString;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDateTimeString(): self
    {
        $this->dateTimeString = null;

        return $this;
    }
}
