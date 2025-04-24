<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class DocumentLineDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ParentLineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getParentLineID", setter="setParentLineID")
     */
    private $parentLineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\LineStatusCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusReasonCode", setter="setLineStatusReasonCode")
     */
    private $codeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\NoteType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedNote", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getLineID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getLineIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setLineID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->lineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getParentLineID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->parentLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getParentLineIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->parentLineID = is_null($this->parentLineID) ? new IDType() : $this->parentLineID;

        return $this->parentLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setParentLineID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->parentLineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType|null
     */
    public function getLineStatusCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
    {
        return $this->lineStatusCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
     */
    public function getLineStatusCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
    {
        $this->lineStatusCodeType = is_null($this->lineStatusCodeType) ? new LineStatusCodeType() : $this->lineStatusCodeType;

        return $this->lineStatusCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
     * @return self
     */
    public function setLineStatusCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType $lineStatusCodeType,
    ): self {
        $this->lineStatusCodeType = $lineStatusCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getLineStatusReasonCode(): ?\horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getLineStatusReasonCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setLineStatusReasonCode(
        \horstoeko\invoicesuite\models\zugferd\udt\CodeType $codeType,
    ): self {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType>|null
     */
    public function getIncludedNote(): ?array
    {
        return $this->includedNote;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\NoteType $noteType
     * @return self
     */
    public function addToIncludedNote(\horstoeko\invoicesuite\models\zugferd\ram\NoteType $noteType): self
    {
        $this->includedNote[] = $noteType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\NoteType
     */
    public function addToIncludedNoteWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\NoteType
    {
        $this->addToincludedNote($noteType = new NoteType());

        return $noteType;
    }
}
