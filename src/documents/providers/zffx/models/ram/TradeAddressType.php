<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\CountryIDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeAddressType
{
    use HandlesObjectFlags;

    /**
     * @var null|CodeType
     */
    #[JMS\Accessor(getter: 'getPostcodeCode', setter: 'setPostcodeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PostcodeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $postcodeCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getLineOne', setter: 'setLineOne')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineOne')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineOne;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getLineTwo', setter: 'setLineTwo')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineTwo')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineTwo;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getLineThree', setter: 'setLineThree')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineThree')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineThree;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getCityName', setter: 'setCityName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CityName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $cityName;

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
    #[JMS\Accessor(getter: 'getCountrySubDivisionName', setter: 'setCountrySubDivisionName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CountrySubDivisionName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $countrySubDivisionName;

    /**
     * @return null|CodeType
     */
    public function getPostcodeCode(): ?CodeType
    {
        return $this->postcodeCode;
    }

    /**
     * @return CodeType
     */
    public function getPostcodeCodeWithCreate(): CodeType
    {
        $this->postcodeCode ??= new CodeType();

        return $this->postcodeCode;
    }

    /**
     * @param  null|CodeType $postcodeCode
     * @return static
     */
    public function setPostcodeCode(
        ?CodeType $postcodeCode = null
    ): static {
        $this->postcodeCode = $postcodeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostcodeCode(): static
    {
        $this->postcodeCode = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getLineOne(): ?TextType
    {
        return $this->lineOne;
    }

    /**
     * @return TextType
     */
    public function getLineOneWithCreate(): TextType
    {
        $this->lineOne ??= new TextType();

        return $this->lineOne;
    }

    /**
     * @param  null|TextType $lineOne
     * @return static
     */
    public function setLineOne(
        ?TextType $lineOne = null
    ): static {
        $this->lineOne = $lineOne;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineOne(): static
    {
        $this->lineOne = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getLineTwo(): ?TextType
    {
        return $this->lineTwo;
    }

    /**
     * @return TextType
     */
    public function getLineTwoWithCreate(): TextType
    {
        $this->lineTwo ??= new TextType();

        return $this->lineTwo;
    }

    /**
     * @param  null|TextType $lineTwo
     * @return static
     */
    public function setLineTwo(
        ?TextType $lineTwo = null
    ): static {
        $this->lineTwo = $lineTwo;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineTwo(): static
    {
        $this->lineTwo = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getLineThree(): ?TextType
    {
        return $this->lineThree;
    }

    /**
     * @return TextType
     */
    public function getLineThreeWithCreate(): TextType
    {
        $this->lineThree ??= new TextType();

        return $this->lineThree;
    }

    /**
     * @param  null|TextType $lineThree
     * @return static
     */
    public function setLineThree(
        ?TextType $lineThree = null
    ): static {
        $this->lineThree = $lineThree;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineThree(): static
    {
        $this->lineThree = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getCityName(): ?TextType
    {
        return $this->cityName;
    }

    /**
     * @return TextType
     */
    public function getCityNameWithCreate(): TextType
    {
        $this->cityName ??= new TextType();

        return $this->cityName;
    }

    /**
     * @param  null|TextType $cityName
     * @return static
     */
    public function setCityName(
        ?TextType $cityName = null
    ): static {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCityName(): static
    {
        $this->cityName = null;

        return $this;
    }

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
    public function getCountrySubDivisionName(): ?TextType
    {
        return $this->countrySubDivisionName;
    }

    /**
     * @return TextType
     */
    public function getCountrySubDivisionNameWithCreate(): TextType
    {
        $this->countrySubDivisionName ??= new TextType();

        return $this->countrySubDivisionName;
    }

    /**
     * @param  null|TextType $countrySubDivisionName
     * @return static
     */
    public function setCountrySubDivisionName(
        ?TextType $countrySubDivisionName = null
    ): static {
        $this->countrySubDivisionName = $countrySubDivisionName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountrySubDivisionName(): static
    {
        $this->countrySubDivisionName = null;

        return $this;
    }
}
