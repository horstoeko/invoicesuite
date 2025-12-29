<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class PickupType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPickupDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualPickupDate", setter="setActualPickupDate")
     */
    private $actualPickupDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPickupTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualPickupTime", setter="setActualPickupTime")
     */
    private $actualPickupTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EarliestPickupDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEarliestPickupDate", setter="setEarliestPickupDate")
     */
    private $earliestPickupDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EarliestPickupTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEarliestPickupTime", setter="setEarliestPickupTime")
     */
    private $earliestPickupTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestPickupDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestPickupDate", setter="setLatestPickupDate")
     */
    private $latestPickupDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("LatestPickupTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestPickupTime", setter="setLatestPickupTime")
     */
    private $latestPickupTime;

    /**
     * @var null|PickupLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PickupLocation")
     * @JMS\Expose
     * @JMS\SerializedName("PickupLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPickupLocation", setter="setPickupLocation")
     */
    private $pickupLocation;

    /**
     * @var null|PickupParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PickupParty")
     * @JMS\Expose
     * @JMS\SerializedName("PickupParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPickupParty", setter="setPickupParty")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
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
    public function setActualPickupDate(?DateTimeInterface $actualPickupDate = null): static
    {
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
    public function setActualPickupTime(?DateTimeInterface $actualPickupTime = null): static
    {
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
    public function setEarliestPickupDate(?DateTimeInterface $earliestPickupDate = null): static
    {
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
    public function setEarliestPickupTime(?DateTimeInterface $earliestPickupTime = null): static
    {
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
    public function setLatestPickupDate(?DateTimeInterface $latestPickupDate = null): static
    {
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
    public function setLatestPickupTime(?DateTimeInterface $latestPickupTime = null): static
    {
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
        $this->pickupLocation = is_null($this->pickupLocation) ? new PickupLocation() : $this->pickupLocation;

        return $this->pickupLocation;
    }

    /**
     * @param  null|PickupLocation $pickupLocation
     * @return static
     */
    public function setPickupLocation(?PickupLocation $pickupLocation = null): static
    {
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
        $this->pickupParty = is_null($this->pickupParty) ? new PickupParty() : $this->pickupParty;

        return $this->pickupParty;
    }

    /**
     * @param  null|PickupParty $pickupParty
     * @return static
     */
    public function setPickupParty(?PickupParty $pickupParty = null): static
    {
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
