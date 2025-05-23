<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\IdentificationID;
use horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode;

class TransportEventType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\IdentificationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\IdentificationID")
     * @JMS\Expose
     * @JMS\SerializedName("IdentificationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIdentificationID", setter="setIdentificationID")
     */
    private $identificationID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDate", setter="setOccurrenceDate")
     */
    private $occurrenceDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceTime", setter="setOccurrenceTime")
     */
    private $occurrenceTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEventTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportEventTypeCode", setter="setTransportEventTypeCode")
     */
    private $transportEventTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CompletionIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCompletionIndicator", setter="setCompletionIndicator")
     */
    private $completionIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReportedShipment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReportedShipment")
     * @JMS\Expose
     * @JMS\SerializedName("ReportedShipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReportedShipment", setter="setReportedShipment")
     */
    private $reportedShipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CurrentStatus>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CurrentStatus>")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentStatus")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CurrentStatus", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCurrentStatus", setter="setCurrentStatus")
     */
    private $currentStatus;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Contact>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Contact>")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Contact", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Location|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Location")
     * @JMS\Expose
     * @JMS\SerializedName("Location")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocation", setter="setLocation")
     */
    private $location;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Signature|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Signature")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Period>")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Period", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IdentificationID|null
     */
    public function getIdentificationID(): ?IdentificationID
    {
        return $this->identificationID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IdentificationID
     */
    public function getIdentificationIDWithCreate(): IdentificationID
    {
        $this->identificationID = is_null($this->identificationID) ? new IdentificationID() : $this->identificationID;

        return $this->identificationID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\IdentificationID|null $identificationID
     * @return self
     */
    public function setIdentificationID(?IdentificationID $identificationID = null): self
    {
        $this->identificationID = $identificationID;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getOccurrenceDate(): ?\DateTimeInterface
    {
        return $this->occurrenceDate;
    }

    /**
     * @param \DateTimeInterface|null $occurrenceDate
     * @return self
     */
    public function setOccurrenceDate(?\DateTimeInterface $occurrenceDate = null): self
    {
        $this->occurrenceDate = $occurrenceDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getOccurrenceTime(): ?\DateTimeInterface
    {
        return $this->occurrenceTime;
    }

    /**
     * @param \DateTimeInterface|null $occurrenceTime
     * @return self
     */
    public function setOccurrenceTime(?\DateTimeInterface $occurrenceTime = null): self
    {
        $this->occurrenceTime = $occurrenceTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode|null
     */
    public function getTransportEventTypeCode(): ?TransportEventTypeCode
    {
        return $this->transportEventTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode
     */
    public function getTransportEventTypeCodeWithCreate(): TransportEventTypeCode
    {
        $this->transportEventTypeCode = is_null($this->transportEventTypeCode) ? new TransportEventTypeCode() : $this->transportEventTypeCode;

        return $this->transportEventTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportEventTypeCode|null $transportEventTypeCode
     * @return self
     */
    public function setTransportEventTypeCode(?TransportEventTypeCode $transportEventTypeCode = null): self
    {
        $this->transportEventTypeCode = $transportEventTypeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return bool|null
     */
    public function getCompletionIndicator(): ?bool
    {
        return $this->completionIndicator;
    }

    /**
     * @param bool|null $completionIndicator
     * @return self
     */
    public function setCompletionIndicator(?bool $completionIndicator = null): self
    {
        $this->completionIndicator = $completionIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReportedShipment|null
     */
    public function getReportedShipment(): ?ReportedShipment
    {
        return $this->reportedShipment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReportedShipment
     */
    public function getReportedShipmentWithCreate(): ReportedShipment
    {
        $this->reportedShipment = is_null($this->reportedShipment) ? new ReportedShipment() : $this->reportedShipment;

        return $this->reportedShipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReportedShipment|null $reportedShipment
     * @return self
     */
    public function setReportedShipment(?ReportedShipment $reportedShipment = null): self
    {
        $this->reportedShipment = $reportedShipment;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CurrentStatus>|null
     */
    public function getCurrentStatus(): ?array
    {
        return $this->currentStatus;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CurrentStatus>|null $currentStatus
     * @return self
     */
    public function setCurrentStatus(?array $currentStatus = null): self
    {
        $this->currentStatus = $currentStatus;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCurrentStatus(): self
    {
        $this->currentStatus = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CurrentStatus $currentStatus
     * @return self
     */
    public function addToCurrentStatus(CurrentStatus $currentStatus): self
    {
        $this->currentStatus[] = $currentStatus;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CurrentStatus
     */
    public function addToCurrentStatusWithCreate(): CurrentStatus
    {
        $this->addTocurrentStatus($currentStatus = new CurrentStatus());

        return $currentStatus;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CurrentStatus $currentStatus
     * @return self
     */
    public function addOnceToCurrentStatus(CurrentStatus $currentStatus): self
    {
        if (!is_array($this->currentStatus)) {
            $this->currentStatus = [];
        }

        $this->currentStatus[0] = $currentStatus;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CurrentStatus
     */
    public function addOnceToCurrentStatusWithCreate(): CurrentStatus
    {
        if (!is_array($this->currentStatus)) {
            $this->currentStatus = [];
        }

        if ($this->currentStatus === []) {
            $this->addOnceTocurrentStatus(new CurrentStatus());
        }

        return $this->currentStatus[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Contact>|null
     */
    public function getContact(): ?array
    {
        return $this->contact;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Contact>|null $contact
     * @return self
     */
    public function setContact(?array $contact = null): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContact(): self
    {
        $this->contact = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Contact $contact
     * @return self
     */
    public function addToContact(Contact $contact): self
    {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact
     */
    public function addToContactWithCreate(): Contact
    {
        $this->addTocontact($contact = new Contact());

        return $contact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Contact $contact
     * @return self
     */
    public function addOnceToContact(Contact $contact): self
    {
        if (!is_array($this->contact)) {
            $this->contact = [];
        }

        $this->contact[0] = $contact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contact
     */
    public function addOnceToContactWithCreate(): Contact
    {
        if (!is_array($this->contact)) {
            $this->contact = [];
        }

        if ($this->contact === []) {
            $this->addOnceTocontact(new Contact());
        }

        return $this->contact[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Location
     */
    public function getLocationWithCreate(): Location
    {
        $this->location = is_null($this->location) ? new Location() : $this->location;

        return $this->location;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Location|null $location
     * @return self
     */
    public function setLocation(?Location $location = null): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature|null
     */
    public function getSignature(): ?Signature
    {
        return $this->signature;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature
     */
    public function getSignatureWithCreate(): Signature
    {
        $this->signature = is_null($this->signature) ? new Signature() : $this->signature;

        return $this->signature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Signature|null $signature
     * @return self
     */
    public function setSignature(?Signature $signature = null): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null
     */
    public function getPeriod(): ?array
    {
        return $this->period;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Period>|null $period
     * @return self
     */
    public function setPeriod(?array $period = null): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPeriod(): self
    {
        $this->period = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period $period
     * @return self
     */
    public function addToPeriod(Period $period): self
    {
        $this->period[] = $period;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function addToPeriodWithCreate(): Period
    {
        $this->addToperiod($period = new Period());

        return $period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period $period
     * @return self
     */
    public function addOnceToPeriod(Period $period): self
    {
        if (!is_array($this->period)) {
            $this->period = [];
        }

        $this->period[0] = $period;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function addOnceToPeriodWithCreate(): Period
    {
        if (!is_array($this->period)) {
            $this->period = [];
        }

        if ($this->period === []) {
            $this->addOnceToperiod(new Period());
        }

        return $this->period[0];
    }
}
