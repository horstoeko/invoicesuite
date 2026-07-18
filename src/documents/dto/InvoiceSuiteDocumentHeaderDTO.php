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
class InvoiceSuiteDocumentHeaderDTO implements JsonSerializable
{
    /**
     * The document number issued by the seller
     *
     * @var null|string
     */
    protected ?string $number = null;

    /**
     * The type of the document expressed as a code
     *
     * @var null|string
     */
    protected ?string $type = null;

    /**
     * The document type as free text
     *
     * @var null|string
     */
    protected ?string $description = null;

    /**
     * The language code in which the document was written
     *
     * @var null|string
     */
    protected ?string $language = null;

    /**
     * Date of the document. The date when the document was issued by the seller
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $date = null;

    /**
     * The contractual due date of the document
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $completeDate = null;

    /**
     * The date of the delivery
     *
     * @var array<DateTimeInterface>
     */
    protected array $supplyChainEvents = [];

    /**
     * The code for the invoice currency
     *
     * @var null|string
     */
    protected ?string $currency = null;

    /**
     * The code for the tax currency
     *
     * @var null|string
     */
    protected ?string $taxCurrency = null;

    /**
     * The flag that indicated that this document is a copy
     *
     * @var null|bool
     */
    protected ?bool $isCopy = null;

    /**
     * The flag that indicated that this document is a test
     *
     * @var null|bool
     */
    protected ?bool $isTest = null;

    /**
     * The notes for this document
     *
     * @var array<InvoiceSuiteNoteDTO>
     */
    protected array $notes = [];

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
     * The associated seller's order confirmation
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $sellerOrderReferences = [];

    /**
     * The associated buyer's order
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $buyerOrderReferences = [];

    /**
     * The associated quotation
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $quotationReferences = [];

    /**
     * The associated contract
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $contractReferences = [];

    /**
     * The additional associated document
     *
     * @var array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    protected array $additionalReferences = [];

    /**
     * The additional invoice document
     *
     * @var array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    protected array $invoiceReferences = [];

    /**
     * The project reference
     *
     * @var array<InvoiceSuiteProjectDTO>
     */
    protected array $projectReferences = [];

    /**
     * The ultimate customer order reference
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $ultimateCustomerOrderReferences = [];

    /**
     * The despatch advice reference
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $despatchAdviceReferences = [];

    /**
     * The receiving advice reference
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $receivingAdviceReferences = [];

    /**
     * The delivery note reference
     *
     * @var array<InvoiceSuiteReferenceDocumentDTO>
     */
    protected array $deliveryNoteReferences = [];

    /**
     * The Seller/Supplier Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $sellerParty = null;

    /**
     * The Buyer/Customer Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $buyerParty = null;

    /**
     * The Seller's Tax Representativ Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $sellerTaxRepresentativeParty = null;

    /**
     * The Buyer's Tax Representativ Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $buyerTaxRepresentativeParty = null;

    /**
     * The Sales Agent Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $salesAgentParty = null;

    /**
     * The Buyer Agent Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $buyerAgentParty = null;

    /**
     * The Product Enduser Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $productEndUserParty = null;

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
     * The Ship-From Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $shipFromParty = null;

    /**
     * The Invoicer Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $invoicerParty = null;

    /**
     * The Invoicee Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $invoiceeParty = null;

    /**
     * The Payee Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $payeeParty = null;

    /**
     * The Payer Party
     *
     * @var null|InvoiceSuitePartyDTO
     */
    protected ?InvoiceSuitePartyDTO $payerParty = null;

    /**
     * The payment means
     *
     * @var array<InvoiceSuitePaymentMeanDTO>
     */
    protected array $paymentMeans = [];

    /**
     * The payment terms
     *
     * @var array<InvoiceSuitePaymentTermDTO>
     */
    protected array $paymentTerms = [];

    /**
     * The creditor identifier
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $creditorReferences = [];

    /**
     * The payment reference
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $paymentReferences = [];

    /**
     * The ID for internal routing (Leitweg ID)
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $buyerReferences = [];

    /**
     * The Document positions
     *
     * @var array<InvoiceSuiteDocumentPositionDTO>
     */
    protected array $positions = [];

    /**
     * delivery term
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $deliveryTerms = [];

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
     * The allowances/charges
     *
     * @var array<InvoiceSuiteServiceChargeDTO>
     */
    protected array $serviceCharges = [];

    /**
     * The summation
     *
     * @var array<InvoiceSuiteSummationDTO>
     */
    protected array $summations = [];

