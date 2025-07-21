<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\contracts;

use DateTimeInterface;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Interface representing the required methods for a builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
interface InvoiceSuiteBuilderContract
{
    #region Document DTO

    /**
     * Create a document by a DTO
     *
     * @param InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): self;

    #endregion

    #region Document Generals

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): self;

    /**
     * Sets the new document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): self;

    /**
     * Sets the new document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): self;

    /**
     * Sets the new document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): self;

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): self;

    /**
     * Sets the new document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): self;

    /**
     * Sets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): self;

    /**
     * Sets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): self;

    /**
     * Sets the new status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): self;

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Add a note to the document
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Set a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    /**
     * Add a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    #endregion

    #region Document References

    /**
     * Set the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated quotation
     *
     * @param string|null $newReferenceNumber Quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated quotation
     *
     * @param string|null $newReferenceNumber quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add am associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Add an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Set an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self;

    /**
     * Add an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self;

    /**
     * Set an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self;

    #endregion

    #region Document Seller/Supplier

    /**
     * Set the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the seller/supplier party
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
    public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Buyer/Customer

    /**
     * Set the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentBuyerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the buyer/customer party
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
    public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName
     * @param string|null $newDepartmentName
     * @param string|null $newPhoneNumber
     * @param string|null $newFaxNumber
     * @param string|null $newEmailAddress
     * @return self
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Tax Representativ party

    /**
     * Set the name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the tax representative party
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
    public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Product Enduser

    /**
     * Set the name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the product end-user party
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
    public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Ship-To

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Ship-To party
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
    public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the ultimate Ship-To party
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
    public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Ship-From

    /**
     * Set the name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Ship-From party
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
    public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Invoicer

    /**
     * Set the name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Invoicer party
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
    public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Invoicee

    /**
     * Set the name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Invoicee party
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
    public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Payee

    /**
     * Set the name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Payee party
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
    public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    #endregion

    #region Document Payment

    /**
     * Set Payment mean
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
    public function setDocumentPaymentMean(
        ?string $newTypeCode = null,
        ?string $newName = null,
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
        ?string $newBuyerIban = null,
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add Payment mean
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
    public function addDocumentPaymentMean(
        ?string $newTypeCode = null,
        ?string $newName = null,
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
        ?string $newBuyerIban = null,
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self;

    /**
     * Add Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self;

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self;

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self;

    /**
     * Set payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @return self
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null
    ): self;

    /**
     * Add payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @return self
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null
    ): self;

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    #endregion

    #region Document Tax

    /**
     * Set Document Tax Breakdown
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
    public function setDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null
    ): self;

    /**
     * Add Document Tax Breakdown
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
    public function addDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null
    ): self;

    #endregion

    #region Document Allowances/Charges

    /**
     * Set Document Allowance/Charge
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
    public function setDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Add Document Allowance/Charge
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
    public function addDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Set Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     */
    public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null
    ): self;

    /**
     * Add Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     */
    public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null
    ): self;

    #endregion

    #region Document Amounts

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return self
     */
    public function prepareDocumentSummation(): self;

    /**
     * Set the document summation
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
    public function setDocumentSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxBasisAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newTaxTotalAmount2 = null,
        ?float $newGrossAmount = null,
        ?float $newDueAmount = null,
        ?float $newPrepaidAmount = null,
        ?float $newRoungingAmount = null
    ): self;

    #endregion

    #region Document Positions

    /**
     * Add a new position to document
     *
     * @param string|null $newPositionId Identification of the position
     * @param string|null $newParentPositionId Identification of the parent position
     * @param string|null $newLineStatusCode Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null
    ): self;

    /**
     * Set text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Add text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Add product details to latest added position
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
    public function setDocumentPositionProductDetails(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?string $newProductModelId = null,
        ?string $newProductBatchId = null,
        ?string $newProductBrandName = null,
        ?string $newProductModelName = null,
        ?string $newProductOriginTradeCountry = null
    ): self;

    /**
     * Set product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null
    ): self;

    /**
     * Add product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null
    ): self;

    /**
     * Set product classification in latest added position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null
    ): self;

    /**
     * Add product classification in latest added position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null
    ): self;

    /**
     * Set referenced product in latest added position
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
    public function setDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null
    ): self;

    /**
     * Add referenced product in latest added position
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
    public function addDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null
    ): self;

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional associated document (line reference)
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
    public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Add an additional associated document (line reference)
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
    public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Set the position's gross price
     *
     * @param null|float $newGrossPrice Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null
    ): self;

    /**
     * Set discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null
    ): self;

    /**
     * Add discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null
    ): self;

    /**
     * Set the position's net price
     *
     * @param null|float $newNetPrice Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null
    ): self;

    /**
     * Set the position's net price included tax
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Set the position's quantities
     *
     * @param null|float $newQuantity Invoiced quantity
     * @param null|string $newQuantityUnit Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param null|float $newPackageQuantity Package quantity
     * @param null|string $newPackageQuantityUnit Package quantity unit
     * @return self
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null
    ): self;

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add an address to the Ship-To party
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
    public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
    public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Add a address of the ultimate Ship-To party
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
    public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate
     * @return self
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self;

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Add a position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Set the position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Add a position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Set Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Add Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Set the document position summation
     *
     * @param float|null $newNetAmount Net amount
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxTotalAmount Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice line amount including sales tax
     * @return self
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null
    ): self;

    /**
     * Set a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    /**
     * Add a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    #endregion
}
