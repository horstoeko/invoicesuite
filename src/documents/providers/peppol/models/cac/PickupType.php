<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class PickupType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getActualPickupDate', setter: 'setActualPickupDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualPickupDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $actualPickupDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getActualPickupTime', setter: 'setActualPickupTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualPickupTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $actualPickupTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEarliestPickupDate', setter: 'setEarliestPickupDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EarliestPickupDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $earliestPickupDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEarliestPickupTime', setter: 'setEarliestPickupTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EarliestPickupTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $earliestPickupTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getLatestPickupDate', setter: 'setLatestPickupDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestPickupDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestPickupDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getLatestPickupTime', setter: 'setLatestPickupTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestPickupTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestPickupTime;

    /**
     * @var null|PickupLocation
     */
    #[JMS\Accessor(getter: 'getPickupLocation', setter: 'setPickupLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PickupLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PickupLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $pickupLocation;

    /**
     * @var null|PickupParty
     */
    #[JMS\Accessor(getter: 'getPickupParty', setter: 'setPickupParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PickupParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PickupParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $pickupParty;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualPickupDate(): ?DateTimeInterface
    {
        return $this->actualPickupDate;
    }

    /**
     * @param  null|DateTimeInterface $actualPickupDate
     * @return static
     */
    public function setActualPickupDate(
        ?DateTimeInterface $actualPickupDate = null
    ): static {
        $this->actualPickupDate = $actualPickupDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualPickupDate(): static
    {
        $this->actualPickupDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualPickupTime(): ?DateTimeInterface
    {
        return $this->actualPickupTime;
    }

    /**
     * @param  null|DateTimeInterface $actualPickupTime
     * @return static
     */
    public function setActualPickupTime(
        ?DateTimeInterface $actualPickupTime = null
    ): static {
        $this->actualPickupTime = $actualPickupTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualPickupTime(): static
    {
        $this->actualPickupTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEarliestPickupDate(): ?DateTimeInterface
    {
        return $this->earliestPickupDate;
    }

    /**
     * @param  null|DateTimeInterface $earliestPickupDate
     * @return static
     */
    public function setEarliestPickupDate(
        ?DateTimeInterface $earliestPickupDate = null
    ): static {
        $this->earliestPickupDate = $earliestPickupDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEarliestPickupDate(): static
    {
        $this->earliestPickupDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEarliestPickupTime(): ?DateTimeInterface
    {
        return $this->earliestPickupTime;
    }

    /**
     * @param  null|DateTimeInterface $earliestPickupTime
     * @return static
     */
    public function setEarliestPickupTime(
        ?DateTimeInterface $earliestPickupTime = null
    ): static {
        $this->earliestPickupTime = $earliestPickupTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEarliestPickupTime(): static
    {
        $this->earliestPickupTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestPickupDate(): ?DateTimeInterface
    {
        return $this->latestPickupDate;
    }

    /**
     * @param  null|DateTimeInterface $latestPickupDate
     * @return static
     */
    public function setLatestPickupDate(
        ?DateTimeInterface $latestPickupDate = null
    ): static {
        $this->latestPickupDate = $latestPickupDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestPickupDate(): static
    {
        $this->latestPickupDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestPickupTime(): ?DateTimeInterface
    {
        return $this->latestPickupTime;
    }

    /**
     * @param  null|DateTimeInterface $latestPickupTime
     * @return static
     */
    public function setLatestPickupTime(
        ?DateTimeInterface $latestPickupTime = null
    ): static {
        $this->latestPickupTime = $latestPickupTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestPickupTime(): static
    {
        $this->latestPickupTime = null;

        return $this;
    }

    /**
     * @return null|PickupLocation
     */
    public function getPickupLocation(): ?PickupLocation
    {
        return $this->pickupLocation;
    }

    /**
     * @return PickupLocation
     */
    public function getPickupLocationWithCreate(): PickupLocation
    {
        $this->pickupLocation ??= new PickupLocation();

        return $this->pickupLocation;
    }

    /**
     * @param  null|PickupLocation $pickupLocation
     * @return static
     */
    public function setPickupLocation(
        ?PickupLocation $pickupLocation = null
    ): static {
        $this->pickupLocation = $pickupLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPickupLocation(): static
    {
        $this->pickupLocation = null;

        return $this;
    }

    /**
     * @return null|PickupParty
     */
    public function getPickupParty(): ?PickupParty
    {
        return $this->pickupParty;
    }

    /**
     * @return PickupParty
     */
    public function getPickupPartyWithCreate(): PickupParty
    {
        $this->pickupParty ??= new PickupParty();

        return $this->pickupParty;
    }

    /**
     * @param  null|PickupParty $pickupParty
     * @return static
     */
    public function setPickupParty(
        ?PickupParty $pickupParty = null
    ): static {
        $this->pickupParty = $pickupParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPickupParty(): static
    {
        $this->pickupParty = null;

        return $this;
    }
}
