<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID;
use horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID;
use horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode;

class TenderPreparationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeID", setter="setTenderEnvelopeID")
     */
    private $tenderEnvelopeID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeTypeCode", setter="setTenderEnvelopeTypeCode")
     */
    private $tenderEnvelopeTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID")
     * @JMS\Expose
     * @JMS\SerializedName("OpenTenderID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOpenTenderID", setter="setOpenTenderID")
     */
    private $openTenderID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcurementProjectLot", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProcurementProjectLot", setter="setProcurementProjectLot")
     */
    private $procurementProjectLot;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentTenderRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentTenderRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentTenderRequirement", setter="setDocumentTenderRequirement")
     */
    private $documentTenderRequirement;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID|null
     */
    public function getTenderEnvelopeID(): ?TenderEnvelopeID
    {
        return $this->tenderEnvelopeID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID
     */
    public function getTenderEnvelopeIDWithCreate(): TenderEnvelopeID
    {
        $this->tenderEnvelopeID = is_null($this->tenderEnvelopeID) ? new TenderEnvelopeID() : $this->tenderEnvelopeID;

        return $this->tenderEnvelopeID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeID|null $tenderEnvelopeID
     * @return self
     */
    public function setTenderEnvelopeID(?TenderEnvelopeID $tenderEnvelopeID = null): self
    {
        $this->tenderEnvelopeID = $tenderEnvelopeID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode|null
     */
    public function getTenderEnvelopeTypeCode(): ?TenderEnvelopeTypeCode
    {
        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCodeWithCreate(): TenderEnvelopeTypeCode
    {
        $this->tenderEnvelopeTypeCode = is_null($this->tenderEnvelopeTypeCode) ? new TenderEnvelopeTypeCode() : $this->tenderEnvelopeTypeCode;

        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TenderEnvelopeTypeCode|null $tenderEnvelopeTypeCode
     * @return self
     */
    public function setTenderEnvelopeTypeCode(?TenderEnvelopeTypeCode $tenderEnvelopeTypeCode = null): self
    {
        $this->tenderEnvelopeTypeCode = $tenderEnvelopeTypeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID|null
     */
    public function getOpenTenderID(): ?OpenTenderID
    {
        return $this->openTenderID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID
     */
    public function getOpenTenderIDWithCreate(): OpenTenderID
    {
        $this->openTenderID = is_null($this->openTenderID) ? new OpenTenderID() : $this->openTenderID;

        return $this->openTenderID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OpenTenderID|null $openTenderID
     * @return self
     */
    public function setOpenTenderID(?OpenTenderID $openTenderID = null): self
    {
        $this->openTenderID = $openTenderID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot>|null
     */
    public function getProcurementProjectLot(): ?array
    {
        return $this->procurementProjectLot;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot>|null $procurementProjectLot
     * @return self
     */
    public function setProcurementProjectLot(?array $procurementProjectLot = null): self
    {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }

    /**
     * @return self
     */
    public function clearProcurementProjectLot(): self
    {
        $this->procurementProjectLot = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot $procurementProjectLot
     * @return self
     */
    public function addToProcurementProjectLot(ProcurementProjectLot $procurementProjectLot): self
    {
        $this->procurementProjectLot[] = $procurementProjectLot;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot
     */
    public function addToProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->addToprocurementProjectLot($procurementProjectLot = new ProcurementProjectLot());

        return $procurementProjectLot;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot $procurementProjectLot
     * @return self
     */
    public function addOnceToProcurementProjectLot(ProcurementProjectLot $procurementProjectLot): self
    {
        if (!is_array($this->procurementProjectLot)) {
            $this->procurementProjectLot = [];
        }

        $this->procurementProjectLot[0] = $procurementProjectLot;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot
     */
    public function addOnceToProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        if (!is_array($this->procurementProjectLot)) {
            $this->procurementProjectLot = [];
        }

        if ($this->procurementProjectLot === []) {
            $this->addOnceToprocurementProjectLot(new ProcurementProjectLot());
        }

        return $this->procurementProjectLot[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement>|null
     */
    public function getDocumentTenderRequirement(): ?array
    {
        return $this->documentTenderRequirement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement>|null $documentTenderRequirement
     * @return self
     */
    public function setDocumentTenderRequirement(?array $documentTenderRequirement = null): self
    {
        $this->documentTenderRequirement = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDocumentTenderRequirement(): self
    {
        $this->documentTenderRequirement = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement $documentTenderRequirement
     * @return self
     */
    public function addToDocumentTenderRequirement(DocumentTenderRequirement $documentTenderRequirement): self
    {
        $this->documentTenderRequirement[] = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement
     */
    public function addToDocumentTenderRequirementWithCreate(): DocumentTenderRequirement
    {
        $this->addTodocumentTenderRequirement($documentTenderRequirement = new DocumentTenderRequirement());

        return $documentTenderRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement $documentTenderRequirement
     * @return self
     */
    public function addOnceToDocumentTenderRequirement(DocumentTenderRequirement $documentTenderRequirement): self
    {
        if (!is_array($this->documentTenderRequirement)) {
            $this->documentTenderRequirement = [];
        }

        $this->documentTenderRequirement[0] = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentTenderRequirement
     */
    public function addOnceToDocumentTenderRequirementWithCreate(): DocumentTenderRequirement
    {
        if (!is_array($this->documentTenderRequirement)) {
            $this->documentTenderRequirement = [];
        }

        if ($this->documentTenderRequirement === []) {
            $this->addOnceTodocumentTenderRequirement(new DocumentTenderRequirement());
        }

        return $this->documentTenderRequirement[0];
    }
}
