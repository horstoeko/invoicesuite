<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class NoteType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ContentCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContentCode", setter="setContentCode")
     */
    private $contentCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
    private $content;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SubjectCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSubjectCode", setter="setSubjectCode")
     */
    private $subjectCode;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getContentCode(): ?CodeType
    {
        return $this->contentCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getContentCodeWithCreate(): CodeType
    {
        $this->contentCode = is_null($this->contentCode) ? new CodeType() : $this->contentCode;

        return $this->contentCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setContentCode(CodeType $contentCode): self
    {
        $this->contentCode = $contentCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getContent(): ?TextType
    {
        return $this->content;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getContentWithCreate(): TextType
    {
        $this->content = is_null($this->content) ? new TextType() : $this->content;

        return $this->content;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setContent(TextType $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getSubjectCode(): ?CodeType
    {
        return $this->subjectCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getSubjectCodeWithCreate(): CodeType
    {
        $this->subjectCode = is_null($this->subjectCode) ? new CodeType() : $this->subjectCode;

        return $this->subjectCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setSubjectCode(CodeType $subjectCode): self
    {
        $this->subjectCode = $subjectCode;

        return $this;
    }
}
