<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\qdt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType;

class FormattedDateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType")
     * @JMS\Expose
     * @JMS\SerializedName("DateTimeString")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:QualifiedDataType:100", cdata=false)
     * @JMS\Accessor(getter="getDateTimeString", setter="setDateTimeString")
     */
    private $dateTimeString;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType|null
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeString;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeString = is_null($this->dateTimeString) ? new DateTimeStringAType() : $this->dateTimeString;

        return $this->dateTimeString;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\FormattedDateTimeType\DateTimeStringAType|null $dateTimeString
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
