<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\OpenTenderID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeTypeCode;
use JMS\Serializer\Annotation as JMS;

class TenderPreparationType
{
    use HandlesObjectFlags;

    /**
     * @var null|TenderEnvelopeID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeID")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeID", setter="setTenderEnvelopeID")
     */
    private $tenderEnvelopeID;

    /**
     * @var null|TenderEnvelopeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeTypeCode", setter="setTenderEnvelopeTypeCode")
     */
    private $tenderEnvelopeTypeCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|OpenTenderID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\OpenTenderID")
     * @JMS\Expose
     * @JMS\SerializedName("OpenTenderID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOpenTenderID", setter="setOpenTenderID")
     */
    private $openTenderID;

    /**
     * @var null|array<ProcurementProjectLot>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ProcurementProjectLot>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcurementProjectLot", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProcurementProjectLot", setter="setProcurementProjectLot")
     */
    private $procurementProjectLot;

    /**
     * @var null|array<DocumentTenderRequirement>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DocumentTenderRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentTenderRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentTenderRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentTenderRequirement", setter="setDocumentTenderRequirement")
     */
    private $documentTenderRequirement;

    /**
     * @return null|TenderEnvelopeID
     */
    public function getTenderEnvelopeID(): ?TenderEnvelopeID
    {
        return $this->tenderEnvelopeID;
    }

    /**
     * @return TenderEnvelopeID
     */
    public function getTenderEnvelopeIDWithCreate(): TenderEnvelopeID
    {
        $this->tenderEnvelopeID = is_null($this->tenderEnvelopeID) ? new TenderEnvelopeID() : $this->tenderEnvelopeID;

        return $this->tenderEnvelopeID;
    }

