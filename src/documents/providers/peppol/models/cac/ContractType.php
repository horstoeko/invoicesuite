<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractType as ContractType1;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VersionID;
use JMS\Serializer\Annotation as JMS;

class ContractType
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
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueDate', setter: 'setIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueTime', setter: 'setIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getNominationDate', setter: 'setNominationDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NominationDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nominationDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getNominationTime', setter: 'setNominationTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NominationTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nominationTime;

    /**
     * @var null|ContractTypeCode
     */
    #[JMS\Accessor(getter: 'getContractTypeCode', setter: 'setContractTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $contractTypeCode;

    /**
     * @var null|ContractType1
     */
    #[JMS\Accessor(getter: 'getContractType', setter: 'setContractType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $contractType;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|VersionID
     */
    #[JMS\Accessor(getter: 'getVersionID', setter: 'setVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('VersionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VersionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $versionID;

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
     * @var null|ValidityPeriod
     */
    #[JMS\Accessor(getter: 'getValidityPeriod', setter: 'setValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $validityPeriod;

    /**
     * @var null|array<ContractDocumentReference>
     */
    #[JMS\Accessor(getter: 'getContractDocumentReference', setter: 'setContractDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractDocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractDocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ContractDocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $contractDocumentReference;

    /**
     * @var null|NominationPeriod
     */
    #[JMS\Accessor(getter: 'getNominationPeriod', setter: 'setNominationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NominationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\NominationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $nominationPeriod;

    /**
     * @var null|ContractualDelivery
     */
    #[JMS\Accessor(getter: 'getContractualDelivery', setter: 'setContractualDelivery')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractualDelivery')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractualDelivery')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contractualDelivery;

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
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(
        ?DateTimeInterface $issueTime = null
    ): static {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNominationDate(): ?DateTimeInterface
    {
        return $this->nominationDate;
    }

    /**
     * @param  null|DateTimeInterface $nominationDate
     * @return static
     */
    public function setNominationDate(
        ?DateTimeInterface $nominationDate = null
    ): static {
        $this->nominationDate = $nominationDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNominationDate(): static
    {
        $this->nominationDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNominationTime(): ?DateTimeInterface
    {
        return $this->nominationTime;
    }

    /**
     * @param  null|DateTimeInterface $nominationTime
     * @return static
     */
    public function setNominationTime(
        ?DateTimeInterface $nominationTime = null
    ): static {
        $this->nominationTime = $nominationTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNominationTime(): static
    {
        $this->nominationTime = null;

        return $this;
    }

    /**
     * @return null|ContractTypeCode
     */
    public function getContractTypeCode(): ?ContractTypeCode
    {
        return $this->contractTypeCode;
    }

    /**
     * @return ContractTypeCode
     */
    public function getContractTypeCodeWithCreate(): ContractTypeCode
    {
        $this->contractTypeCode ??= new ContractTypeCode();

        return $this->contractTypeCode;
    }

    /**
     * @param  null|ContractTypeCode $contractTypeCode
     * @return static
     */
    public function setContractTypeCode(
        ?ContractTypeCode $contractTypeCode = null
    ): static {
        $this->contractTypeCode = $contractTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractTypeCode(): static
    {
        $this->contractTypeCode = null;

        return $this;
    }

    /**
     * @return null|ContractType1
     */
    public function getContractType(): ?ContractType1
    {
        return $this->contractType;
    }

    /**
     * @return ContractType1
     */
    public function getContractTypeWithCreate(): ContractType1
    {
        $this->contractType ??= new ContractType1();

        return $this->contractType;
    }

    /**
     * @param  null|ContractType1 $contractType
     * @return static
     */
    public function setContractType(
        ?ContractType1 $contractType = null
    ): static {
        $this->contractType = $contractType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractType(): static
    {
        $this->contractType = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(
        ?array $note = null
    ): static {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|VersionID
     */
    public function getVersionID(): ?VersionID
    {
        return $this->versionID;
    }

    /**
     * @return VersionID
     */
    public function getVersionIDWithCreate(): VersionID
    {
        $this->versionID ??= new VersionID();

        return $this->versionID;
    }

    /**
     * @param  null|VersionID $versionID
     * @return static
     */
    public function setVersionID(
        ?VersionID $versionID = null
    ): static {
        $this->versionID = $versionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVersionID(): static
    {
        $this->versionID = null;

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
        if (!is_array($this->description)) {
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
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|ValidityPeriod
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod ??= new ValidityPeriod();

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(
        ?ValidityPeriod $validityPeriod = null
    ): static {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return null|array<ContractDocumentReference>
     */
    public function getContractDocumentReference(): ?array
    {
        return $this->contractDocumentReference;
    }

    /**
     * @param  null|array<ContractDocumentReference> $contractDocumentReference
     * @return static
     */
    public function setContractDocumentReference(
        ?array $contractDocumentReference = null
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
     * @return static
     */
    public function clearContractDocumentReference(): static
    {
        $this->contractDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ContractDocumentReference
     */
    public function firstContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = reset($contractDocumentReference);

        if (false === $contractDocumentReference) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @return null|ContractDocumentReference
     */
    public function lastContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = end($contractDocumentReference);

        if (false === $contractDocumentReference) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @param  ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function addToContractDocumentReference(
        ContractDocumentReference $contractDocumentReference
    ): static {
        $this->contractDocumentReference[] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return ContractDocumentReference
     */
    public function addToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        $this->addToContractDocumentReference($contractDocumentReference = new ContractDocumentReference());

        return $contractDocumentReference;
    }

    /**
     * @param  ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function addOnceToContractDocumentReference(
        ContractDocumentReference $contractDocumentReference
    ): static {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        $this->contractDocumentReference[0] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return ContractDocumentReference
     */
    public function addOnceToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        if ([] === $this->contractDocumentReference) {
            $this->addOnceToContractDocumentReference(new ContractDocumentReference());
        }

        return $this->contractDocumentReference[0];
    }

    /**
     * @return null|NominationPeriod
     */
    public function getNominationPeriod(): ?NominationPeriod
    {
        return $this->nominationPeriod;
    }

    /**
     * @return NominationPeriod
     */
    public function getNominationPeriodWithCreate(): NominationPeriod
    {
        $this->nominationPeriod ??= new NominationPeriod();

        return $this->nominationPeriod;
    }

    /**
     * @param  null|NominationPeriod $nominationPeriod
     * @return static
     */
    public function setNominationPeriod(
        ?NominationPeriod $nominationPeriod = null
    ): static {
        $this->nominationPeriod = $nominationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNominationPeriod(): static
    {
        $this->nominationPeriod = null;

        return $this;
    }

    /**
     * @return null|ContractualDelivery
     */
    public function getContractualDelivery(): ?ContractualDelivery
    {
        return $this->contractualDelivery;
    }

    /**
     * @return ContractualDelivery
     */
    public function getContractualDeliveryWithCreate(): ContractualDelivery
    {
        $this->contractualDelivery ??= new ContractualDelivery();

        return $this->contractualDelivery;
    }

    /**
     * @param  null|ContractualDelivery $contractualDelivery
     * @return static
     */
    public function setContractualDelivery(
        ?ContractualDelivery $contractualDelivery = null
    ): static {
        $this->contractualDelivery = $contractualDelivery;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractualDelivery(): static
    {
        $this->contractualDelivery = null;

        return $this;
    }
}
