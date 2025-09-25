<?php

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
use horstoeko\invoicesuite\contracts\InvoiceSuiteDocumentReaderContract;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Class representing the document reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentReader implements InvoiceSuiteDocumentReaderContract
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;

    #region Reader

    /**
     * Create reader by file
     *
     * @param  string $fromFile
     * @return InvoiceSuiteDocumentReader
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromFile(string $fromFile): self
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
     * @return InvoiceSuiteDocumentReader
     */
    public static function createFromContent(string $fromContent): self
    {
        return new static($fromContent);
    }

    /**
     * Constructor (hidden)
     *
     * @param  string $fromContent
     * @return static
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContent
     */
    final protected function __construct(string $fromContent)
    {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn($formatProvider) => $formatProvider->isSatisfiableBySerializedContent($fromContent)
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->getCurrentDocumentFormatProvider()->initReader()->getReader()->deserializeFromContent($fromContent);
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

    /**
     * Copy Reader to a Builder instance
     *
     * @return InvoiceSuiteDocumentBuilder
     */
    public function copyToBuilder(): InvoiceSuiteDocumentBuilder
    {
        $this->convertToDTO($dto);

        return (InvoiceSuiteDocumentBuilder::createByProviderUniqueId(
            $this->getCurrentDocumentFormatProvider()->getUniqueId()
        ))->createFromDTO($dto);
    }

    #endregion

    #region Document DTO

    /**
     * Create a DTO from this document
     *
     * @param InvoiceSuiteDocumentHeaderDTO|null $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->convertToDTO($newDocumentDTO);

        return $this;
    }

    #endregion

    #region Document Generals

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentType($newDocumentType);

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * Gets the document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * Gets the status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self {
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
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBillingPeriod();
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBillingPeriod();
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return boolean
     */
    public function firstDocumentPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPostingReference();
    }

    /**
     * Go to the next posting reference
     *
     * @return boolean
     */
    public function nextDocumentPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPostingReference();
    }

    /**
     * Get a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    #endregion

    #region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerOrderReference();
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerOrderReference();
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerOrderReference();
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerOrderReference();
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param string|null $newReferenceNumber Buyer's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentQuotationReference();
    }

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentQuotationReference();
    }

    /**
     * Get the associated quotation
     *
     * @param string|null $newReferenceNumber Quotation number
     * @param DateTimeInterface|null $newReferenceDate Quotation date
     * @return self
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return boolean
     */
    public function firstDocumentContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentContractReference();
    }

    /**
     * Go to the next associated contract
     *
     * @return boolean
     */
    public function nextDocumentContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentContractReference();
    }

    /**
     * Get the associated contract
     *
     * @param string|null $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return boolean
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentAdditionalReference();
    }

    /**
     * Go to the next additional associated document
     *
     * @return boolean
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentAdditionalReference();
    }

    /**
     * Get an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self {
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
     * @return boolean
     */
    public function firstDocumentInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceReference();
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceReference();
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return boolean
     */
    public function firstDocumentProjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProjectReference();
    }

    /**
     * Go to the next additional project reference
     *
     * @return boolean
     */
    public function nextDocumentProjectReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProjectReference();
    }

    /**
     * Get an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateCustomerOrderReference();
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return boolean
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateCustomerOrderReference();
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return boolean
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentDespatchAdviceReference();
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return boolean
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentDespatchAdviceReference();
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentReceivingAdviceReference();
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return boolean
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentReceivingAdviceReference();
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentDeliveryNoteReference();
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentDeliveryNoteReference();
    }

    /**
     * Get an additional delivery note reference
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param string|null $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerReference($newBuyerReference);

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * Get the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerId();
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerId();
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerGlobalId();
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerGlobalId();
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerAddress();
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerAddress();
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentSellerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerLegalOrganisation();
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerContact();
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerContact();
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentSellerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentSellerCommunication();
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentSellerCommunication();
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerId();
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerId();
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerGlobalId();
    }

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerGlobalId();
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerAddress();
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerAddress();
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerLegalOrganisation();
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerContact();
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerContact();
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentBuyerCommunication();
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentBuyerCommunication();
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeId();
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeId();
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeGlobalId();
    }

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeGlobalId();
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeAddress();
    }

    /**
     * Set the address of the tax representative party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeLegalOrganisation();
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeContact();
    }

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeContact();
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeCommunication();
    }

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTaxRepresentativeCommunication();
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserId();
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserId();
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserGlobalId();
    }

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserGlobalId();
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserTaxRegistration();
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserAddress();
    }

    /**
     * Set the address of the product end-user party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserLegalOrganisation();
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserContact();
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserContact();
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentProductEndUserCommunication();
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentProductEndUserCommunication();
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * Get the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToId();
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToId();
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToGlobalId();
    }

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToGlobalId();
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToAddress();
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToContact();
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToContact();
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipToCommunication();
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipToCommunication();
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToId();
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToGlobalId();
    }

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToGlobalId();
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToAddress();
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToContact();
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToContact();
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentUltimateShipToCommunication();
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentUltimateShipToCommunication();
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromId();
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromId();
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromGlobalId();
    }

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromGlobalId();
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromAddress();
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromContact();
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromContact();
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentShipFromCommunication();
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentShipFromCommunication();
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerId();
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerId();
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerGlobalId();
    }

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerGlobalId();
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerAddress();
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerLegalOrganisation();
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerContact();
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerContact();
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoicerCommunication();
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoicerCommunication();
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeId();
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeId();
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeGlobalId();
    }

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeGlobalId();
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeAddress();
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeLegalOrganisation();
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeContact();
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeContact();
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentInvoiceeCommunication();
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentInvoiceeCommunication();
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * Get the name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentPayeeName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeId();
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeId();
    }

    /**
     * Get the ID of the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeGlobalId();
    }

    /**
     * Go to the next global ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeGlobalId();
    }

    /**
     * Get the Global ID of the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTaxRepresentativeAddress();
    }

    /**
     * Go to the next address of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeAddress();
    }

    /**
     * Set the address of the Payee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentPayeeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPayeeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeLegalOrganisation();
    }

    /**
     * Get the legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Go to the first contact information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeContact();
    }

    /**
     * Go to the next contact information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeContact();
    }

    /**
     * Get the contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentPayeeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPayeeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPayeeCommunication();
    }

    /**
     * Go to the next communication information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPayeeCommunication();
    }

    /**
     * Get communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Payment

    /**
     * Go to the first Payment mean
     *
     * @return boolean
     */
    public function firstDocumentPaymentMean(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentMean();
    }

    /**
     * Go to the next Payment mean
     *
     * @return boolean
     */
    public function nextDocumentPaymentMean(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentMean();
    }

    /**
     * Get Payment mean
     *
     * @param string|null $newTypeCode Expected or used means of payment expressed as a code
     * @param string|null $newName Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
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
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentCreditorReferenceID();
    }

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return boolean
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentCreditorReferenceID();
    }

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentCreditorReferenceID($newId);

        return $this;
    }

    /**
     * Go to the first payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentTerm();
    }

    /**
     * Go to the next payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentTerm();
    }

    /**
     * Get payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @return self
     */
    public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPaymentTerm($newDescription, $newDueDate);

        return $this;
    }

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentDiscountTermsInLastPaymentTerm();
    }

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentDiscountTermsInLastPaymentTerm();
    }

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function getDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newDiscountAmount,
        ?float &$newDiscountPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPaymentPenaltyTermsInLastPaymentTerm();
    }

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPaymentPenaltyTermsInLastPaymentTerm();
    }

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function getDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newPenaltyAmount,
        ?float &$newPenaltyPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self {
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

    #endregion

    #region Document Tax

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return boolean
     */
    public function firstDocumentTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentTax();
    }

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return boolean
     */
    public function nextDocumentTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentTax();
    }

    /**
     * Get Document Tax Breakdown
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newBasisAmount Tax base amount
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate Date on which tax is due
     * @param string|null $newTaxDueCode Code for the date on which tax is due
     * @return self
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
    ): self {
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

    #endregion

    #region Document Allowances/Charges

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return boolean
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentAllowanceCharge();
    }

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return boolean
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentAllowanceCharge();
    }

    /**
     * Get Document Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
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
    ): self {
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
     * @return boolean
     */
    public function firstDocumentLogisticServiceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentLogisticServiceCharge();
    }

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return boolean
     */
    public function nextDocumentLogisticServiceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentLogisticServiceCharge();
    }

    /**
     * Get Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     */
    public function getDocumentLogisticServiceCharge(
        ?float &$newChargeAmount,
        ?string &$newDescription,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        return $this;
    }

    #endregion

    #region Document Amounts

    /**
     * Get the document summation
     *
     * @param float|null $newNetAmount Sum of the net amounts of all invoice lines
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxBasisAmount Total invoice amount excluding sales tax
     * @param float|null $newTaxTotalAmount Total amount of the invoice sales tax (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice amount including sales tax
     * @param float|null $newDueAmount Payment amount due
     * @param float|null $newPrepaidAmount Prepayment amount
     * @param float|null $newRoungingAmount Rounding amount
     * @return self
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
    ): self {
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

    #endregion

    #region Document Positions

    /**
     * Go to the first document position
     *
     * @return boolean
     */
    public function firstDocumentPosition(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPosition();
    }

    /**
     * Go to the next document position
     *
     * @return boolean
     */
    public function nextDocumentPosition(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPosition();
    }

    /**
     * Get position general information
     *
     * @param string|null $newPositionId Identification of the position
     * @param string|null $newParentPositionId Identification of the parent position
     * @param string|null $newLineStatusCode Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    public function getDocumentPosition(
        ?string &$newPositionId,
        ?string &$newParentPositionId,
        ?string &$newLineStatusCode,
        ?string &$newLineStatusReasonCode
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionNote();
    }

    /**
     * Go to the next text information of the latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionNote(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionNote();
    }

    /**
     * Get text information from latest position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Get product details from latest position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param string|null $newProductModelId Unique model identifier of the product
     * @param string|null $newProductBatchId Batch (lot) identifier of the product
     * @param string|null $newProductBrandName Brand name of the product
     * @param string|null $newProductModelName Model name of the product
     * @param string|null $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return self
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
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionProductCharacteristic();
    }

    /**
     * Go to the next product characteristics from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionProductCharacteristic();
    }

    /**
     * Get product characteristics from latest position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function getDocumentPositionProductCharacteristic(
        ?string &$newProductCharacteristicDescription,
        ?string &$newProductCharacteristicValue,
        ?string &$newProductCharacteristicType,
        ?float &$newProductCharacteristicMeasureValue,
        ?string &$newProductCharacteristicMeasureUnit
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionProductClassification();
    }

    /**
     * Go to the next product classification from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionProductClassification();
    }

    /**
     * Get product classification from latest position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function getDocumentPositionProductClassification(
        ?string &$newProductClassificationCode,
        ?string &$newProductClassificationListId,
        ?string &$newProductClassificationListVersionId,
        ?string &$newProductClassificationCodeClassname
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionReferencedProduct();
    }

    /**
     * Go to the next referenced product in latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionReferencedProduct();
    }

    /**
     * Get referenced product from latest position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param float|null $newProductUnitQuantity Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return self
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
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionSellerOrderReference();
    }

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionSellerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionSellerOrderReference();
    }

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionBuyerOrderReference();
    }

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionBuyerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionBuyerOrderReference();
    }

    /**
     * Get the associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionQuotationReference();
    }

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return boolean
     */
    public function nextDocumentPositionQuotationReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionQuotationReference();
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionContractReference();
    }

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionContractReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionContractReference();
    }

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionAdditionalReference();
    }

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionAdditionalReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionAdditionalReference();
    }

    /**
     * Get an additional associated document (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param string|null $newReferenceLineNumber Additional document line number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function getDocumentPositionAdditionalReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateCustomerOrderReference();
    }

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateCustomerOrderReference();
    }

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionDespatchAdviceReference();
    }

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionDespatchAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionDespatchAdviceReference();
    }

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionReceivingAdviceReference();
    }

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionReceivingAdviceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionReceivingAdviceReference();
    }

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionDeliveryNoteReference();
    }

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionDeliveryNoteReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionDeliveryNoteReference();
    }

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionInvoiceReference();
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionInvoiceReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionInvoiceReference();
    }

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function getDocumentPositionInvoiceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Returns true if a gross price was specified
     *
     * @return boolean
     */
    public function firstDcumentPositionGrossPrice(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDcumentPositionGrossPrice();
    }

    /**
     * Get the position's gross price from latest position
     *
     * @param null|float $newGrossPrice Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$newGrossPriceAllowanceChargeAmount,
        ?bool &$newIsCharge,
        ?float &$newGrossPriceAllowanceChargePercent,
        ?float &$newGrossPriceAllowanceChargeBasisAmount,
        ?string &$newGrossPriceAllowanceChargeReason,
        ?string &$newGrossPriceAllowanceChargeReasonCode
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionNetPrice(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionNetPrice();
    }

    /**
     * Get the position's net price from latest position
     *
     * @param null|float $newNetPrice Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): self {
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
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function getDocumentPositionNetPriceTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode
    ): self {
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
     * @param null|float $newQuantity Invoiced quantity
     * @param null|string $newQuantityUnit Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param null|float $newPackageQuantity Package quantity
     * @param null|string $newPackageQuantityUnit Package quantity unit
     * @return self
     */
    public function getDocumentPositionQuantities(
        ?float &$newQuantity,
        ?string &$newQuantityUnit,
        ?float &$newChargeFreeQuantity,
        ?string &$newChargeFreeQuantityUnit,
        ?float &$newPackageQuantity,
        ?string &$newPackageQuantityUnit
    ): self {
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
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentPositionShipToName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToId();
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToId();
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentPositionShipToId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToId($newId);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToGlobalId();
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToGlobalId();
    }

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToAddress();
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToAddress();
    }

    /**
     * Get the address of the Ship-To party from latest position
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentPositionShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToContact();
    }

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToContact();
    }

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentPositionShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionShipToCommunication();
    }

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionShipToCommunication();
    }

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToId();
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToId($newId);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToGlobalId();
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToGlobalId(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToGlobalId();
    }

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToTaxRegistration();
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToAddress();
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToAddress(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToAddress();
    }

    /**
     * Get the address of the ultimate Ship-To party from latest position
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function getDocumentPositionUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToLegalOrganisation();
    }

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToContact();
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToContact(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToContact();
    }

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function getDocumentPositionUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionUltimateShipToCommunication();
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToCommunication(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionUltimateShipToCommunication();
    }

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Get the date of the delivery from latest position
     *
     * @param DateTimeInterface|null $newDate
     * @return self
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentPositionBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionBillingPeriod();
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentPositionBillingPeriod(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionBillingPeriod();
    }

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionTax();
    }

    /**
     * Go to the next position's tax information from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionTax(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionTax();
    }

    /**
     * Get the position's tax information from latest position
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function getDocumentPositionTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionAllowanceCharge();
    }

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionAllowanceCharge();
    }

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function getDocumentPositionAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionSummation(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionSummation();
    }

    /**
     * Get the document position summation from latest position
     *
     * @param float|null $newNetAmount Net amount
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxTotalAmount Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice line amount including sales tax
     * @return self
     */
    public function getDocumentPositionSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newGrossAmount
    ): self {
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
     * @return boolean
     */
    public function firstDocumentPositionPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->firstDocumentPositionPostingReference();
    }

    /**
     * Go to the next posting reference from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionPostingReference(): bool
    {
        return $this->getCurrentDocumentFormatProvider()->getReader()->nextDocumentPositionPostingReference();
    }

    /**
     * Get a position's posting reference from latest position
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self {
        $this->getCurrentDocumentFormatProvider()->getReader()->getDocumentPositionPostingReference(
            $newType,
            $newAccountId
        );

        return $this;
    }

    #endregion
}
