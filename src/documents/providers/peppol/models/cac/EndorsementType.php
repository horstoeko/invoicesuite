<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ApprovalStatus;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class EndorsementType
{
    use HandlesObjectFlags;

    /**
     * @var null|DocumentID
     */
    #[JMS\Accessor(getter: 'getDocumentID', setter: 'setDocumentID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $documentID;

    /**
     * @var null|ApprovalStatus
     */
    #[JMS\Accessor(getter: 'getApprovalStatus', setter: 'setApprovalStatus')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ApprovalStatus')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ApprovalStatus')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $approvalStatus;

    /**
     * @var null|array<Remarks>
     */
    #[JMS\Accessor(getter: 'getRemarks', setter: 'setRemarks')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Remarks')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Remarks', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $remarks;

    /**
     * @var null|EndorserParty
     */
    #[JMS\Accessor(getter: 'getEndorserParty', setter: 'setEndorserParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EndorserParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EndorserParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $endorserParty;

    /**
     * @var null|array<Signature>
     */
    #[JMS\Accessor(getter: 'getSignature', setter: 'setSignature')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Signature')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Signature>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Signature', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->documentID ??= new DocumentID();

        return $this->documentID;
    }

    /**
     * @param  null|DocumentID $documentID
     * @return static
     */
    public function setDocumentID(
        ?DocumentID $documentID = null
    ): static {
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
        $this->approvalStatus ??= new ApprovalStatus();

        return $this->approvalStatus;
    }

    /**
     * @param  null|ApprovalStatus $approvalStatus
     * @return static
     */
    public function setApprovalStatus(
        ?ApprovalStatus $approvalStatus = null
    ): static {
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
    public function setRemarks(
        ?array $remarks = null
    ): static {
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
    public function addToRemarks(
        Remarks $remarks
    ): static {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToRemarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(
        Remarks $remarks
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->remarks)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->remarks)) {
            $this->remarks = [];
        }

        if ([] === $this->remarks) {
            $this->addOnceToRemarks(new Remarks());
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
        $this->endorserParty ??= new EndorserParty();

        return $this->endorserParty;
    }

    /**
     * @param  null|EndorserParty $endorserParty
     * @return static
     */
    public function setEndorserParty(
        ?EndorserParty $endorserParty = null
    ): static {
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
    public function setSignature(
        ?array $signature = null
    ): static {
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
    public function addToSignature(
        Signature $signature
    ): static {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addToSignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addOnceToSignature(
        Signature $signature
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->signature)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->signature)) {
            $this->signature = [];
        }

        if ([] === $this->signature) {
            $this->addOnceToSignature(new Signature());
        }

        return $this->signature[0];
    }
}
