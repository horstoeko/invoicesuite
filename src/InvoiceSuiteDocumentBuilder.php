<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use JMS\Serializer\Exception\InvalidArgumentException;
use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing the document builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentBuilder
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;

    /**
     * Create a new InvoiceDocumentBuilder instance for the given format provider
     *
     * @param  string $formatProviderUniqueId
     * @return InvoiceSuiteDocumentBuilder
     */
    public static function createByProviderUniqueId(
        string $formatProviderUniqueId
    ): self {
        return new static($formatProviderUniqueId);
    }

    /**
     * Constructor (hidden)
     *
     * @param  string $formatProviderUniqueId
     * @return InvoiceSuiteDocumentBuilder
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    final protected function __construct(
        string $formatProviderUniqueId
    ) {
        $this->resolveAvailableDocumentFormatProviders();
        $this->setCurrentDocumentFormatProvider($this->findDocumentFormatProviderByUniqueIdOrFail($formatProviderUniqueId));
        $this->getCurrentDocumentFormatProvider()->initBuilder();
    }

    /**
     * Dynamically pass missing methods to the builder provided by format provider
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallWithCheckTo($this->getCurrentDocumentFormatProvider()->getBuilder(), $method, $parameters);
    }

    /**
     * Get the content as XML string
     *
     * @return string
     */
    public function getContentAsXml(): string
    {
        return $this->getCurrentDocumentFormatProvider()->getBuilder()->getContentAsXml();
    }

    /**
     * Get the content as JSON string
     *
     * @return string
     */
    public function getContentAsJson(): string
    {
        return $this->getCurrentDocumentFormatProvider()->getBuilder()->getContentAsJson();
    }

    /**
     * Save the XML content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsXmlFile(
        string $tofile
    ): void {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->saveAsXmlFile($tofile);
    }

    /**
     * Save the JSON content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsJsonFile(
        string $tofile
    ): void {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->saveAsJsonFile($tofile);
    }

    /**
     * Copy Builder to a Reader instance
     *
     * @return InvoiceSuiteDocumentReader
     * @throws LogicException
     * @throws RuntimeException
     */
    public function copyToReader(): InvoiceSuiteDocumentReader
    {
        return InvoiceSuiteDocumentReader::createFromContent($this->getContentAsXml());
    }

    /**
     * Create a document by a DTO
     *
     * @param InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->createFromDTO($newDocumentDTO);

        return $this;
    }

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentType($newDocumentType);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated quotation
     *
     * @param string|null $newReferenceNumber Quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param string|null $newReferenceNumber quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add am associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentAdditionalReference(
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
     * Add an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentAdditionalReference(
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
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
        );

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
        );

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function setDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function addDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param string|null $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerReference($newBuyerReference);

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerName($newName);

        return $this;
    }

    /**
     * Add a name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerName($newName);

        return $this;
    }

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerId($newId);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the seller/supplier party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Add a name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentBuyerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName
     * @param string|null $newDepartmentName
     * @param string|null $newPhoneNumber
     * @param string|null $newFaxNumber
     * @param string|null $newEmailAddress
     * @return self
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToName($newName);

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToName($newName);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Invoicer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
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
     */
    public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set Payment mean
     *
     * @param string|null $newTypeCode Expected or used means of payment expressed as a code
     * @param string|null $newName Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate Identification of the mandate reference
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
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMean(
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
     * Add Payment mean
     *
     * @param string|null $newTypeCode Expected or used means of payment expressed as a code
     * @param string|null $newName Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate Identification of the mandate reference
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
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMean(
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
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsCreditTransferSepa(
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference
        );

        return $this;
    }

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsCreditTransferSepa(
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference
        );

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsCreditTransferNoSepa(
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference
        );

        return $this;
    }

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsCreditTransferNoSepa(
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference
        );

        return $this;
    }

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsDirectDebitSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsDirectDebitSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsDirectDebitNoSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsDirectDebitNoSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsPaymentCard(
            $newFinancialCardId,
            $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Add Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsPaymentCard(
            $newFinancialCardId,
            $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentCreditorReferenceID(
            $newId
        );

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentCreditorReferenceID(
            $newId
        );

        return $this;
    }

    /**
     * Set payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentTerm(
            $newDescription,
            $newDueDate,
            $newMandate
        );

        return $this;
    }

    /**
     * Add payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentTerm(
            $newDescription,
            $newDueDate,
            $newMandate
        );

        return $this;
    }

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newPenaltyAmount,
            $newPenaltyPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newPenaltyAmount,
            $newPenaltyPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        return $this;
    }

    /**
     * Set Document Tax Breakdown
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newBasisAmount Tax base amount
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate Date on which tax is due
     * @param string|null $newTaxDueCode Code for the date on which tax is due
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
        ?string $newTaxDueCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTax(
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
     * Add Document Tax Breakdown
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newBasisAmount Tax base amount
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate Date on which tax is due
     * @param string|null $newTaxDueCode Code for the date on which tax is due
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
        ?string $newTaxDueCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTax(
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
     * Set Document Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        ?float $newAllowanceChargePercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentAllowanceCharge(
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
     * Add Document Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        ?float $newAllowanceChargePercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentAllowanceCharge(
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
        ?float $newTaxPercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentLogisticServiceCharge(
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
        ?float $newTaxPercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        return $this;
    }

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return self
     */
    public function prepareDocumentSummation(): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->prepareDocumentSummation();

        return $this;
    }

    /**
     * Set the document summation
     *
     * @param float|null $newNetAmount Sum of the net amounts of all invoice lines
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxBasisAmount Total invoice amount excluding sales tax
     * @param float|null $newTaxTotalAmount Total amount of the invoice sales tax (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice amount including sales tax
     * @param float|null $newDueAmount Payment amount due
     * @param float|null $newPrepaidAmount Prepayment amount
     * @param float|null $newRoungingAmount Rounding amount
     * @return self
     */
    public function setDocumentSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxBasisAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newTaxTotalAmount2 = null,
        ?float $newGrossAmount = null,
        ?float $newDueAmount = null,
        ?float $newPrepaidAmount = null,
        ?float $newRoungingAmount = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxBasisAmount,
            $newTaxTotalAmount,
            $newTaxTotalAmount2,
            $newGrossAmount,
            $newDueAmount,
            $newPrepaidAmount,
            $newRoungingAmount
        );

        return $this;
    }

    /**
     * Add a new position to document
     *
     * @param string|null $newPositionId Identification of the position
     * @param string|null $newParentPositionId Identification of the parent position
     * @param string|null $newLineStatusCode Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        return $this;
    }

    /**
     * Set text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        return $this;
    }

    /**
     * Add text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        return $this;
    }

    /**
     * Add product details to latest added position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param string|null $newProductModelId Unique model identifier of the product
     * @param string|null $newProductBatchId Batch (lot) identifier of the product
     * @param string|null $newProductBrandName Brand name of the product
     * @param string|null $newProductModelName Model name of the product
     * @param string|null $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return self
     */
    public function setDocumentPositionProductDetails(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?string $newProductModelId = null,
        ?string $newProductBatchId = null,
        ?string $newProductBrandName = null,
        ?string $newProductModelName = null,
        ?string $newProductOriginTradeCountry = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionProductDetails(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductModelId,
            $newProductBatchId,
            $newProductBrandName,
            $newProductModelName,
            $newProductOriginTradeCountry
        );

        return $this;
    }

    /**
     * Set product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit,
        );

        return $this;
    }

    /**
     * Add product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit,
        );

        return $this;
    }

    /**
     * Set product classification in latest added position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        return $this;
    }

    /**
     * Add product classification in latest added position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        return $this;
    }

    /**
     * Set referenced product in latest added position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param float|null $newProductUnitQuantity Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return self
     */
    public function setDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionReferencedProduct(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductUnitQuantity,
            $newProductUnitQuantityUnit
        );

        return $this;
    }

    /**
     * Add referenced product in latest added position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param float|null $newProductUnitQuantity Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return self
     */
    public function addDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionReferencedProduct(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductUnitQuantity,
            $newProductUnitQuantityUnit
        );

        return $this;
    }

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set the associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set an additional associated document (line reference)
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param string|null $newReferenceLineNumber Additional document line number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        return $this;
    }

    /**
     * Add an additional associated document (line reference)
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param string|null $newReferenceLineNumber Additional document line number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param null|float $newGrossPrice Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        return $this;
    }

    /**
     * Set discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        return $this;
    }

    /**
     * Add discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        return $this;
    }

    /**
     * Set the position's net price
     *
     * @param null|float $newNetPrice Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionNetPriceTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param null|float $newQuantity Invoiced quantity
     * @param null|string $newQuantityUnit Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param null|float $newPackageQuantity Package quantity
     * @param null|string $newPackageQuantityUnit Package quantity unit
     * @return self
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionQuantities(
            $newQuantity,
            $newQuantityUnit,
            $newChargeFreeQuantity,
            $newChargeFreeQuantityUnit,
            $newPackageQuantity,
            $newPackageQuantityUnit
        );

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
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
     */
    public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
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
     */
    public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Add a address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate
     * @return self
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionSupplyChainEvent(
            $newDate
        );

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    /**
     * Add a position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    /**
     * Set the position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        return $this;
    }

    /**
     * Add a position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        return $this;
    }

    /**
     * Set Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Add Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Set the document position summation
     *
     * @param float|null $newNetAmount Net amount
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxTotalAmount Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice line amount including sales tax
     * @return self
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): self {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        return $this;
    }

    /**
     * Set a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionPostingReference(
            $newType,
            $newAccountId
        );

        return $this;
    }

    /**
     * Add a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionPostingReference(
            $newType,
            $newAccountId
        );

        return $this;
    }
}
