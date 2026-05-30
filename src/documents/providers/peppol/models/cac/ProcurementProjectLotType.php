<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class ProcurementProjectLotType
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
     * @var null|TenderingTerms
     */
    #[JMS\Accessor(getter: 'getTenderingTerms', setter: 'setTenderingTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TenderingTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TenderingTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $tenderingTerms;

    /**
     * @var null|ProcurementProject
     */
    #[JMS\Accessor(getter: 'getProcurementProject', setter: 'setProcurementProject')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcurementProject')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ProcurementProject')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->tenderingTerms ??= new TenderingTerms();

        return $this->tenderingTerms;
    }

    /**
     * @param  null|TenderingTerms $tenderingTerms
     * @return static
     */
    public function setTenderingTerms(
        ?TenderingTerms $tenderingTerms = null
    ): static {
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
        $this->procurementProject ??= new ProcurementProject();

        return $this->procurementProject;
    }

    /**
     * @param  null|ProcurementProject $procurementProject
     * @return static
     */
    public function setProcurementProject(
        ?ProcurementProject $procurementProject = null
    ): static {
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
