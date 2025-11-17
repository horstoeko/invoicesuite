<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePaymentTermDiscountDTO
{
    /**
     * The base amount of the payment discount
     *
     * @var null|float
     */
    protected ?float $baseAmount = null;

    /**
     * The amount of the payment discount
     *
     * @var null|float
     */
    protected ?float $discountAmount = null;

    /**
     * The percentage of the payment discount
     *
     * @var null|float
     */
    protected ?float $discountPercent = null;

    /**
     * The due date reference date
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $baseDate = null;

    /**
     * The maturity period (basis)
     *
     * @var null|InvoiceSuitePeriodDTO
     */
    protected ?InvoiceSuitePeriodDTO $period = null;

    /**
     * Constructor
     *
     * @param null|float                 $baseAmount      The base amount of the payment discount
     * @param null|float                 $discountAmount  The amount of the payment discount
     * @param null|float                 $discountPercent The percentage of the payment discount
     * @param null|DateTimeInterface     $baseDate        The due date reference date
     * @param null|InvoiceSuitePeriodDTO $period          The maturity period (basis)
     */
    public function __construct(
        ?float $baseAmount = null,
        ?float $discountAmount = null,
        ?float $discountPercent = null,
        ?DateTimeInterface $baseDate = null,
        ?InvoiceSuitePeriodDTO $period = null,
    ) {
        $this->setBaseAmount($baseAmount);
        $this->setDiscountAmount($discountAmount);
        $this->setDiscountPercent($discountPercent);
        $this->setBaseDate($baseDate);
        $this->setPeriod($period);
    }

    /**
     * Returns the base amount of the payment discount
     *
     * @return null|float
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * Sets the base amount of the payment discount
     *
     * @param  null|float $baseAmount The base amount of the payment discount
     * @return self
     */
    public function setBaseAmount(?float $baseAmount): self
    {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * Returns the amount of the payment discount
     *
     * @return null|float
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    /**
     * Sets the amount of the payment discount
     *
     * @param  null|float $discountAmount The amount of the payment discount
     * @return self
     */
    public function setDiscountAmount(?float $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    /**
     * Returns the percentage of the payment discount
     *
     * @return null|float
     */
    public function getDiscountPercent(): ?float
    {
        return $this->discountPercent;
    }

    /**
     * Sets the percentage of the payment discount
     *
     * @param  null|float $discountPercent The percentage of the payment discount
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
     * @return null|DateTimeInterface
     */
    public function getBaseDate(): ?DateTimeInterface
    {
        return $this->baseDate;
    }

    /**
     * Sets the due date reference date
     *
     * @param  null|DateTimeInterface $baseDate The due date reference date
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
     * @return null|InvoiceSuitePeriodDTO
     */
    public function getPeriod(): ?InvoiceSuitePeriodDTO
    {
        return $this->period;
    }

    /**
     * Sets the maturity period (basis)
     *
     * @param  null|InvoiceSuitePeriodDTO $period The maturity period (basis)
     * @return self
     */
    public function setPeriod(?InvoiceSuitePeriodDTO $period): self
    {
        $this->period = $period;

        return $this;
    }
}
