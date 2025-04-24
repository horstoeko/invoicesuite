<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\IndicatorType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class ExchangedDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $documentCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssueDateTime", setter="setIssueDateTime")
     */
    private $dateTimeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\NoteType>
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\NoteType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedNote", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("EffectiveSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEffectiveSpecifiedPeriod", setter="setEffectiveSpecifiedPeriod")
     */
    private $specifiedPeriodType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->iD = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
    {
        return $this->documentCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
    {
        $this->documentCodeType = is_null($this->documentCodeType) ? new DocumentCodeType() : $this->documentCodeType;

        return $this->documentCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType $documentCodeType): self
    {
        $this->documentCodeType = $documentCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getIssueDateTime(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getIssueDateTimeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setIssueDateTime(\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType|null
     */
    public function getCopyIndicator(): ?\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     */
    public function getCopyIndicatorWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @return self
     */
    public function setCopyIndicator(\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getLanguageID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->languageID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getLanguageIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->languageID = is_null($this->languageID) ? new IDType() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setLanguageID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->languageID = $idType;

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

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType|null
     */
    public function getEffectiveSpecifiedPeriod(): ?\horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
    {
        return $this->specifiedPeriodType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     */
    public function getEffectiveSpecifiedPeriodWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType {
        $this->specifiedPeriodType = is_null($this->specifiedPeriodType) ? new SpecifiedPeriodType() : $this->specifiedPeriodType;

        return $this->specifiedPeriodType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType
     * @return self
     */
    public function setEffectiveSpecifiedPeriod(
        \horstoeko\invoicesuite\models\zugferd\ram\SpecifiedPeriodType $specifiedPeriodType,
    ): self {
        $this->specifiedPeriodType = $specifiedPeriodType;

        return $this;
    }
}
