<?php

namespace horstoeko\invoicesuite\providers\zffx;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

class InvoiceSuiteZfFxProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
{
    /**
     * Returns the root object as a CrossIndustryInvoiceType
     *
     * @return CrossIndustryInvoiceType
     */
    protected function getCrossIndustryRootObject(): CrossIndustryInvoiceType
    {
        return $this->getRootObject();
    }

    /**
     * Init context parameter for profile definition
     *
     * @param string $newContextParameter
     * @param string $newBusinessProcessContextParameter
     * @return static
     */
    public function setContextParameter(string $newContextParameter, string $newBusinessProcessContextParameter = ""): self
    {
        /**
         * @var CrossIndustryInvoiceType $crossIndustryInvoice
         */
        $crossIndustryInvoice = $this->getRootObject();

        $exchangedDocumentContextType = new ExchangedDocumentContextType();
        $exchangedDocumentType = new ExchangedDocumentType();

        $crossIndustryInvoice->setExchangedDocumentContext($exchangedDocumentContextType);
        $crossIndustryInvoice->setExchangedDocument($exchangedDocumentType);

        $documentContextParameterType = new DocumentContextParameterType();
        $documentContextParameterType->getIDWithCreate()->setValue($newContextParameter);

        $crossIndustryInvoice
            ->getExchangedDocumentContext()
            ->setGuidelineSpecifiedDocumentContextParameter($documentContextParameterType);

        if ($newBusinessProcessContextParameter !== "") {
            $documentContextParameterType = new DocumentContextParameterType();
            $documentContextParameterType->getIDWithCreate()->setValue($newBusinessProcessContextParameter);

            $crossIndustryInvoice
                ->getExchangedDocumentContext()
                ->setBusinessProcessSpecifiedDocumentContextParameter($documentContextParameterType);
        }

        return $this;
    }

    #region Document Generals

