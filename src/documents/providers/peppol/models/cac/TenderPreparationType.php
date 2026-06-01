<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OpenTenderID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderEnvelopeID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderEnvelopeTypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TenderPreparationType
{
    use HandlesObjectFlags;

    /**
     * @var null|TenderEnvelopeID
     */
    #[JMS\Accessor(getter: 'getTenderEnvelopeID', setter: 'setTenderEnvelopeID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TenderEnvelopeID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderEnvelopeID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tenderEnvelopeID;

    /**
     * @var null|TenderEnvelopeTypeCode
     */
    #[JMS\Accessor(getter: 'getTenderEnvelopeTypeCode', setter: 'setTenderEnvelopeTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TenderEnvelopeTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderEnvelopeTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tenderEnvelopeTypeCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|OpenTenderID
     */
    #[JMS\Accessor(getter: 'getOpenTenderID', setter: 'setOpenTenderID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OpenTenderID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OpenTenderID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $openTenderID;

    /**
     * @var null|array<ProcurementProjectLot>
     */
    #[JMS\Accessor(getter: 'getProcurementProjectLot', setter: 'setProcurementProjectLot')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcurementProjectLot')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ProcurementProjectLot>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ProcurementProjectLot', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $procurementProjectLot;

    /**
     * @var null|array<DocumentTenderRequirement>
     */
    #[JMS\Accessor(getter: 'getDocumentTenderRequirement', setter: 'setDocumentTenderRequirement')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentTenderRequirement')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentTenderRequirement>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentTenderRequirement', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->tenderEnvelopeID ??= new TenderEnvelopeID();

        return $this->tenderEnvelopeID;
    }

    /**
     * @param  null|TenderEnvelopeID $tenderEnvelopeID
     * @return static
     */
    public function setTenderEnvelopeID(
        ?TenderEnvelopeID $tenderEnvelopeID = null
    ): static {
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
        $this->tenderEnvelopeTypeCode ??= new TenderEnvelopeTypeCode();

        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @param  null|TenderEnvelopeTypeCode $tenderEnvelopeTypeCode
     * @return static
     */
    public function setTenderEnvelopeTypeCode(
        ?TenderEnvelopeTypeCode $tenderEnvelopeTypeCode = null
    ): static {
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
    public function setDescription(
        ?array $description = null
    ): static {
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
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
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
        $this->openTenderID ??= new OpenTenderID();

        return $this->openTenderID;
    }

    /**
     * @param  null|OpenTenderID $openTenderID
     * @return static
     */
    public function setOpenTenderID(
        ?OpenTenderID $openTenderID = null
    ): static {
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
    public function setProcurementProjectLot(
        ?array $procurementProjectLot = null
    ): static {
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
    public function addToProcurementProjectLot(
        ProcurementProjectLot $procurementProjectLot
    ): static {
        $this->procurementProjectLot[] = $procurementProjectLot;

        return $this;
    }

    /**
     * @return ProcurementProjectLot
     */
    public function addToProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->addToProcurementProjectLot($procurementProjectLot = new ProcurementProjectLot());

        return $procurementProjectLot;
    }

    /**
     * @param  ProcurementProjectLot $procurementProjectLot
     * @return static
     */
    public function addOnceToProcurementProjectLot(
        ProcurementProjectLot $procurementProjectLot
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->procurementProjectLot)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->procurementProjectLot)) {
            $this->procurementProjectLot = [];
        }

        if ([] === $this->procurementProjectLot) {
            $this->addOnceToProcurementProjectLot(new ProcurementProjectLot());
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
    public function setDocumentTenderRequirement(
        ?array $documentTenderRequirement = null
    ): static {
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
    public function addToDocumentTenderRequirement(
        DocumentTenderRequirement $documentTenderRequirement
    ): static {
        $this->documentTenderRequirement[] = $documentTenderRequirement;

        return $this;
    }

    /**
     * @return DocumentTenderRequirement
     */
    public function addToDocumentTenderRequirementWithCreate(): DocumentTenderRequirement
    {
        $this->addToDocumentTenderRequirement($documentTenderRequirement = new DocumentTenderRequirement());

        return $documentTenderRequirement;
    }

    /**
     * @param  DocumentTenderRequirement $documentTenderRequirement
     * @return static
     */
    public function addOnceToDocumentTenderRequirement(
        DocumentTenderRequirement $documentTenderRequirement
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->documentTenderRequirement)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->documentTenderRequirement)) {
            $this->documentTenderRequirement = [];
        }

        if ([] === $this->documentTenderRequirement) {
            $this->addOnceToDocumentTenderRequirement(new DocumentTenderRequirement());
        }

        return $this->documentTenderRequirement[0];
    }
}
