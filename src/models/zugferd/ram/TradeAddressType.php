<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradeAddressType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("PostcodeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostcodeCode", setter="setPostcodeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineOne")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineOne", setter="setLineOne")
     */
    private $lineOne;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineTwo")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineTwo", setter="setLineTwo")
     */
    private $lineTwo;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("LineThree")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineThree", setter="setLineThree")
     */
    private $lineThree;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CityName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCityName", setter="setCityName")
     */
    private $cityName;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("CountryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountryID", setter="setCountryID")
     */
    private $countryIDType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CountrySubDivisionName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountrySubDivisionName", setter="setCountrySubDivisionName")
     */
    private $countrySubDivisionName;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getPostcodeCode(): ?\horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getPostcodeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setPostcodeCode(\horstoeko\invoicesuite\models\zugferd\udt\CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getLineOne(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->lineOne;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getLineOneWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->lineOne = is_null($this->lineOne) ? new TextType() : $this->lineOne;

        return $this->lineOne;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setLineOne(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->lineOne = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getLineTwo(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->lineTwo;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getLineTwoWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->lineTwo = is_null($this->lineTwo) ? new TextType() : $this->lineTwo;

        return $this->lineTwo;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setLineTwo(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->lineTwo = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getLineThree(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->lineThree;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getLineThreeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->lineThree = is_null($this->lineThree) ? new TextType() : $this->lineThree;

        return $this->lineThree;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setLineThree(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->lineThree = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getCityName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->cityName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getCityNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->cityName = is_null($this->cityName) ? new TextType() : $this->cityName;

        return $this->cityName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setCityName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->cityName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType|null
     */
    public function getCountryID(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
    {
        return $this->countryIDType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     */
    public function getCountryIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
    {
        $this->countryIDType = is_null($this->countryIDType) ? new CountryIDType() : $this->countryIDType;

        return $this->countryIDType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     * @return self
     */
    public function setCountryID(\horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType $countryIDType): self
    {
        $this->countryIDType = $countryIDType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getCountrySubDivisionName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->countrySubDivisionName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getCountrySubDivisionNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->countrySubDivisionName = is_null($this->countrySubDivisionName) ? new TextType() : $this->countrySubDivisionName;

        return $this->countrySubDivisionName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setCountrySubDivisionName(
        \horstoeko\invoicesuite\models\zugferd\udt\TextType $textType,
    ): self {
        $this->countrySubDivisionName = $textType;

        return $this;
    }
}
