<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class TradeSettlementFinancialCardType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("CardholderName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCardholderName", setter="setCardholderName")
     */
    private $cardholderName;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\IDType|null $iD
     * @return self
     */
    public function setID(?IDType $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getCardholderName(): ?TextType
    {
        return $this->cardholderName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getCardholderNameWithCreate(): TextType
    {
        $this->cardholderName = is_null($this->cardholderName) ? new TextType() : $this->cardholderName;

        return $this->cardholderName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null $cardholderName
     * @return self
     */
    public function setCardholderName(?TextType $cardholderName = null): self
    {
        $this->cardholderName = $cardholderName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCardholderName(): self
    {
        $this->cardholderName = null;

        return $this;
    }
}
