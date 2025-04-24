<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\CountryIDType;

class TradeCountryType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $countryIDType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType|null
     */
    public function getID(): ?CountryIDType
    {
        return $this->countryIDType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType
     */
    public function getIDWithCreate(): CountryIDType
    {
        $this->countryIDType = is_null($this->countryIDType) ? new CountryIDType() : $this->countryIDType;

        return $this->countryIDType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\CountryIDType $countryIDType
     * @return self
     */
    public function setID(CountryIDType $countryIDType): self
    {
        $this->countryIDType = $countryIDType;

        return $this;
    }
}
