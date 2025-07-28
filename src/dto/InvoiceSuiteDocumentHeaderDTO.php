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
class InvoiceSuiteDocumentHeaderDTO
{
    /**
     * The document number issued by the seller
     *
     * @var string|null
     */
    protected ?string $number = null;

    /**
     * The type of the document expressed as a code
     *
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * The document type as free text
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * The language code in which the document was written
     *
     * @var string|null
     */
    protected ?string $language = null;

    /**
     * Date of the document. The date when the document was issued by the seller
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $date = null;

    /**
     * The contractual due date of the document
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $completeDate = null;

    /**
     * The date of the delivery
     *
     * @var DateTimeInterface|null
     */
    protected ?DateTimeInterface $supplyChainEvent = null;

    /**
     * The code for the invoice currency
     *
     * @var string|null
     */
    protected ?string $currency = null;

    /**
     * The code for the tax currency
     *
     * @var string|null
     */
    protected ?string $taxCurrency = null;

    /**
     * The flag that indicated that this document is a copy
     *
     * @var bool|null
     */
    protected ?bool $isCopy = null;

    /**
     * The flag that indicated that this document is a test
     *
     * @var bool|null
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
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $sellerParty = null;

    /**
     * The Buyer/Customer Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $buyerParty = null;

    /**
     * The Tax Representativ Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $taxRepresentativeParty = null;

    /**
     * The Product Enduser Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $productEndUserParty = null;

    /**
     * The Ship-To Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $shipToParty = null;

    /**
     * The Ultimate Ship-To Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $ultimateShipToParty = null;

    /**
     * The Ship-From Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $shipFromParty = null;

    /**
     * The Invoicer Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $invoicerParty = null;

    /**
     * The Invoicee Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $invoiceeParty = null;

    /**
     * The Payee Party
     *
     * @var InvoiceSuitePartyDTO|null
     */
    protected ?InvoiceSuitePartyDTO $payeeParty = null;

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
     * The ID for internal routing (Leitweg ID)
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $buyerReferences = [];

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
     * @var InvoiceSuitesummationDTO|null
     */
    protected ?InvoiceSuitesummationDTO $summation = null;

    /**
     * The Document positions
     *
     * @var array<InvoiceSuiteDocumentPositionDTO>
     */
    protected array $positions = [];

