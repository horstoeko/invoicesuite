<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription;
use horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID;
use horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode;
use horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode;
use horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode;
use horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode;

class TenderingProcessType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalContractingSystemID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalContractingSystemID", setter="setOriginalContractingSystemID")
     */
    private $originalContractingSystemID;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("NegotiationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NegotiationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNegotiationDescription", setter="setNegotiationDescription")
     */
    private $negotiationDescription;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode")
     * @JMS\Expose
     * @JMS\SerializedName("ProcedureCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcedureCode", setter="setProcedureCode")
     */
    private $procedureCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("UrgencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUrgencyCode", setter="setUrgencyCode")
     */
    private $urgencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExpenseCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpenseCode", setter="setExpenseCode")
     */
    private $expenseCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode")
     * @JMS\Expose
     * @JMS\SerializedName("PartPresentationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPartPresentationCode", setter="setPartPresentationCode")
     */
    private $partPresentationCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode")
     * @JMS\Expose
     * @JMS\SerializedName("ContractingSystemCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractingSystemCode", setter="setContractingSystemCode")
     */
    private $contractingSystemCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubmissionMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubmissionMethodCode", setter="setSubmissionMethodCode")
     */
    private $submissionMethodCode;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CandidateReductionConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCandidateReductionConstraintIndicator", setter="setCandidateReductionConstraintIndicator")
     */
    private $candidateReductionConstraintIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("GovernmentAgreementConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGovernmentAgreementConstraintIndicator", setter="setGovernmentAgreementConstraintIndicator")
     */
    private $governmentAgreementConstraintIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DocumentAvailabilityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DocumentAvailabilityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentAvailabilityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentAvailabilityPeriod", setter="setDocumentAvailabilityPeriod")
     */
    private $documentAvailabilityPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TenderSubmissionDeadlinePeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TenderSubmissionDeadlinePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TenderSubmissionDeadlinePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderSubmissionDeadlinePeriod", setter="setTenderSubmissionDeadlinePeriod")
     */
    private $tenderSubmissionDeadlinePeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\InvitationSubmissionPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\InvitationSubmissionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("InvitationSubmissionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvitationSubmissionPeriod", setter="setInvitationSubmissionPeriod")
     */
    private $invitationSubmissionPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ParticipationRequestReceptionPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ParticipationRequestReceptionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ParticipationRequestReceptionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParticipationRequestReceptionPeriod", setter="setParticipationRequestReceptionPeriod")
     */
    private $participationRequestReceptionPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("NoticeDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NoticeDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNoticeDocumentReference", setter="setNoticeDocumentReference")
     */
    private $noticeDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ProcessJustification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ProcessJustification>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessJustification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcessJustification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProcessJustification", setter="setProcessJustification")
     */
    private $processJustification;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorShortList|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorShortList")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorShortList")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEconomicOperatorShortList", setter="setEconomicOperatorShortList")
     */
    private $economicOperatorShortList;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("OpenTenderEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OpenTenderEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOpenTenderEvent", setter="setOpenTenderEvent")
     */
    private $openTenderEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AuctionTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AuctionTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionTerms", setter="setAuctionTerms")
     */
    private $auctionTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FrameworkAgreement|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FrameworkAgreement")
     * @JMS\Expose
     * @JMS\SerializedName("FrameworkAgreement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFrameworkAgreement", setter="setFrameworkAgreement")
     */
    private $frameworkAgreement;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID|null
     */
    public function getOriginalContractingSystemID(): ?OriginalContractingSystemID
    {
        return $this->originalContractingSystemID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID
     */
    public function getOriginalContractingSystemIDWithCreate(): OriginalContractingSystemID
    {
        $this->originalContractingSystemID = is_null($this->originalContractingSystemID) ? new OriginalContractingSystemID() : $this->originalContractingSystemID;

        return $this->originalContractingSystemID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OriginalContractingSystemID|null $originalContractingSystemID
     * @return self
     */
    public function setOriginalContractingSystemID(
        ?OriginalContractingSystemID $originalContractingSystemID = null,
    ): self {
        $this->originalContractingSystemID = $originalContractingSystemID;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription>|null
     */
    public function getNegotiationDescription(): ?array
    {
        return $this->negotiationDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription>|null $negotiationDescription
     * @return self
     */
    public function setNegotiationDescription(?array $negotiationDescription = null): self
    {
        $this->negotiationDescription = $negotiationDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNegotiationDescription(): self
    {
        $this->negotiationDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription $negotiationDescription
     * @return self
     */
    public function addToNegotiationDescription(NegotiationDescription $negotiationDescription): self
    {
        $this->negotiationDescription[] = $negotiationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription
     */
    public function addToNegotiationDescriptionWithCreate(): NegotiationDescription
    {
        $this->addTonegotiationDescription($negotiationDescription = new NegotiationDescription());

        return $negotiationDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription $negotiationDescription
     * @return self
     */
    public function addOnceToNegotiationDescription(NegotiationDescription $negotiationDescription): self
    {
        if (!is_array($this->negotiationDescription)) {
            $this->negotiationDescription = [];
        }

        $this->negotiationDescription[0] = $negotiationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NegotiationDescription
     */
    public function addOnceToNegotiationDescriptionWithCreate(): NegotiationDescription
    {
        if (!is_array($this->negotiationDescription)) {
            $this->negotiationDescription = [];
        }

        if ($this->negotiationDescription === []) {
            $this->addOnceTonegotiationDescription(new NegotiationDescription());
        }

        return $this->negotiationDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode|null
     */
    public function getProcedureCode(): ?ProcedureCode
    {
        return $this->procedureCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode
     */
    public function getProcedureCodeWithCreate(): ProcedureCode
    {
        $this->procedureCode = is_null($this->procedureCode) ? new ProcedureCode() : $this->procedureCode;

        return $this->procedureCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ProcedureCode|null $procedureCode
     * @return self
     */
    public function setProcedureCode(?ProcedureCode $procedureCode = null): self
    {
        $this->procedureCode = $procedureCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode|null
     */
    public function getUrgencyCode(): ?UrgencyCode
    {
        return $this->urgencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode
     */
    public function getUrgencyCodeWithCreate(): UrgencyCode
    {
        $this->urgencyCode = is_null($this->urgencyCode) ? new UrgencyCode() : $this->urgencyCode;

        return $this->urgencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UrgencyCode|null $urgencyCode
     * @return self
     */
    public function setUrgencyCode(?UrgencyCode $urgencyCode = null): self
    {
        $this->urgencyCode = $urgencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode|null
     */
    public function getExpenseCode(): ?ExpenseCode
    {
        return $this->expenseCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode
     */
    public function getExpenseCodeWithCreate(): ExpenseCode
    {
        $this->expenseCode = is_null($this->expenseCode) ? new ExpenseCode() : $this->expenseCode;

        return $this->expenseCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExpenseCode|null $expenseCode
     * @return self
     */
    public function setExpenseCode(?ExpenseCode $expenseCode = null): self
    {
        $this->expenseCode = $expenseCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode|null
     */
    public function getPartPresentationCode(): ?PartPresentationCode
    {
        return $this->partPresentationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode
     */
    public function getPartPresentationCodeWithCreate(): PartPresentationCode
    {
        $this->partPresentationCode = is_null($this->partPresentationCode) ? new PartPresentationCode() : $this->partPresentationCode;

        return $this->partPresentationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PartPresentationCode|null $partPresentationCode
     * @return self
     */
    public function setPartPresentationCode(?PartPresentationCode $partPresentationCode = null): self
    {
        $this->partPresentationCode = $partPresentationCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode|null
     */
    public function getContractingSystemCode(): ?ContractingSystemCode
    {
        return $this->contractingSystemCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode
     */
    public function getContractingSystemCodeWithCreate(): ContractingSystemCode
    {
        $this->contractingSystemCode = is_null($this->contractingSystemCode) ? new ContractingSystemCode() : $this->contractingSystemCode;

        return $this->contractingSystemCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ContractingSystemCode|null $contractingSystemCode
     * @return self
     */
    public function setContractingSystemCode(?ContractingSystemCode $contractingSystemCode = null): self
    {
        $this->contractingSystemCode = $contractingSystemCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode|null
     */
    public function getSubmissionMethodCode(): ?SubmissionMethodCode
    {
        return $this->submissionMethodCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode
     */
    public function getSubmissionMethodCodeWithCreate(): SubmissionMethodCode
    {
        $this->submissionMethodCode = is_null($this->submissionMethodCode) ? new SubmissionMethodCode() : $this->submissionMethodCode;

        return $this->submissionMethodCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SubmissionMethodCode|null $submissionMethodCode
     * @return self
     */
    public function setSubmissionMethodCode(?SubmissionMethodCode $submissionMethodCode = null): self
    {
        $this->submissionMethodCode = $submissionMethodCode;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCandidateReductionConstraintIndicator(): ?bool
    {
        return $this->candidateReductionConstraintIndicator;
    }

    /**
     * @param bool|null $candidateReductionConstraintIndicator
     * @return self
     */
    public function setCandidateReductionConstraintIndicator(
        ?bool $candidateReductionConstraintIndicator = null,
    ): self {
        $this->candidateReductionConstraintIndicator = $candidateReductionConstraintIndicator;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGovernmentAgreementConstraintIndicator(): ?bool
    {
        return $this->governmentAgreementConstraintIndicator;
    }

    /**
     * @param bool|null $governmentAgreementConstraintIndicator
     * @return self
     */
    public function setGovernmentAgreementConstraintIndicator(
        ?bool $governmentAgreementConstraintIndicator = null,
    ): self {
        $this->governmentAgreementConstraintIndicator = $governmentAgreementConstraintIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentAvailabilityPeriod|null
     */
    public function getDocumentAvailabilityPeriod(): ?DocumentAvailabilityPeriod
    {
        return $this->documentAvailabilityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentAvailabilityPeriod
     */
    public function getDocumentAvailabilityPeriodWithCreate(): DocumentAvailabilityPeriod
    {
        $this->documentAvailabilityPeriod = is_null($this->documentAvailabilityPeriod) ? new DocumentAvailabilityPeriod() : $this->documentAvailabilityPeriod;

        return $this->documentAvailabilityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentAvailabilityPeriod|null $documentAvailabilityPeriod
     * @return self
     */
    public function setDocumentAvailabilityPeriod(
        ?DocumentAvailabilityPeriod $documentAvailabilityPeriod = null,
    ): self {
        $this->documentAvailabilityPeriod = $documentAvailabilityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderSubmissionDeadlinePeriod|null
     */
    public function getTenderSubmissionDeadlinePeriod(): ?TenderSubmissionDeadlinePeriod
    {
        return $this->tenderSubmissionDeadlinePeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderSubmissionDeadlinePeriod
     */
    public function getTenderSubmissionDeadlinePeriodWithCreate(): TenderSubmissionDeadlinePeriod
    {
        $this->tenderSubmissionDeadlinePeriod = is_null($this->tenderSubmissionDeadlinePeriod) ? new TenderSubmissionDeadlinePeriod() : $this->tenderSubmissionDeadlinePeriod;

        return $this->tenderSubmissionDeadlinePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderSubmissionDeadlinePeriod|null $tenderSubmissionDeadlinePeriod
     * @return self
     */
    public function setTenderSubmissionDeadlinePeriod(
        ?TenderSubmissionDeadlinePeriod $tenderSubmissionDeadlinePeriod = null,
    ): self {
        $this->tenderSubmissionDeadlinePeriod = $tenderSubmissionDeadlinePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvitationSubmissionPeriod|null
     */
    public function getInvitationSubmissionPeriod(): ?InvitationSubmissionPeriod
    {
        return $this->invitationSubmissionPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvitationSubmissionPeriod
     */
    public function getInvitationSubmissionPeriodWithCreate(): InvitationSubmissionPeriod
    {
        $this->invitationSubmissionPeriod = is_null($this->invitationSubmissionPeriod) ? new InvitationSubmissionPeriod() : $this->invitationSubmissionPeriod;

        return $this->invitationSubmissionPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvitationSubmissionPeriod|null $invitationSubmissionPeriod
     * @return self
     */
    public function setInvitationSubmissionPeriod(
        ?InvitationSubmissionPeriod $invitationSubmissionPeriod = null,
    ): self {
        $this->invitationSubmissionPeriod = $invitationSubmissionPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ParticipationRequestReceptionPeriod|null
     */
    public function getParticipationRequestReceptionPeriod(): ?ParticipationRequestReceptionPeriod
    {
        return $this->participationRequestReceptionPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ParticipationRequestReceptionPeriod
     */
    public function getParticipationRequestReceptionPeriodWithCreate(): ParticipationRequestReceptionPeriod
    {
        $this->participationRequestReceptionPeriod = is_null($this->participationRequestReceptionPeriod) ? new ParticipationRequestReceptionPeriod() : $this->participationRequestReceptionPeriod;

        return $this->participationRequestReceptionPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ParticipationRequestReceptionPeriod|null $participationRequestReceptionPeriod
     * @return self
     */
    public function setParticipationRequestReceptionPeriod(
        ?ParticipationRequestReceptionPeriod $participationRequestReceptionPeriod = null,
    ): self {
        $this->participationRequestReceptionPeriod = $participationRequestReceptionPeriod;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference>|null
     */
    public function getNoticeDocumentReference(): ?array
    {
        return $this->noticeDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference>|null $noticeDocumentReference
     * @return self
     */
    public function setNoticeDocumentReference(?array $noticeDocumentReference = null): self
    {
        $this->noticeDocumentReference = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNoticeDocumentReference(): self
    {
        $this->noticeDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference $noticeDocumentReference
     * @return self
     */
    public function addToNoticeDocumentReference(NoticeDocumentReference $noticeDocumentReference): self
    {
        $this->noticeDocumentReference[] = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference
     */
    public function addToNoticeDocumentReferenceWithCreate(): NoticeDocumentReference
    {
        $this->addTonoticeDocumentReference($noticeDocumentReference = new NoticeDocumentReference());

        return $noticeDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference $noticeDocumentReference
     * @return self
     */
    public function addOnceToNoticeDocumentReference(NoticeDocumentReference $noticeDocumentReference): self
    {
        if (!is_array($this->noticeDocumentReference)) {
            $this->noticeDocumentReference = [];
        }

        $this->noticeDocumentReference[0] = $noticeDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NoticeDocumentReference
     */
    public function addOnceToNoticeDocumentReferenceWithCreate(): NoticeDocumentReference
    {
        if (!is_array($this->noticeDocumentReference)) {
            $this->noticeDocumentReference = [];
        }

        if ($this->noticeDocumentReference === []) {
            $this->addOnceTonoticeDocumentReference(new NoticeDocumentReference());
        }

        return $this->noticeDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>|null
     */
    public function getAdditionalDocumentReference(): ?array
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>|null $additionalDocumentReference
     * @return self
     */
    public function setAdditionalDocumentReference(?array $additionalDocumentReference = null): self
    {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalDocumentReference(): self
    {
        $this->additionalDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference $additionalDocumentReference
     * @return self
     */
    public function addToAdditionalDocumentReference(AdditionalDocumentReference $additionalDocumentReference): self
    {
        $this->additionalDocumentReference[] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
     */
    public function addToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->addToadditionalDocumentReference($additionalDocumentReference = new AdditionalDocumentReference());

        return $additionalDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference $additionalDocumentReference
     * @return self
     */
    public function addOnceToAdditionalDocumentReference(
        AdditionalDocumentReference $additionalDocumentReference,
    ): self {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        $this->additionalDocumentReference[0] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
     */
    public function addOnceToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        if ($this->additionalDocumentReference === []) {
            $this->addOnceToadditionalDocumentReference(new AdditionalDocumentReference());
        }

        return $this->additionalDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ProcessJustification>|null
     */
    public function getProcessJustification(): ?array
    {
        return $this->processJustification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ProcessJustification>|null $processJustification
     * @return self
     */
    public function setProcessJustification(?array $processJustification = null): self
    {
        $this->processJustification = $processJustification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearProcessJustification(): self
    {
        $this->processJustification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcessJustification $processJustification
     * @return self
     */
    public function addToProcessJustification(ProcessJustification $processJustification): self
    {
        $this->processJustification[] = $processJustification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcessJustification
     */
    public function addToProcessJustificationWithCreate(): ProcessJustification
    {
        $this->addToprocessJustification($processJustification = new ProcessJustification());

        return $processJustification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcessJustification $processJustification
     * @return self
     */
    public function addOnceToProcessJustification(ProcessJustification $processJustification): self
    {
        if (!is_array($this->processJustification)) {
            $this->processJustification = [];
        }

        $this->processJustification[0] = $processJustification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcessJustification
     */
    public function addOnceToProcessJustificationWithCreate(): ProcessJustification
    {
        if (!is_array($this->processJustification)) {
            $this->processJustification = [];
        }

        if ($this->processJustification === []) {
            $this->addOnceToprocessJustification(new ProcessJustification());
        }

        return $this->processJustification[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorShortList|null
     */
    public function getEconomicOperatorShortList(): ?EconomicOperatorShortList
    {
        return $this->economicOperatorShortList;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorShortList
     */
    public function getEconomicOperatorShortListWithCreate(): EconomicOperatorShortList
    {
        $this->economicOperatorShortList = is_null($this->economicOperatorShortList) ? new EconomicOperatorShortList() : $this->economicOperatorShortList;

        return $this->economicOperatorShortList;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EconomicOperatorShortList|null $economicOperatorShortList
     * @return self
     */
    public function setEconomicOperatorShortList(?EconomicOperatorShortList $economicOperatorShortList = null): self
    {
        $this->economicOperatorShortList = $economicOperatorShortList;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent>|null
     */
    public function getOpenTenderEvent(): ?array
    {
        return $this->openTenderEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent>|null $openTenderEvent
     * @return self
     */
    public function setOpenTenderEvent(?array $openTenderEvent = null): self
    {
        $this->openTenderEvent = $openTenderEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOpenTenderEvent(): self
    {
        $this->openTenderEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent $openTenderEvent
     * @return self
     */
    public function addToOpenTenderEvent(OpenTenderEvent $openTenderEvent): self
    {
        $this->openTenderEvent[] = $openTenderEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent
     */
    public function addToOpenTenderEventWithCreate(): OpenTenderEvent
    {
        $this->addToopenTenderEvent($openTenderEvent = new OpenTenderEvent());

        return $openTenderEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent $openTenderEvent
     * @return self
     */
    public function addOnceToOpenTenderEvent(OpenTenderEvent $openTenderEvent): self
    {
        if (!is_array($this->openTenderEvent)) {
            $this->openTenderEvent = [];
        }

        $this->openTenderEvent[0] = $openTenderEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OpenTenderEvent
     */
    public function addOnceToOpenTenderEventWithCreate(): OpenTenderEvent
    {
        if (!is_array($this->openTenderEvent)) {
            $this->openTenderEvent = [];
        }

        if ($this->openTenderEvent === []) {
            $this->addOnceToopenTenderEvent(new OpenTenderEvent());
        }

        return $this->openTenderEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AuctionTerms|null
     */
    public function getAuctionTerms(): ?AuctionTerms
    {
        return $this->auctionTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AuctionTerms
     */
    public function getAuctionTermsWithCreate(): AuctionTerms
    {
        $this->auctionTerms = is_null($this->auctionTerms) ? new AuctionTerms() : $this->auctionTerms;

        return $this->auctionTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AuctionTerms|null $auctionTerms
     * @return self
     */
    public function setAuctionTerms(?AuctionTerms $auctionTerms = null): self
    {
        $this->auctionTerms = $auctionTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FrameworkAgreement|null
     */
    public function getFrameworkAgreement(): ?FrameworkAgreement
    {
        return $this->frameworkAgreement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FrameworkAgreement
     */
    public function getFrameworkAgreementWithCreate(): FrameworkAgreement
    {
        $this->frameworkAgreement = is_null($this->frameworkAgreement) ? new FrameworkAgreement() : $this->frameworkAgreement;

        return $this->frameworkAgreement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FrameworkAgreement|null $frameworkAgreement
     * @return self
     */
    public function setFrameworkAgreement(?FrameworkAgreement $frameworkAgreement = null): self
    {
        $this->frameworkAgreement = $frameworkAgreement;

        return $this;
    }
}
