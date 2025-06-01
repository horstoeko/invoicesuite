<?php

namespace horstoeko\invoicesuite\dto;

use DateTimeInterface;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePaymentTermPenaltyDTO
{
    /**
     * The base amount of the payment penalty
     *
     * @var float|null
     */
    protected ?float $baseAmount = null;

    /**
     * The amount of the payment penalty
     *
     * @var float|null
     */
    protected ?float $discountAmount = null;

    /**
     * The percentage of the payment penalty
     *
     * @var float|null
     */
    protected ?float $discountPercent = null;

    /**
     * The due date reference date
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $baseDate = null;

    /**
     * The maturity period (basis)
     *
     * @var float|null
     */
    protected ?float $basePeriod = null;

    /**
     * The maturity period (unit)
     *
     * @var string|null
     */
    protected ?string $basePeriodUnit = null;

    /**
     * Constructor
     *
     * @param float|null $baseAmount The base amount of the payment penalty
     * @param float|null $discountAmount The amount of the payment penalty
     * @param float|null $discountPercent The percentage of the payment penalty
     * @param DateTimeInterface|null $baseDate The due date reference date
     * @param float|null $basePeriod The maturity period (basis)
     * @param string|null $basePeriodUnit The maturity period (unit)
     */
    public function __construct(
        ?float $baseAmount = null,
        ?float $discountAmount = null,
        ?float $discountPercent = null,
        ?DateTimeInterface $baseDate = null,
        ?float $basePeriod = null,
        ?string $basePeriodUnit = null,
    ) {
        $this->setBaseAmount($baseAmount);
        $this->setDiscountAmount($discountAmount);
        $this->setDiscountPercent($discountPercent);
        $this->setBaseDate($baseDate);
        $this->setBasePeriod($basePeriod);
        $this->setBasePeriodUnit($basePeriodUnit);
    }

    /**
     * Returns the base amount of the payment penalty
     *
     * @return float|null
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * Sets the base amount of the payment penalty
     *
     * @param float|null $baseAmount The base amount of the payment penalty
     * @return self
     */
    public function setBaseAmount(?float $baseAmount): self
    {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * Returns the amount of the payment penalty
     *
     * @return float|null
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    /**
     * Sets the amount of the payment penalty
     *
     * @param float|null $discountAmount The amount of the payment penalty
     * @return self
     */
    public function setDiscountAmount(?float $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    /**
     * Returns the percentage of the payment penalty
     *
     * @return float|null
     */
    public function getDiscountPercent(): ?float
    {
        return $this->discountPercent;
    }

    /**
     * Sets the percentage of the payment penalty
     *
     * @param float|null $discountPercent The percentage of the payment penalty
     * @return self
     */
    public function setDiscountPercent(?float $discountPercent): self
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    /**
     * Returns the due date reference date
     *
     * @return DateTimeInterface|null
     */
    public function getBaseDate(): ?DateTimeInterface
    {
        return $this->baseDate;
    }

    /**
     * Sets the due date reference date
     *
     * @param DateTimeInterface|null $baseDate The due date reference date
     * @return self
     */
    public function setBaseDate(?DateTimeInterface $baseDate): self
    {
        $this->baseDate = $baseDate;

        return $this;
    }

    /**
     * Returns the maturity period (basis)
     *
     * @return float|null
     */
    public function getBasePeriod(): ?float
    {
        return $this->basePeriod;
    }

    /**
     * Sets the maturity period (basis)
     *
     * @param float|null $basePeriod The maturity period (basis)
     * @return self
     */
    public function setBasePeriod(?float $basePeriod): self
    {
        $this->basePeriod = $basePeriod;

        return $this;
    }

    /**
     * Returns the maturity period (unit)
     *
     * @return string|null
     */
    public function getBasePeriodUnit(): ?string
    {
        return $this->basePeriodUnit;
    }

    /**
     * Sets the maturity period (unit)
     *
     * @param string|null $basePeriodUnit The maturity period (unit)
     * @return self
     */
    public function setBasePeriodUnit(?string $basePeriodUnit): self
    {
        $this->basePeriodUnit = $basePeriodUnit;

        return $this;
    }
}
