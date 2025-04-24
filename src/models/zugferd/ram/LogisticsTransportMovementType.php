<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType;

class LogisticsTransportMovementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ModeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModeCode", setter="setModeCode")
     */
    private $modeCode;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType|null
     */
    public function getModeCode(): ?TransportModeCodeType
    {
        return $this->modeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType
     */
    public function getModeCodeWithCreate(): TransportModeCodeType
    {
        $this->modeCode = is_null($this->modeCode) ? new TransportModeCodeType() : $this->modeCode;

        return $this->modeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\TransportModeCodeType $modeCode
     * @return self
     */
    public function setModeCode(TransportModeCodeType $modeCode): self
    {
        $this->modeCode = $modeCode;

        return $this;
    }
}
