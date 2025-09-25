<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;

class EvidenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEvidenceTypeCode", setter="setEvidenceTypeCode")
     */
    private $evidenceTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement>")
     * @JMS\Expose
     * @JMS\SerializedName("CandidateStatement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CandidateStatement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getCandidateStatement", setter="setCandidateStatement")
     */
    private $candidateStatement;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceIssuingParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceIssuingParty")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceIssuingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEvidenceIssuingParty", setter="setEvidenceIssuingParty")
     */
    private $evidenceIssuingParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\Language|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\Language")
     * @JMS\Expose
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguage", setter="setLanguage")
     */
    private $language;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode|null
     */
    public function getEvidenceTypeCode(): ?EvidenceTypeCode
    {
        return $this->evidenceTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode
     */
    public function getEvidenceTypeCodeWithCreate(): EvidenceTypeCode
    {
        $this->evidenceTypeCode = is_null($this->evidenceTypeCode) ? new EvidenceTypeCode() : $this->evidenceTypeCode;

        return $this->evidenceTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvidenceTypeCode|null $evidenceTypeCode
     * @return self
     */
    public function setEvidenceTypeCode(?EvidenceTypeCode $evidenceTypeCode = null): self
    {
        $this->evidenceTypeCode = $evidenceTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEvidenceTypeCode(): self
    {
        $this->evidenceTypeCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
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
    public function unsetDescription(): self
    {
        $this->description = null;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement>|null
     */
    public function getCandidateStatement(): ?array
    {
        return $this->candidateStatement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement>|null $candidateStatement
     * @return self
     */
    public function setCandidateStatement(?array $candidateStatement = null): self
    {
        $this->candidateStatement = $candidateStatement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCandidateStatement(): self
    {
        $this->candidateStatement = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCandidateStatement(): self
    {
        $this->candidateStatement = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement|null
     */
    public function firstCandidateStatement(): ?CandidateStatement
    {
        $candidateStatement = $this->candidateStatement ?? [];
        $candidateStatement = reset($candidateStatement);

        if ($candidateStatement === false) {
            return null;
        }

        return $candidateStatement;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement|null
     */
    public function lastCandidateStatement(): ?CandidateStatement
    {
        $candidateStatement = $this->candidateStatement ?? [];
        $candidateStatement = end($candidateStatement);

        if ($candidateStatement === false) {
            return null;
        }

        return $candidateStatement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement $candidateStatement
     * @return self
     */
    public function addToCandidateStatement(CandidateStatement $candidateStatement): self
    {
        $this->candidateStatement[] = $candidateStatement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement
     */
    public function addToCandidateStatementWithCreate(): CandidateStatement
    {
        $this->addTocandidateStatement($candidateStatement = new CandidateStatement());

        return $candidateStatement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement $candidateStatement
     * @return self
     */
    public function addOnceToCandidateStatement(CandidateStatement $candidateStatement): self
    {
        if (!is_array($this->candidateStatement)) {
            $this->candidateStatement = [];
        }

        $this->candidateStatement[0] = $candidateStatement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CandidateStatement
     */
    public function addOnceToCandidateStatementWithCreate(): CandidateStatement
    {
        if (!is_array($this->candidateStatement)) {
            $this->candidateStatement = [];
        }

        if ($this->candidateStatement === []) {
            $this->addOnceTocandidateStatement(new CandidateStatement());
        }

        return $this->candidateStatement[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceIssuingParty|null
     */
    public function getEvidenceIssuingParty(): ?EvidenceIssuingParty
    {
        return $this->evidenceIssuingParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceIssuingParty
     */
    public function getEvidenceIssuingPartyWithCreate(): EvidenceIssuingParty
    {
        $this->evidenceIssuingParty = is_null($this->evidenceIssuingParty) ? new EvidenceIssuingParty() : $this->evidenceIssuingParty;

        return $this->evidenceIssuingParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceIssuingParty|null $evidenceIssuingParty
     * @return self
     */
    public function setEvidenceIssuingParty(?EvidenceIssuingParty $evidenceIssuingParty = null): self
    {
        $this->evidenceIssuingParty = $evidenceIssuingParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEvidenceIssuingParty(): self
    {
        $this->evidenceIssuingParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference|null
     */
    public function getDocumentReference(): ?DocumentReference
    {
        return $this->documentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference
     */
    public function getDocumentReferenceWithCreate(): DocumentReference
    {
        $this->documentReference = is_null($this->documentReference) ? new DocumentReference() : $this->documentReference;

        return $this->documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DocumentReference|null $documentReference
     * @return self
     */
    public function setDocumentReference(?DocumentReference $documentReference = null): self
    {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentReference(): self
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Language
     */
    public function getLanguageWithCreate(): Language
    {
        $this->language = is_null($this->language) ? new Language() : $this->language;

        return $this->language;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Language|null $language
     * @return self
     */
    public function setLanguage(?Language $language = null): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLanguage(): self
    {
        $this->language = null;

        return $this;
    }
}
