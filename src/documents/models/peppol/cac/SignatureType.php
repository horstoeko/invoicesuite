<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CanonicalizationMethod;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SignatureMethod;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ValidatorID;
use JMS\Serializer\Annotation as JMS;

class SignatureType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ValidationDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidationDate", setter="setValidationDate")
     */
    private $validationDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ValidationTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidationTime", setter="setValidationTime")
     */
    private $validationTime;

    /**
     * @var null|ValidatorID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ValidatorID")
     * @JMS\Expose
     * @JMS\SerializedName("ValidatorID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidatorID", setter="setValidatorID")
     */
    private $validatorID;

    /**
     * @var null|CanonicalizationMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CanonicalizationMethod")
     * @JMS\Expose
     * @JMS\SerializedName("CanonicalizationMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCanonicalizationMethod", setter="setCanonicalizationMethod")
     */
    private $canonicalizationMethod;

    /**
     * @var null|SignatureMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SignatureMethod")
     * @JMS\Expose
     * @JMS\SerializedName("SignatureMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatureMethod", setter="setSignatureMethod")
     */
    private $signatureMethod;

    /**
     * @var null|SignatoryParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SignatoryParty")
     * @JMS\Expose
     * @JMS\SerializedName("SignatoryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatoryParty", setter="setSignatoryParty")
     */
    private $signatoryParty;

    /**
     * @var null|DigitalSignatureAttachment
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DigitalSignatureAttachment")
     * @JMS\Expose
     * @JMS\SerializedName("DigitalSignatureAttachment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDigitalSignatureAttachment", setter="setDigitalSignatureAttachment")
     */
    private $digitalSignatureAttachment;

    /**
     * @var null|OriginalDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OriginalDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalDocumentReference", setter="setOriginalDocumentReference")
     */
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
    public function setNote(?array $note = null): static
    {
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
    public function addToNote(Note $note): static
    {
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
    public function addOnceToNote(Note $note): static
    {
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
    public function setValidationDate(?DateTimeInterface $validationDate = null): static
    {
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
    public function setValidationTime(?DateTimeInterface $validationTime = null): static
    {
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
        $this->validatorID = is_null($this->validatorID) ? new ValidatorID() : $this->validatorID;

        return $this->validatorID;
    }

    /**
     * @param  null|ValidatorID $validatorID
     * @return static
     */
    public function setValidatorID(?ValidatorID $validatorID = null): static
    {
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
        $this->canonicalizationMethod = is_null($this->canonicalizationMethod) ? new CanonicalizationMethod() : $this->canonicalizationMethod;

        return $this->canonicalizationMethod;
    }

    /**
     * @param  null|CanonicalizationMethod $canonicalizationMethod
     * @return static
     */
    public function setCanonicalizationMethod(?CanonicalizationMethod $canonicalizationMethod = null): static
    {
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
        $this->signatureMethod = is_null($this->signatureMethod) ? new SignatureMethod() : $this->signatureMethod;

        return $this->signatureMethod;
    }

    /**
     * @param  null|SignatureMethod $signatureMethod
     * @return static
     */
    public function setSignatureMethod(?SignatureMethod $signatureMethod = null): static
    {
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
        $this->signatoryParty = is_null($this->signatoryParty) ? new SignatoryParty() : $this->signatoryParty;

        return $this->signatoryParty;
    }

    /**
     * @param  null|SignatoryParty $signatoryParty
     * @return static
     */
    public function setSignatoryParty(?SignatoryParty $signatoryParty = null): static
    {
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
        $this->digitalSignatureAttachment = is_null($this->digitalSignatureAttachment) ? new DigitalSignatureAttachment() : $this->digitalSignatureAttachment;

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
        $this->originalDocumentReference = is_null($this->originalDocumentReference) ? new OriginalDocumentReference() : $this->originalDocumentReference;

        return $this->originalDocumentReference;
    }

    /**
     * @param  null|OriginalDocumentReference $originalDocumentReference
     * @return static
     */
    public function setOriginalDocumentReference(?OriginalDocumentReference $originalDocumentReference = null): static
    {
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
