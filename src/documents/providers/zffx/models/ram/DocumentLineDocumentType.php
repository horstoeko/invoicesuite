<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\LineStatusCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class DocumentLineDocumentType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getLineID', setter: 'setLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getParentLineID', setter: 'setParentLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ParentLineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $parentLineID;

    /**
     * @var null|LineStatusCodeType
     */
    #[JMS\Accessor(getter: 'getLineStatusCode', setter: 'setLineStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\LineStatusCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineStatusCode;

    /**
     * @var null|CodeType
     */
    #[JMS\Accessor(getter: 'getLineStatusReasonCode', setter: 'setLineStatusReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineStatusReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineStatusReasonCode;

    /**
     * @var null|array<NoteType>
     */
    #[JMS\Accessor(getter: 'getIncludedNote', setter: 'setIncludedNote')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedNote')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\NoteType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IncludedNote', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $includedNote;

    /**
     * @return null|IDType
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID ??= new IDType();

        return $this->lineID;
    }

    /**
     * @param  null|IDType $lineID
     * @return static
     */
    public function setLineID(
        ?IDType $lineID = null
    ): static {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineID(): static
    {
        $this->lineID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getParentLineID(): ?IDType
    {
        return $this->parentLineID;
    }

    /**
     * @return IDType
     */
    public function getParentLineIDWithCreate(): IDType
    {
        $this->parentLineID ??= new IDType();

        return $this->parentLineID;
    }

    /**
     * @param  null|IDType $parentLineID
     * @return static
     */
    public function setParentLineID(
        ?IDType $parentLineID = null
    ): static {
        $this->parentLineID = $parentLineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParentLineID(): static
    {
        $this->parentLineID = null;

        return $this;
    }

    /**
     * @return null|LineStatusCodeType
     */
    public function getLineStatusCode(): ?LineStatusCodeType
    {
        return $this->lineStatusCode;
    }

    /**
     * @return LineStatusCodeType
     */
    public function getLineStatusCodeWithCreate(): LineStatusCodeType
    {
        $this->lineStatusCode ??= new LineStatusCodeType();

        return $this->lineStatusCode;
    }

    /**
     * @param  null|LineStatusCodeType $lineStatusCode
     * @return static
     */
    public function setLineStatusCode(
        ?LineStatusCodeType $lineStatusCode = null
    ): static {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusCode(): static
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return null|CodeType
     */
    public function getLineStatusReasonCode(): ?CodeType
    {
        return $this->lineStatusReasonCode;
    }

    /**
     * @return CodeType
     */
    public function getLineStatusReasonCodeWithCreate(): CodeType
    {
        $this->lineStatusReasonCode ??= new CodeType();

        return $this->lineStatusReasonCode;
    }

    /**
     * @param  null|CodeType $lineStatusReasonCode
     * @return static
     */
    public function setLineStatusReasonCode(
        ?CodeType $lineStatusReasonCode = null
    ): static {
        $this->lineStatusReasonCode = $lineStatusReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusReasonCode(): static
    {
        $this->lineStatusReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<NoteType>
     */
    public function getIncludedNote(): ?array
    {
        return $this->includedNote;
    }

    /**
     * @param  null|array<NoteType> $includedNote
     * @return static
     */
    public function setIncludedNote(
        ?array $includedNote = null
    ): static {
        $this->includedNote = $includedNote;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedNote(): static
    {
        $this->includedNote = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIncludedNote(): static
    {
        $this->includedNote = [];

        return $this;
    }

    /**
     * @param  NoteType $includedNote
     * @return static
     */
    public function addToIncludedNote(
        NoteType $includedNote
    ): static {
        $this->includedNote[] = $includedNote;

        return $this;
    }

    /**
     * @return NoteType
     */
    public function addToIncludedNoteWithCreate(): NoteType
    {
        $this->addToIncludedNote($includedNote = new NoteType());

        return $includedNote;
    }

    /**
     * @param  NoteType $includedNote
     * @return static
     */
    public function addOnceToIncludedNote(
        NoteType $includedNote
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->includedNote)) {
            $this->includedNote = [];
        }

        $this->includedNote[0] = $includedNote;

        return $this;
    }

    /**
     * @return NoteType
     */
    public function addOnceToIncludedNoteWithCreate(): NoteType
    {
        if (!InvoiceSuiteArrayUtils::is($this->includedNote)) {
            $this->includedNote = [];
        }

        if ([] === $this->includedNote) {
            $this->addOnceToIncludedNote(new NoteType());
        }

        return $this->includedNote[0];
    }
}