    /**
     * @param  null|TenderEnvelopeID $tenderEnvelopeID
     * @return static
     */
    public function setTenderEnvelopeID(?TenderEnvelopeID $tenderEnvelopeID = null): static
    {
        $this->tenderEnvelopeID = $tenderEnvelopeID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderEnvelopeID(): static
    {
        $this->tenderEnvelopeID = null;

        return $this;
    }

    /**
     * @return null|TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCode(): ?TenderEnvelopeTypeCode
    {
        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @return TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCodeWithCreate(): TenderEnvelopeTypeCode
    {
        $this->tenderEnvelopeTypeCode = is_null($this->tenderEnvelopeTypeCode) ? new TenderEnvelopeTypeCode() : $this->tenderEnvelopeTypeCode;

        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @param  null|TenderEnvelopeTypeCode $tenderEnvelopeTypeCode
     * @return static
     */
    public function setTenderEnvelopeTypeCode(?TenderEnvelopeTypeCode $tenderEnvelopeTypeCode = null): static
    {
        $this->tenderEnvelopeTypeCode = $tenderEnvelopeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderEnvelopeTypeCode(): static
    {
        $this->tenderEnvelopeTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|OpenTenderID
     */
    public function getOpenTenderID(): ?OpenTenderID
    {
        return $this->openTenderID;
    }

    /**
     * @return OpenTenderID
     */
    public function getOpenTenderIDWithCreate(): OpenTenderID
    {
        $this->openTenderID = is_null($this->openTenderID) ? new OpenTenderID() : $this->openTenderID;

        return $this->openTenderID;
    }

    /**
     * @param  null|OpenTenderID $openTenderID
     * @return static
     */
    public function setOpenTenderID(?OpenTenderID $openTenderID = null): static
    {
        $this->openTenderID = $openTenderID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOpenTenderID(): static
    {
        $this->openTenderID = null;

        return $this;
    }

    /**
     * @return null|array<ProcurementProjectLot>
     */
    public function getProcurementProjectLot(): ?array
    {
        return $this->procurementProjectLot;
    }

    /**
     * @param  null|array<ProcurementProjectLot> $procurementProjectLot
     * @return static
     */
    public function setProcurementProjectLot(?array $procurementProjectLot = null): static
    {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementProjectLot(): static
    {
        $this->procurementProjectLot = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearProcurementProjectLot(): static
    {
        $this->procurementProjectLot = [];

        return $this;
    }

    /**
     * @return null|ProcurementProjectLot
     */
    public function firstProcurementProjectLot(): ?ProcurementProjectLot
    {
        $procurementProjectLot = $this->procurementProjectLot ?? [];
        $procurementProjectLot = reset($procurementProjectLot);

        if (false === $procurementProjectLot) {
            return null;
        }

        return $procurementProjectLot;
    }

    /**
     * @return null|ProcurementProjectLot
     */
    public function lastProcurementProjectLot(): ?ProcurementProjectLot
    {
        $procurementProjectLot = $this->procurementProjectLot ?? [];
        $procurementProjectLot = end($procurementProjectLot);

        if (false === $procurementProjectLot) {
            return null;
        }

        return $procurementProjectLot;
    }

    /**
     * @param  ProcurementProjectLot $procurementProjectLot
     * @return static
     */
    public function addToProcurementProjectLot(ProcurementProjectLot $procurementProjectLot): static
    {
        $this->procurementProjectLot[] = $procurementProjectLot;

        return $this;
    }

    /**
     * @return ProcurementProjectLot
     */
    public function addToProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->addToprocurementProjectLot($procurementProjectLot = new ProcurementProjectLot());

        return $procurementProjectLot;
    }

    /**
     * @param  ProcurementProjectLot $procurementProjectLot
     * @return static
     */
    public function addOnceToProcurementProjectLot(ProcurementProjectLot $procurementProjectLot): static
    {
        if (!is_array($this->procurementProjectLot)) {
            $this->procurementProjectLot = [];
        }

        $this->procurementProjectLot[0] = $procurementProjectLot;

        return $this;
    }

    /**
     * @return ProcurementProjectLot
     */
    public function addOnceToProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        if (!is_array($this->procurementProjectLot)) {
            $this->procurementProjectLot = [];
        }

        if ([] === $this->procurementProjectLot) {
            $this->addOnceToprocurementProjectLot(new ProcurementProjectLot());
        }

        return $this->procurementProjectLot[0];
    }

    /**
     * @return null|array<DocumentTenderRequirement>
     */
    public function getDocumentTenderRequirement(): ?array
    {
        return $this->documentTenderRequirement;
    }

    /**
     * @param  null|array<DocumentTenderRequirement> $documentTenderRequirement
     * @return static
     */
    public function setDocumentTenderRequirement(?array $documentTenderRequirement = null): static
    {
        $this->documentTenderRequirement = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentTenderRequirement(): static
    {
        $this->documentTenderRequirement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentTenderRequirement(): static
    {
        $this->documentTenderRequirement = [];

        return $this;
    }

    /**
     * @return null|DocumentTenderRequirement
     */
    public function firstDocumentTenderRequirement(): ?DocumentTenderRequirement
    {
        $documentTenderRequirement = $this->documentTenderRequirement ?? [];
        $documentTenderRequirement = reset($documentTenderRequirement);

        if (false === $documentTenderRequirement) {
            return null;
        }

        return $documentTenderRequirement;
    }

    /**
     * @return null|DocumentTenderRequirement
     */
    public function lastDocumentTenderRequirement(): ?DocumentTenderRequirement
    {
        $documentTenderRequirement = $this->documentTenderRequirement ?? [];
        $documentTenderRequirement = end($documentTenderRequirement);

        if (false === $documentTenderRequirement) {
            return null;
        }

        return $documentTenderRequirement;
    }

    /**
     * @param  DocumentTenderRequirement $documentTenderRequirement
     * @return static
     */
    public function addToDocumentTenderRequirement(DocumentTenderRequirement $documentTenderRequirement): static
    {
        $this->documentTenderRequirement[] = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return DocumentTenderRequirement
     */
    public function addToDocumentTenderRequirementWithCreate(): DocumentTenderRequirement
    {
        $this->addTodocumentTenderRequirement($documentTenderRequirement = new DocumentTenderRequirement());

        return $documentTenderRequirement;
    }

    /**
     * @param  DocumentTenderRequirement $documentTenderRequirement
     * @return static
     */
    public function addOnceToDocumentTenderRequirement(DocumentTenderRequirement $documentTenderRequirement): static
    {
        if (!is_array($this->documentTenderRequirement)) {
            $this->documentTenderRequirement = [];
        }

        $this->documentTenderRequirement[0] = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return DocumentTenderRequirement
     */
    public function addOnceToDocumentTenderRequirementWithCreate(): DocumentTenderRequirement
    {
        if (!is_array($this->documentTenderRequirement)) {
            $this->documentTenderRequirement = [];
        }

        if ([] === $this->documentTenderRequirement) {
            $this->addOnceTodocumentTenderRequirement(new DocumentTenderRequirement());
        }

        return $this->documentTenderRequirement[0];
    }
}
