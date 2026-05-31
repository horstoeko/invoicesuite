<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReliabilityPercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric;
use JMS\Serializer\Annotation as JMS;

class TransportScheduleType
{
    use HandlesObjectFlags;

    /**
     * @var null|SequenceNumeric
     */
    #[JMS\Accessor(getter: 'getSequenceNumeric', setter: 'setSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceNumeric;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getReferenceDate', setter: 'setReferenceDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReferenceDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $referenceDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getReferenceTime', setter: 'setReferenceTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReferenceTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $referenceTime;

    /**
     * @var null|ReliabilityPercent
     */
    #[JMS\Accessor(getter: 'getReliabilityPercent', setter: 'setReliabilityPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReliabilityPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReliabilityPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $reliabilityPercent;

    /**
     * @var null|array<Remarks>
     */
    #[JMS\Accessor(getter: 'getRemarks', setter: 'setRemarks')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Remarks')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Remarks', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $remarks;

    /**
     * @var null|StatusLocation
     */
    #[JMS\Accessor(getter: 'getStatusLocation', setter: 'setStatusLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StatusLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\StatusLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $statusLocation;

    /**
     * @var null|ActualArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualArrivalTransportEvent', setter: 'setActualArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualArrivalTransportEvent;

    /**
     * @var null|ActualDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualDepartureTransportEvent', setter: 'setActualDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualDepartureTransportEvent;

    /**
     * @var null|EstimatedDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getEstimatedDepartureTransportEvent', setter: 'setEstimatedDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedDepartureTransportEvent;

    /**
     * @var null|EstimatedArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getEstimatedArrivalTransportEvent', setter: 'setEstimatedArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedArrivalTransportEvent;

    /**
     * @var null|PlannedDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedDepartureTransportEvent', setter: 'setPlannedDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedDepartureTransportEvent;

    /**
     * @var null|PlannedArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedArrivalTransportEvent', setter: 'setPlannedArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedArrivalTransportEvent;

    /**
     * @return null|SequenceNumeric
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric ??= new SequenceNumeric();

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(
        ?SequenceNumeric $sequenceNumeric = null
    ): static {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getReferenceDate(): ?DateTimeInterface
    {
        return $this->referenceDate;
    }

    /**
     * @param  null|DateTimeInterface $referenceDate
     * @return static
     */
    public function setReferenceDate(
        ?DateTimeInterface $referenceDate = null
    ): static {
        $this->referenceDate = $referenceDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceDate(): static
    {
        $this->referenceDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getReferenceTime(): ?DateTimeInterface
    {
        return $this->referenceTime;
    }

    /**
     * @param  null|DateTimeInterface $referenceTime
     * @return static
     */
    public function setReferenceTime(
        ?DateTimeInterface $referenceTime = null
    ): static {
        $this->referenceTime = $referenceTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceTime(): static
    {
        $this->referenceTime = null;

        return $this;
    }

    /**
     * @return null|ReliabilityPercent
     */
    public function getReliabilityPercent(): ?ReliabilityPercent
    {
        return $this->reliabilityPercent;
    }

    /**
     * @return ReliabilityPercent
     */
    public function getReliabilityPercentWithCreate(): ReliabilityPercent
    {
        $this->reliabilityPercent ??= new ReliabilityPercent();

        return $this->reliabilityPercent;
    }

    /**
     * @param  null|ReliabilityPercent $reliabilityPercent
     * @return static
     */
    public function setReliabilityPercent(
        ?ReliabilityPercent $reliabilityPercent = null
    ): static {
        $this->reliabilityPercent = $reliabilityPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReliabilityPercent(): static
    {
        $this->reliabilityPercent = null;

        return $this;
    }

    /**
     * @return null|array<Remarks>
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param  null|array<Remarks> $remarks
     * @return static
     */
    public function setRemarks(
        ?array $remarks = null
    ): static {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRemarks(): static
    {
        $this->remarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRemarks(): static
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @return null|Remarks
     */
    public function firstRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = reset($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @return null|Remarks
     */
    public function lastRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = end($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addToRemarks(
        Remarks $remarks
    ): static {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToRemarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(
        Remarks $remarks
    ): static {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ([] === $this->remarks) {
            $this->addOnceToRemarks(new Remarks());
        }

        return $this->remarks[0];
    }

    /**
     * @return null|StatusLocation
     */
    public function getStatusLocation(): ?StatusLocation
    {
        return $this->statusLocation;
    }

    /**
     * @return StatusLocation
     */
    public function getStatusLocationWithCreate(): StatusLocation
    {
        $this->statusLocation ??= new StatusLocation();

        return $this->statusLocation;
    }

    /**
     * @param  null|StatusLocation $statusLocation
     * @return static
     */
    public function setStatusLocation(
        ?StatusLocation $statusLocation = null
    ): static {
        $this->statusLocation = $statusLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatusLocation(): static
    {
        $this->statusLocation = null;

        return $this;
    }

    /**
     * @return null|ActualArrivalTransportEvent
     */
    public function getActualArrivalTransportEvent(): ?ActualArrivalTransportEvent
    {
        return $this->actualArrivalTransportEvent;
    }

    /**
     * @return ActualArrivalTransportEvent
     */
    public function getActualArrivalTransportEventWithCreate(): ActualArrivalTransportEvent
    {
        $this->actualArrivalTransportEvent ??= new ActualArrivalTransportEvent();

        return $this->actualArrivalTransportEvent;
    }

    /**
     * @param  null|ActualArrivalTransportEvent $actualArrivalTransportEvent
     * @return static
     */
    public function setActualArrivalTransportEvent(
        ?ActualArrivalTransportEvent $actualArrivalTransportEvent = null,
    ): static {
        $this->actualArrivalTransportEvent = $actualArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualArrivalTransportEvent(): static
    {
        $this->actualArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ActualDepartureTransportEvent
     */
    public function getActualDepartureTransportEvent(): ?ActualDepartureTransportEvent
    {
        return $this->actualDepartureTransportEvent;
    }

    /**
     * @return ActualDepartureTransportEvent
     */
    public function getActualDepartureTransportEventWithCreate(): ActualDepartureTransportEvent
    {
        $this->actualDepartureTransportEvent ??= new ActualDepartureTransportEvent();

        return $this->actualDepartureTransportEvent;
    }

    /**
     * @param  null|ActualDepartureTransportEvent $actualDepartureTransportEvent
     * @return static
     */
    public function setActualDepartureTransportEvent(
        ?ActualDepartureTransportEvent $actualDepartureTransportEvent = null,
    ): static {
        $this->actualDepartureTransportEvent = $actualDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDepartureTransportEvent(): static
    {
        $this->actualDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|EstimatedDepartureTransportEvent
     */
    public function getEstimatedDepartureTransportEvent(): ?EstimatedDepartureTransportEvent
    {
        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @return EstimatedDepartureTransportEvent
     */
    public function getEstimatedDepartureTransportEventWithCreate(): EstimatedDepartureTransportEvent
    {
        $this->estimatedDepartureTransportEvent ??= new EstimatedDepartureTransportEvent();

        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @param  null|EstimatedDepartureTransportEvent $estimatedDepartureTransportEvent
     * @return static
     */
    public function setEstimatedDepartureTransportEvent(
        ?EstimatedDepartureTransportEvent $estimatedDepartureTransportEvent = null,
    ): static {
        $this->estimatedDepartureTransportEvent = $estimatedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDepartureTransportEvent(): static
    {
        $this->estimatedDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|EstimatedArrivalTransportEvent
     */
    public function getEstimatedArrivalTransportEvent(): ?EstimatedArrivalTransportEvent
    {
        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @return EstimatedArrivalTransportEvent
     */
    public function getEstimatedArrivalTransportEventWithCreate(): EstimatedArrivalTransportEvent
    {
        $this->estimatedArrivalTransportEvent ??= new EstimatedArrivalTransportEvent();

        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @param  null|EstimatedArrivalTransportEvent $estimatedArrivalTransportEvent
     * @return static
     */
    public function setEstimatedArrivalTransportEvent(
        ?EstimatedArrivalTransportEvent $estimatedArrivalTransportEvent = null,
    ): static {
        $this->estimatedArrivalTransportEvent = $estimatedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedArrivalTransportEvent(): static
    {
        $this->estimatedArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|PlannedDepartureTransportEvent
     */
    public function getPlannedDepartureTransportEvent(): ?PlannedDepartureTransportEvent
    {
        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @return PlannedDepartureTransportEvent
     */
    public function getPlannedDepartureTransportEventWithCreate(): PlannedDepartureTransportEvent
    {
        $this->plannedDepartureTransportEvent ??= new PlannedDepartureTransportEvent();

        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @param  null|PlannedDepartureTransportEvent $plannedDepartureTransportEvent
     * @return static
     */
    public function setPlannedDepartureTransportEvent(
        ?PlannedDepartureTransportEvent $plannedDepartureTransportEvent = null,
    ): static {
        $this->plannedDepartureTransportEvent = $plannedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedDepartureTransportEvent(): static
    {
        $this->plannedDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|PlannedArrivalTransportEvent
     */
    public function getPlannedArrivalTransportEvent(): ?PlannedArrivalTransportEvent
    {
        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @return PlannedArrivalTransportEvent
     */
    public function getPlannedArrivalTransportEventWithCreate(): PlannedArrivalTransportEvent
    {
        $this->plannedArrivalTransportEvent ??= new PlannedArrivalTransportEvent();

        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @param  null|PlannedArrivalTransportEvent $plannedArrivalTransportEvent
     * @return static
     */
    public function setPlannedArrivalTransportEvent(
        ?PlannedArrivalTransportEvent $plannedArrivalTransportEvent = null,
    ): static {
        $this->plannedArrivalTransportEvent = $plannedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedArrivalTransportEvent(): static
    {
        $this->plannedArrivalTransportEvent = null;

        return $this;
    }
}
