<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ApprovalStatus;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DocumentID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks;
use JMS\Serializer\Annotation as JMS;

class EndorsementType
{
    use HandlesObjectFlags;

    /**
     * @var null|DocumentID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DocumentID")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentID", setter="setDocumentID")
     */
    private $documentID;

    /**
     * @var null|ApprovalStatus
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ApprovalStatus")
     * @JMS\Expose
     * @JMS\SerializedName("ApprovalStatus")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApprovalStatus", setter="setApprovalStatus")
     */
    private $approvalStatus;

    /**
     * @var null|array<Remarks>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

    /**
     * @var null|EndorserParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\EndorserParty")
     * @JMS\Expose
     * @JMS\SerializedName("EndorserParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndorserParty", setter="setEndorserParty")
     */
    private $endorserParty;

    /**
     * @var null|array<Signature>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @return null|DocumentID
     */
    public function getDocumentID(): ?DocumentID
    {
        return $this->documentID;
    }

    /**
     * @return DocumentID
     */
    public function getDocumentIDWithCreate(): DocumentID
    {
        $this->documentID = is_null($this->documentID) ? new DocumentID() : $this->documentID;

        return $this->documentID;
    }

    /**
     * @param  null|DocumentID $documentID
     * @return static
     */
    public function setDocumentID(?DocumentID $documentID = null): static
    {
        $this->documentID = $documentID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentID(): static
    {
        $this->documentID = null;

        return $this;
    }

    /**
     * @return null|ApprovalStatus
     */
    public function getApprovalStatus(): ?ApprovalStatus
    {
        return $this->approvalStatus;
    }

    /**
     * @return ApprovalStatus
     */
    public function getApprovalStatusWithCreate(): ApprovalStatus
    {
        $this->approvalStatus = is_null($this->approvalStatus) ? new ApprovalStatus() : $this->approvalStatus;

        return $this->approvalStatus;
    }

    /**
     * @param  null|ApprovalStatus $approvalStatus
     * @return static
     */
    public function setApprovalStatus(?ApprovalStatus $approvalStatus = null): static
    {
        $this->approvalStatus = $approvalStatus;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApprovalStatus(): static
    {
        $this->approvalStatus = null;

        return $this;
    }

    /**
     * @return null|array<Remarks>
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param  null|array<Remarks> $remarks
     * @return static
     */
    public function setRemarks(?array $remarks = null): static
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRemarks(): static
    {
        $this->remarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRemarks(): static
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @return null|Remarks
     */
    public function firstRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = reset($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @return null|Remarks
     */
    public function lastRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = end($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addToRemarks(Remarks $remarks): static
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(Remarks $remarks): static
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ([] === $this->remarks) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
    }

    /**
     * @return null|EndorserParty
     */
    public function getEndorserParty(): ?EndorserParty
    {
        return $this->endorserParty;
    }

    /**
     * @return EndorserParty
     */
    public function getEndorserPartyWithCreate(): EndorserParty
    {
        $this->endorserParty = is_null($this->endorserParty) ? new EndorserParty() : $this->endorserParty;

        return $this->endorserParty;
    }

    /**
     * @param  null|EndorserParty $endorserParty
     * @return static
     */
    public function setEndorserParty(?EndorserParty $endorserParty = null): static
    {
        $this->endorserParty = $endorserParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndorserParty(): static
    {
        $this->endorserParty = null;

        return $this;
    }

    /**
     * @return null|array<Signature>
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param  null|array<Signature> $signature
     * @return static
     */
    public function setSignature(?array $signature = null): static
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignature(): static
    {
        $this->signature = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSignature(): static
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @return null|Signature
     */
    public function firstSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = reset($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @return null|Signature
     */
    public function lastSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = end($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addToSignature(Signature $signature): static
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addOnceToSignature(Signature $signature): static
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ([] === $this->signature) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }
}
