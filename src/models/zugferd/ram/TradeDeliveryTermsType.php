<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType;

class TradeDeliveryTermsType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDeliveryTypeCode", setter="setDeliveryTypeCode")
     */
    private $deliveryTypeCode;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType|null
     */
    public function getDeliveryTypeCode(): ?DeliveryTermsCodeType
    {
        return $this->deliveryTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType
     */
    public function getDeliveryTypeCodeWithCreate(): DeliveryTermsCodeType
    {
        $this->deliveryTypeCode = is_null($this->deliveryTypeCode) ? new DeliveryTermsCodeType() : $this->deliveryTypeCode;

        return $this->deliveryTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\DeliveryTermsCodeType
     * @return self
     */
    public function setDeliveryTypeCode(DeliveryTermsCodeType $deliveryTypeCode): self
    {
        $this->deliveryTypeCode = $deliveryTypeCode;

        return $this;
    }
}
