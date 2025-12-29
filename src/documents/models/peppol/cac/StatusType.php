<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConditionCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Percent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReliabilityPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\StatusReason;
use horstoeko\invoicesuite\documents\models\peppol\cbc\StatusReasonCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Text;
use JMS\Serializer\Annotation as JMS;

class StatusType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConditionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConditionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConditionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConditionCode", setter="setConditionCode")
     */
    private $conditionCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceDate", setter="setReferenceDate")
     */
    private $referenceDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceTime", setter="setReferenceTime")
     */
    private $referenceTime;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|StatusReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\StatusReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("StatusReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStatusReasonCode", setter="setStatusReasonCode")
     */
    private $statusReasonCode;

    /**
     * @var null|array<StatusReason>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\StatusReason>")
     * @JMS\Expose
     * @JMS\SerializedName("StatusReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="StatusReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getStatusReason", setter="setStatusReason")
     */
    private $statusReason;

    /**
     * @var null|SequenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceID", setter="setSequenceID")
     */
    private $sequenceID;

    /**
     * @var null|array<Text>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Text>")
     * @JMS\Expose
     * @JMS\SerializedName("Text")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Text", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getText", setter="setText")
     */
    private $text;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("IndicationIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIndicationIndicator", setter="setIndicationIndicator")
     */
    private $indicationIndicator;

    /**
     * @var null|Percent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var null|ReliabilityPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ReliabilityPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ReliabilityPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReliabilityPercent", setter="setReliabilityPercent")
     */
    private $reliabilityPercent;

    /**
     * @var null|array<Condition>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Condition>")
     * @JMS\Expose
     * @JMS\SerializedName("Condition")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Condition", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCondition", setter="setCondition")
     */
    private $condition;

    /**
     * @return null|ConditionCode
     */
    public function getConditionCode(): ?ConditionCode
    {
        return $this->conditionCode;
    }

    /**
     * @return ConditionCode
     */
    public function getConditionCodeWithCreate(): ConditionCode
    {
        $this->conditionCode = is_null($this->conditionCode) ? new ConditionCode() : $this->conditionCode;

        return $this->conditionCode;
    }

    /**
     * @param  null|ConditionCode $conditionCode
     * @return static
     */
    public function setConditionCode(?ConditionCode $conditionCode = null): static
    {
        $this->conditionCode = $conditionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConditionCode(): static
    {
        $this->conditionCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getReferenceDate(): ?DateTimeInterface
    {
        return $this->referenceDate;
    }

    /**
     * @param  null|DateTimeInterface $referenceDate
     * @return static
     */
    public function setReferenceDate(?DateTimeInterface $referenceDate = null): static
    {
        $this->referenceDate = $referenceDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceDate(): static
    {
        $this->referenceDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getReferenceTime(): ?DateTimeInterface
    {
        return $this->referenceTime;
    }

    /**
     * @param  null|DateTimeInterface $referenceTime
     * @return static
     */
    public function setReferenceTime(?DateTimeInterface $referenceTime = null): static
    {
        $this->referenceTime = $referenceTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceTime(): static
    {
        $this->referenceTime = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|StatusReasonCode
     */
    public function getStatusReasonCode(): ?StatusReasonCode
    {
        return $this->statusReasonCode;
    }

    /**
     * @return StatusReasonCode
     */
    public function getStatusReasonCodeWithCreate(): StatusReasonCode
    {
        $this->statusReasonCode = is_null($this->statusReasonCode) ? new StatusReasonCode() : $this->statusReasonCode;

        return $this->statusReasonCode;
    }

    /**
     * @param  null|StatusReasonCode $statusReasonCode
     * @return static
     */
    public function setStatusReasonCode(?StatusReasonCode $statusReasonCode = null): static
    {
        $this->statusReasonCode = $statusReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatusReasonCode(): static
    {
        $this->statusReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<StatusReason>
     */
    public function getStatusReason(): ?array
    {
        return $this->statusReason;
    }

    /**
     * @param  null|array<StatusReason> $statusReason
     * @return static
     */
    public function setStatusReason(?array $statusReason = null): static
    {
        $this->statusReason = $statusReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatusReason(): static
    {
        $this->statusReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearStatusReason(): static
    {
        $this->statusReason = [];

        return $this;
    }

    /**
     * @return null|StatusReason
     */
    public function firstStatusReason(): ?StatusReason
    {
        $statusReason = $this->statusReason ?? [];
        $statusReason = reset($statusReason);

        if (false === $statusReason) {
            return null;
        }

        return $statusReason;
    }

    /**
     * @return null|StatusReason
     */
    public function lastStatusReason(): ?StatusReason
    {
        $statusReason = $this->statusReason ?? [];
        $statusReason = end($statusReason);

        if (false === $statusReason) {
            return null;
        }

        return $statusReason;
    }

    /**
     * @param  StatusReason $statusReason
     * @return static
     */
    public function addToStatusReason(StatusReason $statusReason): static
    {
        $this->statusReason[] = $statusReason;

        return $this;
    }

    /**
     * @return StatusReason
     */
    public function addToStatusReasonWithCreate(): StatusReason
    {
        $this->addTostatusReason($statusReason = new StatusReason());

        return $statusReason;
    }

    /**
     * @param  StatusReason $statusReason
     * @return static
     */
    public function addOnceToStatusReason(StatusReason $statusReason): static
    {
        if (!is_array($this->statusReason)) {
            $this->statusReason = [];
        }

        $this->statusReason[0] = $statusReason;

        return $this;
    }

    /**
     * @return StatusReason
     */
    public function addOnceToStatusReasonWithCreate(): StatusReason
    {
        if (!is_array($this->statusReason)) {
            $this->statusReason = [];
        }

        if ([] === $this->statusReason) {
            $this->addOnceTostatusReason(new StatusReason());
        }

        return $this->statusReason[0];
    }

    /**
     * @return null|SequenceID
     */
    public function getSequenceID(): ?SequenceID
    {
        return $this->sequenceID;
    }

    /**
     * @return SequenceID
     */
    public function getSequenceIDWithCreate(): SequenceID
    {
        $this->sequenceID = is_null($this->sequenceID) ? new SequenceID() : $this->sequenceID;

        return $this->sequenceID;
    }

    /**
     * @param  null|SequenceID $sequenceID
     * @return static
     */
    public function setSequenceID(?SequenceID $sequenceID = null): static
    {
        $this->sequenceID = $sequenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceID(): static
    {
        $this->sequenceID = null;

        return $this;
    }

    /**
     * @return null|array<Text>
     */
    public function getText(): ?array
    {
        return $this->text;
    }

    /**
     * @param  null|array<Text> $text
     * @return static
     */
    public function setText(?array $text = null): static
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetText(): static
    {
        $this->text = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearText(): static
    {
        $this->text = [];

        return $this;
    }

    /**
     * @return null|Text
     */
    public function firstText(): ?Text
    {
        $text = $this->text ?? [];
        $text = reset($text);

        if (false === $text) {
            return null;
        }

        return $text;
    }

    /**
     * @return null|Text
     */
    public function lastText(): ?Text
    {
        $text = $this->text ?? [];
        $text = end($text);

        if (false === $text) {
            return null;
        }

        return $text;
    }

    /**
     * @param  Text   $text
     * @return static
     */
    public function addToText(Text $text): static
    {
        $this->text[] = $text;

        return $this;
    }

    /**
     * @return Text
     */
    public function addToTextWithCreate(): Text
    {
        $this->addTotext($text = new Text());

        return $text;
    }

    /**
     * @param  Text   $text
     * @return static
     */
    public function addOnceToText(Text $text): static
    {
        if (!is_array($this->text)) {
            $this->text = [];
        }

        $this->text[0] = $text;

        return $this;
    }

    /**
     * @return Text
     */
    public function addOnceToTextWithCreate(): Text
    {
        if (!is_array($this->text)) {
            $this->text = [];
        }

        if ([] === $this->text) {
            $this->addOnceTotext(new Text());
        }

        return $this->text[0];
    }

    /**
     * @return null|bool
     */
    public function getIndicationIndicator(): ?bool
    {
        return $this->indicationIndicator;
    }

    /**
     * @param  null|bool $indicationIndicator
     * @return static
     */
    public function setIndicationIndicator(?bool $indicationIndicator = null): static
    {
        $this->indicationIndicator = $indicationIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIndicationIndicator(): static
    {
        $this->indicationIndicator = null;

        return $this;
    }

    /**
     * @return null|Percent
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param  null|Percent $percent
     * @return static
     */
    public function setPercent(?Percent $percent = null): static
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPercent(): static
    {
        $this->percent = null;

        return $this;
    }

    /**
     * @return null|ReliabilityPercent
     */
    public function getReliabilityPercent(): ?ReliabilityPercent
    {
        return $this->reliabilityPercent;
    }

    /**
     * @return ReliabilityPercent
     */
    public function getReliabilityPercentWithCreate(): ReliabilityPercent
    {
        $this->reliabilityPercent = is_null($this->reliabilityPercent) ? new ReliabilityPercent() : $this->reliabilityPercent;

        return $this->reliabilityPercent;
    }

    /**
     * @param  null|ReliabilityPercent $reliabilityPercent
     * @return static
     */
    public function setReliabilityPercent(?ReliabilityPercent $reliabilityPercent = null): static
    {
        $this->reliabilityPercent = $reliabilityPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReliabilityPercent(): static
    {
        $this->reliabilityPercent = null;

        return $this;
    }

    /**
     * @return null|array<Condition>
     */
    public function getCondition(): ?array
    {
        return $this->condition;
    }

    /**
     * @param  null|array<Condition> $condition
     * @return static
     */
    public function setCondition(?array $condition = null): static
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCondition(): static
    {
        $this->condition = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCondition(): static
    {
        $this->condition = [];

        return $this;
    }

    /**
     * @return null|Condition
     */
    public function firstCondition(): ?Condition
    {
        $condition = $this->condition ?? [];
        $condition = reset($condition);

        if (false === $condition) {
            return null;
        }

        return $condition;
    }

    /**
     * @return null|Condition
     */
    public function lastCondition(): ?Condition
    {
        $condition = $this->condition ?? [];
        $condition = end($condition);

        if (false === $condition) {
            return null;
        }

        return $condition;
    }

    /**
     * @param  Condition $condition
     * @return static
     */
    public function addToCondition(Condition $condition): static
    {
        $this->condition[] = $condition;

        return $this;
    }

    /**
     * @return Condition
     */
    public function addToConditionWithCreate(): Condition
    {
        $this->addTocondition($condition = new Condition());

        return $condition;
    }

    /**
     * @param  Condition $condition
     * @return static
     */
    public function addOnceToCondition(Condition $condition): static
    {
        if (!is_array($this->condition)) {
            $this->condition = [];
        }

        $this->condition[0] = $condition;

        return $this;
    }

    /**
     * @return Condition
     */
    public function addOnceToConditionWithCreate(): Condition
    {
        if (!is_array($this->condition)) {
            $this->condition = [];
        }

        if ([] === $this->condition) {
            $this->addOnceTocondition(new Condition());
        }

        return $this->condition[0];
    }
}
