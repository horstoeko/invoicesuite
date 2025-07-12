<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;
use horstoeko\invoicesuite\models\ubl\cac\PartyIdentificationType;
use horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;
use horstoeko\invoicesuite\models\ubl\cac\Delivery;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

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

    #region Document Generals

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
    private function resolveQuotationReferences(): array
    {
        $additionalDocTypeCode = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCTYPECODE', '');
        $additionalDocDescription = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCDESCRIPTION', '');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$additionalDocTypeCode, $additionalDocDescription])) {
            return [];
        }

        return array_values(
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                function (AdditionalDocumentReference $additionalDocumentReference) use ($additionalDocTypeCode) {
                    return strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $additionalDocTypeCode) !== 0;
                }
            )
        );
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences()),
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
            InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences()),
            'documentquotationreference'
        );
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
        $documentQuotationReferences = InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences());

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
         */
        $documentQuotationReference = $documentQuotationReferences[InvoiceSuitePointerUtils::getValue('documentquotationreference')];

        $newReferenceNumber = $documentQuotationReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentQuotationReference->getIssueDate();

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
                $this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []
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
                $this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Get the associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference>
         */
        $documentContractReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\ContractDocumentReference
         */
        $documentContractReference = $documentContractReferences[InvoiceSuitePointerUtils::getValue('documentcontractreference')];

        $newReferenceNumber = $documentContractReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentContractReference->getIssueDate();

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
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []
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
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []
            ),
            'documentadditionalreference'
        );
    }

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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>
         */
        $documentAdditionalReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
         */
        $documentAdditionalReference = $documentAdditionalReferences[InvoiceSuitePointerUtils::getValue('documentadditionalreference')];

        $newReferenceNumber = $documentAdditionalReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentAdditionalReference->getIssueDate();
        $newTypeCode = $documentAdditionalReference->getDocumentTypeCode()?->getValue() ?? "";
        $newReferenceTypeCode = "";
        $newDescriptions = $documentAdditionalReference->getDocumentDescription() ?? [];
        $newDescriptions = reset($newDescriptions);

        $newDescription = $newDescriptions !== false ? $newDescriptions->getValue() ?? "" : "";

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
                $this->getUblInvoiceRootObject()->getBillingReference() ?? []
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
                $this->getUblInvoiceRootObject()->getBillingReference() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\BillingReference>
         */
        $documentInvoiceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getBillingReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\BillingReference
         */
        $documentInvoiceReference = $documentInvoiceReferences[InvoiceSuitePointerUtils::getValue('documentinvoicereference')];

        $newReferenceNumber = $documentInvoiceReference->getInvoiceDocumentReference()?->getID()?->getValue() ?? "";
        $newReferenceDate = $documentInvoiceReference->getInvoiceDocumentReference()?->getIssueDate();
        $newTypeCode = "";

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
                $this->getUblInvoiceRootObject()->getProjectReference() ?? []
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
                $this->getUblInvoiceRootObject()->getProjectReference() ?? []
            ),
            'documentprojectreference'
        );
    }

    /**
     * Get an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\ProjectReference>
         */
        $documentProjectReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getProjectReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\ProjectReference
         */
        $documentProjectReference = $documentProjectReferences[InvoiceSuitePointerUtils::getValue('documentprojectreference')];

        $newReferenceNumber = $documentProjectReference->getID()?->getValue() ?? "";
        $newName = "";

        return $this;
    }

    /**
     * Get the ultimate customer order references from additional documents filtered by type code 220
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>
     */
    private function resolveDocumentUltimateCustomerOrderReferences(): array
    {
        $ultimateCustomerOrderDocTypeCode = $this->getCurrentFormatProviderParameterValue('BUILDER_ULTIMATECUSTOMERORDER_DOCTYPECODE', '220');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$ultimateCustomerOrderDocTypeCode])) {
            return [];
        }

        return array_values(
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                function (AdditionalDocumentReference $additionalDocumentReference) use ($ultimateCustomerOrderDocTypeCode) {
                    return strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $ultimateCustomerOrderDocTypeCode) !== 0;
                }
            )
        );
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences()),
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
            InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences()),
            'documentultimatecustomerorderreference'
        );
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference>
         */
        $documentUltimateCustomerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences());

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
         */
        $documentUltimateCustomerOrderReference = $documentUltimateCustomerOrderReferences[InvoiceSuitePointerUtils::getValue('documentultimatecustomerorderreference')];

        $newReferenceNumber = $documentUltimateCustomerOrderReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentUltimateCustomerOrderReference->getIssueDate();

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
                $this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []
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
                $this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\DespatchDocumentReference>
         */
        $documentDespatchAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\DespatchDocumentReference
         */
        $documentDespatchAdviceReference = $documentDespatchAdviceReferences[InvoiceSuitePointerUtils::getValue('documentdespatchadvicereference')];

        $newReferenceNumber = $documentDespatchAdviceReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentDespatchAdviceReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []
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
                $this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []
            ),
            'documentreceivingadvicereference'
        );
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReceiptDocumentReference>
         */
        $documentReceivingAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\ReceiptDocumentReference
         */
        $documentReceivingAdviceReference = $documentReceivingAdviceReferences[InvoiceSuitePointerUtils::getValue('documentreceivingadvicereference')];

        $newReferenceNumber = $documentReceivingAdviceReference->getID()?->getValue() ?? "";
        $newReferenceDate = $documentReceivingAdviceReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Get an additional delivery note reference
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $newDate = null;

        $deliveries = $this->getUblInvoiceRootObject()->getDelivery();
        $delivery = reset($deliveries);

        if ($delivery === false) {
            return $this;
        }

        $newDate = $delivery->getActualDeliveryDate();

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * Get the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self {
        $newName = "";

        $sellerLegalEntities = $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity();
        $sellerLegalEntity = reset($sellerLegalEntities);

        if ($sellerLegalEntity === false) {
            return $this;
        }

        $newName = $sellerLegalEntity->getRegistrationName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all seller/supplier IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentSellerIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") === ""
                )
            );
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentSellerIds(),
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
            $this->resolveDocumentSellerIds(),
            'documentsellerid'
        );
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentSellerIds = $this->resolveDocumentSellerIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentSellerId = $documentSellerIds[InvoiceSuitePointerUtils::getValue('documentsellerid')];

        $newId = $documentSellerId->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all seller/supplier global IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentSellerGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") !== ""
                )
            );
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentSellerGlobalIds(),
            'documentsellerglobalid'
        );
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentSellerGlobalIds(),
            'documentsellerglobalid'
        );
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentSellerGlobalIds = $this->resolveDocumentSellerGlobalIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentSellerGlobalId = $documentSellerGlobalIds[InvoiceSuitePointerUtils::getValue('documentsellerglobalid')];

        $newGlobalId = $documentSellerGlobalId->getID()?->getValue() ?? "";
        $newGlobalIdType = $documentSellerGlobalId->getID()?->getSchemeID() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>
         */
        $documentSellerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
         */
        $documentSellerTaxRegistration = $documentSellerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentsellertaxregistration')];

        $newTaxRegistrationType = $documentSellerTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? "";
        $newTaxRegistrationId = $documentSellerTaxRegistration->getCompanyID()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PostalAddress>
         */
        $documentSellerAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PostalAddress
         */
        $documentSellerAddress = $documentSellerAddresses[InvoiceSuitePointerUtils::getValue('documentselleraddress')];

        $newAddressLine1 = $documentSellerAddress->getStreetName()?->getValue() ?? "";
        $newAddressLine2 = $documentSellerAddress->getAdditionalStreetName()?->getValue() ?? "";
        $newAddressLine3 = "";
        $newPostcode = $documentSellerAddress->getPostalZone()?->getValue() ?? "";
        $newCity = $documentSellerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentSellerAddress->getCountry()?->getIdentificationCode()?->getValue() ?? "";
        $newSubDivision = $documentSellerAddress->getCountrySubentity()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>
         */
        $documentSellerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity
         */
        $documentSellerLegalOrganisation = $documentSellerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentsellerlegalorganisation')];

        $newType = $documentSellerLegalOrganisation->getCompanyID()?->getSchemeID() ?? "";
        $newId = $documentSellerLegalOrganisation->getCompanyID()?->getValue() ?? "";

        // Trading name and Party name are swapped in UBL
        $partyNames = $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? "" : "";

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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []
            ),
            'documentsellercontact'
        );
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\Contact>
         */
        $documentSellerContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\Contact
         */
        $documentSellerContact = $documentSellerContacts[InvoiceSuitePointerUtils::getValue('documentsellercontact')];

        $newPersonName = $documentSellerContact->getName()?->getValue() ?? "";
        $newDepartmentName = "";
        $newPhoneNumber = $documentSellerContact->getTelephone()?->getValue() ?? "";
        $newFaxNumber = $documentSellerContact->getTelefax()?->getValue() ?? "";
        $newEmailAddress = $documentSellerContact->getElectronicMail()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\EndpointID>
         */
        $documentSellerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\EndpointID
         */
        $documentSellerElectronicCommunication = $documentSellerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentsellerecommunication')];

        $newType = $documentSellerElectronicCommunication->getSchemeID() ?? "";
        $newUri = $documentSellerElectronicCommunication->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): self {
        $newName = "";

        $buyerLegalEntities = $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity();
        $buyerLegalEntity = reset($buyerLegalEntities);

        if ($buyerLegalEntity === false) {
            return $this;
        }

        $newName = $buyerLegalEntity->getRegistrationName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all buyer/customer IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentBuyerIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") === ""
                )
            );
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentBuyerIds(),
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
            $this->resolveDocumentBuyerIds(),
            'documentbuyerid'
        );
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentBuyerIds = $this->resolveDocumentBuyerIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentBuyerId = $documentBuyerIds[InvoiceSuitePointerUtils::getValue('documentbuyerid')];

        $newId = $documentBuyerId->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all buyer/customer global IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentBuyerGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") !== ""
                )
            );
    }

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentBuyerGlobalIds(),
            'documentbuyerglobalid'
        );
    }

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentBuyerGlobalIds(),
            'documentbuyerglobalid'
        );
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentBuyerGlobalIds = $this->resolveDocumentBuyerGlobalIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentBuyerGlobalId = $documentBuyerGlobalIds[InvoiceSuitePointerUtils::getValue('documentbuyerglobalid')];

        $newGlobalId = $documentBuyerGlobalId->getID()?->getValue() ?? "";
        $newGlobalIdType = $documentBuyerGlobalId->getID()?->getSchemeID() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>
         */
        $documentBuyerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
         */
        $documentBuyerTaxRegistration = $documentBuyerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentbuyertaxregistration')];

        $newTaxRegistrationType = $documentBuyerTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? "";
        $newTaxRegistrationId = $documentBuyerTaxRegistration->getCompanyID()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PostalAddress>
         */
        $documentBuyerAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PostalAddress
         */
        $documentBuyerAddress = $documentBuyerAddresses[InvoiceSuitePointerUtils::getValue('documentbuyeraddress')];

        $newAddressLine1 = $documentBuyerAddress->getStreetName()?->getValue() ?? "";
        $newAddressLine2 = $documentBuyerAddress->getAdditionalStreetName()?->getValue() ?? "";
        $newAddressLine3 = "";
        $newPostcode = $documentBuyerAddress->getPostalZone()?->getValue() ?? "";
        $newCity = $documentBuyerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentBuyerAddress->getCountry()?->getIdentificationCode()?->getValue() ?? "";
        $newSubDivision = $documentBuyerAddress->getCountrySubentity()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>
         */
        $documentBuyerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity
         */
        $documentBuyerLegalOrganisation = $documentBuyerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentbuyerlegalorganisation')];

        $newType = $documentBuyerLegalOrganisation->getCompanyID()?->getSchemeID() ?? "";
        $newId = $documentBuyerLegalOrganisation->getCompanyID()?->getValue() ?? "";

        // Trading name and Party name are swapped in UBL
        $partyNames = $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? "" : "";

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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []
            ),
            'documentbuyercontact'
        );
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\Contact>
         */
        $documentBuyerContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\Contact
         */
        $documentBuyerContact = $documentBuyerContacts[InvoiceSuitePointerUtils::getValue('documentbuyercontact')];

        $newPersonName = $documentBuyerContact->getName()?->getValue() ?? "";
        $newDepartmentName = "";
        $newPhoneNumber = $documentBuyerContact->getTelephone()?->getValue() ?? "";
        $newFaxNumber = $documentBuyerContact->getTelefax()?->getValue() ?? "";
        $newEmailAddress = $documentBuyerContact->getElectronicMail()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []
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
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\EndpointID>
         */
        $documentBuyerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\EndpointID
         */
        $documentBuyerElectronicCommunication = $documentBuyerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentbuyerecommunication')];

        $newType = $documentBuyerElectronicCommunication->getSchemeID() ?? "";
        $newUri = $documentBuyerElectronicCommunication->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): self {
        $newName = "";

        $taxRepresentativeMames = $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyName() ?? [];
        $taxRepresentativeMame = reset($taxRepresentativeMames);

        if ($taxRepresentativeMame === false) {
            return $this;
        }

        $newName = $taxRepresentativeMame->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all tax representative IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentTaxRepresentativeIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") === ""
                )
            );
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentTaxRepresentativeIds(),
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
            $this->resolveDocumentTaxRepresentativeIds(),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentTaxRepresentativeIds = $this->resolveDocumentTaxRepresentativeIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentTaxRepresentativeId = $documentTaxRepresentativeIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeid')];

        $newId = $documentTaxRepresentativeId->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all tax representative global IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentTaxRepresentativeGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyIdentification() ?? []
                    ),
                    fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") !== ""
                )
            );
    }

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentTaxRepresentativeGlobalIds(),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentTaxRepresentativeGlobalIds(),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
         */
        $documentTaxRepresentativeGlobalIds = $this->resolveDocumentTaxRepresentativeGlobalIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyIdentification
         */
        $documentTaxRepresentativeGlobalId = $documentTaxRepresentativeGlobalIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeglobalid')];

        $newGlobalId = $documentTaxRepresentativeGlobalId->getID()?->getValue() ?? "";
        $newGlobalIdType = $documentTaxRepresentativeGlobalId->getID()?->getSchemeID() ?? "";

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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []
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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>
         */
        $documentTaxRepresentativeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
         */
        $documentTaxRepresentativeTaxRegistration = $documentTaxRepresentativeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativetaxregistration')];

        $newTaxRegistrationType = $documentTaxRepresentativeTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? "";
        $newTaxRegistrationId = $documentTaxRepresentativeTaxRegistration->getCompanyID()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []
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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Set the address of the tax representative party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PostalAddress>
         */
        $documentTaxRepresentativeAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PostalAddress
         */
        $documentTaxRepresentativeAddress = $documentTaxRepresentativeAddresses[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeaddress')];

        $newAddressLine1 = $documentTaxRepresentativeAddress->getStreetName()?->getValue() ?? "";
        $newAddressLine2 = $documentTaxRepresentativeAddress->getAdditionalStreetName()?->getValue() ?? "";
        $newAddressLine3 = "";
        $newPostcode = $documentTaxRepresentativeAddress->getPostalZone()?->getValue() ?? "";
        $newCity = $documentTaxRepresentativeAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentTaxRepresentativeAddress->getCountry()?->getIdentificationCode()?->getValue() ?? "";
        $newSubDivision = $documentTaxRepresentativeAddress->getCountrySubentity()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []
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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity>
         */
        $documentTaxRepresentativeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyLegalEntity
         */
        $documentTaxRepresentativeLegalOrganisation = $documentTaxRepresentativeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativelegalorganisation')];

        $newType = $documentTaxRepresentativeLegalOrganisation->getCompanyID()?->getSchemeID() ?? "";
        $newId = $documentTaxRepresentativeLegalOrganisation->getCompanyID()?->getValue() ?? "";

        $partyNames = $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? "" : "";

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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []
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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []
            ),
            'documenttaxrepresentativecontact'
        );
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\Contact>
         */
        $documentTaxRepresentativeContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\Contact
         */
        $documentTaxRepresentativeContact = $documentTaxRepresentativeContacts[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativecontact')];

        $newPersonName = $documentTaxRepresentativeContact->getName()?->getValue() ?? "";
        $newDepartmentName = "";
        $newPhoneNumber = $documentTaxRepresentativeContact->getTelephone()?->getValue() ?? "";
        $newFaxNumber = $documentTaxRepresentativeContact->getTelefax()?->getValue() ?? "";
        $newEmailAddress = $documentTaxRepresentativeContact->getElectronicMail()?->getValue() ?? "";

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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []
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
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\EndpointID>
         */
        $documentTaxRepresentativeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\EndpointID
         */
        $documentTaxRepresentativeElectronicCommunication = $documentTaxRepresentativeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeecommunication')];

        $newType = $documentTaxRepresentativeElectronicCommunication->getSchemeID() ?? "";
        $newUri = $documentTaxRepresentativeElectronicCommunication->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * Resolve the first delivery node
     *
     * @return null|Delivery
     */
    private function resolveFirstDocumentDelivery(): ?Delivery
    {
        $deliveryNodes = $this->getUblInvoiceRootObject()->getDelivery() ?? [];
        $deliveryNode = reset($deliveryNodes);

        if ($deliveryNode === false) {
            return null;
        }

        return $deliveryNode;
    }

    /**
     * Get the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): self {
        $newName = "";

        $shipToMames = $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyName() ?? [];
        $shipToMame = reset($shipToMames);

        if ($shipToMame === false) {
            return $this;
        }

        $newName = $shipToMame->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Get all buyer/customer IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentShipToIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getID() ?? []
                    ),
                    fn(ID $partyIdentification) => ($partyIdentification->getSchemeID() ?? "") === ""
                )
            );
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentShipToIds(),
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
            $this->resolveDocumentShipToIds(),
            'documentshiptoid'
        );
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ID>
         */
        $documentShipToIds = $this->resolveDocumentShipToIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\ID
         */
        $documentShipToId = $documentShipToIds[InvoiceSuitePointerUtils::getValue('documentshiptoid')];

        $newId = $documentShipToId->getValue() ?? "";

        return $this;
    }

    /**
     * Get all buyer/customer global IDs
     *
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PartyIdentification>
     */
    private function resolveDocumentShipToGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getID() ?? []
                    ),
                    fn(ID $partyIdentification) => ($partyIdentification->getSchemeID() ?? "") !== ""
                )
            );
    }

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentShipToGlobalIds(),
            'documentshiptoglobalid'
        );
    }

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentShipToGlobalIds(),
            'documentshiptoglobalid'
        );
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ID>
         */
        $documentShipToGlobalIds = $this->resolveDocumentShipToGlobalIds();

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cbc\ID
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
                $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []
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
                $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme>
         */
        $documentShipToTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PartyTaxScheme
         */
        $documentShipToTaxRegistration = $documentShipToTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentshiptotaxregistration')];

        $newTaxRegistrationType = $documentShipToTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? "";
        $newTaxRegistrationId = $documentShipToTaxRegistration->getCompanyID()?->getValue() ?? "";

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
                $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []
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
                $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
         * @var array<\horstoeko\invoicesuite\models\ubl\cac\PostalAddress>
         */
        $documentShipToAddresses = InvoiceSuiteArrayUtils::ensure($this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\models\ubl\cac\PostalAddress
         */
        $documentShipToAddress = $documentShipToAddresses[InvoiceSuitePointerUtils::getValue('documentshiptoaddress')];

        $newAddressLine1 = $documentShipToAddress->getStreetName()?->getValue() ?? "";
        $newAddressLine2 = $documentShipToAddress->getAdditionalStreetName()?->getValue() ?? "";
        $newAddressLine3 = "";
        $newPostcode = $documentShipToAddress->getPostalZone()?->getValue() ?? "";
        $newCity = $documentShipToAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentShipToAddress->getCountry()?->getIdentificationCode()?->getValue() ?? "";
        $newSubDivision = $documentShipToAddress->getCountrySubentity()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
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
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
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
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
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
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion
}
