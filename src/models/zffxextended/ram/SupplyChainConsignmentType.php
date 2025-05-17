<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;

class SupplyChainConsignmentType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsTransportMovement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsTransportMovement", setter="setSpecifiedLogisticsTransportMovement")
     */
    private $specifiedLogisticsTransportMovement;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType>|null
     */
    public function getSpecifiedLogisticsTransportMovement(): ?array
    {
        return $this->specifiedLogisticsTransportMovement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType> $specifiedLogisticsTransportMovement
     * @return self
     */
    public function setSpecifiedLogisticsTransportMovement(array $specifiedLogisticsTransportMovement): self
    {
        $this->specifiedLogisticsTransportMovement = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecifiedLogisticsTransportMovement(): self
    {
        $this->specifiedLogisticsTransportMovement = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType $specifiedLogisticsTransportMovement
     * @return self
     */
    public function addToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $specifiedLogisticsTransportMovement,
    ): self {
        $this->specifiedLogisticsTransportMovement[] = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType
     */
    public function addToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        $this->addTospecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovement = new LogisticsTransportMovementType());

        return $specifiedLogisticsTransportMovement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType $specifiedLogisticsTransportMovement
     * @return self
     */
    public function addOnceToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $specifiedLogisticsTransportMovement,
    ): self {
        if (!is_array($this->specifiedLogisticsTransportMovement)) {
            $this->specifiedLogisticsTransportMovement = [];
        }

        $this->specifiedLogisticsTransportMovement[0] = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\LogisticsTransportMovementType
     */
    public function addOnceToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        if (!is_array($this->specifiedLogisticsTransportMovement)) {
            $this->specifiedLogisticsTransportMovement = [];
        }

        if ($this->specifiedLogisticsTransportMovement === []) {
            $this->addOnceTospecifiedLogisticsTransportMovement(new LogisticsTransportMovementType());
        }

        return $this->specifiedLogisticsTransportMovement[0];
    }
}
