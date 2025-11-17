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
class InvoiceSuitePriceNetDTO extends InvoiceSuitePriceDTO
{
    /**
     * The net price included tax
     *
     * @var array<InvoiceSuiteTaxDTO>
     */
    protected array $taxes = [];

    /**
     * Constructor
     *
     * @param null|float                   $amount        The price value
     * @param null|InvoiceSuiteQuantityDTO $priceQuantity The number of item units for which the price applies
     * @param array<InvoiceSuiteTaxDTO>    $taxes         The net price included tax
     */
    public function __construct(
        ?float $amount = null,
        ?InvoiceSuiteQuantityDTO $priceQuantity = null,
        array $taxes = [],
    ) {
        parent::__construct($amount, $priceQuantity);

        $this->setTaxes($taxes);
    }

    /**
     * Returns the net price included tax
     *
     * @return array<InvoiceSuiteTaxDTO>
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * Sets the net price included tax
     *
     * @param  array<InvoiceSuiteTaxDTO> $taxes The net price included tax
     * @return self
     */
    public function setTaxes(array $taxes): self
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Add single The net price included tax
     *
     * @param  InvoiceSuiteTaxDTO $tax The net price included tax
     * @return self
     */
    public function addTax(InvoiceSuiteTaxDTO $tax): self
    {
        $this->taxes[] = $tax;

        return $this;
    }

    /**
     * Get first The net price included tax
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstTax(callable $callback, ?callable $callbackElse = null): self
    {
        if (($tax = reset($this->taxes)) !== false) {
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The net price included tax
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextTax(callable $callback, ?callable $callbackElse = null): self
    {
        if (($tax = next($this->taxes)) !== false) {
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The net price included tax
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousTax(callable $callback, ?callable $callbackElse = null): self
    {
        if (($tax = prev($this->taxes)) !== false) {
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The net price included tax
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastTax(callable $callback, ?callable $callbackElse = null): self
    {
        if (($tax = end($this->taxes)) !== false) {
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The net price included tax and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return self
     */
    public function forEachTax(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->taxes as $tax) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($tax);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
