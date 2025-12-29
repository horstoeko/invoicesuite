<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ContractingSystemCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ExpenseCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NegotiationDescription;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OriginalContractingSystemID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PartPresentationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProcedureCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubmissionMethodCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\UrgencyCode;
use JMS\Serializer\Annotation as JMS;

class TenderingProcessType
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
     * @var null|OriginalContractingSystemID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OriginalContractingSystemID")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalContractingSystemID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalContractingSystemID", setter="setOriginalContractingSystemID")
     */
    private $originalContractingSystemID;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<NegotiationDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\NegotiationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("NegotiationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NegotiationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNegotiationDescription", setter="setNegotiationDescription")
     */
    private $negotiationDescription;

    /**
     * @var null|ProcedureCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ProcedureCode")
     * @JMS\Expose
     * @JMS\SerializedName("ProcedureCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcedureCode", setter="setProcedureCode")
     */
    private $procedureCode;

    /**
     * @var null|UrgencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\UrgencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("UrgencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUrgencyCode", setter="setUrgencyCode")
     */
    private $urgencyCode;

    /**
     * @var null|ExpenseCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ExpenseCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExpenseCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpenseCode", setter="setExpenseCode")
     */
    private $expenseCode;

    /**
     * @var null|PartPresentationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PartPresentationCode")
     * @JMS\Expose
     * @JMS\SerializedName("PartPresentationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartPresentationCode", setter="setPartPresentationCode")
     */
    private $partPresentationCode;

    /**
     * @var null|ContractingSystemCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ContractingSystemCode")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingSystemCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractingSystemCode", setter="setContractingSystemCode")
     */
    private $contractingSystemCode;

    /**
     * @var null|SubmissionMethodCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SubmissionMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubmissionMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubmissionMethodCode", setter="setSubmissionMethodCode")
     */
    private $submissionMethodCode;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CandidateReductionConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCandidateReductionConstraintIndicator", setter="setCandidateReductionConstraintIndicator")
     */
    private $candidateReductionConstraintIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("GovernmentAgreementConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGovernmentAgreementConstraintIndicator", setter="setGovernmentAgreementConstraintIndicator")
     */
    private $governmentAgreementConstraintIndicator;

    /**
     * @var null|DocumentAvailabilityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DocumentAvailabilityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentAvailabilityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentAvailabilityPeriod", setter="setDocumentAvailabilityPeriod")
     */
    private $documentAvailabilityPeriod;

    /**
     * @var null|TenderSubmissionDeadlinePeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TenderSubmissionDeadlinePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TenderSubmissionDeadlinePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderSubmissionDeadlinePeriod", setter="setTenderSubmissionDeadlinePeriod")
     */
    private $tenderSubmissionDeadlinePeriod;

    /**
     * @var null|InvitationSubmissionPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\InvitationSubmissionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("InvitationSubmissionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvitationSubmissionPeriod", setter="setInvitationSubmissionPeriod")
     */
    private $invitationSubmissionPeriod;

    /**
     * @var null|ParticipationRequestReceptionPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ParticipationRequestReceptionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ParticipationRequestReceptionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParticipationRequestReceptionPeriod", setter="setParticipationRequestReceptionPeriod")
     */
    private $participationRequestReceptionPeriod;

    /**
     * @var null|array<NoticeDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\NoticeDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("NoticeDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NoticeDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNoticeDocumentReference", setter="setNoticeDocumentReference")
     */
    private $noticeDocumentReference;

    /**
     * @var null|array<AdditionalDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var null|array<ProcessJustification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ProcessJustification>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessJustification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcessJustification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProcessJustification", setter="setProcessJustification")
     */
    private $processJustification;

    /**
     * @var null|EconomicOperatorShortList
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EconomicOperatorShortList")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorShortList")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEconomicOperatorShortList", setter="setEconomicOperatorShortList")
     */
    private $economicOperatorShortList;

    /**
     * @var null|array<OpenTenderEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\OpenTenderEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("OpenTenderEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OpenTenderEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOpenTenderEvent", setter="setOpenTenderEvent")
     */
    private $openTenderEvent;

    /**
     * @var null|AuctionTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AuctionTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionTerms", setter="setAuctionTerms")
     */
    private $auctionTerms;

    /**
     * @var null|FrameworkAgreement
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\FrameworkAgreement")
     * @JMS\Expose
     * @JMS\SerializedName("FrameworkAgreement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFrameworkAgreement", setter="setFrameworkAgreement")
     */
    private $frameworkAgreement;

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
     * @return null|OriginalContractingSystemID
     */
    public function getOriginalContractingSystemID(): ?OriginalContractingSystemID
    {
        return $this->originalContractingSystemID;
    }

    /**
     * @return OriginalContractingSystemID
     */
    public function getOriginalContractingSystemIDWithCreate(): OriginalContractingSystemID
    {
        $this->originalContractingSystemID = is_null($this->originalContractingSystemID) ? new OriginalContractingSystemID() : $this->originalContractingSystemID;

        return $this->originalContractingSystemID;
    }

    /**
     * @param  null|OriginalContractingSystemID $originalContractingSystemID
     * @return static
     */
    public function setOriginalContractingSystemID(
        ?OriginalContractingSystemID $originalContractingSystemID = null,
    ): static {
        $this->originalContractingSystemID = $originalContractingSystemID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalContractingSystemID(): static
    {
        $this->originalContractingSystemID = null;

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
     * @return null|array<NegotiationDescription>
     */
    public function getNegotiationDescription(): ?array
    {
        return $this->negotiationDescription;
    }

    /**
     * @param  null|array<NegotiationDescription> $negotiationDescription
     * @return static
     */
    public function setNegotiationDescription(?array $negotiationDescription = null): static
    {
        $this->negotiationDescription = $negotiationDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNegotiationDescription(): static
    {
        $this->negotiationDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNegotiationDescription(): static
    {
        $this->negotiationDescription = [];

        return $this;
    }

    /**
     * @return null|NegotiationDescription
     */
    public function firstNegotiationDescription(): ?NegotiationDescription
    {
        $negotiationDescription = $this->negotiationDescription ?? [];
        $negotiationDescription = reset($negotiationDescription);

        if (false === $negotiationDescription) {
            return null;
        }

        return $negotiationDescription;
    }

    /**
     * @return null|NegotiationDescription
     */
    public function lastNegotiationDescription(): ?NegotiationDescription
    {
        $negotiationDescription = $this->negotiationDescription ?? [];
        $negotiationDescription = end($negotiationDescription);

        if (false === $negotiationDescription) {
            return null;
        }

        return $negotiationDescription;
    }

    /**
     * @param  NegotiationDescription $negotiationDescription
     * @return static
     */
    public function addToNegotiationDescription(NegotiationDescription $negotiationDescription): static
    {
        $this->negotiationDescription[] = $negotiationDescription;

        return $this;
    }

    /**
     * @return NegotiationDescription
     */
    public function addToNegotiationDescriptionWithCreate(): NegotiationDescription
    {
        $this->addTonegotiationDescription($negotiationDescription = new NegotiationDescription());

        return $negotiationDescription;
    }

    /**
     * @param  NegotiationDescription $negotiationDescription
     * @return static
     */
    public function addOnceToNegotiationDescription(NegotiationDescription $negotiationDescription): static
    {
        if (!is_array($this->negotiationDescription)) {
            $this->negotiationDescription = [];
        }

        $this->negotiationDescription[0] = $negotiationDescription;

        return $this;
    }

    /**
     * @return NegotiationDescription
     */
    public function addOnceToNegotiationDescriptionWithCreate(): NegotiationDescription
    {
        if (!is_array($this->negotiationDescription)) {
            $this->negotiationDescription = [];
        }

        if ([] === $this->negotiationDescription) {
            $this->addOnceTonegotiationDescription(new NegotiationDescription());
        }

        return $this->negotiationDescription[0];
    }

    /**
     * @return null|ProcedureCode
     */
    public function getProcedureCode(): ?ProcedureCode
    {
        return $this->procedureCode;
    }

    /**
     * @return ProcedureCode
     */
    public function getProcedureCodeWithCreate(): ProcedureCode
    {
        $this->procedureCode = is_null($this->procedureCode) ? new ProcedureCode() : $this->procedureCode;

        return $this->procedureCode;
    }

    /**
     * @param  null|ProcedureCode $procedureCode
     * @return static
     */
    public function setProcedureCode(?ProcedureCode $procedureCode = null): static
    {
        $this->procedureCode = $procedureCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcedureCode(): static
    {
        $this->procedureCode = null;

        return $this;
    }

    /**
     * @return null|UrgencyCode
     */
    public function getUrgencyCode(): ?UrgencyCode
    {
        return $this->urgencyCode;
    }

    /**
     * @return UrgencyCode
     */
    public function getUrgencyCodeWithCreate(): UrgencyCode
    {
        $this->urgencyCode = is_null($this->urgencyCode) ? new UrgencyCode() : $this->urgencyCode;

        return $this->urgencyCode;
    }

    /**
     * @param  null|UrgencyCode $urgencyCode
     * @return static
     */
    public function setUrgencyCode(?UrgencyCode $urgencyCode = null): static
    {
        $this->urgencyCode = $urgencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUrgencyCode(): static
    {
        $this->urgencyCode = null;

        return $this;
    }

    /**
     * @return null|ExpenseCode
     */
    public function getExpenseCode(): ?ExpenseCode
    {
        return $this->expenseCode;
    }

    /**
     * @return ExpenseCode
     */
    public function getExpenseCodeWithCreate(): ExpenseCode
    {
        $this->expenseCode = is_null($this->expenseCode) ? new ExpenseCode() : $this->expenseCode;

        return $this->expenseCode;
    }

    /**
     * @param  null|ExpenseCode $expenseCode
     * @return static
     */
    public function setExpenseCode(?ExpenseCode $expenseCode = null): static
    {
        $this->expenseCode = $expenseCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpenseCode(): static
    {
        $this->expenseCode = null;

        return $this;
    }

    /**
     * @return null|PartPresentationCode
     */
    public function getPartPresentationCode(): ?PartPresentationCode
    {
        return $this->partPresentationCode;
    }

    /**
     * @return PartPresentationCode
     */
    public function getPartPresentationCodeWithCreate(): PartPresentationCode
    {
        $this->partPresentationCode = is_null($this->partPresentationCode) ? new PartPresentationCode() : $this->partPresentationCode;

        return $this->partPresentationCode;
    }

    /**
     * @param  null|PartPresentationCode $partPresentationCode
     * @return static
     */
    public function setPartPresentationCode(?PartPresentationCode $partPresentationCode = null): static
    {
        $this->partPresentationCode = $partPresentationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartPresentationCode(): static
    {
        $this->partPresentationCode = null;

        return $this;
    }

    /**
     * @return null|ContractingSystemCode
     */
    public function getContractingSystemCode(): ?ContractingSystemCode
    {
        return $this->contractingSystemCode;
    }

    /**
     * @return ContractingSystemCode
     */
    public function getContractingSystemCodeWithCreate(): ContractingSystemCode
    {
        $this->contractingSystemCode = is_null($this->contractingSystemCode) ? new ContractingSystemCode() : $this->contractingSystemCode;

        return $this->contractingSystemCode;
    }

    /**
     * @param  null|ContractingSystemCode $contractingSystemCode
     * @return static
     */
    public function setContractingSystemCode(?ContractingSystemCode $contractingSystemCode = null): static
    {
        $this->contractingSystemCode = $contractingSystemCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractingSystemCode(): static
    {
        $this->contractingSystemCode = null;

        return $this;
    }

    /**
     * @return null|SubmissionMethodCode
     */
    public function getSubmissionMethodCode(): ?SubmissionMethodCode
    {
        return $this->submissionMethodCode;
    }

    /**
     * @return SubmissionMethodCode
     */
    public function getSubmissionMethodCodeWithCreate(): SubmissionMethodCode
    {
        $this->submissionMethodCode = is_null($this->submissionMethodCode) ? new SubmissionMethodCode() : $this->submissionMethodCode;

        return $this->submissionMethodCode;
    }

    /**
     * @param  null|SubmissionMethodCode $submissionMethodCode
     * @return static
     */
    public function setSubmissionMethodCode(?SubmissionMethodCode $submissionMethodCode = null): static
    {
        $this->submissionMethodCode = $submissionMethodCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubmissionMethodCode(): static
    {
        $this->submissionMethodCode = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCandidateReductionConstraintIndicator(): ?bool
    {
        return $this->candidateReductionConstraintIndicator;
    }

    /**
     * @param  null|bool $candidateReductionConstraintIndicator
     * @return static
     */
    public function setCandidateReductionConstraintIndicator(
        ?bool $candidateReductionConstraintIndicator = null,
    ): static {
        $this->candidateReductionConstraintIndicator = $candidateReductionConstraintIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCandidateReductionConstraintIndicator(): static
    {
        $this->candidateReductionConstraintIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getGovernmentAgreementConstraintIndicator(): ?bool
    {
        return $this->governmentAgreementConstraintIndicator;
    }

    /**
     * @param  null|bool $governmentAgreementConstraintIndicator
     * @return static
     */
    public function setGovernmentAgreementConstraintIndicator(
        ?bool $governmentAgreementConstraintIndicator = null,
    ): static {
        $this->governmentAgreementConstraintIndicator = $governmentAgreementConstraintIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGovernmentAgreementConstraintIndicator(): static
    {
        $this->governmentAgreementConstraintIndicator = null;

        return $this;
    }

    /**
     * @return null|DocumentAvailabilityPeriod
     */
    public function getDocumentAvailabilityPeriod(): ?DocumentAvailabilityPeriod
    {
        return $this->documentAvailabilityPeriod;
    }

    /**
     * @return DocumentAvailabilityPeriod
     */
    public function getDocumentAvailabilityPeriodWithCreate(): DocumentAvailabilityPeriod
    {
        $this->documentAvailabilityPeriod = is_null($this->documentAvailabilityPeriod) ? new DocumentAvailabilityPeriod() : $this->documentAvailabilityPeriod;

        return $this->documentAvailabilityPeriod;
    }

    /**
     * @param  null|DocumentAvailabilityPeriod $documentAvailabilityPeriod
     * @return static
     */
    public function setDocumentAvailabilityPeriod(
        ?DocumentAvailabilityPeriod $documentAvailabilityPeriod = null,
    ): static {
        $this->documentAvailabilityPeriod = $documentAvailabilityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentAvailabilityPeriod(): static
    {
        $this->documentAvailabilityPeriod = null;

        return $this;
    }

    /**
     * @return null|TenderSubmissionDeadlinePeriod
     */
    public function getTenderSubmissionDeadlinePeriod(): ?TenderSubmissionDeadlinePeriod
    {
        return $this->tenderSubmissionDeadlinePeriod;
    }

    /**
     * @return TenderSubmissionDeadlinePeriod
     */
    public function getTenderSubmissionDeadlinePeriodWithCreate(): TenderSubmissionDeadlinePeriod
    {
        $this->tenderSubmissionDeadlinePeriod = is_null($this->tenderSubmissionDeadlinePeriod) ? new TenderSubmissionDeadlinePeriod() : $this->tenderSubmissionDeadlinePeriod;

        return $this->tenderSubmissionDeadlinePeriod;
    }

    /**
     * @param  null|TenderSubmissionDeadlinePeriod $tenderSubmissionDeadlinePeriod
     * @return static
     */
    public function setTenderSubmissionDeadlinePeriod(
        ?TenderSubmissionDeadlinePeriod $tenderSubmissionDeadlinePeriod = null,
    ): static {
        $this->tenderSubmissionDeadlinePeriod = $tenderSubmissionDeadlinePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderSubmissionDeadlinePeriod(): static
    {
        $this->tenderSubmissionDeadlinePeriod = null;

        return $this;
    }

    /**
     * @return null|InvitationSubmissionPeriod
     */
    public function getInvitationSubmissionPeriod(): ?InvitationSubmissionPeriod
    {
        return $this->invitationSubmissionPeriod;
    }

    /**
     * @return InvitationSubmissionPeriod
     */
    public function getInvitationSubmissionPeriodWithCreate(): InvitationSubmissionPeriod
    {
        $this->invitationSubmissionPeriod = is_null($this->invitationSubmissionPeriod) ? new InvitationSubmissionPeriod() : $this->invitationSubmissionPeriod;

        return $this->invitationSubmissionPeriod;
    }

    /**
     * @param  null|InvitationSubmissionPeriod $invitationSubmissionPeriod
     * @return static
     */
    public function setInvitationSubmissionPeriod(
        ?InvitationSubmissionPeriod $invitationSubmissionPeriod = null,
    ): static {
        $this->invitationSubmissionPeriod = $invitationSubmissionPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvitationSubmissionPeriod(): static
    {
        $this->invitationSubmissionPeriod = null;

        return $this;
    }

    /**
     * @return null|ParticipationRequestReceptionPeriod
     */
    public function getParticipationRequestReceptionPeriod(): ?ParticipationRequestReceptionPeriod
    {
        return $this->participationRequestReceptionPeriod;
    }

    /**
     * @return ParticipationRequestReceptionPeriod
     */
    public function getParticipationRequestReceptionPeriodWithCreate(): ParticipationRequestReceptionPeriod
    {
        $this->participationRequestReceptionPeriod = is_null($this->participationRequestReceptionPeriod) ? new ParticipationRequestReceptionPeriod() : $this->participationRequestReceptionPeriod;

        return $this->participationRequestReceptionPeriod;
    }

    /**
     * @param  null|ParticipationRequestReceptionPeriod $participationRequestReceptionPeriod
     * @return static
     */
    public function setParticipationRequestReceptionPeriod(
        ?ParticipationRequestReceptionPeriod $participationRequestReceptionPeriod = null,
    ): static {
        $this->participationRequestReceptionPeriod = $participationRequestReceptionPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParticipationRequestReceptionPeriod(): static
    {
        $this->participationRequestReceptionPeriod = null;

        return $this;
    }

    /**
     * @return null|array<NoticeDocumentReference>
     */
    public function getNoticeDocumentReference(): ?array
    {
        return $this->noticeDocumentReference;
    }

    /**
     * @param  null|array<NoticeDocumentReference> $noticeDocumentReference
     * @return static
     */
    public function setNoticeDocumentReference(?array $noticeDocumentReference = null): static
    {
        $this->noticeDocumentReference = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNoticeDocumentReference(): static
    {
        $this->noticeDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNoticeDocumentReference(): static
    {
        $this->noticeDocumentReference = [];

        return $this;
    }

    /**
     * @return null|NoticeDocumentReference
     */
    public function firstNoticeDocumentReference(): ?NoticeDocumentReference
    {
        $noticeDocumentReference = $this->noticeDocumentReference ?? [];
        $noticeDocumentReference = reset($noticeDocumentReference);

        if (false === $noticeDocumentReference) {
            return null;
        }

        return $noticeDocumentReference;
    }

    /**
     * @return null|NoticeDocumentReference
     */
    public function lastNoticeDocumentReference(): ?NoticeDocumentReference
    {
        $noticeDocumentReference = $this->noticeDocumentReference ?? [];
        $noticeDocumentReference = end($noticeDocumentReference);

        if (false === $noticeDocumentReference) {
            return null;
        }

        return $noticeDocumentReference;
    }

    /**
     * @param  NoticeDocumentReference $noticeDocumentReference
     * @return static
     */
    public function addToNoticeDocumentReference(NoticeDocumentReference $noticeDocumentReference): static
    {
        $this->noticeDocumentReference[] = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return NoticeDocumentReference
     */
    public function addToNoticeDocumentReferenceWithCreate(): NoticeDocumentReference
    {
        $this->addTonoticeDocumentReference($noticeDocumentReference = new NoticeDocumentReference());

        return $noticeDocumentReference;
    }

    /**
     * @param  NoticeDocumentReference $noticeDocumentReference
     * @return static
     */
    public function addOnceToNoticeDocumentReference(NoticeDocumentReference $noticeDocumentReference): static
    {
        if (!is_array($this->noticeDocumentReference)) {
            $this->noticeDocumentReference = [];
        }

        $this->noticeDocumentReference[0] = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return NoticeDocumentReference
     */
    public function addOnceToNoticeDocumentReferenceWithCreate(): NoticeDocumentReference
    {
        if (!is_array($this->noticeDocumentReference)) {
            $this->noticeDocumentReference = [];
        }

        if ([] === $this->noticeDocumentReference) {
            $this->addOnceTonoticeDocumentReference(new NoticeDocumentReference());
        }

        return $this->noticeDocumentReference[0];
    }

    /**
     * @return null|array<AdditionalDocumentReference>
     */
    public function getAdditionalDocumentReference(): ?array
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @param  null|array<AdditionalDocumentReference> $additionalDocumentReference
     * @return static
     */
    public function setAdditionalDocumentReference(?array $additionalDocumentReference = null): static
    {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalDocumentReference(): static
    {
        $this->additionalDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalDocumentReference(): static
    {
        $this->additionalDocumentReference = [];

        return $this;
    }

    /**
     * @return null|AdditionalDocumentReference
     */
    public function firstAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = reset($additionalDocumentReference);

        if (false === $additionalDocumentReference) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @return null|AdditionalDocumentReference
     */
    public function lastAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = end($additionalDocumentReference);

        if (false === $additionalDocumentReference) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @param  AdditionalDocumentReference $additionalDocumentReference
     * @return static
     */
    public function addToAdditionalDocumentReference(AdditionalDocumentReference $additionalDocumentReference): static
    {
        $this->additionalDocumentReference[] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function addToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->addToadditionalDocumentReference($additionalDocumentReference = new AdditionalDocumentReference());

        return $additionalDocumentReference;
    }

    /**
     * @param  AdditionalDocumentReference $additionalDocumentReference
     * @return static
     */
    public function addOnceToAdditionalDocumentReference(
        AdditionalDocumentReference $additionalDocumentReference,
    ): static {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        $this->additionalDocumentReference[0] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function addOnceToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        if ([] === $this->additionalDocumentReference) {
            $this->addOnceToadditionalDocumentReference(new AdditionalDocumentReference());
        }

        return $this->additionalDocumentReference[0];
    }

    /**
     * @return null|array<ProcessJustification>
     */
    public function getProcessJustification(): ?array
    {
        return $this->processJustification;
    }

    /**
     * @param  null|array<ProcessJustification> $processJustification
     * @return static
     */
    public function setProcessJustification(?array $processJustification = null): static
    {
        $this->processJustification = $processJustification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcessJustification(): static
    {
        $this->processJustification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearProcessJustification(): static
    {
        $this->processJustification = [];

        return $this;
    }

    /**
     * @return null|ProcessJustification
     */
    public function firstProcessJustification(): ?ProcessJustification
    {
        $processJustification = $this->processJustification ?? [];
        $processJustification = reset($processJustification);

        if (false === $processJustification) {
            return null;
        }

        return $processJustification;
    }

    /**
     * @return null|ProcessJustification
     */
    public function lastProcessJustification(): ?ProcessJustification
    {
        $processJustification = $this->processJustification ?? [];
        $processJustification = end($processJustification);

        if (false === $processJustification) {
            return null;
        }

        return $processJustification;
    }

    /**
     * @param  ProcessJustification $processJustification
     * @return static
     */
    public function addToProcessJustification(ProcessJustification $processJustification): static
    {
        $this->processJustification[] = $processJustification;

        return $this;
    }

    /**
     * @return ProcessJustification
     */
    public function addToProcessJustificationWithCreate(): ProcessJustification
    {
        $this->addToprocessJustification($processJustification = new ProcessJustification());

        return $processJustification;
    }

    /**
     * @param  ProcessJustification $processJustification
     * @return static
     */
    public function addOnceToProcessJustification(ProcessJustification $processJustification): static
    {
        if (!is_array($this->processJustification)) {
            $this->processJustification = [];
        }

        $this->processJustification[0] = $processJustification;

        return $this;
    }

    /**
     * @return ProcessJustification
     */
    public function addOnceToProcessJustificationWithCreate(): ProcessJustification
    {
        if (!is_array($this->processJustification)) {
            $this->processJustification = [];
        }

        if ([] === $this->processJustification) {
            $this->addOnceToprocessJustification(new ProcessJustification());
        }

        return $this->processJustification[0];
    }

    /**
     * @return null|EconomicOperatorShortList
     */
    public function getEconomicOperatorShortList(): ?EconomicOperatorShortList
    {
        return $this->economicOperatorShortList;
    }

    /**
     * @return EconomicOperatorShortList
     */
    public function getEconomicOperatorShortListWithCreate(): EconomicOperatorShortList
    {
        $this->economicOperatorShortList = is_null($this->economicOperatorShortList) ? new EconomicOperatorShortList() : $this->economicOperatorShortList;

        return $this->economicOperatorShortList;
    }

    /**
     * @param  null|EconomicOperatorShortList $economicOperatorShortList
     * @return static
     */
    public function setEconomicOperatorShortList(?EconomicOperatorShortList $economicOperatorShortList = null): static
    {
        $this->economicOperatorShortList = $economicOperatorShortList;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEconomicOperatorShortList(): static
    {
        $this->economicOperatorShortList = null;

        return $this;
    }

    /**
     * @return null|array<OpenTenderEvent>
     */
    public function getOpenTenderEvent(): ?array
    {
        return $this->openTenderEvent;
    }

    /**
     * @param  null|array<OpenTenderEvent> $openTenderEvent
     * @return static
     */
    public function setOpenTenderEvent(?array $openTenderEvent = null): static
    {
        $this->openTenderEvent = $openTenderEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOpenTenderEvent(): static
    {
        $this->openTenderEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOpenTenderEvent(): static
    {
        $this->openTenderEvent = [];

        return $this;
    }

    /**
     * @return null|OpenTenderEvent
     */
    public function firstOpenTenderEvent(): ?OpenTenderEvent
    {
        $openTenderEvent = $this->openTenderEvent ?? [];
        $openTenderEvent = reset($openTenderEvent);

        if (false === $openTenderEvent) {
            return null;
        }

        return $openTenderEvent;
    }

    /**
     * @return null|OpenTenderEvent
     */
    public function lastOpenTenderEvent(): ?OpenTenderEvent
    {
        $openTenderEvent = $this->openTenderEvent ?? [];
        $openTenderEvent = end($openTenderEvent);

        if (false === $openTenderEvent) {
            return null;
        }

        return $openTenderEvent;
    }

    /**
     * @param  OpenTenderEvent $openTenderEvent
     * @return static
     */
    public function addToOpenTenderEvent(OpenTenderEvent $openTenderEvent): static
    {
        $this->openTenderEvent[] = $openTenderEvent;

        return $this;
    }

    /**
     * @return OpenTenderEvent
     */
    public function addToOpenTenderEventWithCreate(): OpenTenderEvent
    {
        $this->addToopenTenderEvent($openTenderEvent = new OpenTenderEvent());

        return $openTenderEvent;
    }

    /**
     * @param  OpenTenderEvent $openTenderEvent
     * @return static
     */
    public function addOnceToOpenTenderEvent(OpenTenderEvent $openTenderEvent): static
    {
        if (!is_array($this->openTenderEvent)) {
            $this->openTenderEvent = [];
        }

        $this->openTenderEvent[0] = $openTenderEvent;

        return $this;
    }

    /**
     * @return OpenTenderEvent
     */
    public function addOnceToOpenTenderEventWithCreate(): OpenTenderEvent
    {
        if (!is_array($this->openTenderEvent)) {
            $this->openTenderEvent = [];
        }

        if ([] === $this->openTenderEvent) {
            $this->addOnceToopenTenderEvent(new OpenTenderEvent());
        }

        return $this->openTenderEvent[0];
    }

    /**
     * @return null|AuctionTerms
     */
    public function getAuctionTerms(): ?AuctionTerms
    {
        return $this->auctionTerms;
    }

    /**
     * @return AuctionTerms
     */
    public function getAuctionTermsWithCreate(): AuctionTerms
    {
        $this->auctionTerms = is_null($this->auctionTerms) ? new AuctionTerms() : $this->auctionTerms;

        return $this->auctionTerms;
    }

    /**
     * @param  null|AuctionTerms $auctionTerms
     * @return static
     */
    public function setAuctionTerms(?AuctionTerms $auctionTerms = null): static
    {
        $this->auctionTerms = $auctionTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAuctionTerms(): static
    {
        $this->auctionTerms = null;

        return $this;
    }

    /**
     * @return null|FrameworkAgreement
     */
    public function getFrameworkAgreement(): ?FrameworkAgreement
    {
        return $this->frameworkAgreement;
    }

    /**
     * @return FrameworkAgreement
     */
    public function getFrameworkAgreementWithCreate(): FrameworkAgreement
    {
        $this->frameworkAgreement = is_null($this->frameworkAgreement) ? new FrameworkAgreement() : $this->frameworkAgreement;

        return $this->frameworkAgreement;
    }

    /**
     * @param  null|FrameworkAgreement $frameworkAgreement
     * @return static
     */
    public function setFrameworkAgreement(?FrameworkAgreement $frameworkAgreement = null): static
    {
        $this->frameworkAgreement = $frameworkAgreement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFrameworkAgreement(): static
    {
        $this->frameworkAgreement = null;

        return $this;
    }
}
