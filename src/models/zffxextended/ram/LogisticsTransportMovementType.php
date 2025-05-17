<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType;

class LogisticsTransportMovementType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ModeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModeCode", setter="setModeCode")
     */
    private $modeCode;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType|null
     */
    public function getModeCode(): ?TransportModeCodeType
    {
        return $this->modeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType
     */
    public function getModeCodeWithCreate(): TransportModeCodeType
    {
        $this->modeCode = is_null($this->modeCode) ? new TransportModeCodeType() : $this->modeCode;

        return $this->modeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\qdt\TransportModeCodeType $modeCode
     * @return self
     */
    public function setModeCode(TransportModeCodeType $modeCode): self
    {
        $this->modeCode = $modeCode;

        return $this;
    }
}
