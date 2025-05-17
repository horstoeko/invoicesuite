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
    #region Document Generals

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param  string $newDocumentNo
     * @return static
     */
    public function setDocumentNo(
        string $newDocumentNo
    ): self;

    /**
     * Sets the new document type code
     *
     * @param  string $newDocumentType
     * @return static
     */
    public function setDocumentType(
        string $newDocumentType
    ): self;

    /**
     * Sets the new document description
     *
     * @param  string $newDocumentDescription
     * @return self
     */
    public function setDocumentDescription(
        string $newDocumentDescription
    ): self;

    /**
     * Sets the new document language
     *
     * @param  string $newDocumentLanguage
     * @return self
     */
    public function setDocumentLanguage(
        string $newDocumentLanguage
    ): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  DateTimeInterface $newDocumentDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentDate(
        DateTimeInterface $newDocumentDate
    ): self;

    /**
     * Sets the new document period
     *
     * @param  DateTimeInterface $newCompleteDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentCompleteDate(
        DateTimeInterface $newCompleteDate
    ): self;

    /**
     * Sets the new document currency
     *
     * @param  string $newDocumentCurrency
     * @return self
     */
    public function setDocumentCurrency(
        string $newDocumentCurrency
    ): self;

    /**
     * Sets the new document tax currency
     *
     * @param  string $newDocumentTaxCurrency
     * @return self
     */
    public function setDocumentTaxCurrency(
        string $newDocumentTaxCurrency
    ): self;

    /**
     * Sets the new status of the copy indicator
     *
     * @param  boolean $newDocumentIsCopy
     * @return self
     */
    public function setDocumentIsCopy(
        bool $newDocumentIsCopy
    ): self;

    /**
     * Sets the new status of the test indicator
     *
     * @param  boolean $newDocumentIsTest
     * @return self
     */
    public function setDocumentIsTest(
        bool $newDocumentIsTest
    ): self;

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  string $newContent
     * @param  string $newContentCode
     * @param  string $newSubjectCode
     * @return self
     */
    public function setDocumentNote(
        string $newContent,
        string $newContentCode,
        string $newSubjectCode
    ): self;

    /**
     * Add a note to the document
     *
     * @param  string $newContent
     * @param  string $newContentCode
     * @param  string $newSubjectCode
     * @return self
     */
    public function addDocumentNote(
        string $newContent,
        string $newContentCode,
        string $newSubjectCode
    ): self;

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return InvoiceSuiteBuilderContract
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
     * @return InvoiceSuiteBuilderContract
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
     * @param InvoiceSuiteAttachment|null $InvoiceSuiteAttachment Additional document attachment
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
     * @param InvoiceSuiteAttachment|null $InvoiceSuiteAttachment Additional document attachment
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
    public function setAocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self;

    #endregion

    #region Document Seller/Supplier

    /**
     * Set the name of the seller/supplier party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        string $newName
    ): self;

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        string $newId
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the seller/supplier party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentSellerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Buyer/Customer

    /**
     * Set the name of the buyer/customer party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(
        string $newName
    ): self;

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        string $newId
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the buyer/customer party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentBuyerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  string $newPersonName
     * @param  string $newDepartmentName
     * @param  string $newPhoneNumber
     * @param  string $newFaxNumber
     * @param  string $newEmailAddress
     * @return self
     */
    public function setDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the buyer/customer party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Tax Representativ party

    /**
     * Set the name of the tax representative party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        string $newName
    ): self;

    /**
     * Set the ID of the tax representative party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        string $newId
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the tax representative party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentTaxRepresentativeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the tax representative party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the tax representative party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the tax representative party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the tax representative party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Product Enduser

    /**
     * Set the name of the product end-user party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        string $newName
    ): self;

    /**
     * Set the ID of the product end-user party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        string $newId
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the product end-user party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentProductEndUserAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the product end-user party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the product end-user party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the product end-user party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the product end-user party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Ship-To

    /**
     * Set the name of the Ship-To party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        string $newName
    ): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        string $newId
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the Ship-To party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentShipToAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the Ship-To party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the Ship-To party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(
        string $newName
    ): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        string $newId
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentUltimateShipToAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Ship-From

    /**
     * Set the name of the Ship-From party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(
        string $newName
    ): self;

    /**
     * Set the ID of the Ship-From party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        string $newId
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the Ship-From party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentShipFromAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the Ship-From party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the Ship-From party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the Ship-From party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Invoicer

    /**
     * Set the name of the Invoicer party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(
        string $newName
    ): self;

    /**
     * Set the ID of the Invoicer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        string $newId
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the Invoicer party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentInvoicerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the Invoicer party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the Invoicer party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the Invoicer party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Invoicee

    /**
     * Set the name of the Invoicee party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(
        string $newName
    ): self;

    /**
     * Set the ID of the Invoicee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        string $newId
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the Invoicee party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentInvoiceeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the Invoicee party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the Invoicee party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the Invoicee party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(
        string $newType,
        string $newUri
    ): self;

    #endregion

    #region Document Payee

    /**
     * Set the name of the Payee party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        string $newName
    ): self;

    /**
     * Set the ID of the Payee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        string $newId
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        string $newId
    ): self;

    /**
     * Set the Global ID of the Payee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self;

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self;

    /**
     * Set the address of the Payee party
     *
     * @param string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId Country in which the party's address is located.
     * @param string $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentPayeeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self;

    /**
     * Set the legal information of the Payee party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self;

    /**
     * Set the contact information of the Payee party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add contact information of the Payee party
     *
     * @param string $newPersonName Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName Name of the department for the contact point.
     * @param string $newPhoneNumber Telephone number for the contact point.
     * @param string $newFaxNumber Fax number of the contact point.
     * @param string $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self;

    /**
     * Add communication information of the Payee party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(
        string $newType,
        string $newUri
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
     * @param InvoiceSuiteAttachment|null $InvoiceSuiteAttachment Additional document attachment
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
     * @param InvoiceSuiteAttachment|null $InvoiceSuiteAttachment Additional document attachment
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

    #endregion
}
