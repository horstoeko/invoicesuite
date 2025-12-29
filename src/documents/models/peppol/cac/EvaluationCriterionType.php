<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\EvaluationCriterionTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Expression;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ExpressionCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ThresholdAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ThresholdQuantity;
use JMS\Serializer\Annotation as JMS;

class EvaluationCriterionType
{
    use HandlesObjectFlags;

    /**
     * @var null|EvaluationCriterionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\EvaluationCriterionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("EvaluationCriterionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEvaluationCriterionTypeCode", setter="setEvaluationCriterionTypeCode")
     */
    private $evaluationCriterionTypeCode;

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
     * @var null|ThresholdAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ThresholdAmount")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdAmount", setter="setThresholdAmount")
     */
    private $thresholdAmount;

    /**
     * @var null|ThresholdQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ThresholdQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ThresholdQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThresholdQuantity", setter="setThresholdQuantity")
     */
    private $thresholdQuantity;

    /**
     * @var null|ExpressionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ExpressionCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExpressionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpressionCode", setter="setExpressionCode")
     */
    private $expressionCode;

    /**
     * @var null|array<Expression>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Expression>")
     * @JMS\Expose
     * @JMS\SerializedName("Expression")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Expression", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getExpression", setter="setExpression")
     */
    private $expression;

    /**
     * @var null|DurationPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DurationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("DurationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDurationPeriod", setter="setDurationPeriod")
     */
    private $durationPeriod;

    /**
     * @var null|array<SuggestedEvidence>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SuggestedEvidence>")
     * @JMS\Expose
     * @JMS\SerializedName("SuggestedEvidence")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SuggestedEvidence", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSuggestedEvidence", setter="setSuggestedEvidence")
     */
    private $suggestedEvidence;

    /**
     * @return null|EvaluationCriterionTypeCode
     */
    public function getEvaluationCriterionTypeCode(): ?EvaluationCriterionTypeCode
    {
        return $this->evaluationCriterionTypeCode;
    }

    /**
     * @return EvaluationCriterionTypeCode
     */
    public function getEvaluationCriterionTypeCodeWithCreate(): EvaluationCriterionTypeCode
    {
        $this->evaluationCriterionTypeCode = is_null($this->evaluationCriterionTypeCode) ? new EvaluationCriterionTypeCode() : $this->evaluationCriterionTypeCode;

        return $this->evaluationCriterionTypeCode;
    }

    /**
     * @param  null|EvaluationCriterionTypeCode $evaluationCriterionTypeCode
     * @return static
     */
    public function setEvaluationCriterionTypeCode(
        ?EvaluationCriterionTypeCode $evaluationCriterionTypeCode = null,
    ): static {
        $this->evaluationCriterionTypeCode = $evaluationCriterionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvaluationCriterionTypeCode(): static
    {
        $this->evaluationCriterionTypeCode = null;

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
     * @return null|ThresholdAmount
     */
    public function getThresholdAmount(): ?ThresholdAmount
    {
        return $this->thresholdAmount;
    }

    /**
     * @return ThresholdAmount
     */
    public function getThresholdAmountWithCreate(): ThresholdAmount
    {
        $this->thresholdAmount = is_null($this->thresholdAmount) ? new ThresholdAmount() : $this->thresholdAmount;

        return $this->thresholdAmount;
    }

    /**
     * @param  null|ThresholdAmount $thresholdAmount
     * @return static
     */
    public function setThresholdAmount(?ThresholdAmount $thresholdAmount = null): static
    {
        $this->thresholdAmount = $thresholdAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetThresholdAmount(): static
    {
        $this->thresholdAmount = null;

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
     * @return null|ExpressionCode
     */
    public function getExpressionCode(): ?ExpressionCode
    {
        return $this->expressionCode;
    }

    /**
     * @return ExpressionCode
     */
    public function getExpressionCodeWithCreate(): ExpressionCode
    {
        $this->expressionCode = is_null($this->expressionCode) ? new ExpressionCode() : $this->expressionCode;

        return $this->expressionCode;
    }

    /**
     * @param  null|ExpressionCode $expressionCode
     * @return static
     */
    public function setExpressionCode(?ExpressionCode $expressionCode = null): static
    {
        $this->expressionCode = $expressionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpressionCode(): static
    {
        $this->expressionCode = null;

        return $this;
    }

    /**
     * @return null|array<Expression>
     */
    public function getExpression(): ?array
    {
        return $this->expression;
    }

    /**
     * @param  null|array<Expression> $expression
     * @return static
     */
    public function setExpression(?array $expression = null): static
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpression(): static
    {
        $this->expression = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExpression(): static
    {
        $this->expression = [];

        return $this;
    }

    /**
     * @return null|Expression
     */
    public function firstExpression(): ?Expression
    {
        $expression = $this->expression ?? [];
        $expression = reset($expression);

        if (false === $expression) {
            return null;
        }

        return $expression;
    }

    /**
     * @return null|Expression
     */
    public function lastExpression(): ?Expression
    {
        $expression = $this->expression ?? [];
        $expression = end($expression);

        if (false === $expression) {
            return null;
        }

        return $expression;
    }

    /**
     * @param  Expression $expression
     * @return static
     */
    public function addToExpression(Expression $expression): static
    {
        $this->expression[] = $expression;

        return $this;
    }

    /**
     * @return Expression
     */
    public function addToExpressionWithCreate(): Expression
    {
        $this->addToexpression($expression = new Expression());

        return $expression;
    }

    /**
     * @param  Expression $expression
     * @return static
     */
    public function addOnceToExpression(Expression $expression): static
    {
        if (!is_array($this->expression)) {
            $this->expression = [];
        }

        $this->expression[0] = $expression;

        return $this;
    }

    /**
     * @return Expression
     */
    public function addOnceToExpressionWithCreate(): Expression
    {
        if (!is_array($this->expression)) {
            $this->expression = [];
        }

        if ([] === $this->expression) {
            $this->addOnceToexpression(new Expression());
        }

        return $this->expression[0];
    }

    /**
     * @return null|DurationPeriod
     */
    public function getDurationPeriod(): ?DurationPeriod
    {
        return $this->durationPeriod;
    }

    /**
     * @return DurationPeriod
     */
    public function getDurationPeriodWithCreate(): DurationPeriod
    {
        $this->durationPeriod = is_null($this->durationPeriod) ? new DurationPeriod() : $this->durationPeriod;

        return $this->durationPeriod;
    }

    /**
     * @param  null|DurationPeriod $durationPeriod
     * @return static
     */
    public function setDurationPeriod(?DurationPeriod $durationPeriod = null): static
    {
        $this->durationPeriod = $durationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDurationPeriod(): static
    {
        $this->durationPeriod = null;

        return $this;
    }

    /**
     * @return null|array<SuggestedEvidence>
     */
    public function getSuggestedEvidence(): ?array
    {
        return $this->suggestedEvidence;
    }

    /**
     * @param  null|array<SuggestedEvidence> $suggestedEvidence
     * @return static
     */
    public function setSuggestedEvidence(?array $suggestedEvidence = null): static
    {
        $this->suggestedEvidence = $suggestedEvidence;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSuggestedEvidence(): static
    {
        $this->suggestedEvidence = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSuggestedEvidence(): static
    {
        $this->suggestedEvidence = [];

        return $this;
    }

    /**
     * @return null|SuggestedEvidence
     */
    public function firstSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = reset($suggestedEvidence);

        if (false === $suggestedEvidence) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @return null|SuggestedEvidence
     */
    public function lastSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = end($suggestedEvidence);

        if (false === $suggestedEvidence) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @param  SuggestedEvidence $suggestedEvidence
     * @return static
     */
    public function addToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): static
    {
        $this->suggestedEvidence[] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return SuggestedEvidence
     */
    public function addToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        $this->addTosuggestedEvidence($suggestedEvidence = new SuggestedEvidence());

        return $suggestedEvidence;
    }

    /**
     * @param  SuggestedEvidence $suggestedEvidence
     * @return static
     */
    public function addOnceToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): static
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        $this->suggestedEvidence[0] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return SuggestedEvidence
     */
    public function addOnceToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        if ([] === $this->suggestedEvidence) {
            $this->addOnceTosuggestedEvidence(new SuggestedEvidence());
        }

        return $this->suggestedEvidence[0];
    }
}
