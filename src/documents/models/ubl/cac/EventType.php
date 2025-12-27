<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\IdentificationID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TypeCode;
use JMS\Serializer\Annotation as JMS;

class EventType
{
    use HandlesObjectFlags;

    /**
     * @var null|IdentificationID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\IdentificationID")
     * @JMS\Expose
     * @JMS\SerializedName("IdentificationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIdentificationID", setter="setIdentificationID")
     */
    private $identificationID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceDate", setter="setOccurrenceDate")
     */
    private $occurrenceDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("OccurrenceTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOccurrenceTime", setter="setOccurrenceTime")
     */
    private $occurrenceTime;

    /**
     * @var null|TypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CompletionIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCompletionIndicator", setter="setCompletionIndicator")
     */
    private $completionIndicator;

    /**
     * @var null|array<CurrentStatus>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\CurrentStatus>")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentStatus")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CurrentStatus", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCurrentStatus", setter="setCurrentStatus")
     */
    private $currentStatus;

    /**
     * @var null|array<Contact>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Contact>")
     * @JMS\Expose
     * @JMS\SerializedName("Contact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Contact", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContact", setter="setContact")
     */
    private $contact;

    /**
     * @var null|OccurenceLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\OccurenceLocation")
     * @JMS\Expose
     * @JMS\SerializedName("OccurenceLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOccurenceLocation", setter="setOccurenceLocation")
     */
    private $occurenceLocation;

    /**
     * @return null|IdentificationID
     */
    public function getIdentificationID(): ?IdentificationID
    {
        return $this->identificationID;
    }

    /**
     * @return IdentificationID
     */
    public function getIdentificationIDWithCreate(): IdentificationID
    {
        $this->identificationID = is_null($this->identificationID) ? new IdentificationID() : $this->identificationID;

        return $this->identificationID;
    }

