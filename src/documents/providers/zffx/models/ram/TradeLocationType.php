<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeLocationType
{
    use HandlesObjectFlags;

    /**
     * @var null|CountryIDType
     */
    #[JMS\Accessor(getter: 'getCountryID', setter: 'setCountryID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CountryID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $countryID;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $name;

    /**
     * @return null|CountryIDType
     */
    public function getCountryID(): ?CountryIDType
    {
        return $this->countryID;
    }

    /**
     * @return CountryIDType
     */
    public function getCountryIDWithCreate(): CountryIDType
    {
        $this->countryID ??= new CountryIDType();

        return $this->countryID;
    }

    /**
     * @param  null|CountryIDType $countryID
     * @return static
     */
    public function setCountryID(
        ?CountryIDType $countryID = null
    ): static {
        $this->countryID = $countryID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountryID(): static
    {
        $this->countryID = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name ??= new TextType();

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(
        ?TextType $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }
}
