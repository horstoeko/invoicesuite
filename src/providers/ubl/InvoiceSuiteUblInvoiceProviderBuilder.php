<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTimeInterface;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;
use horstoeko\invoicesuite\models\ubl\cac\PartyIdentificationType;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuiteUblInvoiceProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
{
    /**
     * Returns the root object as a Invoice
     *
     * @return Invoice
     */
    protected function getUblInvoiceRootObject(): Invoice
    {
        return $this->getRootObject();
    }

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteUblInvoiceProviderBuilder
    {
        $this->setContextParameter('urn:cen.eu:en16931:2017');

        return $this;
    }

    /**
     * Init context parameter for profile definition
     *
     * @param string $newCustomizationId
     * @param string $newProfileId
     * @return static
     */
    public function setContextParameter(string $newCustomizationId, string $newProfileId = ""): self
    {
        $this->getUblInvoiceRootObject()->getCustomizationIDWithCreate()->setValue($newCustomizationId);

        if ($newProfileId !== "") {
            $this->getUblInvoiceRootObject()->getProfileIDWithCreate()->setValue($newProfileId);
        } else {
            $this->getUblInvoiceRootObject()->getProfileIDWithCreate()->setValue('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        }

        return $this;
    }

    #region Document Generals

    /**
     * @param string $newDocumentNo
     * @return self
     */
    public function setDocumentNo(string $newDocumentNo): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentNo])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getIDWithCreate()->setValue($newDocumentNo);

        return $this;
    }

    /**
     * @param string $newDocumentType
     * @return self
     */
    public function setDocumentType(string $newDocumentType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentType])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setValue($newDocumentType);

        return $this;
    }

    /**
     * @param string $newDocumentDescription Document Type. The documenttype (free text)
     * @return self
     */
    public function setDocumentDescription(string $newDocumentDescription): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentDescription])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setName($newDocumentDescription);

        return $this;
    }

    /**
     * @param string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentLanguage])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setLanguageID($newDocumentLanguage);

        return $this;
    }

    /**
     * @param DateTimeInterface $newDocumentDate Date of invoice. The date when the document was issued by the seller
     * @return self
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self
    {
        $this->getUblInvoiceRootObject()->setIssueDate($newDocumentDate);

        return $this;
    }

    /**
     * @param DateTimeInterface $newCompleteDate The contractual due date of the invoice
     * @return self
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self
    {
        return $this;
    }

    /**
     * @param string $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self
    {
        $this->getUblInvoiceRootObject()->getDocumentCurrencyCodeWithCreate()->setValue($newDocumentCurrency);

        return $this;
    }

    /**
     * @param string $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self
    {
        $this->getUblInvoiceRootObject()->getTaxCurrencyCodeWithCreate()->setValue($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * @param bool $newDocumentIsCopy
     * @return self
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self
    {
        $this->getUblInvoiceRootObject()->setCopyIndicator($newDocumentIsCopy);

        return $this;
    }

    /**
     * @param bool $newDocumentIsTest
     * @return self
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self
    {
        return $this;
    }

    /**
     * @param string $newContent     A free text containing unstructured information that is relevant to the invoice as a whole
     * @param string $newContentCode A code to classify the content of the free text of the invoice
     * @param string $newSubjectCode The qualification of the free text for the invoice from
     * @return self
     */
    public function setDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self
    {
        $this->getUblInvoiceRootObject()->clearNote()->addToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    /**
     * @param string $newContent     A free text containing unstructured information that is relevant to the invoice as a whole
     * @param string $newContentCode A code to classify the content of the free text of the invoice
     * @param string $newSubjectCode The qualification of the free text for the invoice from
     * @return self
     */
    public function addDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self
    {
        $this->getUblInvoiceRootObject()->addToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setSellerName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @return self
     */
    public function setSellerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingSupplierPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addSellerId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @return self
     */
    public function addSellerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId     An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingSupplierPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number of the seller (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number of the seller or sales tax identification number of the seller
     * @return self
     */
    public function setSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number of the seller (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number of the seller or sales tax identification number of the seller
     * @return self
     */
    public function addSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the sellers address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the seller's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The sellers state
     * @return self
     */
    public function setSellerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the legal registration of the seller. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   An identifier issued by an official registrar that identifies the seller as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and seller
     * @param string $newName A name by which the seller is known, if different from the seller's name (also known as the company name). Note: This may be used if different from the seller's name.
     * @return self
     */
    public function setSellerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingSupplierPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingSupplierPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setSellerCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setBuyerName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function setBuyerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingCustomerPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate();

        $this->addBuyerId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function addBuyerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingCustomerPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate();

        $this->addBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function setBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);


        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the buyers address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the buyers address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The buyers state
     */
    public function setBuyerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the legal registration of the buyer. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   An identifier issued by an official registrar that identifies the buyer as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and buyer
     * @param string $newName A name by which the buyer is known, if different from the buyers name (also known as the company name)
     * @return self
     */
    public function setBuyerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingCustomerPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingCustomerPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the buyer's electronic address
     * @param string $newUri  Specifies the buyer's electronic address to which the invoice is sent
     * @return self
     */
    public function setBuyerCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Tax representativ party

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setTaxRepresentativeName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function setTaxRepresentativeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getTaxRepresentativePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function addTaxRepresentativeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getTaxRepresentativePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function setTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the buyers address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the buyers address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The buyers state
     */
    public function setTaxRepresentativeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the legal registration of the buyer. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   An identifier issued by an official registrar that identifies the buyer as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and buyer
     * @param string $newName A name by which the buyer is known, if different from the buyers name (also known as the company name)
     * @return self
     */
    public function setTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getTaxRepresentativePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
                ->getTaxRepresentativePartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the buyer's electronic address
     * @param string $newUri  Specifies the buyer's electronic address to which the invoice is sent
     * @return self
     */
    public function setTaxRepresentativeCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * @inheritDoc
     */
    public function setProductEndUserName(string $newName): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserId(string $newId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserId(string $newId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setShipToName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setShipToId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addShipToId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setShipToId($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId     Global identifier of the goods recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     Global identifier of the goods recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function setShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $address = $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $address->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $address->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $address->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $address->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $address->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $address->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId   An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setShipToLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @param string $newPersonName     Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setShipToCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setUltimateShipToName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId Identification of the different end recipient. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes.
     * @return self
     */
    public function setUltimateShipToId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId Identification of the different end recipient. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes.
     * @return self
     */
    public function addUltimateShipToId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier of the different end recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier of the different end recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setUltimateShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setUltimateShipToLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setUltimateShipToCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setShipFromName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified
     * @return self
     */
    public function setShipFromId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified
     * @return self
     */
    public function addShipFromId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identification number
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identification number
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setShipFromAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setShipFromLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setShipFromCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setInvoicerName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setInvoicerId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addInvoicerId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setInvoicerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setInvoicerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setInvoicerCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setInvoiceeName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setInvoiceeId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addInvoiceeId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setInvoiceeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setInvoiceeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri The party's electronic address
     * @return self
     */
    public function setInvoiceeCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setPayeeName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setPayeeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getPayeePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addPayeeId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addPayeeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getPayeePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    function (
                        PartyIdentificationType $partyIdentification
                    ) {
                        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($partyIdentification->getID()->getSchemeID());
                    }
                )
            );

        $this->addPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     Identifier for a group of properties, such as a zip code
     * @param string $newCity         Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  The party's state
     * @return self
     */
    public function setPayeeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setPayeeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getPayeePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
                ->getPayeePartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function setPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string $newPersonName     Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    A telephone number for the contact point
     * @param string $newFaxNumber      A fax number of the contact point
     * @param string $newEmailAddress   An e-mail address of the contact point
     * @return self
     */
    public function addPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri The party's electronic address
     * @return self
     */
    public function setPayeeCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    #endregion
}
