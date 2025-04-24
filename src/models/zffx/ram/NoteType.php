<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class NoteType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ContentCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContentCode", setter="setContentCode")
     */
    private $contentCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SubjectCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSubjectCode", setter="setSubjectCode")
     */
    private $subjectCode;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getContentCode(): ?CodeType
    {
        return $this->contentCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getContentCodeWithCreate(): CodeType
    {
        $this->contentCode = is_null($this->contentCode) ? new CodeType() : $this->contentCode;

        return $this->contentCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setContentCode(CodeType $codeType): self
    {
        $this->contentCode = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getContent(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getContentWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setContent(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getSubjectCode(): ?CodeType
    {
        return $this->subjectCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getSubjectCodeWithCreate(): CodeType
    {
        $this->subjectCode = is_null($this->subjectCode) ? new CodeType() : $this->subjectCode;

        return $this->subjectCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setSubjectCode(CodeType $codeType): self
    {
        $this->subjectCode = $codeType;

        return $this;
    }
}
