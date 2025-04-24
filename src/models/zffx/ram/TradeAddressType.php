<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\CountryIDType;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradeAddressType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("PostcodeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostcodeCode", setter="setPostcodeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineOne")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineOne", setter="setLineOne")
     */
    private $lineOne;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTwo")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTwo", setter="setLineTwo")
     */
    private $lineTwo;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineThree")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineThree", setter="setLineThree")
     */
    private $lineThree;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("CountryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountryID", setter="setCountryID")
     */
    private $countryIDType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubDivisionName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountrySubDivisionName", setter="setCountrySubDivisionName")
     */
    private $countrySubDivisionName;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getPostcodeCode(): ?CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getPostcodeCodeWithCreate(): CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setPostcodeCode(CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getLineOne(): ?TextType
    {
        return $this->lineOne;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getLineOneWithCreate(): TextType
    {
        $this->lineOne = is_null($this->lineOne) ? new TextType() : $this->lineOne;

        return $this->lineOne;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setLineOne(TextType $textType): self
    {
        $this->lineOne = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getLineTwo(): ?TextType
    {
        return $this->lineTwo;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getLineTwoWithCreate(): TextType
    {
        $this->lineTwo = is_null($this->lineTwo) ? new TextType() : $this->lineTwo;

        return $this->lineTwo;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setLineTwo(TextType $textType): self
    {
        $this->lineTwo = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getLineThree(): ?TextType
    {
        return $this->lineThree;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getLineThreeWithCreate(): TextType
    {
        $this->lineThree = is_null($this->lineThree) ? new TextType() : $this->lineThree;

        return $this->lineThree;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setLineThree(TextType $textType): self
    {
        $this->lineThree = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getCityName(): ?TextType
    {
        return $this->cityName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getCityNameWithCreate(): TextType
    {
        $this->cityName = is_null($this->cityName) ? new TextType() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setCityName(TextType $textType): self
    {
        $this->cityName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType|null
     */
    public function getCountryID(): ?CountryIDType
    {
        return $this->countryIDType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType
     */
    public function getCountryIDWithCreate(): CountryIDType
    {
        $this->countryIDType = is_null($this->countryIDType) ? new CountryIDType() : $this->countryIDType;

        return $this->countryIDType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType $countryIDType
     * @return self
     */
    public function setCountryID(CountryIDType $countryIDType): self
    {
        $this->countryIDType = $countryIDType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getCountrySubDivisionName(): ?TextType
    {
        return $this->countrySubDivisionName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getCountrySubDivisionNameWithCreate(): TextType
    {
        $this->countrySubDivisionName = is_null($this->countrySubDivisionName) ? new TextType() : $this->countrySubDivisionName;

        return $this->countrySubDivisionName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setCountrySubDivisionName(TextType $textType): self
    {
        $this->countrySubDivisionName = $textType;

        return $this;
    }
}
