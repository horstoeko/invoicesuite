<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WeekDayCode;
use JMS\Serializer\Annotation as JMS;

class ServiceFrequencyType
{
    use HandlesObjectFlags;

    /**
     * @var null|WeekDayCode
     */
    #[JMS\Accessor(getter: 'getWeekDayCode', setter: 'setWeekDayCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WeekDayCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WeekDayCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->weekDayCode ??= new WeekDayCode();

        return $this->weekDayCode;
    }

    /**
     * @param  null|WeekDayCode $weekDayCode
     * @return static
     */
    public function setWeekDayCode(
        ?WeekDayCode $weekDayCode = null
    ): static {
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
