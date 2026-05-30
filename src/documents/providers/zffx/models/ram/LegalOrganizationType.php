<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class LegalOrganizationType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $iD;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getTradingBusinessName', setter: 'setTradingBusinessName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TradingBusinessName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $tradingBusinessName;

    /**
     * @var null|TradeAddressType
     */
    #[JMS\Accessor(getter: 'getPostalTradeAddress', setter: 'setPostalTradeAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PostalTradeAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAddressType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $postalTradeAddress;

    /**
     * @return null|IDType
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD ??= new IDType();

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(
        ?IDType $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getTradingBusinessName(): ?TextType
    {
        return $this->tradingBusinessName;
    }

    /**
     * @return TextType
     */
    public function getTradingBusinessNameWithCreate(): TextType
    {
        $this->tradingBusinessName ??= new TextType();

        return $this->tradingBusinessName;
    }

    /**
     * @param  null|TextType $tradingBusinessName
     * @return static
     */
    public function setTradingBusinessName(
        ?TextType $tradingBusinessName = null
    ): static {
        $this->tradingBusinessName = $tradingBusinessName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTradingBusinessName(): static
    {
        $this->tradingBusinessName = null;

        return $this;
    }

    /**
     * @return null|TradeAddressType
     */
    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->postalTradeAddress;
    }

    /**
     * @return TradeAddressType
     */
    public function getPostalTradeAddressWithCreate(): TradeAddressType
    {
        $this->postalTradeAddress ??= new TradeAddressType();

        return $this->postalTradeAddress;
    }

    /**
     * @param  null|TradeAddressType $postalTradeAddress
     * @return static
     */
    public function setPostalTradeAddress(
        ?TradeAddressType $postalTradeAddress = null
    ): static {
        $this->postalTradeAddress = $postalTradeAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostalTradeAddress(): static
    {
        $this->postalTradeAddress = null;

        return $this;
    }
}
