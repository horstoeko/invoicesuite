<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CandidateStatement;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EvidenceTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class EvidenceType
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
     * @var null|EvidenceTypeCode
     */
    #[JMS\Accessor(getter: 'getEvidenceTypeCode', setter: 'setEvidenceTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EvidenceTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EvidenceTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $evidenceTypeCode;

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
     * @var null|array<CandidateStatement>
     */
    #[JMS\Accessor(getter: 'getCandidateStatement', setter: 'setCandidateStatement')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CandidateStatement')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CandidateStatement>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CandidateStatement', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $candidateStatement;

    /**
     * @var null|EvidenceIssuingParty
     */
    #[JMS\Accessor(getter: 'getEvidenceIssuingParty', setter: 'setEvidenceIssuingParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EvidenceIssuingParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EvidenceIssuingParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $evidenceIssuingParty;

    /**
     * @var null|DocumentReference
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $documentReference;

    /**
     * @var null|Language
     */
    #[JMS\Accessor(getter: 'getLanguage', setter: 'setLanguage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Language')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Language')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $language;

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
     * @return null|EvidenceTypeCode
     */
    public function getEvidenceTypeCode(): ?EvidenceTypeCode
    {
        return $this->evidenceTypeCode;
    }

    /**
     * @return EvidenceTypeCode
     */
    public function getEvidenceTypeCodeWithCreate(): EvidenceTypeCode
    {
        $this->evidenceTypeCode ??= new EvidenceTypeCode();

        return $this->evidenceTypeCode;
    }

    /**
     * @param  null|EvidenceTypeCode $evidenceTypeCode
     * @return static
     */
    public function setEvidenceTypeCode(
        ?EvidenceTypeCode $evidenceTypeCode = null
    ): static {
        $this->evidenceTypeCode = $evidenceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvidenceTypeCode(): static
    {
        $this->evidenceTypeCode = null;

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
     * @return null|array<CandidateStatement>
     */
    public function getCandidateStatement(): ?array
    {
        return $this->candidateStatement;
    }

    /**
     * @param  null|array<CandidateStatement> $candidateStatement
     * @return static
     */
    public function setCandidateStatement(
        ?array $candidateStatement = null
    ): static {
        $this->candidateStatement = $candidateStatement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCandidateStatement(): static
    {
        $this->candidateStatement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCandidateStatement(): static
    {
        $this->candidateStatement = [];

        return $this;
    }

    /**
     * @return null|CandidateStatement
     */
    public function firstCandidateStatement(): ?CandidateStatement
    {
        $candidateStatement = $this->candidateStatement ?? [];
        $candidateStatement = reset($candidateStatement);

        if (false === $candidateStatement) {
            return null;
        }

        return $candidateStatement;
    }

    /**
     * @return null|CandidateStatement
     */
    public function lastCandidateStatement(): ?CandidateStatement
    {
        $candidateStatement = $this->candidateStatement ?? [];
        $candidateStatement = end($candidateStatement);

        if (false === $candidateStatement) {
            return null;
        }

        return $candidateStatement;
    }

    /**
     * @param  CandidateStatement $candidateStatement
     * @return static
     */
    public function addToCandidateStatement(
        CandidateStatement $candidateStatement
    ): static {
        $this->candidateStatement[] = $candidateStatement;

        return $this;
    }

    /**
     * @return CandidateStatement
     */
    public function addToCandidateStatementWithCreate(): CandidateStatement
    {
        $this->addToCandidateStatement($candidateStatement = new CandidateStatement());

        return $candidateStatement;
    }

    /**
     * @param  CandidateStatement $candidateStatement
     * @return static
     */
    public function addOnceToCandidateStatement(
        CandidateStatement $candidateStatement
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->candidateStatement)) {
            $this->candidateStatement = [];
        }

        $this->candidateStatement[0] = $candidateStatement;

        return $this;
    }

    /**
     * @return CandidateStatement
     */
    public function addOnceToCandidateStatementWithCreate(): CandidateStatement
    {
        if (!InvoiceSuiteArrayUtils::is($this->candidateStatement)) {
            $this->candidateStatement = [];
        }

        if ([] === $this->candidateStatement) {
            $this->addOnceToCandidateStatement(new CandidateStatement());
        }

        return $this->candidateStatement[0];
    }

    /**
     * @return null|EvidenceIssuingParty
     */
    public function getEvidenceIssuingParty(): ?EvidenceIssuingParty
    {
        return $this->evidenceIssuingParty;
    }

    /**
     * @return EvidenceIssuingParty
     */
    public function getEvidenceIssuingPartyWithCreate(): EvidenceIssuingParty
    {
        $this->evidenceIssuingParty ??= new EvidenceIssuingParty();

        return $this->evidenceIssuingParty;
    }

    /**
     * @param  null|EvidenceIssuingParty $evidenceIssuingParty
     * @return static
     */
    public function setEvidenceIssuingParty(
        ?EvidenceIssuingParty $evidenceIssuingParty = null
    ): static {
        $this->evidenceIssuingParty = $evidenceIssuingParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvidenceIssuingParty(): static
    {
        $this->evidenceIssuingParty = null;

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function getDocumentReference(): ?DocumentReference
    {
        return $this->documentReference;
    }

    /**
     * @return DocumentReference
     */
    public function getDocumentReferenceWithCreate(): DocumentReference
    {
        $this->documentReference ??= new DocumentReference();

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?DocumentReference $documentReference = null
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
     * @return null|Language
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return Language
     */
    public function getLanguageWithCreate(): Language
    {
        $this->language ??= new Language();

        return $this->language;
    }

    /**
     * @param  null|Language $language
     * @return static
     */
    public function setLanguage(
        ?Language $language = null
    ): static {
        $this->language = $language;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguage(): static
    {
        $this->language = null;

        return $this;
    }
}
