<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxbasic\udt\IDType;
use horstoeko\invoicesuite\models\zffxbasic\udt\TextType;

class LegalOrganizationType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("TradingBusinessName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTradingBusinessName", setter="setTradingBusinessName")
     */
    private $tradingBusinessName;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\IDType $iD
     * @return self
     */
    public function setID(IDType $iD): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType|null
     */
    public function getTradingBusinessName(): ?TextType
    {
        return $this->tradingBusinessName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\TextType
     */
    public function getTradingBusinessNameWithCreate(): TextType
    {
        $this->tradingBusinessName = is_null($this->tradingBusinessName) ? new TextType() : $this->tradingBusinessName;

        return $this->tradingBusinessName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\TextType $tradingBusinessName
     * @return self
     */
    public function setTradingBusinessName(TextType $tradingBusinessName): self
    {
        $this->tradingBusinessName = $tradingBusinessName;

        return $this;
    }
}