    /**
     * Constructor
     *
     * @param string|null $number The document number issued by the seller
     * @param string|null $type The type of the document expressed as a code
     * @param string|null $description The document type as free text
     * @param string|null $language The language code in which the document was written
     * @param DateTimeInterface|null $date Date of the document. The date when the document was issued by the seller
     * @param DateTimeInterface|null $completeDate The contractual due date of the document
     * @param DateTimeInterface|null $supplyChainEvent The date of the delivery
     * @param string|null $currency The code for the invoice currency
     * @param string|null $taxCurrency The code for the tax currency
     * @param bool|null $isCopy The flag that indicated that this document is a copy
     * @param bool|null $isTest The flag that indicated that this document is a test
     * @param array<InvoiceSuiteNoteDTO> $notes The notes for this document
     * @param array<InvoiceSuiteDateRangeDTO> $billingPeriods The start and/or end date of the billing period
     * @param array<InvoiceSuiteIdDTO> $postingReferences The posting reference
     * @param array<InvoiceSuiteReferenceDocumentDTO> $sellerOrderReferences The associated seller's order confirmation
     * @param array<InvoiceSuiteReferenceDocumentDTO> $buyerOrderReferences The associated buyer's order
     * @param array<InvoiceSuiteReferenceDocumentDTO> $quotationReferences The associated quotation
     * @param array<InvoiceSuiteReferenceDocumentDTO> $contractReferences The associated contract
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $additionalReferences The additional associated document
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $invoiceReferences The additional invoice document
     * @param array<InvoiceSuiteProjectDTO> $projectReferences The project reference
     * @param array<InvoiceSuiteReferenceDocumentDTO> $ultimateCustomerOrderReferences The ultimate customer order reference
     * @param array<InvoiceSuiteReferenceDocumentDTO> $despatchAdviceReferences The despatch advice reference
     * @param array<InvoiceSuiteReferenceDocumentDTO> $receivingAdviceReferences The receiving advice reference
     * @param array<InvoiceSuiteReferenceDocumentDTO> $deliveryNoteReferences The delivery note reference
     * @param InvoiceSuitePartyDTO|null $sellerParty The Seller/Supplier Party
     * @param InvoiceSuitePartyDTO|null $buyerParty The Buyer/Customer Party
     * @param InvoiceSuitePartyDTO|null $taxRepresentativeParty The Tax Representativ Party
     * @param InvoiceSuitePartyDTO|null $productEndUserParty The Product Enduser Party
     * @param InvoiceSuitePartyDTO|null $shipToParty The Ship-To Party
     * @param InvoiceSuitePartyDTO|null $ultimateShipToParty The Ultimate Ship-To Party
     * @param InvoiceSuitePartyDTO|null $shipFromParty The Ship-From Party
     * @param InvoiceSuitePartyDTO|null $invoicerParty The Invoicer Party
     * @param InvoiceSuitePartyDTO|null $invoiceeParty The Invoicee Party
     * @param InvoiceSuitePartyDTO|null $payeeParty The Payee Party
     * @param array<InvoiceSuitePaymentMeanDTO> $paymentMeans The payment means
     * @param array<InvoiceSuitePaymentTermDTO> $paymentTerms The payment terms
     * @param array<InvoiceSuiteIdDTO> $creditorReferences The creditor identifier
     * @param array<InvoiceSuiteIdDTO> $buyerReferences The ID for internal routing (Leitweg ID)
     * @param array<InvoiceSuiteTaxDTO> $taxes The VAT breakdown
     * @param array<InvoiceSuiteAllowanceChargeDTO> $allowanceCharges The allowances/charges
     * @param array<InvoiceSuiteServiceChargeDTO> $serviceCharges The allowances/charges
     * @param InvoiceSuitesummationDTO|null $summation The summation
     * @param array<InvoiceSuiteDocumentPositionDTO> $positions The Document positions
     */
    public function __construct(
        ?string $number = null,
        ?string $type = null,
        ?string $description = null,
        ?string $language = null,
        ?DateTimeInterface $date = null,
        ?DateTimeInterface $completeDate = null,
        ?DateTimeInterface $supplyChainEvent = null,
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
        ?InvoiceSuitePartyDTO $taxRepresentativeParty = null,
        ?InvoiceSuitePartyDTO $productEndUserParty = null,
        ?InvoiceSuitePartyDTO $shipToParty = null,
        ?InvoiceSuitePartyDTO $ultimateShipToParty = null,
        ?InvoiceSuitePartyDTO $shipFromParty = null,
        ?InvoiceSuitePartyDTO $invoicerParty = null,
        ?InvoiceSuitePartyDTO $invoiceeParty = null,
        ?InvoiceSuitePartyDTO $payeeParty = null,
        array $paymentMeans = [],
        array $paymentTerms = [],
        array $creditorReferences = [],
        array $buyerReferences = [],
        array $taxes = [],
        array $allowanceCharges = [],
        array $serviceCharges = [],
        ?InvoiceSuitesummationDTO $summation = null,
        array $positions = [],
    ) {
        $this->setNumber($number);
        $this->setType($type);
        $this->setDescription($description);
        $this->setLanguage($language);
        $this->setDate($date);
        $this->setCompleteDate($completeDate);
        $this->setSupplyChainEvent($supplyChainEvent);
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
        $this->setTaxRepresentativeParty($taxRepresentativeParty);
        $this->setProductEndUserParty($productEndUserParty);
        $this->setShipToParty($shipToParty);
        $this->setUltimateShipToParty($ultimateShipToParty);
        $this->setShipFromParty($shipFromParty);
        $this->setInvoicerParty($invoicerParty);
        $this->setInvoiceeParty($invoiceeParty);
        $this->setPayeeParty($payeeParty);
        $this->setPaymentMeans($paymentMeans);
        $this->setPaymentTerms($paymentTerms);
        $this->setCreditorReferences($creditorReferences);
        $this->setBuyerReferences($buyerReferences);
        $this->setTaxes($taxes);
        $this->setAllowanceCharges($allowanceCharges);
        $this->setServiceCharges($serviceCharges);
        $this->setSummation($summation);
        $this->setPositions($positions);
    }

    /**
     * Returns the document number issued by the seller
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * Sets the document number issued by the seller
     *
     * @param string|null $number The document number issued by the seller
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Returns the type of the document expressed as a code
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the type of the document expressed as a code
     *
     * @param string|null $type The type of the document expressed as a code
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the document type as free text
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the document type as free text
     *
     * @param string|null $description The document type as free text
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the language code in which the document was written
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Sets the language code in which the document was written
     *
     * @param string|null $language The language code in which the document was written
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Returns date of the document. The date when the document was issued by the seller
     *
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Sets date of the document. The date when the document was issued by the seller
     *
     * @param DateTimeInterface|null $date Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function setDate(?DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Returns the contractual due date of the document
     *
     * @return DateTimeInterface|null
     */
    public function getCompleteDate(): ?DateTimeInterface
    {
        return $this->completeDate;
    }

    /**
     * Sets the contractual due date of the document
     *
     * @param DateTimeInterface|null $completeDate The contractual due date of the document
     * @return self
     */
    public function setCompleteDate(?DateTimeInterface $completeDate): self
    {
        $this->completeDate = $completeDate;

        return $this;
    }

    /**
     * Returns the date of the delivery
     *
     * @return DateTimeInterface|null
     */
    public function getSupplyChainEvent(): ?DateTimeInterface
    {
        return $this->supplyChainEvent;
    }

