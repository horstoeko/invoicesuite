<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PriceAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimeAmount;
use JMS\Serializer\Annotation as JMS;

class UnstructuredPriceType
{
    use HandlesObjectFlags;

    /**
     * @var null|PriceAmount
     */
    #[JMS\Accessor(getter: 'getPriceAmount', setter: 'setPriceAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PriceAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PriceAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $priceAmount;

    /**
     * @var null|TimeAmount
     */
    #[JMS\Accessor(getter: 'getTimeAmount', setter: 'setTimeAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TimeAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TimeAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->priceAmount ??= new PriceAmount();

        return $this->priceAmount;
    }

    /**
     * @param  null|PriceAmount $priceAmount
     * @return static
     */
    public function setPriceAmount(
        ?PriceAmount $priceAmount = null
    ): static {
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
        $this->timeAmount ??= new TimeAmount();

        return $this->timeAmount;
    }

    /**
     * @param  null|TimeAmount $timeAmount
     * @return static
     */
    public function setTimeAmount(
        ?TimeAmount $timeAmount = null
    ): static {
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
