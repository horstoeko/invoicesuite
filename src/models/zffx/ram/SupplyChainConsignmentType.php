<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainConsignmentType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsTransportMovement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsTransportMovement", setter="setSpecifiedLogisticsTransportMovement")
     */
    private $specifiedLogisticsTransportMovement;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType>|null
     */
    public function getSpecifiedLogisticsTransportMovement(): ?array
    {
        return $this->specifiedLogisticsTransportMovement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType> $specifiedLogisticsTransportMovement
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType $logisticsTransportMovementType
     * @return self
     */
    public function addToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $logisticsTransportMovementType,
    ): self {
        $this->specifiedLogisticsTransportMovement[] = $logisticsTransportMovementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType
     */
    public function addToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        $this->addTospecifiedLogisticsTransportMovement($logisticsTransportMovementType = new LogisticsTransportMovementType());

        return $logisticsTransportMovementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType $logisticsTransportMovementType
     * @return self
     */
    public function addOnceToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $logisticsTransportMovementType,
    ): self {
        $this->specifiedLogisticsTransportMovement[0] = $logisticsTransportMovementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LogisticsTransportMovementType
     */
    public function addOnceToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        if ($this->specifiedLogisticsTransportMovement === []) {
            $this->addOnceTospecifiedLogisticsTransportMovement(new LogisticsTransportMovementType());
        }

        return $this->specifiedLogisticsTransportMovement[0];
    }
}
