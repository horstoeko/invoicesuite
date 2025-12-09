<?php

declare(strict_types=1);

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
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentBuilder
{
    use HandlesCallForwarding;
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;

    /**
     * Constructor (hidden)
     *
     * @param  string                                      $formatProviderUniqueId
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @return InvoiceSuiteDocumentBuilder
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
     * Create a new InvoiceDocumentBuilder instance for the given format provider
     *
     * @param  string $formatProviderUniqueId
     * @return static
     */
    public static function createByProviderUniqueId(
        string $formatProviderUniqueId
    ): static {
        return new static($formatProviderUniqueId);
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
     * @throws LogicException
     * @throws RuntimeException
     * @return InvoiceSuiteDocumentReader
     */
    public function copyToReader(): InvoiceSuiteDocumentReader
    {
        return InvoiceSuiteDocumentReader::createFromContent($this->getContentAsXml());
    }

    /**
     * Create a document by a DTO
     *
     * @param  InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return static
     */
    public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->createFromDTO($newDocumentDTO);

        return $this;
    }

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentType($newDocumentType);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return static
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return static
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return static
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return static
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return static
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return static
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return static
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return static
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function setDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function addDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return static
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param  null|string            $newReferenceNumber quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return static
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add am associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
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
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
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
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     */
    public function setDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     */
    public function addDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return static
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return static
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return static
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSupplyChainEvent($newDate);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return static
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerReference($newBuyerReference);

        return $this;
    }

    /**
     * Set information on the delivery conditions
     *
     * @param  null|string $code The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     */
    public function setDocumentDeliveryTerms(
        ?string $newCode = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentDeliveryTerms($newCode);

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerName($newName);

        return $this;
    }

    /**
     * Add a name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerName($newName);

        return $this;
    }

    /**
     * Set the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerId($newId);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Add a name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentBuyerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName
     * @param  null|string $newDepartmentName
     * @param  null|string $newPhoneNumber
     * @param  null|string $newFaxNumber
     * @param  null|string $newEmailAddress
     * @return static
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToName($newName);

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToName($newName);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromName($newName);

        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set Payment mean
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
     * @return static
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
    ): static {
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
     * @return static
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
    ): static {
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
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
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
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
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
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
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
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
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
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsDirectDebitSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsDirectDebitSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsDirectDebitNoSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsDirectDebitNoSepa(
            $newBuyerIban,
            $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return static
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentMeanAsPaymentCard(
            $newFinancialCardId,
            $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Add Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return static
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentMeanAsPaymentCard(
            $newFinancialCardId,
            $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentCreditorReferenceID(
            $newId
        );

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentCreditorReferenceID(
            $newId
        );

        return $this;
    }

    /**
     * Set a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentReference(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPaymentReference(
            $newId
        );

        return $this;
    }

    /**
     * Add a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentReference(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPaymentReference(
            $newId
        );

        return $this;
    }

    /**
     * Set payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
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
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
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
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     */
    public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
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
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     */
    public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
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
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     */
    public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
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
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     */
    public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
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
    ): static {
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
    ): static {
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
    ): static {
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
    ): static {
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
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     */
    public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
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
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     */
    public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
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
     * @return static
     */
    public function prepareDocumentSummation(): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->prepareDocumentSummation();

        return $this;
    }

    /**
     * Set the document summation
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
    ): static {
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
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return static
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): static {
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
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
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
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
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
    ): static {
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
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
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
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
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
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
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
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
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
    ): static {
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
    ): static {
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
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
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
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
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
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Set an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function setDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionAdditionalObjectReference(
            $newReferenceNumber,
            $newTypeCode,
            $newReferenceTypeCode
        );

        return $this;
    }

    /**
     * Add an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function addDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionAdditionalObjectReference(
            $newReferenceNumber,
            $newTypeCode,
            $newReferenceTypeCode
        );

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): static {
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
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     */
    public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): static {
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
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): static {
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
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): static {
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
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
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
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return static
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null,
    ): static {
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
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
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
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
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
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
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
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
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
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
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
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
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
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToName(
            $newName
        );

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToId(
            $newId
        );

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToGlobalId(
            $newGlobalId,
            $newGlobalIdType
        );

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
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
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
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
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
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
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
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
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
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
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
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
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionUltimateShipToCommunication(
            $newType,
            $newUri
        );

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate
     * @return static
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->setDocumentPositionSupplyChainEvent(
            $newDate
        );

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
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
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
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
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
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
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
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
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
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
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
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
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return static
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): static {
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
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function setDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): static
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
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function addDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        $this->getCurrentDocumentFormatProvider()->getBuilder()->addDocumentPositionPostingReference(
            $newType,
            $newAccountId
        );

        return $this;
    }
}
