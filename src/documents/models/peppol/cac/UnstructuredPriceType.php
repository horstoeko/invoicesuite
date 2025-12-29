<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TimeAmount;
use JMS\Serializer\Annotation as JMS;

class UnstructuredPriceType
{
    use HandlesObjectFlags;

    /**
     * @var null|PriceAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PriceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PriceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceAmount", setter="setPriceAmount")
     */
    private $priceAmount;

    /**
     * @var null|TimeAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TimeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TimeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimeAmount", setter="setTimeAmount")
     */
    private $timeAmount;

    /**
     * @return null|PriceAmount
     */
    public function getPriceAmount(): ?PriceAmount
    {
        return $this->priceAmount;
    }

    /**
     * @return PriceAmount
     */
    public function getPriceAmountWithCreate(): PriceAmount
    {
        $this->priceAmount = is_null($this->priceAmount) ? new PriceAmount() : $this->priceAmount;

        return $this->priceAmount;
    }

    /**
     * @param  null|PriceAmount $priceAmount
     * @return static
     */
    public function setPriceAmount(?PriceAmount $priceAmount = null): static
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceAmount(): static
    {
        $this->priceAmount = null;

        return $this;
    }

    /**
     * @return null|TimeAmount
     */
    public function getTimeAmount(): ?TimeAmount
    {
        return $this->timeAmount;
    }

    /**
     * @return TimeAmount
     */
    public function getTimeAmountWithCreate(): TimeAmount
    {
        $this->timeAmount = is_null($this->timeAmount) ? new TimeAmount() : $this->timeAmount;

        return $this->timeAmount;
    }

    /**
     * @param  null|TimeAmount $timeAmount
     * @return static
     */
    public function setTimeAmount(?TimeAmount $timeAmount = null): static
    {
        $this->timeAmount = $timeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimeAmount(): static
    {
        $this->timeAmount = null;

        return $this;
    }
}
