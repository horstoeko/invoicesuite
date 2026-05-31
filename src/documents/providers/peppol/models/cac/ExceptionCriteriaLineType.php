<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CollaborationPriorityCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionResolutionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ThresholdQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ThresholdValueComparisonCode;
use JMS\Serializer\Annotation as JMS;

class ExceptionCriteriaLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|ThresholdValueComparisonCode
     */
    #[JMS\Accessor(getter: 'getThresholdValueComparisonCode', setter: 'setThresholdValueComparisonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ThresholdValueComparisonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ThresholdValueComparisonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $thresholdValueComparisonCode;

    /**
     * @var null|ThresholdQuantity
     */
    #[JMS\Accessor(getter: 'getThresholdQuantity', setter: 'setThresholdQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ThresholdQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ThresholdQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $thresholdQuantity;

    /**
     * @var null|ExceptionStatusCode
     */
    #[JMS\Accessor(getter: 'getExceptionStatusCode', setter: 'setExceptionStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExceptionStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $exceptionStatusCode;

    /**
     * @var null|CollaborationPriorityCode
     */
    #[JMS\Accessor(getter: 'getCollaborationPriorityCode', setter: 'setCollaborationPriorityCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CollaborationPriorityCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CollaborationPriorityCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $collaborationPriorityCode;

    /**
     * @var null|ExceptionResolutionCode
     */
    #[JMS\Accessor(getter: 'getExceptionResolutionCode', setter: 'setExceptionResolutionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExceptionResolutionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionResolutionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $exceptionResolutionCode;

    /**
     * @var null|SupplyChainActivityTypeCode
     */
    #[JMS\Accessor(getter: 'getSupplyChainActivityTypeCode', setter: 'setSupplyChainActivityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyChainActivityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $supplyChainActivityTypeCode;

    /**
     * @var null|PerformanceMetricTypeCode
     */
    #[JMS\Accessor(getter: 'getPerformanceMetricTypeCode', setter: 'setPerformanceMetricTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerformanceMetricTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $performanceMetricTypeCode;

    /**
     * @var null|EffectivePeriod
     */
    #[JMS\Accessor(getter: 'getEffectivePeriod', setter: 'setEffectivePeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EffectivePeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EffectivePeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $effectivePeriod;

    /**
     * @var null|array<SupplyItem>
     */
    #[JMS\Accessor(getter: 'getSupplyItem', setter: 'setSupplyItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SupplyItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SupplyItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $supplyItem;

    /**
     * @var null|ForecastExceptionCriterionLine
     */
    #[JMS\Accessor(getter: 'getForecastExceptionCriterionLine', setter: 'setForecastExceptionCriterionLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastExceptionCriterionLine')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ForecastExceptionCriterionLine')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $forecastExceptionCriterionLine;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
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
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(
        ?array $note = null
    ): static {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|ThresholdValueComparisonCode
     */
    public function getThresholdValueComparisonCode(): ?ThresholdValueComparisonCode
    {
        return $this->thresholdValueComparisonCode;
    }

    /**
     * @return ThresholdValueComparisonCode
     */
    public function getThresholdValueComparisonCodeWithCreate(): ThresholdValueComparisonCode
    {
        $this->thresholdValueComparisonCode ??= new ThresholdValueComparisonCode();

        return $this->thresholdValueComparisonCode;
    }

    /**
     * @param  null|ThresholdValueComparisonCode $thresholdValueComparisonCode
     * @return static
     */
    public function setThresholdValueComparisonCode(
        ?ThresholdValueComparisonCode $thresholdValueComparisonCode = null,
    ): static {
        $this->thresholdValueComparisonCode = $thresholdValueComparisonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetThresholdValueComparisonCode(): static
    {
        $this->thresholdValueComparisonCode = null;

        return $this;
    }

    /**
     * @return null|ThresholdQuantity
     */
    public function getThresholdQuantity(): ?ThresholdQuantity
    {
        return $this->thresholdQuantity;
    }

    /**
     * @return ThresholdQuantity
     */
    public function getThresholdQuantityWithCreate(): ThresholdQuantity
    {
        $this->thresholdQuantity ??= new ThresholdQuantity();

        return $this->thresholdQuantity;
    }

    /**
     * @param  null|ThresholdQuantity $thresholdQuantity
     * @return static
     */
    public function setThresholdQuantity(
        ?ThresholdQuantity $thresholdQuantity = null
    ): static {
        $this->thresholdQuantity = $thresholdQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetThresholdQuantity(): static
    {
        $this->thresholdQuantity = null;

        return $this;
    }

    /**
     * @return null|ExceptionStatusCode
     */
    public function getExceptionStatusCode(): ?ExceptionStatusCode
    {
        return $this->exceptionStatusCode;
    }

    /**
     * @return ExceptionStatusCode
     */
    public function getExceptionStatusCodeWithCreate(): ExceptionStatusCode
    {
        $this->exceptionStatusCode ??= new ExceptionStatusCode();

        return $this->exceptionStatusCode;
    }

    /**
     * @param  null|ExceptionStatusCode $exceptionStatusCode
     * @return static
     */
    public function setExceptionStatusCode(
        ?ExceptionStatusCode $exceptionStatusCode = null
    ): static {
        $this->exceptionStatusCode = $exceptionStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExceptionStatusCode(): static
    {
        $this->exceptionStatusCode = null;

        return $this;
    }

    /**
     * @return null|CollaborationPriorityCode
     */
    public function getCollaborationPriorityCode(): ?CollaborationPriorityCode
    {
        return $this->collaborationPriorityCode;
    }

    /**
     * @return CollaborationPriorityCode
     */
    public function getCollaborationPriorityCodeWithCreate(): CollaborationPriorityCode
    {
        $this->collaborationPriorityCode ??= new CollaborationPriorityCode();

        return $this->collaborationPriorityCode;
    }

    /**
     * @param  null|CollaborationPriorityCode $collaborationPriorityCode
     * @return static
     */
    public function setCollaborationPriorityCode(
        ?CollaborationPriorityCode $collaborationPriorityCode = null
    ): static {
        $this->collaborationPriorityCode = $collaborationPriorityCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCollaborationPriorityCode(): static
    {
        $this->collaborationPriorityCode = null;

        return $this;
    }

    /**
     * @return null|ExceptionResolutionCode
     */
    public function getExceptionResolutionCode(): ?ExceptionResolutionCode
    {
        return $this->exceptionResolutionCode;
    }

    /**
     * @return ExceptionResolutionCode
     */
    public function getExceptionResolutionCodeWithCreate(): ExceptionResolutionCode
    {
        $this->exceptionResolutionCode ??= new ExceptionResolutionCode();

        return $this->exceptionResolutionCode;
    }

    /**
     * @param  null|ExceptionResolutionCode $exceptionResolutionCode
     * @return static
     */
    public function setExceptionResolutionCode(
        ?ExceptionResolutionCode $exceptionResolutionCode = null
    ): static {
        $this->exceptionResolutionCode = $exceptionResolutionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExceptionResolutionCode(): static
    {
        $this->exceptionResolutionCode = null;

        return $this;
    }

    /**
     * @return null|SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode ??= new SupplyChainActivityTypeCode();

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param  null|SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     * @return static
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): static {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyChainActivityTypeCode(): static
    {
        $this->supplyChainActivityTypeCode = null;

        return $this;
    }

    /**
     * @return null|PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCode(): ?PerformanceMetricTypeCode
    {
        return $this->performanceMetricTypeCode;
    }

    /**
     * @return PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCodeWithCreate(): PerformanceMetricTypeCode
    {
        $this->performanceMetricTypeCode ??= new PerformanceMetricTypeCode();

        return $this->performanceMetricTypeCode;
    }

    /**
     * @param  null|PerformanceMetricTypeCode $performanceMetricTypeCode
     * @return static
     */
    public function setPerformanceMetricTypeCode(
        ?PerformanceMetricTypeCode $performanceMetricTypeCode = null
    ): static {
        $this->performanceMetricTypeCode = $performanceMetricTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerformanceMetricTypeCode(): static
    {
        $this->performanceMetricTypeCode = null;

        return $this;
    }

    /**
     * @return null|EffectivePeriod
     */
    public function getEffectivePeriod(): ?EffectivePeriod
    {
        return $this->effectivePeriod;
    }

    /**
     * @return EffectivePeriod
     */
    public function getEffectivePeriodWithCreate(): EffectivePeriod
    {
        $this->effectivePeriod ??= new EffectivePeriod();

        return $this->effectivePeriod;
    }

    /**
     * @param  null|EffectivePeriod $effectivePeriod
     * @return static
     */
    public function setEffectivePeriod(
        ?EffectivePeriod $effectivePeriod = null
    ): static {
        $this->effectivePeriod = $effectivePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEffectivePeriod(): static
    {
        $this->effectivePeriod = null;

        return $this;
    }

    /**
     * @return null|array<SupplyItem>
     */
    public function getSupplyItem(): ?array
    {
        return $this->supplyItem;
    }

    /**
     * @param  null|array<SupplyItem> $supplyItem
     * @return static
     */
    public function setSupplyItem(
        ?array $supplyItem = null
    ): static {
        $this->supplyItem = $supplyItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyItem(): static
    {
        $this->supplyItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSupplyItem(): static
    {
        $this->supplyItem = [];

        return $this;
    }

    /**
     * @return null|SupplyItem
     */
    public function firstSupplyItem(): ?SupplyItem
    {
        $supplyItem = $this->supplyItem ?? [];
        $supplyItem = reset($supplyItem);

        if (false === $supplyItem) {
            return null;
        }

        return $supplyItem;
    }

    /**
     * @return null|SupplyItem
     */
    public function lastSupplyItem(): ?SupplyItem
    {
        $supplyItem = $this->supplyItem ?? [];
        $supplyItem = end($supplyItem);

        if (false === $supplyItem) {
            return null;
        }

        return $supplyItem;
    }

    /**
     * @param  SupplyItem $supplyItem
     * @return static
     */
    public function addToSupplyItem(
        SupplyItem $supplyItem
    ): static {
        $this->supplyItem[] = $supplyItem;

        return $this;
    }

    /**
     * @return SupplyItem
     */
    public function addToSupplyItemWithCreate(): SupplyItem
    {
        $this->addToSupplyItem($supplyItem = new SupplyItem());

        return $supplyItem;
    }

    /**
     * @param  SupplyItem $supplyItem
     * @return static
     */
    public function addOnceToSupplyItem(
        SupplyItem $supplyItem
    ): static {
        if (!is_array($this->supplyItem)) {
            $this->supplyItem = [];
        }

        $this->supplyItem[0] = $supplyItem;

        return $this;
    }

    /**
     * @return SupplyItem
     */
    public function addOnceToSupplyItemWithCreate(): SupplyItem
    {
        if (!is_array($this->supplyItem)) {
            $this->supplyItem = [];
        }

        if ([] === $this->supplyItem) {
            $this->addOnceToSupplyItem(new SupplyItem());
        }

        return $this->supplyItem[0];
    }

    /**
     * @return null|ForecastExceptionCriterionLine
     */
    public function getForecastExceptionCriterionLine(): ?ForecastExceptionCriterionLine
    {
        return $this->forecastExceptionCriterionLine;
    }

    /**
     * @return ForecastExceptionCriterionLine
     */
    public function getForecastExceptionCriterionLineWithCreate(): ForecastExceptionCriterionLine
    {
        $this->forecastExceptionCriterionLine ??= new ForecastExceptionCriterionLine();

        return $this->forecastExceptionCriterionLine;
    }

    /**
     * @param  null|ForecastExceptionCriterionLine $forecastExceptionCriterionLine
     * @return static
     */
    public function setForecastExceptionCriterionLine(
        ?ForecastExceptionCriterionLine $forecastExceptionCriterionLine = null,
    ): static {
        $this->forecastExceptionCriterionLine = $forecastExceptionCriterionLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastExceptionCriterionLine(): static
    {
        $this->forecastExceptionCriterionLine = null;

        return $this;
    }
}
