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
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentPositionDTO
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
        ?InvoiceSuitesummationLineDTO $summation = null,
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
        $this->note = $note;

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
        if (($note = reset($this->note)) !== false) {
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
        if (($note = next($this->note)) !== false) {
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
        if (($note = prev($this->note)) !== false) {
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
        if (($note = end($this->note)) !== false) {
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteNoteDTO>,
     */
    public function filterNote(
        callable $callback
    ): array {
        return array_filter($this->note, $callback);
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
        $this->sellerOrderReferences = $sellerOrderReferences;

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
        if (($sellerOrderReference = reset($this->sellerOrderReferences)) !== false) {
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
        if (($sellerOrderReference = next($this->sellerOrderReferences)) !== false) {
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
        if (($sellerOrderReference = prev($this->sellerOrderReferences)) !== false) {
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
        if (($sellerOrderReference = end($this->sellerOrderReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterSellerOrderReference(
        callable $callback
    ): array {
        return array_filter($this->sellerOrderReferences, $callback);
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
        $this->buyerOrderReferences = $buyerOrderReferences;

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
        if (($buyerOrderReference = reset($this->buyerOrderReferences)) !== false) {
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
        if (($buyerOrderReference = next($this->buyerOrderReferences)) !== false) {
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
        if (($buyerOrderReference = prev($this->buyerOrderReferences)) !== false) {
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
        if (($buyerOrderReference = end($this->buyerOrderReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterBuyerOrderReference(
        callable $callback
    ): array {
        return array_filter($this->buyerOrderReferences, $callback);
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
        $this->quotationReferences = $quotationReferences;

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
        if (($quotationReference = reset($this->quotationReferences)) !== false) {
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
        if (($quotationReference = next($this->quotationReferences)) !== false) {
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
        if (($quotationReference = prev($this->quotationReferences)) !== false) {
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
        if (($quotationReference = end($this->quotationReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterQuotationReference(
        callable $callback
    ): array {
        return array_filter($this->quotationReferences, $callback);
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
        $this->contractReferences = $contractReferences;

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
        if (($contractReference = reset($this->contractReferences)) !== false) {
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
        if (($contractReference = next($this->contractReferences)) !== false) {
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
        if (($contractReference = prev($this->contractReferences)) !== false) {
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
        if (($contractReference = end($this->contractReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterContractReference(
        callable $callback
    ): array {
        return array_filter($this->contractReferences, $callback);
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
        $this->additionalReferences = $additionalReferences;

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
        if (($additionalReference = reset($this->additionalReferences)) !== false) {
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
        if (($additionalReference = next($this->additionalReferences)) !== false) {
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
        if (($additionalReference = prev($this->additionalReferences)) !== false) {
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
        if (($additionalReference = end($this->additionalReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineExtDTO>,
     */
    public function filterAdditionalReference(
        callable $callback
    ): array {
        return array_filter($this->additionalReferences, $callback);
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
        $this->ultimateCustomerOrderReferences = $ultimateCustomerOrderReferences;

        return $this;
    }

    /**
     * Add single The ultimate customer order reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $ultimateCustomerOrderReference The ultimate customer order reference (line reference)
     * @return static
     */
    public function addUltimateCustomerOrderReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $ultimateCustomerOrderReference,
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
        if (($ultimateCustomerOrderReference = reset($this->ultimateCustomerOrderReferences)) !== false) {
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
        if (($ultimateCustomerOrderReference = next($this->ultimateCustomerOrderReferences)) !== false) {
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
        if (($ultimateCustomerOrderReference = prev($this->ultimateCustomerOrderReferences)) !== false) {
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
        if (($ultimateCustomerOrderReference = end($this->ultimateCustomerOrderReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterUltimateCustomerOrderReference(
        callable $callback
    ): array {
        return array_filter($this->ultimateCustomerOrderReferences, $callback);
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
        $this->despatchAdviceReferences = $despatchAdviceReferences;

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
        if (($despatchAdviceReference = reset($this->despatchAdviceReferences)) !== false) {
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
        if (($despatchAdviceReference = next($this->despatchAdviceReferences)) !== false) {
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
        if (($despatchAdviceReference = prev($this->despatchAdviceReferences)) !== false) {
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
        if (($despatchAdviceReference = end($this->despatchAdviceReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterDespatchAdviceReference(
        callable $callback
    ): array {
        return array_filter($this->despatchAdviceReferences, $callback);
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
        $this->receivingAdviceReferences = $receivingAdviceReferences;

        return $this;
    }

    /**
     * Add single The receiving advice reference (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentLineDTO $receivingAdviceReference The receiving advice reference (line reference)
     * @return static
     */
    public function addReceivingAdviceReference(
        ?InvoiceSuiteReferenceDocumentLineDTO $receivingAdviceReference,
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
        if (($receivingAdviceReference = reset($this->receivingAdviceReferences)) !== false) {
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
        if (($receivingAdviceReference = next($this->receivingAdviceReferences)) !== false) {
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
        if (($receivingAdviceReference = prev($this->receivingAdviceReferences)) !== false) {
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
        if (($receivingAdviceReference = end($this->receivingAdviceReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterReceivingAdviceReference(
        callable $callback
    ): array {
        return array_filter($this->receivingAdviceReferences, $callback);
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
        $this->deliveryNoteReferences = $deliveryNoteReferences;

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
        if (($deliveryNoteReference = reset($this->deliveryNoteReferences)) !== false) {
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
        if (($deliveryNoteReference = next($this->deliveryNoteReferences)) !== false) {
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
        if (($deliveryNoteReference = prev($this->deliveryNoteReferences)) !== false) {
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
        if (($deliveryNoteReference = end($this->deliveryNoteReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineDTO>,
     */
    public function filterDeliveryNoteReference(
        callable $callback
    ): array {
        return array_filter($this->deliveryNoteReferences, $callback);
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
        $this->invoiceReferences = $invoiceReferences;

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
        if (($invoiceReference = reset($this->invoiceReferences)) !== false) {
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
        if (($invoiceReference = next($this->invoiceReferences)) !== false) {
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
        if (($invoiceReference = prev($this->invoiceReferences)) !== false) {
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
        if (($invoiceReference = end($this->invoiceReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentLineExtDTO>,
     */
    public function filterInvoiceReference(
        callable $callback
    ): array {
        return array_filter($this->invoiceReferences, $callback);
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
        $this->additionalObjectReferences = $additionalObjectReferences;

        return $this;
    }

    /**
     * Add single The additional object references (line reference)
     *
     * @param  InvoiceSuiteReferenceDocumentExtDTO $additionalObjectReference The additional object references (line reference)
     * @return static
     */
    public function addAdditionalObjectReference(
        ?InvoiceSuiteReferenceDocumentExtDTO $additionalObjectReference,
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
        if (($additionalObjectReference = reset($this->additionalObjectReferences)) !== false) {
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
        if (($additionalObjectReference = next($this->additionalObjectReferences)) !== false) {
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
        if (($additionalObjectReference = prev($this->additionalObjectReferences)) !== false) {
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
        if (($additionalObjectReference = end($this->additionalObjectReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceDocumentExtDTO>,
     */
    public function filterAdditionalObjectReference(
        callable $callback
    ): array {
        return array_filter($this->additionalObjectReferences, $callback);
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
        $this->supplyChainEvents = $supplyChainEvents;

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
        if (($supplyChainEvent = reset($this->supplyChainEvents)) !== false) {
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
        if (($supplyChainEvent = next($this->supplyChainEvents)) !== false) {
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
        if (($supplyChainEvent = prev($this->supplyChainEvents)) !== false) {
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
        if (($supplyChainEvent = end($this->supplyChainEvents)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<DateTimeInterface>,
     */
    public function filterSupplyChainEvent(
        callable $callback
    ): array {
        return array_filter($this->supplyChainEvents, $callback);
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
        $this->billingPeriods = $billingPeriods;

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
        if (($billingPeriod = reset($this->billingPeriods)) !== false) {
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
        if (($billingPeriod = next($this->billingPeriods)) !== false) {
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
        if (($billingPeriod = prev($this->billingPeriods)) !== false) {
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
        if (($billingPeriod = end($this->billingPeriods)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteDateRangeDTO>,
     */
    public function filterBillingPeriod(
        callable $callback
    ): array {
        return array_filter($this->billingPeriods, $callback);
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
        $this->postingReferences = $postingReferences;

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
        if (($postingReference = reset($this->postingReferences)) !== false) {
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
        if (($postingReference = next($this->postingReferences)) !== false) {
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
        if (($postingReference = prev($this->postingReferences)) !== false) {
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
        if (($postingReference = end($this->postingReferences)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteIdDTO>,
     */
    public function filterPostingReference(
        callable $callback
    ): array {
        return array_filter($this->postingReferences, $callback);
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
        $this->taxes = $taxes;

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
        if (($tax = reset($this->taxes)) !== false) {
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
        if (($tax = next($this->taxes)) !== false) {
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
        if (($tax = prev($this->taxes)) !== false) {
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
        if (($tax = end($this->taxes)) !== false) {
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteTaxDTO>,
     */
    public function filterTax(
        callable $callback
    ): array {
        return array_filter($this->taxes, $callback);
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
        $this->allowanceCharges = $allowanceCharges;

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
        if (($allowanceCharge = reset($this->allowanceCharges)) !== false) {
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
        if (($allowanceCharge = next($this->allowanceCharges)) !== false) {
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
        if (($allowanceCharge = prev($this->allowanceCharges)) !== false) {
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
        if (($allowanceCharge = end($this->allowanceCharges)) !== false) {
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
        ?int $limit = null,
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
        ?int $limit = null,
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
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteAllowanceChargeDTO>,
     */
    public function filterAllowanceCharge(
        callable $callback): array
    {
        return array_filter($this->allowanceCharges, $callback);
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
        ?InvoiceSuitesummationLineDTO $summation): static
    {
        $this->summation = $summation;

        return $this;
    }
}
