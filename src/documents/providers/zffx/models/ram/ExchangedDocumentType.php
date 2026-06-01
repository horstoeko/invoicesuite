<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ExchangedDocumentType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $iD;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $name;

    /**
     * @var null|DocumentCodeType
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $typeCode;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getIssueDateTime', setter: 'setIssueDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IssueDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $issueDateTime;

    /**
     * @var null|IndicatorType
     */
    #[JMS\Accessor(getter: 'getCopyIndicator', setter: 'setCopyIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CopyIndicator')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $copyIndicator;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getLanguageID', setter: 'setLanguageID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LanguageID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $languageID;

    /**
     * @var null|array<NoteType>
     */
    #[JMS\Accessor(getter: 'getIncludedNote', setter: 'setIncludedNote')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedNote')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\NoteType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IncludedNote', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $includedNote;

    /**
     * @var null|SpecifiedPeriodType
     */
    #[JMS\Accessor(getter: 'getEffectiveSpecifiedPeriod', setter: 'setEffectiveSpecifiedPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('EffectiveSpecifiedPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\SpecifiedPeriodType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
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
        $this->iD ??= new IDType();

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(
        ?IDType $iD = null
    ): static {
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
        $this->name ??= new TextType();

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(
        ?TextType $name = null
    ): static {
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
        $this->typeCode ??= new DocumentCodeType();

        return $this->typeCode;
    }

    /**
     * @param  null|DocumentCodeType $typeCode
     * @return static
     */
    public function setTypeCode(
        ?DocumentCodeType $typeCode = null
    ): static {
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
        $this->issueDateTime ??= new DateTimeType();

        return $this->issueDateTime;
    }

    /**
     * @param  null|DateTimeType $issueDateTime
     * @return static
     */
    public function setIssueDateTime(
        ?DateTimeType $issueDateTime = null
    ): static {
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
        $this->copyIndicator ??= new IndicatorType();

        return $this->copyIndicator;
    }

    /**
     * @param  null|IndicatorType $copyIndicator
     * @return static
     */
    public function setCopyIndicator(
        ?IndicatorType $copyIndicator = null
    ): static {
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
        $this->languageID ??= new IDType();

        return $this->languageID;
    }

    /**
     * @param  null|IDType $languageID
     * @return static
     */
    public function setLanguageID(
        ?IDType $languageID = null
    ): static {
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
    public function setIncludedNote(
        ?array $includedNote = null
    ): static {
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
    public function addToIncludedNote(
        NoteType $includedNote
    ): static {
        $this->includedNote[] = $includedNote;

        return $this;
    }

    /**
     * @return NoteType
     */
    public function addToIncludedNoteWithCreate(): NoteType
    {
        $this->addToIncludedNote($includedNote = new NoteType());

        return $includedNote;
    }

    /**
     * @param  NoteType $includedNote
     * @return static
     */
    public function addOnceToIncludedNote(
        NoteType $includedNote
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->includedNote)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->includedNote)) {
            $this->includedNote = [];
        }

        if ([] === $this->includedNote) {
            $this->addOnceToIncludedNote(new NoteType());
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
        $this->effectiveSpecifiedPeriod ??= new SpecifiedPeriodType();

        return $this->effectiveSpecifiedPeriod;
    }

    /**
     * @param  null|SpecifiedPeriodType $effectiveSpecifiedPeriod
     * @return static
     */
    public function setEffectiveSpecifiedPeriod(
        ?SpecifiedPeriodType $effectiveSpecifiedPeriod = null
    ): static {
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
