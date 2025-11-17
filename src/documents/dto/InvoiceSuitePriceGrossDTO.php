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
class InvoiceSuitePriceGrossDTO extends InvoiceSuitePriceDTO
{
    /**
     * The discounts or charges to the gross price
     *
     * @var array<InvoiceSuiteAllowanceChargeDTO>
     */
    protected array $allowanceCharges = [];

    /**
     * Constructor
     *
     * @param null|float                            $amount           The price value
     * @param null|InvoiceSuiteQuantityDTO          $priceQuantity    The number of item units for which the price applies
     * @param array<InvoiceSuiteAllowanceChargeDTO> $allowanceCharges The discounts or charges to the gross price
     */
    public function __construct(
        ?float $amount = null,
        ?InvoiceSuiteQuantityDTO $priceQuantity = null,
        array $allowanceCharges = [],
    ) {
        parent::__construct($amount, $priceQuantity);

        $this->setAllowanceCharges($allowanceCharges);
    }

    /**
     * Returns the discounts or charges to the gross price
     *
     * @return array<InvoiceSuiteAllowanceChargeDTO>
     */
    public function getAllowanceCharges(): array
    {
        return $this->allowanceCharges;
    }

    /**
     * Sets the discounts or charges to the gross price
     *
     * @param  array<InvoiceSuiteAllowanceChargeDTO> $allowanceCharges The discounts or charges to the gross price
     * @return self
     */
    public function setAllowanceCharges(array $allowanceCharges): self
    {
        $this->allowanceCharges = $allowanceCharges;

        return $this;
    }

    /**
     * Add single The discounts or charges to the gross price
     *
     * @param  InvoiceSuiteAllowanceChargeDTO $allowanceCharge The discounts or charges to the gross price
     * @return self
     */
    public function addAllowanceCharge(InvoiceSuiteAllowanceChargeDTO $allowanceCharge): self
    {
        $this->allowanceCharges[] = $allowanceCharge;

        return $this;
    }

    /**
     * Get first The discounts or charges to the gross price
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstAllowanceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($allowanceCharge = reset($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The discounts or charges to the gross price
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextAllowanceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($allowanceCharge = next($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The discounts or charges to the gross price
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousAllowanceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($allowanceCharge = prev($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The discounts or charges to the gross price
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastAllowanceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($allowanceCharge = end($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The discounts or charges to the gross price and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return self
     */
    public function forEachAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->allowanceCharges as $allowanceCharge) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($allowanceCharge);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
