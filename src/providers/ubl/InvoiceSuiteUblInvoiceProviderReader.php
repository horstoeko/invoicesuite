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
    private function resolveQuotationReferences(): array
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
        $documentProjectReference = $documentProjectReferences[InvoiceSuitePointerUtils::getValue('documentinvoicereference')];

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

        $ultimateCustomerOrderReferences =
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                function (AdditionalDocumentReference $additionalDocumentReference) use ($ultimateCustomerOrderDocTypeCode) {
                    return strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $ultimateCustomerOrderDocTypeCode) !== 0;
                }
            );

        return $ultimateCustomerOrderReferences;
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
        return array_filter(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyIdentification() ?? []
            ),
            fn(PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? "") === ""
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
}
