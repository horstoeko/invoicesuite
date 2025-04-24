<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType;

class TradeCountryType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $countryIDType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType|null
     */
    public function getID(): ?\horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
    {
        return $this->countryIDType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     */
    public function getIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
    {
        $this->countryIDType = is_null($this->countryIDType) ? new CountryIDType() : $this->countryIDType;

        return $this->countryIDType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType
     * @return self
     */
    public function setID(\horstoeko\invoicesuite\models\zugferd\qdt\CountryIDType $countryIDType): self
    {
        $this->countryIDType = $countryIDType;

        return $this;
    }
}
