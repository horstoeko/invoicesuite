<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\concerns\HandlesOptional;
use horstoeko\invoicesuite\models\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class NoteType
{
    use HandlesObjectFlags;
    use HandlesOptional;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\CodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ContentCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContentCode", setter="setContentCode")
     */
    private $contentCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
    private $content;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\CodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SubjectCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSubjectCode", setter="setSubjectCode")
     */
    private $subjectCode;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType|null
     */
    public function getContentCode(): ?CodeType
    {
        return $this->contentCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType
     */
    public function getContentCodeWithCreate(): CodeType
    {
        $this->contentCode = is_null($this->contentCode) ? new CodeType() : $this->contentCode;

        return $this->contentCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\CodeType $contentCode
     * @return self
     */
    public function setContentCode(CodeType $contentCode): self
    {
        $this->contentCode = $contentCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getContent(): ?TextType
    {
        return $this->content;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getContentWithCreate(): TextType
    {
        $this->content = is_null($this->content) ? new TextType() : $this->content;

        return $this->content;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType $content
     * @return self
     */
    public function setContent(TextType $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType|null
     */
    public function getSubjectCode(): ?CodeType
    {
        return $this->subjectCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType
     */
    public function getSubjectCodeWithCreate(): CodeType
    {
        $this->subjectCode = is_null($this->subjectCode) ? new CodeType() : $this->subjectCode;

        return $this->subjectCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\CodeType $subjectCode
     * @return self
     */
    public function setSubjectCode(CodeType $subjectCode): self
    {
        $this->subjectCode = $subjectCode;

        return $this;
    }
}