    /**
     * @param  null|IdentificationID $identificationID
     * @return static
     */
    public function setIdentificationID(?IdentificationID $identificationID = null): static
    {
        $this->identificationID = $identificationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIdentificationID(): static
    {
        $this->identificationID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getOccurrenceDate(): ?DateTimeInterface
    {
        return $this->occurrenceDate;
    }

    /**
     * @param  null|DateTimeInterface $occurrenceDate
     * @return static
     */
    public function setOccurrenceDate(?DateTimeInterface $occurrenceDate = null): static
    {
        $this->occurrenceDate = $occurrenceDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOccurrenceDate(): static
    {
        $this->occurrenceDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getOccurrenceTime(): ?DateTimeInterface
    {
        return $this->occurrenceTime;
    }

    /**
     * @param  null|DateTimeInterface $occurrenceTime
     * @return static
     */
    public function setOccurrenceTime(?DateTimeInterface $occurrenceTime = null): static
    {
        $this->occurrenceTime = $occurrenceTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOccurrenceTime(): static
    {
        $this->occurrenceTime = null;

        return $this;
    }

    /**
     * @return null|TypeCode
     */
    public function getTypeCode(): ?TypeCode
    {
        return $this->typeCode;
    }

    /**
     * @return TypeCode
     */
    public function getTypeCodeWithCreate(): TypeCode
    {
        $this->typeCode = is_null($this->typeCode) ? new TypeCode() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param  null|TypeCode $typeCode
     * @return static
     */
    public function setTypeCode(?TypeCode $typeCode = null): static
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTypeCode(): static
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|bool
     */
    public function getCompletionIndicator(): ?bool
    {
        return $this->completionIndicator;
    }

    /**
     * @param  null|bool $completionIndicator
     * @return static
     */
    public function setCompletionIndicator(?bool $completionIndicator = null): static
    {
        $this->completionIndicator = $completionIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompletionIndicator(): static
    {
        $this->completionIndicator = null;

        return $this;
    }

    /**
     * @return null|array<CurrentStatus>
     */
    public function getCurrentStatus(): ?array
    {
        return $this->currentStatus;
    }

    /**
     * @param  null|array<CurrentStatus> $currentStatus
     * @return static
     */
    public function setCurrentStatus(?array $currentStatus = null): static
    {
        $this->currentStatus = $currentStatus;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrentStatus(): static
    {
        $this->currentStatus = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCurrentStatus(): static
    {
        $this->currentStatus = [];

        return $this;
    }

    /**
     * @return null|CurrentStatus
     */
    public function firstCurrentStatus(): ?CurrentStatus
    {
        $currentStatus = $this->currentStatus ?? [];
        $currentStatus = reset($currentStatus);

        if (false === $currentStatus) {
            return null;
        }

        return $currentStatus;
    }

    /**
     * @return null|CurrentStatus
     */
    public function lastCurrentStatus(): ?CurrentStatus
    {
        $currentStatus = $this->currentStatus ?? [];
        $currentStatus = end($currentStatus);

        if (false === $currentStatus) {
            return null;
        }

        return $currentStatus;
    }

    /**
     * @param  CurrentStatus $currentStatus
     * @return static
     */
    public function addToCurrentStatus(CurrentStatus $currentStatus): static
    {
        $this->currentStatus[] = $currentStatus;

        return $this;
    }

    /**
     * @return CurrentStatus
     */
    public function addToCurrentStatusWithCreate(): CurrentStatus
    {
        $this->addTocurrentStatus($currentStatus = new CurrentStatus());

        return $currentStatus;
    }

    /**
     * @param  CurrentStatus $currentStatus
     * @return static
     */
    public function addOnceToCurrentStatus(CurrentStatus $currentStatus): static
    {
        if (!is_array($this->currentStatus)) {
            $this->currentStatus = [];
        }

        $this->currentStatus[0] = $currentStatus;

        return $this;
    }

    /**
     * @return CurrentStatus
     */
    public function addOnceToCurrentStatusWithCreate(): CurrentStatus
    {
        if (!is_array($this->currentStatus)) {
            $this->currentStatus = [];
        }

        if ([] === $this->currentStatus) {
            $this->addOnceTocurrentStatus(new CurrentStatus());
        }

        return $this->currentStatus[0];
    }

    /**
     * @return null|array<Contact>
     */
    public function getContact(): ?array
    {
        return $this->contact;
    }

    /**
     * @param  null|array<Contact> $contact
     * @return static
     */
    public function setContact(?array $contact = null): static
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
     * @return static
     */
    public function clearContact(): static
    {
        $this->contact = [];

        return $this;
    }

    /**
     * @return null|Contact
     */
    public function firstContact(): ?Contact
    {
        $contact = $this->contact ?? [];
        $contact = reset($contact);

        if (false === $contact) {
            return null;
        }

        return $contact;
    }

    /**
     * @return null|Contact
     */
    public function lastContact(): ?Contact
    {
        $contact = $this->contact ?? [];
        $contact = end($contact);

        if (false === $contact) {
            return null;
        }

        return $contact;
    }

    /**
     * @param  Contact $contact
     * @return static
     */
    public function addToContact(Contact $contact): static
    {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * @return Contact
     */
    public function addToContactWithCreate(): Contact
    {
        $this->addTocontact($contact = new Contact());

        return $contact;
    }

    /**
     * @param  Contact $contact
     * @return static
     */
    public function addOnceToContact(Contact $contact): static
    {
        if (!is_array($this->contact)) {
            $this->contact = [];
        }

        $this->contact[0] = $contact;

        return $this;
    }

    /**
     * @return Contact
     */
    public function addOnceToContactWithCreate(): Contact
    {
        if (!is_array($this->contact)) {
            $this->contact = [];
        }

        if ([] === $this->contact) {
            $this->addOnceTocontact(new Contact());
        }

        return $this->contact[0];
    }

    /**
     * @return null|OccurenceLocation
     */
    public function getOccurenceLocation(): ?OccurenceLocation
    {
        return $this->occurenceLocation;
    }

    /**
     * @return OccurenceLocation
     */
    public function getOccurenceLocationWithCreate(): OccurenceLocation
    {
        $this->occurenceLocation = is_null($this->occurenceLocation) ? new OccurenceLocation() : $this->occurenceLocation;

        return $this->occurenceLocation;
    }

    /**
     * @param  null|OccurenceLocation $occurenceLocation
     * @return static
     */
    public function setOccurenceLocation(?OccurenceLocation $occurenceLocation = null): static
    {
        $this->occurenceLocation = $occurenceLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOccurenceLocation(): static
    {
        $this->occurenceLocation = null;

        return $this;
    }
}
