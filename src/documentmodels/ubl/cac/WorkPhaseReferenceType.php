<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode;

class WorkPhaseReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhaseCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWorkPhaseCode", setter="setWorkPhaseCode")
     */
    private $workPhaseCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhase")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkPhase", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getWorkPhase", setter="setWorkPhase")
     */
    private $workPhase;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ProgressPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProgressPercent", setter="setProgressPercent")
     */
    private $progressPercent;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("StartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStartDate", setter="setStartDate")
     */
    private $startDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EndDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndDate", setter="setEndDate")
     */
    private $endDate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkOrderDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkOrderDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWorkOrderDocumentReference", setter="setWorkOrderDocumentReference")
     */
    private $workOrderDocumentReference;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode|null
     */
    public function getWorkPhaseCode(): ?WorkPhaseCode
    {
        return $this->workPhaseCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode
     */
    public function getWorkPhaseCodeWithCreate(): WorkPhaseCode
    {
        $this->workPhaseCode = is_null($this->workPhaseCode) ? new WorkPhaseCode() : $this->workPhaseCode;

        return $this->workPhaseCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhaseCode|null $workPhaseCode
     * @return self
     */
    public function setWorkPhaseCode(?WorkPhaseCode $workPhaseCode = null): self
    {
        $this->workPhaseCode = $workPhaseCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWorkPhaseCode(): self
    {
        $this->workPhaseCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase>|null
     */
    public function getWorkPhase(): ?array
    {
        return $this->workPhase;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase>|null $workPhase
     * @return self
     */
    public function setWorkPhase(?array $workPhase = null): self
    {
        $this->workPhase = $workPhase;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWorkPhase(): self
    {
        $this->workPhase = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWorkPhase(): self
    {
        $this->workPhase = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase|null
     */
    public function firstWorkPhase(): ?WorkPhase
    {
        $workPhase = $this->workPhase ?? [];
        $workPhase = reset($workPhase);

        if ($workPhase === false) {
            return null;
        }

        return $workPhase;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase|null
     */
    public function lastWorkPhase(): ?WorkPhase
    {
        $workPhase = $this->workPhase ?? [];
        $workPhase = end($workPhase);

        if ($workPhase === false) {
            return null;
        }

        return $workPhase;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase $workPhase
     * @return self
     */
    public function addToWorkPhase(WorkPhase $workPhase): self
    {
        $this->workPhase[] = $workPhase;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase
     */
    public function addToWorkPhaseWithCreate(): WorkPhase
    {
        $this->addToworkPhase($workPhase = new WorkPhase());

        return $workPhase;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase $workPhase
     * @return self
     */
    public function addOnceToWorkPhase(WorkPhase $workPhase): self
    {
        if (!is_array($this->workPhase)) {
            $this->workPhase = [];
        }

        $this->workPhase[0] = $workPhase;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\WorkPhase
     */
    public function addOnceToWorkPhaseWithCreate(): WorkPhase
    {
        if (!is_array($this->workPhase)) {
            $this->workPhase = [];
        }

        if ($this->workPhase === []) {
            $this->addOnceToworkPhase(new WorkPhase());
        }

        return $this->workPhase[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent|null
     */
    public function getProgressPercent(): ?ProgressPercent
    {
        return $this->progressPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent
     */
    public function getProgressPercentWithCreate(): ProgressPercent
    {
        $this->progressPercent = is_null($this->progressPercent) ? new ProgressPercent() : $this->progressPercent;

        return $this->progressPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProgressPercent|null $progressPercent
     * @return self
     */
    public function setProgressPercent(?ProgressPercent $progressPercent = null): self
    {
        $this->progressPercent = $progressPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProgressPercent(): self
    {
        $this->progressPercent = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface|null $startDate
     * @return self
     */
    public function setStartDate(?\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStartDate(): self
    {
        $this->startDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface|null $endDate
     * @return self
     */
    public function setEndDate(?\DateTimeInterface $endDate = null): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEndDate(): self
    {
        $this->endDate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference>|null
     */
    public function getWorkOrderDocumentReference(): ?array
    {
        return $this->workOrderDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference>|null $workOrderDocumentReference
     * @return self
     */
    public function setWorkOrderDocumentReference(?array $workOrderDocumentReference = null): self
    {
        $this->workOrderDocumentReference = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWorkOrderDocumentReference(): self
    {
        $this->workOrderDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWorkOrderDocumentReference(): self
    {
        $this->workOrderDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference|null
     */
    public function firstWorkOrderDocumentReference(): ?WorkOrderDocumentReference
    {
        $workOrderDocumentReference = $this->workOrderDocumentReference ?? [];
        $workOrderDocumentReference = reset($workOrderDocumentReference);

        if ($workOrderDocumentReference === false) {
            return null;
        }

        return $workOrderDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference|null
     */
    public function lastWorkOrderDocumentReference(): ?WorkOrderDocumentReference
    {
        $workOrderDocumentReference = $this->workOrderDocumentReference ?? [];
        $workOrderDocumentReference = end($workOrderDocumentReference);

        if ($workOrderDocumentReference === false) {
            return null;
        }

        return $workOrderDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference $workOrderDocumentReference
     * @return self
     */
    public function addToWorkOrderDocumentReference(WorkOrderDocumentReference $workOrderDocumentReference): self
    {
        $this->workOrderDocumentReference[] = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference
     */
    public function addToWorkOrderDocumentReferenceWithCreate(): WorkOrderDocumentReference
    {
        $this->addToworkOrderDocumentReference($workOrderDocumentReference = new WorkOrderDocumentReference());

        return $workOrderDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference $workOrderDocumentReference
     * @return self
     */
    public function addOnceToWorkOrderDocumentReference(WorkOrderDocumentReference $workOrderDocumentReference): self
    {
        if (!is_array($this->workOrderDocumentReference)) {
            $this->workOrderDocumentReference = [];
        }

        $this->workOrderDocumentReference[0] = $workOrderDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkOrderDocumentReference
     */
    public function addOnceToWorkOrderDocumentReferenceWithCreate(): WorkOrderDocumentReference
    {
        if (!is_array($this->workOrderDocumentReference)) {
            $this->workOrderDocumentReference = [];
        }

        if ($this->workOrderDocumentReference === []) {
            $this->addOnceToworkOrderDocumentReference(new WorkOrderDocumentReference());
        }

        return $this->workOrderDocumentReference[0];
    }
}
