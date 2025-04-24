<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType;

class LogisticsTransportMovementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ModeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModeCode", setter="setModeCode")
     */
    private $transportModeCodeType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType|null
     */
    public function getModeCode(): ?TransportModeCodeType
    {
        return $this->transportModeCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType
     */
    public function getModeCodeWithCreate(): TransportModeCodeType
    {
        $this->transportModeCodeType = is_null($this->transportModeCodeType) ? new TransportModeCodeType() : $this->transportModeCodeType;

        return $this->transportModeCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\TransportModeCodeType $transportModeCodeType
     * @return self
     */
    public function setModeCode(TransportModeCodeType $transportModeCodeType): self
    {
        $this->transportModeCodeType = $transportModeCodeType;

        return $this;
    }
}
