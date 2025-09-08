<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Instructions;
use horstoeko\invoicesuite\models\ubl\cbc\ReleaseID;

class DespatchType
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
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchDate", setter="setRequestedDespatchDate")
     */
    private $requestedDespatchDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchTime", setter="setRequestedDespatchTime")
     */
    private $requestedDespatchTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchDate", setter="setEstimatedDespatchDate")
     */
    private $estimatedDespatchDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchTime", setter="setEstimatedDespatchTime")
     */
    private $estimatedDespatchTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDespatchDate", setter="setActualDespatchDate")
     */
    private $actualDespatchDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDespatchTime", setter="setActualDespatchTime")
     */
    private $actualDespatchTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteedDespatchDate", setter="setGuaranteedDespatchDate")
     */
    private $guaranteedDespatchDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteedDespatchTime", setter="setGuaranteedDespatchTime")
     */
    private $guaranteedDespatchTime;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Instructions>")
     * @JMS\Expose
     * @JMS\SerializedName("Instructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Instructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInstructions", setter="setInstructions")
     */
    private $instructions;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DespatchAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DespatchAddress")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchAddress", setter="setDespatchAddress")
     */
    private $despatchAddress;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DespatchLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DespatchLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchLocation", setter="setDespatchLocation")
     */
    private $despatchLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DespatchParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DespatchParty")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchParty", setter="setDespatchParty")
     */
    private $despatchParty;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\Contact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Contact")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedDespatchPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedDespatchPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchPeriod", setter="setEstimatedDespatchPeriod")
     */
    private $estimatedDespatchPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequestedDespatchPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequestedDespatchPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchPeriod", setter="setRequestedDespatchPeriod")
     */
    private $requestedDespatchPeriod;

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
     * @return \DateTimeInterface|null
     */
    public function getRequestedDespatchDate(): ?\DateTimeInterface
    {
        return $this->requestedDespatchDate;
    }

    /**
     * @param \DateTimeInterface|null $requestedDespatchDate
     * @return self
     */
    public function setRequestedDespatchDate(?\DateTimeInterface $requestedDespatchDate = null): self
    {
        $this->requestedDespatchDate = $requestedDespatchDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedDespatchDate(): self
    {
        $this->requestedDespatchDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequestedDespatchTime(): ?\DateTimeInterface
    {
        return $this->requestedDespatchTime;
    }

    /**
     * @param \DateTimeInterface|null $requestedDespatchTime
     * @return self
     */
    public function setRequestedDespatchTime(?\DateTimeInterface $requestedDespatchTime = null): self
    {
        $this->requestedDespatchTime = $requestedDespatchTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedDespatchTime(): self
    {
        $this->requestedDespatchTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEstimatedDespatchDate(): ?\DateTimeInterface
    {
        return $this->estimatedDespatchDate;
    }

    /**
     * @param \DateTimeInterface|null $estimatedDespatchDate
     * @return self
     */
    public function setEstimatedDespatchDate(?\DateTimeInterface $estimatedDespatchDate = null): self
    {
        $this->estimatedDespatchDate = $estimatedDespatchDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEstimatedDespatchDate(): self
    {
        $this->estimatedDespatchDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEstimatedDespatchTime(): ?\DateTimeInterface
    {
        return $this->estimatedDespatchTime;
    }

    /**
     * @param \DateTimeInterface|null $estimatedDespatchTime
     * @return self
     */
    public function setEstimatedDespatchTime(?\DateTimeInterface $estimatedDespatchTime = null): self
    {
        $this->estimatedDespatchTime = $estimatedDespatchTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEstimatedDespatchTime(): self
    {
        $this->estimatedDespatchTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getActualDespatchDate(): ?\DateTimeInterface
    {
        return $this->actualDespatchDate;
    }

    /**
     * @param \DateTimeInterface|null $actualDespatchDate
     * @return self
     */
    public function setActualDespatchDate(?\DateTimeInterface $actualDespatchDate = null): self
    {
        $this->actualDespatchDate = $actualDespatchDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActualDespatchDate(): self
    {
        $this->actualDespatchDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getActualDespatchTime(): ?\DateTimeInterface
    {
        return $this->actualDespatchTime;
    }

    /**
     * @param \DateTimeInterface|null $actualDespatchTime
     * @return self
     */
    public function setActualDespatchTime(?\DateTimeInterface $actualDespatchTime = null): self
    {
        $this->actualDespatchTime = $actualDespatchTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActualDespatchTime(): self
    {
        $this->actualDespatchTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getGuaranteedDespatchDate(): ?\DateTimeInterface
    {
        return $this->guaranteedDespatchDate;
    }

    /**
     * @param \DateTimeInterface|null $guaranteedDespatchDate
     * @return self
     */
    public function setGuaranteedDespatchDate(?\DateTimeInterface $guaranteedDespatchDate = null): self
    {
        $this->guaranteedDespatchDate = $guaranteedDespatchDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGuaranteedDespatchDate(): self
    {
        $this->guaranteedDespatchDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getGuaranteedDespatchTime(): ?\DateTimeInterface
    {
        return $this->guaranteedDespatchTime;
    }

    /**
     * @param \DateTimeInterface|null $guaranteedDespatchTime
     * @return self
     */
    public function setGuaranteedDespatchTime(?\DateTimeInterface $guaranteedDespatchTime = null): self
    {
        $this->guaranteedDespatchTime = $guaranteedDespatchTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGuaranteedDespatchTime(): self
    {
        $this->guaranteedDespatchTime = null;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null
     */
    public function getInstructions(): ?array
    {
        return $this->instructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null $instructions
     * @return self
     */
    public function setInstructions(?array $instructions = null): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInstructions(): self
    {
        $this->instructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInstructions(): self
    {
        $this->instructions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Instructions $instructions
     * @return self
     */
    public function addToInstructions(Instructions $instructions): self
    {
        $this->instructions[] = $instructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Instructions
     */
    public function addToInstructionsWithCreate(): Instructions
    {
        $this->addToinstructions($instructions = new Instructions());

        return $instructions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Instructions $instructions
     * @return self
     */
    public function addOnceToInstructions(Instructions $instructions): self
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        $this->instructions[0] = $instructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Instructions
     */
    public function addOnceToInstructionsWithCreate(): Instructions
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        if ($this->instructions === []) {
            $this->addOnceToinstructions(new Instructions());
        }

        return $this->instructions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchAddress|null
     */
    public function getDespatchAddress(): ?DespatchAddress
    {
        return $this->despatchAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchAddress
     */
    public function getDespatchAddressWithCreate(): DespatchAddress
    {
        $this->despatchAddress = is_null($this->despatchAddress) ? new DespatchAddress() : $this->despatchAddress;

        return $this->despatchAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DespatchAddress|null $despatchAddress
     * @return self
     */
    public function setDespatchAddress(?DespatchAddress $despatchAddress = null): self
    {
        $this->despatchAddress = $despatchAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatchAddress(): self
    {
        $this->despatchAddress = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchLocation|null
     */
    public function getDespatchLocation(): ?DespatchLocation
    {
        return $this->despatchLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchLocation
     */
    public function getDespatchLocationWithCreate(): DespatchLocation
    {
        $this->despatchLocation = is_null($this->despatchLocation) ? new DespatchLocation() : $this->despatchLocation;

        return $this->despatchLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DespatchLocation|null $despatchLocation
     * @return self
     */
    public function setDespatchLocation(?DespatchLocation $despatchLocation = null): self
    {
        $this->despatchLocation = $despatchLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatchLocation(): self
    {
        $this->despatchLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchParty|null
     */
    public function getDespatchParty(): ?DespatchParty
    {
        return $this->despatchParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchParty
     */
    public function getDespatchPartyWithCreate(): DespatchParty
    {
        $this->despatchParty = is_null($this->despatchParty) ? new DespatchParty() : $this->despatchParty;

        return $this->despatchParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DespatchParty|null $despatchParty
     * @return self
     */
    public function setDespatchParty(?DespatchParty $despatchParty = null): self
    {
        $this->despatchParty = $despatchParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatchParty(): self
    {
        $this->despatchParty = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact
     */
    public function getContactWithCreate(): Contact
    {
        $this->contact = is_null($this->contact) ? new Contact() : $this->contact;

        return $this->contact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Contact|null $contact
     * @return self
     */
    public function setContact(?Contact $contact = null): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContact(): self
    {
        $this->contact = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDespatchPeriod|null
     */
    public function getEstimatedDespatchPeriod(): ?EstimatedDespatchPeriod
    {
        return $this->estimatedDespatchPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDespatchPeriod
     */
    public function getEstimatedDespatchPeriodWithCreate(): EstimatedDespatchPeriod
    {
        $this->estimatedDespatchPeriod = is_null($this->estimatedDespatchPeriod) ? new EstimatedDespatchPeriod() : $this->estimatedDespatchPeriod;

        return $this->estimatedDespatchPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedDespatchPeriod|null $estimatedDespatchPeriod
     * @return self
     */
    public function setEstimatedDespatchPeriod(?EstimatedDespatchPeriod $estimatedDespatchPeriod = null): self
    {
        $this->estimatedDespatchPeriod = $estimatedDespatchPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEstimatedDespatchPeriod(): self
    {
        $this->estimatedDespatchPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDespatchPeriod|null
     */
    public function getRequestedDespatchPeriod(): ?RequestedDespatchPeriod
    {
        return $this->requestedDespatchPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDespatchPeriod
     */
    public function getRequestedDespatchPeriodWithCreate(): RequestedDespatchPeriod
    {
        $this->requestedDespatchPeriod = is_null($this->requestedDespatchPeriod) ? new RequestedDespatchPeriod() : $this->requestedDespatchPeriod;

        return $this->requestedDespatchPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedDespatchPeriod|null $requestedDespatchPeriod
     * @return self
     */
    public function setRequestedDespatchPeriod(?RequestedDespatchPeriod $requestedDespatchPeriod = null): self
    {
        $this->requestedDespatchPeriod = $requestedDespatchPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedDespatchPeriod(): self
    {
        $this->requestedDespatchPeriod = null;

        return $this;
    }
}
