<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AwardingCriterionTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationExpression;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationExpressionCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumImprovementBid;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Weight;
use horstoeko\invoicesuite\documents\models\peppol\cbc\WeightNumeric;
use JMS\Serializer\Annotation as JMS;

class AwardingCriterionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|AwardingCriterionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AwardingCriterionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingCriterionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardingCriterionTypeCode", setter="setAwardingCriterionTypeCode")
     */
    private $awardingCriterionTypeCode;

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
     * @var null|WeightNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\WeightNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("WeightNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWeightNumeric", setter="setWeightNumeric")
     */
    private $weightNumeric;

    /**
     * @var null|array<Weight>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Weight>")
     * @JMS\Expose
     * @JMS\SerializedName("Weight")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Weight", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getWeight", setter="setWeight")
     */
    private $weight;

    /**
     * @var null|array<CalculationExpression>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationExpression>")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationExpression")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CalculationExpression", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getCalculationExpression", setter="setCalculationExpression")
     */
    private $calculationExpression;

    /**
     * @var null|CalculationExpressionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationExpressionCode")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationExpressionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationExpressionCode", setter="setCalculationExpressionCode")
     */
    private $calculationExpressionCode;

    /**
     * @var null|MinimumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var null|MaximumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var null|MinimumAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumAmount", setter="setMinimumAmount")
     */
    private $minimumAmount;

    /**
     * @var null|MaximumAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumAmount", setter="setMaximumAmount")
     */
    private $maximumAmount;

    /**
     * @var null|array<MinimumImprovementBid>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumImprovementBid>")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumImprovementBid")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MinimumImprovementBid", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getMinimumImprovementBid", setter="setMinimumImprovementBid")
     */
    private $minimumImprovementBid;

    /**
     * @var null|array<SubordinateAwardingCriterion>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SubordinateAwardingCriterion>")
     * @JMS\Expose
     * @JMS\SerializedName("SubordinateAwardingCriterion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SubordinateAwardingCriterion", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSubordinateAwardingCriterion", setter="setSubordinateAwardingCriterion")
     */
    private $subordinateAwardingCriterion;

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
     * @return null|AwardingCriterionTypeCode
     */
    public function getAwardingCriterionTypeCode(): ?AwardingCriterionTypeCode
    {
        return $this->awardingCriterionTypeCode;
    }

    /**
     * @return AwardingCriterionTypeCode
     */
    public function getAwardingCriterionTypeCodeWithCreate(): AwardingCriterionTypeCode
    {
        $this->awardingCriterionTypeCode = is_null($this->awardingCriterionTypeCode) ? new AwardingCriterionTypeCode() : $this->awardingCriterionTypeCode;

        return $this->awardingCriterionTypeCode;
    }

    /**
     * @param  null|AwardingCriterionTypeCode $awardingCriterionTypeCode
     * @return static
     */
    public function setAwardingCriterionTypeCode(?AwardingCriterionTypeCode $awardingCriterionTypeCode = null): static
    {
        $this->awardingCriterionTypeCode = $awardingCriterionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingCriterionTypeCode(): static
    {
        $this->awardingCriterionTypeCode = null;

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
     * @return null|WeightNumeric
     */
    public function getWeightNumeric(): ?WeightNumeric
    {
        return $this->weightNumeric;
    }

    /**
     * @return WeightNumeric
     */
    public function getWeightNumericWithCreate(): WeightNumeric
    {
        $this->weightNumeric = is_null($this->weightNumeric) ? new WeightNumeric() : $this->weightNumeric;

        return $this->weightNumeric;
    }

    /**
     * @param  null|WeightNumeric $weightNumeric
     * @return static
     */
    public function setWeightNumeric(?WeightNumeric $weightNumeric = null): static
    {
        $this->weightNumeric = $weightNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWeightNumeric(): static
    {
        $this->weightNumeric = null;

        return $this;
    }

    /**
     * @return null|array<Weight>
     */
    public function getWeight(): ?array
    {
        return $this->weight;
    }

    /**
     * @param  null|array<Weight> $weight
     * @return static
     */
    public function setWeight(?array $weight = null): static
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWeight(): static
    {
        $this->weight = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWeight(): static
    {
        $this->weight = [];

        return $this;
    }

    /**
     * @return null|Weight
     */
    public function firstWeight(): ?Weight
    {
        $weight = $this->weight ?? [];
        $weight = reset($weight);

        if (false === $weight) {
            return null;
        }

        return $weight;
    }

    /**
     * @return null|Weight
     */
    public function lastWeight(): ?Weight
    {
        $weight = $this->weight ?? [];
        $weight = end($weight);

        if (false === $weight) {
            return null;
        }

        return $weight;
    }

    /**
     * @param  Weight $weight
     * @return static
     */
    public function addToWeight(Weight $weight): static
    {
        $this->weight[] = $weight;

        return $this;
    }

    /**
     * @return Weight
     */
    public function addToWeightWithCreate(): Weight
    {
        $this->addToweight($weight = new Weight());

        return $weight;
    }

    /**
     * @param  Weight $weight
     * @return static
     */
    public function addOnceToWeight(Weight $weight): static
    {
        if (!is_array($this->weight)) {
            $this->weight = [];
        }

        $this->weight[0] = $weight;

        return $this;
    }

    /**
     * @return Weight
     */
    public function addOnceToWeightWithCreate(): Weight
    {
        if (!is_array($this->weight)) {
            $this->weight = [];
        }

        if ([] === $this->weight) {
            $this->addOnceToweight(new Weight());
        }

        return $this->weight[0];
    }

    /**
     * @return null|array<CalculationExpression>
     */
    public function getCalculationExpression(): ?array
    {
        return $this->calculationExpression;
    }

    /**
     * @param  null|array<CalculationExpression> $calculationExpression
     * @return static
     */
    public function setCalculationExpression(?array $calculationExpression = null): static
    {
        $this->calculationExpression = $calculationExpression;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationExpression(): static
    {
        $this->calculationExpression = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCalculationExpression(): static
    {
        $this->calculationExpression = [];

        return $this;
    }

    /**
     * @return null|CalculationExpression
     */
    public function firstCalculationExpression(): ?CalculationExpression
    {
        $calculationExpression = $this->calculationExpression ?? [];
        $calculationExpression = reset($calculationExpression);

        if (false === $calculationExpression) {
            return null;
        }

        return $calculationExpression;
    }

    /**
     * @return null|CalculationExpression
     */
    public function lastCalculationExpression(): ?CalculationExpression
    {
        $calculationExpression = $this->calculationExpression ?? [];
        $calculationExpression = end($calculationExpression);

        if (false === $calculationExpression) {
            return null;
        }

        return $calculationExpression;
    }

    /**
     * @param  CalculationExpression $calculationExpression
     * @return static
     */
    public function addToCalculationExpression(CalculationExpression $calculationExpression): static
    {
        $this->calculationExpression[] = $calculationExpression;

        return $this;
    }

    /**
     * @return CalculationExpression
     */
    public function addToCalculationExpressionWithCreate(): CalculationExpression
    {
        $this->addTocalculationExpression($calculationExpression = new CalculationExpression());

        return $calculationExpression;
    }

    /**
     * @param  CalculationExpression $calculationExpression
     * @return static
     */
    public function addOnceToCalculationExpression(CalculationExpression $calculationExpression): static
    {
        if (!is_array($this->calculationExpression)) {
            $this->calculationExpression = [];
        }

        $this->calculationExpression[0] = $calculationExpression;

        return $this;
    }

    /**
     * @return CalculationExpression
     */
    public function addOnceToCalculationExpressionWithCreate(): CalculationExpression
    {
        if (!is_array($this->calculationExpression)) {
            $this->calculationExpression = [];
        }

        if ([] === $this->calculationExpression) {
            $this->addOnceTocalculationExpression(new CalculationExpression());
        }

        return $this->calculationExpression[0];
    }

    /**
     * @return null|CalculationExpressionCode
     */
    public function getCalculationExpressionCode(): ?CalculationExpressionCode
    {
        return $this->calculationExpressionCode;
    }

    /**
     * @return CalculationExpressionCode
     */
    public function getCalculationExpressionCodeWithCreate(): CalculationExpressionCode
    {
        $this->calculationExpressionCode = is_null($this->calculationExpressionCode) ? new CalculationExpressionCode() : $this->calculationExpressionCode;

        return $this->calculationExpressionCode;
    }

    /**
     * @param  null|CalculationExpressionCode $calculationExpressionCode
     * @return static
     */
    public function setCalculationExpressionCode(?CalculationExpressionCode $calculationExpressionCode = null): static
    {
        $this->calculationExpressionCode = $calculationExpressionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationExpressionCode(): static
    {
        $this->calculationExpressionCode = null;

        return $this;
    }

    /**
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): static
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): static
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|MinimumAmount
     */
    public function getMinimumAmount(): ?MinimumAmount
    {
        return $this->minimumAmount;
    }

    /**
     * @return MinimumAmount
     */
    public function getMinimumAmountWithCreate(): MinimumAmount
    {
        $this->minimumAmount = is_null($this->minimumAmount) ? new MinimumAmount() : $this->minimumAmount;

        return $this->minimumAmount;
    }

    /**
     * @param  null|MinimumAmount $minimumAmount
     * @return static
     */
    public function setMinimumAmount(?MinimumAmount $minimumAmount = null): static
    {
        $this->minimumAmount = $minimumAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumAmount(): static
    {
        $this->minimumAmount = null;

        return $this;
    }

    /**
     * @return null|MaximumAmount
     */
    public function getMaximumAmount(): ?MaximumAmount
    {
        return $this->maximumAmount;
    }

    /**
     * @return MaximumAmount
     */
    public function getMaximumAmountWithCreate(): MaximumAmount
    {
        $this->maximumAmount = is_null($this->maximumAmount) ? new MaximumAmount() : $this->maximumAmount;

        return $this->maximumAmount;
    }

    /**
     * @param  null|MaximumAmount $maximumAmount
     * @return static
     */
    public function setMaximumAmount(?MaximumAmount $maximumAmount = null): static
    {
        $this->maximumAmount = $maximumAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumAmount(): static
    {
        $this->maximumAmount = null;

        return $this;
    }

    /**
     * @return null|array<MinimumImprovementBid>
     */
    public function getMinimumImprovementBid(): ?array
    {
        return $this->minimumImprovementBid;
    }

    /**
     * @param  null|array<MinimumImprovementBid> $minimumImprovementBid
     * @return static
     */
    public function setMinimumImprovementBid(?array $minimumImprovementBid = null): static
    {
        $this->minimumImprovementBid = $minimumImprovementBid;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumImprovementBid(): static
    {
        $this->minimumImprovementBid = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMinimumImprovementBid(): static
    {
        $this->minimumImprovementBid = [];

        return $this;
    }

    /**
     * @return null|MinimumImprovementBid
     */
    public function firstMinimumImprovementBid(): ?MinimumImprovementBid
    {
        $minimumImprovementBid = $this->minimumImprovementBid ?? [];
        $minimumImprovementBid = reset($minimumImprovementBid);

        if (false === $minimumImprovementBid) {
            return null;
        }

        return $minimumImprovementBid;
    }

    /**
     * @return null|MinimumImprovementBid
     */
    public function lastMinimumImprovementBid(): ?MinimumImprovementBid
    {
        $minimumImprovementBid = $this->minimumImprovementBid ?? [];
        $minimumImprovementBid = end($minimumImprovementBid);

        if (false === $minimumImprovementBid) {
            return null;
        }

        return $minimumImprovementBid;
    }

    /**
     * @param  MinimumImprovementBid $minimumImprovementBid
     * @return static
     */
    public function addToMinimumImprovementBid(MinimumImprovementBid $minimumImprovementBid): static
    {
        $this->minimumImprovementBid[] = $minimumImprovementBid;

        return $this;
    }

    /**
     * @return MinimumImprovementBid
     */
    public function addToMinimumImprovementBidWithCreate(): MinimumImprovementBid
    {
        $this->addTominimumImprovementBid($minimumImprovementBid = new MinimumImprovementBid());

        return $minimumImprovementBid;
    }

    /**
     * @param  MinimumImprovementBid $minimumImprovementBid
     * @return static
     */
    public function addOnceToMinimumImprovementBid(MinimumImprovementBid $minimumImprovementBid): static
    {
        if (!is_array($this->minimumImprovementBid)) {
            $this->minimumImprovementBid = [];
        }

        $this->minimumImprovementBid[0] = $minimumImprovementBid;

        return $this;
    }

    /**
     * @return MinimumImprovementBid
     */
    public function addOnceToMinimumImprovementBidWithCreate(): MinimumImprovementBid
    {
        if (!is_array($this->minimumImprovementBid)) {
            $this->minimumImprovementBid = [];
        }

        if ([] === $this->minimumImprovementBid) {
            $this->addOnceTominimumImprovementBid(new MinimumImprovementBid());
        }

        return $this->minimumImprovementBid[0];
    }

    /**
     * @return null|array<SubordinateAwardingCriterion>
     */
    public function getSubordinateAwardingCriterion(): ?array
    {
        return $this->subordinateAwardingCriterion;
    }

    /**
     * @param  null|array<SubordinateAwardingCriterion> $subordinateAwardingCriterion
     * @return static
     */
    public function setSubordinateAwardingCriterion(?array $subordinateAwardingCriterion = null): static
    {
        $this->subordinateAwardingCriterion = $subordinateAwardingCriterion;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubordinateAwardingCriterion(): static
    {
        $this->subordinateAwardingCriterion = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubordinateAwardingCriterion(): static
    {
        $this->subordinateAwardingCriterion = [];

        return $this;
    }

    /**
     * @return null|SubordinateAwardingCriterion
     */
    public function firstSubordinateAwardingCriterion(): ?SubordinateAwardingCriterion
    {
        $subordinateAwardingCriterion = $this->subordinateAwardingCriterion ?? [];
        $subordinateAwardingCriterion = reset($subordinateAwardingCriterion);

        if (false === $subordinateAwardingCriterion) {
            return null;
        }

        return $subordinateAwardingCriterion;
    }

    /**
     * @return null|SubordinateAwardingCriterion
     */
    public function lastSubordinateAwardingCriterion(): ?SubordinateAwardingCriterion
    {
        $subordinateAwardingCriterion = $this->subordinateAwardingCriterion ?? [];
        $subordinateAwardingCriterion = end($subordinateAwardingCriterion);

        if (false === $subordinateAwardingCriterion) {
            return null;
        }

        return $subordinateAwardingCriterion;
    }

    /**
     * @param  SubordinateAwardingCriterion $subordinateAwardingCriterion
     * @return static
     */
    public function addToSubordinateAwardingCriterion(
        SubordinateAwardingCriterion $subordinateAwardingCriterion,
    ): static {
        $this->subordinateAwardingCriterion[] = $subordinateAwardingCriterion;

        return $this;
    }

    /**
     * @return SubordinateAwardingCriterion
     */
    public function addToSubordinateAwardingCriterionWithCreate(): SubordinateAwardingCriterion
    {
        $this->addTosubordinateAwardingCriterion($subordinateAwardingCriterion = new SubordinateAwardingCriterion());

        return $subordinateAwardingCriterion;
    }

    /**
     * @param  SubordinateAwardingCriterion $subordinateAwardingCriterion
     * @return static
     */
    public function addOnceToSubordinateAwardingCriterion(
        SubordinateAwardingCriterion $subordinateAwardingCriterion,
    ): static {
        if (!is_array($this->subordinateAwardingCriterion)) {
            $this->subordinateAwardingCriterion = [];
        }

        $this->subordinateAwardingCriterion[0] = $subordinateAwardingCriterion;

        return $this;
    }

    /**
     * @return SubordinateAwardingCriterion
     */
    public function addOnceToSubordinateAwardingCriterionWithCreate(): SubordinateAwardingCriterion
    {
        if (!is_array($this->subordinateAwardingCriterion)) {
            $this->subordinateAwardingCriterion = [];
        }

        if ([] === $this->subordinateAwardingCriterion) {
            $this->addOnceTosubordinateAwardingCriterion(new SubordinateAwardingCriterion());
        }

        return $this->subordinateAwardingCriterion[0];
    }
}
