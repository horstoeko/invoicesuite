<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProgressPercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WorkPhase;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WorkPhaseCode;
use JMS\Serializer\Annotation as JMS;

class WorkPhaseReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|WorkPhaseCode
     */
    #[JMS\Accessor(getter: 'getWorkPhaseCode', setter: 'setWorkPhaseCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WorkPhaseCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WorkPhaseCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $workPhaseCode;

    /**
     * @var null|array<WorkPhase>
     */
    #[JMS\Accessor(getter: 'getWorkPhase', setter: 'setWorkPhase')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WorkPhase')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WorkPhase>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'WorkPhase', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $workPhase;

    /**
     * @var null|ProgressPercent
     */
    #[JMS\Accessor(getter: 'getProgressPercent', setter: 'setProgressPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProgressPercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProgressPercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $progressPercent;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getStartDate', setter: 'setStartDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StartDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $startDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEndDate', setter: 'setEndDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EndDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $endDate;

    /**
     * @var null|array<WorkOrderDocumentReference>
     */
    #[JMS\Accessor(getter: 'getWorkOrderDocumentReference', setter: 'setWorkOrderDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WorkOrderDocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\WorkOrderDocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'WorkOrderDocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $workOrderDocumentReference;

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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
     * @return null|WorkPhaseCode
     */
    public function getWorkPhaseCode(): ?WorkPhaseCode
    {
        return $this->workPhaseCode;
    }

    /**
     * @return WorkPhaseCode
     */
    public function getWorkPhaseCodeWithCreate(): WorkPhaseCode
    {
        $this->workPhaseCode ??= new WorkPhaseCode();

        return $this->workPhaseCode;
    }

    /**
     * @param  null|WorkPhaseCode $workPhaseCode
     * @return static
     */
    public function setWorkPhaseCode(
        ?WorkPhaseCode $workPhaseCode = null
    ): static {
        $this->workPhaseCode = $workPhaseCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWorkPhaseCode(): static
    {
        $this->workPhaseCode = null;

        return $this;
    }

    /**
     * @return null|array<WorkPhase>
     */
    public function getWorkPhase(): ?array
    {
        return $this->workPhase;
    }

    /**
     * @param  null|array<WorkPhase> $workPhase
     * @return static
     */
    public function setWorkPhase(
        ?array $workPhase = null
    ): static {
        $this->workPhase = $workPhase;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWorkPhase(): static
    {
        $this->workPhase = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWorkPhase(): static
    {
        $this->workPhase = [];

        return $this;
    }

    /**
     * @return null|WorkPhase
     */
    public function firstWorkPhase(): ?WorkPhase
    {
        $workPhase = $this->workPhase ?? [];
        $workPhase = reset($workPhase);

        if (false === $workPhase) {
            return null;
        }

        return $workPhase;
    }

    /**
     * @return null|WorkPhase
     */
    public function lastWorkPhase(): ?WorkPhase
    {
        $workPhase = $this->workPhase ?? [];
        $workPhase = end($workPhase);

        if (false === $workPhase) {
            return null;
        }

        return $workPhase;
    }

    /**
     * @param  WorkPhase $workPhase
     * @return static
     */
    public function addToWorkPhase(
        WorkPhase $workPhase
    ): static {
        $this->workPhase[] = $workPhase;

        return $this;
    }

    /**
     * @return WorkPhase
     */
    public function addToWorkPhaseWithCreate(): WorkPhase
    {
        $this->addToworkPhase($workPhase = new WorkPhase());

        return $workPhase;
    }

    /**
     * @param  WorkPhase $workPhase
     * @return static
     */
    public function addOnceToWorkPhase(
        WorkPhase $workPhase
    ): static {
        if (!is_array($this->workPhase)) {
            $this->workPhase = [];
        }

        $this->workPhase[0] = $workPhase;

        return $this;
    }

    /**
     * @return WorkPhase
     */
    public function addOnceToWorkPhaseWithCreate(): WorkPhase
    {
        if (!is_array($this->workPhase)) {
            $this->workPhase = [];
        }

        if ([] === $this->workPhase) {
            $this->addOnceToworkPhase(new WorkPhase());
        }

        return $this->workPhase[0];
    }

    /**
     * @return null|ProgressPercent
     */
    public function getProgressPercent(): ?ProgressPercent
    {
        return $this->progressPercent;
    }

    /**
     * @return ProgressPercent
     */
    public function getProgressPercentWithCreate(): ProgressPercent
    {
        $this->progressPercent ??= new ProgressPercent();

        return $this->progressPercent;
    }

    /**
     * @param  null|ProgressPercent $progressPercent
     * @return static
     */
    public function setProgressPercent(
        ?ProgressPercent $progressPercent = null
    ): static {
        $this->progressPercent = $progressPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProgressPercent(): static
    {
        $this->progressPercent = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param  null|DateTimeInterface $startDate
     * @return static
     */
    public function setStartDate(
        ?DateTimeInterface $startDate = null
    ): static {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStartDate(): static
    {
        $this->startDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param  null|DateTimeInterface $endDate
     * @return static
     */
    public function setEndDate(
        ?DateTimeInterface $endDate = null
    ): static {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndDate(): static
    {
        $this->endDate = null;

        return $this;
    }

    /**
     * @return null|array<WorkOrderDocumentReference>
     */
    public function getWorkOrderDocumentReference(): ?array
    {
        return $this->workOrderDocumentReference;
    }

    /**
     * @param  null|array<WorkOrderDocumentReference> $workOrderDocumentReference
     * @return static
     */
    public function setWorkOrderDocumentReference(
        ?array $workOrderDocumentReference = null
    ): static {
        $this->workOrderDocumentReference = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWorkOrderDocumentReference(): static
    {
        $this->workOrderDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWorkOrderDocumentReference(): static
    {
        $this->workOrderDocumentReference = [];

        return $this;
    }

    /**
     * @return null|WorkOrderDocumentReference
     */
    public function firstWorkOrderDocumentReference(): ?WorkOrderDocumentReference
    {
        $workOrderDocumentReference = $this->workOrderDocumentReference ?? [];
        $workOrderDocumentReference = reset($workOrderDocumentReference);

        if (false === $workOrderDocumentReference) {
            return null;
        }

        return $workOrderDocumentReference;
    }

    /**
     * @return null|WorkOrderDocumentReference
     */
    public function lastWorkOrderDocumentReference(): ?WorkOrderDocumentReference
    {
        $workOrderDocumentReference = $this->workOrderDocumentReference ?? [];
        $workOrderDocumentReference = end($workOrderDocumentReference);

        if (false === $workOrderDocumentReference) {
            return null;
        }

        return $workOrderDocumentReference;
    }

    /**
     * @param  WorkOrderDocumentReference $workOrderDocumentReference
     * @return static
     */
    public function addToWorkOrderDocumentReference(
        WorkOrderDocumentReference $workOrderDocumentReference
    ): static {
        $this->workOrderDocumentReference[] = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return WorkOrderDocumentReference
     */
    public function addToWorkOrderDocumentReferenceWithCreate(): WorkOrderDocumentReference
    {
        $this->addToworkOrderDocumentReference($workOrderDocumentReference = new WorkOrderDocumentReference());

        return $workOrderDocumentReference;
    }

    /**
     * @param  WorkOrderDocumentReference $workOrderDocumentReference
     * @return static
     */
    public function addOnceToWorkOrderDocumentReference(
        WorkOrderDocumentReference $workOrderDocumentReference
    ): static {
        if (!is_array($this->workOrderDocumentReference)) {
            $this->workOrderDocumentReference = [];
        }

        $this->workOrderDocumentReference[0] = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return WorkOrderDocumentReference
     */
    public function addOnceToWorkOrderDocumentReferenceWithCreate(): WorkOrderDocumentReference
    {
        if (!is_array($this->workOrderDocumentReference)) {
            $this->workOrderDocumentReference = [];
        }

        if ([] === $this->workOrderDocumentReference) {
            $this->addOnceToworkOrderDocumentReference(new WorkOrderDocumentReference());
        }

        return $this->workOrderDocumentReference[0];
    }
}
