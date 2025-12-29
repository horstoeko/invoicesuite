<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\WeekDayCode;
use JMS\Serializer\Annotation as JMS;

class ServiceFrequencyType
{
    use HandlesObjectFlags;

    /**
     * @var null|WeekDayCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\WeekDayCode")
     * @JMS\Expose
     * @JMS\SerializedName("WeekDayCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWeekDayCode", setter="setWeekDayCode")
     */
    private $weekDayCode;

    /**
     * @return null|WeekDayCode
     */
    public function getWeekDayCode(): ?WeekDayCode
    {
        return $this->weekDayCode;
    }

    /**
     * @return WeekDayCode
     */
    public function getWeekDayCodeWithCreate(): WeekDayCode
    {
        $this->weekDayCode = is_null($this->weekDayCode) ? new WeekDayCode() : $this->weekDayCode;

        return $this->weekDayCode;
    }

    /**
     * @param  null|WeekDayCode $weekDayCode
     * @return static
     */
    public function setWeekDayCode(?WeekDayCode $weekDayCode = null): static
    {
        $this->weekDayCode = $weekDayCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWeekDayCode(): static
    {
        $this->weekDayCode = null;

        return $this;
    }
}
