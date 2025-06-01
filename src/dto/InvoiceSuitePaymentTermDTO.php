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
class InvoiceSuitePaymentTermDTO
{
    /**
     * The text description of the payment terms
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * The date by which payment is due
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $dueDate = null;

    /**
     * The payment discounts
     *
     * @var array<InvoiceSuitePaymentTermDiscountDTO>
     */
    protected array $discountTerms = [];

    /**
     * The payment penalties
     *
     * @var array<InvoiceSuitePaymentTermPenaltyDTO>
     */
    protected array $penaltyTerms = [];

    /**
     * Constructor
     *
     * @param string|null $description The text description of the payment terms
     * @param DateTimeInterface|null $dueDate The date by which payment is due
     * @param array<InvoiceSuitePaymentTermDiscountDTO> $discountTerms The payment discounts
     * @param array<InvoiceSuitePaymentTermPenaltyDTO> $penaltyTerms The payment penalties
     */
    public function __construct(
        ?string $description = null,
        ?DateTimeInterface $dueDate = null,
        array $discountTerms = [],
        array $penaltyTerms = [],
    ) {
        $this->setDescription($description);
        $this->setDueDate($dueDate);
        $this->setDiscountTerms($discountTerms);
        $this->setPenaltyTerms($penaltyTerms);
    }

    /**
     * Returns the text description of the payment terms
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the text description of the payment terms
     *
     * @param string|null $description The text description of the payment terms
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the date by which payment is due
     *
     * @return DateTimeInterface|null
     */
    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * Sets the date by which payment is due
     *
     * @param DateTimeInterface|null $dueDate The date by which payment is due
     * @return self
     */
    public function setDueDate(?DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Returns the payment discounts
     *
     * @return array<InvoiceSuitePaymentTermDiscountDTO>
     */
    public function getDiscountTerms(): array
    {
        return $this->discountTerms;
    }

    /**
     * Sets the payment discounts
     *
     * @param array<InvoiceSuitePaymentTermDiscountDTO> $discountTerms The payment discounts
     * @return self
     */
    public function setDiscountTerms(array $discountTerms): self
    {
        $this->discountTerms = $discountTerms;

        return $this;
    }

    /**
     * Add single The payment discounts
     *
     * @param InvoiceSuitePaymentTermDiscountDTO $discountTerms The payment discounts
     * @return self
     */
    public function addDiscountTerms(InvoiceSuitePaymentTermDiscountDTO $discountTerms): self
    {
        $this->discountTerms[] = $discountTerms;

        return $this;
    }

    /**
     * Get first The payment discounts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstDiscountTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($discountTerms = reset($this->discountTerms)) !== false) {
            $callback($discountTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get next The payment discounts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextDiscountTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($discountTerms = next($this->discountTerms)) !== false) {
            $callback($discountTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get previous The payment discounts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousDiscountTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($discountTerms = prev($this->discountTerms)) !== false) {
            $callback($discountTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get last The payment discounts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastDiscountTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($discountTerms = end($this->discountTerms)) !== false) {
            $callback($discountTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Loop over The payment discounts and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachDiscountTerms(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->discountTerms as $discountTerms) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($discountTerms);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the payment penalties
     *
     * @return array<InvoiceSuitePaymentTermPenaltyDTO>
     */
    public function getPenaltyTerms(): array
    {
        return $this->penaltyTerms;
    }

    /**
     * Sets the payment penalties
     *
     * @param array<InvoiceSuitePaymentTermPenaltyDTO> $penaltyTerms The payment penalties
     * @return self
     */
    public function setPenaltyTerms(array $penaltyTerms): self
    {
        $this->penaltyTerms = $penaltyTerms;

        return $this;
    }

    /**
     * Add single The payment penalties
     *
     * @param InvoiceSuitePaymentTermPenaltyDTO $penaltyTerms The payment penalties
     * @return self
     */
    public function addPenaltyTerms(InvoiceSuitePaymentTermPenaltyDTO $penaltyTerms): self
    {
        $this->penaltyTerms[] = $penaltyTerms;

        return $this;
    }

    /**
     * Get first The payment penalties
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstPenaltyTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($penaltyTerms = reset($this->penaltyTerms)) !== false) {
            $callback($penaltyTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get next The payment penalties
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextPenaltyTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($penaltyTerms = next($this->penaltyTerms)) !== false) {
            $callback($penaltyTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get previous The payment penalties
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousPenaltyTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($penaltyTerms = prev($this->penaltyTerms)) !== false) {
            $callback($penaltyTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Get last The payment penalties
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastPenaltyTerms(callable $callback, ?callable $callbackElse = null): self
    {
        if (($penaltyTerms = end($this->penaltyTerms)) !== false) {
            $callback($penaltyTerms);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
        }

        return $this;
    }

    /**
     * Loop over The payment penalties and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachPenaltyTerms(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->penaltyTerms as $penaltyTerms) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($penaltyTerms);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
