<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\IndicatorType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class ExchangedDocumentType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|DocumentCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var null|DateTimeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssueDateTime", setter="setIssueDateTime")
     */
    private $issueDateTime;

    /**
     * @var null|IndicatorType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var null|IDType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var null|array<NoteType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\NoteType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedNote")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedNote", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedNote", setter="setIncludedNote")
     */
    private $includedNote;

    /**
     * @var null|SpecifiedPeriodType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\SpecifiedPeriodType")
     * @JMS\Expose
     * @JMS\SerializedName("EffectiveSpecifiedPeriod")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEffectiveSpecifiedPeriod", setter="setEffectiveSpecifiedPeriod")
     */
    private $effectiveSpecifiedPeriod;

    /**
     * @return null|IDType
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD = is_null($this->iD) ? new IDType() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(?IDType $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(?TextType $name = null): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|DocumentCodeType
     */
    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return DocumentCodeType
     */
    public function getTypeCodeWithCreate(): DocumentCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new DocumentCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param  null|DocumentCodeType $typeCode
     * @return static
     */
    public function setTypeCode(?DocumentCodeType $typeCode = null): static
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTypeCode(): static
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getIssueDateTime(): ?DateTimeType
    {
        return $this->issueDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getIssueDateTimeWithCreate(): DateTimeType
    {
        $this->issueDateTime = is_null($this->issueDateTime) ? new DateTimeType() : $this->issueDateTime;

        return $this->issueDateTime;
    }

    /**
     * @param  null|DateTimeType $issueDateTime
     * @return static
     */
    public function setIssueDateTime(?DateTimeType $issueDateTime = null): static
    {
        $this->issueDateTime = $issueDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDateTime(): static
    {
        $this->issueDateTime = null;

        return $this;
    }

    /**
     * @return null|IndicatorType
     */
    public function getCopyIndicator(): ?IndicatorType
    {
        return $this->copyIndicator;
    }

    /**
     * @return IndicatorType
     */
    public function getCopyIndicatorWithCreate(): IndicatorType
    {
        $this->copyIndicator = is_null($this->copyIndicator) ? new IndicatorType() : $this->copyIndicator;

        return $this->copyIndicator;
    }

    /**
     * @param  null|IndicatorType $copyIndicator
     * @return static
     */
    public function setCopyIndicator(?IndicatorType $copyIndicator = null): static
    {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCopyIndicator(): static
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getLanguageID(): ?IDType
    {
        return $this->languageID;
    }

    /**
     * @return IDType
     */
    public function getLanguageIDWithCreate(): IDType
    {
        $this->languageID = is_null($this->languageID) ? new IDType() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param  null|IDType $languageID
     * @return static
     */
    public function setLanguageID(?IDType $languageID = null): static
    {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguageID(): static
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return null|array<NoteType>
     */
    public function getIncludedNote(): ?array
    {
        return $this->includedNote;
    }

    /**
     * @param  null|array<NoteType> $includedNote
     * @return static
     */
    public function setIncludedNote(?array $includedNote = null): static
    {
        $this->includedNote = $includedNote;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedNote(): static
    {
        $this->includedNote = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIncludedNote(): static
    {
        $this->includedNote = [];

        return $this;
    }

    /**
     * @param  NoteType $includedNote
     * @return static
     */
    public function addToIncludedNote(NoteType $includedNote): static
    {
        $this->includedNote[] = $includedNote;

        return $this;
    }

    /**
     * @return NoteType
     */
    public function addToIncludedNoteWithCreate(): NoteType
    {
        $this->addToincludedNote($includedNote = new NoteType());

        return $includedNote;
    }

    /**
     * @param  NoteType $includedNote
     * @return static
     */
    public function addOnceToIncludedNote(NoteType $includedNote): static
    {
        if (!is_array($this->includedNote)) {
            $this->includedNote = [];
        }

        $this->includedNote[0] = $includedNote;

        return $this;
    }

    /**
     * @return NoteType
     */
    public function addOnceToIncludedNoteWithCreate(): NoteType
    {
        if (!is_array($this->includedNote)) {
            $this->includedNote = [];
        }

        if ([] === $this->includedNote) {
            $this->addOnceToincludedNote(new NoteType());
        }

        return $this->includedNote[0];
    }

    /**
     * @return null|SpecifiedPeriodType
     */
    public function getEffectiveSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->effectiveSpecifiedPeriod;
    }

    /**
     * @return SpecifiedPeriodType
     */
    public function getEffectiveSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->effectiveSpecifiedPeriod = is_null($this->effectiveSpecifiedPeriod) ? new SpecifiedPeriodType() : $this->effectiveSpecifiedPeriod;

        return $this->effectiveSpecifiedPeriod;
    }

    /**
     * @param  null|SpecifiedPeriodType $effectiveSpecifiedPeriod
     * @return static
     */
    public function setEffectiveSpecifiedPeriod(?SpecifiedPeriodType $effectiveSpecifiedPeriod = null): static
    {
        $this->effectiveSpecifiedPeriod = $effectiveSpecifiedPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEffectiveSpecifiedPeriod(): static
    {
        $this->effectiveSpecifiedPeriod = null;

        return $this;
    }
}
