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
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentPositionDTO implements JsonSerializable
{
    /**
     * The identification of the position
     *
     * @var null|string
     */
    protected ?string $lineId = null;

    /**
     * The identification of the parent position
     *
     * @var null|string
     */
    protected ?string $parentLineId = null;

    /**
     * The indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     *
     * @var null|string
     */
    protected ?string $lineStatus = null;

    /**
     * The type to specify whether the invoice line is
     *
     * @var null|string
     */
    protected ?string $lineStatusReason = null;

    /**
     * The notes for this position
     *
     * @var array<InvoiceSuiteNoteDTO>
     */
    protected array $note = [];

    /**
     * The product for this position
     *
     * @var null|InvoiceSuiteProductDTO
     */
    protected ?InvoiceSuiteProductDTO $product = null;

    /**
     * The associated seller's order confirmation (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $sellerOrderReferences = [];

    /**
     * The associated buyer's order (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $buyerOrderReferences = [];

    /**
     * The associated quotation (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $quotationReferences = [];

    /**
     * The associated contract (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $contractReferences = [];

    /**
     * The additional associated document (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    protected array $additionalReferences = [];

    /**
     * The ultimate customer order reference (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $ultimateCustomerOrderReferences = [];

    /**
     * The despatch advice reference (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $despatchAdviceReferences = [];

    /**
     * The receiving advice reference (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $receivingAdviceReferences = [];

    /**
     * The delivery note reference (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    protected array $deliveryNoteReferences = [];

    /**
     * The additional invoice document (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    protected array $invoiceReferences = [];

    /**
     * The additional object references (line reference)
     *
     * @var array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    protected array $additionalObjectReferences = [];

    /**
     * The gross price
     *
     * @var null|InvoiceSuitePriceGrossDTO
     */
    protected ?InvoiceSuitePriceGrossDTO $grossPrice = null;

    /**
     * The net price
     *
     * @var null|InvoiceSuitePriceNetDTO
     */
    protected ?InvoiceSuitePriceNetDTO $netPrice = null;

    /**
     * The billed quantity
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    protected ?InvoiceSuiteQuantityDTO $quantityBilled = null;

    /**
     * The charge-free quantity
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    protected ?InvoiceSuiteQuantityDTO $quantityChargeFree = null;

    /**
     * The package quantity
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    protected ?InvoiceSuiteQuantityDTO $quantityPackage = null;

    /**
     * The per-package quantity
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    protected ?InvoiceSuiteQuantityDTO $quantityPerPackage = null;

    /**
     * The Ship-To Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $shipToParty = null;

    /**
     * The Ultimate Ship-To Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $ultimateShipToParty = null;

    /**
     * The date of the delivery
     *
     * @var array<DateTimeInterface>
     */
    protected array $supplyChainEvents = [];

    /**
     * The start and/or end date of the billing period
     *
     * @var array<InvoiceSuiteDateRangeDTO>
     */
    protected array $billingPeriods = [];

    /**
     * The posting reference
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $postingReferences = [];

    /**
     * The VAT breakdown
     *
     * @var array<InvoiceSuiteTaxDTO>
     */
    protected array $taxes = [];

    /**
     * The allowances/charges
     *
     * @var array<InvoiceSuiteAllowanceChargeDTO>
     */
    protected array $allowanceCharges = [];

    /**
     * The summation
     *
     * @var null|InvoiceSuitesummationLineDTO
     */
    protected ?InvoiceSuitesummationLineDTO $summation = null;

    /**
     * Constructor
     *
     * @param null|string                                    $lineId                          The identification of the position
     * @param null|string                                    $parentLineId                    The identification of the parent position
     * @param null|string                                    $lineStatus                      The indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param null|string                                    $lineStatusReason                The type to specify whether the invoice line is
     * @param array<InvoiceSuiteNoteDTO>                     $note                            The notes for this position
     * @param null|InvoiceSuiteProductDTO                    $product                         The product for this position
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $sellerOrderReferences           The associated seller's order confirmation (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $buyerOrderReferences            The associated buyer's order (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $quotationReferences             The associated quotation (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $contractReferences              The associated contract (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineExtDTO> $additionalReferences            The additional associated document (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $ultimateCustomerOrderReferences The ultimate customer order reference (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $despatchAdviceReferences        The despatch advice reference (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $receivingAdviceReferences       The receiving advice reference (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineDTO>    $deliveryNoteReferences          The delivery note reference (line reference)
     * @param array<InvoiceSuiteReferenceDocumentLineExtDTO> $invoiceReferences               The additional invoice document (line reference)
     * @param array<InvoiceSuiteReferenceDocumentExtDTO>     $additionalObjectReferences      The additional object references (line reference)
     * @param null|InvoiceSuitePriceGrossDTO                 $grossPrice                      The gross price
     * @param null|InvoiceSuitePriceNetDTO                   $netPrice                        The net price
     * @param null|InvoiceSuiteQuantityDTO                   $quantityBilled                  The billed quantity
     * @param null|InvoiceSuiteQuantityDTO                   $quantityChargeFree              The charge-free quantity
     * @param null|InvoiceSuiteQuantityDTO                   $quantityPackage                 The package quantity
     * @param null|InvoiceSuiteQuantityDTO                   $quantityPerPackage              The per-package quantity
     * @param null|InvoiceSuitePartyDTO                      $shipToParty                     The Ship-To Party
     * @param null|InvoiceSuitePartyDTO                      $ultimateShipToParty             The Ultimate Ship-To Party
     * @param array<DateTimeInterface>                       $supplyChainEvents               The date of the delivery
     * @param array<InvoiceSuiteDateRangeDTO>                $billingPeriods                  The start and/or end date of the billing period
     * @param array<InvoiceSuiteIdDTO>                       $postingReferences               The posting reference
     * @param array<InvoiceSuiteTaxDTO>                      $taxes                           The VAT breakdown
     * @param array<InvoiceSuiteAllowanceChargeDTO>          $allowanceCharges                The allowances/charges
     * @param null|InvoiceSuitesummationLineDTO              $summation                       The summation
     */
    public function __construct(
        ?string $lineId = null,
        ?string $parentLineId = null,
        ?string $lineStatus = null,
        ?string $lineStatusReason = null,
        array $note = [],
        ?InvoiceSuiteProductDTO $product = null,
        array $sellerOrderReferences = [],
        array $buyerOrderReferences = [],
        array $quotationReferences = [],
        array $contractReferences = [],
        array $additionalReferences = [],
        array $ultimateCustomerOrderReferences = [],
        array $despatchAdviceReferences = [],
        array $receivingAdviceReferences = [],
        array $deliveryNoteReferences = [],
        array $invoiceReferences = [],
        array $additionalObjectReferences = [],
        ?InvoiceSuitePriceGrossDTO $grossPrice = null,
        ?InvoiceSuitePriceNetDTO $netPrice = null,
        ?InvoiceSuiteQuantityDTO $quantityBilled = null,
        ?InvoiceSuiteQuantityDTO $quantityChargeFree = null,
        ?InvoiceSuiteQuantityDTO $quantityPackage = null,
        ?InvoiceSuiteQuantityDTO $quantityPerPackage = null,
        ?InvoiceSuitePartyDTO $shipToParty = null,
        ?InvoiceSuitePartyDTO $ultimateShipToParty = null,
        array $supplyChainEvents = [],
        array $billingPeriods = [],
        array $postingReferences = [],
        array $taxes = [],
        array $allowanceCharges = [],
        ?InvoiceSuitesummationLineDTO $summation = null
    ) {
        $this->setLineId($lineId);
        $this->setParentLineId($parentLineId);
        $this->setLineStatus($lineStatus);
        $this->setLineStatusReason($lineStatusReason);
        $this->setNote($note);
        $this->setProduct($product);
        $this->setSellerOrderReferences($sellerOrderReferences);
        $this->setBuyerOrderReferences($buyerOrderReferences);
        $this->setQuotationReferences($quotationReferences);
        $this->setContractReferences($contractReferences);
        $this->setAdditionalReferences($additionalReferences);
        $this->setUltimateCustomerOrderReferences($ultimateCustomerOrderReferences);
        $this->setDespatchAdviceReferences($despatchAdviceReferences);
        $this->setReceivingAdviceReferences($receivingAdviceReferences);
        $this->setDeliveryNoteReferences($deliveryNoteReferences);
        $this->setInvoiceReferences($invoiceReferences);
        $this->setAdditionalObjectReferences($additionalObjectReferences);
        $this->setGrossPrice($grossPrice);
        $this->setNetPrice($netPrice);
        $this->setQuantityBilled($quantityBilled);
        $this->setQuantityChargeFree($quantityChargeFree);
        $this->setQuantityPackage($quantityPackage);
        $this->setQuantityPerPackage($quantityPerPackage);
        $this->setShipToParty($shipToParty);
        $this->setUltimateShipToParty($ultimateShipToParty);
        $this->setSupplyChainEvents($supplyChainEvents);
        $this->setBillingPeriods($billingPeriods);
        $this->setPostingReferences($postingReferences);
        $this->setTaxes($taxes);
        $this->setAllowanceCharges($allowanceCharges);
        $this->setSummation($summation);
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
     * Returns the identification of the position
     *
     * @return null|string
     */
    public function getLineId(): ?string
    {
        return $this->lineId;
    }

    /**
     * Sets the identification of the position
     *
     * @param  null|string $lineId The identification of the position
     * @return static
     */
    public function setLineId(
        ?string $lineId
    ): static {
        $this->lineId = InvoiceSuiteStringUtils::asNullWhenEmpty($lineId);

        return $this;
    }

    /**
     * Returns the identification of the parent position
     *
     * @return null|string
     */
    public function getParentLineId(): ?string
    {
        return $this->parentLineId;
    }

    /**
     * Sets the identification of the parent position
     *
     * @param  null|string $parentLineId The identification of the parent position
     * @return static
     */
    public function setParentLineId(
        ?string $parentLineId
    ): static {
        $this->parentLineId = InvoiceSuiteStringUtils::asNullWhenEmpty($parentLineId);

        return $this;
    }

    /**
     * Returns the indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     *
     * @return null|string
     */
    public function getLineStatus(): ?string
    {
        return $this->lineStatus;
    }

    /**
     * Sets the indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     *
     * @param  null|string $lineStatus The indication whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @return static
     */
    public function setLineStatus(
        ?string $lineStatus
    ): static {
        $this->lineStatus = InvoiceSuiteStringUtils::asNullWhenEmpty($lineStatus);

        return $this;
    }

    /**
     * Returns the type to specify whether the invoice line is
     *
     * @return null|string
     */
    public function getLineStatusReason(): ?string
    {
        return $this->lineStatusReason;
    }

    /**
     * Sets the type to specify whether the invoice line is
     *
     * @param  null|string $lineStatusReason The type to specify whether the invoice line is
     * @return static
     */
    public function setLineStatusReason(
        ?string $lineStatusReason
    ): static {
        $this->lineStatusReason = InvoiceSuiteStringUtils::asNullWhenEmpty($lineStatusReason);

        return $this;
    }

    /**
     * Returns the notes for this position
     *
     * @return array<InvoiceSuiteNoteDTO>
     */
    public function getNote(): array
    {
        return $this->note;
    }

    /**
     * Sets the notes for this position
     *
     * @param  array<InvoiceSuiteNoteDTO> $note The notes for this position
     * @return static
     */
    public function setNote(
        array $note
    ): static {
        foreach ($note as $noteItem) {
            $this->addNote($noteItem);
        }

        return $this;
    }

    /**
     * Add single The notes for this position
     *
     * @param  InvoiceSuiteNoteDTO $note The notes for this position
     * @return static
     */
    public function addNote(
        ?InvoiceSuiteNoteDTO $note
    ): static {
        if (is_null($note)) {
            return $this;
        }

        $this->note[] = $note;

        return $this;
    }

    /**
     * Get first The notes for this position
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::first($this->note)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The notes for this position
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::next($this->note)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The notes for this position
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::previous($this->note)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The notes for this position
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::last($this->note)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The notes for this position and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachNote(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->note as $note) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($note);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The notes for this position and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstNote(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstNote($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->note as $note) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($note);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The notes for this position
     *
     * @param  callable                   $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteNoteDTO>
     */
    public function filterNote(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->note, $callback);
    }

    /**
     * Get first The notes for this position from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstNote(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredNote = $this->filterNote($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredNote)) {
            $note = InvoiceSuiteArrayUtils::first($filteredNote);
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The notes for this position from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastNote(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredNote = $this->filterNote($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredNote)) {
            $note = InvoiceSuiteArrayUtils::last($filteredNote);
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the product for this position
     *
     * @return null|InvoiceSuiteProductDTO
     */
    public function getProduct(): ?InvoiceSuiteProductDTO
    {
        return $this->product;
    }

    /**
     * Sets the product for this position
     *
     * @param  null|InvoiceSuiteProductDTO $product The product for this position
     * @return static
     */
    public function setProduct(
        ?InvoiceSuiteProductDTO $product
    ): static {
        $this->product = $product;

        return $this;
    }

    /**
     * Returns the associated seller's order confirmation (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getSellerOrderReferences(): array
    {
        return $this->sellerOrderReferences;
    }

    /**
     * Sets the associated seller's order confirmation (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $sellerOrderReferences The associated seller's order confirmation (line reference)
     * @return static
     */
    public function setSellerOrderReferences(
        array $sellerOrderReferences
    ): static {
        foreach ($sellerOrderReferences as $sellerOrderReferencesItem) {
            $this->addSellerOrderReference($sellerOrderReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The associated seller's order confirmation (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $sellerOrderReference The associated seller's order confirmation (line reference)
     * @return static
     */
    public function addSellerOrderReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $sellerOrderReference
    ): static {
        if (is_null($sellerOrderReference)) {
            return $this;
        }

        $this->sellerOrderReferences[] = $sellerOrderReference;

        return $this;
    }

    /**
     * Get first The associated seller's order confirmation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($sellerOrderReference = InvoiceSuiteArrayUtils::first($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated seller's order confirmation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($sellerOrderReference = InvoiceSuiteArrayUtils::next($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated seller's order confirmation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($sellerOrderReference = InvoiceSuiteArrayUtils::previous($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated seller's order confirmation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($sellerOrderReference = InvoiceSuiteArrayUtils::last($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated seller's order confirmation (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->sellerOrderReferences as $sellerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($sellerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated seller's order confirmation (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstSellerOrderReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstSellerOrderReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->sellerOrderReferences as $sellerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($sellerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The associated seller's order confirmation (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterSellerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->sellerOrderReferences, $callback);
    }

    /**
     * Get first The associated seller's order confirmation (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstSellerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSellerOrderReference = $this->filterSellerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSellerOrderReference)) {
            $sellerOrderReference = InvoiceSuiteArrayUtils::first($filteredSellerOrderReference);
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated seller's order confirmation (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastSellerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSellerOrderReference = $this->filterSellerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSellerOrderReference)) {
            $sellerOrderReference = InvoiceSuiteArrayUtils::last($filteredSellerOrderReference);
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the associated buyer's order (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getBuyerOrderReferences(): array
    {
        return $this->buyerOrderReferences;
    }

    /**
     * Sets the associated buyer's order (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $buyerOrderReferences The associated buyer's order (line reference)
     * @return static
     */
    public function setBuyerOrderReferences(
        array $buyerOrderReferences
    ): static {
        foreach ($buyerOrderReferences as $buyerOrderReferencesItem) {
            $this->addBuyerOrderReference($buyerOrderReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The associated buyer's order (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $buyerOrderReference The associated buyer's order (line reference)
     * @return static
     */
    public function addBuyerOrderReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $buyerOrderReference
    ): static {
        if (is_null($buyerOrderReference)) {
            return $this;
        }

        $this->buyerOrderReferences[] = $buyerOrderReference;

        return $this;
    }

    /**
     * Get first The associated buyer's order (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerOrderReference = InvoiceSuiteArrayUtils::first($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated buyer's order (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerOrderReference = InvoiceSuiteArrayUtils::next($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated buyer's order (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerOrderReference = InvoiceSuiteArrayUtils::previous($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated buyer's order (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerOrderReference = InvoiceSuiteArrayUtils::last($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated buyer's order (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->buyerOrderReferences as $buyerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($buyerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated buyer's order (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstBuyerOrderReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstBuyerOrderReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->buyerOrderReferences as $buyerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($buyerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The associated buyer's order (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterBuyerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->buyerOrderReferences, $callback);
    }

    /**
     * Get first The associated buyer's order (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstBuyerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBuyerOrderReference = $this->filterBuyerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBuyerOrderReference)) {
            $buyerOrderReference = InvoiceSuiteArrayUtils::first($filteredBuyerOrderReference);
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated buyer's order (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastBuyerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBuyerOrderReference = $this->filterBuyerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBuyerOrderReference)) {
            $buyerOrderReference = InvoiceSuiteArrayUtils::last($filteredBuyerOrderReference);
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the associated quotation (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getQuotationReferences(): array
    {
        return $this->quotationReferences;
    }

    /**
     * Sets the associated quotation (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $quotationReferences The associated quotation (line reference)
     * @return static
     */
    public function setQuotationReferences(
        array $quotationReferences
    ): static {
        foreach ($quotationReferences as $quotationReferencesItem) {
            $this->addQuotationReference($quotationReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The associated quotation (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $quotationReference The associated quotation (line reference)
     * @return static
     */
    public function addQuotationReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $quotationReference
    ): static {
        if (is_null($quotationReference)) {
            return $this;
        }

        $this->quotationReferences[] = $quotationReference;

        return $this;
    }

    /**
     * Get first The associated quotation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstQuotationReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($quotationReference = InvoiceSuiteArrayUtils::first($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated quotation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextQuotationReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($quotationReference = InvoiceSuiteArrayUtils::next($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated quotation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousQuotationReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($quotationReference = InvoiceSuiteArrayUtils::previous($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated quotation (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastQuotationReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($quotationReference = InvoiceSuiteArrayUtils::last($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated quotation (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachQuotationReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->quotationReferences as $quotationReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($quotationReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated quotation (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstQuotationReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstQuotationReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->quotationReferences as $quotationReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($quotationReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The associated quotation (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterQuotationReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->quotationReferences, $callback);
    }

    /**
     * Get first The associated quotation (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstQuotationReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredQuotationReference = $this->filterQuotationReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredQuotationReference)) {
            $quotationReference = InvoiceSuiteArrayUtils::first($filteredQuotationReference);
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated quotation (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastQuotationReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredQuotationReference = $this->filterQuotationReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredQuotationReference)) {
            $quotationReference = InvoiceSuiteArrayUtils::last($filteredQuotationReference);
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the associated contract (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getContractReferences(): array
    {
        return $this->contractReferences;
    }

    /**
     * Sets the associated contract (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $contractReferences The associated contract (line reference)
     * @return static
     */
    public function setContractReferences(
        array $contractReferences
    ): static {
        foreach ($contractReferences as $contractReferencesItem) {
            $this->addContractReference($contractReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The associated contract (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $contractReference The associated contract (line reference)
     * @return static
     */
    public function addContractReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $contractReference
    ): static {
        if (is_null($contractReference)) {
            return $this;
        }

        $this->contractReferences[] = $contractReference;

        return $this;
    }

    /**
     * Get first The associated contract (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstContractReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contractReference = InvoiceSuiteArrayUtils::first($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated contract (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextContractReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contractReference = InvoiceSuiteArrayUtils::next($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated contract (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousContractReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contractReference = InvoiceSuiteArrayUtils::previous($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated contract (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastContractReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contractReference = InvoiceSuiteArrayUtils::last($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated contract (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachContractReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->contractReferences as $contractReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($contractReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated contract (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstContractReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstContractReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->contractReferences as $contractReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($contractReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The associated contract (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterContractReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->contractReferences, $callback);
    }

    /**
     * Get first The associated contract (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstContractReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredContractReference = $this->filterContractReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredContractReference)) {
            $contractReference = InvoiceSuiteArrayUtils::first($filteredContractReference);
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated contract (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastContractReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredContractReference = $this->filterContractReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredContractReference)) {
            $contractReference = InvoiceSuiteArrayUtils::last($filteredContractReference);
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the additional associated document (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    public function getAdditionalReferences(): array
    {
        return $this->additionalReferences;
    }

    /**
     * Sets the additional associated document (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineExtDTO> $additionalReferences The additional associated document (line reference)
     * @return static
     */
    public function setAdditionalReferences(
        array $additionalReferences
    ): static {
        foreach ($additionalReferences as $additionalReferencesItem) {
            $this->addAdditionalReference($additionalReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The additional associated document (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineExtDTO $additionalReference The additional associated document (line reference)
     * @return static
     */
    public function addAdditionalReference(
        ?InvoiceSuiteReferenceDocumentLineExtDTO $additionalReference
    ): static {
        if (is_null($additionalReference)) {
            return $this;
        }

        $this->additionalReferences[] = $additionalReference;

        return $this;
    }

    /**
     * Get first The additional associated document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalReference = InvoiceSuiteArrayUtils::first($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The additional associated document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalReference = InvoiceSuiteArrayUtils::next($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The additional associated document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalReference = InvoiceSuiteArrayUtils::previous($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional associated document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalReference = InvoiceSuiteArrayUtils::last($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional associated document (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->additionalReferences as $additionalReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($additionalReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional associated document (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstAdditionalReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstAdditionalReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->additionalReferences as $additionalReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($additionalReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The additional associated document (line reference)
     *
     * @param  callable                                       $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    public function filterAdditionalReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->additionalReferences, $callback);
    }

    /**
     * Get first The additional associated document (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstAdditionalReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAdditionalReference = $this->filterAdditionalReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAdditionalReference)) {
            $additionalReference = InvoiceSuiteArrayUtils::first($filteredAdditionalReference);
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional associated document (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastAdditionalReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAdditionalReference = $this->filterAdditionalReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAdditionalReference)) {
            $additionalReference = InvoiceSuiteArrayUtils::last($filteredAdditionalReference);
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the ultimate customer order reference (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getUltimateCustomerOrderReferences(): array
    {
        return $this->ultimateCustomerOrderReferences;
    }

    /**
     * Sets the ultimate customer order reference (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $ultimateCustomerOrderReferences The ultimate customer order reference (line reference)
     * @return static
     */
    public function setUltimateCustomerOrderReferences(
        array $ultimateCustomerOrderReferences
    ): static {
        foreach ($ultimateCustomerOrderReferences as $ultimateCustomerOrderReferencesItem) {
            $this->addUltimateCustomerOrderReference($ultimateCustomerOrderReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The ultimate customer order reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $ultimateCustomerOrderReference The ultimate customer order reference (line reference)
     * @return static
     */
    public function addUltimateCustomerOrderReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $ultimateCustomerOrderReference
    ): static {
        if (is_null($ultimateCustomerOrderReference)) {
            return $this;
        }

        $this->ultimateCustomerOrderReferences[] = $ultimateCustomerOrderReference;

        return $this;
    }

    /**
     * Get first The ultimate customer order reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::first($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The ultimate customer order reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::next($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The ultimate customer order reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::previous($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ultimate customer order reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::last($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ultimate customer order reference (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->ultimateCustomerOrderReferences as $ultimateCustomerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($ultimateCustomerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ultimate customer order reference (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstUltimateCustomerOrderReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstUltimateCustomerOrderReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->ultimateCustomerOrderReferences as $ultimateCustomerOrderReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($ultimateCustomerOrderReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The ultimate customer order reference (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterUltimateCustomerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->ultimateCustomerOrderReferences, $callback);
    }

    /**
     * Get first The ultimate customer order reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstUltimateCustomerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredUltimateCustomerOrderReference = $this->filterUltimateCustomerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredUltimateCustomerOrderReference)) {
            $ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::first($filteredUltimateCustomerOrderReference);
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ultimate customer order reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastUltimateCustomerOrderReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredUltimateCustomerOrderReference = $this->filterUltimateCustomerOrderReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredUltimateCustomerOrderReference)) {
            $ultimateCustomerOrderReference = InvoiceSuiteArrayUtils::last($filteredUltimateCustomerOrderReference);
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the despatch advice reference (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getDespatchAdviceReferences(): array
    {
        return $this->despatchAdviceReferences;
    }

    /**
     * Sets the despatch advice reference (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $despatchAdviceReferences The despatch advice reference (line reference)
     * @return static
     */
    public function setDespatchAdviceReferences(
        array $despatchAdviceReferences
    ): static {
        foreach ($despatchAdviceReferences as $despatchAdviceReferencesItem) {
            $this->addDespatchAdviceReference($despatchAdviceReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The despatch advice reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $despatchAdviceReference The despatch advice reference (line reference)
     * @return static
     */
    public function addDespatchAdviceReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $despatchAdviceReference
    ): static {
        if (is_null($despatchAdviceReference)) {
            return $this;
        }

        $this->despatchAdviceReferences[] = $despatchAdviceReference;

        return $this;
    }

    /**
     * Get first The despatch advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($despatchAdviceReference = InvoiceSuiteArrayUtils::first($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The despatch advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($despatchAdviceReference = InvoiceSuiteArrayUtils::next($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The despatch advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($despatchAdviceReference = InvoiceSuiteArrayUtils::previous($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The despatch advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($despatchAdviceReference = InvoiceSuiteArrayUtils::last($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The despatch advice reference (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->despatchAdviceReferences as $despatchAdviceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($despatchAdviceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The despatch advice reference (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstDespatchAdviceReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstDespatchAdviceReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->despatchAdviceReferences as $despatchAdviceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($despatchAdviceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The despatch advice reference (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterDespatchAdviceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->despatchAdviceReferences, $callback);
    }

    /**
     * Get first The despatch advice reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstDespatchAdviceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDespatchAdviceReference = $this->filterDespatchAdviceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDespatchAdviceReference)) {
            $despatchAdviceReference = InvoiceSuiteArrayUtils::first($filteredDespatchAdviceReference);
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The despatch advice reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastDespatchAdviceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDespatchAdviceReference = $this->filterDespatchAdviceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDespatchAdviceReference)) {
            $despatchAdviceReference = InvoiceSuiteArrayUtils::last($filteredDespatchAdviceReference);
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the receiving advice reference (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getReceivingAdviceReferences(): array
    {
        return $this->receivingAdviceReferences;
    }

    /**
     * Sets the receiving advice reference (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $receivingAdviceReferences The receiving advice reference (line reference)
     * @return static
     */
    public function setReceivingAdviceReferences(
        array $receivingAdviceReferences
    ): static {
        foreach ($receivingAdviceReferences as $receivingAdviceReferencesItem) {
            $this->addReceivingAdviceReference($receivingAdviceReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The receiving advice reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $receivingAdviceReference The receiving advice reference (line reference)
     * @return static
     */
    public function addReceivingAdviceReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $receivingAdviceReference
    ): static {
        if (is_null($receivingAdviceReference)) {
            return $this;
        }

        $this->receivingAdviceReferences[] = $receivingAdviceReference;

        return $this;
    }

    /**
     * Get first The receiving advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($receivingAdviceReference = InvoiceSuiteArrayUtils::first($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The receiving advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($receivingAdviceReference = InvoiceSuiteArrayUtils::next($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The receiving advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($receivingAdviceReference = InvoiceSuiteArrayUtils::previous($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The receiving advice reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($receivingAdviceReference = InvoiceSuiteArrayUtils::last($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The receiving advice reference (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->receivingAdviceReferences as $receivingAdviceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($receivingAdviceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The receiving advice reference (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstReceivingAdviceReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstReceivingAdviceReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->receivingAdviceReferences as $receivingAdviceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($receivingAdviceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The receiving advice reference (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterReceivingAdviceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->receivingAdviceReferences, $callback);
    }

    /**
     * Get first The receiving advice reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstReceivingAdviceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredReceivingAdviceReference = $this->filterReceivingAdviceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredReceivingAdviceReference)) {
            $receivingAdviceReference = InvoiceSuiteArrayUtils::first($filteredReceivingAdviceReference);
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The receiving advice reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastReceivingAdviceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredReceivingAdviceReference = $this->filterReceivingAdviceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredReceivingAdviceReference)) {
            $receivingAdviceReference = InvoiceSuiteArrayUtils::last($filteredReceivingAdviceReference);
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the delivery note reference (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function getDeliveryNoteReferences(): array
    {
        return $this->deliveryNoteReferences;
    }

    /**
     * Sets the delivery note reference (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineDTO> $deliveryNoteReferences The delivery note reference (line reference)
     * @return static
     */
    public function setDeliveryNoteReferences(
        array $deliveryNoteReferences
    ): static {
        foreach ($deliveryNoteReferences as $deliveryNoteReferencesItem) {
            $this->addDeliveryNoteReference($deliveryNoteReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The delivery note reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $deliveryNoteReference The delivery note reference (line reference)
     * @return static
     */
    public function addDeliveryNoteReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $deliveryNoteReference
    ): static {
        if (is_null($deliveryNoteReference)) {
            return $this;
        }

        $this->deliveryNoteReferences[] = $deliveryNoteReference;

        return $this;
    }

    /**
     * Get first The delivery note reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryNoteReference = InvoiceSuiteArrayUtils::first($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The delivery note reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryNoteReference = InvoiceSuiteArrayUtils::next($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The delivery note reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryNoteReference = InvoiceSuiteArrayUtils::previous($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The delivery note reference (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryNoteReference = InvoiceSuiteArrayUtils::last($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The delivery note reference (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->deliveryNoteReferences as $deliveryNoteReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($deliveryNoteReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The delivery note reference (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstDeliveryNoteReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstDeliveryNoteReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->deliveryNoteReferences as $deliveryNoteReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($deliveryNoteReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The delivery note reference (line reference)
     *
     * @param  callable                                    $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineDTO>
     */
    public function filterDeliveryNoteReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->deliveryNoteReferences, $callback);
    }

    /**
     * Get first The delivery note reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstDeliveryNoteReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDeliveryNoteReference = $this->filterDeliveryNoteReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDeliveryNoteReference)) {
            $deliveryNoteReference = InvoiceSuiteArrayUtils::first($filteredDeliveryNoteReference);
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The delivery note reference (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastDeliveryNoteReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDeliveryNoteReference = $this->filterDeliveryNoteReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDeliveryNoteReference)) {
            $deliveryNoteReference = InvoiceSuiteArrayUtils::last($filteredDeliveryNoteReference);
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the additional invoice document (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    public function getInvoiceReferences(): array
    {
        return $this->invoiceReferences;
    }

    /**
     * Sets the additional invoice document (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentLineExtDTO> $invoiceReferences The additional invoice document (line reference)
     * @return static
     */
    public function setInvoiceReferences(
        array $invoiceReferences
    ): static {
        foreach ($invoiceReferences as $invoiceReferencesItem) {
            $this->addInvoiceReference($invoiceReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The additional invoice document (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineExtDTO $invoiceReference The additional invoice document (line reference)
     * @return static
     */
    public function addInvoiceReference(
        ?InvoiceSuiteReferenceDocumentLineExtDTO $invoiceReference
    ): static {
        if (is_null($invoiceReference)) {
            return $this;
        }

        $this->invoiceReferences[] = $invoiceReference;

        return $this;
    }

    /**
     * Get first The additional invoice document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($invoiceReference = InvoiceSuiteArrayUtils::first($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The additional invoice document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($invoiceReference = InvoiceSuiteArrayUtils::next($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The additional invoice document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($invoiceReference = InvoiceSuiteArrayUtils::previous($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional invoice document (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($invoiceReference = InvoiceSuiteArrayUtils::last($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional invoice document (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->invoiceReferences as $invoiceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($invoiceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional invoice document (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstInvoiceReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstInvoiceReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->invoiceReferences as $invoiceReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($invoiceReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The additional invoice document (line reference)
     *
     * @param  callable                                       $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentLineExtDTO>
     */
    public function filterInvoiceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->invoiceReferences, $callback);
    }

    /**
     * Get first The additional invoice document (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstInvoiceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredInvoiceReference = $this->filterInvoiceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredInvoiceReference)) {
            $invoiceReference = InvoiceSuiteArrayUtils::first($filteredInvoiceReference);
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional invoice document (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastInvoiceReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredInvoiceReference = $this->filterInvoiceReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredInvoiceReference)) {
            $invoiceReference = InvoiceSuiteArrayUtils::last($filteredInvoiceReference);
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the additional object references (line reference)
     *
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function getAdditionalObjectReferences(): array
    {
        return $this->additionalObjectReferences;
    }

    /**
     * Sets the additional object references (line reference)
     *
     * @param  array<InvoiceSuiteReferenceDocumentExtDTO> $additionalObjectReferences The additional object references (line reference)
     * @return static
     */
    public function setAdditionalObjectReferences(
        array $additionalObjectReferences
    ): static {
        foreach ($additionalObjectReferences as $additionalObjectReferencesItem) {
            $this->addAdditionalObjectReference($additionalObjectReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The additional object references (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentExtDTO $additionalObjectReference The additional object references (line reference)
     * @return static
     */
    public function addAdditionalObjectReference(
        ?InvoiceSuiteReferenceDocumentExtDTO $additionalObjectReference
    ): static {
        if (is_null($additionalObjectReference)) {
            return $this;
        }

        $this->additionalObjectReferences[] = $additionalObjectReference;

        return $this;
    }

    /**
     * Get first The additional object references (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstAdditionalObjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalObjectReference = InvoiceSuiteArrayUtils::first($this->additionalObjectReferences)) !== false) {
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The additional object references (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextAdditionalObjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalObjectReference = InvoiceSuiteArrayUtils::next($this->additionalObjectReferences)) !== false) {
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The additional object references (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousAdditionalObjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalObjectReference = InvoiceSuiteArrayUtils::previous($this->additionalObjectReferences)) !== false) {
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional object references (line reference)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastAdditionalObjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($additionalObjectReference = InvoiceSuiteArrayUtils::last($this->additionalObjectReferences)) !== false) {
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional object references (line reference) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachAdditionalObjectReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->additionalObjectReferences as $additionalObjectReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($additionalObjectReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional object references (line reference) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstAdditionalObjectReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstAdditionalObjectReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->additionalObjectReferences as $additionalObjectReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($additionalObjectReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The additional object references (line reference)
     *
     * @param  callable                                   $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function filterAdditionalObjectReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->additionalObjectReferences, $callback);
    }

    /**
     * Get first The additional object references (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstAdditionalObjectReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAdditionalObjectReference = $this->filterAdditionalObjectReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAdditionalObjectReference)) {
            $additionalObjectReference = InvoiceSuiteArrayUtils::first($filteredAdditionalObjectReference);
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional object references (line reference) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastAdditionalObjectReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAdditionalObjectReference = $this->filterAdditionalObjectReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAdditionalObjectReference)) {
            $additionalObjectReference = InvoiceSuiteArrayUtils::last($filteredAdditionalObjectReference);
            $callback($additionalObjectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the gross price
     *
     * @return null|InvoiceSuitePriceGrossDTO
     */
    public function getGrossPrice(): ?InvoiceSuitePriceGrossDTO
    {
        return $this->grossPrice;
    }

    /**
     * Sets the gross price
     *
     * @param  null|InvoiceSuitePriceGrossDTO $grossPrice The gross price
     * @return static
     */
    public function setGrossPrice(
        ?InvoiceSuitePriceGrossDTO $grossPrice
    ): static {
        $this->grossPrice = $grossPrice;

        return $this;
    }

    /**
     * Returns the net price
     *
     * @return null|InvoiceSuitePriceNetDTO
     */
    public function getNetPrice(): ?InvoiceSuitePriceNetDTO
    {
        return $this->netPrice;
    }

    /**
     * Sets the net price
     *
     * @param  null|InvoiceSuitePriceNetDTO $netPrice The net price
     * @return static
     */
    public function setNetPrice(
        ?InvoiceSuitePriceNetDTO $netPrice
    ): static {
        $this->netPrice = $netPrice;

        return $this;
    }

    /**
     * Returns the billed quantity
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getQuantityBilled(): ?InvoiceSuiteQuantityDTO
    {
        return $this->quantityBilled;
    }

    /**
     * Sets the billed quantity
     *
     * @param  null|InvoiceSuiteQuantityDTO $quantityBilled The billed quantity
     * @return static
     */
    public function setQuantityBilled(
        ?InvoiceSuiteQuantityDTO $quantityBilled
    ): static {
        $this->quantityBilled = $quantityBilled;

        return $this;
    }

    /**
     * Returns the charge-free quantity
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getQuantityChargeFree(): ?InvoiceSuiteQuantityDTO
    {
        return $this->quantityChargeFree;
    }

    /**
     * Sets the charge-free quantity
     *
     * @param  null|InvoiceSuiteQuantityDTO $quantityChargeFree The charge-free quantity
     * @return static
     */
    public function setQuantityChargeFree(
        ?InvoiceSuiteQuantityDTO $quantityChargeFree
    ): static {
        $this->quantityChargeFree = $quantityChargeFree;

        return $this;
    }

    /**
     * Returns the package quantity
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getQuantityPackage(): ?InvoiceSuiteQuantityDTO
    {
        return $this->quantityPackage;
    }

    /**
     * Sets the package quantity
     *
     * @param  null|InvoiceSuiteQuantityDTO $quantityPackage The package quantity
     * @return static
     */
    public function setQuantityPackage(
        ?InvoiceSuiteQuantityDTO $quantityPackage
    ): static {
        $this->quantityPackage = $quantityPackage;

        return $this;
    }

    /**
     * Returns the per-package quantity
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getQuantityPerPackage(): ?InvoiceSuiteQuantityDTO
    {
        return $this->quantityPerPackage;
    }

    /**
     * Sets the per-package quantity
     *
     * @param  null|InvoiceSuiteQuantityDTO $quantityPerPackage The per-package quantity
     * @return static
     */
    public function setQuantityPerPackage(
        ?InvoiceSuiteQuantityDTO $quantityPerPackage
    ): static {
        $this->quantityPerPackage = $quantityPerPackage;

        return $this;
    }

    /**
     * Returns the Ship-To Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getShipToParty(): ?InvoiceSuitePartyDTO
    {
        return $this->shipToParty;
    }

    /**
     * Sets the Ship-To Party
     *
     * @param  null|InvoiceSuitePartyDTO $shipToParty The Ship-To Party
     * @return static
     */
    public function setShipToParty(
        ?InvoiceSuitePartyDTO $shipToParty
    ): static {
        $this->shipToParty = $shipToParty;

        return $this;
    }

    /**
     * Returns the Ultimate Ship-To Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getUltimateShipToParty(): ?InvoiceSuitePartyDTO
    {
        return $this->ultimateShipToParty;
    }

    /**
     * Sets the Ultimate Ship-To Party
     *
     * @param  null|InvoiceSuitePartyDTO $ultimateShipToParty The Ultimate Ship-To Party
     * @return static
     */
    public function setUltimateShipToParty(
        ?InvoiceSuitePartyDTO $ultimateShipToParty
    ): static {
        $this->ultimateShipToParty = $ultimateShipToParty;

        return $this;
    }

    /**
     * Returns the date of the delivery
     *
     * @return array<DateTimeInterface>
     */
    public function getSupplyChainEvents(): array
    {
        return $this->supplyChainEvents;
    }

    /**
     * Sets the date of the delivery
     *
     * @param  array<DateTimeInterface> $supplyChainEvents The date of the delivery
     * @return static
     */
    public function setSupplyChainEvents(
        array $supplyChainEvents
    ): static {
        foreach ($supplyChainEvents as $supplyChainEventsItem) {
            $this->addSupplyChainEvent($supplyChainEventsItem);
        }

        return $this;
    }

    /**
     * Add single The date of the delivery
     *
     * @param  DateTimeInterface $supplyChainEvent The date of the delivery
     * @return static
     */
    public function addSupplyChainEvent(
        ?DateTimeInterface $supplyChainEvent
    ): static {
        if (is_null($supplyChainEvent)) {
            return $this;
        }

        $this->supplyChainEvents[] = $supplyChainEvent;

        return $this;
    }

    /**
     * Get first The date of the delivery
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstSupplyChainEvent(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($supplyChainEvent = InvoiceSuiteArrayUtils::first($this->supplyChainEvents)) !== false) {
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The date of the delivery
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextSupplyChainEvent(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($supplyChainEvent = InvoiceSuiteArrayUtils::next($this->supplyChainEvents)) !== false) {
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The date of the delivery
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousSupplyChainEvent(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($supplyChainEvent = InvoiceSuiteArrayUtils::previous($this->supplyChainEvents)) !== false) {
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The date of the delivery
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastSupplyChainEvent(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($supplyChainEvent = InvoiceSuiteArrayUtils::last($this->supplyChainEvents)) !== false) {
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The date of the delivery and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachSupplyChainEvent(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->supplyChainEvents as $supplyChainEvent) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($supplyChainEvent);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The date of the delivery and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstSupplyChainEvent(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstSupplyChainEvent($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->supplyChainEvents as $supplyChainEvent) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($supplyChainEvent);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The date of the delivery
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<DateTimeInterface>
     */
    public function filterSupplyChainEvent(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->supplyChainEvents, $callback);
    }

    /**
     * Get first The date of the delivery from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstSupplyChainEvent(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSupplyChainEvent = $this->filterSupplyChainEvent($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSupplyChainEvent)) {
            $supplyChainEvent = InvoiceSuiteArrayUtils::first($filteredSupplyChainEvent);
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The date of the delivery from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastSupplyChainEvent(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSupplyChainEvent = $this->filterSupplyChainEvent($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSupplyChainEvent)) {
            $supplyChainEvent = InvoiceSuiteArrayUtils::last($filteredSupplyChainEvent);
            $callback($supplyChainEvent);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the start and/or end date of the billing period
     *
     * @return array<InvoiceSuiteDateRangeDTO>
     */
    public function getBillingPeriods(): array
    {
        return $this->billingPeriods;
    }

    /**
     * Sets the start and/or end date of the billing period
     *
     * @param  array<InvoiceSuiteDateRangeDTO> $billingPeriods The start and/or end date of the billing period
     * @return static
     */
    public function setBillingPeriods(
        array $billingPeriods
    ): static {
        foreach ($billingPeriods as $billingPeriodsItem) {
            $this->addBillingPeriod($billingPeriodsItem);
        }

        return $this;
    }

    /**
     * Add single The start and/or end date of the billing period
     *
     * @param  InvoiceSuiteDateRangeDTO $billingPeriod The start and/or end date of the billing period
     * @return static
     */
    public function addBillingPeriod(
        ?InvoiceSuiteDateRangeDTO $billingPeriod
    ): static {
        if (is_null($billingPeriod)) {
            return $this;
        }

        $this->billingPeriods[] = $billingPeriod;

        return $this;
    }

    /**
     * Get first The start and/or end date of the billing period
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstBillingPeriod(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($billingPeriod = InvoiceSuiteArrayUtils::first($this->billingPeriods)) !== false) {
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The start and/or end date of the billing period
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextBillingPeriod(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($billingPeriod = InvoiceSuiteArrayUtils::next($this->billingPeriods)) !== false) {
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The start and/or end date of the billing period
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousBillingPeriod(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($billingPeriod = InvoiceSuiteArrayUtils::previous($this->billingPeriods)) !== false) {
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The start and/or end date of the billing period
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastBillingPeriod(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($billingPeriod = InvoiceSuiteArrayUtils::last($this->billingPeriods)) !== false) {
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The start and/or end date of the billing period and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachBillingPeriod(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->billingPeriods as $billingPeriod) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($billingPeriod);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The start and/or end date of the billing period and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstBillingPeriod(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstBillingPeriod($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->billingPeriods as $billingPeriod) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($billingPeriod);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The start and/or end date of the billing period
     *
     * @param  callable                        $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteDateRangeDTO>
     */
    public function filterBillingPeriod(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->billingPeriods, $callback);
    }

    /**
     * Get first The start and/or end date of the billing period from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstBillingPeriod(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBillingPeriod = $this->filterBillingPeriod($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBillingPeriod)) {
            $billingPeriod = InvoiceSuiteArrayUtils::first($filteredBillingPeriod);
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The start and/or end date of the billing period from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastBillingPeriod(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBillingPeriod = $this->filterBillingPeriod($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBillingPeriod)) {
            $billingPeriod = InvoiceSuiteArrayUtils::last($filteredBillingPeriod);
            $callback($billingPeriod);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the posting reference
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getPostingReferences(): array
    {
        return $this->postingReferences;
    }

    /**
     * Sets the posting reference
     *
     * @param  array<InvoiceSuiteIdDTO> $postingReferences The posting reference
     * @return static
     */
    public function setPostingReferences(
        array $postingReferences
    ): static {
        foreach ($postingReferences as $postingReferencesItem) {
            $this->addPostingReference($postingReferencesItem);
        }

        return $this;
    }

    /**
     * Add single The posting reference
     *
     * @param  InvoiceSuiteIdDTO $postingReference The posting reference
     * @return static
     */
    public function addPostingReference(
        ?InvoiceSuiteIdDTO $postingReference
    ): static {
        if (is_null($postingReference)) {
            return $this;
        }

        $this->postingReferences[] = $postingReference;

        return $this;
    }

    /**
     * Get first The posting reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstPostingReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($postingReference = InvoiceSuiteArrayUtils::first($this->postingReferences)) !== false) {
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The posting reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextPostingReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($postingReference = InvoiceSuiteArrayUtils::next($this->postingReferences)) !== false) {
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The posting reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousPostingReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($postingReference = InvoiceSuiteArrayUtils::previous($this->postingReferences)) !== false) {
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The posting reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastPostingReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($postingReference = InvoiceSuiteArrayUtils::last($this->postingReferences)) !== false) {
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The posting reference and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachPostingReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->postingReferences as $postingReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($postingReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The posting reference and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstPostingReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstPostingReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->postingReferences as $postingReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($postingReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The posting reference
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterPostingReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->postingReferences, $callback);
    }

    /**
     * Get first The posting reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstPostingReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPostingReference = $this->filterPostingReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPostingReference)) {
            $postingReference = InvoiceSuiteArrayUtils::first($filteredPostingReference);
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The posting reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastPostingReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPostingReference = $this->filterPostingReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPostingReference)) {
            $postingReference = InvoiceSuiteArrayUtils::last($filteredPostingReference);
            $callback($postingReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the VAT breakdown
     *
     * @return array<InvoiceSuiteTaxDTO>
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * Sets the VAT breakdown
     *
     * @param  array<InvoiceSuiteTaxDTO> $taxes The VAT breakdown
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
     * Add single The VAT breakdown
     *
     * @param  InvoiceSuiteTaxDTO $tax The VAT breakdown
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
     * Get first The VAT breakdown
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
     * Get next The VAT breakdown
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
     * Get previous The VAT breakdown
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
     * Get last The VAT breakdown
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
     * Loop over The VAT breakdown and execute callback
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
     * Loop over The VAT breakdown and execute callback
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
     * Filter The VAT breakdown
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
     * Get first The VAT breakdown from filtered result
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
     * Get last The VAT breakdown from filtered result
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

    /**
     * Returns the allowances/charges
     *
     * @return array<InvoiceSuiteAllowanceChargeDTO>
     */
    public function getAllowanceCharges(): array
    {
        return $this->allowanceCharges;
    }

    /**
     * Sets the allowances/charges
     *
     * @param  array<InvoiceSuiteAllowanceChargeDTO> $allowanceCharges The allowances/charges
     * @return static
     */
    public function setAllowanceCharges(
        array $allowanceCharges
    ): static {
        foreach ($allowanceCharges as $allowanceChargesItem) {
            $this->addAllowanceCharge($allowanceChargesItem);
        }

        return $this;
    }

    /**
     * Add single The allowances/charges
     *
     * @param  InvoiceSuiteAllowanceChargeDTO $allowanceCharge The allowances/charges
     * @return static
     */
    public function addAllowanceCharge(
        ?InvoiceSuiteAllowanceChargeDTO $allowanceCharge
    ): static {
        if (is_null($allowanceCharge)) {
            return $this;
        }

        $this->allowanceCharges[] = $allowanceCharge;

        return $this;
    }

    /**
     * Get first The allowances/charges
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($allowanceCharge = InvoiceSuiteArrayUtils::first($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The allowances/charges
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($allowanceCharge = InvoiceSuiteArrayUtils::next($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The allowances/charges
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($allowanceCharge = InvoiceSuiteArrayUtils::previous($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The allowances/charges
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($allowanceCharge = InvoiceSuiteArrayUtils::last($this->allowanceCharges)) !== false) {
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The allowances/charges and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachAllowanceCharge(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->allowanceCharges as $allowanceCharge) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($allowanceCharge);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The allowances/charges and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstAllowanceCharge(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstAllowanceCharge($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->allowanceCharges as $allowanceCharge) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($allowanceCharge);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The allowances/charges
     *
     * @param  callable                              $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteAllowanceChargeDTO>
     */
    public function filterAllowanceCharge(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->allowanceCharges, $callback);
    }

    /**
     * Get first The allowances/charges from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstAllowanceCharge(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAllowanceCharge = $this->filterAllowanceCharge($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAllowanceCharge)) {
            $allowanceCharge = InvoiceSuiteArrayUtils::first($filteredAllowanceCharge);
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The allowances/charges from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastAllowanceCharge(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAllowanceCharge = $this->filterAllowanceCharge($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAllowanceCharge)) {
            $allowanceCharge = InvoiceSuiteArrayUtils::last($filteredAllowanceCharge);
            $callback($allowanceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the summation
     *
     * @return null|InvoiceSuitesummationLineDTO
     */
    public function getSummation(): ?InvoiceSuitesummationLineDTO
    {
        return $this->summation;
    }

    /**
     * Sets the summation
     *
     * @param  null|InvoiceSuitesummationLineDTO $summation The summation
     * @return static
     */
    public function setSummation(
        ?InvoiceSuitesummationLineDTO $summation
    ): static {
        $this->summation = $summation;

        return $this;
    }
}
