<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType;

class TradeAddressType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("PostcodeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostcodeCode", setter="setPostcodeCode")
     */
    private $postcodeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineOne")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineOne", setter="setLineOne")
     */
    private $lineOne;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTwo")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTwo", setter="setLineTwo")
     */
    private $lineTwo;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineThree")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineThree", setter="setLineThree")
     */
    private $lineThree;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("CountryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountryID", setter="setCountryID")
     */
    private $countryID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubDivisionName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountrySubDivisionName", setter="setCountrySubDivisionName")
     */
    private $countrySubDivisionName;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null
     */
    public function getPostcodeCode(): ?CodeType
    {
        return $this->postcodeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType
     */
    public function getPostcodeCodeWithCreate(): CodeType
    {
        $this->postcodeCode = is_null($this->postcodeCode) ? new CodeType() : $this->postcodeCode;

        return $this->postcodeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\CodeType|null $postcodeCode
     * @return self
     */
    public function setPostcodeCode(?CodeType $postcodeCode = null): self
    {
        $this->postcodeCode = $postcodeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPostcodeCode(): self
    {
        $this->postcodeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getLineOne(): ?TextType
    {
        return $this->lineOne;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getLineOneWithCreate(): TextType
    {
        $this->lineOne = is_null($this->lineOne) ? new TextType() : $this->lineOne;

        return $this->lineOne;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $lineOne
     * @return self
     */
    public function setLineOne(?TextType $lineOne = null): self
    {
        $this->lineOne = $lineOne;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineOne(): self
    {
        $this->lineOne = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getLineTwo(): ?TextType
    {
        return $this->lineTwo;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getLineTwoWithCreate(): TextType
    {
        $this->lineTwo = is_null($this->lineTwo) ? new TextType() : $this->lineTwo;

        return $this->lineTwo;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $lineTwo
     * @return self
     */
    public function setLineTwo(?TextType $lineTwo = null): self
    {
        $this->lineTwo = $lineTwo;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineTwo(): self
    {
        $this->lineTwo = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getLineThree(): ?TextType
    {
        return $this->lineThree;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getLineThreeWithCreate(): TextType
    {
        $this->lineThree = is_null($this->lineThree) ? new TextType() : $this->lineThree;

        return $this->lineThree;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $lineThree
     * @return self
     */
    public function setLineThree(?TextType $lineThree = null): self
    {
        $this->lineThree = $lineThree;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineThree(): self
    {
        $this->lineThree = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getCityName(): ?TextType
    {
        return $this->cityName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getCityNameWithCreate(): TextType
    {
        $this->cityName = is_null($this->cityName) ? new TextType() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $cityName
     * @return self
     */
    public function setCityName(?TextType $cityName = null): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCityName(): self
    {
        $this->cityName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType|null
     */
    public function getCountryID(): ?CountryIDType
    {
        return $this->countryID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType
     */
    public function getCountryIDWithCreate(): CountryIDType
    {
        $this->countryID = is_null($this->countryID) ? new CountryIDType() : $this->countryID;

        return $this->countryID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\CountryIDType|null $countryID
     * @return self
     */
    public function setCountryID(?CountryIDType $countryID = null): self
    {
        $this->countryID = $countryID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCountryID(): self
    {
        $this->countryID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null
     */
    public function getCountrySubDivisionName(): ?TextType
    {
        return $this->countrySubDivisionName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType
     */
    public function getCountrySubDivisionNameWithCreate(): TextType
    {
        $this->countrySubDivisionName = is_null($this->countrySubDivisionName) ? new TextType() : $this->countrySubDivisionName;

        return $this->countrySubDivisionName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\TextType|null $countrySubDivisionName
     * @return self
     */
    public function setCountrySubDivisionName(?TextType $countrySubDivisionName = null): self
    {
        $this->countrySubDivisionName = $countrySubDivisionName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCountrySubDivisionName(): self
    {
        $this->countrySubDivisionName = null;

        return $this;
    }
}
