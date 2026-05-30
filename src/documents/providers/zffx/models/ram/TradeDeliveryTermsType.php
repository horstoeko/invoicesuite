<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DeliveryTermsCodeType;
use JMS\Serializer\Annotation as JMS;

class TradeDeliveryTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|DeliveryTermsCodeType
     */
    #[JMS\Accessor(getter: 'getDeliveryTypeCode', setter: 'setDeliveryTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DeliveryTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DeliveryTermsCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $deliveryTypeCode;

    /**
     * @var null|TradeLocationType
     */
    #[JMS\Accessor(getter: 'getRelevantTradeLocation', setter: 'setRelevantTradeLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('RelevantTradeLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeLocationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $relevantTradeLocation;

    /**
     * @return null|DeliveryTermsCodeType
     */
    public function getDeliveryTypeCode(): ?DeliveryTermsCodeType
    {
        return $this->deliveryTypeCode;
    }

    /**
     * @return DeliveryTermsCodeType
     */
    public function getDeliveryTypeCodeWithCreate(): DeliveryTermsCodeType
    {
        $this->deliveryTypeCode ??= new DeliveryTermsCodeType();

        return $this->deliveryTypeCode;
    }

    /**
     * @param  null|DeliveryTermsCodeType $deliveryTypeCode
     * @return static
     */
    public function setDeliveryTypeCode(
        ?DeliveryTermsCodeType $deliveryTypeCode = null
    ): static {
        $this->deliveryTypeCode = $deliveryTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTypeCode(): static
    {
        $this->deliveryTypeCode = null;

        return $this;
    }

    /**
     * @return null|TradeLocationType
     */
    public function getRelevantTradeLocation(): ?TradeLocationType
    {
        return $this->relevantTradeLocation;
    }

    /**
     * @return TradeLocationType
     */
    public function getRelevantTradeLocationWithCreate(): TradeLocationType
    {
        $this->relevantTradeLocation ??= new TradeLocationType();

        return $this->relevantTradeLocation;
    }

    /**
     * @param  null|TradeLocationType $relevantTradeLocation
     * @return static
     */
    public function setRelevantTradeLocation(
        ?TradeLocationType $relevantTradeLocation = null
    ): static {
        $this->relevantTradeLocation = $relevantTradeLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRelevantTradeLocation(): static
    {
        $this->relevantTradeLocation = null;

        return $this;
    }
}
