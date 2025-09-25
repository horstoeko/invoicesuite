<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity;

class EvaluationCriterionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("EvaluationCriterionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEvaluationCriterionTypeCode", setter="setEvaluationCriterionTypeCode")
     */
    private $evaluationCriterionTypeCode;

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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdAmount", setter="setThresholdAmount")
     */
    private $thresholdAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdQuantity", setter="setThresholdQuantity")
     */
    private $thresholdQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExpressionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpressionCode", setter="setExpressionCode")
     */
    private $expressionCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression>")
     * @JMS\Expose
     * @JMS\SerializedName("Expression")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Expression", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getExpression", setter="setExpression")
     */
    private $expression;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("DurationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDurationPeriod", setter="setDurationPeriod")
     */
    private $durationPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence>")
     * @JMS\Expose
     * @JMS\SerializedName("SuggestedEvidence")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SuggestedEvidence", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSuggestedEvidence", setter="setSuggestedEvidence")
     */
    private $suggestedEvidence;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode|null
     */
    public function getEvaluationCriterionTypeCode(): ?EvaluationCriterionTypeCode
    {
        return $this->evaluationCriterionTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode
     */
    public function getEvaluationCriterionTypeCodeWithCreate(): EvaluationCriterionTypeCode
    {
        $this->evaluationCriterionTypeCode = is_null($this->evaluationCriterionTypeCode) ? new EvaluationCriterionTypeCode() : $this->evaluationCriterionTypeCode;

        return $this->evaluationCriterionTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\EvaluationCriterionTypeCode|null $evaluationCriterionTypeCode
     * @return self
     */
    public function setEvaluationCriterionTypeCode(
        ?EvaluationCriterionTypeCode $evaluationCriterionTypeCode = null,
    ): self {
        $this->evaluationCriterionTypeCode = $evaluationCriterionTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEvaluationCriterionTypeCode(): self
    {
        $this->evaluationCriterionTypeCode = null;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount|null
     */
    public function getThresholdAmount(): ?ThresholdAmount
    {
        return $this->thresholdAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount
     */
    public function getThresholdAmountWithCreate(): ThresholdAmount
    {
        $this->thresholdAmount = is_null($this->thresholdAmount) ? new ThresholdAmount() : $this->thresholdAmount;

        return $this->thresholdAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdAmount|null $thresholdAmount
     * @return self
     */
    public function setThresholdAmount(?ThresholdAmount $thresholdAmount = null): self
    {
        $this->thresholdAmount = $thresholdAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetThresholdAmount(): self
    {
        $this->thresholdAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity|null
     */
    public function getThresholdQuantity(): ?ThresholdQuantity
    {
        return $this->thresholdQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity
     */
    public function getThresholdQuantityWithCreate(): ThresholdQuantity
    {
        $this->thresholdQuantity = is_null($this->thresholdQuantity) ? new ThresholdQuantity() : $this->thresholdQuantity;

        return $this->thresholdQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ThresholdQuantity|null $thresholdQuantity
     * @return self
     */
    public function setThresholdQuantity(?ThresholdQuantity $thresholdQuantity = null): self
    {
        $this->thresholdQuantity = $thresholdQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetThresholdQuantity(): self
    {
        $this->thresholdQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode|null
     */
    public function getExpressionCode(): ?ExpressionCode
    {
        return $this->expressionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode
     */
    public function getExpressionCodeWithCreate(): ExpressionCode
    {
        $this->expressionCode = is_null($this->expressionCode) ? new ExpressionCode() : $this->expressionCode;

        return $this->expressionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpressionCode|null $expressionCode
     * @return self
     */
    public function setExpressionCode(?ExpressionCode $expressionCode = null): self
    {
        $this->expressionCode = $expressionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpressionCode(): self
    {
        $this->expressionCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression>|null
     */
    public function getExpression(): ?array
    {
        return $this->expression;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression>|null $expression
     * @return self
     */
    public function setExpression(?array $expression = null): self
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpression(): self
    {
        $this->expression = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearExpression(): self
    {
        $this->expression = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression|null
     */
    public function firstExpression(): ?Expression
    {
        $expression = $this->expression ?? [];
        $expression = reset($expression);

        if ($expression === false) {
            return null;
        }

        return $expression;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression|null
     */
    public function lastExpression(): ?Expression
    {
        $expression = $this->expression ?? [];
        $expression = end($expression);

        if ($expression === false) {
            return null;
        }

        return $expression;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression $expression
     * @return self
     */
    public function addToExpression(Expression $expression): self
    {
        $this->expression[] = $expression;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression
     */
    public function addToExpressionWithCreate(): Expression
    {
        $this->addToexpression($expression = new Expression());

        return $expression;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression $expression
     * @return self
     */
    public function addOnceToExpression(Expression $expression): self
    {
        if (!is_array($this->expression)) {
            $this->expression = [];
        }

        $this->expression[0] = $expression;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Expression
     */
    public function addOnceToExpressionWithCreate(): Expression
    {
        if (!is_array($this->expression)) {
            $this->expression = [];
        }

        if ($this->expression === []) {
            $this->addOnceToexpression(new Expression());
        }

        return $this->expression[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null
     */
    public function getDurationPeriod(): ?DurationPeriod
    {
        return $this->durationPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod
     */
    public function getDurationPeriodWithCreate(): DurationPeriod
    {
        $this->durationPeriod = is_null($this->durationPeriod) ? new DurationPeriod() : $this->durationPeriod;

        return $this->durationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null $durationPeriod
     * @return self
     */
    public function setDurationPeriod(?DurationPeriod $durationPeriod = null): self
    {
        $this->durationPeriod = $durationPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDurationPeriod(): self
    {
        $this->durationPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence>|null
     */
    public function getSuggestedEvidence(): ?array
    {
        return $this->suggestedEvidence;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence>|null $suggestedEvidence
     * @return self
     */
    public function setSuggestedEvidence(?array $suggestedEvidence = null): self
    {
        $this->suggestedEvidence = $suggestedEvidence;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSuggestedEvidence(): self
    {
        $this->suggestedEvidence = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSuggestedEvidence(): self
    {
        $this->suggestedEvidence = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence|null
     */
    public function firstSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = reset($suggestedEvidence);

        if ($suggestedEvidence === false) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence|null
     */
    public function lastSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = end($suggestedEvidence);

        if ($suggestedEvidence === false) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence $suggestedEvidence
     * @return self
     */
    public function addToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): self
    {
        $this->suggestedEvidence[] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence
     */
    public function addToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        $this->addTosuggestedEvidence($suggestedEvidence = new SuggestedEvidence());

        return $suggestedEvidence;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence $suggestedEvidence
     * @return self
     */
    public function addOnceToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): self
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        $this->suggestedEvidence[0] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SuggestedEvidence
     */
    public function addOnceToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        if ($this->suggestedEvidence === []) {
            $this->addOnceTosuggestedEvidence(new SuggestedEvidence());
        }

        return $this->suggestedEvidence[0];
    }
}
