<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;
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
class InvoiceSuiteSpecifiedAdvancePaymentDTO implements JsonSerializable
{
    /**
     * The amount of the advance payment
     *
     * @var null|float
     */
    protected ?float $paidAmount = null;

    /**
     * The date on which the advance payment was received
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $formattedReceivedDateTime = null;

    /**
     * The tax included in the advance payment
     *
     * @var array<InvoiceSuiteTaxDTO>
     */
    protected array $includedTradeTaxes = [];

    /**
     * The invoice referenced by the advance payment
     *
     * @var null|InvoiceSuiteReferenceDocumentExtDTO
     */
    protected ?InvoiceSuiteReferenceDocumentExtDTO $invoiceSpecifiedReferencedDocument = null;

    /**
     * Constructor
     *
     * @param null|float                               $paidAmount                         The amount of the advance payment
     * @param null|DateTimeInterface                   $formattedReceivedDateTime          The date on which the advance payment was received
     * @param array<InvoiceSuiteTaxDTO>                $includedTradeTaxes                 The tax included in the advance payment
     * @param null|InvoiceSuiteReferenceDocumentExtDTO $invoiceSpecifiedReferencedDocument The invoice referenced by the advance payment
     */
    public function __construct(
        ?float $paidAmount = null,
        ?DateTimeInterface $formattedReceivedDateTime = null,
        array $includedTradeTaxes = [],
        ?InvoiceSuiteReferenceDocumentExtDTO $invoiceSpecifiedReferencedDocument = null
    ) {
        $this->setPaidAmount($paidAmount);
        $this->setFormattedReceivedDateTime($formattedReceivedDateTime);
        $this->setIncludedTradeTaxes($includedTradeTaxes);
        $this->setInvoiceSpecifiedReferencedDocument($invoiceSpecifiedReferencedDocument);
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
     * Returns the amount of the advance payment
     *
     * @return null|float
     */
    public function getPaidAmount(): ?float
    {
        return $this->paidAmount;
    }

    /**
     * Sets the amount of the advance payment
     *
     * @param  null|float $paidAmount The amount of the advance payment
     * @return static
     */
    public function setPaidAmount(
        ?float $paidAmount
    ): static {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * Returns the date on which the advance payment was received
     *
     * @return null|DateTimeInterface
     */
    public function getFormattedReceivedDateTime(): ?DateTimeInterface
    {
        return $this->formattedReceivedDateTime;
    }

    /**
     * Sets the date on which the advance payment was received
     *
     * @param  null|DateTimeInterface $formattedReceivedDateTime The date on which the advance payment was received
     * @return static
     */
    public function setFormattedReceivedDateTime(
        ?DateTimeInterface $formattedReceivedDateTime
    ): static {
        $this->formattedReceivedDateTime = $formattedReceivedDateTime;

        return $this;
    }

    /**
     * Returns the tax included in the advance payment
     *
     * @return array<InvoiceSuiteTaxDTO>
     */
    public function getIncludedTradeTaxes(): array
    {
        return $this->includedTradeTaxes;
    }

    /**
     * Sets the tax included in the advance payment
     *
     * @param  array<InvoiceSuiteTaxDTO> $includedTradeTaxes The tax included in the advance payment
     * @return static
     */
    public function setIncludedTradeTaxes(
        array $includedTradeTaxes
    ): static {
        foreach ($includedTradeTaxes as $includedTradeTaxesItem) {
            $this->addIncludedTradeTax($includedTradeTaxesItem);
        }

        return $this;
    }

    /**
     * Add single The tax included in the advance payment
     *
     * @param  InvoiceSuiteTaxDTO $includedTradeTax The tax included in the advance payment
     * @return static
     */
    public function addIncludedTradeTax(
        ?InvoiceSuiteTaxDTO $includedTradeTax
    ): static {
        if (is_null($includedTradeTax)) {
            return $this;
        }

        $this->includedTradeTaxes[] = $includedTradeTax;

        return $this;
    }

    /**
     * Get first The tax included in the advance payment
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstIncludedTradeTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($includedTradeTax = InvoiceSuiteArrayUtils::first($this->includedTradeTaxes)) !== false) {
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The tax included in the advance payment
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextIncludedTradeTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($includedTradeTax = InvoiceSuiteArrayUtils::next($this->includedTradeTaxes)) !== false) {
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The tax included in the advance payment
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousIncludedTradeTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($includedTradeTax = InvoiceSuiteArrayUtils::previous($this->includedTradeTaxes)) !== false) {
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The tax included in the advance payment
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastIncludedTradeTax(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($includedTradeTax = InvoiceSuiteArrayUtils::last($this->includedTradeTaxes)) !== false) {
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The tax included in the advance payment and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachIncludedTradeTax(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->includedTradeTaxes as $includedTradeTax) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($includedTradeTax);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The tax included in the advance payment and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstIncludedTradeTax(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstIncludedTradeTax($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->includedTradeTaxes as $includedTradeTax) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($includedTradeTax);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The tax included in the advance payment
     *
     * @param  callable                  $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteTaxDTO>
     */
    public function filterIncludedTradeTax(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->includedTradeTaxes, $callback);
    }

    /**
     * Get first The tax included in the advance payment from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstIncludedTradeTax(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredIncludedTradeTax = $this->filterIncludedTradeTax($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredIncludedTradeTax)) {
            $includedTradeTax = InvoiceSuiteArrayUtils::first($filteredIncludedTradeTax);
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The tax included in the advance payment from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastIncludedTradeTax(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredIncludedTradeTax = $this->filterIncludedTradeTax($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredIncludedTradeTax)) {
            $includedTradeTax = InvoiceSuiteArrayUtils::last($filteredIncludedTradeTax);
            $callback($includedTradeTax);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the invoice referenced by the advance payment
     *
     * @return null|InvoiceSuiteReferenceDocumentExtDTO
     */
    public function getInvoiceSpecifiedReferencedDocument(): ?InvoiceSuiteReferenceDocumentExtDTO
    {
        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * Sets the invoice referenced by the advance payment
     *
     * @param  null|InvoiceSuiteReferenceDocumentExtDTO $invoiceSpecifiedReferencedDocument The invoice referenced by the advance payment
     * @return static
     */
    public function setInvoiceSpecifiedReferencedDocument(
        ?InvoiceSuiteReferenceDocumentExtDTO $invoiceSpecifiedReferencedDocument
    ): static {
        $this->invoiceSpecifiedReferencedDocument = $invoiceSpecifiedReferencedDocument;

        return $this;
    }
}
