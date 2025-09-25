<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Text;

class StatusType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConditionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConditionCode", setter="setConditionCode")
     */
    private $conditionCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceDate", setter="setReferenceDate")
     */
    private $referenceDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceTime", setter="setReferenceTime")
     */
    private $referenceTime;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("StatusReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStatusReasonCode", setter="setStatusReasonCode")
     */
    private $statusReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason>")
     * @JMS\Expose
     * @JMS\SerializedName("StatusReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="StatusReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getStatusReason", setter="setStatusReason")
     */
    private $statusReason;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceID", setter="setSequenceID")
     */
    private $sequenceID;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Text>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Text>")
     * @JMS\Expose
     * @JMS\SerializedName("Text")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Text", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getText", setter="setText")
     */
    private $text;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("IndicationIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIndicationIndicator", setter="setIndicationIndicator")
     */
    private $indicationIndicator;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent")
     * @JMS\Expose
     * @JMS\SerializedName("ReliabilityPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReliabilityPercent", setter="setReliabilityPercent")
     */
    private $reliabilityPercent;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Condition>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Condition>")
     * @JMS\Expose
     * @JMS\SerializedName("Condition")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Condition", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCondition", setter="setCondition")
     */
    private $condition;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode|null
     */
    public function getConditionCode(): ?ConditionCode
    {
        return $this->conditionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode
     */
    public function getConditionCodeWithCreate(): ConditionCode
    {
        $this->conditionCode = is_null($this->conditionCode) ? new ConditionCode() : $this->conditionCode;

        return $this->conditionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionCode|null $conditionCode
     * @return self
     */
    public function setConditionCode(?ConditionCode $conditionCode = null): self
    {
        $this->conditionCode = $conditionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConditionCode(): self
    {
        $this->conditionCode = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReferenceDate(): ?\DateTimeInterface
    {
        return $this->referenceDate;
    }

    /**
     * @param \DateTimeInterface|null $referenceDate
     * @return self
     */
    public function setReferenceDate(?\DateTimeInterface $referenceDate = null): self
    {
        $this->referenceDate = $referenceDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReferenceDate(): self
    {
        $this->referenceDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReferenceTime(): ?\DateTimeInterface
    {
        return $this->referenceTime;
    }

    /**
     * @param \DateTimeInterface|null $referenceTime
     * @return self
     */
    public function setReferenceTime(?\DateTimeInterface $referenceTime = null): self
    {
        $this->referenceTime = $referenceTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReferenceTime(): self
    {
        $this->referenceTime = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode|null
     */
    public function getStatusReasonCode(): ?StatusReasonCode
    {
        return $this->statusReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode
     */
    public function getStatusReasonCodeWithCreate(): StatusReasonCode
    {
        $this->statusReasonCode = is_null($this->statusReasonCode) ? new StatusReasonCode() : $this->statusReasonCode;

        return $this->statusReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReasonCode|null $statusReasonCode
     * @return self
     */
    public function setStatusReasonCode(?StatusReasonCode $statusReasonCode = null): self
    {
        $this->statusReasonCode = $statusReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStatusReasonCode(): self
    {
        $this->statusReasonCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason>|null
     */
    public function getStatusReason(): ?array
    {
        return $this->statusReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason>|null $statusReason
     * @return self
     */
    public function setStatusReason(?array $statusReason = null): self
    {
        $this->statusReason = $statusReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStatusReason(): self
    {
        $this->statusReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearStatusReason(): self
    {
        $this->statusReason = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason|null
     */
    public function firstStatusReason(): ?StatusReason
    {
        $statusReason = $this->statusReason ?? [];
        $statusReason = reset($statusReason);

        if ($statusReason === false) {
            return null;
        }

        return $statusReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason|null
     */
    public function lastStatusReason(): ?StatusReason
    {
        $statusReason = $this->statusReason ?? [];
        $statusReason = end($statusReason);

        if ($statusReason === false) {
            return null;
        }

        return $statusReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason $statusReason
     * @return self
     */
    public function addToStatusReason(StatusReason $statusReason): self
    {
        $this->statusReason[] = $statusReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason
     */
    public function addToStatusReasonWithCreate(): StatusReason
    {
        $this->addTostatusReason($statusReason = new StatusReason());

        return $statusReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason $statusReason
     * @return self
     */
    public function addOnceToStatusReason(StatusReason $statusReason): self
    {
        if (!is_array($this->statusReason)) {
            $this->statusReason = [];
        }

        $this->statusReason[0] = $statusReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\StatusReason
     */
    public function addOnceToStatusReasonWithCreate(): StatusReason
    {
        if (!is_array($this->statusReason)) {
            $this->statusReason = [];
        }

        if ($this->statusReason === []) {
            $this->addOnceTostatusReason(new StatusReason());
        }

        return $this->statusReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null
     */
    public function getSequenceID(): ?SequenceID
    {
        return $this->sequenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID
     */
    public function getSequenceIDWithCreate(): SequenceID
    {
        $this->sequenceID = is_null($this->sequenceID) ? new SequenceID() : $this->sequenceID;

        return $this->sequenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null $sequenceID
     * @return self
     */
    public function setSequenceID(?SequenceID $sequenceID = null): self
    {
        $this->sequenceID = $sequenceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSequenceID(): self
    {
        $this->sequenceID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Text>|null
     */
    public function getText(): ?array
    {
        return $this->text;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Text>|null $text
     * @return self
     */
    public function setText(?array $text = null): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetText(): self
    {
        $this->text = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearText(): self
    {
        $this->text = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text|null
     */
    public function firstText(): ?Text
    {
        $text = $this->text ?? [];
        $text = reset($text);

        if ($text === false) {
            return null;
        }

        return $text;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text|null
     */
    public function lastText(): ?Text
    {
        $text = $this->text ?? [];
        $text = end($text);

        if ($text === false) {
            return null;
        }

        return $text;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text $text
     * @return self
     */
    public function addToText(Text $text): self
    {
        $this->text[] = $text;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text
     */
    public function addToTextWithCreate(): Text
    {
        $this->addTotext($text = new Text());

        return $text;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text $text
     * @return self
     */
    public function addOnceToText(Text $text): self
    {
        if (!is_array($this->text)) {
            $this->text = [];
        }

        $this->text[0] = $text;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Text
     */
    public function addOnceToTextWithCreate(): Text
    {
        if (!is_array($this->text)) {
            $this->text = [];
        }

        if ($this->text === []) {
            $this->addOnceTotext(new Text());
        }

        return $this->text[0];
    }

    /**
     * @return bool|null
     */
    public function getIndicationIndicator(): ?bool
    {
        return $this->indicationIndicator;
    }

    /**
     * @param bool|null $indicationIndicator
     * @return self
     */
    public function setIndicationIndicator(?bool $indicationIndicator = null): self
    {
        $this->indicationIndicator = $indicationIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIndicationIndicator(): self
    {
        $this->indicationIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null $percent
     * @return self
     */
    public function setPercent(?Percent $percent = null): self
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPercent(): self
    {
        $this->percent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent|null
     */
    public function getReliabilityPercent(): ?ReliabilityPercent
    {
        return $this->reliabilityPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent
     */
    public function getReliabilityPercentWithCreate(): ReliabilityPercent
    {
        $this->reliabilityPercent = is_null($this->reliabilityPercent) ? new ReliabilityPercent() : $this->reliabilityPercent;

        return $this->reliabilityPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ReliabilityPercent|null $reliabilityPercent
     * @return self
     */
    public function setReliabilityPercent(?ReliabilityPercent $reliabilityPercent = null): self
    {
        $this->reliabilityPercent = $reliabilityPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReliabilityPercent(): self
    {
        $this->reliabilityPercent = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Condition>|null
     */
    public function getCondition(): ?array
    {
        return $this->condition;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Condition>|null $condition
     * @return self
     */
    public function setCondition(?array $condition = null): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCondition(): self
    {
        $this->condition = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCondition(): self
    {
        $this->condition = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition|null
     */
    public function firstCondition(): ?Condition
    {
        $condition = $this->condition ?? [];
        $condition = reset($condition);

        if ($condition === false) {
            return null;
        }

        return $condition;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition|null
     */
    public function lastCondition(): ?Condition
    {
        $condition = $this->condition ?? [];
        $condition = end($condition);

        if ($condition === false) {
            return null;
        }

        return $condition;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition $condition
     * @return self
     */
    public function addToCondition(Condition $condition): self
    {
        $this->condition[] = $condition;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition
     */
    public function addToConditionWithCreate(): Condition
    {
        $this->addTocondition($condition = new Condition());

        return $condition;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition $condition
     * @return self
     */
    public function addOnceToCondition(Condition $condition): self
    {
        if (!is_array($this->condition)) {
            $this->condition = [];
        }

        $this->condition[0] = $condition;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Condition
     */
    public function addOnceToConditionWithCreate(): Condition
    {
        if (!is_array($this->condition)) {
            $this->condition = [];
        }

        if ($this->condition === []) {
            $this->addOnceTocondition(new Condition());
        }

        return $this->condition[0];
    }
}
