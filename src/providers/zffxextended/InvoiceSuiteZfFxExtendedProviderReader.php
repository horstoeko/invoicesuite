<?php

namespace horstoeko\invoicesuite\providers\zffxextended;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\models\zffxextended\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;

class InvoiceSuiteZfFxExtendedProviderReader extends InvoiceSuiteAbstractFormatProviderReader
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

    #region Document Generals

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType __BT-3, From MINIMUM__ The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription __BT-X-2, From EXTENDED__ The documenttype as free text
     * @return self
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $newDocumentDescription = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @return self
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $newDocumentLanguage = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getLanguageID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate __BT-2, From MINIMUM__ Date of the document. The date when the document was issued by the seller
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $newDocumentDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate __BT-X-6-000, From EXTENDED__ Contractual due date of the document
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self {
        $newCompleteDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getEffectiveSpecifiedPeriod()?->getCompleteDateTime()?->getDateTimeString()?->getValue() ?? "",
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getEffectiveSpecifiedPeriod()?->getCompleteDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self {
        $newDocumentCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self {
        $newDocumentTaxCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getTaxCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Indicates that the document is a copy
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy = null
    ): self {
        $newDocumentIsCopy = $this->getCrossIndustryRootObject()->getExchangedDocument()
            ?->getCopyIndicator()
            ?->getIndicator() ?? false;

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest __BT-X-3-00, From EXTENDED__ Indicates that the document is a test
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self {
        $newDocumentIsTest = $this->getCrossIndustryRootObject()->getExchangedDocumentContext()
            ?->getTestIndicator()
            ?->getIndicator() ?? false;

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Get a note to the document.
     *
     * @param string|null $newContent __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return self
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self {
        $documentNotes = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []);
        $documentNote = $documentNotes[InvoiceSuitePointerUtils::getValue('documentnote')];

        $newContent = $documentNote->getContent()?->getValue() ?? "";
        $newContentCode = $documentNote->getContentCode()?->getValue() ?? "";
        $newSubjectCode = $documentNote->getSubjectCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\SpecifiedPeriodType>
         */
        $billingPeriods = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\SpecifiedPeriodType
         */
        $billingPeriod = $billingPeriods[InvoiceSuitePointerUtils::getValue('documentbillingperiod')];

        $newStartDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $billingPeriod->getStartDateTime()?->getDateTimeString()->getValue(),
            $billingPeriod->getStartDateTime()?->getDateTimeString()->getFormat(),
        );
        $newEndDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $billingPeriod->getEndDateTime()?->getDateTimeString()->getValue(),
            $billingPeriod->getEndDateTime()?->getDateTimeString()->getFormat(),
        );
        $newDescription = $billingPeriod->getDescription()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return boolean
     */
    public function firstDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Go to the next posting reference
     *
     * @return boolean
     */
    public function nextDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Get a posting reference
     *
     * @param string|null $newType __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAccountingAccountType>
         */
        $documentPostingReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAccountingAccountType
         */
        $documentPostingReference = $documentPostingReferences[InvoiceSuitePointerUtils::getValue('documentpostingreference')];

        $newType = $documentPostingReference->getTypeCode()?->getValue() ?? "";
        $newAccountId = $documentPostingReference->getID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerOrderReferencedDocument() ?? []
            ),
            'documentsellerorderreference'
        );
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerOrderReferencedDocument() ?? []
            ),
            'documentsellerorderreference'
        );
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentSellerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerOrderReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentSellerOrderReference = $documentSellerOrderReferences[InvoiceSuitePointerUtils::getValue('documentsellerorderreference')];

        $newReferenceNumber = $documentSellerOrderReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentSellerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentSellerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentBuyerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentBuyerOrderReference = $documentBuyerOrderReferences[InvoiceSuitePointerUtils::getValue('documentbuyerorderreference')];

        $newReferenceNumber = $documentBuyerOrderReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentBuyerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentBuyerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getQuotationReferencedDocument() ?? []
            ),
            'documentquotationreference'
        );
    }

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getQuotationReferencedDocument() ?? []
            ),
            'documentquotationreference'
        );
    }

    /**
     * Get the associated quotation
     *
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ Quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ Quotation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentQuotationReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getQuotationReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentQuotationReference = $documentQuotationReferences[InvoiceSuitePointerUtils::getValue('documentquotationreference')];

        $newReferenceNumber = $documentQuotationReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentQuotationReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentQuotationReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return boolean
     */
    public function firstDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Go to the next associated contract
     *
     * @return boolean
     */
    public function nextDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Get the associated contract
     *
     * @param string $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentContractReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentContractReference = $documentContractReferences[InvoiceSuitePointerUtils::getValue('documentcontractreference')];

        $newReferenceNumber = $documentContractReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentContractReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentContractReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return boolean
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getAdditionalReferencedDocument() ?? []
            ),
            'documentadditionalreference'
        );
    }

    /**
     * Go to the next additional associated document
     *
     * @return boolean
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getAdditionalReferencedDocument() ?? []
            ),
            'documentadditionalreference'
        );
    }

    /**
     * Get an additional associated document
     *
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentAdditionalReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getAdditionalReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentAdditionalReference = $documentAdditionalReferences[InvoiceSuitePointerUtils::getValue('documentadditionalreference')];

        $newReferenceNumber = $documentAdditionalReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentAdditionalReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentAdditionalReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );
        $newTypeCode = $documentAdditionalReference->getTypeCode()?->getValue() ?? "";
        $newReferenceTypeCode = $documentAdditionalReference->getReferenceTypeCode()?->getValue() ?? "";
        $newDescription = $documentAdditionalReference->getName()?->getValue() ?? "";

        if ($documentAdditionalReference->getAttachmentBinaryObject()) {
            $newInvoiceSuiteAttachment = InvoiceSuiteAttachment::fromBase64String(
                $documentAdditionalReference->getAttachmentBinaryObject()->getValue(),
                $documentAdditionalReference->getAttachmentBinaryObject()->getFilename()
            );
        }

        if ($documentAdditionalReference->getURIID()) {
            $newInvoiceSuiteAttachment = InvoiceSuiteAttachment::fromUrl($documentAdditionalReference->getURIID()->getValue() ?? "");
        }

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function firstDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentInvoiceReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentInvoiceReference = $documentInvoiceReferences[InvoiceSuitePointerUtils::getValue('documentinvoicereference')];

        $newReferenceNumber = $documentInvoiceReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentInvoiceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentInvoiceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );
        $newTypeCode = $documentInvoiceReference->getTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return boolean
     */
    public function firstDocumentProjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSpecifiedProcuringProject() ?? []
            ),
            'documentprojectreference'
        );
    }

    /**
     * Go to the next additional project reference
     *
     * @return boolean
     */
    public function nextDocumentProjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSpecifiedProcuringProject() ?? []
            ),
            'documentprojectreference'
        );
    }

    /**
     * Get an additional project reference
     *
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newName
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ProcuringProjectType>
         */
        $documentProjectReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSpecifiedProcuringProject() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ProcuringProjectType
         */
        $documentProjectReference = $documentProjectReferences[InvoiceSuitePointerUtils::getValue('documentprojectreference')];

        $newReferenceNumber = $documentProjectReference->getID()?->getValue() ?? "";
        $newName = $documentProjectReference->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getUltimateCustomerOrderReferencedDocument() ?? []
            ),
            'documentultimatecustomerorderreference'
        );
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return boolean
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getUltimateCustomerOrderReferencedDocument() ?? []
            ),
            'documentultimatecustomerorderreference'
        );
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentUltimateCustomerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getUltimateCustomerOrderReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentUltimateCustomerOrderReference = $documentUltimateCustomerOrderReferences[InvoiceSuitePointerUtils::getValue('documentultimatecustomerorderreference')];

        $newReferenceNumber = $documentUltimateCustomerOrderReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentUltimateCustomerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue(),
            $documentUltimateCustomerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return boolean
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return boolean
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentDespatchAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentDespatchAdviceReference = $documentDespatchAdviceReferences[InvoiceSuitePointerUtils::getValue('documentdespatchadvicereference')];

        $newReferenceNumber = $documentDespatchAdviceReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentDespatchAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue(),
            $documentDespatchAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Go to the first additional Receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getReceivingAdviceReferencedDocument() ?? []
            ),
            'documentreceivingadvicereference'
        );
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return boolean
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getReceivingAdviceReferencedDocument() ?? []
            ),
            'documentreceivingadvicereference'
        );
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentReceivingAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getReceivingAdviceReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentReceivingAdviceReference = $documentReceivingAdviceReferences[InvoiceSuitePointerUtils::getValue('documentreceivingadvicereference')];

        $newReferenceNumber = $documentReceivingAdviceReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentReceivingAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue(),
            $documentReceivingAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDeliveryNoteReferencedDocument() ?? []
            ),
            'documentdeliverynotereference'
        );
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDeliveryNoteReferencedDocument() ?? []
            ),
            'documentdeliverynotereference'
        );
    }

    /**
     * Get an additional delivery note reference
     *
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType>
         */
        $documentDeliveryNoteReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDeliveryNoteReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
         */
        $documentDeliveryNoteReference = $documentDeliveryNoteReferences[InvoiceSuitePointerUtils::getValue('documentdeliverynotereference')];

        $newReferenceNumber = $documentDeliveryNoteReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentDeliveryNoteReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue(),
            $documentDeliveryNoteReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param DateTimeInterface|null $newDate __BT-72, From BASIC WL__ Actual delivery date
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $newDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getActualDeliverySupplyChainEvent()?->getOccurrenceDateTime()?->getDateTimeString()?->getValue(),
            $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getActualDeliverySupplyChainEvent()?->getOccurrenceDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * Get the name of the seller/supplier party
     *
     * @param string|null $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []
            ),
            'documentsellerid'
        );
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []
            ),
            'documentsellerid'
        );
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param string|null $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentSellerIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentSellerId = $documentSellerIds[InvoiceSuitePointerUtils::getValue('documentsellerid')];

        $newId = $documentSellerId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []
            ),
            'documentsellerglobalid'
        );
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []
            ),
            'documentsellerglobalid'
        );
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentSellerGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentSellerGlobalId = $documentSellerGlobalIds[InvoiceSuitePointerUtils::getValue('documentsellerglobalid')];

        $newGlobalId = $documentSellerGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentSellerGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentSellerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentSellerTaxRegistration = $documentSellerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentsellertaxregistration')];

        $newTaxRegistrationType = $documentSellerTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentSellerTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-40, From MINIMUM__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-39, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
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
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentSellerAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentSellerAddress = $documentSellerAddresses[InvoiceSuitePointerUtils::getValue('documentselleraddress')];

        $newAddressLine1 = $documentSellerAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentSellerAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentSellerAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentSellerAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentSellerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentSellerAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentSellerAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param string|null $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-30, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentSellerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentSellerLegalOrganisation = $documentSellerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentsellerlegalorganisation')];

        $newType = $documentSellerLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentSellerLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentSellerLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentsellercontact'
        );
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentsellercontact'
        );
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentSellerContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentSellerContact = $documentSellerContacts[InvoiceSuitePointerUtils::getValue('documentsellercontact')];

        $newPersonName = $documentSellerContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentSellerContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentSellerContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentSellerContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentSellerContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param string|null $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-34, From BASIC WL__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentSellerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentSellerElectronicCommunication = $documentSellerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentsellerecommunication')];

        $newType = $documentSellerElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentSellerElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param string|null $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []
            ),
            'documentbuyerid'
        );
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []
            ),
            'documentbuyerid'
        );
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param string|null $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentBuyerIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentBuyerId = $documentBuyerIds[InvoiceSuitePointerUtils::getValue('documentbuyerid')];

        $newId = $documentBuyerId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []
            ),
            'documentbuyerglobalid'
        );
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []
            ),
            'documentbuyerglobalid'
        );
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentBuyerGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentBuyerGlobalId = $documentBuyerGlobalIds[InvoiceSuitePointerUtils::getValue('documentbuyerglobalid')];

        $newGlobalId = $documentBuyerGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentBuyerGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentBuyerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentBuyerTaxRegistration = $documentBuyerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentbuyertaxregistration')];

        $newTaxRegistrationType = $documentBuyerTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentBuyerTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param string|null $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-55, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-54, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentBuyerAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentBuyerAddress = $documentBuyerAddresses[InvoiceSuitePointerUtils::getValue('documentbuyeraddress')];

        $newAddressLine1 = $documentBuyerAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentBuyerAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentBuyerAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentBuyerAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentBuyerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentBuyerAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentBuyerAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param string|null $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-47, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentBuyerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentBuyerLegalOrganisation = $documentBuyerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentbuyerlegalorganisation')];

        $newType = $documentBuyerLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentBuyerLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentBuyerLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentbuyercontact'
        );
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentbuyercontact'
        );
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentBuyerContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentBuyerContact = $documentBuyerContacts[InvoiceSuitePointerUtils::getValue('documentbuyercontact')];

        $newPersonName = $documentBuyerContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentBuyerContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentBuyerContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentBuyerContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentBuyerContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param string|null $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-49, From BASIC WL__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentBuyerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentBuyerElectronicCommunication = $documentBuyerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentbuyerecommunication')];

        $newType = $documentBuyerElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentBuyerElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param string|null $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []
            ),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []
            ),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param string|null $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentTaxRepresentativeIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentTaxRepresentativeId = $documentTaxRepresentativeIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeid')];

        $newId = $documentTaxRepresentativeId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []
            ),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []
            ),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentTaxRepresentativeGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentTaxRepresentativeGlobalId = $documentTaxRepresentativeGlobalIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeglobalid')];

        $newGlobalId = $documentTaxRepresentativeGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentTaxRepresentativeGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentTaxRepresentativeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentTaxRepresentativeTaxRegistration = $documentTaxRepresentativeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativetaxregistration')];

        $newTaxRegistrationType = $documentTaxRepresentativeTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentTaxRepresentativeTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Go to the next address of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Set the address of the tax representative party
     *
     * @param string|null $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-69, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-68, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentTaxRepresentativeAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentTaxRepresentativeAddress = $documentTaxRepresentativeAddresses[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeaddress')];

        $newAddressLine1 = $documentTaxRepresentativeAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentTaxRepresentativeAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentTaxRepresentativeAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentTaxRepresentativeAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentTaxRepresentativeAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentTaxRepresentativeAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentTaxRepresentativeAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param string|null $newType __BT-, From __ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-, From __ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-, From __ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentTaxRepresentativeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentTaxRepresentativeLegalOrganisation = $documentTaxRepresentativeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativelegalorganisation')];

        $newType = $documentTaxRepresentativeLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentTaxRepresentativeLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentTaxRepresentativeLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documenttaxrepresentativecontact'
        );
    }

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documenttaxrepresentativecontact'
        );
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param string|null $newPersonName __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentTaxRepresentativeContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentTaxRepresentativeContact = $documentTaxRepresentativeContacts[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativecontact')];

        $newPersonName = $documentTaxRepresentativeContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentTaxRepresentativeContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentTaxRepresentativeContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentTaxRepresentativeContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentTaxRepresentativeContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param string|null $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-125, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentTaxRepresentativeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentTaxRepresentativeElectronicCommunication = $documentTaxRepresentativeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeecommunication')];

        $newType = $documentTaxRepresentativeElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentTaxRepresentativeElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param string|null $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getID() ?? []
            ),
            'documentproductenduserid'
        );
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getID() ?? []
            ),
            'documentproductenduserid'
        );
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param string|null $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentProductEndUserIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentProductEndUserId = $documentProductEndUserIds[InvoiceSuitePointerUtils::getValue('documentproductenduserid')];

        $newId = $documentProductEndUserId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getGlobalID() ?? []
            ),
            'documentproductenduserglobalid'
        );
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getGlobalID() ?? []
            ),
            'documentproductenduserglobalid'
        );
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentProductEndUserGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentProductEndUserGlobalId = $documentProductEndUserGlobalIds[InvoiceSuitePointerUtils::getValue('documentproductenduserglobalid')];

        $newGlobalId = $documentProductEndUserGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentProductEndUserGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentproductendusertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentproductendusertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-, From __ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentProductEndUserTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentProductEndUserTaxRegistration = $documentProductEndUserTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentproductendusertaxregistration')];

        $newTaxRegistrationType = $documentProductEndUserTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentProductEndUserTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentproductenduseraddress'
        );
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentproductenduseraddress'
        );
    }

    /**
     * Set the address of the product end-user party
     *
     * @param string|null $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-401, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentProductEndUserAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentProductEndUserAddress = $documentProductEndUserAddresses[InvoiceSuitePointerUtils::getValue('documentproductenduseraddress')];

        $newAddressLine1 = $documentProductEndUserAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentProductEndUserAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentProductEndUserAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentProductEndUserAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentProductEndUserAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentProductEndUserAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentProductEndUserAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentproductenduserlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentproductenduserlegalorganisation'
        );
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param string|null $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentProductEndUserLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentProductEndUserLegalOrganisation = $documentProductEndUserLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentproductenduserlegalorganisation')];

        $newType = $documentProductEndUserLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentProductEndUserLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentProductEndUserLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentproductendusercontact'
        );
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentproductendusercontact'
        );
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param string|null $newPersonName __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentProductEndUserContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentProductEndUserContact = $documentProductEndUserContacts[InvoiceSuitePointerUtils::getValue('documentproductendusercontact')];

        $newPersonName = $documentProductEndUserContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentProductEndUserContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentProductEndUserContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentProductEndUserContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentProductEndUserContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentproductenduserecommunication'
        );
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentproductenduserecommunication'
        );
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param string|null $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-143, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentProductEndUserElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getProductEndUserTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentProductEndUserElectronicCommunication = $documentProductEndUserElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentproductenduserecommunication')];

        $newType = $documentProductEndUserElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentProductEndUserElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * Get the name of the Ship-To party
     *
     * @param string|null $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []
            ),
            'documentshiptoid'
        );
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []
            ),
            'documentshiptoid'
        );
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentShipToIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentShipToId = $documentShipToIds[InvoiceSuitePointerUtils::getValue('documentshiptoid')];

        $newId = $documentShipToId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentshiptoglobalid'
        );
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentshiptoglobalid'
        );
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentShipToGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentShipToGlobalId = $documentShipToGlobalIds[InvoiceSuitePointerUtils::getValue('documentshiptoglobalid')];

        $newGlobalId = $documentShipToGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentShipToGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentShipToTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentShipToTaxRegistration = $documentShipToTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentshiptotaxregistration')];

        $newTaxRegistrationType = $documentShipToTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentShipToTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-80, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-79, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentShipToAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentShipToAddress = $documentShipToAddresses[InvoiceSuitePointerUtils::getValue('documentshiptoaddress')];

        $newAddressLine1 = $documentShipToAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentShipToAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentShipToAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentShipToAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentShipToAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentShipToAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentShipToAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshiptolegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshiptolegalorganisation'
        );
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentShipToLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentShipToLegalOrganisation = $documentShipToLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentshiptolegalorganisation')];

        $newType = $documentShipToLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentShipToLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentShipToLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentshiptocontact'
        );
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentshiptocontact'
        );
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentShipToContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentShipToContact = $documentShipToContacts[InvoiceSuitePointerUtils::getValue('documentshiptocontact')];

        $newPersonName = $documentShipToContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentShipToContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentShipToContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentShipToContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentShipToContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshiptoecommunication'
        );
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshiptoecommunication'
        );
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-160-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentShipToElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentShipToElectronicCommunication = $documentShipToElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentshiptoecommunication')];

        $newType = $documentShipToElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentShipToElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getID() ?? []
            ),
            'documentultimateshiptoid'
        );
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getID() ?? []
            ),
            'documentultimateshiptoid'
        );
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentUltimateShipToIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentUltimateShipToId = $documentUltimateShipToIds[InvoiceSuitePointerUtils::getValue('documentultimateshiptoid')];

        $newId = $documentUltimateShipToId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentultimateshiptoglobalid'
        );
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentultimateshiptoglobalid'
        );
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentUltimateShipToGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentUltimateShipToGlobalId = $documentUltimateShipToGlobalIds[InvoiceSuitePointerUtils::getValue('documentultimateshiptoglobalid')];

        $newGlobalId = $documentUltimateShipToGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentUltimateShipToGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentultimateshiptotaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentultimateshiptotaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentUltimateShipToTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentUltimateShipToTaxRegistration = $documentUltimateShipToTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentultimateshiptotaxregistration')];

        $newTaxRegistrationType = $documentUltimateShipToTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentUltimateShipToTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentultimateshiptoaddress'
        );
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentultimateshiptoaddress'
        );
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-177, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentUltimateShipToAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentUltimateShipToAddress = $documentUltimateShipToAddresses[InvoiceSuitePointerUtils::getValue('documentultimateshiptoaddress')];

        $newAddressLine1 = $documentUltimateShipToAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentUltimateShipToAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentUltimateShipToAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentUltimateShipToAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentUltimateShipToAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentUltimateShipToAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentUltimateShipToAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentultimateshiptolegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentultimateshiptolegalorganisation'
        );
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentUltimateShipToLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentUltimateShipToLegalOrganisation = $documentUltimateShipToLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentultimateshiptolegalorganisation')];

        $newType = $documentUltimateShipToLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentUltimateShipToLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentUltimateShipToLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentultimateshiptocontact'
        );
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentultimateshiptocontact'
        );
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentUltimateShipToContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentUltimateShipToContact = $documentUltimateShipToContacts[InvoiceSuitePointerUtils::getValue('documentultimateshiptocontact')];

        $newPersonName = $documentUltimateShipToContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentUltimateShipToContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentUltimateShipToContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentUltimateShipToContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentUltimateShipToContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentultimateshiptoecommunication'
        );
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentultimateshiptoecommunication'
        );
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-83-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentUltimateShipToElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getUltimateShipToTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentUltimateShipToElectronicCommunication = $documentUltimateShipToElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentultimateshiptoecommunication')];

        $newType = $documentUltimateShipToElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentUltimateShipToElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param string|null $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getID() ?? []
            ),
            'documentshipfromid'
        );
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getID() ?? []
            ),
            'documentshipfromid'
        );
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param string|null $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentShipFromIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentShipFromId = $documentShipFromIds[InvoiceSuitePointerUtils::getValue('documentshipfromid')];

        $newId = $documentShipFromId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getGlobalID() ?? []
            ),
            'documentshipfromglobalid'
        );
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getGlobalID() ?? []
            ),
            'documentshipfromglobalid'
        );
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentShipFromGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentShipFromGlobalId = $documentShipFromGlobalIds[InvoiceSuitePointerUtils::getValue('documentshipfromglobalid')];

        $newGlobalId = $documentShipFromGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentShipFromGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshipfromtaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshipfromtaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentShipFromTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentShipFromTaxRegistration = $documentShipFromTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentshipfromtaxregistration')];

        $newTaxRegistrationType = $documentShipFromTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentShipFromTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshipfromaddress'
        );
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshipfromaddress'
        );
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param string|null $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-196, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentShipFromAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentShipFromAddress = $documentShipFromAddresses[InvoiceSuitePointerUtils::getValue('documentshipfromaddress')];

        $newAddressLine1 = $documentShipFromAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentShipFromAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentShipFromAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentShipFromAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentShipFromAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentShipFromAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentShipFromAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshipfromlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshipfromlegalorganisation'
        );
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param string|null $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentShipFromLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentShipFromLegalOrganisation = $documentShipFromLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentshipfromlegalorganisation')];

        $newType = $documentShipFromLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentShipFromLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentShipFromLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentshipfromcontact'
        );
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentshipfromcontact'
        );
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param string|null $newPersonName __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentShipFromContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentShipFromContact = $documentShipFromContacts[InvoiceSuitePointerUtils::getValue('documentshipfromcontact')];

        $newPersonName = $documentShipFromContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentShipFromContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentShipFromContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentShipFromContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentShipFromContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshipfromecommunication'
        );
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshipfromecommunication'
        );
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param string|null $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-199-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentShipFromElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipFromTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentShipFromElectronicCommunication = $documentShipFromElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentshipfromecommunication')];

        $newType = $documentShipFromElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentShipFromElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param string|null $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getID() ?? []
            ),
            'documentinvoicerid'
        );
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getID() ?? []
            ),
            'documentinvoicerid'
        );
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param string|null $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentInvoicerIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentInvoicerId = $documentInvoicerIds[InvoiceSuitePointerUtils::getValue('documentinvoicerid')];

        $newId = $documentInvoicerId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getGlobalID() ?? []
            ),
            'documentinvoicerglobalid'
        );
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getGlobalID() ?? []
            ),
            'documentinvoicerglobalid'
        );
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentInvoicerGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentInvoicerGlobalId = $documentInvoicerGlobalIds[InvoiceSuitePointerUtils::getValue('documentinvoicerglobalid')];

        $newGlobalId = $documentInvoicerGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentInvoicerGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentinvoicertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentinvoicertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentInvoicerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentInvoicerTaxRegistration = $documentInvoicerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentinvoicertaxregistration')];

        $newTaxRegistrationType = $documentInvoicerTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentInvoicerTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentinvoiceraddress'
        );
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentinvoiceraddress'
        );
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param string|null $newAddressLine1 __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-220, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentInvoicerAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentInvoicerAddress = $documentInvoicerAddresses[InvoiceSuitePointerUtils::getValue('documentinvoiceraddress')];

        $newAddressLine1 = $documentInvoicerAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentInvoicerAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentInvoicerAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentInvoicerAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentInvoicerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentInvoicerAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentInvoicerAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentinvoicerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentinvoicerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param string|null $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentInvoicerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentInvoicerLegalOrganisation = $documentInvoicerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentinvoicerlegalorganisation')];

        $newType = $documentInvoicerLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentInvoicerLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentInvoicerLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentinvoicercontact'
        );
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentinvoicercontact'
        );
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param string|null $newPersonName __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentInvoicerContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentInvoicerContact = $documentInvoicerContacts[InvoiceSuitePointerUtils::getValue('documentinvoicercontact')];

        $newPersonName = $documentInvoicerContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentInvoicerContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentInvoicerContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentInvoicerContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentInvoicerContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentinvoicerecommunication'
        );
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentinvoicerecommunication'
        );
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param string|null $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-222, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentInvoicerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoicerTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentInvoicerElectronicCommunication = $documentInvoicerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentinvoicerecommunication')];

        $newType = $documentInvoicerElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentInvoicerElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param string|null $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getID() ?? []
            ),
            'documentinvoiceeid'
        );
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getID() ?? []
            ),
            'documentinvoiceeid'
        );
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param string|null $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentInvoiceeIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentInvoiceeId = $documentInvoiceeIds[InvoiceSuitePointerUtils::getValue('documentinvoiceeid')];

        $newId = $documentInvoiceeId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getGlobalID() ?? []
            ),
            'documentinvoiceeglobalid'
        );
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getGlobalID() ?? []
            ),
            'documentinvoiceeglobalid'
        );
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\udt\IDType>
         */
        $documentInvoiceeGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\udt\IDType
         */
        $documentInvoiceeGlobalId = $documentInvoiceeGlobalIds[InvoiceSuitePointerUtils::getValue('documentinvoiceeglobalid')];

        $newGlobalId = $documentInvoiceeGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentInvoiceeGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentinvoiceetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentinvoiceetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType>
         */
        $documentInvoiceeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TaxRegistrationType
         */
        $documentInvoiceeTaxRegistration = $documentInvoiceeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentinvoiceetaxregistration')];

        $newTaxRegistrationType = $documentInvoiceeTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentInvoiceeTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentinvoiceeaddress'
        );
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentinvoiceeaddress'
        );
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param string|null $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-239, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType>
         */
        $documentInvoiceeAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeAddressType
         */
        $documentInvoiceeAddress = $documentInvoiceeAddresses[InvoiceSuitePointerUtils::getValue('documentinvoiceeaddress')];

        $newAddressLine1 = $documentInvoiceeAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentInvoiceeAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentInvoiceeAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentInvoiceeAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentInvoiceeAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentInvoiceeAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentInvoiceeAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentinvoiceelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentinvoiceelegalorganisation'
        );
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param string|null $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType>
         */
        $documentInvoiceeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\LegalOrganizationType
         */
        $documentInvoiceeLegalOrganisation = $documentInvoiceeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentinvoiceelegalorganisation')];

        $newType = $documentInvoiceeLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentInvoiceeLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentInvoiceeLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentinvoiceecontact'
        );
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getDefinedTradeContact() ?? []
            ),
            'documentinvoiceecontact'
        );
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param string|null $newPersonName __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType>
         */
        $documentInvoiceeContacts = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getDefinedTradeContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\TradeContactType
         */
        $documentInvoiceeContact = $documentInvoiceeContacts[InvoiceSuitePointerUtils::getValue('documentinvoiceecontact')];

        $newPersonName = $documentInvoiceeContact->getPersonName()?->getValue() ?? "";
        $newDepartmentName = $documentInvoiceeContact->getDepartmentName()?->getValue() ?? "";
        $newPhoneNumber = $documentInvoiceeContact->getTelephoneUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newFaxNumber = $documentInvoiceeContact->getFaxUniversalCommunication()?->getCompleteNumber()?->getValue() ?? "";
        $newEmailAddress = $documentInvoiceeContact->getEmailURIUniversalCommunication()->getURIID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentinvoiceeecommunication'
        );
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentinvoiceeecommunication'
        );
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param string|null $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-241, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType>
         */
        $documentInvoiceeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceeTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
         */
        $documentInvoiceeElectronicCommunication = $documentInvoiceeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentinvoiceeecommunication')];

        $newType = $documentInvoiceeElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentInvoiceeElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion
}
