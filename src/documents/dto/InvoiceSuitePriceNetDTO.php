<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePriceNetDTO extends InvoiceSuitePriceDTO implements JsonSerializable
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
        array $taxes = []
    ) {
        parent::__construct($amount, $priceQuantity);

        $this->setTaxes($taxes);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
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
     * @return static
     */
    public function setTaxes(
        array $taxes
    ): static {
        foreach ($taxes as $taxesItem) {
            $this->addTax($taxesItem);
        }

        return $this;
    }

    /**
     * Add single The net price included tax
     *
     * @param  InvoiceSuiteTaxDTO $tax The net price included tax
     * @return static
     */
    public function addTax(
        ?InvoiceSuiteTaxDTO $tax
    ): static {
        if (is_null($tax)) {
            return $this;
        }

        $this->taxes[] = $tax;

        return $this;
    }

    /**
     * Get first The net price included tax
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($tax = InvoiceSuiteArrayUtils::first($this->taxes)) !== false) {
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
     * @return static
     */
    public function nextTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($tax = InvoiceSuiteArrayUtils::next($this->taxes)) !== false) {
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
     * @return static
     */
    public function previousTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($tax = InvoiceSuiteArrayUtils::previous($this->taxes)) !== false) {
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
     * @return static
     */
    public function lastTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($tax = InvoiceSuiteArrayUtils::last($this->taxes)) !== false) {
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
     * @return static
     */
    public function forEachTax(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->taxes as $tax) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($tax);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The net price included tax and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstTax(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstTax($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->taxes as $tax) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($tax);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The net price included tax
     *
     * @param  callable                  $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteTaxDTO>
     */
    public function filterTax(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->taxes, $callback);
    }

    /**
     * Get first The net price included tax from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstTax(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredTax = $this->filterTax($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredTax)) {
            $tax = InvoiceSuiteArrayUtils::first($filteredTax);
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The net price included tax from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastTax(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredTax = $this->filterTax($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredTax)) {
            $tax = InvoiceSuiteArrayUtils::last($filteredTax);
            $callback($tax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
