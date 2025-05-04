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
    public function setDocumentNo(string $newDocumentNo): self;

    /**
     * Sets the new document type code
     *
     * @param  string $newDocumentType
     * @return static
     */
    public function setDocumentType(string $newDocumentType): self;

    /**
     * Sets the new document description
     *
     * @param  string $newDocumentDescription
     * @return self
     */
    public function setDocumentDescription(string $newDocumentDescription): self;

    /**
     * Sets the new document language
     *
     * @param  string $newDocumentLanguage
     * @return self
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  DateTimeInterface $newDocumentDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self;

    /**
     * Sets the new document period
     *
     * @param  DateTimeInterface $newCompleteDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self;

    /**
     * Sets the new document currency
     *
     * @param  string $newDocumentCurrency
     * @return self
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self;

    /**
     * Sets the new document tax currency
     *
     * @param  string $newDocumentTaxCurrency
     * @return self
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self;

    /**
     * Sets the new status of the copy indicator
     *
     * @param  boolean $newDocumentIsCopy
     * @return self
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self;

    /**
     * Sets the new status of the test indicator
     *
     * @param  boolean $newDocumentIsTest
     * @return self
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self;

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  string $newContent
     * @param  string $newContentCode
     * @param  string $newSubjectCode
     * @return self
     */
    public function setDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self;

    /**
     * Add a note to the document
     *
     * @param  string $newContent
     * @param  string $newContentCode
     * @param  string $newSubjectCode
     * @return self
     */
    public function addDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self;

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
     * Set the associated seller's quotation
     *
     * @param string|null $newReferenceNumber Seller's quotation number
     * @param DateTimeInterface|null $newReferenceDate Seller's quotation date
     * @return self
     */
    public function setDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated seller's quotation
     *
     * @param string|null $newReferenceNumber Seller's quotation number
     * @param DateTimeInterface|null $newReferenceDate Seller's quotation date
     * @return self
     */
    public function addDocumentSellerQuotationReference(
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

    #endregion

    #region Document Seller/Supplier

    /**
     * Set the name of the seller/supplier party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(string $newName): self;

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(string $newId): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(string $newId): self;

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentSellerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Buyer/Customer

    /**
     * Set the name of the buyer/customer party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(string $newName): self;

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(string $newId): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(string $newId): self;

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentBuyerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the buyer/customer party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Tax Representativ party

    /**
     * Set the name of the tax representative party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(string $newName): self;

    /**
     * Set the ID of the tax representative party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(string $newId): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(string $newId): self;

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentTaxRepresentativeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the tax representative party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the tax representative party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Product Enduser

    /**
     * Set the name of the product end-user party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(string $newName): self;

    /**
     * Set the ID of the product end-user party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(string $newId): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(string $newId): self;

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the product end-user party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the product end-user party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Ship-To

    /**
     * Set the name of the Ship-To party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(string $newName): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(string $newId): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(string $newId): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the Ship-To party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(string $newName): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(string $newId): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(string $newId): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentUltimateShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Ship-From

    /**
     * Set the name of the Ship-From party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(string $newName): self;

    /**
     * Set the ID of the Ship-From party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(string $newId): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(string $newId): self;

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentShipFromAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the Ship-From party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Invoicer

    /**
     * Set the name of the Invoicer party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(string $newName): self;

    /**
     * Set the ID of the Invoicer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(string $newId): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(string $newId): self;

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentInvoicerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the Invoicer party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Invoicee

    /**
     * Set the name of the Invoicee party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(string $newName): self;

    /**
     * Set the ID of the Invoicee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(string $newId): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(string $newId): self;

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentInvoiceeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the Invoicee party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Payee

    /**
     * Set the name of the Payee party
     *
     * @param string $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(string $newName): self;

    /**
     * Set the ID of the Payee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(string $newId): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(string $newId): self;

    /**
     * Set the Global ID of the Payee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the Payee party
     *
     * @param string $newGlobalId A global identifier of the party.
     * @param string $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

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
    public function setDocumentPayeeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the Payee party
     *
     * @param string $newType Type of the identification number of the legal registration of the party.
     * @param string $newId Identification number of the legal registration of the party.
     * @param string $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(string $newType, string $newId, string $newName): self;

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
    public function setDocumentPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

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
    public function addDocumentPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the Payee party
     *
     * @param string $newType The type for the party's electronic address.
     * @param string $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(string $newType, string $newUri): self;

    #endregion
}
