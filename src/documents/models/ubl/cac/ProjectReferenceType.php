<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class ProjectReferenceType
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
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|array<WorkPhaseReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\WorkPhaseReference>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhaseReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkPhaseReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWorkPhaseReference", setter="setWorkPhaseReference")
     */
    private $workPhaseReference;

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
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|array<WorkPhaseReference>
     */
    public function getWorkPhaseReference(): ?array
    {
        return $this->workPhaseReference;
    }

    /**
     * @param  null|array<WorkPhaseReference> $workPhaseReference
     * @return static
     */
    public function setWorkPhaseReference(?array $workPhaseReference = null): static
    {
        $this->workPhaseReference = $workPhaseReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWorkPhaseReference(): static
    {
        $this->workPhaseReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWorkPhaseReference(): static
    {
        $this->workPhaseReference = [];

        return $this;
    }

    /**
     * @return null|WorkPhaseReference
     */
    public function firstWorkPhaseReference(): ?WorkPhaseReference
    {
        $workPhaseReference = $this->workPhaseReference ?? [];
        $workPhaseReference = reset($workPhaseReference);

        if (false === $workPhaseReference) {
            return null;
        }

        return $workPhaseReference;
    }

    /**
     * @return null|WorkPhaseReference
     */
    public function lastWorkPhaseReference(): ?WorkPhaseReference
    {
        $workPhaseReference = $this->workPhaseReference ?? [];
        $workPhaseReference = end($workPhaseReference);

        if (false === $workPhaseReference) {
            return null;
        }

        return $workPhaseReference;
    }

    /**
     * @param  WorkPhaseReference $workPhaseReference
     * @return static
     */
    public function addToWorkPhaseReference(WorkPhaseReference $workPhaseReference): static
    {
        $this->workPhaseReference[] = $workPhaseReference;

        return $this;
    }

    /**
     * @return WorkPhaseReference
     */
    public function addToWorkPhaseReferenceWithCreate(): WorkPhaseReference
    {
        $this->addToworkPhaseReference($workPhaseReference = new WorkPhaseReference());

        return $workPhaseReference;
    }

    /**
     * @param  WorkPhaseReference $workPhaseReference
     * @return static
     */
    public function addOnceToWorkPhaseReference(WorkPhaseReference $workPhaseReference): static
    {
        if (!is_array($this->workPhaseReference)) {
            $this->workPhaseReference = [];
        }

        $this->workPhaseReference[0] = $workPhaseReference;

        return $this;
    }

    /**
     * @return WorkPhaseReference
     */
    public function addOnceToWorkPhaseReferenceWithCreate(): WorkPhaseReference
    {
        if (!is_array($this->workPhaseReference)) {
            $this->workPhaseReference = [];
        }

        if ([] === $this->workPhaseReference) {
            $this->addOnceToworkPhaseReference(new WorkPhaseReference());
        }

        return $this->workPhaseReference[0];
    }
}
