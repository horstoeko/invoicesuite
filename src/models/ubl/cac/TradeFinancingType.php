<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

class TradeFinancingType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingInstrumentCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingInstrumentCode", setter="setFinancingInstrumentCode")
     */
    private $financingInstrumentCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ContractDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractDocumentReference", setter="setContractDocumentReference")
     */
    private $contractDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FinancingParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FinancingParty")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingParty", setter="setFinancingParty")
     */
    private $financingParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FinancingFinancialAccount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FinancingFinancialAccount")
     * @JMS\Expose
     * @JMS\SerializedName("FinancingFinancialAccount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinancingFinancialAccount", setter="setFinancingFinancialAccount")
     */
    private $financingFinancialAccount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Clause>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Clause>")
     * @JMS\Expose
     * @JMS\SerializedName("Clause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Clause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClause", setter="setClause")
     */
    private $clause;

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
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode|null
     */
    public function getFinancingInstrumentCode(): ?FinancingInstrumentCode
    {
        return $this->financingInstrumentCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode
     */
    public function getFinancingInstrumentCodeWithCreate(): FinancingInstrumentCode
    {
        $this->financingInstrumentCode = is_null($this->financingInstrumentCode) ? new FinancingInstrumentCode() : $this->financingInstrumentCode;

        return $this->financingInstrumentCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FinancingInstrumentCode|null $financingInstrumentCode
     * @return self
     */
    public function setFinancingInstrumentCode(?FinancingInstrumentCode $financingInstrumentCode = null): self
    {
        $this->financingInstrumentCode = $financingInstrumentCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinancingInstrumentCode(): self
    {
        $this->financingInstrumentCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference|null
     */
    public function getContractDocumentReference(): ?ContractDocumentReference
    {
        return $this->contractDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference
     */
    public function getContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        $this->contractDocumentReference = is_null($this->contractDocumentReference) ? new ContractDocumentReference() : $this->contractDocumentReference;

        return $this->contractDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference|null $contractDocumentReference
     * @return self
     */
    public function setContractDocumentReference(?ContractDocumentReference $contractDocumentReference = null): self
    {
        $this->contractDocumentReference = $contractDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractDocumentReference(): self
    {
        $this->contractDocumentReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DocumentReference>|null $documentReference
     * @return self
     */
    public function setDocumentReference(?array $documentReference = null): self
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
     * @return self
     */
    public function clearDocumentReference(): self
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addToDocumentReference(DocumentReference $documentReference): self
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentReference $documentReference
     * @return self
     */
    public function addOnceToDocumentReference(DocumentReference $documentReference): self
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ($this->documentReference === []) {
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancingParty|null
     */
    public function getFinancingParty(): ?FinancingParty
    {
        return $this->financingParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancingParty
     */
    public function getFinancingPartyWithCreate(): FinancingParty
    {
        $this->financingParty = is_null($this->financingParty) ? new FinancingParty() : $this->financingParty;

        return $this->financingParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FinancingParty|null $financingParty
     * @return self
     */
    public function setFinancingParty(?FinancingParty $financingParty = null): self
    {
        $this->financingParty = $financingParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinancingParty(): self
    {
        $this->financingParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancingFinancialAccount|null
     */
    public function getFinancingFinancialAccount(): ?FinancingFinancialAccount
    {
        return $this->financingFinancialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FinancingFinancialAccount
     */
    public function getFinancingFinancialAccountWithCreate(): FinancingFinancialAccount
    {
        $this->financingFinancialAccount = is_null($this->financingFinancialAccount) ? new FinancingFinancialAccount() : $this->financingFinancialAccount;

        return $this->financingFinancialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FinancingFinancialAccount|null $financingFinancialAccount
     * @return self
     */
    public function setFinancingFinancialAccount(?FinancingFinancialAccount $financingFinancialAccount = null): self
    {
        $this->financingFinancialAccount = $financingFinancialAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinancingFinancialAccount(): self
    {
        $this->financingFinancialAccount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Clause>|null
     */
    public function getClause(): ?array
    {
        return $this->clause;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Clause>|null $clause
     * @return self
     */
    public function setClause(?array $clause = null): self
    {
        $this->clause = $clause;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClause(): self
    {
        $this->clause = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearClause(): self
    {
        $this->clause = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Clause $clause
     * @return self
     */
    public function addToClause(Clause $clause): self
    {
        $this->clause[] = $clause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Clause
     */
    public function addToClauseWithCreate(): Clause
    {
        $this->addToclause($clause = new Clause());

        return $clause;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Clause $clause
     * @return self
     */
    public function addOnceToClause(Clause $clause): self
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        $this->clause[0] = $clause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Clause
     */
    public function addOnceToClauseWithCreate(): Clause
    {
        if (!is_array($this->clause)) {
            $this->clause = [];
        }

        if ($this->clause === []) {
            $this->addOnceToclause(new Clause());
        }

        return $this->clause[0];
    }
}
