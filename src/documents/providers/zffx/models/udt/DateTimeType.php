<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType\DateTimeStringAType;
use JMS\Serializer\Annotation as JMS;

class DateTimeType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTimeStringAType
     */
    #[JMS\Accessor(getter: 'getDateTimeString', setter: 'setDateTimeString')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DateTimeString')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType\DateTimeStringAType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100', cdata: false)]
    private $dateTimeString;

    /**
     * @return null|DateTimeStringAType
     */
    public function getDateTimeString(): ?DateTimeStringAType
    {
        return $this->dateTimeString;
    }

    /**
     * @return DateTimeStringAType
     */
    public function getDateTimeStringWithCreate(): DateTimeStringAType
    {
        $this->dateTimeString ??= new DateTimeStringAType();

        return $this->dateTimeString;
    }

    /**
     * @param  null|DateTimeStringAType $dateTimeString
     * @return static
     */
    public function setDateTimeString(
        ?DateTimeStringAType $dateTimeString = null
    ): static {
        $this->dateTimeString = $dateTimeString;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDateTimeString(): static
    {
        $this->dateTimeString = null;

        return $this;
    }
}
