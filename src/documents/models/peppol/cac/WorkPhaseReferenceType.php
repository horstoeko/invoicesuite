<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProgressPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\WorkPhase;
use horstoeko\invoicesuite\documents\models\peppol\cbc\WorkPhaseCode;
use JMS\Serializer\Annotation as JMS;

class WorkPhaseReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|WorkPhaseCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\WorkPhaseCode")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhaseCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWorkPhaseCode", setter="setWorkPhaseCode")
     */
    private $workPhaseCode;

    /**
     * @var null|array<WorkPhase>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\WorkPhase>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhase")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkPhase", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getWorkPhase", setter="setWorkPhase")
     */
    private $workPhase;

    /**
     * @var null|ProgressPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ProgressPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ProgressPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProgressPercent", setter="setProgressPercent")
     */
    private $progressPercent;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("StartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStartDate", setter="setStartDate")
     */
    private $startDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EndDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndDate", setter="setEndDate")
     */
    private $endDate;

    /**
     * @var null|array<WorkOrderDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\WorkOrderDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkOrderDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkOrderDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWorkOrderDocumentReference", setter="setWorkOrderDocumentReference")
     */
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
        $this->workPhaseCode = is_null($this->workPhaseCode) ? new WorkPhaseCode() : $this->workPhaseCode;

        return $this->workPhaseCode;
    }

    /**
     * @param  null|WorkPhaseCode $workPhaseCode
     * @return static
     */
    public function setWorkPhaseCode(?WorkPhaseCode $workPhaseCode = null): static
    {
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
    public function setWorkPhase(?array $workPhase = null): static
    {
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
    public function addToWorkPhase(WorkPhase $workPhase): static
    {
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
    public function addOnceToWorkPhase(WorkPhase $workPhase): static
    {
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
        $this->progressPercent = is_null($this->progressPercent) ? new ProgressPercent() : $this->progressPercent;

        return $this->progressPercent;
    }

    /**
     * @param  null|ProgressPercent $progressPercent
     * @return static
     */
    public function setProgressPercent(?ProgressPercent $progressPercent = null): static
    {
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
    public function setStartDate(?DateTimeInterface $startDate = null): static
    {
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
    public function setEndDate(?DateTimeInterface $endDate = null): static
    {
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
    public function setWorkOrderDocumentReference(?array $workOrderDocumentReference = null): static
    {
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
    public function addToWorkOrderDocumentReference(WorkOrderDocumentReference $workOrderDocumentReference): static
    {
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
    public function addOnceToWorkOrderDocumentReference(WorkOrderDocumentReference $workOrderDocumentReference): static
    {
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
