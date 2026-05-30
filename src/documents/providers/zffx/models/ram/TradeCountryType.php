<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType;
use JMS\Serializer\Annotation as JMS;

class TradeCountryType
{
    use HandlesObjectFlags;

    /**
     * @var null|CountryIDType
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $iD;

    /**
     * @return null|CountryIDType
     */
    public function getID(): ?CountryIDType
    {
        return $this->iD;
    }

    /**
     * @return CountryIDType
     */
    public function getIDWithCreate(): CountryIDType
    {
        $this->iD ??= new CountryIDType();

        return $this->iD;
    }

    /**
     * @param  null|CountryIDType $iD
     * @return static
     */
    public function setID(
        ?CountryIDType $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }
}
