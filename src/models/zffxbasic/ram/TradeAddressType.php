<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType;
use horstoeko\invoicesuite\models\zffxbasic\udt\CodeType;
use horstoeko\invoicesuite\models\zffxbasic\udt\TextType;

class TradeAddressType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\CodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("PostcodeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostcodeCode", setter="setPostcodeCode")
     */
    private $postcodeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineOne")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineOne", setter="setLineOne")
     */
    private $lineOne;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTwo")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTwo", setter="setLineTwo")
     */
    private $lineTwo;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineThree")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineThree", setter="setLineThree")
     */
    private $lineThree;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("CountryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountryID", setter="setCountryID")
     */
    private $countryID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubDivisionName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountrySubDivisionName", setter="setCountrySubDivisionName")
     */
    private $countrySubDivisionName;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\CodeType|null
     */
    public function getPostcodeCode(): ?CodeType
    {
        return $this->postcodeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\CodeType
     */
    public function getPostcodeCodeWithCreate(): CodeType
    {
        $this->postcodeCode = is_null($this->postcodeCode) ? new CodeType() : $this->postcodeCode;

        return $this->postcodeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\CodeType $postcodeCode
     * @return self
     */
    public function setPostcodeCode(CodeType $postcodeCode): self
    {
        $this->postcodeCode = $postcodeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getLineOne(): ?TextType
    {
        return $this->lineOne;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getLineOneWithCreate(): TextType
    {
        $this->lineOne = is_null($this->lineOne) ? new TextType() : $this->lineOne;

        return $this->lineOne;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $lineOne
     * @return self
     */
    public function setLineOne(TextType $lineOne): self
    {
        $this->lineOne = $lineOne;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getLineTwo(): ?TextType
    {
        return $this->lineTwo;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getLineTwoWithCreate(): TextType
    {
        $this->lineTwo = is_null($this->lineTwo) ? new TextType() : $this->lineTwo;

        return $this->lineTwo;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $lineTwo
     * @return self
     */
    public function setLineTwo(TextType $lineTwo): self
    {
        $this->lineTwo = $lineTwo;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getLineThree(): ?TextType
    {
        return $this->lineThree;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getLineThreeWithCreate(): TextType
    {
        $this->lineThree = is_null($this->lineThree) ? new TextType() : $this->lineThree;

        return $this->lineThree;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $lineThree
     * @return self
     */
    public function setLineThree(TextType $lineThree): self
    {
        $this->lineThree = $lineThree;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getCityName(): ?TextType
    {
        return $this->cityName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getCityNameWithCreate(): TextType
    {
        $this->cityName = is_null($this->cityName) ? new TextType() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $cityName
     * @return self
     */
    public function setCityName(TextType $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType|null
     */
    public function getCountryID(): ?CountryIDType
    {
        return $this->countryID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType
     */
    public function getCountryIDWithCreate(): CountryIDType
    {
        $this->countryID = is_null($this->countryID) ? new CountryIDType() : $this->countryID;

        return $this->countryID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\qdt\CountryIDType $countryID
     * @return self
     */
    public function setCountryID(CountryIDType $countryID): self
    {
        $this->countryID = $countryID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getCountrySubDivisionName(): ?TextType
    {
        return $this->countrySubDivisionName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getCountrySubDivisionNameWithCreate(): TextType
    {
        $this->countrySubDivisionName = is_null($this->countrySubDivisionName) ? new TextType() : $this->countrySubDivisionName;

        return $this->countrySubDivisionName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $countrySubDivisionName
     * @return self
     */
    public function setCountrySubDivisionName(TextType $countrySubDivisionName): self
    {
        $this->countrySubDivisionName = $countrySubDivisionName;

        return $this;
    }
}
