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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ParentLineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getParentLineID", setter="setParentLineID")
     */
    private $parentLineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusReasonCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineStatusReasonCode", setter="setLineStatusReasonCode")
     */
    private $lineStatusReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\NoteType>")
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
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $lineID
     * @return self
     */
    public function setLineID(IDType $lineID): self
    {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getParentLineID(): ?IDType
    {
        return $this->parentLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getParentLineIDWithCreate(): IDType
    {
        $this->parentLineID = is_null($this->parentLineID) ? new IDType() : $this->parentLineID;

        return $this->parentLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $parentLineID
     * @return self
     */
    public function setParentLineID(IDType $parentLineID): self
    {
        $this->parentLineID = $parentLineID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType|null
     */
    public function getLineStatusCode(): ?LineStatusCodeType
    {
        return $this->lineStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType
     */
    public function getLineStatusCodeWithCreate(): LineStatusCodeType
    {
        $this->lineStatusCode = is_null($this->lineStatusCode) ? new LineStatusCodeType() : $this->lineStatusCode;

        return $this->lineStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\LineStatusCodeType $lineStatusCode
     * @return self
     */
    public function setLineStatusCode(LineStatusCodeType $lineStatusCode): self
    {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getLineStatusReasonCode(): ?CodeType
    {
        return $this->lineStatusReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getLineStatusReasonCodeWithCreate(): CodeType
    {
        $this->lineStatusReasonCode = is_null($this->lineStatusReasonCode) ? new CodeType() : $this->lineStatusReasonCode;

        return $this->lineStatusReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType $lineStatusReasonCode
     * @return self
     */
    public function setLineStatusReasonCode(CodeType $lineStatusReasonCode): self
    {
        $this->lineStatusReasonCode = $lineStatusReasonCode;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType> $includedNote
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\NoteType $includedNote
     * @return self
     */
    public function addToIncludedNote(NoteType $includedNote): self
    {
        $this->includedNote[] = $includedNote;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\NoteType
     */
    public function addToIncludedNoteWithCreate(): NoteType
    {
        $this->addToincludedNote($includedNote = new NoteType());

        return $includedNote;
    }
}
