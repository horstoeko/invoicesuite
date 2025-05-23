<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\PriceAmount;
use horstoeko\invoicesuite\models\ubl\cbc\TimeAmount;

class UnstructuredPriceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PriceAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PriceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PriceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceAmount", setter="setPriceAmount")
     */
    private $priceAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TimeAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TimeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TimeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimeAmount", setter="setTimeAmount")
     */
    private $timeAmount;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceAmount|null
     */
    public function getPriceAmount(): ?PriceAmount
    {
        return $this->priceAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceAmount
     */
    public function getPriceAmountWithCreate(): PriceAmount
    {
        $this->priceAmount = is_null($this->priceAmount) ? new PriceAmount() : $this->priceAmount;

        return $this->priceAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PriceAmount|null $priceAmount
     * @return self
     */
    public function setPriceAmount(?PriceAmount $priceAmount = null): self
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeAmount|null
     */
    public function getTimeAmount(): ?TimeAmount
    {
        return $this->timeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeAmount
     */
    public function getTimeAmountWithCreate(): TimeAmount
    {
        $this->timeAmount = is_null($this->timeAmount) ? new TimeAmount() : $this->timeAmount;

        return $this->timeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TimeAmount|null $timeAmount
     * @return self
     */
    public function setTimeAmount(?TimeAmount $timeAmount = null): self
    {
        $this->timeAmount = $timeAmount;

        return $this;
    }
}
