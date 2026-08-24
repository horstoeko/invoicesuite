<?php

declare(strict_types=1);

namespace {{NAMESPACE}};

use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Class representing methods for a reader
 */
class {{READER_CLASS_NAME}} extends InvoiceSuiteAbstractDocumentFormatReader
{
    /**
     * Create a DTO from this document
     *
     * @param  null|InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return static
     *
     * @param-out InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
     */
    public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentDTO = new InvoiceSuiteDocumentHeaderDTO();
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     *
     * @param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentNo = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     *
     * @param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return static
     *
     * @param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentDescription = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return static
     *
     * @param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentLanguage = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return static
     *
     * @param-out null|DateTimeInterface $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return static
     *
     * @param-out null|DateTimeInterface $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newCompleteDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return static
     *
     * @param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentCurrency = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return static
     *
     * @param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentTaxCurrency = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return static
     *
     * @param-out bool $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentIsCopy = false;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return static
     *
     * @param-out bool $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDocumentIsTest = false;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get a note to the document.
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     *
     * @param-out string $newContent
     * @param-out string $newContentCode
     * @param-out string $newSubjectCode
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newContent = '';
        $newContentCode = '';
        $newSubjectCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentBillingPeriod(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentBillingPeriod(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @param-out null|DateTimeInterface $newStartDate
     * @param-out null|DateTimeInterface $newEndDate
     * @param-out string                 $newDescription
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newStartDate = null;
        $newEndDate = null;
        $newDescription = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return bool
     */
    public function firstDocumentPostingReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next posting reference
     *
     * @return bool
     */
    public function nextDocumentPostingReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newAccountId
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newAccountId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return bool
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return bool
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return bool
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return bool
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Buyer's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return bool
     */
    public function firstDocumentQuotationReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated quotation
     *
     * @return bool
     */
    public function nextDocumentQuotationReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   Quotation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return bool
     */
    public function firstDocumentContractReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated contract
     *
     * @return bool
     */
    public function nextDocumentContractReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated contract
     *
     * @param  null|string            $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return bool
     */
    public function firstDocumentAdditionalReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional associated document
     *
     * @return bool
     */
    public function nextDocumentAdditionalReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     *
     * @param-out string                      $newReferenceNumber
     * @param-out null|DateTimeInterface      $newReferenceDate
     * @param-out string                      $newTypeCode
     * @param-out string                      $newReferenceTypeCode
     * @param-out string                      $newDescription
     * @param-out null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';
        $newReferenceTypeCode = '';
        $newDescription = '';
        $newInvoiceSuiteAttachment = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function firstDocumentInvoiceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function nextDocumentInvoiceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     * @param-out string                 $newTypeCode
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return bool
     */
    public function firstDocumentProjectReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional project reference
     *
     * @return bool
     */
    public function nextDocumentProjectReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     *
     * @param-out string $newReferenceNumber
     * @param-out string $newName
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return bool
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return bool
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber Ultimate customer order number
     * @param  null|DateTimeInterface $newReferenceDate   Ultimate customer order date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return bool
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return bool
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return bool
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional Receiving advice reference
     *
     * @return bool
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return bool
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return bool
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional delivery note reference
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return static
     *
     * @param-out null|DateTimeInterface $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return static
     *
     * @param-out string $newBuyerReference
     */
    public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newBuyerReference = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get information on the delivery conditions
     *
     * @param  null|string $newCode The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     *
     * @param-out string $newCode
     */
    public function getDocumentDeliveryTerms(
        ?string &$newCode = null
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentSellerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the seller's tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentSellerTaxRepresentativeName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the seller's tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentSellerTaxRepresentativeId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the seller's tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentSellerTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the seller's tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the seller's tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentSellerTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the seller's tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentSellerTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the seller's tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentSellerTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the seller's tax representative party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the seller's tax representative party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the seller's tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentSellerTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentPayeeName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first global ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next global ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next address of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentPayeeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentPayeeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Payment mean
     *
     * @return bool
     */
    public function firstDocumentPaymentMean(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Payment mean
     *
     * @return bool
     */
    public function nextDocumentPaymentMean(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Payment mean
     *
     * @param  null|string $newTypeCode            Expected or used means of payment expressed as a code
     * @param  null|string $newName                Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @param  null|string $newBuyerIban           Identifier of the account to be debited
     * @param  null|string $newPayeeIban           Payment account identifier
     * @param  null|string $newPayeeAccountName    Name of the payment account
     * @param  null|string $newPayeeProprietaryId  National account number (not for SEPA)
     * @param  null|string $newPayeeBic            Identifier of the payment service provider
     * @param  null|string $newPaymentReference    Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             Identification of the mandate reference
     * @param  null|string $newBuyerAccountName    Name of the account to be debited
     * @return static
     *
     * @param-out string $newTypeCode
     * @param-out string $newName
     * @param-out string $newFinancialCardId
     * @param-out string $newFinancialCardHolder
     * @param-out string $newBuyerIban
     * @param-out string $newPayeeIban
     * @param-out string $newPayeeAccountName
     * @param-out string $newPayeeProprietaryId
     * @param-out string $newPayeeBic
     * @param-out string $newPaymentReference
     * @param-out string $newMandate
     * @param-out string $newBuyerAccountName
     */
    public function getDocumentPaymentMean(
        ?string &$newTypeCode,
        ?string &$newName,
        ?string &$newFinancialCardId,
        ?string &$newFinancialCardHolder,
        ?string &$newBuyerIban,
        ?string &$newPayeeIban,
        ?string &$newPayeeAccountName,
        ?string &$newPayeeProprietaryId,
        ?string &$newPayeeBic,
        ?string &$newPaymentReference,
        ?string &$newMandate,
        ?string &$newBuyerAccountName = null
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTypeCode = '';
        $newName = '';
        $newFinancialCardId = '';
        $newFinancialCardHolder = '';
        $newBuyerIban = '';
        $newPayeeIban = '';
        $newPayeeAccountName = '';
        $newPayeeProprietaryId = '';
        $newPayeeBic = '';
        $newPaymentReference = '';
        $newMandate = '';
        $newBuyerAccountName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first link to the invoice issued by the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next link to the invoice issued by the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get a link to the invoice issued by the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentPaymentReference(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @return static
     *
     * @param-out string                 $newDescription
     * @param-out null|DateTimeInterface $newDueDate
     * @param-out string                 $newMandate
     */
    public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate,
        ?string &$newMandate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDescription = '';
        $newDueDate = null;
        $newMandate = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     *
     * @param-out float                  $newBaseAmount
     * @param-out float                  $newDiscountAmount
     * @param-out float                  $newDiscountPercent
     * @param-out null|DateTimeInterface $newBaseDate
     * @param-out float                  $newBasePeriod
     * @param-out string                 $newBasePeriodUnit
     */
    public function getDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newDiscountAmount,
        ?float &$newDiscountPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newBaseAmount = 0.0;
        $newDiscountAmount = 0.0;
        $newDiscountPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     *
     * @param-out float                  $newBaseAmount
     * @param-out float                  $newPenaltyAmount
     * @param-out float                  $newPenaltyPercent
     * @param-out null|DateTimeInterface $newBaseDate
     * @param-out float                  $newBasePeriod
     * @param-out string                 $newBasePeriodUnit
     */
    public function getDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newPenaltyAmount,
        ?float &$newPenaltyPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newBaseAmount = 0.0;
        $newPenaltyAmount = 0.0;
        $newPenaltyPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return bool
     */
    public function firstDocumentTax(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return bool
     */
    public function nextDocumentTax(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         Coded description of the tax category
     * @param  null|string            $newTaxType             Coded description of the tax type
     * @param  null|float             $newBasisAmount         Tax base amount
     * @param  null|float             $newTaxAmount           Tax total amount
     * @param  null|float             $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          Date on which tax is due
     * @param  null|string            $newTaxDueCode          Code for the date on which tax is due
     * @return static
     *
     * @param-out string                 $newTaxCategory
     * @param-out string                 $newTaxType
     * @param-out float                  $newBasisAmount
     * @param-out float                  $newTaxAmount
     * @param-out float                  $newTaxPercent
     * @param-out string                 $newExemptionReason
     * @param-out string                 $newExemptionReasonCode
     * @param-out null|DateTimeInterface $newTaxDueDate
     * @param-out string                 $newTaxDueCode
     */
    public function getDocumentTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newBasisAmount,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
        ?DateTimeInterface &$newTaxDueDate,
        ?string &$newTaxDueCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxCategory = '';
        $newTaxType = '';
        $newBasisAmount = 0.0;
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = '';
        $newExemptionReasonCode = '';
        $newTaxDueDate = null;
        $newTaxDueCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return bool
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return bool
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               Coded description of the tax category
     * @param  null|string $newTaxType                   Coded description of the tax type
     * @param  null|float  $newTaxPercent                Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     *
     * @param-out bool   $newChargeIndicator
     * @param-out float  $newAllowanceChargeAmount
     * @param-out float  $newAllowanceChargeBaseAmount
     * @param-out string $newTaxCategory
     * @param-out string $newTaxType
     * @param-out float  $newTaxPercent
     * @param-out string $newAllowanceChargeReason
     * @param-out string $newAllowanceChargeReasonCode
     * @param-out float  $newAllowanceChargePercent
     */
    public function getDocumentAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newChargeIndicator = false;
        $newAllowanceChargeAmount = 0.0;
        $newAllowanceChargeBaseAmount = 0.0;
        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxPercent = 0.0;
        $newAllowanceChargeReason = '';
        $newAllowanceChargeReasonCode = '';
        $newAllowanceChargePercent = 0.0;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return bool
     */
    public function firstDocumentLogisticServiceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return bool
     */
    public function nextDocumentLogisticServiceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     *
     * @param-out float  $newChargeAmount
     * @param-out string $newDescription
     * @param-out string $newTaxCategory
     * @param-out string $newTaxType
     * @param-out float  $newTaxPercent
     */
    public function getDocumentLogisticServiceCharge(
        ?float &$newChargeAmount,
        ?string &$newDescription,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newChargeAmount = 0.0;
        $newDescription = '';
        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxPercent = 0.0;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the document summation
     *
     * @param  null|float $newNetAmount           Sum of the net amounts of all invoice lines
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxBasisAmount      Total invoice amount excluding sales tax
     * @param  null|float $newTaxTotalAmount      Total amount of the invoice sales tax (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice amount including sales tax
     * @param  null|float $newDueAmount           Payment amount due
     * @param  null|float $newPrepaidAmount       Prepayment amount
     * @param  null|float $newRoungingAmount      Rounding amount
     * @return static
     *
     * @param-out float $newNetAmount
     * @param-out float $newChargeTotalAmount
     * @param-out float $newDiscountTotalAmount
     * @param-out float $newTaxBasisAmount
     * @param-out float $newTaxTotalAmount
     * @param-out float $newTaxTotalAmount2
     * @param-out float $newGrossAmount
     * @param-out float $newDueAmount
     * @param-out float $newPrepaidAmount
     * @param-out float $newRoungingAmount
     */
    public function getDocumentSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxBasisAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newTaxTotalAmount2,
        ?float &$newGrossAmount,
        ?float &$newDueAmount,
        ?float &$newPrepaidAmount,
        ?float &$newRoungingAmount
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newNetAmount = 0.0;
        $newChargeTotalAmount = 0.0;
        $newDiscountTotalAmount = 0.0;
        $newTaxBasisAmount = 0.0;
        $newTaxTotalAmount = 0.0;
        $newTaxTotalAmount2 = 0.0;
        $newGrossAmount = 0.0;
        $newDueAmount = 0.0;
        $newPrepaidAmount = 0.0;
        $newRoungingAmount = 0.0;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first document position
     *
     * @return bool
     */
    public function firstDocumentPosition(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next document position
     *
     * @return bool
     */
    public function nextDocumentPosition(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get position general information
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return static
     *
     * @param-out string $newPositionId
     * @param-out string $newParentPositionId
     * @param-out string $newLineStatusCode
     * @param-out string $newLineStatusReasonCode
     */
    public function getDocumentPosition(
        ?string &$newPositionId,
        ?string &$newParentPositionId,
        ?string &$newLineStatusCode,
        ?string &$newLineStatusReasonCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPositionId = '';
        $newParentPositionId = '';
        $newLineStatusCode = '';
        $newLineStatusReasonCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first text information of the latest position
     *
     * @return bool
     */
    public function firstDocumentPositionNote(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next text information of the latest position
     *
     * @return bool
     */
    public function nextDocumentPositionNote(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get text information from latest position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     *
     * @param-out string $newContent
     * @param-out string $newContentCode
     * @param-out string $newSubjectCode
     */
    public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newContent = '';
        $newContentCode = '';
        $newSubjectCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get product details from latest position
     *
     * @param  null|string $newProductId                 ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName               Name of the product (product name)
     * @param  null|string $newProductDescription        Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId           Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId            Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId           Product global id
     * @param  null|string $newProductGlobalIdType       Type of the product global id
     * @param  null|string $newProductIndustryId         Id assigned by the industry
     * @param  null|string $newProductModelId            Unique model identifier of the product
     * @param  null|string $newProductBatchId            Batch (lot) identifier of the product
     * @param  null|string $newProductBrandName          Brand name of the product
     * @param  null|string $newProductModelName          Model name of the product
     * @param  null|string $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return static
     *
     * @param-out string $newProductId
     * @param-out string $newProductName
     * @param-out string $newProductDescription
     * @param-out string $newProductSellerId
     * @param-out string $newProductBuyerId
     * @param-out string $newProductGlobalId
     * @param-out string $newProductGlobalIdType
     * @param-out string $newProductIndustryId
     * @param-out string $newProductModelId
     * @param-out string $newProductBatchId
     * @param-out string $newProductBrandName
     * @param-out string $newProductModelName
     * @param-out string $newProductOriginTradeCountry
     */
    public function getDocumentPositionProductDetails(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?string &$newProductModelId,
        ?string &$newProductBatchId,
        ?string &$newProductBrandName,
        ?string &$newProductModelName,
        ?string &$newProductOriginTradeCountry
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newProductId = '';
        $newProductName = '';
        $newProductDescription = '';
        $newProductSellerId = '';
        $newProductBuyerId = '';
        $newProductGlobalId = '';
        $newProductGlobalIdType = '';
        $newProductIndustryId = '';
        $newProductModelId = '';
        $newProductBatchId = '';
        $newProductBrandName = '';
        $newProductModelName = '';
        $newProductOriginTradeCountry = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first product characteristics from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next product characteristics from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get product characteristics from latest position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     *
     * @param-out string $newProductCharacteristicDescription
     * @param-out string $newProductCharacteristicValue
     * @param-out string $newProductCharacteristicType
     * @param-out float  $newProductCharacteristicMeasureValue
     * @param-out string $newProductCharacteristicMeasureUnit
     */
    public function getDocumentPositionProductCharacteristic(
        ?string &$newProductCharacteristicDescription,
        ?string &$newProductCharacteristicValue,
        ?string &$newProductCharacteristicType,
        ?float &$newProductCharacteristicMeasureValue,
        ?string &$newProductCharacteristicMeasureUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newProductCharacteristicDescription = '';
        $newProductCharacteristicValue = '';
        $newProductCharacteristicType = '';
        $newProductCharacteristicMeasureValue = 0.0;
        $newProductCharacteristicMeasureUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first product classification from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next product classification from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get product classification from latest position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     *
     * @param-out string $newProductClassificationCode
     * @param-out string $newProductClassificationListId
     * @param-out string $newProductClassificationListVersionId
     * @param-out string $newProductClassificationCodeClassname
     */
    public function getDocumentPositionProductClassification(
        ?string &$newProductClassificationCode,
        ?string &$newProductClassificationListId,
        ?string &$newProductClassificationListVersionId,
        ?string &$newProductClassificationCodeClassname
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newProductClassificationCode = '';
        $newProductClassificationListId = '';
        $newProductClassificationListVersionId = '';
        $newProductClassificationCodeClassname = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first referenced product in latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next referenced product in latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get referenced product from latest position
     *
     * @param  null|string $newProductId               ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             Name of the product (product name)
     * @param  null|string $newProductDescription      Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         Product global id
     * @param  null|string $newProductGlobalIdType     Type of the product global id
     * @param  null|string $newProductIndustryId       Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return static
     *
     * @param-out string $newProductId
     * @param-out string $newProductName
     * @param-out string $newProductDescription
     * @param-out string $newProductSellerId
     * @param-out string $newProductBuyerId
     * @param-out string $newProductGlobalId
     * @param-out string $newProductGlobalIdType
     * @param-out string $newProductIndustryId
     * @param-out float  $newProductUnitQuantity
     * @param-out string $newProductUnitQuantityUnit
     */
    public function getDocumentPositionReferencedProduct(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?float &$newProductUnitQuantity,
        ?string &$newProductUnitQuantityUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newProductId = '';
        $newProductName = '';
        $newProductDescription = '';
        $newProductSellerId = '';
        $newProductBuyerId = '';
        $newProductGlobalId = '';
        $newProductGlobalIdType = '';
        $newProductIndustryId = '';
        $newProductUnitQuantity = 0.0;
        $newProductUnitQuantityUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionSellerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionSellerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionBuyerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionBuyerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated buyer's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated quotation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionQuotationReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return bool
     */
    public function nextDocumentPositionQuotationReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated quotation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionContractReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionContractReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to first additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional associated document (line reference) from latest position
     *
     * @param  null|string                 $newReferenceNumber         Additional document number
     * @param  null|string                 $newReferenceLineNumber     Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate           Additional document date
     * @param  null|string                 $newTypeCode                Additional document type code
     * @param  null|string                 $newReferenceTypeCode       Additional document reference-type code
     * @param  null|string                 $newDescription             Additional document description
     * @param  null|InvoiceSuiteAttachment &$newInvoiceSuiteAttachment Additional document attachment
     * @return static
     *
     * @param-out string                      $newReferenceNumber
     * @param-out string                      $newReferenceLineNumber
     * @param-out null|DateTimeInterface      $newReferenceDate
     * @param-out string                      $newTypeCode
     * @param-out string                      $newReferenceTypeCode
     * @param-out string                      $newDescription
     * @param-out null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment
     */
    public function getDocumentPositionAdditionalReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';
        $newReferenceTypeCode = '';
        $newDescription = '';
        $newInvoiceSuiteAttachment = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateCustomerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateCustomerOrderReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDespatchAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDespatchAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReceivingAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReceivingAdviceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDeliveryNoteReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDeliveryNoteReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     */
    public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionInvoiceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionInvoiceReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     *
     * @param-out string                 $newReferenceNumber
     * @param-out string                 $newReferenceLineNumber
     * @param-out null|DateTimeInterface $newReferenceDate
     * @param-out string                 $newTypeCode
     */
    public function getDocumentPositionInvoiceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first additional object reference
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalObjectReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next additional object reference
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalObjectReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     *
     * @param-out string $newReferenceNumber
     * @param-out string $newTypeCode
     * @param-out string $newReferenceTypeCode
     */
    public function getDocumentPositionAdditionalObjectReference(
        ?string &$newReferenceNumber = null,
        ?string &$newTypeCode = null,
        ?string &$newReferenceTypeCode = null
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newReferenceNumber = '';
        $newTypeCode = '';
        $newReferenceTypeCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Returns true if a gross price was specified
     *
     * @return bool
     */
    public function firstDcumentPositionGrossPrice(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the position's gross price from latest position
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @param-out float  $newGrossPrice
     * @param-out float  $newGrossPriceBasisQuantity
     * @param-out string $newGrossPriceBasisQuantityUnit
     */
    public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGrossPrice = 0.0;
        $newGrossPriceBasisQuantity = 0.0;
        $newGrossPriceBasisQuantityUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     *
     * @param-out float  $newGrossPriceAllowanceChargeAmount
     * @param-out bool   $newIsCharge
     * @param-out float  $newGrossPriceAllowanceChargePercent
     * @param-out float  $newGrossPriceAllowanceChargeBasisAmount
     * @param-out string $newGrossPriceAllowanceChargeReason
     * @param-out string $newGrossPriceAllowanceChargeReasonCode
     */
    public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$newGrossPriceAllowanceChargeAmount,
        ?bool &$newIsCharge,
        ?float &$newGrossPriceAllowanceChargePercent,
        ?float &$newGrossPriceAllowanceChargeBasisAmount,
        ?string &$newGrossPriceAllowanceChargeReason,
        ?string &$newGrossPriceAllowanceChargeReasonCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGrossPriceAllowanceChargeAmount = 0.0;
        $newIsCharge = false;
        $newGrossPriceAllowanceChargePercent = 0.0;
        $newGrossPriceAllowanceChargeBasisAmount = 0.0;
        $newGrossPriceAllowanceChargeReason = '';
        $newGrossPriceAllowanceChargeReasonCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Returns true if a net price was specified
     *
     * @return bool
     */
    public function firstDocumentPositionNetPrice(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the position's net price from latest position
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @param-out float  $newNetPrice
     * @param-out float  $newNetPriceBasisQuantity
     * @param-out string $newNetPriceBasisQuantityUnit
     */
    public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newNetPrice = 0.0;
        $newNetPriceBasisQuantity = 0.0;
        $newNetPriceBasisQuantityUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the position's net price included tax from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     *
     * @param-out string $newTaxCategory
     * @param-out string $newTaxType
     * @param-out float  $newTaxAmount
     * @param-out float  $newTaxPercent
     * @param-out string $newExemptionReason
     * @param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionNetPriceTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = '';
        $newExemptionReasonCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the position's quantities from latest position
     *
     * @param  null|float  $newQuantity                   Invoiced quantity
     * @param  null|string $newQuantityUnit               Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity         Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit     Charge Free quantity unit
     * @param  null|float  $newPackageQuantity            Package quantity
     * @param  null|string $newPackageQuantityUnit        Package quantity unit
     * @param  null|float  $newPerPackageUnitQuantity     Per Package unit quantity
     * @param  null|string $newPerPackageUnitQuantityUnit Per Package unit quantity unit
     * @return static
     *
     * @param-out float  $newQuantity
     * @param-out string $newQuantityUnit
     * @param-out float  $newChargeFreeQuantity
     * @param-out string $newChargeFreeQuantityUnit
     * @param-out float  $newPackageQuantity
     * @param-out string $newPackageQuantityUnit
     * @param-out float  $newPerPackageUnitQuantity
     * @param-out string $newPerPackageUnitQuantityUnit
     */
    public function getDocumentPositionQuantities(
        ?float &$newQuantity,
        ?string &$newQuantityUnit,
        ?float &$newChargeFreeQuantity,
        ?string &$newChargeFreeQuantityUnit,
        ?float &$newPackageQuantity,
        ?string &$newPackageQuantityUnit,
        ?float &$newPerPackageUnitQuantity,
        ?string &$newPerPackageUnitQuantityUnit,
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newQuantity = 0.0;
        $newQuantityUnit = '';
        $newChargeFreeQuantity = 0.0;
        $newChargeFreeQuantityUnit = '';
        $newPackageQuantity = 0.0;
        $newPackageQuantityUnit = '';
        $newPerPackageUnitQuantity = 0.0;
        $newPerPackageUnitQuantityUnit = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentPositionShipToName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the Ship-To party from latest position
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentPositionShipToId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the Ship-To party from latest position
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentPositionShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentPositionShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @param-out string $newName
     */
    public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @param-out string $newId
     */
    public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToGlobalId(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @param-out string $newGlobalId
     * @param-out string $newGlobalIdType
     */
    public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newGlobalId = '';
        $newGlobalIdType = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @param-out string $newTaxRegistrationType
     * @param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToAddress(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the address of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     *
     * @param-out string $newAddressLine1
     * @param-out string $newAddressLine2
     * @param-out string $newAddressLine3
     * @param-out string $newPostcode
     * @param-out string $newCity
     * @param-out string $newCountryId
     * @param-out string $newSubDivision
     */
    public function getDocumentPositionUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newId
     * @param-out string $newName
     */
    public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newId = '';
        $newName = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToContact(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     *
     * @param-out string $newPersonName
     * @param-out string $newDepartmentName
     * @param-out string $newPhoneNumber
     * @param-out string $newFaxNumber
     * @param-out string $newEmailAddress
     */
    public function getDocumentPositionUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToCommunication(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newUri
     */
    public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newUri = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Get the date of the delivery from latest position
     *
     * @param  null|DateTimeInterface $newDate
     * @return static
     *
     * @param-out null|DateTimeInterface $newDate
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newDate = null;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentPositionBillingPeriod(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentPositionBillingPeriod(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @param-out null|DateTimeInterface $newStartDate
     * @param-out null|DateTimeInterface $newEndDate
     * @param-out string                 $newDescription
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newStartDate = null;
        $newEndDate = null;
        $newDescription = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first position's tax information from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionTax(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next position's tax information from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionTax(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the position's tax information from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     *
     * @param-out string $newTaxCategory
     * @param-out string $newTaxType
     * @param-out float  $newTaxAmount
     * @param-out float  $newTaxPercent
     * @param-out string $newExemptionReason
     * @param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = '';
        $newExemptionReasonCode = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     *
     * @param-out bool   $newChargeIndicator
     * @param-out float  $newAllowanceChargeAmount
     * @param-out float  $newAllowanceChargeBaseAmount
     * @param-out string $newAllowanceChargeReason
     * @param-out string $newAllowanceChargeReasonCode
     * @param-out float  $newAllowanceChargePercent
     */
    public function getDocumentPositionAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newChargeIndicator = false;
        $newAllowanceChargeAmount = 0.0;
        $newAllowanceChargeBaseAmount = 0.0;
        $newAllowanceChargeReason = '';
        $newAllowanceChargeReasonCode = '';
        $newAllowanceChargePercent = 0.0;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Returns true if a position summation exists
     *
     * @return bool
     */
    public function firstDocumentPositionSummation(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get the document position summation from latest position
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return static
     *
     * @param-out float $newNetAmount
     * @param-out float $newChargeTotalAmount
     * @param-out float $newDiscountTotalAmount
     * @param-out float $newTaxTotalAmount
     * @param-out float $newGrossAmount
     */
    public function getDocumentPositionSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newGrossAmount
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newNetAmount = 0.0;
        $newChargeTotalAmount = 0.0;
        $newDiscountTotalAmount = 0.0;
        $newTaxTotalAmount = 0.0;
        $newGrossAmount = 0.0;
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Go to the first posting reference from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionPostingReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Go to the next posting reference from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionPostingReference(): bool
    {
        $this->traceMethodEnter(__METHOD__);

        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return false;
    }

    /**
     * Get a position's posting reference from latest position
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @param-out string $newType
     * @param-out string $newAccountId
     */
    public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static
    {
        $this->traceMethodEnter(__METHOD__);

        $newType = '';
        $newAccountId = '';
        // TODO: Implement method.

        $this->traceMethodExit(__METHOD__);

        return $this;
    }
}
