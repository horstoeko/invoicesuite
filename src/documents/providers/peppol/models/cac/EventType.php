<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IdentificationID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class EventType
{
    use HandlesObjectFlags;

    /**
     * @var null|IdentificationID
     */
    #[JMS\Accessor(getter: 'getIdentificationID', setter: 'setIdentificationID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IdentificationID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IdentificationID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $identificationID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getOccurrenceDate', setter: 'setOccurrenceDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OccurrenceDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $occurrenceDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getOccurrenceTime', setter: 'setOccurrenceTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OccurrenceTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $occurrenceTime;

    /**
     * @var null|TypeCode
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $typeCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getCompletionIndicator', setter: 'setCompletionIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CompletionIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $completionIndicator;

    /**
     * @var null|array<CurrentStatus>
     */
    #[JMS\Accessor(getter: 'getCurrentStatus', setter: 'setCurrentStatus')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CurrentStatus')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CurrentStatus>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CurrentStatus', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $currentStatus;

    /**
     * @var null|array<Contact>
     */
    #[JMS\Accessor(getter: 'getContact', setter: 'setContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Contact')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Contact>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Contact', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $contact;

    /**
     * @var null|OccurenceLocation
     */
    #[JMS\Accessor(getter: 'getOccurenceLocation', setter: 'setOccurenceLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OccurenceLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OccurenceLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->identificationID ??= new IdentificationID();

        return $this->identificationID;
    }

    /**
     * @param  null|IdentificationID $identificationID
     * @return static
     */
    public function setIdentificationID(
        ?IdentificationID $identificationID = null
    ): static {
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
    public function setOccurrenceDate(
        ?DateTimeInterface $occurrenceDate = null
    ): static {
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
    public function setOccurrenceTime(
        ?DateTimeInterface $occurrenceTime = null
    ): static {
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
        $this->typeCode ??= new TypeCode();

        return $this->typeCode;
    }

    /**
     * @param  null|TypeCode $typeCode
     * @return static
     */
    public function setTypeCode(
        ?TypeCode $typeCode = null
    ): static {
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
    public function setDescription(
        ?array $description = null
    ): static {
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
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
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
    public function setCompletionIndicator(
        ?bool $completionIndicator = null
    ): static {
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
    public function setCurrentStatus(
        ?array $currentStatus = null
    ): static {
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
    public function addToCurrentStatus(
        CurrentStatus $currentStatus
    ): static {
        $this->currentStatus[] = $currentStatus;

        return $this;
    }

    /**
     * @return CurrentStatus
     */
    public function addToCurrentStatusWithCreate(): CurrentStatus
    {
        $this->addToCurrentStatus($currentStatus = new CurrentStatus());

        return $currentStatus;
    }

    /**
     * @param  CurrentStatus $currentStatus
     * @return static
     */
    public function addOnceToCurrentStatus(
        CurrentStatus $currentStatus
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->currentStatus)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->currentStatus)) {
            $this->currentStatus = [];
        }

        if ([] === $this->currentStatus) {
            $this->addOnceToCurrentStatus(new CurrentStatus());
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
    public function setContact(
        ?array $contact = null
    ): static {
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
    public function addToContact(
        Contact $contact
    ): static {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * @return Contact
     */
    public function addToContactWithCreate(): Contact
    {
        $this->addToContact($contact = new Contact());

        return $contact;
    }

    /**
     * @param  Contact $contact
     * @return static
     */
    public function addOnceToContact(
        Contact $contact
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->contact)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->contact)) {
            $this->contact = [];
        }

        if ([] === $this->contact) {
            $this->addOnceToContact(new Contact());
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
        $this->occurenceLocation ??= new OccurenceLocation();

        return $this->occurenceLocation;
    }

    /**
     * @param  null|OccurenceLocation $occurenceLocation
     * @return static
     */
    public function setOccurenceLocation(
        ?OccurenceLocation $occurenceLocation = null
    ): static {
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
