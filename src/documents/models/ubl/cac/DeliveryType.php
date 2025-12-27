<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ReleaseID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TrackingID;
use JMS\Serializer\Annotation as JMS;

class DeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var null|MinimumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var null|MaximumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDeliveryDate", setter="setActualDeliveryDate")
     */
    private $actualDeliveryDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDeliveryTime", setter="setActualDeliveryTime")
     */
    private $actualDeliveryTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestDeliveryDate", setter="setLatestDeliveryDate")
     */
    private $latestDeliveryDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("LatestDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestDeliveryTime", setter="setLatestDeliveryTime")
     */
    private $latestDeliveryTime;

    /**
     * @var null|ReleaseID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ReleaseID")
     * @JMS\Expose
     * @JMS\SerializedName("ReleaseID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReleaseID", setter="setReleaseID")
     */
    private $releaseID;

    /**
     * @var null|TrackingID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TrackingID")
     * @JMS\Expose
     * @JMS\SerializedName("TrackingID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrackingID", setter="setTrackingID")
     */
    private $trackingID;

    /**
     * @var null|DeliveryAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryAddress")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryAddress", setter="setDeliveryAddress")
     */
    private $deliveryAddress;

    /**
     * @var null|DeliveryLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryLocation", setter="setDeliveryLocation")
     */
    private $deliveryLocation;

    /**
     * @var null|AlternativeDeliveryLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AlternativeDeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("AlternativeDeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAlternativeDeliveryLocation", setter="setAlternativeDeliveryLocation")
     */
    private $alternativeDeliveryLocation;

    /**
     * @var null|RequestedDeliveryPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\RequestedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDeliveryPeriod", setter="setRequestedDeliveryPeriod")
     */
    private $requestedDeliveryPeriod;

    /**
     * @var null|PromisedDeliveryPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PromisedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PromisedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPromisedDeliveryPeriod", setter="setPromisedDeliveryPeriod")
     */
    private $promisedDeliveryPeriod;

    /**
     * @var null|EstimatedDeliveryPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EstimatedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryPeriod", setter="setEstimatedDeliveryPeriod")
     */
    private $estimatedDeliveryPeriod;

    /**
     * @var null|CarrierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CarrierParty")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCarrierParty", setter="setCarrierParty")
     */
    private $carrierParty;

    /**
     * @var null|DeliveryParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryParty")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryParty", setter="setDeliveryParty")
     */
    private $deliveryParty;

    /**
     * @var null|array<NotifyParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\NotifyParty>")
     * @JMS\Expose
     * @JMS\SerializedName("NotifyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotifyParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotifyParty", setter="setNotifyParty")
     */
    private $notifyParty;

    /**
     * @var null|Despatch
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Despatch")
     * @JMS\Expose
     * @JMS\SerializedName("Despatch")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatch", setter="setDespatch")
     */
    private $despatch;

    /**
     * @var null|array<DeliveryTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var null|MinimumDeliveryUnit
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MinimumDeliveryUnit")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumDeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumDeliveryUnit", setter="setMinimumDeliveryUnit")
     */
    private $minimumDeliveryUnit;

    /**
     * @var null|MaximumDeliveryUnit
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MaximumDeliveryUnit")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumDeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumDeliveryUnit", setter="setMaximumDeliveryUnit")
     */
    private $maximumDeliveryUnit;

    /**
     * @var null|Shipment
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Shipment")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

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
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): static
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): static
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualDeliveryDate(): ?DateTimeInterface
    {
        return $this->actualDeliveryDate;
    }

    /**
     * @param  null|DateTimeInterface $actualDeliveryDate
     * @return static
     */
    public function setActualDeliveryDate(?DateTimeInterface $actualDeliveryDate = null): static
    {
        $this->actualDeliveryDate = $actualDeliveryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDeliveryDate(): static
    {
        $this->actualDeliveryDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualDeliveryTime(): ?DateTimeInterface
    {
        return $this->actualDeliveryTime;
    }

    /**
     * @param  null|DateTimeInterface $actualDeliveryTime
     * @return static
     */
    public function setActualDeliveryTime(?DateTimeInterface $actualDeliveryTime = null): static
    {
        $this->actualDeliveryTime = $actualDeliveryTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDeliveryTime(): static
    {
        $this->actualDeliveryTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestDeliveryDate(): ?DateTimeInterface
    {
        return $this->latestDeliveryDate;
    }

    /**
     * @param  null|DateTimeInterface $latestDeliveryDate
     * @return static
     */
    public function setLatestDeliveryDate(?DateTimeInterface $latestDeliveryDate = null): static
    {
        $this->latestDeliveryDate = $latestDeliveryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestDeliveryDate(): static
    {
        $this->latestDeliveryDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestDeliveryTime(): ?DateTimeInterface
    {
        return $this->latestDeliveryTime;
    }

    /**
     * @param  null|DateTimeInterface $latestDeliveryTime
     * @return static
     */
    public function setLatestDeliveryTime(?DateTimeInterface $latestDeliveryTime = null): static
    {
        $this->latestDeliveryTime = $latestDeliveryTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestDeliveryTime(): static
    {
        $this->latestDeliveryTime = null;

        return $this;
    }

    /**
     * @return null|ReleaseID
     */
    public function getReleaseID(): ?ReleaseID
    {
        return $this->releaseID;
    }

    /**
     * @return ReleaseID
     */
    public function getReleaseIDWithCreate(): ReleaseID
    {
        $this->releaseID = is_null($this->releaseID) ? new ReleaseID() : $this->releaseID;

        return $this->releaseID;
    }

    /**
     * @param  null|ReleaseID $releaseID
     * @return static
     */
    public function setReleaseID(?ReleaseID $releaseID = null): static
    {
        $this->releaseID = $releaseID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReleaseID(): static
    {
        $this->releaseID = null;

        return $this;
    }

    /**
     * @return null|TrackingID
     */
    public function getTrackingID(): ?TrackingID
    {
        return $this->trackingID;
    }

    /**
     * @return TrackingID
     */
    public function getTrackingIDWithCreate(): TrackingID
    {
        $this->trackingID = is_null($this->trackingID) ? new TrackingID() : $this->trackingID;

        return $this->trackingID;
    }

    /**
     * @param  null|TrackingID $trackingID
     * @return static
     */
    public function setTrackingID(?TrackingID $trackingID = null): static
    {
        $this->trackingID = $trackingID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTrackingID(): static
    {
        $this->trackingID = null;

        return $this;
    }

    /**
     * @return null|DeliveryAddress
     */
    public function getDeliveryAddress(): ?DeliveryAddress
    {
        return $this->deliveryAddress;
    }

    /**
     * @return DeliveryAddress
     */
    public function getDeliveryAddressWithCreate(): DeliveryAddress
    {
        $this->deliveryAddress = is_null($this->deliveryAddress) ? new DeliveryAddress() : $this->deliveryAddress;

        return $this->deliveryAddress;
    }

    /**
     * @param  null|DeliveryAddress $deliveryAddress
     * @return static
     */
    public function setDeliveryAddress(?DeliveryAddress $deliveryAddress = null): static
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryAddress(): static
    {
        $this->deliveryAddress = null;

        return $this;
    }

    /**
     * @return null|DeliveryLocation
     */
    public function getDeliveryLocation(): ?DeliveryLocation
    {
        return $this->deliveryLocation;
    }

    /**
     * @return DeliveryLocation
     */
    public function getDeliveryLocationWithCreate(): DeliveryLocation
    {
        $this->deliveryLocation = is_null($this->deliveryLocation) ? new DeliveryLocation() : $this->deliveryLocation;

        return $this->deliveryLocation;
    }

    /**
     * @param  null|DeliveryLocation $deliveryLocation
     * @return static
     */
    public function setDeliveryLocation(?DeliveryLocation $deliveryLocation = null): static
    {
        $this->deliveryLocation = $deliveryLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryLocation(): static
    {
        $this->deliveryLocation = null;

        return $this;
    }

    /**
     * @return null|AlternativeDeliveryLocation
     */
    public function getAlternativeDeliveryLocation(): ?AlternativeDeliveryLocation
    {
        return $this->alternativeDeliveryLocation;
    }

    /**
     * @return AlternativeDeliveryLocation
     */
    public function getAlternativeDeliveryLocationWithCreate(): AlternativeDeliveryLocation
    {
        $this->alternativeDeliveryLocation = is_null($this->alternativeDeliveryLocation) ? new AlternativeDeliveryLocation() : $this->alternativeDeliveryLocation;

        return $this->alternativeDeliveryLocation;
    }

    /**
     * @param  null|AlternativeDeliveryLocation $alternativeDeliveryLocation
     * @return static
     */
    public function setAlternativeDeliveryLocation(
        ?AlternativeDeliveryLocation $alternativeDeliveryLocation = null,
    ): static {
        $this->alternativeDeliveryLocation = $alternativeDeliveryLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAlternativeDeliveryLocation(): static
    {
        $this->alternativeDeliveryLocation = null;

        return $this;
    }

    /**
     * @return null|RequestedDeliveryPeriod
     */
    public function getRequestedDeliveryPeriod(): ?RequestedDeliveryPeriod
    {
        return $this->requestedDeliveryPeriod;
    }

    /**
     * @return RequestedDeliveryPeriod
     */
    public function getRequestedDeliveryPeriodWithCreate(): RequestedDeliveryPeriod
    {
        $this->requestedDeliveryPeriod = is_null($this->requestedDeliveryPeriod) ? new RequestedDeliveryPeriod() : $this->requestedDeliveryPeriod;

        return $this->requestedDeliveryPeriod;
    }

    /**
     * @param  null|RequestedDeliveryPeriod $requestedDeliveryPeriod
     * @return static
     */
    public function setRequestedDeliveryPeriod(?RequestedDeliveryPeriod $requestedDeliveryPeriod = null): static
    {
        $this->requestedDeliveryPeriod = $requestedDeliveryPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDeliveryPeriod(): static
    {
        $this->requestedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return null|PromisedDeliveryPeriod
     */
    public function getPromisedDeliveryPeriod(): ?PromisedDeliveryPeriod
    {
        return $this->promisedDeliveryPeriod;
    }

    /**
     * @return PromisedDeliveryPeriod
     */
    public function getPromisedDeliveryPeriodWithCreate(): PromisedDeliveryPeriod
    {
        $this->promisedDeliveryPeriod = is_null($this->promisedDeliveryPeriod) ? new PromisedDeliveryPeriod() : $this->promisedDeliveryPeriod;

        return $this->promisedDeliveryPeriod;
    }

    /**
     * @param  null|PromisedDeliveryPeriod $promisedDeliveryPeriod
     * @return static
     */
    public function setPromisedDeliveryPeriod(?PromisedDeliveryPeriod $promisedDeliveryPeriod = null): static
    {
        $this->promisedDeliveryPeriod = $promisedDeliveryPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPromisedDeliveryPeriod(): static
    {
        $this->promisedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return null|EstimatedDeliveryPeriod
     */
    public function getEstimatedDeliveryPeriod(): ?EstimatedDeliveryPeriod
    {
        return $this->estimatedDeliveryPeriod;
    }

    /**
     * @return EstimatedDeliveryPeriod
     */
    public function getEstimatedDeliveryPeriodWithCreate(): EstimatedDeliveryPeriod
    {
        $this->estimatedDeliveryPeriod = is_null($this->estimatedDeliveryPeriod) ? new EstimatedDeliveryPeriod() : $this->estimatedDeliveryPeriod;

        return $this->estimatedDeliveryPeriod;
    }

    /**
     * @param  null|EstimatedDeliveryPeriod $estimatedDeliveryPeriod
     * @return static
     */
    public function setEstimatedDeliveryPeriod(?EstimatedDeliveryPeriod $estimatedDeliveryPeriod = null): static
    {
        $this->estimatedDeliveryPeriod = $estimatedDeliveryPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDeliveryPeriod(): static
    {
        $this->estimatedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return null|CarrierParty
     */
    public function getCarrierParty(): ?CarrierParty
    {
        return $this->carrierParty;
    }

    /**
     * @return CarrierParty
     */
    public function getCarrierPartyWithCreate(): CarrierParty
    {
        $this->carrierParty = is_null($this->carrierParty) ? new CarrierParty() : $this->carrierParty;

        return $this->carrierParty;
    }

    /**
     * @param  null|CarrierParty $carrierParty
     * @return static
     */
    public function setCarrierParty(?CarrierParty $carrierParty = null): static
    {
        $this->carrierParty = $carrierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCarrierParty(): static
    {
        $this->carrierParty = null;

        return $this;
    }

    /**
     * @return null|DeliveryParty
     */
    public function getDeliveryParty(): ?DeliveryParty
    {
        return $this->deliveryParty;
    }

    /**
     * @return DeliveryParty
     */
    public function getDeliveryPartyWithCreate(): DeliveryParty
    {
        $this->deliveryParty = is_null($this->deliveryParty) ? new DeliveryParty() : $this->deliveryParty;

        return $this->deliveryParty;
    }

    /**
     * @param  null|DeliveryParty $deliveryParty
     * @return static
     */
    public function setDeliveryParty(?DeliveryParty $deliveryParty = null): static
    {
        $this->deliveryParty = $deliveryParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryParty(): static
    {
        $this->deliveryParty = null;

        return $this;
    }

    /**
     * @return null|array<NotifyParty>
     */
    public function getNotifyParty(): ?array
    {
        return $this->notifyParty;
    }

    /**
     * @param  null|array<NotifyParty> $notifyParty
     * @return static
     */
    public function setNotifyParty(?array $notifyParty = null): static
    {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotifyParty(): static
    {
        $this->notifyParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNotifyParty(): static
    {
        $this->notifyParty = [];

        return $this;
    }

    /**
     * @return null|NotifyParty
     */
    public function firstNotifyParty(): ?NotifyParty
    {
        $notifyParty = $this->notifyParty ?? [];
        $notifyParty = reset($notifyParty);

        if (false === $notifyParty) {
            return null;
        }

        return $notifyParty;
    }

    /**
     * @return null|NotifyParty
     */
    public function lastNotifyParty(): ?NotifyParty
    {
        $notifyParty = $this->notifyParty ?? [];
        $notifyParty = end($notifyParty);

        if (false === $notifyParty) {
            return null;
        }

        return $notifyParty;
    }

    /**
     * @param  NotifyParty $notifyParty
     * @return static
     */
    public function addToNotifyParty(NotifyParty $notifyParty): static
    {
        $this->notifyParty[] = $notifyParty;

        return $this;
    }

    /**
     * @return NotifyParty
     */
    public function addToNotifyPartyWithCreate(): NotifyParty
    {
        $this->addTonotifyParty($notifyParty = new NotifyParty());

        return $notifyParty;
    }

    /**
     * @param  NotifyParty $notifyParty
     * @return static
     */
    public function addOnceToNotifyParty(NotifyParty $notifyParty): static
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        $this->notifyParty[0] = $notifyParty;

        return $this;
    }

    /**
     * @return NotifyParty
     */
    public function addOnceToNotifyPartyWithCreate(): NotifyParty
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        if ([] === $this->notifyParty) {
            $this->addOnceTonotifyParty(new NotifyParty());
        }

        return $this->notifyParty[0];
    }

    /**
     * @return null|Despatch
     */
    public function getDespatch(): ?Despatch
    {
        return $this->despatch;
    }

    /**
     * @return Despatch
     */
    public function getDespatchWithCreate(): Despatch
    {
        $this->despatch = is_null($this->despatch) ? new Despatch() : $this->despatch;

        return $this->despatch;
    }

    /**
     * @param  null|Despatch $despatch
     * @return static
     */
    public function setDespatch(?Despatch $despatch = null): static
    {
        $this->despatch = $despatch;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatch(): static
    {
        $this->despatch = null;

        return $this;
    }

    /**
     * @return null|array<DeliveryTerms>
     */
    public function getDeliveryTerms(): ?array
    {
        return $this->deliveryTerms;
    }

    /**
     * @param  null|array<DeliveryTerms> $deliveryTerms
     * @return static
     */
    public function setDeliveryTerms(?array $deliveryTerms = null): static
    {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTerms(): static
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryTerms(): static
    {
        $this->deliveryTerms = [];

        return $this;
    }

    /**
     * @return null|DeliveryTerms
     */
    public function firstDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = reset($deliveryTerms);

        if (false === $deliveryTerms) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @return null|DeliveryTerms
     */
    public function lastDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = end($deliveryTerms);

        if (false === $deliveryTerms) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @param  DeliveryTerms $deliveryTerms
     * @return static
     */
    public function addToDeliveryTerms(DeliveryTerms $deliveryTerms): static
    {
        $this->deliveryTerms[] = $deliveryTerms;

        return $this;
    }

    /**
     * @return DeliveryTerms
     */
    public function addToDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->addTodeliveryTerms($deliveryTerms = new DeliveryTerms());

        return $deliveryTerms;
    }

    /**
     * @param  DeliveryTerms $deliveryTerms
     * @return static
     */
    public function addOnceToDeliveryTerms(DeliveryTerms $deliveryTerms): static
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        $this->deliveryTerms[0] = $deliveryTerms;

        return $this;
    }

    /**
     * @return DeliveryTerms
     */
    public function addOnceToDeliveryTermsWithCreate(): DeliveryTerms
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        if ([] === $this->deliveryTerms) {
            $this->addOnceTodeliveryTerms(new DeliveryTerms());
        }

        return $this->deliveryTerms[0];
    }

    /**
     * @return null|MinimumDeliveryUnit
     */
    public function getMinimumDeliveryUnit(): ?MinimumDeliveryUnit
    {
        return $this->minimumDeliveryUnit;
    }

    /**
     * @return MinimumDeliveryUnit
     */
    public function getMinimumDeliveryUnitWithCreate(): MinimumDeliveryUnit
    {
        $this->minimumDeliveryUnit = is_null($this->minimumDeliveryUnit) ? new MinimumDeliveryUnit() : $this->minimumDeliveryUnit;

        return $this->minimumDeliveryUnit;
    }

    /**
     * @param  null|MinimumDeliveryUnit $minimumDeliveryUnit
     * @return static
     */
    public function setMinimumDeliveryUnit(?MinimumDeliveryUnit $minimumDeliveryUnit = null): static
    {
        $this->minimumDeliveryUnit = $minimumDeliveryUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumDeliveryUnit(): static
    {
        $this->minimumDeliveryUnit = null;

        return $this;
    }

    /**
     * @return null|MaximumDeliveryUnit
     */
    public function getMaximumDeliveryUnit(): ?MaximumDeliveryUnit
    {
        return $this->maximumDeliveryUnit;
    }

    /**
     * @return MaximumDeliveryUnit
     */
    public function getMaximumDeliveryUnitWithCreate(): MaximumDeliveryUnit
    {
        $this->maximumDeliveryUnit = is_null($this->maximumDeliveryUnit) ? new MaximumDeliveryUnit() : $this->maximumDeliveryUnit;

        return $this->maximumDeliveryUnit;
    }

    /**
     * @param  null|MaximumDeliveryUnit $maximumDeliveryUnit
     * @return static
     */
    public function setMaximumDeliveryUnit(?MaximumDeliveryUnit $maximumDeliveryUnit = null): static
    {
        $this->maximumDeliveryUnit = $maximumDeliveryUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumDeliveryUnit(): static
    {
        $this->maximumDeliveryUnit = null;

        return $this;
    }

    /**
     * @return null|Shipment
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @return Shipment
     */
    public function getShipmentWithCreate(): Shipment
    {
        $this->shipment = is_null($this->shipment) ? new Shipment() : $this->shipment;

        return $this->shipment;
    }

    /**
     * @param  null|Shipment $shipment
     * @return static
     */
    public function setShipment(?Shipment $shipment = null): static
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipment(): static
    {
        $this->shipment = null;

        return $this;
    }
}
