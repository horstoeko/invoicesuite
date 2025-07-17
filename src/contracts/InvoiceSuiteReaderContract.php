<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\contracts;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Interface representing the required methods for a reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
interface InvoiceSuiteReaderContract
{
    #region Document DTO

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
    ): self;

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self;

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self;

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self;

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self;

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self;

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self;

    /**
     * Gets the document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self;

    /**
     * Gets the status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy
    ): self;

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self;

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool;

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool;

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
    ): self;

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentBillingPeriod(): bool;

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentBillingPeriod(): bool;

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
    ): self;

    /**
     * Go to the first posting reference
     *
     * @return boolean
     */
    public function firstDocumentPostingReference(): bool;

    /**
     * Go to the next posting reference
     *
     * @return boolean
     */
    public function nextDocumentPostingReference(): bool;

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
    ): self;

    #endregion

    #region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool;

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentSellerOrderReference(): bool;

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
    ): self;

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentBuyerOrderReference(): bool;

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentBuyerOrderReference(): bool;

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
    ): self;

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool;

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool;

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
    ): self;

    /**
     * Go to the first associated contract
     *
     * @return boolean
     */
    public function firstDocumentContractReference(): bool;

    /**
     * Go to the next associated contract
     *
     * @return boolean
     */
    public function nextDocumentContractReference(): bool;

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
    ): self;

    /**
     * Go to the first additional associated document
     *
     * @return boolean
     */
    public function firstDocumentAdditionalReference(): bool;

    /**
     * Go to the next additional associated document
     *
     * @return boolean
     */
    public function nextDocumentAdditionalReference(): bool;

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
    ): self;

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function firstDocumentInvoiceReference(): bool;

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function nextDocumentInvoiceReference(): bool;

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
    ): self;

    /**
     * Go to the first additional project reference
     *
     * @return boolean
     */
    public function firstDocumentProjectReference(): bool;

    /**
     * Go to the next additional project reference
     *
     * @return boolean
     */
    public function nextDocumentProjectReference(): bool;

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
    ): self;

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool;

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return boolean
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool;

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
    ): self;

    /**
     * Go to the first additional despatch advice reference
     *
     * @return boolean
     */
    public function firstDocumentDespatchAdviceReference(): bool;

    /**
     * Go to the next additional despatch advice reference
     *
     * @return boolean
     */
    public function nextDocumentDespatchAdviceReference(): bool;

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
    ): self;

    /**
     * Go to the first additional receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool;

    /**
     * Go to the next additional Receiving advice reference
     *
     * @return boolean
     */
    public function nextDocumentReceivingAdviceReference(): bool;

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
    ): self;

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool;

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool;

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
    ): self;

    /**
     * Get the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self;

    #endregion

    #region Document Seller/Supplier

    /**
     * Get the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool;

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerId(): bool;

    /**
     * Get the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool;

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerAddress(): bool;

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerAddress(): bool;

    /**
     * Get the address of the seller/supplier party
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
    ): self;

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerContact(): bool;

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerCommunication(): bool;

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerId(): bool;

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerId(): bool;

    /**
     * Get the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerGlobalId(): bool;

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerAddress(): bool;

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerAddress(): bool;

    /**
     * Get the address of the buyer/customer party
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
    ): self;

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerContact(): bool;

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerCommunication(): bool;

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeId(): bool;

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeId(): bool;

    /**
     * Get the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool;

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeAddress(): bool;

    /**
     * Go to the next address of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeAddress(): bool;

    /**
     * Get the address of the tax representative party
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
    ): self;

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeContact(): bool;

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool;

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserId(): bool;

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserId(): bool;

    /**
     * Get the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserGlobalId(): bool;

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserAddress(): bool;

    /**
     * Go to the next address of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserAddress(): bool;

    /**
     * Get the address of the product end-user party
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
    ): self;

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserContact(): bool;

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserCommunication(): bool;

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToId(): bool;

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToId(): bool;

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToGlobalId(): bool;

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToAddress(): bool;

    /**
     * Go to the next address of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToAddress(): bool;

    /**
     * Get the address of the Ship-To party
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
    ): self;

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToContact(): bool;

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToCommunication(): bool;

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToId(): bool;

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToId(): bool;

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToGlobalId(): bool;

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToAddress(): bool;

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToAddress(): bool;

    /**
     * Get the address of the ultimate Ship-To party
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
    ): self;

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToContact(): bool;

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToCommunication(): bool;

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromId(): bool;

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromId(): bool;

    /**
     * Get the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromGlobalId(): bool;

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromAddress(): bool;

    /**
     * Go to the next address of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromAddress(): bool;

    /**
     * Get the address of the Ship-From party
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
    ): self;

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromContact(): bool;

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromCommunication(): bool;

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerId(): bool;

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerId(): bool;

    /**
     * Get the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerGlobalId(): bool;

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerAddress(): bool;

    /**
     * Go to the next address of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerAddress(): bool;

    /**
     * Get the address of the Invoicer party
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
    ): self;

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerContact(): bool;

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerCommunication(): bool;

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeId(): bool;

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeId(): bool;

    /**
     * Get the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeGlobalId(): bool;

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeAddress(): bool;

    /**
     * Go to the next address of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeAddress(): bool;

    /**
     * Get the address of the Invoicee party
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
    ): self;

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeContact(): bool;

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeCommunication(): bool;

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeCommunication(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeId(): bool;

    /**
     * Go to the next ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeId(): bool;

    /**
     * Get the ID of the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeGlobalId(): bool;

    /**
     * Go to the next global ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeGlobalId(): bool;

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
    ): self;

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeTaxRegistration(): bool;

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
    ): self;

    /**
     * Go to the first address of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeAddress(): bool;

    /**
     * Go to the next address of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeAddress(): bool;

    /**
     * Get the address of the Payee party
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
    ): self;

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeLegalOrganisation(): bool;

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
    ): self;

    /**
     * Go to the first contact information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeContact(): bool;

    /**
     * Go to the next contact information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeContact(): bool;

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
    ): self;

    /**
     * Go to the first communication information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeCommunication(): bool;

    /**
     * Go to the next communication information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeCommunication(): bool;

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
    ): self;

    #endregion

    #region Document Payment

    /**
     * Go to the first Payment mean
     *
     * @return boolean
     */
    public function firstDocumentPaymentMean(): bool;

    /**
     * Go to the next Payment mean
     *
     * @return boolean
     */
    public function nextDocumentPaymentMean(): bool;

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
    ): self;

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return boolean
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool;

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return boolean
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool;

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): self;

    /**
     * Go to the first payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentTerm(): bool;

    /**
     * Go to the next payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentTerm(): bool;

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
    ): self;

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool;

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool;

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
    ): self;

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool;

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool;

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
    ): self;

    #endregion

    #region Document Tax

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return boolean
     */
    public function firstDocumentTax(): bool;

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return boolean
     */
    public function nextDocumentTax(): bool;

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
    ): self;

    #endregion

    #region Document Allowances/Charges

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return boolean
     */
    public function firstDocumentAllowanceCharge(): bool;

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return boolean
     */
    public function nextDocumentAllowanceCharge(): bool;

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
    ): self;

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return boolean
     */
    public function firstDocumentLogisticServiceCharge(): bool;

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return boolean
     */
    public function nextDocumentLogisticServiceCharge(): bool;

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
    ): self;

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
    ): self;

    #endregion

    #region Document Positions

    /**
     * Go to the first document position
     *
     * @return boolean
     */
    public function firstDocumentPosition(): bool;

    /**
     * Go to the next document position
     *
     * @return boolean
     */
    public function nextDocumentPosition(): bool;

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
    ): self;

    /**
     * Go to the first text information of the latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionNote(): bool;

    /**
     * Go to the next text information of the latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionNote(): bool;

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
    ): self;

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
    ): self;

    /**
     * Go to the first product characteristics from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionProductCharacteristic(): bool;

    /**
     * Go to the next product characteristics from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductCharacteristic(): bool;

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
    ): self;

    /**
     * Go to the first product classification from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionProductClassification(): bool;

    /**
     * Go to the next product classification from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductClassification(): bool;

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
    ): self;

    #endregion
}
