<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType;

class LogisticsTransportMovementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ModeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getModeCode", setter="setModeCode")
     */
    private $modeCode;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType|null
     */
    public function getModeCode(): ?TransportModeCodeType
    {
        return $this->modeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType
     */
    public function getModeCodeWithCreate(): TransportModeCodeType
    {
        $this->modeCode = is_null($this->modeCode) ? new TransportModeCodeType() : $this->modeCode;

        return $this->modeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\qdt\TransportModeCodeType|null $modeCode
     * @return self
     */
    public function setModeCode(?TransportModeCodeType $modeCode = null): self
    {
        $this->modeCode = $modeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetModeCode(): self
    {
        $this->modeCode = null;

        return $this;
    }
}
