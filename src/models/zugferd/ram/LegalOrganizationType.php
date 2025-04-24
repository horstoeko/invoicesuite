<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class LegalOrganizationType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("TradingBusinessName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTradingBusinessName", setter="setTradingBusinessName")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeAddressType")
     * @JMS\Expose
     * @JMS\SerializedName("PostalTradeAddress")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPostalTradeAddress", setter="setPostalTradeAddress")
     */
    private $tradeAddressType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getTradingBusinessName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getTradingBusinessNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setTradingBusinessName(
        \horstoeko\invoicesuite\models\zugferd\udt\TextType $textType,
    ): self {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType|null
     */
    public function getPostalTradeAddress(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
    {
        return $this->tradeAddressType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
    {
        $this->tradeAddressType = is_null($this->tradeAddressType) ? new TradeAddressType() : $this->tradeAddressType;

        return $this->tradeAddressType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType
     * @return self
     */
    public function setPostalTradeAddress(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeAddressType $tradeAddressType,
    ): self {
        $this->tradeAddressType = $tradeAddressType;

        return $this;
    }
}
