<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

class ProcurementProjectLotType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TenderingTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TenderingTerms")
     * @JMS\Expose
     * @JMS\SerializedName("TenderingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderingTerms", setter="setTenderingTerms")
     */
    private $tenderingTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ProcurementProject|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ProcurementProject")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProject")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementProject", setter="setProcurementProject")
     */
    private $procurementProject;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderingTerms|null
     */
    public function getTenderingTerms(): ?TenderingTerms
    {
        return $this->tenderingTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderingTerms
     */
    public function getTenderingTermsWithCreate(): TenderingTerms
    {
        $this->tenderingTerms = is_null($this->tenderingTerms) ? new TenderingTerms() : $this->tenderingTerms;

        return $this->tenderingTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderingTerms|null $tenderingTerms
     * @return self
     */
    public function setTenderingTerms(?TenderingTerms $tenderingTerms = null): self
    {
        $this->tenderingTerms = $tenderingTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTenderingTerms(): self
    {
        $this->tenderingTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProject|null
     */
    public function getProcurementProject(): ?ProcurementProject
    {
        return $this->procurementProject;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProject
     */
    public function getProcurementProjectWithCreate(): ProcurementProject
    {
        $this->procurementProject = is_null($this->procurementProject) ? new ProcurementProject() : $this->procurementProject;

        return $this->procurementProject;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcurementProject|null $procurementProject
     * @return self
     */
    public function setProcurementProject(?ProcurementProject $procurementProject = null): self
    {
        $this->procurementProject = $procurementProject;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProcurementProject(): self
    {
        $this->procurementProject = null;

        return $this;
    }
}
