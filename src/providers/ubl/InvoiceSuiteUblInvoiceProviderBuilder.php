<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTimeInterface;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\models\ubl\cac\PartyIdentificationType;
use horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;

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

    #region Document References

    /**
     * @inheritDoc
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getOrderReferenceWithCreate()
            ->getSalesOrderIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $orderReference = $this
            ->getUblInvoiceRootObject()
            ->getOrderReferenceWithCreate();

        $orderReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $orderReference->setIssueDate($newReferenceDate);
        }


        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $additionalDocTypeCode = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCTYPECODE', '');
        $additionalDocDescription = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCDESCRIPTION', '');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$additionalDocTypeCode, $additionalDocDescription])) {
            return $this;
        }

        $additionalDocumentReferences =
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                function (AdditionalDocumentReference $additionalDocumentReference) use ($additionalDocTypeCode) {
                    return strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $additionalDocTypeCode) !== 0;
                }
            );

        $this->getUblInvoiceRootObject()->setAdditionalDocumentReference($additionalDocumentReferences);

        $additionalDocReference = $this->getUblInvoiceRootObject()->addToAdditionalDocumentReferenceWithCreate();

        $additionalDocReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($additionalDocTypeCode)) {
            $additionalDocReference->getDocumentTypeCodeWithCreate()->setValue($additionalDocTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($additionalDocDescription)) {
            $additionalDocReference->addOnceToDocumentDescriptionWithCreate()->setValue($additionalDocDescription);
        }

        if (!is_null($newReferenceDate)) {
            $additionalDocReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentSellerQuotationReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @inheritDoc
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearContractDocumentReference();

        return $this->addDocumentContractReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @inheritDoc
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $contractReference = $this
            ->getUblInvoiceRootObject()
            ->addToContractDocumentReferenceWithCreate();

        $contractReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $contractReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearAdditionalDocumentReference();

        $this->addDocumentAdditionalReference(
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
     * @inheritDoc
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $additionalReference = $this
            ->getUblInvoiceRootObject()
            ->addToAdditionalDocumentReferenceWithCreate();

        $additionalReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $additionalReference
                ->setIssueDate($newReferenceDate);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            $additionalReference
                ->getDocumentTypeCodeWithCreate()
                ->setValue($newTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->clearDocumentDescription()
                ->addToDocumentDescriptionWithCreate()
                ->setValue($newDescription);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->getAttachmentWithCreate();
        }

        if (!is_null($newInvoiceSuiteAttachment)) {
            if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
                $additionalReference
                    ->getAttachmentWithCreate()
                    ->getEmbeddedDocumentBinaryObjectWithCreate()
                    ->setFilename($newInvoiceSuiteAttachment->getFilename())
                    ->setMimeCode($newInvoiceSuiteAttachment->getContentMimeType())
                    ->setValue($newInvoiceSuiteAttachment->getRawContent());
            }
            if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
                $additionalReference
                    ->getAttachmentWithCreate()
                    ->getExternalReferenceWithCreate()
                    ->getURIWithCreate()
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearBillingReference();

        $this->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $invoiceReference = $this
            ->getUblInvoiceRootObject()
            ->addToBillingReferenceWithCreate()
            ->getInvoiceDocumentReferenceWithCreate();

        $invoiceReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $invoiceReference
                ->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber Project number
     * @return self
     */
    public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearProjectReference();

        $this->addDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $projectReference = $this
            ->getUblInvoiceRootObject()
            ->addToProjectReferenceWithCreate();

        $projectReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentSellerName(string $newName): self
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
    public function setDocumentSellerId(string $newId): self
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

        $this->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @return self
     */
    public function addDocumentSellerId(string $newId): self
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
    public function setDocumentSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
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

        $this->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     An identifier of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
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
    public function setDocumentSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number of the seller (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number of the seller or sales tax identification number of the seller
     * @return self
     */
    public function addDocumentSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentSellerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentSellerLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setDocumentSellerCommunication(string $newType, string $newUri): self
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
    public function setDocumentBuyerName(string $newName): self
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
    public function setDocumentBuyerId(string $newId): self
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

        $this->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function addDocumentBuyerId(string $newId): self
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
    public function setDocumentBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
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

        $this->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
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
    public function setDocumentBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentBuyerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentBuyerLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the buyer's electronic address
     * @param string $newUri  Specifies the buyer's electronic address to which the invoice is sent
     * @return self
     */
    public function setDocumentBuyerCommunication(string $newType, string $newUri): self
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
    public function setDocumentTaxRepresentativeName(string $newName): self
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
    public function setDocumentTaxRepresentativeId(string $newId): self
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

        $this->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @return self
     */
    public function addDocumentTaxRepresentativeId(string $newId): self
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
    public function setDocumentTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
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

        $this->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     The buyers's identifier identification scheme is an identifier uniquely assigned to a buyer by a global registration organization.
     * @param string $newGlobalIdType If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
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
    public function setDocumentTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentTaxRepresentativeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * @param string $newType The identifier for the identification scheme of the buyer's electronic address
     * @param string $newUri  Specifies the buyer's electronic address to which the invoice is sent
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(string $newType, string $newUri): self
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
    public function setDocumentProductEndUserName(string $newName): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserId(string $newId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserId(string $newId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentShipToName(string $newName): self
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
     * @param string $newId An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setDocumentShipToId(string $newId): self
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
     * @param string $newId An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addDocumentShipToId(string $newId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId     Global identifier of the goods recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setDocumentShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
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
    public function addDocumentShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function setDocumentShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId   Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentShipToLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this;
    }

    /**
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri  The party's electronic address
     * @return self
     */
    public function setDocumentShipToCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentUltimateShipToName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId Identification of the different end recipient. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes.
     * @return self
     */
    public function setDocumentUltimateShipToId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId Identification of the different end recipient. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes.
     * @return self
     */
    public function addDocumentUltimateShipToId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier of the different end recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier of the different end recipient
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentUltimateShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentUltimateShipToLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function setDocumentUltimateShipToCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentShipFromName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified
     * @return self
     */
    public function setDocumentShipFromId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified
     * @return self
     */
    public function addDocumentShipFromId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identification number
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setDocumentShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identification number
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentShipFromAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentShipFromLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function setDocumentShipFromCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentInvoicerName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setDocumentInvoicerId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addDocumentInvoicerId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentInvoicerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentInvoicerLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function setDocumentInvoicerCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentInvoiceeName(string $newName): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function setDocumentInvoiceeId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addDocumentInvoiceeId(string $newId): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentInvoiceeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentInvoiceeLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function setDocumentInvoiceeCommunication(string $newType, string $newUri): self
    {
        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * @param string $newName The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentPayeeName(string $newName): self
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
    public function setDocumentPayeeId(string $newId): self
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

        $this->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * @param string $newId An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return self
     */
    public function addDocumentPayeeId(string $newId): self
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
    public function setDocumentPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
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

        $this->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId Global identifier
     * @param string $newGlobalIdType Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return self
     */
    public function addDocumentPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
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
    public function setDocumentPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param string $newTaxRegistrationId Tax number or sales tax identification number
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
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
    public function setDocumentPayeeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
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
    public function setDocumentPayeeLegalOrganisation(string $newType, string $newId, string $newName): self
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
    public function setDocumentPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
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
    public function addDocumentPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        return $this->setDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string $newType The identifier for the identification scheme of the party's electronic address
     * @param string $newUri The party's electronic address
     * @return self
     */
    public function setDocumentPayeeCommunication(string $newType, string $newUri): self
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
