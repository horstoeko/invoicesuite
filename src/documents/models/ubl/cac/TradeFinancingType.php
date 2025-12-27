<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FinancingInstrumentCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class TradeFinancingType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|FinancingInstrumentCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FinancingInstrumentCode")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingInstrumentCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingInstrumentCode", setter="setFinancingInstrumentCode")
     */
    private $financingInstrumentCode;

    /**
     * @var null|ContractDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ContractDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ContractDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractDocumentReference", setter="setContractDocumentReference")
     */
    private $contractDocumentReference;

    /**
     * @var null|array<DocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var null|FinancingParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\FinancingParty")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingParty", setter="setFinancingParty")
     */
    private $financingParty;

    /**
     * @var null|FinancingFinancialAccount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\FinancingFinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingFinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingFinancialAccount", setter="setFinancingFinancialAccount")
     */
    private $financingFinancialAccount;

    /**
     * @var null|array<Clause>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Clause>")
     * @JMS\Expose
     * @JMS\SerializedName("Clause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Clause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClause", setter="setClause")
     */
    private $clause;

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
     * @return null|FinancingInstrumentCode
     */
    public function getFinancingInstrumentCode(): ?FinancingInstrumentCode
    {
        return $this->financingInstrumentCode;
    }

    /**
     * @return FinancingInstrumentCode
     */
    public function getFinancingInstrumentCodeWithCreate(): FinancingInstrumentCode
    {
        $this->financingInstrumentCode = is_null($this->financingInstrumentCode) ? new FinancingInstrumentCode() : $this->financingInstrumentCode;

        return $this->financingInstrumentCode;
    }

    /**
     * @param  null|FinancingInstrumentCode $financingInstrumentCode
     * @return static
     */
    public function setFinancingInstrumentCode(?FinancingInstrumentCode $financingInstrumentCode = null): static
    {
        $this->financingInstrumentCode = $financingInstrumentCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancingInstrumentCode(): static
    {
        $this->financingInstrumentCode = null;

        return $this;
    }

    /**
     * @return null|ContractDocumentReference
     */
    public function getContractDocumentReference(): ?ContractDocumentReference
    {
        return $this->contractDocumentReference;
    }

    /**
     * @return ContractDocumentReference
     */
    public function getContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        $this->contractDocumentReference = is_null($this->contractDocumentReference) ? new ContractDocumentReference() : $this->contractDocumentReference;

        return $this->contractDocumentReference;
    }

    /**
     * @param  null|ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function setContractDocumentReference(?ContractDocumentReference $contractDocumentReference = null): static
    {
        $this->contractDocumentReference = $contractDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractDocumentReference(): static
    {
        $this->contractDocumentReference = null;

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
    public function setDocumentReference(?array $documentReference = null): static
    {
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
    public function addToDocumentReference(DocumentReference $documentReference): static
    {
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
    public function addOnceToDocumentReference(DocumentReference $documentReference): static
    {
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
     * @return null|FinancingParty
     */
    public function getFinancingParty(): ?FinancingParty
    {
        return $this->financingParty;
    }

    /**
     * @return FinancingParty
     */
    public function getFinancingPartyWithCreate(): FinancingParty
    {
        $this->financingParty = is_null($this->financingParty) ? new FinancingParty() : $this->financingParty;

        return $this->financingParty;
    }

    /**
     * @param  null|FinancingParty $financingParty
     * @return static
     */
    public function setFinancingParty(?FinancingParty $financingParty = null): static
    {
        $this->financingParty = $financingParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancingParty(): static
    {
        $this->financingParty = null;

        return $this;
    }

    /**
     * @return null|FinancingFinancialAccount
     */
    public function getFinancingFinancialAccount(): ?FinancingFinancialAccount
    {
        return $this->financingFinancialAccount;
    }

    /**
     * @return FinancingFinancialAccount
     */
    public function getFinancingFinancialAccountWithCreate(): FinancingFinancialAccount
    {
        $this->financingFinancialAccount = is_null($this->financingFinancialAccount) ? new FinancingFinancialAccount() : $this->financingFinancialAccount;

        return $this->financingFinancialAccount;
    }

    /**
     * @param  null|FinancingFinancialAccount $financingFinancialAccount
     * @return static
     */
    public function setFinancingFinancialAccount(?FinancingFinancialAccount $financingFinancialAccount = null): static
    {
        $this->financingFinancialAccount = $financingFinancialAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancingFinancialAccount(): static
    {
        $this->financingFinancialAccount = null;

        return $this;
    }

    /**
     * @return null|array<Clause>
     */
    public function getClause(): ?array
    {
        return $this->clause;
    }

    /**
     * @param  null|array<Clause> $clause
     * @return static
     */
    public function setClause(?array $clause = null): static
    {
        $this->clause = $clause;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClause(): static
    {
        $this->clause = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearClause(): static
    {
        $this->clause = [];

        return $this;
    }

    /**
     * @return null|Clause
     */
    public function firstClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = reset($clause);

        if (false === $clause) {
            return null;
        }

        return $clause;
    }

    /**
     * @return null|Clause
     */
    public function lastClause(): ?Clause
    {
        $clause = $this->clause ?? [];
        $clause = end($clause);

        if (false === $clause) {
            return null;
        }

        return $clause;
    }

    /**
     * @param  Clause $clause
     * @return static
     */
    public function addToClause(Clause $clause): static
    {
        $this->clause[] = $clause;

        return $this;
    }

    /**
     * @return Clause
     */
    public function addToClauseWithCreate(): Clause
    {
        $this->addToclause($clause = new Clause());

        return $clause;
    }

    /**
     * @param  Clause $clause
     * @return static
     */
    public function addOnceToClause(Clause $clause): static
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        $this->clause[0] = $clause;

        return $this;
    }

    /**
     * @return Clause
     */
    public function addOnceToClauseWithCreate(): Clause
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        if ([] === $this->clause) {
            $this->addOnceToclause(new Clause());
        }

        return $this->clause[0];
    }
}
