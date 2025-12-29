<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReliabilityPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceNumeric;
use JMS\Serializer\Annotation as JMS;

class TransportScheduleType
{
    use HandlesObjectFlags;

    /**
     * @var null|SequenceNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceDate", setter="setReferenceDate")
     */
    private $referenceDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceTime", setter="setReferenceTime")
     */
    private $referenceTime;

    /**
     * @var null|ReliabilityPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ReliabilityPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ReliabilityPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReliabilityPercent", setter="setReliabilityPercent")
     */
    private $reliabilityPercent;

    /**
     * @var null|array<Remarks>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

    /**
     * @var null|StatusLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\StatusLocation")
     * @JMS\Expose
     * @JMS\SerializedName("StatusLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStatusLocation", setter="setStatusLocation")
     */
    private $statusLocation;

    /**
     * @var null|ActualArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ActualArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualArrivalTransportEvent", setter="setActualArrivalTransportEvent")
     */
    private $actualArrivalTransportEvent;

    /**
     * @var null|ActualDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ActualDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDepartureTransportEvent", setter="setActualDepartureTransportEvent")
     */
    private $actualDepartureTransportEvent;

    /**
     * @var null|EstimatedDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EstimatedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDepartureTransportEvent", setter="setEstimatedDepartureTransportEvent")
     */
    private $estimatedDepartureTransportEvent;

    /**
     * @var null|EstimatedArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EstimatedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedArrivalTransportEvent", setter="setEstimatedArrivalTransportEvent")
     */
    private $estimatedArrivalTransportEvent;

    /**
     * @var null|PlannedDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PlannedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedDepartureTransportEvent", setter="setPlannedDepartureTransportEvent")
     */
    private $plannedDepartureTransportEvent;

    /**
     * @var null|PlannedArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PlannedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedArrivalTransportEvent", setter="setPlannedArrivalTransportEvent")
     */
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
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): static
    {
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
    public function setReferenceDate(?DateTimeInterface $referenceDate = null): static
    {
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
    public function setReferenceTime(?DateTimeInterface $referenceTime = null): static
    {
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
        $this->reliabilityPercent = is_null($this->reliabilityPercent) ? new ReliabilityPercent() : $this->reliabilityPercent;

        return $this->reliabilityPercent;
    }

    /**
     * @param  null|ReliabilityPercent $reliabilityPercent
     * @return static
     */
    public function setReliabilityPercent(?ReliabilityPercent $reliabilityPercent = null): static
    {
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
    public function setRemarks(?array $remarks = null): static
    {
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
    public function addToRemarks(Remarks $remarks): static
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(Remarks $remarks): static
    {
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
            $this->addOnceToremarks(new Remarks());
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
        $this->statusLocation = is_null($this->statusLocation) ? new StatusLocation() : $this->statusLocation;

        return $this->statusLocation;
    }

    /**
     * @param  null|StatusLocation $statusLocation
     * @return static
     */
    public function setStatusLocation(?StatusLocation $statusLocation = null): static
    {
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
        $this->actualArrivalTransportEvent = is_null($this->actualArrivalTransportEvent) ? new ActualArrivalTransportEvent() : $this->actualArrivalTransportEvent;

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
        $this->actualDepartureTransportEvent = is_null($this->actualDepartureTransportEvent) ? new ActualDepartureTransportEvent() : $this->actualDepartureTransportEvent;

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
        $this->estimatedDepartureTransportEvent = is_null($this->estimatedDepartureTransportEvent) ? new EstimatedDepartureTransportEvent() : $this->estimatedDepartureTransportEvent;

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
        $this->estimatedArrivalTransportEvent = is_null($this->estimatedArrivalTransportEvent) ? new EstimatedArrivalTransportEvent() : $this->estimatedArrivalTransportEvent;

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
        $this->plannedDepartureTransportEvent = is_null($this->plannedDepartureTransportEvent) ? new PlannedDepartureTransportEvent() : $this->plannedDepartureTransportEvent;

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
        $this->plannedArrivalTransportEvent = is_null($this->plannedArrivalTransportEvent) ? new PlannedArrivalTransportEvent() : $this->plannedArrivalTransportEvent;

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
