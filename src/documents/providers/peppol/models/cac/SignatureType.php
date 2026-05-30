<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CanonicalizationMethod;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SignatureMethod;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValidatorID;
use JMS\Serializer\Annotation as JMS;

class SignatureType
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
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getValidationDate', setter: 'setValidationDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidationDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $validationDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getValidationTime', setter: 'setValidationTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidationTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $validationTime;

    /**
     * @var null|ValidatorID
     */
    #[JMS\Accessor(getter: 'getValidatorID', setter: 'setValidatorID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidatorID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValidatorID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $validatorID;

    /**
     * @var null|CanonicalizationMethod
     */
    #[JMS\Accessor(getter: 'getCanonicalizationMethod', setter: 'setCanonicalizationMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CanonicalizationMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CanonicalizationMethod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $canonicalizationMethod;

    /**
     * @var null|SignatureMethod
     */
    #[JMS\Accessor(getter: 'getSignatureMethod', setter: 'setSignatureMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SignatureMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SignatureMethod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $signatureMethod;

    /**
     * @var null|SignatoryParty
     */
    #[JMS\Accessor(getter: 'getSignatoryParty', setter: 'setSignatoryParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SignatoryParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SignatoryParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $signatoryParty;

    /**
     * @var null|DigitalSignatureAttachment
     */
    #[JMS\Accessor(getter: 'getDigitalSignatureAttachment', setter: 'setDigitalSignatureAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DigitalSignatureAttachment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DigitalSignatureAttachment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $digitalSignatureAttachment;

    /**
     * @var null|OriginalDocumentReference
     */
    #[JMS\Accessor(getter: 'getOriginalDocumentReference', setter: 'setOriginalDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginalDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginalDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originalDocumentReference;

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
        $this->addTonote($note = new Note());

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
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getValidationDate(): ?DateTimeInterface
    {
        return $this->validationDate;
    }

    /**
     * @param  null|DateTimeInterface $validationDate
     * @return static
     */
    public function setValidationDate(
        ?DateTimeInterface $validationDate = null
    ): static {
        $this->validationDate = $validationDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidationDate(): static
    {
        $this->validationDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getValidationTime(): ?DateTimeInterface
    {
        return $this->validationTime;
    }

    /**
     * @param  null|DateTimeInterface $validationTime
     * @return static
     */
    public function setValidationTime(
        ?DateTimeInterface $validationTime = null
    ): static {
        $this->validationTime = $validationTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidationTime(): static
    {
        $this->validationTime = null;

        return $this;
    }

    /**
     * @return null|ValidatorID
     */
    public function getValidatorID(): ?ValidatorID
    {
        return $this->validatorID;
    }

    /**
     * @return ValidatorID
     */
    public function getValidatorIDWithCreate(): ValidatorID
    {
        $this->validatorID ??= new ValidatorID();

        return $this->validatorID;
    }

    /**
     * @param  null|ValidatorID $validatorID
     * @return static
     */
    public function setValidatorID(
        ?ValidatorID $validatorID = null
    ): static {
        $this->validatorID = $validatorID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidatorID(): static
    {
        $this->validatorID = null;

        return $this;
    }

    /**
     * @return null|CanonicalizationMethod
     */
    public function getCanonicalizationMethod(): ?CanonicalizationMethod
    {
        return $this->canonicalizationMethod;
    }

    /**
     * @return CanonicalizationMethod
     */
    public function getCanonicalizationMethodWithCreate(): CanonicalizationMethod
    {
        $this->canonicalizationMethod ??= new CanonicalizationMethod();

        return $this->canonicalizationMethod;
    }

    /**
     * @param  null|CanonicalizationMethod $canonicalizationMethod
     * @return static
     */
    public function setCanonicalizationMethod(
        ?CanonicalizationMethod $canonicalizationMethod = null
    ): static {
        $this->canonicalizationMethod = $canonicalizationMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCanonicalizationMethod(): static
    {
        $this->canonicalizationMethod = null;

        return $this;
    }

    /**
     * @return null|SignatureMethod
     */
    public function getSignatureMethod(): ?SignatureMethod
    {
        return $this->signatureMethod;
    }

    /**
     * @return SignatureMethod
     */
    public function getSignatureMethodWithCreate(): SignatureMethod
    {
        $this->signatureMethod ??= new SignatureMethod();

        return $this->signatureMethod;
    }

    /**
     * @param  null|SignatureMethod $signatureMethod
     * @return static
     */
    public function setSignatureMethod(
        ?SignatureMethod $signatureMethod = null
    ): static {
        $this->signatureMethod = $signatureMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignatureMethod(): static
    {
        $this->signatureMethod = null;

        return $this;
    }

    /**
     * @return null|SignatoryParty
     */
    public function getSignatoryParty(): ?SignatoryParty
    {
        return $this->signatoryParty;
    }

    /**
     * @return SignatoryParty
     */
    public function getSignatoryPartyWithCreate(): SignatoryParty
    {
        $this->signatoryParty ??= new SignatoryParty();

        return $this->signatoryParty;
    }

    /**
     * @param  null|SignatoryParty $signatoryParty
     * @return static
     */
    public function setSignatoryParty(
        ?SignatoryParty $signatoryParty = null
    ): static {
        $this->signatoryParty = $signatoryParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignatoryParty(): static
    {
        $this->signatoryParty = null;

        return $this;
    }

    /**
     * @return null|DigitalSignatureAttachment
     */
    public function getDigitalSignatureAttachment(): ?DigitalSignatureAttachment
    {
        return $this->digitalSignatureAttachment;
    }

    /**
     * @return DigitalSignatureAttachment
     */
    public function getDigitalSignatureAttachmentWithCreate(): DigitalSignatureAttachment
    {
        $this->digitalSignatureAttachment ??= new DigitalSignatureAttachment();

        return $this->digitalSignatureAttachment;
    }

    /**
     * @param  null|DigitalSignatureAttachment $digitalSignatureAttachment
     * @return static
     */
    public function setDigitalSignatureAttachment(
        ?DigitalSignatureAttachment $digitalSignatureAttachment = null,
    ): static {
        $this->digitalSignatureAttachment = $digitalSignatureAttachment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDigitalSignatureAttachment(): static
    {
        $this->digitalSignatureAttachment = null;

        return $this;
    }

    /**
     * @return null|OriginalDocumentReference
     */
    public function getOriginalDocumentReference(): ?OriginalDocumentReference
    {
        return $this->originalDocumentReference;
    }

    /**
     * @return OriginalDocumentReference
     */
    public function getOriginalDocumentReferenceWithCreate(): OriginalDocumentReference
    {
        $this->originalDocumentReference ??= new OriginalDocumentReference();

        return $this->originalDocumentReference;
    }

    /**
     * @param  null|OriginalDocumentReference $originalDocumentReference
     * @return static
     */
    public function setOriginalDocumentReference(
        ?OriginalDocumentReference $originalDocumentReference = null
    ): static {
        $this->originalDocumentReference = $originalDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalDocumentReference(): static
    {
        $this->originalDocumentReference = null;

        return $this;
    }
}
