<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID;

class ProjectReferenceType
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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference>")
     * @JMS\Expose
     * @JMS\SerializedName("WorkPhaseReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WorkPhaseReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWorkPhaseReference", setter="setWorkPhaseReference")
     */
    private $workPhaseReference;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTimeInterface $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueDate(): self
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference>|null
     */
    public function getWorkPhaseReference(): ?array
    {
        return $this->workPhaseReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference>|null $workPhaseReference
     * @return self
     */
    public function setWorkPhaseReference(?array $workPhaseReference = null): self
    {
        $this->workPhaseReference = $workPhaseReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWorkPhaseReference(): self
    {
        $this->workPhaseReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWorkPhaseReference(): self
    {
        $this->workPhaseReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference|null
     */
    public function firstWorkPhaseReference(): ?WorkPhaseReference
    {
        $workPhaseReference = $this->workPhaseReference ?? [];
        $workPhaseReference = reset($workPhaseReference);

        if ($workPhaseReference === false) {
            return null;
        }

        return $workPhaseReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference|null
     */
    public function lastWorkPhaseReference(): ?WorkPhaseReference
    {
        $workPhaseReference = $this->workPhaseReference ?? [];
        $workPhaseReference = end($workPhaseReference);

        if ($workPhaseReference === false) {
            return null;
        }

        return $workPhaseReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference $workPhaseReference
     * @return self
     */
    public function addToWorkPhaseReference(WorkPhaseReference $workPhaseReference): self
    {
        $this->workPhaseReference[] = $workPhaseReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference
     */
    public function addToWorkPhaseReferenceWithCreate(): WorkPhaseReference
    {
        $this->addToworkPhaseReference($workPhaseReference = new WorkPhaseReference());

        return $workPhaseReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference $workPhaseReference
     * @return self
     */
    public function addOnceToWorkPhaseReference(WorkPhaseReference $workPhaseReference): self
    {
        if (!is_array($this->workPhaseReference)) {
            $this->workPhaseReference = [];
        }

        $this->workPhaseReference[0] = $workPhaseReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WorkPhaseReference
     */
    public function addOnceToWorkPhaseReferenceWithCreate(): WorkPhaseReference
    {
        if (!is_array($this->workPhaseReference)) {
            $this->workPhaseReference = [];
        }

        if ($this->workPhaseReference === []) {
            $this->addOnceToworkPhaseReference(new WorkPhaseReference());
        }

        return $this->workPhaseReference[0];
    }
}
