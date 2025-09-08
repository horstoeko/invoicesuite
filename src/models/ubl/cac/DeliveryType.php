<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\models\ubl\cbc\ReleaseID;
use horstoeko\invoicesuite\models\ubl\cbc\TrackingID;

class DeliveryType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDeliveryDate", setter="setActualDeliveryDate")
     */
    private $actualDeliveryDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDeliveryTime", setter="setActualDeliveryTime")
     */
    private $actualDeliveryTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestDeliveryDate", setter="setLatestDeliveryDate")
     */
    private $latestDeliveryDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("LatestDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestDeliveryTime", setter="setLatestDeliveryTime")
     */
    private $latestDeliveryTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReleaseID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReleaseID")
     * @JMS\Expose
     * @JMS\SerializedName("ReleaseID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReleaseID", setter="setReleaseID")
     */
    private $releaseID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TrackingID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TrackingID")
     * @JMS\Expose
     * @JMS\SerializedName("TrackingID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrackingID", setter="setTrackingID")
     */
    private $trackingID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryAddress")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryAddress", setter="setDeliveryAddress")
     */
    private $deliveryAddress;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryLocation", setter="setDeliveryLocation")
     */
    private $deliveryLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AlternativeDeliveryLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AlternativeDeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("AlternativeDeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAlternativeDeliveryLocation", setter="setAlternativeDeliveryLocation")
     */
    private $alternativeDeliveryLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequestedDeliveryPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequestedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDeliveryPeriod", setter="setRequestedDeliveryPeriod")
     */
    private $requestedDeliveryPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PromisedDeliveryPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PromisedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PromisedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPromisedDeliveryPeriod", setter="setPromisedDeliveryPeriod")
     */
    private $promisedDeliveryPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedDeliveryPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedDeliveryPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryPeriod", setter="setEstimatedDeliveryPeriod")
     */
    private $estimatedDeliveryPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CarrierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CarrierParty")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCarrierParty", setter="setCarrierParty")
     */
    private $carrierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryParty")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryParty", setter="setDeliveryParty")
     */
    private $deliveryParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\NotifyParty>")
     * @JMS\Expose
     * @JMS\SerializedName("NotifyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotifyParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotifyParty", setter="setNotifyParty")
     */
    private $notifyParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Despatch|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Despatch")
     * @JMS\Expose
     * @JMS\SerializedName("Despatch")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatch", setter="setDespatch")
     */
    private $despatch;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MinimumDeliveryUnit|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MinimumDeliveryUnit")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumDeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumDeliveryUnit", setter="setMinimumDeliveryUnit")
     */
    private $minimumDeliveryUnit;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MaximumDeliveryUnit|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MaximumDeliveryUnit")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumDeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumDeliveryUnit", setter="setMaximumDeliveryUnit")
     */
    private $maximumDeliveryUnit;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Shipment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Shipment")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuantity(): self
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null $minimumQuantity
     * @return self
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): self
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumQuantity(): self
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null $maximumQuantity
     * @return self
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): self
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumQuantity(): self
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getActualDeliveryDate(): ?\DateTimeInterface
    {
        return $this->actualDeliveryDate;
    }

    /**
     * @param \DateTimeInterface|null $actualDeliveryDate
     * @return self
     */
    public function setActualDeliveryDate(?\DateTimeInterface $actualDeliveryDate = null): self
    {
        $this->actualDeliveryDate = $actualDeliveryDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActualDeliveryDate(): self
    {
        $this->actualDeliveryDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getActualDeliveryTime(): ?\DateTimeInterface
    {
        return $this->actualDeliveryTime;
    }

    /**
     * @param \DateTimeInterface|null $actualDeliveryTime
     * @return self
     */
    public function setActualDeliveryTime(?\DateTimeInterface $actualDeliveryTime = null): self
    {
        $this->actualDeliveryTime = $actualDeliveryTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActualDeliveryTime(): self
    {
        $this->actualDeliveryTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLatestDeliveryDate(): ?\DateTimeInterface
    {
        return $this->latestDeliveryDate;
    }

    /**
     * @param \DateTimeInterface|null $latestDeliveryDate
     * @return self
     */
    public function setLatestDeliveryDate(?\DateTimeInterface $latestDeliveryDate = null): self
    {
        $this->latestDeliveryDate = $latestDeliveryDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestDeliveryDate(): self
    {
        $this->latestDeliveryDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLatestDeliveryTime(): ?\DateTimeInterface
    {
        return $this->latestDeliveryTime;
    }

    /**
     * @param \DateTimeInterface|null $latestDeliveryTime
     * @return self
     */
    public function setLatestDeliveryTime(?\DateTimeInterface $latestDeliveryTime = null): self
    {
        $this->latestDeliveryTime = $latestDeliveryTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestDeliveryTime(): self
    {
        $this->latestDeliveryTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReleaseID|null
     */
    public function getReleaseID(): ?ReleaseID
    {
        return $this->releaseID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReleaseID
     */
    public function getReleaseIDWithCreate(): ReleaseID
    {
        $this->releaseID = is_null($this->releaseID) ? new ReleaseID() : $this->releaseID;

        return $this->releaseID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReleaseID|null $releaseID
     * @return self
     */
    public function setReleaseID(?ReleaseID $releaseID = null): self
    {
        $this->releaseID = $releaseID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReleaseID(): self
    {
        $this->releaseID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrackingID|null
     */
    public function getTrackingID(): ?TrackingID
    {
        return $this->trackingID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrackingID
     */
    public function getTrackingIDWithCreate(): TrackingID
    {
        $this->trackingID = is_null($this->trackingID) ? new TrackingID() : $this->trackingID;

        return $this->trackingID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TrackingID|null $trackingID
     * @return self
     */
    public function setTrackingID(?TrackingID $trackingID = null): self
    {
        $this->trackingID = $trackingID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTrackingID(): self
    {
        $this->trackingID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryAddress|null
     */
    public function getDeliveryAddress(): ?DeliveryAddress
    {
        return $this->deliveryAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryAddress
     */
    public function getDeliveryAddressWithCreate(): DeliveryAddress
    {
        $this->deliveryAddress = is_null($this->deliveryAddress) ? new DeliveryAddress() : $this->deliveryAddress;

        return $this->deliveryAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryAddress|null $deliveryAddress
     * @return self
     */
    public function setDeliveryAddress(?DeliveryAddress $deliveryAddress = null): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryAddress(): self
    {
        $this->deliveryAddress = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null
     */
    public function getDeliveryLocation(): ?DeliveryLocation
    {
        return $this->deliveryLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation
     */
    public function getDeliveryLocationWithCreate(): DeliveryLocation
    {
        $this->deliveryLocation = is_null($this->deliveryLocation) ? new DeliveryLocation() : $this->deliveryLocation;

        return $this->deliveryLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null $deliveryLocation
     * @return self
     */
    public function setDeliveryLocation(?DeliveryLocation $deliveryLocation = null): self
    {
        $this->deliveryLocation = $deliveryLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryLocation(): self
    {
        $this->deliveryLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AlternativeDeliveryLocation|null
     */
    public function getAlternativeDeliveryLocation(): ?AlternativeDeliveryLocation
    {
        return $this->alternativeDeliveryLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AlternativeDeliveryLocation
     */
    public function getAlternativeDeliveryLocationWithCreate(): AlternativeDeliveryLocation
    {
        $this->alternativeDeliveryLocation = is_null($this->alternativeDeliveryLocation) ? new AlternativeDeliveryLocation() : $this->alternativeDeliveryLocation;

        return $this->alternativeDeliveryLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AlternativeDeliveryLocation|null $alternativeDeliveryLocation
     * @return self
     */
    public function setAlternativeDeliveryLocation(
        ?AlternativeDeliveryLocation $alternativeDeliveryLocation = null,
    ): self {
        $this->alternativeDeliveryLocation = $alternativeDeliveryLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAlternativeDeliveryLocation(): self
    {
        $this->alternativeDeliveryLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDeliveryPeriod|null
     */
    public function getRequestedDeliveryPeriod(): ?RequestedDeliveryPeriod
    {
        return $this->requestedDeliveryPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDeliveryPeriod
     */
    public function getRequestedDeliveryPeriodWithCreate(): RequestedDeliveryPeriod
    {
        $this->requestedDeliveryPeriod = is_null($this->requestedDeliveryPeriod) ? new RequestedDeliveryPeriod() : $this->requestedDeliveryPeriod;

        return $this->requestedDeliveryPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedDeliveryPeriod|null $requestedDeliveryPeriod
     * @return self
     */
    public function setRequestedDeliveryPeriod(?RequestedDeliveryPeriod $requestedDeliveryPeriod = null): self
    {
        $this->requestedDeliveryPeriod = $requestedDeliveryPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedDeliveryPeriod(): self
    {
        $this->requestedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromisedDeliveryPeriod|null
     */
    public function getPromisedDeliveryPeriod(): ?PromisedDeliveryPeriod
    {
        return $this->promisedDeliveryPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromisedDeliveryPeriod
     */
    public function getPromisedDeliveryPeriodWithCreate(): PromisedDeliveryPeriod
    {
        $this->promisedDeliveryPeriod = is_null($this->promisedDeliveryPeriod) ? new PromisedDeliveryPeriod() : $this->promisedDeliveryPeriod;

        return $this->promisedDeliveryPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PromisedDeliveryPeriod|null $promisedDeliveryPeriod
     * @return self
     */
    public function setPromisedDeliveryPeriod(?PromisedDeliveryPeriod $promisedDeliveryPeriod = null): self
    {
        $this->promisedDeliveryPeriod = $promisedDeliveryPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPromisedDeliveryPeriod(): self
    {
        $this->promisedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDeliveryPeriod|null
     */
    public function getEstimatedDeliveryPeriod(): ?EstimatedDeliveryPeriod
    {
        return $this->estimatedDeliveryPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDeliveryPeriod
     */
    public function getEstimatedDeliveryPeriodWithCreate(): EstimatedDeliveryPeriod
    {
        $this->estimatedDeliveryPeriod = is_null($this->estimatedDeliveryPeriod) ? new EstimatedDeliveryPeriod() : $this->estimatedDeliveryPeriod;

        return $this->estimatedDeliveryPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedDeliveryPeriod|null $estimatedDeliveryPeriod
     * @return self
     */
    public function setEstimatedDeliveryPeriod(?EstimatedDeliveryPeriod $estimatedDeliveryPeriod = null): self
    {
        $this->estimatedDeliveryPeriod = $estimatedDeliveryPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEstimatedDeliveryPeriod(): self
    {
        $this->estimatedDeliveryPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CarrierParty|null
     */
    public function getCarrierParty(): ?CarrierParty
    {
        return $this->carrierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CarrierParty
     */
    public function getCarrierPartyWithCreate(): CarrierParty
    {
        $this->carrierParty = is_null($this->carrierParty) ? new CarrierParty() : $this->carrierParty;

        return $this->carrierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CarrierParty|null $carrierParty
     * @return self
     */
    public function setCarrierParty(?CarrierParty $carrierParty = null): self
    {
        $this->carrierParty = $carrierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCarrierParty(): self
    {
        $this->carrierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryParty|null
     */
    public function getDeliveryParty(): ?DeliveryParty
    {
        return $this->deliveryParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryParty
     */
    public function getDeliveryPartyWithCreate(): DeliveryParty
    {
        $this->deliveryParty = is_null($this->deliveryParty) ? new DeliveryParty() : $this->deliveryParty;

        return $this->deliveryParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryParty|null $deliveryParty
     * @return self
     */
    public function setDeliveryParty(?DeliveryParty $deliveryParty = null): self
    {
        $this->deliveryParty = $deliveryParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryParty(): self
    {
        $this->deliveryParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null
     */
    public function getNotifyParty(): ?array
    {
        return $this->notifyParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null $notifyParty
     * @return self
     */
    public function setNotifyParty(?array $notifyParty = null): self
    {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNotifyParty(): self
    {
        $this->notifyParty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNotifyParty(): self
    {
        $this->notifyParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotifyParty $notifyParty
     * @return self
     */
    public function addToNotifyParty(NotifyParty $notifyParty): self
    {
        $this->notifyParty[] = $notifyParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotifyParty
     */
    public function addToNotifyPartyWithCreate(): NotifyParty
    {
        $this->addTonotifyParty($notifyParty = new NotifyParty());

        return $notifyParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotifyParty $notifyParty
     * @return self
     */
    public function addOnceToNotifyParty(NotifyParty $notifyParty): self
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        $this->notifyParty[0] = $notifyParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotifyParty
     */
    public function addOnceToNotifyPartyWithCreate(): NotifyParty
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        if ($this->notifyParty === []) {
            $this->addOnceTonotifyParty(new NotifyParty());
        }

        return $this->notifyParty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Despatch|null
     */
    public function getDespatch(): ?Despatch
    {
        return $this->despatch;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Despatch
     */
    public function getDespatchWithCreate(): Despatch
    {
        $this->despatch = is_null($this->despatch) ? new Despatch() : $this->despatch;

        return $this->despatch;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Despatch|null $despatch
     * @return self
     */
    public function setDespatch(?Despatch $despatch = null): self
    {
        $this->despatch = $despatch;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatch(): self
    {
        $this->despatch = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms>|null
     */
    public function getDeliveryTerms(): ?array
    {
        return $this->deliveryTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms>|null $deliveryTerms
     * @return self
     */
    public function setDeliveryTerms(?array $deliveryTerms = null): self
    {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryTerms(): self
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryTerms(): self
    {
        $this->deliveryTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function addToDeliveryTerms(DeliveryTerms $deliveryTerms): self
    {
        $this->deliveryTerms[] = $deliveryTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms
     */
    public function addToDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->addTodeliveryTerms($deliveryTerms = new DeliveryTerms());

        return $deliveryTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function addOnceToDeliveryTerms(DeliveryTerms $deliveryTerms): self
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        $this->deliveryTerms[0] = $deliveryTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTerms
     */
    public function addOnceToDeliveryTermsWithCreate(): DeliveryTerms
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        if ($this->deliveryTerms === []) {
            $this->addOnceTodeliveryTerms(new DeliveryTerms());
        }

        return $this->deliveryTerms[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MinimumDeliveryUnit|null
     */
    public function getMinimumDeliveryUnit(): ?MinimumDeliveryUnit
    {
        return $this->minimumDeliveryUnit;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MinimumDeliveryUnit
     */
    public function getMinimumDeliveryUnitWithCreate(): MinimumDeliveryUnit
    {
        $this->minimumDeliveryUnit = is_null($this->minimumDeliveryUnit) ? new MinimumDeliveryUnit() : $this->minimumDeliveryUnit;

        return $this->minimumDeliveryUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MinimumDeliveryUnit|null $minimumDeliveryUnit
     * @return self
     */
    public function setMinimumDeliveryUnit(?MinimumDeliveryUnit $minimumDeliveryUnit = null): self
    {
        $this->minimumDeliveryUnit = $minimumDeliveryUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumDeliveryUnit(): self
    {
        $this->minimumDeliveryUnit = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaximumDeliveryUnit|null
     */
    public function getMaximumDeliveryUnit(): ?MaximumDeliveryUnit
    {
        return $this->maximumDeliveryUnit;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaximumDeliveryUnit
     */
    public function getMaximumDeliveryUnitWithCreate(): MaximumDeliveryUnit
    {
        $this->maximumDeliveryUnit = is_null($this->maximumDeliveryUnit) ? new MaximumDeliveryUnit() : $this->maximumDeliveryUnit;

        return $this->maximumDeliveryUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MaximumDeliveryUnit|null $maximumDeliveryUnit
     * @return self
     */
    public function setMaximumDeliveryUnit(?MaximumDeliveryUnit $maximumDeliveryUnit = null): self
    {
        $this->maximumDeliveryUnit = $maximumDeliveryUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumDeliveryUnit(): self
    {
        $this->maximumDeliveryUnit = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment|null
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment
     */
    public function getShipmentWithCreate(): Shipment
    {
        $this->shipment = is_null($this->shipment) ? new Shipment() : $this->shipment;

        return $this->shipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Shipment|null $shipment
     * @return self
     */
    public function setShipment(?Shipment $shipment = null): self
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShipment(): self
    {
        $this->shipment = null;

        return $this;
    }
}