    /**
     * Sets the date of the delivery
     *
     * @param DateTimeInterface|null $supplyChainEvent The date of the delivery
     * @return self
     */
    public function setSupplyChainEvent(?DateTimeInterface $supplyChainEvent): self
    {
        $this->supplyChainEvent = $supplyChainEvent;

        return $this;
    }

    /**
     * Returns the code for the invoice currency
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets the code for the invoice currency
     *
     * @param string|null $currency The code for the invoice currency
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Returns the code for the tax currency
     *
     * @return string|null
     */
    public function getTaxCurrency(): ?string
    {
        return $this->taxCurrency;
    }

    /**
     * Sets the code for the tax currency
     *
     * @param string|null $taxCurrency The code for the tax currency
     * @return self
     */
    public function setTaxCurrency(?string $taxCurrency): self
    {
        $this->taxCurrency = $taxCurrency;

        return $this;
    }

    /**
     * Returns the flag that indicated that this document is a copy
     *
     * @return bool|null
     */
    public function getIsCopy(): ?bool
    {
        return $this->isCopy;
    }

    /**
     * Sets the flag that indicated that this document is a copy
     *
     * @param bool|null $isCopy The flag that indicated that this document is a copy
     * @return self
     */
    public function setIsCopy(?bool $isCopy): self
    {
        $this->isCopy = $isCopy;

        return $this;
    }

    /**
     * Returns the flag that indicated that this document is a test
     *
     * @return bool|null
     */
    public function getIsTest(): ?bool
    {
        return $this->isTest;
    }

