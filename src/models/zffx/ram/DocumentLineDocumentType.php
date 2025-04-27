<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\IDType;

class DocumentLineDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ParentLineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getParentLineID", setter="setParentLineID")
     */
    private $parentLineID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusReasonCode", setter="setLineStatusReasonCode")
     */
    private $codeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\NoteType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\NoteType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedNote", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setLineID(IDType $idType): self
    {
        $this->lineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getParentLineID(): ?IDType
    {
        return $this->parentLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getParentLineIDWithCreate(): IDType
    {
        $this->parentLineID = is_null($this->parentLineID) ? new IDType() : $this->parentLineID;

        return $this->parentLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setParentLineID(IDType $idType): self
    {
        $this->parentLineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType|null
     */
    public function getLineStatusCode(): ?LineStatusCodeType
    {
        return $this->lineStatusCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType
     */
    public function getLineStatusCodeWithCreate(): LineStatusCodeType
    {
        $this->lineStatusCodeType = is_null($this->lineStatusCodeType) ? new LineStatusCodeType() : $this->lineStatusCodeType;

        return $this->lineStatusCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\LineStatusCodeType $lineStatusCodeType
     * @return self
     */
    public function setLineStatusCode(LineStatusCodeType $lineStatusCodeType): self
    {
        $this->lineStatusCodeType = $lineStatusCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getLineStatusReasonCode(): ?CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getLineStatusReasonCodeWithCreate(): CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setLineStatusReasonCode(CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\NoteType>|null
     */
    public function getIncludedNote(): ?array
    {
        return $this->includedNote;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\NoteType> $includedNote
     * @return self
     */
    public function setIncludedNote(array $includedNote): self
    {
        $this->includedNote = $includedNote;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIncludedNote(): self
    {
        $this->includedNote = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\NoteType $noteType
     * @return self
     */
    public function addToIncludedNote(NoteType $noteType): self
    {
        $this->includedNote[] = $noteType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\NoteType
     */
    public function addToIncludedNoteWithCreate(): NoteType
    {
        $this->addToincludedNote($noteType = new NoteType());

        return $noteType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\NoteType $noteType
     * @return self
     */
    public function addOnceToIncludedNote(NoteType $noteType): self
    {
        $this->includedNote[0] = $noteType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\NoteType
     */
    public function addOnceToIncludedNoteWithCreate(): NoteType
    {
        if ($this->includedNote === []) {
            $this->addOnceToincludedNote(new NoteType());
        }

        return $this->includedNote[0];
    }
}