    /**
     * Constructor
     *
     * @param null|string                                $number                          The document number issued by the seller
     * @param null|string                                $type                            The type of the document expressed as a code
     * @param null|string                                $description                     The document type as free text
     * @param null|string                                $language                        The language code in which the document was written
     * @param null|DateTimeInterface                     $date                            Date of the document. The date when the document was issued by the seller
     * @param null|DateTimeInterface                     $completeDate                    The contractual due date of the document
     * @param array<DateTimeInterface>                   $supplyChainEvents               The date of the delivery
     * @param null|string                                $currency                        The code for the invoice currency
     * @param null|string                                $taxCurrency                     The code for the tax currency
     * @param null|bool                                  $isCopy                          The flag that indicated that this document is a copy
     * @param null|bool                                  $isTest                          The flag that indicated that this document is a test
     * @param array<InvoiceSuiteNoteDTO>                 $notes                           The notes for this document
     * @param array<InvoiceSuiteDateRangeDTO>            $billingPeriods                  The start and/or end date of the billing period
     * @param array<InvoiceSuiteIdDTO>                   $postingReferences               The posting reference
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $sellerOrderReferences           The associated seller's order confirmation
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $buyerOrderReferences            The associated buyer's order
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $quotationReferences             The associated quotation
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $contractReferences              The associated contract
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $additionalReferences            The additional associated document
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $invoiceReferences               The additional invoice document
     * @param array<InvoiceSuiteProjectDTO>              $projectReferences               The project reference
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $ultimateCustomerOrderReferences The ultimate customer order reference
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $despatchAdviceReferences        The despatch advice reference
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $receivingAdviceReferences       The receiving advice reference
     * @param array<InvoiceSuiteReferenceDocumentDTO>    $deliveryNoteReferences          The delivery note reference
     * @param null|InvoiceSuitePartyDTO                  $sellerParty                     The Seller/Supplier Party
     * @param null|InvoiceSuitePartyDTO                  $buyerParty                      The Buyer/Customer Party
     * @param null|InvoiceSuitePartyDTO                  $sellerTaxRepresentativeParty    The Seller's Tax Representativ Party
     * @param null|InvoiceSuitePartyDTO                  $buyerTaxRepresentativeParty     The Buyer's Tax Representativ Party
     * @param null|InvoiceSuitePartyDTO                  $salesAgentParty                 The Sales Agent Party
     * @param null|InvoiceSuitePartyDTO                  $buyerAgentParty                 The Buyer Agent Party
     * @param null|InvoiceSuitePartyDTO                  $productEndUserParty             The Product Enduser Party
     * @param null|InvoiceSuitePartyDTO                  $shipToParty                     The Ship-To Party
     * @param null|InvoiceSuitePartyDTO                  $ultimateShipToParty             The Ultimate Ship-To Party
     * @param null|InvoiceSuitePartyDTO                  $shipFromParty                   The Ship-From Party
     * @param null|InvoiceSuitePartyDTO                  $invoicerParty                   The Invoicer Party
     * @param null|InvoiceSuitePartyDTO                  $invoiceeParty                   The Invoicee Party
     * @param null|InvoiceSuitePartyDTO                  $payeeParty                      The Payee Party
     * @param null|InvoiceSuitePartyDTO                  $payerParty                      The Payer Party
     * @param array<InvoiceSuitePaymentMeanDTO>          $paymentMeans                    The payment means
     * @param array<InvoiceSuitePaymentTermDTO>          $paymentTerms                    The payment terms
     * @param array<InvoiceSuiteIdDTO>                   $creditorReferences              The creditor identifier
     * @param array<InvoiceSuiteIdDTO>                   $paymentReferences               The payment reference
     * @param array<InvoiceSuiteIdDTO>                   $buyerReferences                 The ID for internal routing (Leitweg ID)
     * @param array<InvoiceSuiteDocumentPositionDTO>     $positions                       The Document positions
     * @param array<InvoiceSuiteIdDTO>                   $deliveryTerms                   delivery term
     * @param array<InvoiceSuiteTaxDTO>                  $taxes                           The VAT breakdown
     * @param array<InvoiceSuiteAllowanceChargeDTO>      $allowanceCharges                The allowances/charges
     * @param array<InvoiceSuiteServiceChargeDTO>        $serviceCharges                  The allowances/charges
     * @param array<InvoiceSuiteSummationDTO>            $summations                      The summation
     */
    public function __construct(
        ?string $number = null,
        ?string $type = null,
        ?string $description = null,
        ?string $language = null,
        ?DateTimeInterface $date = null,
        ?DateTimeInterface $completeDate = null,
        array $supplyChainEvents = [],
        ?string $currency = null,
        ?string $taxCurrency = null,
        ?bool $isCopy = null,
        ?bool $isTest = null,
        array $notes = [],
        array $billingPeriods = [],
        array $postingReferences = [],
        array $sellerOrderReferences = [],
        array $buyerOrderReferences = [],
        array $quotationReferences = [],
        array $contractReferences = [],
        array $additionalReferences = [],
        array $invoiceReferences = [],
        array $projectReferences = [],
        array $ultimateCustomerOrderReferences = [],
        array $despatchAdviceReferences = [],
        array $receivingAdviceReferences = [],
        array $deliveryNoteReferences = [],
        ?InvoiceSuitePartyDTO $sellerParty = null,
        ?InvoiceSuitePartyDTO $buyerParty = null,
        ?InvoiceSuitePartyDTO $sellerTaxRepresentativeParty = null,
        ?InvoiceSuitePartyDTO $buyerTaxRepresentativeParty = null,
        ?InvoiceSuitePartyDTO $salesAgentParty = null,
        ?InvoiceSuitePartyDTO $buyerAgentParty = null,
        ?InvoiceSuitePartyDTO $productEndUserParty = null,
        ?InvoiceSuitePartyDTO $shipToParty = null,
        ?InvoiceSuitePartyDTO $ultimateShipToParty = null,
        ?InvoiceSuitePartyDTO $shipFromParty = null,
        ?InvoiceSuitePartyDTO $invoicerParty = null,
        ?InvoiceSuitePartyDTO $invoiceeParty = null,
        ?InvoiceSuitePartyDTO $payeeParty = null,
        ?InvoiceSuitePartyDTO $payerParty = null,
        array $paymentMeans = [],
        array $paymentTerms = [],
        array $creditorReferences = [],
        array $paymentReferences = [],
        array $buyerReferences = [],
        array $positions = [],
        array $deliveryTerms = [],
        array $taxes = [],
        array $allowanceCharges = [],
        array $serviceCharges = [],
        array $summations = []
    ) {
        $this->setNumber($number);
        $this->setType($type);
        $this->setDescription($description);
        $this->setLanguage($language);
        $this->setDate($date);
        $this->setCompleteDate($completeDate);
        $this->setSupplyChainEvents($supplyChainEvents);
        $this->setCurrency($currency);
        $this->setTaxCurrency($taxCurrency);
        $this->setIsCopy($isCopy);
        $this->setIsTest($isTest);
        $this->setNotes($notes);
        $this->setBillingPeriods($billingPeriods);
        $this->setPostingReferences($postingReferences);
        $this->setSellerOrderReferences($sellerOrderReferences);
        $this->setBuyerOrderReferences($buyerOrderReferences);
        $this->setQuotationReferences($quotationReferences);
        $this->setContractReferences($contractReferences);
        $this->setAdditionalReferences($additionalReferences);
        $this->setInvoiceReferences($invoiceReferences);
        $this->setProjectReferences($projectReferences);
        $this->setUltimateCustomerOrderReferences($ultimateCustomerOrderReferences);
        $this->setDespatchAdviceReferences($despatchAdviceReferences);
        $this->setReceivingAdviceReferences($receivingAdviceReferences);
        $this->setDeliveryNoteReferences($deliveryNoteReferences);
        $this->setSellerParty($sellerParty);
        $this->setBuyerParty($buyerParty);
        $this->setSellerTaxRepresentativeParty($sellerTaxRepresentativeParty);
        $this->setBuyerTaxRepresentativeParty($buyerTaxRepresentativeParty);
        $this->setSalesAgentParty($salesAgentParty);
        $this->setBuyerAgentParty($buyerAgentParty);
        $this->setProductEndUserParty($productEndUserParty);
        $this->setShipToParty($shipToParty);
        $this->setUltimateShipToParty($ultimateShipToParty);
        $this->setShipFromParty($shipFromParty);
        $this->setInvoicerParty($invoicerParty);
        $this->setInvoiceeParty($invoiceeParty);
        $this->setPayeeParty($payeeParty);
        $this->setPayerParty($payerParty);
        $this->setPaymentMeans($paymentMeans);
        $this->setPaymentTerms($paymentTerms);
        $this->setCreditorReferences($creditorReferences);
        $this->setPaymentReferences($paymentReferences);
        $this->setBuyerReferences($buyerReferences);
        $this->setPositions($positions);
        $this->setDeliveryTerms($deliveryTerms);
        $this->setTaxes($taxes);
        $this->setAllowanceCharges($allowanceCharges);
        $this->setServiceCharges($serviceCharges);
        $this->setSummations($summations);
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
     * Returns the document number issued by the seller
     *
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * Sets the document number issued by the seller
     *
     * @param  null|string $number The document number issued by the seller
     * @return static
     */
    public function setNumber(
        ?string $number
    ): static {
        $this->number = InvoiceSuiteStringUtils::asNullWhenEmpty($number);

        return $this;
    }

    /**
     * Returns the type of the document expressed as a code
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the type of the document expressed as a code
     *
     * @param  null|string $type The type of the document expressed as a code
     * @return static
     */
    public function setType(
        ?string $type
    ): static {
        $this->type = InvoiceSuiteStringUtils::asNullWhenEmpty($type);

        return $this;
    }

    /**
     * Returns the document type as free text
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the document type as free text
     *
     * @param  null|string $description The document type as free text
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

        return $this;
    }

    /**
     * Returns the language code in which the document was written
     *
     * @return null|string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Sets the language code in which the document was written
     *
     * @param  null|string $language The language code in which the document was written
     * @return static
     */
    public function setLanguage(
        ?string $language
    ): static {
        $this->language = InvoiceSuiteStringUtils::asNullWhenEmpty($language);

        return $this;
    }

    /**
     * Returns date of the document. The date when the document was issued by the seller
     *
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Sets date of the document. The date when the document was issued by the seller
     *
     * @param  null|DateTimeInterface $date Date of the document. The date when the document was issued by the seller
     * @return static
     */
    public function setDate(
        ?DateTimeInterface $date
    ): static {
        $this->date = $date;

        return $this;
    }

    /**
     * Returns the contractual due date of the document
     *
     * @return null|DateTimeInterface
     */
    public function getCompleteDate(): ?DateTimeInterface
    {
        return $this->completeDate;
    }

    /**
     * Sets the contractual due date of the document
     *
     * @param  null|DateTimeInterface $completeDate The contractual due date of the document
     * @return static
     */
    public function setCompleteDate(
        ?DateTimeInterface $completeDate
    ): static {
        $this->completeDate = $completeDate;

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
     * Returns the code for the invoice currency
     *
     * @return null|string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets the code for the invoice currency
     *
     * @param  null|string $currency The code for the invoice currency
     * @return static
     */
    public function setCurrency(
        ?string $currency
    ): static {
        $this->currency = InvoiceSuiteStringUtils::asNullWhenEmpty($currency);

        return $this;
    }

    /**
     * Returns the code for the tax currency
     *
     * @return null|string
     */
    public function getTaxCurrency(): ?string
    {
        return $this->taxCurrency;
    }

    /**
     * Sets the code for the tax currency
     *
     * @param  null|string $taxCurrency The code for the tax currency
     * @return static
     */
    public function setTaxCurrency(
        ?string $taxCurrency
    ): static {
        $this->taxCurrency = InvoiceSuiteStringUtils::asNullWhenEmpty($taxCurrency);

        return $this;
    }

    /**
     * Returns the flag that indicated that this document is a copy
     *
     * @return null|bool
     */
    public function getIsCopy(): ?bool
    {
        return $this->isCopy;
    }

    /**
     * Sets the flag that indicated that this document is a copy
     *
     * @param  null|bool $isCopy The flag that indicated that this document is a copy
     * @return static
     */
    public function setIsCopy(
        ?bool $isCopy
    ): static {
        $this->isCopy = $isCopy;

        return $this;
    }

    /**
     * Returns the flag that indicated that this document is a test
     *
     * @return null|bool
     */
    public function getIsTest(): ?bool
    {
        return $this->isTest;
    }

    /**
     * Sets the flag that indicated that this document is a test
     *
     * @param  null|bool $isTest The flag that indicated that this document is a test
     * @return static
     */
    public function setIsTest(
        ?bool $isTest
    ): static {
        $this->isTest = $isTest;

        return $this;
    }

    /**
     * Returns the notes for this document
     *
     * @return array<InvoiceSuiteNoteDTO>
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * Sets the notes for this document
     *
     * @param  array<InvoiceSuiteNoteDTO> $notes The notes for this document
     * @return static
     */
    public function setNotes(
        array $notes
    ): static {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Add single The notes for this document
     *
     * @param  InvoiceSuiteNoteDTO $note The notes for this document
     * @return static
     */
    public function addNote(
        ?InvoiceSuiteNoteDTO $note
    ): static {
        if (is_null($note)) {
            return $this;
        }

        $this->notes[] = $note;

        return $this;
    }

    /**
     * Get first The notes for this document
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::first($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The notes for this document
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::next($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The notes for this document
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::previous($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The notes for this document
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastNote(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($note = InvoiceSuiteArrayUtils::last($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The notes for this document and execute callback
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

        foreach ($this->notes as $note) {
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
     * Loop over The notes for this document and execute callback
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

        foreach ($this->notes as $note) {
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
     * Filter The notes for this document
     *
     * @param  callable                   $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteNoteDTO>
     */
    public function filterNote(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->notes, $callback);
    }

    /**
     * Get first The notes for this document from filtered result
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
     * Get last The notes for this document from filtered result
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
     * Returns the associated seller's order confirmation
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getSellerOrderReferences(): array
    {
        return $this->sellerOrderReferences;
    }

    /**
     * Sets the associated seller's order confirmation
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $sellerOrderReferences The associated seller's order confirmation
     * @return static
     */
    public function setSellerOrderReferences(
        array $sellerOrderReferences
    ): static {
        $this->sellerOrderReferences = $sellerOrderReferences;

        return $this;
    }

    /**
     * Add single The associated seller's order confirmation
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $sellerOrderReference The associated seller's order confirmation
     * @return static
     */
    public function addSellerOrderReference(
        ?InvoiceSuiteReferenceDocumentDTO $sellerOrderReference
    ): static {
        if (is_null($sellerOrderReference)) {
            return $this;
        }

        $this->sellerOrderReferences[] = $sellerOrderReference;

        return $this;
    }

    /**
     * Get first The associated seller's order confirmation
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
     * Get next The associated seller's order confirmation
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
     * Get previous The associated seller's order confirmation
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
     * Get last The associated seller's order confirmation
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
     * Loop over The associated seller's order confirmation and execute callback
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
     * Loop over The associated seller's order confirmation and execute callback
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
     * Filter The associated seller's order confirmation
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterSellerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->sellerOrderReferences, $callback);
    }

    /**
     * Get first The associated seller's order confirmation from filtered result
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
     * Get last The associated seller's order confirmation from filtered result
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
     * Returns the associated buyer's order
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getBuyerOrderReferences(): array
    {
        return $this->buyerOrderReferences;
    }

    /**
     * Sets the associated buyer's order
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $buyerOrderReferences The associated buyer's order
     * @return static
     */
    public function setBuyerOrderReferences(
        array $buyerOrderReferences
    ): static {
        $this->buyerOrderReferences = $buyerOrderReferences;

        return $this;
    }

    /**
     * Add single The associated buyer's order
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $buyerOrderReference The associated buyer's order
     * @return static
     */
    public function addBuyerOrderReference(
        ?InvoiceSuiteReferenceDocumentDTO $buyerOrderReference
    ): static {
        if (is_null($buyerOrderReference)) {
            return $this;
        }

        $this->buyerOrderReferences[] = $buyerOrderReference;

        return $this;
    }

    /**
     * Get first The associated buyer's order
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
     * Get next The associated buyer's order
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
     * Get previous The associated buyer's order
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
     * Get last The associated buyer's order
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
     * Loop over The associated buyer's order and execute callback
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
     * Loop over The associated buyer's order and execute callback
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
     * Filter The associated buyer's order
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterBuyerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->buyerOrderReferences, $callback);
    }

    /**
     * Get first The associated buyer's order from filtered result
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
     * Get last The associated buyer's order from filtered result
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
     * Returns the associated quotation
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getQuotationReferences(): array
    {
        return $this->quotationReferences;
    }

    /**
     * Sets the associated quotation
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $quotationReferences The associated quotation
     * @return static
     */
    public function setQuotationReferences(
        array $quotationReferences
    ): static {
        $this->quotationReferences = $quotationReferences;

        return $this;
    }

    /**
     * Add single The associated quotation
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $quotationReference The associated quotation
     * @return static
     */
    public function addQuotationReference(
        ?InvoiceSuiteReferenceDocumentDTO $quotationReference
    ): static {
        if (is_null($quotationReference)) {
            return $this;
        }

        $this->quotationReferences[] = $quotationReference;

        return $this;
    }

    /**
     * Get first The associated quotation
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
     * Get next The associated quotation
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
     * Get previous The associated quotation
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
     * Get last The associated quotation
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
     * Loop over The associated quotation and execute callback
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
     * Loop over The associated quotation and execute callback
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
     * Filter The associated quotation
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterQuotationReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->quotationReferences, $callback);
    }

    /**
     * Get first The associated quotation from filtered result
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
     * Get last The associated quotation from filtered result
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
     * Returns the associated contract
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getContractReferences(): array
    {
        return $this->contractReferences;
    }

    /**
     * Sets the associated contract
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $contractReferences The associated contract
     * @return static
     */
    public function setContractReferences(
        array $contractReferences
    ): static {
        $this->contractReferences = $contractReferences;

        return $this;
    }

    /**
     * Add single The associated contract
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $contractReference The associated contract
     * @return static
     */
    public function addContractReference(
        ?InvoiceSuiteReferenceDocumentDTO $contractReference
    ): static {
        if (is_null($contractReference)) {
            return $this;
        }

        $this->contractReferences[] = $contractReference;

        return $this;
    }

    /**
     * Get first The associated contract
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
     * Get next The associated contract
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
     * Get previous The associated contract
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
     * Get last The associated contract
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
     * Loop over The associated contract and execute callback
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
     * Loop over The associated contract and execute callback
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
     * Filter The associated contract
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterContractReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->contractReferences, $callback);
    }

    /**
     * Get first The associated contract from filtered result
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
     * Get last The associated contract from filtered result
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
     * Returns the additional associated document
     *
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function getAdditionalReferences(): array
    {
        return $this->additionalReferences;
    }

    /**
     * Sets the additional associated document
     *
     * @param  array<InvoiceSuiteReferenceDocumentExtDTO> $additionalReferences The additional associated document
     * @return static
     */
    public function setAdditionalReferences(
        array $additionalReferences
    ): static {
        $this->additionalReferences = $additionalReferences;

        return $this;
    }

    /**
     * Add single The additional associated document
     *
     * @param  InvoiceSuiteReferenceDocumentExtDTO $additionalReference The additional associated document
     * @return static
     */
    public function addAdditionalReference(
        ?InvoiceSuiteReferenceDocumentExtDTO $additionalReference
    ): static {
        if (is_null($additionalReference)) {
            return $this;
        }

        $this->additionalReferences[] = $additionalReference;

        return $this;
    }

    /**
     * Get first The additional associated document
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
     * Get next The additional associated document
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
     * Get previous The additional associated document
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
     * Get last The additional associated document
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
     * Loop over The additional associated document and execute callback
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
     * Loop over The additional associated document and execute callback
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
     * Filter The additional associated document
     *
     * @param  callable                                   $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function filterAdditionalReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->additionalReferences, $callback);
    }

    /**
     * Get first The additional associated document from filtered result
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
     * Get last The additional associated document from filtered result
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
     * Returns the additional invoice document
     *
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function getInvoiceReferences(): array
    {
        return $this->invoiceReferences;
    }

    /**
     * Sets the additional invoice document
     *
     * @param  array<InvoiceSuiteReferenceDocumentExtDTO> $invoiceReferences The additional invoice document
     * @return static
     */
    public function setInvoiceReferences(
        array $invoiceReferences
    ): static {
        $this->invoiceReferences = $invoiceReferences;

        return $this;
    }

    /**
     * Add single The additional invoice document
     *
     * @param  InvoiceSuiteReferenceDocumentExtDTO $invoiceReference The additional invoice document
     * @return static
     */
    public function addInvoiceReference(
        ?InvoiceSuiteReferenceDocumentExtDTO $invoiceReference
    ): static {
        if (is_null($invoiceReference)) {
            return $this;
        }

        $this->invoiceReferences[] = $invoiceReference;

        return $this;
    }

    /**
     * Get first The additional invoice document
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
     * Get next The additional invoice document
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
     * Get previous The additional invoice document
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
     * Get last The additional invoice document
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
     * Loop over The additional invoice document and execute callback
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
     * Loop over The additional invoice document and execute callback
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
     * Filter The additional invoice document
     *
     * @param  callable                                   $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentExtDTO>
     */
    public function filterInvoiceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->invoiceReferences, $callback);
    }

