<?php

namespace horstoeko\invoicesuite\documentmodels\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType;
use horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType;

class NoteType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
    private $content;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("SubjectCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSubjectCode", setter="setSubjectCode")
     */
    private $subjectCode;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType|null
     */
    public function getContent(): ?TextType
    {
        return $this->content;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType
     */
    public function getContentWithCreate(): TextType
    {
        $this->content = is_null($this->content) ? new TextType() : $this->content;

        return $this->content;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\TextType|null $content
     * @return self
     */
    public function setContent(?TextType $content = null): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContent(): self
    {
        $this->content = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType|null
     */
    public function getSubjectCode(): ?CodeType
    {
        return $this->subjectCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType
     */
    public function getSubjectCodeWithCreate(): CodeType
    {
        $this->subjectCode = is_null($this->subjectCode) ? new CodeType() : $this->subjectCode;

        return $this->subjectCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxbasic\udt\CodeType|null $subjectCode
     * @return self
     */
    public function setSubjectCode(?CodeType $subjectCode = null): self
    {
        $this->subjectCode = $subjectCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubjectCode(): self
    {
        $this->subjectCode = null;

        return $this;
    }
}
