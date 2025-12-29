<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class ItemComparisonType
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
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

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
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }
}