    /**
     * Sets the flag that indicated that this document is a test
     *
     * @param bool|null $isTest The flag that indicated that this document is a test
     * @return self
     */
    public function setIsTest(?bool $isTest): self
    {
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
     * @param array<InvoiceSuiteNoteDTO> $notes The notes for this document
     * @return self
     */
    public function setNotes(array $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Add single The notes for this document
     *
     * @param InvoiceSuiteNoteDTO $note The notes for this document
     * @return self
     */
    public function addNote(InvoiceSuiteNoteDTO $note): self
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Get first The notes for this document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstNote(callable $callback, ?callable $callbackElse = null): self
    {
        if (($note = reset($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The notes for this document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextNote(callable $callback, ?callable $callbackElse = null): self
    {
        if (($note = next($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The notes for this document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousNote(callable $callback, ?callable $callbackElse = null): self
    {
        if (($note = prev($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The notes for this document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastNote(callable $callback, ?callable $callbackElse = null): self
    {
        if (($note = end($this->notes)) !== false) {
            $callback($note);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The notes for this document and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachNote(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->notes as $note) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($note);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteDateRangeDTO> $billingPeriods The start and/or end date of the billing period
     * @return self
     */
    public function setBillingPeriods(array $billingPeriods): self
    {
        $this->billingPeriods = $billingPeriods;

        return $this;
    }

    /**
     * Add single The start and/or end date of the billing period
     *
     * @param InvoiceSuiteDateRangeDTO $billingPeriod The start and/or end date of the billing period
     * @return self
     */
    public function addBillingPeriod(InvoiceSuiteDateRangeDTO $billingPeriod): self
    {
        $this->billingPeriods[] = $billingPeriod;

        return $this;
    }

    /**
     * Get first The start and/or end date of the billing period
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstBillingPeriod(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextBillingPeriod(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousBillingPeriod(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastBillingPeriod(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachBillingPeriod(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->billingPeriods as $billingPeriod) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($billingPeriod);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteIdDTO> $postingReferences The posting reference
     * @return self
     */
    public function setPostingReferences(array $postingReferences): self
    {
        $this->postingReferences = $postingReferences;

        return $this;
    }

    /**
     * Add single The posting reference
     *
     * @param InvoiceSuiteIdDTO $postingReference The posting reference
     * @return self
     */
    public function addPostingReference(InvoiceSuiteIdDTO $postingReference): self
    {
        $this->postingReferences[] = $postingReference;

        return $this;
    }

    /**
     * Get first The posting reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstPostingReference(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextPostingReference(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousPostingReference(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastPostingReference(callable $callback, ?callable $callbackElse = null): self
    {
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
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachPostingReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->postingReferences as $postingReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($postingReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $sellerOrderReferences The associated seller's order confirmation
     * @return self
     */
    public function setSellerOrderReferences(array $sellerOrderReferences): self
    {
        $this->sellerOrderReferences = $sellerOrderReferences;

        return $this;
    }

    /**
     * Add single The associated seller's order confirmation
     *
     * @param InvoiceSuiteReferenceDocumentDTO $sellerOrderReference The associated seller's order confirmation
     * @return self
     */
    public function addSellerOrderReference(InvoiceSuiteReferenceDocumentDTO $sellerOrderReference): self
    {
        $this->sellerOrderReferences[] = $sellerOrderReference;

        return $this;
    }

    /**
     * Get first The associated seller's order confirmation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstSellerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($sellerOrderReference = reset($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated seller's order confirmation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextSellerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($sellerOrderReference = next($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated seller's order confirmation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousSellerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($sellerOrderReference = prev($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated seller's order confirmation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastSellerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($sellerOrderReference = end($this->sellerOrderReferences)) !== false) {
            $callback($sellerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated seller's order confirmation and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachSellerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->sellerOrderReferences as $sellerOrderReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($sellerOrderReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $buyerOrderReferences The associated buyer's order
     * @return self
     */
    public function setBuyerOrderReferences(array $buyerOrderReferences): self
    {
        $this->buyerOrderReferences = $buyerOrderReferences;

        return $this;
    }

    /**
     * Add single The associated buyer's order
     *
     * @param InvoiceSuiteReferenceDocumentDTO $buyerOrderReference The associated buyer's order
     * @return self
     */
    public function addBuyerOrderReference(InvoiceSuiteReferenceDocumentDTO $buyerOrderReference): self
    {
        $this->buyerOrderReferences[] = $buyerOrderReference;

        return $this;
    }

    /**
     * Get first The associated buyer's order
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstBuyerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerOrderReference = reset($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated buyer's order
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextBuyerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerOrderReference = next($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated buyer's order
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousBuyerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerOrderReference = prev($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated buyer's order
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastBuyerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerOrderReference = end($this->buyerOrderReferences)) !== false) {
            $callback($buyerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated buyer's order and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachBuyerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->buyerOrderReferences as $buyerOrderReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($buyerOrderReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $quotationReferences The associated quotation
     * @return self
     */
    public function setQuotationReferences(array $quotationReferences): self
    {
        $this->quotationReferences = $quotationReferences;

        return $this;
    }

    /**
     * Add single The associated quotation
     *
     * @param InvoiceSuiteReferenceDocumentDTO $quotationReference The associated quotation
     * @return self
     */
    public function addQuotationReference(InvoiceSuiteReferenceDocumentDTO $quotationReference): self
    {
        $this->quotationReferences[] = $quotationReference;

        return $this;
    }

    /**
     * Get first The associated quotation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstQuotationReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($quotationReference = reset($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated quotation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextQuotationReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($quotationReference = next($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated quotation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousQuotationReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($quotationReference = prev($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated quotation
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastQuotationReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($quotationReference = end($this->quotationReferences)) !== false) {
            $callback($quotationReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated quotation and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachQuotationReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->quotationReferences as $quotationReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($quotationReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $contractReferences The associated contract
     * @return self
     */
    public function setContractReferences(array $contractReferences): self
    {
        $this->contractReferences = $contractReferences;

        return $this;
    }

    /**
     * Add single The associated contract
     *
     * @param InvoiceSuiteReferenceDocumentDTO $contractReference The associated contract
     * @return self
     */
    public function addContractReference(InvoiceSuiteReferenceDocumentDTO $contractReference): self
    {
        $this->contractReferences[] = $contractReference;

        return $this;
    }

    /**
     * Get first The associated contract
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstContractReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contractReference = reset($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The associated contract
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextContractReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contractReference = next($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The associated contract
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousContractReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contractReference = prev($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The associated contract
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastContractReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contractReference = end($this->contractReferences)) !== false) {
            $callback($contractReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The associated contract and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachContractReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->contractReferences as $contractReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($contractReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $additionalReferences The additional associated document
     * @return self
     */
    public function setAdditionalReferences(array $additionalReferences): self
    {
        $this->additionalReferences = $additionalReferences;

        return $this;
    }

    /**
     * Add single The additional associated document
     *
     * @param InvoiceSuiteReferenceDocumentExtDTO $additionalReference The additional associated document
     * @return self
     */
    public function addAdditionalReference(InvoiceSuiteReferenceDocumentExtDTO $additionalReference): self
    {
        $this->additionalReferences[] = $additionalReference;

        return $this;
    }

    /**
     * Get first The additional associated document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstAdditionalReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($additionalReference = reset($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The additional associated document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextAdditionalReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($additionalReference = next($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The additional associated document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousAdditionalReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($additionalReference = prev($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional associated document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastAdditionalReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($additionalReference = end($this->additionalReferences)) !== false) {
            $callback($additionalReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional associated document and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachAdditionalReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->additionalReferences as $additionalReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($additionalReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentExtDTO> $invoiceReferences The additional invoice document
     * @return self
     */
    public function setInvoiceReferences(array $invoiceReferences): self
    {
        $this->invoiceReferences = $invoiceReferences;

        return $this;
    }

    /**
     * Add single The additional invoice document
     *
     * @param InvoiceSuiteReferenceDocumentExtDTO $invoiceReference The additional invoice document
     * @return self
     */
    public function addInvoiceReference(InvoiceSuiteReferenceDocumentExtDTO $invoiceReference): self
    {
        $this->invoiceReferences[] = $invoiceReference;

        return $this;
    }

    /**
     * Get first The additional invoice document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstInvoiceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($invoiceReference = reset($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The additional invoice document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextInvoiceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($invoiceReference = next($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The additional invoice document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousInvoiceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($invoiceReference = prev($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The additional invoice document
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastInvoiceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($invoiceReference = end($this->invoiceReferences)) !== false) {
            $callback($invoiceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The additional invoice document and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachInvoiceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->invoiceReferences as $invoiceReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($invoiceReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteProjectDTO> $projectReferences The project reference
     * @return self
     */
    public function setProjectReferences(array $projectReferences): self
    {
        $this->projectReferences = $projectReferences;

        return $this;
    }

    /**
     * Add single The project reference
     *
     * @param InvoiceSuiteProjectDTO $projectReference The project reference
     * @return self
     */
    public function addProjectReference(InvoiceSuiteProjectDTO $projectReference): self
    {
        $this->projectReferences[] = $projectReference;

        return $this;
    }

    /**
     * Get first The project reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstProjectReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($projectReference = reset($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The project reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextProjectReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($projectReference = next($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The project reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousProjectReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($projectReference = prev($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The project reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastProjectReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($projectReference = end($this->projectReferences)) !== false) {
            $callback($projectReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The project reference and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachProjectReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->projectReferences as $projectReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($projectReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $ultimateCustomerOrderReferences The ultimate customer order reference
     * @return self
     */
    public function setUltimateCustomerOrderReferences(array $ultimateCustomerOrderReferences): self
    {
        $this->ultimateCustomerOrderReferences = $ultimateCustomerOrderReferences;

        return $this;
    }

    /**
     * Add single The ultimate customer order reference
     *
     * @param InvoiceSuiteReferenceDocumentDTO $ultimateCustomerOrderReference The ultimate customer order reference
     * @return self
     */
    public function addUltimateCustomerOrderReference(
        InvoiceSuiteReferenceDocumentDTO $ultimateCustomerOrderReference,
    ): self {
        $this->ultimateCustomerOrderReferences[] = $ultimateCustomerOrderReference;

        return $this;
    }

    /**
     * Get first The ultimate customer order reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstUltimateCustomerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($ultimateCustomerOrderReference = reset($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The ultimate customer order reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextUltimateCustomerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($ultimateCustomerOrderReference = next($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The ultimate customer order reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousUltimateCustomerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($ultimateCustomerOrderReference = prev($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ultimate customer order reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastUltimateCustomerOrderReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($ultimateCustomerOrderReference = end($this->ultimateCustomerOrderReferences)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ultimate customer order reference and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachUltimateCustomerOrderReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->ultimateCustomerOrderReferences as $ultimateCustomerOrderReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($ultimateCustomerOrderReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $despatchAdviceReferences The despatch advice reference
     * @return self
     */
    public function setDespatchAdviceReferences(array $despatchAdviceReferences): self
    {
        $this->despatchAdviceReferences = $despatchAdviceReferences;

        return $this;
    }

    /**
     * Add single The despatch advice reference
     *
     * @param InvoiceSuiteReferenceDocumentDTO $despatchAdviceReference The despatch advice reference
     * @return self
     */
    public function addDespatchAdviceReference(InvoiceSuiteReferenceDocumentDTO $despatchAdviceReference): self
    {
        $this->despatchAdviceReferences[] = $despatchAdviceReference;

        return $this;
    }

    /**
     * Get first The despatch advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstDespatchAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($despatchAdviceReference = reset($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The despatch advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextDespatchAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($despatchAdviceReference = next($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The despatch advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousDespatchAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($despatchAdviceReference = prev($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The despatch advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastDespatchAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($despatchAdviceReference = end($this->despatchAdviceReferences)) !== false) {
            $callback($despatchAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The despatch advice reference and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachDespatchAdviceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->despatchAdviceReferences as $despatchAdviceReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($despatchAdviceReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $receivingAdviceReferences The receiving advice reference
     * @return self
     */
    public function setReceivingAdviceReferences(array $receivingAdviceReferences): self
    {
        $this->receivingAdviceReferences = $receivingAdviceReferences;

        return $this;
    }

    /**
     * Add single The receiving advice reference
     *
     * @param InvoiceSuiteReferenceDocumentDTO $receivingAdviceReference The receiving advice reference
     * @return self
     */
    public function addReceivingAdviceReference(InvoiceSuiteReferenceDocumentDTO $receivingAdviceReference): self
    {
        $this->receivingAdviceReferences[] = $receivingAdviceReference;

        return $this;
    }

    /**
     * Get first The receiving advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstReceivingAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($receivingAdviceReference = reset($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The receiving advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextReceivingAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($receivingAdviceReference = next($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The receiving advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousReceivingAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($receivingAdviceReference = prev($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The receiving advice reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastReceivingAdviceReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($receivingAdviceReference = end($this->receivingAdviceReferences)) !== false) {
            $callback($receivingAdviceReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The receiving advice reference and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachReceivingAdviceReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->receivingAdviceReferences as $receivingAdviceReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($receivingAdviceReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteReferenceDocumentDTO> $deliveryNoteReferences The delivery note reference
     * @return self
     */
    public function setDeliveryNoteReferences(array $deliveryNoteReferences): self
    {
        $this->deliveryNoteReferences = $deliveryNoteReferences;

        return $this;
    }

    /**
     * Add single The delivery note reference
     *
     * @param InvoiceSuiteReferenceDocumentDTO $deliveryNoteReference The delivery note reference
     * @return self
     */
    public function addDeliveryNoteReference(InvoiceSuiteReferenceDocumentDTO $deliveryNoteReference): self
    {
        $this->deliveryNoteReferences[] = $deliveryNoteReference;

        return $this;
    }

    /**
     * Get first The delivery note reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstDeliveryNoteReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($deliveryNoteReference = reset($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The delivery note reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextDeliveryNoteReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($deliveryNoteReference = next($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The delivery note reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousDeliveryNoteReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($deliveryNoteReference = prev($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The delivery note reference
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastDeliveryNoteReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($deliveryNoteReference = end($this->deliveryNoteReferences)) !== false) {
            $callback($deliveryNoteReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The delivery note reference and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachDeliveryNoteReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->deliveryNoteReferences as $deliveryNoteReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($deliveryNoteReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the Seller/Supplier Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getSellerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->sellerParty;
    }

    /**
     * Sets the Seller/Supplier Party
     *
     * @param InvoiceSuitePartyDTO|null $sellerParty The Seller/Supplier Party
     * @return self
     */
    public function setSellerParty(?InvoiceSuitePartyDTO $sellerParty): self
    {
        $this->sellerParty = $sellerParty;

        return $this;
    }

    /**
     * Returns the Buyer/Customer Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getBuyerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->buyerParty;
    }

    /**
     * Sets the Buyer/Customer Party
     *
     * @param InvoiceSuitePartyDTO|null $buyerParty The Buyer/Customer Party
     * @return self
     */
    public function setBuyerParty(?InvoiceSuitePartyDTO $buyerParty): self
    {
        $this->buyerParty = $buyerParty;

        return $this;
    }

    /**
     * Returns the Tax Representativ Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getTaxRepresentativeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->taxRepresentativeParty;
    }

    /**
     * Sets the Tax Representativ Party
     *
     * @param InvoiceSuitePartyDTO|null $taxRepresentativeParty The Tax Representativ Party
     * @return self
     */
    public function setTaxRepresentativeParty(?InvoiceSuitePartyDTO $taxRepresentativeParty): self
    {
        $this->taxRepresentativeParty = $taxRepresentativeParty;

        return $this;
    }

    /**
     * Returns the Product Enduser Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getProductEndUserParty(): ?InvoiceSuitePartyDTO
    {
        return $this->productEndUserParty;
    }

    /**
     * Sets the Product Enduser Party
     *
     * @param InvoiceSuitePartyDTO|null $productEndUserParty The Product Enduser Party
     * @return self
     */
    public function setProductEndUserParty(?InvoiceSuitePartyDTO $productEndUserParty): self
    {
        $this->productEndUserParty = $productEndUserParty;

        return $this;
    }

    /**
     * Returns the Ship-To Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getShipToParty(): ?InvoiceSuitePartyDTO
    {
        return $this->shipToParty;
    }

    /**
     * Sets the Ship-To Party
     *
     * @param InvoiceSuitePartyDTO|null $shipToParty The Ship-To Party
     * @return self
     */
    public function setShipToParty(?InvoiceSuitePartyDTO $shipToParty): self
    {
        $this->shipToParty = $shipToParty;

        return $this;
    }

    /**
     * Returns the Ultimate Ship-To Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getUltimateShipToParty(): ?InvoiceSuitePartyDTO
    {
        return $this->ultimateShipToParty;
    }

    /**
     * Sets the Ultimate Ship-To Party
     *
     * @param InvoiceSuitePartyDTO|null $ultimateShipToParty The Ultimate Ship-To Party
     * @return self
     */
    public function setUltimateShipToParty(?InvoiceSuitePartyDTO $ultimateShipToParty): self
    {
        $this->ultimateShipToParty = $ultimateShipToParty;

        return $this;
    }

    /**
     * Returns the Ship-From Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getShipFromParty(): ?InvoiceSuitePartyDTO
    {
        return $this->shipFromParty;
    }

    /**
     * Sets the Ship-From Party
     *
     * @param InvoiceSuitePartyDTO|null $shipFromParty The Ship-From Party
     * @return self
     */
    public function setShipFromParty(?InvoiceSuitePartyDTO $shipFromParty): self
    {
        $this->shipFromParty = $shipFromParty;

        return $this;
    }

    /**
     * Returns the Invoicer Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getInvoicerParty(): ?InvoiceSuitePartyDTO
    {
        return $this->invoicerParty;
    }

    /**
     * Sets the Invoicer Party
     *
     * @param InvoiceSuitePartyDTO|null $invoicerParty The Invoicer Party
     * @return self
     */
    public function setInvoicerParty(?InvoiceSuitePartyDTO $invoicerParty): self
    {
        $this->invoicerParty = $invoicerParty;

        return $this;
    }

    /**
     * Returns the Invoicee Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getInvoiceeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->invoiceeParty;
    }

    /**
     * Sets the Invoicee Party
     *
     * @param InvoiceSuitePartyDTO|null $invoiceeParty The Invoicee Party
     * @return self
     */
    public function setInvoiceeParty(?InvoiceSuitePartyDTO $invoiceeParty): self
    {
        $this->invoiceeParty = $invoiceeParty;

        return $this;
    }

    /**
     * Returns the Payee Party
     *
     * @return InvoiceSuitePartyDTO|null
     */
    public function getPayeeParty(): ?InvoiceSuitePartyDTO
    {
        return $this->payeeParty;
    }

    /**
     * Sets the Payee Party
     *
     * @param InvoiceSuitePartyDTO|null $payeeParty The Payee Party
     * @return self
     */
    public function setPayeeParty(?InvoiceSuitePartyDTO $payeeParty): self
    {
        $this->payeeParty = $payeeParty;

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
     * @param array<InvoiceSuitePaymentMeanDTO> $paymentMeans The payment means
     * @return self
     */
    public function setPaymentMeans(array $paymentMeans): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * Add single The payment means
     *
     * @param InvoiceSuitePaymentMeanDTO $paymentMean The payment means
     * @return self
     */
    public function addPaymentMean(InvoiceSuitePaymentMeanDTO $paymentMean): self
    {
        $this->paymentMeans[] = $paymentMean;

        return $this;
    }

    /**
     * Get first The payment means
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstPaymentMean(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentMean = reset($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The payment means
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextPaymentMean(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentMean = next($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The payment means
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousPaymentMean(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentMean = prev($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment means
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastPaymentMean(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentMean = end($this->paymentMeans)) !== false) {
            $callback($paymentMean);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment means and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachPaymentMean(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->paymentMeans as $paymentMean) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($paymentMean);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuitePaymentTermDTO> $paymentTerms The payment terms
     * @return self
     */
    public function setPaymentTerms(array $paymentTerms): self
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * Add single The payment terms
     *
     * @param InvoiceSuitePaymentTermDTO $paymentTerm The payment terms
     * @return self
     */
    public function addPaymentTerm(InvoiceSuitePaymentTermDTO $paymentTerm): self
    {
        $this->paymentTerms[] = $paymentTerm;

        return $this;
    }

    /**
     * Get first The payment terms
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstPaymentTerm(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentTerm = reset($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The payment terms
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextPaymentTerm(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentTerm = next($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The payment terms
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousPaymentTerm(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentTerm = prev($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The payment terms
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastPaymentTerm(callable $callback, ?callable $callbackElse = null): self
    {
        if (($paymentTerm = end($this->paymentTerms)) !== false) {
            $callback($paymentTerm);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The payment terms and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachPaymentTerm(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->paymentTerms as $paymentTerm) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($paymentTerm);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteIdDTO> $creditorReferences The creditor identifier
     * @return self
     */
    public function setCreditorReferences(array $creditorReferences): self
    {
        $this->creditorReferences = $creditorReferences;

        return $this;
    }

    /**
     * Add single The creditor identifier
     *
     * @param InvoiceSuiteIdDTO $creditorReference The creditor identifier
     * @return self
     */
    public function addCreditorReference(InvoiceSuiteIdDTO $creditorReference): self
    {
        $this->creditorReferences[] = $creditorReference;

        return $this;
    }

    /**
     * Get first The creditor identifier
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstCreditorReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($creditorReference = reset($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The creditor identifier
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextCreditorReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($creditorReference = next($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The creditor identifier
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousCreditorReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($creditorReference = prev($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The creditor identifier
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastCreditorReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($creditorReference = end($this->creditorReferences)) !== false) {
            $callback($creditorReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The creditor identifier and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachCreditorReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->creditorReferences as $creditorReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($creditorReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteIdDTO> $buyerReferences The ID for internal routing (Leitweg ID)
     * @return self
     */
    public function setBuyerReferences(array $buyerReferences): self
    {
        $this->buyerReferences = $buyerReferences;

        return $this;
    }

    /**
     * Add single The ID for internal routing (Leitweg ID)
     *
     * @param InvoiceSuiteIdDTO $buyerReference The ID for internal routing (Leitweg ID)
     * @return self
     */
    public function addBuyerReference(InvoiceSuiteIdDTO $buyerReference): self
    {
        $this->buyerReferences[] = $buyerReference;

        return $this;
    }

    /**
     * Get first The ID for internal routing (Leitweg ID)
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstBuyerReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerReference = reset($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The ID for internal routing (Leitweg ID)
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextBuyerReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerReference = next($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The ID for internal routing (Leitweg ID)
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousBuyerReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerReference = prev($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The ID for internal routing (Leitweg ID)
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastBuyerReference(callable $callback, ?callable $callbackElse = null): self
    {
        if (($buyerReference = end($this->buyerReferences)) !== false) {
            $callback($buyerReference);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The ID for internal routing (Leitweg ID) and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachBuyerReference(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->buyerReferences as $buyerReference) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($buyerReference);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteTaxDTO> $taxes The VAT breakdown
     * @return self
     */
    public function setTaxes(array $taxes): self
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Add single The VAT breakdown
     *
     * @param InvoiceSuiteTaxDTO $tax The VAT breakdown
     * @return self
     */
    public function addTax(InvoiceSuiteTaxDTO $tax): self
    {
        $this->taxes[] = $tax;

        return $this;
    }

    /**
     * Get first The VAT breakdown
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get next The VAT breakdown
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get previous The VAT breakdown
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get last The VAT breakdown
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Loop over The VAT breakdown and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachTax(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->taxes as $tax) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($tax);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteAllowanceChargeDTO> $allowanceCharges The allowances/charges
     * @return self
     */
    public function setAllowanceCharges(array $allowanceCharges): self
    {
        $this->allowanceCharges = $allowanceCharges;

        return $this;
    }

    /**
     * Add single The allowances/charges
     *
     * @param InvoiceSuiteAllowanceChargeDTO $allowanceCharge The allowances/charges
     * @return self
     */
    public function addAllowanceCharge(InvoiceSuiteAllowanceChargeDTO $allowanceCharge): self
    {
        $this->allowanceCharges[] = $allowanceCharge;

        return $this;
    }

    /**
     * Get first The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get next The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get previous The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Get last The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
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
     * Loop over The allowances/charges and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
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

            $count++;

            $callback($allowanceCharge);
        }

        if ($count === 0 && !is_null($callbackElse)) {
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
     * @param array<InvoiceSuiteServiceChargeDTO> $serviceCharges The allowances/charges
     * @return self
     */
    public function setServiceCharges(array $serviceCharges): self
    {
        $this->serviceCharges = $serviceCharges;

        return $this;
    }

    /**
     * Add single The allowances/charges
     *
     * @param InvoiceSuiteServiceChargeDTO $serviceCharge The allowances/charges
     * @return self
     */
    public function addServiceCharge(InvoiceSuiteServiceChargeDTO $serviceCharge): self
    {
        $this->serviceCharges[] = $serviceCharge;

        return $this;
    }

    /**
     * Get first The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstServiceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($serviceCharge = reset($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextServiceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($serviceCharge = next($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousServiceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($serviceCharge = prev($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The allowances/charges
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastServiceCharge(callable $callback, ?callable $callbackElse = null): self
    {
        if (($serviceCharge = end($this->serviceCharges)) !== false) {
            $callback($serviceCharge);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The allowances/charges and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachServiceCharge(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->serviceCharges as $serviceCharge) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($serviceCharge);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the summation
     *
     * @return InvoiceSuitesummationDTO|null
     */
    public function getSummation(): ?InvoiceSuitesummationDTO
    {
        return $this->summation;
    }

    /**
     * Sets the summation
     *
     * @param InvoiceSuitesummationDTO|null $summation The summation
     * @return self
     */
    public function setSummation(?InvoiceSuitesummationDTO $summation): self
    {
        $this->summation = $summation;

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
     * @param array<InvoiceSuiteDocumentPositionDTO> $positions The Document positions
     * @return self
     */
    public function setPositions(array $positions): self
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Add single The Document positions
     *
     * @param InvoiceSuiteDocumentPositionDTO $position The Document positions
     * @return self
     */
    public function addPosition(InvoiceSuiteDocumentPositionDTO $position): self
    {
        $this->positions[] = $position;

        return $this;
    }

    /**
     * Get first The Document positions
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstPosition(callable $callback, ?callable $callbackElse = null): self
    {
        if (($position = reset($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The Document positions
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextPosition(callable $callback, ?callable $callbackElse = null): self
    {
        if (($position = next($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The Document positions
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousPosition(callable $callback, ?callable $callbackElse = null): self
    {
        if (($position = prev($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The Document positions
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastPosition(callable $callback, ?callable $callbackElse = null): self
    {
        if (($position = end($this->positions)) !== false) {
            $callback($position);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The Document positions and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachPosition(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->positions as $position) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($position);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
