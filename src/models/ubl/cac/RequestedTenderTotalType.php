<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount;
use horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount;
use horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope;
use horstoeko\invoicesuite\models\ubl\cbc\TotalAmount;

class RequestedTenderTotalType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedOverallContractAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedOverallContractAmount", setter="setEstimatedOverallContractAmount")
     */
    private $estimatedOverallContractAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalAmount", setter="setTotalAmount")
     */
    private $totalAmount;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxIncludedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxIncludedIndicator", setter="setTaxIncludedIndicator")
     */
    private $taxIncludedIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumAmount", setter="setMinimumAmount")
     */
    private $minimumAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumAmount", setter="setMaximumAmount")
     */
    private $maximumAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope>")
     * @JMS\Expose
     * @JMS\SerializedName("MonetaryScope")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MonetaryScope", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getMonetaryScope", setter="setMonetaryScope")
     */
    private $monetaryScope;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AverageSubsequentContractAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAverageSubsequentContractAmount", setter="setAverageSubsequentContractAmount")
     */
    private $averageSubsequentContractAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getApplicableTaxCategory", setter="setApplicableTaxCategory")
     */
    private $applicableTaxCategory;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount|null
     */
    public function getEstimatedOverallContractAmount(): ?EstimatedOverallContractAmount
    {
        return $this->estimatedOverallContractAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount
     */
    public function getEstimatedOverallContractAmountWithCreate(): EstimatedOverallContractAmount
    {
        $this->estimatedOverallContractAmount = is_null($this->estimatedOverallContractAmount) ? new EstimatedOverallContractAmount() : $this->estimatedOverallContractAmount;

        return $this->estimatedOverallContractAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EstimatedOverallContractAmount|null $estimatedOverallContractAmount
     * @return self
     */
    public function setEstimatedOverallContractAmount(
        ?EstimatedOverallContractAmount $estimatedOverallContractAmount = null,
    ): self {
        $this->estimatedOverallContractAmount = $estimatedOverallContractAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalAmount|null
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalAmount
     */
    public function getTotalAmountWithCreate(): TotalAmount
    {
        $this->totalAmount = is_null($this->totalAmount) ? new TotalAmount() : $this->totalAmount;

        return $this->totalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalAmount|null $totalAmount
     * @return self
     */
    public function setTotalAmount(?TotalAmount $totalAmount = null): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTaxIncludedIndicator(): ?bool
    {
        return $this->taxIncludedIndicator;
    }

    /**
     * @param bool|null $taxIncludedIndicator
     * @return self
     */
    public function setTaxIncludedIndicator(?bool $taxIncludedIndicator = null): self
    {
        $this->taxIncludedIndicator = $taxIncludedIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount|null
     */
    public function getMinimumAmount(): ?MinimumAmount
    {
        return $this->minimumAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount
     */
    public function getMinimumAmountWithCreate(): MinimumAmount
    {
        $this->minimumAmount = is_null($this->minimumAmount) ? new MinimumAmount() : $this->minimumAmount;

        return $this->minimumAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumAmount|null $minimumAmount
     * @return self
     */
    public function setMinimumAmount(?MinimumAmount $minimumAmount = null): self
    {
        $this->minimumAmount = $minimumAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount|null
     */
    public function getMaximumAmount(): ?MaximumAmount
    {
        return $this->maximumAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount
     */
    public function getMaximumAmountWithCreate(): MaximumAmount
    {
        $this->maximumAmount = is_null($this->maximumAmount) ? new MaximumAmount() : $this->maximumAmount;

        return $this->maximumAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumAmount|null $maximumAmount
     * @return self
     */
    public function setMaximumAmount(?MaximumAmount $maximumAmount = null): self
    {
        $this->maximumAmount = $maximumAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope>|null
     */
    public function getMonetaryScope(): ?array
    {
        return $this->monetaryScope;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope>|null $monetaryScope
     * @return self
     */
    public function setMonetaryScope(?array $monetaryScope = null): self
    {
        $this->monetaryScope = $monetaryScope;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMonetaryScope(): self
    {
        $this->monetaryScope = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope $monetaryScope
     * @return self
     */
    public function addToMonetaryScope(MonetaryScope $monetaryScope): self
    {
        $this->monetaryScope[] = $monetaryScope;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope
     */
    public function addToMonetaryScopeWithCreate(): MonetaryScope
    {
        $this->addTomonetaryScope($monetaryScope = new MonetaryScope());

        return $monetaryScope;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope $monetaryScope
     * @return self
     */
    public function addOnceToMonetaryScope(MonetaryScope $monetaryScope): self
    {
        if (!is_array($this->monetaryScope)) {
            $this->monetaryScope = [];
        }

        $this->monetaryScope[0] = $monetaryScope;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MonetaryScope
     */
    public function addOnceToMonetaryScopeWithCreate(): MonetaryScope
    {
        if (!is_array($this->monetaryScope)) {
            $this->monetaryScope = [];
        }

        if ($this->monetaryScope === []) {
            $this->addOnceTomonetaryScope(new MonetaryScope());
        }

        return $this->monetaryScope[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount|null
     */
    public function getAverageSubsequentContractAmount(): ?AverageSubsequentContractAmount
    {
        return $this->averageSubsequentContractAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount
     */
    public function getAverageSubsequentContractAmountWithCreate(): AverageSubsequentContractAmount
    {
        $this->averageSubsequentContractAmount = is_null($this->averageSubsequentContractAmount) ? new AverageSubsequentContractAmount() : $this->averageSubsequentContractAmount;

        return $this->averageSubsequentContractAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AverageSubsequentContractAmount|null $averageSubsequentContractAmount
     * @return self
     */
    public function setAverageSubsequentContractAmount(
        ?AverageSubsequentContractAmount $averageSubsequentContractAmount = null,
    ): self {
        $this->averageSubsequentContractAmount = $averageSubsequentContractAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null
     */
    public function getApplicableTaxCategory(): ?array
    {
        return $this->applicableTaxCategory;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null $applicableTaxCategory
     * @return self
     */
    public function setApplicableTaxCategory(?array $applicableTaxCategory = null): self
    {
        $this->applicableTaxCategory = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return self
     */
    public function clearApplicableTaxCategory(): self
    {
        $this->applicableTaxCategory = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory $applicableTaxCategory
     * @return self
     */
    public function addToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): self
    {
        $this->applicableTaxCategory[] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory
     */
    public function addToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        $this->addToapplicableTaxCategory($applicableTaxCategory = new ApplicableTaxCategory());

        return $applicableTaxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory $applicableTaxCategory
     * @return self
     */
    public function addOnceToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): self
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        $this->applicableTaxCategory[0] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory
     */
    public function addOnceToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        if ($this->applicableTaxCategory === []) {
            $this->addOnceToapplicableTaxCategory(new ApplicableTaxCategory());
        }

        return $this->applicableTaxCategory[0];
    }
}
