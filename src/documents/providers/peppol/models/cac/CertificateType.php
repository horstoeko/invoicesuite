<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CertificateType as CertificateType1;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CertificateTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks;
use JMS\Serializer\Annotation as JMS;

class CertificateType
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
     * @var null|CertificateTypeCode
     */
    #[JMS\Accessor(getter: 'getCertificateTypeCode', setter: 'setCertificateTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CertificateTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CertificateTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $certificateTypeCode;

    /**
     * @var null|CertificateType1
     */
    #[JMS\Accessor(getter: 'getCertificateType', setter: 'setCertificateType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CertificateType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CertificateType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $certificateType;

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
     * @var null|IssuerParty
     */
    #[JMS\Accessor(getter: 'getIssuerParty', setter: 'setIssuerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssuerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\IssuerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $issuerParty;

    /**
     * @var null|array<DocumentReference>
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $documentReference;

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
     * @return null|CertificateTypeCode
     */
    public function getCertificateTypeCode(): ?CertificateTypeCode
    {
        return $this->certificateTypeCode;
    }

    /**
     * @return CertificateTypeCode
     */
    public function getCertificateTypeCodeWithCreate(): CertificateTypeCode
    {
        $this->certificateTypeCode ??= new CertificateTypeCode();

        return $this->certificateTypeCode;
    }

    /**
     * @param  null|CertificateTypeCode $certificateTypeCode
     * @return static
     */
    public function setCertificateTypeCode(
        ?CertificateTypeCode $certificateTypeCode = null
    ): static {
        $this->certificateTypeCode = $certificateTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCertificateTypeCode(): static
    {
        $this->certificateTypeCode = null;

        return $this;
    }

    /**
     * @return null|CertificateType1
     */
    public function getCertificateType(): ?CertificateType1
    {
        return $this->certificateType;
    }

    /**
     * @return CertificateType1
     */
    public function getCertificateTypeWithCreate(): CertificateType1
    {
        $this->certificateType ??= new CertificateType1();

        return $this->certificateType;
    }

    /**
     * @param  null|CertificateType1 $certificateType
     * @return static
     */
    public function setCertificateType(
        ?CertificateType1 $certificateType = null
    ): static {
        $this->certificateType = $certificateType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCertificateType(): static
    {
        $this->certificateType = null;

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
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(
        Remarks $remarks
    ): static {
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
     * @return null|IssuerParty
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty ??= new IssuerParty();

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(
        ?IssuerParty $issuerParty = null
    ): static {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerParty(): static
    {
        $this->issuerParty = null;

        return $this;
    }

    /**
     * @return null|array<DocumentReference>
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param  null|array<DocumentReference> $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?array $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentReference(): static
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = reset($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return null|DocumentReference
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = end($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addToDocumentReference(
        DocumentReference $documentReference
    ): static {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(
        DocumentReference $documentReference
    ): static {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
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
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addOnceToSignature(
        Signature $signature
    ): static {
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
