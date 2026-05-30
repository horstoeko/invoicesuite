<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FinancingInstrumentCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class TradeFinancingType
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
     * @var null|FinancingInstrumentCode
     */
    #[JMS\Accessor(getter: 'getFinancingInstrumentCode', setter: 'setFinancingInstrumentCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancingInstrumentCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FinancingInstrumentCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $financingInstrumentCode;

    /**
     * @var null|ContractDocumentReference
     */
    #[JMS\Accessor(getter: 'getContractDocumentReference', setter: 'setContractDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contractDocumentReference;

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
     * @var null|FinancingParty
     */
    #[JMS\Accessor(getter: 'getFinancingParty', setter: 'setFinancingParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancingParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancingParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $financingParty;

    /**
     * @var null|FinancingFinancialAccount
     */
    #[JMS\Accessor(getter: 'getFinancingFinancialAccount', setter: 'setFinancingFinancialAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancingFinancialAccount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancingFinancialAccount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $financingFinancialAccount;

    /**
     * @var null|array<Clause>
     */
    #[JMS\Accessor(getter: 'getClause', setter: 'setClause')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Clause')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Clause>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Clause', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->financingInstrumentCode ??= new FinancingInstrumentCode();

        return $this->financingInstrumentCode;
    }

    /**
     * @param  null|FinancingInstrumentCode $financingInstrumentCode
     * @return static
     */
    public function setFinancingInstrumentCode(
        ?FinancingInstrumentCode $financingInstrumentCode = null
    ): static {
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
        $this->contractDocumentReference ??= new ContractDocumentReference();

        return $this->contractDocumentReference;
    }

    /**
     * @param  null|ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function setContractDocumentReference(
        ?ContractDocumentReference $contractDocumentReference = null
    ): static {
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
        $this->financingParty ??= new FinancingParty();

        return $this->financingParty;
    }

    /**
     * @param  null|FinancingParty $financingParty
     * @return static
     */
    public function setFinancingParty(
        ?FinancingParty $financingParty = null
    ): static {
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
        $this->financingFinancialAccount ??= new FinancingFinancialAccount();

        return $this->financingFinancialAccount;
    }

    /**
     * @param  null|FinancingFinancialAccount $financingFinancialAccount
     * @return static
     */
    public function setFinancingFinancialAccount(
        ?FinancingFinancialAccount $financingFinancialAccount = null
    ): static {
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
    public function setClause(
        ?array $clause = null
    ): static {
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
    public function addToClause(
        Clause $clause
    ): static {
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
    public function addOnceToClause(
        Clause $clause
    ): static {
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
