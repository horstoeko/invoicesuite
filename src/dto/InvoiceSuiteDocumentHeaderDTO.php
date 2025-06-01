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
    protected array $note = [];

    /**
     * The start and/or end date of the billing period
     *
     * @var array<InvoiceSuitePeriodDTO>
     */
    protected array $billingPeriod = [];

    /**
     * The posting reference
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $postingReference = [];

    /**
     * The associated seller's order confirmation
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $sellerOrderReference = [];

    /**
     * The associated buyer's order
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $buyerOrderReference = [];

    /**
     * The associated quotation
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $quotationReference = [];

    /**
     * The associated contract
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $contractReference = [];

    /**
     * The additional associated document
     *
     * @var array<InvoiceSuiteReferenceExtDTO>
     */
    protected array $additionalReference = [];

    /**
     * The additional invoice document
     *
     * @var array<InvoiceSuiteReferenceExtDTO>
     */
    protected array $invoiceReference = [];

    /**
     * The project reference
     *
     * @var array<InvoiceSuiteProjectDTO>
     */
    protected array $projectReference = [];

    /**
     * The ultimate customer order reference
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $ultimateCustomerOrderReference = [];

    /**
     * The despatch advice reference
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $despatchAdviceReference = [];

    /**
     * The receiving advice reference
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $receivingAdviceReference = [];

    /**
     * The delivery note reference
     *
     * @var array<InvoiceSuiteReferenceDTO>
     */
    protected array $deliveryNoteReference = [];

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
     * @param array<InvoiceSuiteNoteDTO> $note The notes for this document
     * @param array<InvoiceSuitePeriodDTO> $billingPeriod The start and/or end date of the billing period
     * @param array<InvoiceSuiteIdDTO> $postingReference The posting reference
     * @param array<InvoiceSuiteReferenceDTO> $sellerOrderReference The associated seller's order confirmation
     * @param array<InvoiceSuiteReferenceDTO> $buyerOrderReference The associated buyer's order
     * @param array<InvoiceSuiteReferenceDTO> $quotationReference The associated quotation
     * @param array<InvoiceSuiteReferenceDTO> $contractReference The associated contract
     * @param array<InvoiceSuiteReferenceExtDTO> $additionalReference The additional associated document
     * @param array<InvoiceSuiteReferenceExtDTO> $invoiceReference The additional invoice document
     * @param array<InvoiceSuiteProjectDTO> $projectReference The project reference
     * @param array<InvoiceSuiteReferenceDTO> $ultimateCustomerOrderReference The ultimate customer order reference
     * @param array<InvoiceSuiteReferenceDTO> $despatchAdviceReference The despatch advice reference
     * @param array<InvoiceSuiteReferenceDTO> $receivingAdviceReference The receiving advice reference
     * @param array<InvoiceSuiteReferenceDTO> $deliveryNoteReference The delivery note reference
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
        array $note = [],
        array $billingPeriod = [],
        array $postingReference = [],
        array $sellerOrderReference = [],
        array $buyerOrderReference = [],
        array $quotationReference = [],
        array $contractReference = [],
        array $additionalReference = [],
        array $invoiceReference = [],
        array $projectReference = [],
        array $ultimateCustomerOrderReference = [],
        array $despatchAdviceReference = [],
        array $receivingAdviceReference = [],
        array $deliveryNoteReference = [],
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
        $this->setNote($note);
        $this->setBillingPeriod($billingPeriod);
        $this->setPostingReference($postingReference);
        $this->setSellerOrderReference($sellerOrderReference);
        $this->setBuyerOrderReference($buyerOrderReference);
        $this->setQuotationReference($quotationReference);
        $this->setContractReference($contractReference);
        $this->setAdditionalReference($additionalReference);
        $this->setInvoiceReference($invoiceReference);
        $this->setProjectReference($projectReference);
        $this->setUltimateCustomerOrderReference($ultimateCustomerOrderReference);
        $this->setDespatchAdviceReference($despatchAdviceReference);
        $this->setReceivingAdviceReference($receivingAdviceReference);
        $this->setDeliveryNoteReference($deliveryNoteReference);
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
    public function getNote(): array
    {
        return $this->note;
    }

    /**
     * Sets the notes for this document
     *
     * @param array<InvoiceSuiteNoteDTO> $note The notes for this document
     * @return self
     */
    public function setNote(array $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Add single The notes for this document
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteNoteDTO $note The notes for this document
     * @return self
     */
    public function addNote(InvoiceSuiteNoteDTO $note): self
    {
        $this->note[] = $note;

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
        if (($note = reset($this->note)) !== false) {
            $callback($note);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($note = next($this->note)) !== false) {
            $callback($note);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($note = prev($this->note)) !== false) {
            $callback($note);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($note = end($this->note)) !== false) {
            $callback($note);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->note as $note) {
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
     * @return array<InvoiceSuitePeriodDTO>
     */
    public function getBillingPeriod(): array
    {
        return $this->billingPeriod;
    }

    /**
     * Sets the start and/or end date of the billing period
     *
     * @param array<InvoiceSuitePeriodDTO> $billingPeriod The start and/or end date of the billing period
     * @return self
     */
    public function setBillingPeriod(array $billingPeriod): self
    {
        $this->billingPeriod = $billingPeriod;

        return $this;
    }

    /**
     * Add single The start and/or end date of the billing period
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuitePeriodDTO $billingPeriod The start and/or end date of the billing period
     * @return self
     */
    public function addBillingPeriod(InvoiceSuitePeriodDTO $billingPeriod): self
    {
        $this->billingPeriod[] = $billingPeriod;

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
        if (($billingPeriod = reset($this->billingPeriod)) !== false) {
            $callback($billingPeriod);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($billingPeriod = next($this->billingPeriod)) !== false) {
            $callback($billingPeriod);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($billingPeriod = prev($this->billingPeriod)) !== false) {
            $callback($billingPeriod);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($billingPeriod = end($this->billingPeriod)) !== false) {
            $callback($billingPeriod);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->billingPeriod as $billingPeriod) {
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
    public function getPostingReference(): array
    {
        return $this->postingReference;
    }

    /**
     * Sets the posting reference
     *
     * @param array<InvoiceSuiteIdDTO> $postingReference The posting reference
     * @return self
     */
    public function setPostingReference(array $postingReference): self
    {
        $this->postingReference = $postingReference;

        return $this;
    }

    /**
     * Add single The posting reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteIdDTO $postingReference The posting reference
     * @return self
     */
    public function addPostingReference(InvoiceSuiteIdDTO $postingReference): self
    {
        $this->postingReference[] = $postingReference;

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
        if (($postingReference = reset($this->postingReference)) !== false) {
            $callback($postingReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($postingReference = next($this->postingReference)) !== false) {
            $callback($postingReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($postingReference = prev($this->postingReference)) !== false) {
            $callback($postingReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($postingReference = end($this->postingReference)) !== false) {
            $callback($postingReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->postingReference as $postingReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getSellerOrderReference(): array
    {
        return $this->sellerOrderReference;
    }

    /**
     * Sets the associated seller's order confirmation
     *
     * @param array<InvoiceSuiteReferenceDTO> $sellerOrderReference The associated seller's order confirmation
     * @return self
     */
    public function setSellerOrderReference(array $sellerOrderReference): self
    {
        $this->sellerOrderReference = $sellerOrderReference;

        return $this;
    }

    /**
     * Add single The associated seller's order confirmation
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $sellerOrderReference The associated seller's order confirmation
     * @return self
     */
    public function addSellerOrderReference(InvoiceSuiteReferenceDTO $sellerOrderReference): self
    {
        $this->sellerOrderReference[] = $sellerOrderReference;

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
        if (($sellerOrderReference = reset($this->sellerOrderReference)) !== false) {
            $callback($sellerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($sellerOrderReference = next($this->sellerOrderReference)) !== false) {
            $callback($sellerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($sellerOrderReference = prev($this->sellerOrderReference)) !== false) {
            $callback($sellerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($sellerOrderReference = end($this->sellerOrderReference)) !== false) {
            $callback($sellerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->sellerOrderReference as $sellerOrderReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getBuyerOrderReference(): array
    {
        return $this->buyerOrderReference;
    }

    /**
     * Sets the associated buyer's order
     *
     * @param array<InvoiceSuiteReferenceDTO> $buyerOrderReference The associated buyer's order
     * @return self
     */
    public function setBuyerOrderReference(array $buyerOrderReference): self
    {
        $this->buyerOrderReference = $buyerOrderReference;

        return $this;
    }

    /**
     * Add single The associated buyer's order
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $buyerOrderReference The associated buyer's order
     * @return self
     */
    public function addBuyerOrderReference(InvoiceSuiteReferenceDTO $buyerOrderReference): self
    {
        $this->buyerOrderReference[] = $buyerOrderReference;

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
        if (($buyerOrderReference = reset($this->buyerOrderReference)) !== false) {
            $callback($buyerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($buyerOrderReference = next($this->buyerOrderReference)) !== false) {
            $callback($buyerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($buyerOrderReference = prev($this->buyerOrderReference)) !== false) {
            $callback($buyerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($buyerOrderReference = end($this->buyerOrderReference)) !== false) {
            $callback($buyerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->buyerOrderReference as $buyerOrderReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getQuotationReference(): array
    {
        return $this->quotationReference;
    }

    /**
     * Sets the associated quotation
     *
     * @param array<InvoiceSuiteReferenceDTO> $quotationReference The associated quotation
     * @return self
     */
    public function setQuotationReference(array $quotationReference): self
    {
        $this->quotationReference = $quotationReference;

        return $this;
    }

    /**
     * Add single The associated quotation
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $quotationReference The associated quotation
     * @return self
     */
    public function addQuotationReference(InvoiceSuiteReferenceDTO $quotationReference): self
    {
        $this->quotationReference[] = $quotationReference;

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
        if (($quotationReference = reset($this->quotationReference)) !== false) {
            $callback($quotationReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($quotationReference = next($this->quotationReference)) !== false) {
            $callback($quotationReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($quotationReference = prev($this->quotationReference)) !== false) {
            $callback($quotationReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($quotationReference = end($this->quotationReference)) !== false) {
            $callback($quotationReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->quotationReference as $quotationReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getContractReference(): array
    {
        return $this->contractReference;
    }

    /**
     * Sets the associated contract
     *
     * @param array<InvoiceSuiteReferenceDTO> $contractReference The associated contract
     * @return self
     */
    public function setContractReference(array $contractReference): self
    {
        $this->contractReference = $contractReference;

        return $this;
    }

    /**
     * Add single The associated contract
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $contractReference The associated contract
     * @return self
     */
    public function addContractReference(InvoiceSuiteReferenceDTO $contractReference): self
    {
        $this->contractReference[] = $contractReference;

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
        if (($contractReference = reset($this->contractReference)) !== false) {
            $callback($contractReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($contractReference = next($this->contractReference)) !== false) {
            $callback($contractReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($contractReference = prev($this->contractReference)) !== false) {
            $callback($contractReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($contractReference = end($this->contractReference)) !== false) {
            $callback($contractReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->contractReference as $contractReference) {
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
     * @return array<InvoiceSuiteReferenceExtDTO>
     */
    public function getAdditionalReference(): array
    {
        return $this->additionalReference;
    }

    /**
     * Sets the additional associated document
     *
     * @param array<InvoiceSuiteReferenceExtDTO> $additionalReference The additional associated document
     * @return self
     */
    public function setAdditionalReference(array $additionalReference): self
    {
        $this->additionalReference = $additionalReference;

        return $this;
    }

    /**
     * Add single The additional associated document
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceExtDTO $additionalReference The additional associated document
     * @return self
     */
    public function addAdditionalReference(InvoiceSuiteReferenceExtDTO $additionalReference): self
    {
        $this->additionalReference[] = $additionalReference;

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
        if (($additionalReference = reset($this->additionalReference)) !== false) {
            $callback($additionalReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($additionalReference = next($this->additionalReference)) !== false) {
            $callback($additionalReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($additionalReference = prev($this->additionalReference)) !== false) {
            $callback($additionalReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($additionalReference = end($this->additionalReference)) !== false) {
            $callback($additionalReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->additionalReference as $additionalReference) {
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
     * @return array<InvoiceSuiteReferenceExtDTO>
     */
    public function getInvoiceReference(): array
    {
        return $this->invoiceReference;
    }

    /**
     * Sets the additional invoice document
     *
     * @param array<InvoiceSuiteReferenceExtDTO> $invoiceReference The additional invoice document
     * @return self
     */
    public function setInvoiceReference(array $invoiceReference): self
    {
        $this->invoiceReference = $invoiceReference;

        return $this;
    }

    /**
     * Add single The additional invoice document
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceExtDTO $invoiceReference The additional invoice document
     * @return self
     */
    public function addInvoiceReference(InvoiceSuiteReferenceExtDTO $invoiceReference): self
    {
        $this->invoiceReference[] = $invoiceReference;

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
        if (($invoiceReference = reset($this->invoiceReference)) !== false) {
            $callback($invoiceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($invoiceReference = next($this->invoiceReference)) !== false) {
            $callback($invoiceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($invoiceReference = prev($this->invoiceReference)) !== false) {
            $callback($invoiceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($invoiceReference = end($this->invoiceReference)) !== false) {
            $callback($invoiceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->invoiceReference as $invoiceReference) {
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
    public function getProjectReference(): array
    {
        return $this->projectReference;
    }

    /**
     * Sets the project reference
     *
     * @param array<InvoiceSuiteProjectDTO> $projectReference The project reference
     * @return self
     */
    public function setProjectReference(array $projectReference): self
    {
        $this->projectReference = $projectReference;

        return $this;
    }

    /**
     * Add single The project reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteProjectDTO $projectReference The project reference
     * @return self
     */
    public function addProjectReference(InvoiceSuiteProjectDTO $projectReference): self
    {
        $this->projectReference[] = $projectReference;

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
        if (($projectReference = reset($this->projectReference)) !== false) {
            $callback($projectReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($projectReference = next($this->projectReference)) !== false) {
            $callback($projectReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($projectReference = prev($this->projectReference)) !== false) {
            $callback($projectReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($projectReference = end($this->projectReference)) !== false) {
            $callback($projectReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->projectReference as $projectReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getUltimateCustomerOrderReference(): array
    {
        return $this->ultimateCustomerOrderReference;
    }

    /**
     * Sets the ultimate customer order reference
     *
     * @param array<InvoiceSuiteReferenceDTO> $ultimateCustomerOrderReference The ultimate customer order reference
     * @return self
     */
    public function setUltimateCustomerOrderReference(array $ultimateCustomerOrderReference): self
    {
        $this->ultimateCustomerOrderReference = $ultimateCustomerOrderReference;

        return $this;
    }

    /**
     * Add single The ultimate customer order reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $ultimateCustomerOrderReference The ultimate customer order reference
     * @return self
     */
    public function addUltimateCustomerOrderReference(InvoiceSuiteReferenceDTO $ultimateCustomerOrderReference): self
    {
        $this->ultimateCustomerOrderReference[] = $ultimateCustomerOrderReference;

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
        if (($ultimateCustomerOrderReference = reset($this->ultimateCustomerOrderReference)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($ultimateCustomerOrderReference = next($this->ultimateCustomerOrderReference)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($ultimateCustomerOrderReference = prev($this->ultimateCustomerOrderReference)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($ultimateCustomerOrderReference = end($this->ultimateCustomerOrderReference)) !== false) {
            $callback($ultimateCustomerOrderReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->ultimateCustomerOrderReference as $ultimateCustomerOrderReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getDespatchAdviceReference(): array
    {
        return $this->despatchAdviceReference;
    }

    /**
     * Sets the despatch advice reference
     *
     * @param array<InvoiceSuiteReferenceDTO> $despatchAdviceReference The despatch advice reference
     * @return self
     */
    public function setDespatchAdviceReference(array $despatchAdviceReference): self
    {
        $this->despatchAdviceReference = $despatchAdviceReference;

        return $this;
    }

    /**
     * Add single The despatch advice reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $despatchAdviceReference The despatch advice reference
     * @return self
     */
    public function addDespatchAdviceReference(InvoiceSuiteReferenceDTO $despatchAdviceReference): self
    {
        $this->despatchAdviceReference[] = $despatchAdviceReference;

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
        if (($despatchAdviceReference = reset($this->despatchAdviceReference)) !== false) {
            $callback($despatchAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($despatchAdviceReference = next($this->despatchAdviceReference)) !== false) {
            $callback($despatchAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($despatchAdviceReference = prev($this->despatchAdviceReference)) !== false) {
            $callback($despatchAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($despatchAdviceReference = end($this->despatchAdviceReference)) !== false) {
            $callback($despatchAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->despatchAdviceReference as $despatchAdviceReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getReceivingAdviceReference(): array
    {
        return $this->receivingAdviceReference;
    }

    /**
     * Sets the receiving advice reference
     *
     * @param array<InvoiceSuiteReferenceDTO> $receivingAdviceReference The receiving advice reference
     * @return self
     */
    public function setReceivingAdviceReference(array $receivingAdviceReference): self
    {
        $this->receivingAdviceReference = $receivingAdviceReference;

        return $this;
    }

    /**
     * Add single The receiving advice reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $receivingAdviceReference The receiving advice reference
     * @return self
     */
    public function addReceivingAdviceReference(InvoiceSuiteReferenceDTO $receivingAdviceReference): self
    {
        $this->receivingAdviceReference[] = $receivingAdviceReference;

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
        if (($receivingAdviceReference = reset($this->receivingAdviceReference)) !== false) {
            $callback($receivingAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($receivingAdviceReference = next($this->receivingAdviceReference)) !== false) {
            $callback($receivingAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($receivingAdviceReference = prev($this->receivingAdviceReference)) !== false) {
            $callback($receivingAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($receivingAdviceReference = end($this->receivingAdviceReference)) !== false) {
            $callback($receivingAdviceReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->receivingAdviceReference as $receivingAdviceReference) {
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
     * @return array<InvoiceSuiteReferenceDTO>
     */
    public function getDeliveryNoteReference(): array
    {
        return $this->deliveryNoteReference;
    }

    /**
     * Sets the delivery note reference
     *
     * @param array<InvoiceSuiteReferenceDTO> $deliveryNoteReference The delivery note reference
     * @return self
     */
    public function setDeliveryNoteReference(array $deliveryNoteReference): self
    {
        $this->deliveryNoteReference = $deliveryNoteReference;

        return $this;
    }

    /**
     * Add single The delivery note reference
     *
     * @param horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDTO $deliveryNoteReference The delivery note reference
     * @return self
     */
    public function addDeliveryNoteReference(InvoiceSuiteReferenceDTO $deliveryNoteReference): self
    {
        $this->deliveryNoteReference[] = $deliveryNoteReference;

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
        if (($deliveryNoteReference = reset($this->deliveryNoteReference)) !== false) {
            $callback($deliveryNoteReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($deliveryNoteReference = next($this->deliveryNoteReference)) !== false) {
            $callback($deliveryNoteReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($deliveryNoteReference = prev($this->deliveryNoteReference)) !== false) {
            $callback($deliveryNoteReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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
        if (($deliveryNoteReference = end($this->deliveryNoteReference)) !== false) {
            $callback($deliveryNoteReference);
        } else {
            if (!is_null($callbackElse)) {
                $callbackElse();
            }
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

        foreach ($this->deliveryNoteReference as $deliveryNoteReference) {
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
}
