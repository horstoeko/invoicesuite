<?php

namespace horstoeko\invoicesuite\providers\zffx;

use DateTimeInterface;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\models\zffx\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffx\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\models\zffx\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuiteZfFxProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
{
    #region Internal

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
    public function setContextParameter(
        string $newContextParameter,
        string $newBusinessProcessContextParameter = ""
    ): self {
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

    #endregion

    #region Document Generals

    /**
     * @param string $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     */
    public function setDocumentNo(
        string $newDocumentNo
    ): self {
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
     * @param string $newDocumentType __BT-3, From MINIMUM__ The type of the document
     */
    public function setDocumentType(
        string $newDocumentType
    ): self {
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
     * @param string $newDocumentDescription __BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     */
    public function setDocumentDescription(
        string $newDocumentDescription
    ): self {
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
     * @param string $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     */
    public function setDocumentLanguage(
        string $newDocumentLanguage
    ): self {
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
     * @param DateTimeInterface $newDocumentDate __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     */
    public function setDocumentDate(
        DateTimeInterface $newDocumentDate
    ): self {
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
     * @param DateTimeInterface $newCompleteDate __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     */
    public function setDocumentCompleteDate(
        DateTimeInterface $newCompleteDate
    ): self {
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
     * @param string $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     */
    public function setDocumentCurrency(
        string $newDocumentCurrency
    ): self {
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
     * @param string $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     */
    public function setDocumentTaxCurrency(
        string $newDocumentTaxCurrency
    ): self {
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
     * @param bool $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Only to be used in the case of a test calculation, with newDocumentIsCopy = true
     */
    public function setDocumentIsCopy(
        bool $newDocumentIsCopy
    ): self {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getCopyIndicatorWithCreate()
            ->setIndicator($newDocumentIsCopy);

        return $this;
    }

    /**
     * @param bool $newDocumentIsTest __BT-X-3-00, From EXTENDED__ With newDocumentIsTest = true, the document is a copy
     */
    public function setDocumentIsTest(
        bool $newDocumentIsTest
    ): self {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContextWithCreate()
            ->getTestIndicatorWithCreate()
            ->setIndicator($newDocumentIsTest);

        return $this;
    }

    /**
     * @param string $newContent     __BT-22, From BASIC WL__ A free text containing unstructured information that is relevant to the invoice as a whole
     * @param string $newContentCode __BT-X-5, From EXTENDED__ A code to classify the content of the free text of the invoice
     * @param string $newSubjectCode __BT-21, From BASIC WL__ The qualification of the free text for the invoice from BT-22
     */
    public function setDocumentNote(
        string $newContent,
        string $newContentCode,
        string $newSubjectCode
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->clearIncludedNote();

        $this->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * @param string $newContent     __BT-22, From BASIC WL__ A free text containing unstructured information that is relevant to the invoice as a whole
     * @param string $newContentCode __BT-X-5, From EXTENDED__ A code to classify the content of the free text of the invoice
     * @param string $newSubjectCode __BT-21, From BASIC WL__ The qualification of the free text for the invoice from BT-22
     */
    public function addDocumentNote(
        string $newContent,
        string $newContentCode,
        string $newSubjectCode
    ): self {
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

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $billingPeriod = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getBillingSpecifiedPeriodWithCreate();

        if (!is_null($newStartDate)) {
            $billingPeriod
                ->getStartDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newStartDate->format("Ymd"))
                ->setFormat("102");
        }

        if (!is_null($newEndDate)) {
            $billingPeriod
                ->getEndDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newEndDate->format("Ymd"))
                ->setFormat("102");
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $billingPeriod
                ->getDescriptionWithCreate()
                ->setValue($newDescription);
        }

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return InvoiceSuiteBuilderContract
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $this->setDocumentBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    #endregion

    #region Document References

    /**
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $sellerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerOrderReferencedDocumentWithCreate();

        $sellerOrderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $sellerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
     * @return self
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $buyerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerOrderReferencedDocumentWithCreate();

        $buyerOrderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $buyerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
     * @return self
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ Seller's quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ Seller's quotation date
     * @return self
     */
    public function setDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $quotationReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getQuotationReferencedDocumentWithCreate();

        $quotationReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $quotationReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ Seller's quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ Seller's quotation date
     * @return self
     */
    public function addDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentSellerQuotationReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @param string|null $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $contractReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getContractReferencedDocumentWithCreate();

        $contractReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $contractReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        return $this->setDocumentContractReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
     * @return self
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->clearAdditionalReferencedDocument();

        $this->addDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription
        );

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
     * @return self
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $additionalReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->addToAdditionalReferencedDocumentWithCreate();

        $additionalReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        $additionalReference
            ->getTypeCodeWithCreate()
            ->setValue($newTypeCode);

        if (!is_null($newReferenceDate)) {
            $additionalReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceTypeCode)) {
            $additionalReference
                ->getReferenceTypeCodeWithCreate()
                ->setValue($newReferenceTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->getNameWithCreate()
                ->setValue($newDescription);
        }

        if (!is_null($newInvoiceSuiteAttachment)) {
            if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
                $additionalReference
                    ->getAttachmentBinaryObjectWithCreate()
                    ->setFilename($newInvoiceSuiteAttachment->getFilename())
                    ->setMimeCode($newInvoiceSuiteAttachment->getContentMimeType())
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }

            if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
                $additionalReference
                    ->getURIIDWithCreate()
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearInvoiceReferencedDocument();

        $this->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $invoiceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToInvoiceReferencedDocumentWithCreate();

        $invoiceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        $invoiceReference
            ->getTypeCodeWithCreate()
            ->setValue($newTypeCode);

        if (!is_null($newReferenceDate)) {
            $invoiceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     */
    public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $projectReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSpecifiedProcuringProjectWithCreate();

        $projectReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $projectReference
                ->getNameWithCreate()
                ->setValue($newName);
        };

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     */
    public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__ Order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__Order date
     * @return self
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->clearUltimateCustomerOrderReferencedDocument();

        $this->addDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__ Order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__Order date
     * @return self
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $orderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $orderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $orderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat('102');
        }

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $despatchAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getDespatchAdviceReferencedDocumentWithCreate();

        $despatchAdviceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $despatchAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        };

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $receivingAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getReceivingAdviceReferencedDocumentWithCreate();

        $receivingAdviceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $receivingAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        };

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $deliveryNoteReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getDeliveryNoteReferencedDocumentWithCreate();

        $deliveryNoteReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $deliveryNoteReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format("Ymd"))
                ->setFormat("102");
        };

        return $this;
    }

    /**
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @param DateTimeInterface|null $newDate __BT-72, From BASIC WL__ Actual delivery date
     * @return self
     */
    public function setAocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        if (is_null($newDate)) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getActualDeliverySupplyChainEventWithCreate()
            ->getOccurrenceDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDate->format("Ymd"))
            ->setFormat('102');

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @param string $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        string $newName
    ): self {
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
     * @param string $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearID();

        $this->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        string $newId
    ): self {
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
     * @param string $newGlobalId     __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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
     * @param string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
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
     * @param string $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-162, From BASIC WL__ This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-40, From MINIMUM__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-39, From BASIC WL__ Region or federal state in which the party's address is located.
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
    ): self {
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
     * @param string $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-30, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
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
     * @param string $newPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $this->addDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            $sellerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
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
     * @param string $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address.
     * @param string $newUri  __BT-34, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(
        string $newType,
        string $newUri
    ): self {
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
     * @param string $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentBuyerName(
        string $newName
    ): self {
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
     * @param string $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearID();

        $this->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        string $newId
    ): self {
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
     * @param string $newGlobalId     __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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

        $this->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId     __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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
     * @param string $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
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
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-55, From BASIC WL__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-54, From BASIC WL__ Region or federal state in which the party's address is located.
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
    ): self {
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
     * @param string $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-47, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string $newName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
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
     * @param string $newPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $this->addDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            $buyerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
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
     * @param string $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address.
     * @param string $newUri  __BT-49, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(
        string $newType,
        string $newUri
    ): self {
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
     * @param string $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        string $newName
    ): self {
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
     * @param string $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearID();

        $this->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        string $newId
    ): self {
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
     * @param string $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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

        $this->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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
     * @param string $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
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
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-69, From BASIC WL__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-68, From BASIC WL__ Region or federal state in which the party's address is located.
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
    ): self {
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
     * @param string $newType __BT-, From __ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-, From __ Identification number of the legal registration of the party.
     * @param string $newName __BT-, From __ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
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
     * @param string $newPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $this->addDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            $taxRepresentativeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
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
     * @param string $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-125, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(
        string $newType,
        string $newUri
    ): self {
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
     * @param string $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        string $newName
    ): self {
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
     * @param string $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearID();

        $this->addDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        string $newId
    ): self {
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
     * @param string $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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

        $this->addDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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
     * @param string $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-, From __ Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-, From __ Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
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
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-401, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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
     * @param string $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
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
     * @param string $newPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $this->addDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            $productEndUserTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
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
     * @param string $newType __BT-, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(
        string $newType,
        string $newUri
    ): self {
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

    #region Document Ship-To

    /**
     * @param string $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        string $newName
    ): self {
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
     * @param string $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearID();

        $this->addDocumentShipToId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        string $newId
    ): self {
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
     * @param string $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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

        $this->addDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
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
     * @param string $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
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
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-80, From BASIC WL__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-79, From BASIC WL__ Region or federal state in which the party's address is located.
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
    ): self {
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
     * @param string $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
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
     * @param string $newPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $this->addDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            $shipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
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
     * @param string $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-160-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(
        string $newType,
        string $newUri
    ): self {
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

    #region Document Ultimate Ship-To

    /**
     * @param string $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentUltimateShipToName(
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->clearID();

        $this->addDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-177, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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

        $ultimateShipToTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $ultimateShipToTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $ultimateShipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            ->getUltimateShipToTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $ultimateShipToTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $ultimateShipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $ultimateShipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $ultimateShipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $ultimateShipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $ultimateShipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-83-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(
        string $newType,
        string $newUri
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $ultimateShipToUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * @param string $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentShipFromName(
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->clearID();

        $this->addDocumentShipFromId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-196, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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

        $shipFromTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $shipFromTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $shipFromTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $shipFromTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $shipFromTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            ->getShipFromTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $shipFromTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $shipFromTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $shipFromTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $shipFromTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $shipFromTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $shipFromTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-199-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(
        string $newType,
        string $newUri
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $shipFromUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $shipFromUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $shipFromUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * @param string $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentInvoicerName(
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->clearID();

        $this->addDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-220, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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

        $invoicerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $invoicerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $invoicerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $invoicerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $invoicerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $invoicerTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $invoicerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $invoicerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $invoicerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $invoicerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $invoicerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-222, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(
        string $newType,
        string $newUri
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $invoicerUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $invoicerUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $invoicerUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * @param string $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered
     * @return self
     */
    public function setDocumentInvoiceeName(
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->clearID();

        $this->addDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-239, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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

        $invoiceeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string $newId   __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $invoiceeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $invoiceeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $invoiceeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $invoiceeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $invoiceeTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $invoiceeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $invoiceeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $invoiceeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $invoiceeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $invoiceeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-241, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(
        string $newType,
        string $newUri
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $invoiceeUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $invoiceeUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $invoiceeUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * @param string $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * @param string $newId __BT-60, From BASIC WL__ >An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->clearID();

        $this->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * @param string $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        string $newId
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-60-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->clearGlobalID();

        $this->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newGlobalId __BT-60-0, From BASIC WL__ A global identifier of the party.
     * @param string $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-257, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @param string $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string $newTaxRegistrationId   __BT-X-257, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
    }

    /**
     * @param string $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string $newPostcode     __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string $newCity         __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string $newCountryId    __BT-X-254, From EXTENDED__ Country in which the party's address is located.
     * @param string $newSubDivision  __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located.
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
    ): self {
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

        $payeeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-61-1, From BASIC WL__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN,* 0060 : DUNS, 0177 : ODETTE
     * @param string $newId   __BT-61, From BASIC WL__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param string $newName __BT-X-243, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $payeeTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $payeeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $payeeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            $payeeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-246, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-247, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->clearDefinedTradeContact();

        $this->addDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @param string $newPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point.
     * @param string $newPhoneNumber    __BT-X-246, From EXTENDED__ Telephone number for the contact point.
     * @param string $newFaxNumber      __BT-X-247, From EXTENDED__ Fax number of the contact point.
     * @param string $newEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
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

        $payeeTradeContact = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName])) {
            $payeeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDepartmentName])) {
            $payeeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPhoneNumber])) {
            $payeeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newFaxNumber])) {
            $payeeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newEmailAddress])) {
            $payeeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * @param string $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address.
     * @param string $newUri  __BT-X-256, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(
        string $newType,
        string $newUri
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $payeeUniversalCommunication = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $payeeUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $payeeUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        return $this;
    }

    #endregion

    #region Document Payment

    /**
     * @param string|null $newTypeCode __BT-81, From BASIC WL__ Expected or used means of payment expressed as a code
     * @param string|null $newName __BT-82, From EN 16931__ Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
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
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearSpecifiedTradeSettlementPaymentMeans();

        $this->addDocumentPaymentMean(
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
     * @param string|null $newTypeCode __BT-81, From BASIC WL__ Expected or used means of payment expressed as a code
     * @param string|null $newName __BT-82, From EN 16931__ Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
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
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $paymentMean = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $paymentMean->getTypeCodeWithCreate()->setValue($newTypeCode);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $paymentMean->getInformationWithCreate()->setValue($newName);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId, $newFinancialCardHolder])) {
            $paymentMean
                ->getApplicableTradeSettlementFinancialCardWithCreate()
                ->getIDWithCreate()
                ->setValue($newFinancialCardId);
            $paymentMean
                ->getApplicableTradeSettlementFinancialCardWithCreate()
                ->getCardholderNameWithCreate()
                ->setValue($newFinancialCardHolder);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban])) {
            $paymentMean
                ->getPayerPartyDebtorFinancialAccountWithCreate()
                ->getIBANIDWithCreate()
                ->setValue($newBuyerIban);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban, $newPayeeAccountName, $newPayeeProprietaryId, $newPayeeBic])) {
            $paymentMean
                ->getPayeePartyCreditorFinancialAccountWithCreate()
                ->getIBANIDWithCreate()
                ->setValue($newPayeeIban);

            $paymentMean
                ->getPayeePartyCreditorFinancialAccountWithCreate()
                ->getAccountNameWithCreate()
                ->setValue($newPayeeAccountName);

            $paymentMean
                ->getPayeePartyCreditorFinancialAccountWithCreate()
                ->getProprietaryIDWithCreate()
                ->setValue($newPayeeProprietaryId);

            $paymentMean
                ->getPayeeSpecifiedCreditorFinancialInstitutionWithCreate()
                ->getBICIDWithCreate()
                ->setValue($newPayeeBic);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPaymentReference])) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransactionWithCreate()
                ->getApplicableHeaderTradeSettlementWithCreate()
                ->getPaymentReferenceWithCreate()
                ->setValue($newPaymentReference);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newMandate])) {
            $paymentTerms = $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransactionWithCreate()
                ->getApplicableHeaderTradeSettlementWithCreate()
                ->getSpecifiedTradePaymentTerms() ?? [];

            $paymentTerms = array_filter($paymentTerms, function (TradePaymentTermsType $paymentTerm) {
                return strcasecmp($paymentTerm->getDescription()?->getValue() ?? "", "Direct Debit") !== 0;
            });

            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransactionWithCreate()
                ->getApplicableHeaderTradeSettlementWithCreate()
                ->setSpecifiedTradePaymentTerms($paymentTerms);

            $paymentTerm = $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransactionWithCreate()
                ->getApplicableHeaderTradeSettlementWithCreate()
                ->addToSpecifiedTradePaymentTermsWithCreate();

            $paymentTerm->getDescriptionWithCreate()->setValue("Direct Debit");
            $paymentTerm->getDirectDebitMandateIDWithCreate()->setValue($newMandate);
        }

        return $this;
    }

    /**
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return self
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId])) {
            return $this;
        }

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return self
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * @param string|null $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return self
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getCreditorReferenceIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * @param string|null $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return self
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentPaymentCreditorReferenceID($newId);

        return $this;
    }

    /**
     * @param string|null $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate __BT-9, From BASIC WL__ Date by which payment is due
     * @return self
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearSpecifiedTradePaymentTerms();

        $this->addDocumentPaymentTerm(
            $newDescription,
            $newDueDate
        );

        return $this;
    }

    /**
     * @param string|null $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate __BT-9, From BASIC WL__ Date by which payment is due
     * @return self
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $paymentTerm = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradePaymentTermsWithCreate();

        $paymentTerm->getDescriptionWithCreate()->setValue($newDescription);

        if (!is_null($newDueDate)) {
            $paymentTerm
                ->getDueDateDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newDueDate->format("Ymd"))
                ->setFormat("102");
        }

        return $this;
    }

    #endregion

    #region Document Tax

    /**
     * @param string|null $newTaxCategory __BT-118, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-118-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newBasisAmount __BT-116, From BASIC WL__ Tax base amount
     * @param float|null $newTaxAmount __BT-117, From BASIC WL__ Tax total amount
     * @param float|null $newTaxPercent __BT-119, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-121, From BASIC WL__Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate __BT-7-00, From EN 16931__ Date on which tax is due
     * @param string|null $newTaxDueCode __BT-8, From BASIC WL__ Code for the date on which tax is due
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearApplicableTradeTax();

        $this->addDocumentTax(
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

    /**
     * @param string|null $newTaxCategory __BT-118, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-118-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newBasisAmount __BT-116, From BASIC WL__ Tax base amount
     * @param float|null $newTaxAmount __BT-117, From BASIC WL__ Tax total amount
     * @param float|null $newTaxPercent __BT-119, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-121, From BASIC WL__Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate __BT-7-00, From EN 16931__ Date on which tax is due
     * @param string|null $newTaxDueCode __BT-8, From BASIC WL__ Code for the date on which tax is due
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $applicableTradeTax = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToApplicableTradeTaxWithCreate();

        $applicableTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $applicableTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $applicableTradeTax->getBasisAmountWithCreate()->setValue($newBasisAmount);
        $applicableTradeTax->getCalculatedAmountWithCreate()->setValue($newTaxAmount);

        if (!is_null($newTaxPercent)) {
            $applicableTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);
        }

        if (!is_null($newExemptionReason)) {
            $applicableTradeTax->getExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if (!is_null($newExemptionReasonCode)) {
            $applicableTradeTax->getExemptionReasonCodeWithCreate()->setValue($newExemptionReasonCode);
        }

        if (!is_null($newTaxDueDate)) {
            $applicableTradeTax
                ->getTaxPointDateWithCreate()
                ->getDateStringWithCreate()
                ->setValue($newTaxDueDate->format("Ymd"))
                ->setFormat("102");
        }

        if (!is_null($newTaxDueCode)) {
            $applicableTradeTax->getDueDateTypeCodeWithCreate()->setValue($newTaxDueCode);
        }

        return $this;
    }

    #endregion

    #region Document Allowances/Charges

    /**
     * @param boolean|null $newChargeIndicator __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory __BT-95/BT-102, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-95-0/BT-102-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newTaxPercent __BT-96/BT-103, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason __BT-98/BT-105, From BASIC WL__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-97/BT-104, From BASIC WL__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-94/BT-101, From BASIC WL__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearSpecifiedTradeAllowanceCharge();

        $this->addDocumentAllowanceCharge(
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
     * @param boolean|null $newChargeIndicator __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory __BT-95/BT-102, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-95-0/BT-102-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newTaxPercent __BT-96/BT-103, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason __BT-98/BT-105, From BASIC WL__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-97/BT-104, From BASIC WL__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-94/BT-101, From BASIC WL__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $specifiedTradeAllowanceCharge = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradeAllowanceChargeWithCreate();

        $specifiedTradeAllowanceCharge
            ->getChargeIndicatorWithCreate()
            ->setIndicator($newChargeIndicator ?? false);

        $specifiedTradeAllowanceCharge
            ->getActualAmountWithCreate()
            ->setValue($newAllowanceChargeAmount);

        if (!is_null($newAllowanceChargeBaseAmount)) {
            $specifiedTradeAllowanceCharge
                ->getBasisAmountWithCreate()
                ->setValue($newAllowanceChargeBaseAmount);
        }

        if (!is_null($newAllowanceChargePercent)) {
            $specifiedTradeAllowanceCharge
                ->getCalculationPercentWithCreate()
                ->setValue($newAllowanceChargePercent);
        }

        if (!is_null($newAllowanceChargeReason)) {
            $specifiedTradeAllowanceCharge
                ->getReasonWithCreate()
                ->setValue($newAllowanceChargeReason);
        }

        if (!is_null($newAllowanceChargeReasonCode)) {
            $specifiedTradeAllowanceCharge
                ->getReasonCodeWithCreate()
                ->setValue($newAllowanceChargeReasonCode);
        }

        $categoryTradeTax = $specifiedTradeAllowanceCharge->getCategoryTradeTaxWithCreate();

        $categoryTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $categoryTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);

        if (!is_null($newTaxPercent)) {
            $categoryTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);
        }

        return $this;
    }

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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->clearSpecifiedLogisticsServiceCharge();

        $this->addDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        return $this;
    }

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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])
        ) {
            return $this;
        }

        $logisticServiceCharge = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedLogisticsServiceChargeWithCreate();

        $logisticServiceCharge->getDescriptionWithCreate()->setValue($newDescription);
        $logisticServiceCharge->getAppliedAmountWithCreate()->setValue($newChargeAmount);
        $logisticServiceCharge->clearAppliedTradeTax();

        $appliedTradeTax = $logisticServiceCharge->addToAppliedTradeTaxWithCreate();
        $appliedTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $appliedTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $appliedTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);

        return $this;
    }

    #endregion
}
