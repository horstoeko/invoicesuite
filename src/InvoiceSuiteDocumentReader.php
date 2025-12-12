<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Class representing the document reader
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentReader
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;

    /**
     * Constructor (hidden)
     *
     * @param  string                                      $fromContent
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @return void
     */
    final protected function __construct(string $fromContent)
    {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            static fn ($formatProvider) => $formatProvider->isSatisfiableBySerializedContent($fromContent)
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException('unknown');
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->getCurrentDocumentFormatProvider()->getReader()->deserializeFromContent($fromContent);
    }

    /**
     * Dynamically pass missing methods to the reader provided by format provider
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallWithCheckTo($this->getCurrentDocumentFormatProvider()->getReader(), $method, $parameters);
    }

    // region Reader

    /**
     * Create reader by file
     *
     * @param  string                               $fromFile
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @return static
     */
    public static function createFromFile(string $fromFile): static
    {
        if (!file_exists($fromFile)) {
            throw new InvoiceSuiteFileNotFoundException($fromFile);
        }

        $fromContent = file_get_contents($fromFile);

        if ($fromContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromFile);
        }

        return static::createFromContent($fromContent);
    }

    /**
     * Create reader by content
     *
     * @param  string $fromContent
     * @return static
     */
    public static function createFromContent(string $fromContent): static
    {
        return new static($fromContent);
    }

    /**
     * Copy Reader to a Builder instance
     *
     * @return InvoiceSuiteDocumentBuilder
     */
    public function copyToBuilder(): InvoiceSuiteDocumentBuilder
    {
        $this->convertToDTO($dto);

        return InvoiceSuiteDocumentBuilder::createByProviderUniqueId(
            $this->getCurrentDocumentFormatProvider()->getUniqueId()
        )->createFromDTO($dto);
    }

    // endregion

    // region Document DTO

    /**
     * Create a DTO from this document
     *
     * @param  null|InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return static
     *
     * @param-out InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
     * @phpstan-param-out InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
     */
    public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->convertToDTO($newDocumentDTO);

        return $this;
    }

    // endregion

    // region Document Generals

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentType($newDocumentType);

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return static
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return static
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return static
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * Gets the document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return static
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * Gets the status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return static
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return static
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentNote();
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentNote();
    }

    /**
     * Get a note to the document.
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBillingPeriod();
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBillingPeriod();
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return bool
     */
    public function firstDocumentPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPostingReference();
    }

    /**
     * Go to the next posting reference
     *
     * @return bool
     */
    public function nextDocumentPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPostingReference();
    }

    /**
     * Get a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    // endregion

    // region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return bool
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerOrderReference();
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return bool
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerOrderReference();
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return bool
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerOrderReference();
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return bool
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerOrderReference();
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Buyer's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return bool
     */
    public function firstDocumentQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentQuotationReference();
    }

    /**
     * Go to the next associated quotation
     *
     * @return bool
     */
    public function nextDocumentQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentQuotationReference();
    }

    /**
     * Get the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   Quotation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return bool
     */
    public function firstDocumentContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentContractReference();
    }

    /**
     * Go to the next associated contract
     *
     * @return bool
     */
    public function nextDocumentContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentContractReference();
    }

    /**
     * Get the associated contract
     *
     * @param  null|string            $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return bool
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentAdditionalReference();
    }

    /**
     * Go to the next additional associated document
     *
     * @return bool
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentAdditionalReference();
    }

    /**
     * Get an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function firstDocumentInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceReference();
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceReference();
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return bool
     */
    public function firstDocumentProjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProjectReference();
    }

    /**
     * Go to the next additional project reference
     *
     * @return bool
     */
    public function nextDocumentProjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProjectReference();
    }

    /**
     * Get an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newName
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return bool
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateCustomerOrderReference();
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return bool
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateCustomerOrderReference();
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber Ultimate customer order number
     * @param  null|DateTimeInterface $newReferenceDate   Ultimate customer order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return bool
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentDespatchAdviceReference();
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return bool
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentDespatchAdviceReference();
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return bool
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentReceivingAdviceReference();
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return bool
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentReceivingAdviceReference();
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return bool
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentDeliveryNoteReference();
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return bool
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentDeliveryNoteReference();
    }

    /**
     * Get an additional delivery note reference
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return static
     *
     * @phpstan-param-out string $newBuyerReference
     */
    public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerReference($newBuyerReference);

        return $this;
    }

    /**
     * Get information on the delivery conditions
     *
     * @param  null|string $newCode The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     *
     * @phpstan-param-out string $newCode
     */
    public function getDocumentDeliveryTerms(
        ?string &$newCode = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDeliveryTerms($newCode);

        return $this;
    }

    // endregion

    // region Document Seller/Supplier

    /**
     * Get the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerId();
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerId();
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerGlobalId();
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerGlobalId();
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerAddress();
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerAddress();
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentSellerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerLegalOrganisation();
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerContact();
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerContact();
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerCommunication();
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerCommunication();
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerId();
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerId();
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerGlobalId();
    }

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerGlobalId();
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerAddress();
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerAddress();
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerLegalOrganisation();
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerContact();
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerContact();
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerCommunication();
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerCommunication();
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeId();
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeId();
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeGlobalId();
    }

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeGlobalId();
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeAddress();
    }

    /**
     * Set the address of the tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeLegalOrganisation();
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeContact();
    }

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeContact();
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeCommunication();
    }

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeCommunication();
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserId();
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserId();
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserGlobalId();
    }

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserGlobalId();
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserTaxRegistration();
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserAddress();
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserAddress();
    }

    /**
     * Set the address of the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserLegalOrganisation();
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserContact();
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserContact();
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserCommunication();
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserCommunication();
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Ship-To

    /**
     * Get the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToId();
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToId();
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToGlobalId();
    }

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToGlobalId();
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToAddress();
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToAddress();
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToContact();
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToContact();
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToCommunication();
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToCommunication();
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToId();
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToGlobalId();
    }

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToGlobalId();
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToAddress();
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToAddress();
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToContact();
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToContact();
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToCommunication();
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToCommunication();
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromId();
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromId();
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromGlobalId();
    }

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromGlobalId();
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromAddress();
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromAddress();
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromContact();
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromContact();
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromCommunication();
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromCommunication();
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerId();
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerId();
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerGlobalId();
    }

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerGlobalId();
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerAddress();
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerAddress();
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerLegalOrganisation();
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerContact();
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerContact();
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerCommunication();
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerCommunication();
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeId();
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeId();
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeGlobalId();
    }

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeGlobalId();
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeAddress();
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeAddress();
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeLegalOrganisation();
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeContact();
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeContact();
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeCommunication();
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeCommunication();
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Payee

    /**
     * Get the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeId();
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeId();
    }

    /**
     * Get the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeGlobalId();
    }

    /**
     * Go to the next global ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeGlobalId();
    }

    /**
     * Get the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeAddress();
    }

    /**
     * Go to the next address of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeAddress();
    }

    /**
     * Set the address of the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPayeeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeLegalOrganisation();
    }

    /**
     * Get the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeContact();
    }

    /**
     * Go to the next contact information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeContact();
    }

    /**
     * Get the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPayeeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeCommunication();
    }

    /**
     * Go to the next communication information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeCommunication();
    }

    /**
     * Get communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    // endregion

    // region Document Payment

    /**
     * Go to the first Payment mean
     *
     * @return bool
     */
    public function firstDocumentPaymentMean(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentMean();
    }

    /**
     * Go to the next Payment mean
     *
     * @return bool
     */
    public function nextDocumentPaymentMean(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentMean();
    }

    /**
     * Get Payment mean
     *
     * @param  null|string $newTypeCode            Expected or used means of payment expressed as a code
     * @param  null|string $newName                Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @param  null|string $newBuyerIban           Identifier of the account to be debited
     * @param  null|string $newPayeeIban           Payment account identifier
     * @param  null|string $newPayeeAccountName    Name of the payment account
     * @param  null|string $newPayeeProprietaryId  National account number (not for SEPA)
     * @param  null|string $newPayeeBic            Identifier of the payment service provider
     * @param  null|string $newPaymentReference    Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             Identification of the mandate reference
     * @return static
     *
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newName
     * @phpstan-param-out string $newFinancialCardId
     * @phpstan-param-out string $newFinancialCardHolder
     * @phpstan-param-out string $newBuyerIban
     * @phpstan-param-out string $newPayeeIban
     * @phpstan-param-out string $newPayeeAccountName
     * @phpstan-param-out string $newPayeeProprietaryId
     * @phpstan-param-out string $newPayeeBic
     * @phpstan-param-out string $newPaymentReference
     * @phpstan-param-out string $newMandate
     */
    public function getDocumentPaymentMean(
        ?string &$newTypeCode,
        ?string &$newName,
        ?string &$newFinancialCardId,
        ?string &$newFinancialCardHolder,
        ?string &$newBuyerIban,
        ?string &$newPayeeIban,
        ?string &$newPayeeAccountName,
        ?string &$newPayeeProprietaryId,
        ?string &$newPayeeBic,
        ?string &$newPaymentReference,
        ?string &$newMandate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentMean(
            $newTypeCode,
            $newName,
            $newFinancialCardId,
            $newFinancialCardHolder,
            $newBuyerIban,
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference,
            $newMandate
        );

        return $this;
    }

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentCreditorReferenceID();
    }

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentCreditorReferenceID();
    }

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentCreditorReferenceID($newId);

        return $this;
    }

    /**
     * Go to the first link to the invoice issued by the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentReference();
    }

    /**
     * Go to the next link to the invoice issued by the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentReference();
    }

    /**
     * Get a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPaymentReference(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentReference($newId);

        return $this;
    }

    /**
     * Go to the first payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentTerm();
    }

    /**
     * Go to the next payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentTerm();
    }

    /**
     * Get payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @return static
     *
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out null|DateTimeInterface $newDueDate
     * @phpstan-param-out string $newMandate
     */
    public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate,
        ?string &$newMandate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        return $this;
    }

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentDiscountTermsInLastPaymentTerm();
    }

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentDiscountTermsInLastPaymentTerm();
    }

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     *
     * @phpstan-param-out float $newBaseAmount
     * @phpstan-param-out float $newDiscountAmount
     * @phpstan-param-out float $newDiscountPercent
     * @phpstan-param-out float $newBasePeriod
     * @phpstan-param-out string $newBasePeriodUnit
     */
    public function getDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newDiscountAmount,
        ?float &$newDiscountPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentPenaltyTermsInLastPaymentTerm();
    }

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentPenaltyTermsInLastPaymentTerm();
    }

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     *
     * @phpstan-param-out float $newBaseAmount
     * @phpstan-param-out float $newPenaltyAmount
     * @phpstan-param-out float $newPenaltyPercent
     * @phpstan-param-out float $newBasePeriod
     * @phpstan-param-out string $newBasePeriodUnit
     */
    public function getDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newPenaltyAmount,
        ?float &$newPenaltyPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newPenaltyAmount,
            $newPenaltyPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    // endregion

    // region Document Tax

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return bool
     */
    public function firstDocumentTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTax();
    }

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return bool
     */
    public function nextDocumentTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTax();
    }

    /**
     * Get Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         Coded description of the tax category
     * @param  null|string            $newTaxType             Coded description of the tax type
     * @param  null|float             $newBasisAmount         Tax base amount
     * @param  null|float             $newTaxAmount           Tax total amount
     * @param  null|float             $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          Date on which tax is due
     * @param  null|string            $newTaxDueCode          Code for the date on which tax is due
     * @return static
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newBasisAmount
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     * @phpstan-param-out DateTimeInterface|null $newTaxDueDate
     * @phpstan-param-out string $newTaxDueCode
     */
    public function getDocumentTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newBasisAmount,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
        ?DateTimeInterface &$newTaxDueDate,
        ?string &$newTaxDueCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTax(
            $newTaxCategory,
            $newTaxType,
            $newBasisAmount,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
            $newTaxDueDate,
            $newTaxDueCode
        );

        return $this;
    }

    // endregion

    // region Document Allowances/Charges

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return bool
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentAllowanceCharge();
    }

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return bool
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentAllowanceCharge();
    }

    /**
     * Get Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               Coded description of the tax category
     * @param  null|string $newTaxType                   Coded description of the tax type
     * @param  null|float  $newTaxPercent                Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     *
     * @phpstan-param-out bool $newChargeIndicator
     * @phpstan-param-out float $newAllowanceChargeAmount
     * @phpstan-param-out float $newAllowanceChargeBaseAmount
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newAllowanceChargeReason
     * @phpstan-param-out string $newAllowanceChargeReasonCode
     * @phpstan-param-out float $newAllowanceChargePercent
     */
    public function getDocumentAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return bool
     */
    public function firstDocumentLogisticServiceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentLogisticServiceCharge();
    }

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return bool
     */
    public function nextDocumentLogisticServiceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentLogisticServiceCharge();
    }

    /**
     * Get Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     *
     * @phpstan-param-out float $newChargeAmount
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxPercent
     */
    public function getDocumentLogisticServiceCharge(
        ?float &$newChargeAmount,
        ?string &$newDescription,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        return $this;
    }

    // endregion

    // region Document Amounts

    /**
     * Get the document summation
     *
     * @param  null|float $newNetAmount           Sum of the net amounts of all invoice lines
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxBasisAmount      Total invoice amount excluding sales tax
     * @param  null|float $newTaxTotalAmount      Total amount of the invoice sales tax (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice amount including sales tax
     * @param  null|float $newDueAmount           Payment amount due
     * @param  null|float $newPrepaidAmount       Prepayment amount
     * @param  null|float $newRoungingAmount      Rounding amount
     * @return static
     *
     * @phpstan-param-out float $newNetAmount
     * @phpstan-param-out float $newChargeTotalAmount
     * @phpstan-param-out float $newDiscountTotalAmount
     * @phpstan-param-out float $newTaxBasisAmount
     * @phpstan-param-out float $newTaxTotalAmount
     * @phpstan-param-out float $newTaxTotalAmount2
     * @phpstan-param-out float $newGrossAmount
     * @phpstan-param-out float $newDueAmount
     * @phpstan-param-out float $newPrepaidAmount
     * @phpstan-param-out float $newRoungingAmount
     */
    public function getDocumentSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxBasisAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newTaxTotalAmount2,
        ?float &$newGrossAmount,
        ?float &$newDueAmount,
        ?float &$newPrepaidAmount,
        ?float &$newRoungingAmount
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxBasisAmount,
            $newTaxTotalAmount,
            $newTaxTotalAmount2,
            $newGrossAmount,
            $newDueAmount,
            $newPrepaidAmount,
            $newRoungingAmount
        );

        return $this;
    }

    // endregion

    // region Document Positions

    /**
     * Go to the first document position
     *
     * @return bool
     */
    public function firstDocumentPosition(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPosition();
    }

    /**
     * Go to the next document position
     *
     * @return bool
     */
    public function nextDocumentPosition(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPosition();
    }

    /**
     * Get position general information
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return static
     *
     * @phpstan-param-out string $newPositionId
     * @phpstan-param-out string $newParentPositionId
     * @phpstan-param-out string $newLineStatusCode
     * @phpstan-param-out string $newLineStatusReasonCode
     */
    public function getDocumentPosition(
        ?string &$newPositionId,
        ?string &$newParentPositionId,
        ?string &$newLineStatusCode,
        ?string &$newLineStatusReasonCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        return $this;
    }

    /**
     * Go to the first text information of the latest position
     *
     * @return bool
     */
    public function firstDocumentPositionNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionNote();
    }

    /**
     * Go to the next text information of the latest position
     *
     * @return bool
     */
    public function nextDocumentPositionNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionNote();
    }

    /**
     * Get text information from latest position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Get product details from latest position
     *
     * @param  null|string $newProductId                 ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName               Name of the product (product name)
     * @param  null|string $newProductDescription        Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId           Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId            Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId           Product global id
     * @param  null|string $newProductGlobalIdType       Type of the product global id
     * @param  null|string $newProductIndustryId         Id assigned by the industry
     * @param  null|string $newProductModelId            Unique model identifier of the product
     * @param  null|string $newProductBatchId            Batch (lot) identifier of the product
     * @param  null|string $newProductBrandName          Brand name of the product
     * @param  null|string $newProductModelName          Model name of the product
     * @param  null|string $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return static
     *
     * @phpstan-param-out string $newProductId
     * @phpstan-param-out string $newProductName
     * @phpstan-param-out string $newProductDescription
     * @phpstan-param-out string $newProductSellerId
     * @phpstan-param-out string $newProductBuyerId
     * @phpstan-param-out string $newProductGlobalId
     * @phpstan-param-out string $newProductGlobalIdType
     * @phpstan-param-out string $newProductIndustryId
     * @phpstan-param-out string $newProductModelId
     * @phpstan-param-out string $newProductBatchId
     * @phpstan-param-out string $newProductBrandName
     * @phpstan-param-out string $newProductModelName
     * @phpstan-param-out string $newProductOriginTradeCountry
     */
    public function getDocumentPositionProductDetails(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?string &$newProductModelId,
        ?string &$newProductBatchId,
        ?string &$newProductBrandName,
        ?string &$newProductModelName,
        ?string &$newProductOriginTradeCountry
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionProductDetails(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductModelId,
            $newProductBatchId,
            $newProductBrandName,
            $newProductModelName,
            $newProductOriginTradeCountry
        );

        return $this;
    }

    /**
     * Go to the first product characteristics from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionProductCharacteristic();
    }

    /**
     * Go to the next product characteristics from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionProductCharacteristic();
    }

    /**
     * Get product characteristics from latest position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     *
     * @phpstan-param-out string $newProductCharacteristicDescription
     * @phpstan-param-out string $newProductCharacteristicValue
     * @phpstan-param-out string $newProductCharacteristicType
     * @phpstan-param-out float $newProductCharacteristicMeasureValue
     * @phpstan-param-out string $newProductCharacteristicMeasureUnit
     */
    public function getDocumentPositionProductCharacteristic(
        ?string &$newProductCharacteristicDescription,
        ?string &$newProductCharacteristicValue,
        ?string &$newProductCharacteristicType,
        ?float &$newProductCharacteristicMeasureValue,
        ?string &$newProductCharacteristicMeasureUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        return $this;
    }

    /**
     * Go to the first product classification from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionProductClassification();
    }

    /**
     * Go to the next product classification from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionProductClassification();
    }

    /**
     * Get product classification from latest position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     *
     * @phpstan-param-out string $newProductClassificationCode
     * @phpstan-param-out string $newProductClassificationListId
     * @phpstan-param-out string $newProductClassificationListVersionId
     * @phpstan-param-out string $newProductClassificationCodeClassname
     */
    public function getDocumentPositionProductClassification(
        ?string &$newProductClassificationCode,
        ?string &$newProductClassificationListId,
        ?string &$newProductClassificationListVersionId,
        ?string &$newProductClassificationCodeClassname
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        return $this;
    }

    /**
     * Go to the first referenced product in latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionReferencedProduct();
    }

    /**
     * Go to the next referenced product in latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionReferencedProduct();
    }

    /**
     * Get referenced product from latest position
     *
     * @param  null|string $newProductId               ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             Name of the product (product name)
     * @param  null|string $newProductDescription      Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         Product global id
     * @param  null|string $newProductGlobalIdType     Type of the product global id
     * @param  null|string $newProductIndustryId       Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return static
     *
     * @phpstan-param-out string $newProductId
     * @phpstan-param-out string $newProductName
     * @phpstan-param-out string $newProductDescription
     * @phpstan-param-out string $newProductSellerId
     * @phpstan-param-out string $newProductBuyerId
     * @phpstan-param-out string $newProductGlobalId
     * @phpstan-param-out string $newProductGlobalIdType
     * @phpstan-param-out string $newProductIndustryId
     * @phpstan-param-out float $newProductUnitQuantity
     * @phpstan-param-out string $newProductUnitQuantityUnit
     */
    public function getDocumentPositionReferencedProduct(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?float &$newProductUnitQuantity,
        ?string &$newProductUnitQuantityUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionReferencedProduct(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductUnitQuantity,
            $newProductUnitQuantityUnit
        );

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionSellerOrderReference();
    }

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionSellerOrderReference();
    }

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionBuyerOrderReference();
    }

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionBuyerOrderReference();
    }

    /**
     * Get the associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first associated quotation (line reference)
     *
     * @return bool
     */
    public function firstDocumentPositionQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionQuotationReference();
    }

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return bool
     */
    public function nextDocumentPositionQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionQuotationReference();
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionContractReference();
    }

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionContractReference();
    }

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to first additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionAdditionalReference();
    }

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionAdditionalReference();
    }

    /**
     * Get an additional associated document (line reference) from latest position
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment
     */
    public function getDocumentPositionAdditionalReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        return $this;
    }

    /**
     * Go to the first an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateCustomerOrderReference();
    }

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateCustomerOrderReference();
    }

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionDespatchAdviceReference();
    }

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionDespatchAdviceReference();
    }

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionReceivingAdviceReference();
    }

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionReceivingAdviceReference();
    }

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionDeliveryNoteReference();
    }

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionDeliveryNoteReference();
    }

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionInvoiceReference();
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionInvoiceReference();
    }

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentPositionInvoiceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Go to the first additional object reference
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalObjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionAdditionalObjectReference();
    }

    /**
     * Go to the next additional object reference
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalObjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionAdditionalObjectReference();
    }

    /**
     * Get an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     */
    public function getDocumentPositionAdditionalObjectReference(
        ?string &$newReferenceNumber = null,
        ?string &$newTypeCode = null,
        ?string &$newReferenceTypeCode = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionAdditionalObjectReference(
            $newReferenceNumber,
            $newTypeCode,
            $newReferenceTypeCode
        );

        return $this;
    }

    /**
     * Returns true if a gross price was specified
     *
     * @return bool
     */
    public function firstDcumentPositionGrossPrice(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDcumentPositionGrossPrice();
    }

    /**
     * Get the position's gross price from latest position
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @phpstan-param-out float $newGrossPrice
     * @phpstan-param-out float $newGrossPriceBasisQuantity
     * @phpstan-param-out string $newGrossPriceBasisQuantityUnit
     */
    public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        return $this;
    }

    /**
     * Go to the first discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     *
     * @phpstan-param-out float $newGrossPriceAllowanceChargeAmount
     * @phpstan-param-out bool $newIsCharge
     * @phpstan-param-out float $newGrossPriceAllowanceChargePercent
     * @phpstan-param-out float $newGrossPriceAllowanceChargeBasisAmount
     * @phpstan-param-out string $newGrossPriceAllowanceChargeReason
     * @phpstan-param-out string $newGrossPriceAllowanceChargeReasonCode
     */
    public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$newGrossPriceAllowanceChargeAmount,
        ?bool &$newIsCharge,
        ?float &$newGrossPriceAllowanceChargePercent,
        ?float &$newGrossPriceAllowanceChargeBasisAmount,
        ?string &$newGrossPriceAllowanceChargeReason,
        ?string &$newGrossPriceAllowanceChargeReasonCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        return $this;
    }

    /**
     * Returns true if a net price was specified
     *
     * @return bool
     */
    public function firstDocumentPositionNetPrice(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionNetPrice();
    }

    /**
     * Get the position's net price from latest position
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @phpstan-param-out float $newNetPrice
     * @phpstan-param-out float $newNetPriceBasisQuantity
     * @phpstan-param-out string $newNetPriceBasisQuantityUnit
     */
    public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        return $this;
    }

    /**
     * Get the position's net price included tax from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionNetPriceTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionNetPriceTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        return $this;
    }

    /**
     * Get the position's quantities from latest position
     *
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return static
     *
     * @phpstan-param-out float $newQuantity
     * @phpstan-param-out string $newQuantityUnit
     * @phpstan-param-out float $newChargeFreeQuantity
     * @phpstan-param-out string $newChargeFreeQuantityUnit
     * @phpstan-param-out float $newPackageQuantity
     * @phpstan-param-out string $newPackageQuantityUnit
     */
    public function getDocumentPositionQuantities(
        ?float &$newQuantity,
        ?string &$newQuantityUnit,
        ?float &$newChargeFreeQuantity,
        ?string &$newChargeFreeQuantityUnit,
        ?float &$newPackageQuantity,
        ?string &$newPackageQuantityUnit
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionQuantities(
            $newQuantity,
            $newQuantityUnit,
            $newChargeFreeQuantity,
            $newChargeFreeQuantityUnit,
            $newPackageQuantity,
            $newPackageQuantityUnit
        );

        return $this;
    }

    /**
     * Get the name of the Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentPositionShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToId();
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentPositionShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToId();
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionShipToId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToId($newId);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToGlobalId();
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToGlobalId();
    }

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToAddress();
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToAddress();
    }

    /**
     * Get the address of the Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPositionShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToContact();
    }

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToContact();
    }

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPositionShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToCommunication();
    }

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToCommunication();
    }

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToId();
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToId($newId);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToGlobalId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToGlobalId();
    }

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToAddress();
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToAddress();
    }

    /**
     * Get the address of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPositionUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToContact();
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToContact();
    }

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPositionUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToCommunication();
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToCommunication();
    }

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Get the date of the delivery from latest position
     *
     * @param  null|DateTimeInterface $newDate
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentPositionBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionBillingPeriod();
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentPositionBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionBillingPeriod();
    }

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    /**
     * Go to the first position's tax information from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionTax();
    }

    /**
     * Go to the next position's tax information from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionTax();
    }

    /**
     * Get the position's tax information from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
        );

        return $this;
    }

    /**
     * Go to the first Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionAllowanceCharge();
    }

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionAllowanceCharge();
    }

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     *
     * @phpstan-param-out bool $newChargeIndicator
     * @phpstan-param-out float $newAllowanceChargeAmount
     * @phpstan-param-out float $newAllowanceChargeBaseAmount
     * @phpstan-param-out string $newAllowanceChargeReason
     * @phpstan-param-out string $newAllowanceChargeReasonCode
     * @phpstan-param-out float $newAllowanceChargePercent
     */
    public function getDocumentPositionAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Returns true if a position summation exists
     *
     * @return bool
     */
    public function firstDocumentPositionSummation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionSummation();
    }

    /**
     * Get the document position summation from latest position
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return static
     *
     * @phpstan-param-out float $newNetAmount
     * @phpstan-param-out float $newChargeTotalAmount
     * @phpstan-param-out float $newDiscountTotalAmount
     * @phpstan-param-out float $newTaxTotalAmount
     * @phpstan-param-out float $newGrossAmount
     */
    public function getDocumentPositionSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newGrossAmount
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        return $this;
    }

    /**
     * Go to the first posting reference from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionPostingReference();
    }

    /**
     * Go to the next posting reference from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionPostingReference();
    }

    /**
     * Get a position's posting reference from latest position
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionPostingReference(
            $newType,
            $newAccountId
        );

        return $this;
    }

    // endregion
}
