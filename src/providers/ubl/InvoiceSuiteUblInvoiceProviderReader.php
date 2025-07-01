<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;
use horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;

class InvoiceSuiteUblInvoiceProviderReader extends InvoiceSuiteAbstractFormatProviderReader
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
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getUblInvoiceRootObject()->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $newDocumentDescription = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getName() ?? "";

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $newDocumentLanguage = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getLanguageID() ?? "";

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     *
     * @phpstan-param-out DateTimeInterface $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $newDocumentDate = $this->getUblInvoiceRootObject()->getIssueDate() ?? new DateTime();

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     *
     * @phpstan-param-out null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self {
        $newCompleteDate = null;

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self {
        $newDocumentCurrency = $this->getUblInvoiceRootObject()->getDocumentCurrencyCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self {
        $newDocumentTaxCurrency = $this->getUblInvoiceRootObject()->getTaxCurrencyCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy = null
    ): self {
        $newDocumentIsCopy = $this->getUblInvoiceRootObject()->getCopyIndicator() ?? false;

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self {
        $newDocumentIsTest = false;

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
                $this->getUblInvoiceRootObject()->getNote() ?? []
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
                $this->getUblInvoiceRootObject()->getNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Get a note to the document.
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
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
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Note>
         */
        $documentNotes = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getNote() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\Note
         */
        $documentNote = $documentNotes[InvoiceSuitePointerUtils::getValue('documentnote')];

        $newContent = $documentNote->getValue() ?? "";
        $newContentCode = "";
        $newSubjectCode = "";

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
                $this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []
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
                $this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod>
         */
        $billingPeriods = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\InvoicePeriod
         */
        $billingPeriod = $billingPeriods[InvoiceSuitePointerUtils::getValue('documentbillingperiod')];

        $newStartDate = $billingPeriod->getStartDate();
        $newEndDate = $billingPeriod->getEndDate();
        $billingPeriodDescriptions = $billingPeriod->getDescription();
        $billingPeriodDescription = reset($billingPeriodDescriptions);
        $newDescription = $billingPeriodDescription !== false ? $billingPeriodDescription->getValue() : "";

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
                $this->getUblInvoiceRootObject()->getAccountingCost() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCost() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Get a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AccountingCost>
         */
        $postingReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCost() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost
         */
        $postingReference = $postingReferences[InvoiceSuitePointerUtils::getValue('documentpostingreference')];

        $newType = "";
        $newAccountId = $postingReference->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []
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
                $this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []
            ),
            'documentsellerorderreference'
        );
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\SalesOrderID>
         */
        $documentSellerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\SalesOrderID
         */
        $documentSellerOrderReference = $documentSellerOrderReferences[InvoiceSuitePointerUtils::getValue('documentsellerorderreference')];

        $newReferenceNumber = $documentSellerOrderReference->getValue() ?? "";
        $newReferenceDate = null;

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
                $this->getUblInvoiceRootObject()->getOrderReference() ?? []
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
                $this->getUblInvoiceRootObject()->getOrderReference() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param string|null $newReferenceNumber Buyer's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\OrderReference>
         */
        $documentBuyerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getOrderReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\OrderReference
         */
        $documentBuyerOrderReference = $documentBuyerOrderReferences[InvoiceSuitePointerUtils::getValue('documentbuyerorderreference')];

        $newReferenceNumber = $documentBuyerOrderReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentBuyerOrderReference->getIssueDate();

        return $this;
    }

    /**
     * Helper function for getting associated quotations from additional document references
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>
     */
    private function getQuotationReferences(): array
    {
        $additionalDocTypeCode = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCTYPECODE', '');
        $additionalDocDescription = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCDESCRIPTION', '');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$additionalDocTypeCode, $additionalDocDescription])) {
            return [];
        }

        $additionalDocumentReferences =
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                function (AdditionalDocumentReference $additionalDocumentReference) use ($additionalDocTypeCode) {
                    return strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $additionalDocTypeCode) !== 0;
                }
            );

        return $additionalDocumentReferences;
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(InvoiceSuiteArrayUtils::ensure($this->getQuotationReferences()), 'documentquotationreference');
    }

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(InvoiceSuiteArrayUtils::ensure($this->getQuotationReferences()), 'documentquotationreference');
    }

    /**
     * Get the associated quotation
     *
     * @param string|null $newReferenceNumber Quotation number
     * @param DateTimeInterface|null $newReferenceDate Quotation date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>
         */
        $documentQuotationReferences = InvoiceSuiteArrayUtils::ensure($this->getQuotationReferences());

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
         */
        $documentQuotationReference = $documentQuotationReferences[InvoiceSuitePointerUtils::getValue('documentquotationreference')];

        $newReferenceNumber = $documentQuotationReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentQuotationReference->getIssueDate();

        return $this;
    }
}
