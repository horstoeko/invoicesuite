<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType;
use horstoeko\invoicesuite\models\zffx\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\IndicatorType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ExchangedDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $documentCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssueDateTime", setter="setIssueDateTime")
     */
    private $dateTimeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\NoteType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\NoteType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedNote", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("EffectiveSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEffectiveSpecifiedPeriod", setter="setEffectiveSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setID(IDType $idType): self
    {
        $this->iD = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setName(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType|null
     */
    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->documentCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType
     */
    public function getTypeCodeWithCreate(): DocumentCodeType
    {
        $this->documentCodeType = is_null($this->documentCodeType) ? new DocumentCodeType() : $this->documentCodeType;

        return $this->documentCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType $documentCodeType
     * @return self
     */
    public function setTypeCode(DocumentCodeType $documentCodeType): self
    {
        $this->documentCodeType = $documentCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType|null
     */
    public function getIssueDateTime(): ?DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\DateTimeType
     */
    public function getIssueDateTimeWithCreate(): DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\DateTimeType $dateTimeType
     * @return self
     */
    public function setIssueDateTime(DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType|null
     */
    public function getCopyIndicator(): ?IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     */
    public function getCopyIndicatorWithCreate(): IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IndicatorType $indicatorType
     * @return self
     */
    public function setCopyIndicator(IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getLanguageID(): ?IDType
    {
        return $this->languageID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getLanguageIDWithCreate(): IDType
    {
        $this->languageID = is_null($this->languageID) ? new IDType() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setLanguageID(IDType $idType): self
    {
        $this->languageID = $idType;

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
     * @return \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType|null
     */
    public function getEffectiveSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->specifiedPeriodType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType
     */
    public function getEffectiveSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->specifiedPeriodType = is_null($this->specifiedPeriodType) ? new SpecifiedPeriodType() : $this->specifiedPeriodType;

        return $this->specifiedPeriodType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\SpecifiedPeriodType $specifiedPeriodType
     * @return self
     */
    public function setEffectiveSpecifiedPeriod(SpecifiedPeriodType $specifiedPeriodType): self
    {
        $this->specifiedPeriodType = $specifiedPeriodType;

        return $this;
    }
}
