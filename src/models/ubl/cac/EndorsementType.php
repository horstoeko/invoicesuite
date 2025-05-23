<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus;
use horstoeko\invoicesuite\models\ubl\cbc\DocumentID;
use horstoeko\invoicesuite\models\ubl\cbc\Remarks;

class EndorsementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DocumentID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DocumentID")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentID", setter="setDocumentID")
     */
    private $documentID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus")
     * @JMS\Expose
     * @JMS\SerializedName("ApprovalStatus")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApprovalStatus", setter="setApprovalStatus")
     */
    private $approvalStatus;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EndorserParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EndorserParty")
     * @JMS\Expose
     * @JMS\SerializedName("EndorserParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndorserParty", setter="setEndorserParty")
     */
    private $endorserParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DocumentID|null
     */
    public function getDocumentID(): ?DocumentID
    {
        return $this->documentID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DocumentID
     */
    public function getDocumentIDWithCreate(): DocumentID
    {
        $this->documentID = is_null($this->documentID) ? new DocumentID() : $this->documentID;

        return $this->documentID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DocumentID|null $documentID
     * @return self
     */
    public function setDocumentID(?DocumentID $documentID = null): self
    {
        $this->documentID = $documentID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus|null
     */
    public function getApprovalStatus(): ?ApprovalStatus
    {
        return $this->approvalStatus;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus
     */
    public function getApprovalStatusWithCreate(): ApprovalStatus
    {
        $this->approvalStatus = is_null($this->approvalStatus) ? new ApprovalStatus() : $this->approvalStatus;

        return $this->approvalStatus;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ApprovalStatus|null $approvalStatus
     * @return self
     */
    public function setApprovalStatus(?ApprovalStatus $approvalStatus = null): self
    {
        $this->approvalStatus = $approvalStatus;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null $remarks
     * @return self
     */
    public function setRemarks(?array $remarks = null): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRemarks(): self
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addToRemarks(Remarks $remarks): self
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addOnceToRemarks(Remarks $remarks): self
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ($this->remarks === []) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EndorserParty|null
     */
    public function getEndorserParty(): ?EndorserParty
    {
        return $this->endorserParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EndorserParty
     */
    public function getEndorserPartyWithCreate(): EndorserParty
    {
        $this->endorserParty = is_null($this->endorserParty) ? new EndorserParty() : $this->endorserParty;

        return $this->endorserParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EndorserParty|null $endorserParty
     * @return self
     */
    public function setEndorserParty(?EndorserParty $endorserParty = null): self
    {
        $this->endorserParty = $endorserParty;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null $signature
     * @return self
     */
    public function setSignature(?array $signature = null): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSignature(): self
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Signature $signature
     * @return self
     */
    public function addToSignature(Signature $signature): self
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Signature $signature
     * @return self
     */
    public function addOnceToSignature(Signature $signature): self
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ($this->signature === []) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }
}
