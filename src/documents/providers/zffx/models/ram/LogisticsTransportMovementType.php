<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TransportModeCodeType;
use JMS\Serializer\Annotation as JMS;

class LogisticsTransportMovementType
{
    use HandlesObjectFlags;

    /**
     * @var null|TransportModeCodeType
     */
    #[JMS\Accessor(getter: 'getModeCode', setter: 'setModeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ModeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\TransportModeCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $modeCode;

    /**
     * @return null|TransportModeCodeType
     */
    public function getModeCode(): ?TransportModeCodeType
    {
        return $this->modeCode;
    }

    /**
     * @return TransportModeCodeType
     */
    public function getModeCodeWithCreate(): TransportModeCodeType
    {
        $this->modeCode ??= new TransportModeCodeType();

        return $this->modeCode;
    }

    /**
     * @param  null|TransportModeCodeType $modeCode
     * @return static
     */
    public function setModeCode(
        ?TransportModeCodeType $modeCode = null
    ): static {
        $this->modeCode = $modeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetModeCode(): static
    {
        $this->modeCode = null;

        return $this;
    }
}
