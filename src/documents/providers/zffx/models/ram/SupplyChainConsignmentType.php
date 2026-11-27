<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class SupplyChainConsignmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<LogisticsTransportMovementType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedLogisticsTransportMovement', setter: 'setSpecifiedLogisticsTransportMovement')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedLogisticsTransportMovement')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\LogisticsTransportMovementType>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    #[JMS\XmlList(entry: 'SpecifiedLogisticsTransportMovement', inline: true, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
    public function setSpecifiedLogisticsTransportMovement(
        ?array $specifiedLogisticsTransportMovement = null
    ): static {
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
        $this->addToSpecifiedLogisticsTransportMovement($specifiedLogisticsTransportMovement = new LogisticsTransportMovementType());

        return $specifiedLogisticsTransportMovement;
    }

    /**
     * @param  LogisticsTransportMovementType $specifiedLogisticsTransportMovement
     * @return static
     */
    public function addOnceToSpecifiedLogisticsTransportMovement(
        LogisticsTransportMovementType $specifiedLogisticsTransportMovement,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specifiedLogisticsTransportMovement)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->specifiedLogisticsTransportMovement)) {
            $this->specifiedLogisticsTransportMovement = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->specifiedLogisticsTransportMovement)) {
            $this->addOnceToSpecifiedLogisticsTransportMovement(new LogisticsTransportMovementType());
        }

        return $this->specifiedLogisticsTransportMovement[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(LogisticsTransportMovementType): mixed $callback
     * @return static
     */
    public function forEachSpecifiedLogisticsTransportMovement(
        callable $callback
    ): static {
        foreach ($this->specifiedLogisticsTransportMovement ?? [] as $specifiedLogisticsTransportMovement) {
            $callback($specifiedLogisticsTransportMovement);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(LogisticsTransportMovementType): mixed  $callback
     * @return array<array-key, LogisticsTransportMovementType>
     */
    public function filterSpecifiedLogisticsTransportMovements(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->specifiedLogisticsTransportMovement ?? [], $callback);
    }
}
