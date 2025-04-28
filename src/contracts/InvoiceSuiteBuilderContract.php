<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\contracts;

use DateTimeInterface;

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
     * @param string $newDocumentNo
     * @return static
     */
    public function setDocumentNo(string $newDocumentNo): self;

    /**
     * Sets the new document type code
     *
     * @param string $newDocumentType
     * @return static
     */
    public function setDocumentType(string $newDocumentType): self;

    /**
     * Sets the new document description
     *
     * @param string $newDocumentDescription
     * @return self
     */
    public function setDocumentDescription(string $newDocumentDescription): self;

    /**
     * Sets the new document language
     *
     * @param string $newDocumentLanguage
     * @return self
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface $newDocumentDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self;

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface $newCompleteDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self;

    /**
     * Sets the new document currency
     *
     * @param string $newDocumentCurrency
     * @return self
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self;

    /**
     * Sets the new document tax currency
     *
     * @param string $newDocumentTaxCurrency
     * @return self
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self;

    /**
     * Sets the new status of the copy indicator
     *
     * @param boolean $newDocumentIsCopy
     * @return self
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self;

    /**
     * Sets the new status of the test indicator
     *
     * @param boolean $newDocumentIsTest
     * @return self
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self;

    /**
     * Add a note to the document
     *
     * @param string $newContent
     * @param string $newContentCode
     * @param string $newSubjectCode
     * @return self
     */
    public function addDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self;

    #endregion

    #region Document Seller/Supplier

    /**
     * Set the name of the seller/supplier party
     *
     * @param string $newName
     * @return self
     */
    public function setSellerName(string $newName): self;

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string $newId
     * @return self
     */
    public function setSellerId(string $newId): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newId
     * @return self
     */
    public function addSellerId(string $newId): self;

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function setSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function addSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string $newTaxRegistrationType
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function setSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string $newTaxRegistrationType
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function addSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self;

    /**
     * Set the address of the seller/supplier party
     *
     * @param string $newAddressLine1
     * @param string $newAddressLine2
     * @param string $newAddressLine3
     * @param string $newPostcode
     * @param string $newCity
     * @param string $newCountryId
     * @param string $newSubDivision
     * @return self
     */
    public function setSellerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param string $newType
     * @param string $newId
     * @param string $newName
     * @return self
     */
    public function setSellerLegalOrganisation(string $newType, string $newId, string $newName): self;

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function setSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function addSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string $newType
     * @param string $newUri
     * @return self
     */
    public function setSellerCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Buyer/Customer

    /**
     * Set the name of the buyer/customer party
     *
     * @param string $newName
     * @return self
     */
    public function setBuyerName(string $newName): self;

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string $newId
     * @return self
     */
    public function setBuyerId(string $newId): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newId
     * @return self
     */
    public function addBuyerId(string $newId): self;

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function setBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function addBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function setBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function addBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Set the address of the buyer/customer party
     *
     * @param string $newAddressLine1
     * @param string $newAddressLine2
     * @param string $newAddressLine3
     * @param string $newPostcode
     * @param string $newCity
     * @param string $newCountryId
     * @param string $newSubDivision
     * @return self
     */
    public function setBuyerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param string $newType
     * @param string $newId
     * @param string $newName
     * @return self
     */
    public function setBuyerLegalOrganisation(string $newType, string $newId, string $newName): self;

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function setBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function addBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the buyer/customer party
     *
     * @param string $newType
     * @param string $newUri
     * @return self
     */
    public function setBuyerCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document tax representativ party

    /**
     * Set the name of the tax representative party
     *
     * @param string $newName
     * @return self
     */
    public function setTaxRepresentativeName(string $newName): self;

    /**
     * Set the ID of the tax representative party
     *
     * @param string $newId
     * @return self
     */
    public function setTaxRepresentativeId(string $newId): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newId
     * @return self
     */
    public function addTaxRepresentativeId(string $newId): self;

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function setTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function addTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function setTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function addTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Set the address of the tax representative party
     *
     * @param string $newAddressLine1
     * @param string $newAddressLine2
     * @param string $newAddressLine3
     * @param string $newPostcode
     * @param string $newCity
     * @param string $newCountryId
     * @param string $newSubDivision
     * @return self
     */
    public function setTaxRepresentativeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the tax representative party
     *
     * @param string $newType
     * @param string $newId
     * @param string $newName
     * @return self
     */
    public function setTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self;

    /**
     * Set the contact information of the tax representative party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function setTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add contact information of the tax representative party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function addTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the tax representative party
     *
     * @param string $newType
     * @param string $newUri
     * @return self
     */
    public function setTaxRepresentativeCommunication(string $newType, string $newUri): self;

    #endregion

    #region Document Product Enduser

    /**
     * Set the name of the product end-user party
     *
     * @param string $newName
     * @return self
     */
    public function setProductEndUserName(string $newName): self;

    /**
     * Set the ID of the product end-user party
     *
     * @param string $newId
     * @return self
     */
    public function setProductEndUserId(string $newId): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newId
     * @return self
     */
    public function addProductEndUserId(string $newId): self;

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function setProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param string $newGlobalId
     * @param string $newGlobalIdType
     * @return self
     */
    public function addProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self;

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function setProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string $newTaxRegistrationTyüe
     * @param string $newTaxRegistrationId
     * @return self
     */
    public function addProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self;

    /**
     * Set the address of the product end-user party
     *
     * @param string $newAddressLine1
     * @param string $newAddressLine2
     * @param string $newAddressLine3
     * @param string $newPostcode
     * @param string $newCity
     * @param string $newCountryId
     * @param string $newSubDivision
     * @return self
     */
    public function setProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self;

    /**
     * Set the legal information of the product end-user party
     *
     * @param string $newType
     * @param string $newId
     * @param string $newName
     * @return self
     */
    public function setProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self;

    /**
     * Set the contact information of the product end-user party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function setProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add contact information of the product end-user party
     *
     * @param string $newPersonName
     * @param string $newDepartmentName
     * @param string $newPhoneNumber
     * @param string $newFaxNumber
     * @param string $newEmailAddress
     * @return self
     */
    public function addProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self;

    /**
     * Add communication information of the product end-user party
     *
     * @param string $newType
     * @param string $newUri
     * @return self
     */
    public function setProductEndUserCommunication(string $newType, string $newUri): self;

    #endregion
}
