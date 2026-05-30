<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType\DateStringAType;
use JMS\Serializer\Annotation as JMS;

class DateType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateStringAType
     */
    #[JMS\Accessor(getter: 'getDateString', setter: 'setDateString')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DateString')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateType\DateStringAType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100', cdata: false)]
    private $dateString;

    /**
     * @return null|DateStringAType
     */
    public function getDateString(): ?DateStringAType
    {
        return $this->dateString;
    }

    /**
     * @return DateStringAType
     */
    public function getDateStringWithCreate(): DateStringAType
    {
        $this->dateString ??= new DateStringAType();

        return $this->dateString;
    }

    /**
     * @param  null|DateStringAType $dateString
     * @return static
     */
    public function setDateString(
        ?DateStringAType $dateString = null
    ): static {
        $this->dateString = $dateString;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDateString(): static
    {
        $this->dateString = null;

        return $this;
    }
}
