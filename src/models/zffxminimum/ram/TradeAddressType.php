<?php

namespace horstoeko\invoicesuite\models\zffxminimum\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType;

class TradeAddressType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType")
     * @JMS\Expose
     * @JMS\SerializedName("CountryID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCountryID", setter="setCountryID")
     */
    private $countryID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType|null
     */
    public function getCountryID(): ?CountryIDType
    {
        return $this->countryID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType
     */
    public function getCountryIDWithCreate(): CountryIDType
    {
        $this->countryID = is_null($this->countryID) ? new CountryIDType() : $this->countryID;

        return $this->countryID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxminimum\qdt\CountryIDType|null $countryID
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
}
