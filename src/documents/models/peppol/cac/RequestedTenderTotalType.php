<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AverageSubsequentContractAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\EstimatedOverallContractAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MinimumAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MonetaryScope;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalAmount;
use JMS\Serializer\Annotation as JMS;

class RequestedTenderTotalType
{
    use HandlesObjectFlags;

    /**
     * @var null|EstimatedOverallContractAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\EstimatedOverallContractAmount")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedOverallContractAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedOverallContractAmount", setter="setEstimatedOverallContractAmount")
     */
    private $estimatedOverallContractAmount;

    /**
     * @var null|TotalAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalAmount", setter="setTotalAmount")
     */
    private $totalAmount;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("TaxIncludedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxIncludedIndicator", setter="setTaxIncludedIndicator")
     */
    private $taxIncludedIndicator;

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
     * @var null|array<MonetaryScope>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\MonetaryScope>")
     * @JMS\Expose
     * @JMS\SerializedName("MonetaryScope")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MonetaryScope", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getMonetaryScope", setter="setMonetaryScope")
     */
    private $monetaryScope;

    /**
     * @var null|AverageSubsequentContractAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AverageSubsequentContractAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AverageSubsequentContractAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAverageSubsequentContractAmount", setter="setAverageSubsequentContractAmount")
     */
    private $averageSubsequentContractAmount;

    /**
     * @var null|array<ApplicableTaxCategory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ApplicableTaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getApplicableTaxCategory", setter="setApplicableTaxCategory")
     */
    private $applicableTaxCategory;

    /**
     * @return null|EstimatedOverallContractAmount
     */
    public function getEstimatedOverallContractAmount(): ?EstimatedOverallContractAmount
    {
        return $this->estimatedOverallContractAmount;
    }

    /**
     * @return EstimatedOverallContractAmount
     */
    public function getEstimatedOverallContractAmountWithCreate(): EstimatedOverallContractAmount
    {
        $this->estimatedOverallContractAmount = is_null($this->estimatedOverallContractAmount) ? new EstimatedOverallContractAmount() : $this->estimatedOverallContractAmount;

        return $this->estimatedOverallContractAmount;
    }

    /**
     * @param  null|EstimatedOverallContractAmount $estimatedOverallContractAmount
     * @return static
     */
    public function setEstimatedOverallContractAmount(
        ?EstimatedOverallContractAmount $estimatedOverallContractAmount = null,
    ): static {
        $this->estimatedOverallContractAmount = $estimatedOverallContractAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedOverallContractAmount(): static
    {
        $this->estimatedOverallContractAmount = null;

        return $this;
    }

    /**
     * @return null|TotalAmount
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return TotalAmount
     */
    public function getTotalAmountWithCreate(): TotalAmount
    {
        $this->totalAmount = is_null($this->totalAmount) ? new TotalAmount() : $this->totalAmount;

        return $this->totalAmount;
    }

    /**
     * @param  null|TotalAmount $totalAmount
     * @return static
     */
    public function setTotalAmount(?TotalAmount $totalAmount = null): static
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalAmount(): static
    {
        $this->totalAmount = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getTaxIncludedIndicator(): ?bool
    {
        return $this->taxIncludedIndicator;
    }

    /**
     * @param  null|bool $taxIncludedIndicator
     * @return static
     */
    public function setTaxIncludedIndicator(?bool $taxIncludedIndicator = null): static
    {
        $this->taxIncludedIndicator = $taxIncludedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxIncludedIndicator(): static
    {
        $this->taxIncludedIndicator = null;

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
     * @return null|array<MonetaryScope>
     */
    public function getMonetaryScope(): ?array
    {
        return $this->monetaryScope;
    }

    /**
     * @param  null|array<MonetaryScope> $monetaryScope
     * @return static
     */
    public function setMonetaryScope(?array $monetaryScope = null): static
    {
        $this->monetaryScope = $monetaryScope;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMonetaryScope(): static
    {
        $this->monetaryScope = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMonetaryScope(): static
    {
        $this->monetaryScope = [];

        return $this;
    }

    /**
     * @return null|MonetaryScope
     */
    public function firstMonetaryScope(): ?MonetaryScope
    {
        $monetaryScope = $this->monetaryScope ?? [];
        $monetaryScope = reset($monetaryScope);

        if (false === $monetaryScope) {
            return null;
        }

        return $monetaryScope;
    }

    /**
     * @return null|MonetaryScope
     */
    public function lastMonetaryScope(): ?MonetaryScope
    {
        $monetaryScope = $this->monetaryScope ?? [];
        $monetaryScope = end($monetaryScope);

        if (false === $monetaryScope) {
            return null;
        }

        return $monetaryScope;
    }

    /**
     * @param  MonetaryScope $monetaryScope
     * @return static
     */
    public function addToMonetaryScope(MonetaryScope $monetaryScope): static
    {
        $this->monetaryScope[] = $monetaryScope;

        return $this;
    }

    /**
     * @return MonetaryScope
     */
    public function addToMonetaryScopeWithCreate(): MonetaryScope
    {
        $this->addTomonetaryScope($monetaryScope = new MonetaryScope());

        return $monetaryScope;
    }

    /**
     * @param  MonetaryScope $monetaryScope
     * @return static
     */
    public function addOnceToMonetaryScope(MonetaryScope $monetaryScope): static
    {
        if (!is_array($this->monetaryScope)) {
            $this->monetaryScope = [];
        }

        $this->monetaryScope[0] = $monetaryScope;

        return $this;
    }

    /**
     * @return MonetaryScope
     */
    public function addOnceToMonetaryScopeWithCreate(): MonetaryScope
    {
        if (!is_array($this->monetaryScope)) {
            $this->monetaryScope = [];
        }

        if ([] === $this->monetaryScope) {
            $this->addOnceTomonetaryScope(new MonetaryScope());
        }

        return $this->monetaryScope[0];
    }

    /**
     * @return null|AverageSubsequentContractAmount
     */
    public function getAverageSubsequentContractAmount(): ?AverageSubsequentContractAmount
    {
        return $this->averageSubsequentContractAmount;
    }

    /**
     * @return AverageSubsequentContractAmount
     */
    public function getAverageSubsequentContractAmountWithCreate(): AverageSubsequentContractAmount
    {
        $this->averageSubsequentContractAmount = is_null($this->averageSubsequentContractAmount) ? new AverageSubsequentContractAmount() : $this->averageSubsequentContractAmount;

        return $this->averageSubsequentContractAmount;
    }

    /**
     * @param  null|AverageSubsequentContractAmount $averageSubsequentContractAmount
     * @return static
     */
    public function setAverageSubsequentContractAmount(
        ?AverageSubsequentContractAmount $averageSubsequentContractAmount = null,
    ): static {
        $this->averageSubsequentContractAmount = $averageSubsequentContractAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAverageSubsequentContractAmount(): static
    {
        $this->averageSubsequentContractAmount = null;

        return $this;
    }

    /**
     * @return null|array<ApplicableTaxCategory>
     */
    public function getApplicableTaxCategory(): ?array
    {
        return $this->applicableTaxCategory;
    }

    /**
     * @param  null|array<ApplicableTaxCategory> $applicableTaxCategory
     * @return static
     */
    public function setApplicableTaxCategory(?array $applicableTaxCategory = null): static
    {
        $this->applicableTaxCategory = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTaxCategory(): static
    {
        $this->applicableTaxCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableTaxCategory(): static
    {
        $this->applicableTaxCategory = [];

        return $this;
    }

    /**
     * @return null|ApplicableTaxCategory
     */
    public function firstApplicableTaxCategory(): ?ApplicableTaxCategory
    {
        $applicableTaxCategory = $this->applicableTaxCategory ?? [];
        $applicableTaxCategory = reset($applicableTaxCategory);

        if (false === $applicableTaxCategory) {
            return null;
        }

        return $applicableTaxCategory;
    }

    /**
     * @return null|ApplicableTaxCategory
     */
    public function lastApplicableTaxCategory(): ?ApplicableTaxCategory
    {
        $applicableTaxCategory = $this->applicableTaxCategory ?? [];
        $applicableTaxCategory = end($applicableTaxCategory);

        if (false === $applicableTaxCategory) {
            return null;
        }

        return $applicableTaxCategory;
    }

    /**
     * @param  ApplicableTaxCategory $applicableTaxCategory
     * @return static
     */
    public function addToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): static
    {
        $this->applicableTaxCategory[] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return ApplicableTaxCategory
     */
    public function addToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        $this->addToapplicableTaxCategory($applicableTaxCategory = new ApplicableTaxCategory());

        return $applicableTaxCategory;
    }

    /**
     * @param  ApplicableTaxCategory $applicableTaxCategory
     * @return static
     */
    public function addOnceToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): static
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        $this->applicableTaxCategory[0] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return ApplicableTaxCategory
     */
    public function addOnceToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        if ([] === $this->applicableTaxCategory) {
            $this->addOnceToapplicableTaxCategory(new ApplicableTaxCategory());
        }

        return $this->applicableTaxCategory[0];
    }
}
