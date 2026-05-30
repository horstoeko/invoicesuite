<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeSettlementFinancialCardType
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
    #[JMS\Accessor(getter: 'getCardholderName', setter: 'setCardholderName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CardholderName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $cardholderName;

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
    public function getCardholderName(): ?TextType
    {
        return $this->cardholderName;
    }

    /**
     * @return TextType
     */
    public function getCardholderNameWithCreate(): TextType
    {
        $this->cardholderName ??= new TextType();

        return $this->cardholderName;
    }

    /**
     * @param  null|TextType $cardholderName
     * @return static
     */
    public function setCardholderName(
        ?TextType $cardholderName = null
    ): static {
        $this->cardholderName = $cardholderName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCardholderName(): static
    {
        $this->cardholderName = null;

        return $this;
    }
}
