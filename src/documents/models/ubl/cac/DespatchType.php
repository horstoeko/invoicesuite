<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Instructions;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ReleaseID;
use JMS\Serializer\Annotation as JMS;

class DespatchType
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
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchDate", setter="setRequestedDespatchDate")
     */
    private $requestedDespatchDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchTime", setter="setRequestedDespatchTime")
     */
    private $requestedDespatchTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchDate", setter="setEstimatedDespatchDate")
     */
    private $estimatedDespatchDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchTime", setter="setEstimatedDespatchTime")
     */
    private $estimatedDespatchTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDespatchDate", setter="setActualDespatchDate")
     */
    private $actualDespatchDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDespatchTime", setter="setActualDespatchTime")
     */
    private $actualDespatchTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteedDespatchDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteedDespatchDate", setter="setGuaranteedDespatchDate")
     */
    private $guaranteedDespatchDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteedDespatchTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteedDespatchTime", setter="setGuaranteedDespatchTime")
     */
    private $guaranteedDespatchTime;

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
     * @var null|array<Instructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Instructions>")
     * @JMS\Expose
     * @JMS\SerializedName("Instructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Instructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInstructions", setter="setInstructions")
     */
    private $instructions;

    /**
     * @var null|DespatchAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DespatchAddress")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchAddress", setter="setDespatchAddress")
     */
    private $despatchAddress;

    /**
     * @var null|DespatchLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DespatchLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchLocation", setter="setDespatchLocation")
     */
    private $despatchLocation;

    /**
     * @var null|DespatchParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DespatchParty")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchParty", setter="setDespatchParty")
     */
    private $despatchParty;

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
     * @var null|Contact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Contact")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var null|EstimatedDespatchPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EstimatedDespatchPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDespatchPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDespatchPeriod", setter="setEstimatedDespatchPeriod")
     */
    private $estimatedDespatchPeriod;

    /**
     * @var null|RequestedDespatchPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\RequestedDespatchPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDespatchPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDespatchPeriod", setter="setRequestedDespatchPeriod")
     */
    private $requestedDespatchPeriod;

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
    public function getRequestedDespatchDate(): ?DateTimeInterface
    {
        return $this->requestedDespatchDate;
    }

    /**
     * @param  null|DateTimeInterface $requestedDespatchDate
     * @return static
     */
    public function setRequestedDespatchDate(?DateTimeInterface $requestedDespatchDate = null): static
    {
        $this->requestedDespatchDate = $requestedDespatchDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDespatchDate(): static
    {
        $this->requestedDespatchDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getRequestedDespatchTime(): ?DateTimeInterface
    {
        return $this->requestedDespatchTime;
    }

    /**
     * @param  null|DateTimeInterface $requestedDespatchTime
     * @return static
     */
    public function setRequestedDespatchTime(?DateTimeInterface $requestedDespatchTime = null): static
    {
        $this->requestedDespatchTime = $requestedDespatchTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDespatchTime(): static
    {
        $this->requestedDespatchTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEstimatedDespatchDate(): ?DateTimeInterface
    {
        return $this->estimatedDespatchDate;
    }

    /**
     * @param  null|DateTimeInterface $estimatedDespatchDate
     * @return static
     */
    public function setEstimatedDespatchDate(?DateTimeInterface $estimatedDespatchDate = null): static
    {
        $this->estimatedDespatchDate = $estimatedDespatchDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDespatchDate(): static
    {
        $this->estimatedDespatchDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEstimatedDespatchTime(): ?DateTimeInterface
    {
        return $this->estimatedDespatchTime;
    }

    /**
     * @param  null|DateTimeInterface $estimatedDespatchTime
     * @return static
     */
    public function setEstimatedDespatchTime(?DateTimeInterface $estimatedDespatchTime = null): static
    {
        $this->estimatedDespatchTime = $estimatedDespatchTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDespatchTime(): static
    {
        $this->estimatedDespatchTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualDespatchDate(): ?DateTimeInterface
    {
        return $this->actualDespatchDate;
    }

    /**
     * @param  null|DateTimeInterface $actualDespatchDate
     * @return static
     */
    public function setActualDespatchDate(?DateTimeInterface $actualDespatchDate = null): static
    {
        $this->actualDespatchDate = $actualDespatchDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDespatchDate(): static
    {
        $this->actualDespatchDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getActualDespatchTime(): ?DateTimeInterface
    {
        return $this->actualDespatchTime;
    }

    /**
     * @param  null|DateTimeInterface $actualDespatchTime
     * @return static
     */
    public function setActualDespatchTime(?DateTimeInterface $actualDespatchTime = null): static
    {
        $this->actualDespatchTime = $actualDespatchTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDespatchTime(): static
    {
        $this->actualDespatchTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getGuaranteedDespatchDate(): ?DateTimeInterface
    {
        return $this->guaranteedDespatchDate;
    }

    /**
     * @param  null|DateTimeInterface $guaranteedDespatchDate
     * @return static
     */
    public function setGuaranteedDespatchDate(?DateTimeInterface $guaranteedDespatchDate = null): static
    {
        $this->guaranteedDespatchDate = $guaranteedDespatchDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGuaranteedDespatchDate(): static
    {
        $this->guaranteedDespatchDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getGuaranteedDespatchTime(): ?DateTimeInterface
    {
        return $this->guaranteedDespatchTime;
    }

    /**
     * @param  null|DateTimeInterface $guaranteedDespatchTime
     * @return static
     */
    public function setGuaranteedDespatchTime(?DateTimeInterface $guaranteedDespatchTime = null): static
    {
        $this->guaranteedDespatchTime = $guaranteedDespatchTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGuaranteedDespatchTime(): static
    {
        $this->guaranteedDespatchTime = null;

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
     * @return null|array<Instructions>
     */
    public function getInstructions(): ?array
    {
        return $this->instructions;
    }

    /**
     * @param  null|array<Instructions> $instructions
     * @return static
     */
    public function setInstructions(?array $instructions = null): static
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstructions(): static
    {
        $this->instructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInstructions(): static
    {
        $this->instructions = [];

        return $this;
    }

    /**
     * @return null|Instructions
     */
    public function firstInstructions(): ?Instructions
    {
        $instructions = $this->instructions ?? [];
        $instructions = reset($instructions);

        if (false === $instructions) {
            return null;
        }

        return $instructions;
    }

    /**
     * @return null|Instructions
     */
    public function lastInstructions(): ?Instructions
    {
        $instructions = $this->instructions ?? [];
        $instructions = end($instructions);

        if (false === $instructions) {
            return null;
        }

        return $instructions;
    }

    /**
     * @param  Instructions $instructions
     * @return static
     */
    public function addToInstructions(Instructions $instructions): static
    {
        $this->instructions[] = $instructions;

        return $this;
    }

    /**
     * @return Instructions
     */
    public function addToInstructionsWithCreate(): Instructions
    {
        $this->addToinstructions($instructions = new Instructions());

        return $instructions;
    }

    /**
     * @param  Instructions $instructions
     * @return static
     */
    public function addOnceToInstructions(Instructions $instructions): static
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        $this->instructions[0] = $instructions;

        return $this;
    }

    /**
     * @return Instructions
     */
    public function addOnceToInstructionsWithCreate(): Instructions
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        if ([] === $this->instructions) {
            $this->addOnceToinstructions(new Instructions());
        }

        return $this->instructions[0];
    }

    /**
     * @return null|DespatchAddress
     */
    public function getDespatchAddress(): ?DespatchAddress
    {
        return $this->despatchAddress;
    }

    /**
     * @return DespatchAddress
     */
    public function getDespatchAddressWithCreate(): DespatchAddress
    {
        $this->despatchAddress = is_null($this->despatchAddress) ? new DespatchAddress() : $this->despatchAddress;

        return $this->despatchAddress;
    }

    /**
     * @param  null|DespatchAddress $despatchAddress
     * @return static
     */
    public function setDespatchAddress(?DespatchAddress $despatchAddress = null): static
    {
        $this->despatchAddress = $despatchAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchAddress(): static
    {
        $this->despatchAddress = null;

        return $this;
    }

    /**
     * @return null|DespatchLocation
     */
    public function getDespatchLocation(): ?DespatchLocation
    {
        return $this->despatchLocation;
    }

    /**
     * @return DespatchLocation
     */
    public function getDespatchLocationWithCreate(): DespatchLocation
    {
        $this->despatchLocation = is_null($this->despatchLocation) ? new DespatchLocation() : $this->despatchLocation;

        return $this->despatchLocation;
    }

    /**
     * @param  null|DespatchLocation $despatchLocation
     * @return static
     */
    public function setDespatchLocation(?DespatchLocation $despatchLocation = null): static
    {
        $this->despatchLocation = $despatchLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchLocation(): static
    {
        $this->despatchLocation = null;

        return $this;
    }

    /**
     * @return null|DespatchParty
     */
    public function getDespatchParty(): ?DespatchParty
    {
        return $this->despatchParty;
    }

    /**
     * @return DespatchParty
     */
    public function getDespatchPartyWithCreate(): DespatchParty
    {
        $this->despatchParty = is_null($this->despatchParty) ? new DespatchParty() : $this->despatchParty;

        return $this->despatchParty;
    }

    /**
     * @param  null|DespatchParty $despatchParty
     * @return static
     */
    public function setDespatchParty(?DespatchParty $despatchParty = null): static
    {
        $this->despatchParty = $despatchParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchParty(): static
    {
        $this->despatchParty = null;

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
     * @return null|Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return Contact
     */
    public function getContactWithCreate(): Contact
    {
        $this->contact = is_null($this->contact) ? new Contact() : $this->contact;

        return $this->contact;
    }

    /**
     * @param  null|Contact $contact
     * @return static
     */
    public function setContact(?Contact $contact = null): static
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContact(): static
    {
        $this->contact = null;

        return $this;
    }

    /**
     * @return null|EstimatedDespatchPeriod
     */
    public function getEstimatedDespatchPeriod(): ?EstimatedDespatchPeriod
    {
        return $this->estimatedDespatchPeriod;
    }

    /**
     * @return EstimatedDespatchPeriod
     */
    public function getEstimatedDespatchPeriodWithCreate(): EstimatedDespatchPeriod
    {
        $this->estimatedDespatchPeriod = is_null($this->estimatedDespatchPeriod) ? new EstimatedDespatchPeriod() : $this->estimatedDespatchPeriod;

        return $this->estimatedDespatchPeriod;
    }

    /**
     * @param  null|EstimatedDespatchPeriod $estimatedDespatchPeriod
     * @return static
     */
    public function setEstimatedDespatchPeriod(?EstimatedDespatchPeriod $estimatedDespatchPeriod = null): static
    {
        $this->estimatedDespatchPeriod = $estimatedDespatchPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDespatchPeriod(): static
    {
        $this->estimatedDespatchPeriod = null;

        return $this;
    }

    /**
     * @return null|RequestedDespatchPeriod
     */
    public function getRequestedDespatchPeriod(): ?RequestedDespatchPeriod
    {
        return $this->requestedDespatchPeriod;
    }

    /**
     * @return RequestedDespatchPeriod
     */
    public function getRequestedDespatchPeriodWithCreate(): RequestedDespatchPeriod
    {
        $this->requestedDespatchPeriod = is_null($this->requestedDespatchPeriod) ? new RequestedDespatchPeriod() : $this->requestedDespatchPeriod;

        return $this->requestedDespatchPeriod;
    }

    /**
     * @param  null|RequestedDespatchPeriod $requestedDespatchPeriod
     * @return static
     */
    public function setRequestedDespatchPeriod(?RequestedDespatchPeriod $requestedDespatchPeriod = null): static
    {
        $this->requestedDespatchPeriod = $requestedDespatchPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDespatchPeriod(): static
    {
        $this->requestedDespatchPeriod = null;

        return $this;
    }
}
