<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class ProcurementProjectLotType
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
     * @var null|TenderingTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TenderingTerms")
     * @JMS\Expose
     * @JMS\SerializedName("TenderingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderingTerms", setter="setTenderingTerms")
     */
    private $tenderingTerms;

    /**
     * @var null|ProcurementProject
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ProcurementProject")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProject")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementProject", setter="setProcurementProject")
     */
    private $procurementProject;

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
     * @return null|TenderingTerms
     */
    public function getTenderingTerms(): ?TenderingTerms
    {
        return $this->tenderingTerms;
    }

    /**
     * @return TenderingTerms
     */
    public function getTenderingTermsWithCreate(): TenderingTerms
    {
        $this->tenderingTerms = is_null($this->tenderingTerms) ? new TenderingTerms() : $this->tenderingTerms;

        return $this->tenderingTerms;
    }

    /**
     * @param  null|TenderingTerms $tenderingTerms
     * @return static
     */
    public function setTenderingTerms(?TenderingTerms $tenderingTerms = null): static
    {
        $this->tenderingTerms = $tenderingTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderingTerms(): static
    {
        $this->tenderingTerms = null;

        return $this;
    }

    /**
     * @return null|ProcurementProject
     */
    public function getProcurementProject(): ?ProcurementProject
    {
        return $this->procurementProject;
    }

    /**
     * @return ProcurementProject
     */
    public function getProcurementProjectWithCreate(): ProcurementProject
    {
        $this->procurementProject = is_null($this->procurementProject) ? new ProcurementProject() : $this->procurementProject;

        return $this->procurementProject;
    }

    /**
     * @param  null|ProcurementProject $procurementProject
     * @return static
     */
    public function setProcurementProject(?ProcurementProject $procurementProject = null): static
    {
        $this->procurementProject = $procurementProject;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementProject(): static
    {
        $this->procurementProject = null;

        return $this;
    }
}
