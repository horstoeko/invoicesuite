<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePeriodDTO
{
    /**
     * The period value
     *
     * @var null|float
     */
    protected ?float $period = null;

    /**
     * The periods's unit
     *
     * @var null|string
     */
    protected ?string $periodUnit = null;

    /**
     * Constructor
     *
     * @param null|float  $period     The period value
     * @param null|string $periodUnit The periods's unit
     */
    public function __construct(?float $period = null, ?string $periodUnit = null)
    {
        $this->setPeriod($period);
        $this->setPeriodUnit($periodUnit);
    }

    /**
     * Returns the period value
     *
     * @return null|float
     */
    public function getPeriod(): ?float
    {
        return $this->period;
    }

    /**
     * Sets the period value
     *
     * @param  null|float $period The period value
     * @return self
     */
    public function setPeriod(?float $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Returns the periods's unit
     *
     * @return null|string
     */
    public function getPeriodUnit(): ?string
    {
        return $this->periodUnit;
    }

    /**
     * Sets the periods's unit
     *
     * @param  null|string $periodUnit The periods's unit
     * @return self
     */
    public function setPeriodUnit(?string $periodUnit): self
    {
        $this->periodUnit = $periodUnit;

        return $this;
    }
}
