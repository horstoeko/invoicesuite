<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CollaborationPriorityCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ExceptionResolutionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ExceptionStatusCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PerformanceMetricTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SupplyChainActivityTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ThresholdQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ThresholdValueComparisonCode;
use JMS\Serializer\Annotation as JMS;

class ExceptionCriteriaLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|ThresholdValueComparisonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ThresholdValueComparisonCode")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdValueComparisonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdValueComparisonCode", setter="setThresholdValueComparisonCode")
     */
    private $thresholdValueComparisonCode;

    /**
     * @var null|ThresholdQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ThresholdQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdQuantity", setter="setThresholdQuantity")
     */
    private $thresholdQuantity;

    /**
     * @var null|ExceptionStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ExceptionStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExceptionStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExceptionStatusCode", setter="setExceptionStatusCode")
     */
    private $exceptionStatusCode;

    /**
     * @var null|CollaborationPriorityCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CollaborationPriorityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CollaborationPriorityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCollaborationPriorityCode", setter="setCollaborationPriorityCode")
     */
    private $collaborationPriorityCode;

    /**
     * @var null|ExceptionResolutionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ExceptionResolutionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExceptionResolutionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExceptionResolutionCode", setter="setExceptionResolutionCode")
     */
    private $exceptionResolutionCode;

    /**
     * @var null|SupplyChainActivityTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SupplyChainActivityTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainActivityTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainActivityTypeCode", setter="setSupplyChainActivityTypeCode")
     */
    private $supplyChainActivityTypeCode;

    /**
     * @var null|PerformanceMetricTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PerformanceMetricTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PerformanceMetricTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerformanceMetricTypeCode", setter="setPerformanceMetricTypeCode")
     */
    private $performanceMetricTypeCode;

    /**
     * @var null|EffectivePeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EffectivePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EffectivePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEffectivePeriod", setter="setEffectivePeriod")
     */
    private $effectivePeriod;

    /**
     * @var null|array<SupplyItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\SupplyItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupplyItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupplyItem", setter="setSupplyItem")
     */
    private $supplyItem;

    /**
     * @var null|ForecastExceptionCriterionLine
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ForecastExceptionCriterionLine")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastExceptionCriterionLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastExceptionCriterionLine", setter="setForecastExceptionCriterionLine")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
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
    public function setNote(?array $note = null): static
    {
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
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
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
            $this->addOnceTonote(new Note());
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
        $this->thresholdValueComparisonCode = is_null($this->thresholdValueComparisonCode) ? new ThresholdValueComparisonCode() : $this->thresholdValueComparisonCode;

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
        $this->thresholdQuantity = is_null($this->thresholdQuantity) ? new ThresholdQuantity() : $this->thresholdQuantity;

        return $this->thresholdQuantity;
    }

    /**
     * @param  null|ThresholdQuantity $thresholdQuantity
     * @return static
     */
    public function setThresholdQuantity(?ThresholdQuantity $thresholdQuantity = null): static
    {
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
        $this->exceptionStatusCode = is_null($this->exceptionStatusCode) ? new ExceptionStatusCode() : $this->exceptionStatusCode;

        return $this->exceptionStatusCode;
    }

    /**
     * @param  null|ExceptionStatusCode $exceptionStatusCode
     * @return static
     */
    public function setExceptionStatusCode(?ExceptionStatusCode $exceptionStatusCode = null): static
    {
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
        $this->collaborationPriorityCode = is_null($this->collaborationPriorityCode) ? new CollaborationPriorityCode() : $this->collaborationPriorityCode;

        return $this->collaborationPriorityCode;
    }

    /**
     * @param  null|CollaborationPriorityCode $collaborationPriorityCode
     * @return static
     */
    public function setCollaborationPriorityCode(?CollaborationPriorityCode $collaborationPriorityCode = null): static
    {
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
        $this->exceptionResolutionCode = is_null($this->exceptionResolutionCode) ? new ExceptionResolutionCode() : $this->exceptionResolutionCode;

        return $this->exceptionResolutionCode;
    }

    /**
     * @param  null|ExceptionResolutionCode $exceptionResolutionCode
     * @return static
     */
    public function setExceptionResolutionCode(?ExceptionResolutionCode $exceptionResolutionCode = null): static
    {
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
        $this->supplyChainActivityTypeCode = is_null($this->supplyChainActivityTypeCode) ? new SupplyChainActivityTypeCode() : $this->supplyChainActivityTypeCode;

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
        $this->performanceMetricTypeCode = is_null($this->performanceMetricTypeCode) ? new PerformanceMetricTypeCode() : $this->performanceMetricTypeCode;

        return $this->performanceMetricTypeCode;
    }

    /**
     * @param  null|PerformanceMetricTypeCode $performanceMetricTypeCode
     * @return static
     */
    public function setPerformanceMetricTypeCode(?PerformanceMetricTypeCode $performanceMetricTypeCode = null): static
    {
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
        $this->effectivePeriod = is_null($this->effectivePeriod) ? new EffectivePeriod() : $this->effectivePeriod;

        return $this->effectivePeriod;
    }

    /**
     * @param  null|EffectivePeriod $effectivePeriod
     * @return static
     */
    public function setEffectivePeriod(?EffectivePeriod $effectivePeriod = null): static
    {
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
    public function setSupplyItem(?array $supplyItem = null): static
    {
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
    public function addToSupplyItem(SupplyItem $supplyItem): static
    {
        $this->supplyItem[] = $supplyItem;

        return $this;
    }

    /**
     * @return SupplyItem
     */
    public function addToSupplyItemWithCreate(): SupplyItem
    {
        $this->addTosupplyItem($supplyItem = new SupplyItem());

        return $supplyItem;
    }

    /**
     * @param  SupplyItem $supplyItem
     * @return static
     */
    public function addOnceToSupplyItem(SupplyItem $supplyItem): static
    {
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
            $this->addOnceTosupplyItem(new SupplyItem());
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
        $this->forecastExceptionCriterionLine = is_null($this->forecastExceptionCriterionLine) ? new ForecastExceptionCriterionLine() : $this->forecastExceptionCriterionLine;

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