    /**
     * Get first The additional invoice document from filtered result
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
     * Get last The additional invoice document from filtered result
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
     * Returns the project reference
     *
     * @return array<InvoiceSuiteProjectDTO>
     */
    public function getProjectReferences(): array
    {
        return $this->projectReferences;
    }

    /**
     * Sets the project reference
     *
     * @param  array<InvoiceSuiteProjectDTO> $projectReferences The project reference
     * @return static
     */
    public function setProjectReferences(
        array $projectReferences
    ): static {
        $this->projectReferences = $projectReferences;

        return $this;
    }

    /**
     * Add single The project reference
     *
     * @param  InvoiceSuiteProjectDTO $projectReference The project reference
     * @return static
     */
    public function addProjectReference(
        ?InvoiceSuiteProjectDTO $projectReference
    ): static {
        if (is_null($projectReference)) {
            return $this;
        }

        $this->projectReferences[] = $projectReference;

        return $this;
    }

    /**
     * Get first The project reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstProjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($projectReference = InvoiceSuiteArrayUtils::first($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The project reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextProjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($projectReference = InvoiceSuiteArrayUtils::next($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The project reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousProjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($projectReference = InvoiceSuiteArrayUtils::previous($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The project reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastProjectReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($projectReference = InvoiceSuiteArrayUtils::last($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The project reference and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachProjectReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->projectReferences as $projectReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($projectReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The project reference and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstProjectReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstProjectReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->projectReferences as $projectReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($projectReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The project reference
     *
     * @param  callable                      $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteProjectDTO>
     */
    public function filterProjectReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->projectReferences, $callback);
    }

    /**
     * Get first The project reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstProjectReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredProjectReference = $this->filterProjectReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredProjectReference)) {
            $projectReference = InvoiceSuiteArrayUtils::first($filteredProjectReference);
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The project reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastProjectReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredProjectReference = $this->filterProjectReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredProjectReference)) {
            $projectReference = InvoiceSuiteArrayUtils::last($filteredProjectReference);
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the ultimate customer order reference
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getUltimateCustomerOrderReferences(): array
    {
        return $this->ultimateCustomerOrderReferences;
    }

    /**
     * Sets the ultimate customer order reference
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $ultimateCustomerOrderReferences The ultimate customer order reference
     * @return static
     */
    public function setUltimateCustomerOrderReferences(
        array $ultimateCustomerOrderReferences
    ): static {
        $this->ultimateCustomerOrderReferences = $ultimateCustomerOrderReferences;

        return $this;
    }

    /**
     * Add single The ultimate customer order reference
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $ultimateCustomerOrderReference The ultimate customer order reference
     * @return static
     */
    public function addUltimateCustomerOrderReference(
        ?InvoiceSuiteReferenceDocumentDTO $ultimateCustomerOrderReference
    ): static {
        if (is_null($ultimateCustomerOrderReference)) {
            return $this;
        }

        $this->ultimateCustomerOrderReferences[] = $ultimateCustomerOrderReference;

        return $this;
    }

    /**
     * Get first The ultimate customer order reference
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
     * Get next The ultimate customer order reference
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
     * Get previous The ultimate customer order reference
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
     * Get last The ultimate customer order reference
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
     * Loop over The ultimate customer order reference and execute callback
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
     * Loop over The ultimate customer order reference and execute callback
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
     * Filter The ultimate customer order reference
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterUltimateCustomerOrderReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->ultimateCustomerOrderReferences, $callback);
    }

    /**
     * Get first The ultimate customer order reference from filtered result
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
     * Get last The ultimate customer order reference from filtered result
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
     * Returns the despatch advice reference
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getDespatchAdviceReferences(): array
    {
        return $this->despatchAdviceReferences;
    }

    /**
     * Sets the despatch advice reference
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $despatchAdviceReferences The despatch advice reference
     * @return static
     */
    public function setDespatchAdviceReferences(
        array $despatchAdviceReferences
    ): static {
        $this->despatchAdviceReferences = $despatchAdviceReferences;

        return $this;
    }

    /**
     * Add single The despatch advice reference
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $despatchAdviceReference The despatch advice reference
     * @return static
     */
    public function addDespatchAdviceReference(
        ?InvoiceSuiteReferenceDocumentDTO $despatchAdviceReference
    ): static {
        if (is_null($despatchAdviceReference)) {
            return $this;
        }

        $this->despatchAdviceReferences[] = $despatchAdviceReference;

        return $this;
    }

    /**
     * Get first The despatch advice reference
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
     * Get next The despatch advice reference
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
     * Get previous The despatch advice reference
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
     * Get last The despatch advice reference
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
     * Loop over The despatch advice reference and execute callback
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
     * Loop over The despatch advice reference and execute callback
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
     * Filter The despatch advice reference
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterDespatchAdviceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->despatchAdviceReferences, $callback);
    }

    /**
     * Get first The despatch advice reference from filtered result
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
     * Get last The despatch advice reference from filtered result
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
     * Returns the receiving advice reference
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getReceivingAdviceReferences(): array
    {
        return $this->receivingAdviceReferences;
    }

    /**
     * Sets the receiving advice reference
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $receivingAdviceReferences The receiving advice reference
     * @return static
     */
    public function setReceivingAdviceReferences(
        array $receivingAdviceReferences
    ): static {
        $this->receivingAdviceReferences = $receivingAdviceReferences;

        return $this;
    }

    /**
     * Add single The receiving advice reference
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $receivingAdviceReference The receiving advice reference
     * @return static
     */
    public function addReceivingAdviceReference(
        ?InvoiceSuiteReferenceDocumentDTO $receivingAdviceReference
    ): static {
        if (is_null($receivingAdviceReference)) {
            return $this;
        }

        $this->receivingAdviceReferences[] = $receivingAdviceReference;

        return $this;
    }

    /**
     * Get first The receiving advice reference
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
     * Get next The receiving advice reference
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
     * Get previous The receiving advice reference
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
     * Get last The receiving advice reference
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
     * Loop over The receiving advice reference and execute callback
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
     * Loop over The receiving advice reference and execute callback
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
     * Filter The receiving advice reference
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterReceivingAdviceReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->receivingAdviceReferences, $callback);
    }

    /**
     * Get first The receiving advice reference from filtered result
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
     * Get last The receiving advice reference from filtered result
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
     * Returns the delivery note reference
     *
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function getDeliveryNoteReferences(): array
    {
        return $this->deliveryNoteReferences;
    }

    /**
     * Sets the delivery note reference
     *
     * @param  array<InvoiceSuiteReferenceDocumentDTO> $deliveryNoteReferences The delivery note reference
     * @return static
     */
    public function setDeliveryNoteReferences(
        array $deliveryNoteReferences
    ): static {
        $this->deliveryNoteReferences = $deliveryNoteReferences;

        return $this;
    }

    /**
     * Add single The delivery note reference
     *
     * @param  InvoiceSuiteReferenceDocumentDTO $deliveryNoteReference The delivery note reference
     * @return static
     */
    public function addDeliveryNoteReference(
        ?InvoiceSuiteReferenceDocumentDTO $deliveryNoteReference
    ): static {
        if (is_null($deliveryNoteReference)) {
            return $this;
        }

        $this->deliveryNoteReferences[] = $deliveryNoteReference;

        return $this;
    }

    /**
     * Get first The delivery note reference
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
     * Get next The delivery note reference
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
     * Get previous The delivery note reference
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
     * Get last The delivery note reference
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
     * Loop over The delivery note reference and execute callback
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
     * Loop over The delivery note reference and execute callback
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
     * Filter The delivery note reference
     *
     * @param  callable                                $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteReferenceDocumentDTO>
     */
    public function filterDeliveryNoteReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->deliveryNoteReferences, $callback);
    }

    /**
     * Get first The delivery note reference from filtered result
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
     * Get last The delivery note reference from filtered result
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
     * Returns the Seller/Supplier Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getSellerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->sellerParty;
    }

    /**
     * Sets the Seller/Supplier Party
     *
     * @param  null|InvoiceSuitePartyDTO $sellerParty The Seller/Supplier Party
     * @return static
     */
    public function setSellerParty(
        ?InvoiceSuitePartyDTO $sellerParty
    ): static {
        $this->sellerParty = $sellerParty;

        return $this;
    }

    /**
     * Returns the Buyer/Customer Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getBuyerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->buyerParty;
    }

    /**
     * Sets the Buyer/Customer Party
     *
     * @param  null|InvoiceSuitePartyDTO $buyerParty The Buyer/Customer Party
     * @return static
     */
    public function setBuyerParty(
        ?InvoiceSuitePartyDTO $buyerParty
    ): static {
        $this->buyerParty = $buyerParty;

        return $this;
    }

    /**
     * Returns the Seller's Tax Representativ Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getSellerTaxRepresentativeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->sellerTaxRepresentativeParty;
    }

    /**
     * Sets the Seller's Tax Representativ Party
     *
     * @param  null|InvoiceSuitePartyDTO $sellerTaxRepresentativeParty The Seller's Tax Representativ Party
     * @return static
     */
    public function setSellerTaxRepresentativeParty(
        ?InvoiceSuitePartyDTO $sellerTaxRepresentativeParty
    ): static {
        $this->sellerTaxRepresentativeParty = $sellerTaxRepresentativeParty;

        return $this;
    }

    /**
     * Returns the Buyer's Tax Representativ Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getBuyerTaxRepresentativeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->buyerTaxRepresentativeParty;
    }

    /**
     * Sets the Buyer's Tax Representativ Party
     *
     * @param  null|InvoiceSuitePartyDTO $buyerTaxRepresentativeParty The Buyer's Tax Representativ Party
     * @return static
     */
    public function setBuyerTaxRepresentativeParty(
        ?InvoiceSuitePartyDTO $buyerTaxRepresentativeParty
    ): static {
        $this->buyerTaxRepresentativeParty = $buyerTaxRepresentativeParty;

        return $this;
    }

    /**
     * Returns the Sales Agent Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getSalesAgentParty(): ?InvoiceSuitePartyDTO
    {
        return $this->salesAgentParty;
    }

    /**
     * Sets the Sales Agent Party
     *
     * @param  null|InvoiceSuitePartyDTO $salesAgentParty The Sales Agent Party
     * @return static
     */
    public function setSalesAgentParty(
        ?InvoiceSuitePartyDTO $salesAgentParty
    ): static {
        $this->salesAgentParty = $salesAgentParty;

        return $this;
    }

    /**
     * Returns the Buyer Agent Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getBuyerAgentParty(): ?InvoiceSuitePartyDTO
    {
        return $this->buyerAgentParty;
    }

    /**
     * Sets the Buyer Agent Party
     *
     * @param  null|InvoiceSuitePartyDTO $buyerAgentParty The Buyer Agent Party
     * @return static
     */
    public function setBuyerAgentParty(
        ?InvoiceSuitePartyDTO $buyerAgentParty
    ): static {
        $this->buyerAgentParty = $buyerAgentParty;

        return $this;
    }

    /**
     * Returns the Product Enduser Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getProductEndUserParty(): ?InvoiceSuitePartyDTO
    {
        return $this->productEndUserParty;
    }

    /**
     * Sets the Product Enduser Party
     *
     * @param  null|InvoiceSuitePartyDTO $productEndUserParty The Product Enduser Party
     * @return static
     */
    public function setProductEndUserParty(
        ?InvoiceSuitePartyDTO $productEndUserParty
    ): static {
        $this->productEndUserParty = $productEndUserParty;

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
     * Returns the Ship-From Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getShipFromParty(): ?InvoiceSuitePartyDTO
    {
        return $this->shipFromParty;
    }

    /**
     * Sets the Ship-From Party
     *
     * @param  null|InvoiceSuitePartyDTO $shipFromParty The Ship-From Party
     * @return static
     */
    public function setShipFromParty(
        ?InvoiceSuitePartyDTO $shipFromParty
    ): static {
        $this->shipFromParty = $shipFromParty;

        return $this;
    }

    /**
     * Returns the Invoicer Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getInvoicerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->invoicerParty;
    }

    /**
     * Sets the Invoicer Party
     *
     * @param  null|InvoiceSuitePartyDTO $invoicerParty The Invoicer Party
     * @return static
     */
    public function setInvoicerParty(
        ?InvoiceSuitePartyDTO $invoicerParty
    ): static {
        $this->invoicerParty = $invoicerParty;

        return $this;
    }

    /**
     * Returns the Invoicee Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getInvoiceeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->invoiceeParty;
    }

    /**
     * Sets the Invoicee Party
     *
     * @param  null|InvoiceSuitePartyDTO $invoiceeParty The Invoicee Party
     * @return static
     */
    public function setInvoiceeParty(
        ?InvoiceSuitePartyDTO $invoiceeParty
    ): static {
        $this->invoiceeParty = $invoiceeParty;

        return $this;
    }

    /**
     * Returns the Payee Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getPayeeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->payeeParty;
    }

    /**
     * Sets the Payee Party
     *
     * @param  null|InvoiceSuitePartyDTO $payeeParty The Payee Party
     * @return static
     */
    public function setPayeeParty(
        ?InvoiceSuitePartyDTO $payeeParty
    ): static {
        $this->payeeParty = $payeeParty;

        return $this;
    }

    /**
     * Returns the Payer Party
     *
     * @return null|InvoiceSuitePartyDTO
     */
    public function getPayerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->payerParty;
    }

    /**
     * Sets the Payer Party
     *
     * @param  null|InvoiceSuitePartyDTO $payerParty The Payer Party
     * @return static
     */
    public function setPayerParty(
        ?InvoiceSuitePartyDTO $payerParty
    ): static {
        $this->payerParty = $payerParty;

        return $this;
    }

    /**
     * Returns the payment means
     *
     * @return array<InvoiceSuitePaymentMeanDTO>
     */
    public function getPaymentMeans(): array
    {
        return $this->paymentMeans;
    }

    /**
     * Sets the payment means
     *
     * @param  array<InvoiceSuitePaymentMeanDTO> $paymentMeans The payment means
     * @return static
     */
    public function setPaymentMeans(
        array $paymentMeans
    ): static {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * Add single The payment means
     *
     * @param  InvoiceSuitePaymentMeanDTO $paymentMean The payment means
     * @return static
     */
    public function addPaymentMean(
        ?InvoiceSuitePaymentMeanDTO $paymentMean
    ): static {
        if (is_null($paymentMean)) {
            return $this;
        }

        $this->paymentMeans[] = $paymentMean;

        return $this;
    }

    /**
     * Get first The payment means
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstPaymentMean(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentMean = InvoiceSuiteArrayUtils::first($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The payment means
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextPaymentMean(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentMean = InvoiceSuiteArrayUtils::next($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The payment means
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousPaymentMean(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentMean = InvoiceSuiteArrayUtils::previous($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment means
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastPaymentMean(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentMean = InvoiceSuiteArrayUtils::last($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment means and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachPaymentMean(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->paymentMeans as $paymentMean) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentMean);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment means and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstPaymentMean(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstPaymentMean($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->paymentMeans as $paymentMean) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentMean);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The payment means
     *
     * @param  callable                          $callback Callback to execute filtering for each item
     * @return array<InvoiceSuitePaymentMeanDTO>
     */
    public function filterPaymentMean(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->paymentMeans, $callback);
    }

    /**
     * Get first The payment means from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstPaymentMean(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentMean = $this->filterPaymentMean($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentMean)) {
            $paymentMean = InvoiceSuiteArrayUtils::first($filteredPaymentMean);
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment means from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastPaymentMean(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentMean = $this->filterPaymentMean($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentMean)) {
            $paymentMean = InvoiceSuiteArrayUtils::last($filteredPaymentMean);
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the payment terms
     *
     * @return array<InvoiceSuitePaymentTermDTO>
     */
    public function getPaymentTerms(): array
    {
        return $this->paymentTerms;
    }

    /**
     * Sets the payment terms
     *
     * @param  array<InvoiceSuitePaymentTermDTO> $paymentTerms The payment terms
     * @return static
     */
    public function setPaymentTerms(
        array $paymentTerms
    ): static {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * Add single The payment terms
     *
     * @param  InvoiceSuitePaymentTermDTO $paymentTerm The payment terms
     * @return static
     */
    public function addPaymentTerm(
        ?InvoiceSuitePaymentTermDTO $paymentTerm
    ): static {
        if (is_null($paymentTerm)) {
            return $this;
        }

        $this->paymentTerms[] = $paymentTerm;

        return $this;
    }

    /**
     * Get first The payment terms
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstPaymentTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentTerm = InvoiceSuiteArrayUtils::first($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The payment terms
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextPaymentTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentTerm = InvoiceSuiteArrayUtils::next($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The payment terms
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousPaymentTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentTerm = InvoiceSuiteArrayUtils::previous($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment terms
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastPaymentTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentTerm = InvoiceSuiteArrayUtils::last($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment terms and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachPaymentTerm(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->paymentTerms as $paymentTerm) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentTerm);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment terms and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstPaymentTerm(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstPaymentTerm($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->paymentTerms as $paymentTerm) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentTerm);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The payment terms
     *
     * @param  callable                          $callback Callback to execute filtering for each item
     * @return array<InvoiceSuitePaymentTermDTO>
     */
    public function filterPaymentTerm(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->paymentTerms, $callback);
    }

    /**
     * Get first The payment terms from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstPaymentTerm(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentTerm = $this->filterPaymentTerm($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentTerm)) {
            $paymentTerm = InvoiceSuiteArrayUtils::first($filteredPaymentTerm);
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment terms from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastPaymentTerm(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentTerm = $this->filterPaymentTerm($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentTerm)) {
            $paymentTerm = InvoiceSuiteArrayUtils::last($filteredPaymentTerm);
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the creditor identifier
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getCreditorReferences(): array
    {
        return $this->creditorReferences;
    }

    /**
     * Sets the creditor identifier
     *
     * @param  array<InvoiceSuiteIdDTO> $creditorReferences The creditor identifier
     * @return static
     */
    public function setCreditorReferences(
        array $creditorReferences
    ): static {
        $this->creditorReferences = $creditorReferences;

        return $this;
    }

    /**
     * Add single The creditor identifier
     *
     * @param  InvoiceSuiteIdDTO $creditorReference The creditor identifier
     * @return static
     */
    public function addCreditorReference(
        ?InvoiceSuiteIdDTO $creditorReference
    ): static {
        if (is_null($creditorReference)) {
            return $this;
        }

        $this->creditorReferences[] = $creditorReference;

        return $this;
    }

    /**
     * Get first The creditor identifier
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstCreditorReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($creditorReference = InvoiceSuiteArrayUtils::first($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The creditor identifier
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextCreditorReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($creditorReference = InvoiceSuiteArrayUtils::next($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The creditor identifier
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousCreditorReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($creditorReference = InvoiceSuiteArrayUtils::previous($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The creditor identifier
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastCreditorReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($creditorReference = InvoiceSuiteArrayUtils::last($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The creditor identifier and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachCreditorReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->creditorReferences as $creditorReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($creditorReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The creditor identifier and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstCreditorReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstCreditorReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->creditorReferences as $creditorReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($creditorReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The creditor identifier
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterCreditorReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->creditorReferences, $callback);
    }

    /**
     * Get first The creditor identifier from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstCreditorReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredCreditorReference = $this->filterCreditorReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredCreditorReference)) {
            $creditorReference = InvoiceSuiteArrayUtils::first($filteredCreditorReference);
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The creditor identifier from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastCreditorReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredCreditorReference = $this->filterCreditorReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredCreditorReference)) {
            $creditorReference = InvoiceSuiteArrayUtils::last($filteredCreditorReference);
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the payment reference
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getPaymentReferences(): array
    {
        return $this->paymentReferences;
    }

    /**
     * Sets the payment reference
     *
     * @param  array<InvoiceSuiteIdDTO> $paymentReferences The payment reference
     * @return static
     */
    public function setPaymentReferences(
        array $paymentReferences
    ): static {
        $this->paymentReferences = $paymentReferences;

        return $this;
    }

    /**
     * Add single The payment reference
     *
     * @param  InvoiceSuiteIdDTO $paymentReference The payment reference
     * @return static
     */
    public function addPaymentReference(
        ?InvoiceSuiteIdDTO $paymentReference
    ): static {
        if (is_null($paymentReference)) {
            return $this;
        }

        $this->paymentReferences[] = $paymentReference;

        return $this;
    }

    /**
     * Get first The payment reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstPaymentReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentReference = InvoiceSuiteArrayUtils::first($this->paymentReferences)) !== false) {
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The payment reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextPaymentReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentReference = InvoiceSuiteArrayUtils::next($this->paymentReferences)) !== false) {
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The payment reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousPaymentReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentReference = InvoiceSuiteArrayUtils::previous($this->paymentReferences)) !== false) {
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment reference
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastPaymentReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($paymentReference = InvoiceSuiteArrayUtils::last($this->paymentReferences)) !== false) {
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment reference and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachPaymentReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->paymentReferences as $paymentReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment reference and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstPaymentReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstPaymentReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->paymentReferences as $paymentReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($paymentReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The payment reference
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterPaymentReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->paymentReferences, $callback);
    }

    /**
     * Get first The payment reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstPaymentReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentReference = $this->filterPaymentReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentReference)) {
            $paymentReference = InvoiceSuiteArrayUtils::first($filteredPaymentReference);
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment reference from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastPaymentReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPaymentReference = $this->filterPaymentReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPaymentReference)) {
            $paymentReference = InvoiceSuiteArrayUtils::last($filteredPaymentReference);
            $callback($paymentReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the ID for internal routing (Leitweg ID)
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getBuyerReferences(): array
    {
        return $this->buyerReferences;
    }

    /**
     * Sets the ID for internal routing (Leitweg ID)
     *
     * @param  array<InvoiceSuiteIdDTO> $buyerReferences The ID for internal routing (Leitweg ID)
     * @return static
     */
    public function setBuyerReferences(
        array $buyerReferences
    ): static {
        $this->buyerReferences = $buyerReferences;

        return $this;
    }

    /**
     * Add single The ID for internal routing (Leitweg ID)
     *
     * @param  InvoiceSuiteIdDTO $buyerReference The ID for internal routing (Leitweg ID)
     * @return static
     */
    public function addBuyerReference(
        ?InvoiceSuiteIdDTO $buyerReference
    ): static {
        if (is_null($buyerReference)) {
            return $this;
        }

        $this->buyerReferences[] = $buyerReference;

        return $this;
    }

    /**
     * Get first The ID for internal routing (Leitweg ID)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstBuyerReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerReference = InvoiceSuiteArrayUtils::first($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The ID for internal routing (Leitweg ID)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextBuyerReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerReference = InvoiceSuiteArrayUtils::next($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The ID for internal routing (Leitweg ID)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousBuyerReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerReference = InvoiceSuiteArrayUtils::previous($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ID for internal routing (Leitweg ID)
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastBuyerReference(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($buyerReference = InvoiceSuiteArrayUtils::last($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ID for internal routing (Leitweg ID) and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachBuyerReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->buyerReferences as $buyerReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($buyerReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ID for internal routing (Leitweg ID) and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstBuyerReference(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstBuyerReference($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->buyerReferences as $buyerReference) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($buyerReference);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The ID for internal routing (Leitweg ID)
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterBuyerReference(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->buyerReferences, $callback);
    }

    /**
     * Get first The ID for internal routing (Leitweg ID) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstBuyerReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBuyerReference = $this->filterBuyerReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBuyerReference)) {
            $buyerReference = InvoiceSuiteArrayUtils::first($filteredBuyerReference);
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ID for internal routing (Leitweg ID) from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastBuyerReference(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredBuyerReference = $this->filterBuyerReference($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredBuyerReference)) {
            $buyerReference = InvoiceSuiteArrayUtils::last($filteredBuyerReference);
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the Document positions
     *
     * @return array<InvoiceSuiteDocumentPositionDTO>
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * Sets the Document positions
     *
     * @param  array<InvoiceSuiteDocumentPositionDTO> $positions The Document positions
     * @return static
     */
    public function setPositions(
        array $positions
    ): static {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Add single The Document positions
     *
     * @param  InvoiceSuiteDocumentPositionDTO $position The Document positions
     * @return static
     */
    public function addPosition(
        ?InvoiceSuiteDocumentPositionDTO $position
    ): static {
        if (is_null($position)) {
            return $this;
        }

        $this->positions[] = $position;

        return $this;
    }

    /**
     * Get first The Document positions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstPosition(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($position = InvoiceSuiteArrayUtils::first($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The Document positions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextPosition(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($position = InvoiceSuiteArrayUtils::next($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The Document positions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousPosition(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($position = InvoiceSuiteArrayUtils::previous($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The Document positions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastPosition(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($position = InvoiceSuiteArrayUtils::last($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The Document positions and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachPosition(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->positions as $position) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($position);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The Document positions and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstPosition(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstPosition($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->positions as $position) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($position);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The Document positions
     *
     * @param  callable                               $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteDocumentPositionDTO>
     */
    public function filterPosition(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->positions, $callback);
    }

    /**
     * Get first The Document positions from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstPosition(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPosition = $this->filterPosition($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPosition)) {
            $position = InvoiceSuiteArrayUtils::first($filteredPosition);
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The Document positions from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastPosition(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredPosition = $this->filterPosition($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredPosition)) {
            $position = InvoiceSuiteArrayUtils::last($filteredPosition);
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns delivery term
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getDeliveryTerms(): array
    {
        return $this->deliveryTerms;
    }

    /**
     * Sets delivery term
     *
     * @param  array<InvoiceSuiteIdDTO> $deliveryTerms delivery term
     * @return static
     */
    public function setDeliveryTerms(
        array $deliveryTerms
    ): static {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * Add single delivery term
     *
     * @param  InvoiceSuiteIdDTO $deliveryTerm delivery term
     * @return static
     */
    public function addDeliveryTerm(
        ?InvoiceSuiteIdDTO $deliveryTerm
    ): static {
        if (is_null($deliveryTerm)) {
            return $this;
        }

        $this->deliveryTerms[] = $deliveryTerm;

        return $this;
    }

    /**
     * Get first delivery term
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstDeliveryTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryTerm = InvoiceSuiteArrayUtils::first($this->deliveryTerms)) !== false) {
            $callback($deliveryTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next delivery term
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextDeliveryTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryTerm = InvoiceSuiteArrayUtils::next($this->deliveryTerms)) !== false) {
            $callback($deliveryTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous delivery term
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousDeliveryTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryTerm = InvoiceSuiteArrayUtils::previous($this->deliveryTerms)) !== false) {
            $callback($deliveryTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last delivery term
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastDeliveryTerm(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($deliveryTerm = InvoiceSuiteArrayUtils::last($this->deliveryTerms)) !== false) {
            $callback($deliveryTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over delivery term and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachDeliveryTerm(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->deliveryTerms as $deliveryTerm) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($deliveryTerm);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over delivery term and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstDeliveryTerm(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstDeliveryTerm($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->deliveryTerms as $deliveryTerm) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($deliveryTerm);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter delivery term
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterDeliveryTerm(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->deliveryTerms, $callback);
    }

    /**
     * Get first delivery term from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstDeliveryTerm(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDeliveryTerm = $this->filterDeliveryTerm($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDeliveryTerm)) {
            $deliveryTerm = InvoiceSuiteArrayUtils::first($filteredDeliveryTerm);
            $callback($deliveryTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last delivery term from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastDeliveryTerm(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDeliveryTerm = $this->filterDeliveryTerm($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDeliveryTerm)) {
            $deliveryTerm = InvoiceSuiteArrayUtils::last($filteredDeliveryTerm);
            $callback($deliveryTerm);
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
     * Returns the allowances/charges
     *
     * @return array<InvoiceSuiteServiceChargeDTO>
     */
    public function getServiceCharges(): array
    {
        return $this->serviceCharges;
    }

    /**
     * Sets the allowances/charges
     *
     * @param  array<InvoiceSuiteServiceChargeDTO> $serviceCharges The allowances/charges
     * @return static
     */
    public function setServiceCharges(
        array $serviceCharges
    ): static {
        $this->serviceCharges = $serviceCharges;

        return $this;
    }

    /**
     * Add single The allowances/charges
     *
     * @param  InvoiceSuiteServiceChargeDTO $serviceCharge The allowances/charges
     * @return static
     */
    public function addServiceCharge(
        ?InvoiceSuiteServiceChargeDTO $serviceCharge
    ): static {
        if (is_null($serviceCharge)) {
            return $this;
        }

        $this->serviceCharges[] = $serviceCharge;

        return $this;
    }

    /**
     * Get first The allowances/charges
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstServiceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($serviceCharge = InvoiceSuiteArrayUtils::first($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
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
    public function nextServiceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($serviceCharge = InvoiceSuiteArrayUtils::next($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
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
    public function previousServiceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($serviceCharge = InvoiceSuiteArrayUtils::previous($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
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
    public function lastServiceCharge(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($serviceCharge = InvoiceSuiteArrayUtils::last($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
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
    public function forEachServiceCharge(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->serviceCharges as $serviceCharge) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($serviceCharge);
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
    public function forEachOrFirstServiceCharge(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstServiceCharge($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->serviceCharges as $serviceCharge) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($serviceCharge);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The allowances/charges
     *
     * @param  callable                            $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteServiceChargeDTO>
     */
    public function filterServiceCharge(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->serviceCharges, $callback);
    }

    /**
     * Get first The allowances/charges from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstServiceCharge(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredServiceCharge = $this->filterServiceCharge($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredServiceCharge)) {
            $serviceCharge = InvoiceSuiteArrayUtils::first($filteredServiceCharge);
            $callback($serviceCharge);
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
    public function filterLastServiceCharge(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredServiceCharge = $this->filterServiceCharge($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredServiceCharge)) {
            $serviceCharge = InvoiceSuiteArrayUtils::last($filteredServiceCharge);
            $callback($serviceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the summation
     *
     * @return array<InvoiceSuiteSummationDTO>
     */
    public function getSummations(): array
    {
        return $this->summations;
    }

    /**
     * Sets the summation
     *
     * @param  array<InvoiceSuiteSummationDTO> $summations The summation
     * @return static
     */
    public function setSummations(
        array $summations
    ): static {
        $this->summations = $summations;

        return $this;
    }

    /**
     * Add single The summation
     *
     * @param  InvoiceSuiteSummationDTO $summation The summation
     * @return static
     */
    public function addSummation(
        ?InvoiceSuiteSummationDTO $summation
    ): static {
        if (is_null($summation)) {
            return $this;
        }

        $this->summations[] = $summation;

        return $this;
    }

    /**
     * Get first The summation
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstSummation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($summation = InvoiceSuiteArrayUtils::first($this->summations)) !== false) {
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The summation
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextSummation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($summation = InvoiceSuiteArrayUtils::next($this->summations)) !== false) {
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The summation
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousSummation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($summation = InvoiceSuiteArrayUtils::previous($this->summations)) !== false) {
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The summation
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastSummation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($summation = InvoiceSuiteArrayUtils::last($this->summations)) !== false) {
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The summation and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachSummation(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->summations as $summation) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($summation);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The summation and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstSummation(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstSummation($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->summations as $summation) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($summation);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The summation
     *
     * @param  callable                        $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteSummationDTO>
     */
    public function filterSummation(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->summations, $callback);
    }

    /**
     * Get first The summation from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstSummation(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSummation = $this->filterSummation($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSummation)) {
            $summation = InvoiceSuiteArrayUtils::first($filteredSummation);
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The summation from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastSummation(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredSummation = $this->filterSummation($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredSummation)) {
            $summation = InvoiceSuiteArrayUtils::last($filteredSummation);
            $callback($summation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
