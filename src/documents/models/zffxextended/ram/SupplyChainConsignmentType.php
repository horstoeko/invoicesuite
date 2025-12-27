<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class SupplyChainConsignmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<LogisticsTransportMovementType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\LogisticsTransportMovementType>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLogisticsTransportMovement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecifiedLogisticsTransportMovement", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getSpecifiedLogisticsTransportMovement", setter="setSpecifiedLogisticsTransportMovement")
     */
    private $specifiedLogisticsTransportMovement;

    /**
     * @return null|array<LogisticsTransportMovementType>
     */
    public function getSpecifiedLogisticsTransportMovement(): ?array
    {
        return $this->specifiedLogisticsTransportMovement;
    }

    /**
     * @param  null|array<LogisticsTransportMovementType> $specifiedLogisticsTransportMovement
     * @return static
     */
    public function setSpecifiedLogisticsTransportMovement(?array $specifiedLogisticsTransportMovement = null): static
    {
        $this->specifiedLogisticsTransportMovement = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedLogisticsTransportMovement(): static
    {
        $this->specifiedLogisticsTransportMovement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedLogisticsTransportMovement(): static
    {
        $this->specifiedLogisticsTransportMovement = [];

        return $this;
    }

    /**
     * @param  LogisticsTransportMovementType $specifiedLogisticsTransportMovement
     * @return static
     */
    public function addToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $specifiedLogisticsTransportMovement,
    ): static {
        $this->specifiedLogisticsTransportMovement[] = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return LogisticsTransportMovementType
     */
    public function addToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        $this->addTospecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovement = new LogisticsTransportMovementType());

        return $specifiedLogisticsTransportMovement;
    }

    /**
     * @param  LogisticsTransportMovementType $specifiedLogisticsTransportMovement
     * @return static
     */
    public function addOnceToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $specifiedLogisticsTransportMovement,
    ): static {
        if (!is_array($this->specifiedLogisticsTransportMovement)) {
            $this->specifiedLogisticsTransportMovement = [];
        }

        $this->specifiedLogisticsTransportMovement[0] = $specifiedLogisticsTransportMovement;

        return $this;
    }

    /**
     * @return LogisticsTransportMovementType
     */
    public function addOnceToSpecifiedLogisticsTransportMovementWithCreate(): LogisticsTransportMovementType
    {
        if (!is_array($this->specifiedLogisticsTransportMovement)) {
            $this->specifiedLogisticsTransportMovement = [];
        }

        if ([] === $this->specifiedLogisticsTransportMovement) {
            $this->addOnceTospecifiedLogisticsTransportMovement(new LogisticsTransportMovementType());
        }

        return $this->specifiedLogisticsTransportMovement[0];
    }
}
