<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class LineTradeAgreementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType")
     * @JMS\Expose
     * @JMS\SerializedName("GrossPriceProductTradePrice")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGrossPriceProductTradePrice", setter="setGrossPriceProductTradePrice")
     */
    private $grossPriceProductTradePrice;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType")
     * @JMS\Expose
     * @JMS\SerializedName("NetPriceProductTradePrice")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getNetPriceProductTradePrice", setter="setNetPriceProductTradePrice")
     */
    private $netPriceProductTradePrice;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null
     */
    public function getGrossPriceProductTradePrice(): ?TradePriceType
    {
        return $this->grossPriceProductTradePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType
     */
    public function getGrossPriceProductTradePriceWithCreate(): TradePriceType
    {
        $this->grossPriceProductTradePrice = is_null($this->grossPriceProductTradePrice) ? new TradePriceType() : $this->grossPriceProductTradePrice;

        return $this->grossPriceProductTradePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null $grossPriceProductTradePrice
     * @return self
     */
    public function setGrossPriceProductTradePrice(?TradePriceType $grossPriceProductTradePrice = null): self
    {
        $this->grossPriceProductTradePrice = $grossPriceProductTradePrice;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGrossPriceProductTradePrice(): self
    {
        $this->grossPriceProductTradePrice = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null
     */
    public function getNetPriceProductTradePrice(): ?TradePriceType
    {
        return $this->netPriceProductTradePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType
     */
    public function getNetPriceProductTradePriceWithCreate(): TradePriceType
    {
        $this->netPriceProductTradePrice = is_null($this->netPriceProductTradePrice) ? new TradePriceType() : $this->netPriceProductTradePrice;

        return $this->netPriceProductTradePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\TradePriceType|null $netPriceProductTradePrice
     * @return self
     */
    public function setNetPriceProductTradePrice(?TradePriceType $netPriceProductTradePrice = null): self
    {
        $this->netPriceProductTradePrice = $netPriceProductTradePrice;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetPriceProductTradePrice(): self
    {
        $this->netPriceProductTradePrice = null;

        return $this;
    }
}
