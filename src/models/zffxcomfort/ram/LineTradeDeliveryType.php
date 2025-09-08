<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType;

class LineTradeDeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType")
     * @JMS\Expose
     * @JMS\SerializedName("BilledQuantity")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBilledQuantity", setter="setBilledQuantity")
     */
    private $billedQuantity;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType|null
     */
    public function getBilledQuantity(): ?QuantityType
    {
        return $this->billedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType
     */
    public function getBilledQuantityWithCreate(): QuantityType
    {
        $this->billedQuantity = is_null($this->billedQuantity) ? new QuantityType() : $this->billedQuantity;

        return $this->billedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\QuantityType|null $billedQuantity
     * @return self
     */
    public function setBilledQuantity(?QuantityType $billedQuantity = null): self
    {
        $this->billedQuantity = $billedQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBilledQuantity(): self
    {
        $this->billedQuantity = null;

        return $this;
    }
}
