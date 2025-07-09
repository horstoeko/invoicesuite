<?php

namespace horstoeko\invoicesuite;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use horstoeko\invoicesuite\contracts\InvoiceSuiteReaderContract;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;

/**
 * Class representing the document reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentReader implements InvoiceSuiteReaderContract
{
    use HandlesCallForwarding;
    use HandlesCurrentFormatProvider;
    use HandlesFormatProviders;

    /**
     * Create reader by file
     *
     * @param  string $fromFile
     * @return InvoiceSuiteDocumentReader
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromCFile(string $fromFile): self
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
        $this->resolveAvailableFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredFormatProviders(),
            function ($formatProvider) use ($fromContent) {
                return $formatProvider->isSatisfiableBy($fromContent);
            }
        );

        if ($formatProviders === []) {
            throw new InvoiceSuiteFormatProviderNotFoundException("unknown");
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentFormatProvider($formatProvider);
        $this->getCurrentFormatProvider()->initReader()->getReader()->deserializeFromContent($fromContent);
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
        return $this->forwardCallWithCheckTo($this->getCurrentFormatProvider()->getReader(), $method, $parameters);
    }

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $this->getCurrentFormatProvider()->getReader()->getDocumentNo($newDocumentNo);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentType($newDocumentType);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentDescription($newDocumentDescription);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentLanguage($newDocumentLanguage);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentDate($newDocumentDate);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentCompleteDate($newCompleteDate);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentCurrency($newDocumentCurrency);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentTaxCurrency($newDocumentTaxCurrency);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentIsCopy($newDocumentIsCopy);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentNote();
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentNote();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentBillingPeriod();
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentBillingPeriod();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return boolean
     */
    public function firstDocumentPostingReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentPostingReference();
    }

    /**
     * Go to the next posting reference
     *
     * @return boolean
     */
    public function nextDocumentPostingReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentPostingReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerOrderReference();
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerOrderReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentBuyerOrderReference();
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentBuyerOrderReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentQuotationReference();
    }

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentQuotationReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return boolean
     */
    public function firstDocumentContractReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentContractReference();
    }

    /**
     * Go to the next associated contract
     *
     * @return boolean
     */
    public function nextDocumentContractReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentContractReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return boolean
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentAdditionalReference();
    }

    /**
     * Go to the next additional associated document
     *
     * @return boolean
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentAdditionalReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentAdditionalReference(
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
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentInvoiceReference();
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentInvoiceReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return boolean
     */
    public function firstDocumentProjectReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentProjectReference();
    }

    /**
     * Go to the next additional project reference
     *
     * @return boolean
     */
    public function nextDocumentProjectReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentProjectReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentUltimateCustomerOrderReference();
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return boolean
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentUltimateCustomerOrderReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return boolean
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentDespatchAdviceReference();
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return boolean
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentDespatchAdviceReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentReceivingAdviceReference();
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return boolean
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentReceivingAdviceReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentDeliveryNoteReference();
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentDeliveryNoteReference();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Get the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self {
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerName($newName);

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerId();
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerId(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerId();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerId($newId);

        return $this;
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerGlobalId();
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerGlobalId();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerTaxRegistration();
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerTaxRegistration();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerAddress(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerAddress();
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerAddress(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerAddress();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerAddress(
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
        return $this->getCurrentFormatProvider()->getReader()->firstDocumentSellerLegalOrganisation();
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return $this->getCurrentFormatProvider()->getReader()->nextDocumentSellerLegalOrganisation();
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
        $this->getCurrentFormatProvider()->getReader()->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }
}
