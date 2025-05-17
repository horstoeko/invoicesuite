<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxbasic\udt\IDType;

class DocumentLineDocumentType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\udt\IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\NoteType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\NoteType")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\IDType|null
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\udt\IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\udt\IDType $lineID
     * @return self
     */
    public function setLineID(IDType $lineID): self
    {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\NoteType|null
     */
    public function getIncludedNote(): ?NoteType
    {
        return $this->includedNote;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\NoteType
     */
    public function getIncludedNoteWithCreate(): NoteType
    {
        $this->includedNote = is_null($this->includedNote) ? new NoteType() : $this->includedNote;

        return $this->includedNote;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\NoteType $includedNote
     * @return self
     */
    public function setIncludedNote(NoteType $includedNote): self
    {
        $this->includedNote = $includedNote;

        return $this;
    }
}