    /**
     * @inheritDoc
     *
     * @param string $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     */
    public function setDocumentNo(string $newDocumentNo): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentNo])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIDWithCreate()
            ->setValue($newDocumentNo);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentType __BT-3, From MINIMUM__ The type of the document
     */
    public function setDocumentType(string $newDocumentType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentType])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getTypeCodeWithCreate()
            ->setValue($newDocumentType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentDescription __BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     */
    public function setDocumentDescription(string $newDocumentDescription): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentDescription])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getNameWithCreate()
            ->setValue($newDocumentDescription);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentLanguage])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getLanguageIDWithCreate()
            ->setValue($newDocumentLanguage);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param DateTimeInterface $newDocumentDate __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIssueDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDocumentDate->format("Ymd"))
            ->setFormat('102');

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param DateTimeInterface $newCompleteDate __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getEffectiveSpecifiedPeriodWithCreate()
            ->getCompleteDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newCompleteDate->format("Ymd"))
            ->setFormat("102");

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentCurrency])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCodeWithCreate()
            ->setValue($newDocumentCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * Note: Shall be used in combination with the Total VAT amount in accounting currency (BT-111)
     * when the VAT accounting currency code differs from the Invoice currency code.
     *
     * @param string $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentTaxCurrency])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getTaxCurrencyCodeWithCreate()
            ->setValue($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param bool $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Only to be used in the case of a test calculation, with newDocumentIsCopy = true
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getCopyIndicatorWithCreate()
            ->setIndicator($newDocumentIsCopy);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param bool $newDocumentIsTest __BT-X-3-00, From EXTENDED__ With newDocumentIsTest = true, the document is a copy
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self
    {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContextWithCreate()
            ->getTestIndicatorWithCreate()
            ->setIndicator($newDocumentIsTest);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newContent     __BT-22, From BASIC WL__ A free text containing unstructured information that is relevant to the invoice as a whole
     * @param string $newContentCode __BT-X-5, From EXTENDED__ A code to classify the content of the free text of the invoice
     * @param string $newSubjectCode __BT-21, From BASIC WL__ The qualification of the free text for the invoice from BT-22
     */
    public function addDocumentNote(string $newContent, string $newContentCode, string $newSubjectCode): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $note = $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->addToIncludedNoteWithCreate();

        $note->getContentWithCreate()->setValue($newContent);

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newContentCode])) {
            $note->getContentCodeWithCreate()->setValue($newContentCode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubjectCode])) {
            $note->getSubjectCodeWithCreate()->setValue($newSubjectCode);
        }

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @inheritDoc
     *
     * @param string $newName __BT-27, From MINIMUM__ The full formal name under which the seller is registered in the National Register of Legal Entities, Taxable Person or otherwise acting as person(s)
     * @return self
     */
    public function setSellerName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-29, From BASIC WL__ An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @return self
     */
    public function setSellerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearID();

        $this->addSellerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-29, From BASIC WL__ An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @return self
     */
    public function addSellerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-29-0, From BASIC WL__ An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string $newGlobalIdType __BT-29-1, From BASIC WL__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearGlobalID();

        $this->addSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-29-o, From BASIC WL__ An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string $newGlobalIdType __BT-29-1, From BASIC WL__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax number of the seller (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-31/32, From MINIMUM/EN 16931__ Tax number of the seller or sales tax identification number of the seller
     * @return self
     */
    public function setSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax number of the seller (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-31/32, From MINIMUM/EN 16931__ Tax number of the seller or sales tax identification number of the seller
     * @return self
     */
    public function addSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-35, From BASIC WL__ The main line in the sellers address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line used to provide additional details in addition to the main line
     * @param string $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     __BT-38, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param string $newCity         __BT-37, From BASIC WL__ Usual name of the city or municipality in which the seller's address is located
     * @param string $newCountryId    __BT-40, From MINIMUM__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  __BT-39, From BASIC WL__ The sellers state
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

        $sellerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newType __BT-30-1, From MINIMUM__ The identifier for the identification scheme of the legal registration of the seller. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   __BT-30, From MINIMUM__ An identifier issued by an official registrar that identifies the seller as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and seller
     * @param string $newName __BT-28, From BASIC WL__ A name by which the seller is known, if different from the seller's name (also known as the company name). Note: This may be used if different from the seller's name.
     * @return self
     */
    public function setSellerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $sellerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $sellerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $sellerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $sellerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-41, From EN 16931__ Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName __BT-41-0, From EN 16931__ If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    __BT-42, From EN 16931__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-107, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-43, From EN 16931__ An e-mail address of the contact point
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

        $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-41, From EN 16931__ Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName __BT-41-0, From EN 16931__ If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    __BT-42, From EN 16931__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-107, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-43, From EN 16931__ An e-mail address of the contact point
     * @return self
     */
    public function addSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $sellerTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $sellerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $sellerTradeContact->getDepartmentNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $sellerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $sellerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $sellerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-34-1, From BASIC WL__ The identifier for the identification scheme of the seller's electronic address
     * @param string $newUri  __BT-34, From BASIC WL__ Specifies the electronic address of the seller to which the response to the invoice can be sent at application level
     * @return self
     */
    public function setSellerCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $sellerUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $sellerUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $sellerUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * @inheritDoc
     *
     * @param string $newName __BT-44, From MINIMUM__ The full name of the buyer
     * @return self
     */
    public function setBuyerName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-46, From BASIC WL__ An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function setBuyerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearID();

        $this->addBuyerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-46, From BASIC WL__ An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function addBuyerId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-46-0, From BASIC WL__ The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType __BT-46-1, From BASIC WL__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearGlobalID();

        $this->addBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-46-0, From BASIC WL__ The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType __BT-46-1, From BASIC WL__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-48-0, From MINIMUM__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-48, From MINIMUM__ Tax number or sales tax identification number
     * @return self
     */
    public function setBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addBuyerTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-48-0, From MINIMUM__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-48, From MINIMUM__ Tax number or sales tax identification number
     * @return self
     */
    public function addBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationTyüe);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-50, From BASIC WL__ The main line in the buyers address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     __BT-53, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param string $newCity         __BT-52, From BASIC WL__ Usual name of the city or municipality in which the buyers address is located
     * @param string $newCountryId    __BT-55, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  __BT-54, From BASIC WL__ The buyers state
     * @return self
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

        $buyerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newType __BT-47-1, From MINIMUM__ The identifier for the identification scheme of the legal registration of the buyer. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   __BT-47, From MINIMUM__ An identifier issued by an official registrar that identifies the buyer as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and buyer
     * @param string $newName __BT-45, From BASIC WL__ A name by which the buyer is known, if different from the buyers name (also known as the company name)
     * @return self
     */
    public function setBuyerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $buyerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $buyerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $buyerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $buyerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-56, From EN 16931__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-56-0, From EN 16931__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-57, From EN 16931__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-115, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-58, From EN 16931__ An e-mail address of the contact point
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

        $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-56, From EN 16931__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-56-0, From EN 16931__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-57, From EN 16931__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-115, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-58, From EN 16931__ An e-mail address of the contact point
     * @return self
     */
    public function addBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $buyerTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $buyerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $buyerTradeContact->getDepartmentNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $buyerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $buyerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $buyerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-49-1, From BASIC WL__ The identifier for the identification scheme of the buyer's electronic address
     * @param string $newUri  __BT-49, From BASIC WL__ Specifies the buyer's electronic address to which the invoice is sent
     * @return self
     */
    public function setBuyerCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $buyerUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $buyerUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $buyerUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document tax representativ party

    /**
     * @inheritDoc
     *
     * @param string $newName __BT-62, From BASIC WL__ The full name of the seller's tax agent
     * @return self
     */
    public function setTaxRepresentativeName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-X-116, From EXTENDED__ An identifier of the sellers tax agent.
     * @return self
     */
    public function setTaxRepresentativeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearID();

        $this->addTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-X-116, From EXTENDED__ An identifier of the sellers tax agent.
     * @return self
     */
    public function addTaxRepresentativeId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-X-117, From EXTENDED__ The seller's tax agent identifier identification scheme is an identifier uniquely assigned to a seller by a global registration organization.
     * @param string $newGlobalIdType __BT-X-117-1, From EXTENDED__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearGlobalID();

        $this->addTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-X-117, From EXTENDED__ The seller's tax agent identifier identification scheme is an identifier uniquely assigned to a seller by a global registration organization.
     * @param string $newGlobalIdType __BT-X-117-1, From EXTENDED__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-63-0, From BASIC WL__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax number or sales tax identification number
     * @return self
     */
    public function setTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addTaxRepresentativeTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-63-0, From BASIC WL__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax number or sales tax identification number
     * @return self
     */
    public function addTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationTyüe);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-64, From BASIC WL__ The main line in the sellers tax agent address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the sellers tax agent address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the sellers tax agent address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     __BT-67, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param string $newCity         __BT-66, From BASIC WL__ Usual name of the city or municipality in which the sellers tax agent address is located
     * @param string $newCountryId    __BT-69, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  __BT-68, From BASIC WL__ The sellers tax agent state
     * @return self
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

        $taxRepresentativeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newType __BT-, From __ The identifier for the identification scheme of the legal registration of the sellers tax agent. If the identification scheme is used, it must be selected from  ISO/IEC 6523 list
     * @param string $newId   __BT-, From __ An identifier issued by an official registrar that identifies the seller tax agent as a legal entity or legal person.
     * @param string $newName __BT-, From __ A name by which the sellers tax agent is known, if different from the  sellers tax agent name (also known as the company name)
     * @return self
     */
    public function setTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $taxRepresentativeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $taxRepresentativeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $taxRepresentativeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $taxRepresentativeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-120, From EXTENDED__ Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName __BT-X-121, From EXTENDED__ If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    __BT-X-122, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-123, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-124, From EXTENDED__ An e-mail address of the contact point
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

        $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-120, From EXTENDED__ Such as personal name, name of contact person or department or office
     * @param string $newDepartmentName __BT-X-121, From EXTENDED__ If a contact person is specified, either the name or the department must be transmitted.
     * @param string $newPhoneNumber    __BT-X-122, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-123, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-124, From EXTENDED__ An e-mail address of the contact point
     * @return self
     */
    public function addTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $taxRepresentativeTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $taxRepresentativeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $taxRepresentativeTradeContact->getDepartmentNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $taxRepresentativeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $taxRepresentativeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $taxRepresentativeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-125-0, From EXTENDED__ The identifier for the identification scheme of the tax representative's electronic address
     * @param string $newUri  __BT-X-125, From EXTENDED__ Specifies the tax representative's electronic address to which the invoice is sent
     * @return self
     */
    public function setTaxRepresentativeCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $taxRepresentativeUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $taxRepresentativeUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $taxRepresentativeUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * @inheritDoc
     *
     * @param string $newName __BT-X-128, From EXTENDED__ Name/company name of the end user
     * @return self
     */
    public function setProductEndUserName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-X-126, From EXTENDED__ An identifier of the product end user
     * @return self
     */
    public function setProductEndUserId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearID();

        $this->addProductEndUserId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-X-126, From EXTENDED__ An identifier of the product end user
     * @return self
     */
    public function addProductEndUserId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-X-127, From EXTENDED__ The identifier is uniquely assigned to a party by a global registration organization.
     * @param string $newGlobalIdType __BT-X-127-0, From EXTENDED__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearGlobalID();

        $this->addProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-X-127, From EXTENDED__ The identifier is uniquely assigned to a party by a global registration organization.
     * @param string $newGlobalIdType __BT-X-127-0, From EXTENDED__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-, From __ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-, From __ Tax number or sales tax identification number
     * @return self
     */
    public function setProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addProductEndUserTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-, From __ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-, From __ Tax number or sales tax identification number
     * @return self
     */
    public function addProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationTyüe);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the product end users address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     __BT-X-396, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param string $newCity         __BT-X-400, From EXTENDED__ Usual name of the city or municipality in which the product end users address is located
     * @param string $newCountryId    __BT-X-401, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  __BT-X-402, From EXTENDED__ The product end users state
     * @return self
     */
    public function setProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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

        $productEndUserTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newType __BT-X-129-0, From EXTENDED__The identifier for the identification scheme of the legal registration of the product end user. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param string $newId   __BT-X-129, From EXTENDED__ An identifier issued by an official registrar that identifies the product end user as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to all trade parties
     * @param string $newName __BT-X-130, From EXTENDED__ A name by which the product end user is known, if different from the product end users name (also known as the company name)
     * @return self
     */
    public function setProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $productEndUserTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $productEndUserTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $productEndUserTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $productEndUserTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-131, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-X-132, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-X-133, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-134, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-135, From EXTENDED__ An e-mail address of the contact point
     * @return self
     */
    public function setProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-131, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-X-132, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-X-133, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-134, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-135, From EXTENDED__ An e-mail address of the contact point
     * @return self
     */
    public function addProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $productEndUserTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $productEndUserTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $productEndUserTradeContact->getDepartmentNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $productEndUserTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $productEndUserTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $productEndUserTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-, From EXTENDED__ The identifier for the identification scheme of the product enduser's electronic address
     * @param string $newUri  __BT-, From EXTENDED__ Specifies the product enduser's electronic address to which the invoice is sent
     * @return self
     */
    public function setProductEndUserCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $productEndUserUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $productEndUserUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $productEndUserUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * @inheritDoc
     *
     * @param string $newName __BT-70, From BASIC WL__ The name of the party to whom the goods are being delivered or for whom the services are being performed. Must be used if the recipient of the goods or services is not the same as the buyer.
     * @return self
     */
    public function setShipToName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string __BT-71, From BASIC WL__ An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setShipToId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearID();

        $this->addShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newId __BT-71, From BASIC WL__ An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addShipToId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-71-0, From BASIC WL__ Global identifier of the goods recipient
     * @param string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearGlobalID();

        $this->addShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newGlobalId     __BT-71-0, From BASIC WL__ Global identifier of the goods recipient
     * @param string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-X-161-0, From EXTENDED__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax number or sales tax identification number
     * @return self
     */
    public function setShipToTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addShipToTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newTaxRegistrationTyüe __BT-X-161-0, From EXTENDED__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax number or sales tax identification number
     * @return self
     */
    public function addShipToTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationTyüe, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationTyüe);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-75, From BASIC WL__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param string $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param string $newPostcode     __BT-78, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param string $newCity         __BT-77, From BASIC WL__ Usual name of the city or municipality in which the party's address is located
     * @param string $newCountryId    __BT-80, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param string $newSubDivision  __BT-79, From BASIC WL__ The party's state
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

        $shipToTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @param string $newType __BT-X-153-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param string $newId   __BT-X-153, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName __BT-X-154, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setShipToLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $shipToTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $shipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-155, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-X-156, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-X-157, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-158, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-159, From EXTENDED__ An e-mail address of the contact point
     * @return self
     */
    public function setShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-155, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param string $newDepartmentName __BT-X-156, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param string $newPhoneNumber    __BT-X-157, From EXTENDED__ A telephone number for the contact point
     * @param string $newFaxNumber      __BT-X-158, From EXTENDED__ A fax number of the contact point
     * @param string $newEmailAddress   __BT-X-159, From EXTENDED__ An e-mail address of the contact point
     * @return self
     */
    public function addShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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

        $shipToTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $shipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $shipToTradeContact->getDepartmentNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $shipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $shipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $shipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-160, From EXTENDED__ The identifier for the identification scheme of the product enduser's electronic address
     * @param string $newUri  __BT-X-160-0, From EXTENDED__ Specifies the product enduser's electronic address to which the invoice is sent
     * @return self
     */
    public function setShipToCommunication(string $newType, string $newUri): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $shipToUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion
}
